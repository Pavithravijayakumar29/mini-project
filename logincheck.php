<?php
	if(!isset($_POST['submit']))
	{
		$username=$_POST['user_name'];
		$password=$_POST['password'];
		include "connect.php";
		echo "successful";
		exist()
		$sql="select * from user where user_name='$username' and password='$password'";
		$result=mysqli_query($con,$sql);
		$resultcheck=mysqli_num_rows($result);
		if($resultcheck > 0)
		{
			echo "Login Success";
			session_start();
	
			$_SESSION['user_name']=$username;
			$_SESSION['password']=$password;
		
			header("Location: home.php");

		}
		else
		{
			echo "<script>alert('Invalid Username or Password');</script>";
			
			header("Location: login.php");
		}
	}
?>