<?php

$umur = 19;

// if($umur <= 15){
//     echo "Umur anda belum Cukup!";
// }else{
//     echo "Umur anda udah cukup!";
// }

switch ($umur) {
    case $umur <= 15:
        echo "Umur anda belum Cukup!";
        break;
    default:
        echo "Umur anda udah cukup!";
        break;
};
