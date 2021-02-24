<body class="news">
	<header >
		
		<div class="nav" >
		
	<ul >
				<img src="logo.png" height="150px" width="150px"> 
			  <li style="margin-left:500px;margin-top:40px" ><div  class="search"><input  type="text" name="typeahead" id="search" class="typeahead tt-query" autocomplete="off" placeholder="Search..." spellcheck="false"></div></li>
				<li class="active" style="margin-left:120px"><a href="homepage.php">Home</a></li>
					
					
					
				  <li style="margin-left:5px">
				  
				  
				 <select name="category" style="width:120px;height:40px;margin-bottom:5px">
				 
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
			  
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="white">Login</font> <span class="caret"></span></a>
					 <ul class="dropdown-menu dropdown-lr animated slideInRight" style="min-width:200px" role="menu">
					 <form method="POST" action="login.php">
					<div class="col-lg-12">
					
              <form id="ajax-login-form" action="http://phpoll.com/login/process" method="post" role="form" autocomplete="off">
                <div class="form-group">
                  <label for="email_id"><font color="white">Email</font></label>
                  <input type="text" name="email_id" id="email_id" tabindex="1" class="form-control" placeholder="Email" value="" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="password"><font color="white">Password</font></label>
                  <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" autocomplete="off">
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
                <input type="hidden" class="hide" name="token" id="token" value="a465a2791ae0bae853cf4bf485dbe1b6">
              </form>
            </div>
					   
					
			 </li>
			 </ul>
			 
				
				
			  	
					
		
		
		
     </ul>
      
    </div>