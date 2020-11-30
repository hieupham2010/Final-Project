<?php 
    function generateCode() {
        $character = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $classCode = '';
        for($i = 0 ; $i < 6 ; $i++) {
            $index = rand(0 , strlen($character) - 1);
            $classCode .= $character[$index];
        }
        return $classCode;
    }
    function checkExistsCode($classCode) {
        require 'DataAccess.php';
        $query = "SELECT * FROM classrooms WHERE ClassID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s" , $classCode);
        $stmt->execute();
        $result = $stmt->get_result();
        $connection->close();
        return $result->num_rows > 0;
    }
    function classCode() {
        $classCode = generateCode();
        while(checkExistsCode($classCode) == true) {
            $classCode = generateCode();
        }
        return $classCode;
    }

    function randomAvatar() {
        $images = array("1.png" , "2.png", "3.png", "4.png", "5.png", "6.png", "7.png");
        $index = rand(0 , count($images) - 1);
        return "images/avatarsClass/" . $images[$index];
    }
?>