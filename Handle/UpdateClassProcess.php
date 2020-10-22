<?php 
    if(!empty($_POST["ClassID"]) && !empty($_POST["txtClassName"]) 
    && !empty($_POST["txtSubjectName"]) && !empty($_POST["txtRoom"])) {
        require_once 'DataAccess.php';
        $ClassID = $_POST["ClassID"];
        $ClassName = $_POST["txtClassName"];
        $Subject = $_POST["txtSubjectName"];
        $Room = $_POST["txtRoom"];
        $query = "UPDATE classrooms SET ClassName = ?, SubjectName = ? , Room = ? WHERE ClassID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ssss", $ClassName , $Subject , $Room , $ClassID);
        $stmt->execute();
        $connection->close();
        header("Location: ../View/MainPage.php");
    }
?>