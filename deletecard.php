
<?php
include("auth.php"); 
require('db.php');

      $id=$_GET['id'];
 
       
        $qqq = "DELETE FROM payment_det where id='$id'";
        $hosss = mysqli_query($con,$qqq);
  
        if($hosss){
            echo "<div class='form'><h3>Payment Details is successfully removed</h3><br/>Click here to <a href='addpayment.php'>Go Back</a></div>";
        }


  
?>


