<?php

    function Delete($table,$identifier,$id){
        include 'connect.php';
    
        $sql = "DELETE FROM $table WHERE $table.$identifier=$id";
        $db->exec($sql);
        header('Location:index.php');
    }

//Set("restaurant",29,"name","degisik 2");
?>