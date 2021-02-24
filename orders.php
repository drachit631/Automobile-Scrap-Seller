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

    <title>Your Orders</title>
	
 <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    	<link rel="stylesheet" href="css/animate.css" type="type/css">
	<link rel="stylesheet" href="css/products.css">
    <link rel="stylesheet" href="css/cart.css" type="type/css">
	<link rel="stylesheet" href="css/prod1.css" type="type/css">
	<link rel="stylesheet" href="css/line.css" type="type/css">
	<link href="style/style.css" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script>
		function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
$(document).ready(function(){
    $("#cc").click(function(){
		var prodid= $("#prod_id1").val();
		var oid=$("#o_id").val();
		$.ajax({
			
			type:"POST",
			url: "cancelord.php",
			data:{prodid:prodid,oid:oid},
	
			success:function(response){
				alert(response);
				location.reload();
			}
			
            
         });
	});
});
	$(document).ready(function(){
    $("#cc2").click(function(){
	
				location.reload();
			
			
            
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
@media (min-width:1200px){.container{width:100% !important}}
/* Popup container */
.popup {
  position: relative;
  display: inline-block;
  cursor: pointer;
}

/* The actual popup (appears on top) */
.popup .popuptext {
  visibility: hidden;
  width: 160px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 8px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

/* Toggle this class when clicking on the popup container (hide and show the popup) */
.popup .show {
  visibility: visible;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
  from {opacity: 0;} 
  to {opacity: 1;}
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity:1 ;}
}</style>
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

 
<h1 align="center" style="">Your Orders</h1>
<div class="cart-view-table-back" style="max-width:1015px">
<form method="post" action="confirm.php">
<table width="1000px" style="font-size:16px"  cellpadding="6" cellspacing="0"><thead><tr><th>Quantity</th><th>Order_ID</th><th>Customer_ID</th><th>Customer_Name</th><th>Dealer_Name</th><th>Product_Name</th><th>Contact_Number</th><th>Status</th><th>Total</th></tr></thead>
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
		$result=mysqli_query($con,"select * from orders where u_id='$id'");
	$rowcount=mysqli_num_rows($result);
	for($i=0;$i<$rowcount;$i++)
		{
	while($r=mysqli_fetch_assoc($result))
	{
		
		
			$arr[$i]['oid']=$r['o_id'];
			$arr[$i]['cancel']=$r['canc_stat'];
			$arr[$i]['o_status']=$r['o_status'];
			$arr[$i]['prod_id']=$r['prod_id'];
			$arr[$i]['qty']=$r['prod_qty'];
			$query="select * from products where prod_id='".$arr[$i]['prod_id']."'";
			$cart=mysqli_query($con,$query)  or die(mysqli_error($con));
			$c=mysqli_fetch_assoc($cart) or die(mysqli_error($con));
			
			
			$arr[$i]['d_id']=$c['u_id'];
			$arr[$i]['prod_name']=$c['prod_nm'];
			$arr[$i]['prod_price']=$c['prod_price'];
			$arr[$i]['prod_stock']=$c['prod_stock'];
			$res=mysqli_query($con,"select prod_img from images");
			$b=mysqli_fetch_assoc($res);
			$arr[$i]['prod_img']=$b['prod_img'];
			$h=mysqli_query($con,"select f_name from registration where u_id='".$arr[$i]['d_id']."'") or die(mysqli_error($con));
			$q=mysqli_fetch_assoc($h);
			$arr[$i]['d_nm']=$q['f_name'];
		 		$j=mysqli_query($con,"select contact_no,f_name from registration where u_id='$id'") or die(mysqli_error($con));
			$k=mysqli_fetch_assoc($h);
			$arr[$i]['c_num']=$k['contact_no'];
			$arr[$i]['c_nm']=$k['f_name'];
	
		
		
			$subtotal = ($arr[$i]['prod_price'] * $arr[$i]['qty']); ?>
			
		 
		      
			  <input type="hidden" id="prod_id1" value="<?php echo $arr[$i]['prod_id'];?>">
			  <input type="hidden" id="prod_stck" value="<?php echo $arr[$i]['prod_stock'];?>">
			  <input type="hidden" id="o_id" value="<?php echo $arr[$i]['oid'];?>">
			  <td><?php echo $arr[$i]['qty'];?></td>
			    <td>  <a href="oinvoice.php?oid=<?php echo $arr[$i]['oid'];?>"><?php echo	$arr[$i]['oid'];?></td>
			<td><?php echo $id;?></td>
			<td><?php echo $fn; ?></td>
			<td><?php echo $arr[$i]['d_nm'];?></td>
			
			  <td><?php echo $arr[$i]['prod_name'];?></td>
			
			  <td><?php echo $cn;?></td>
			  <td><?php 
			  if($arr[$i]['cancel']==0)
			  { 
			  	if($arr[$i]['o_status']==0)
			  	{
			  		?>
			  		<font color="green">Confirmed </font>
			  		<div class="popup" onclick="myFunction()">
			  			<font color="red">Cancel Order</font>
			  			<span class="popuptext" id="myPopup">Click Confirm to Cancel this order.
			  				<button id="cc">Confirm</button><button id="cc2">Cancel</button></span>
			  			</div>
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
			  		?>
			  	</td>
			  <td><?php echo "Rs.".$subtotal;?></td>
			 
              </tr><?php
			$total = ($total + $subtotal); //add subtotal to total var
			$_SESSION['total']=$total;
        }}
			
    ?>
    <tr><td colspan="5"><span style="float:right;text-align: right;"> Amount Payable : <?php echo "Rs.".$total;?></span></td></tr>
    
	
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
