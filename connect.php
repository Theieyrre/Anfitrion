<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "heroku_e675e2ad822cd22";
    try {      
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);       
    } catch (PDOException $e){     
        echo $e->getMessage();
    }
?>