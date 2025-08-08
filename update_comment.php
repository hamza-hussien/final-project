<?php
header('Content-Type: application/json');
require_once '../connection.php';

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'] ?? null;
$content = $data['content'] ?? null;

if (!$id || !$content) {
    echo json_encode(["error" => "Comment ID and content are required"]);
    exit;
}

$sql = "UPDATE comments SET content = ? WHERE id = ?";
$stmt = $pdo->prepare($sql);
$success = $stmt->execute([$content, $id]);

echo json_encode(["success" => $success]);
?>
