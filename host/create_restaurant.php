<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="../images/Anfitrion-main.png" type="image/png">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/form.css">
    <link rel="stylesheet" href="../styles/create_restaurant.css">
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
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            <form method="post" autocomplete="off" >
                <h1 class="form--header">
                    Restoranınızı oluşturun !
                </h1>
                <input type="text" name="name" placeholder="Restoranınızın adı" maxlength="30" required><br>
                <textarea name="desc" rows="4" cols="50" maxlength="140">Restoranınızı kısaca açıklayınız</textarea><br>
                <input type="number" name="masa_sayisi" placeholder="Masa sayısı" maxlength="30" required><br>
                <input type="number" name="MasaCapacity" placeholder="Masaların kapasitesi" maxlength="30" required><br>
                <select name="days[]" multiple>
             
                         <option value="monday">Pazartesi</option>
                       <option value="tuesday">Sali</option>
                       <option value="wednesday">Carsamba</option>
                       <option value="thursday">Persembe</option>
                       <option value="friday">Cuma</option>
                       <option value="saturday">Cumartesi</option>
                       <option value="sunday">Pazar</option>                               
              
                </select><br>
                <p>Açılış ve kapanış saatlerini giriniz</p>
                <input type="time" name="open_time" required>
                <input type="time" name="close_time" required>
                <input type="submit" value="KAYDET" name="save">
            </form>
        </div>
    </div>
</div>
<?php
$restaurant_name=
 CreateRestourant ($Restourantname,$RestourantDescription,
 $MasaSayisi,$MasaCapacity,$day,$open_time,$close_time);
 
    if(isset($_POST["save"])){
        $restaurant_id=CreateRestourant ($_POST["name"],$_POST["desc"],$_POST["masa_sayisi"],$_POST["MasaCapacity"],$_POST["days[]"],$_POST["open_time"],$_POST["close_time"]);
        $_SESSION["restaurant_id"]=$restaurant_id;
        Set("host",$_SESSION["host_id"],"restaurant_id",$restaurantid);
        Set("host",$_SESSION["host_id"],"restaurant_name",$_POST["name"]);
        header("Location: add_food.php");
    }
?>
<footer>
<a href='https://www.freepik.com/photos/background'>Background photo created by evening_tao - www.freepik.com</a>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
</body>
</html>
