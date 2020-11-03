<?php 
    session_start();
    if(isset($_POST["encryptCode"]) && !empty($_POST["encryptCode"])
        &&isset($_POST["ClassworkID"]) && !empty($_POST["ClassworkID"])) {
        $EncryptCode = urlencode($_POST["encryptCode"]);
        $ClassworkID = $_POST["ClassworkID"];
        if(isset($_POST["txtComment"]) && !empty($_POST["txtComment"])) {
            require_once 'DataAccess.php';
            $UserName = $_SESSION["username"];
            $Comment = $_POST["txtComment"];
            $query = "INSERT classworkcomment(Message , ClassworkID , UserName) VALUES(?,?,?)";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("sis" , $Comment , $ClassworkID, $UserName);
            $stmt->execute();
            $connection->close();
            header("Location: ../View/DetailClassworks?id=$EncryptCode&ClassworkID=$ClassworkID");
        }else{
            header("Location: ../View/DetailClassworks?id=$EncryptCode&ClassworkID=$ClassworkID&msg=ErrorEmptyComment");
        }
    }
?>