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
$response = $client->get('https://dummyjson.com/products/' . $id);
$code = $response->getStatusCode();
$body = $response->getBody();
$products = json_decode($body, true);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IPT10 - Dummy JSON REST API Programming</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
  <div class="card mb-3 mx-auto" style="max-width: 900px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?php echo $products['thumbnail']?>" class="img-fluid rounded-start" alt="..." style="height: 270px;">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h4 class="card-title"><?php echo $products['title']; ?></h4>
        <h5 class="card-title">$<?php echo $products['price']; ?></h5>
        <h6 class="card-title"><?php echo $products['category']; ?></h6>
        <p class="card-text"><?php echo $products['description']; ?></p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        <a href="#" class="btn btn-primary">Add to Cart</a>
      </div>
    </div>
  </div>
</div>
  </body>
  </html>