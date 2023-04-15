<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Book Lending</title>
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
            <form method="POST" action="insertdata.php" autocomplete="off" enctype="multipart/form-data">
                <h1>Book Lending</h1>
                <hr style="margin-right: 2%; height: 1px;">
                <div id="mid1" class="error"> </div>
                
                <table width='80%'>
                    <tr>
                        <td>
                            <div class="form-group" style="margin-right: 10%">
                                <label><b>Item Code</b></label>
                                <input class="form-control" type="text" placeholder="Enter Item Code" name="itcode" id="itcode" required>
                            </div>
                        </td>
                        <td rowspan="2">
                            <div class="form-group" style="margin-left: 10%">
                                <label><b>Item Name & ISBN</b></label>
                                <div class="form-control" id="iname1" style="height: 80px"></div>
                            </div>
                            <div id="iname1"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group" style="margin-right: 10%">
                                <label><b>Member ID</b></label>
                                <input class="form-control" type="text" placeholder="Enter Member ID" name="mid" id="mid" required>
                            </div>
                        </td>
                        <td>
                          <!-- ...Empty cell... -->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group" style="margin-right: 10%">
                                <label><b>Return Date</b></label>
                                <input class="form-control" type="date" placeholder="Return Date" name="rdate" id="rdate" required>
                            </div>
                        </td>
                        <td>
                            <button class="form-control btn-primary" style="width: 40%; float: right;" type="submit" id="mid1">SUBMIT</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div> 
    </div>
    <script>  
        $(document).ready(function(){  
             $('#itcode').change(function(){  
                  var it_name = $(this).val();  
                  $.ajax({  
                       url:"load_selected_data.php",  
                       method:"POST",  
                       data:{it_name:it_name},  
                       success:function(data){  
                            $('#iname1').html(data);  
                       }  
                  });  
             });  
        });  
        $(document).ready(function(){  
             $('#mid').change(function(){  
                  var m_id = $(this).val();  
                  $.ajax({  
                       url:"check_member_status.php",  
                       method:"POST",  
                       data:{m_id:m_id},  
                       success:function(data){  
                            $('#mid1').html(data);  
                       }  
                  });  
             });  
        }); 
    </script>

</body>
</html>

