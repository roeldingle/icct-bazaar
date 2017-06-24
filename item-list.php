<?php include('includes/header.php'); ?>


    <!--main content-->
    <div id="main-content">
      
      <div class="container">
        <div class="row">

          <!--left side-->
          <div id="left-side" class="col-sm-9 py-4">
            
            <!--item row-->
            <div class="row">

               <!--loop category-->
          <?php foreach($items as $key=>$selling){ ?>
          <div class="card text-center">
           <?php echo $selling['name']; ?>
            <img src="<?php echo $selling['image_url'] ?>" alt="<?php echo $selling['description']; ?>">
            <p><a href="#" class="btn btn-info btn-sm" role="button">View Details</a></p>
            
          </div>
          <?php } ?>
          <!--end loop category-->
        
              <!-- <div class="col-sm-4 py-4">
                <div class="thumbnail">
                  <img src="http://placehold.it/200x180" alt="">
                    <div class="caption text-center">
                      <h5>Thumbnail label</h5>
                      <p><a href="#" class="btn btn-info btn-sm" role="button">Button</a></p>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 py-4">
                <div class="thumbnail">
                  <img src="http://placehold.it/200x180" alt="">
                    <div class="caption text-center">
                      <h5>Thumbnail label</h5>
                      <p><a href="#" class="btn btn-info btn-sm" role="button">Button</a></p>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 py-4">
                <div class="thumbnail">
                  <img src="http://placehold.it/200x180" alt="">
                    <div class="caption text-center">
                      <h5>Thumbnail label</h5>
                      <p><a href="#" class="btn btn-info btn-sm" role="button">Button</a></p>
                  </div>
                </div>
              </div>

            </div>
            <!--end item row-->

            <!--item row-->
         <!--   <div class="row">
        
              <div class="col-sm-4 py-4">
                <div class="thumbnail">
                  <img src="http://placehold.it/200x180" alt="">
                    <div class="caption text-center">
                      <h5>Thumbnail label</h5>
                      <p><a href="#" class="btn btn-info btn-sm pull-right" role="button">Button</a></p>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 py-4">
                <div class="thumbnail">
                  <img src="http://placehold.it/200x180" alt="">
                    <div class="caption text-center">
                      <h5>Thumbnail label</h5>
                      <p><a href="#" class="btn btn-info btn-sm" role="button">Button</a></p>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 py-4">
                <div class="thumbnail">
                  <img src="http://placehold.it/200x180" alt="">
                    <div class="caption text-center">
                      <h5>Thumbnail label</h5>
                      <p><a href="#" class="btn btn-info btn-sm" role="button">Button</a></p>
                  </div>
                </div>
              </div>

            </div>
            <!--end item row-->


          </div>
          <!--end left side-->

          <!--right side-->
          <div id="right-side" class="col-sm-3 py-4">

            <div class="row">

              <div class="col-sm-12 py-4 bordered">
                <div class="text-center side-btn-container" >
                  <a href="#" class="btn btn-primary">Start selling my stuff</a>
                </div>
                
                <div class="side-category-container">
                  <h5>Categories</h5>
                  <ul class="list-unstyled" style="margin-left:5px">

                    <!--loop category-->
                   <?php foreach($item_categories as $key=>$category){ ?>
                    <li><a href="#" ><?php echo $category['name']; ?></a></li>
                    <?php } ?>
                    <!--end loop category-->
                  </ul>
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
