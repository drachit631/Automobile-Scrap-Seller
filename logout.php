<?php
	session_start();
	 if (isset($_SESSION['log'])) {
    
    $_SESSION = array();
	session_destroy();
	header("Location:homepage.php");
	
	 }
	?>
