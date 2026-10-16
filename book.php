<?php

require 'database.php';

$id = $_GET['id'];

$isSuccess = $_GET['update'];

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
    
<?php if ( $isSuccess == 'success' ) { ?>

<span style="display: flex; justify-content: center; color: forestgreen; font-weight: bold; font-size: larger;">Muudatused salvestatud!</span>

<?php } ?>

<h1><?= $book['title']; ?></h1>

<a href="edit.php?id=<?= $book['id']; ?>">muuda</a>
<a href="./">Nimekiri</a>

</body>
</html>
