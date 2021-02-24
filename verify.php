<?php
include('config.php');

             
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = mysqli_escape_string($con,$_GET['email']); 
    $hash = mysqli_escape_string($con,$_GET['hash']);
                 
    $search = mysqli_query($con,"SELECT email_id,hash FROM registration WHERE email_id='".$email."' AND hash='".$hash."'") or die(mysqli_error()); 
    $match  = mysqli_num_rows($search);
                 
    if($match > 0){
        
        mysqli_query($con,"UPDATE registration SET active='1' WHERE email_id='".$email."' AND hash='".$hash."'") or die(mysql_error());
        echo '<div>Your account has been activated, you can now login</div>';
		header("location:homepage.php");
		
    }else{
        
        echo '<div>The url is either invalid or you already have activated your account.</div>';
    }
                 
}else{
 
    echo '<div>Invalid approach, please use the link that has been send to your email.</div>';
}
?>