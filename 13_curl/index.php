<?php

//cURL - Client URL Library

$url = 'https://jsonplaceholder.typicode.com/users';
// Sample example to get data.

$resource = curl_init($url); // initialise cURL on the above url and return it as a resource;

curl_setopt($resource, CURLOPT_RETURNTRANSFER, true); // sets the option of RETURNTRANSFER to be true;

$result = curl_exec($resource); // executes the CuRL statement and gets the result.
// Get response info & status code
$curlInfo = curl_getinfo($resource); // returns the information on the request

$http_code = curl_getinfo($resource, CURLINFO_HTTP_CODE); // use a second argument t get a specific piece of information

echo '<pre>';
var_dump($http_code);
echo '<pre>';

curl_close($resource); // closes the CURL resource - can no longer be used beyond this point!


// set_opt_array - set up the request using an array of options
// Post request

$resource = curl_init(); // initialise a cURL

$user = [
    'name'      => 'David',
    'username'  => 'David189',
    'email'     => 'David@email.com'
];

curl_setopt_array($resource, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => ['content-type: application/json'], // state the type of data being sent
    CURLOPT_POSTFIELDS => json_encode($user)
]);

$result = curl_exec($resource);
curl_close($resource);

echo $result;
