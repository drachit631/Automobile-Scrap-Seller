<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  

    <title>Registration</title>
	
 
	<link rel="stylesheet" href="css/regi.css" type="text/css">
	

	<link id="t-colors" href="color/default.css" rel="stylesheet">

    <link rel="stylesheet" href="css/cart.css" type="type/css">
	
	
	
      
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script language="javascript" type="text/javascript">
		
		 $(document).on('change',".gstinnumber", function(){    
		 
    var inputvalues = $(this).val();
    var gstinformat = new RegExp('^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$');
	var user=$("input[name='user']:checked").val();
	if(user=="true")
	{
    if (gstinformat.test(inputvalues)) {
     return true;
    } else {
        alert('Please Enter Valid GSTIN Number');
		$(".gstinumber").val('');
        $(".gstinnumber").focus();
	}
	}
    });
	 $(document).on('change',".email_id", function(){
		 var email_id= $('#email_id').val();
		 var emailPattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			if( emailPattern.test(email_id)==true)
			{
				return true;
				
			}
			else
			{
					alert("Email did not match,Enter again..");
				$(".email_id").val('');
				$(".email_id").focus();
				
			}
			
	 });
	  $(document).on('change',"#contn", function(){
		  var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
		  var contn= $('#contn').val();
		   if(contn.match(phoneno))
        {
      return true;
        }
      else
        {
        alert("Contact Number Incorrect");
       $("#contn").val('');
				$("#contn").focus();
        }
	  });
	  
	 $(document).ready(function(){
		 $("#gstn").hide(); 
		 $("#lgst").hide();
		  $("#lg").hide();
	$("input[type='radio']").change(function(){
	var user=$(this).val();
	
   if(user=="true")
   {	
		$("#lg").show();
	   $("#lgst").show();
      $("#gstn").show();
   }
   else
   {
		 $("#lg").hide();
		$("#lgst").hide();
       $("#gstn").hide(); 
   }
  

	});
	 });

	 $(document).on('change',".rpass", function(){
		 var rpass=$(this).val();
		 var pass=$('#pass').val();
		 if(rpass==pass)
		{
			return true;
		}
		else
		{
			alert('Password mismatched,Enter password again correctly...');
			$(".pass").val('');
			$(".rpass").val('');
			$(".pass").focus();
		}
		
	});
	$(document).on('focus', '#state', function() {
	 $(".state").attr("size", 100);

 
});
	$(document).on('focus', '#city', function() {
		$(".state").attr('size', 0);
      $(".city").attr("size", 100);

  
});
$(document).on('change', '#name', function() {
	 
 var nm= $('#name').val();
		 var namePattern = "/^[a-zA-Z]+ [a-zA-Z]+$/";
			if( namePattern.test(nm)==true)
			{
				return true;
				
			}
			else
			{
					alert("Name invalid");
				$("#name").val('');
				$("#name").focus();
				
			}
 
});
$(document).on('focus', '#postz', function() {
	$(".city").attr('size', 0);
});
	$(document).ready(function(){
    $("#btn_reg").click(function(){
		event.preventDefault();
		var name = $("#name").val();
		var email_id = $("#email_id").val();
		var pass = $("#pass").val();
		var rpass=$("#rpass").val();
		var contn = $("#contn").val();
		var addr=$("#addr").val();
		var state=$('#state option:selected').text();
		var city=$('#city option:selected').text();
		var user=$("input[name='user']:checked").val();
		var gstn=$("#gstn").val();
		var postz=$("#postz").val();
		

		$.ajax({
			
			type:"POST",
			url: "reg.php",
			data:{name:name,email_id:email_id,pass:pass,contn:contn,addr:addr,state:state,city:city,user:user,gstn:gstn,postz:postz},
	
			success:function(response){
				alert(response);
			}
			
            
         });
		
   
	});
	});
	
	
	$(document).ready(function()
	{
	$("#category").change(function()
	{
		var catid=$(this).val();
		window.location.href="products.php";
	
		
	});
	});
	</script>
	<style>
	body{ 


  background-image: url('bodybg/bgimg.png');
   

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
	
	textarea,select,input[type=text],[type=password],[type=tel]{
		margin-left:150px;
		margin-top:10px;
	}
	label{
	margin-top:15px;
	}
	</style>
	<!--GST-->
	

	
	
	<!--STATE CITY-->
	
	<script type="text/javascript">
	
	$(document).ready(function()
	{
	$(".state").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "city.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding2").hide();
				$(".city").html(html);
			}
	
		});
	});
	});
	
    </script>
	

</head>

<body style="background-image: url('bodybg/bgimg.jpg')">




<div class="testbox" id="result" >

  <h1>Registration</h1>

  
      <hr>
	  
    <div class="accounttype">
		<input type="radio" value="false" id="radioOne" name="user"  checked/>
		<label for="radioOne" class="radio" >Customer</label>
	  
		<input type="radio" value="true" id="radioTwo" name="user"  >
		<label for="radioTwo" class="radio">Dealer</label>
	  
    </div>
  <hr>
  
		<label for="name">Full name:</label><br>
		<input type="text" name="name" id="name"  placeholder="Full Name" required/><font color="red">*</font>
	<br>
	
		<label for="email_id">Email:</label><br>
		<input type="text" name="email_id" id="email_id"  class="email_id" placeholder="Email" required/><font color="red">*</font>
	<br>
	
		<label for="pass">Password:</label>	<br>
		<input type="password" name="pass" class="pass" id="pass" placeholder="Password" required/><font color="red">*</font>
	<br>
	
		<label for="rpass">Retype Password:</label><br>
		<input type="password" name="rpass" class="rpass" id="rpass" style="margin-top=10px" placeholder="Retype Password" required/><font color="red">*</font>
	
	<br>
		<label for="contn">Contact Number:</label><br>
		<input type="tel" name="contn" id="contn" pattern="[0-9]{10}"placeholder="Contact Number"  required/><font color="red">*</font>
	
	<br>
		<label for="addr">Address:</label><br>
		<textarea name="addr" id="addr" placeholder="Address" /required></textarea><font color="red">*</font>
	
	<br>
	
		<label for="state">Select State:</label><br>
		<select name="state" class="state" id="state" ><font color="red">*</font>
		<option selected="selected">--Select State--</option>
	
	<?php
	
		$sql="select * from states";
		$sql_row=mysqli_query($con,$sql);
		while($row=mysqli_fetch_assoc($sql_row))
		{
		?>
	
		<option value="<?php echo $row['State_Id']; ?>" ><?php echo $row["State_Name"]; ?></option>
		<?php
		}
	?>
	</select>
	<br>
			<label for="city">Select City:</label><br>
			<select name="city" class="city" id="city"><font color="red">*</font>
			<option selected="selected">--Select City--</option>

	</select>
	<br>
			<label for="postz">Pin Code:</label><br>
			<input type="text" pattern="[0-9]{6}" name="postz" id="postz" placeholder="Pin Code" required/><font color="red">*</font>
	
	<br>
			<label id="lgst" for="gstn">GST Number</label><br>
			<input type="text"  name="gstn" id="gstn" class="gstinnumber" placeholder="GST Number"><font id="lg" color="red">*</font>
	
	
	<br><br>
	
		<center><input  class="example" style="margin-left:300px"  type="submit" value="Register" id="btn_reg" name="reg"></center>
		<br><br><br><br>
		<div style="margin-left:250px"><a href="homepage.php"><font color="red"><b>Already have an account? Click here to login</b></font></a></div>
  
   </form>
  
</div>

</body>

</html>
