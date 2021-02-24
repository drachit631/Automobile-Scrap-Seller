<?php
include('config.php');
				session_start();
				if (!isset($_SESSION['log']))
				{
					$uname=$_SESSION['log'];
					header("location:homepage.php");
				}
				else
				{
					if(isset($_SESSION['user_id']))
					{
					$id=$_SESSION['user_id'];
				
					$pname=isset($_POST['prod_nm'])? $_POST['prod_nm']:header("location:AddProducts.php");
					$pname=trim($pname);
					$price=isset($_POST['prod_price'])? $_POST['prod_price'] :header("location:AddProducts.php");
					$pspecs=isset($_POST['prod_specs'])? $_POST['prod_specs'] :header("location:AddProducts.php");
					$pdet=isset($_POST['prod_det'])? $_POST['prod_det'] :header("location:AddProducts.php");
					$stock=isset($_POST['prod_stock'])? $_POST['prod_stock'] :header("location:AddProducts.php");
					$catid=isset($_POST['category'])?$_POST['category']:header("location:AddProducts.php");
					
					if (isset($_POST['addprod']))
					{
						$curdir=getcwd();
						$curdir=$curdir.str_replace('\ ', '/', $curdir);
						$filename=$_FILES['image']['name'];
						$filesize=$_FILES['image']['size'];
						$tmpname=$_FILES['image']['tmp_name'];
						$extension=explode('.',$filename);
						$fileext=strtolower(end($extension));
						$filename=$pname."_".$id.".".$fileext;
						$filename=str_replace(' ','_', $filename);
						
						
							$uploadpath="img/ ".basename($filename);
					
						move_uploaded_file($tmpname,$uploadpath);					
					
					
						$b=mysqli_query($con,"insert into products(u_id,prod_nm,prod_price,prod_details,prod_specs,prod_stock,cat_id) values ('$id','$pname','$price','$pdet','$pspecs','$stock','$catid')") or die(mysqli_error($con));
						if($b)
						{
						$c=mysqli_query($con,"select prod_id from products where u_id='$id' AND prod_nm='$pname'") or die(mysqli_error($con));
						while($r=mysqli_fetch_array($c)){
							$r1=$r[0];
						mysqli_query($con,"insert into images(prod_id,prod_img) values('$r1','$uploadpath')") or die(mysqli_error($con));
						echo '<script>alert("Product Added!")</script>';
						header("Location:dealer.php");
						}
						
						session_write_close();
						}
					}
					}
					
				}
?>
