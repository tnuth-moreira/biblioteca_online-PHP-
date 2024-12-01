<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('config.php');

$id = $_GET['id'];

$query = "DELETE FROM livros WHERE id='$id'";
if ($conn->query($query) === TRUE) {
    header("Location: dashboard.php");
} else {
    echo "Erro: " . $query . "<br>" . $conn->error;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Livro - Sistema de Biblioteca</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-5 text-center">Excluir Livro</h2>
        <p class="text-center">O livro foi excluído com sucesso.</p>
        <a href="dashboard.php" class="btn btn-secondary btn-block">Voltar</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
