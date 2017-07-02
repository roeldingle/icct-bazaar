<?php 
include('includes/header.php'); 

$item_to_edit = $_GET['id'];
$user_id = $_SESSION['userdata']['id']; //user role id for members

$edit_item = DB::queryFullColumns("SELECT * FROM tb_items  
           LEFT JOIN tb_item_category 
           ON tb_items.item_category_id = tb_item_category.id 
           LEFT JOIN tb_item_status
           ON tb_items.item_status_id = tb_item_status.id 
           WHERE tb_items.id = %i AND tb_items.user_id = %i", $item_to_edit, $user_id);

$edit_item = $edit_item[0];


if(empty($edit_item)){
  echo "Not owned";
  exit;
}


// Check if addstuff form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  /*step 1 check and validate file to upload*/
    // Check if file was uploaded without errors
    if(isset($_FILES["files"]) && $_FILES["files"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["files"]["name"];
        $filetype = $_FILES["files"]["type"];
        $filesize = $_FILES["files"]["size"];

        $upload_dir = 'admin/uploads/items/';
    
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
        $image_url = $edit_item['tb_items.image_url'];
    }



     /*step 2 gather form data to be saved in database*/
      /*predefined value for registration form*/
      
      $is_active = 1; //flag for active users

      $data = array(
          'name' => $_POST['name'],
          'price' => $_POST['price'],
          'item_category_id' => $_POST['item_category_id'],
          'item_status_id' => $_POST['item_status_id'],
          'description' => $_POST['description'],
          'image_url' => $image_url,
          'user_id' => $user_id,
          'is_active' => $is_active,
        );

      //insert data in database
     $updated = DB::update('tb_items',$data, "id=%s", $edit_item['tb_items.id']);

     if($updated){
        echo '<script>window.location.href = "mystuff.php";</script>';
     }
}


?>



   <!--main content-->
    <div id="main-content">
      
      <div class="container">

        <div class="row view-header" >
          <div class="col-sm-12">
            <h1>
              Edit stuff
            </h1>
          </div>
        </div>
        
          <form name="editstuff" id="editstuff" enctype="multipart/form-data" class="addstuff-form" method="POST">
          <div class="row">
            <div class="col-sm-6 py-4" style="text-align:center">
              <img id="image" class="img-thumbnail form-thumbnail"
              src="<?php echo (isset($edit_item['tb_items.image_url'])) ? $edit_item['tb_items.image_url'] : 'images/thumbnail-default.png'; ?>">

              <br />
              <input type="file" id="files" name="files" class="btn btn-secondary" style="font-size:11px" />
              
            </div>
            <div class="col-sm-6 py-4">
                <div class="form-group">
                  <label for="name">Item name</label>
                  <input type="text" name="name" class="form-control" value="<?php echo (isset($edit_item['tb_items.name'])) ? $edit_item['tb_items.name'] : ''; ?>" placeholder="Item name" required>
                </div>
                <div class="form-group">
                  <label for="lname">Price</label>
                  <input type="text" name="price" class="form-control" value="<?php echo (isset($edit_item['tb_items.price'])) ? $edit_item['tb_items.price'] : ''; ?>"  placeholder="0.00" required>
                </div>
                <div class="form-group">
                  <label for="fname">Status</label>
                  <select name="item_status_id" style="width:100%">
                      <?php 
                      $item_status = DB::query("SELECT * FROM tb_item_status");
                      foreach($item_status as $key=>$status){ 
                      ?>
                      <option value="<?php echo $status['id']; ?>" <?php echo ($edit_item['tb_items.item_status_id'] == $status['id']) ? 'selected' : ''; ?> ><?php echo $status['name']; ?></option>
                      <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="email">Category</label>
                  <select name="item_category_id" style="width:100%">
                      <?php foreach($item_categories as $key=>$category){ ?>
                      <option value="<?php echo $category['id']; ?>"  <?php echo ($edit_item['tb_items.item_category_id'] == $category['id']) ? 'selected' : ''; ?>><?php echo $category['name']; ?></option>
                      <?php } ?>
                  </select>
                </div>
                

                <div class="form-group">
                  <label for="fname">Description</label>
                  <textarea name="description" style="width:100%"><?php echo (isset($edit_item['tb_items.description'])) ? $edit_item['tb_items.description'] : ''; ?></textarea>
                </div>
                
                <div style="float:right;margin:10% 0">
                  <input type="submit" class="btn btn-primary" name="btn-editstuff" value="Edit Stuff">
                  <a href="mystuff.php" class="btn btn-danger pull-right" >Cancel</a>
                </div>
            </div>
          </div>
        </form>

      </div>
    </div>

    

    



  <?php include('includes/footer.php'); ?>