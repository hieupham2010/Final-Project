<?php 
    session_start();
    if(isset($_POST["ClassID"]) && !empty($_POST["ClassID"])
        &&isset($_POST["PostID"]) && !empty($_POST["PostID"])) {
        $EncryptCode = urlencode($_POST["Encrypt"]);
        if(isset($_POST["txtComment"]) && !empty($_POST["txtComment"])) {
            require_once 'DataAccess.php';
            $UserName = $_SESSION["username"];
            $PostID = $_POST["PostID"];
            $Comment = $_POST["txtComment"];
            $query = "INSERT comments(Message , PostID , UserName) VALUES(?,?,?)";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("sis" , $Comment , $PostID, $UserName);
            $stmt->execute();
            $connection->close();
            header("Location: ../View/Class?id=$EncryptCode");
        }else{
            header("Location: ../View/Class?id=$EncryptCode&msg=ErrorEmptyComment");
        }
    }

?>