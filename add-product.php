<?php
require "vendor/autoload.php";

// Initialize Guzzle HTTP Client integration with Dummy JSON
use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

// Retrieving the Product ID
$id = $_GET['product_id'];

// Handling HTTP Response
$item = [
    'products' => [
        'title' => 'value',
        'category' => 'value'
       ]
   ]; 

$response = $client->get('https://dummyjson.com/products/add', $item);
$code = $response->getStatusCode();
$body = $response->getBody();
$item = json_decode($body, true);
var_dump($item)
?>