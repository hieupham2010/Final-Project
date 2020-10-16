<?php
    session_start();
    if(!empty($_POST["txtUserName"]) && !empty($_POST["txtPassword"])) {
        require_once 'DataAccess.php';
        $UserName = $_POST["txtUserName"];
        $UserPassword = $_POST["txtPassword"];
        $query = "SELECT * FROM accounts WHERE UserName = ? AND Password = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ss" , $UserName , $UserPassword);
        $stmt->execute();
        $result = $stmt->get_result();
        $errorMessage = "";
        if($result->num_rows > 0) {
            $_SESSION["logged"] = true;
            $_SESSION["username"] = $UserName;
            $_SESSION["timeLoginExpire"] = time();
            if(!empty($_POST["remember"])) {
                if(!isset($_COOKIE["UserName"]) || $_COOKIE["UserName"] !== $UserName) {
                    setcookie("UserName" , $UserName , time() + (86400 * 30) , "/" , false);
                    setcookie("Password" , $UserPassword , time() + (86400 * 30) , "/" , false);
                }
            }else if(empty($_POST["remember"])){
                setcookie("UserName" , "" ,time() - (86400 * 30) , "/" , false);
                setcookie("Password" , "" ,time() - (86400 * 30), "/" , false);
            }
            header("Location: ../View/MainPage.php");
        }else {
            $errorMessage = "Invalid user name or password please try again";
            header("Location: ../index.php?msg=$errorMessage");
        }
        $connection->close();
    }
?>
