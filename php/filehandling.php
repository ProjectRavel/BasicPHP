<?php

$file = 'extras/nama.txt';

if (file_exists($file)){
    $handle = fopen($file, 'r');
    $content = fread($handle, filesize($file));
    fclose($handle);
    echo $content;
} else {
    $handle = fopen($file, 'w');
    $content = 'Brad'. PHP_EOL . 'Sara' . PHP_EOL . 'Mike';
    fwrite($handle, $content);
    fclose($handle);
}