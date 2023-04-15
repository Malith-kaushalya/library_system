<?php
//insert.php

include '../connection/db_connection.php';//database connection....

$output1 = $output2 = $output3 = '';

if(isset($_POST["itcode"]))
{
 $itcode   = $_POST["itcode"];
 $mid      = $_POST["mid"];
 $rdate    = $_POST["rdate"];


$query1 = "SELECT * FROM books_data WHERE b_item_code = '$itcode' ";
$result1 = mysqli_query($conn, $query1);
while($row = mysqli_fetch_assoc($result1))
{
 $output1 = $row["b_item_isbn"];
 $output2 = $row["b_item_name"];
 $output3 = $row["b_item_quantity"];
 
 $itm_qnt = $output3 - 1 ;//change itm quantity...
 
 $item_isbn = $output1;
 $item_name = $output2;
 
}
 // get current date & time...
date_default_timezone_set("Asia/Colombo");

$current_date = date("Y-m-d");
 
 $query = '';

  $itcode_add     = mysqli_real_escape_string($conn, $itcode);
  $mid_add        = mysqli_real_escape_string($conn, $mid);
  $rdate_add      = mysqli_real_escape_string($conn, $rdate);
  $item_isbn_add  = mysqli_real_escape_string($conn, $item_isbn);
  $item_name_add  = mysqli_real_escape_string($conn, $item_name);
  if($itcode_add != '' && $mid_add != '' && $rdate_add != '' && $item_isbn_add != ''&& $item_name_add != '')
  {
      
      $sql2 = "SELECT * FROM member WHERE m_nic = $mid_add ";//To get member status....  
      $result2 = mysqli_query($conn, $sql2);  
      while($row2 = mysqli_fetch_array($result2))  
      {  
           $member_status = $row2["m_status"]; //member status....
      } 
      
   if($member_status == '0'){
       echo "<script type='text/javascript'>alert('This Member Is Deactivated...!')</script>";
       echo '<script>window.location.href="lending.php"</script>';
   }else{
       
       $query = "INSERT INTO borrower_data(bo_id ,bo_customer_id, bo_item_code, bo_return_date, bo_item_isbn, bo_item_name, bo_borrow_date , bo_returned_date)" 
        ."VALUES('' , '$mid_add', '$itcode_add', '$rdate_add', '$item_isbn_add', '$item_name_add', '$current_date', '0')";
   
        $query2 = "UPDATE books_data SET b_item_quantity = '$itm_qnt' WHERE b_item_code = '$itcode'";
        
         if($query != '')
            {
             if(mysqli_multi_query($conn, $query2))
             {
                   if(mysqli_multi_query($conn, $query))
                 {
                   echo "<script type='text/javascript'>alert('Success...!')</script>";
                   echo '<script>window.location.href="lending.php"</script>';
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
   
  }

}
?>

