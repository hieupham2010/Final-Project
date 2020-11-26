<?php 
    if(isset($_POST["encryptCode"]) && !empty($_POST["encryptCode"])
        && isset($_POST["UserName"]) && !empty($_POST["UserName"])) {
        require_once 'DataAccess.php';
        require 'EncryptClassCode.php';
        $encryptCode = urlencode($_POST["encryptCode"]);
        $UserName = decryptClassCode($_POST["UserName"]);
        $query = "DELETE FROM classmembers WHERE UserName = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $UserName);
        $stmt->execute();
        $connection->close();
        header("Location: ../View/Class?id=$encryptCode");
    }
?>