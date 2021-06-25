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

    //echo (checkUser("user@mail",123));
?>