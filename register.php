<?php 

include('includes/header.php'); 

// Check if registration form was submitted
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
        $image_url = '';
    }



     /*step 2 gather form data to be saved in database*/
      /*predefined value for registration form*/
      $user_role_id = 3; //user role id for members
      $is_active = 1; //flag for active users

      $data = array(
          'email' => $_POST['email'],
          'fname' => $_POST['fname'],
          'lname' => $_POST['lname'],
          'contact' => $_POST['contact'],
          'password' => md5($_POST['password']),
          'image_url' => $image_url,
          'user_role_id' => $user_role_id,
          'is_active' => $is_active,
        );

      //insert data in database
     $inserted = DB::insert('tb_users',$data);

     if($inserted){
        echo '<script>window.location.href = "index.php";</script>';
     }
      

}


?>



    <!--main content-->
    <div id="main-content">
      
      <div class="container">

        <div class="row view-header" >
          <h1 style="width:100%">
            Sign up for free!
          </h1>
        </div>
          <form name="registration" id="registration" enctype="multipart/form-data" class="registration-form" method="POST">
          <div class="row">
            <div class="col-sm-6 py-4" style="text-align:center">
              <img id="image" class="img-thumbnail form-thumbnail"  src="images/default.png"><br />
              <input type="file" id="files" name="files" class="btn btn-secondary" style="font-size:11px" />
              
            </div>
            <div class="col-sm-6 py-4">
              
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Email address" required>
                </div>
                <div class="form-group">
                  <label for="fname">Firstname</label>
                  <input type="text" name="fname" class="form-control" placeholder="First name" required>
                </div>
                <div class="form-group">
                  <label for="fname">Lastname</label>
                  <input type="text" name="lname" class="form-control" placeholder="Last name" required>
                </div>

                <div class="form-group">
                  <label for="fname">Contact</label>
                  <input type="text" name="contact" class="form-control" value="" placeholder="Contact number" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <label for="fname">Confirm Password</label>
                  <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" required>
                </div>
                <div style="float:right;margin:10% 0">
                  <input type="submit" class="btn btn-primary" name="btn-register" value="Sign up">
                  <a href="index.php" class="btn btn-danger pull-right" >Cancel</a>
                </div>
            </div>
          </div>
        </form>

      </div>
    </div>



  <?php include('includes/footer.php'); ?>
