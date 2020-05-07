<?php
    $dbhost ="localhost"; 
    $dbuser ="root" ; 
    $dbpass ="";  

    try
    {
        $dbConnection = new PDO("mysql:host=$dbhost", $dbuser, $dbpass); 
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbConnection->prepare('CREATE DATABASE `user`');

        $stmt->execute();
    }

    catch (PDOException $e) {} 	
         
    $dbConnection = null ;

    try
    {
        $dbConnection = new PDO("mysql:host=$dbhost;dbname=user", $dbuser, $dbpass); 
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbConnection->prepare('CREATE TABLE `user` (
         `UID` int(3) NOT NULL,
         `USERNAME` varchar(100) NOT NULL,
         `EMAILID` varchar(100) NOT NULL,
         `PASSWORD` varchar(100) NOT NULL,
        `JOINDATE` varchar(100) NOT NULL
         )');

        $stmt->execute();
        
    }
    catch (PDOException $e) {} 	
    
    $dbConnection = null ;
?>	

