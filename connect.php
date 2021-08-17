<?php
    $servername = getenv("CLEARDB_DATABASE_URL");
    $username = getenv("USERNAME");
    $password = getenv("PASSWORD");;
    $dbname = getenv("DATABASE_NAME");
    try {      
        $db = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);       
    } catch (PDOException $e){     
        echo $e->getMessage();
    }
?>
