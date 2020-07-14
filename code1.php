<?php
	session_start();
	require "dbconfig/config.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title> Login Page</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-image:url(images/bckimg2.jpg)">

	<div id="main-wrapper">
	<center>
		<h2><i>Login form</i></h2>
		<img src="images/logimg.jpg" class="logimg"/>
	</center>

	<form  class="myform" action="code1.php" method="post">
		<label><b>Username:</b></label><br>
		<input name="username" type="text" class="inputvalues" placeholder="Type your username" required /><br>
		<label><b>Password:</b></label><br>
		<input name="password" type="password" class="inputvalues" placeholder="Type your passwword" required /><br>
		<center>
			<input name="login" type="submit" id="login_btn" value="Login"/>
			<a href="register.php"><input type="button" id="register_btn" value="Register"/></a>
		</center>	
	</form>
	<?php
	if(isset($_POST['login']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		$query="select username,password from newuserinfo WHERE username='$username' AND password='$password'";
		
		$query_run = mysqli_query($con,$query);
		if(mysqli_num_rows($query_run)>0)
		{
			//valid
			$_SESSION['username']= $username;
			header('location:homepage.php');
		}
		else
		{
			//invalid
			echo '<script type:"text/javascript"> alert("Invalid Credentials")</script>';

		}
	}
	
	?>
	</div>
</body>
</html>