<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="alterdata.php" method="post">
<?php
$servername ="localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password,"amss");

$res1=mysqli_query($conn,"SELECT u_id FROM registration");
while ($row1 = mysqli_fetch_array($res1))
            {
            	$user_id= $row1['u_id'];
            	}
$res=mysqli_query($conn,"SELECT * FROM registration WHERE u_id ='$user_id'"  );
 while ($row = mysqli_fetch_array($res))
            {

                $F_name = $row['f_name'];
                $Emai_id = $row['email_id'];
                $cn_no = $row['contact_no'];
                $pass=$row['passwrd'];
                $add=$row['address'];
                $state_name=$row['State_Name'];
                $prod_stock=$row['City_Name'];
                $p_code=$row['post_code'];
                ?>
                <table>
                	<tr>
                		<td>

            
               Name: <?php echo $row['f_name']."<br>"; ?>
       </tr>
       <tr>
                		<td>

                Email-id: <?php echo $row['email_id']."<br>"; ?> 
               </td>
           </tr>
           <tr>
                		<td>

                 Contact No:<?php echo $row['contact_no']."<br>"; ?>
             </td>
         </tr>
         <tr>
                		<td>


Address: <?php echo $row['address']."<br>"; ?> 
</td>
</tr>
<tr>
	<td>
  State_Name: <?php echo $row['State_Name']."<br>"; ?> 
</td>
</tr>
<tr>
	<td>
  City_Name:<?php echo $row['City_Name']."<br>"; ?> 
</td>
</tr>
<tr>
	<td>

   Post-Code:<?php echo $row['post_code']."<br>"; ?>           
</td>
</tr>
<tr>
	<td>
		<input type="submit" value="Update">
	</td>
</tr>
<tr>
	<td>
		<input type="submit" value="cancel">
	</td>
</tr>
</table>
</body>
</html>

<?php

}
?>