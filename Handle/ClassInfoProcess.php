<?php
    if(isset($_GET["id"]) && !empty($_GET["id"])) {
        require_once 'DataAccess.php';
        $ciphering = "AES-128-CTR"; 
        $iv_length = openssl_cipher_iv_length($ciphering); 
        $options = 0;
        $decryption_iv = '2010200978194772'; 
        $decryption_key = "518H0501"; 
        $encryptCode = $_GET["id"];
        $ClassID = openssl_decrypt ($encryptCode, $ciphering, $decryption_key, $options, $decryption_iv);
        $query = "SELECT * FROM classrooms WHERE ClassID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s" , $ClassID);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $ClassName = $row["ClassName"];
        $SubjectName = $row["SubjectName"];
        $Room = $row["Room"];
    }else {
        header("Location: MainPage");
        exit;
    }
?>