<?php
header('Content-Type: application/json');
require_once '../connection.php';

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'] ?? null;

if (!$id) {
    echo json_encode(["error" => "Post ID is required"]);
    exit;
}

$sql = "SELECT p.*, u.name AS author
        FROM posts p
        JOIN users u ON p.user_id = u.id
        WHERE p.id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    echo json_encode(["error" => "Post not found"]);
    exit;
}

$commentSql = "SELECT c.*, u.name AS commenter
               FROM comments c
               JOIN users u ON c.user_id = u.id
               WHERE c.post_id = ?
               ORDER BY c.id DESC
               LIMIT 15";
$commentStmt = $pdo->prepare($commentSql);
$commentStmt->execute([$id]);
$post['comments'] = $commentStmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($post);

?>
