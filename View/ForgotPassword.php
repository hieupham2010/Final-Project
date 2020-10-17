<?php
if (isset($_GET["msgTimeUp"])) {
    echo '<script>alert("' . $_GET["msgTimeUp"] . '")</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/vi/1/1b/T%C4%90T_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>

<body>
    <div class="forgot-card rounded p-3">
        <!--Card content-->
        <div class="card-body px-lg-5 pt-0 mt-2">
            <div class="mb-5  d-flex justify-content-center">
                <img src="https://upload.wikimedia.org/wikipedia/vi/thumb/1/1b/T%C4%90T_logo.png/200px-T%C4%90T_logo.png" alt="Logo" width="120" height="80">
            </div>
            <div class="mb-2">
                <p>Enter the registered email to reset password!</p>
            </div>
            <form class="text-center" form action="../Handle/ForgotPasswordProcess.php" method="POST">
                <!-- Email -->
                <div class="md-form">
                    <input type="email" name="txtEmail" id="txtEmail" placeholder="Email" required class="form-control">
                </div>
                <div class="text-danger small text-left mt-3">
                    <span id="errorMessage"><?php if (isset($_GET["msg"])) echo $_GET["msg"]; ?></span></td>
                </div>
                <div>
                    <input class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" id="buttonForgotPassword" name="buttonForgotPassword" value="Verification">
                </div>
                <div class="d-flex justify-content-around">
            </form>
        </div>
    </div>
</body>

</html>