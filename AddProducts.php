<?php include('config.php');



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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home Page</title>
	
    <!-- css -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="plugins/cubeportfolio/css/cubeportfolio.min.css">
	<link href="css/nivo-lightbox.css" rel="stylesheet" />
	<link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
	<link href="css/owl.carousel.css" rel="stylesheet" media="screen" />
    <link href="css/owl.theme.css" rel="stylesheet" media="screen" />
	<link href="css/animate.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/products.css">
	<!-- boxed bg -->
	<link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />
	<!-- template skin -->
	<link id="t-colors" href="color/default.css" rel="stylesheet">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/cart.css" type="type/css">
	<link rel="stylesheet" href="css/line.css" type="type/css">
	<link rel="stylesheet" href="css/regi.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<style>
	* {
  box-sizing: border-box;
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
select {
    border: 1px solid #000;
    background-color: transparent;
	font-color:#000000;
}
	.example {
  float: left;
  width: 30%;
  padding: 10px;
  height:10%;
  padding-bottom:10px;
  background: #2196F3;
  color: white;
  font-size: 15px;
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
  margin-left:100px;
}
/* Style the submit button */
form.example button {
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

form.example button:hover {
  background: #0b7dda;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}
textarea,select,input[type=text],[type=password],[type=tel]{
		margin-left:150px;
		margin-top:10px;
	}
	label{
	margin-top:15px;
	}
@media (min-width:1200px){.container{width:100% !important}}
</style>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom" style="background:url('homepage.jpg');background-size:100%100%">





<div id="wrapper">
	
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		
        <div class="container navigation" style="background: url('bg.jpg');background-size:cover">
		<div class="col-sm-6 col-md-6">
					<img class="logo_thumb" title="Automobile Scraps seller Logo" src="https://www.freelogoservices.com/api/main/images/1j+ojlxEOMkX9Wyqfhe43D6kiv+ArRFJmBnNwWJqZ0EMsVAxz3J02qdwlq55e11D+hJe30haMNBhiiltFN5MzV8w8j6IOoxFWXx...yiM=" data-src="https://www.freelogoservices.com/api/main/images/1j+ojlxEOMkX9Wyqfhe43D6kiv+ArRFJmBnNwWJqZ0EMsVAxz3J02qdwlq55e11D+hJe30haMNBhiiltFN5MzV8w8j6IOoxFWXx...yiM=" alt="Automobile Scraps sellerLogo"  height="90" width="150" />
					</div>
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
              
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse" >
			  <ul class="nav navbar-nav">
			  
				
				
				 
				<li> <a href="ord.php" class="notification">
					<span><font style="color:black"><b>Your Orders</b></font></span>
				<span class="badge"></span>
					</a>
					</li>
					
					<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><font style="color:black"><b>My Account <b class="caret"></b></b></font></a>
				  <ul class="dropdown-menu">
				  
					<li><a href="index-video.html">Account Information</a></li>
					<li><a href="logout.php">Sign Out</a></li>
				</ul>
				</li>
				
			  </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
		
        <!-- /.container -->
    </nav>
		<br>
		<form class=="example" action="prod.php" method="POST" enctype="multipart/form-data">
		<div class="testbox" id="result" style="margin-top:150px">
			
			<label for="category">Select Category:</label><br>
			<select name="category" id="category" style="width:100px;margin-top:10px">
				  <option selected="selected"><b>Categories</option>
				  <?php
				  $sql_row=mysqli_query($con,"select * from categories");
				  while($row=mysqli_fetch_assoc($sql_row))
					{
						?>
				  
					<option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_nm'];?></option>
					<?php }?>
					</select>
		
	 
	 
<br>	
<label for="prod_nm">Enter Product Name:</label><br>
<input type="text" name="prod_nm" id="prod_nm" placeholder="Product Name" required>
	
            
			<br>
			
			<label for="prod_nm">Select Image:</label><br>
			<input type="file" name="image" id="image" style="margin-left:150px">
			
			
			
			
			<br>
			
			<label for="prod_det">Enter Product Details:</label><br>
			<textarea name="prod_det" id="prod_det" placeholder="Product Details" required></textarea>
            

          
			   
		<br>
		<label for="prod_specs">Enter Product Specifications:</label><br>
		<textarea name="prod_specs" id="prod_specs" placeholder="Product Specifications" required></textarea>
			<br>
			<label for="prod_price">Enter Product Price:</label><br>
			<input type="text" pattern="{0-9}[9]" name="prod_price" id="prod_price" placeholder="Product Price" required>
            <br>
			<label for="prod_stock">Enter Product Stock:</label><br>
			<input type="text" pattern="{0-9}[2]" name="prod_stock" id="prod_stock" placeholder="Product Stock" required>
            <br>
			<br>
			<input type="submit" class="example" value="Add Product" name="addprod" style="margin-left:150px;margin-top:30px;width:150px;height:50px">
			
			
			
			<!-- /.navbar-collapse -->
        </div>
		</div>
        <!-- /.container -->
   
	</form>
	
		
		
		
	


</body>

</html>
	

  