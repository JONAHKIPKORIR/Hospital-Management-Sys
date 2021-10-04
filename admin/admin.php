<?php session_start();
error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin</title>
</head>
<body>

	<?php 
	include '../include/header.php';
	 ?>
	 <div class="container-fluid">
	 	<div class="col-md-12">
	 		<div class="row" >
	 			
	 			<?php include 'sidenav.php';
	 					include '../include/connect.php';
	 					 ?>

	 			<div class="col-md-9">

	 			    <div class="col-md-12">
	 			    	<div class="row">
	 			    		<div class="col-md-6">
	 			    			<h5>All Admin</h5>

	 			    			<table class="table table-responsive table bordered">
	 			    				<th>Id</th>
	 			    				<th>Username</th>
	 			    				<th>Action</th>


	 			    				<?php 
	 			    				$admin=$_SESSION['admin'];
	 			    				$query="SELECT * FROM admin WHERE username !='$admin'";
	 			    				$res=mysqli_query($conn,$query);
	 			    				$output="";

	 			    				if (mysqli_num_rows($res) <1) {
	 			    					$output .= "<tr><td><h4 class='text-center'>No New Admin</h4></td></tr>";
	 			    				}

	 			    				while ($row=mysqli_fetch_array($res)) {
	 			    					$id=$row['id'];
	 			    					$username=$row['username'];

	 			    					$output .="<tr>
					 			    					<td>$id</td>
					 			    					<td>$username</td>
														 <td>
					 			    					<a href='admin.php?id= $id'><button id='remove' class='btn btn-danger'>Remove</button></a>
														 </td>

														 


	 			    				


	 			    				 

										
	 			    								</tr>";
									 }
									 
									 echo  $output;

									 if (isset($_GET['id'])) {
										$id=$_GET['id'];

										$query="DELETE FROM admin WHERE id='$id'";
										$res=mysqli_query($conn,$query);

										if ($res) {
											echo "<script>'<td>$username Successfully deleted</td>'</script>";
											header('location:admin.php');
										}
									 }
	
									 
	 			    				?>
	 			    			</table>


								
	 			    		</div>

	 			    		<div class="col-md-6">
	 			    			<?php 

	 			    			if (isset($_POST['add'])) {
	 			    				$uname=$_POST['uname'];
	 			    				$pass=$_POST['pass'];
	 			    				$image=$_FILES['img']['profile'];

	 			    				$error=array();

	 			    				if (empty($uname)) {
	 			    					$error['u']="Enter Admin Username";
	 			    				}
	 			    				elseif (empty($pass)) {
	 			    					$error['u']="Enter Admin Password";
	 			    				}
									 /*=====

	 			    				elseif (empty($image)) {
	 			    					$error['u']="Enter Admin Picture";
	 			    				}
									 */

	 			    				if (count($error)==0) {
	 			    					$query="INSERT INTO admin (username, password, profile) VALUES('$uname', '$pass', '$image')";
	 			    					$res=mysqli_query($conn,$query);

	 			    					if ($res) {
	 			    						move_uploaded_file($_FILES['img']['tmp_name'], "img/$image");
											 header('location:admin.php');
	 			    					}




	 			    					
	 			    				}
	 			    				else{

	 			    				}
	 			    			}

								 if (isset($_POST['id'])) {

									$id=$_POST['id'];
									$query="DELETE FROM admin WHERE id='$id'";
									mysqli_query($conn,$query);
								 }

	 			    			 ?>
	 			    			<h5>Add Admin</h5>
	 			    			<form method="POST" action="" enctype="" >

	 			    				<div class="form-group">
	 			    					<?php if (isset($error['u'])) {  ?>
	 			    						<div class="bg-danger"><?php  echo  $error['u']; 

	 			    						?></div>
	 			    					<?php	
	 			    					}
	 			    					else{

	 			    					} ?>
	 			    				</div>
	 			    				<div class="form-group">
	 			    					<label>Username</label>
	 			    					<input type="text" name="uname" placeholder="Username" class="form-control" value="" autocomplete="off">
	 			    				</div>
	 			    				<div class="form-group">
	 			    					<label>Password</label>
	 			    					<input type="password" name="pass" placeholder="Password" class="form-control">
	 			    				</div>
									 <!-------
	 			    				<div class="form-group">
	 			    					<label>Add Picture</label>
	 			    					<input type="file" name="img" class="form-control" >
	 			    				</div>

									 --->
	 			    				<div class="form-group">
	 			    					<input type="submit" name="add"  class="btn btn-success" value="Add New Admin" style="margin-top: 20px">
	 			    				</div>

	 			    				
	 			    			</form>
	 			    		</div>
	 			    	</div>
	 			    </div>	
	 					
	 				

	 				
	 			</div>
	 		</div>
	 	</div>
	 </div>
</body>
</html>