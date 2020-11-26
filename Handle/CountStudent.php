<?php 
    require 'DataAccess.php';
    $query = "SELECT * FROM users WHERE UserID IN (SELECT UserID FROM accounts WHERE UserName IN 
    (SELECT UserName FROM classmembers WHERE ClassID = ?) AND AccountType = 2)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $ClassID);
    $stmt->execute();
    $result = $stmt->get_result();
    $NumStudent = $result->num_rows;
    $connection->close();
?>