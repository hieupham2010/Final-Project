<?php
    session_start();
    if(!empty($_POST["ClassID"])) {
        require_once 'DataAccess.php';
        $ClassID = $_POST["ClassID"];
        $UserName = $_SESSION["username"];
        $query = "INSERT INTO classmembers VALUES(?,?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ss", $UserName , $ClassID);
        $stmt->execute();
        $connection->close();
        header("Location: ../View/MainPage.php");
    }
?>