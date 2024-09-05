<?php

function inverse($x){
    if(!$x){
        throw new Exception('Division by Zero');
    }
    return 1/$x;
}

try{
    echo inverse(0);
} catch (Exception $e) {
    echo "Ada error dikit: ", $e->getmessage(), '';
} finally {
    echo 'Second Finally';
}