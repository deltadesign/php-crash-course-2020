<?php

// What is a variable : PHP is a loosley typed language - meaning you dont have to state the data type when you declare a variable


// Variable types

/* TYPES OF VARIABLE

    STRING
    INTEGER
    FLOAT / DOUBLE
    BOOLEAN
    NULL
    ARRAY
    OBJECT
    RESOURCE

*/

// Declare variables

$name = 'Thomas'; // type of string
$age  = 40;       // type of integer
$isMale = true;   // type of boolean
$height = 1.85;   // type of float / double
$salary = null;   // type of NULL

// Print the variables. Explain what is concatenation

echo $name . '</br>';
echo $age . '</br>';
echo $isMale . '</br>'; // when boolean is converted into string true = 1 , false = "";
echo $height . '</br>';
echo $salary . '</br>';

// Print types of the variables

echo gettype($name) . '</br>'; // string
echo gettype($age) . '</br>';   // integer
echo gettype($isMale) . '</br>';    // boolean
echo gettype($height) . '</br>';    // float / double
echo gettype($salary) . '</br>';    // NULL

// Print the whole variable

echo '<pre>';
var_dump($name, $height, $isMale, $salary, $age); // useful for printing out large amounts of data for debugging
echo '<pre>';

// Change the value of the variable

$name = 'Daniel'; // variable reassignment

// Variable checking functions

echo (is_string($name) ? 'true' : 'False') . '</br>';
echo (is_integer($age) ? 'true' : 'False') . '</br>';
echo (is_bool($isMale) ? 'true' : 'False') . '</br>';
echo (is_double($height) ? 'true' : 'False') . '</br>';

// Check if variable is defined - isset will check if the variable has a set value! it does nothing with the value - nor tell you the type.
$address;
echo (isset($name) ? 'true' : 'false') . '</br>';
echo (isset($address) ? 'true' : 'false') . '</br>';

// Constants - cannot be changed define('NAME', VALUE);

define('pi', 3.14);

echo pi . '</br>'; // NO NEED FOR THE SOLLAR SIGN

// Using PHP built-in constants already under the hood!

echo SORT_ASC . '</br>';
echo PHP_INT_MAX . '</br>';
echo PHP_INT_MIN . '</br>';
