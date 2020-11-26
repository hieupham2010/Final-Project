<?php 
    if(isset($_POST["encryptCode"]) && !empty($_POST["encryptCode"])
        && isset($_POST["PostID"]) && !empty($_POST["PostID"])) {
        require_once 'DataAccess.php';
        require 'EncryptClassCode.php';
        $encryptCode = urlencode($_POST["encryptCode"]);
        $PostID = $_POST["PostID"];
        $query = "SELECT * FROM documents WHERE PostID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i", $PostID);
        $stmt->execute();
        $result = $stmt->get_result();
        while($row = $result->fetch_assoc()) {
            unlink("../View/" . $row["FileSrc"]);
        }
        $query = "DELETE FROM documents WHERE PostID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i", $PostID);
        $stmt->execute();
        $query = "DELETE FROM comments WHERE PostID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i", $PostID);
        $stmt->execute();
        $query = "DELETE FROM post WHERE PostID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i", $PostID);
        $stmt->execute();
        $connection->close();
        header("Location: ../View/Class?id=$encryptCode");
    }
?>