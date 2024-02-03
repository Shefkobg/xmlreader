<?php
$host = "localhost";
$port = "5432";
$dbname = "library";
$user = "postgres";
$password = "";

$pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");