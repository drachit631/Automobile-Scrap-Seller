<!DOCTYPE html>

<?php
include('config.php');
?>
<html lang="en">

<?php 
session_start();

if(isset($_SESSION['log']))
{
	if(isset($_SESSION['type']))
	{
		header("Location:dealer.php");
	}
	else
	{
		header("Location:User.php");
	}
}
elseif(isset($_GET['val']))
{
	echo '<script language="javascript">';
echo 'alert("Incorrect email or password!")';
echo '</script>';

}

	$arr=array();
$result=0;
static $n=0;
$ar=array();
$res=0;

if(isset($_GET['catid']))
{

	
	$catid=$_GET['catid'];

		
		$result=mysqli_query($con,"select * from products  where cat_id='$catid'") or die(mysqli_error($con));
	
			
	
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
	
			$ar[$n]['prod_img']=$r['prod_img'];
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
	
		$result=mysqli_query($con,"select * from products") or die(mysqli_error($con));
	
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
 <?php
$min = 100;
$max = 300;

if (! empty($_POST['min_price'])) {
    $min = $_POST['min_price'];
}

if (! empty($_POST['max_price'])) {
    $max = $_POST['max_price'];
}

?>
	<head>
	
    <title>Home Page</title>
	

	<link rel="stylesheet" href="css/products.css">
    <link rel="stylesheet" href="css/cart.css" type="type/css">
	<link rel="stylesheet" href="css/prod1.css" type="type/css">
	<link rel="stylesheet" href="css/line.css" type="type/css">
	<link rel="stylesheet" href="css/animate.css" type="type/css">
	<link rel="stylesheet" href="css/box1.css" type="type/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
		window.location.href="homepage2.php?prodid="+prod;
	}
});
}); 
	$(document).ready(function()
	{
	$("#category").change(function()
	{
		var catid=$(this).val();
		window.location.href="homepage2.php?catid="+catid;
	
		
	});
	});
	$(document).ready(function()
	{
	$("#category").change(function()
	{
		var catid=$(this).val();
		window.location.href="products.php?catid="+catid;
		
   
		
	});
	});
	</script>
	<style>
	
	@import url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css');
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
		body {
  margin: 0;
  padding: 0;
  background: #ccc;
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
 
@media screen and (min-width: 600px) {}
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

	* {
  box-sizing: border-box;
}
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
.example  {
  float: left;
  width: 35%;
  padding: 10px;
  height:4%;
  padding-bottom:10px;
  background: #2196F3;
  color: white;
  font-size: 15px;
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
}

.example :hover {
  background: #0b7dda;
}

/* Clear floats */
.example::after {
  content: "";
  clear: both;
  display: table;
}

/* Style the submit button */
form.example button {
  float: left;
  width: 300px;
  padding: 10px;
  height:300px;
  padding-bottom:10px;
  background: #2196F3;
  color: white;
  font-size: 13px;
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}
option { 
    /* Whatever color  you want */
    background-color: gray;
}
@media screen and (min-width: 600px) {

  }
  section{
	float: right;
	width: 428px;
	padding-left: 20px;
	margin: 0 0 20px 0px;
	border-left: 2px dotted #b2a497;

}
#loading
{
	text-align:center; 
	background: url('loader.gif') no-repeat center; 
	height: 150px;
}
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
---------------------------------------------------------//-------------------------------------------------------
</style>
</head>

<body class="news">

	<header>
		
		<div class="nav" >
		
	<ul >
				<li><img src="logo.png"  style="margin-bottom:30px;margin-right:20px;height:150px;width:150px"> </li>
			  <li style="margin-left:497px;margin-top:40px" ><div  class="search"><input  type="text" name="typeahead" id="search" class="typeahead tt-query" autocomplete="off" placeholder="Search..." spellcheck="false"></div></li>
				<li class="active" style="margin-left:120px"><a href="homepage.php">Home</a></li>
					
					
					
				  <li style="margin-left:5px">
				  
				  
				 <select name="category" id="category" style="width:120px;height:40px;margin-bottom:5px">
				 
				 <option selected="selected" > <font color="white">Categories</font></option>
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
					</li>
					
						
					
					<li class="dropdown" style="margin-left:20px">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="white">Login</font> <span class="caret"></span></a>
					 <ul class="dropdown-menu dropdown-lr animated slideInRight" style="min-width:200px" role="menu">
					   <form method="POST" action="login.php">
					<div class="col-lg-12">
					
            
                <div class="form-group">
                  <label for="email_id"><font color="white">Email</font></label>
                  <input type="text" name="email_id" id="email_id" tabindex="1" class="form-control" placeholder="Email" value="" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="pass"><font color="white">Password</font></label>
                  <input type="password" name="pass" id="pass" tabindex="2" class="form-control" placeholder="Password" autocomplete="off">
                </div>

                <div class="form-group">
                  <div class="row">
                   
                    <div class="col-xs-5 ">
                      <input type="submit" style="width:80px" name="login" id="login-submit" tabindex="4" class="form-control btn btn-success" value="Log In">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="text-center">
                        <a href="fp.php" tabindex="5" class="forgot-password">Forgot Password?</a>
						
						<a href="register.php">Click here to register</a>
                      </div>
                    </div>
                  </div>
                </div>  
              </form>
            </div>	
			 </li>
			 </ul>
     </ul>
    </div>
     <br>	
 <table>
 <tr>
 <td>   

<div data-aos="fade-up" data-aos-delay="100">
		<div style="margin-left:315px"><font style="color:black;font-family:'Open Sans', sans-serif"><b>Showing results
		<?php echo $n."...";?> </b></font></div></td>
<td>
<div data-aos="fade-up" data-aos-delay="100" style="margin-left:340px;">

	<?php
	include 'prod_filter.php';
	?>
	</div>
        </td>
        </tr>
        </table>
 <br>	
		 
  

                <div class="table-responsive" id="dis">  
                     
                </div>  
           </div>   
           <div id="products" class="row list-group" style="margin-left:300px"> 
			</div>
			
	
	<footer>
	<p>Contact us</p>
	<p>Email: <a href="mailto:infoamss7108@gmail.com">infoamss7108@gmail.com</a>
	</p>
	<p>Contact Number: 8877661100</p>
	</footer>
	<script type="text/javascript">
		$( "#dis" ).load( "products1.php" );

  
 function showdata(){
   var xhttp;
 
     xhttp=new XMLHttpRequest();
   document.getElementById('lth').onclick=function(){
   xhttp.onreadystatechange=function(){
     if (this.readyState==4 && this.status==200){
       document.getElementById("dis").innerHTML=this.responseText;
     }
   };
   xhttp.open("GET","sort.php?type=low",true);
   xhttp.send();
 };
 document.getElementById('htl').onclick=function(){
   xhttp.onreadystatechange=function(){
     if (this.readyState==4 && this.status==200){
       document.getElementById("dis").innerHTML=this.responseText;
     }
   };
   xhttp.open("GET","sort.php?type=high",true);
   xhttp.send();
 };
 document.getElementById('sub').onclick=function(){
   xhttp.onreadystatechange=function(){
     if (this.readyState==4 && this.status==200){
     	
   // window.location.href="sort.php?min1"+min1+"max1"+max1;
       document.getElementById("dis").innerHTML=this.responseText;
     }
   };

	var x =   $('#min').val();  
	var y =   $('#max').val(); 
            
   xhttp.open("GET","sort.php?type=submit&x=" + x + "&y=" + y,true);
   xhttp.send();

 };
 }

</script>

</header>
</body>

</html>
