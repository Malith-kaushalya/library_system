<?php
//connect to the server and database
include '../connection/db_connection.php';

 //To Change The member Status...
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if ($_POST['m_status']) {
        
        //set all the post variables
        $status =  $_POST['m_status'];
 
$sql2 = "SELECT * FROM member WHERE m_nic ='$status'";
$result2 = $conn->query($sql2); 

        while($row2 = $result2->fetch_assoc()){

            if ($row2['m_status'] == '1') {
                $sql = "UPDATE member SET m_status = '0' WHERE m_nic = '$status'";// Set User Status To --> 0
                  if (mysqli_query($conn, $sql)) {
                      header("location: all_members.php");//return all_members.php page...
                  }else {
                      header("location: all_members.php");//return all_members.php page...
                  }
            }else {
                $sql = "UPDATE member SET m_status = '1' WHERE m_nic = '$status' ";// Set User Status To --> 1
                  if (mysqli_query($conn, $sql)) {
                      header("location: all_members.php");//return all_members.php page...
                  }else {
                      header("location: all_members.php");//return all_members.php page...
                  }
            }
        }
    }
}

?>