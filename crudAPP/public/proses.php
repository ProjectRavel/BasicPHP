<?php
require 'connection.php';

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "add") {



        $nisn = filter_input(INPUT_POST, 'nisn', FILTER_SANITIZE_SPECIAL_CHARS);
        $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_SPECIAL_CHARS);
        $jeniskelamin = filter_input(INPUT_POST, 'jeniskelamin', FILTER_SANITIZE_SPECIAL_CHARS);
        $foto = $_FILES['foto']['name'];
        $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_SPECIAL_CHARS);

        $dir = "img/";
        $tmpFile = $_FILES['foto']['tmp_name'];

        move_uploaded_file($tmpFile, $dir . $foto);
        $sql = "INSERT INTO tb_siswa (nisn, nama_siswa, jenis_kelamin, foto_siswa, alamat)
        VALUES('$nisn', '$nama', '$jeniskelamin', '$foto', '$alamat')";
        $result = $conn->query($sql);

        if ($result) {
            header('location: index.php');
        } else {
            echo "Gagal Menambahkan Data <a href='index.php'>[Home]</a>";
            echo $sql;
            echo $result;
        }

        echo "Tambah Data <a href='index.php'>[Home]</a>";
    } else if ($_POST['aksi'] == "edit") {
        echo "Edit Data <a href='index.php'>[Home]</a>";
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $showall = "SELECT * FROM tb_siswa WHERE id_siswa = '$id'";
    $resultshow = $conn->query($showall);
    $row = $resultshow->fetch_assoc();
    $foto = $row['foto_siswa'];
    unlink("img/$foto");
    $delete = "DELETE FROM tb_siswa WHERE id_siswa=$id";
    $result = $conn->query($delete);
    if ($result) {
        header('location: index.php');
    } else {
        echo "Gagal Menghapus Data <a href='index.php'>[Home]</a>";
        echo $delete;
        echo $result;
    }
}
