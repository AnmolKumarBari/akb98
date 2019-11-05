<?php


include("auth.php"); 
require('db.php');
error_reporting(0);

 ?>




<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Request</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="bootstrap-3.3.7-dist/js/jquery.min.js"></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="">
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
<p><a href="dashboard.php">Dashboard</a></p>

<!-- <table border="2" style="border-bottom-color: antiquewhite;
    border-width: 10px;
    background-color: aliceblue;">
<tr>
	<th>RequestID</th>
	<th>Organization</th>
	<th>Subject</th>
	<th>Description</th>
	<th>Amount</th>
	<th>Status</th>
	</tr>

	<tr>
		<td>sdfs</td>
		<td>sdfs</td>
		<td>sdfs</td>
		<td>sdfs</td>
		<td>sdfs</td>
		<td>sdfsfsdfsdfsd</td>
		



	</tr>
</table> -->

<?php

      $username=$_SESSION['username'];
      
     $query= "SELECT * FROM requestfund WHERE username='$username' ";
       $result= mysqli_query($con,$query);
    $row=$result->num_rows;
  
?>
<?php
    if ($row>0){
       echo'<table border=1>';
     echo "<table class='r_table'border='2' style='border-width: 10px;
    border-color: antiquewhite;'><tr>
            <th>Request ID</th>
            <th>Organization</th>
            <th>Subject</th>
            <th>Description</th>
            <th>Amount</th>
            <th>Phone</th>
            <th>Status</th>
          
            </tr><tr>";
    
for ($i=0; $i<$row; ++$i)
{
	$idd=$result->fetch_assoc()['id'];
echo'<tr>'; 
	$result->data_seek($i);
	
	echo '<td>'. "FMS".$result->fetch_assoc()['id'].'</td>';
	$result->data_seek($i);
	echo '<td>'. $result->fetch_assoc()['org'].'</td> <br>';
	$result->data_seek($i);
	
    echo '<td>'. $result->fetch_assoc()['title'].'</td>';
	$result->data_seek($i);
	echo '<td>'. $result->fetch_assoc()['descs'].'</td> <br>';
	$result->data_seek($i);
	echo '<td>'. $result->fetch_assoc()['amount'].' </td> <br>';
    $result->data_seek($i);
	echo '<td>'. $result->fetch_assoc()['phone'].'</td> <br>';
	$result->data_seek($i);
	echo '<td>'. $result->fetch_assoc()['status'].' </td> <br>';
    $result->data_seek($i);

}
}
echo'</table>';
         ?>  


<br /><br /><br /><br />

</div>
</body>
</html>
