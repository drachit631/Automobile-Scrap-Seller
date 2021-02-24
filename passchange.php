<?php
include('config.php');


?>
<html>
<head>
<link rel="stylesheet" href="css/products.css">
    <link rel="stylesheet" href="css/cart.css" type="type/css">
	<link rel="stylesheet" href="css/prod1.css" type="type/css">
	<link rel="stylesheet" href="css/line.css" type="type/css">
	<link rel="stylesheet" href="css/animate.css" type="type/css">
	<link rel="stylesheet" href="css/box1.css" type="type/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
 $(document).on('change',".confpass", function(){
		 var newpass=$('#newpass').val();
		 var confpass=$('#confpass').val();
		 if(confpass==newpass)
		{
			return true;
		}
		else
		{
			alert('Password mismatched,Enter password again correctly...');
			$(".newpass").val('');
			$(".confpass").val('');
			$(".newpass").focus();
		}
		
	});
	 $(document).on('click',"#confirm", function(){
		 var rpass=$('#newpass').val();
		var email=$('#email').val();
			$.ajax({
			
			type:"POST",
			url: "passchange2.php",
			data:{rpass:rpass,email:email},
	
			success:function(response){
				alert(response);
				window.location.href="homepage.php";
			}
			 
		
	});
	 });
</script>
<style>
input[type=text] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 3px solid #ccc;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
}

input[type=text]:focus {
  border: 3px solid #555;
}
input[type=number] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 3px solid #ccc;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
}

input[type=number]:focus {
  border: 3px solid #555;
}
input[type=password] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 3px solid #ccc;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
}

input[type=password]:focus {
  border: 3px solid #555;
}
.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}
.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}
.center {
  margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;
}
</style>
</head>
<body>
<form>
<a href="fp.php"><--Go Back</a>
<div class="center">
	<?php if(isset($_GET['email']))
	{
		$email=$_GET['email'];
	?><input type="hidden" value="<?php echo $email;?>" id="email"><?php } ?>
	 <label for="newpass" style="margin-left:10px">New Password:</label><br>
	 <input type="password" id="newpass"><br>
	   <label for="confpass" style="margin-left:10px">Confirm Password:</label><br>
	 <input type="password" id="confpass"><br>
	
	 <button class="button button1" style="width:80px;height:40px" id="confirm">Confirm</button>
</div>
</form>
	</body>
	</html>