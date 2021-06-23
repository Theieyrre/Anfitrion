<?php
        function CreateRestourant ($Restourantname,$RestourantDescription){
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
                echo("Adding Error: ".$myQuery->errorInfo())[2];
            }  
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
            }  
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
                $add=0;
            }
            if(!$add){
                echo("Adding Error: ".$myQuery->errorInfo())[2];
            }  
         } 
         //CreateRestourant ("rest1","deneme restorant1");
         //CreateUser ("user1@mai2",05346522660,"123","oguz","ocal");
         //CreateFood ("baklava","fistikli tatli","tatli","extra",15);
?>