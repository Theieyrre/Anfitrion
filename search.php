<?php

    function GetRestaurantInfo($RestaurantID){
        include 'connect.php';
   
            $knowlegde = $db->query("SELECT * FROM restaurant WHERE restaurant_id=$RestaurantID")->fetch(PDO::FETCH_ASSOC);

            if(!$knowlegde){
            
                echo "Bu id ile kayıtlı restoran bulunmamaktadir";
                return 0;
            }
       
        return $knowlegde;

    }
    function GetRestaurantID($Name){
        include 'connect.php';
   
            $knowlegde = $db->query("SELECT restaurant_id FROM restaurant WHERE restaurant.name='$Name'")->fetch(PDO::FETCH_ASSOC);

            if(!$knowlegde){
            
                echo "Bu isim ile kayıtlı restoran bulunmamaktadir";
                return 0;
            }
       
        return $knowlegde['restaurant_id'];

    }
    function GetUserInfo($UserID){
        include 'connect.php';
   
            $knowlegde = $db->query("SELECT * FROM user WHERE user_id=$UserID")->fetch(PDO::FETCH_ASSOC);

        if(!$knowlegde){
            
            echo "Bu id ile kayıtlı kullanici bulunmamaktadir";
            return 0;
        }
        return $knowlegde;

    }
    function GetUserID($Mail){
        include 'connect.php';
   
            $knowlegde = $db->query("SELECT user_id FROM user WHERE user.mail='$Mail'")->fetch(PDO::FETCH_ASSOC);

        if(!$knowlegde){
            echo "Bu mail ile kayıtlı kullanici bulunmamaktadir";
            return 0;
        }
        return $knowlegde['user_id'];

    }
    function GetFoodInfo($FoodID){
        include 'connect.php';
   
            $knowlegde = $db->query("SELECT * FROM food WHERE food_id=$FoodID")->fetchAll(PDO::FETCH_ASSOC);

        if(!$knowlegde)
            echo $knowlegde->errorInfo();
       
        return $knowlegde;

    }
    function GetClientInfo($ClientID){
        include 'connect.php';
   
            $knowlegde = $db->query("SELECT * FROM client WHERE client_id=$ClientID")->fetchAll(PDO::FETCH_ASSOC);

        if(!$knowlegde)
            echo $knowlegde->errorInfo();
       
        return $knowlegde;

    }
    function GetClientID($Mail){
        include 'connect.php';
            $id=(GetUserID("$Mail"));
            $knowlegde = $db->query("SELECT client_id FROM client  WHERE client.user_id=$id")->fetch(PDO::FETCH_ASSOC);

        if(!$knowlegde)
            echo $knowlegde->errorInfo();
       
        return $knowlegde['client_id'];

    }
    //print_r (GetRestaurantInfo(11));
    //print_r (GetUserInfo(3));
    //print_r (GetFoodInfo(2));
    //echo (GetUserID("user@mail"));
    //echo(GetRestaurantID("sofra  Restoran"));
   // echo (GetUserID("deneme2@gm"));
   // echo (GetClientID("deneme2@gm"));
?>