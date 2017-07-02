<?php
session_start();
unset($_SESSION['error']);

include('../../lib/meekrodb.2.3.class.php');

//check if there is a user session -> user that is logged in
if(!isset($_SESSION['admindata'])){
  echo '<script>window.location.href = "index.php";</script>';
  exit;
}

//get site info from database
$site_data = DB::queryFirstRow("SELECT * FROM tb_site_info");



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
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/styles.css" rel="stylesheet">
  </head>

  <body>

    <div class="navbar navbar-inverse bg-inverse">
      <div class="container d-flex justify-content-between">
        <a href="/icct-bazaar" class="navbar-brand"><?php echo $site_data['title']; ?></a>
        
      </div>
    </div>