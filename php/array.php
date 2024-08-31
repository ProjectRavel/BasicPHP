<?php

    // $db_cashier = [
    //     "user" => ["vels", "pelski"],
    //     "password" => ["123", "321"],
    //     "cashier_id" => [1.1, 1.2],
    // ];

    // foreach ($db_cashier as $key => $value){
    //     foreach ($value as $val){
    //         echo $key . ": " . $val . "<br/>";
    //     }
    // };


    $fruits = ["apple", "orange", "bluberry"];
    $account_db = [
        'first_name' => ['rafael', 'pandu'],
        'last_name' => ['sumanti'],
        'email' => ['rafaelsumanti01@gmail.com', 'rafaelsumanti02@gmail.com'],
    ];
foreach ($account_db as $key => $value){
    foreach ($value as $val){
        echo $key. ": ". $val. "\n";
    }
}