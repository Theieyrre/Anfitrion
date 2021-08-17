<?php
   
    function CreateHost($userID,$restaurantID,$Restourantname){
        include 'connect.php';
        //$userID=CreateUser ($UserMail,$UserPhoneNumber,$UserPassword,
        //$UserFirstName,$UserLastName );

        //$restaurantID=CreateRestourant ($Restourantname,$RestourantDescription,
        //$MasaSayisi,$MasaCapacity,$day,$open_time,$close_time);
        
        $myQuery = $db->prepare('INSERT INTO host SET 
            user_id = ?,
            restaurant_id = ?,
            restaurant_name = ?
            ');

            $add = $myQuery ->execute([
                $userID,
                $restaurantID,
                $Restourantname
                
            ]);
            if(!$add){
                echo("Adding Error: ".$myQuery->errorInfo()[2]);
                return 0;
            }  
            $last_id = $db->lastInsertId();
            return $last_id;
    }
    function CreateClient($Postboxid,$UserMail,
    $UserPhoneNumber,$UserPassword,$UserFirstName,$UserLastName){
        include 'connect.php';
        $userID=CreateUser ($UserMail,
        $UserPhoneNumber,$UserPassword,$UserFirstName,$UserLastName);

        $myQuery = $db->prepare('INSERT INTO client SET 
            user_id = ?,
            reservation_id = ?,
            reservation_count = ?,
            has_reservation = ?,
            trust_value = ?
            ');

            $add = $myQuery ->execute([
                $userID,
                0,
                0,
                0,
                0
                
            ]);
            if(!$add){
                echo($myQuery->errorInfo()[2]);
                return 0;
            }  
            $last_id = $db->lastInsertId();
             return $last_id;
    }
    function CreateReservation ($restaurant_id,
         $client_id,$date,$person_count,$note,$has_participated){
             include 'connect.php';
             $myQuery = $db->prepare('INSERT INTO reservation SET 
                 restaurant_id = ?,
                 client_id = ?,
                 date = ?,
                 person_count = ?,
                 note = ?,
                 has_participated = ?
             ');
 
             $add = $myQuery ->execute([
                $restaurant_id,
                $client_id,
                $date,
                $person_count,
                $note,
                $has_participated
                 
             ]);
             if(!$add){
                 echo("Adding Error: ".$myQuery->errorInfo()[2]);
                 return 0;
             } 
             $last_id = $db->lastInsertId();
             Set("client",$client_id,"rezervation_id",$last_id);
             return $last_id; 
            }

            function CreateMenu ($restaurant_id,
            $name,$price,$is_daily,$is_available ){
                include 'connect.php';

                    $myQuery = $db->prepare('INSERT INTO menu SET 
                    restaurant_id = ?,
                    name = ?,
                    price =?,
                    is_daily =?,
                    is_available=?
                ');
                    $add = $myQuery ->execute([
                        $restaurant_id,
                        $name,
                        $price,
                        $is_daily,
                        $is_available
                    ]);
                
                
                if(!$add){
                    echo("Adding Error: ".$myQuery->errorInfo()[2]);
                    return 0;
                }  
                $last_id = $db->lastInsertId();
                return $last_id; 
             } 

             function CreateAddition ($restaurant_id,
             $mesa_id,$menu_id,$food_id ,$amount ){
                 include 'connect.php';
 
                     $myQuery = $db->prepare('INSERT INTO addition SET 
                     restaurant_id = ?,
                     mesa_id = ?,
                     menu_id =?,
                     food_id =?,
                     amount=?
                 ');
                     $add = $myQuery ->execute([
                        $restaurant_id,
                        $mesa_id,
                        $menu_id,
                        $food_id,
                        $amount
                     ]);
                 
                 
                 if(!$add){
                     echo("Adding Error: ".$myQuery->errorInfo()[2]);
                     return 0;
                 }  
                 $last_id = $db->lastInsertId();
                 return $last_id; 
              } 

              function CreateSchedule ($restaurant_id,
             $day,$open_time,$close_time ){
                 include 'connect.php';
 
                 if($day=="monday"||$day=='tuesday'||
                 $day=='wednesday'||$day=='thursday'||
                 $day=='friday'||$day=='saturday'||$day=='sunday')
            {
                $myQuery = $db->prepare('INSERT INTO schedule SET 
                restaurant_id = ?,
                day = ?,
                open_time =?,
                close_time =?
            ');
                $add = $myQuery ->execute([
                    $restaurant_id,
                    $day,
                    $open_time,
                    $close_time 
                ]);
            }
            else{
                echo "Girilen schedule hatalidir.";
            }
                 if(!$add){
                     echo("Adding Error: ".$myQuery->errorInfo()[2]);
                     return 0;
                 }  
                 $last_id = $db->lastInsertId();
                 return $last_id; 
              }

              function CreateComment ($restaurant_id,
             $client_id ,$response_id,$stars,$text ){
                 include 'connect.php';
 
                 if($stars==1||$stars==2||
                 $stars==3||$stars==4||
                 $stars==5)
            {
                $myQuery = $db->prepare('INSERT INTO comment SET 
                restaurant_id = ?,
                client_id = ?,
                response_id =?,
                stars =?,
                text=?,
                date=?
            
            ');
                $add = $myQuery ->execute([
             $restaurant_id,
             $client_id ,
             $response_id,
             $stars,
             $text,
             date('Y/m/d ') 
                ]);
            }
            else{
                echo "Stars değişkeni sa dece 1-2-3-4-5 degerleri alabilir.";
            }
                 if(!$add){
                     echo("Adding Error: ".$myQuery->errorInfo()[2]);
                     return 0;
                 }  
                 $last_id = $db->lastInsertId();
                 return $last_id; 
              }  
              
              function CreateResponse ($restaurant_id,$text ){
                 include 'connect.php';
 
                 
                $myQuery = $db->prepare('INSERT INTO response SET 
                restaurant_id = ?,
                text=?,
                date=?
            
            ');
                $add = $myQuery ->execute([
             $restaurant_id,
             $text,
             date('Y/m/d ') 
                ]);
            
            
                 if(!$add){
                     echo("Adding Error: ".$myQuery->errorInfo()[2]);
                     return 0;
                 }  
                 $last_id = $db->lastInsertId();
                 return $last_id; 
              } 
    //CreateResponse(1,"teşekkürler");
    //CreateComment(1,
          //1,1,5,"yemekler lezzetliydi ");
    //CreateSchedule (3,
        //"tuesday",date("h:i"),date("h:i"));
    //CreateMenu (1,
        //"fdf",2,1,1 );
     //CreateHost("deneme@gm",12345,1234,"ogi","dof",
        //"bagimli restorant","very good restorant",2,2,
        //"friday",date("h:i"),date("h:i"));
     //CreateReservation("alaca restorant","deneme@gm",4,"herhangi bir not yok");
     //CreateClient("deneme2@gm",12345,1234,"oguz","dof2");
     
 
?>
