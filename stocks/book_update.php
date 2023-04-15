<?php
//connect to the server and database
include '../connection/db_connection.php';
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>View Books</title>
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

            if(isset($_POST["itemcode"]))
            {
             $itemcode = $_POST["itemcode"];//get item code....
             
                $sql = "SELECT * FROM books_data WHERE b_item_code = '$itemcode' ";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                    //create all sessions....
                    $_SESSION['update_id']        = $row["b_id"];
                    $_SESSION['b_item_name']      = $row["b_item_name"];
                    $_SESSION['b_item_code']      = $row["b_item_code"];
                    $_SESSION['b_item_category']  = $row["b_item_category"];
                    $_SESSION['b_item_quantity']  = $row["b_item_quantity"];
                    $_SESSION['b_item_isbn']      = $row["b_item_isbn"];
                }

            }
            
        ?>
        <div class="container well well-sm" style="margin-left: 17%; width: 81%">
            <h1>Update Book Info</h1><hr>
            <form method="POST" action="update_book_info.php" autocomplete="off" enctype="multipart/form-data">          
                <table width='80%' align="center">
                    <tr>
                        <td>
                            <div class="form-group" style="margin-right: 10%">
                                <label><b>Item Name</b></label>
                                <input class="form-control" type="text" name="iname" id="iname" value="<?php echo $_SESSION['b_item_name'] ;?>" required>
                            </div>
                        </td>
                        <td>
                            <div class="form-group" style="margin-right: 10%">
                                <label><b>Item Code</b></label>
                                <input class="form-control" type="text" name="icode" id="icode" value="<?php echo $_SESSION['b_item_code'] ;?>"required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group" style="margin-right: 10%">
                                <label><b>Category</b></label>
                                <input class="form-control" type="text" name="category" id="category" value="<?php echo $_SESSION['b_item_category'];?>" required>
                            </div>
                        </td>
                        <td>
                            <div class="form-group" style="margin-right: 10%">
                                <label><b>Quantity</b></label>
                                <input class="form-control" type="number" name="quantity" id="quantity " value="<?php echo $_SESSION['b_item_quantity'];?>" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group" style="margin-right: 10%">
                                <label><b>ISBN</b></label>
                                <input class="form-control" type="text" name="isbn" id="isbn" value="<?php echo $_SESSION['b_item_isbn'];?>" required>
                            </div>
                        </td>
                        <td>
                            <!-- ...Empty cell... -->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!-- ...Empty cell... -->
                        </td>
                        <td>
                            <button class="form-control btn-warning"  type="reset" style="width: 30%; float: right; margin-right: 5px;">RESET</button>
                        </td>
                        <td>
                            <button class="form-control btn-primary" type="submit" style="width: 65%; float: left;">SUBMIT</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

