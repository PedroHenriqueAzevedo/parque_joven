<?php
include(__DIR__ . '/../../../conexao/conexao.php');

function adicionarBanner($dados, $arquivos) {
    global $conexao;

    $titulo = $dados['titulo'];
    $imagem = $arquivos['imagem'];

    if ($imagem['error'] !== UPLOAD_ERR_OK) {
        return ['sucesso' => false, 'erro' => 'Erro no envio da imagem.'];
    }

    $pastaDestino = '../../uploads/';
    if (!is_dir($pastaDestino)) {
        mkdir($pastaDestino, 0755, true);
    }

    $nomeArquivo = basename($imagem['name']);
    $caminhoImagem = $pastaDestino . $nomeArquivo;
    
    if (!move_uploaded_file($imagem['tmp_name'], $caminhoImagem)) {
        return ['sucesso' => false, 'erro' => 'Erro ao salvar a imagem no servidor.'];
    }

    try {
        $stmt = $conexao->prepare("INSERT INTO banners (titulo, imagem) VALUES (:titulo, :imagem)");
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':imagem', $nomeArquivo);
        $stmt->execute();

        $_SESSION['mensagem_sucesso'] = "Banner adicionado com sucesso!";
        return ['sucesso' => true];
    } catch (PDOException $e) {
        return ['sucesso' => false, 'erro' => 'Erro ao salvar o banner no banco: ' . $e->getMessage()];
    }
}
?>
