<?php

    function checkUser($mail,$password){
        include 'connect.php';
        

        if($password==(GetUserInfo(GetUserID("'$mail'")['user_id'])['password'])){
            return 1;
        }
        return 0;
        
    }

    //echo(checkUser("user@mail",123));
?>