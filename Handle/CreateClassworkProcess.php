<?php 
    session_start();
    if(isset($_POST["encryptCode"]) && !empty($_POST["encryptCode"])) {
        require 'EncryptClassCode.php';
        $encryptCode = urlencode($_POST["encryptCode"]);
        $ClassID = decryptClassCode($_POST["encryptCode"]);
        if(isset($_POST["txtClassworkTitle"]) && !empty($_POST["txtClassworkTitle"])
        && isset($_POST["txtDescription"]) && isset($_POST["txtDueDay"]) && !empty($_POST["txtDueDay"])) {
            require_once 'DataAccess.php';
            $Title = $_POST["txtClassworkTitle"];
            $Description = $_POST["txtDescription"];
            $UserName = $_SESSION["username"];
            $Deadline = $_POST["txtDueDay"];
            $Hash = md5(rand(0,1000));
            require 'SendMailVerify.php';
            if(file_exists($_FILES["fileUpload"]["tmp_name"][0])) {
                $CountFile = count($_FILES["fileUpload"]["name"]);
                $query = "INSERT classwork(Title , Description,Deadline, ClassID , UserName) VALUES(?,?,?,?,?)";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("sssss", $Title, $Description,$Deadline, $ClassID, $UserName);
                $stmt->execute();
                $lastInsert = $connection->insert_id;
                $destination = "../View/MaterialUpload/";
                for($i = 0; $i < $CountFile ; $i++) {
                    $fileUpload = $UserName . $Hash . $_FILES["fileUpload"]["name"][$i];
                    $destinationFile = $destination . basename($fileUpload);
                    move_uploaded_file($_FILES["fileUpload"]["tmp_name"][$i], $destinationFile);
                    $temp = pathinfo($_FILES["fileUpload"]["name"][$i] , PATHINFO_EXTENSION);
                    $FileName = basename($_FILES["fileUpload"]["name"][$i] , "." . $temp);
                    $MaterialSrc = "MaterialUpload/" . $fileUpload;
                    $query = "INSERT material(MaterialSrc, FileName, ClassworkID) VALUES(?,?,?)";
                    $stmt = $connection->prepare($query);
                    $stmt->bind_param("ssi",$MaterialSrc,$FileName, $lastInsert);
                    $stmt->execute();
                }
                $query = "SELECT * FROM users WHERE UserID = (SELECT UserID FROM accounts WHERE UserName = ?)";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("s", $UserName);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $LectureName = $row["FullName"];
                $query = "SELECT * FROM classrooms WHERE ClassID = ?";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("s", $ClassID);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $ClassInfo = $row["ClassName"] . " subject " . $row["SubjectName"] . " room " . $row["Room"];
                $query = "SELECT * FROM users WHERE UserID IN (SELECT UserID FROM accounts WHERE AccountType = 2 AND UserName IN (SELECT UserName FROM classmembers WHERE ClassID = ?))";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("s", $ClassID);
                $stmt->execute();
                $result = $stmt->get_result();
                while($row = $result->fetch_assoc()) {
                    sendMailNotification($row["Email"] ,$ClassInfo, $row["FullName"] , $LectureName , $Title);
                }
                
                header("Location: ../View/Class?id=$encryptCode&msg=posted");
            }else{
                $query = "INSERT classwork(Title , Description,Deadline, ClassID , UserName) VALUES(?,?,?,?,?)";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("sssss", $Title, $Description,$Deadline, $ClassID, $UserName);
                $stmt->execute();
                $query = "SELECT * FROM users WHERE UserID = (SELECT UserID FROM accounts WHERE UserName = ?)";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("s", $UserName);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $LectureName = $row["FullName"];
                $query = "SELECT * FROM classrooms WHERE ClassID = ?";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("s", $ClassID);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $ClassInfo = $row["ClassName"] . " subject " . $row["SubjectName"] . " room " . $row["Room"];
                $query = "SELECT * FROM users WHERE UserID IN (SELECT UserID FROM accounts WHERE AccountType = 2 AND UserName IN (SELECT UserName FROM classmembers WHERE ClassID = ?))";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("s", $ClassID);
                $stmt->execute();
                $result = $stmt->get_result();
                while($row = $result->fetch_assoc()) {
                    sendMailNotification($row["Email"] ,$ClassInfo, $row["FullName"] , $LectureName , $Title);
                }
                header("Location: ../View/Class?id=$encryptCode&msg=posted");
            }
            $connection->close();
        }else {
            header("Location: ../View/Class?id=$encryptCode&msg=ErrorEmptyPost");
        }
    }
?>