<?php

//Jika Belum Login

if (isset($_SESSION['log'])) {
} else {
    header('location:login.php');

}
