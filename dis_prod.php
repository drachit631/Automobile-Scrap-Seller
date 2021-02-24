<?php 
include('config.php');
if(isset($_POST['$prod_nm']))
{
	$result=mysqli_query($con,"select * from products");
	$rowcount=mysqli_num_rows($result);

while($row=mysqli_fetch_assoc($result))
	{
		$arr[$n]['prod_id']=$row['prod_id'];
		$arr[$n]['prod_price']=$row['prod_price'];
		$arr[$n]['prod_nm']=$row['prod_nm'];
		$arr[$n]['prod_specs']=$row['prod_specs'];
		$arr[$n]['prod_details']=$row['prod_details'];
		$arr[$n]['prod_stock']=$row['prod_stock'];
		$arr[$n]['price']=$row['prod_price'];
		
	
	
	$res=mysqli_query($con,"select prod_img from images where prod_id='".$arr[$n]['prod_id']."'");
	
	while($r=mysqli_fetch_assoc($res))
	{
	
		$ar[$n]['prod_img']=$r['prod_img'];
	
	}
	$n++;
	}?>
	<div style="margin-top:100px;margin-left:60px"><font style="color:black;font-family:'Open Sans', sans-serif"><b>Showing results
		<?php echo $n."...";?> </b></font></div>
			
			<?php
			for($i=0;$i<$n;$i++)
			{
			?>
			<div id="products" class="row list-group" style="margin-left:40px">
        <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image"<?php
					echo 'src="'.$ar[$i]['prod_img'].'" alt="HTML5 Icon" style="width:100px;height:100px"';?>>  </div><div class="caption">
                    <h4 class="group inner list-group-item-heading"><?php
					echo $arr[$i]['prod_nm'];?></h4> </div><p class="group inner list-group-item-text"><?php
					echo $arr[$i]['prod_specs'];?></p>
					<div class="row">
                        <div class="col-xs-12 col-md-6" style="margin-top:20px">
                            <p class="lead"><font style="color:black;font-family:Open Sans, sans-serif"><b><?php
						echo "Rs.".$arr[$i]['price'];?></b></font></p> </div>
                        <div class="col-xs-12 col-md-6" style="margin-top:10px" position="absolute">
	
						<a href="addtocart.php?id=<?php echo $arr[$i]['prod_id']; ?>" class="btn btn-info btn-lg"  name="add" id="add" style="width:60%" role="button">Add to Cart</a></div><?php
}
}?>