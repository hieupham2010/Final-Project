<?php 
    if(isset($_POST["DelClassID"]) && !empty($_POST["DelClassID"])) {
        require_once 'DataAccess.php';
        $ClassID = $_POST["DelClassID"];
        $query = "DELETE FROM comments WHERE PostID IN (SELECT PostID FROM post WHERE ClassID = ?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $ClassID);
        $stmt->execute();
        $query = "DELETE FROM documents WHERE PostID IN (SELECT PostID FROM post WHERE ClassID = ?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $ClassID);
        $stmt->execute();
        $query = "DELETE FROM assignment WHERE ClassworkID IN (SELECT ClassworkID FROM classwork WHERE ClassID = ?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $ClassID);
        $stmt->execute();
        $query = "DELETE FROM classworkcomment WHERE ClassworkID IN (SELECT ClassworkID FROM classwork WHERE ClassID = ?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $ClassID);
        $stmt->execute();
        $query = "DELETE FROM material WHERE ClassworkID IN (SELECT ClassworkID FROM classwork WHERE ClassID = ?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $ClassID);
        $stmt->execute();
        $query = "DELETE FROM classwork WHERE ClassID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $ClassID);
        $stmt->execute();
        $query = "DELETE FROM post WHERE ClassID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $ClassID);
        $stmt->execute();
        $query = "DELETE FROM classmembers WHERE ClassID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $ClassID);
        $stmt->execute();
        $query = "DELETE FROM classrooms WHERE ClassID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $ClassID);
        $stmt->execute();
        $connection->close();
        header("Location: ../View/MainPage");
    }
?>