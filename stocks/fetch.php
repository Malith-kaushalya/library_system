<?php
//fetch.php
include '../connection/db_connection.php';

$output = '';
$query = "SELECT * FROM books_data ORDER BY b_id DESC LIMIT 5";
$result = mysqli_query($conn, $query);
$output = '
<br />
<h3 align="center">Newly Added Items</h3>
<table class="table table-bordered table-striped">
 <tr>
  <th width="10%">Item Code</th>
  <th width="50%">Item Name</th>
  <th width="20%">Category</th>
  <th width="5%">Quantity</th>
  <th width="15%">ISBN</th>
 </tr>
';
while($row = mysqli_fetch_assoc($result))
{
 $output .= '
 <tr>
    <td>'.$row["b_item_code"].'</td>
    <td>'.$row["b_item_name"].'</td>
    <td>'.$row["b_item_category"].'</td>
    <td>'.$row["b_item_quantity"].'</td>
    <td>'.$row["b_item_isbn"].'</td>
 </tr>
 ';
}
$output .= '</table>';
echo $output;
?>

