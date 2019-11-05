

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username);

				$user = stripslashes($_REQUEST['user']); // removes backslashes
		$user = mysqli_real_escape_string($con,$user); //escapes special characters in a string
		$full_name = stripslashes($_REQUEST['full_name']); // removes backslashes
		$full_name = mysqli_real_escape_string($con,$full_name);
		$address = stripslashes($_REQUEST['address']); // removes backslashes
		$address = mysqli_real_escape_string($con,$address);

		$mobile = stripslashes($_REQUEST['mobile']); // removes backslashes
		 $mobile = mysqli_real_escape_string($con,$mobile);
		

		$org = stripslashes($_REQUEST['org']); // removes backslashes
		$org = mysqli_real_escape_string($con,$org);

		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

         $query = "INSERT into `users` (username,full_name,address,mobile,org, email,password,user_type) VALUES ('$username', '$full_name', '$address','$mobile','$org','$email','".md5($password)."','$user')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
	<br/><br/><br/>
<center><h1>Registration</h1>
<form name="registration" action="" method="post">
	<select name="user" class="hola" style="width: 220px;
    height: 40px;" required>
    <option value="">Select User Type</option>
	<option value="1">Fund Raiser</option>
	<option value="2">Funder</option>
</select>
<input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off" required />
<input type="text" name="full_name" placeholder="Full Name" autocomplete="off" required />
<input type="text" name="address" placeholder="Address" autocomplete="off" required />
<input type="text" name="mobile" placeholder="Phone Number" autocomplete="off" required />
<input type="text" name="org" placeholder="Organization" autocomplete="off" required />
<input type="email" name="email" placeholder="Email" autocomplete="off" required />
<input type="password" name="password" placeholder="Password" autocomplete="off" required />
<input type="submit" name="submit" value="Register" />
</form>
</center>
<br /><br />

</div>
<?php } ?>
</body>
</html>
