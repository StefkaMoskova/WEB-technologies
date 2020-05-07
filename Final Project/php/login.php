<?php
	include("userValidationClass.php");
	$userClass = new UserClass();

	$errorMessage = "" ;

	if (!empty($_POST['submitloginform'])) 
	{
		
		$email=$_POST['emailid'];
		$password=$_POST['userpassowrd'];
			
		if(strlen(trim($email)) > 1 && strlen(trim($password)) > 1)
		{
			
			$uid=$userClass->userLogin($email,$password);
			if($uid)
			{
				$url='index.php';
				header("Location: $url"); 
			}

			else
			{
				$errorMessage = "Invalid credentials!" ;
			}	
		}

		else
		{
			$errorMessage = "Invalid credentials!" ;
		}
	}	
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
	
	<link rel="stylesheet" type="text/css" href="login-register.css">

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
	<meta name="description" content="Login form" />
</head>
<div>
			<a href="index.php">Browse the CV Builder as a guest!</a>
</div>

<body>
	<div id="login">
	<h3>Sign in</h3>
	<form method="post" action="" name="login">
		<label>Email:</label>
		<input type="text" name="emailid" autocomplete="off" />

		<label>Password:</label>
		<input type="password" name="userpassowrd" autocomplete="off"/>

		<div>
			<a href="Register.php">Don't have an account yet?</a>
		</div>
		
		<div class="errorMsg"><?php echo $errorMessage; ?></div>
		<input type="submit" class="button" name="submitloginform" value="Login">
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