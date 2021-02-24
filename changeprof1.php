
<?php
include('config.php');
session_start();
if(isset($_SESSION['user_id']))
{
$id=$_SESSION['user_id'];

if(isset($_POST['pass']) && isset($_POST['contact']) && isset($_POST['addr'])  && isset($_POST['fn']) && isset($_POST['pin']))
{

	
	$pass=$_POST['pass'];
	$contact=$_POST['contact'];
	$add=$_POST['addr'];
	
	$fn=$_POST['fn'];
	$pin=$_POST['pin'];
	if(isset($_POST['user']))
	{
		if(isset($_POST['gstn']))
		{
			$gstn=$_POST['gstn'];
			$c=mysqli_query($con,"UPDATE registration SET f_name='$fn',contact_no='$contact',passwrd='$pass',address='$add',post_code='$pin',gst_no='$gstn' WHERE u_id='$id'");
			if($c)
			{
				echo "Profile Changes Saved!";
			}
			else
			{
				

				mysqli_error($con);
			}
		}
		else
		{

			echo "Enter GST Number!";
		
		}
	}
	else
	{
		$c=mysqli_query($con,"UPDATE registration SET f_name='$fn',contact_no='$contact',passwrd='$pass',address='$add',post_code='$pin' WHERE u_id='$id'");
		if($c)
		{
			echo "Profile Changes Saved!";
		}
		else
		{

			echo "Enter Proper Data! ";
		}
	}
	
}
else
{
	echo "Enter Data!";
}




}
else
{
	echo "Login First!";
}
?>