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

    if ($addItemSql) {
        header("location:index.php");
        exit();
    } else {
        echo "Error: " . $addItemSql . "<br>" . mysqli_error($conn);
        exit();
    }
}

if (isset($_POST["barangIn"])) {
    $barangmasuk = $_POST["barangMasuk"];
    $penerima = $_POST["penerima"];
    $date = date("Y-m-d");
    $qty = $_POST["qtyIn"];

    $addNewItemSql = mysqli_query($conn, "INSERT INTO masuk (id_barang, tanggal, keterangan, qty) VALUES ('$barangmasuk', '$date' , '$penerima', '$qty')");

    $checkStock = mysqli_query($conn, "SELECT * FROM stock WHERE id_barang='$barangmasuk'");
    $checkStockData = mysqli_fetch_array($checkStock);

    $stockNow = $checkStockData["stock"];
    $newStock = $stockNow + $qty;

    $updateStock = mysqli_query($conn, "UPDATE stock SET stock='$newStock' WHERE id_barang='$barangmasuk'");

    if ($addNewItemSql) {
        header("Location: masuk.php");
        exit();
    } else {
        echo "Error: " . $addNewItemSql . "<br>" . mysqli_error($conn);
        exit();
    }
}

if (isset($_POST["barangOut"])) {
    $barangKeluar = $_POST["barangKeluar"];
    $pembeli = $_POST["pembeli"];
    $date = date("Y-m-d");
    $qty = $_POST["qtyOut"];

    $addNewItemSql = mysqli_query($conn, "INSERT INTO keluar (id_barang, tanggal, pembeli, total_keluar) VALUES ('$barangKeluar', '$date' , '$pembeli', '$qty')");

    $checkStock = mysqli_query($conn, "SELECT * FROM stock WHERE id_barang='$barangKeluar'");
    $checkStockData = mysqli_fetch_array($checkStock);

    $stockNow = $checkStockData["stock"];
    $newStock = $stockNow - $qty;

    $updateStock = mysqli_query($conn, "UPDATE stock SET stock='$newStock' WHERE id_barang='$barangKeluar'");

    if ($addNewItemSql) {
        header("Location: keluar.php");
        exit();
    } else {
        echo "Error: " . $addNewItemSql . "<br>" . mysqli_error($conn);
        exit();
    }
}

if (isset($_POST['saveEdit'])) {
    $updatedId = $_POST['idb'];
    $updateNama = $_POST['editNamaBarang'];
    $updateDeskripsi = $_POST['editDeskripsiBarang'];

    $updateSql = mysqli_query($conn, "UPDATE stock set namabarang='$updateNama', deskripsi='$updateDeskripsi' where id_barang='$updatedId'");
    if ($updateSql) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $updateSql . "<br>" . mysqli_error($conn);
        exit();
    }
}
