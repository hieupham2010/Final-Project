<?php
    // $serverName = "localhost";
    // $Name = "root";
    // $password = "";
    // $dbName = "classroom";
    // $connection = new mysqli($serverName , $Name , $password ,$dbName);
    // if($connection->connect_error) {
    //     die("Connection failed: " . $connection->connect_error);
    // }
    $serverName = "enqhzd10cxh7hv2e.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $Name = "f3oyc1ddhrr2hess";
    $password = "yy905zqedgkba6z8";
    $dbName = "k8m29jk63f2uk9wy";
    $connection = new mysqli($serverName , $Name , $password ,$dbName);
    if($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
?>