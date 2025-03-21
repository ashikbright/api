<?php
require_once '../config/connection.php';

$response = ["data" => []];

$result = $conn->query("SELECT * FROM categories");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $response["data"][] = $row;
    }
    $response['status'] = 1;
    $response['message'] = "Data fetched successfully.";
} else {
    $response['status'] = 0;
    $response['message'] = "No data found.";
}

echo json_encode($response);
$conn->close();
?>
