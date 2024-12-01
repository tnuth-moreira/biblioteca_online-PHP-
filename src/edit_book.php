<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM livros WHERE id = $id";
    $result = $conn->query($query);
    $book = $result->fetch_assoc();
 
    if (!$book) {
        echo "Livro não encontrado.";
        exit();
    }
} else {
    echo "ID do livro não fornecido.";
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];

    
    $updateQuery = "UPDATE livros SET titulo = '$titulo', autor = '$autor', ano = '$ano' WHERE id = $id";
    if ($conn->query($updateQuery) === TRUE) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Erro ao atualizar livro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro - Sistema de Biblioteca</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-5 text-center">Editar Livro</h2>
        <form action="edit_book.php?id=<?php echo $id; ?>" method="post" class="mt-4">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo" class="form-control" value="<?php echo htmlspecialchars($book['titulo']); ?>" required>
            </div>
            <div class="form-group">
                <label for="autor">Autor</label>
                <input type="text" id="autor" name="autor" class="form-control" value="<?php echo htmlspecialchars($book['autor']); ?>" required>
            </div>
            <div class="form-group">
                <label for="ano">Ano</label>
                <input type="number" id="ano" name="ano" class="form-control" value="<?php echo htmlspecialchars($book['ano']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Salvar</button>
            <a href="dashboard.php" class="btn btn-secondary btn-block mt-3">Cancelar</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
