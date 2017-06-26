<?php include('includes/header.php'); ?>


<?php

  $category_slug = isset($_GET['name']) ?  $_GET['name'] : 'No Category set';

  $category = DB::queryFirstRow("SELECT * FROM tb_item_category WHERE name = '" .$category_slug . "'");

  $category_items = DB::query("SELECT * FROM tb_items WHERE item_category_id = " . $category['id']);

?>


    <!--main content-->
    <div id="main-content">
      
      <div class="container">
        <div class="row view-header" >
          <h1 style="width:100%">
            <?php echo $category['label']; ?>
          </h1>
        </div>
        
        <div class="row">

          <!--left side-->
          <div id="left-side" class="col-sm-3 py-4">
            <?php include('includes/side-nav.php'); ?>
          </div>
          <!--end left side-->

          <!--right side-->
          <div id="right-side" class="col-sm-9 py-4">
            
            <!--item row-->
            <div class="row">

               <!--loop item-->
               <?php foreach($category_items as $key=>$val){ ?>
               <div class="col-sm-4 py-4n item">
                <div class="thumbnail">
                  <a href="item.php?id=<?php echo $val['id']; ?>">
                    <img src="<?php echo $val['image_url'];?>" alt="">
                  </a>
                    <div class="caption text-center">
                      <h5><?php echo $val['name'];?></h5>
                      <p><a href="#" class="btn btn-info btn-sm" role="button">Php. <?php echo $val['price'];?></a></p>
                  </div>
                </div>
              </div>
              <?php } ?>


          </div>
          <!--end right side-->

          


        </div>
      </div>


    </div>
    <!--end main content-->



<?php include('includes/footer.php'); ?>
