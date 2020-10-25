<?php 
    if(!empty($_POST["UDClassID"]) && !empty($_POST["txtClassNameUD"]) 
    && !empty($_POST["txtSubjectNameUD"]) && !empty($_POST["txtRoomUD"])) {
        require_once 'DataAccess.php';
        $ClassID = $_POST["UDClassID"];
        $ClassName = $_POST["txtClassNameUD"];
        $Subject = $_POST["txtSubjectNameUD"];
        $Room = $_POST["txtRoomUD"];
        $query = "UPDATE classrooms SET ClassName = ?, SubjectName = ? , Room = ? WHERE ClassID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ssss", $ClassName , $Subject , $Room , $ClassID);
        $stmt->execute();
        $connection->close();
        header("Location: ../View/MainPage.php");
    }
?>