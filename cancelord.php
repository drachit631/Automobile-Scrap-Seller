<?php 
include('config.php');
session_start();
if(isset($_SESSION['user_id']))
	{
		$id=$_SESSION['user_id'];
		if(isset($_POST['oid']))
		{
		$oid=$_POST['oid'];
			mysqli_query($con,"update orders set canc_stat='1' where o_id='$oid'") or die(mysqli_error($con));
			$em=mysqli_query($con,"select email_id from registration where u_id='$id'");
					$emai=mysqli_fetch_assoc($em);
					$arr['email']=$emai['email_id'];
					$email=$arr['email'];
			$to      = $email; // Send email to our user
				$subject = 'Order | Cancellation'; // Give the email a subject 
				$message = '
 
				
				You have recently cancelled an order.
				Cancelled Order ID is #'.$oid.'. 

				------------------------
 
				Click this link below to check your orders.
				http://localhost/asss/orders.php
 
				'; 
                     
				$headers = 'From:pujan007mm@gmail.com' . "\r\n"; 
						
				mail($to, $subject, $message, $headers);
			echo "Order Cancelled!";
			
			}
			}
			else
			{
			header('location:homepage.php');
			}
			
			
			