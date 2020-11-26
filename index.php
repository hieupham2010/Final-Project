<?php
session_start();
include 'DialogMessage.php';
if (isset($_SESSION["logged"]) && $_SESSION["logged"] === true) {
    header("Location: View/MainPage.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/style/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/vi/1/1b/T%C4%90T_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="View/javascript/main.js"></script>

    <title>Login</title>
</head>


</style>


<body>

    <!-- Material form login -->
    <div class="container">
        <div class="row mt-5">

            <div class=" col col-sm-12 ml-auto">
                <div class="Login-card m-auto rounded  h-100">
                    <!--Card content-->
                    <div class="mb-5">
                        <div class="mb-2 d-flex justify-content-center">
                            <img src="View/images/LogoTDT/LogoTDT.png" alt="Logo" width="120" height="120">
                        </div>
                        <!-- Form -->
                        <form class=" w-75 m-auto" action="Handle/LoginProcess" method="POST">

                            <!-- Email -->

                            <input type="text" name="txtUserName" id="txtUserName" placeholder="User Name" required class="form-control " value="<?php if (isset($_COOKIE["UserName"])) echo $_COOKIE["UserName"]; ?>">

                            <!-- Password -->


                            <input type="password" name="txtPassword" id="txtPassword" placeholder="Password" required class="form-control mt-2" value="<?php if (isset($_COOKIE["Password"])) echo $_COOKIE["Password"]; ?>">


                            <div class="d-flex justify-content-left mt-3">
                                <!-- Remember me -->
                                <div class="check_box">
                                    <input type="checkbox" id="remember" name="remember" <?php if (isset($_COOKIE["UserName"])) echo "checked"; ?>>
                                    <label class="form-check-label" for="remember">Remember me</label>
                                </div>

                            </div>

                            <!-- error show -->
                            <div class="text-danger small text-left mt-3">
                                <?php if (isset($_GET["msg1"])) echo $_GET["msg1"] ?>
                            </div>
                            <!-- error show -->

                            <!-- Sign in button -->
                            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" id="buttonLogin" name="buttonLogin" value="Login">Sign in</button>
                            <!-- Sign in button -->


                            <!-- Register -->
                            <span class="d-flex justify-content-center">Don't have an account?
                                <a class="" href="View/SignUp">Register</a>
                            </span>
                            <!-- Register -->

                            <!--forgot message -->
                            <p class="d-flex justify-content-center">
                                <?php if (isset($_GET["msg1"])) echo '<a href="View/ForgotPassword">Forgot Password</a>' ?>
                            </p>
                            <!------------------->

                        </form>
                        <!-- Form -->
                    </div>
                </div>
            </div>

        </div>
        <!-- Material form login -->
    </div>
</body>

</html>
<?php
if (isset($_GET["msg"])) {
    echo "<script>$('#Message').modal({show: true})</script>";
}
?>