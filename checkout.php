<?php
session_start();
include_once("config.php");
$grand_total=0;
$id=isset($_SESSION['user_id'])?$_SESSION['user_id']:'';
$j=mysqli_query($con,"select f_name,contact_no from registration where u_id='".$id."'");
			$k=mysqli_fetch_assoc($j);
			$cn=$k['contact_no'];
			$fn=$k['f_name'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Checkout</title>
	
	
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    	<link rel="stylesheet" href="css/animate.css" type="type/css">
	<link rel="stylesheet" href="css/products.css">
    <link rel="stylesheet" href="css/cart.css" type="type/css">
	<link rel="stylesheet" href="css/prod1.css" type="type/css">
	<link rel="stylesheet" href="css/line.css" type="type/css">
	<link href="style/style.css" rel="stylesheet" type="text/css"></head>
  
	<link href="style/style.css" rel="stylesheet" type="text/css"></head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script>
		$(document).ready(function(){
		
		$('#addr').hide();
		$('#contn').hide();
			$('#addre').click(function(){
			event.preventDefault();
				$('#addr').show();
			});
			$('#contne').click(function(){
				event.preventDefault();
				$('#contn').show();
			});
			
			$('#edit').click(function(){
				
				event.preventDefault();
				var addr=	$('#addr').val();
				var contn=$('#contn').val();
			$.ajax({
			type:"POST",
			url: "edit.php",
			data:{addr:addr,contn:contn},
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

 
<h1 align="center" style="margin-top:20px">Confirm Order</h1>
<div class="cart-view-table-back">
<form method="post" action="confirm.php">
<table width="100%"  cellpadding="6" cellspacing="0"><thead><tr><th>Quantity</th><th>Image</th><th>Name</th><th>Price</th><th>Contact Number</th><th>Total</th></tr></thead>
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
			$res=mysqli_query($con,"select prod_img from images where prod_id='".$arr[$i]['prod_id']."'");
			$b=mysqli_fetch_assoc($res);
			$arr[$i]['prod_img']=$b['prod_img'];
			$h=mysqli_query($con,"select contact_no from registration where u_id='".$arr[$i]['d_id']."'");
			$q=mysqli_fetch_assoc($h);
			$arr[$i]['d_num']=$q['contact_no'];
		 
	
		
		
			$subtotal = ($arr[$i]['prod_price'] * $arr[$i]['qty']); //calculate Price x Qty
			
		   	$bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 
		      ?><tr class="'.$bg_color.'">
			  <input type="hidden" id="prod_id1" value="<?php echo $arr[$i]['prod_id'];?>">
			  <input type="hidden" id="prod_stck" value="<?php echo $arr[$i]['prod_stock'];?>">
			  <td><?php echo $arr[$i]['qty'];?></td>
			  <td><img <?php echo 'src="'.$arr[$i]['prod_img'].'" alt="Product" style="width:50px;height:50px"';?>/></td>
			  <td><?php echo $arr[$i]['prod_name'];?></td>
			  <td><?php echo $arr[$i]['prod_price'];?></td>
			  <td><?php echo $arr[$i]['d_num'];?></td>
			  <td><?php echo $subtotal;?></td>
			 
              </tr><?php
			$total = ($total + $subtotal); //add subtotal to total var
			$_SESSION['total']=$total;
        }}
			
    ?>
    <tr><td colspan="5"><span style="float:right;text-align: right;"> Amount Payable : <?php echo $total;?></span></td></tr>
    
	
  </tbody>
</table>
<table width="100%"  cellpadding="6" cellspacing="2"><thead><tr><th>Address</th><th style="margin-left:100px">Contact Number</th></tr></thead>
<tbody>

	<?php
	
	$c=mysqli_query($con,"select address,contact_no from registration where u_id='$id'") or die(mysqli_error($con));
		while($r=mysqli_fetch_assoc($c))
		{
		
		 ?><tr class="'.$bg_color.'">
	
		 <td style="width:30%"><?php echo $r['address'];?><br><button id="addre">Change</button><br><textarea name="addr" id="addr" placeholder="Enter new Address"></textarea></td>
		
		 <td style="margin-left:20px"><?php echo $r['contact_no'];?><br><button id="contne" style="margin-right:300px;margin-top:60px" >Change</button><br><input type="number" id="contn" placeholder="Enter new number"></td>
		  
		
		 </tr>
		<?php }
		?>
		<tr><td colspan="5"><button id="edit">Edit</button>
		 <a href="confirm.php" style="margin-left:20px" class="button">Confirm</button></td></tr>
		
		</tbody>
		</table>
		
<?php
		}}
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
