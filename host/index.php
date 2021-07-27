<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="images/Anfitrion-main.png" type="image/png">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/host_index.css">
    <title>Anfitrión - Online Restoran Rezervasyon</title>
</head>
<body>
<?php 
    include '../db.php';
    session_start();
    //if(!isset($_SESSION["username"])){
    //    header("Location: login.php");
    //}
?>

    <div class="container">
        <h1 class="welcome"><?php GetRestaurantInfo($_SESSION["restaurat_id"])["name"] ?>için rezervasyonlar</h1>
        <div class="row">
            <div class="col">


            <?php 
            
            $reservations=GetTableInfoWithAnyKey("menu","restaurat_id",$_SESSION["restaurat_id"]);
            
            ?>
            <div class="rezervasyon">
                <span>%saat%</span>
                <?php 
                     $menuler=GetTableInfoWithAnyKey("menu","restaurat_id",$_SESSION["restaurat_id"]);
                     
                     foreach($menuler as $menu){
                        print($menu[name]);
                        print("\nİçerik:");
                        foreach(GetTableInfoWithAnyKey("contains","menu_id",$menu["id"]) as $contain){
                            print(GetFoodInfo($contain["food_id"])["name"]."\n");
                        }
                     }
                ?>
                <p class="menu">%menu adı% - <span>%sayı% adet</span></p>
            </div>
        </div>
    </div>
</div>
<footer>
<a href='https://www.freepik.com/photos/party'>Party photo created by KamranAydinov - www.freepik.com</a>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
</body>
</html>
