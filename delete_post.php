<?php
header('Content-Type: application/json');
require_once '../connection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    http_response_code(405);
    echo json_encode(["error" => "Method Not Allowed. Use DELETE."]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'] ?? null;

if (!$id) {
    echo json_encode(["error" => "Post ID is required"]);
    exit;
}

$sql = "DELETE FROM posts WHERE id = ?";
$stmt = $pdo->prepare($sql);
$success = $stmt->execute([$id]);

echo json_encode(["success" => $success]);
?>

