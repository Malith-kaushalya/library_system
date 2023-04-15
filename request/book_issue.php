<?php
//connect to the server and database
include '../connection/db_connection.php';

$issue_request = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if ($_POST['issue']) {
        
        //set all the post variables
        $itm_id =  $_POST['issue'];
        
        
        $sql = "SELECT * FROM request WHERE r_item_id ='$itm_id'";
        $result = $conn->query($sql); 

        while($row = $result->fetch_assoc()){
            $mid        = $row['r_mem_id'];
            $itcode     = $row['r_item_id'];
            $item_isbn  = $row['r_item_isbn'];
            $item_name  = $row['r_item_name'];
        }
                // get current date & time...
                date_default_timezone_set("Asia/Colombo");
                $current_date = date("Y-m-d");
                $time         = strtotime("$current_date");
                $rdate        = date("Y-m-d", strtotime("+10 day", $time));//get return date...
                
 
                $query = '';

                $itcode_add     = mysqli_real_escape_string($conn, $itcode);
                $mid_add        = mysqli_real_escape_string($conn, $mid);
                $rdate_add      = mysqli_real_escape_string($conn, $rdate);
                $item_isbn_add  = mysqli_real_escape_string($conn, $item_isbn);
                $item_name_add  = mysqli_real_escape_string($conn, $item_name);
                 
                if($mid_add != '' && $itcode_add != '' && $rdate_add != '' && $item_isbn_add != ''&& $item_name_add != ''&& $current_date != ''){
                    
                    $query = "INSERT INTO borrower_data(bo_id ,bo_customer_id, bo_item_code, bo_return_date, bo_item_isbn, bo_item_name, bo_borrow_date , bo_returned_date)" 
                    ."VALUES('' , '$mid_add', '$itcode_add', '$rdate_add', '$item_isbn_add', '$item_name_add', '$current_date', '0')";
                    
                    
                    $query2 = "UPDATE request SET r_status = 'Issued' WHERE r_item_id = '$itm_id'";//change request status...
                    
                        if (mysqli_query($conn, $query) && mysqli_query($conn, $query2)){
                          $issue_request = 'Book Issued...!';
                        }else {
                          header("location: request_book.php");//return request_book.php page...
                        }
                }else{
                 echo "ghghghghghghgh";    
                }

        }else{echo "gsgsfgsfgsfsdfsdgsdfgsgsdgfdsgsdg";}
}
?>

