<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff;
        }
        .navbar {
            background-color: #004d80;
        }
        .navbar-brand, .nav-link {
            color: #ffffff;
        }
        .nav-link:hover {
            color: #cceeff;
        }
        .container {
            margin-top: 20px;
        }
        .form-label {
            font-weight: bold;
        }
        .alert {
            display: none;
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
                <a href="novo.php" class="btn btn-primary me-2">Novo Produto</a>
                <form class="d-flex" action="sair.php" method="POST">
                    <button class="btn btn-danger" type="submit">Sair</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-center">Cadastrar Produto</h1>
        <div class="alert alert-success" id="successMessage">Produto cadastrado com sucesso!</div>
        <div class="alert alert-danger" id="errorMessage">Erro ao cadastrar o produto. Por favor, tente novamente.</div>
        <form action="cria.php" method="POST" id="productForm">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Produto</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" required>
            </div>
            <div class="mb-3">
                <label for="valor" class="form-label">Valor (R$)</label>
                <input type="number" step="0.01" class="form-control" id="valor" name="valor" required>
            </div>
            <div class="mb-3">
                <label for="imagem" class="form-label">URL da Imagem</label>
                <input type="url" class="form-control" id="imagem" name="imagem" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('productForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const success = Math.random() > 0.5;
            document.getElementById('successMessage').style.display = success ? 'block' : 'none';
            document.getElementById('errorMessage').style.display = success ? 'none' : 'block';
        });
    </script>
</body>
</html>
