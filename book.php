<?php

require 'database.php';

$id = $_GET['id'];

$isSuccess = $_GET['update'];

$bookStmt = $pdo->prepare('SELECT * FROM books WHERE id = :id;');
$bookStmt->execute(['id' => $id]);
$book = $bookStmt->fetch();

$authorsStmt = $pdo->prepare('SELECT a.first_name, a.last_name
    FROM book_authors ba LEFT JOIN authors a ON ba.author_id = a.id
    WHERE ba.book_id = :book_id;');
$authorsStmt->execute(['book_id' => $id]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $book['title']; ?></title>
</head>
<body>
    
<?php if ( $isSuccess == 'success' ) { ?>

<span style="display: flex; justify-content: center; color: forestgreen; font-weight: bold; font-size: larger;">Muudatused salvestatud!</span>

<?php } ?>

<h1><?= $book['title']; ?></h1>

<ul>

<?php while ( $author = $authorsStmt->fetch() ) { ?>

    <li><?= $author['first_name']; ?> <?= $author['last_name']; ?></li>

<?php } ?>

</ul>

<a href="edit.php?id=<?= $book['id']; ?>">muuda</a>
<a href="./">Nimekiri</a>

</body>
</html>
