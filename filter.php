<html>
<body>

<select name ="filter">
	<option value="lowhigh">LOW-HIGH</option>
	<option value="highlow">HIGH-LOW</option>
</select>
<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password,"amss");
$result=mysqli_query($conn,"SELECT * FROM Products");
 while ($row = mysqli_fetch_array($result))
            {

                $prodid    = $row['prod_id'];
                $User_id = $row['u_id'];
                $prod_name = $row['prod_nm'];
                $prod_price=$row['prod_price'];
                $prod_details=$row['prod_details'];
                $prod_spec=$row['prod_specs'];
                $prod_stock=$row['prod_stock'];
                $cat_id=$row['cat_id'];
                echo $row['prod_id'];
            echo $row['prod_nm'];
            echo $row['prod_price'];
            echo $row['prod_details'];
            echo $row['prod_details'];
            echo $row['prod_specs'];
            echo $row['prod_stock'];
               } 
            if(isset($lowhigh))
            {
            $conn = new mysqli($servername, $username, $password,"amss");	
            $result=mysqli_query($conn,"SELECT * FROM Products ORDER BY prod_price DESC");
            while ($row = mysqli_fetch_array($result))
            {

                $prodid    = $row['prod_id'];
                $User_id = $row['u_id'];
                $prod_name = $row['prod_nm'];
                $prod_price=$row['prod_price'];
                $prod_details=$row['prod_details'];
                $prod_spec=$row['prod_specs'];
                $prod_stock=$row['prod_stock'];
                $cat_id=$row['cat_id'];
                echo $row['prod_id'];
            echo $row['prod_nm'];
            echo $row['prod_price'];
            echo $row['prod_details'];
            echo $row['prod_details'];
            echo $row['prod_specs'];
            echo $row['prod_stock'];
               } 
            }
             if(isset($highlow))
            {
            $conn = new mysqli($servername, $username, $password,"amss");	
            $result=mysqli_query($conn,"SELECT * FROM Products ORDER BY prod_price ASC");
            while ($row = mysqli_fetch_array($result))
            {

                $prodid    = $row['prod_id'];
                $User_id = $row['u_id'];
                $prod_name = $row['prod_nm'];
                $prod_price=$row['prod_price'];
                $prod_details=$row['prod_details'];
                $prod_spec=$row['prod_specs'];
                $prod_stock=$row['prod_stock'];
                $cat_id=$row['cat_id'];
                echo $row['prod_id'];
            echo $row['prod_nm'];
            echo $row['prod_price'];
            echo $row['prod_details'];
            echo $row['prod_details'];
            echo $row['prod_specs'];
            echo $row['prod_stock'];
               } 
            }
            



?>