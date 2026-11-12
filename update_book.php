<?php

require 'database.php';

$id = $_POST['id'];

$stmt = $pdo->prepare('UPDATE books SET title = :title WHERE id = :id;');
$stmt->execute([
    'id' => $id,
    'title' => $_POST['title']
]);

header("Location: edit.php?id={$id}&update=success");
