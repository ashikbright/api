<?php
require_once '../config/connection.php';

$response = array();
$response["data"] = array();

$res = mysqli_query($conn, "SELECT * FROM products");

if (mysqli_num_rows($res) > 0) {
    $response['status'] = 1;
    $response['message'] = "Data fetched successfully.";

    while ($row = mysqli_fetch_assoc($res)) {
        array_push($response["data"], $row);
    }
} else {
    $response['status'] = 0;
    $response['message'] = "No data found.";
}

echo json_encode($response);
$conn->close();
?>
