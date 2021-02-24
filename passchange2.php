<?php
include('config.php');
if(isset($_POST['rpass']) && !empty($_POST['rpass']) AND isset($_POST['email']) && !empty($_POST['email']))
{
	$newp=$_POST['rpass'];
	$email=$_POST['email'];
	$s=mysqli_query($con,"update registration set passwrd='$newp' where email_id='$email'");
	if($s)
	{
		echo "Password Changed Successfully!";
		}
		}
		?>