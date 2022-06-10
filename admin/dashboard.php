<?php include('conn.php');

session_start();

if(empty($_SESSION['username']) && $_SESSION['role_id'] != 1):
	header('Location: http://localhost/RRS/admin/login.php');
else:
	if( $_SESSION['role_id'] != 1):
		header('Location: http://localhost/RRS/index.php');
	else:
?>

<?php include_once('partials/header.php'); ?>

<!-- Page Content -->
<div id="page-wrapper">
  	<div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">

                <h3 class="page-header text-muted">Dashboard</h3>
                <div class="row">
	
				<?php $result = mysqli_query($con, "SELECT COUNT(*) AS 'total' FROM restaurants");
					$data=mysqli_fetch_assoc($result); ?>
				  <div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
				      <div class="caption">
				        <h3 class="text-success"> Restaurants <span class="label label-success pull-right"><?= $data['total']?></span></h3>
				        <p>Total numbers of restaurants </p>
				        <p><a href="http://localhost/RRS/admin/restaurants/restaurant.php" class="btn btn-success" role="button">Read More</a></p>
				      </div>
				    </div>
				  </div>
				
				<?php $result = mysqli_query($con, "SELECT COUNT(*) AS 'total' FROM users");
					$data=mysqli_fetch_assoc($result); ?>
				  <div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
				      <div class="caption">
				        <h3 class="text-info"> Users <span class="label label-info pull-right"><?= $data['total']?></span></h3>
				        <p>Total numbers of users </p>
				        <p><a href="http://localhost/RRS/admin/users/user.php" class="btn btn-info" role="button">Read More</a></p>
				      </div>
				    </div>
				  </div>

				<?php $result = mysqli_query($con, "SELECT COUNT(*) AS 'total' FROM feedbacks");
					$data=mysqli_fetch_assoc($result); ?>
				  <div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
				      <div class="caption">
				        <h3 class="text-primary"> Feedbacks <span class="label label-primary pull-right"><?= $data['total']?></span></h3>
				        <p>Total numbers of feedbacks </p>
				        <p><a href="http://localhost/RRS/admin/feedbacks/feedback.php" class="btn btn-primary" role="button">Read More</a></p>
				      </div>
				    </div>
				  </div>

				</div>

          </div>
        </div>
  	</div>
</div>




<?php include_once('partials/footer.php'); ?>

	<?php endif; ?>
<?php endif; ?>