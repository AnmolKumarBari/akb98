<?php

require('db.php');
include("auth.php");
error_reporting(0); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard - Secured Page</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="bootstrap-3.3.7-dist/js/jquery.min.js"></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body>
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
<br><br><br><br>
<?php 
$type=$_SESSION['type'];
if($type==1){
echo "<div class='row'><div class='col-md-offset-4 col-md-1'><img src='css/money.png' style='width:1.5em; margin-left:5em;'/></div><div class='col-md-4'><p><a href='requestfund.php'>Request Fund</a></p></div></div>
<div class='row'><div class='col-md-offset-4 col-md-1'><img src='css/request.jpg' style='width:1.5em; margin-left:5em;'/></div><div class='col-md-4'><p><a href='viewrequest.php'>View Requested Funds</a></p></div></div>
<div class='row'><div class='col-md-offset-4 col-md-1'><img src='css/bank.jpg' style='width:1.5em; margin-left:5em;'/></div><div class='col-md-4'><p><a href='addbank.php'>Add Bank Details</a></p></div></div>";
}

else{
	echo "<div class='row'><div class='col-md-offset-4 col-md-1'><img src='css/money.png' style='width:1.5em; margin-left:5em;'/></div><div class='col-md-4'><p><a href='raisefund.php'> Fund</a></p></div></div>
<div class='row' style='display:none;'><div class='col-md-offset-4 col-md-1'><img src='css/request.jpg' style='width:1.5em; margin-left:5em;'/></div><div class='col-md-4'><p><a href='viewraised.php'>View  Funds</a></p></div></div>
<div class='row'><div class='col-md-offset-4 col-md-1'><img src='css/bank.jpg' style='width:1.5em; margin-left:5em;'/></div><div class='col-md-4'><p><a href='addpayment.php'>Add Payment Details</a></p></div></div>";

}

?>



<br /><br /><br /><br />


</div>
</body>
</html>
