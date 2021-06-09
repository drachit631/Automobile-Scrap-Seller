
<?php

use PHPMailer\PHPMailer\PHPMailer;
	include('config.php');
		$hash=md5( rand(0,1000) );
		
	
		
			  // mysql_escape_string
		$name=isset($_POST['name'])?mysqli_escape_string($con,$_POST['name']):header("location:register.php");
		
		$email=isset($_POST['email_id'])?mysqli_escape_string($con,$_POST['email_id']):header("location:register.php");
		$checkM=mysqli_query($con,"select email_id from registration where email_id='$email'");
		$match  = mysqli_num_rows($checkM);
		if($match>0)
		{
			echo "Email already exists!";
		} 
		else{
				$addr=isset($_POST['addr'])?mysqli_escape_string($con,$_POST['addr']):header("location:register.php");
				$contn=isset($_POST['contn'])?mysqli_escape_string($con,$_POST['contn']):header("location:register.php");
				$pass=isset($_POST['pass'])?mysqli_escape_string($con,$_POST['pass']):header("location:register.php");
				$state=isset($_POST['state'])?mysqli_escape_string($con,$_POST['state']):header("location:register.php");
				$city=isset($_POST['city'])?mysqli_escape_string($con,$_POST['city']):header("location:register.php");
				$postz=isset($_POST['postz'])?mysqli_escape_string($con,$_POST['postz']):header("location:register.php");
				$gstn=isset($_POST['gstn'])?mysqli_escape_string($con,$_POST['gstn']):header("location:register.php");
				$user=isset($_POST['user'])?mysqli_escape_string($con,$_POST['user']):'';
			
				if($user=="false"){
					$id1="C".floor(100 + rand(0,900) * 90);
							$b=mysqli_query($con,"INSERT INTO `registration`(`u_id`,`f_name`,`email_id`,`contact_no`,`passwrd`,`address`,`State_Name`,`City_Name`,`post_code`,`hash`) VALUES('{$id1}','{$name}','{$email}','{$contn}','{$pass}','{$addr}','{$state}','{$city}','{$postz}','{$hash}')");
						$subject = "Signup | Verification";  
						$body = "
		
						Thanks for signing up!
						Your account has been created, you can login after you have activated your account by pressing the url below.
		

						------------------------
		
						Please click this link to activate your account:
						http://localhost/amss/verify.php?email=$email&hash=$hash
		
						"; 

							require_once "PHPMailer/PHPMailer.php";
							require_once "PHPMailer/SMTP.php";
							require_once "PHPMailer/Exception.php";

							$mail = new PHPMailer();

							//SMTP Settings
							$mail->isSMTP();
							$mail->Host = "smtp.gmail.com";
							//$mail->Host = "ssl://smtp.gmail.com";
							$mail->SMTPAuth = true;
							$mail->Username = "infoamss007@gmail.com";
							$mail->Password = "Amss7108";
							$mail->Port = 587; //465
							$mail->SMTPSecure = "tls";//"ssl";
							$mail->SMTPDebug = 2;

							//Email Settings
							$mail->isHTML(true);
							$mail->setFrom("infoamss007@gmail.com","InfoAMSS");
							$mail->addAddress($email);
							$mail->Subject = $subject;
							$mail->Body = $body;

							if ($mail->send()) {
								echo "Please check your email for verification in order to login.";
							} else {
								mysqli_query($con,"delete from registration where email_id='$email'");
								echo "Email cannot be sent, Please enter valid Email ID";
								
							}
						
					}
					else{
						$gstn=isset($_POST['gstn'])?mysqli_escape_string($con,$_POST['gstn']):header("location:register.php");
						$id1="D".floor(100 + rand(0,900) * 90);
						$user=1;
					
							$t="1";
							
							$sql="INSERT INTO `registration`(`u_id`,`f_name`,`email_id`,`contact_no`,`passwrd`,`address`,`State_Name`,`City_Name`,`post_code`,`hash`,`gst_no`,`type`) VALUES('{$id1}','{$name}','{$email}','{$contn}','{$pass}','{$addr}','{$state}','{$city}','{$postz}','{$hash}','{$gstn}','{$t}')";
							$b=mysqli_query($con,$sql) or die(mysqli_error($con));
						
						$subject = "Signup | Verification";  
						$body = "
		
						Thanks for signing up!
						Your account has been created, you can login after you have activated your account by pressing the url below.
		

						------------------------
		
						Please click this link to activate your account:
						http://localhost/amss/verify.php?email=$email&hash=$hash
		
						"; 
							
								$name = $_POST['name'];

								require_once "PHPMailer/PHPMailer.php";
								require_once "PHPMailer/SMTP.php";
								require_once "PHPMailer/Exception.php";

								$mail = new PHPMailer();

								//SMTP Settings
								$mail->isSMTP();
								$mail->Host = "smtp.gmail.com";
								//$mail->Host = "ssl://smtp.gmail.com";
								$mail->SMTPAuth = true;
								$mail->Username = "infoamss007@gmail.com";
								$mail->Password = "Amss7108";
								$mail->Port = 587; //465
								$mail->SMTPSecure = "tls";//"ssl";
								$mail->SMTPDebug = 2;

								//Email Settings
								$mail->isHTML(true);
								$mail->setFrom("infoamss007@gmail.com", "InfoAMSS");
								$mail->addAddress($email);
								$mail->Subject = $subject;
								$mail->Body = $body;

								if ($mail->send()) {
									
									echo "Please check your email for verification in order to login.";
								} else {
									mysqli_query($con,"delete from registration where email_id='$email'");
									echo "Email cannot be sent, Please enter valid Email ID";
								}

							
							
						}
	}
	
	
	
		?>