<?php
//connect to the server and database
include '../connection/db_connection.php';
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Message</title>
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
        <div class="container well well-sm" style="margin-left: 17%; width: 81%">
            <h1>All Messages</h1>
            <hr style="margin-right: 2%; height: 1px;">
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
                     
                    
               $sql = "SELECT * FROM send_msg WHERE sm_status = '0' ORDER BY sm_id DESC LIMIT $start_from, ".$results_per_page;
               $result = $conn->query($sql); 

                    echo "<div class='table-responsive'>";
                    echo "<table class='table' style='font-size: 15px; width: 98%'>";
                    echo "<thead>";
                    echo "<tr class='info'><th>Member Name</th><th>Message Title</th><th>Message</th>"
                       . "<th>Date</th><th>Action</th>";
                    echo "</thead>";
                     while($row = $result->fetch_assoc()){
                  
                             echo "<tbody>";
                             echo "<tr><td>";
                             echo $row["sm_mem_name"];
                             echo "</td><td>";
                             echo $row["sm_msg_title"];
                             echo "</td><td>";
                             echo $row["sm_msg_body"];
                             echo "</td><td>";
                             echo $row["sm_msg_date"];
                             echo "</td><td><table><tr valign='top'><td>";
                             echo "<form action='reply.php' method='POST'>";
                             ?>
                               <button class='btn btn-sm btn-info' type='submit' name="m_nic" value="<?php echo $row["sm_mem_id"] ?>">Reply Via Mail <i class='fa fa-mail-reply'></i></button>
                            <?php
                             echo "</form>";
                             echo "</td>";
                             echo "</tr></table>";
                             echo "</td></tr>"; 
                             echo "</tbody>";
                        }
                             echo "</table>";
                             echo "</div>";

                                $sql1 = "SELECT COUNT(bo_id) AS total FROM borrower_data";
                                $result1 = $conn->query($sql1);
                                $row1 = $result1->fetch_assoc();
                                $total_pages = ceil($row1["total"] / $results_per_page); // calculate total pages with results
                            ?>
                    
                    <ul class="pagination" style="margin-left: 5%">
                       <li><a href="lended_detail.php?page=<?php echo $i; ?>">&laquo;</a></li>
                         <li>
                         <?php
                      for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
                       echo "<a href='lended_detail.php?page=".$i."'";
                       if ($i==$page){  echo " class='curPage'";}
                       echo ">".$i."</a> "; 
                          }
                          ?>
                         </li>
                         <li><a href="lended_detail.php?page=<?php echo $i; ?>">&raquo;</a></li>
                    </ul>
        </div>
        
    </body>
</html>

