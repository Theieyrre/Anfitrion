<?php
    // Database credentialları ile bağlanıp açabilirsin phpmyadmin yerine
    // HeidiSQL kullanıyorum ben
    $servername = getenv("CLEARDB_DATABASE_URL");
    $username = getenv("USERNAME");
    $password = getenv("PASSWORD");;
    $dbname = "amfitrion_db";
    try {      
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);       
    } catch (PDOException $e){     
        echo $e->getMessage();
    }
?>