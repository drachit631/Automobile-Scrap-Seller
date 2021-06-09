<?php
include('config.php');
session_start();
	if(isset($_SESSION['log'])){
	$prod_id=isset($_POST['id'])?$_POST['id']:header('location:dealprods.php');
	$qty=isset($_POST['qty'])?$_POST['qty']:header('location:dealprods.php');
	$c=mysqli_query($con,"select prod_stock from products where prod_id='$prod_id'");
	$re=mysqli_fetch_assoc($c);
	$re1=$re['prod_stock'];
	
	$c=mysqli_query($con,"update products set prod_stock='$qty' where prod_id='$prod_id'");
	
	if($c)
	{
		echo "Stock Changed!";
	}
	else
	{
		mysqli_error($con);
	}
	}
		

else
{
	header('location:homepage.php');
	}
	?>