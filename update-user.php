<?php
require "vendor/autoload.php";

// Initialize Guzzle HTTP Client integration with Dummy JSON
use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

// Handling HTTP Response
$update = [
    'json' => [
        'firstName' => 'Milburn'
       ]
   ]; 

$response = $client->put('https://dummyjson.com/users/1', $update);
$code = $response->getStatusCode();
$body = $response->getBody();
$user = json_decode($body, true);
var_dump($user)
?>