<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$error = '';
$authors = [];
$book = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM books WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $book = $result->fetch_assoc();
}

if (isset($_POST['edit_book'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $author_id = $_POST['author_id'];

    $stmt = $conn->prepare("UPDATE books SET title = ?, description = ?, author_id = ? WHERE id = ?");
    $stmt->bind_param('ssii', $title, $description, $author_id, $id);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Error: Could not update book.";
    }
}

$stmt = $conn->prepare("SELECT id, name FROM authors");
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $authors[] = $row;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro - Biblioteca Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Livro</h1>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($book['title']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required><?php echo htmlspecialchars($book['description']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="author_id" class="form-label">Author</label>
                <select class="form-control" id="author_id" name="author_id" required>
                    <?php foreach ($authors as $author): ?>
                        <option value="<?php echo $author['id']; ?>" <?php if ($author['id'] == $book['author_id']) echo 'selected'; ?>><?php echo htmlspecialchars($author['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="edit_book">Save Changes</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
