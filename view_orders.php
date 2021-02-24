<?php
session_start();
include_once("config.php");
$grand_total=0;

?>

<html>
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
			
			}
	
			});
		});
	});
		</script>
		<style>
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
/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}
@media screen and (min-width: 600px) {

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

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}

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

@media (min-width:1200px){.container{width:100% !important}}</style>
</head>
	<body class="news">
	<header >
		
		<div class="nav" >
		
	<ul>
				<li><img src="logo.png"  style="margin-bottom:30px;margin-right:20px;height:200px;width:200px"></li>
			
				<li class="active" style="margin-left:800px"><a href="AdminPage.php">Home</a></li>
					<li class="active" style="margin-left:5px"><a href="view_users.php">Users</a></li>
				<li class="active" style="margin-left:5px"><a href="view_orders.php">Orders</a></li>
				  </ul>
				</div>
			
			  
	
    <h1 align="center" style="margin-top:10px">View Order</h1>
<div class="cart-view-table-back" style="max-width:900px">
<form method="post" action="confirm.php">
<table width="100%"  cellpadding="6" cellspacing="0"><thead><tr><th>Order ID</th><th>Quantity</th><th>Product Name</th><th>Customer ID</th><th>Dealer ID</th><th>Status</th><th>Total</th></tr></thead>
  <tbody>
 	<?php
 		
	$total = 0; 
		$subtotal=0;

			$arr=array();
				
		$result=mysqli_query($con,"select * from orders");
	$rowcount=mysqli_num_rows($result);
	static $i=0;
	while($r=mysqli_fetch_assoc($result))
	{
		
		
			$arr[$i]['uid']=$r['u_id'];
			$arr[$i]['oid']=$r['o_id'];
			$arr[$i]['o_status']=$r['o_status'];
			$arr[$i]['prod_id']=$r['prod_id'];
			$arr[$i]['qty']=$r['prod_qty'];
			$arr[$i]['cancel']=$r['canc_stat'];
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
			$h=mysqli_query($con,"select contact_no,f_name from registration where u_id='".$arr[$i]['d_id']."'");
			$q=mysqli_fetch_assoc($h);
			$arr[$i]['d_num']=$q['contact_no'];
			$arr[$i]['canc']=$r['canc_stat'];
			$arr[$i]['fn']=$q['f_name'];
			$i++;
	}
	for($n=0;$n<$i;$n++)
		{	
		
			$subtotal = ($arr[$n]['prod_price'] * $arr[$n]['qty']); 
			
		   	$bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 
		      ?><tr class="'.$bg_color.'">
			  <input type="hidden" id="prod_id1" value="<?php echo $arr[$n]['prod_id'];?>">
			  <input type="hidden" id="prod_stck" value="<?php echo $arr[$n]['prod_stock'];?>">
			   <td> <a href="oinvoice.php?=<?php echo $arr[$n]['oid'];?>"><?php echo $arr[$n]['oid'];?></a></td>
			  <td><?php echo $arr[$n]['qty'];?></td>
			 
			  <td><?php echo $arr[$n]['prod_name'];?></td>
			  <td><?php echo $arr[$n]['uid'];?></td>
			<td><?php echo $arr[$n]['d_id'];?></td>
			
			  <td><?php 
			  if($arr[$n]['cancel']==0)
			  { 
			  	if($arr[$n]['o_status']==0)
			  	{
			  		?>
			  		<font color="green">Confirmed </font>
			  		
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
			  		?></font></td>
			  <td><?php echo $subtotal;?></td>
			 
              </tr><?php
			$total = ($total + $subtotal); 
			$_SESSION['total']=$total;
        }
			
    ?>
    <tr><td colspan="5"><span style="float:right;text-align: right;"> Amount Payable : <?php echo $total;?></span></td></tr>

    
	
  </tbody>
</table>
<footer>
  <p>Contact us</p>
  <p>Email: <a href="mailto:infoamss7108@gmail.com">infoamss7108@gmail.com</a>
  </p>
  <p>Contact Number: 8877661100</p>
  </footer>
  
</body>
</html>