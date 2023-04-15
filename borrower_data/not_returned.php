<?php
//connect to the server and database
include '../connection/db_connection.php';
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Not Returned</title>
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
            <h1>Not Returned Books</h1>
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
                     
                    
               $sql = "SELECT * FROM borrower_data WHERE bo_return_date < '$current_date' AND bo_returned_date = '0' ORDER BY bo_return_date DESC LIMIT $start_from, ".$results_per_page;
               $result = $conn->query($sql); 

                echo "<div class='table-responsive'>";
                echo "<table class='table' style='font-size: 12px; width: 98%'>";
                echo "<thead>";
                echo "<tr style='background-color:#bfbfbf;'><th>Member Id</th><th>Book</th><th>ISBN</th><th>Issue</th><th>Due</th>";
                echo "</thead>";
                 while($row = $result->fetch_assoc()){
                         echo "<tbody><tr class='active'><td>";
                         echo $row["bo_customer_id"];
                         echo "</td><td>"; 	
                         echo $row["bo_item_name"];
                         echo "</td><td>";
                         echo $row["bo_item_isbn"];
                         echo "</td><td>";
                         echo $row["bo_borrow_date"];
                         echo "</td><td>";
                         echo $row["bo_return_date"];
                         echo "</td>";
                         echo "</tr>";
                         echo "</tr>"; 
                         echo "</tbody>";
                    }
                         echo "</table>";
                         echo "</div>";
                         
                         
                        $sql1 = "SELECT COUNT(bo_id) AS total FROM borrower_data WHERE bo_return_date < '$current_date' AND bo_returned_date = '0'";
                        $result1 = $conn->query($sql1);
                        $row1 = $result1->fetch_assoc();
                        $total_pages = ceil($row1["total"] / $results_per_page); // calculate total pages with results
                        
                        ?>
                    
                    <ul class="pagination" style="margin-left: 5%">
                        <li><a href="not_returned.php?page=<?php echo $i; ?>">&laquo;</a></li>
                         <li>
                         <?php
                      for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
                       echo "<a href='not_returned.php?page=".$i."'";
                       if ($i==$page){  echo " class='curPage'";}
                       echo ">".$i."</a> "; 
                          }
                          ?>
                         </li>
                         <li><a href="not_returned.php?page=<?php echo $i; ?>">&raquo;</a></li>
                    </ul>
        </div>
        
    </body>
</html>

