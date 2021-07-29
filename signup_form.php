<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Signup</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet" >
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	
</head>
<style type="text/css">
	body{
		background-color: #0fbcf9;

	}
	.container{
		width: 800px;
		height: 400px;
		background: rgba(225, 225, 225, 0.4);
		border-radius: 25px;
		margin-top: 100px;
		box-shadow: 0px 0px 25px #535c68;
	}
	.box{
		background-color: #fff;
		width: 100%;
		height: 470px;
		margin-top: -35px;
		border-radius: 25px;
		box-shadow: 10px 10px 30px darkblue;
	}
	.text{
		color: #fff;
	}
	.login-details{
		padding-left: 20px;
		padding-right: 20px;
	}
	.btn{
		background-color: #f0932b;
		border: 1px solid black;
		border-radius: 20px;
	}
	.subtext{
		margin-top: 180px;
		width: 300px;
		background-color: rgba(225, 225, 225, 0.5);
		border-radius: 20px;
		display: inline-block;
		box-shadow: 0px 0px 15px #gray;
	}
	
	
	

</style>


<body>
	<div class="container col-12">
		<div class="row">
			<div class="col-6">
				<div class="box">
					<h3 class="text-center">Signup</h3>
					<form class="login-details mt-3" action="sig_validation.php" method="POST">
						<label>Name</label>
						<input type="name" name="name" placeholder="name" class="form-control"><br>
						<label>Username</label><br>
					    <input type="email" name="username" placeholder="username" class="form-control"><br>
					    <label>Password</label><br>
					    <input type="Password" name="password" placeholder="password" class="form-control"><br>
					    <input type="submit" value="Continue" class="btn btn-block">
					    <small>By continuing, you agree to <a href="">swiggy's Conditions</a> of Use and <a href="">Privacy Notice.</a></small><br><br>
					    <a href=""><small>Need help?</small></a>
					</form>
				</div>
			</div>
		    <div class="col-6 text text-center">
		    	<h4 class="mt-5">You wanna be our friend?</h4>
		    	<p class="subtext">Already have an account? <a href="login_form.php">Login</a></p>
		    </div>
		</div>
		
		
	</div>

</body>
</html>