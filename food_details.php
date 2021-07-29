<?php
session_start();
$conn = mysqli_connect("localhost","root","","swiggy");

if(!empty($_SESSION)){
  $is_logged_in = 1;
}else{
  $is_logged_in = 0;
}

$food_id = $_GET['id'];

$query = "SELECT * FROM food WHERE food_id = $food_id";
$result = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($result);

$user_id = $_SESSION['user_id'];

$query2 = "SELECT * FROM orderlist WHERE user_id = $user_id AND food_id = $food_id";
$result2 = mysqli_query($conn,$query2);
$num_rows = mysqli_num_rows($result2);

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
   .box-img{
    width: 100%;
    height: 400px;
    border-radius: 20px;
    margin-top: 20px;
    box-shadow: 2px 10px 20px;
   }
   .box-title{
    margin-top: 20px;
    font-size: verdana;
   }
   #order-btn{
    width: 70px;
    height: 30px;
    border: none;
    background-color: darkorange;
    border-radius: 10px;
    font-weight: 500;
   }
   .img-rating{
     width: 130px;
    height: 25px;
    margin-top: 15px;
    margin-bottom:15px;
   }
   
  
  
  
</style>
<body>
  <div class="navigation">
    <nav class="navbar navbar-expand-sm">
      <img src="https://upload.wikimedia.org/wikipedia/en/thumb/1/12/Swiggy_logo.svg/1200px-Swiggy_logo.svg.png" class="logo">
       <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
              <a class="nav-link" href="manage_category.php"><b>Category</b></a>
              
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

  <div class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <img src="<?php echo $result['img_path']?>" class="box-img">
      </div>
      <div class="col-md-6">
        <h3 class="box-title"><?php echo $result['title']?></h3>
        <p>(<?php echo $result['category']?>)</p>
        <img src="<?php echo $result['rating']?>" class="img-rating">
        <h5 class="box-text">Rs- <?php echo $result['price']?></h5>
        <?php
        if($num_rows){
          echo '<button style="background-color:red">Ordered</button>';
        }else{
          echo '<button id="order-btn">Order</button>';
        } 
        ?>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#order-btn').click(function(){
        $.ajax({
          url: 'oderlist.php?food_id=' + <?php echo $food_id; ?>,
          method: 'GET',
          success: function(data){
            $('#order-btn').text('Ordered');
            $('#order-btn').css('background-color','red');
          },
          error: function(error){
            console.log(error);
          }
        })
      })
    })
  </script>



  </body>
  </html>