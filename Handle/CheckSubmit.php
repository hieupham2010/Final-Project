<?php 
    require_once 'DataAccess.php';
    $query = "SELECT * FROM assignment WHERE ClassworkID = ? AND UserName = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("is", $ClassworkID, $UserName);
    $stmt->execute();
    $resultAssignment = $stmt->get_result();
?>