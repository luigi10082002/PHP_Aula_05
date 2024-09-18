<?php
session_start();
require_once 'produto.php';

function produtoJaExiste($novoProduto, $produtos) {
    foreach ($produtos as $produto_serializado) {
        $produto = unserialize($produto_serializado);
        if ($produto instanceof Produto) {
            if ($produto->nome === $novoProduto->nome &&
                $produto->descricao === $novoProduto->descricao &&
                $produto->valor === $novoProduto->valor &&
                $produto->imagem === $novoProduto->imagem) {
                return true;
            }
        }
    }
    return false;
}

function redirecionar($url) {
    header("Location: $url");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $valor = trim($_POST['valor'] ?? '');
    $imagem = trim($_POST['imagem'] ?? '');

    if ($nome && $descricao && $valor && $imagem) {
        $novoProduto = new Produto($nome, $descricao, (float) $valor, $imagem);

        if (!isset($_SESSION['produtos'])) {
            $_SESSION['produtos'] = [];
        }

        if (!produtoJaExiste($novoProduto, $_SESSION['produtos'])) {
            $_SESSION['produtos'][] = serialize($novoProduto);
            $_SESSION['mensagem'] = "Produto adicionado com sucesso!";
            redirecionar('mostra.php');
        } else {
            $_SESSION['mensagem'] = "Produto já existe!";
            redirecionar('novo.php');
        }
    } else {
        $_SESSION['mensagem'] = "Por favor, preencha todos os campos.";
        redirecionar('novo.php');
    }
} else {
    redirecionar('novo.php');
}
