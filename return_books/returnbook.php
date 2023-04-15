<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Book Return</title>
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
    <div class="container" style="margin-left: 17%; width: 83%">
        <div class="well well-sm" style="margin: 0 2% 0 0;">
            <form method="POST" action="updatebooks.php" autocomplete="off" enctype="multipart/form-data">
                <h1>Book Return</h1>
                <hr style="margin-right: 2%; height: 1px;">
                
                <table width='80%'>
                    <tr>
                        <td>
                            <div class="form-group" style="margin-right: 10%">
                                <label><b>Member ID</b></label>
                                <input class="form-control" type="text" placeholder="Enter Member ID" name="mid" id="mid" required>
                            </div>
                        </td>
                        <td rowspan="3">
                            <div class="form-group" style="margin-left: 10%">
                                <label><b>Book Details</b></label>
                                <div class="form-control" id="iname" style="height: 185px"></div>
                            </div>
                            <div id="iname"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group" style="margin-right: 10%">
                                <label><b>Item Code</b></label>
                                <input class="form-control" type="text" placeholder="Enter Item Code" name="itcode" id="itcode" required>
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
                            <button class="form-control btn-primary" style="width: 80%; float: right;" type="submit">RETURN</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div> 
    </div>
    <script>  
        $(document).ready(function(){  
             $('#mid').change(function(){  
                  var cus_id = $(this).val();  
                  $.ajax({  
                       url:"load_book_data.php",  
                       method:"POST",  
                       data:{cus_id:cus_id},  
                       success:function(data){  
                            $('#iname').html(data);  
                       }  
                  });  
             });  
        });  
        
    </script>

</body>
</html>



