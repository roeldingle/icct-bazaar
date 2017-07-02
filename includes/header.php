<?php
session_start();
unset($_SESSION['error']);

include('lib/meekrodb.2.3.class.php');

//get site info from database
$site_data = DB::queryFirstRow("SELECT * FROM tb_site_info");

//get item categories
$item_categories = DB::query("SELECT * FROM tb_item_category"); 

//get user credentials
if(isset($_POST['login'])){

  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $userdata = DB::queryFirstRow("SELECT * FROM tb_users WHERE email=%s AND password=%s", $email, $password);

  if($userdata){
    $_SESSION['userdata'] = $userdata;
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
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">
  </head>

  <body>

  <div class="collapse bg-inverse <?php echo isset($_SESSION['error']) ? 'show' : '' ; ?>" id="navbarHeader">
      <div class="container">
        <div class="row">

          <div class="col-sm-4 py-4">
            <h4 class="text-white">About</h4>
            <p class="text-muted">An ECommerce Website Design to help the Students of ICCT Binangonan Campus</p>
          </div>
          <div class="col-sm-5 py-4">
            <h4 class="text-white">Categories</h4>
            <ul class="list-unstyled">

              <!--loop category-->
              <?php foreach($item_categories as $key=>$category){ ?>
              <li><a href="category.php?id=<?php echo $category['id']; ?>" class="text-white"><?php echo $category['name']; ?></a></li>
              <?php } ?>
              <!--end loop category-->
            </ul>
          </div>

          <div class="col-sm-3 py-4">

            <h4 class="text-white">Connect with us</h4>
            <span class="bg-social bg-social-fb"></span>
            <span class="bg-social bg-social-gp"></span>
            <span class="bg-social bg-social-tw"></span>
            <div style="height:15px"></div>


            <!--dpnt show login form is user is logged in-->
            <?php if(!isset($_SESSION['userdata'])){ ?>

            <h4 class="text-white">Sign-in your account</h4>

            <!--login form-->
            <?php
              if(isset($_SESSION['error'])){
                echo '<span class="error-wrap">' . $_SESSION['error'] . '</span>';
              }
            ?>

            
            <form name="login" id="login-form" method="POST" >
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password"><br />
            <span class="text-white">Not yet a member? </span><a href="register.php" >Register</a>
            <input type="submit" name="login" class="btn btn-sm btn-primary"  style="float:right;margin-right:10%" value="Login">
            </form>
            <!--end login form-->
            <?php } ?>
            
          </div>

        </div>
      </div>
    </div>
    <div class="navbar navbar-inverse bg-inverse">
      <div class="container d-flex justify-content-between">
        <a href="/icct-bazaar" class="navbar-brand"><?php echo $site_data['title']; ?></a>
        <form class="navbar-form navbar-search" role="search" style="  margin-top: 7px;">
                <div class="input-group">
                
                    <!-- <div class="input-group-btn">
                        <button type="button" class="btn btn-search btn-default dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-search"></span>
                            <span class="label-icon">Category search</span>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-left" role="menu">
                           <li>
                                <a href="#">
                                    <span class="glyphicon glyphicon-user"></span>
                                    <span class="label-icon">Search By User</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                <span class="glyphicon glyphicon-book"></span>
                                <span class="label-icon">Search By Organization</span>
                                </a>
                            </li>
                        </ul>
                    </div> -->
        
                    <input type="text" class="form-control">
                <!-- 
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-search btn-default">
                        GO
                        </button>
                    </div> -->
                </div>  
            </form>   
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>


    <div class="container">
        <div class="row">
          <div class="col-sm-12" style="text-align:right">
              
              <?php if(isset($_SESSION['userdata'])){ ?>
              <!-- Example split danger button -->
              <div id="welcome-nav" class="btn-group">

                
                <span class="user-main-info-wrap">
                  <a class="" href="profile.php"><?php echo $_SESSION['userdata']['fname']; ?>'s Profile</a>
                  <span class="divider"></span>
                  <a class="" href="mystuff.php">My Stuff</a>
                  <span class="divider"></span>
                  <a class="" href="logout.php">Logout</a>
                  <img class="img-circle user-avatar" src="<?php echo $_SESSION['userdata']['image_url']; ?>" />
                </span>

                <!-- <button type="button" class="btn btn-secondary">Welcome back, <?php echo $_SESSION['userdata']['fname']; ?></button>
                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="sr-only">Toggle Dropdown</span>
                </button> -->
                <!-- <div class="dropdown-menu">
                  <a class="dropdown-item" href="profile.php">My Profile</a>
                  <a class="dropdown-item" href="mystuff.php">My Stuff</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout.php">Logout</a>
                </div> -->
              </div>
              <?php }else{ ?>

              <a href="register.php" class="btn btn-primary pull-right cta-pusher" style="float: right;margin-top:2em">Start selling your stuff</a>


              <?php } ?>

          </div>
        </div>
    </div>
