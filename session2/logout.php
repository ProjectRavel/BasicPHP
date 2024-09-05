<?php
    session_start();
    session_destroy();
    header('Location: /PHP/session2/login.php');