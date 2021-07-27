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
    //if(!isset($_GET["id"])){
    //    header("Location: index.php");
    //}
    // edit food ile aynı olay
?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            <form method="post" autocomplete="off" >
                <h1 class="form--header">
                    Menünüzü düzenleyin
                </h1>
                <input type="text" name="name" placeholder="Menü adı" maxlength="20" required><br>
                <p class="label">Başlangıç seçiniz</p>
                <select name="category">
                    <option value="entrada">Başlangıç</option>
                    <option value="ensalada">Salata</option>
                    <option value="racion">Ana yemek</option>
                    <option value="extra">Ekstra</opiton>
                    <option value="postre">Yemek sonrası</option>
                </select><br>
                <p class="label">Salata seçiniz</p>
                <select name="category">
                    <option value="entrada">Başlangıç</option>
                    <option value="ensalada">Salata</option>
                    <option value="racion">Ana yemek</option>
                    <option value="extra">Ekstra</opiton>
                    <option value="postre">Yemek sonrası</option>
                </select><br>
                <p class="label">Ana yemek seçiniz</p>
                <select name="category">
                    <option value="entrada">Başlangıç</option>
                    <option value="ensalada">Salata</option>
                    <option value="racion">Ana yemek</option>
                    <option value="extra">Ekstra</opiton>
                    <option value="postre">Yemek sonrası</option>
                </select><br>
                <p class="label">Ekstra seçiniz</p>
                <select name="category">
                    <option value="entrada">Başlangıç</option>
                    <option value="ensalada">Salata</option>
                    <option value="racion">Ana yemek</option>
                    <option value="extra">Ekstra</opiton>
                    <option value="postre">Yemek sonrası</option>
                </select><br>
                <p class="label">Yemek sonrası seçiniz</p>
                <select name="category">
                    <option value="entrada">Başlangıç</option>
                    <option value="ensalada">Salata</option>
                    <option value="racion">Ana yemek</option>
                    <option value="extra">Ekstra</opiton>
                    <option value="postre">Yemek sonrası</option>
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
        //MENUDE KATEGORİ ATTRİBUTE U YOK
        Set("menu",$_GET["id"],"name",$_POST["name"]);
        Set("menu",$_GET["id"],"name",$_POST["price"]);
        Set("menu",$_GET["id"],"name",$_POST["is_available"]);
        header("Location: index.php");
    }
?>
<footer>
<a href='https://www.freepik.com/photos/background'>Background photo created by benzoix - www.freepik.com</a>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
</body>
</html>
