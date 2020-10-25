<?php 
    $pass = "afadggafdafafdafsdfgsagas";
    $passHash = password_hash($pass , PASSWORD_DEFAULT);
    echo $passHash . "<br>";
    echo password_verify("afadggafdafafdafsdfgsagas" , $passHash);
?>