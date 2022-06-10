<?php include('admin/conn.php');

session_start();

if(empty($_SESSION['username'])):
  header('Location: http://localhost/RRS/admin/login.php');
else:

  if(isset($_GET['id'])){
    $get_id = $_GET['id'];
    $q = "SELECT * FROM restaurants WHERE id='$get_id'";
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

  if(isset($_POST['submit'])) {

    $feedback = $_POST['rating'];
    if ($feedback == 'e') {
      $rating = 5;
    } elseif($feedback == 'g') {
      $rating = 4;
    } elseif($feedback == 'a') {
      $rating = 3;
    } elseif($feedback == 'b') {
      $rating = 2;
    } elseif($feedback == 'w') {
      $rating = 1;
    }

    $user_id = $_SESSION['id'];
    $restaurant_id = $_GET['id'];

    $query = "SELECT COUNT(*) AS countRest FROM feedbacks WHERE `user_id`=".$user_id." AND `restaurant_id`=".$restaurant_id;

    $result = mysqli_query($con,$query);
    $fetchdata = mysqli_fetch_array($result);
    $count = $fetchdata['countRest'];
    
    if($count == 0){

      $f_id = $_GET['f_id'];
      $checkquery = "SELECT * FROM feedbacks WHERE `id`='$f_id'";
      $val = mysqli_query($con, $checkquery);
      if($value=mysqli_fetch_assoc($val)) {

        if ($value['status'] == 'I') {
          $feedbackquery = "UPDATE feedbacks SET `user_id`=".$user_id.", `rating`=".$rating.", `status`='A' WHERE `restaurant_id`=".$restaurant_id;
        } else {
          $feedbackquery = "INSERT INTO feedbacks(`user_id`,`restaurant_id`,`rating`,`status`) values(".$user_id.",".$restaurant_id.",".$rating.",'A')";
        }
        if(mysqli_query($con,$feedbackquery)){
          header('Location: http://localhost/RRS/restaurants.php');
        } else {
          echo "Not Insert Value";
        }

      } else {
        echo "error in checking feedback";
      }
    } else {
      header('Location: http://localhost/RRS/restaurants.php');
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
              <h2 class="heading text-success text-center"><?php echo $name?$name:"New Restaurant"; ?></h2>
              <p class="text-center"><?php echo $address?$address:"Address of Restaurant"; ?></p>
              <p class="text-center">Take your time to give feedback of your desire as per food, enviorment and service of quality of restaurant.</p><hr>
              <h2 class="heading text-center">Food, Enviorment and Services of Restaurant</h2>
              <br>
              <form action="" method="POST" class="text-center">
                <div class="form-group">
                  <label class="radio-inline">
                    <input type="radio" name="rating" id="inlineRadio1" value="e" required=""> Excellent
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="rating" id="inlineRadio2" value="g" required=""> Good
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="rating" id="inlineRadio3" value="a" required=""> Average
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="rating" id="inlineRadio4" value="b" required=""> Bad
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="rating" id="inlineRadio5" value="w" required=""> Worse
                  </label>
                </div>
                <br>
                <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-info">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>  

<?php include('partials/footer.php'); ?>
<?php endif; ?>