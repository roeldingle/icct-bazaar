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

            <h4 class="text-white">Connect with us</h4>
            <span class="bg-social bg-social-fb"></span>
            <span class="bg-social bg-social-gp"></span>
            <span class="bg-social bg-social-tw"></span>
            <div style="height:15px"></div>

            
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
              
              <?php if(isset($_SESSION['user']) == false){ ?>
              <!-- Example split danger button -->
              <div class="btn-group">
                <button type="button" class="btn btn-primary">Welcome back, Jaymie</button>
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="profile.php">My Profile</a>
                  <a class="dropdown-item" href="mystuff.php">My Stuff</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Logout</a>
                </div>
              </div>
              <?php }else{ ?>

              <a href="register.php" class="btn btn-primary pull-right" style="float: right;">Start selling my stuff</a>


              <?php } ?>

          </div>
        </div>
    </div>
