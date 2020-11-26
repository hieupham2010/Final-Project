<?php 
    session_start();
    if(isset($_POST["encryptCode"]) && !empty($_POST["encryptCode"])) {
        require 'EncryptClassCode.php';
        $encryptCode = urlencode($_POST["encryptCode"]);
        $ClassID = decryptClassCode($_POST["encryptCode"]);
        if(isset($_POST["txtPost"]) && !empty($_POST["txtPost"])) {
            require_once 'DataAccess.php';
            $Message = $_POST["txtPost"];
            $UserName = $_SESSION["username"];
            $Hash = md5(rand(0,1000));
            if(file_exists($_FILES["fileUpload"]["tmp_name"][0])) {
                $CountFile = count($_FILES["fileUpload"]["name"]);
                $query = "INSERT post(Message , UserName, ClassID) VALUES(?,?,?)";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("sss", $Message, $UserName, $ClassID);
                $stmt->execute();
                $lastInsert = $connection->insert_id;
                $destination = "../View/DocumentUpload/";
                for($i = 0; $i < $CountFile ; $i++) {
                    $fileUpload = $UserName . $Hash . $_FILES["fileUpload"]["name"][$i];
                    $destinationFile = $destination . basename($fileUpload);
                    move_uploaded_file($_FILES["fileUpload"]["tmp_name"][$i], $destinationFile);
                    $temp = pathinfo($_FILES["fileUpload"]["name"][$i] , PATHINFO_EXTENSION);
                    $FileName = basename($_FILES["fileUpload"]["name"][$i] , "." . $temp);
                    $FileSrc = "DocumentUpload/" . $fileUpload;
                    $query = "INSERT documents(PostID, FileSrc, FileName) VALUES(?,?,?)";
                    $stmt = $connection->prepare($query);
                    $stmt->bind_param("iss", $lastInsert, $FileSrc,$FileName);
                    $stmt->execute();
                }
                header("Location: ../View/Class?id=$encryptCode&msg=posted");
            }else{
                $query = "INSERT post(Message, UserName, ClassID) VALUES(?,?,?)";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("sss", $Message, $UserName, $ClassID);
                $stmt->execute();
               
                header("Location: ../View/Class?id=$encryptCode&msg=posted");
            }
            $connection->close();
        }else {
            header("Location: ../View/Class?id=$encryptCode&msg=ErrorEmptyPost");
        }
    }
?>