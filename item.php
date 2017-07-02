<?php include('includes/header.php'); ?>


<?php

  $get_item_id = isset($_GET['id']) ?  $_GET['id'] : 'No Category set';

  $item = DB::queryFullColumns("SELECT * FROM tb_items 
           LEFT JOIN tb_users 
           ON tb_items.user_id = tb_users.id 
           LEFT JOIN tb_item_category 
           ON tb_items.item_category_id = tb_item_category.id 
           LEFT JOIN tb_item_status
           ON tb_items.item_status_id = tb_item_status.id 
           WHERE tb_items.id = %i ", $get_item_id );


  $item = $item[0];

?>


    <!--main content-->
    <div id="main-content">
      
      <div class="container">

        <div class="row view-header" >
          <div class="col-sm-12">
            <h1>
              <?php echo $item['tb_item_category.name'];?>
            </h1>
          </div>
        </div>
        
        <div class="row">

          <!--left side-->
          <!-- <div id="left-side" class="col-sm-3 py-4">
            <?php //include('includes/side-nav.php'); ?>
          </div> -->
          <!--end left side-->

          <!--right side-->
          <div id="right-side" class="col-sm-12 py-12">
            
            <!--item row-->
            <div class="row">


              <div class="col-sm-7 py-4">
                <div class="item-detail-image">
                  <a href="">
                    <img class="img-thumbnail" src="<?php echo $item['tb_items.image_url'];?>" alt="">
                  </a>
                </div>

               <!--  <ul class="hide-bullets">
                  <li class="">
                      <a class="" id="carousel-selector-0"><img src="http://placehold.it/170x100&amp;text=one"></a>
                  </li>

                  <li class="">
                      <a class="" id="carousel-selector-1"><img src="http://placehold.it/170x100&amp;text=two"></a>
                  </li>

                  <li class="">
                      <a class="" id="carousel-selector-2"><img src="http://placehold.it/170x100&amp;text=three"></a>
                  </li>


              </ul> -->


              </div>

              

               <div class="col-sm-5 py-4">
                <div class="item-detail-content">


                  <div class="row">
                      <h2 style="display:block"><?php echo $item['tb_items.name'];?></h2>
                  </div>

                  <div class="row">
                      <div class="small-12 xlarge-10 columns">
                        <h4>
                           <span class="badge badge-success">
                            &#8369;<?php echo number_format($item['tb_items.price'], 2);?>
                            </span>
                        </h4>
                      </div>
                  </div>
                  <hr>


                   <div class="row margin-bottom">
                        <div class="small-12 xlarge-2 columns">
                            <div><strong>Date posted</strong></div>
                        </div>
                        <div class="small-12 xlarge-10 columns">
                            <?php echo $item['tb_items.date_posted'];?>
                        </div>
                    </div>

                    <div class="row margin-bottom">
                        <div class="small-12 xlarge-2 columns">
                            <div><strong>Status</strong></div>
                        </div>
                        <div class="small-12 xlarge-10 columns">
                            <?php echo $item['tb_item_status.name'];?>
                        </div>
                    </div>


                    <div class="row margin-bottom">
                        <div class="small-12 xlarge-2 columns">
                            <div><strong>Description</strong></div>
                        </div>
                        <div class="small-12 xlarge-10 columns">
                            <?php echo $item['tb_items.description'];?>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                        </div>
                    </div>


                    <div class="row seller-info">
                      <div class="small-12 xlarge-10 columns">
                          <h4>Owner Information</h4>
                          <span class="user-main-info-wrap">
                            <img class="img-circle user-avatar" src="<?php echo $item['tb_users.image_url']; ?>" />
                            <a href="" style="width:100%"><?php echo $item['tb_users.fname'] . " " . $item['tb_users.lname'];?></a>
                          </span>
                          

                          <a href="#" class="btn btn-success">Message Seller <span class="glyphicon glyphicon-comment" aria-hidden="true"></span></a>
                          <a href="#" class="btn btn-info"><?php echo $item['tb_users.contact'];?></a>
                      </div>
                    </div>
                    

                </div>
              </div>

              


            </div>
            <!--end right side-->

          


        </div>
      </div>


    </div>
    <!--end main content-->



<?php include('includes/footer.php'); ?>
