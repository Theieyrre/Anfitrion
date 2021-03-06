<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="shortcut icon" href="../images/Anfitrion-main.png" type="image/png">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/form.css">
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
        <div class="col-md-3">
            <form method="post" autocomplete="off" >
                <h1 class="form--header">
                    Hemen Giriş Yapın !
                </h1>
                <h2 class="form--header">
                    Giriş bilgilerinizi doldurunuz
                </h2>
                <input type="text" name="username" placeholder="Email" maxlength="30" required><br>
                <input type="password" name="password" placeholder="Şifre" autocomplete="new-password" required><br>
                <p class="label">Henüz üye değil misiniz ? </p>
                <a href="register.php">Üye olmak için tıklayın</a><br>
                <input type="submit" value="GİRİŞ" name="login">
            </form>
        </div>
    </div>
</div>
<?php
    if(isset($_POST["login"])){
        $client_id=checkClient($_POST["username"],$_POST["password"]);
        if($client_id){
            
            $_SESSION["client_id"]=$client_id;
            $_SESSION["username"]=$_POST["username"];
            header("Location: /client/");
        }
        else{
            echo "<script type='text/javascript'>alert(Böyle bir kullanıcı bulunamadı lütfen kayıt olunuz');</script>";
            
            header("Location: register.php");
        }
    }
?>
<footer>
<a href='https://www.freepik.com/vectors/building'>Building vector created by macrovector - www.freepik.com</a>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
</body>
</html>
