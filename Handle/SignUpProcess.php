<?php
    session_start();
    if(!empty($_POST["txtFullName"]) && !empty($_POST["txtDateOfBirth"])
    && !empty($_POST["txtEmail"]) && !empty($_POST["txtPhoneNumber"]) 
    && !empty($_POST["txtUserName"]) && !empty($_POST["txtPassword"])
    && !empty($_POST["txtConfirmPassword"])) {
        require_once 'DataAccess.php';
        $fullName = $_POST["txtFullName"];
        $dateOfBirth = $_POST["txtDateOfBirth"];
        $email = $_POST["txtEmail"];
        $phoneNumber = $_POST["txtPhoneNumber"];
        $userName = $_POST["txtUserName"];
        $password = $_POST["txtPassword"];
        $confirmPassword = $_POST["txtConfirmPassword"];
        $hash = md5(rand(0,1000));
        $time = time();
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
        }else if(strlen($password) < 8){
            $ErrorMessage = "Your password isn't less than 8 characters";
            header("Location: ../View/SignUp.php?msg3=$ErrorMessage");
        }else if($password != $confirmPassword) {
            $ErrorMessage = "Password and confirm password doesn't match";
            header("Location: ../View/SignUp.php?msg4=$ErrorMessage");
        }else{
            require_once 'SendMailVerify.php';
            $query = "DELETE FROM verification WHERE TimeStamp < DATE_SUB(NOW(), INTERVAL 10 MINUTE)";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            $query = "INSERT INTO verification(Email, Hash, Time, FullName, DateOfBirth, PhoneNumber, UserName, Password) VALUES(?,?,?,?,?,?,?,?)";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("ssssssss" , $email, $hash, $time, $fullName, $dateOfBirth, $phoneNumber, $userName, $password);
            $stmt->execute();
            SendMail($fullName,$email,$userName,$password,$hash);
            header("Location: ../View/SignUp.php?msg=SignUp");
        }
        $connection->close();
    }
    
?>