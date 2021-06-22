<?php

    function GetRestaurantInfo($RestaurantID){
        include 'connect.php';
   
            $knowlegde = $db->query("SELECT * FROM restaurant WHERE restaurant_id=$RestaurantID")->fetch(PDO::FETCH_ASSOC);

        if(!$knowlegde)
            echo $knowlegde->errorInfo();
       
        return $knowlegde;

    }
    function GetUserInfo($UserID){
        include 'connect.php';
   
            $knowlegde = $db->query("SELECT * FROM user WHERE user_id=$UserID")->fetch(PDO::FETCH_ASSOC);

        if(!$knowlegde)
            echo $knowlegde->errorInfo();
       
        return $knowlegde;

    }
    function GetUserID($Mail){
        include 'connect.php';
   
            $knowlegde = $db->query("SELECT user_id FROM user WHERE user.mail=$Mail")->fetch(PDO::FETCH_ASSOC);

        if(!$knowlegde)
            echo $knowlegde->errorInfo();
       
        return $knowlegde;

    }
    function GetFoodInfo($FoodID){
        include 'connect.php';
   
            $knowlegde = $db->query("SELECT * FROM food WHERE food_id=$FoodID")->fetchAll(PDO::FETCH_ASSOC);

        if(!$knowlegde)
            echo $knowlegde->errorInfo();
       
        return $knowlegde;

    }
    //print_r (GetRestaurantInfo(11));
    //print_r (GetUserInfo(3));
    //print_r (GetFoodInfo(2));
    //echo (GetUserID("'user@mail'")[user_id]);// maili doğru verebilmesi icin '' arasında olmali fonksiyon cagirirken de " '' "
?>