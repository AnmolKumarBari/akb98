
<?php
include("auth.php"); 
require('db.php');

      $id=$_GET['id'];
      $pys = "SELECT * FROM `requestfund` WHERE id='$id' LIMIT 1";
    $ssss= mysqli_query($con,$pys) or die(mysql_error());
    
    $ssbs = mysqli_num_rows($ssss);
    // echo  $ssbs;
    while ($ssbs=mysqli_fetch_assoc($ssss)) {
      # code...
         $at=$ssbs['amount'];
       
        $userss=$ssbs['username']; 
    }
          $username=$_SESSION['username'];
$py = "SELECT MAX(total_amount) as max_amt FROM `payment_det` WHERE username='$username' LIMIT 1";
    $sss = mysqli_query($con,$py) or die(mysql_error());
    $ss = mysqli_num_rows($sss);
    while ($ssb=mysqli_fetch_assoc($sss)) {
      # code...
        $tot=$ssb['max_amt']; 
    }
    $abc = "SELECT SUM(total_amount) as totamt FROM `payment_det` WHERE username='$username'";
    $cda = mysqli_query($con,$abc) or die(mysql_error());
    $ddw = mysqli_num_rows($cda);
    while ($ddaaa=mysqli_fetch_assoc($cda)) {
      # code...
       $amt=$ddaaa['totamt'];     
    }
  if($amt<$at){
    echo "<div class='form'><h3>Sorry you have less bank balance to pay this fund</h3><br/>Click here to <a href='raisefund.php'>Go Back</a></div>";
  }else{

          $query = "UPDATE requestfund set status='Paid' where id=$id";
        $result = mysqli_query($con,$query);
          $ammt=$tot-$at;

         $qr = "UPDATE payment_det set total_amount='$ammt' WHERE total_amount='$tot' and username='$username' LIMIT 1";
        $hos = mysqli_query($con,$qr);
       
       $qqq = "UPDATE bank_det set balance='$at' WHERE username='$userss'";
        $hosss = mysqli_query($con,$qqq);
  
        if($result){
            echo "<div class='form'><h3>Transaction Succesfully made and the amount is debited from your payment card.</h3><br/>Click here to <a href='raisefund.php'>Pay Another</a></div>";
        }

  }



  
?>


