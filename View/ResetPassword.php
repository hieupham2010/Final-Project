<?php
    session_start();
    if(!isset($_SESSION["verifiedEmailForPassword"]) && $_SESSION["verifiedEmailForPassword"] !== true) {
        header("Location: ForgotPassword.php");
        exit;
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
    
    <div class="reset_password">
        <h2>Reset Password</h2>
        <form action="../Handle/ResetPasswordProcess.php" method="POST">
            <table>
                <tr>
                    <td>
                        <p>Hello <?php if(isset($_SESSION["FullName"])) echo $_SESSION["FullName"];?> </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="Email" value="<?php if(isset($_SESSION["Email"])) echo $_SESSION["Email"]?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="txtNewPassword" id="txtNewPassword" placeholder="New Password" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="txtConfirmPassword" id="txtConfirmPassword" placeholder="Confirm Password" required>
                    </td>
                </tr>
                <tr>
                    <td><span id="errorMessage"><?php if(isset($_GET["msg"])) echo $_GET["msg"]; ?></span></td>
                </tr>
                <tr>
                    <td><input type="submit" id="ButtonResetPassword" name="ButtonResetPassword" value="Update"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>