<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }
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
                <select name="category1" >
                    <?php  $bilgiler(GetTableInfoWithAnyKey("food","category","ensalada"));
                         foreach ($bilgiler as $bilgi) {?>
                            <option value="$bilgi[id]">$bilgi[name]</option>
                         <?php }
                    ?>
                </select><br>
                <p class="label">Salata seçiniz</p>
                <select name="category2" >
                    <?php 
                         $bilgiler(GetTableInfoWithAnyKey("food","category","ensalada"));
                         foreach ($bilgiler as $bilgi) { ?>
                            <option value="$bilgi[id]">$bilgi[name]</option>
                         <?php }
                     ?>
                </select><br>
                <p class="label">Ana yemek seçiniz</p>
                <select name="category3" >
                    <?php 
                     $bilgiler(GetTableInfoWithAnyKey("food","category","racion"));
                    foreach ($bilgiler as $bilgi) { ?>
                       <option value="$bilgi[id]">$bilgi[name]</option>
                    <?php } 
                    ?>
                </select><br>
                <p class="label">Ekstra seçiniz</p>
                <select name="category4" >
                    <?php 
                     $bilgiler(GetTableInfoWithAnyKey("food","category","extra"));
                    foreach ($bilgiler as $bilgi) { ?>
                       <option value="$bilgi[id]">$bilgi[name]</option>
                    <?php } 
                    ?>
                </select><br>
                <p class="label">Yemek sonrası seçiniz</p>
                <select name="category5" >
                <?php 
                     $bilgiler(GetTableInfoWithAnyKey("food","category","postre"));
                    foreach ($bilgiler as $bilgi) { ?>
                       <option value="$bilgi[id]">$bilgi[name]</option>
                    <?php } 
                    ?>
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
        $Menu_id=CreateMenu ($_SESSION["restaurant_id"],$_POST["name"],$_POST["price"],1,$_POST["is_available"] );
        CreateContains ($_POST["category1"],$Menu_id);
        CreateContains ($_POST["category2"],$Menu_id);
        CreateContains ($_POST["category3"],$Menu_id);
        CreateContains ($_POST["category4"],$Menu_id);
        CreateContains ($_POST["category5"],$Menu_id);
        //$is_daily isin sorgu yok
        header("Location: index.php");
    }
