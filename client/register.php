<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="images/Anfitrion-main.png" type="image/png">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/form.css">
    <title>Anfitrión - Online Restoran Rezervasyon</title>
</head>
<body>
<?php 
    if(isset($_SESSION["username"])){
        header("Location: /client/");
    }
?>
<div class="container">
    <div class="row">
        <div class="col-md-auto">
            <form method="post">
                <input type="text" name="username" placeholder="Emailiniz/Telefon numaranız" maxlength="15" required>
                <input type="password" name="password" placeholder="Şifreniz" required>
                <input type="submit" value="GİRİŞ" name="login" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
<footer>
Frame vector created by pch.vector - www.freepik.com
Background photo created by wirestock - www.freepik.com
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
</body>
</html>