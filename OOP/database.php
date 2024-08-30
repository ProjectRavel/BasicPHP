<?php

// Masukkan connection.php agar dapat diakses
require_once "connection.php";

class Database extends Connection
{
    protected $tableName = 'user_db';

    public function __construct()
    {
        parent::__construct("localhost", "root", "123", "latihanphp");
    }

    public function getAll()
    {
        $sql = "SELECT * FROM $this->tableName";
        $result = $this->connection->query($sql);
        return $result;
    }

    public function getById($id){
        $sql = "SELECT * FROM $this->tableName WHERE id = $id";
        $result = $this->connection->query($sql);
        return $result->fetch_assoc();
    }
    public function insert($nama, $umur)
    {
        $sql = "INSERT INTO $this->tableName (name, umur) VALUES ('$nama', '$umur')";
        $result = $this->connection->query($sql);
        if ($result === false) {
            echo "Gagal Membuat Record baru";
        } else {
            echo "Berhasil Membuat Record Baru";
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->tableName WHERE id = $id";
        $result = $this->connection->query($sql);
        if ($result === false) {
            echo "Gagal Menghapus Record";
        } else {
            echo "Berhasil Menghapus Record";
        }
    }
}
