

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Profile</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="bootstrap-3.3.7-dist/js/jquery.min.js"></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include("auth.php"); //include auth.php file on all secure pages 

	require('db.php');
 $username=$_SESSION['username'];
	   $qr = "SELECT * FROM `users` WHERE username='$username'";
		$rsss = mysqli_query($con,$qr) or die(mysql_error());
		$rws = mysqli_num_rows($rsss);
		while ($rw=mysqli_fetch_assoc($rsss)) {
			# code...
			$name=$rw['full_name'];
			$address=$rw['address'];
			$mobile=$rw['mobile'];
			$org=$rw['org'];
			$email=$rw['email'];
		}
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['full_name'])){
		$full_name = stripslashes($_REQUEST['full_name']); // removes backslashes
	$full_name = mysqli_real_escape_string($con,$full_name);

	
		$addre = stripslashes($_REQUEST['address']); // removes backslashes
		$addre = mysqli_real_escape_string($con,$addre);

		$mobiles = stripslashes($_REQUEST['mobile']); // removes backslashes
		 $mobiles = mysqli_real_escape_string($con,$mobiles);
		

		$orgss = stripslashes($_REQUEST['org']); // removes backslashes
		$orgss = mysqli_real_escape_string($con,$orgss);

		$emails = stripslashes($_REQUEST['email']);
		$emails = mysqli_real_escape_string($con,$emails);
	

          $query = "UPDATE `users` SET full_name='$full_name',address='$addre',mobile='$mobiles',org='$orgss',email='$emails' WHERE username='$username'";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>You are Profile is updated successfully.</h3><br/>Click here to <a href='edit-profile.php'>Go Back</a></div>";
        }
    }else{
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Fund Managment Home</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li class="active"><a href="#">Edit Profile</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>

<div class="row">
  <div class="col-md-offset-4 col-md-4">
    <center><h1>Edit Profile </h1></center>
  </div>
</div>


<bR><br>
<form name="registration" action="" method="post">
<center>
	<div class="row">
    	<div class="col-md-offset-4 col-md-4">
			Name:  <input type="text" name="full_name" placeholder="Full Name" value="<?php echo $name; ?>" >
		</div>
	</div>
	<div class="row">
    	<div class="col-md-offset-4 col-md-4">
			Address:<input type="text" name="address" placeholder="Address" value="<?php echo $address; ?>" />
		</div>
	</div>
	<div class="row">
    	<div class="col-md-offset-4 col-md-4">
			Mobile:<input type="text" name="mobile" placeholder="Phone Number" value="<?php echo $mobile; ?>" />
		</div>
	</div>
	<div class="row">
    	<div class="col-md-offset-4 col-md-4">
			Orgn:<input type="text" name="org" placeholder="Organization" value="<?php echo $org; ?>" />
		</div>
	</div>
	<div class="row">
    	<div class="col-md-offset-4 col-md-4">
			Email:<input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" />
		</div>
	</div>
	<div class="row">
    	<div class="col-md-offset-4 col-md-4">
			<input type="submit" name="submit" value="Update " />
		</div>
	</div>
</center>
</form>
<br /><br />


</div>
<?php } ?>
</body>
</html>
