<?php
/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/

include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="bootstrap-3.3.7-dist/js/jquery.min.js"></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<style type="text/css">
	.Active-box{
		background: beige;
		border-radius: 6px;
		border: 2px gainsboro solid;
		box-shadow: 0 0 20px #f0f1d5;
	}

</style>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Fund Managment Home</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="edit-profile.php">Edit Profile</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-offset-5 col-md-3">
			<h2>Welcome <?php echo $_SESSION['username']; ?>!</h2>
		</div>
	</div>
	<center><img src="css/fundraising-fb.jpg" style="width: 50em;" /></center>
	<br /><br />
	<center><a href="#">RUSTAM AND ANMOL PRODUCTION</a></center>
</div>
</body>
</html>
