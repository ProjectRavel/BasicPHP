<?php

// OOP (Object-Oriented Programming) adalah paradigma pemrograman yang menggunakan objek dan kelas untuk membuat program yang lebih modular, mudah dibaca, dan dipelihara. Dalam OOP, data dan fungsi yang memanipulasi data diatur dalam unit-unit yang disebut objek.

// Class
class Mobil
{
    // PROPERTIES = Data yang dimiliki oleh sebuah object
    // $properties = "Default Values"
    public $namaMobil = "Nama Mobil",
        $merkMobil = "Merk Mobil",
        $warnaMobil = "Warna Mobil",
        $kecepatanMobil = "Kecepatan Mobil";

    // METHOD = Fungsi yang dimiliki oleh sebuah object
    public function ubahKecepatan($jumlah)
    {
        // $this berfungsi untuk memanggil properties dalam class yang methode tempati
        // kenapa kita harus memakai $this? karena function adalah local variable yang gabisa mengambil variable di luar function
        // Ubah kecepatan mobil sebesar 100 km/h
        $this->kecepatanMobil += $jumlah;
    }
}

$mobilNissan = new Mobil();
$mobilNissan->namaMobil = "Nissan GTR R-35";
$mobilNissan->merkMobil = "GTR";
$mobilNissan->warnaMobil = "Putih";
$mobilNissan->kecepatanMobil = 69;
$mobilNissan->ubahKecepatan(200);

var_dump($mobilNissan);
