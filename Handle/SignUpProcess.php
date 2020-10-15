<?php
    session_start();
    if(!empty($_POST["txtFullName"]) && !empty($_POST["txtDateOfBirth"])
    && !empty($_POST["txtEmail"]) && !empty($_POST["txtPhoneNumber"]) 
    && !empty($_POST["txtUserName"]) && !empty($_POST["txtPassword"])) {
        require_once 'DataAccess.php';
        $fullName = $_POST["txtFullName"];
        $dateOfBirth = $_POST["txtDateOfBirth"];
        $email = $_POST["txtEmail"];
        $phoneNumber = $_POST["txtPhoneNumber"];
        $userName = $_POST["txtUserName"];
        $password = $_POST["txtPassword"];
        $ErrorMessage = "";
        $queryEmail = "SELECT * FROM users WHERE email = ? ";
        $queryUserName = "SELECT * FROM accounts WHERE UserName = ?";
        $stmt = $connection->prepare($queryEmail);
        $stmt->bind_param("s" , $email);
        $stmt->execute();
        $resultEmail = $stmt->get_result();
        $stmt = $connection->prepare($queryUserName);
        $stmt->bind_param("s" , $userName);
        $stmt->execute();
        $resultUserName = $stmt->get_result();
        if($resultEmail->num_rows > 0) {
            $ErrorMessage = "Your email already exists";
            header("Location: ../View/SignUp.php?msg1=$ErrorMessage");
        }else if($resultUserName->num_rows > 0) {
            $ErrorMessage = "Your user name already exists";
            header("Location: ../View/SignUp.php?msg2=$ErrorMessage");
        }else{
            require_once 'SendMailVerify.php';
            $_SESSION["FullName"] = $fullName;
            $_SESSION["DateOfBirth"] = $dateOfBirth;
            $_SESSION["Email"] = $email;
            $_SESSION["PhoneNumber"] = $phoneNumber;
            $_SESSION["UserName"] = $userName;
            $_SESSION["Password"] = $password;
            $_SESSION["timeSignUpExpire"] = time();
            SendMail($fullName,$email,$userName,$password);
        }
        $connection->close();
    }
    
?>