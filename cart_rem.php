<?php
include('config.php');
$prod_id=isset($_POST['id'])?$_POST['id']:header('location:view_cart.php');
$c=mysqli_query($con,"delete from cart where prod_id='$prod_id'") or die(mysqli_error($con));
if($c)
	{
		echo "Product Removed!";
	}
	else
	{
		mysqli_error($con);
	}
?>