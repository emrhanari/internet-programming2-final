<?php

$servername="localhost";
$username="root";
$password="";
$db_name="book-store";

try {
    $conn = new PDO("mysql:host=$servername;dbname=book-store", $username, $password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>