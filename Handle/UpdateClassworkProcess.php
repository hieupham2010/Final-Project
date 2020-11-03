<?php
session_start();
if (isset($_POST["encryptCode"]) && !empty($_POST["encryptCode"])) {
    $encryptCode = urlencode($_POST["encryptCode"]);
    if (isset($_POST["txtClassworkTitle"]) && !empty($_POST["txtClassworkTitle"]) 
        && isset($_POST["txtDescription"])&& isset($_POST["ClassworkID"]) && !empty($_POST["ClassworkID"])) {
        require_once 'DataAccess.php';
        $Title = $_POST["txtClassworkTitle"];
        $Description = $_POST["txtDescription"];
        $ClassworkID = $_POST["ClassworkID"];
        $UserName = $_SESSION["username"];
        $Hash = md5(rand(0, 1000));
        if (file_exists($_FILES["fileUpload"]["tmp_name"][0])) {
            $CountFile = count($_FILES["fileUpload"]["name"]);
            $query = "UPDATE classwork SET Title = ?, Description = ? WHERE ClassworkID = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("ssi", $Title, $Description, $ClassworkID);
            $stmt->execute();
            $query = "DELETE FROM material WHERE ClassworkID = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("i", $ClassworkID);
            $stmt->execute();
            $destination = "../View/MaterialUpload/";
            for ($i = 0; $i < $CountFile; $i++) {
                $fileUpload = $UserName . $Hash . $_FILES["fileUpload"]["name"][$i];
                $destinationFile = $destination . basename($fileUpload);
                move_uploaded_file($_FILES["fileUpload"]["tmp_name"][$i], $destinationFile);
                $temp = pathinfo($_FILES["fileUpload"]["name"][$i] , PATHINFO_EXTENSION);
                $FileName = basename($_FILES["fileUpload"]["name"][$i] , "." . $temp);
                $MaterialSrc = "MaterialUpload/" . $fileUpload;
                $query = "INSERT material(MaterialSrc , ClassworkID, FileName) VALUES(?,?,?)";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("sis", $MaterialSrc, $ClassworkID , $FileName);
                $stmt->execute();
            }
            header("Location: ../View/Class?id=$encryptCode&msg=MaterialUpdated");
        } else {
            $query = "UPDATE classwork SET Title = ?, Description = ? WHERE ClassworkID = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("ssi", $Title, $Description, $ClassworkID);
            $stmt->execute();
            header("Location: ../View/Class?id=$encryptCode&msg=MaterialUpdated");
        }
    } else {
        header("Location: ../View/Class?id=$encryptCode&msg=ErrorEmptyPost");
    }
}
?>

?>