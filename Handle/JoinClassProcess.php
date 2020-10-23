<?php
    session_start();
    if(!empty($_POST["ClassID"])) {
        require_once 'DataAccess.php';
        $ClassID = $_POST["ClassID"];
        $query = "SELECT * FROM classrooms WHERE ClassID = ?";
        $stmt = $connection->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            $UserName = $_SESSION["username"];
            $query = "INSERT INTO classmembers VALUES(?,?)";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("ss", $UserName , $ClassID);
            $stmt->execute();
            $connection->close();
            header("Location: ../View/MainPage.php");
        }else {
            $errorMessage = "Class Code doesn't exists";
            header("Location: ../View/MainPage.php?msg=$errorMessage");
        }
    }
?>