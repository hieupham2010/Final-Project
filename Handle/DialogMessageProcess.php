<?php
$title = "";
$content = "";
if (isset($_GET["msg"]) && !empty($_GET["msg"])) {
    if ($_GET["msg"] === "SignUp") {
        $title = "Sign Up";
        $content = "We have accepted your request please check your email to complete registration";
    } else if ($_GET["msg"] === "CompleteRegistration") {
        $title = "Sign Up";
        $content = "Sign up success";
    } else if ($_GET["msg"] === "ForgotPassword") {
        $title = "Forgot Password";
        $content = "We have accepted your request please check your email to confirm";
    } else if ($_GET["msg"] === "CompleteResetPassword") {
        $title = "Forgot Password";
        $content = "Reset password was successful";
    }else if($_GET["msg"] === "ErrorJoinClass") {
        $title = "Class not found";
        $content = "Your class code doesn't exists";
    }else if($_GET["msg"] === "SignUpTimeOut") {
        $title = "Sign Up";
        $content = "The confirmation time has expired please sign up again";
    }else if($_GET["msg"] === "ForgotPasswordTimeOut") {
        $title = "Forgot Password";
        $content = "The confirmation time has expired please confirm again";
    }else if($_GET["msg"] === "InvalidImage") {
        $title = "Update failed";
        $content = "Only JPG, JPEG, PNG & GIF files are allowed";
    }else if($_GET["msg"] === "UpdateSuccess") {
        $title = "Update success";
        $content = "Your account has been updated";
    }else if($_GET["msg"] === "ErrorJoinClassExists") {
        $title = "Error";
        $content = "You have already participated in this class";
    }else if($_GET["msg"] === "ErrorEmptyPost") {
        $title = "Error";
        $content = "Post can't be empty";
    }else if($_GET["msg"] === "ErrorEmptyComment") {
        $title = "Error";
        $content = "Comment can't be empty";
    }else if($_GET["msg"] === "DeletePostSuccess") {
        $title = "Delete Post";
        $content = "post has been deleted";
    }else if($_GET["msg"] === "DeleteCommentSuccess") {
        $title = "Delete Comment";
        $content = "Comment has been deleted";
    }else if($_GET["msg"] === "DeleteLecturerSuccess") {
        $title = "Delete Lecturer";
        $content = "Lecturer has been deleted";
    }else if($_GET["msg"] === "DeleteStudentSuccess") {
        $title = "Delete Student";
        $content = "Student has been deleted";
    }else if($_GET["msg"] ===  "EmailNotExists") {
        $title = "Invite People";
        $content = "Email doesn't exists please try again";
    }else if($_GET["msg"] === "Invited") {
        $title = "Invite Success";
        $content = "Your class invitation has been sent";
    }else if($_GET["msg"] === "JoinClassSuccess") {
        $title = "Join Class";
        $content = "Join class success";
    }else if($_GET["msg"] === "RequestJoinSuccess") {
        $title = "Join Class";
        $content = "Your request to join this class has been sent";
    }else if($_GET["msg"] === "posted") {
        $title = "Post success";
        $content = "You have posted in your class";
    }else if($_GET["msg"] === "DeleteMaterialSuccess") {
        $title = "Delete Classwork";
        $content = "Classwork has been deleted";
    }else if($_GET["msg"] === "PostUpdated") {
        $title = "Update Post";
        $content = "Update post success";
    }else if($_GET["msg"] === "MaterialUpdated") {
        $title = "Update Classwork";
        $content = "Update classwork success";
    }else if($_GET["msg"] === "UpdateCommentSuccess") {
        $title = "Edit Comment";
        $content = "Update comment success";
    }else if($_GET["msg"] === "DeleteCommentSuccess") {
        $title = "Delete Comment";
        $content = "Delete comment success";
    }else if($_GET["msg"] === "AssignmentSubmitted") {
        $title = "Submit Classwork";
        $content = "Submit classwork success";
    }else if($_GET["msg"] === "ErrorSubmit") {
        $title = "Submit Classwork";
        $content = "Please attach your file";
    }
}
?>