<?php
$_SESSION['succces_msg'] = $_SESSION['error_msg'] = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    if ($search= $_POST['search']) {
       $results_per_page = 10;
  if (isset($_GET["page"])) { 
      $page  = $_GET["page"]; 
 } else {
     $page=1;
     }
  $start_from = ($page-1) * $results_per_page;
     $sql = "SELECT * FROM member WHERE m_id='$search' OR m_first_name='$search' OR m_last_name='$search' OR m_email='$search' OR m_phone='$search' OR m_nic='$search' ORDER BY m_id ASC LIMIT $start_from, ".$results_per_page;
     $result = mysqli_query($conn, $sql); 
  }
}

?>
