<?php 
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!empty($_POST["txtNewPassword"]) && !empty($_POST["txtConfirmPassword"])) {
            $newPassword = $_POST["txtNewPassword"];
            $confirmPassword = $_POST["txtConfirmPassword"];
            $Email = $_SESSION["Email"];
            $Hash = $_SESSION["Hash"];
            if(strlen($newPassword) < 8) {
                $errorMessage = "Your password isn't less than 8 characters";
                header("Location: ../View/ResetPassword?msg2=$errorMessage");
            }else if($newPassword != $confirmPassword) {
                $errorMessage = "New password and confirm password doesn't match";
                header("Location: ../View/ResetPassword?msg1=$errorMessage");
            }else{
                require_once 'DataAccess.php';
                $Password = password_hash($newPassword , PASSWORD_DEFAULT);
                $query = "UPDATE accounts SET Password = ? WHERE UserID = (SELECT UserID FROM users WHERE Email = ?)" ;
                $stmt = $connection->prepare($query); 
                $stmt->bind_param("ss" , $Password , $Email);
                $stmt->execute();
                $query = "DELETE FROM verifypassword WHERE Email = ? AND Hash = ?";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("ss" , $Email , $Hash);
                $stmt->execute();
                $connection->close();
                session_destroy();
                header("Location: ../index?msg=CompleteResetPassword");
            }
        }
    }
?>