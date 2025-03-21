<?php
require_once '../config/connection.php';

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = json_decode(file_get_contents('php://input'), true);
    $name = isset($input['name']) ? $input['name'] : null;
    $price = isset($input['price']) ? $input['price'] : null;
    $category_id = isset($input['category_id']) ? $input['category_id'] : null;

    if ($name && $price && $category_id) {
        $category_check_sql = "SELECT id FROM categories WHERE id = '$category_id'";
        $category_result = $conn->query($category_check_sql);

        if ($category_result && $category_result->num_rows > 0) {
            $sql = "INSERT INTO products (name, price, category_id) VALUES ('$name', '$price', '$category_id')";

            if ($conn->query($sql) === TRUE) {
                $response['status'] = 1;
                $response['message'] = "Product added successfully";
            } else {
                $response['status'] = 0;
                $response['message'] = "Error: " . $conn->error;
            }
        } else {
            $response['status'] = 0;
            $response['message'] = "Invalid category_id";
        }
    } else {
        $response['status'] = 0;
        $response['message'] = "Missing required fields";
    }
} else {
    $response['status'] = 0;
    $response['message'] = "Invalid request";
}

echo json_encode($response);
$conn->close();
?>
