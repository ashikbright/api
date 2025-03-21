<?php
require_once '../config/connection.php';

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $data = json_decode(file_get_contents("php://input"), true);
    if (!isset($data['id'])) {
        $response['status'] = 0;
        $response['message'] = "ID required";
    } else {
        $id = intval($data['id']);
        $sql = "DELETE FROM products WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            $response['status'] = 1;
            $response['message'] = "Product deleted successfully";
        } else {
            $response['status'] = 0;
            $response['message'] = "Error: " . $conn->error;
        }
    }
} else {
    $response['status'] = 0;
    $response['message'] = "Invalid request";
}

echo json_encode($response);
$conn->close();
?>
