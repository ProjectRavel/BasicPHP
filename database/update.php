<?php

$host = "localhost";
$user = "root";
$pass = "123";
$db_name = "latihanphp";

$conn = new mysqli($host, $user, $pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

$sql = "UPDATE `" . $db_name . "` . `user_db` SET `name`='gibran' WHERE `id`= 5";

if ($conn->query($sql) === TRUE) {
    echo "Data updated successfully";
} else {
    echo "Error updating data: " . $conn->error;
}