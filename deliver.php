<?php 
include('config.php');
session_start();
if(isset($_SESSION['user_id']))
{
if(isset($_POST['id']))
{
	$id=$_SESSION['user_id'];
	$pro=$_POST['id'];
	
	
	$c=mysqli_query($con,"select u_id,o_id from orders where prod_id='$pro'") or die(mysqli_error($con));
		while($h=mysqli_fetch_assoc($c))
		{
		$uid=$h['u_id'];
		$oid=$h['o_id'];
		echo $oid;
		$b=mysqli_query($con,"insert into order_id values('$oid','$uid')") or die(mysqli_error($con));
		if($b){mysqli_query($con,"update orders set o_status='1' where prod_id='".$pro."'") or die(mysqli_error($con));
			{
				$em=mysqli_query($con,"select email_id from registration where u_id='$id'");
					$emai=mysqli_fetch_assoc($em);
					$arr['email']=$emai['email_id'];
					$email=$arr['email'];
					
					
					$to      = $email; 
				$subject = 'Order | Delivered'; // Give the email a subject 
				$message = '
 
				Thanks for Shopping with us!
				Your Order ID  #'.$oid.' is successfully delivered to you.
				Hope you liked your order and leave feedback here!
				------------------------
 
				Please click this link to check your Orders.
				http://localhost/automobile%20scraps%20seller/orders.php
 
				'; 
                     
				$headers = 'From:infoamss7108@gmail.com' . "\r\n"; // Set from headers
				
				mail($to, $subject, $message, $headers);
				
				
		echo "Status Changed!";
			}
		}
		}
	}
}

else
{
	header("location:homepage.php");
	}
	
		
	