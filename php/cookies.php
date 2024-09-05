<?php

/* ----------------- Cookies ------------------ */

setcookie('name', 'brad', time() + 86400 * 30);
setcookie('password', 'admin123', time() + 86400 * 30);


if(isset($_COOKIE['name'])){
    echo $_COOKIE['name'];
    echo "<br>";
    echo $_COOKIE['password'];
}