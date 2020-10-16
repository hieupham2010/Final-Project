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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/vi/1/1b/T%C4%90T_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="forgot_password">
        
        
        <div class="card p-3">
        <!--Card content-->
            <div class="card-body px-lg-5 pt-0 mt-5">
            <div><h2>Forgot Password</h2></div>
                <form class="text-center" form action="../Handle/ForgotPasswordProcess.php" method="POST">
                <!-- Email -->
                    <div class="md-form">
                        <span>Email</span> <input type="email" name="txtEmail" id="txtEmail" placeholder="Email" required class="form-control">
                    </div>
                    <div style="color: red;font-size: 14px;display: block;text-align: left;">
                        <span id="errorMessage"><?php if(isset($_GET["msg"])) echo $_GET["msg"]; ?></span></td>     
                    </div>
                    <div>
                        <input  class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" id="buttonForgotPassword" name="buttonForgotPassword" value="Verification">
                    </div>
                    
                    
                    <div class="d-flex justify-content-around">
                </form> 
            </div>
        </div> 
    </div>
</body>
</html>
