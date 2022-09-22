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
        'title' => 'iPhone 11'
       ]
   ]; 

$response = $client->put('https://dummyjson.com/products/1', $update);
$code = $response->getStatusCode();
$body = $response->getBody();
$update = json_decode($body, true);
var_dump($update)
?>