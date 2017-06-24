<?php include('includes/database.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $site_data['title']; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/album.css" rel="stylesheet">
  </head>

  <body>

  <div class="collapse bg-inverse" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 py-4">
            <h4 class="text-white">About</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel bibendum dolor, vel fringilla erat. Nunc accumsan sem sit amet tempor fringilla. Sed eu interdum mauris. Praesent sed blandit odio, in ultrices dolor. Nam pretium tortor ipsum, sit amet gravida mauris consectetur eget. Nunc eu malesuada mi, eget sollicitudin urna. Donec suscipit malesuada ullamcorper. Suspendisse maximus orci in purus faucibus tincidunt. Cras sed sagittis ligula.</p>
          </div>
          <div class="col-sm-4 py-4">
            <h4 class="text-white">Pages</h4>
            <ul class="list-unstyled">
              <li><a href="./" class="text-white">Home</a></li>
              <li><a href="item-list.php" class="text-white">Products</a></li>
              <li><a href="#" class="text-white">Login</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-inverse bg-inverse">
      <div class="container d-flex justify-content-between">
        <a href="#" class="navbar-brand"><?php echo $site_data['title']; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
