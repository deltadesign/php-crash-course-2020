<?php

// while

$i = 0; // Loop with $counter BEWARE INFINITE LOOPS

while ($i < 5) {
    echo "hello" . "</br>";
    $i++;

    if ($i == 3) break;
}

// do - while : will do an action once - then check the condition

do {
    echo $i . "</br>";
    $i++;
} while ($i < 5);

// for iterates through a string / array

$arr = [1, 2, 3, 4, 5];

for ($i = 0; $i < count($arr); $i++) {
    echo $i . " for looped</br>";
}

// foreach commits an action on each item in array. 

$fruits = ["apple", "pear", "orange", "kiwi", "banana"];

foreach ($fruits as $index => $fruit) {
    echo "$index - $fruit";
    echo '</br>';
}

// Iterate Over associative array.

$person = [

    "name" => "Dan",
    "age" => 40,
    "location" => "Sheffield",
    "job" => "Jr Developer",
    "hobbies" => ["running", "video games", "skating"]

];


foreach ($person as $key => $value) {
    $type = gettype($value);
    if ($type != "array") {
        echo "$key: $value" . "<br>";
    } else {
        echo "$key: " . implode(" ,", $value);
    }
}
