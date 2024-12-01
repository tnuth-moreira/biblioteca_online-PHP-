<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];

    $query = "INSERT INTO livros (titulo, autor, ano) VALUES ('$titulo', '$autor', '$ano')";
    if ($conn->query($query) === TRUE) {
        header("Location: dashboard.php");
    } else {
        echo "Erro: " . $query . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Livro - Sistema de Biblioteca</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-5 text-center">Adicionar Livro</h2>
        <form action="add_book.php" method="post" class="mt-4">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="autor">Autor</label>
                <input type="text" id="autor" name="autor" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ano">Ano</label>
                <input type="number" id="ano" name="ano" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success btn-block">Adicionar</button>
        </form>
        <a href="dashboard.php" class="btn btn-secondary mt-4">Voltar</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
