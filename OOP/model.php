<?php

require_once "database.php";

$db = new Database();
$db->connection();


$getid = $db->getById(3);

if($getid == false){
    echo "ID not found!";
    exit;  //exit the script if no data is found
}

echo  "Id: " . $getid['id'] . ", " . "Nama: " . $getid['name'] . ", " . "Umur: " . $getid['umur'] . "\n";