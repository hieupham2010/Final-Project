<?php
    function encryptClassCode($ClassID) {
        $ciphering = "AES-128-CTR"; 
        $options = 0;
        $decryption_iv = '2010200978194772'; 
        $decryption_key = "518H0501"; 
        $EncryptClassID = openssl_encrypt($ClassID, $ciphering, $decryption_key, $options, $decryption_iv);
        return $EncryptClassID;
    }
    function decryptClassCode($EncryptClassID) {
        $ciphering = "AES-128-CTR"; 
        $options = 0;
        $decryption_iv = '2010200978194772'; 
        $decryption_key = "518H0501"; 
        $ClassID = openssl_decrypt($EncryptClassID, $ciphering, $decryption_key, $options, $decryption_iv);
        return $ClassID;
    }
?>