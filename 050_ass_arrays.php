<?php

// ============================================
// Associative arrays
// ============================================

// Create an associative array

$person = [

    "name" => "Dan",
    "age" => 40,
    "location" => "Sheffield",
    "job" => "Jr Developer",
    "hobbies" => ["running", "video games", "skating"]

];

// Get element by key
// print_r($person); // alternative to var_dump

echo $person['name'] . '</br>';
echo $person['age'] . '</br>';
echo $person['location'] . '</br>';
echo $person['job'] . '</br>';

// Set element by key

$person["partner"] = 'Kim';

// Null coalescing assignment operator. Since PHP 7.4 

$person['area'] ??= 'unknown'; // if the value is not set use the value after ??=

// Check if array has specific key
echo (array_key_exists("name", $person) ? "true" : "false");

// Print the keys of the array
array_keys($person);

echo '<pre>';
var_dump(array_keys($person));
echo '<pre>';
// Print the values of the array

array_values($person);

echo '<pre>';
var_dump(array_values($person));
echo '<pre>';

// Sorting associative arrays by values, by keys
ksort($person); // keysort
asort($person); // sorts by values / attributes

// Two dimensional arrays

$todos = [
    ["title" => "todo 1", "status" => "complete"],
    ["title" => "todo 1", "status" => "complete"],
];

echo '<pre>';
var_dump($todos);
echo '<pre>';
