<?php
    session_start();
    if(!empty($_POST["JoinClassID"])) {
        require_once 'DataAccess.php';
        $ClassID = $_POST["JoinClassID"];
        $query = "SELECT * FROM classrooms WHERE ClassID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s" , $ClassID);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            $UserName = $_SESSION["username"];
            $query = "SELECT * FROM classmembers WHERE UserName = ? AND ClassID = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("ss", $UserName , $ClassID);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows > 0) {
                header("Location: ../View/MainPage?msg=ErrorJoinClassExists");
            }else {
                $query = "INSERT INTO classmembers VALUES(?,?)";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("ss", $UserName , $ClassID);
                $stmt->execute();
                header("Location: ../View/MainPage");
            }
            
        }else {
            header("Location: ../View/MainPage?msg=ErrorJoinClass");
        }
        $connection->close();
    }
?>