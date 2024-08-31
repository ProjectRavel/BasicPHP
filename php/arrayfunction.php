<?php

// $fruits = ['apple', 'banana', 'watermelon', 'Durian'];

// $fruits[] = 'grape';
// array_push($fruits, 'Blueberry');
// array_unshift($fruits, 'mango');

// // Remove from array
// array_pop($fruits);
// array_shift($fruits);
// unset($fruits[1]);

// $chunked_array = array_chunk($fruits, 2);

// print_r($chunked_array);

// print_r($fruits);

// $arr1 = [1,2,3];
// $arr2 = [4,5,6];

// $arr3 = array_merge($arr1, $arr2);
// $arr4 = [...$arr1, ...$arr2];

// print_r($arr4);

$a = ['green', 'yellow', 'red'];
$b = ['avocado', 'banana', 'apple'];

$c = array_combine($a, $b);
$keys = array_keys($c);
$values = array_values($c);

$flipped = array_flip($c);

$numbers = range(1, 20);

// print_r($number);

// $newnumber = array_map(function($number) {
//     return "Number: " . $number;
// }, $numbers);

// print_r($newnumber);

// $less10 = array_filter($numbers, function($number) {
//     return $number <= 10;
// });

// print_r($less10);

$arraySum = array_reduce($numbers, function($carry, $number) {
    return $carry + $number;
});

echo $arraySum;