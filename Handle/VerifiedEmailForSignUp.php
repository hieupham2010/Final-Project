<?php
    if(isset($_GET["email"]) && !empty($_GET["email"]) && isset($_GET["hash"]) && !empty($_GET["hash"])) {
        require_once 'DataAccess.php';
        $Email = $_GET["email"];
        $Hash = $_GET["hash"];
        $query = "SELECT * FROM verification WHERE Email = ? AND Hash = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ss" , $Email , $Hash);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $FullName = $row["FullName"];
        $DateOfBirth = $row["DateOfBirth"];
        $PhoneNumber = $row["PhoneNumber"];
        $UserName = $row["UserName"];
        $Password = password_hash($row["Password"] , PASSWORD_DEFAULT);
        if(time() - $row["Time"] > 600) {
            $query = "DELETE FROM verification WHERE Email = ? AND Hash = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("ss" , $Email , $Hash);
            $stmt->execute();
            header("Location: ../View/SignUp?msg=SignUpTimeOut");
        }else{
            $query = "INSERT INTO users(FullName , DateOfBirth , Email , PhoneNumber) VALUES(?,?,?,?)";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("ssss", $FullName , $DateOfBirth , $Email , $PhoneNumber);
            $stmt->execute();
            $lastIdUser = $connection->insert_id;
            $query = "INSERT INTO accounts(UserName , Password , UserID) VALUES(?,?,?)";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("ssi" , $UserName , $Password , $lastIdUser);
            $stmt->execute();
            $query = "DELETE FROM verification WHERE Email = ? AND Hash = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("ss" , $Email , $Hash);
            $stmt->execute();
            header("Location: ../index?msg=CompleteRegistration");
        }
        $connection->close();
    }
?>