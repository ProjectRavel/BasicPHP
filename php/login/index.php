<?php
include 'database.php';
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
</head>

<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <label for="username">Username: <input type="text" name="username" /></label>
        <label for="password">Password: <input type="password" name="password" /></label>
        <input type="submit" name="submit" value="Register" />
    </form>

    <a href="login.php">Already have an account? Login here</a>
</body>

</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($username) || empty($password)) {
        echo 'Username and password are required';
    } else {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $date_now = date('Y-m-d H:i:s');
        $sql = "INSERT INTO businessdb (user, password, reg_date) VALUES ('$username', '$password_hash', '$date_now')";
        try {
            $result = $ conn->query($sql);
            echo "You are now Registered";
        } catch (mysqli_sql_exception) {
            echo "Name already taken!";
        }
    }
}

?>