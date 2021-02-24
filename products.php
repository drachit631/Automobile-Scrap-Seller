<!DOCTYPE html>
<?php 
include('config.php');?>
 <?php
 session_start();
error_reporting(E_ALL); 
	ini_set('display_errors', 1);

if(!isset($_SESSION['log']))
{
header("Location:homepage.php");
die();
}


$id=isset($_SESSION['user_id'])?$_SESSION['user_id']:'';
$arr=array();

static $n=0;
$ar=array();

if(isset($_GET['catid']))
{
	$catid=$_GET['catid'];
	$result=mysqli_query($con,"select * from products where cat_id='$catid'");
	$rowcount=mysqli_num_rows($result);
	
	
while($row=mysqli_fetch_assoc($result))
	{
		$arr[$n]['prod_id']=$row['prod_id'];
		$arr[$n]['prod_price']=$row['prod_price'];
		$arr[$n]['prod_nm']=$row['prod_nm'];
		$arr[$n]['prod_specs']=$row['prod_specs'];
		$arr[$n]['prod_details']=$row['prod_details'];
		$arr[$n]['prod_stock']=$row['prod_stock'];
		$arr[$n]['price']=$row['prod_price'];
		
		
	
	$prodim=$arr[$n]['prod_id'];
	$res=mysqli_query($con,"select prod_img from images where prod_id='".$arr[$n]['prod_id']."'");
	
	while($r=mysqli_fetch_assoc($res))
	{
	
		$ar[$j]['prod_img']=$r['prod_img'];
	}
	$n++;
	}
}
elseif(isset($_GET['prodid']))
{
	$prodnm=mysqli_escape_string($con,$_GET['prodid']);
	$result=mysqli_query($con,"select * from products where prod_nm='$prodnm'");
	$rowcount=mysqli_num_rows($result);

while($row=mysqli_fetch_assoc($result))
	{
		$arr[$n]['prod_id']=$row['prod_id'];
		$arr[$n]['prod_price']=$row['prod_price'];
		$arr[$n]['prod_nm']=$row['prod_nm'];
		$arr[$n]['prod_specs']=$row['prod_specs'];
		$arr[$n]['prod_details']=$row['prod_details'];
		$arr[$n]['prod_stock']=$row['prod_stock'];
		$arr[$n]['price']=$row['prod_price'];
		
		
	echo $arr[$n]['prod_id'];
	$res=mysqli_query($con,"select prod_img from images where prod_id='".$arr[$n]['prod_id']."'");
	
	while($r=mysqli_fetch_assoc($res))
	{
	
		$ar[$n]['prod_img']=$r['prod_img'];
		
	}
	$n++;
	}
		unset($_GET['prodid']);
	}
else
{
		$result=mysqli_query($con,"select * from products");
	$rowcount=mysqli_num_rows($result);

while($row=mysqli_fetch_assoc($result))
	{
		$arr[$n]['prod_id']=$row['prod_id'];
		$arr[$n]['prod_price']=$row['prod_price'];
		$arr[$n]['prod_nm']=$row['prod_nm'];
		$arr[$n]['prod_specs']=$row['prod_specs'];
		$arr[$n]['prod_details']=$row['prod_details'];
		$arr[$n]['prod_stock']=$row['prod_stock'];
		$arr[$n]['price']=$row['prod_price'];
		
	
	
	$res=mysqli_query($con,"select prod_img from images where prod_id='".$arr[$n]['prod_id']."'");
	
	while($r=mysqli_fetch_assoc($res))
	{
	
		$ar[$n]['prod_img']=$r['prod_img'];
	
	}
	$n++;
	}
	

}
 ?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home Page</title>
	
 <?php include('template/header1.php');?>
 <script src="typeahead.min.js"></script>	
	<script type="text/javascript">
		$(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'search.php?key=%QUERY',
        limit : 10
    });
});
$(document).ready(function(){
$('#search').keypress(function(event){
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode == '13'){
		var prod=$('#search').val();
		window.location.href="user.php?prodid="+prod;
	}
});
}); 
	$(document).ready(function()
	{
	$("#category").change(function()
	{
		var catid=$(this).val();
		window.location.href="products.php?catid"+catid;
	
		
	});
	});
   
    </script>
	<style>
	footer
	{
		background-color:black;
		color: white;
	}
		.search{
        width: 230px;
        position: relative;
       margin-top:10px;
        font-size: 14px;
    }
.typeahead, .tt-query, .tt-hint {
	border: 2px solid #CCCCCC;
	border-radius: 8px;
	font-size: 16px;
	height: 30px;
	line-height: 30px;
	outline: medium none;
	padding: 8px 12px;
	width: 230px;
}
.typeahead {
	background-color: #FFFFFF;
}
.typeahead:focus {
	border: 2px solid #0097CF;
}
.tt-query {
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
	color: #999999;
}
.tt-dropdown-menu {
	background-color: #FFFFFF;
	border: 1px solid rgba(0, 0, 0, 0.2);
	border-radius: 8px;
	box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	margin-top: 12px;
	padding: 8px 0;
	width: 422px;
}
.tt-suggestion {
	font-size: 24px;
	line-height: 24px;
	padding: 3px 20px;
}
.tt-suggestion.tt-is-under-cursor {
	background-color: #0097CF;
	color: #FFFFFF;
}
.tt-suggestion p {
	margin: 0;
}

	* {
  box-sizing: border-box;
}
select {
    border: 1px solid #000;
    background-color: transparent;
	font-color:#000000;
}
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
option { 
    /* Whatever color  you want */
    background-color: gray;
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
</style>
</head>

<?php 

$h=mysqli_query($con,"select f_name from registration where u_id='$id'") or die(mysqli_error($con));
$r=mysqli_fetch_assoc($h);

	$fn=$r['f_name'];


	?>
<body class="news">
	<header >
		
		<div class="nav" >
		
	<ul >
				<li><img src="logo.png"  style="margin-bottom:30px;margin-right:20px;height:150px;width:150px"> </li>
				<li><font color="white" style="font-size:14px;margin-left:30px" !important><?php echo "Welcome,".$fn;?></font></li>
			  <li style="margin-left:377px;margin-top:40px" ><div  class="search"><input  type="text" name="typeahead" id="search" class="typeahead tt-query" autocomplete="off" placeholder="Search..." spellcheck="false"></div></li>
				<li class="active" style="margin-left:120px"><a href="user.php">Home</a></li>
					
					
					
				  <li style="margin-left:5px">
				  
				  
				 <select name="category" id="category" style="width:120px;height:40px;margin-bottom:5px">
				 
				 <option selected="selected"> <font color="white">Categories</font></option>
				  <?php
				  $sql_row=mysqli_query($con,"select * from categories");
				  while($row=mysqli_fetch_assoc($sql_row))
					{
						?>
				  
					<option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_nm'];?></option>
					<?php }?>
					</select>

       
				</li>
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
				</ul>
            </div>

 
		<form method="GET">
		
		<div style="margin-top:100px;margin-left:60px"><font style="color:black;font-family:'Open Sans', sans-serif"><b>Showing results
		<?php echo $n."...";?> </b></font></div>
			
			<?php
			for($i=0;$i<$n;$i++)
			{
			?>
			<div id="products" class="row list-group" style="margin-left:40px">
        <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image"<?php
				
					echo 'src="'.$ar[$i]['prod_img'].'" alt="HTML5 Icon" style="width:100px;height:100px"';?>>  </div><div class="caption">
                    <h4 class="group inner list-group-item-heading"><a href="prod_det.php?id=<?php  echo $arr[$n]['prod_id'];?>"><?php
					echo $arr[$i]['prod_nm'];?></a></h4> </div><p class="group inner list-group-item-text"><?php
					echo $arr[$i]['prod_specs'];?></p>
					<div class="row">
                        <div class="col-xs-12 col-md-6" style="margin-top:20px">
                            <p class="lead"><font style="color:black;font-family:Open Sans, sans-serif"><b><?php
						echo "Rs.".$arr[$i]['price'];?></b></font></p> </div>
                        <div class="col-xs-12 col-md-6" style="margin-top:10px" position="absolute">
	
						<a href="addtocart.php?id=<?php echo $arr[$i]['prod_id']; ?>" class="btn btn-info btn-lg"  name="add" id="add" style="width:80%" role="button">Add to Cart</a>
						</div>
                    </div>
                </div>
            </div>
			<hr>
		
			<?php 
			}?>
			
			
	
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
