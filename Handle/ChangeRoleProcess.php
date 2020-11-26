<?php 
    if(isset($_GET["UserName"]) && !empty($_GET["UserName"])
    && isset($_GET["TargetRole"]) && !empty($_GET["TargetRole"])) {
        require 'DataAccess.php';
        $UserName = $_GET["UserName"];
        if($_GET["TargetRole"] == "Student") {
            $TargetRole = 2;
        }else if($_GET["TargetRole"] == "Lecturer") {
            $TargetRole = 1;
        }else {
            $TargetRole = 0;
        }
        $query = "UPDATE accounts SET AccountType = ? WHERE UserName = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("is", $TargetRole, $UserName);
        $stmt->execute();
        header("Location: ../View/ManageAccount?admin=ManageAccount");
    }

?>