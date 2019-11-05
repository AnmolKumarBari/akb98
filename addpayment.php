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
    if (isset($_REQUEST['card'])){
    	$username=$_SESSION['username'];
		$card = stripslashes($_REQUEST['card']); // removes backslashes
		$card = mysqli_real_escape_string($con,$card); //escapes special characters in a string
		$exp = stripslashes($_REQUEST['exp']); // removes backslashes
		$exp = mysqli_real_escape_string($con,$exp);
		$cvv = stripslashes($_REQUEST['cvv']); // removes backslashes
		$cvv = mysqli_real_escape_string($con,$cvv);

	

	

         $query = "INSERT into `payment_det` (username,card_no,exp_date,cvv,total_amount) VALUES ('$username', '$card', '$exp','$cvv','50000')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>Your Payment Details is  successfully Added.</h3><br/>Click here to <a href='addpayment.php'>Add Another</a></div>";
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
            <input type="text" name="card" placeholder="Card No"  required />
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <input type="text" name="exp" placeholder="Expiry Date (eg:05/2024)" required />
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <input type="text" name="cvv" placeholder="CVV" required />
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
      
     $query= "SELECT * FROM payment_det WHERE username='$username' ";
       $result= mysqli_query($con,$query);
    $row=$result->num_rows;
  
?>
<?php
    if ($row>0){
       echo'<table border=1>';
     echo "<table class='r_table'border='2' style='border-width: 10px;
    border-color: antiquewhite;'><tr>
            <th>Card NO</th>
            <th>Expiry Date</th>
            <th>CVV</th>
            <th>Balance INR</th>
            <th>Status</th>
            <th>Action</th>
          
          
            </tr><tr>";
    
for ($i=0; $i<$row; ++$i)
{
	$idd=$result->fetch_assoc()['id'];
echo'<tr>'; 
	$result->data_seek($i);
	 echo '<td>'. $result->fetch_assoc()['card_no'].'</td>';
	$result->data_seek($i);
    echo '<td>'. $result->fetch_assoc()['exp_date'].'</td>';
	$result->data_seek($i);
	echo '<td>'. $result->fetch_assoc()['cvv'].'</td> <br>';
	$result->data_seek($i);
	echo '<td>'. $result->fetch_assoc()['total_amount'].' </td> <br>';
	echo '<td>Active</td>';
    $result->data_seek($i);
 echo "<td><a href='deletecard.php?id=".$result->fetch_assoc()['id']."'>Delete</a></td> <br>";
    $result->data_seek($i);


}
}
echo'</table>';
         ?>  


</div>
<?php } ?>
</body>
</html>
