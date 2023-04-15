<?php  
session_start();

//database connection...
include '../connection/db_connection.php';
 
$output2 = $output2 = $output3 = '';  
 if(isset($_POST["m_id"]))  
 {  
      if($_POST["m_id"] != '')  
      {  
           $sql2 = "SELECT * FROM member WHERE m_nic = '".$_POST["m_id"]."'";  
   
      $result2 = mysqli_query($conn, $sql2);  
      while($row2 = mysqli_fetch_array($result2))  
      {  
           $output2 .= $row2["m_status"];  
      } 
      }
      if($output2 == '0'){
          $output3 .= "This Member Is Deactivated";
          $_SESSION['member_status'] = "0";
      }
      echo $output3;
 }  
 ?> 