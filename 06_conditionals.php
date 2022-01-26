<?php

$age = 20;
$salary = 300000;

// Sample if

if ($age > 19) {
    echo "I AM OLDER THAN 20" . "</br>";
}

// Without circle braces if only one returning statement

if ($age < 40) echo "I AM UNDER 40" . "</br>";

// Sample if-else

if ($salary > 25000) {
    echo "whoa" . "</br>";
} else {
    echo "Low paid" . "</br>";
}

// Ternary if

echo ($age < 18 ? "no drinking" : "Boozey do") . "</br>";

// Short ternary - need to look at this somemore!! essentially if the variable is not set do this!

// echo $age ?: "Hello World" . "</br>"; 

// Null coalescing operator

$age = $age ?? "unknown" . "</br>";

// echo $age . "</br>";

// switch

$age = 19;

switch ($age) {

    case 10:
        echo "It's 10 or greater but less than 20";
        break;

    case 20:
        echo "It's 20 or greater";
        break;

    default:
        echo "what";
        break;
}
