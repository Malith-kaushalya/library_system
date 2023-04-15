<?php
//insert.php

include '../connection/db_connection.php';//database connection....

$output1 = '';

if(isset($_POST["mid"]))
{
 $itcode   = $_POST["itcode"];
 $mid      = $_POST["mid"];

$query1 = "SELECT * FROM books_data WHERE b_item_code = '$itcode' ";
$result1 = mysqli_query($conn, $query1);
while($row = mysqli_fetch_assoc($result1))
{
 $output1 = $row["b_item_quantity"];
 
 $itm_qnt = $output1 + 1 ;//change itm quantity...
}

 // get current date & time...
date_default_timezone_set("Asia/Colombo");

$current_date = date("Y-m-d");
 
 $query = $query2 = '';

  $itcode_return    = mysqli_real_escape_string($conn, $itcode);
  $mid_return       = mysqli_real_escape_string($conn, $mid);

  if($itcode_return != '' && $mid_return != '')
  {
   $query = "UPDATE borrower_data SET bo_returned_date = '$current_date' WHERE bo_customer_id = '$mid'";
   
   $query2 = "UPDATE books_data SET b_item_quantity = '$itm_qnt' WHERE b_item_code = '$itcode'";
  }
 if($query != '')
 {
  if(mysqli_multi_query($conn, $query2))
  {
        if(mysqli_multi_query($conn, $query))
      {
        echo "<script type='text/javascript'>alert('Success...!')</script>";
        echo '<script>window.location.href="returnbook.php"</script>';
      }
  }
  
  else
  {
   echo 'Error';
   echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }
 }
 else
 {
  echo 'All Fields are Required';
 }
}
?>


