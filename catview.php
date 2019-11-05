<!DOCTYPE html>
<html>
<head>
  <title>Payment Gateway</title>
</head>
<body>
<div class="form">
 <h1>Category View</h1>
<p><a href="raisefund.php">Go Back</a></p>
</div>
</body>
</html>
<?php

include("auth.php"); 
	require('db.php');
if(isset($_POST['org'])){
	$value_c=$_POST['org'];

	$username=$_SESSION['org'];
      
     $query= "SELECT * FROM requestfund WHERE org='$value_c' AND status!='Paid'";
    $result= mysqli_query($con,$query);
    $row=$result->num_rows;
    if ($row>0){
       echo'<table border=1>';
     echo "<table class='r_table'border='2' style='border-width: 10px;
    border-color: antiquewhite;'><tr>
            <th>Request ID</th>
            <th>To Organization</th>
            <th>Subject</th>
            <th>Description</th>
            <th>Amount</th>
            <th>Phone</th>
            <th>Action</th>

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

	echo "<td><a href='payfund.php?id=".$result->fetch_assoc()['id']."'>Pay Now</a></td> <br>";
	$result->data_seek($i);
	


}
}
echo'</table>';
        

}
?>
