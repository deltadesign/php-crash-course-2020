<?php

// Create array - same way as JS

$fruits = ["apple", "pear", "orange", "kiwi", "banana"]; // newer syntax

$names = array('Bob', 'James', 'Dave', 'Barry'); // older still widely used

// Print the whole array - use pre tags to print prettier. 

echo '<pre>';
var_dump($fruits);
echo '<pre>';

// Get element by index using bracket notaion $array[INDEX]

echo (isset($fruits[0]) ? $fruits[0] : '') . '</br>';

// Set element by index

$fruits[0] = "pineapple";

echo '<pre>';
var_dump($fruits);
echo '<pre>';

// Check if array has element at index 2

isset($fruits[2]);

if (isset($fruits[2])) {
    echo "hello";
}

// Append element

$fruits[] = "lime";

echo '<pre>';
var_dump($fruits);
echo '<pre>';

// Print the length of the array

echo count($fruits) . '</br>';

// Add element at the end of the array

array_push($fruits, "strawberry");

// Remove element from the end of the array

array_pop($fruits);

// Add element at the beginning of the array

array_unshift($fruits, "Melon");

// Remove element from the beginning of the array

array_shift($fruits);

// Split the string into an array

$str = "Carrots, Peas, Potatoes, Broccoli";

echo '<pre>';
var_dump(explode(",", $str));
echo '<pre>';

// Combine array elements into string

$strFruits = implode(", ", $fruits);

echo '<pre>';
echo $strFruits;
echo '<pre>';

// Check if element exist in the array

if (in_array("apple", $fruits)) {
    echo "Yes I have Apples";
} else {
    echo "NO I DON'T HAVE ANY APPLES";
}

echo '</br>';
// Search element index in the array

echo array_search('lime', $fruits);

// Merge two arrays

$veg = explode(", ", $str);

$fruveg = array_merge($veg, $fruits);

echo '<pre>';
var_dump($fruveg);
echo '<pre>';


//SPREAD OPERATOR

var_dump([...$fruits, ...$veg]);

// Sorting of array (Reverse order also)

sort($fruits); // sorts the array in A-Z order - beware of uppercase letters!
rsort($fruits); // sorts the array in Z-A order - beware of uppercase letters!

echo '<pre>';
var_dump($fruits);
echo '<pre>';


// https://www.php.net/manual/en/ref.array.php
