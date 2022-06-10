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

		$q = "SELECT * FROM users WHERE id='$id'";
		$run = mysqli_query($con, $q);
		if($result=mysqli_fetch_assoc($run)) {
			$id = $result['id'];
			$username = $result['username'];
			$email = $result['email'];
			$password = $result['password'];
		}else {
			echo "error in data editing";
		}
	}

	if(isset($_POST['update'])) {

	  $v_username = $v_email = $v_password = "";

		$v_username = test_input($_POST['username']);
		$v_email = test_input($_POST['email']);
		$v_password = test_input($_POST['password']);
		
		if(!empty($v_username)&& !empty($v_email)&& !empty($v_password)){
			$q = "UPDATE users SET `username`='$v_username',`email`='$v_email',`password`='$v_password' WHERE `id`='$id'";
			$run = mysqli_query($con, $q);
			if($run) {
				header('Location: http://localhost/RRS/admin/users/user.php');
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
        <h3 class="page-header">Edit User Record</h3>
        <form action="" method="POST" class="form">
		  <input type="hidden" name="id" value="<?= $id?>">
          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label for="">Name:</label>
        		<input type="text" name="username" placeholder="name..." class="form-control" required="" autocomplete="off" value="<?= $username?>">
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
        		<label for="">Password:</label>
        		<input type="text" name="password" placeholder="password..." class="form-control" required="" autocomplete="off" value="<?= $password?>">
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