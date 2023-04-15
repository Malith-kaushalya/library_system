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
            <?php
                if(isset($_POST["member_nic"])){
                    $member_nic = $_POST["member_nic"];
                    
                    $sql = "SELECT * FROM member WHERE m_nic = '$member_nic' ";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()){
                        $member_name     = $row["m_first_name"] ." ". $row["m_last_name"];
                        $member_nic_no   = $row["m_nic"];
                        $memeber_email   = $row["m_email"];
                        $member_address  = $row["m_address"];
                        $member_reg_date = $row["m_reg_date"];
                        $member_phone    = $row["m_phone"];
                        $member_status   = $row["m_status"];
                    }
                }
            ?>
            <div>
                <table>
                    <tr>
                        <td><h1><?php echo $member_name; ?></h1></td>
                        <td>
                            <div style="margin-left: 10px; margin-top: 10px;">
                                <?php
                                    if($member_status == '1'){
                                        echo "<a href='#' data-toggle='tooltip' title='Active Member'>";
                                        echo "<img src='../images/green.png' width='25px' height='25px'>";
                                        echo "</a>";
                                    }else{
                                        echo "<a href='#' data-toggle='tooltip' title='Deactive Member'>";
                                        echo "<img src='../images/red.png' width='25px' height='25px'>";
                                        echo "</a>";
                                    }
                                ?>
                                <script>//for tooltip....
                                    $(document).ready(function(){
                                      $('[data-toggle="tooltip"]').tooltip();   
                                    });
                                </script>
                            </div>
                        </td>
                    </tr>
                </table>
                
            </div><hr>
            
            <div style="margin-left: 2%;"><!-- show member data -->
                <table width="100%;">
                    <tr width="100%;">
                        <td width="40%;">
                            <table>
                                <tr>
                                    <td colspan="2">
                                        <h3>MEMBER DETAILS</h3><hr>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>NIC Number </label>
                                    </td>
                                    <td>
                                        : <?php echo $member_nic_no; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>E-mail Address </label>
                                    </td>
                                    <td>
                                        : <?php echo $memeber_email; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Home Address </label>
                                    </td>
                                    <td>
                                        : <?php echo $member_address; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Contact Number </label>
                                    </td>
                                    <td>
                                        : <?php echo $member_phone; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Register Date </label>
                                    </td>
                                    <td>
                                        : <?php echo $member_reg_date; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <hr>
                                        <a href="all_members.php"><button class="btn btn-primary" style="margin-top: 20%;"><i class="fa fa-arrow-circle-left"> BACK</i></button></a>
                                    </td> 
                                </tr>
                            </table>
                        </td>
                        <!-- show member lending history -->
                        <td width="60%;" style="margin-left: 5%;" valign="top">
                            <div>
                                <h3>LENDING HISTORY</h3><hr>
                                <?php
                                    $sql2 = "SELECT * FROM borrower_data  WHERE bo_customer_id  = '$member_nic_no' ORDER BY bo_id DESC LIMIT 20";
                                    $result2 = $conn->query($sql2);
                                    
                                    echo "<div class='table-responsive'>";
                                    echo "<table class='table' style='font-size: 15px; width: 98%'>";
                                    echo "<thead>";
                                    echo "<tr class='info'><th>Item Name</th><th>Item Code</th><th>ISBN</th>"
                                       . "<th>Borrow Date</th><th>Return Date</th>";
                                    echo "</thead>";
                                        while($row2 = $result2->fetch_assoc()){
                                             echo "<tbody><tr class='active'><td>";
                                             echo $row2["bo_item_name"];
                                             echo "</td><td>";
                                             echo $row2["bo_item_code"];
                                             echo "</td><td>";
                                             echo $row2["bo_item_isbn"];
                                             echo "</td><td>";
                                             echo $row2["bo_borrow_date"];
                                             echo "</td><td>";
                                             if($row2["bo_returned_date"] == '0'){
                                                 echo 'Not Returned';
                                             }else{
                                                 echo $row2["bo_returned_date"];
                                             }
                                             echo "</td>";
                                             echo "</tr>";
                                             echo "</tr>"; 
                                             echo "</tbody>";
                                        }
                                             echo "</table>";
                                             echo "</div>";
                                ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            
        </div>
    </body>
</html>
