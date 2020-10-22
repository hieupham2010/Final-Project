<?php
    session_start();
    if(isset($_SESSION["verifiedEmailForSignUp"]) && $_SESSION["verifiedEmailForSignUp"] === true) {
        require_once 'DataAccess.php';
        $FullName = $_SESSION["FullName"];
        $DateOfBirth = $_SESSION["DateOfBirth"];
        $Email = $_SESSION["Email"];
        $PhoneNumber = $_SESSION["PhoneNumber"];
        $UserName = $_SESSION["UserName"];
        $Password = $_SESSION["Password"];
        $query = "INSERT INTO users(FullName , DateOfBirth , Email , PhoneNumber) VALUES(?,?,?,?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ssss", $FullName , $DateOfBirth , $Email , $PhoneNumber);
        $stmt->execute();
        $lastIdUser = $connection->insert_id;
        $query = "INSERT INTO accounts(UserName , Password , UserID) VALUES(?,?,?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ssi" , $UserName , $Password , $lastIdUser);
        $stmt->execute();
        $connection->close();
        session_destroy();
        header("Location: ../View/RedirectPage.php?msg=CompleteRegistration");
        exit;
    }
?>