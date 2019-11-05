<?php

include("auth.php"); 
	require('db.php');
	error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add Payment Details</title>
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
    if (isset($_REQUEST['accno'])){
    	$username=$_SESSION['username'];
		$accno = stripslashes($_REQUEST['accno']); // removes backslashes
		$accno = mysqli_real_escape_string($con,$accno); //escapes special characters in a string
		$bankname = stripslashes($_REQUEST['bankname']); // removes backslashes
		$bankname = mysqli_real_escape_string($con,$bankname);
		$ifsccode = stripslashes($_REQUEST['ifsccode']); // removes backslashes
		$ifsccode = mysqli_real_escape_string($con,$ifsccode);

	

	

          $query = "INSERT into `bank_det` (username,accno,bankname,ifsccode,balance) VALUES ('$username', '$accno', '$bankname','$ifsccode','0')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>Your Bank Details is  successfully Added.</h3><br/>Click here to <a href='addbank.php'>Add Another</a></div>";
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

<div class="row">
  <div class="col-md-offset-4 col-md-4">
    <center><h1>Add Payment Details </h1></center>
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
      <input type="text" name="accno" placeholder="Account No"  required />
    </div>
  </div>
<div class="row">
    <div class="col-md-offset-4 col-md-4">
      <input type="text" name="bankname" placeholder="Bank Name" required />
    </div>
  </div>
<div class="row">
    <div class="col-md-offset-4 col-md-4">
      <input type="text" name="ifsccode" placeholder="IFSC Code" required />
    </div>
  </div>
<div class="row">
    <div class="col-md-offset-4 col-md-4">
      <input type="submit" name="submit" value="Add Now" />
    </div>
  </div>
  </center>
</form>
<br /><br />

<?php

      $username=$_SESSION['username'];
      
     $query= "SELECT * FROM bank_det WHERE username='$username' ";
       $result= mysqli_query($con,$query);
    $row=$result->num_rows;
  
?>
<?php
    if ($row>0){
       echo'<table border=1>';
     echo "<table class='r_table'border='2' style='border-width: 10px;
    border-color: antiquewhite;'><tr>
            <th>Account Number</th>
            <th>Bank Name</th>
            <th>IFSC Code</th>
            <th>Balance INR</th>
            <th>Status</th>
          
          
            </tr><tr>";
    
for ($i=0; $i<$row; ++$i)
{
	$idd=$result->fetch_assoc()['id'];
echo'<tr>'; 
	$result->data_seek($i);
	 echo '<td>'. $result->fetch_assoc()['accno'].'</td>';
	$result->data_seek($i);
    echo '<td>'. $result->fetch_assoc()['bankname'].'</td>';
	$result->data_seek($i);
	echo '<td>'. $result->fetch_assoc()['ifsccode'].'</td> <br>';
	$result->data_seek($i);
	echo '<td>'. $result->fetch_assoc()['balance'].' </td> <br>';
	echo '<td>Active</td>';
 

}
}
echo'</table>';
         ?>  

 <center><a href="#">RUSTAM AND ANMOL PRODUCTION</a></center>
</div>
<?php } ?>
</body>
</html>
