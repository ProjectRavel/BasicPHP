<?php

$db_server = 'localhost';
$db_user = 'root';
$db_pass = '123';
$db_name = 'business';
$conn =  "";

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
if ($conn) {
    echo "Database connected successfully <br>";
} else {
    echo "Database not connected";
}