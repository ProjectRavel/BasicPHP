<?php

// $age = 321;

// if($age >= 18){
//     echo 'Welcome to CornHub';
// }else{
//     echo 'Your age is not 18+';
// }

$post = ["Post 1"];

// if(!empty($post)){
//     echo "Post Available";
// }else{
//     echo "No post available";
// }

// echo !empty($post) ? "Post Available" : "No post available";
$firstpost = $post[0] ?? "No post available";

echo $firstpost;