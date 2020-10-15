<?php
    session_start();
    if(isset($_SESSION["timeSignUpExpire"]) && time() - $_SESSION["timeSignUpExpire"] > 600 
    || !isset($_SESSION["timeSignUpExpire"])) {
        session_destroy();
        $message = "Time out please re-register";
        header("Location: ../View/SignUp.php?msgTimeUp=$message");
        exit;
    }else{
        $_SESSION["verifiedEmailForSignUp"] = true;
        header("Location: SignUpComplete.php");
        exit;
    }
?>