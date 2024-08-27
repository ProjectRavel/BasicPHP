<?php

function luassegitiga($alas, $tinggi){
    $luas = 0.5 * $alas * $tinggi;
    return $luas;
};

function sum(...$number){
    $sum = 0;
    foreach($number as $value){
        $sum += $value;
    }
    return $sum;
}



echo luassegitiga(5, 3);
 echo "<br>";
echo sum(20, 30)
?>