
<html>
<head>
<?php include('config.php');
?>
<?php
session_start();
if(!isset($_SESSION['log']))
{
  header('location:admin_login.php');
}
?>
 <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    	<link rel="stylesheet" href="css/animate.css" type="type/css">
	
   
	

	<link href="style/style.css" rel="stylesheet" type="text/css">
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="typeahead.min.js"></script>	
 <script type="text/javascript">
	 $(document).ready(function()
	 {
		$('#add').click(function()
		{
			event.preventDefault();
			var cat=$('#add_cate').val();
			window.location.href="add_categories.php?cat="+cat;
		});	
	 });
 </script>
 <style>footer
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
  
		* {
  box-sizing: border-box;
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
/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}
@media screen and (min-width: 600px) {

  }
  
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
@media (min-width:1200px){.container{width:100% !important}}
</style>
</head>

<body class="news">
	<header >
		
		<div class="nav" >
		
	<ul>
				<li><img src="logo.png"  style="margin-bottom:30px;margin-right:20px;height:200px;width:200px"></li>
			
				<li class="active" style="margin-left:800px"><a href="AdminPage.php">Home</a></li>
					<li class="active" style="margin-left:5px"><a href="view_users.php">Users</a></li>
				<li class="active" style="margin-left:5px"><a href="view_orders.php">Orders</a></li>
    <li class="active" style="margin-left:5px"><a href="admin_logout.php">Sign Out</a></li>
				  </ul>
				</div>
			
			  
        
<form class="add_categories.php"  method="post">
		
  
              
            

         

		
	<font style="font-size:25px;margin-left:-500px"  !important><b>Enter Product Category:</b></font>
	
		<input type="text"  id="catid"  style="width:200px;margin-left:300px;" placeholder="Enter Category Name" />
		
		<br>
      	<button class="example" id="add" style="margin-left:100px;margin-top:20px">Submit</button>
		<footer>
  <p>Contact us</p>
  <p>Email: <a href="mailto:infoamss7108@gmail.com">infoamss7108@gmail.com</a>
  </p>
  <p>Contact Number: 8877661100</p>
  </footer>
  

		
	</header>
	



	</body>
</html>