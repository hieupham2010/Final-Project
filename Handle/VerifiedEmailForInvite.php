<?php
    require_once 'DataAccess.php';
    require_once 'EncryptClassCode.php';
    if(isset($_GET["Email"]) && !empty($_GET["Email"])
    && isset($_GET["Hash"]) && !empty($_GET["Hash"])) {
        $Email = $_GET["Email"];
        $Hash = $_GET["Hash"];
        $query = "SELECT * FROM invited WHERE Email = ? AND Hash = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ss", $Email, $Hash);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows>0) {
            $row = $result->fetch_assoc();
            $ClassID = $row["ClassID"];
            if($Email == $row["Email"] && $Hash == $row["Hash"]) {
                $query = "SELECT * FROM accounts WHERE UserID = (SELECT UserID FROM users WHERE Email = ?)";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("s", $Email);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $UserName = $row["UserName"];
                $query = "INSERT classmembers(UserName , ClassID) VALUES(?,?)";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("ss", $UserName , $ClassID);
                $stmt->execute();
                $query = "DELETE FROM invited WHERE Email = ? AND Hash = ?";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("ss", $Email, $Hash);
                $stmt->execute();
                header("Location: ../index?msg=JoinClassSuccess");
            }
        }else {
            header("Location: ../index");
        }
    }
?>