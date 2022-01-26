<?php

// Create simple string

$name = "Dave";

// String concatenation / interpolation

$string = 'Hello ' . $name; // single quotations;
$string2 = "Hello $name"; // double quotation marks allows easy interpolation;

echo $string . '</br>';
echo $string2 . '</br>';

// String functions

$myStr = "     Hello World     ";

echo "1 - strlen "         . strlen($myStr)         . '</br>'; // prints the length of the string including white spaces NOTE: html ignores white spaces. 
echo "2 - trim "           . trim($myStr)           . '</br>'; // trims whitespaces on both sides
echo "3 - ltrim "          . ltrim($myStr)          . '</br>'; // left trim
echo "4 - rtrim "          . rtrim($myStr)          . '</br>'; // right trim
echo "5 - str_word_count " . str_word_count($myStr) . '</br>'; // get the word count of a string
echo "6 - strrev "         . strrev($myStr)         . '</br>'; // reverses the string
echo "7 - strtoupper "     . strtoupper($myStr)     . '</br>'; // sets all characters to upper case
echo "8 - strtolower "     . strtolower($myStr)     . '</br>'; // sets all characters to lower case
echo "9 - ucfirst "        . ucfirst("hello world") . '</br>'; // sets first character to uppercase on first word
echo "10 - lcfirst "       . lcfirst("Hello World") . '</br>'; // sets first character to lower case on first word
echo "11 - ucwords "       . ucwords("hello world") . '</br>'; // sets first character on all words to uppercase
echo "12 - strpos "        . strpos($myStr, 'World') . '</br>'; //  returns the starting position of the target word - case sensitive!
echo "13 - stripos "       . stripos($myStr, 'world') . '</br>'; //  returns the starting position of the target word - case INsensitive!
echo "14 - substr "        . substr($myStr, 11, 2)     . '</br>'; // create a substring. substr(string, target, offset);
echo "15 - str_replace "   . str_replace('World', 'PHP', $myStr)     . '</br>'; // replace a word in a string str_replace(TARGET_WORD, NEW_VALUE, TARGET_STRING) - case sensitive
echo "15 - str_ireplace "   . str_ireplace('world', 'PHP', $myStr)     . '</br>'; // replace a word in a string str_replace(TARGET_WORD, NEW_VALUE, TARGET_STRING) - case INsensitive


// Multiline text and line breaks

$longtext = "Hello my name is Dan
            I work in Kelham Island
            I was born in <strong>Sheffield</strong>";

echo nl2br($longtext) . '</br>'; // nl2bt = NEW LINE TO LINE BREAK - creates a new line where a new line starts

echo htmlentities($longtext) . '</br>'; // prints out the html tags contained in the string

echo nl2br(htmlentities($longtext)) . '</br>'; // prints out the html tags contained in the string and preserves line breaks.

echo html_entity_decode('&lt;b&gt;DAN&lt;/b&gt;'); // prints html from entity codes

// Multiline text and reserve html tags

// https://www.php.net/manual/en/ref.strings.php