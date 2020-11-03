<?php
    require_once 'DataAccess.php';
    if(isset($_GET["Email"]) && !empty($_GET["Email"])
    && isset($_GET["Hash"]) && !empty($_GET["Hash"])) {
        $Email = $_GET["Email"];
        $Hash = $_GET["Hash"];
        $query = "SELECT * FROM joinclass WHERE Email = ? AND Hash = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ss", $Email, $Hash);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $ClassID = $row["ClassID"];
            $UserName = $row["UserName"];
            if($Email == $row["Email"] && $Hash == $row["Hash"]) {
                $query = "INSERT classmembers(UserName, ClassID) VALUES(?,?)";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("ss", $UserName , $ClassID);
                $stmt->execute();
                $query = "DELETE FROM joinclass WHERE Email = ? AND Hash = ?";
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