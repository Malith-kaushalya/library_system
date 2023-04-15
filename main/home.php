<?php 
//connect to the server and database
include '../connection/db_connection.php';
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
        <link rel="icon" type="image/jpg" href="###"/>
        <link href="../css/styles_all.css" rel="stylesheet" type="text/css"/>
        <link href="../font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>      
        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../bootstrap/js/bootstrap.min_1.js" type="text/javascript"></script>
        <script src="../js/jquery-3.4.0.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </head>
    <body>
        <?php
        include './sidebar.php';
        include './header.php';
        ?>
        <div style="margin-left: 17%;">
            <table width="100%">
                <tr width="100%" valign="top">
                    <td width="20%">
                        <a style="color: #ffffff" href="../messages/msg_list.php">
                            <div class="home_btn_top">
                                <span>
                                    <i class="fa fa-envelope" style="font-size: 40px;">
                                        <?php
                                            $sql1="SELECT count(*) as count FROM send_msg WHERE sm_status = '0' ";
                                            $result1=mysqli_query($conn,$sql1);
                                              if($result1){
                                                  while($row1 = mysqli_fetch_assoc($result1)){
                                                      echo $row1['count'];
                                                  }     
                                              }
                                          ?>
                                    <p style="font-size: 25px;">Messages</p></i>
                                </span>
                            </div>
                        </a>
                    </td>
                    <td width="20%">
                        <a style="color: #ffffff" href="../request/request_book.php">
                            <div class="home_btn_top">
                                <span>
                                    <i class="fa fa-book" style="font-size: 40px;">
                                        <?php
                                            $sql2="SELECT count(*) as count FROM request WHERE r_status = 'Requested' ";
                                            $result2 = mysqli_query($conn,$sql2);
                                              if($result2){
                                                  while($row2 = mysqli_fetch_assoc($result2)){
                                                      echo $row2['count'];
                                                  }     
                                              }
                                          ?>
                                    <p style="font-size: 25px;">Requests</p></i>
                                </span>
                            </div>
                        </a>
                    </td>
                    <td width="20%">
                        <a style="color: #ffffff" href="../borrower_data/not_returned.php">
                            <div class="home_btn_top">
                                <span>
                                    <i class="fa fa-list-alt" style="font-size: 40px;">
                                        <?php
                                            // get current date & time...
                                            date_default_timezone_set("Asia/Colombo");
                                            $current_date = date("Y-m-d");
                                        
                                            $sql3="SELECT count(*) as count FROM borrower_data WHERE bo_return_date < '$current_date' AND bo_returned_date = '0' ";
                                            $result3=mysqli_query($conn,$sql3);
                                              if($result3){
                                                  while($row3 = mysqli_fetch_assoc($result3)){
                                                      echo $row3['count'];
                                                  }     
                                              }
                                          ?>
                                    <p style="font-size: 25px;">Not Returned</p></i>
                                </span>
                            </div>
                        </a>
                    </td>
                    <td width="40%">
                        <!-- This is empty -->
                    </td>
                </tr>
            </table>
            
            <div>
                <?php include './chart_03.php'; ?>
            </div>
        </div>
        
    </body>
</html>
