<div class="row">

  <div class="col-sm-12 py-4 bordered">
    
    
    <div class="side-category-container">
      <h5>Categories</h5>
      <ul class="list-unstyled" style="margin-left:5px">

        <!--loop category-->
       <?php foreach($item_categories as $key=>$category){ ?>
        <li><a href="category.php?id=<?php echo $category['id']; ?>" ><?php echo $category['name']; ?></a></li>
        <?php } ?>
        <!--end loop category-->
      </ul>
    </div>
    
  </div>
  
</div>