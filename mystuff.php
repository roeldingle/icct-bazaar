<?php 

include('includes/header.php'); 

$user_id = $_SESSION['userdata']['id'];

//$users_stuff = DB::query("SELECT * FROM tb_items WHERE user_id = ". $user_id); 

$users_stuff = DB::queryFullColumns("SELECT * FROM tb_items 
           LEFT JOIN tb_users 
           ON tb_items.user_id = tb_users.id 
           LEFT JOIN tb_item_category 
           ON tb_items.item_category_id = tb_item_category.id 
           LEFT JOIN tb_item_status
           ON tb_items.item_status_id = tb_item_status.id 
           WHERE tb_users.id = %i ", $user_id );



?>

    

    <!--main content-->
    <div id="main-content">
      
      <div class="container">
        <div class="row view-header" >
          <div class="col-sm-12">
            <h1>
              My Stuff <a href="addstuff.php" class="btn btn-sm btn-primary">Create new</a>
            </h1>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12 py-4">

            <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Category</th>
                <th>Price</th>
                <th>Item</th>
                <th>Status</th>
                <th>Date reg</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>


              <?php foreach($users_stuff as $key=>$stuff) { ?>

              <tr>
                <th scope="row"><?php echo $key+1; ?></th>
                <td><span class="badge badge-<?php echo $stuff['tb_item_category.theme']; ?>"><?php echo $stuff['tb_item_category.name']; ?></span></td>
                <td>P<?php echo $stuff['tb_items.price']; ?></td>
                <td>
                  <a href="item.php?id=<?php echo $stuff['tb_items.id']; ?>">
                    <?php echo $stuff['tb_items.name']; ?>
                  </a>
                </td>
                <td><span class="badge badge-<?php echo $stuff['tb_item_status.theme']; ?>"><?php echo $stuff['tb_item_status.name']; ?></span></td>
                <td><?php echo $stuff['tb_items.date_posted']; ?></td>
                <td>
                  <a href="editstuff.php?id=<?php echo $stuff['tb_items.id']; ?>">Edit</a>&nbsp;
                  <a href="deletestuff.php?id=<?php echo $stuff['tb_items.id']; ?>">Delete</a>
                </td>
              </tr>

              <?php } ?>
             

            </tbody>
          </table>
          </div>


        </div>

        

      </div>
    </div>



  <?php include('includes/footer.php'); ?>
