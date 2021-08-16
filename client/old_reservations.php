<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="../images/Anfitrion-main.png" type="image/png">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/old_res.css">
    <title>Anfitrión - Online Restoran Rezervasyon</title>
</head>
<body>
<?php 
    include '../db.php';
    session_start();
    if(isset($_SESSION["username"])){
        header("Location: /client/");
    }
?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-10">
        <?php //TEMPLATE ?>
        <div class="res">
            <h1>
                Önceki rezervasyonlarınız
            </h1>
            <span>%tarih%</span>
            <span>%restoran adı%</span>
            <span>%toplam fiyat%</span>
            <br>
            <div class="menu-card">
                <div class="menu-card-header">
                Menü  
                </div>
                <div class="menu-card-body">
                    <h5 class="menu-card-title"></h5>
                    <p class="menu-card-text">
                    <p class="label">%kişi sayısı%</p>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
<a href='https://www.freepik.com/photos/business'>Business photo created by freepik - www.freepik.com</a>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
</body>
</html>

