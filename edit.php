<?php

require 'database.php';

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id;');
$stmt->execute(['id' => $id]);
$book = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $book['title']; ?></title>
</head>
<body>

<form action="update_book.php" method="post">

    <input type="hidden" name="id" value="<?= $id; ?>">

    <input type="text" name="title" value="<?= $book['title']; ?>">

    <br>

    <button type="submit">Salvesta</button>

</form>

</body>
</html>
