<?php
include('config.php');
	if(isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['fid']) && !empty($_POST['fid']))
	{
		$email=mysqli_escape_string($con,$_POST['email']);
		$fid=mysqli_escape_string($con,$_POST['fid']);
		$s=mysqli_query($con,"select u_id from registration where email_id='$email'");
		$sec=mysqli_fetch_assoc($s);
		
		$uid=$sec['u_id'];
		$ver=mysqli_query($con,"select * from password_forget where u_id='$uid' AND f_id='$fid'");
		$s=mysqli_num_rows($ver);
		if($s>0)
		{
		mysqli_query($con,"delete * from password_forget where u_id='$uid'");
		echo "1";
		}
		else
		{
		echo "2";
		}
		
	}
	
?>