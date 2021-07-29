<?php

session_start();

$conn = mysqli_connect("localhost","root","","swiggy");

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = "INSERT INTO users1 VALUES (NULL,'$name','$username','$password')";

$query1 = "SELECT * FROM users1 WHERE username LIKE '$username'";
$result = mysqli_query($conn,$query1);
$num_rows = mysqli_num_rows($result);

if($num_rows == 0){
	if(mysqli_query($conn,$query)){
		$query2 = "SELECT * FROM users1 WHERE username LIKE '$username'";
		$result2 = mysqli_query($conn,$query2);
		$result2_arr = mysqli_fetch_assoc($result2);
	    $_SESSION['name'] = $result2_arr['name'];
	    $_SESSION['user_id'] = $result2_arr['user_id'];
	    header('Location:index.php');
    }else{
	   echo "some error occured";
    }
}else{
	header('Location:signup_form.php?error=1');
}



?>