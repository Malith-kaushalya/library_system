<?php
//connect to the server and database
include '../../connection/db_connection.php';
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>View Books</title>
        <link rel="icon" type="image/jpg" href="###"/>
        <link href="../../css/styles_all.css" rel="stylesheet" type="text/css"/>
        <link href="../../font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>      
        <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../js/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="../../bootstrap/js/bootstrap.min_1.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
            include '../member_main/sidebar_member.php';
            include '../member_main/header_member.php';
        ?>
        <div class="container well well-sm" style="margin-left: 17%; width: 81%">
            <h1>History</h1><hr>
            <?php
                    $results_per_page = 10; //number of results per page  

                    if (isset($_GET["page"])) { 
                         $page  = $_GET["page"]; 
                    } else {
                        $page=1;
                        }
                    $start_from = ($page-1) * $results_per_page;
                    
                    
                    // get current date & time...
                    date_default_timezone_set("Asia/Colombo");
                    $current_date = date("Y-m-d");

                    $member_email = $_SESSION['l_email'];//get member email....
                    $sql = "SELECT * FROM member WHERE m_email = '$member_email'";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()){
                        $member_id   = $row["m_nic"];//get member id....
                        $member_name = $row["m_first_name"]." ".$row["m_last_name"];
                    }
                    
               $sql2 = "SELECT * FROM borrower_data WHERE bo_customer_id  = $member_id ORDER BY bo_id DESC ";
               $result2 = $conn->query($sql2); 

                    echo "<div class='table-responsive'>";
                    echo "<table class='table' style='font-size: 15px; width: 90%; margin-left:5%;'>";
                    echo "<thead>";
                    echo "<tr class='info'><th>Name</th><th>Book Name</th><th>Book Code</th>"
                       . "<th>ISBN</th><th>Borrow Date</th><th>Return Date</th><th>Returned Date</th>";
                    echo "</thead>";
                     while($row2 = $result2->fetch_assoc()){
                             echo "<tbody><tr class='active'><td>";
                             echo $member_name;
                             echo "</td><td>";
                             echo $row2["bo_item_name"];
                             echo "</td><td>";
                             echo $row2["bo_item_code"];
                             echo "</td><td>";
                             echo $row2["bo_item_isbn"];
                             echo "</td><td>";
                             echo $row2["bo_borrow_date"];
                             echo "</td><td>";
                             echo $row2["bo_return_date"];
                             echo "</td><td>";
                             if($row2["bo_returned_date"] == '0'){
                                echo "<div style='background-color:#ff4d4d';><b>";
                                echo "Not Returned";
                                echo "</b></div>";
                             }else{
                                echo $row2["bo_returned_date"]; 
                             }
                             echo "</td></tr>";
                             echo "</tr>"; 
                             echo "</tbody>";
                        }
                             echo "</table>";
                             echo "</div>";

                                $sql1 = "SELECT COUNT(bo_id) AS total FROM borrower_data WHERE bo_customer_id  = $member_id";
                                $result1 = $conn->query($sql1);
                                $row1 = $result1->fetch_assoc();
                                $total_pages = ceil($row1["total"] / $results_per_page);//calculate total pages with results
                            ?>
                    
                    <ul class="pagination" style="margin-left: 5%">
                        <li><a href="history.php?page=<?php echo $i; ?>">&laquo;</a></li>
                        <li>
                         <?php
                      for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
                       echo "<a href='history.php??page=".$i."'";
                       if ($i==$page){  echo " class='curPage'";}
                       echo ">".$i."</a> "; 
                          }
                          ?>
                         </li>
                         <li><a href="history.php??page=<?php echo $i; ?>">&raquo;</a></li>
                    </ul>
        </div>
        
    </body>
</html>





