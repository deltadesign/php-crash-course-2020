<?php

// Print current date

$today = date("d-M-Y H:i:s");
echo $today . "</br>";

// Print yesterday

$yesterday = date("d . m . y - H:i:s", time() - 3600 * 24);
echo $yesterday . "</br>";

// Different format: https://www.php.net/manual/en/function.date.php

echo date('F j y') . "</br>";

// Print current timestamp

echo time() . "</br>";

// Parse date: https://www.php.net/manual/en/function.date-parse.php

$dateParsed = date_parse("2022-10-12");

echo '<pre>';
var_dump($dateParsed);
echo '<pre>';

// Parse date from format: https://www.php.net/manual/en/function.date-parse-from-format.php

$dateFormat = "February 1 2022 12:00:30";

$parsedDateFormat = date_parse_from_format("F j Y H:i:s", $dateFormat); // parses a date into an array - from a specific format

echo '<pre>';
var_dump($parsedDateFormat);
echo '<pre>';
