<?php 
session_start();

// Check, if l_email and user_name session is NOT set then this page will jump to login page...
if (!isset($_SESSION['l_email']) && !isset($_SESSION['user_name'])) {
  header('Location: ../login/login_page.php');
} 
?>
<html>
    <head>
        <title></title>
        <script src="clock.js" type="text/javascript"></script>
    </head>
    <body>
 
        <div class="sidebar">
            <div>
                <h1 align="center" style="color: #ffffff"><i class="fa fa-fw fa-user-circle"></i></h1>
                <h5 align="center" style="font-size: 18px; color: #ffffff"><?php echo $_SESSION['user_name'];?></h5>  
            </div>
            <hr style="margin-top: 25%;">
            <a href="../main/home.php"><i class="fa fa-fw fa-home"></i> Home</a>
            <a href="../system_users/system_user_reg.php"><i class="fa fa-fw fa-user-plus"></i> Add System User</a>
            <a href="../members/member_reg.php"><i class="fa fa-fw fa-users"></i> Register Member</a>
            <a href="../stocks/add_stock.php"><i class="fa fa-fw fa-book"></i> Add Books</a>
            <a href="../stocks/view_books.php"><i class="fa fa-fw fa-eye"></i> View Books</a><br>
            <a href="../backup/backup.php"><i class="fa fa-fw fa-download"></i> Backup</a>
            <a href="../login/logout.php"><i class="fa fa-fw fa-sign-out"></i> Logout</a><br><br>
        </div>
    </body>
</html>


