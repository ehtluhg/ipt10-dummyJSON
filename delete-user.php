<?php
require "vendor/autoload.php";

// Initialize Guzzle HTTP Client integration with Dummy JSON
use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

// Handling HTTP Response
$delete = [
    'json' => [
        'firstName' => 'Terry'
       ]
   ]; 

$response = $client->delete('https://dummyjson.com/users/1', $delete);
$code = $response->getStatusCode();
$body = $response->getBody();
$item = json_decode($body, true);
var_dump($item)
?>