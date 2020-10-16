<?php
    if(isset($_GET["msgTimeUp"])) {
        echo '<script>alert("'.$_GET["msgTimeUp"].'")</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <script src="javascript/main.js"></script>
    <title>Sign Up</title>
</head>
<body>
    <div class="header">
        <h1>Classroom</h1>
    </div>
    
    <div class="sign_up">
        <h2>Sign Up</h2>
        <form action="../Handle/SignUpProcess.php" method="POST">
            <table>
                <tr>
                    <td>
                        <input type="text" name="txtFullName" id="txtFullName" placeholder="Full Name" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="txtDateOfBirth">Date Of Birth:</label>
                        <input type="date" name="txtDateOfBirth" id="txtDateOfBirth" required>
                    </td>
                </tr>
                <p></p>
                <tr>
                    <td>
                        <input type="email" name="txtEmail" id="txtEmail" placeholder="Email" required>
                    </td>
                </tr>
                <tr>
                    <td><span id="errorMessage" ><?php if(isset($_GET["msg1"])) echo $_GET["msg1"]; ?></span></td>
                </tr>
                <tr>
                    <td>
                        <input type="tel" name="txtPhoneNumber" id="txtPhoneNumber" placeholder="Phone Number" pattern="[0-9]{10}" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="txtUserName" id="txtUserName" placeholder="User Name" required>
                    </td>
                </tr>
                <tr>
                    <td><span id="errorMessage"><?php if(isset($_GET["msg2"])) echo $_GET["msg2"]; ?></span></td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="txtPassword" id="txtPassword" placeholder="Password" required>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" id="buttonSignUp" name="buttonSignUp" value="Sign Up"></td>
                </tr>
            </table>
        </form>
    </div>

     <!-- Material form login -->
     <div class="Login-card rounded-lg  p-auto">
        <!--Card content-->
        <div class="card-body px-lg-5 pt-0 mt-2">
                <div class="mb-2  d-flex justify-content-center">
                    <img src="https://upload.wikimedia.org/wikipedia/vi/thumb/1/1b/T%C4%90T_logo.png/200px-T%C4%90T_logo.png" alt="Logo" width="120" height="80">
                </div>
                <!-- Form -->
            <form class="text-center"action="../Handle/SignUpProcess.php" method="POST">
               
                <!-- Email -->
                <div class="md-form">
                    <input type="text" name="txtUserName" id="txtUserName" placeholder="User Name" required class="form-control">
                </div>
                <!-- Password -->
                <div>
                    <input type=""/>
                </div>

                <div class="md-form mt-3">
                    <input type="password" name="txtPassword" id="txtPassword" placeholder="Password" required class="form-control">
                </div>

                <div class="d-flex justify-content-left mt-3">

                    <div>
                        <!-- Remember me -->
                        <div class="form-check ">
                            <input type="checkbox" class="form-check-input" id="materialLoginFormRemember">
                            <label class="form-check-label " for="materialLoginFormRemember">Remember me</label>
                        </div>
                    </div>

                </div>

                <!-- error show -->
                <div  class="text-danger small text-center">
                    <?php if (isset($_GET["msg"])) echo $_GET["msg"] ?>
                </div>
                <!-- error show -->


                <!-- Sign in button -->
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" id="buttonLogin" name="buttonLogin" value="Login">Sign in</button>
                <!-- Sign in button -->


                <!-- Register -->
                <p>Don't have an account? |
                    <a href="View/SignUp.php">Register</a>
                </p>
                <!-- Register -->

                <!--forgot message -->
                <p>
                    <?php if (isset($_GET["msg"])) echo '<a href="View/ForgotPassword.php">Forgot Password</a>' ?>
                </p>
                <!------------------->

            </form>
            <!-- Form -->
        </div>
    </div>
    <!-- Material form login -->

</body>
</html>