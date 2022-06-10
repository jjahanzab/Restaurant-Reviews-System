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
		$q = "DELETE FROM users WHERE id='$id'";
		$run = mysqli_query($con, $q);
		if($run) {
			$var = 'User Deleted Successfully';
			header('refresh:1; url= http://localhost/RRS/admin/users/user.php');
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
				<a href="http://localhost/RRS/admin/users/create.php" class="btn btn-primary btn-sm pull-right">Add User</a> <br><br>
                <table class="table table-bordered table-hover table-responsive">
					<thead>
						<tr class="bg-primary">
							<th>No</th>
							<th>Name</th>
							<th>Email</th>
							<th>Role</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php $count = 0;
						$q = "SELECT u.id, u.username, u.email, u.role_id, u.created_at, r.name FROM users u 
				        	  JOIN roles r ON u.role_id = r.id 
				        	  ORDER by u.id DESC";
						$result = mysqli_query($con, $q);
						if(mysqli_num_rows($result)>0):
							while($row = mysqli_fetch_assoc($result)): ?>
							<tr>
								<td><?= ++$count?></td>
								<td><?= $row['username']?></td>
								<td><?= $row['email']?></td>
								<?php if ($row['role_id'] == 1): ?>
								  <td>Admin</td>
								<?php elseif ($row['role_id'] == 2): ?>
								  <td>User</td>
								<?php endif ?>
								<td><?= $row['created_at']?></td>
								<td>
									<a href="http://localhost/RRS/admin/users/edit.php?id=<?= $row['id']?>" class="btn btn-info btn-sm">edit</a> | 
									<a href="?id=<?= $row['id']?>" class="btn btn-danger btn-sm">delete</a>
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