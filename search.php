<?php
include('config.php');
    $key=$_GET['key'];
    $array = array();
    
    $query=mysqli_query($con, "select prod_nm from products where prod_nm LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['prod_nm'];
    }
    echo json_encode($array);
    mysqli_close($con);
?>
