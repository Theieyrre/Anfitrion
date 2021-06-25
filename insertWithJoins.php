<?php
    function CreateHost($UserMail,
    $UserPhoneNumber,$UserPassword,$UserFirstName,$UserLastName,$Restourantname,$RestourantDescription){
        include 'connect.php';
        CreateUser ($UserMail,
        $UserPhoneNumber,$UserPassword,$UserFirstName,$UserLastName );
        CreateRestourant ($Restourantname,$RestourantDescription);
        $myQuery = $db->prepare('INSERT INTO host SET 
            user_id = ?,
            restaurant_id = ?,
            restaurant_name = ?
            ');

            $add = $myQuery ->execute([
                GetUserID($UserMail),
                GetRestaurantID($Restourantname),
                $Restourantname
                
            ]);
            if(!$add){
                echo("Adding Error: ".$myQuery->errorInfo())[2];
            }  
    }
    function CreateClient($UserMail,
    $UserPhoneNumber,$UserPassword,$UserFirstName,$UserLastName){
        include 'connect.php';
        CreateUser ($UserMail,
        $UserPhoneNumber,$UserPassword,$UserFirstName,$UserLastName);
        $myQuery = $db->prepare('INSERT INTO client SET 
            user_id = ?,
            reservation_id = ?,
            reservation_count = ?,
            has_reservation = ?
            ');

            $add = $myQuery ->execute([
                GetUserID($UserMail),
                0,
                0,
                0
                
            ]);
            if(!$add){
                echo($myQuery->errorInfo())[2];
            }  
    }
    function CreateReservation($restaurant_name,$UserMail,
    $PersonCount,$Note){
        include 'connect.php';
        
        $myQuery = $db->prepare('INSERT INTO reservation SET 
            restaurant_id = ?,
            client_id = ?,
            reservation.date = ?,
            person_count = ?,
            note = ?
            ');

            $add = $myQuery ->execute([
                GetRestaurantID($restaurant_name),
                GetUserID($UserMail),
                date('Y/m/d '),
                $PersonCount,
                $Note
                
            ]);
            if(!$add){
                echo($myQuery->errorInfo())[2];
            }  
    }
    //CreateHost("deneme@gm",12345,1234,"ogi","dof","alaca restorant","good restorant");
   // CreateReservation("alaca restorant","deneme@gm",4,"herhangi bir not yok");
    //CreateClient("deneme2@gm",12345,1234,"oguz","dof2");
?>