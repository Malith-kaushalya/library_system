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
            <h1>All Books</h1><hr>
            <!--book search box-->
            <div class="form-group" style="margin-left: 70%;">
                <form action="all_books.php" method="POST" class="form-inline">
                    <input type="text" placeholder="Search..." name="search" class="form-control" style="width:80%;">
                    <button type="submit" class="btn-group-lg" style="padding: 7px 12px 8px 12px; border-radius: 3px;"><i class="fa fa-search"></i></button>
                </form>
            </div>
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
                     
                    
               $sql = "SELECT * FROM books_data ORDER BY b_id DESC LIMIT $start_from, ".$results_per_page;
               $result = $conn->query($sql); 

                    echo "<div class='table-responsive'>";
                    echo "<table class='table' style='font-size: 15px; width: 90%; margin-left:5%;'>";
                    echo "<thead>";
                    echo "<tr class='info'><th>Book Name</th><th>Book Code</th><th>ISBN</th>"
                       . "<th>Category</th><th>Avalable Quantity</th>";
                    echo "</thead>";
                    
                    //search....
                    include './search_books.php';
                    
                     while($row = $result->fetch_assoc()){
                             echo "<tbody><tr class='active'><td>";
                             echo $row["b_item_name"];
                             echo "</td><td>";
                             echo $row["b_item_code"];
                             echo "</td><td>";
                             echo $row["b_item_isbn"];
                             echo "</td><td>";
                             echo $row["b_item_category"];
                             echo "</td><td>";
                             echo $row["b_item_quantity"];
                             echo "</td></tr>";
                             echo "</tr>"; 
                             echo "</tbody>";
                        }
                             echo "</table>";
                             echo "</div>";

                                $sql1 = "SELECT COUNT(b_id) AS total FROM books_data";
                                $result1 = $conn->query($sql1);
                                $row1 = $result1->fetch_assoc();
                                $total_pages = ceil($row1["total"] / $results_per_page);//calculate total pages with results
                            ?>
                    
                    <ul class="pagination" style="margin-left: 5%">
                        <li><a href="all_books.php?page=<?php echo $i; ?>">&laquo;</a></li>
                        <li>
                         <?php
                      for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
                       echo "<a href='all_books.php?page=".$i."'";
                       if ($i==$page){  echo " class='curPage'";}
                       echo ">".$i."</a> "; 
                          }
                          ?>
                         </li>
                         <li><a href="all_books.php?page=<?php echo $i; ?>">&raquo;</a></li>
                    </ul>
        </div>
        
    </body>
</html>



