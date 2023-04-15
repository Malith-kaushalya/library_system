<?php
include '../connection/db_connection.php';//database connection....


if(isset($_POST["mfname"]))
{
 $mfname    = $_POST["mfname"];
 $mlname    = $_POST["mlname"];
 $mid       = $_POST["mid"];
 $mphone    = $_POST["mphone"];
 $mhaddress = $_POST["mhaddress"];
 $memail    = $_POST["memail"];
 $mempw_con = $_POST["mempw_con"];

// get current date & time...
date_default_timezone_set("Asia/Colombo");
$current_date = date("Y-m-d");
 
 $query = '';

  $mfname_add     = mysqli_real_escape_string($conn, $mfname);
  $mlname_add     = mysqli_real_escape_string($conn, $mlname);
  $mid_add        = mysqli_real_escape_string($conn, $mid);
  $mphone_add     = mysqli_real_escape_string($conn, $mphone);
  $mhaddress_add  = mysqli_real_escape_string($conn, $mhaddress);
  $memail_add     = mysqli_real_escape_string($conn, $memail);
  $mempw_con_add  = mysqli_real_escape_string($conn, $mempw_con);
  
  if($mfname_add != '' && $mlname_add != '' && $mid_add != '' && $mphone_add != ''&& $mhaddress_add != ''&& $memail_add != '' && $mempw_con_add != '')
  {
   $query = "INSERT INTO member(m_id ,m_first_name, m_last_name, m_email, m_phone, m_nic, m_address , m_status, m_reg_date)" 
   ."VALUES('' , '$mfname_add', '$mlname_add', '$memail_add', '$mphone_add', '$mid_add', '$mhaddress_add', '1' , '$current_date')";//status 1 means, active member...
   
   $mempw_con_add2 = sha1($mempw_con_add);
   $memail_add2    = sha1($memail_add);
   $query2 = "INSERT INTO login(l_id ,l_email, l_password, l_user_id, l_type)" 
   ."VALUES('' , '$memail_add2', '$mempw_con_add2', '$mid_add', '1')";//add data to the login table...
  }
  
 if($query != '')
 {
    if(mysqli_multi_query($conn, $query)){
        if(mysqli_multi_query($conn, $query2)){
        echo "<script type='text/javascript'>alert('Registration Success...!')</script>";
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

