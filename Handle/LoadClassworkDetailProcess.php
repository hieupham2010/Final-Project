<?php
    if(isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["ClassworkID"]) && !empty($_GET["ClassworkID"])) {
        require 'DataAccess.php';
        require 'EncryptClassCode.php';
        $encryptCode = $_GET["id"];
        $ClassID = decryptClassCode($_GET["id"]);
        $ClassworkID = $_GET["ClassworkID"];
        $query = "SELECT * FROM classwork WHERE ClassID = ? AND ClassworkID = ? ";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("si", $ClassID , $ClassworkID);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $Title = $row["Title"];
        $Description = $row["Description"];
        $Time = $row["Time"];
        $DeadLine = $row["Deadline"];
        $connection->close();
    }else{
        header("Location: ../index");
        exit;
    }
?>
