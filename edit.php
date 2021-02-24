<?php 
include('config.php');
session_start();
if(isset($_SESSION['user_id']))
{
$id=$_SESSION['user_id'];
if(isset($_POST['addr']) && !empty($_POST['addr']) AND isset($_POST['contn']) && !empty($_POST['contn']))
{
	$addr=$_POST['addr'];
	$contn=$_POST['contn'];
	if (preg_match("/^[0-9]{10}$/", $contn)){
	mysqli_query($con,"update registration set address='$addr' where u_id='$id'") or die(mysqli_error($con));
	mysqli_query($con,"update registration set contact_no='$contn' where u_id='$id'") or die(mysqli_error($con));
	echo "Number and Address Changed!";
	}
	else
		{
			
				echo "Address or Number Incorrect!";
		}
}
elseif(isset($_POST['addr']) && !empty($_POST['addr']))
{
	$addr=$_POST['addr'];
	
				
	mysqli_query($con,"update registration set address='$addr' where u_id='$id'") or die(mysqli_error($con));
	echo "Address Changed!";
		
		
}
elseif(isset($_POST['oldpass']) AND isset($_POST['newpass']))
{
	$oldpass=$_POST['oldpass'];
	$newpass=$_POST['newpass'];
	$c=mysqli_query("update registration set passwrd='$newpass' where u_id='$id'");
	if($c)
	{
		
	}
}
elseif(isset($_POST['contn']) && !empty($_POST['contn']))
{
	$contn=$_POST['contn'];
	if (preg_match("/^[0-9]{10}$/", $contn))
		{
			
	mysqli_query($con,"update registration set contact_no='$contn' where u_id='$id'") or die(mysqli_error($con));
	echo "Number Changed!";
		}
		else
		{
			
				echo "Enter Number Again!";
		}
}
else
{
	header("location:checkout.php");
}
}
else
{
 header('location:homepage.php');
}
