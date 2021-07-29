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
	<title>swiggy</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet" >
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
   <link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</head>
<style type="text/css">
	#foot{
		background-color: darkred;
		color: #fff;
	}
	.footer_box{
		margin-left: 20px;
	}
	.search_text{
		font-family: popping;
		display: inline-block;
	}
	.search-btn{
		margin-left: 25px;
	}
</style>

<body>
	<div class="col-12">
		<div class="row">
		<div class="main-bar col-7">
			<nav class="navbar navbar-expand-lg bg-white mt-4">
                <a class="navbar-brand" href="#">
                	<img src="https://upload.wikimedia.org/wikipedia/en/thumb/1/12/Swiggy_logo.svg/1200px-Swiggy_logo.svg.png">
                </a>
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
                
            </nav>

            <div class="container mt-4">
		        <h1>Let night at office?</h1>
		        <h4 class="text-muted">Order food from favourite resturent near you.</h4><br><br>
		        <h5 class="search_text text-muted">You want to fight with your hunger enemy then</h5>
		        <a href="order_food.php"><input class="search-btn" type="button" name="" value="FIND FOOD"><br><br><br></a>

		        <p class="text-muted">POPULAR CITIES IN INDIA</p>
		        <p>Ahmedabad,Bangalore,Chennai,Delhi,Gurgaon,Hyderabad,Kolkata,Mumbai,Pune & more.</p>
 
	        </div>
		</div>
		<div class="side-img col-5">
			<img class="nav_img" src="https://res.cloudinary.com/swiggy/image/upload/fl_lossy,f_auto,q_auto,h_1340/Lunch1-new_douhad">
		</div>
	    </div>
	</div>

	<div class="container2 text-center col-12">
		<div class="row">
			<div class="col-md-4">
				<img src="https://res.cloudinary.com/swiggy/image/upload/fl_lossy,f_auto,q_auto,w_210,h_398/4x_-_No_min_order_x0bxuf">
				<div class="text-4">
				    <h5>No Minimum Order</h5>
				    <p class="text-muted">Order in for yourself or for the group,<br> with no restrictions on order value</p>
				</div>
			</div>
			<div class="col-md-4">
				<img src="https://res.cloudinary.com/swiggy/image/upload/fl_lossy,f_auto,q_auto,w_224,h_412/4x_Live_order_zzotwy">
				<div class="text-4">
				    <h5>Live Order Tracking</h5>
				    <p class="text-muted">Know where your order is at all times,<br> from the restaurant to your doorstep</p>
			    </div>
			</div>
			<div class="col-md-4">
				<img src="https://res.cloudinary.com/swiggy/image/upload/fl_lossy,f_auto,q_auto,w_248,h_376/4x_-_Super_fast_delivery_awv7sn">
				<div class="text-4">
					<h5>Lightning-Fast Delivery</h5>
				    <p class="text-muted">Experience Swiggy's superfast delivery<br> for food delivered fresh & on time</p>
				</div>
				
			</div>
		</div>
	</div>

	<div class="container3">
		<div class="col-12">
			<div class="row">
				<div class=" text-5 col-6">
					<h1><b>Restaurants in<br> your pocket</b></h1><br>
					<h5 class="text-muted">Order from your favorite restaurants & track<br> on the go, with the all-new Swiggy app.</h5>
					<a href="https://play.google.com/store/apps/details?id=in.swiggy.android"><img src="https://res.cloudinary.com/swiggy/image/upload/fl_lossy,f_auto,q_auto,h_108/play_ip0jfp"></a>
					<a href="https://apps.apple.com/in/app/swiggy-food-order-delivery/id989540920"><img src="https://res.cloudinary.com/swiggy/image/upload/fl_lossy,f_auto,q_auto,h_108/iOS_ajgrty"></a>
				</div>
				<div class=" mobile-img col-3">
				    <img id="img1" src="https://res.cloudinary.com/swiggy/image/upload/fl_lossy,f_auto,q_auto,w_768,h_978/pixel_wbdy4n">
	     		</div>
				<div class=" mobile-img col-3">
				    <img id="img2" src="https://res.cloudinary.com/swiggy/image/upload/fl_lossy,f_auto,q_auto,w_768,h_978/iPhone_wgconp_j0d1fn">
			    </div>
			</div>
		</div>
	</div>

	<section id="foot">
		
			<div class="row">
				<div class="col-md-4 footer_box">
					<a class="navbar-brand" href="#">
            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/1/12/Swiggy_logo.svg/1200px-Swiggy_logo.svg.png">
          </a>
					<p>You are hungry then look at our website. you will find something new for you.</p>
				</div>
				<div class="col-md-3 footer_box">
					<p><b>CONTACT US</b></p>
				    <p>SWIGGY, Kolkata</p>
				    <p>91+ 9474000111</p>
				    <p>xyz@gmail.com</p>
				</div>
				<div class="col-md-4 footer_box">
					<p>SUBSCRIBE TO BECAME PRIME</p>
					<input type="email" name="form-control" placeholder=" your email"><br><br>
					<button type="button" class="btn btn-primary">SUBSCRIBE</button>
				</div>
			</div>
			<hr>
			<p class="copyright">wbesite crafted by Gourab Akhuli</p>
		
	</section>


 </body>
</html>