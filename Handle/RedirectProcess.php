<?php
$content = "";
$button = "";
$link = "";
if (isset($_GET["msg"])) {
    if ($_GET["msg"] === "SignUp") {
        $content = "We have accepted your request please check your email to complete registration";
        $button = "Go to your email";
        $link = "https://mail.google.com/";
    } else if ($_GET["msg"] === "CompleteRegistration") {
        $content = "Sign up success";
        $button = "Go to login";
        $link = "http://localhost/Final-Project/index.php";
    } else if ($_GET["msg"] === "ForgotPassword") {
        $content = "We have accepted your request please check your email to confirm";
        $button = "Go to your email";
        $link = "https://mail.google.com/";
    } else if ($_GET["msg"] === "CompleteResetPassword") {
        $content = "Reset password was successful";
        $button = "Go to login";
        $link = "http://localhost/Final-Project/index.php";
    }
} else {
    exit;
}
?>