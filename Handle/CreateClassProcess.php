<?php
    session_start();
    if(!empty($_POST["txtClassNameAdd"]) && !empty($_POST["txtSubjectNameAdd"]) && !empty($_POST["txtRoomAdd"])) {
        require 'DataAccess.php';
        require 'GenerateClassCode.php';
        $classCode = classCode();
        $className = $_POST["txtClassNameAdd"];
        $subjectName = $_POST["txtSubjectNameAdd"];
        $room = $_POST["txtRoomAdd"];
        $UserName = $_SESSION["username"];
        $query = "SELECT * FROM accounts WHERE UserName = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s" , $UserName);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $AvatarSrc = $row["AvatarSrc"];
        $Hash = md5(rand(0,1000));
        if($_FILES["imageUpload"]["name"] != "") {
            $destination = "../View/images/avatarsClass/";
            $imageUpload = $UserName . $Hash . $_FILES["imageUpload"]["name"];
            $destinationFile = $destination . basename($imageUpload);
            $imageFileType = strtolower(pathinfo($destinationFile,PATHINFO_EXTENSION));
            if($imageFileType != "jpg" && $imageFileType != "png" 
            && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                header("Location: ../View/MainPage?msg=InvalidImage");
            }else {
                move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $destinationFile);
                $ImageSrc = "images/avatarsClass/" . $imageUpload;
                $query = "INSERT INTO classrooms VALUES(?,?,?,?,?,?)";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("ssssss" , $classCode , $className , $subjectName , $room , $AvatarSrc, $ImageSrc);
                $stmt->execute();
                $query = "INSERT INTO classmembers VALUES(?,?,?)";
                $stmt = $connection->prepare($query);
                $Founder = 1;
                $stmt->bind_param("ssi" , $UserName , $classCode , $Founder);
                $stmt->execute();
                header("Location: ../View/MainPage");
            }
        }else {
            $ImageSrc = randomAvatar();
            $query = "INSERT INTO classrooms VALUES(?,?,?,?,?,?)";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("ssssss" , $classCode , $className , $subjectName , $room , $AvatarSrc, $ImageSrc);
            $stmt->execute();
            $query = "INSERT INTO classmembers VALUES(?,?,?)";
            $stmt = $connection->prepare($query);
            $Founder = 1;
            $stmt->bind_param("ssi" , $UserName , $classCode , $Founder);
            $stmt->execute();
            header("Location: ../View/MainPage");
        }
        $connection->close();
    }
?>