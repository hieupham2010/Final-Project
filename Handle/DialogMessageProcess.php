<?php
$title = "";
$content = "";
if (isset($_GET["msg"]) && !empty($_GET["msg"])) {
    if ($_GET["msg"] === "SignUp") {
        $title = "Sign Up";
        $content = "We have accepted your request please check your email to complete registration";
    } else if ($_GET["msg"] === "CompleteRegistration") {
        $title = "Sign Up";
        $content = "Sign up success";
    } else if ($_GET["msg"] === "ForgotPassword") {
        $title = "Forgot Password";
        $content = "We have accepted your request please check your email to confirm";
    } else if ($_GET["msg"] === "CompleteResetPassword") {
        $title = "Forgot Password";
        $content = "Reset password was successful";
    }else if($_GET["msg"] === "ErrorJoinClass") {
        $title = "Class not found";
        $content = "Your class code doesn't exists";
    }else if($_GET["msg"] === "SignUpTimeOut") {
        $title = "Sign Up";
        $content = "The confirmation time has expired please sign up again";
    }else if($_GET["msg"] === "ForgotPasswordTimeOut") {
        $title = "Forgot Password";
        $content = "The confirmation time has expired please confirm again";
    }else if($_GET["msg"] === "InvalidImage") {
        $title = "Update failed";
        $content = "Only JPG, JPEG, PNG & GIF files are allowed";
    }else if($_GET["msg"] === "UpdateSuccess") {
        $title = "Update success";
        $content = "Your account has been updated";
    }
}
?>