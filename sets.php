<?php

    function Set($table,$identifier,$item,$to){
        include 'connect.php';
        $tableid=$table."_id";
        $sql = "UPDATE $table SET $item ='$to'WHERE $table.$tableid=$identifier";
        $db->exec($sql);
    }

//Set("restaurant",29,"name","degisik 2");
?>