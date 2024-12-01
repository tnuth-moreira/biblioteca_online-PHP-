<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('config.php');

    $nome = $_POST['username']; 
    $password = $_POST['password'];
    $email = $_POST['email']; 

    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    
    $query = "SELECT * FROM usuarios WHERE nome = '$nome'"; 
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "Usuário já existe!";
    } else {
        
        $query = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$hashed_password')";
        
        if ($conn->query($query) === TRUE) {
            
            header("Location: login.php");
            exit();
        } else {
            echo "Erro: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar - Sistema de Biblioteca</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mt-5 text-center">Registrar</h2>
                <form action="register.php" method="post" class="mt-4">
                    <div class="form-group">
                        <label for="username">Usuário</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-secondary btn-block">Registrar</button>
                </form>
                <p class="text-center mt-3">
                    <a href="login.php">Entrar</a>
                </p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
