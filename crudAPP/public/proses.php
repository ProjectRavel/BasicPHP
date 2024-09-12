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

    // Menggunakan Prepared Statement untuk Menghindari SQL Injection
    $stmt = $conn->prepare("SELECT foto_siswa FROM tb_siswa WHERE id_siswa = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $foto = $row['foto_siswa'];
        if (file_exists("img/$foto")) {
            unlink("img/$foto");
        }

        // Menghapus Data dari Database
        $stmt = $conn->prepare("DELETE FROM tb_siswa WHERE id_siswa = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            header('Location: index.php');
            exit();
        } else {
            echo "Gagal Menghapus Data: " . $stmt->error . "<a href='index.php'>[Home]</a>";
        }

        $stmt->close();
    } else {
        echo "Data Tidak Ditemukan <a href='index.php'>[Home]</a>";
    }
}
