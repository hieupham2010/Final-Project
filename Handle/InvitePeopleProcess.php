<?php 
    if(isset($_POST["encryptCode"]) && !empty($_POST["encryptCode"])
    && isset($_POST["Email"]) && !empty($_POST["Email"])) {
        require_once 'DataAccess.php';
        require 'EncryptClassCode.php';
        $encryptCode = urlencode($_POST["encryptCode"]);
        $Email = $_POST["Email"];
        $hash = md5(rand(0,1000));
        $ClassID = decryptClassCode($_POST["encryptCode"]);
        $query = "SELECT * FROM users WHERE Email = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $Email);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            require 'SendMailVerify.php';
            $row = $result->fetch_assoc();
            $FullName = $row["FullName"];
            $query = "INSERT invited(Email , Hash, ClassID) VALUES(?,?,?)";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("sss", $Email , $hash , $ClassID);
            $stmt->execute();
            $query = "SELECT * FROM classrooms WHERE ClassID = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("s", $ClassID);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $connection->close();
            $ClassInfo = $row["ClassName"] . " subject " . $row["SubjectName"] . " room " . $row["Room"];
            sendMailInvite($Email, $hash, $ClassInfo , $FullName);
            header("Location: ../View/Class?id=$encryptCode&msg=Invited");
        }else {
            header("Location: ../View/Class?id=$encryptCode&msg=EmailNotExists");
        }
        
    }
?>