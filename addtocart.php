<?php
	include('config.php');
	session_start();
	$prod_stck=0;
	if(isset($_SESSION['log']))
	{
	if(isset($_GET['id']) & !empty($_GET['id'])){
	 $id=$_GET['id'];
	 $prod=mysqli_query($con,"select prod_stock from products where prod_id='".$id."'") or die(mysqli_error($con));
	 while($row=mysqli_fetch_array($prod))
	 {
		 $prod_stck=$row['prod_stock'];
		 
	 
	 
	 
	$search = mysqli_query($con,"SELECT  * FROM cart WHERE prod_id='".$id."'") or die(mysqli_error($con)); 
	$match=mysqli_num_rows($search);
	if($match>0)
	{
		
	while($is=mysqli_fetch_assoc($search))
	{
		
		$qty=$is['prod_qty'];
	
  
			if($qty<$prod_stck && $prod_stck>0)
			{
				$qty+=1;
				$update=mysqli_query($con,"update cart set prod_qty='".$qty."' where prod_id='".$id."'") or die(mysqli_error($con));
				echo '<script> alert("Quantity updated!");</script>';
				header("location:view_cart.php");
			}
			else
			{
				echo "<script>alert('Cannot add more!');</script>";
				header("location:user.php");
				echo "<script>alert('Cannot add more!');</script>";
			}
		}
	}
			
		else
			{
				
				if(isset($_SESSION['user_id'])){
				$user_id=$_SESSION['user_id'];
				if($prod_stck>0){
				$insert=mysqli_query($con,"insert into cart values('".$user_id."','".$id."','1')") or die(mysqli_error($con));
				echo '<script> alert("Product Added to Cart!");</script>';
				
				session_write_close();
				header("location:view_cart.php");
				}
				else
				{
					echo "<script> alert('Out of stock!');</script>";
					header("location:user.php");
				}
				}
				else
				{
					echo '<script> alert("NO UID");</script>';
					
				}
			}
	 }
	}
	else
	{
		echo '<script> alert("Fail");</script>';
	}
	}
	else
	{
		
		
		
		header("location:homepage.php");
		echo '<script> alert("Register or Login First!");</script>';
	}
	

?>