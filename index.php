<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <a class="navbar-brand" href="index.php">
            <img src="images/Anfitrion-hover.png" alt="" height="100px">
            Anfitrión
        </a>
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