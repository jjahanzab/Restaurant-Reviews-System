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

	if(isset($_POST['submit'])) {

	  $name = $email = $phone = $address = $city = "";
	  $v_name = $v_email = $v_phone = $v_address = $v_city = "";
	  $error_name = $error_email = $error_phone = $error_address = $error_city = "";

		$name = test_input($_POST['name']);
		$email = test_input($_POST['email']);
		$phone = test_input($_POST['phone']);		
		$address = test_input($_POST['address']);		
		$city = test_input($_POST['city']);		

		if(empty($name)) {
			$error_name = 'Name field require some value';
			$name = "";
		} else {
			$v_name = $name;
		}

		if(empty($email)) {
			$error_email = 'Email field require some value';
			$email = "";
		} else {
			$v_email = $email;
		}

		if(empty($phone)) {
			$error_phone = 'Phone field require some value';
			$phone = "";
		} else {
			$v_phone = $phone;
		}

		if(empty($address)) {
			$error_address = 'Address field require some value';
			$address = "";
		} else {
			$v_address = $address;
		}

		if(empty($city)) {
			$error_city = 'City field require some value';
			$city = "";
		} else {
			$v_city = $city;
		}

		if(!empty($v_name)&& !empty($v_email)&& !empty($v_phone)&& !empty($v_address)&& !empty($v_city)){
			$q = "INSERT INTO restaurants(`name`,`email`,`phone`,`address`,`city`) VALUES('$v_name','$v_email','$v_phone','$v_address','$v_city')";
			$run = mysqli_query($con, $q);
			if($run) {
				$insert_id = $con->insert_id;
				$query = "INSERT INTO feedbacks(`user_id`,`restaurant_id`,`rating`) values(0,".$insert_id.",0)";
			    if(mysqli_query($con,$query)){
					header('Location: http://localhost/RRS/admin/restaurants/restaurant.php');
			    } else {
					echo "error in feedback insertion";
				}
			}else {
				echo "error in restaurant insertion";
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
        <h3 class="page-header">Create New Restaurant Record</h3>
        <form action="" method="POST" class="form">

          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label for="">Name:</label>
        		<input type="text" name="name" placeholder="name..." class="form-control" required="" autocomplete="off">
	          </div>	
          	</div>
          	<div class="col-md-6">
          		<?php if (!empty($error_name)): ?>
					<span style="color: red;"><?= $error_name ?></span>
				<?php endif ?>
          	</div>
          </div>

          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label for="">Email:</label>
        		<input type="email" name="email" placeholder="email..." class="form-control" required="" autocomplete="off">
	          </div>	
          	</div>
          	<div class="col-md-6">
          		<?php if (!empty($error_email)): ?>
					<span style="color: red;"><?= $error_email ?></span>
				<?php endif ?>
          	</div>
          </div>

          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label for="">Phone:</label>
        		<input type="text" name="phone" placeholder="phone..." class="form-control" required="" autocomplete="off">
	          </div>	
          	</div>
          	<div class="col-md-6">
          		<?php if (!empty($error_phone)): ?>
					<span style="color: red;"><?= $error_phone ?></span>
				<?php endif ?>
          	</div>
          </div>

          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label for="">Address:</label>
        		<textarea name="address" cols="30" rows="5" placeholder="address..." class="form-control" required="" autocomplete="off"></textarea>
	          </div>	
          	</div>
          	<div class="col-md-6">
          		<?php if (!empty($error_address)): ?>
					<span style="color: red;"><?= $error_address ?></span>
				<?php endif ?>
          	</div>
          </div>

          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label for="">City:</label>
        		<input type="text" name="city" placeholder="city..." class="form-control" required="" autocomplete="off">
	          </div>	
          	</div>
          	<div class="col-md-6">
          		<?php if (!empty($error_city)): ?>
					<span style="color: red;"><?= $error_city ?></span>
				<?php endif ?>
          	</div>
          </div>

          <div class="row">
          	<div class="col-md-6 col-md-offset-4">
	          <button type="reset" class="btn btn-default">Cancel</button>
	          <button type="submit" name="submit" class="btn btn-info">Submit</button>
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