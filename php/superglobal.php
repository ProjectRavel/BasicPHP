<?php

/* --------------- SuperGlobals --------------------------------
// built in variables that are always avlable in all scopers

/*
$_GET = contains information about variables passed through a URL or a form
$_POST = contains information about variables passed through a form
$_COOKIE = Contains information about variables passed through a cookie
$_SESSION = Contains information about variables passed through a session
$_SERVER = Contains information about the server environment
$_ENV = Contains information about the environment variables
$_FILES = contains information about filed uploaded to the script
$_REQUEST = contains information about variables passed through a form of URL 
*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>

<body>
    <ul>
        <li>Host: <?php echo $_SERVER['HTTP_HOST']; ?></li>
        <li>Document Root: <?php echo $_SERVER['DOCUMENT_ROOT']; ?></li>
        <li>System Root: <?php echo $_SERVER['SystemRoot']; ?></li>
        <li>Server Name: <?php echo $_SERVER['SERVER_NAME']; ?></li>
        <li>Server Port: <?php echo $_SERVER['SERVER_PORT']; ?></li>
        <li>Current File Dir: <?php echo $_SERVER['PHP_SELF']; ?></li>
        <li>Request URI: <?php echo $_SERVER['REQUEST_URI']; ?></li>
        <li>Server Software: <?php echo $_SERVER['SERVER_SOFTWARE']; ?></li>
        <li>Client Info: <?php echo $_SERVER['HTTP_USER_AGENT']; ?></li>
        <li>Remote Address: <?php echo $_SERVER['REMOTE_ADDR']; ?></li>
        <li>Remote Port: <?php echo $_SERVER['REMOTE_PORT']; ?></li>
    </ul>
</body>

</html>