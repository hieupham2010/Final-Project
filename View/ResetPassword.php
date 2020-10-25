<?php
session_start();
if (!isset($_SESSION["Email"]) && !isset($_SESSION["Hash"])) {
    header("Location: ForgotPassword.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <div class="reset-card rounded-lg d-flex justify-content-center mt-5">
        <!--Card content-->
        <div class="card-body px-lg-5 pt-0 mt-3 mb-5">
            <div class="mb-2 d-flex justify-content-center">
                <img src="images/LogoTDT/LogoTDT.png" alt="Logo" width="120" height="120">
            </div>
            <!-- Form -->
            <form class="text-center " action="../Handle/ResetPasswordProcess.php" method="POST">


                <div class="md-form mt-2">
                    <p >Hi <?php if (isset($_SESSION["FullName"])) echo $_SESSION["FullName"];  ?></p>
                    <p>Please reset your password here</p>
                </div>
                <div class="md-form mt-3">
                    <input class="form-control" type="password" name="txtNewPassword" id="txtNewPassword" placeholder="New Password" required>
                </div>
                <div class="text-danger small text-left">
                    <span id="errorMessage"><?php if (isset($_GET["msg2"])) echo $_GET["msg2"]; ?></span>
                </div>
                <div class="md-form mt-3">
                    <input class="form-control" type="password" name="txtConfirmPassword" id="txtConfirmPassword" placeholder="Confirm Password" required>
                </div>

                <!-- error show -->
                <div class="text-danger small text-left">
                    <span id="errorMessage"><?php if (isset($_GET["msg1"])) echo $_GET["msg1"]; ?></span>
                </div>
                <!-- error show -->

                <!-- Update button -->
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" id="ButtonResetPassword" name="ButtonResetPassword" value="Update">Update</button>
                <!-- Update button -->

            </form>
            <!-- Form -->
        </div>
    </div>

</body>

</html>