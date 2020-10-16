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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <script src="javascript/main.js"></script>
    <title>Sign Up</title>
</head>
<style>
    .md-form{
        margin:5px;
    }
</style>

<body>
    <div class="Sign-up-card rounded-lg  p-auto">
        <!--Card content-->
        <div class="card-body px-lg-5 pt-0 mt-3 mb-5">
            <!--logo-->
            <div class="mb-5  d-flex justify-content-center">
                <img src="https://upload.wikimedia.org/wikipedia/vi/thumb/1/1b/T%C4%90T_logo.png/200px-T%C4%90T_logo.png" alt="Logo" width="120" height="80">
            </div>


            <!-- Form -->
            <form class="text-center" action="../Handle/SignUpProcess.php" method="POST">

                <div class="md-form">
                    <input type="text" name="txtFullName" id="txtUserName" placeholder="Full Name" required class="form-control mt-3">
                </div>
                <!-- Birth Day -->
                <div class="md-form" >
                    <input type="date" name="txtDateOfBirth" id="txtDateOfBirth" value="Birth Day" required class="form-control mt-3">
                </div>

                <!-- Email -->
                <div  class="md-form">
                    <input type="email" name="txtEmail" id="txtEmail" placeholder="Email" required class="form-control mt-3">
                </div>

                <!-- Phone number -->
                <div class="md-form">
                    <input type="tel" name="txtPhoneNumber" id="txtPhoneNumber" placeholder="Phone Number" pattern="[0-9]{10}" required class="form-control mt-3">
                </div>
                <!-- User Name-->
                <div class="md-form">
                    <input type="text" name="txtUserName" id="txtUserName" placeholder="User Name" required class="form-control mt-3">
                </div>

                <!-- Pass Word -->
                <div class="md-form mt-3">
                    <input type="password" name="txtPassword" id="txtPassword" placeholder="Password" required class="form-control mt-3">
                </div>
                <!-- error show -->
                <div class="text-danger small text-center">
                    <span id="errorMessage"><?php if (isset($_GET["msg2"])) echo $_GET["msg2"]; ?>
                </div>
                <!-- error show -->

                <!-- Sign in button -->
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" id="buttonSignUp" name="buttonSignUp" value="Sign Up">Sign up</button>



            </form>
            <!-- Form -->
        </div>
    </div>

</body>

</html>