<?php 
    session_start();
    if(isset($_POST["txtComment"]) && !empty($_POST["txtComment"]) 
    && isset($_POST["encryptCode"]) && !empty($_POST["encryptCode"])) {
        require_once 'DataAccess.php';
        $Message = $_POST["txtComment"];
        $UserName = $_SESSION["username"];
        $encryptCode = $_POST["encryptCode"];
        $Hash = md5(rand(0,1000));
        if($_FILES["fileUpload"]["name"] != "") {
            $destination = "../View/DocumentUpload/";
            $fileUpload = $UserName . $Hash . $_FILES["fileUpload"]["name"];
            $destinationFile = $destination . basename($fileUpload);
            move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $destinationFile);
            $FileSrc = "DocumentUpload/" . $fileUpload;
            $query = "INSERT post(Message , FileSrc, UserName) VALUES(?,?,?)";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("sss", $Message ,$FileSrc , $UserName);
            $stmt->execute();
            header("Location: ../View/Class?id=$encryptCode");
        }else{
            $query = "INSERT post(Message , UserName) VALUES(?,?)";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("ss", $Message , $UserName);
            $stmt->execute();
            header("Location: ../View/Class?id=$encryptCode");
        }
    }
    
?>