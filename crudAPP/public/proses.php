<?php
include 'utility.php';
session_start();

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "add") {
        $success = tambah_data($_FILES);
        if ($success) {
            $_SESSION["execute"] = "Data Berhasil Ditambahkan";
            header('location: index.php');
        } else {
            echo "Gagal Menambahkan Data <a href='index.php'>[Home]</a>";
            echo $sql;
            echo $result;
        }

        echo "Tambah Data <a href='index.php'>[Home]</a>";
    } else if ($_POST['aksi'] == "edit") {
        $result = edit_data($_FILES);
        if ($result) {
            $_SESSION["execute"] = "Data Berhasil Di Ubah!";
            header('location: index.php');
        } else {
            echo "Gagal Update Data: " . $stmt->error . "<a href='index.php'>[Home]</a>";
        }
    }
}

if (isset($_GET['hapus'])) {
    hapus_data($_GET);
}
