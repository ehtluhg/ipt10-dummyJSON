<?php
require "vendor/autoload.php";

// Initialize Guzzle HTTP Client integration with Dummy JSON
use GuzzleHttp\Client;

$client = new Client([
  'base_uri' => 'https://dummyjson.com/'
]);

// Handling HTTP Response
$response = $client->get('https://dummyjson.com/users');
$code = $response->getStatusCode();
$body = $response->getBody();
$users = json_decode($body, true);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Users Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
  <div class="container text-center mt-5 mb-5">
    <div class="row gap-5 mx-auto">

      <?php
      foreach ($users as $user) {
        foreach ($user as $objects) {
      ?>

          <div class="card" style="width: 18rem; height: 31rem;">
            <img src="<?php echo $objects['image'] ?>" class="card-img-top" alt="..." style="height: 200px;">
            <div class="card-body">
              <h4 class="card-title"><?php echo $objects['firstName']; ?> <?php echo $objects['lastName']; ?></h4>
              <h5 class="card-title"><?php echo $objects['age']; ?> years old</h5>
              <h6 class="card-title"><?php echo $objects['gender']; ?></h6>
              <p class="card-text"><?php echo $objects['email']; ?></p>
              <p class="card-text"><?php echo $objects['phone']; ?></p>
              <p class="card-text"><?php echo $objects['bloodGroup']; ?></p>
              <a href="single-user.php?user_id=<?php echo $objects['id'] ?>" class="btn btn-dark">More Details</a>
            </div>
          </div>

      <?php
        }
      }
      ?>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>