<?php
include('config.php');
	$prod_id=isset($_POST['id'])?$_POST['id']:header('location:view_cart.php');
	$qty=isset($_POST['qty'])?$_POST['qty']:header('location:view_cart.php');
	$stck=isset($_POST['stck'])?$_POST['stck']:header('location:view_cart.php');
	if($qty<=$stck)
	{
	$c=mysqli_query($con,"update cart set prod_qty='$qty' where prod_id='$prod_id'");
	
	if($c)
	{
		echo "Quantity Changed!";
	}
	else
	{
		mysqli_error($con);
	}
	}
	else
	{
		echo "Less Quantity!";
	}
	?>