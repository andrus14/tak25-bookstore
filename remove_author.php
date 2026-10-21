<?php

require './database.php';

$bookId = $_POST['book-id'];
$bookAuthorId = $_POST['book-author-id'];

$stmt = $pdo->prepare('DELETE FROM book_authors WHERE id = :id');
$stmt->execute(['id' => $bookAuthorId]);

header("Location: edit.php?id={$bookId}");