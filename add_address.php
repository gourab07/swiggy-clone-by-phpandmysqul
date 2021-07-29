<?php 
session_start();
$conn = mysqli_connect("localhost","root","","swiggy");

$user_id = $_SESSION['user_id'];
$street_address = $_POST['street_address'];
$landmark = $_POST['landmark'];
$city = $_POST['city'];
$state = $_POST['state'];
$pin = $_POST['pin'];
$contact_number = $_POST['contact_number'];
$order_id = $_POST['order_id'];

$query = "INSERT INTO address VALUES (NULL,$user_id,'$street_address','$landmark','$city','$state','$pin','$contact_number')";
if(mysqli_query($conn,$query)){
	header('Location:show_address.php?order_id='.$order_id.'');
}else{
	echo "Some error occured";
}
?>