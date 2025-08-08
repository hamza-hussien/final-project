<?php
header('Content-Type: application/json');
require_once '../connection.php';

$sql = "SELECT p.*, u.name AS author, 
        (SELECT COUNT(*) FROM comments c WHERE c.post_id = p.id) AS comment_count
        FROM posts p
        JOIN users u ON p.user_id = u.id
        ORDER BY p.id DESC";
$stmt = $pdo->query($sql);
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
