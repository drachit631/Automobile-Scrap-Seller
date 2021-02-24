<?php
include('config.php');
$prod_id=isset($_POST['id'])?$_POST['id']:header('location:dealer.php');
$c=mysqli_query($con,"select prod_stock from products where prod_id='$prod_id'");
$re=mysqli_fetch_assoc($c);
$re1=$re['prod_stock'];
if($c)
	{
		$c=mysqli_query($con,"delete from products where prod_id='$prod_id'");
		echo "Product Removed!";
	}
	else
	{
		mysqli_error($con);
	}
?>