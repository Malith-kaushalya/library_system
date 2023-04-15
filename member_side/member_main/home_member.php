<?php 
//connect to the server and database
include '../../connection/db_connection.php';
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
        <link rel="icon" type="image/jpg" href="###"/>
        <link href="../../css/styles_all.css" rel="stylesheet" type="text/css"/>
        <link href="../../font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>      
        <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../bootstrap/js/bootstrap.min_1.js" type="text/javascript"></script>
        <script src="../..//js/jquery-3.4.0.min.js" type="text/javascript"></script>
        <script src="../../CalendarPickerJS-master/CalendarPicker.js" type="text/javascript"></script>
        <link href="../../CalendarPickerJS-master/CalendarPicker.style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        include './sidebar_member.php';
        include './header_member.php';
        ?>
        <div style="margin-left: 17%;">
            <table width="100%">
                <tr width="100%" valign="top">
                    <td width="39%">
                        <div class="well well-sm" style="margin-bottom:5px;">
                            <?php include '../profile/member_profile.php'; ?>
                        </div>
                    </td>
                    <td width="1%">    
                        <!--This is empty-->
                    </td>
                    <td width="60%">    
                        <?php include './mail_send.php'; ?>
                    </td>
                </tr>
            </table>
        </div>    
    </body>
</html>
