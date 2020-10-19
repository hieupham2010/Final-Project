<?php
    session_start();
    if(!empty($_POST["txtClassName"]) && !empty($_POST["txtSubjectName"]) && !empty($_POST["txtRoom"])) {
        require 'DataAccess.php';
        require 'GenerateClassCode.php';
        $classCode = classCode();
        $className = $_POST["txtClassName"];
        $subjectName = $_POST["txtSubjectName"];
        $room = $_POST["txtRoom"];
        $userName = $_SESSION["UserName"];
        $query = "SELECT * FROM accounts WHERE UserName = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s" , $userName);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $AvatarID = $row["AvatarID"];
        $query = "INSERT INTO classrooms VALUES(?,?,?,?,?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ssssi" , $classCode , $className , $subjectName , $room , $AvatarID);
        $stmt->execute();
        $connection->close();
        header("Location: ../View/MainPage.php");
    }
?>