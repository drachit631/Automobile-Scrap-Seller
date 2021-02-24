
<script> 
 
 $(document).ready(function () {
  $('#lth').click(function(e){
    e.preventDefault();
    $.ajax({  
                method: "post",
                url: "sort.php",  
                data: $('#employee_table').serialize(),
                dataType:"html",
                success:function(response)  
                {
                    $('#sorted').html(response);
                }

  )};  
)};

</script>

<?php

$conn = mysqli_connect("localhost", "root", "", "amss");

$result = mysqli_query($conn, "select * from products where prod_price BETWEEN '$min' AND '$max'");

$count = mysqli_num_rows($result);
if ($count > 0) {
    ?>

<?php
  while($row = mysqli_fetch_array($result))  
    {  
       ?>  
           <tr>  
                              <td><?php echo $row["prod_id"]; ?></td>  
                               <td><?php echo $row["prod_nm"]; ?></td>  
                               <td><?php echo $row["prod_specs"]; ?></td>  
                               <td><?php echo $row["prod_price"]; ?></td>               
                          </tr>  
                          <?php  
                          } }
                          else
                          {
                            echo "no records";
                          } 
                          ?> 
