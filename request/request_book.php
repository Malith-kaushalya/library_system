<?php
//connect to the server and database
include '../connection/db_connection.php';
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Book Request</title>
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
            include './book_issue.php';
        ?>
        <div class="container well well-sm" style="margin-left: 17%; width: 81%">
            <h1>Book Requests</h1>
            <hr style="margin-right: 2%; height: 1px;">
            <div class="success"><?php echo $issue_request ?></div>
            <?php
                    $results_per_page = 10; // number of results per page  

                    if (isset($_GET["page"])) { 
                         $page  = $_GET["page"]; 
                    } else {
                        $page=1;
                        }
                    $start_from = ($page-1) * $results_per_page;
                    
                    
                    // get current date & time...
                    date_default_timezone_set("Asia/Colombo");
                    $current_date = date("Y-m-d");
                     
                    
               $sql = "SELECT * FROM request WHERE r_status = 'Requested' ORDER BY r_id DESC LIMIT $start_from, ".$results_per_page;
               $result = $conn->query($sql); 

                echo "<div class='table-responsive'>";
                echo "<table class='table' style='font-size: 12px; width: 98%'>";
                echo "<thead>";
                echo "<tr style='background-color:#bfbfbf;'><th>Member Name</th><th>Member Id</th><th>Item Code</th><th>Item Name</th><th>Collection Date</th><th>Request Date</th><th></th><th></th>";
                echo "</thead>";
                 while($row = $result->fetch_assoc()){
                         echo "<tbody><tr class='active'><td>";
                         echo $row["r_m_name"];
                         echo "</td><td>"; 	
                         echo $row["r_mem_id"];
                         echo "</td><td>"; 	
                         echo $row["r_item_id"];
                         echo "</td><td>";
                         echo $row["r_item_name"];
                         echo "</td><td>";
                         echo $row["r_col_date"];
                         echo "</td><td>";
                         echo $row["r_date"];
                         echo "</td><td><form action='request_book.php' method='POST'>";
                            //User Status Button... 
                            if($row['r_status']=="Requested"){
                                   $btn_name="Issue";//Button Label.
                                   $style="btn-info"; //Button style.
                                   $btn_art="fa fa-check";//Button icon.
                               }
                            ?>
                                <button class="btn btn-sm <?php echo $style;?>" style="float: right;" type="submit" name="issue" value="<?php echo $row["r_item_id"]?>">
                                   <?php echo $btn_name;?> <i class="<?php echo $btn_art;?>"></i>
                                </button>
                            <?php
                        echo "</form>";
                         echo "</td>";
                         echo "</td><td><form action='request_book_con.php' method='POST'>";
                            //User Status Button... 
                            if($row['r_status']=="Requested"){
                                   $btn_name="Cancle";//Button Label.
                                   $style="btn-warning"; //Button style.
                                   $btn_art="fa fa-remove";//Button icon.
                               }
                            ?>
                                <button class="btn btn-sm <?php echo $style;?>" style="float: left;" type="submit" name="cancle" value="<?php echo $row["r_item_id"]?>">
                                   <?php echo $btn_name;?> <i class="<?php echo $btn_art;?>"></i>
                                </button>
                            <?php
                         echo "</form>";
                         echo "</td>";
                         echo "</tr>";
                         echo "</tr>"; 
                         echo "</tbody>";
                    }
                         echo "</table>";
                         echo "</div>";
                         
                         
                        $sql1 = "SELECT COUNT(r_id) AS total FROM request WHERE r_status = 'Requested'";
                        $result1 = $conn->query($sql1);
                        $row1 = $result1->fetch_assoc();
                        $total_pages = ceil($row1["total"] / $results_per_page); // calculate total pages with results
                        
                        ?>
                    
                    <ul class="pagination" style="margin-left: 5%">
                        <li><a href="request_book.php?page=<?php echo $i; ?>">&laquo;</a></li>
                         <li>
                         <?php
                      for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
                       echo "<a href='request_book.php?page=".$i."'";
                       if ($i==$page){  echo " class='curPage'";}
                       echo ">".$i."</a> "; 
                          }
                          ?>
                         </li>
                         <li><a href="request_book.php?page=<?php echo $i; ?>">&raquo;</a></li>
                    </ul>
        </div>
        
    </body>
</html>



