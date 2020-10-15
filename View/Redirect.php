
<?php 
    $content = "";
    $button = "";
    $link = "";
    if(isset($_GET["msg"])) {
        if($_GET["msg"] === "SignUp") {
            $content = "We have accepted your request please check your email to complete registration";
            $button = "Go to your email";
            $link = "https://mail.google.com/";
        }else if($_GET["msg"] === "CompleteRegistration"){
            $content = "Sign up success";
            $button = "Go to login";
            $link = "http://localhost/Final-Project/index.php";
        }else if($_GET["msg"] === "ForgotPassword") {
            $content = "We have accepted your request please check your email to confirm";
            $button = "Go to your email";
            $link = "https://mail.google.com/";
        }else if($_GET["msg"] === "CompleteResetPassword") {
            $content = "Reset password was successful";
            $button = "Go to login";
            $link = "http://localhost/Final-Project/index.php";
        }
    }else {
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <h1>Classroom</h1>
    </div>
    <div class="redirect_page">
        <h2><?php echo $content ?></h2>
        <button><a href="<?php echo $link ?>"><?php echo $button ?></a></button>
    </div>
</body>
</html>