<?php
require '../Handle/ConfirmLogged.php';
include '../DialogMessage.php';
if (!isset($_GET["request"]) || empty($_GET["request"])) {
    header("Location: MainPage.php");
    exit;
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
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'Header.php' ?>
    <div class="container  main-secction border mt-5">
        <div class="row ml-auto tab-pane active" id="View-Profile">
            <div class="row user-left-part">
                <form action="../Handle/UpdateProfileProcess.php" method="POST" enctype="multipart/form-data">
                    <div class="col-md-3 col-sm-3 col-xs-12 user-profile-part pull-left">
                        <div class="row ">
                            <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center d-flex justify-content-center">
                                <div>
                                    <img src="<?php echo $AvatarSrc ?>" class="rounded-circle">
                                    <input type="file" id="imageUpload" name="imageUpload">
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
                    <div class="col-md-9 col-sm-9 col-xs-12 pull-right">
                        <div class="row profile-right-section-row">
                            <div class="col-md-12 profile-header">
                                <div class="row mt-4">
                                    <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left">
                                        <h2>User Name</h2>
                                        <p>User Type</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-11">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-borderless border">
                                                <tr>
                                                    <td><span>Full Name:</span></td>
                                                    <td>
                                                        <div class="md-form">
                                                            <input type="text" name="txtFullName" required class="form-control" placeholder="Full Name" value="<?php echo $FullName ?>">
                                                        </div>
                                                    </td>
                                                    <td><span>Birth Day:</span></td>
                                                    <td>
                                                        <div class="md-form">
                                                            <input type="date" name="txtDateOfBirth" id="txtDateOfBirth" required class="form-control" value="<?php echo $DateOfBirth ?>">
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td><span>Email:</span></td>
                                                    <td>
                                                        <div class="md-form">
                                                            <input type="email" name="txtEmail" id="txtEmail" placeholder="Email" required class="form-control" value="<?php echo $Email ?>">
                                                        </div>
                                                    </td>
                                                    <td><span>Phone Number:</span></td>
                                                    <td>
                                                        <div class="md-form">
                                                            <input type="tel" name="txtPhoneNumber" id="txtPhoneNumber" placeholder="Phone Number" pattern="[0-9]{10}" required class="form-control" value="<?php echo $PhoneNumber ?>">
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <input type="submit" value="Update" class="btn btn-outline-info btn-rounded btn-block waves-effect z-depth-0">
                                                    </td>

                                                </tr>
                                            </table>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_GET["msg"])) {
    echo "<script>$('#Message').modal({show: true})</script>";
}
?>