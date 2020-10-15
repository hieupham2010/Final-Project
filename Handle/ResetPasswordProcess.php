<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if(!empty($_POST["txtNewPassword"]) && !empty($_POST["txtConfirmPassword"])) {
            $newPassword = $_POST["txtNewPassword"];
            $confirmPassword = $_POST["txtConfirmPassword"];
            $Email = $_POST["Email"];
            if($newPassword != $confirmPassword) {
                $errorMessage = "New password and confirm password does not match please try again";
                header("Location: ../View/ResetPassword.php?msg=$errorMessage");
            }else{
                require_once 'DataAccess.php';
                $query = "UPDATE accounts SET Password = ? WHERE UserID = (SELECT UserID FROM users WHERE Email = ?)" ;
                $stmt = $connection->prepare($query); 
                $stmt->bind_param("ss" , $newPassword , $Email);
                $stmt->execute();
                $connection->close();
                header("Location: ../View/Redirect.php?msg=CompleteResetPassword");
            }
        }
    }
?>