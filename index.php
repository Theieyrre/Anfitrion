<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/Anfitrion-main.png" type="image/png">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/index.css">
    <title>Anfitrión - Online Restoran Rezervasyon</title>
</head>
<body>
<?php 
    if(isset($_SESSION["username"])){
        if($_SESSION["is_host"]){
            header("Location: /host/");
        }
        header("Location: /client/");
    }
?>
    <div class="container">
        <div class="row">
            <a class="navbar-brand" href="index.php">
                <img src="images/Anfitrion-hover.png" alt="" height="100px">
                Anfitrión
            </a>
        </div>
        <div class="row calltoaction">
            <h1>Anfitrion nedir?</h1>
            <p>Anfitrion, rezervasyon yapmanızı kolaylaştıran bir uygulamadır. Alışılmış telefonla rezervasyon yerine daha yenilikçi ve kullanımı kolay bir uygulamadır.</p>          
            <div class="lists">
                <div class="list">
                    <p class="list-header">Müşteriler için</p>
                    <ul>
                        <li>Rezervasyon öncesi restorandaki menüleri ve fiyatları görebilmenizi sağlar</li>
                        <li>Siparişinizi önceden verebiliriz ve geldiğinizde hazır olmasını sağlayabilirsiniz</li>
                        <li>Önceki müşterilerin yorumlarını ve restoranın toplam değerlendirmesini görüntüleyebilirsiniz</li>
                        <li>En iyi restoranları ve farklı mutfakları kolayca filtreleyip seçme imkanı sağlar</li>
                    </ul>
                </div>
                <div class="list">
                    <p class="list-header">Eğer restoran sahibiyseniz</p>
                    <ul>
                        <li>Rezevasyonlarınızı bir arada gösterir ve siparişlerinizi kolayca görüntüleybilirsiniz</li>
                        <li>Kolayca yiyeceklerinizi ve menülerinizi tanımlayabilirsiniz ve gerektiğinde güncelleme yapabilirsiniz</li>
                        <li>Müşterilerin yorumlarına cevap verebilir</li>
                        <li>Restoranınız için reklam imkanı ve iş olanağı sağlar</li>
                    </ul>
                </div>
                
            </div> 
        </div>
    </div>
    <div class="buttons d-flex justify-content-center">
        <a href="client">
            <button class="page-button">
                Rezervasyon yapmak için tıklayınız
            </button>
        </a>
        <a href="host">
            <button class="page-button">
                Restoran sahibiyseniz, arayüz için tıklayınız
            </button>
        </a>
    </div>
<footer>
<a href='https://www.freepik.com/photos/background'>Background photo created by wirestock - www.freepik.com</a>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
</body>
</html>