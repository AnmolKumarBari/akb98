 <?php
include("auth.php"); 
	require('db.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Request Fund</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="bootstrap-3.3.7-dist/js/jquery.min.js"></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include("auth.php"); 
	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['org'])){
    	$username=$_SESSION['username'];
		$org = stripslashes($_REQUEST['org']); // removes backslashes
		$org = mysqli_real_escape_string($con,$org); //escapes special characters in a string
		$title = stripslashes($_REQUEST['title']); // removes backslashes
		$title = mysqli_real_escape_string($con,$title);
		$desc = stripslashes($_REQUEST['desc']); // removes backslashes
		$desc = mysqli_real_escape_string($con,$desc);

		$amount = stripslashes($_REQUEST['amount']); // removes backslashes
		$amount = mysqli_real_escape_string($con,$amount);

		$mobile = stripslashes($_REQUEST['mobile']); // removes backslashes
		$mobile = mysqli_real_escape_string($con,$mobile);

	

         $query = "INSERT into `requestfund` (username,org,title,descs,amount,phone,status) VALUES ('$username', '$org', '$title','$desc','$amount','$mobile','Pending')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>Your Request is  successfully sent to $org.</h3><br/>Click here to <a href='requestfund.php'>Request Another</a></div>";
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
      <li class="active"><a href="#">Dashboard</a></li>
      <li><a href="edit-profile.php">Edit Profile</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>

<div class="container-fluid">
<br><br><br>
<div class="row">
	<div class="col-md-offset-4 col-md-4">
		<center><h1>Request Funds </h1></center>
	</div>
</div>
<div class="row">
	<div class="col-md-offset-4 col-md-4">
		<center><a href="dashboard.php">Back to Dashboard</a></center>
	</div>
</div>

<form name="registration" action="" method="post">
	<center>
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
		<select name="org" class="hola" style="width: 220px;
    height: 40px;" required>
    	<option value="">Select Category</option>
		<option value="Education">Education</option>
		<option value="Health">Health</option>
		<option value="NGO">NGO</option>
		<option value="Relief">Relief</option>
		<option value="Individual">Individual</option>
		<option value="Group">Group</option>
		<option value="Artist">Artist</option>
		<option value="Developer">Developer</option>
		<option value="Others">Others</option>
		</select>
		</div>
		</div>
		<div class="row">
			<div class="col-md-offset-4 col-md-4">
				<input type="text" name="title" placeholder="Subject" required />
			</div>
		</div>

		<div class="row">
			<div class="col-md-offset-4 col-md-4">
				<input type="text" name="desc" placeholder="Description" required />
			</div>
		</div>
		<div class="row">
			<div class="col-md-offset-4 col-md-4">
				<input type="text" name="amount" placeholder="Amounts" required />
			</div>
		</div>
		<div class="row">
			<div class="col-md-offset-4 col-md-4">
				<input type="text" name="mobile" placeholder="Phone Number" required />
			</div>
		</div>
		<div class="row">
			<div class="col-md-offset-4 col-md-4">
				<input type="submit" name="submit" value="Request Now" />
			</div>
		</div>
		</center>
</form>
<br /><br />


</div>
<?php } ?>
</body>
</html>
