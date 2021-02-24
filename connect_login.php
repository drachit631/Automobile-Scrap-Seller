<?php
include('config.php');
	if(isset($_POST['login']) && isset($_POST['password']))
	{

		$uname=$_POST['login'];
		$pass=$_POST['password'];
		
		
		
		$result=mysqli_query($con,"select * from admin_master where username='$uname' AND password='$pass'");
		$res=mysqli_num_rows($result);
		
		if ($res>0) 
		{				
			session_start();
			$_SESSION['log']="1";
			
			header('location:AdminPage.php');

			
		}
		else
		{
			session_start();
			$_SESSION['log']="0";
			header('location:admin_Login.php?code=1');
			echo '<script>alert("invalid Details!");</script>';
			session_destroy();
		}
	}
	else
	{
		header('location:admin_Login.php?code=1');
	}

?>