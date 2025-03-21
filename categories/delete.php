<?php
require_once '../config/connection.php';

$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['id'])) {
    echo json_encode(["status" => 0, "message" => "ID required"]);
    exit;
}

$id = intval($data['id']);
$sql = "DELETE FROM categories WHERE id=$id";

echo json_encode(["status" => $conn->query($sql) ? 1 : 0]);
$conn->close();
?>
