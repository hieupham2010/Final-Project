<?php
    session_start();
    
    if(!empty($_POST["txtClassName"]) && !empty($_POST["txtSubjectName"]) && !empty($_POST["txtRoom"])) {
        require 'DataAccess.php';
        require 'GenerateClassCode.php';
        $classCode = classCode();
        $className = $_POST["txtClassName"];
        $subjectName = $_POST["txtSubjectName"];
        $room = $_POST["txtRoom"];
        $UserName = $_POST["txtUserName"];
        $_SESSION["UserName"] = $UserName;
        $query = "SELECT * FROM accounts WHERE UserName = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s" , $UserName);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $AvatarSrc = $row["AvatarSrc"];
        $query = "INSERT INTO classrooms VALUES(?,?,?,?,?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("sssss" , $classCode , $className , $subjectName , $room , $AvatarSrc);
        $stmt->execute();
        $query = "INSERT INTO classmembers VALUES(?,?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ss" , $UserName , $classCode);
        $stmt->execute();
        $connection->close();
        header("Location: ../View/MainPage.php");
    }
?>