<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../../login.php');
    exit;
}
require_once __DIR__ . '/../controllers/sabatina/adicionar.php';

$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = adicionarArquivoEscolaSabatina($_POST, $_FILES);
    if ($resultado['sucesso']) {
        $_SESSION['mensagem_sucesso'] = 'Arquivo adicionado com sucesso!';
        header('Location: listar.php');
        exit;
    } else {
        $erro = $resultado['erro'];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Arquivo - Escola Sabatina</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>
<?php include '../../cabecalho/header.php'; ?>
<body>
<div class="container mt-5">
    <h1 class="text-center">Adicionar Arquivo da Escola Sabatina</h1>
    <a href="listar.php" class="btn btn-secondary mb-3">Voltar</a>

    <?php if (!empty($erro)): ?>
        <div class="alert alert-danger">
            <strong>Erro:</strong> <?= htmlspecialchars($erro) ?>
        </div>
    <?php endif; ?>

    <form action="adicionar_sabatina.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="arquivo" class="form-label">Selecionar Arquivo:</label>
            <input type="file" name="arquivo" id="arquivo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Salvar</button>
    </form>
</div>
<?php include '../../cabecalho/footer.php'; ?>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
