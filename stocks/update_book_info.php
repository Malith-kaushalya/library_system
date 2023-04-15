<?php
session_start();

// Check, if su_email session is NOT set then this page will jump to login page...
if (!isset($_SESSION['l_email']) && !isset($_SESSION['user_name'])) {
  header('Location: ../login/login_page.php');
} 
//connect to the server and database
include '../connection/db_connection.php';

$iname = $icode = $category = $quantity = $isbn = "";
             

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  //set all the post variables
  $iname     = mysqli_real_escape_string($conn,$_POST['iname']);
  $icode     = mysqli_real_escape_string($conn,$_POST['icode']);
  $category  = mysqli_real_escape_string($conn,$_POST['category']);
  $quantity  = mysqli_real_escape_string($conn,$_POST['quantity']);
  $isbn      = mysqli_real_escape_string($conn,$_POST['isbn']);
  
  
    //update all sessions....
    $_SESSION['b_item_name']      = $iname;
    $_SESSION['b_item_code']      = $icode;
    $_SESSION['b_item_category']  = $category;
    $_SESSION['b_item_quantity']  = $quantity;
    $_SESSION['b_item_isbn']      = $isbn;
  
  //get update id.....
  $update_id = $_SESSION['update_id'];
  
    $sql = "UPDATE books_data SET b_item_code = '$icode', b_item_name ='$iname', b_item_category = '$category', b_item_quantity = '$quantity', b_item_isbn = '$isbn' WHERE b_id = '$update_id' "; 
  
     //if the query is successsful, done!                       
    if (mysqli_query($conn, $sql)) {
        echo "<script type='text/javascript'>alert('Data updated successfully...!')</script>";
        echo '<script>window.location.href="book_update.php"</script>';
    } else {
        echo "<script type='text/javascript'>alert('Error updating record:')</script>". mysqli_error($conn);
        echo '<script>window.location.href="book_update.php"</script>';   
    }
}
           
 ?>

