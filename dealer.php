

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
<?php 
$id=isset($_SESSION['user_id'])?$_SESSION['user_id']:'';
$h=mysqli_query($con,"select f_name from registration where u_id='$id'") or die(mysqli_error($con));
$r=mysqli_fetch_assoc($h);

	$fn=$r['f_name'];


	?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home Page</title>
	
 <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
 
<link rel="stylesheet" href="css/products.css">
    <link rel="stylesheet" href="css/cart.css" type="type/css">
	<link rel="stylesheet" href="css/prod1.css" type="type/css">
	<link rel="stylesheet" href="css/line.css" type="type/css">
	<link rel="stylesheet" href="css/animate.css" type="type/css">
	<link rel="stylesheet" href="css/box1.css" type="type/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script type="text/javascript">
	
	// $(document).ready(function()
	// {
	
	// });
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
  width: 5%;
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

.example button:hover {
  background: #0b7dda;
}

/* Clear floats */
.example::after {
  content: "";
  clear: both;
  display: table;
}
@media (min-width:1200px){.container{width:100% !important}}
</style>
</head>
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
			  
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="white">My Account <b class="caret"></b></font></a>
				  <ul class="dropdown-menu dropdown-lr animated slideInRight" style="min-width:200px" role="menu">
				  
				<div class="row">
					
            
              
				  <font color="white">
					
					<a href="changeprof.php">Account Information</a>
					<a href="logout.php">Sign Out</a></font>
				
			
				</div>
			  </ul>
			  	</li>
            </div>

 
		
		
		 <div class="container navigation">
			<a href="AddProducts.php" class="btn btn-info btn-lg" style="margin-top:150px">Add Product</a><br><br><hr>
			<a href="dealprods.php" class="btn btn-info btn-lg">Your Products</a>
			
		</div>
	

	
	<footer>
	<p>Contact us</p>
	<p>Email: <a href="mailto:infoamss7108@gmail.com">infoamss7108@gmail.com</a>
	</p>
	<p>Contact Number: 8877661100</p>
	</footer>

</body>

</html>
