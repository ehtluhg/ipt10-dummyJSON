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
$options = [
    'products' => [
        'title' => 'value';
        'price' => 'value';
        'category' => 'value';
        'description' => 'value';
       ]
   ]; 
$response = $client->post("/post", $options);

echo $response->getBody();
$response = $client->get('https://dummyjson.com/products/add/' . $id);
$code = $response->getStatusCode();
$body = $response->getBody();
$products = json_decode($body, true);
?>