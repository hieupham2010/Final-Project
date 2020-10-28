<?php
    if(isset($_GET["id"]) && !empty($_GET["id"])) {
        require_once 'DataAccess.php';
        require 'EncryptClassCode.php';
        $encryptCode = $_GET["id"];
        $ClassID = decryptClassCode($encryptCode) ;
        $query = "SELECT * FROM classrooms WHERE ClassID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s" , $ClassID);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $ClassName = $row["ClassName"];
        $SubjectName = $row["SubjectName"];
        $Room = $row["Room"];
    }else {
        header("Location: MainPage");
        exit;
    }
?>