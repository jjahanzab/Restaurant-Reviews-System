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

	  $name = $email = $password = $role = "";
	  $v_name = $v_email = $v_password = "";
	  $error_name = $error_email = $error_password = "";

		$name = test_input($_POST['username']);
		$email = test_input($_POST['email']);
		$password = test_input($_POST['password']);		

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

		if(empty($password)) {
			$error_password = 'Password field require some value';
			$password = "";
		} else {
			$v_password = $password;
		}

		$role=$_POST['role_id'];
		if(!empty($v_name)&& !empty($v_email)&& !empty($v_password)){
			$q = "INSERT INTO users(`username`,`email`,`password`,`role_id`) VALUES('$v_name','$v_email','$v_password','$role')";
			$run = mysqli_query($con, $q);
			if($run) {
				header('Location: http://localhost/RRS/admin/users/user.php');
			}else {
				echo "error in data insertion";
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
        <h3 class="page-header">Create New User Record</h3>
        <form action="" method="POST" class="form">

          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label for="">Name:</label>
        		<input type="text" name="username" placeholder="name..." class="form-control" required="" autocomplete="off">
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
        		<label for="">Password:</label>
        		<input type="text" name="password" placeholder="password..." class="form-control" required="" autocomplete="off">
	          </div>	
          	</div>
          	<div class="col-md-6">
          		<?php if (!empty($error_password)): ?>
					<span style="color: red;"><?= $error_password ?></span>
				<?php endif ?>
          	</div>
          </div>

          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label class="radio-inline">
                    <input type="radio" name="role_id" id="inlineRadio1" value="2" checked required=""> User
	            </label>
	            <label class="radio-inline">
	                <input type="radio" name="role_id" id="inlineRadio2" value="1" required=""> Admin
	            </label>
	          </div>	
          	</div>
          	<div class="col-md-6"></div>
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