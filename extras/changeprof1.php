
<?php
session_start();
if(!isset($_SESSION['u_id']))
{
	$id=$_SESSION['u_id'];
}
else
{
	echo "fail";
}
if(!$_POST['txtname']  ||!$_POST['txtpass'] || !$_POST['txtmob'] || !$_POST['tarea']|| !$_POST['txtmail']|| !$_POST['city']|| !$_POST['txtpin'])
{
	echo "all fields fill properly";
}
else
{
	$name=$_POST['txtname'];
	$pass=$_POST['txtpass'];
	$mob=$_POST['txtmob'];
	$add=$_POST['tarea'];
	$mail=$_POST['txtmail'];
	$ct=$_POST['city'];
	$pin=$_POST['txtpin'];
	
}
$server="localhost";
$name="root";
$connn=mysql_connect("$server","$name","");
$db=mysql_select_db("amss");

$sql="UPDATE registration SET u_id='',f_name='$name',email_id='$txtmail',contact_no='txtmob',passwrd='txtpin',address='tarea',State_Name='',City_Name='$ct',post_code='$pin' WHERE id='$id";
$row=mysql_query($sql,$connn);

?>