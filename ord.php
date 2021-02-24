

<!DOCTYPE html>
<?php 
include('config.php');

error_reporting(E_ALL); 
	ini_set('display_errors', 1);
session_start();
if(!isset($_SESSION['log']))
{
	header("Location:homepage.php");
	die();
}
	else
	{
		if(!isset($_SESSION['type']))
		header("location:user.php");
			
	}



?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Orders</title>
	
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    	<link rel="stylesheet" href="css/animate.css" type="type/css">
	<link rel="stylesheet" href="css/products.css">
    <link rel="stylesheet" href="css/cart.css" type="type/css">
	<link rel="stylesheet" href="css/prod1.css" type="type/css">
	<link rel="stylesheet" href="css/line.css" type="type/css">
	<link href="style/style.css" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script type="text/javascript">
	$(document).ready(function(){
		$('#deliver').click(function(){
				
				event.preventDefault();
				var id=	$('#prod_id').val();
				
			$.ajax({
			type:"POST",
			url: "deliver.php",
			data:{id:id},
			success:function(response){
				alert(response);
			location.reload();
			}
			});
		
		});
		});
    </script>
	<style>
	
		@import url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css');
* {
  box-sizing: border-box;
}
.nav ul {
  list-style: none;
  background-color: #444;
  text-align: center;
  padding: 0;
  margin: 0;
}
.nav li {
  font-family: 'Oswald', sans-serif;
  font-size: 1.2em;
  line-height: 40px;
  height: 40px;
  border-bottom: 1px solid #888;
}
 
.nav a {
  text-decoration: none;
  color: #fff;
  display: block;
  transition: .3s background-color;
}
 
.nav a:hover {
  background-color: #005f5f;
}
 
.nav a.active {
  background-color: #fff;
  color: #444;
  cursor: default;
}
 

  .nav li {
    width: 120px;
    border-bottom: none;
    height: 50px;
    line-height: 50px;
    font-size: 1.4em;
  }
 
  /* Option 1 - Display Inline */
  .nav li {
    display: inline-block;
    margin-right: -4px;
  }
 
  /* Options 2 - Float
  .nav li {
    float: left;
  }
  .nav ul {
    overflow: auto;
    width: 600px;
    margin: 0 auto;
  }
  .nav {
    background-color: #444;
  }
  */
footer
	{
		background-color:black;
		color: white;
		 position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
   text-align: center;
	}
select {
    border: 1px solid #000;
    background-color: transparent;
	font-color:#000000;
}

/* Style the search field */
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

/* Style the submit button */
form.example button {
  float: left;
  width: 15%;
  padding: 10px;
  height:10%;
  padding-bottom:10px;
  background: #2196F3;
  color: white;
  font-size: 15px;
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}
font
{
	    font-family: 'Open Sans', sans-serif;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}
td {
            border-style:solid; 
            border-width:3px; 
            border-color:#333333; 
            padding:10px;
         }
         tr
         {
         	 border-style:solid; 
            border-width:3px; 
            border-color:#333333;
         }
         th{
          border-style:solid; 
            border-width:3px; 
            border-color:#333333;
        }
            table {border-collapse:collapse;}
@media (min-width:1200px){.container{width:100% !important}}
</style>
</head>

		<?php 
$id=isset($_SESSION['user_id'])?$_SESSION['user_id']:'';
$h=mysqli_query($con,"select f_name from registration where u_id='$id'") or die(mysqli_error($con));
$r=mysqli_fetch_assoc($h);

	$fn=$r['f_name'];


	?>
		<body class="news">
	<header >
		
		<div class="nav" >
		
	<ul>
				<li><img src="logo.png"  style="margin-bottom:30px;margin-right:20px;height:200px;width:200px"></li>
			<li><font color="white" style="font-size:14px;margin-left:90px" !important><?php echo "Welcome,".$fn;?></font></li>
				<li class="active" style="margin-left:660px"><a href="homepage.php">Home</a></li>
					
					
				
				<li style="margin-left:5px"> 
							 <a href="ord.php" class="notification">
					<span><font color="white"><b>Your Orders</b></font></span>
				<span class="badge"></span>
					</a>
					</li><li class="dropdown" style="margin-left:20px">
			  
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="white">My Account<b class="caret"></b></font></a>
				  <ul class="dropdown-menu dropdown-lr animated slideInRight" style="min-width:200px" role="menu">
				  
				<div class="row">
					
            
              
				  <font color="white">
					
					<a href="changeprof.php">Account Information</a>
					<a href="logout.php">Sign Out</a></font>
				
			
				</div>
			  </ul>
			  	</li>
            </div>
	
		
		
		 
		
		<h1 align="center" style="margin-top:20px">Your Orders</h1>
<div class="cart-view-table-back" style="max-width:900px">
<form method="post" action="deliver.php">
<table width="100%" style="font-size:16px" cellpadding="5" cellspacing="2"><thead><tr><th style="width:7%">Quantity</th><th>Order ID</th><th style="margin-left:25px;width:20%">Name</th><th>Price</th><th style="margin-left:20px;width:10%">Contact Number</th><th>Total Payment</th><th >Status</th></tr></thead>
  <tbody>
 	<?php
	

		if(isset($_SESSION['user_id']))
		{
			$arr=array();
			$qty=array();
				$id=$_SESSION['user_id'];
		$result=mysqli_query($con,"select * from orders where d_id='".$id."'") or die(mysqli_error($con));
	$rowcount=mysqli_num_rows($result);
	for($i=0;$i<$rowcount;$i++)
		{
	while($r=mysqli_fetch_assoc($result))
	{	
			$arr[$i]['oid']=$r['o_id'];
			$arr[$i]['prod_id']=$r['prod_id'];
			$arr[$i]['c_id']=$r['u_id'];
			$c=mysqli_query($con,"select * from products where prod_id='".$arr[$i]['prod_id']."'") or die(mysqli_error($con));
			while($re=mysqli_fetch_assoc($c))
			{
			$arr[$i]['prod_name']=$re['prod_nm'];
			$arr[$i]['prod_price']=$re['prod_price'];
			$arr[$i]['prod_stock']=$r['prod_qty'];
			$arr[$i]['cancel']=$r['canc_stat'];
			$res=mysqli_query($con,"select prod_img from images where prod_id='".$arr[$i]['prod_id']."'");
			$b=mysqli_fetch_assoc($res);
			$arr[$i]['prod_img']=$b['prod_img'];
			$h=mysqli_query($con,"select contact_no from registration where u_id='".$arr[$i]['c_id']."'");
			$q=mysqli_fetch_assoc($h);
			$arr[$i]['c_num']=$q['contact_no'];
			$arr[$i]['o_status']=$r['o_status'];
	
		
		
			
			
		   	$bg_color = ($b++%2==1) ? 'odd' : 'even'; 
		      ?><tr class="'.$bg_color.'">
			  <input type="hidden" value="<?php echo $arr[$i]['prod_id'];?>" id="prod_id">
			  <td><input type="text" size="2" maxlength="2" id="qty" name="<?php echo $arr[$i]['prod_id'];?>" value="<?php echo $arr[$i]['prod_stock'];?>"/></td>
			  <td> <?php 	if($arr[$i]['o_status']==1){?><a href="oinvoice.php?oid=<?php echo $arr[$i]['oid'];?>"><?php echo $arr[$i]['oid'];?></a> <?php } else {echo $arr[$i]['oid'];}?>	</td>
			  <td><?php echo $arr[$i]['prod_name'];?></td>
			  <td><?php echo $arr[$i]['prod_price'];?></td>
			  <td><?php echo $arr[$i]['c_num'];?></td>
			  <td><?php echo $arr[$i]['prod_price']*$arr[$i]['prod_stock'];?></td>
			   <td ><?php 
			  if($arr[$i]['cancel']==0)
			  { 
			  	if($arr[$i]['o_status']==0)
			  	{
			  		?>
			  		<font color="green">Confirmed </font>
			  		<button id="deliver" style="margin-left:5px;width:70px;height:40px;">Delivered</button>
			  				 <?php	
			  	}
			  	else {
			  	?><font color="blue">
			  		Delivered
			  			</font><?php
			  }
			  }  else
			  		{
			  		?>
			  		<font color="red">Cancelled</font>
			  		<?php
			  		}
			  		?></td>
			  
              </tr><?php
			}
        }
		}
			
    ?>
   
	
  </tbody>
</table><?php
		}
?>
	
</form>
</div>
	<footer>
	<p>Contact us</p>
	<p>Email: <a href="mailto:infoamss7108@gmail.com">infoamss7108@gmail.com</a>
	</p>
	<p>Contact Number: 8877661100</p>
	</footer>
</body>

</html>
