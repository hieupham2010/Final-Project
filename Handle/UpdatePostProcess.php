<?php
session_start();
if (isset($_POST["encryptCode"]) && !empty($_POST["encryptCode"])) {
    require 'EncryptClassCode.php';
    $encryptCode = urlencode($_POST["encryptCode"]);
    $ClassID = decryptClassCode($_POST["encryptCode"]);
    if (isset($_POST["txtPost"]) && !empty($_POST["txtPost"]) 
        && isset($_POST["PostID"]) && !empty($_POST["PostID"])) {
        require_once 'DataAccess.php';
        $PostID = $_POST["PostID"];
        $Message = $_POST["txtPost"];
        $UserName = $_SESSION["username"];
        $Hash = md5(rand(0, 1000));
        if (file_exists($_FILES["fileUpload"]["tmp_name"][0])) {
            $CountFile = count($_FILES["fileUpload"]["name"]);
            $query = "UPDATE post SET Message = ? WHERE PostID = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("si", $Message, $PostID);
            $stmt->execute();
            $query = "DELETE FROM documents WHERE PostID = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("i", $PostID);
            $stmt->execute();
            $destination = "../View/DocumentUpload/";
            for ($i = 0; $i < $CountFile; $i++) {
                $fileUpload = $UserName . $Hash . $_FILES["fileUpload"]["name"][$i];
                $destinationFile = $destination . basename($fileUpload);
                move_uploaded_file($_FILES["fileUpload"]["tmp_name"][$i], $destinationFile);
                $FileSrc = "DocumentUpload/" . $fileUpload;
                $query = "INSERT documents(PostID, FileSrc) VALUES(?,?)";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("is", $PostID, $FileSrc);
                $stmt->execute();
            }
            header("Location: ../View/Class?id=$encryptCode&state=updated");
        } else {
            $query = "UPDATE post SET Message = ? WHERE PostID = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("si", $Message, $PostID);
            $stmt->execute();
            header("Location: ../View/Class?id=$encryptCode&state=updated");
        }
    } else {
        header("Location: ../View/Class?id=$encryptCode&msg=ErrorEmptyPost");
    }
}
?>

?>