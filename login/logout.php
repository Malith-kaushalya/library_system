<?php
session_start();
    // Check, if username session is NOT set then this page will jump to login page....
    if (!isset($_SESSION['l_email'])&& !isset($_SESSION['user_name'])) {
      header('Location: login_page.php');
    } 
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/styles_all.css" rel="stylesheet" type="text/css"/>
    </head>
    <body onload="loder()" style="margin:0;">
        <div style="margin: 15% 0% 15% 42%;">
            <img  id="loader" src="../images/loder.gif" alt="" width="200px" height="auto"/>
        </div>

        <div style="display:none;" id="myDiv" class="animate-bottom">
            <div style="background-color: #006600; color: #00cc00; padding: 5px 5px 5px 5px; margin: 5% 25% 0 25%; border:#00cc00 solid 2px;">
                <p>Successfully Logged Out...</p>
            </div>

            <?php
                // Delete all session variables...
                session_destroy();
                
                //Redirection, Jump to login page...
                header("refresh:4.5,url= ../login/login_page.php");
            ?>
        </div>
    <script type="text/javascript">
        var lode;

            function loder() {
                lode = setTimeout(showPage, 3000);
            }

            function showPage() {
                document.getElementById("loader").style.display = "none";
                document.getElementById("myDiv").style.display = "block";
            }
    </script>
    </body>
</html>
