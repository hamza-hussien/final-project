<?php
$host = "localhost";
$dbname = "blog_db";
$username = "root"; 
$password = "";     

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(["error" => "Database connection failed", "message" => $e->getMessage()]);
    exit;
}
?>
