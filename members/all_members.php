<?php
//connect to the server and database
include '../connection/db_connection.php';
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>All Members</title>
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
            <h1>All Members</h1>
            <hr style="margin-right: 2%; height: 1px;">
            
            <!--member search box-->
            <div class="form-group" style="margin-left: 70%;">
                <form action="all_members.php" method="POST" class="form-inline">
                    <input type="text" placeholder="Search..." name="search" class="form-control" style="width:80%;">
                    <button type="submit" class="btn-group-lg" style="padding: 7px 12px 8px 12px; border-radius: 3px;"><i class="fa fa-search"></i></button>
                </form>
            </div>
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
                     
                    
               $sql = "SELECT * FROM member ORDER BY m_id DESC LIMIT $start_from, ".$results_per_page;
               $result = $conn->query($sql); 

                    echo "<div class='table-responsive'>";
                    echo "<table class='table' style='font-size: 15px; width: 98%'>";
                    echo "<thead>";
                    echo "<tr class='info'><th>Name</th><th>NIC</th><th>Email</th>"
                       . "<th>Address</th><th>Registered</th><th></th><th></th>";
                    echo "</thead>";
                    //member search....
                    include './member_search.php';
                     while($row = $result->fetch_assoc()){
                             echo "<tbody><tr class='active'><td>";
                             echo $row["m_first_name"] ." ". $row["m_last_name"];
                             echo "</td><td>";
                             echo $row["m_nic"];
                             echo "</td><td>";
                             echo $row["m_email"];
                             echo "</td><td>";
                             echo $row["m_address"];
                             echo "</td><td>";
                             echo $row["m_reg_date"];
                             echo "</td><td>";
                             echo "<form action='member_profile.php' method='POST'>";
                             ?>
                            <button class='btn btn-sm btn-info' type='submit' name="member_nic" style="float: right;" value="<?php echo $row["m_nic"] ?>">View <i class='fa fa-address-card'></i></button>
                            <?php
                             echo "</form></td><td><form action='member_status.php' method='POST'>";
                            //User Status Button... 
                            if($row['m_status']=="1"){
                                   $btn_name="Deactivate";//Button Label.
                                   $style="btn-warning"; //Button style.
                                   $style2="style=''";//Button color is default color--- leave this empty.
                                   $btn_art="fa fa-remove";//Button icon.
                               }else{
                                   $btn_name="Activate";//Button Label.
                                   $style="btn-default";//Button style.
                                   $style2="style='background-color:#33cc33;'";//Button color.
                                   $btn_art="fa fa-check";//Button icon.
                               }
                            ?>
                               <button class="btn btn-sm <?php echo $style;?>" <?php echo $style2;?> type="submit" name="m_status" value="<?php echo $row["m_nic"]?>">
                                   <?php echo $btn_name;?> <i class="<?php echo $btn_art;?>"></i>
                               </button>
                            <?php
                               echo "</form></td>";
                               echo "</tr>"; 
                               echo "</tbody>";
                          }
                               echo "</table>";
                               echo "</div>";

                                $sql1 = "SELECT COUNT(m_id) AS total FROM member";
                                $result1 = $conn->query($sql1);
                                $row1 = $result1->fetch_assoc();
                                $total_pages = ceil($row1["total"] / $results_per_page); // calculate total pages with results
                            ?>
                    
                    <ul class="pagination" style="margin-left: 5%">
                        <li><a href="all_members.php?page=<?php echo $i; ?>">&laquo;</a></li>
                         <li>
                         <?php
                      for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
                       echo "<a href='all_members.php?page=".$i."'";
                       if ($i==$page){  echo " class='curPage'";}
                       echo ">".$i."</a> "; 
                          }
                          ?>
                         </li>
                         <li><a href="all_members.php?page=<?php echo $i; ?>">&raquo;</a></li>
                    </ul>
        </div>
        
    </body>
</html>

