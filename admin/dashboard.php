<?php
session_start();
unset($_SESSION['error']);

include('../lib/meekrodb.2.3.class.php');

//check if there is a user session -> user that is logged in
if(!isset($_SESSION['admindata'])){
  echo '<script>window.location.href = "index.php";</script>';
  exit;
}

//get site info from database
$site_data = DB::queryFirstRow("SELECT * FROM tb_site_info");

$user_id = $_SESSION['admindata']['id'];

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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $site_data['title']; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/styles.css" rel="stylesheet">
  </head>

  <body>

    <div class="navbar navbar-inverse bg-inverse">
      <div class="container d-flex justify-content-between">
        <a href="/icct-bazaar" class="navbar-brand"><?php echo $site_data['title']; ?></a>
        
      </div>
    </div>



	<!--main content-->
	<div id="main-content">

		<div class="container">
			<div class="row view-header" >
				<div class="col-sm-12">
					<h1>
					Dashboard
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
			          <div class="col-sm-12 py-4">

			            <table class="table table-striped">
			            <thead>
			              <tr>
			                <th>#</th>
			                <th>Category</th>
			                <th>Price</th>
			                <th>Item</th>
			                <th>Status</th>
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
			                  <a target="_blank" href="../item.php?id=<?php echo $stuff['tb_items.id']; ?>">
			                    <?php echo $stuff['tb_items.name']; ?>
			                  </a>
			                </td>
			                <td><span class="badge badge-<?php echo $stuff['tb_item_status.theme']; ?>"><?php echo $stuff['tb_item_status.name']; ?></span></td>
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
				<!--end right side-->
			</div>


		</div>
	</div>
	<!--end main content-->


<?php
include('includes/footer.php');
?>