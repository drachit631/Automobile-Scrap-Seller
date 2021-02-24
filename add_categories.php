<?php
session_start();
include_once("config.php");
	
 			if(isset($_POST['catid'])){
			$cate=$_POST['catid'];
			$sql="insert into categories('cat_nm') values ('$cate')";
			$z=mysqli_query($con,$sql);
		}
	
?>