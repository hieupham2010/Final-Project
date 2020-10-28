<?php 
    session_start();
    if(isset($_POST["encryptCode"]) && !empty($_POST["encryptCode"])) {
        require 'EncryptClassCode.php';
        $encryptCode = urlencode($_POST["encryptCode"]);
        $ClassID = decryptClassCode($_POST["encryptCode"]);
        if(isset($_POST["txtComment"]) && !empty($_POST["txtComment"])) {
            require_once 'DataAccess.php';
            $Message = $_POST["txtComment"];
            $UserName = $_SESSION["username"];
            $Hash = md5(rand(0,1000));
            if($_FILES["fileUpload"]["name"] != "") {
                $destination = "../View/DocumentUpload/";
                $fileUpload = $UserName . $Hash . $_FILES["fileUpload"]["name"];
                $destinationFile = $destination . basename($fileUpload);
                move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $destinationFile);
                $FileSrc = "DocumentUpload/" . $fileUpload;
                $query = "INSERT post(Message , FileSrc , UserName, ClassID) VALUES(?,?,?,?)";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("ssss", $Message ,$FileSrc, $UserName, $ClassID);
                $stmt->execute();
                header("Location: ../View/Class?id=$encryptCode&state=posted");
            }else{
                $query = "INSERT post(Message, UserName, ClassID) VALUES(?,?,?)";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("sss", $Message, $UserName, $ClassID);
                $stmt->execute();
                header("Location: ../View/Class?id=$encryptCode&state=posted");
            }
        }else {
            header("Location: ../View/Class?id=$encryptCode&msg=ErrorEmptyPost");
        }
    }
?>