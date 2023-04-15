<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Member Register</title>
        <link rel="icon" type="image/jpg" href="###"/>
        <link href="../css/styles_all.css" rel="stylesheet" type="text/css"/>
        <link href="../font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>      
        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="../bootstrap/js/bootstrap.min_1.js" type="text/javascript"></script>
        <script src="checkpasswordmem.js" type="text/javascript"></script>
    </head>
<body>
    <?php
        include '../main/sidebar.php';
        include '../main/header.php';
        include './insert_member_data.php';
    ?>
    <div class="container" style="margin-left: 17%; width: 83%">
        <div class="well well-sm" style="margin: 0 2% 0 0;">
            <form method="POST" action="member_reg.php" name="memreg"  onsubmit="return checkpasswordmem()" autocomplete="off" enctype="multipart/form-data">
                <h1>Register New Member</h1>
                <hr style="margin-right: 2%; height: 1px;">
                <div id="pw_error_member" class="error"></div><!-- Error display -->
                
                <table width='80%' align="center">
                    <tr>
                        <td>
                            <div class="form-group" style="margin-right: 10%">
                                <label><b>First Name</b></label>
                                <input class="form-control" type="text" placeholder="Enter Member's First Name" name="mfname" id="mfname" required>
                            </div>
                        </td>
                        <td>
                            <div class="form-group" style="margin-right: 10%">
                                <label><b>Last Name</b></label>
                                <input class="form-control" type="text" placeholder="Enter Member's Last Name" name="mlname" id="mlname" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group" style="margin-right: 10%">
                                <label><b>Member ID No</b></label>
                                <input class="form-control" type="text" placeholder="Enter Member's ID No" name="mid" id="mid" required>
                            </div>
                        </td>
                        <td>
                            <div class="form-group" style="margin-right: 10%">
                                <label><b>Member Contact No</b></label>
                                <input class="form-control" type="number" placeholder="Enter Member's Contact Number" name="mphone" id="mphone" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group" style="margin-right: 10%">
                                <label><b>Member Home Address</b></label>
                                <input class="form-control" type="text" placeholder="Enter Member's Home Address" name="mhaddress" id="mhaddress" required>
                            </div>
                        </td>
                        <td>
                            <div class="form-group" style="margin-right: 10%">
                                <label><b>Member Email Address</b></label>
                                <input class="form-control" type="email" placeholder="Enter Member's Email Address" name="memail" id="memail" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group" style="margin-right: 10%">
                                <label><b>Create Password</b></label>
                                <input class="form-control" type="password" placeholder="Create Password" name="mempw" id="sucpw" required>
                            </div>
                        </td>
                        <td>
                            <div class="form-group" style="margin-right: 10%">
                                <label><b>Conform Password</b></label>
                                <input class="form-control" type="password" placeholder="Conform Password" name="mempw_con" id="supw" required>
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


