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
</body>
</html>