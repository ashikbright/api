<?php
require_once '../config/connection.php';

$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['id']) || !isset($data['name'])) {
    echo json_encode(["status" => 0, "message" => "ID and name required"]);
    exit;
}

$id = intval($data['id']);
$name = $conn->real_escape_string($data['name']);
$sql = "UPDATE categories SET name='$name' WHERE id=$id";

echo json_encode(["status" => $conn->query($sql) ? 1 : 0]);
$conn->close();
?>
