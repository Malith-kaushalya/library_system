<?php  
 //database connection...
 include '../connection/db_connection.php';
 
 $output = '';  
 if(isset($_POST["cus_id"]))  
 {  
      if($_POST["cus_id"] != '')  
      {  
           $sql = "SELECT * FROM borrower_data WHERE bo_customer_id = '".$_POST["cus_id"]."'";  
   
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result)) 
      {  
          // get current date & time...
          date_default_timezone_set("Asia/Colombo");
           
          $current_date   = date("Y-m-d");
          $return_date    = $row["bo_return_date"];
          $returned_date  = $row["bo_returned_date"];
          
          //Calculate Late Fee...
          if ($return_date < $current_date){
              // Declare two dates 
                $start_date = strtotime("$return_date"); 
                $end_date = strtotime("$current_date"); 
  
                // Get the difference and divide into  
                // total no. seconds 60/60/24 to get  
                // number of days 
                $days = ($end_date - $start_date)/60/60/24; 
              $late_fee = '$'. 0.5 * $days;
              $style = "style='color:red;'";
          }else{
              $late_fee = '$00.00';
              $style = "style='color:green;'";
          }
          
          //check, book is returned or not...
          if($returned_date == "0"){
              $return_status = "Not Returned";
          }else{
              $return_status = "Already Returned";
          }
          
          $output .= "<b>Item Name :</b> ".$row["bo_item_name"] ." <br> "." <b>Item ISBN : </b>". $row["bo_item_isbn"]." <br> "." <b> Item Code :</b> ". $row["bo_item_code"]." <br> "." <b> Borrow Date :</b> ". $row["bo_borrow_date"]." <br> "." <b> Return Date :</b> ". $row["bo_return_date"]." <br> "." <b> Return Status :</b> "." $return_status "." <h3 $style> Late Fee :". $late_fee ."</h3> <p>*Late Fee charged $0.5 Per Day.</p>";  
      } 
      }
      echo $output;  	

 }  

 ?> 
