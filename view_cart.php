<?php
session_start();
include_once("config.php");
$grand_total=0;
if(!isset($_SESSION['log']))
{
	header("Location:homepage.php");
	die();
}
	else
	{
		if(isset($_SESSION['type']))
		{
		header("location:dealer.php");
		}
		
			
	}
	$id=isset($_SESSION['user_id'])?$_SESSION['user_id']:'';
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cart</title>
	
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    	<link rel="stylesheet" href="css/animate.css" type="type/css">
	<link rel="stylesheet" href="css/products.css">
    <link rel="stylesheet" href="css/cart.css" type="type/css">
	<link rel="stylesheet" href="css/prod1.css" type="type/css">
	<link rel="stylesheet" href="css/line.css" type="type/css">
	<link href="style/style.css" rel="stylesheet" type="text/css">
  
	<link href="style/style.css" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script>
		$(document).ready(function(){
		$("#update").click(function(){
			event.preventDefault();
			var qty=$("#qty").val();
			var id=$('#prod_id1').val();
			var stck=$('#prod_stck').val();
			$.ajax({
			type:"POST",
			url: "cart_update.php",
			data:{qty:qty,id:id,stck:stck},
			success:function(response){
				alert(response);
				location.reload();
			}
	
			});
		});
	});
			$(document).ready(function(){
    $("#remove").click(function(){
			event.preventDefault();
			
			
			var id=$("input[name='remove_code']:checked").val();
			$.ajax({
			type:"POST",
			url: "cart_rem.php",
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


select {
    border:transparent;
    background-color: transparent;
	color:	#FFFFFF;
	font-size:20px;
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
@media (min-width:1200px){.container{width:100% !important}}</style>
</head>
<body class="news">
	<header >
		<?php 

$h=mysqli_query($con,"select f_name from registration where u_id='$id'") or die(mysqli_error($con));
$r=mysqli_fetch_assoc($h);

	$fn=$r['f_name'];
?>
		<div class="nav" >
		
	<ul >
				<li><img src="logo.png"  style="margin-bottom:30px;margin-right:20px;height:200px;width:200px"></li>
				<font style="font-size:20px;margin-left:90px;margin-bottom:5px" color="white"> <?php echo "Welcome, ".$fn;?></font>
				<li class="active" style="margin-left:660px"><a href="homepage.php">Home</a></li>
					
					
				
				<li style="margin-left:5px"> 
						<a href="view_cart.php" class="btn btn-info btn-lg">
						<span class="glyphicon glyphicon-shopping-cart"></span> Cart
						</a>
					</li><li class="dropdown" style="margin-left:20px">
			  
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="white">My Account<b class="caret"></b></font></a>
				  <ul class="dropdown-menu dropdown-lr animated slideInRight" style="min-width:200px" role="menu">
				  
				<div class="row">
					
            
              
				  <font color="white">
					<a href="orders.php">Orders</a>
					<a href="changeprof.php">Account Information</a>
					<a href="logout.php">Sign Out</a></font>
				
			
				</div>
			  </ul>
			  	</li>
            </div>

 
<h1 align="center" style="margin-top:20px">View Cart</h1>
<div class="cart-view-table-back" style="max-width:900px">
<form method="post" action="cart_update.php">
<table width="100%"  cellpadding="6" style="font-size:16px" cellspacing="0"><thead><tr><th>Quantity</th><th>Image</th><th>Name</th><th>Price</th><th>Contact Number</th><th>Total</th><th>Remove</th></tr></thead>
  <tbody>
 	<?php
	$total = 0; 
		$subtotal=0;
	if(isset($_SESSION['log'])) //check session var
    {
		if(isset($_SESSION['user_id'])){
			$arr=array();
			$qty=array();
				$id=$_SESSION['user_id'];
		$result=mysqli_query($con,"select * from cart where u_id='$id'");
	$rowcount=mysqli_num_rows($result);
	static $i=0;
	
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
			$res=mysqli_query($con,"select prod_img from images where prod_id='".$arr[$i]['prod_id']."'");
			$b=mysqli_fetch_assoc($res);
			$arr[$i]['prod_img']=$b['prod_img'];
			$h=mysqli_query($con,"select contact_no from registration where u_id='".$arr[$i]['d_id']."'");
			$q=mysqli_fetch_assoc($h);
			$arr[$i]['d_num']=$q['contact_no'];
			$i++;
	}
		for($n=0;$n<$i;$n++)
		{
			$subtotal = ($arr[$n]['prod_price'] * $arr[$n]['qty']); 
		      ?><tr class="'.$bg_color.'">
			  <input type="hidden" id="prod_id1" value="<?php echo $arr[$n]['prod_id'];?>">
			  <input type="hidden" id="prod_stck" value="<?php echo $arr[$n]['prod_stock'];?>">
			
			  <td><input type="text" size="2" maxlength="2" id="qty" name="<?php echo $arr[$n]['prod_id'];?>" value="<?php echo $arr[$n]['qty'];?>"/></td>
			  <td><img <?php echo 'src="'.$arr[$n]['prod_img'].'" alt="Product" style="width:50px;height:50px"';?>/></td>
			  <td><?php echo $arr[$n]['prod_name'];?></td>
			  <td><?php echo $arr[$n]['prod_price'];?></td>
			  <td><?php echo $arr[$n]['d_num'];?></td>
			  <td><?php echo $subtotal;?></td>
			  <td><input type="checkbox" name="remove_code" value="<?php echo $arr[$n]['prod_id'];?>" /></td>
              </tr><?php
			$total = ($total + $subtotal); 
        }}
			
    ?>
    <tr><td colspan="5"><span style="float:right;text-align: right;"> Amount Payable : <?php echo $total;?></span></td></tr>
    <tr><td colspan="5"><a href="user.php" class="button">Add More Items</a><button type="submit" id="update">Update</button><button type="submit" id="remove">Remove</button><a href="checkout.php" class="button">Checkout</a></td></tr>
	
  </tbody>
</table><?php
		}
else
	{
			header("location:homepage.php");
	}?>
<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>
</div>

</body>
</html>
