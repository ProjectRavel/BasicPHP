<?php
include 'connection.php';

function tambah_data($files)
{
    $nisn = filter_input(INPUT_POST, 'nisn', FILTER_SANITIZE_SPECIAL_CHARS);
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_SPECIAL_CHARS);
    $jeniskelamin = filter_input(INPUT_POST, 'jeniskelamin', FILTER_SANITIZE_SPECIAL_CHARS);
    $split = explode('.', $files['foto']['name']);
    $extension = end($split);
    $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_SPECIAL_CHARS);

    $dir = "img/";
    $tmpFile = $files['foto']['tmp_name'];

    move_uploaded_file($tmpFile, $dir . $nisn  . "." . $extension);
    $sql = "INSERT INTO tb_siswa (nisn, nama_siswa, jenis_kelamin, foto_siswa, alamat)
    VALUES('$nisn', '$nama', '$jeniskelamin', '$nisn.$extension', '$alamat')";
    $result = $GLOBALS['conn']->query($sql);

    return true;
}

function edit_data($files)
{
    $id_siswa = filter_input(INPUT_POST, 'id_siswa', FILTER_SANITIZE_SPECIAL_CHARS);
    $nisn = filter_input(INPUT_POST, 'nisn', FILTER_SANITIZE_SPECIAL_CHARS);
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_SPECIAL_CHARS);
    $jeniskelamin = filter_input(INPUT_POST, 'jeniskelamin', FILTER_SANITIZE_SPECIAL_CHARS);
    $fotoUpdate = '';
    $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_SPECIAL_CHARS);

    if ($files['foto']['name'] !== "") {
        //foto ada
        $dir = "img/";
        $tmpFile = $files['foto']['tmp_name'];
        $fotoUpdate = $files['foto']['name'];
        $showall = "SELECT * FROM tb_siswa WHERE id_siswa = $id_siswa";
        $result = $GLOBALS['conn']->query($showall);
        $row = $result->fetch_assoc();
        $fotoOrigin = $row['foto_siswa'];
        unlink($dir . $fotoOrigin);
        move_uploaded_file($tmpFile, $dir . $fotoUpdate);
    } else {
        //foto tidak ada
        $showall = "SELECT * FROM tb_siswa WHERE id_siswa = $id_siswa";
        $result = $GLOBALS['conn']->query($showall);
        $row = $result->fetch_assoc();
        $fotoUpdate = $row['foto_siswa'];
    }

    $sql = "UPDATE tb_siswa SET nisn = '$nisn', nama_siswa = '$nama', jenis_kelamin = '$jeniskelamin', foto_siswa = '$fotoUpdate' ,alamat = '$alamat' WHERE id_siswa = '$id_siswa';";
    $result = $GLOBALS['conn']->query($sql);

    return true;
}

function hapus_data($get)
{
    $id = $get['hapus'];
    // Menggunakan Prepared Statement untuk Menghindari SQL Injection
    $stmt = $GLOBALS['conn']->prepare("SELECT foto_siswa FROM tb_siswa WHERE id_siswa = ?");
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
        $stmt = $GLOBALS['conn']->prepare("DELETE FROM tb_siswa WHERE id_siswa = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $_SESSION["execute"] = "Data Berhasil Dihapus";
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
