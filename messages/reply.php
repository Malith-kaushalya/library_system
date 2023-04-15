<?php
//connect to the server and database
include '../connection/db_connection.php';

$member_name = $member_email = "";

if(isset($_POST["m_nic"])){
    
    $member_nic  = $_POST["m_nic"];
 
    //Get member details from member table...
    $sql ="SELECT * FROM member WHERE m_nic = '$member_nic'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $member_name =  $row["m_first_name"] ." ". $row["m_last_name"];//member name....
        $member_email = $row["m_email"];//member email address....
    }
}
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reply</title>
        <link rel="icon" type="image/jpg" href="###"/>
        <link href="../css/styles_all.css" rel="stylesheet" type="text/css"/>
        <link href="../font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>      
        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="../bootstrap/js/bootstrap.min_1.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
            include '../main/sidebar.php';
            include '../main/header.php';
        ?>
        
        <div style="margin: 1% 2% 0% 17%;">
        <table width="100%">
            <tr valign="top">
                <td width="100%">
                    <div class="well well-sm">
                        <h2 align="center">Reply To <?php echo $member_name; ?></h2>
                        <hr><br>
                        <div class="form-group" style="margin-left: 5%;">
                            <form method="POST" action="reply.php" autocomplete="off" enctype="multipart/form-data">
                                
                            <table>
                                <tr valign="top">
                                    <td>
                                        <table>
                                            <tr valign="top">
                                                <td>
                                                    <label>E-mail Address:</label><br>  
                                                </td>
                                                <td>
                                                    <input type="text" name="address" placeholder="Type Address..." class="form-control" value="<?php echo $member_email ?>"><br> 
                                                </td>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr valign="top">
                                                <td>
                                                    <label>Type Subject : &nbsp;&nbsp; </label><br>  
                                                </td>
                                                <td>
                                                    <input type="text" name="subject" placeholder="Write Subject..." class="form-control" ><br>
                                                </td>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr valign="top">
                                                <td>
                                                    <label>Message Type: &nbsp;</label><br>   
                                                </td>
                                                <td>
                                                  <select id="m_type" name="m_type" class="form-control">
                                                     <option value="Library..">Simple</option>
                                                    <option value="Alert">Alert</option>
                                                  </select><br> 
                                                </td>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr valign="top">
                                                <td>
                                                    <label>Type Message: &nbsp;</label><br>  
                                                </td>
                                                <td>
                                                    <textarea class="form-control" name="msg" placeholder="Write Message..." style="height:100px; width: 500px;"></textarea><br>
                                                    <input type="submit" value="SEND" name="msg_submit" class="btn-info btn-sm" style="margin:0 0 0 88%;">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            </form>
                            <a href="msg_list.php"><button class="btn btn-primary"><i class="fa fa-backward"> Back</i></button></a>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        </div>
 
 <?php
 //if button with the name msg_submit has been clicked
if(isset($_POST['msg_submit'])) {
    
  $address = mysqli_real_escape_string($conn,$_POST['address']);//To get address....
  $subject = mysqli_real_escape_string($conn,$_POST['subject']);//To get subject....
  $msg     = mysqli_real_escape_string($conn,$_POST['msg']);//To get message....
  $m_type  = mysqli_real_escape_string($conn,$_POST['m_type']);//To get msg type....

  require '../plugins/PHPMailer-master/PHPMailerAutoload.php';
    

    $mail = new PHPMailer;

    $mail->isSMTP();                            // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                     // Enable SMTP authentication
    $mail->Username = 'put your email address';      // SMTP username
    $mail->Password = 'email address password';           // SMTP password
    $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                          // TCP port to connect to
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    $mail->addAddress($address);//Add a recipient

    $mail->isHTML(true);//Set email format to HTML

    $bodyContent = $msg;

    $mail->Subject = $m_type." ".$subject;
    $mail->Body    = $bodyContent;
    

    if(!$mail->send()) {
        echo "<script type='text/javascript'>alert('Can't Send Messages Now, Try Agan Later...!')</script>";
    } else {
        echo "<script type='text/javascript'>alert('Message Sent successfully...!')</script>";
    }
}
?>

</body>
</html>
