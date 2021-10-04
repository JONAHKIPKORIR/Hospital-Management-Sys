<?php 
session_start();
include 'include/connect.php';

if (isset($_POST['login'])) {
	$username=$_POST['uname'];
	$password=$_POST['pass'];

	$error=array();

	if (empty($username)) {
		$error['admin']="Enter Username";

	} else if (empty($password)) {
		$error['admin']="Enter Password";
	}


	if (count($error) ==0) {
		$query="SELECT * FROM admin WHERE username='$username' AND password='$password' ";
		$res=mysqli_query($conn,$query);


		if (mysqli_num_rows($res)) {
			echo "<script> alert('Successfully Lgged in As Admin')</script>";
			$_SESSION['admin']=$username;
			header('Location:admin/index.php  ');
		}

	else{
		echo "<script> alert('Invalid Username or Password')</script>";
	}


  }
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Login Page</title>
</head>
<?php 
	include 'include/header.php';

	 ?>
<body style="background-image: url(images/background-login.jpg); background-repeat: no-repeat; background-size: cover;">
	
<div style="margin-top: 50px;"></div>

<div class="container">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 jumbotron ">
				<form method="post" action="" >
					<img src="images/admin.jpg" >
					<div class="form-group">
						<div >
							<?php 
								if (isset($error['admin'])) {
									$sho=$error['admin'];

									$show="<h4 class='alert alert-danger'>$sho</h4>";

								}else{
									$show="";
								}
								echo $show;

							 ?>
							
						</div>

						<label>Username</label>
						<input type="text" name="uname" placeholder="Username" autocomplete="off" class="form-control">
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" name="pass" placeholder="Password"  class="form-control">
					</div>

					<input type="submit" name="login" value="Login" class="btn btn-success">
					
				</form>
			</div>
			<div class="col-md-3 " ></div>
		</div>
	</div>
</div>
</body>
</html>