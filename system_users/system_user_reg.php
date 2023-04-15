<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>System User Register</title>
        <link rel="icon" type="image/jpg" href="###"/>
        <link href="../css/styles_all.css" rel="stylesheet" type="text/css"/>
        <link href="../font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>      
        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="../bootstrap/js/bootstrap.min_1.js" type="text/javascript"></script>
        <script src="checkpassword.js" type="text/javascript"></script>
    </head>
<body>
    <?php
        include '../main/sidebar.php';
        include '../main/header.php';
        include './insert_user_data.php'; 
    ?>
    <div class="container" style="margin-left: 17%; width: 83%">
        <div class="well well-sm" style="margin: 0 2% 0 0;">
            <form method="POST" action="system_user_reg.php" name="usreg" onsubmit="return checkpassword()" autocomplete="off" enctype="multipart/form-data">
                <h1>Add New System User</h1>
                <hr style="margin-right: 2%; height: 1px;">
                <div id="pw_error" class="error"></div><!-- Error display -->
                <table width='80%' align="center">
                    <tr>
                        <td>
                            <div class="form-group" style="margin-right: 10%">
                                <label><b>User Name</b></label>
                                <input class="form-control" type="text" placeholder="Enter User Name" name="suname" id="suname" required>
                            </div>
                        </td>
                        <td>
                            <div class="form-group" style="margin-right: 10%">
                                <label><b>User Email Address</b></label>
                                <input class="form-control" type="email" placeholder="Enter User Email Address" name="suemail" id="suemail" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group" style="margin-right: 10%">
                                <label><b>User ID</b></label>
                                <input class="form-control" type="text" placeholder="Enter User ID No" name="suid" id="suid" required>
                            </div>
                        </td>
                        <td>
                            <div class="form-group" style="margin-right: 10%">
                                <label><b>User Contact No</b></label>
                                <input class="form-control" type="number" placeholder="Enter User Contact Number" name="suphone" id="suphone" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group" style="margin-right: 10%">
                                <label><b>Create Password</b></label>
                                <input class="form-control" type="password" placeholder="Create Password" name="sucpw" id="sucpw" required>
                            </div>
                        </td>
                        <td>
                            <div class="form-group" style="margin-right: 10%">
                                <label><b>Conform Password</b></label>
                                <input class="form-control" type="password" placeholder="Conform Password" name="supw" id="supw" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!-- ...Empty cell... -->
                        </td>
                        <td>
                            <button class="form-control btn-primary" style="width: 60%; margin-left: 30%;" type="submit">SUBMIT</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div> 
    </div>
</body>
</html>


