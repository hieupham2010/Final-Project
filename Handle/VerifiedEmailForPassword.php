<?php
    session_start();
    if(isset($_SESSION["timeResetPassExpire"]) && time() - $_SESSION["timeResetPassExpire"] > 600) {
        session_destroy();
        $message = "Time out please confirm again";
        header("Location: ../View/ForgotPassword.php?msgTimeUp=$message");
        exit;
    }else{
        $_SESSION["verifiedEmailForPassword"] = true;
        header("Location: ../View/ResetPassword.php");
    }
?>