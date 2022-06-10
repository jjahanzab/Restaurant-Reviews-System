<?php 
include('conn.php');
session_start();

if(!empty($_SESSION['username'])):
    header('Location: dashboard.php');
else:

    if(isset($_POST['login'])) {
        $username = $password = "";

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        
        if(!empty($username) && !empty($password)){
            $q1 = "SELECT * FROM users WHERE `username`='$username' AND `password`='$password'"; $run1 = mysqli_query($con, $q1);

            if($value1=mysqli_fetch_assoc($run1)) {
                $_SESSION['username'] = $value1['username'];
                $_SESSION['role_id'] = $value1['role_id'];
                $_SESSION['id'] = $value1['id'];
                if ($value1['role_id'] == 1) {
                    header('Location: http://localhost/RRS/admin/dashboard.php');
                } else {
                    header('Location: http://localhost/RRS/restaurants.php');
                }
                
            }else {
                $error = 'Invalid Username/Password';
                $username = "";
                $password = "";
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
<div>
    <div class="container" style="margin-top: 10%">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <a href="http://localhost/RRS" class="text-success">Restaurant Reviews System</a>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST">
                            <fieldset>
                                <legend class="text-center text-muted"><small>Start your Session</small></legend>
                                <?php if (!empty($error)): ?>
                                    <p style="color: red;"><?= $error ?></p>
                                <?php endif ?>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autocomplete="off" required="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required="">
                                </div>
                                <button type="submit" name="login" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- jQuery -->
    <script src="http://localhost/RRS/admin/partials/asset/js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="http://localhost/RRS/admin/partials/asset/js/getbootstrap.min.js"></script>
</body>
</html>

<?php endif; ?>