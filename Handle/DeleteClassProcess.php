<?php 
    if(isset($_POST["ClassID"]) && !empty($_POST["ClassID"])) {
        require_once 'DataAccess.php';
        $ClassID = $_POST["ClassID"];
        $query = "DELETE FROM classmembers WHERE ClassID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $ClassID);
        $stmt->execute();
        $query = "DELETE FROM classrooms WHERE ClassID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $ClassID);
        $stmt->execute();
        $connection->close();
        header("Location: ../View/MainPage.php");
    }
?>