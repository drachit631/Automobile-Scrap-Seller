
<?php
	include('config.php');
	
	
	error_reporting(E_ALL); 
	ini_set('display_errors', 1);
	

		$hash=md5( rand(0,1000) );
		
	
		
			  // mysql_escape_string
		$name=isset($_POST['name'])?mysqli_escape_string($con,$_POST['name']):header("location:register.php");
		$email=isset($_POST['email_id'])?mysqli_escape_string($con,$_POST['email_id']):header("location:register.php");
		$addr=isset($_POST['addr'])?mysqli_escape_string($con,$_POST['addr']):header("location:register.php");
		$contn=isset($_POST['contn'])?mysqli_escape_string($con,$_POST['contn']):header("location:register.php");
		$pass=isset($_POST['pass'])?mysqli_escape_string($con,$_POST['pass']):header("location:register.php");
		$state=isset($_POST['state'])?mysqli_escape_string($con,$_POST['state']):header("location:register.php");
		$city=isset($_POST['city'])?mysqli_escape_string($con,$_POST['city']):header("location:register.php");
		$postz=isset($_POST['postz'])?mysqli_escape_string($con,$_POST['postz']):header("location:register.php");
		
		$user=isset($_POST['user'])?mysqli_escape_string($con,$_POST['user']):'';
		
		 
		
		
		if($user=="false"){
			$id1="C".floor(100 + rand(0,900) * 90);
			
					$sql="INSERT INTO `registration`(`u_id`,`f_name`,`email_id`,`contact_no`,`passwrd`,`address`,`State_Name`,`City_Name`,`post_code`,`hash`) VALUES('{$id1}','{$name}','{$email}','{$contn}','{$pass}','{$addr}','{$state}','{$city}','{$postz}','{$hash}')";
					$b=mysqli_query($con,$sql) or die(mysqli_error($con));
			
			
		
				$to      = $email; 
				$subject = 'Signup | Verification';  
				$message = '
 
				Thanks for signing up!
				Your account has been created, you can login after you have activated your account by pressing the url below.
 

				------------------------
 
				Please click this link to activate your account:
				http://localhost/asss/verify.php?email='.$email.'&hash='.$hash.'
 
				'; 
                     
				$headers = 'From:pujan007mm@gmail.com' . "\r\n"; 
						
				if(mail($to, $subject, $message, $headers))
				{
					echo "Email has been sent to your account, Please verify to login!";
					
				}
				else{
					mysqli_query($con,"delete from registration where u_id='$id1'");
					echo "Email cannot be sent, Please enter valid Email ID";
				}
			}
		
				else
			{
				$gstn=isset($_POST['gstn'])?mysqli_escape_string($con,$_POST['gstn']):header("location:register.php");
				$id2="D".floor(100 + rand(0,900) * 90);
				$user=1;
			
		
					$sql2="INSERT INTO `registration`(`u_id`,`f_name`,`email_id`,`contact_no`,`type`,`passwrd`,`address`,`State_Name`,`City_Name`,`post_code`,`gst_no`,`hash`) VALUES('{$id2}','{$name}','{$email}','{$contn}','1','{$pass}','{$addr}','{$state}','{$city}','{$postz}','{$gstn}','{$hash}')";
					$c=mysqli_query($con,$sql2) or die(mysqli_error($con));
				
				$to      = $email; // Send email to our user
				$subject = 'Signup | Verification'; // Give the email a subject 
				$message = '
 
				Thanks for signing up!
				Your account has been created, you can login after you have activated your account by pressing the url below.
 

				------------------------
 
				Please click this link to activate your account:
				http://localhost/asss/verify.php?email='.$email.'&hash='.$hash.'
 
				'; // Our message above including the link
                     
				$headers = 'From:pujan007mm@gmail.com' . "\r\n"; // Set from headers
				
				if(mail($to, $subject, $message, $headers))
				{
					
					echo "Email has been sent to your account, Please verify to login!";	
				}			
				else{
					mysqli_query($con,"delete from registration where u_id='$id2'");
					echo "Email cannot be sent, Please enter valid Email ID";
				}

			}
	
	
	
		?>