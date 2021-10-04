<?php 
session_start();
include '../include/connect.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">


	<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<script type="text/javascript" src=""></script>
</head>
<body>
	

    <nav class="navbar navbar-expand-lg navbar-info bg-info">
		<h5 class="text-white">Hospital Management System</h5>
		<div class="mr-auto"></div>

		

		<ul class="navbar-nav">
			<?php 
				if (isset($_SESSION['admin']))
				 {
				 	$user=$_SESSION['admin'];
					echo '
					<li class="nav-item"><a href="#" class="nav-link text-white">' .$user. '</a></li>
					<li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li';
				 }else{
				 	echo '
				 		<li class="nav-item"><a href="adminlogin.php" class="nav-link text-white">Admin</a></li>
						<li class="nav-item"><a href="#" class="nav-link text-white">Doctor</a></li>
						<li class="nav-item"><a href="#" class="nav-link text-white">Patient</a></li>';
				 }

		 	?>
			
		</ul>
		
	</nav>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<?php 	
				include 'sidenav.php';
			
 
				 ?>
				<div class="col-md-10">

					<h4 class="my-2">Admin Dashboard</h4>
					

					<div class="col-md-12 my-3 mx-5">
						<div class="row">
							<div class="col-md-3 bg-success" style="height: 120px; margin-right: 10px;    margin-top: 10px; ">

								<div class="col-md-12  text-white">
									<div class="row">
										<?php 
										$admin=mysqli_query($conn,"SELECT * FROM admin ");
										$num=mysqli_num_rows($admin);


										 ?>
									<div class="col-md-7">
										<h5><?php echo $num; ?></h5>
										<h5>Total</h5>
										<h5>Admin</h5>
									</div>
									<div class="col-md-5">
										<a href="admin.php"><img src="../images/admin_icon.jpg" style="width:50px; height:50px; border-radius: 50%; margin-top: 20%;"></a>
									</div>

									</div>
								</div>
								
							</div>

							<div class="col-md-3 bg-success" style="height: 120px; margin-right: 10px;  margin-top: 10px;">
								<div class="col-md-12 text-white">
									<div class="row">
									<div class="col-md-7">
										<h5>1</h5>
										<h5>Total</h5>
										<h5>Doctors</h5>
									</div>
									<div class="col-md-5">
										<img src="../images/doctor_icon.jpg" style="width:50px; height:50px; border-radius: 50%; margin-top: 20%;">
									</div>

									</div>
								</div>
								
							</div>

							<div class="col-md-3 bg-success" style="height: 120px; margin-right: 10px;  margin-top: 10px;">
								<div class="col-md-12 text-white">
									<div class="row">
									<div class="col-md-7">
										<h5>1</h5>
										<h5>Total</h5>
										<h5>Patients</h5>
									</div>
									<div class="col-md-5">
										<img src="../images/patient_icon.jpg" style="width:50px; height:50px; border-radius: 50%; margin-top: 20%;">
									</div>
									</div>
								</div>
								
							</div>


							<div class="col-md-3 bg-success" style="height: 120px; margin-right: 10px;    margin-top: 10px; ">
								<div class="col-md-12 text-white">
									<div class="row">
									<div class="col-md-7">
										<h5>1</h5>
										<h5>Total</h5>
										<h5>Reports</h5>
									</div>
									<div class="col-md-5">
										<img src="../images/reports_icon.png" style="width:50px; height:50px; border-radius: 50%; margin-top: 20%;">
									</div>
									</div>
								</div>
								
							</div>

							<div class="col-md-3 bg-success" style="height: 120px; margin-right: 10px;  margin-top: 10px;">
								<div class="col-md-12 text-white">
									<div class="row">
									<div class="col-md-7">
										<h5>1</h5>
										<h5>Total</h5>
										<h5>Job Requests</h5>
									</div>
									<div class="col-md-5">
										<img src="../images/job_requests_icon.png" style="width:50px; height:50px; border-radius: 50%; margin-top: 20%;">
									</div> 
									</div>
								</div>
								
							</div>

							<div class="col-md-3 bg-success" style="height: 120px; margin-right: 10px;  margin-top: 10px;">
								<div class="col-md-12 text-white">
									<div class="row">
									<div class="col-md-7">
										<h5>1</h5>
										<h5>Total</h5>
										<h5>Income</h5>
									</div>
									<div class="col-md-5">
										<img src="../images/income_icon.jpg" style="width:50px; height:50px; border-radius: 50%; margin-top: 20%;">
									</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>