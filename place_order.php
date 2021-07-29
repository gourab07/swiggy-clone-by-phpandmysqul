<?php 
session_start();
$conn = mysqli_connect("localhost","root","","swiggy");
date_default_timezone_set('Asia/Kolkata');

$order_id = uniqid();

$user_id = $_SESSION['user_id'];

$order_date = date("y/m/d h/i");



$query1 = "SELECT * FROM orderlist o JOIN food f  ON o.food_id = f.food_id WHERE o.user_id = $user_id";
$result = mysqli_query($conn,$query1);
$amount = 0;
while ($row = mysqli_fetch_assoc($result)){
	$amount = $amount + $row['price']*$row['quantity'];
}
$query = "INSERT INTO orders VALUES ('$order_id',$user_id,'$order_date','painding','none',$amount,0)";

if(mysqli_query($conn,$query)){
	$query3 = "SELECT * FROM orderlist o JOIN food f  ON o.food_id = f.food_id WHERE o.user_id = $user_id";
    $result1 = mysqli_query($conn,$query3);
	while($row = mysqli_fetch_assoc($result1)){
		$food_id = $row['food_id'];
		$quantity = $row['quantity'];
		$query2 = "INSERT INTO order_details VALUES (NULL,'$order_id',$food_id,$quantity)";
		mysqli_query($conn,$query2);
		header('Location:show_address.php?order_id='.$order_id);
	}
}else{
	echo "Failed";
	echo $query;
}

?>


