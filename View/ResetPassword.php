<?php
session_start();
if (!isset($_SESSION["verifiedEmailForPassword"]) && $_SESSION["verifiedEmailForPassword"] !== true) {
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
            <div class="mb-5  d-flex justify-content-center">
                <img src="https://upload.wikimedia.org/wikipedia/vi/thumb/1/1b/T%C4%90T_logo.png/200px-T%C4%90T_logo.png" alt="Logo" width="120" height="80">
            </div>
            <!-- Form -->
            <form class="text-center " action="../Handle/ResetPasswordProcess.php" method="POST">


                <div class="md-form mt-2">
                    <p >Hello <?php if (isset($_SESSION["FullName"])) echo $_SESSION["FullName"]; ?> </p>
                </div>
                <div class="md-form mt-2">
                    <input class="form-control" type="hidden" name="Email" value="<?php if (isset($_SESSION["Email"])) echo $_SESSION["Email"] ?>">
                </div>

                <div class="md-form mt-3">
                    <input class="form-control" type="password" name="txtNewPassword" id="txtNewPassword" placeholder="New Password" required>

                </div>
                <div class="md-form mt-2">
                    <input class="form-control" type="password" name="txtConfirmPassword" id="txtConfirmPassword" placeholder="Confirm Password" required>
                </div>

                <!-- error show -->
                <div class="text-danger small text-center">
                    <span id="errorMessage"><?php if (isset($_GET["msg"])) echo $_GET["msg"]; ?></span>
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