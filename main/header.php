<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
        <link rel="icon" type="image/jpg" href="###"/>
        <link href="../css/styles_all.css" rel="stylesheet" type="text/css"/>
        <link href="../font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>      
        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="../bootstrap/js/bootstrap.min_1.js" type="text/javascript"></script>
        <script src="../main/clock.js" type="text/javascript"></script>
    </head>
    <body style="background-image: url('../images/homeback.png');">
        <div style="margin-left: 16%; margin-right: 2%; margin-top: 0.7%;">
            <table width="100%">
                <tr width="90%">
                    <td width="1%"><!-- This is empty--></td>
                    <td width="15%">
                        <a href="../borrowing/lending.php" style="text-decoration: none; color:  #000000; font-family: cursive">
                            <div style="background-color: #cccccc; border: solid #000000 2px;" class="main_btn">
                                <img src="../images/lending.png" alt="" height="120px" width="auto" style="margin-left: 21%"/>
                            </div>
                        </a>
                    </td>
                    <td width="1%"><!-- This is empty--></td>
                    <td width="15%">
                        <a href="../return_books/returnbook.php" style="text-decoration: none; color:  #000000; font-family: cursive">
                            <div style="background-color: #cccccc; border: solid #000000 2px;" class="main_btn">
                                <img src="../images/return.png" alt="" height="120px" width="auto" style="margin-left: 21%"/>
                            </div>
                        </a>
                    </td>
                    <td width="1%"><!-- This is empty--></td>
                    <td width="15%">
                        <a href="../borrower_data/lended_detail.php" style="text-decoration: none; color:  #000000; font-family: cursive"">
                            <div style="background-color: #cccccc; border: solid #000000 2px;" class="main_btn">
                                <img src="../images/lended.png" alt="" height="120px" width="auto" style="margin-left: 21%"/>
                            </div>
                        </a>
                    </td>
                    <td width="1%"><!-- This is empty--></td>
                    <td width="15%">
                        <a href="../members/all_members.php" style="text-decoration: none; color:  #000000; font-family: cursive">
                            <div style="background-color: #cccccc; border: solid #000000 2px;" class="main_btn">
                                <img src="../images/members.png" alt="" height="120px" width="auto" style="margin-left: 21%"/>
                            </div>
                        </a>
                    </td>
                    <td width="1%"><!-- This is empty--></td>
                    <td width="15%">
                        <div>
                            <div style="background-color: #0d0d0d; font-size: 34px; color: #cccccc; border-radius: 10px 10px 0px 0px;">
                                <i class="fa fa-calendar" style="font-size: 24px; margin: 8px;">
                                        <?php
                                          date_default_timezone_set("Asia/Colombo");
                                          echo date("l"). "<br>";
                                        ?>
                                </i>
                            </div>
                            <div style="background-color: #cccccc; border: solid #000000 2px; font-size: 28px;"> 
                                <p style="margin: 8px;" align="center"><b>
                                <?php
                                  echo date("Y/m/d") . "<br>";
                                ?>
                                </b></p>
                            </div>
                            <div style="background-color: #0d0d0d; font-size: 22px; color: #cccccc; border-radius: 0px 0px 10px 10px;" align="center">
                                <span id="clock" style="font-family: cursive; font-style: italic;"></span>
                                <script type="text/javascript">window.onload = clock('clock');</script>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <hr style="margin-left: 17%; margin-right: 2%; height: 2px; background-color: #666666">
        
    </body>
</html>

