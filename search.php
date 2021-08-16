<?php
    function GetTableInfo($TableName,$id){
        include 'connect.php';
        $tableID=$TableName."_id";
            $knowlegde = $db->query("SELECT * FROM $TableName WHERE $tableID=$id")->fetchAll(PDO::FETCH_ASSOC);

        if(!$knowlegde){
            echo ("Bu id ile kayıtlı $TableName bulunmamaktadir");
            return 0;
        }
        return $knowlegde;
    }
    function GetAllTableInfo($TableName){
        include 'connect.php';
        
            $knowlegde = $db->query("SELECT * FROM $TableName")->fetchAll(PDO::FETCH_ASSOC);

        if(!$knowlegde){
            echo ("Bu id ile kayıtlı $TableName bulunmamaktadir");
            return 0;
        }
        return $knowlegde;
    }
    function GetTableInfoWithAnyKey($TableName,$identifier,$id){
        include 'connect.php';
            $knowlegde = $db->query("SELECT * FROM $TableName WHERE $TableName.$identifier=$id")->fetchAll(PDO::FETCH_ASSOC);

        if(!$knowlegde){
            echo ("$id nolu $identifier ile kayıtlı $TableName bulunmamaktadir");
            return 0;
        }
        return $knowlegde;
    }
    function GetRestaurantInfo($RestaurantID){
        include 'connect.php';
   
            $knowlegde = $db->query("SELECT *  FROM restaurant 
            INNER JOiN schedule
            ON (restaurant.restaurant_id=schedule.restaurant_id)
            INNER JOiN host
            ON (restaurant.restaurant_id=host.restaurant_id)
            WHERE restaurant.restaurant_id=$RestaurantID")->fetch(PDO::FETCH_ASSOC);
          
            print_r($knowlegde);
            if(!$knowlegde){
            
                echo "Bu id ile kayıtlı restoran bulunmamaktadir";
                return 0;
            }
       
        return $knowlegde;

    }
    function GetAllRestaurants(){
        include 'connect.php';
   
            $knowlegde = $db->query("SELECT *  FROM restaurant 
            INNER JOiN schedule
            ON (restaurant.restaurant_id=schedule.restaurant_id)
            INNER JOiN host
            ON (restaurant.restaurant_id=host.restaurant_id)
            ")->fetch(PDO::FETCH_ASSOC);
          
            print_r($knowlegde);
            if(!$knowlegde){
            
                echo "Restoran bulunmamaktadir";
                return 0;
            }
       
        return $knowlegde;

    }
    function GetRestaurantID($Name){
        include 'connect.php';
   
            $knowlegde = $db->query("SELECT restaurant_id FROM restaurant  WHERE restaurant.name='$Name'")->fetch(PDO::FETCH_ASSOC);

            if(!$knowlegde){
            
                echo "Bu isim ile kayİtlİ restoran bulunmamaktadir";
                return 0;
            }
       
        return $knowlegde['restaurant_id'];

    }
    function GetMenuInfo($MenuID){
        include 'connect.php';
   
            $knowlegde = $db->query("SELECT * FROM menu WHERE menu_id=$MenuID")->fetchAll(PDO::FETCH_ASSOC);

            if(!$knowlegde){
            
                echo "Bu id ile kayıtlı menu bulunmamaktadir";
                return 0;
            }

        return $knowlegde;

        }
    function GetMenuID($Name){//menu isimleri faarkli olmali
        include 'connect.php';
   
            $knowlegde = $db->query("SELECT menu_id FROM menu WHERE menu.name='$Name'")->fetch(PDO::FETCH_ASSOC);

            if(!$knowlegde){
            
                echo "Bu isim ile kayıtlı menu bulunmamaktadir";
                return 0;
            }
       
        return $knowlegde['menu_id'];

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
           // echo "Bu mail ile kayıtlı kullanici bulunmamaktadir";
            return 0;
        }
        return $knowlegde['user_id'];

    }
    function GetHostInfo($HostID){
        include 'connect.php';
   
            $knowlegde = $db->query("SELECT * FROM host WHERE host_id=$HostID")->fetch(PDO::FETCH_ASSOC);

        if(!$knowlegde){
            
            echo "Bu id ile kayıtlı kullanici bulunmamaktadir";
            return 0;
        }
        return $knowlegde;

    }
    function GetHostID($user_id){
        include 'connect.php';
            
            $knowlegde = $db->query("SELECT host_id FROM host WHERE host.user_id='$user_id'")->fetch(PDO::FETCH_ASSOC);

        if(!$knowlegde){
            echo "Bu mail ile kayıtlı kullanici bulunmamaktadir";
            return 0;
        }
        return $knowlegde['host_id'];

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
    
    function GetFoodInfo($FoodID){
        include 'connect.php';
   
            $knowlegde = $db->query("SELECT * FROM food WHERE food_id=$FoodID")->fetchAll(PDO::FETCH_ASSOC);

            if(!$knowlegde){
            
                echo "Bu id ile kayıtlı food bulunmamaktadir";
                return 0;
            }

        return $knowlegde;

    }
    function GetFoodID($Name){
        include 'connect.php';
   
            $knowlegde = $db->query("SELECT food_id FROM food WHERE food.name='$Name'")->fetch(PDO::FETCH_ASSOC);

            if(!$knowlegde){
            
                echo "Bu isim ile kayıtlı food bulunmamaktadir";
                return 0;
            }
       
        return $knowlegde['food_id'];
    } 
    
    function GetAdditiontInfo($AdditionID){
        include 'connect.php';
   
            $knowlegde = $db->query("SELECT * FROM addition WHERE addition_id=$AdditionID")->fetchAll(PDO::FETCH_ASSOC);

        if(!$knowlegde)
            echo $knowlegde->errorInfo();
       
        return $knowlegde;

    }
    //print_r(GetTableInfoWithAnyKey("mesa","restaurant_id",28));
    //print_r(GetTableInfo("mesa",28));
    //echo(GetHostID(24));
    //GetRestaurantInfo(GetRestaurantID("bagimli restorant"));
    //print_r (GetRestaurantInfo(11));
    //print_r (GetUserInfo(3));
    //print_r (GetFoodInfo(2));
    //echo (GetUserID("user@mail"));
    //echo(GetRestaurantID("sofra  Restoran"));
   // echo (GetUserID("deneme2@gm"));
   // echo (GetClientID("deneme2@gm"));
   
?>
