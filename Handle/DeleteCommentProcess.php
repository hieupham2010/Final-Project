<?php 
    if(isset($_POST["encryptCode"]) && !empty($_POST["encryptCode"])
    && isset($_POST["CommentID"]) && !empty($_POST["CommentID"])) {
        require_once 'DataAccess.php';
        require 'EncryptClassCode.php';
        $encryptCode = urlencode($_POST["encryptCode"]);
        $CommentID = $_POST["CommentID"];
        $query = "DELETE FROM comments WHERE CommentID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i", $CommentID);
        $stmt->execute();
        $connection->close();
        header("Location: ../View/Class?id=$encryptCode");
    }
?>