<?php
session_start();
unset($_SESSION['error']);

include('../lib/meekrodb.2.3.class.php');

//get site info from database
$site_data = DB::queryFirstRow("SELECT * FROM tb_site_info");


//get user credentials
if(isset($_POST['login'])){

  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $admindata = DB::queryFirstRow("SELECT * FROM tb_users WHERE email=%s AND password=%s", $email, $password);

  if($admindata){
    $_SESSION['admindata'] = $admindata;
    echo '<script>window.location.href = "dashboard.php";</script>';
  }else{
    $_SESSION['error'] = "Invalid username and password combination";
  }

}


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
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/styles.css" rel="stylesheet">

    <style type="text/css">
	body{
			background: #292b2c; 
			color:#fff;
		}
	</style>

  </head>

  <body>


		<!--main content-->
		<div id="main-content">
		      
		      <div class="container">
		      	<div class="row view-header" style="text-align:center;margin:3em 0;">
		          <div class="col-sm-12">
		            <h1>
		              <?php echo $site_data['title']; ?>
		            </h1>
		            <small style="font-size:20px">Admin Panel</small><br />

		            <?php
		              if(isset($_SESSION['error'])){
		                echo '<span class="error-wrap" style="font-size:16px">' . $_SESSION['error'] . '</span>';
		              }
		            ?>
		          </div>
		        </div>

		        
		        <div class="row">
		        	<div class="col-sm-3"></div>
		        	<div class="col-sm-6" style="text-align:center">
			        	<!--login form-->
			            

				      <form name="admin-form" class="form-signin" method="POST" style="text-align:left">
				        <label for="email" class="sr-only">Email address</label>
				        <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required="" autofocus="">
				        <label for="password" class="sr-only">Password</label>
				        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
				        <div class="checkbox">
				          <label>
				            <input type="checkbox" value="remember-me"> Remember me
				          </label>
				        </div>
				        <input type="submit" name="login" class="btn btn-lg btn-primary btn-block"  value="Login">
				      </form>
				    </div>
				    <div class="col-sm-3"></div>
			  </div>

			</div>
		</div>