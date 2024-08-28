<?php

$host =  "localhost";
$user = "root";
$pass = "123";
$databasename = "latihanphp";

$connection = new mysqli($host, $user, $pass, $databasename);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT * FROM `latihanphp`.`user_db` WHERE id=2";

$query = $connection->query($sql);

if ($query->num_rows != 0) {
    while ($row = $query->fetch_assoc()) {
       echo $row["name"];
    }
}else{
    echo "no data available";
}
