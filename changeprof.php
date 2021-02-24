<?php
include('config.php');
session_start();
if(!isset($_SESSION['log']))
{
	header("Location:homepage.php");
	die();
}
	else
	{
		if(isset($_SESSION['type']))
		{
		header("location:dealer.php");
		}
		
			
	}
$id=isset($_SESSION['user_id'])?$_SESSION['user_id']:'';
?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script language="javascript" type="text/javascript">
		$(document).ready( function(){
			$('#confpass').hide();
			$('#conf').hide();
			var user=$('#uid').val();
   if(user=="true")
   {	
			
			$('#gst').show();
			$('#gstn').show();
		}
		else
		{
			$('#gst').hide();
			$('#gstn').hide();
		}
		$('#edit').click(function() {
	 event.preventDefault();
	 $('#confpass').show();
			$('#conf').show();
        $('#fnm').prop('disabled', false);
        $('#email').prop('disabled', false);
        $('#pass').prop('disabled', false);
        $('#addr').prop('disabled', false);
        $('#pin').prop('disabled', false);
        
	
   if(user=="true")
   {	
		
      $('#gstn').prop('disabled', false);
       $('#gstn').change(function(){    
		 
    var inputvalues = $(this).val();
    var gstinformat = new RegExp('^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$');
	
    if (gstinformat.test(inputvalues)) {
     return true;
    } else {
        alert('Please Enter Valid GSTIN Number');
		$("#gstn").val('');
        $("#gstn").focus();
	}
	
    });
   }
   
        $('#contact').prop('disabled', false);
		});
		$('#updt').click(function(){
			var fn=$('#fnm').val();
       
        var pass=$('#pass').val();
        var addr=$('#addr').val();
        var pin=$('#pin').val();
        var gstn=$('#gstn').val();
        var contact=$('#contact').val();
        
        	$.ajax({
			
			type:"POST",
			url: "changeprof1.php",
			data:{user:user,name:name,pass:pass,contact:contact,addr:addr,fn:fn,gstn:gstn,pin:pin},
	
			success:function(response){
				alert(response);
			}
        });
		});
		$('#canc').click(function(){
				location.reload();
		});
});

	
	  $(document).on('change',"#contact", function(){
		  var phoneno = /^\d{10}$/;
		  var contn= $('#contact').val();
		   if(contn.match(phoneno))
        {
      return true;
        }
      else
        {
        alert("Contact Number Incorrect");
       $("#contact").val('');
				$("#contact").focus();
        }
	  });
	 $(document).on('change',"#confpass", function(){
		 var rpass=$(this).val();
		 var pass=$('#pass').val();
		 if(rpass==pass)
		{
			return true;
		}
		else
		{
			alert('Password mismatched,Enter password again correctly...');
			$("#pass").val('');
			$("#confpass").val('');
			$("#pass").focus();
		}
		
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
input[type=number],[type=password] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 3px solid #ccc;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
}
textarea:focus {
  border: 3px solid #555;
}
textarea {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 3px solid #ccc;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
  height:120px;
}

input[type=number],[type=password]:focus {
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
select {
    border: 1px solid #000;
    background-color: transparent;
	font-color:#000000;
}

</style>
		</head>
		<body>
		<a href="user.php"><--Go Back</a><div class="center">
	<table style="margin-left:40px">
	<?php
	 $s1=mysqli_query($con,"select * from registration where u_id='$id'");
	 while($res=mysqli_fetch_array($s1))
	 {
	 	
	?>
	<input type="hidden" id="uid" value="<?php echo $res['type']; ?>">
		<font size="18px">
		<tr>
			<td>
 Name:<br><input type ="text" id="fnm" value="<?php echo $res['f_name']; ?>" name="txtname" disabled>
</td>
</tr>
<tr>
	<td>

Password:<br><input type ="password" id="pass" value="<?php echo $res['passwrd'];?>"name="txtpass" disabled>
</td>
<td>

<label for="confpass" id="conf">Confirm Password:</label><br><input type ="password" style="width:150px" id="confpass" >
</td>
</tr>
<tr>
	<td>
 Mobile No:<br><input type ="text" id="contact" value="<?php echo $res['contact_no'];?>"name="txtmob" disabled>
</td>
</tr>
<tr>
<td>
 Address:<br>
<textarea name="tarea" id="addr"  width="100px" height="140px" disabled> <?php echo $res['address'];?></textarea>
</td>
</tr>

<tr>
			<td>
				Pincode:<br><input type="text" id="pin" value="<?php echo $res['post_code'];?>"name="txtpin" disabled>
			</td>
		</tr>
		<tr>
		<td style="margin-left:40px">
				<label for="gstn" id="gst">GST Number:</label><br><input type="text" id="gstn" value="<?php echo $res['gst_no'];?>"name="txtgst" disabled>
			</td>
		</tr>
		<?php } ?><tr>
			<td>
			<br><br>
				<input class="button button1" style="width:120px;height:50px;margin-left:200px" type="submit" id="edit" value="Edit">
			</td>
			<td>
			<br><br>
				<input class="button button1" style="width:120px;height:50px" type="submit" id="updt" value="Update">
			</td>
			<td>
			<br><br>
				<input type="submit" class="button button2" style="width:120px;height:50px" id="canc" value="Cancel">
			</td>
		</tr>
</font>

</table>
</div>
