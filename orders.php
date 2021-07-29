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
   .btn-success{
    border: none;
    background-color: orange;
    border-radius: 15px;
    height: 50px;
    text-decoration: none;
    margin-left: 450px;
   }
   .btn-success:hover{
    background-color: darkorange;
    color: #000;
    font-weight: 500;
    box-shadow: 2px 2px 10px;
   }
   img{
    border-radius: 10px;
    box-shadow: 1px 2px 5px;
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
     <div class="col-8">
        <h3 class="mt-5 mb-5">My Orders</h3>
        
              <?php
              $conn = mysqli_connect("localhost","root","","swiggy");
              $user_id = $_SESSION['user_id'];


              //$query = "SELECT * FROM orders o JOIN order_details od ON o.order_id = od.order_id JOIN food f ON od.food_id = f.food_id WHERE o.user_id=$user_id";

              $query = "SELECT * FROM Orders WHERE user_id = $user_id";
              $result = mysqli_query($conn,$query);
              while($row = mysqli_fetch_assoc($result)){
                echo '<div class="card mb-3">
                      <div class="card_body" style="padding-left: 10px; padding-right: 10px;">
                        <div class="row">
                      <div class="col-12 mb-3">
                        <p>
                          Order Id- <b>'.$row['order_id'].'</b>
                          <span style="float: right;">Date- <b>'.$row['date'].'</b></span>
                        </p><hr>
                      </div>';
                      $curr_order_id = $row['order_id'];

                      $query2 = "SELECT * FROM order_details od JOIN category c ON od.food_id = c.food_id WHERE od.order_id = '$curr_order_id'";

                      $result2 = mysqli_query($conn,$query2);
                      while($row2 = mysqli_fetch_assoc($result2))
                      {
                        echo '<div class="col-4 mb-3">
                      <img src="'.$row2['img_path'].'" style="width:175px;height:120px">
                      </div>
                      <div class="col-8"><h5><a href="category_details.php?id='.$row2['food_id'].'">'.$row2['title'].'</a><br><span class="lead" style="font-size:15px;">'.$row2['price'].'</span></h5>
                       <span class="lead" style="font-size:15px;">Quantity- '.$row2['quantity'].'</span></h5>
                      </div>';
                      }

                      $query3 = "SELECT * FROM order_details od JOIN food f ON od.food_id = f.food_id WHERE od.order_id = '$curr_order_id'";

                      $result3 = mysqli_query($conn,$query3);
                      while($row3 = mysqli_fetch_assoc($result3))
                      {
                        echo '<div class="col-4 mb-3">
                      <img src="'.$row3['img_path'].'" style="width:175px;height:120px">
                      </div>
                      <div class="col-8"><h5><a href="food_details.php?id='.$row3['food_id'].'">'.$row3['title'].'</a><br><span class="lead" style="font-size:15px;">'.$row3['price'].'</span></h5>
                      <span class="lead" style="font-size:15px;">Quantity- '.$row3['quantity'].'</span></h5>
                      </div>';
                      }
                      

                      echo '
                        <div class="col-12">
                        <p>Amount Paid- <b>'.$row['amount'].'</b></p>
                      </div>
                    </div>
                  </div>
                </div>';
              }
              

              ?>
              
            
      </div>
    </div>
  </div>

</body>
</html>
