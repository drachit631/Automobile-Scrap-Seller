<?php
include('config.php');
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script>
$(document).ready(function(){
    $("#remove").click(function(){
			event.preventDefault();
			
			
			var id=$("input[name='remove_code']:checked").val();
			$.ajax({
			type:"POST",
			url: "fac_remove.php",
			data:{id:id},
			success:function(response){
				alert(response);
				location.reload();
			}
	
			});
		});
	});</script>
</head>
	<body><?php
		$q=mysqli_query($conn,"select * from facilities");
		?>
		<table><tr><th>Facility ID</th><th>Facility Name</th><th>Facility Price</th><th>Remove</th></tr>
		<?php
		while($b=mysql_fetch_assoc($q))
		{?>
		<td>
		<?php echo $b['fac_id'];?></td>
		<td>
		<?php echo $b['fac_nm'];?></td>
		<td>
		<?php echo $b['fac_price'];?></td>
		<td><input type="checkbox" name="remove_code" value="<?php echo $b['fac_id'];?>" /></td>
		<tr><td colspan="4"><a href="fac_add.php">Add More Items</a><button type="submit" id="remove">Remove</button>
		<?php } ?>
		
		</table>
		
		</body>
		</html>