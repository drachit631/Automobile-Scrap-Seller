<?php
include('config.php');
session_start();
if($_SESSION['log'])
{
	if(isset($_SESSION['user_id']))
	{
		$id=$_SESSION['user_id'];
		$arr=array();
		$qty=array();
		$result=mysqli_query($con,"select * from cart where u_id='$id'");
	$rowcount=mysqli_num_rows($result);
	$oid="O".floor(100 + rand(0,900) * 90);
	for($i=0;$i<$rowcount;$i++)
	{
	while($r=mysqli_fetch_assoc($result))
	{
			$arr[$i]['prod_id']=$r['prod_id'];
			$arr[$i]['qty']=$r['prod_qty'];
			$query="select * from products where prod_id='".$arr[$i]['prod_id']."'";
			$cart=mysqli_query($con,$query)  or die(mysqli_error($con));
			$c=mysqli_fetch_assoc($cart) or die(mysqli_error($con));
			$arr[$i]['d_id']=$c['u_id'];
			$arr[$i]['prod_name']=$c['prod_nm'];
			$arr[$i]['prod_price']=$c['prod_price'];
			$arr[$i]['prod_stock']=$c['prod_stock'];
			$total=$_SESSION['total'];
			$h=mysqli_query($con,"select u_id from products where prod_id='".$arr[$i]['prod_id']."' AND u_id LIKE 'D%'");
			while($r=mysqli_fetch_assoc($h)){
				$d_id=$r['u_id'];
			$c=mysqli_query($con,"insert into orders(o_id,prod_id,u_id,d_id,o_date,prod_qty,price) values('".$oid."','".$arr[$i]['prod_id']."','".$id."','".$d_id."',CURRENT_TIMESTAMP,'".$arr[$i]['qty']."','".$total."')");
			if($c)
			{
				
					
					$b=mysqli_query($con,"delete from cart where u_id='$id'") or die(mysqli_error($con));
					if($b)
					{echo 'in'; 
					$stck=$arr[$i]['prod_stock']-$arr[$i]['qty'];
					mysqli_query($con,"update products set prod_stock='$stck' where prod_id='".$arr[$i]['prod_id']."'") or die(mysqli_error($con));
					
					//$em=mysqli_query($con,"select email_id from registration where u_id='$id'");
					//$emai=mysqli_fetch_assoc($em);
					//$arr[$i]['email']=$emai['email_id'];
					//$email=$arr[$i]['email'];
					
				//$to      = $email; 
				//$subject = 'Order Placed'; // Give the email a subject 
				 
				//$headers = 'From:pujan007mm@gmail.com' . "\r\n"; // Set from headers
				
				//if(mail($to, $subject, $message, $headers))
					header("location:orders.php");
				}
					}
					
			
			
			}
	}
	}
	}
}
	