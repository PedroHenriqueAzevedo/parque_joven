<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../admin/login.php');
    exit;
}
?>
<?php include '../cabecalho/header.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Parque Joven</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
<div class="container mt-5 text-center">
    <h1>Painel Administrativo</h1>
    <p>Bem-vindo ao painel administrativo. Escolha uma das opções abaixo:</p>

    <div class="d-grid gap-3 col-6 mx-auto">
        <a href="banners/banners.php" class="btn btn-primary btn-lg">
            <i class="bi bi-card-image"></i> Gerenciar Banners
        </a>
        <a href="sabatina/listar.php" class="btn btn-success btn-lg">
            <i class="bi bi-journal"></i> Gerenciar Escola Sabatina
        </a>
        <a href="../admin/logout.php" class="btn btn-danger btn-lg">
            <i class="bi bi-box-arrow-right"></i> Sair
        </a>
    </div>
</div>
<?php include '../cabecalho/footer_ad.php'; ?>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
