<?php
require_once '../config/connection.php';

$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['name'])) {
    echo json_encode(["status" => 0, "message" => "Category name is required."]);
    exit;
}

$name = $conn->real_escape_string($data['name']);
$sql = "INSERT INTO categories (name) VALUES ('$name')";

echo json_encode(["status" => $conn->query($sql) ? 1 : 0]);

$conn->close();
?>
