<?php   
include('config.php');
if(isset($_SESSION['log']))
{
	if(isset($_SESSION['type']))
	{
		header("Location:dealer.php");
	}
	else
	{
		header("location:user.php");
	}
}
elseif(isset($_GET['val']))
{
	echo '<script language="javascript">';
echo 'alert("Incorrect email or password!")';
echo '</script>';

}
$arr=array();
$result=0;
static $n=0;
$ar=array();
$res=0;

if(isset($_GET['catid']))
{

	
	$catid=$_GET['catid'];

		
		$result=mysqli_query($con,"select * from products  where cat_id='$catid'") or die(mysqli_error($con));
	
			
	
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
		
		
	
		$prodim=$arr[$n]['prod_id'];
		$res=mysqli_query($con,"select prod_img from images where prod_id='".$arr[$n]['prod_id']."'");
	
		while($r=mysqli_fetch_assoc($res))
		{
	
			$ar[$n]['prod_img']=$r['prod_img'];
		}
		$n++;
		}
}
/*elseif($_SESSION['filter']==1)
{
	echo '<script type="text/javascript">',
     'var xhttp;
 
     xhttp=new XMLHttpRequest();
  
   xhttp.onreadystatechange=function(){
     if (this.readyState==4 && this.status==200){
     	
       document.getElementById("dis").innerHTML=this.responseText;
     }
   };
            
   xhttp.open("GET","sort.php?type=submit,true);
   xhttp.send();',
     '</script>'
   ;
}
elseif($_SESSION['filter']==2)
{
	echo '<script type="text/javascript">',
     'var xhttp;
 
     xhttp=new XMLHttpRequest();
  
   xhttp.onreadystatechange=function(){
     if (this.readyState==4 && this.status==200){
       document.getElementById("dis").innerHTML=this.responseText;
     }
   };
   xhttp.open("GET","sort.php?type=low",true);
   xhttp.send();',
     '</script>'
   ;
}
elseif($_SESSION['filter']==3)
{
	echo '<script type="text/javascript">',
     'var xhttp;
 
     xhttp=new XMLHttpRequest();
  
   xhttp.onreadystatechange=function(){
     if (this.readyState==4 && this.status==200){
       document.getElementById("dis").innerHTML=this.responseText;
     }
   };
   xhttp.open("GET","sort.php?type=high",true);
   xhttp.send();',
     '</script>'
   ;
}*/
elseif(isset($_GET['prodid']))
{

	$prodnm=mysqli_escape_string($con,$_GET['prodid']);
	$result=mysqli_query($con,"select * from products where prod_nm='$prodnm'");
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
		
		
	echo $arr[$n]['prod_id'];
	$res=mysqli_query($con,"select prod_img from images where prod_id='".$arr[$n]['prod_id']."'");
	
	while($r=mysqli_fetch_assoc($res))
	{
	
		$ar[$n]['prod_img']=$r['prod_img'];
		
	}
	$n++;
	}
		unset($_GET['prodid']);
	}
else
{
	
		$result=mysqli_query($con,"select * from products") or die(mysqli_error($con));
	
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
	}
	

} 
	for($i=0;$i<$n;$i++)
			{
			?>
			<div id="products" class="row list-group" style="margin-left:300px">
        <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image"<?php
					echo 'src="'.$ar[$i]['prod_img'].'" alt="HTML5 Icon" style="width:100px;height:100px"';?>>  </div><div class="caption">
                    <h4 class="group inner list-group-item-heading"><a href="prod_det.php?id=<?php  echo $arr[$i]['prod_id'];?>"><?php
					echo $arr[$i]['prod_nm'];?></a></h4> </div><p class="group inner list-group-item-text"><?php
					echo $arr[$i]['prod_specs'];?></p>
					<div class="row">
                        <div class="col-xs-12 col-md-6" style="margin-top:20px">
                            <p class="lead"><font style="color:black;font-family:Open Sans, sans-serif"><b><?php
						echo "Rs.".$arr[$i]['price'];?></b></font></p> </div>
                        <div class="col-xs-12 col-md-6" style="margin-top:10px" position="absolute">
	
						<a href="addtocart.php?id=<?php echo $arr[$i]['prod_id']; ?>" class="btn btn-info btn-lg"  name="add" id="add" style="width:80%" role="button">Add to Cart</a>
						</div>
                    </div>
                </div>
            </div><hr>
			<?php }?>