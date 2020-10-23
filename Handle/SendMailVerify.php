<?php
    use PHPMailer\PHPMailer\PHPMailer;
    function SendMail($fullName ,$email,$userName,$password,$hash) {
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
        $emailHost = "pmh.hostmail@gmail.com";
        $emailPasswordHost = "pmhhostmail2010";
        $mail = new PHPMailer(true);
        try{
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = $emailHost;
            $mail->Password = $emailPasswordHost;
            $mail->Port = 587;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            $mail->isHTML(true);
            $mail->setFrom($emailHost , 'Classroom Admin');
            $mail->addAddress($email);
            $mail->Subject = "Sign Up | Verification";
            $mail->Body = '<div style="text-align: center;"><div style="background-color:#e9e9e9;padding: 16px 20px;">
            <h3>Hi '.$fullName.' thanks for signing up!</h3>
            <p>You have requested to sign up for a classroom account according to the information</p>
            <div style="border:2px dashed black;width:30%;margin: auto; text-align: left; padding:10px 15px;">
            <p><b>User Name: </b> '.$userName.' </p>
            <p><b>Password: </b> '.$password.'</p></div>
            <p>Please click button bellow to complete registration</p>
            <button style="background-color:#4CAF50;border:none;border-radius:5px;padding: 10px 16px;">
            <a style="color:white;text-decoration: none;"
            href="localhost/Final-Project/Handle/VerifiedEmailForSignUp.php?email='.$email.'&hash='.$hash.'">Verification</a></button>
            <p style="color:red;">*This email is valid only within 10 minutes</p>
            <p>If it\'s not you, please ignore this email</p>
            </div><footer style="background-color:#5e5c5c;color:white;padding:16px 20px;"><p>&copy; Classroom</p></footer></div>';
            $mail->send();
        }catch(Exception $e) {
            echo $e->getMessage();
        }
    }
    function SendMailResetPassword($email , $fullName, $hash) {
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
        $emailHost = "pmh.hostmail@gmail.com";
        $emailPasswordHost = "pmhhostmail2010";
        $mail = new PHPMailer(true);
        try{
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = $emailHost;
            $mail->Password = $emailPasswordHost;
            $mail->Port = 587;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            $mail->isHTML(true);
            $mail->setFrom($emailHost , 'Classroom Admin');
            $mail->addAddress($email);
            $mail->Subject = "Reset Password | Verification";
            $mail->Body = '<div style="text-align: center;">
            <div style="text-align:center;background-color:#e9e9e9;padding:16px 20px;">
            <h3>Hi '.$fullName.'</h3>
            <p>You have requested reset your password for a classroom account. Please click button bellow to reset your password</p>
            <button style="background-color:#4CAF50;border:none;border-radius:5px;padding:10px 16px;">
            <a style="color:white;text-decoration: none;"
            href="localhost/Final-Project/Handle/VerifiedEmailForPassword.php?email='.$email.'&hash='.$hash.'">Verification</a></button>
            <p style="color:red;">*This email is valid only within 10 minutes</p>
            <p>If it\'s not you, please ignore this email</p>
            </div><footer style="background-color:#5e5c5c;color:white;padding:16px 20px;"><p>&copy;Classroom</p></footer></div>';
            $mail->send();
        }catch(Exception $e) {
            echo $e->getMessage();
        }
    }
?>