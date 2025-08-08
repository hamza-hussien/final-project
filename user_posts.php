<?php
header('Content-Type: application/json');
require_once '../connection.php';

$data = json_decode(file_get_contents("php://input"), true);
$user_id = $data['user_id'] ?? null;

if (!$user_id) {
    echo json_encode(["error" => "User ID is required"]);
    exit;
}

$sql = "SELECT * FROM posts WHERE user_id = ? ORDER BY id DESC LIMIT 10";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
