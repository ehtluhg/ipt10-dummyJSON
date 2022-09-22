<?php
require "vendor/autoload.php";

// Initialize Guzzle HTTP Client integration with Dummy JSON
use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

// Retrieving the Product ID
$id = $_GET['user_id'];

// Handling HTTP Response
$user = [
    'json' => [
        'firstName' => 'Maeve',
        'lastName' => 'Wiley',
        'age' => 125
       ]
   ]; 

$response = $client->post('https://dummyjson.com/users/add', $user);
$code = $response->getStatusCode();
$body = $response->getBody();
$users = json_decode($body, true);
var_dump($users)
?>