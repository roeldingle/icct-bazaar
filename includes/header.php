<?php
session_start();

include('lib/meekrodb.2.3.class.php');

//get site info from database
$site_data = DB::queryFirstRow("SELECT * FROM tb_site_info");

//get item categories
$item_categories = DB::query("SELECT * FROM tb_item_category"); 

?>


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

          <div class="col-sm-4 py-4">
            <h4 class="text-white">About</h4>
            <p class="text-muted">An ECommerce Website Design to help the Students of ICCT Binangonan Campus</p>
          </div>
          <div class="col-sm-4 py-4">
            <h4 class="text-white">Categories</h4>
            <ul class="list-unstyled">

              <!--loop category-->
              <?php foreach($item_categories as $key=>$category){ ?>
              <li><a href="category.php?name=<?php echo $category['name']; ?>" class="text-white"><?php echo $category['label']; ?></a></li>
              <?php } ?>
              <!--end loop category-->
            </ul>
          </div>

          <div class="col-sm-4 py-4">
            <h4 class="text-white">Sign-in your account</h4>
            <form name="login" class="login-form">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="pass" placeholder="Password"><br />
            <span class="text-white">Not yet a member? </span><a href="register.php" >Register</a>
            <input type="submit" name="login" class="btn btn-sm btn-primary"  style="float:right;margin-right:10%" value="Login">
            
            </form>
            
          </div>

        </div>
      </div>
    </div>
    <div class="navbar navbar-inverse bg-inverse">
      <div class="container d-flex justify-content-between">
        <a href="/icct-bazaar" class="navbar-brand"><?php echo $site_data['title']; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>


    <div class="container">
        <div class="row">
          <div class="col-sm-12 py-4" style="text-align:right">
              Welcome back Jaymie, 
              <a href="">Logout?</a>
          </div>
        </div>
    </div>
