<?php include('includes/header.php'); ?>


<?php

  $get_category_id = isset($_GET['id']) ?  $_GET['id'] : 'No Category set';

  $category = DB::queryFirstRow("SELECT * FROM tb_item_category WHERE id = '" .$get_category_id . "'");

  $category_items = DB::query("SELECT * FROM tb_items WHERE item_category_id = " . $category['id']);

?>


    <!--main content-->
    <div id="main-content">
      
      <div class="container">
        <div class="row view-header" >
          <div class="col-sm-12">
            <h1>
              <?php echo $category['name']; ?>
            </h1>
          </div>
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
