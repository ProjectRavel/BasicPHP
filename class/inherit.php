<?php

class OrangTua
{

    public $ayah = "ayah";
    public $ibu = "ibu";

    public function __construct($ayah, $ibu)
    {
        $this->ayah = $ayah;
        $this->ibu = $ibu;
    }

    public function tampilkanOrangTua()
    {
        echo "Ayah: " . $this->ayah . "\n";
        echo "Ibu: " . $this->ibu . "\n";
    }
}

class Anak extends OrangTua
{
    public $anak = "Anak";

    public function __construct($anak, $ayah, $ibu)
    {
        $this->anak = $anak;
        parent::__construct($ayah, $ibu);
    }

    public function tampilkanAnak()
    {
        echo "Anak: " . $this->anak . "\n";
    }
}

$melodi = new Anak("Melodi", "Rafael", "SiapaAja");

$melodi->tampilkanAnak();
$melodi->tampilkanOrangTua();
