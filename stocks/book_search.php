<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    if ($search= $_POST['search']) {
       $results_per_page = 10;
  if (isset($_GET["page"])) { 
      $page  = $_GET["page"]; 
 } else {
     $page=1;
     }
  $start_from = ($page-1) * $results_per_page;
     $sql = "SELECT * FROM books_data WHERE b_item_code='$search' OR b_item_name='$search' OR b_item_category='$search' OR b_item_isbn='$search' ORDER BY b_id ASC LIMIT $start_from, ".$results_per_page;
     $result = mysqli_query($conn, $sql); 
  }
}

?>
