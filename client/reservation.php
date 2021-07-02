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
    <link rel="stylesheet" href="../styles/reservation.css">
    <title>Anfitrión - Online Restoran Rezervasyon</title>
</head>
<body>
<?php 
    include '../db.php';
    session_start();
    //if(!isset($_SESSION["username"])){
    //    header("Location: /client/login.php");
    //}
    if(isset($_GET["id"])){
        
    }
    // restoran id geçerli olduğu kontrolü yapılmalı 
    // restoran açık mı kontrolü de yapılmalı
?>

<div class="row d-flex justify-content-center">
        <form method="post" class="reservation">
                <p class="label">Restoran adı</p>
                <input type="text" name="restaurant" class="name" disabled>
                <p class="label">Tarih</p>
                <input type="text" name="date" class="date" disabled>
                <p class="label">Kaç kişi olacaksınız ?</p>
                <input type="number" id="person" name="person">
                <p class="label">Ne zaman geleceksiniz ?</p>
                <input type="time" name="hour" min="%restoran_min" max="%restoran_max" required>
                <div class="col d-flex justify-content-center">
                    <div class="menu-card daily">
                        <div class="menu-card-header">
                            Günün Menüsü 
                        </div>
                        <div class="menu-card-body">
                            <?php // Gerektiği kadar kategori ile iterative aşağı kod sekmesini kullanarak menu oluştur?>
                            <h5 class="menu-card-title">%foodcategori%</h5>
                            <p class="menu-card-text">%foodaçıklama%</p>
                            <p class="label">Kaç kişi bu menüden alıcak ?</p>
                            <input type="number" class="max_person" min="0" name="amount">
                        </div>
                    </div>
                </div>
                <?php // Gerektiği kadar card div içerisini iterasyon ile üret ve doldur?>
        </form>
</div>

<?php
    if(isset($_POST["login"])){
        // Giriş yapma işlemleri bura yazılacak
        // Olmayan üye için registera yönlendir
        // Doğru giriş yapılırsa /client/ 'a yönledir
    }
?>
<footer>
<a href='https://www.freepik.com/photos/food'>Food photo created by betochagas - www.freepik.com</a>
</footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".date").datepicker({dateFormat: "dd-mm-yyyy"});
        $(".date").datepicker("setDate", new Date());

        var person_count = 0;
        $("#person").change(function(){
            person_count = $(this).val();
            $(".max_person").each(function(){
                $(this).attr("max", person_count);
            });
        });
    });
</script>
</body>
</html>