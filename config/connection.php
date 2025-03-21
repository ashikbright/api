<?php
$conn = new mysqli("localhost", "root", "", "accolade");
if ($conn->connect_error) {
    die(json_encode(["status" => 0, "message" => "Connection failed: " . $conn->connect_error]));
}
else {
   //  echo json_encode(["status" => 1, "message" => "Connected successfully"]);
}
?>
