<?php
session_start();
$conn = mysqli_connect("localhost","root","","swiggy");

if(!empty($_SESSION)){
  $is_logged_in = 1;
}else{
  $is_logged_in = 0;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>order now</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet" >
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </head>
  <style type="text/css">
    .navbar{
    background-color: darkred;
    color: #fff;
  }
  .logo{
    margin-left: 30px;
    height: 40px;
  }
  .nav-link{
    color: #fff;
    font-weight: 500;
    font-size: 15px;
    margin-left: 20px;
  }
  .nav-link:hover{
    color: yellow;
  }
  .jumbotron{
     background-color: lightyellow;
     margin-bottom: 0;
   }
   #address{
    border: 1px solid black;
    border-radius: 15px;
    padding-left: 20px;
    padding-top: 10px;
    background-color: lightyellow;
    box-shadow: 2px 5px 10px;
    font-weight: 500;
   }
   .btn-address{
    margin-top: 130px;
    background-color: orange;
    border: none;
    border-radius: 10px;
    height: 30px;
   }
   .btn-address:hover{
    background-color: darkorange;
    color: #000;
    font-weight: 500;
    box-shadow: 2px 2px 10px;
   }
   .btn_select{
    border: none;
    background-color: orange;
    border-radius: 15px;
    height: 30px;
    float: right;
    margin-top: 30px;
   }
   .btn_select:hover{
    background-color: darkorange;
    color: #000;
    font-weight: 500;
    box-shadow: 2px 2px 10px;
   }
   
</style>
<body>
  <div class="navigation">
    <nav class="navbar navbar-expand-sm">
      <img src="https://upload.wikimedia.org/wikipedia/en/thumb/1/12/Swiggy_logo.svg/1200px-Swiggy_logo.svg.png" class="logo">
       <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
              
               <?php
                if($is_logged_in){
                  echo '<div class="dropdown ml-auto">
                                <button class="btn dropdown-toggle" style="background-color: #ddd; color: #000; border-radius: 20px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>
                                 '."Hi ".$_SESSION['name'].'</b>
                                </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="orders.php">My Oders</a>
                                       <a class="dropdown-item" href="order_list.php">Oderlist</a>
                                       <a class="dropdown-item" href="logout.php">Logout</a>
                                    </div>

                                ';
                }else{
                  echo '<button class="navbar-toggler" type="button" data-toggle="collapse"data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon" style="background-color: orange; border-radius: 50%;"></span>
                            </button>
                                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                    <div class="navbar-nav ml-auto">
                                        <a class="nav-link" href="login_form.php"><b>Login</b></a>
                                        <a class="nav-link" href="signup_form.php"><b>Signup</b></a>
                                    </div>
                                </div>';
                }

                ?>
          </div>
      </div>
    </nav>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-6">
      <h4 class="mt-5 mb-5">Your Address</h4>
      <div id="address">
        <form action="select_payment_mode.php" method="POST">
      <?php
       $conn = mysqli_connect("localhost","root","","swiggy");
       $user_id = $_SESSION['user_id'];
       $query = "SELECT * FROM address WHERE user_id = $user_id";
       $result = mysqli_query($conn,$query);
       while($row = mysqli_fetch_assoc($result)){
        echo '<input  type="radio" name="x" class="mr-3" value="'.$row['address_id'].'"><span>
                '.$row['street_address'].'<br>
                '.$row['landmark'].'<br>
                '.$row['city'].', '.$row['state'].'<br>
                Pin- '.$row['pin'].'<br>
                Ph no- '.$row['contact_number'].'</span><br><br>
                ';
        }
        ?>
        <input type="hidden" name="order_id" value="<?php echo $_GET['order_id'];?>">

        <input type="submit" value="select address" name="" id="select_address" class="btn_select">
        </form>
        </div>
         <hr>
        
        
      </div>
      <div class="col-6">
        <button class="btn-address" data-toggle="modal" data-target="#exampleModalCenter">Add new Address</button>
      </div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Address</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="add_address.php" method="POST">
                  <label>Street Adress</label><br>
                  <textarea name="street_address" class="form-control"></textarea><br>
                  <label>Landmark</label><br>
                  <textarea name="landmark" class="form-control"></textarea><br>
                  <label>City</label><br>
                  <input class="form-control" type="text" name="city"><br>
                  <label>State</label><br>
                  <input class="form-control" type="text" name="state"><br>
                  <label>Pin code</label><br>
                  <input class="form-control" type="text" name="pin"><br>
                  <label>Contact Number</label><br>

                  <input type="hidden" name="order_id" value="<?php echo $_GET['order_id'];?>">
                  <input class="form-control" type="text" name="contact_number"><br><br>
                  <input type="submit" value="Add Address" class="btn-address" style="margin-top: 10px;" name="">
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>



</body>
</html>
