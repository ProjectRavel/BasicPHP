<?php

$host = 'localhost';
$user = 'root';
$pass = '123';
$dbname = 'feedback_db';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};