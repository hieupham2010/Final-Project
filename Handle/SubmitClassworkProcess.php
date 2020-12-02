<?php 
    session_start();
    if(isset($_POST["encryptCode"]) && !empty($_POST["encryptCode"])
    && isset($_POST["ClassworkID"]) && !empty($_POST["ClassworkID"])) {
        require 'EncryptClassCode.php';
        $encryptCode = urlencode($_POST["encryptCode"]);
        $ClassID = decryptClassCode($_POST["encryptCode"]);
        $ClassworkID = $_POST["ClassworkID"];
        require_once 'DataAccess.php';
        $UserName = $_SESSION["username"];
        $Hash = md5(rand(0,1000));
        if(file_exists($_FILES["fileUpload"]["tmp_name"][0])) {
            $CountFile = count($_FILES["fileUpload"]["name"]);
            $destination = "../View/AssignmentUpload/";
            for($i = 0; $i < $CountFile ; $i++) {
                $fileUpload = $UserName . $Hash . $_FILES["fileUpload"]["name"][$i];
                $destinationFile = $destination . basename($fileUpload);
                move_uploaded_file($_FILES["fileUpload"]["tmp_name"][$i], $destinationFile);
                $FileName = $_FILES["fileUpload"]["name"][$i];
                $AssignmentSrc = "AssignmentUpload/" . $fileUpload;
                $query = "INSERT assignment(AssignmentSrc ,FileName,UserName ,ClassworkID) VALUES(?,?,?,?)";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("sssi", $AssignmentSrc ,$FileName,$UserName , $ClassworkID);
                $stmt->execute();
            }
            header("Location: ../View/DetailClassworks?id=$encryptCode&ClassworkID=$ClassworkID");
        }else{
            header("Location: ../View/DetailClassworks?id=$encryptCode&ClassworkID=$ClassworkID&msg=ErrorSubmit");
        }
        $connection->close();
    }
?>