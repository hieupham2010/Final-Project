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
    <title>Document</title>
</head>
<body>
    <div class="header">
        <h1>Classroom</h1>
    </div>
    <div class="forgot_password">
        <h2>Forgot Password</h2>
        <form action="../Handle/ForgotPasswordProcess.php" method="POST">
            <table>
                <tr>
                    <td>
                        <p id="title_forgot">Enter the email you used to sign up</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="email" name="txtEmail" id="txtEmail" placeholder="Email" required>
                    </td>
                </tr>
                <tr>
                    <td><span id="errorMessage"><?php if(isset($_GET["msg"])) echo $_GET["msg"]; ?></span></td>
                </tr>
                <tr>
                    <td><input type="submit" id="buttonForgotPassword" name="buttonForgotPassword" value="Verification"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
