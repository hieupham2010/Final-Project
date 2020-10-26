<?php 
    $ciphering = "AES-128-CTR"; 
    $iv_length = openssl_cipher_iv_length($ciphering); 
    $options = 0; 
    $ClassID = "GgrNz8";
    $encryption_iv = '2010200978194772'; 
    $encryption_key = "518H0501"; 
    $encryption = openssl_encrypt($ClassID, $ciphering, $encryption_key, $options, $encryption_iv); 
      
    // Display the encrypted string 
    echo "Encrypted String: " . $encryption . "\n"; 
      
    // Non-NULL Initialization Vector for decryption 
    $decryption_iv = '2010200978194772'; 
      
    // Store the decryption key 
    $decryption_key = "518H0501"; 
      
    // Use openssl_decrypt() function to decrypt the data 
    $decryption = openssl_decrypt ($encryption, $ciphering, $decryption_key, $options, $decryption_iv); 
    echo "Decrypted String: " . $decryption; 
?>