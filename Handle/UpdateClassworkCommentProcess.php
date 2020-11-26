<?php 
    if(isset($_POST["encryptCode"]) && !empty($_POST["encryptCode"])
    && isset($_POST["CommentID"]) && !empty($_POST["CommentID"])
    && isset($_POST["Message"]) && !empty($_POST["Message"])
    && isset($_POST["ClassworkID"]) && !empty($_POST["ClassworkID"])) {
        require_once 'DataAccess.php';
        $encryptCode = urlencode($_POST["encryptCode"]);
        $CommentID = $_POST["CommentID"];
        $Message = $_POST["Message"];
        $ClassworkID = $_POST["ClassworkID"];
        $query = "UPDATE classworkcomment SET Message = ? WHERE CommentID = ? AND ClassworkID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("sii",$Message, $CommentID , $ClassworkID);
        $stmt->execute();
        $connection->close();
        header("Location: ../View/DetailClassworks?id=$encryptCode&ClassworkID=$ClassworkID");
    }
?>