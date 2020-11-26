<?php
    session_start();
    if(isset($_POST["encryptCode"]) && !empty($_POST["encryptCode"])
        && isset($_POST["ClassworkID"]) && !empty($_POST["ClassworkID"])) {
        require_once 'DataAccess.php';
        $encryptCode = urlencode($_POST["encryptCode"]);
        $ClassworkID = $_POST["ClassworkID"];
        $UserName = $_SESSION["username"];
        $query = "SELECT * FROM assignment WHERE ClassworkID = ? AND UserName = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("is", $ClassworkID, $UserName);
        $stmt->execute();
        $result = $stmt->get_result();
        while($row = $result->fetch_assoc()) {
            unlink("../View/" . $row["AssignmentSrc"]);
        }
        $query = "DELETE FROM assignment WHERE ClassworkID = ? AND UserName = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("is", $ClassworkID, $UserName);
        $stmt->execute();
        $connection->close();
        header("Location: ../View/DetailClassworks?id=$encryptCode&ClassworkID=$ClassworkID");
    }
?>