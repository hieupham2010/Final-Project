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
    <link rel="stylesheet" href="View/style/style.css">
    <script src="javascript/main.js"></script>
    <title>Login</title>
</head>

<body>
    <div class="header">
        <h1>Classroom</h1>
    </div>
    <div class="login_form">
        <h2>Login</h2>
        <form action="Handle/LoginProcess.php" method="POST">
            <table>
                <tr>
                    <td>
                        <input type="text" name="txtUserName" id="txtUserName" placeholder="User Name" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="txtPassword" id="txtPassword" placeholder="Password" required>
                    </td>
                </tr>
                <tr>
                    <td><span id="errorMessage"><?php if(isset($_GET["msg"])) echo $_GET["msg"]; ?></span></td>
                </tr>
                <tr>
                    <td><input type="submit" id="buttonLogin" name="buttonLogin" value="Login"></td>
                </tr>
                <tr>
                    <td>
                        <a href="View/ForgotPassword.php">Forgot Password</a> | <a href="View/SignUp.php">Sign Up</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>

</html>