<?php
    session_start();
    if(!empty($_POST["JoinClassID"])) {
        require_once 'DataAccess.php';
        $ClassID = $_POST["JoinClassID"];
        $query = "SELECT * FROM classrooms WHERE ClassID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s" , $ClassID);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            $UserName = $_SESSION["username"];
            $query = "SELECT * FROM classmembers WHERE UserName = ? AND ClassID = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("ss", $UserName , $ClassID);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows > 0) {
                header("Location: ../View/MainPage?msg=ErrorJoinClassExists");
            }else {
                require 'SendMailVerify.php';
                $Hash = md5(rand(0,1000));
                $query = "SELECT * FROM accounts WHERE UserName = ?";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("s", $UserName);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                if($row["AccountType"] == 0) {
                    $query = "INSERT classmembers(UserName, ClassID) VALUES(?,?)";
                    $stmt = $connection->prepare($query);
                    $stmt->bind_param("ss", $UserName , $ClassID);
                    $stmt->execute();
                }else{
                    $query = "SELECT * FROM users WHERE UserID = 
                    (SELECT UserID FROM accounts WHERE UserName = 
                    (SELECT UserName FROM classmembers WHERE Founder = 1 AND ClassID = ?))";
                    $stmt = $connection->prepare($query);
                    $stmt->bind_param("s", $ClassID);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    $Email = $row["Email"];
                    $query = "SELECT * FROM users WHERE UserID = (SELECT UserID FROM accounts WHERE UserName = ?)";
                    $stmt = $connection->prepare($query);
                    $stmt->bind_param("s", $UserName);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    $FullName = $row["FullName"];
                    $query = "SELECT * FROM classrooms WHERE ClassID = ?";
                    $stmt = $connection->prepare($query);
                    $stmt->bind_param("s", $ClassID);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    $ClassInfo = $row["ClassName"] . " subject " . $row["SubjectName"] . " room " . $row["Room"];
                    $query = "INSERT INTO joinclass(Email, Hash, ClassID , UserName) VALUES(?,?,?,?)";
                    $stmt = $connection->prepare($query);
                    $stmt->bind_param("ssss", $Email, $Hash , $ClassID , $UserName);
                    $stmt->execute();
                    sendMailJoinClass($Email, $Hash , $FullName , $ClassInfo);
                    header("Location: ../View/MainPage?msg=RequestJoinSuccess");
                }
            }
        }else {
            header("Location: ../View/MainPage?msg=ErrorJoinClass");
        }
        $connection->close();
    }
?>