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
} else {
    echo "Connection established";
}

if (isset($_POST["addItem"])) {
    $nama_barang = $_POST["nama_barang"];
    $deskripsi_barang = $_POST["deskripsi_barang"];
    $stock_barang = $_POST["stock_barang"];

    $addItemSql = mysqli_query($conn, "INSERT INTO stock(namabarang, deskripsi, stock) VALUES ('$nama_barang', '$deskripsi_barang', '$stock_barang')");
}
