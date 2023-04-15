<?php  
 //database connection...
 include '../connection/db_connection.php';
 
 $output = $output2 = '';  
 if(isset($_POST["it_name"]))  
 {  
      if($_POST["it_name"] != '')  
      {  
           $sql = "SELECT * FROM books_data WHERE b_item_code= '".$_POST["it_name"]."'";  
   
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= "<b>Item Name :</b> ".$row["b_item_name"] ." <br> "." <b>Item ISBN : </b>". $row["b_item_isbn"]." <br> "." <b>Avalable Qnt :</b> ". $row["b_item_quantity"];  
      } 
      }
      echo $output;  	
 }  
 ?> 