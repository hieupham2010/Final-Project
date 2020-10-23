<?php
    session_start();
    if(isset($_GET["email"]) && !empty($_GET["email"]) && isset($_GET["hash"]) && !empty($_GET["hash"])) {
        require_once 'DataAccess.php';
        $Email = $_GET["email"];
        $Hash = $_GET["hash"];
        $query = "SELECT * FROM verifypassword WHERE Email = ? AND Hash = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ss" , $Email , $Hash);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if(time() - $row["Time"] > 600) {
            $query = "DELETE FROM verifypassword WHERE Email = ? AND Hash = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("ss" , $Email , $Hash);
            $stmt->execute();
            header("Location: ../View/ForgotPassword.php?msg=ForgotPasswordTimeOut");
        }else{
            $query = "SELECT * FROM users WHERE Email = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("s" , $Email);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $_SESSION["FullName"] = $row["FullName"];
            $_SESSION["Hash"] = $Hash;
            $_SESSION["Email"] = $Email;
            header("Location: ../View/ResetPassword.php");
        }
        $connection->close();
    }
?>