<?php
    session_start();
    if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true) {
        header("Location: View/MainPage.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/vi/1/1b/T%C4%90T_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css"/>
    <script src="javascript/main.js"></script>
    <title>Login</title>
</head>
<style>

.card{
  margin:auto;
  margin-top: 15rem;
  width: 400px;
  height: 400px;
  display: flex;
  flex: wrap;
  box-shadow: 5px 10px  rgb(109, 179, 219); 
  border: 2px solid rgb(109, 179, 219);
}
</style>
<body>
    <!-- Material form login -->
    <div class="card p-3">
        <!--Card content-->
        <div class="card-body px-lg-5 pt-0 mt-5">

            <!-- Form -->
            <form class="text-center" action="Handle/LoginProcess.php" method="POST">
                <!-- Email -->
                    <div class="md-form">
                        <input type="text"  name="txtUserName" id="txtUserName" placeholder="User Name" required class="form-control">
                    </div>
                    <!-- Password -->
                    <div class="md-form">
                       <input type="password" name="txtPassword" id="txtPassword" placeholder="Password" required class="form-control">
                    </div>
                    <div class="d-flex justify-content-around">
                        <div>
                            <!-- Remember me -->
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="materialLoginFormRemember">
                                <label class="form-check-label" for="materialLoginFormRemember">Remember me</label>
                            </div>
                        </div>
                    </div>
                    <div style="color:red;font-size:14px;display: block;text-align: left;">
                        <?php if(isset($_GET["msg"])) echo $_GET["msg"] ?>
                    </div>
                    <!-- Sign in button -->
                    <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" id="buttonLogin" name="buttonLogin" value="Login">Sign in</button>

                    <!-- Register -->
                    <p>Not a member? <a href="View/SignUp.php">Register</a></p>
                    <div>
                        <?php if(isset($_GET["msg"])) echo '<a href="View/ForgotPassword.php">Forgot Password</a>' ?>
                    </div>
            </form>
                <!-- Form -->
        </div>

    </div>
    
                <!-- Material form login -->
</body>

</html>