<?php
    session_start();
    // Check, if username session is set then this page will jump to dashboard page....
    if (isset($_SESSION['su_email']) && isset($_SESSION['su_name'])) {
      header('Location: ../main/home.php');
    } 
include './login.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="icon" type="image/jpg" href="../../images/logo2.png"/>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/styles_all.css" rel="stylesheet" type="text/css"/>
        <script src="../js/validation_all.js" type="text/javascript"></script>
    </head>
    <body class="login_background">
        <form method="POST" class="login_form" action="login_page.php" name="logform" onsubmit="return validationlogin()" autocomplete="off">
                <div class="login_head">
                    <h2> &nbsp; LIBRARY SYSTEM</h2>
                </div><hr style="margin-top: 0px;">
                
                <h3 align="center" style="color: #cccccc">Please Login</h3><hr style="margin-top: 0px; margin-bottom: 10px;" width="40%">
            <div id="login_error" class="error"></div><!-- Error display -->
            <div class="error"> <?= $_SESSION['error_login'] ?> </div><!-- Error display -->
                <div align="center">
                    <table style="margin-left: 12%">
                        <tr width="100%" valign="top">
                            <td width="10%">
                                <i class="fa fa-user icon"></i>
                            </td>
                            <td width="90%">
                                 <input class="form-control inputfield" type="text" placeholder=" Email..." name="username" >
                            </td>
                        </tr>
                        <tr width="100%" valign="top">
                            <td width="10%">
                                <i class="fa fa-key icon"></i>
                            </td>
                            <td width="90%">
                                <input class="form-control inputfield" type="password" placeholder=" Password..." name="password" id="mypassInput"  >
                            </td>
                        </tr>
                    </table>
                    <i  style="margin-right: 28%; font-size: 13px; color: #cccccc"> <input type="checkbox" onclick="myFunction()">Show Password</i>
                    <br>
                    <button type="submit" class="btn btn-primary btn2" name="login_user"><i class="fa fa-sign-in"> Login</i></button><br><br>
                    <img src="../images/login_f_back.png" width="100%" style="margin-top: 4%">
                </div>
        </form>
    <script>
        //Password Visibility
        function myFunction() {
            var x = document.getElementById("mypassInput");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
        }
    </script>
    
    </body>
</html>
