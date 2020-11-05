<?php
    $serverName = "localhost";
    $Name = "root";
    $password = "";
    $dbName = "classroom";
    $connection = new mysqli($serverName , $Name , $password ,$dbName);
    if($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    // $serverName = "q7cxv1zwcdlw7699.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
    // $Name = "zhivdl2ud4ftzuk8";
    // $password = "kawcai3y2035tqe2";
    // $dbName = "ttn6a58jjd9zd1fn";
    // $connection = new mysqli($serverName , $Name , $password ,$dbName);
    // if($connection->connect_error) {
    //     die("Connection failed: " . $connection->connect_error);
    // }
?>