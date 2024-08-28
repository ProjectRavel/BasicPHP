<?php

$host = "localhost";
$user = "root";
$pass = "123";
$databasename = "latihanphp";

$connection = new mysqli($host, $user, $pass, $databasename);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Membuat Sql string untuk insert ke dalam database
$sql = "INSERT INTO `latihanphp`.`user_db` (`name`, `umur`)
        VALUES ('udin', 321),
        ('asep', 1),
        ('testing', 213);";

if ($connection->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}
