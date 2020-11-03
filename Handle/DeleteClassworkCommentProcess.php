<?php 
    if(isset($_POST["encryptCode"]) && !empty($_POST["encryptCode"])
    && isset($_POST["CommentID"]) && !empty($_POST["CommentID"]) 
    && isset($_POST["ClassworkID"]) && !empty($_POST["ClassworkID"])) {
        require_once 'DataAccess.php';
        $encryptCode = urlencode($_POST["encryptCode"]);
        $CommentID = $_POST["CommentID"];
        $ClassworkID = $_POST["ClassworkID"];
        $query = "DELETE FROM classworkcomment WHERE CommentID = ? AND ClassworkID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ii", $CommentID, $ClassworkID);
        $stmt->execute();
        $connection->close();
        header("Location: ../View/DetailClassworks?id=$encryptCode&ClassworkID=$ClassworkID&msg=DeleteCommentSuccess");
    }
?>