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

  <section class="probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 probootstrap-animate" data-animate-effect="fadeIn">
          <div class="product-item">
            <figure></figure>
            <div class="text">
              <h3 class="heading text-center"><?php echo $name?$name:"New Restaurant"; ?></h3>
              <hr>
              <p class="text-center">
                <cite title="<?php echo $address?$address:"Restaurant Address"; ?>"> <?php echo $address?$address:"Restaurant Address"; ?> <i class="icon-map-pin"></i></cite>
              </p>
              <p class="text-center"><i class="icon-envelop"></i> <?php echo $email?$email:"restaurant@gamil.com"; ?></p>
              <p class="text-center"><i class="icon-phone2"></i> <?php echo $phone?$phone:"0312-xxxxxxx"; ?></p>
              <p class="text-center"><i class="icon-map"></i> <?php echo $city?$city:"City"; ?></p>
              <p class="text-center"><i class="icon-calendar"></i> <?php echo $created_at?$created_at:"Date"; ?> </p>
              <hr>
              <?php 
                $q = "SELECT f.user_id, f.restaurant_id, f.rating, u.username FROM feedbacks f 
                      JOIN users u ON f.user_id = u.id WHERE f.restaurant_id = ".$id;
                $result = mysqli_query($con, $q);
                if(mysqli_num_rows($result)>0):
                  while($row = mysqli_fetch_assoc($result)):
                    if ($row['rating'] == 5) { $rating = 'Excellent';
                    } elseif($row['rating'] == 4) { $rating = 'Good';
                    } elseif($row['rating'] == 3) { $rating = 'Average';
                    } elseif($row['rating'] == 2) { $rating = 'Bad';
                    } elseif($row['rating'] == 1) { $rating = 'Worse'; }
                ?>
                  <p>
                    <span class="text-success">
                      <b><?php echo $row['username']?ucwords($row['username']):"Username"; ?></b>
                    </span>
                    <br>
                    <i>
                      <i class="icon-edit"></i>Feedback: <b><?php echo $rating?$rating:"Rating"; ?></b>
                    </i>  
                  </p>
              <?php 
                  endwhile;
                endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>  

<?php include('partials/footer.php'); ?>
<?php endif; ?>