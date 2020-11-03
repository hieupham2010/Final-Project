<?php 
    if(isset($_POST["encryptCode"]) && !empty($_POST["encryptCode"])
        && isset($_POST["ClassworkID"]) && !empty($_POST["ClassworkID"])) {
        require_once 'DataAccess.php';
        $encryptCode = urlencode($_POST["encryptCode"]);
        $ClassworkID = $_POST["ClassworkID"];
        $query = "DELETE FROM material WHERE ClassworkID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i", $ClassworkID);
        $stmt->execute();
        $query = "DELETE FROM classworkcomment WHERE ClassworkID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i", $ClassworkID);
        $stmt->execute();
        $query = "DELETE FROM assignment WHERE ClassworkID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i", $ClassworkID);
        $stmt->execute();
        $query = "DELETE FROM classwork WHERE ClassworkID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i", $ClassworkID);
        $stmt->execute();
        $connection->close();
        header("Location: ../View/Class?id=$encryptCode&msg=DeleteMaterialSuccess");
    }
?>