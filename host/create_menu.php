<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="../images/Anfitrion-main.png" type="image/png">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/create_restaurant.css">
    <link rel="stylesheet" href="../styles/create_menu.css">
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
                    Restoranıza yeni menü tanımlayın
                </h1>
                <input type="text" name="name" placeholder="Menü adı" maxlength="20" required><br>
                <p class="label">Başlangıç seçiniz</p>
                <select name="category">
                    <?php //Tanımlanan foodlar içinde başlangıç olanları buraya option elementi içinde listele ?>
                </select><br>
                <p class="label">Salata seçiniz</p>
                <select name="category">
                    <?php //Tanımlanan foodlar içinde salata olanları buraya option elementi içinde listele ?>
                </select><br>
                <p class="label">Ana yemek seçiniz</p>
                <select name="category">
                    <?php //Tanımlanan foodlar içinde ana yemek olanları buraya option elementi içinde listele ?>
                </select><br>
                <p class="label">Ekstra seçiniz</p>
                <select name="category">
                    <?php //Tanımlanan foodlar içinde ekstra olanları buraya option elementi içinde listele ?>
                </select><br>
                <p class="label">Yemek sonrası seçiniz</p>
                <select name="category">
                    <?php //Tanımlanan foodlar içinde yemek sonrası olanları buraya option elementi içinde listele ?>
                </select><br>
                <input type="number" name="price" id="price" placeholder="Menü ücreti" required><br>
                <p class="label">Müşterilerinize gösterilmesini istiyor musunuz ?</p>
                <label class="check" for="price">Evet
                    <input type="radio" class="form-check-input" name="is_available" value="True">
                </label>
                <label class="check" for="price">Hayır
                    <input type="radio" class="form-check-input" name="is_available" value="False">
                </label>
                <br><input type="submit" value="KAYDET" name="save">
            </form>
        </div>
    </div>
</div>
<?php
    if(isset($_POST["save"])){
        CreateMenu (GetRestaurantID($Name),$_POST["name"],$_POST["price"],$is_daily,$_POST["is_available"] );
        // Her seçilen food için menu'ye insert yap ve idyi al
        // daha sonra bu id ve food idler ile containse insert yap her kategori için
        // kolaylaştırmak için option html elementi için value değerini food id yapabilirsin seçilen kategori için $_POST içinde value yazar 

        //$Name kısmına restoran adı ya da giret methodu silip restoran idsi
        //$is_daily isin sorgu yok
        // Başarılı kayıttan index'e gönder
    }
