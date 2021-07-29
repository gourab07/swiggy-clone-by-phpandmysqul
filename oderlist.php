<?php
session_start();
$conn = mysqli_connect("localhost","root","","swiggy");

$food_id = $_GET['food_id'];
$user_id = $_SESSION['user_id'];

$query = "INSERT INTO orderlist VALUES (NULL,$user_id,$food_id,1)";

if(mysqli_query($conn,$query)){
	echo 1;
}else{
	echo 0;
}


?>

