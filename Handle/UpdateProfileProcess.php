<?php
    session_start();
    if(!empty($_POST["txtFullName"]) && !empty($_POST["txtDateOfBirth"])
    && !empty($_POST["txtEmail"]) && !empty($_POST["txtPhoneNumber"])) {
        require_once 'DataAccess.php';
        $FullName = $_POST["txtFullName"];
        $DateOfBirth = $_POST["txtDateOfBirth"];
        $Email = $_POST["txtEmail"];
        $PhoneNumber = $_POST["txtPhoneNumber"];
        $UserName = $_SESSION["username"];
        $Hash = md5(rand(0,1000));
        if($_FILES["imageUpload"]["name"] != "") {
            $destination = "../View/images/avatarUploads/";
            $imageUpload = $UserName . $Hash . $_FILES["imageUpload"]["name"];
            $destinationFile = $destination . basename($imageUpload);
            $imageFileType = strtolower(pathinfo($destinationFile,PATHINFO_EXTENSION));
            if($imageFileType != "jpg" && $imageFileType != "png" 
            && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                header("Location: ../View/Profile.php?request=profile&msg=InvalidImage");
            }else {
                move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $destinationFile);
                $query = "UPDATE users SET FullName = ?, DateOfBirth = ?, Email = ?, PhoneNumber = ? 
                WHERE UserID = (SELECT UserID FROM accounts WHERE UserName = ?)";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("sssss", $FullName , $DateOfBirth , $Email , $PhoneNumber, $UserName);
                $stmt->execute();
                $AvatarSrc = "images/avatarUploads/" . $imageUpload;
                $query = "UPDATE accounts SET AvatarSrc = ? WHERE UserName = ?";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("ss" , $AvatarSrc , $UserName);
                $stmt->execute();
                $query = "UPDATE classrooms SET AvatarSrc = ? WHERE ClassID IN (SELECT ClassID FROM classmembers WHERE UserName = ?)";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("ss" , $AvatarSrc , $UserName);
                $stmt->execute();
                header("Location: ../View/Profile.php?request=profile&msg=UpdateSuccess");
            }
        }else{
            $query = "UPDATE users SET FullName = ?, DateOfBirth = ?, Email = ?, PhoneNumber = ? 
            WHERE UserID = (SELECT UserID FROM accounts WHERE UserName = ?)";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("sssss", $FullName , $DateOfBirth , $Email , $PhoneNumber, $UserName);
            $stmt->execute();
            header("Location: ../View/Profile.php?request=profile&msg=UpdateSuccess");
        }
    }
?>