<?php
    session_start();
    if(!empty($_POST["txtEmail"])) {
        require_once 'DataAccess.php';
        $email = $_POST["txtEmail"];
        $ErrorMessage = "";
        $queryEmail = "SELECT * FROM users WHERE email = ? ";
        $stmt = $connection->prepare($queryEmail);
        $stmt->bind_param("s" , $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            require_once 'SendMailVerify.php';
            $row = $result->fetch_assoc();
            $_SESSION["timeResetPassExpire"] = time();
            $_SESSION["Email"] = $email;
            $_SESSION["FullName"] = $row["FullName"];
            SendMailResetPassword($email , $row["FullName"]);
        }else{
            $ErrorMessage = "Your email does not exists";
            header("Location: ../View/ForgotPassword.php?msg=$ErrorMessage");
        }
        $connection->close();
    }
    
?>