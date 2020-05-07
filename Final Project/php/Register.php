<?php
include("userValidationClass.php");
$userClass = new UserClass();

$errorMessage = "" ;
$sucessMessage = "" ;

if (!empty($_POST['submitregistrationform'])) 
{
	$username=$_POST['username'];
	$email=$_POST['emailid'];
	$password=$_POST['userpassowrd'];

	$username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
	$email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);

	if($username_check && $email_check)
	{
		$uid=$userClass->userRegistration($username,$email,$password);
		
		if($uid)
		{	
			$sucessMessage = "Registration successful! Please "."<a href='login.php'>Login</a>" ;
		}
		else
		{
			$errorMessage = "The e-mail already exists!";
		}
	}

	else
	{
		$errorMessage = "Invalid credentials!";
	} 
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
	
	<link rel="stylesheet" type="text/css" href="login-register.css">

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
	<meta name="description" content="Registration form" />
</head>
<div>
			<a href="index.php">Browse the CV Builder as a guest!</a>
</div>

<body>
	<div id="register">
	<h3>Sign up</h3>
	<form method="post" action="" name="register">
		<label>Name:</label>
		<input type="text" name="username" autocomplete="off" />

		<label>Email:</label>
		<input type="text" name="emailid" autocomplete="off" />

		<label>Password:</label>
		<input type="password" name="userpassowrd" autocomplete="off"/>

		<div class="errorMsg"><?php echo $errorMessage; ?></div>
		<div class="sucessMsg"><?php echo $sucessMessage; ?></div>
		<div>
			<a href="login.php">Already have an account?</a>
		</div>
		<input type="submit" class="button" name="submitregistrationform" value="Register">
	</form>

	<style>
			h3
			{
				color: white;
			}

			label
			{
				color:white;
			}
			
			a
			{
				color:white;
			}
		</style>
	</div>

</body>

</html>