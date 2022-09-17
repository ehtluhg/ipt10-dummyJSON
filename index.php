<?php
require "vendor/autoload.php";

// Initialize Guzzle HTTP Client integration with Dummy JSON
use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

// Handling HTTP Response
$response = $client->get('https://dummyjson.com/');
$code = $response->getStatusCode();
$body = $response->getBody();
var_dump($body);

// Send data using POST
$options = [
	'json' => [
		'key' => 'value'
	]
];
$response = $client->post('https://dummyjson.com/products/add', $options);
$code = $response->getStatusCode();
$body = $response->getBody();
var_dump($body);

// var_dump(json_decode($body));
// var_dump(json_decode($body, true));

// Send data using PUT
$options = [
	'json' => [
		'key' => 'value'
	]
];
$response = $client->put('https://dummyjson.com/products', $options);


// Sending DELETE request
$response = $client->delete('https://dummyjson.com/products');

