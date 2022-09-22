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
$response = $client->get('https://dummyjson.com/users/' . $id);
$code = $response->getStatusCode();
$body = $response->getBody();
$users = json_decode($body, true);
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
    <div class="card mb-3 mx-auto mt-5" style="max-width: 900px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?php echo $users['image'] ?>" class="img-fluid rounded-start" alt="..." style="height: 270px;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title"><?php echo $users['firstName']; ?> <?php echo $users['lastName']; ?></h4>
                    <h5 class="card-title"><?php echo $users['age']; ?> years old</h5>
                    <h6 class="card-title">Gender: <?php echo $users['gender']; ?></h6>
                    <ul class="list-group mt-3 mb-3" style="width: 500px;">
                        <li class="list-group-item">Email Address: <?php echo $users['email']; ?></li>
                        <li class="list-group-item">Phone: <?php echo $users['phone']; ?></li>
                        <li class="list-group-item">Blood Type: <?php echo $users['bloodGroup']; ?></li>
                        <li class="list-group-item">Height: <?php echo $users['height']; ?>cm</li>
                        <li class="list-group-item">Weight: <?php echo $users['weight']; ?>kg</li>
                        <li class="list-group-item">Eye Color: <?php echo $users['eyeColor']; ?></li>
                    </ul>
                    <a href="#" class="btn btn-dark">Add User</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>