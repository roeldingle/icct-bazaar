<?php include('includes/header.php'); ?>

    

    <section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading">Search, Transact and Deal</h1>
        <p class="lead text-muted"><?php echo $site_data['tagline']; ?></p>
        <p>
          <a href="#" class="btn btn-lg btn-primary">Start selling my stuff</a>
        </p>
      </div>
    </section>

    <div class="album text-muted">
      <div class="container">

        <div class="row">

          <!--loop category-->
          <?php foreach($item_categories as $key=>$category){ ?>
          <div class="card text-center">
            <?php echo $category['name']; ?>
            <img src="<?php echo $category['image_url'] ?>" alt="<?php echo $category['name']; ?>">
            
          </div>
          <?php } ?>
          <!--end loop category-->
          
        </div>

      </div>
    </div>

  <?php include('includes/footer.php'); ?>
