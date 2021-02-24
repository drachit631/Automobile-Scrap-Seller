<?php
include('config.php');

if(isset($_POST['email']))
{
$email=mysqli_escape_string($con,$_POST['email']);
$query=mysqli_query($con,"select u_id,email_id from registration where email_id='".$email."'");
$search=mysqli_num_rows($query);
	if($search>0)
	{
		while($s=mysqli_fetch_assoc($query))
		{
		$uid=$s['u_id'];
		$id2=floor(100 + rand(0,900) * 90);
		mysqli_query($con,"insert into password_forget values('$uid','$id2')");
		}
				$to      = $email; 
				$subject = 'Forgot Password';
				$message = '
 
				To reset your password, Note down the number given below and enter it in the tab
				where you just entered your email.'.$id2.'
 

				------------------------
 
	
 
				'; // Our message above including the link
                     
				$headers = 'From:pujan007mm@gmail.com' . "\r\n"; 
				
				if(mail($to, $subject, $message, $headers))
				{
					echo "1";
				}
				else
				{
					echo "0";
				}
	}
	else
	{
		
		echo "2";
	}
	
}
else
{
	echo "3";
}
