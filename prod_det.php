<!DOCTYPE html>
<html>
<head>
	<title>Product Details</title>
<link href="style1.css" rel="stylesheet" type="text/css"/>
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
	$("#filter").click(function()
	{
		event.preventDefault();
		var catid=$('#catid2').val();
		var price=$("input[name='price']:checked").val();
		var min=$('#i1').val();
		var max=$('#i2').val();
		if(catid!=null)
		{
			
				if(min!=null && max!=null)
				{
					window.location.href="homepage2.php?min="+min+"max="+max+"price="+price+"catid="+catid;
				}
				else
				{
					window.location.href="homepage2.php?price="+price+"catid="+catid;
				}
		
		}
		else
		{
			
				if(min!=null && max!=null)
				{
					window.location.href="homepage2.php?min="+min+"max="+max+"price="+price;
				}
				else
				{
					window.location.href="homepage2.php?price="+price;
				}
			
			
		}
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
<style>
hr
{
	margin-left: -270px;
}
#more {display: none;
 }
 .read-more-content {
  max-height: 0;
  overflow: hidden;
  transition: max-height .25s ease;
}

</style>
</head>
<body class="news">
	<header >
		
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
					</li><li class="dropdown" style="margin-left:20px">
			  
					
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
	
</body>
</html>
<?php
$servername ="localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password,"amss");
if(isset($_GET['id']) & !empty($_GET['id'])){
$id=$_GET['id'];
$sql="select * from images WHERE prod_id='$id'";
$result=mysqli_query($conn,$sql);
 while ($row = mysqli_fetch_array($result))
            {
            	$imgid=$row['img_id'];
            	$prodid=$row['prod_id'];
            	$prodimg=$row['prod_img']; ?>
            	<img <?php  echo  'src="'.$prodimg.'" style="width:500px;height:396px; padding:1px;
   border:2px solid #021a40;
   background-color:#ff0;;
"';?>><?php ?>
<?php
	 $prod=mysqli_query($conn,"select * from products where prod_id='$id'") or die(mysqli_error($conn));
	 while($row=mysqli_fetch_array($prod))
	 {
	 	?>
	 	
	 	<?php 
	 	 $prod_de=$row['prod_details'];
		 $prodnm=$row['prod_nm'];
		 $prodprice=$row['prod_price'];
		 $prod_sp=$row['prod_specs'];
		 $prodst=$row['prod_stock'];?>

		          <b><font size="6" color="black"><div style="margin-left:540px;margin-top:-420px "></style></style><?php echo "<br>" .$prodnm;?></b></font></div><?php 	
		          ?>
		          <hr class="vl"><?php
		          ?><font size="4" color="black"><div style="margin-left:740px;margin-top:30px  "><div style="margin-left:-200px"><font size="4" color="red">STOCK: </font><?php echo $prodst;?></div><div style="margin-left:-200px">PRICE: <?php echo $prodprice;?><font color="green">INR</font></div><div style="margin-top:-40px"><a href="addtocart.php?id=<?php echo $prodid; ?>" class="btn btn-info btn-lg"  name="add" id="add" style="width:30%"  role="button" >Add to Cart</a></div>
		          <div style="margin-left:-270px"><hr></div><?php
?>	<font style="margin-left:-200px;">	          DETAIL:
</font>

		          <font size="3" color="black"><div style="margin-left:-200px  "><p><span id="dots"><?php echo $prod_de;?>....</span><span id="more"></span></p>
		          <button onclick="myFunction()" id="myBtn">Read more</button></font>
		          
		          <script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";

    btnText.innerHTML = "Read less"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "inline";
  }
}
</script>
<br>
<div style="margin-top : 10px">SPECS:

		           <font size="3" color="black"><div style="margin-right:300px;margin-top:-20px "><?php echo "<br><br>".$prod_sp;?></font></div>
		         <?php



		      }
		
	 
		
	



           }
}
?>