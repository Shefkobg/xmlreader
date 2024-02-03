<?php
require_once 'db_config.php';

try {
    $pdo->exec("CREATE TABLE IF NOT EXISTS authors (
        id SERIAL PRIMARY KEY,
        name VARCHAR(255) UNIQUE NOT NULL
    )");

    $pdo->exec("CREATE TABLE IF NOT EXISTS books (
        id SERIAL PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        author_id INTEGER REFERENCES authors(id) ON DELETE CASCADE
    )");

    echo "Tables have been successfully created!";
} catch (PDOException $e) {
    die("Error connecting to the database: " . $e->getMessage());
}
?>