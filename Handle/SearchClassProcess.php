<?php
    if(isset($_GET["txtKey"]) && !empty($_GET["txtKey"])) {
        require_once 'DataAccess.php';
        $Key = $_POST["txtKey"];
        $query = "SELECT ClassID FROM classrooms WHERE ClassName LIKE %?% OR SubjectName LIKE %?% OR Room LIKE %?%";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("sss" , $Key , $Key , $Key);
        $stmt->execute();
        $result = $stmt->get_result();
    }
?>