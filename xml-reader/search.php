<?php
include 'db_config.php';

$authorName = $_GET['authorName'];

$query = "SELECT authors.name as author_name, COALESCE(books.name, '<none>') as book_name
          FROM authors
          LEFT JOIN books ON authors.id = books.author_id
          WHERE authors.name ILIKE :authorName";

$statement = $pdo->prepare($query);
$statement->execute(['authorName' => "%$authorName%"]);

$results = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $result) {
    echo "<div class='result-row'>";
    echo "<span class='author'>{$result['author_name']}</span>";
    echo "<span class='separator'>|</span>"; // Добавен разделител
    echo "<span class='book'>{$result['book_name']}</span>";
    echo "</div>";
}

?>