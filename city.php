<?php
include('config.php');
if(isset($_POST['id']))
{
	$id=$_POST['id'];
	
	$sql=("SELECT * FROM cities WHERE State_Id='$id'");
	$sql_row=mysqli_query($con,$sql);
	
	?><option selected="selected">Select City :</option>
	<?php while($row=mysqli_fetch_assoc($sql_row))
	{
		?>
		<option value="<?php echo $row['City_Id']; ?>"><?php echo $row['City_Name']; ?></option>
		<?php
	}
}
?>