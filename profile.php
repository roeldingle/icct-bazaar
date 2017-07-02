<?php 

include('includes/header.php'); 

if(!isset($_SESSION['userdata'])){
  echo "Show or redirect to 404 page";
}


$profile = $_SESSION['userdata'];


// Check if addstuff form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  /*step 1 check and validate file to upload*/
    // Check if file was uploaded without errors
    if(isset($_FILES["files"]) && $_FILES["files"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["files"]["name"];
        $filetype = $_FILES["files"]["type"];
        $filesize = $_FILES["files"]["size"];

        $upload_dir = 'admin/uploads/users/';
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){

          $unique_filename = time().uniqid(rand())."-".$filename;
          move_uploaded_file($_FILES["files"]["tmp_name"], $upload_dir . $unique_filename);
          $image_url = $upload_dir.$unique_filename;
        } 
    } else {
        $image_url = $profile['image_url'];
    }



     /*step 2 gather form data to be saved in database*/
      /*predefined value for registration form*/
      
      $is_active = 1; //flag for active users

      $data = array(
          'contact' => $_POST['contact'],
          'password' => ($_POST['password'] != "") ? md5($_POST['password']) : $profile['password'],
          'image_url' => $image_url,
        );

      //insert data in database
     $updated = DB::update('tb_users',$data, "id=%s", $profile['id']);

     if($updated){
        /*reset session data*/
        $userdata = DB::queryFirstRow("SELECT * FROM tb_users WHERE id=%s", $profile['id']);
        $_SESSION['userdata'] = $userdata;
        $profile = $_SESSION['userdata'];

        echo '<script>window.location.href = "profile.php";</script>';
     }
}



?>

    <!--main content-->
    <div id="main-content">
      
      <div class="container">
        <div class="row view-header" >
          <div class="col-sm-12">
            <h1>
              My Profile 
            </h1>
          </div>
        </div>
          <form name="profile" id="profile-form" class="profile-form" enctype="multipart/form-data" method="POST">
          <div class="row">
            <div class="col-sm-6 py-4" style="text-align:center">
              <img id="image" class="img-thumbnail form-thumbnail" src="<?php echo ($profile['image_url']) ? $profile['image_url'] : 'images/default.png'; ?>">
              <input type="file" id="files" name="files" class="btn btn-secondary" style="font-size:11px" />
            </div>
            <div class="col-sm-6 py-4">
              <div class="profile-maininfo-wrap">
                <h2><?php echo $profile['fname']; ?> <?php echo $profile['lname']; ?></h2>
                <p><?php echo $profile['email']; ?> </p>
              </div>
              
              
                <div class="form-group">
                  <label for="fname">Contact</label>
                  <input type="text" name="contact" class="form-control" value="<?php echo $profile['contact']; ?>" placeholder="Contact number">
                </div>

                <hr>
                <h5>Change Password?</h5>
                <span class="error-wrap password-error-wrap"></span>
                <div class="form-group">
                  <label for="fname">Password</label>
                  <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="fname">Confirm Password</label>
                  <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                </div>
                <div style="float:right;margin:10% 0">
                  <input type="submit" class="btn btn-primary" name="btn-register" value="Update">
                  <a href="index.php" class="btn btn-danger pull-right" >Cancel</a>
                </div>
             

            </div>
          </div>
           </form>
       


    </div>



  <?php include('includes/footer.php'); ?>
