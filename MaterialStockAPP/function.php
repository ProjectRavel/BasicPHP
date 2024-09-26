<?php
session_start();

// Create Connection to the Database
$host = "localhost";
$user = "root";
$password = "123";
$db = "db_materialstock";

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    echo "Connection established";
}