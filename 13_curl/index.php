<?php

//cURL - Client URL Library

$url = 'https://jsonplaceholder.typicode.com/users';
// Sample example to get data.

$resource = curl_init($url); // initialise cURL on the above url and return it as a resource;

curl_setopt($resource, CURLOPT_RETURNTRANSFER, true); // sets the option of RETURNTRANSFER to be true;

$result = curl_exec($resource); // executes the CuRL statement and gets the result.

$curlInfo = curl_getinfo($resource); // returns the information on the request

$http_code = curl_getinfo($resource, CURLINFO_HTTP_CODE); // use a second argument t get a specific piece of information

echo '<pre>';
var_dump($http_code);
echo '<pre>';

curl_close($resource); // closes the CURL resource - can no longer be used beyond this point!

// Get response status code

// set_opt_array

// Post request