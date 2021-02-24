<!DOCTYPE html>
<?php
include('config.php');
?>
<html lang="en">
<?php
$min = 10000;
$max = 50000;
if (! empty($_POST['min_price'])) {
    $min = $_POST['min_price'];
}

if (! empty($_POST['max_price'])) {
    $max = $_POST['max_price'];
}

?>
<head>

<link rel="stylesheet"
    href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script type="text/javascript">
  
  $(function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 100000,
      values: [ <?php echo $min; ?>, <?php echo $max; ?> ],
      slide: function( event, ui ) {
        $( "#amount" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
    $( "#min" ).val(ui.values[ 0 ]);
    $( "#max" ).val(ui.values[ 1 ]);
      }
      });
    $( "#amount" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) +
     " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  });
  </script>
  <script type="text/javascript">
    function getelementby()
            { var min1;
              var max1;
              min1 = document.getElementById('min').value;
              max1 = document.getElementById('max').value;
            }
  </script>
<style>
body {
  font-family: Arial;
  width: 1350px;
}

.form-price-range-filter {
  text-align: center;
}

.tutorial-table {
    width: 100%;
    font-size: 13px;
    border-top: #e5e5e5 1px solid;
    border-spacing: initial;
    margin: 20px 0px;
    word-break: break-word;
}

.tutorial-table th {
    background-color: #f5f5f5;
  padding: 10px 20px;
  text-align: right;
}

.tutorial-table td {
    border-bottom: #f0f0f0 1px solid;
    background-color: #ffffff;
  padding: 10px 20px;
}

.text-right {
  text-align: right;
}

th.text-right {
  text-align: right;
}

.btn-submit {
  margin-top: 20px;
  padding: 10px 20px;
  background: #FFF;
  border: #aaa 1px solid;
  border-radius: 4px;
  margin: 20px 0px;
}

#min {
  float: left;
  width: 70px;
  padding: 5px 10px;
  margin-right: 10px;
}

#slider-range {
  width: 50%;
  float: left;
  margin: 5px 0px 5px 0px;
  margin-top: 10px;
}

#max {
  float: right;
  width: 70px;
  padding: 5px 10px;
  margin-left: 14px;
  margin-top: -25px; 
}

.no-result {
  padding: 20px;
  background: #ffdddd;
  text-align: center;
  border-top: #d2aeb0 1px solid;
  color: #6f6e6e;
}

.product-thumb {
  width: 50px;
  height: 50px;
  margin-right: 15px;
  border-radius: 50%;
  vertical-align: middle;
}
</style>


<body>

  <div class="col-lg-12">
          <div class="form-group">
                 <div align="center" <font style="color:black;font-size: 18px;font-style:bold;font-family:'Open Sans', sans-serif;font-weight: bold;">Price</font></div></br>
                    <div id="price_range">
                    <div class="form-price-range-filter">
    
            <div align="center" <font style="color:black;font-size: 14px;font-style:bold;font-family:'Open Sans', sans-serif;font-weight: bold;">
              <form  method="post" action="sort.php">
                <input  type="text" id="min" name="min_price"
                   placeholder="min..." >
                <div id="slider-range"></div>
                <input  type="text" id="max" name="max_price"
                     placeholder="max..." ></form>
            </div>
            </br>
            <div align="center">
                <input <font style="color:black;font-size: 14px;font-style:bold;font-family:'Open Sans', sans-serif;font-weight: bold;" type="submit" name="submit_range"
                    value="Filter Product" id="sub" onClick="showdata(this.value)" class="submit">
            </div></br>
        </div>
        </div>
        </div>
        </div>
  <?php
      if($_GET['type']=='submit' )
 {
  $conn = mysqli_connect("localhost", "root", "", "amss");

$query ="select * from products where prod_price between '$min' and '$max' ";
 $result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
if ($count > 0) {

echo '<div class="container" style="width:700px;" align="center" id="sorted">  
                <h3 class="text-center" id="sorted"> Sort By: Price </h3><br />';  
 echo '<table class="table table-bordered" id="employee_table"> '; 
                          echo '<tr>';  
                                
                               echo'<th><a class="column_sort" id="id" data-order="desc" href="#">id</a></th>';  
                               echo'<th><a class="column_sort" id="name" data-order="desc" href="#">Product</a></th>';  
                               echo'<th><a class="column_sort" id="specs" data-order="desc" href="#">Specification</a></th>';  
                              echo' <th><a class="column_sort" id="price" data-order="desc" href="#">price</a></th>';  
                         echo' </tr> ' ;
  while($row = mysqli_fetch_assoc($result))  
    {  
      echo '
           <tr>  
                              <td>'. $row["prod_id"].' </td>  
                               <td>'. $row["prod_nm"].' </td>  
                               <td>'. $row["prod_specs"].' </td>  
                               <td> '. $row["prod_price"].'</td>               
                          </tr>  ';
                          
    } 
  echo '</table>';       
 }}
 ?>
</body>
</html>
