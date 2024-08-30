<?php

    $db_cashier = [
        "user" => ["vels", "pelski"],
        "password" => ["123", "321"],
        "cashier_id" => [1.1, 1.2],
    ];

    foreach ($db_cashier as $key => $value){
        foreach ($value as $val){
            echo $key . ": " . $val . "<br/>";
        }
    };
?>  