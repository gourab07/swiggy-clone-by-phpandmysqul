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
   .card{
     border-radius: 20px;
    width: 100%;
    height: 350px;
    margin-bottom: 20px;
   }
   .card_text{
    text-align: right;
    font-weight: 500;
    margin-right: 10px;
   }
   .images{
     border-radius: 20px;
    width: 100%;
    height: 320px;
    box-shadow: 2px 5px 20px;
   }
   .images:hover{

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
	<div class="jumbotron jumbotron-fluid">
      <div class="container mt-3">
         <h1 class="display-2 text-center">Are You Hungary?</h1>
         <p class="lead text-center mt-3">Don't lookout anywhere..... order now.</p>
      </div>
   </div>
   <h4 style="font-family: poppings; margin-left: 60px; margin-top: 20px;">Trainding</h4>
  
  <div class="container mt-5">
    <div class="row">
      <div class="col-3">
        <div class="card">
          <div class="card_body">
            <a href="trainding_category.php"><img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8&w=1000&q=80" class="images"></a>
            <p class="card_text">Hungry Pizza</p>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="card">
          <div class="card_body">
            <a href="trainding_category.php"><img src="https://images.unsplash.com/photo-1611309454921-16cef3438ee0?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTB8fGJ1cmdlcnN8ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80" class="images"></a>
            <p class="card_text">Mast Burger</p>
          </div>
        </div>
      </div>  
      <div class="col-3">
        <div class="card">
          <div class="card_body">
           <a href="trainding_category.php"><img src="https://img4.goodfon.com/wallpaper/nbig/1/49/pasta-spaghetti-pasta-spagetti-makarony.jpg" class="images"></a>
            <p class="card_text">Chatpati Pasta</p>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="card">
          <div class="card_body">
            <a href="trainding_category.php"><img src="https://images.unsplash.com/photo-1587206668283-c21d974993c3?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fHBhc3RhfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80" class="images"></a>
            <p class="card_text">Masala noodle</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  


</body>
</html>