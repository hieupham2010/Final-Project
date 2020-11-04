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
            $mail->Body = '<div style="text-align: center;">
            <header style="background-color: #1fa9b8;">
            <h1 style="color: white; padding: 50px; margin: 0;">TDTU CLASSROOM</h1>
            </header>
            <div style="text-align:center;font-size:20px;background-color:white;padding:100px 100px;">
            <h3>Hi '.$fullName.' thanks for signing up!</h3>
            <p>You have requested to sign up for a classroom account according to the information</p>
            <div style="border:2px dashed #1fa9b8;width:30%;margin: auto; text-align: left; padding:10px 15px;">
            <p><b>User Name: </b> '.$userName.' </p>
            <p><b>Password: </b> '.$password.'</p>
            </div>
            <p>Please click button bellow to complete registration</p>
            <button style="background-color:#38c4d3;border:none;border-radius:5px;padding:10px 20px;">
            <a style="color:white;text-decoration: none;"
            href="http://localhost/Final-Project/VerifiedEmailForSignUp?email='.$email.'&hash='.$hash.'">Verification</a></button>
            <p style="color:red;">*This email is valid only within 10 minutes</p>
            <p>If it\'s not you, please ignore this email</p>
            </div><footer style="background-color:#1fa9b8;color:white;padding:30px;"><p>&copy; Copyright by Hieu & Duy</p></footer></div>';
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
            <header style="background-color: #1fa9b8;">
                <h1 style="color: white; padding: 50px; margin: 0;">TDTU CLASSROOM</h1>
            </header>
            <div style="text-align:center;font-size:20px;background-color:white;padding:100px 100px;">
            <h3>Hi '.$fullName.'</h3>
            <p>You have requested reset your password for a classroom account. Please click button bellow to reset your password</p>
            <button style="background-color:#38c4d3;border:none;border-radius:5px;padding:10px 20px;">
            <a style="color:white;text-decoration: none;"
            href="http://localhost/Final-Project/Handle/VerifiedEmailForPassword?email='.$email.'&hash='.$hash.'">Verification</a></button>
            <p style="color:red;">*This email is valid only within 10 minutes</p>
            <p>If it\'s not you, please ignore this email</p>
            </div><footer style="background-color:#1fa9b8;color:white;padding:30px;"><p>&copy; Copyright by Hieu & Duy</p></footer></div>';
            $mail->send();
        }catch(Exception $e) {
            echo $e->getMessage();
        }
    }
    function sendMailJoinClass($email , $hash , $fullName, $classInfo) {
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
            $mail->Subject = "Request | Join Class";
            $mail->Body = '<div style="text-align: center;">
            <header style="background-color: #1fa9b8;">
                <h1 style="color: white; padding: 50px; margin: 0;">TDTU CLASSROOM</h1>
            </header>
            <div style="text-align:center;font-size:20px;background-color:white;padding:100px 100px;">
                <p>'.$fullName.' asked to join your class '.$classInfo.' </p>
                <p>Please click button below to accept</p>
                <button style="background-color:#38c4d3;border:none;border-radius:5px;padding:10px 20px;">
                <a style="color:white;text-decoration: none;"
                href="http://localhost/Final-Project/Handle/VerifiedEmailForJoin?Email='.$email.'&Hash='.$hash.'">Accept</a>
                </button>
            </div><footer style="background-color:#1fa9b8;color:white;padding:30px;"><p>&copy; Copyright by Hieu & Duy</p></footer></div>';
            $mail->send();
        }catch(Exception $e) {
            echo $e->getMessage();
        }
    }
    function sendMailInvite($email, $hash , $classInfo, $fullName) {
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
            $mail->Subject = "Invite | Join Class";
            $mail->Body = '<div style="text-align: center;">
            <header style="background-color: #1fa9b8;">
                <h1 style="color: white; padding: 50px; margin: 0;">TDTU CLASSROOM</h1>
            </header>
            <div style="text-align:center;font-size:20px;background-color:white;padding:100px 100px;">
                <h3>Hello '.$fullName.'</h3>
                <p>You have been invited to join class '.$classInfo.'</p>
                <p>Please click button below to accept</p>
                <button style="background-color:#38c4d3;border:none;border-radius:5px;padding:10px 20px;">
                <a style="color:white;text-decoration: none;"
                href="http://localhost/Final-Project/Handle/VerifiedEmailForInvite?Email='.$email.'&Hash='.$hash.'">Accept</a>
                </button>
            </div><footer style="background-color:#1fa9b8;color:white;padding:30px;"><p>&copy; Copyright by Hieu & Duy</p></footer></div>';
            $mail->send();
        }catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    function sendMailNotification($email , $classInfo, $StudentName , $LectureName , $Title) {
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
            $mail->Subject = "Notification | Classroom";
            $mail->Body = '<div style="text-align: center;">
            <header style="background-color: #1fa9b8;">
                <h1 style="color: white; padding: 50px; margin: 0;">TDTU CLASSROOM</h1>
            </header>
            <div style="text-align:center;font-size:20px; background-color:white;padding:100px 100px;">
            <h3>Hello '.$StudentName.'</h3>
            <p>'.$LectureName.' posted '.$Title.' in '.$classInfo.'</p>
            <button style="background-color:#38c4d3;border:none;border-radius:5px;padding:10px 20px;">
            <a style="color:white;text-decoration: none;" href="http://localhost/Final-Project/index">Open</a></button>
            </div><footer style="background-color:#1fa9b8;color:white;padding:30px;"><p>&copy; Copyright by Hieu & Duy</p></footer></div>';
            $mail->send();
        }catch(Exception $e) {
            echo $e->getMessage();
        }
    }
