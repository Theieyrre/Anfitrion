<?php
        include 'insertWithJoins.php';
        function CreateRestourant ($Restourantname,$RestourantDescription,
        $MasaSayisi,$MasaCapacity,$day,$open_time,$close_time){
            include 'connect.php';
            $restoourant_total_client=0;
            $myQuery = $db->prepare('INSERT INTO restaurant SET 
            name = ?,
            description = ?,
            total_client = ?
            ');
           
            $add = $myQuery ->execute([
                $Restourantname,
                $RestourantDescription,
                $restoourant_total_client
                
            ]);
            if(!$add){
                echo("In restoran adding Error: ".$myQuery->errorInfo())[2];
                return 0; 
            }  

            
            $last_id = $db->lastInsertId();
            CreateSchedule($last_id,$day,$open_time,$close_time);
            
            for($i=0;$i<$MasaSayisi;$i++){
                CreateMesa ($last_id,0,$MasaCapacity);
            }

            $last_id = $db->lastInsertId();
            return $last_id;
        }
        function CreateUser ($UserMail,
        $UserPhoneNumber,$UserPAssword,$UserFirstName,$UserLastName ){
            include 'connect.php';
            $myQuery = $db->prepare('INSERT INTO user SET 
            	mail = ?,
                phone_number = ?,
                password = ?,
                firstname =?,
                lastname =?,
                register_date=?
            ');

            $add = $myQuery ->execute([
                $UserMail,
                $UserPhoneNumber,
                $UserPAssword,
                $UserFirstName,
                $UserLastName,
                date('Y/m/d ')
                
            ]);
            if(!$add){
                echo("Adding Error: ".$myQuery->errorInfo())[2];
                return 0;
            }  
            $last_id = $db->lastInsertId();
           
            return $last_id;
         } 
         function CreateFood ($Foodname,
        $FoodDescription,$Cusine,$Category,$Price ){
            include 'connect.php';
            
            
            if($Category=="entrada"||$Category=='ensalada'||$Category=='racion'||$Category=='extra'||$Category=='postre')
            {
                $myQuery = $db->prepare('INSERT INTO food SET 
                name = ?,
                description = ?,
                cuisine =?,
                category =?,
                price=?
            ');
                $add = $myQuery ->execute([
                $Foodname,
                $FoodDescription,
                $Cusine,
                $Category,
                $Price
                ]);
            }
            else{
                echo "Girilen Kategori hatalidir.";
            }
            if(!$add){
                echo("Adding Error: ".$myQuery->errorInfo())[2];
                return 0;
            }  
            $last_id = $db->lastInsertId();
            return $last_id; 
         } 
         function CreateMesa ($restaurant_id,
         $reservation_id,$capacity){
             include 'connect.php';
             $myQuery = $db->prepare('INSERT INTO mesa SET 
                 restaurant_id = ?,
                 reservation_id = ?,
                 capacity = ?
             ');
 
             $add = $myQuery ->execute([
                 $restaurant_id,
                 $reservation_id,
                 $capacity
                 
             ]);
             if(!$add){
                 echo("In mesa adding Error: ".$myQuery->errorInfo()[2]);
                 return 0;
             } 
             
            $last_id = $db->lastInsertId();
            return $last_id; 
            }

            
        // CreateRestourant ("Search4","deneme restorant1",5,4,
         //"tuesday",date("h:i"),date("h:i"));
         //CreateUser ("user1@mai2",05346522660,"123","oguz","ocal");
         //CreateFood ("baklava","fistikli tatli","tatli","extra",15);
        // CreateReservation (111,111,1,"kk",2);
?>
