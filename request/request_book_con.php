<?php
//connect to the server and database
include '../connection/db_connection.php';

$output = '';

//To Change The member Status...
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if ($_POST['cancle']) {
        
        //set all the post variables
        $itm_id =  $_POST['cancle'];
 
$sql = "SELECT * FROM request WHERE r_item_id ='$itm_id'";
$result = $conn->query($sql); 

        while($row = $result->fetch_assoc()){

            if ($row['r_status'] == 'Requested') {
                $sql2 = "UPDATE request SET r_status = 'Cancled' WHERE r_item_id = '$itm_id'";//change request status...
                
                $query1 = "SELECT * FROM books_data WHERE b_item_code = '$itm_id' ";
                $result1 = mysqli_query($conn, $query1);
                while($row1 = mysqli_fetch_assoc($result1))
                {
                 $output = $row1["b_item_quantity"];
                 $itm_qnt = $output + 1 ;//change itm quantity...
                }
                
                $query2 = "UPDATE books_data SET b_item_quantity = '$itm_qnt' WHERE b_item_code = '$itm_id'";
                
                  if (mysqli_query($conn, $sql2) && mysqli_query($conn, $query2)) {
                      echo "<script type='text/javascript'>alert('Request Cancled...!')</script>";
                      header("location: request_book.php");//return request_book.php page...
                  }else {
                      header("location: request_book.php");//return request_book.php page...
                  }
            }
        }
    }
    
}