<?php
session_start();
$conn = mysqli_connect("localhost","root","","swiggy");

$food_id = $_GET['food_id'];
$user_id = $_SESSION['user_id'];


$query = "DELETE FROM orderlist WHERE user_id = $user_id AND food_id = $food_id";

if(mysqli_query($conn,$query)){
	echo 1;
}else{
	echo 0;
}

?>