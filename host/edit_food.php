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
    if(!isset($_GET["id"])){
        header("Location: index.php");
    }
    // Link içinde food idsi olacak 
    // Ordaki id den food değerlerini çekip value değerlerine yaz her input için
    // select kısmı için aşağıdaki gibi selected koyabilirsin eski değer için
    // radio kısmı için aşağıdaki gibi checked koyabilirsin eski değer için
    // POST edince update çalıştırılacak
?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            <form method="post" autocomplete="off" >
                <h1 class="form--header">
                    Restoranıza yeni yiyecek tanımlayın 
                </h1>
                <input type="text" name="name" placeholder="Yiyecek adı" value="%yiyecek_adı%" maxlength="20" required><br>
                <textarea name="desc" rows="2" cols="40" maxlength="40">%yiyecek_açıklama%</textarea><br>
                <input type="text" name="cuisine" placeholder="Hangi dünya mutfağına ait" value="%yiyecek_cuisine%" maxlength="15" required><br>
                <p class="label">Yiyeceğin hangi kategoride olduğunu seçiniz</p>
                <select name="category">
                    <option value="entrada" selected>Başlangıç</option>
                    <option value="ensalada">Salata</option>
                    <option value="racion">Ana yemek</option>
                    <option value="extra">Ekstra</opiton>
                    <option value="postre">Yemek sonrası</option>
                </select><br>
                <input type="number" name="price" id="price" placeholder="Yiyeceğin ücreti" value="%yiyecek_price%" required><br>
                <p class="label">Müşterilerinize gösterilmesini istiyor musunuz ?</p>
                <label class="check" for="price">Evet
                    <input type="radio" class="form-check-input" name="is_available" value="True" checked>
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
        // Yiyecek düzenleme işlemleri burada yapılacak
        // Başarılı kayıttan sonra index e yönlendir
    }
?>
<footer>
<a href='https://www.freepik.com/photos/background'>Background photo created by evening_tao - www.freepik.com</a>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
</body>
</html>