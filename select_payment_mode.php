<?php
session_start();
$conn = mysqli_connect("localhost","root","","swiggy");

$address_id = $_POST['x'];
$order_id = $_POST['order_id'];

$query = "UPDATE orders SET address = $address_id WHERE order_id = '$order_id'";
if(mysqli_query($conn,$query)){
	header('location:payment_mode.php?order_id='.$order_id.'');
}else{
	echo $query;
	//header('Location:show_address.php?order_id='.$order_id);
}

?>