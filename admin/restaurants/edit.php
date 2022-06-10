<?php include('../conn.php');

session_start();

function test_input($data) {
	$data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(empty($_SESSION['username'])):
	header('Location: http://localhost/RRS/admin/login.php');
else:
  if( $_SESSION['role_id'] != 1):
    header('Location: http://localhost/RRS/index.php');
  else:

	if(isset($_GET['id']))
	{
		$id = $_GET['id'];

		$q = "SELECT * FROM restaurants WHERE id='$id'";
		$run = mysqli_query($con, $q);
		if($result=mysqli_fetch_assoc($run)) {
			$id = $result['id'];
			$name = $result['name'];
			$email = $result['email'];
			$phone = $result['phone'];
			$address = $result['address'];
			$city = $result['city'];
		}else {
			echo "error in data editing";
		}
	}

	if(isset($_POST['update'])) {

	  $v_name = $v_email = $v_phone = $v_address = $v_city = "";

		$v_name = test_input($_POST['name']);
		$v_email = test_input($_POST['email']);
		$v_phone = test_input($_POST['phone']);
		$v_address = test_input($_POST['address']);
		$v_city = test_input($_POST['city']);
		
		if(!empty($v_name)&& !empty($v_email)&& !empty($v_phone)&& !empty($v_address)&& !empty($v_city)){
			$q = "UPDATE restaurants SET `name`='$v_name',`email`='$v_email',`phone`='$v_phone',`address`='$v_address',`city`='$v_city' WHERE `id`='$id'";
			$run = mysqli_query($con, $q);
			if($run) {
				header('Location: http://localhost/RRS/admin/restaurants/restaurant.php');
			}else {
				echo "error in data updating";
			}
		}
	}

?>

<?php include_once('../partials/header.php'); ?>

<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header">Edit Resraurant Record</h3>
        <form action="" method="POST" class="form">
		  <input type="hidden" name="id" value="<?= $id?>">
          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label for="">Name:</label>
        		<input type="text" name="name" placeholder="name..." class="form-control" required="" autocomplete="off" value="<?= $name?>">
	          </div>	
          	</div>
          	<div class="col-md-6"></div>
          </div>

          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label for="">Email:</label>
        		<input type="email" name="email" placeholder="email..." class="form-control" required="" autocomplete="off" value="<?= $email?>">
	          </div>	
          	</div>
          	<div class="col-md-6"></div>
          </div>

          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label for="">Phone:</label>
        		<input type="text" name="phone" placeholder="phone..." class="form-control" required="" autocomplete="off" value="<?= $phone?>">
	          </div>	
          	</div>
          	<div class="col-md-6"></div>
          </div>

          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label for="">Address:</label>
        		<input type="text" name="address" placeholder="address..." class="form-control" required="" autocomplete="off" value="<?= $address?>">
	          </div>	
          	</div>
          	<div class="col-md-6"></div>
          </div>

          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label for="">City:</label>
        		<input type="text" name="city" placeholder="city..." class="form-control" required="" autocomplete="off" value="<?= $city?>">
	          </div>	
          	</div>
          	<div class="col-md-6"></div>
          </div>

          <div class="row">
          	<div class="col-md-6 col-md-offset-4">
	          <button type="submit" name="update" class="btn btn-info">Update</button>
          	</div>
          </div>

        </form>
        <br><br>
      </div>
    </div>
  </div>
</div>

<?php include_once('../partials/footer.php'); ?>

  <?php endif; ?>
<?php endif; ?>