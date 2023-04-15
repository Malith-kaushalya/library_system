<?php
//insert.php

include '../connection/db_connection.php';//database connection....

if(isset($_POST["item_name"]))
{
 $item_name        = $_POST["item_name"];
 $item_code        = $_POST["item_code"];
 $item_category    = $_POST["item_category"];
 $item_quantity    = $_POST["item_quantity"];
 $item_isbn        = $_POST["item_isbn"];
 
 $query = '';
 for($count = 0; $count<count($item_name); $count++)
 {
  $item_name_clean       = mysqli_real_escape_string($conn, $item_name[$count]);
  $item_code_clean       = mysqli_real_escape_string($conn, $item_code[$count]);
  $item_category_clean   = mysqli_real_escape_string($conn, $item_category[$count]);
  $item_quantity_clean   = mysqli_real_escape_string($conn, $item_quantity[$count]);
  $item_isbn_clean       = mysqli_real_escape_string($conn, $item_isbn[$count]);
  if($item_name_clean != '' && $item_code_clean != '' && $item_category_clean != '' && $item_quantity_clean != ''&& $item_isbn_clean != '')
  {
   $query .= '
   INSERT INTO books_data(b_id ,b_item_code, b_item_name, b_item_category, b_item_quantity, b_item_isbn) 
   VALUES("'.''.'" , "'.$item_code_clean.'", "'.$item_name_clean.'", "'.$item_category_clean.'", "'.$item_quantity_clean.'", "'.$item_isbn_clean.'"); 
   ';
  }
 }
 if($query != '')
 {
  if(mysqli_multi_query($conn, $query))
  {
   echo 'Item Data Inserted';
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

