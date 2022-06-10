<?php 
  if (empty($_SESSION['username'])){
    session_start(); 
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurant Reviews System | Opinion Mining</title>

    <link rel="stylesheet" href="http://localhost/RRS/assets/css/styles-merged.css">
    <link rel="stylesheet" href="http://localhost/RRS/assets/css/style.css">
    <link rel="stylesheet" href="http://localhost/RRS/assets/css/custom.css">

  </head>
  <body>

  <!-- START: header -->
  <header role="banner" class="probootstrap-header">
    <div class="container">
        <a href="index.php" class="probootstrap-logo">Restaurant Reviews System</a>
        
        <a href="#" class="probootstrap-burger-menu visible-xs" ><i>Menu</i></a>
        <div class="mobile-menu-overlay"></div>

        <?php $link=$_SERVER['REQUEST_URI']; ?>

        <nav role="navigation" class="probootstrap-nav hidden-xs">
          <ul class="probootstrap-main-nav">
            <li class="<?= $link=="/RRS/"||$link=="/RRS/index.php"?'active':''?>">
              <a href="index.php">Home</a>
            </li>
            <?php if (!empty($_SESSION['username'])): ?>
              <li class="<?= $link=="/RRS/restaurants.php"||$link=="/RRS/restaurant.php"?'active':''?>">
                <a href="restaurants.php">Restaurants</a>
              </li>
              <?php if ($_SESSION['role_id'] == 1): ?>
                <li>
                  <a href="http://localhost/RRS/admin/dashboard.php">Dashboard</a>
                </li>
              <?php endif ?>
              <li>
                <a href="admin/logout.php">Logout</a>
              </li>
            <?php else: ?>
              <li><a href="admin/register.php">Register</a></li>
              <li><a href="admin/login.php">Login</a></li>
            <?php endif ?>
          </ul>
          <div class="extra-text visible-xs"> 
            <a href="#" class="probootstrap-burger-menu"><i>Menu</i></a>
          </div>
        </nav>
    </div>
  </header>
  <!-- END: header -->