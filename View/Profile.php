<?php
require '../Handle/ConfirmLogged.php';

?>
<?php
if (isset($_GET["msgTimeUp"])) {
    echo '<script>alert("' . $_GET["msgTimeUp"] . '")</script>';
}
?>
<!DOCTYPE html>
<html>
<style>
    .Bio-card {
        width: 70%;
        justify-content: center;
    }
</style>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="custom.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'Header.php'
    
     ?>



    <div class="container  main-secction border mt-5">
        <div class="row ml-auto tab-pane active" id="View-Profile">
            <div class="row user-left-part">
                <div class="col-md-4 col-sm-3 col-xs-12 user-profile-part pull-left">
                    <div class="row ">
                        <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center d-flex justify-content-center">

                            <div>
                                <img src="images/avatarUploads/DefaultAvatar.png" class="rounded-circle">
                                <input type="file" id="myfile" name="myfile">
                            </div>


                            <div class="dropdown-menu dropdown-menu-right">
                                <input class="dropdown-menu-item " type="file" id="userPicFileUpload" />
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 d-flex justify-content-center">
                            <div class="Bio-card border rounded mt-5 ">
                                <div class="ml-3 mt-2">
                                    <h1>Bio</h1>
                                </div>
                                <div class="ml-3 mt-2">
                                    <p>Some thing you write</p>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-8 col-sm-9 col-xs-12 pull-right">
                    <div class="row profile-right-section-row">
                        <div class="col-md-12 profile-header">
                            <div class="row mt-4">
                                <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left">
                                    <h2>User Name</h2>
                                    <p>User Type</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="table-responsive ">
                                        <form action="../Handle/SignUpProcess.php" method="POST">
                                            <table class="table table-borderless  border">

                                                <tr>
                                                    <td><span>Full Name:</span></td>
                                                    <td>
                                                        <div class="md-form">
                                                            <input type="text" class="form-control ">
                                                        </div>
                                                    </td>
                                                    <td><span>Gender:</span></td>
                                                    <td>
                                                        <div class="md-form">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td><span>Email:</span></td>
                                                    <td>
                                                        <div class="md-form">
                                                            <input type="email" name="txtEmail" id="txtEmail" placeholder="Email" required class="form-control">
                                                        </div>
                                                    </td>
                                                    <td><span>Phone Number:</span></td>
                                                    <td>
                                                        <div class="md-form">
                                                            <input type="tel" name="txtPhoneNumber" id="txtPhoneNumber" placeholder="Phone Number" pattern="[0-9]{10}" required class="form-control">
                                                        </div>
                                                    </td>


                                                </tr>
                                                <tr>
                                                    <td><span>Birth Day:</span></td>
                                                    <td>
                                                        <div class="md-form">
                                                            <input type="date" name="txtDateOfBirth" id="txtDateOfBirth" value="Birth Day" required class="form-control">
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><span>User Name:</span></td>
                                                    <td>
                                                        <div class="md-form">
                                                            <input type="text" name="txtUserName" id="txtUserName" placeholder="User Name" required class="form-control">
                                                        </div>
                                                    </td>
                                                    <td><span>PassWord:</span></td>
                                                    <td>
                                                        <div class="md-form ">
                                                            <input type="password" name="txtPassword" id="txtPassword" placeholder="Password" required class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>

                                                </tr>
                                            </table>
                                        </form>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>