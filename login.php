<?php
/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Fund Raising System</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="bootstrap-3.3.7-dist/js/jquery.min.js"></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body>
<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
      $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		 $rows = mysqli_num_rows($result);
		while ($row=mysqli_fetch_assoc($result)) {
			# code...
			$type=$row['user_type'];
			$org=$row['org'];
		}
        if($rows==1){
			$_SESSION['username'] = $username;
			$_SESSION['org'] = $org;

            $_SESSION['type'] = $type;
			header("Location: index.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>
<div class="form">
	<br/><br/><br/><br/><br/><br/>
<center><h1>Log In</h1></center>
<form action="" method="post" name="login">
	<center>
<i class="fa fa-user"></i><input type="text" name="username" placeholder="Username" required />
</center>
<center>
<input type="password" name="password" placeholder="Password" required /></center>
<center>
<input name="submit" type="submit" value="Login" /></center>
</form>
<center>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p></center>

<br /><br />


</div>
<?php } ?>


</body>
</html>
