<?php
    require_once 'DataAccess.php';
    $query = "SELECT AccountType FROM accounts WHERE UserName = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $UserName);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $AccountType = $row["AccountType"];
?>
