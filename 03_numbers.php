<?php

// Declaring numbers

$a = 5;
$b = 4;
$c = 1.2;

// Arithmetic operations uses BODMAS - brackets/Operators/Multiplication/Addition/Subtraction

echo $a + $b . '</br>'; // will be equal to 9;
echo $a + $b * $c . '</br>'; // will be equal to (b * c) + a;

echo $a - $b . '</br>'; // Subtract
echo $a * $b . '</br>'; // multiply
echo $a / $b . '</br>'; // division
echo $a % $b . '</br>'; //remainder / modulus

// Assignment with math operators

// $a = $a + $b; // CAN BE WRITTEN AS: 

// $a += $b; // $a = $a + $b;
// $a -= $b; // $a = $a - $b;
// $a *= $b; // $a = $a * $b;
// $a /= $b; // $a = $a / $b;
// $a %= $b; // $a = $a % $b;

echo $a . '</br>';

// Increment operator

echo $a++ . '</br>'; // increment $a by one - if used with another operator, $a is used / printed then incremented; $a = 5 now and 5 will show on the page, after printing $a will equal 6

echo ++$a . '</br>'; // increment $a by one - if used with another operator, $a is incremented / printed then used; $a = 7 now and 7 will show on the page

// Decrement operator

$a = 5;

echo $a-- . '</br>'; // decrement $a by one - if used with another operator, $a is used / printed then decremented; $a = 5 now and 5 will show on the page, after printing $a will equal 4

echo --$a . '</br>'; // decrement $a by one - if used with another operator, $a is incremented / printed then used; $a = 3 now and 3 will show on the page

// Number checking functions

echo (is_float($a) ? 'true' : 'false') . '</br>';
echo (is_float(1.25) ? 'true' : 'false') . '</br>';
echo (is_int($b) ? 'true' : 'false') . '</br>';
echo (is_integer($b) ? 'true' : 'false') . '</br>';
echo (is_numeric("3.2") ? 'true' : 'false') . '</br>'; // is_numeric reads the string value and evaultes if it is a numeric value

// Conversion

$strNum = "12.34";

$num = (int)$strNum; // converts to an integer appears as a rounded number
$num = intval($strNum); // converts to an integer appears as a rounded number
$num = (float)$strNum; // converts to a float / double

echo '<pre>';
var_dump($num);
echo '<pre>';

// Number functions

echo "abs(-15) "   . abs(-15)   . '</br>';   // returns the absolute value
echo "pow(2, 3) "  . pow(2, 3)  . '</br>';  // base, exponential
echo "sqrt(16) "   . sqrt(16)   . '</br>';   // Square Root
echo "max(2, 3) "  . max(2, 3)  . '</br>';  // Max value
echo "min(2, 3) "  . min(2, 3)  . '</br>';  // Minimum Value
echo "round(2.4) " . round(2.4) . '</br>'; // round regular
echo "round(2.6) " . round(2.6) . '</br>'; // round regular
echo "floor(2.6) " . floor(2.6) . '</br>'; // Round Down
echo "ceil(2.4) "  . ceil(2.4)  . '</br>';  // Round Up

// Formatting numbers

$example = 123456789.12345;

// number_format(number, decimals, decimal_point, thousands_separator);

echo number_format($example, 2,) . '</br>';

// https://www.php.net/manual/en/ref.math.php
