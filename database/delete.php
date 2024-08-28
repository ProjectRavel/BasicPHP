<?php

$host = 'localhost';
$user = "root";
$pass = "123";
$db_name = "latihanphp";

$con = new mysqli($host, $user, $pass, $db_name);

if ($con->connect_error) {
    die("Connection failed: " . $sql->connect_error);
};

$sql = "DELETE FROM `" . $db_name . "`.`user_db` WHERE `id` = 7";

if ($con->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $con->error;
}