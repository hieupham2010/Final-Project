<?php
session_start();
$UserName = $_SESSION["username"];
if (!isset($_SESSION["logged"]) && $_SESSION["logged"] !== true) {
    header("Location: ../index.php");
    exit;
} else {
    if (isset($_SESSION["timeLoginExpire"]) && time() - $_SESSION["timeLoginExpire"] > 600) {
        require_once '../Handle/LogoutProcess.php';
    } else {
        $_SESSION["timeLoginExpire"] = time();
    }
}
?>