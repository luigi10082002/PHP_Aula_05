<?php
session_start();
require_once 'produto.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos Cadastrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e0f7fa;
        }
        .navbar {
            background-color: #004d80;
        }
        .navbar-brand,
        .nav-link {
            color: #ffffff;
        }
        .nav-link:hover {
            color: #cceeff;
        }
        .product-card {
            border: 1px solid #007acc;
            border-radius: .25rem;
            padding: 15px;
            background-color: #ffffff;
            transition: transform .2s;
        }
        .product-card:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .alert {
            background-color: #b3e0ff;
            color: #004d80;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Loja</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="mostra.php">Produtos</a>
                    </li>
                </ul>
                <form class="d-flex me-2">
                    <a href="novo.php" class="btn btn-primary">Novo Produto</a>
                </form>
                <form class="d-flex" action="sair.php" method="POST">
                    <button class="btn btn-danger" type="submit">Sair</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="my-4">Produtos</h1>
        <div class="row">
            <?php if (!empty($_SESSION['produtos'])): ?>
                <?php foreach ($_SESSION['produtos'] as $produto_serializado): ?>
                    <?php $produto = unserialize($produto_serializado); ?>
                    <?php if ($produto instanceof Produto): ?>
                        <div class="col-md-4 mb-4">
                            <div class="product-card">
                                <?php $produto->exibirInformacoes(); ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-danger" role="alert">
                            <a href="mostra.php">Recarregar página</a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="alert alert-info" role="alert">
                    <a href="novo.php">Cadastre um Produto</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
