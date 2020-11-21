<?php 
    if(isset($_POST["DelClassID"]) && !empty($_POST["DelClassID"])) {
        require_once 'DataAccess.php';
        $ClassID = $_POST["DelClassID"];
        $query = "DELETE FROM comments WHERE PostID IN (SELECT PostID FROM post WHERE ClassID = ?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $ClassID);
        $stmt->execute();
        $query = "SELECT * FROM documents WHERE PostID IN (SELECT PostID FROM post WHERE ClassID = ?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $ClassID);
        $stmt->execute();
        $result = $stmt->get_result();
        while($row = $result->fetch_assoc()) {
            unlink("../View/" . $row["FileSrc"]);
        }
        
        $query = "DELETE FROM documents WHERE PostID IN (SELECT PostID FROM post WHERE ClassID = ?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $ClassID);
        $stmt->execute();

        $query = "SELECT * FROM assignment WHERE ClassworkID IN (SELECT ClassworkID FROM classwork WHERE ClassID = ?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $ClassID);
        $stmt->execute();
        $result = $stmt->get_result();
        while($row = $result->fetch_assoc()){
            unlink("../View/" . $row["AssignmentSrc"]);
        }
        $query = "DELETE FROM assignment WHERE ClassworkID IN (SELECT ClassworkID FROM classwork WHERE ClassID = ?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $ClassID);
        $stmt->execute();

        $query = "DELETE FROM classworkcomment WHERE ClassworkID IN (SELECT ClassworkID FROM classwork WHERE ClassID = ?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $ClassID);
        $stmt->execute();

        $query = "SELECT * FROM material WHERE ClassworkID IN (SELECT ClassworkID FROM classwork WHERE ClassID = ?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $ClassID);
        $stmt->execute();
        $result = $stmt->get_result();
        while($row = $result->fetch_assoc()) {
            unlink("../View/" . $row["MaterialSrc"]);
        }
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