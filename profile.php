<?php include('includes/header.php'); ?>

    

    <!--main content-->
    <div id="main-content">
      
      <div class="container">

        <div class="row view-header" >
          <h1 style="width:100%">
            My Profile
          </h1>
        </div>

        <form name="registration" class="registration-form">
        <div class="row mb-3">
          

          <div class="col bd-highlight p-3">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" class="form-control" placeholder="Email address">
            </div>
            <div class="form-group">
              <label for="fname">Firstname</label>
              <input type="text" name="fname" class="form-control" placeholder="First name">
            </div>
            <div class="form-group">
              <label for="fname">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
          </div>


          <div class="col bd-highlight p-3">
            <div class="form-group">
              <label for="fname">Contact</label>
              <input type="text" name="contact" class="form-control" placeholder="Contact number">
            </div>
            <div class="form-group">
              <label for="lname">Lastname</label>
              <input type="text" name="lname" class="form-control"  placeholder="Last name">
            </div>
            <div class="form-group">
              <label for="fname">Confirm Password</label>
              <input type="password" name="confirm-password" class="form-control" placeholder="Confirm Password">
            </div>
          </div>
          
        </div>


        <input type="submit" class="btn btn-primary" name="btn-register" value="Update">
        <a href="index.php" class="btn btn-danger pull-right" >Cancel</a>
        </form>



      </div>
    </div>



  <?php include('includes/footer.php'); ?>
