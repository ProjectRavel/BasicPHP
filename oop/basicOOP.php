<?php

class Mobil // CLASS
{
    // ATTRIBUTE
    protected $namaMobil,
        $merkMobil,
        $warnaMobil,
        $kategoriMobil,
        $kecepatanMobil;
    //protected adalah cara untuk menggunakan atribute hanya didalam class dan tidak dapat digunakan di luar class

    //public adalah cara kita unutk menggunakan attribute ke luar maupun ke dalam

    // CONSTRUCTOR
    public function __construct($namaMobil, $merkMobil, $warnaMobil, $kecepatanMobil, $kategoriMobil)
    {
        $this->namaMobil = $namaMobil;
        $this->merkMobil = $merkMobil;
        $this->warnaMobil = $warnaMobil;
        $this->kecepatanMobil = $kecepatanMobil;
        $this->kategoriMobil = $kategoriMobil;
    }

    // GETTER

    public function getNamaMobil()
    {
        return $this->namaMobil;
    }
    public function getMerkMobil()
    {
        return $this->merkMobil;
    }

    public function getWarnaMobil()
    {
        return $this->warnaMobil;
    }

    public function getKecepatanMobil()
    {
        return $this->kecepatanMobil;
    }

    // SETTER

    public function setNamaMobil($namaMobil)
    {
        $this->namaMobil = $namaMobil;
    }

    public function setMerkMobil($merkMobil)
    {
        $this->merkMobil = $merkMobil;
    }

    public function setWarnaMobil($warnaMobil)
    {
        $this->warnaMobil = $warnaMobil;
    }

    public function setKecepatanMobil($kecepatanMobil)
    {
        $this->kecepatanMobil = $kecepatanMobil;
    }

    // METHOD
    public function cetakMobil()
    {
        return "Mobil " . $this->namaMobil . " sedang ngebut kecepatan sebesar " . $this->kecepatanMobil + 100 . " km/jam.";
    }
};

//INHERITENCE = KETURUNAN SEBUAH HIRERARKI CLASS
class MobilSport extends Mobil
{
    public $turbo = true;

    public function mobilNgebut()
    {
        return $this->cetakMobil() . " Dan turbo sedang aktif!";
    }
};

class MobilClassic extends Mobil
{
    public $turbo = false;

    public function mobilNgebut()
    {
        return $this->cetakMobil() . " Dan harganya sangat mahal!";
    }
};


// $VARIABLE = OBJECT
$mobilLamborghini = new MobilSport("Lamborghini", "X-3", "Merah", 200, "Sport");

$mobilLamborghini->setNamaMobil("Alphard");
echo $mobilLamborghini->getNamaMobil();


// VISIBILITY
// public: dapat digunakan di mana saja, bahkan di luar class
// protected: hanya dapat di gunakan di dalam sebuah sebuah class beserta fungsinya
// private: hanya dapat di gunakan di dalam sebuah class tertentu saja


// Static Keyword

class ContohStatic
{
    public static $namaStatic = "Contoh Static";

    public static function tampilkanStatic() {
        return "Ini adalah contoh static keyword";
    }
}

echo ContohStatic::$namaStatic; // Contoh cara mengakses static class