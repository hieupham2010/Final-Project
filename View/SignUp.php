<?php
include '../DialogMessage.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>Sign Up</title>
</head>

<body>
    <div class="Sign-up-card rounded-lg border-info h-auto ">
        <!--Card content-->
        <div class="card-body ">
            <!--logo-->
            <div class=" d-flex justify-content-center">
                <img src="images/LogoTDT/LogoTDT.png" alt="Logo" width="120" height="120">
            </div>

            <!-- Form -->
            <form class="text-center pb-3  mb-" action="../Handle/SignUpProcess" method="POST">

                <div class="md-form">
                    <input type="text" name="txtFullName" id="txtFullName" placeholder="Full Name" required class="form-control mt-3">
                </div>
                <!-- Birth Day -->
                <div class="md-form">
                    <input type="date" name="txtDateOfBirth" id="txtDateOfBirth" value="Birth Day" required class="form-control mt-3">
                </div>
                <!-- Email -->
                <div class="md-form">
                    <input type="email" name="txtEmail" id="txtEmail" placeholder="Email" required class="form-control mt-3">
                </div>
                <div class="text-danger small text-center">
                    <span id="errorMessage"><?php if (isset($_GET["msg1"])) echo $_GET["msg1"]; ?>
                </div>
                <!-- Phone number -->
                <div class="md-form">
                    <input type="tel" name="txtPhoneNumber" id="txtPhoneNumber" placeholder="Phone Number" pattern="[0-9]{10}" required class="form-control mt-3">
                </div>
                <!-- User Name-->
                <div class="md-form">
                    <input type="text" name="txtUserName" id="txtUserName" placeholder="User Name" required class="form-control mt-3">
                </div>
                <div class="text-danger small text-left">
                    <span id="errorMessage"><?php if (isset($_GET["msg2"])) echo $_GET["msg2"]; ?>
                </div>
                <!-- Pass Word -->
                <div class="md-form mt-3">
                    <input type="password" name="txtPassword" id="txtPassword" placeholder="Password" required class="form-control mt-3">
                </div>
                <!-- error show -->
                <div class="text-danger small text-left">
                    <span id="errorMessage"><?php if (isset($_GET["msg3"])) echo $_GET["msg3"]; ?>
                </div>
                <div class="md-form mt-3">
                    <input type="password" name="txtConfirmPassword" id="txtConfirmPassword" placeholder="Confirm Password" required class="form-control mt-3">
                </div>
                <div class="text-danger small text-left">
                    <span id="errorMessage"><?php if (isset($_GET["msg4"])) echo $_GET["msg4"]; ?>
                </div>
                <!-- Sign in button -->
                <button class="btn btn-outline-info btn-rounded btn-block my-4 mb-3 waves-effect z-depth-0" type="submit" id="buttonSignUp" name="buttonSignUp" value="Sign Up">Sign up</button>
            </form>
            <!-- Form -->
        </div>
    </div>

</body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    
    <script src="javascript/main.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</html>
<?php
if (isset($_GET["msg"])) {
    echo "<script>$('#Message').modal({show: true})</script>";
}
?>  