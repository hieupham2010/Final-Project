<?php
    session_start();
    if(!empty($_POST["UDClassID"]) && !empty($_POST["txtClassNameUD"]) 
    && !empty($_POST["txtSubjectNameUD"]) && !empty($_POST["txtRoomUD"])) {
        require_once 'DataAccess.php';
        $ClassID = $_POST["UDClassID"];
        $ClassName = $_POST["txtClassNameUD"];
        $Subject = $_POST["txtSubjectNameUD"];
        $Room = $_POST["txtRoomUD"];
        $UserName = $_SESSION["username"];
        $Hash = md5(rand(0 , 9999));
        if($_FILES["imageUpload"]["name"] != "") {
            $destination = "../View/images/avatarsClass/";
            $imageUpload = $UserName . $Hash . $_FILES["imageUpload"]["name"];
            $destinationFile = $destination . basename($imageUpload);
            $imageFileType = strtolower(pathinfo($destinationFile,PATHINFO_EXTENSION));
            if($imageFileType != "jpg" && $imageFileType != "png" 
            && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                header("Location: ../View/MainPage?msg=InvalidImage");
            }else {
                $query = "SELECT * FROM classrooms WHERE ClassID = ?";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("s" , $ClassID);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                if(basename($row["ImageSrc"]) != "1.png" 
                && basename($row["ImageSrc"]) != "2.png" 
                && basename($row["ImageSrc"]) != "3.png"
                && basename($row["ImageSrc"]) != "4.png"
                && basename($row["ImageSrc"]) != "5.png"
                && basename($row["ImageSrc"]) != "6.png" 
                && basename($row["ImageSrc"]) != "7.png" ) {
                    unlink("../View/" . $row["ImageSrc"]);
                }
                move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $destinationFile);
                $ImageSrc = "images/avatarsClass/" . $imageUpload;
                $query = "UPDATE classrooms SET ClassName = ?, SubjectName = ? , Room = ?, ImageSrc = ? WHERE ClassID = ?";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("sssss", $ClassName , $Subject , $Room , $ImageSrc , $ClassID);
                $stmt->execute();
                $connection->close();
                header("Location: ../View/MainPage");
            }
        }else{
            $query = "UPDATE classrooms SET ClassName = ?, SubjectName = ? , Room = ? WHERE ClassID = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("ssss", $ClassName , $Subject , $Room , $ClassID);
            $stmt->execute();
            $connection->close();
            header("Location: ../View/MainPage");
        }
        
    }
?>