<?php

session_start();


$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION['usernames'] = $username;
$_SESSION['password'] = $password;

if (isset($_SESSION['usernames']) and isset($_SESSION['password'])) {
    echo "Berhasil Login Cuy!";
    echo "<a href=\"logout.php\">Logout</a>";
} else {
    echo "Gagal Login!";
}
