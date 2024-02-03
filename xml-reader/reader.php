<?php
include 'db_config.php';

$xmlFilePath = "xmls/books.xml";

$xml = simplexml_load_file($xmlFilePath);

foreach ($xml->book as $book) {
    $author = (string)$book->author;
    $name = (string)$book->name;

    $authorExists = $pdo->query("SELECT id FROM authors WHERE name = '$author'")->fetch();

    if (!$authorExists) {
        $pdo->query("INSERT INTO authors (name) VALUES ('$author')");
    }

    $authorId = $pdo->query("SELECT id FROM authors WHERE name = '$author'")->fetchColumn();

    $bookExists = $pdo->query("SELECT id FROM books WHERE name = '$name' AND author_id = $authorId")->fetch();

    if (!$bookExists) {
        $pdo->query("INSERT INTO books (name, author_id) VALUES ('$name', $authorId)");
    }
}
?>
