<?php

    function checkUser($mail,$User_password){
        include 'connect.php';
        
        $id=GetUserID("$mail");
     
        if(!$id){
            return 0;
        }
       
        if($User_password==GetUserInfo($id)['password']){
            echo "Giris Basarili !";
            return 1;
        }

        echo "Girilen Sifre Yanlıstir!\n";
        return 0;
    }
    function checkHost($mail,$User_password){
        include 'connect.php';
        
        $id=GetUserID("$mail");
     
        if(!$id){
            return 0;
        }
        $is_host=GetTableInfoWithAnyKey("host","user_id",$id);
        if($is_host!=0&&$User_password==GetUserInfo($id)['password']){
            echo "Giris Basarili !";
            return $is_host;
        }

        echo "Girilen Sifre Yanlıstir!\n";
        return 0;
    }
    function checkClient($mail,$User_password){
        include 'connect.php';
        
        $id=GetUserID("$mail");
        
        if(!$id){
            return 0;
        }
        $is_host=GetTableInfoWithAnyKey("client","user_id",$id);
        if($is_host!=0&&$User_password==GetUserInfo($id)['password']){
            echo "Giris Basarili !";
            return 1;
        }

        echo "Girilen Sifre Yanlıstir!\n";
        return 0;
    }

    //echo (checkUser("user@mail",123));
?>
