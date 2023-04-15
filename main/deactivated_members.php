<?php

$sql41 = "SELECT * FROM member WHERE m_status = '0' ORDER BY m_id DESC ";
$result41 = $conn->query($sql41); 

    echo "<div class='table-responsive'>";
    echo "<table class='table' style='font-size: 12px; width: 98%'>";
    echo "<thead>";
    echo "<tr style='background-color:#bfbfbf;'><th>Name</th><th>Email</th><th>Contact</th><th>Reg_Date</th>";
    echo "</thead>";
     while($row41 = $result41->fetch_assoc()){
             echo "<tbody><tr class='active'><td>";
             echo $row41["m_first_name"]." ".$row41["m_last_name"];
             echo "</td><td>";
             echo $row41["m_email"];
             echo "</td><td>";
             echo $row41["m_phone"];
             echo "</td><td>";
             echo $row41["m_reg_date"];
             echo "</td>";
             echo "</tr>";
             echo "</tr>"; 
             echo "</tbody>";
        }
             echo "</table>";
             echo "</div>";

            ?>


