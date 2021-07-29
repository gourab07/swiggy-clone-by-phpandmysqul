<?php
session_start();
$conn = mysqli_connect("localhost","root","","swiggy");

$food_id = $_GET['food_id'];
$quantity = $_GET['quantity'];
$user_id = $_SESSION['user_id'];
$sign = $_GET['sign'];
if($sign == '-'){
	$quantity = $quantity - 1;
}else{
	$quantity = $quantity + 1;
}

$query = "UPDATE orderlist SET quantity = $quantity WHERE user_id = $user_id AND food_id = $food_id";

if(mysqli_query($conn,$query)){
	echo 1;
}else{
	echo 0;
}

?>