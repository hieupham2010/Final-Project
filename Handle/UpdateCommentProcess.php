<?php 
    if(isset($_POST["encryptCode"]) && !empty($_POST["encryptCode"])
    && isset($_POST["CommentID"]) && !empty($_POST["CommentID"])
    && isset($_POST["Message"]) && !empty($_POST["Message"])) {
        require_once 'DataAccess.php';
        require 'EncryptClassCode.php';
        $encryptCode = urlencode($_POST["encryptCode"]);
        $CommentID = $_POST["CommentID"];
        $Message = $_POST["Message"];
        $query = "UPDATE comments SET Message = ? WHERE CommentID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("si",$Message, $CommentID);
        $stmt->execute();
        $connection->close();
        header("Location: ../View/Class?id=$encryptCode");
    }
?>