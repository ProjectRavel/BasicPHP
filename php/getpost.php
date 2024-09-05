<?php

// $_GET AND $_POST
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

if (isset($_POST['submit'])) {
    echo "Name: " . $name . "<br>";
    echo "Password: " . $password;
}


?>

<form action="" method="post">
    <div>
        <label for="name">Name: </label>
        <input type="text" name="name" id="name">
        <br>
        <br>
        <label for="password">Password: </label>
        <input type="text" name="password" id="password">
        <br>
        <input type="submit" value="submit" name="submit">
    </div>
</form>