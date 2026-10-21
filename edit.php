<?php

require 'database.php';

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id;');
$stmt->execute(['id' => $id]);
$book = $stmt->fetch();

$authorsStmt = $pdo->prepare('SELECT ba.id, a.first_name, a.last_name
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

<form action="update_book.php" method="post">

    <input type="hidden" name="id" value="<?= $id; ?>">

    <input type="text" name="title" value="<?= $book['title']; ?>">

    <br>

    <button type="submit">Salvesta</button>

</form>

<ul>

<?php while ( $author = $authorsStmt->fetch() ) { ?>

    <form action="remove_author.php" method="post">

        <li>
            <input type="hidden" name="book-id" value="<?= $id; ?>">
            <input type="hidden" name="book-author-id" value="<?= $author['id']; ?>">
            <?= $author['first_name']; ?> <?= $author['last_name']; ?>
            <button type="submit">X</button>
        </li>

    </form>

<?php } ?>

</ul>

</body>
</html>
