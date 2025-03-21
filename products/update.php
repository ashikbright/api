<?php
require_once '../config/connection.php';

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $input = json_decode(file_get_contents('php://input'), true);
    $name = isset($input['name']) ? $input['name'] : null;
    $price = isset($input['price']) ? $input['price'] : null;
    $category_id = isset($input['category_id']) ? $input['category_id'] : null;
    $id = isset($input['id']) ? $input['id'] : null;

    $sql = "UPDATE products SET name='$name', price='$price', category_id='$category_id' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        $response['status'] = 1;
        $response['message'] = "Product updated successfully";
    } else {
        $response['status'] = 0;
        $response['message'] = "Error: " . $conn->error;
    }
} else {
    $response['status'] = 0;
    $response['message'] = "Invalid request";
}

echo json_encode($response);
$conn->close();
?>
