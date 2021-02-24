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
 $(document).ready(function(){
	 $('#num').hide();
	 $('#f_id').hide();
	 $('#confirm').hide();
	 $('#fl').hide();
	 $('#loader').hide();
	 $("#verify").click(function(){
		event.preventDefault();
		$('#loader').show();
		var email=$('#email_id').val();
		$.ajax({
			type:"POST",
			url: "fpmail.php",
			data:{email:email},
	
			success:function(data)
			{
				$('#loader').hide();
						if(data=="1")
						{
							$('#num').show();
							$('#f_id').show();
							$('#confirm').show();
							$('#fl').show();
							
							alert('Number has been sent to your email!');
						}
						else if(data=="0")
						{
							
							alert('Could not send email!');	
						}
						else if(data=="2")
						{
							
							alert('Email is incorrect!');
						}
						else if(data=="3")
						{
							
							alert('Please Enter the Email first!');
						}
						else{
							
							alert(data);
						}
			}
		});
	 });	
	  $("#confirm").click(function(){
		event.preventDefault();
		var email=$('#email_id').val();
		var fid=$('#f_id').val();
		$.ajax({
			type:"POST",
			url: "fpconf.php",
			data:{email:email,fid:fid},
	
			success:function(data){
				 if(data=="1")
				{
					alert('Number Confirmed!');	
					window.location.href="passchange.php?email="+email;
				}
				else if(data=="2")
				{
					alert('Number is incorrect!');
				}
				else  {
					alert(data);
				}
			}
		
	  });
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
#loader {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 50px;
  height: 50px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
input[type=number]:focus {
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
<a href="homepage.php"><--Go Back</a>
<div class="center">
	
	 <label for="email_id" style="margin-left:10px">Email:</label><br>
	 <input type="text" name="email_id" id="email_id" tabindex="1" class="form-control" placeholder="Email" value="" autocomplete="off"><br><br>
	  <button class="button button2" style="width:80px;height:40px" id="verify">Verify</button><div id="loader" style="margin-left:40px;margin-top:20px"></div><br><br>
	  <label id="num"><font color="red">Enter the number sent to email below and click Confirm..</font></label><br>
	   <label id="fl" style="margin-left:10px" for="f_id">Enter Number:</label><br>
	  <input type="number" id="f_id"><br>
	 <button class="button button1" style="width:80px;height:40px" id="confirm">Confirm</button>
</div>
</form>
	</body>
	</html>