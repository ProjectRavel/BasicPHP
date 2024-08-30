<?php

class Person{
    //name, age, birthdate, hoby
    // public : property dapat diakses dari luar class
    // private : property tidak dapat di akses dari luar class hanya berlaku secara internal
    // protected : property dapat diakses hanya di dalam class dan turunan class tersebut
    public $name;
    public $age;
    public $birthdate;
    public $hobbies;

    // Method constructor
    public function __construct($nama, $age, $birthdate, $hobbies){
        $this->name = $nama;
        $this->age = $age;
        $this->birthdate = $birthdate;
        $this->hobbies = $hobbies;
    }

    public function printPerson(){
        echo "Name: ". $this->name. "\n";
        echo "Age: ". $this->age. "\n";
        echo "Birthdate: ". $this->birthdate. "\n";
        echo "Hobbies: ". $this->hobbies. "\n";
        echo "\n";
    }
};

$rafael = new Person("rafael", 15, "2024", "coding");
$cindy = new Person("cindy", 22, "2024", "IoT");
$msbreewc = new Person("hayo", 24, "2024", "buat video");
$rafael->printPerson();
$cindy->printPerson();
$msbreewc->printPerson();
