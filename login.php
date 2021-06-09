<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	
<?php 
	include('config.php');
	
if(isset($_POST['login']))
{
	if(isset($_POST['email_id']) && !empty($_POST['email_id']) AND isset($_POST['pass']) && !empty($_POST['pass']))
	{
    $email_id = mysqli_escape_string($con,$_POST['email_id']);
    $password = mysqli_escape_string($con,$_POST['pass']);
	
    $search = mysqli_query($con,"SELECT u_id,email_id,type,passwrd,active FROM registration WHERE email_id='".$email_id."' AND passwrd='".$password."'") or die(mysqli_error($con)); 
	
    $match  = mysqli_num_rows($search);
	if($match > 0)
	{
		session_start();
		while($is=mysqli_fetch_array($search))
		{
			
			$ac=$is['active'];
	
			if($ac)
			{
				$u_id=$is['u_id'];
				$t=$is['type'];
				$_SESSION['user_id']=$u_id;
				$_SESSION['log']="1";
				$_SESSION['type']=$t;
					if($t==1)
					{
					
					header("Location:dealer.php");
					}
					else
					{
					header("Location:User.php");
					}
			}
			else
			{
				echo ("Account has not been verified yet!");
				header("location:homepage.php");
			}
		}
	}
	else
	{
		session_start();

		$_SESSION['log']="0";
		header("Location:homepage.php?val=".$val);
		
		session_destroy();
	}
    }
	 else
	 {
	 header("Location:homepage.php");
	 }
}
else
{
	echo '<script>alert("invalid approach!");</script>';
}
	
 ?>