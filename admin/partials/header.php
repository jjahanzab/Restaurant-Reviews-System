<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurant Reviews System | Opinion Mining</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://localhost/RRS/admin/partials/asset/css/getbootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="http://localhost/RRS/admin/partials/asset/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="http://localhost/RRS/admin/partials/asset/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top bg-dark" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://localhost/RRS/index.php">
                <p class="text-success">Restaurant Reviews System</p>
            </a>
        </div>
        <!-- /.navbar-header -->
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle text-success" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>
                        <?= $_SESSION['username']; ?>
                    <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="http://localhost/RRS/admin/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                      <h4>
                        <a class="text-success" href="http://localhost/RRS/admin/dashboard.php">Admin-Panel</a>
                      </h4>
                    </li>

                    <?php $link=$_SERVER['REQUEST_URI']; ?>

                    <li>
                        <a href="http://localhost/RRS/admin/dashboard.php" class="text-success <?= $link=="/RRS/admin/dashboard.php"?'active':''?>">
                            <i class="fa fa-laptop fa-fw"></i>Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/RRS/admin/users/user.php" class="text-success <?= $link=="/RRS/admin/users/user.php"?'active':''?>">
                            <i class="fa fa-user fa-fw"></i> Users
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/RRS/admin/restaurants/restaurant.php" class="text-success <?= $link=="/RRS/admin/restaurants/restaurant.php"?'active':''?>">
                            <i class="fa fa-building fa-fw"></i> Restaurants
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/RRS/admin/feedbacks/feedback.php" class="text-success <?= $link=="/RRS/admin/feedbacks/feedback.php"?'active':''?>">
                            <i class="fa fa-comments fa-fw"></i> Feedbacks
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/RRS/admin/logout.php" class="text-success"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>