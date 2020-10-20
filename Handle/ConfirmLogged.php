<?php
    session_start();

    if (!isset($_SESSION["logged"]) && $_SESSION["logged"] !== true) {
        header("Location: ../index.php");
        exit;
    } else {
        if (isset($_SESSION["timeLoginExpire"]) && time() - $_SESSION["timeLoginExpire"] > 600) {
            require_once '../Handle/LogoutProcess.php';
        } else {
            require_once 'DataAccess.php';
            $_SESSION["timeLoginExpire"] = time();
            $UserName = $_SESSION["username"];
            $query = "SELECT FullName FROM users WHERE UserID = (SELECT UserID FROM accounts WHERE UserName = ?)";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("s" , $UserName);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $FullName = $row["FullName"];
            $query = "SELECT * FROM avatars WHERE AvatarID = (SELECT AvatarID FROM accounts WHERE UserName = ?)";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("s" , $UserName);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $avatar = $row["ImageSrc"];
            $connection->close();
        }
    }
?>