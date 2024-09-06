<?php

$password = "pizza123";

$hash = password_hash($password, PASSWORD_DEFAULT);

if(password_verify("asep", $hash)){
    echo "Login Berhasil";
}else{
    echo "Login Gagal";
}