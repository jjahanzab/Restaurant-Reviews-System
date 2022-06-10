<?php include('conn.php');

function test_input($data) {
	$data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['submit'])) {

  $name = $email = $password = "";
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

	$created_at=date('Y-m-d');
	if(!empty($v_name)&& !empty($v_email)&& !empty($v_password)){
		$q = "INSERT INTO users(`username`,`email`,`password`,`role_id`,`created_at`) VALUES('$v_name','$v_email','$v_password','2','$created_at')";
		$run = mysqli_query($con, $q);
		if($run) {
			header('Location: http://localhost/RRS/index.php');
		}else {
			echo "error in data register";
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurant Reviews System | Opinion Mining</title>
    <!-- Bootstrap Core CSS -->
    <link href="http://localhost/RRS/admin/partials/asset/css/getbootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="http://localhost/RRS/admin/partials/asset/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container" style="margin-top: 2%">

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="login-panel panel panel-success">
          <div class="panel-heading">
            <h3 class="panel-title">
            	<a href="http://localhost/RRS">Restaurant Reviews System</a>
            </h3>
          </div>
          <div class="panel-body">
	        <form action="" method="POST" class="form">
			  <fieldset>
			  <legend class="text-center"><small>Register your Session</small></legend>
	          <div class="row">
	          	<div class="col-md-12">
		          <div class="form-group">
	        		<label for="">Name:</label>
	        		<input type="text" name="username" placeholder="name..." class="form-control" required="" autocomplete="off">
		          </div>	
	          		<?php if (!empty($error_name)): ?>
						<span style="color: red;"><?= $error_name ?></span>
					<?php endif ?>
	          	</div>
	          </div>

	          <div class="row">
	          	<div class="col-md-12">
		          <div class="form-group">
	        		<label for="">Email:</label>
	        		<input type="email" name="email" placeholder="email..." class="form-control" required="" autocomplete="off">
		          </div>

	          		<?php if (!empty($error_email)): ?>
						<span style="color: red;"><?= $error_email ?></span>
					<?php endif ?>
	          	</div>
	          </div>

	          <div class="row">
	          	<div class="col-md-12">
		          <div class="form-group">
	        		<label for="">Password:</label>
	        		<input type="text" name="password" placeholder="password..." class="form-control" required="" autocomplete="off">
		          </div>	
	          		<?php if (!empty($error_password)): ?>
						<span style="color: red;"><?= $error_password ?></span>
					<?php endif ?>
	          	</div>
	          </div>

	          <div class="row">
	          	<div class="col-md-12 text-center">
		          <button type="submit" name="submit" class="btn btn-success">Register</button>
	          	</div>
	          </div>
			  </fieldset>	

	        </form>
	      </div>
	    </div>
        <br><br>
      </div>
    </div>
</div>
<!-- jQuery -->
<script src="http://localhost/RRS/admin/partials/asset/js/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="http://localhost/RRS/admin/partials/asset/js/getbootstrap.min.js"></script>
</body>
</html>