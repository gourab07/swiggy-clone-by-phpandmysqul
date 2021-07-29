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
   body{
    background-color: #eee;
   }
   .text{
    font-family: verdana;
   }
   .card{
    border-radius: 20px;
    width: 100%;
    height: 350px;
    margin-bottom: 20px;
   }
   .card_text{
    font-weight: 500;
    margin-right: 10px;
    margin-bottom: 5px;
    margin-left: 20px;
    padding-right: 10px;
   }
   .card-title{
    text-align: right;
    padding-right: 10px;
   }
   .card-img{
    min-width: 100%;
    height: 190px;
    margin-bottom: 10px;
    margin-top: 10px;
    box-shadow: 2px 5px 20px;
   }
   .img-rating{
    width: 80px;
    height: 15px;
    margin-left: 20px;
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

<div class="container">
  <h3 class="text mt-5">Pizzas</h3>
  <div class="row mt-3">
  <?php
  $query = "SELECT * FROM category WHERE category LIKE '%pizza%'";
  $result = mysqli_query($conn,$query);
  while ($row = mysqli_fetch_assoc($result)){
    echo '<div class="col-3">
            <div class="card">
              <div class="card_body">
               <a href="category_details.php?id='.$row['food_id'].'"><img src="'.$row['img_path'].'" class="card-img"></a>
                <p class="card-title"><b>'.$row['title'].'</b></p>
                <img src="'.$row['rating'].'" class="img-rating">
                <p class="card_text">Rs- '.$row['price'].'</p>
              </div>
            </div>
          </div>';
      
  }
  

  ?>

  <div class="container">
  <h3 class="text mt-5">Burgers</h3>
  <div class="row mt-3">
  <?php
  $query = "SELECT * FROM category WHERE category LIKE '%burger%'";
  $result = mysqli_query($conn,$query);
  while ($row = mysqli_fetch_assoc($result)){
    echo '<div class="col-3">
            <div class="card">
              <div class="card_body">
               <a href="category_details.php?id='.$row['food_id'].'"><img src="'.$row['img_path'].'" class="card-img"></a>
                <p class="card-title"><b>'.$row['title'].'</b></p>
                <img src="'.$row['rating'].'" class="img-rating">
                <p class="card_text">Rs- '.$row['price'].'</p>
              </div>
            </div>
          </div>';
      
  }
  

  ?>

  <div class="container">
  <h3 class="text mt-5">Pastas</h3>
  <div class="row mt-3">
  <?php
  $query = "SELECT * FROM category WHERE category LIKE '%pasta%'";
  $result = mysqli_query($conn,$query);
  while ($row = mysqli_fetch_assoc($result)){
    echo '<div class="col-3">
            <div class="card">
              <div class="card_body">
               <a href="category_details.php?id='.$row['food_id'].'"><img src="'.$row['img_path'].'" class="card-img"></a>
                <p class="card-title"><b>'.$row['title'].'</b></p>
                <img src="'.$row['rating'].'" class="img-rating">
                <p class="card_text">Rs- '.$row['price'].'</p>
              </div>
            </div>
          </div>';
      
  }
  

  ?>

  <div class="container">
  <h3 class="text mt-5">Noodles</h3>
  <div class="row mt-3">
  <?php
  $query = "SELECT * FROM category WHERE category LIKE '%noodle%'";
  $result = mysqli_query($conn,$query);
  while ($row = mysqli_fetch_assoc($result)){
    echo '<div class="col-3">
            <div class="card">
              <div class="card_body">
               <a href="category_details.php?id='.$row['food_id'].'"><img src="'.$row['img_path'].'" class="card-img"></a>
                <p class="card-title"><b>'.$row['title'].'</b></p>
                <img src="'.$row['rating'].'" class="img-rating">
                <p class="card_text">Rs- '.$row['price'].'</p>
              </div>
            </div>
          </div>';
      
  }
  

  ?>