<?php include('admin/conn.php');

session_start();

if(empty($_SESSION['username'])):
  header('Location: http://localhost/RRS/admin/login.php');
else:

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $q = "SELECT * FROM restaurants WHERE id='$id'";
    $run = mysqli_query($con, $q);
    if($result=mysqli_fetch_assoc($run)) {
      $id = $result['id'];
      $name = $result['name'];
      $email = $result['email'];
      $phone = $result['phone'];
      $address = $result['address'];
      $city = $result['city'];
      $created_at = $result['created_at'];
    }else {
      echo "error in data fetching";
    }
  }

 ?>

<?php include('partials/header.php'); ?>

  <section class="probootstrap-slider flexslider">
    <div class="probootstrap-text-intro">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="probootstrap-slider-text text-center">
              <h1 class="probootstrap-heading probootstrap-animate mb20" data-animate-effect="fadeIn"><b>Ranking Restaurants</b></h1>
              <div class="probootstrap-animate probootstrap-sub-wrap mb30" data-animate-effect="fadeIn"><b>Opinion Mining For Restaurant Reviews</b></div>
              <p class="probootstrap-animate" data-animate-effect="fadeIn"><a href="admin/register.php" class="btn btn-ghost btn-ghost-white">Make Member</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <ul class="slides">
      <li style="background-image: url(http://localhost/RRS/assets/img/slider_2.jpg); filter: blur(8px);"></li>
    </ul>
  </section>
  <!-- END: slider  -->

  <section class="probootstrap-section">
    <div class="container">
      <div class="row">
        
      <?php 
        $q = "SELECT * FROM feedbacks
            INNER JOIN ( SELECT restaurant_id, MAX(rating) AS MaxRating FROM feedbacks GROUP BY restaurant_id) 
            topRating ON feedbacks.restaurant_id = topRating.restaurant_id AND feedbacks.rating = topRating.MaxRating  ORDER BY rating DESC";
        $result = mysqli_query($con, $q);
        if(mysqli_num_rows($result)>0){
          $data = [];
          while($row = mysqli_fetch_assoc($result)){ 
        ?>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 probootstrap-animate" data-animate-effect="fadeIn">
              <div class="product-item">
                <div class="text">
                  <p>
                    <?php if ($row['rating'] == 5): ?>
                      <span class="label label-success"><i class="icon-star"></i> Excellent </span>
                    <?php elseif ($row['rating'] == 4): ?>
                      <span class="label label-success"><i class="icon-star"></i> Good </span>
                    <?php elseif ($row['rating'] == 3): ?>
                      <span class="label label-info"><i class="icon-check"></i> Average </span>
                    <?php elseif ($row['rating'] == 2): ?>
                      <span class="label label-danger"><i class="icon-cross"></i> Bad </span>
                    <?php elseif ($row['rating'] == 1): ?>
                      <span class="label label-danger"><i class="icon-cross"></i> Worse </span>
                    <?php endif; ?>
                  </p>
                  <?php 
                    $query = "SELECT * FROM restaurants WHERE id=".$row['restaurant_id'];
                    $run = mysqli_query($con, $query);
                    if($value=mysqli_fetch_assoc($run)):
                   ?>
                      <h2 class="heading"><?php echo $value['name'];?></h2>
                      <p><?php echo $value['address'];?></p>
                    <?php endif; ?>

                  <p>
                    <a href="restaurant.php?id=<?= $row['restaurant_id']?>" class="btn btn-info">Details</a>
                    <a href="feedback.php?f_id=<?= $row['id']?>&id=<?= $row['restaurant_id']?>" class="btn btn-success btn-sm pull-right">Feedback</a> 
                  </p>
                </div>
              </div>
            </div>
        <?php }
          } ?>

      </div>
    </div>
  </section>  

<?php include('partials/footer.php'); ?>
<?php endif; ?>