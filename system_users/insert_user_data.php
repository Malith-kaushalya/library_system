<?php
//insert.php
include '../connection/db_connection.php';//database connection....


if(isset($_POST["suname"]))
{
 $suname    = $_POST["suname"];
 $suemail   = $_POST["suemail"];
 $suid      = $_POST["suid"];
 $suphone   = $_POST["suphone"];
 $supw      = $_POST["supw"];

// get current date & time...
date_default_timezone_set("Asia/Colombo");
$current_date = date("Y-m-d");
 
 $query = '';

  $suname_add     = mysqli_real_escape_string($conn, $suname);
  $suemail_add        = mysqli_real_escape_string($conn, $suemail);
  $suid_add      = mysqli_real_escape_string($conn, $suid);
  $suphone_add  = mysqli_real_escape_string($conn, $suphone);
  $supw_add  = mysqli_real_escape_string($conn, $supw);
  
  if($suname_add != '' && $suemail_add != '' && $suid_add != '' && $suphone_add != ''&& $supw_add != '')
  {
    
    
   $query = "INSERT INTO system_user(su_id ,su_name, su_email, su_nic, su_phone, su_reg_date)" 
   ."VALUES('' , '$suname_add', '$suemail_add', '$suid_add', '$suphone_add', '$current_date')";

   
   //encript password....
   $password  = sha1($supw_add);
   $suemail_add2    = sha1($suemail_add);
   $query2 = "INSERT INTO login(l_id ,l_email, l_password, l_user_id, l_type)" 
   ."VALUES('' , '$suemail_add2', '$password', '$suid_add', '0')";//add data to the login table...
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

