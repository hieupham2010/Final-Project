<?php
    session_start();
    if(!empty($_POST["txtEmail"])) {
        require_once 'DataAccess.php';
        $email = $_POST["txtEmail"];
        $hash = md5(rand(0,1000));
        $time = time();
        $ErrorMessage = "";
        $queryEmail = "SELECT * FROM users WHERE email = ? ";
        $stmt = $connection->prepare($queryEmail);
        $stmt->bind_param("s" , $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            require_once 'SendMailVerify.php';
            $row = $result->fetch_assoc();
            SendMailResetPassword($email , $row["FullName"], $hash);
            $query = "INSERT INTO verifypassword(Email, Hash, Time) VALUES(?,?,?)";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("sss" , $email, $hash, $time);
            $stmt->execute();
            header("Location: ../View/ForgotPassword.php?msg=ForgotPassword");
        }else{
            $ErrorMessage = "Your email does not exists please try again";
            header("Location: ../View/ForgotPassword.php?msg1=$ErrorMessage");
        }
        $connection->close();
    }
    
?>