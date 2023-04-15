<?php
$_SESSION['error_login'] = "";

// initializing variables.
$username = "";
$password = "";

// connect to the database.
include '../connection/db_connection.php';

// Login...
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
        // User Login.
        $email2    = sha1($email);//encript data...
  	$password2 = sha1($password);//encript data...
        
  	$query = "SELECT * FROM login WHERE l_email = '$email2' AND l_password = '$password2'";
  	$results = mysqli_query($conn, $query);
        $row1 = mysqli_fetch_array($results);
        if($row1["l_type"] == '0'){
            if ($row1["l_email"] == $email2 && $row1["l_password"] == $password2) {    
                $_SESSION['l_email'] = "$email"; //create user email session....
                
                //get system user name....
                $sql2 = "SELECT * FROM system_user WHERE su_email = '$email' ";
                $result2 = $conn->query($sql2); 
                    while($row2 = $result2->fetch_assoc()){
                        $_SESSION['user_name'] = $row2['su_name']; //create user name session....
                    }
                header('location: ../main/home.php');
            }else {
                    $_SESSION['error_login'] = "Wrong Username Or Password";
            }
        }
        else{
            if ($row1["l_email"] == $email2 && $row1["l_password"] == $password2) {    
                $_SESSION['l_email'] = "$email"; //create user email session....
                
                //get system user name....
                $sql2 = "SELECT * FROM member WHERE m_email = '$email' ";
                $result2 = $conn->query($sql2); 
                    while($row2 = $result2->fetch_assoc()){
                        $_SESSION['user_name'] = $row2['m_first_name']." ". $row2['m_last_name']; //create user name session....
                    }
                header('location: ../member_side/member_main/home_member.php');
            }else {
                    $_SESSION['error_login'] = "Wrong Username Or Password";
            }
        }
              	 
}

?>