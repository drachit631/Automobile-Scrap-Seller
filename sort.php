<!DOCTYPE html>
<?php 
include('config.php');?>
 <?php
 

$min1=0;
$max1=0;
$connect = mysqli_connect('localhost', 'root', '', 'amss'); 
 if(isset($_GET['x']) && isset($_GET['y']))
            {
              $min1=$_GET['x'];
              $max1=$_GET['y'];
              }


  if($_GET['type']=='submit')
 {
              $_SESSION['filter']=1;
              $query ="select * from products where prod_price BETWEEN '$min1' AND '$max1'";
              $result = mysqli_query($connect, $query);
              $rowcount=mysqli_num_rows($result);
  if($rowcount > 0)
    {
      while($row = mysqli_fetch_assoc($result))  
      { 
       $result2 = mysqli_query($connect,"select * from images where prod_id='".$row['prod_id']."'");
   $row2=mysqli_fetch_assoc($result2); 
        $i=0;
      if($i!=$rowcount-1){
     ?>
      <div id="products" class="row list-group" style="margin-left:40px">
        <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image"<?php
        
          echo 'src="'.$row2['prod_img'].'" alt="HTML5 Icon" style="width:100px;height:100px"';?>>  </div><div class="caption">
                    <h4 class="group inner list-group-item-heading"><a href="prod_det.php?id=<?php  echo $row['prod_id'];?>"><?php
          echo $row['prod_nm'];?></a></h4> </div><p class="group inner list-group-item-text"><?php
          echo $row['prod_specs'];?></p>
          <div class="row">
                        <div class="col-xs-12 col-md-6" style="margin-top:20px">
                            <p class="lead"><font style="color:black;font-family:Open Sans, sans-serif"><b><?php
            echo "Rs.".$row['prod_price'];?></b></font></p> </div>
                        <div class="col-xs-12 col-md-6" style="margin-top:10px" position="absolute">
  
            <a href="addtocart.php?id=<?php echo $row['prod_id']; ?>" class="btn btn-info btn-lg"  name="add" id="add" style="width:80%" role="button">Add to Cart</a>
            </div>
                    </div>
                </div>
            </div>
      <hr>
    
      <?php 
      $i++;
    }
}
    }
      }
      
elseif($_GET['type']=='low' )
 {
  $_SESSION['filter']=2;
 $query = "select * from products ORDER BY prod_price";  
 $result1 = mysqli_query($connect, $query);
 $rowcount=mysqli_num_rows($result1);
 
 while($row = mysqli_fetch_assoc($result1))
{
   $result2 = mysqli_query($connect,"select * from images where prod_id='".$row['prod_id']."'");
   $row2=mysqli_fetch_assoc($result2);
      ?>
      <div id="products" class="row list-group" style="margin-left:40px">
        <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image"<?php
        
          echo 'src="'.$row2['prod_img'].'" alt="HTML5 Icon" style="width:100px;height:100px"';?>>  </div><div class="caption">
                    <h4 class="group inner list-group-item-heading"><a href="prod_det.php?id=<?php  echo $row['prod_id'];?>"><?php
          echo $row['prod_nm'];?></a></h4> </div><p class="group inner list-group-item-text"><?php
          echo $row['prod_specs'];?></p>
          <div class="row">
                        <div class="col-xs-12 col-md-6" style="margin-top:20px">
                            <p class="lead"><font style="color:black;font-family:Open Sans, sans-serif"><b><?php
            echo "Rs.".$row['prod_price'];?></b></font></p> </div>
                        <div class="col-xs-12 col-md-6" style="margin-top:10px" position="absolute">
  
            <a href="addtocart.php?id=<?php echo $row['prod_id']; ?>" class="btn btn-info btn-lg"  name="add" id="add" style="width:80%" role="button">Add to Cart</a>
            </div>
                    </div>
                </div>
            </div>
      <hr>
   <?php    

 }}
 elseif($_GET['type']=='high')
 {
  $_SESSION['filter']=3;
 $query = "select * from products ORDER BY prod_price DESC";  
 $result1 = mysqli_query($connect, $query);
 
  while($row = mysqli_fetch_assoc($result1))  
    {  
      $result2 = mysqli_query($connect,"select * from images where prod_id='".$row['prod_id']."'");
      $row2=mysqli_fetch_assoc($result2);
      ?>
      <div id="products" class="row list-group" style="margin-left:40px">
        <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image"<?php
        
          echo 'src="'.$row2['prod_img'].'" alt="HTML5 Icon" style="width:100px;height:100px"';?>>  </div><div class="caption">
                    <h4 class="group inner list-group-item-heading"><a href="prod_det.php?id=<?php  echo $row['prod_id'];?>"><?php
          echo $row['prod_nm'];?></a></h4> </div><p class="group inner list-group-item-text"><?php
          echo $row['prod_specs'];?></p>
          <div class="row">
                        <div class="col-xs-12 col-md-6" style="margin-top:20px">
                            <p class="lead"><font style="color:black;font-family:Open Sans, sans-serif"><b><?php
            echo "Rs.".$row['prod_price'];?></b></font></p> </div>
                        <div class="col-xs-12 col-md-6" style="margin-top:10px" position="absolute">
  
            <a href="addtocart.php?id=<?php echo $row['prod_id']; ?>" class="btn btn-info btn-lg"  name="add" id="add" style="width:80%" role="button">Add to Cart</a>
            </div>
                    </div>
                </div>
            </div>
      <hr>
   <?php      
  }}
else {
    ?>
<div class="no-result">No Results</div>
<?php
}
 ?>
