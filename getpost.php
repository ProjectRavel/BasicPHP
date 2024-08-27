<?php

if(isset($_POST["nama"])){
    $nama = $_POST["nama"];
    echo "Nama saya adalah: " . $nama . "<br/>";
};

if(isset($_POST["password"])){
    $password = $_POST["password"];
    echo "Password anda: " . $password;
}

?>

<form action="getpost.php" method="POST">
    Nama: <input type="text" name="nama" />
    <br><br>
    Password: <input type="password" name="password" />
    <br>
    <input type="submit" / >
</form>