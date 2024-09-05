<?php
session_start();

// $_GET AND $_POST


if (isset($_POST['submit'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    if ($username == 'rafael' && $password == '123') {
        $_SESSION['username'] = $username;
        header('Location: /PHP/session2/dashboard.php');
        echo "login";
    } else {
        echo 'Incorrect Login';
    }
}
?>

<form action="" method="post">
    <div>
        <label for="username">Name: </label>
        <input type="text" name="username" id="username">
        <br>
        <br>
        <label for="password">Password: </label>
        <input type="text" name="password" id="password">
        <br>
        <input type="submit" value="submit" name="submit">
    </div>
</form>