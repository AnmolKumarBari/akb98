<?php
include("auth.php"); 
	require('db.php');
	error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Raise Fund</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="bootstrap-3.3.7-dist/js/jquery.min.js"></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body>
<?php

include("auth.php"); 
	require('db.php');
	$username=$_SESSION['username'];
	 $query = "SELECT * FROM `users` WHERE username='$username'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
		while ($row=mysqli_fetch_assoc($result)) {
			# code...
			$mobile=$row['mobile'];
			 $thruorg=$row['org'];
			 $email=$row['email'];
		}


 $hola = "SELECT SUM(total_amount) as totamt FROM `payment_det` WHERE username='$username'";
		$rss = mysqli_query($con,$hola) or die(mysql_error());
		$rws = mysqli_num_rows($rss);
		while ($rw=mysqli_fetch_assoc($rss)) {
			# code...
			 $amt=$rw['totamt'];		 
		}

$py = "SELECT MAX(total_amount) as max_amt FROM `payment_det` WHERE username='$username' LIMIT 1";
		$sss = mysqli_query($con,$py) or die(mysql_error());
		$ss = mysqli_num_rows($rss);
		while ($ssb=mysqli_fetch_assoc($sss)) {
			# code...
			  $tot=$ssb['max_amt'];	
		}


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

	

         $query = "INSERT into `raisefund` (username,org,title,descs,amount,phone,email,thruorg) VALUES ('$username', '$org', '$title','$desc','$amount','$mobile','$email','$thruorg')";
        $result = mysqli_query($con,$query);
          $ammt=$tot-$amount;
        $qr = "UPDATE payment_det set total_amount='$ammt' WHERE total_amount='$tot' and username='$username' LIMIT 1";
        $hos = mysqli_query($con,$qr);

         $qrr = "INSERT into `made_payment` (username,toorg,amount,debitthru,status) VALUES ('$username', '$org', '$amount','Debit Card','Sent')";
        $bhr = mysqli_query($con,$qrr);
        if($result){
            echo "<div class='form'><h3>Your Fund is  successfully sent to $org.</h3><br/>Click here to <a href='raisefund.php'>Request Another</a></div>";
        }
    }else{
?>
<?php
	
	if(isset($_POST['org'])){
		$value_c=$_POST['org'];


		echo $value_c;


		 

	}	


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

<div class="row">
  <div class="col-md-offset-4 col-md-4">
    <center><h1>Raise Funds </h1></center>
  </div>
</div>
<div class="row">
  <div class="col-md-offset-4 col-md-4">
    <center><a href="dashboard.php">Back to Dashboard</a></center>
  </div>
</div>
<center><p><a href="#">Available Balance INR:<b><?php echo $amt; ?> </b></a></p></center>
<form name="registration" action="catview.php" method="post">
	<center>
	<div class="row">
    <div class="col-md-offset-4 col-md-4">
<select name="org" class="hola" style="width: 220px;
    height: 40px;" required>
    <option value="">Select from Category</option>
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
<input type="submit" name="submit" value="Get selected values">
</div>
</div>
</center>
</form>


<!-- <input type="text" name="amount" placeholder="Amounts" required />

<input type="submit" name="submit" value="Send Now" /> -->

<br /><br />


</div>
<?php } ?>
</body>
</html>
