<?php
$dsn = "mysql:host=localhost;dbname=mydatabase";
$uname = "root";
$pass = "";

try {
    $pdo = new PDO($dsn,$uname,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "connection failed". $e->getMessage();
}
?>