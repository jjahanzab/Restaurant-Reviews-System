<?php include('../conn.php');

session_start();

if(empty($_SESSION['username'])):
	header('Location: http://localhost/RRS/admin/login.php');
else:
	if( $_SESSION['role_id'] != 1):
		header('Location: http://localhost/RRS/index.php');
	else:

	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$q = "DELETE FROM feedbacks WHERE id='$id'";
		$run = mysqli_query($con, $q);
		if($run) {
			$var = 'Feedback Deleted Successfully';
			header('refresh:1; url= http://localhost/RRS/admin/feedbacks/feedback.php');
		}else {
			echo "error in data deletion";
		}
	}


?>

<?php include_once('../partials/header.php'); ?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header text-muted">Users Info.</h3>
                <?php if (isset($var)): ?>
					<span style="color: green"><?= $var?></span> <br>
				<?php endif ?>
                <table class="table table-bordered table-hover table-responsive">
					<thead>
						<tr class="bg-primary">
							<th>No</th>
							<th>User</th>
							<th>Restaurant</th>
							<th>Feedback</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php $count = 0;
				        $q = "SELECT f.id,f.user_id,f.restaurant_id, f.created_at, f.rating, u.username, r.name 
				        	  FROM feedbacks f 
				        	  JOIN users u ON u.id = f.user_id 
				        	  JOIN restaurants r ON r.id = f.restaurant_id 
				        	  ORDER by f.id DESC";
						$result = mysqli_query($con, $q);
						if(mysqli_num_rows($result)>0):
							while($row = mysqli_fetch_assoc($result)):
							if ($row['rating'] == 5) { $rating = 'Excellent';
						    } elseif($row['rating'] == 4) { $rating = 'Good';
						    } elseif($row['rating'] == 3) { $rating = 'Average';
						    } elseif($row['rating'] == 2) { $rating = 'Bad';
						    } elseif($row['rating'] == 1) { $rating = 'Worse'; }
						 ?>
							<tr>
								<td><?= ++$count?></td>
								<td><?= $row['username']?></td>
								<td><?= $row['name']?></td>
								<td><?= $rating?></td>
								<td><?= $row['created_at']?></td>
								<td>
									<a href="?id=<?= $row['id']?>" class="btn btn-danger btn-sm">Delete</a>
								</td>
							</tr>
					<?php endwhile;
						else: ?>
						<tr>
							<td colspan="7">
								<h3>Not Any Data Found.</h3>
							</td>
						</tr>
					<?php endif; ?>
					</tbody>
				</table>
            </div>
        </div>
    </div>
</div>

<?php include_once('../partials/footer.php'); ?>

	<?php endif; ?>
<?php endif; ?>