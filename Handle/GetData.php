<?php 
    function getFullNameByUserName($UserName) {
        require_once 'DataAccess.php';
        $query = "SELECT FullName FROM users WHERE UserID = (SELECT UserID FROM accounts WHERE UserName = ?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $UserName);
        $stmt->execute();
        $result1 = $stmt->get_result();
        $row1 = $result1->fetch_assoc();
        return $row1["FullName"];
    }

?>