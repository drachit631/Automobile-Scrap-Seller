<?php 
$fn=array();
if(isset($_SESSION['user_id']))
{
	$id=$_SESSION['user_id'];
$h=mysqli_query($con,"select f_name from registration where u_id='$id'") or die(mysqli_error($con));
while($r=mysqli_fetch_assoc($h))
{
	$fn=$r['f_name'];
}
}

	?>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom" style="background:url('homepage.jpg');background-size:100%100%">


<div id="wrapper">
	
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		
        <div class="container navigation" style="background: url('bg.jpg');background-size:cover">
		<div class="col-sm-6 col-md-6">
					<img class="logo_thumb" title="Automobile Scraps seller Logo" src="https://www.freelogoservices.com/api/main/images/1j+ojlxEOMkX9Wyqfhe43D6kiv+ArRFJmBnNwWJqZ0EMsVAxz3J02qdwlq55e11D+hJe30haMNBhiiltFN5MzV8w8j6IOoxFWXx...yiM=" data-src="https://www.freelogoservices.com/api/main/images/1j+ojlxEOMkX9Wyqfhe43D6kiv+ArRFJmBnNwWJqZ0EMsVAxz3J02qdwlq55e11D+hJe30haMNBhiiltFN5MzV8w8j6IOoxFWXx...yiM=" alt="Automobile Scraps sellerLogo"  height="90" width="150" />
					<br><font color="black"><b><?php print_r($fn);?></b></font>
				</div>
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
              
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse" style="margin-top:30px">
			  <ul class="nav navbar-nav">
			  <li class="active"><div class="search"><input type="text" name="typeahead" id="search" class="typeahead tt-query" autocomplete="off" placeholder="Search..." spellcheck="false"></div>
				</li>
				<li><a href="homepage.php"><font style="color:black"<b>Home</b></font></a></li>
				
				
				  <li><font style="color:#000000;font-family:'Open Sans', sans-serif;font-size:15px">
				  <select name="category" id="category" style="width:120px;margin-top:10px">
				  <option selected="selected">Categories</option>
				  <?php
				  $sql_row=mysqli_query($con,"select * from categories");
				  while($row=mysqli_fetch_assoc($sql_row))
					{
						?>
				  
					<option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_nm'];?></option>
					<?php }?>
					</select>
					

       
				  </font>
				</li>
			
				<li> <div class="container">
						<a href="view_cart.php" class="btn btn-info btn-lg"><font style="color:black"><b>
						<span class="glyphicon glyphicon-shopping-cart"></span> Cart
						</b></font></a></div>
					</li>
					<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><font style="color:black"><b>My Account <b class="caret"></b></b></font></a>
				  <ul class="dropdown-menu">
				  
				  <li class=""><a href="orders.php">Orders</a></li>
					<li><a href="index-video.html">Account Information</a></li>
					<li><a href="logout.php">Sign Out</a></li>
			
				
			  </ul>
			  	</li>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>