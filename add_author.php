<?php

require 'database.php';

$bookId = $_POST['book-id'];
$authorId = $_POST['author-id'];

$stmt = $pdo->prepare('INSERT INTO book_authors (book_id, author_id) VALUES (:book_id, :author_id)');
$stmt->execute(['book_id' => $bookId, 'author_id' => $authorId]);

header("Location: edit.php?id={$bookId}");