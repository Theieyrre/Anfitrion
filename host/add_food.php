<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="shortcut icon" href="../images/Anfitrion-main.png" type="image/png">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/form.css">
    <link rel="stylesheet" href="../styles/create_restaurant.css">
    <link rel="stylesheet" href="../styles/add_food.css">
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
                    Restoranıza yeni yiyecek tanımlayın 
                </h1>
                <input type="text" name="name" placeholder="Yiyecek adı" maxlength="20" required><br>
                <textarea name="desc" rows="2" cols="40" maxlength="40">Yiyeceğin kısaca tanımı (içindekileri, özellikleri vs)</textarea><br>
                <input type="text" name="cuisine" placeholder="Hangi dünya mutfağına ait" maxlength="15" required><br>
                <p class="label">Yiyeceğin hangi kategoride olduğunu seçiniz</p>
                <select name="category">
                    <option value="entrada">Başlangıç</option>
                    <option value="ensalada">Salata</option>
                    <option value="racion">Ana yemek</option>
                    <option value="extra">Ekstra</opiton>
                    <option value="postre">Yemek sonrası</option>
                </select><br>
                <input type="number" name="price" id="price" placeholder="Yiyeceğin ücreti" required><br>
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
        $basarili=CreateFood ($_POST["name"],$_POST["desc"],$_POST["cuisine"],$_POST["category"],$_POST["price"]);
        if(!$basarili){
            header("Location: ./host/create_menu.php");
        }
        
    }
?>
<footer>
<a href='https://www.freepik.com/photos/food'>Food photo created by stockking - www.freepik.com</a>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
</body>
</html>
