<?php

// Function which prints "Hello I am Zura"

function hello() // function declaration name and parentheses
{
    echo "Hello I am Dan" . "</br>"; // code block to execute
}

hello(); // execute function

// Function with argument

function myFunc($a, $b) // this function has arguments passed to it, these arguments can be used just like variables. . 
{
    return "Hello $a how are you this fine $b?" . "</br>";
}

echo myFunc('Daniel', 'Thursday');
echo myFunc('Kim', 'Thursday');


// Create sum of two functions

function sumUp($a, $b)
{
    return $a + $b;
}

echo sumUp(2, 3) . "</br>";

// Create function to sum all numbers using ...$nums

function sumAll(...$nums)
{
    $total = 0;

    foreach ($nums as $num) {
        $total += $num;
    }

    return $total;
}

echo sumAll(1, 2, 3, 4, 5) . "</br>"; //15

// Arrow functions

function sumz(...$nums)
{
    return array_reduce($nums, fn ($acc, $n) => $acc + $n);
}

echo sumz(1, 5, 9, 8); // 23
