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
    <title>Anfitrión - Online Restoran Rezervasyon</title>
</head>
<body>
<?php 
    include '../db.php';
    session_start();
    if(isset($_SESSION["username"])){
        header("Location: /host/");
    }
?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-3">
            <form method="post" autocomplete="off" >
                <h1 class="form--header">
                    Hemen Kaydolun!
                </h1>
                <h2 class="form--header">
                    Bilgileriniz doldurun ve restoranınızı müşterilere açın!
                </h2>
                <input type="text" name="firstname" placeholder="Adınız" maxlength="20" required><br>
                <input type="text" name="lastname" placeholder="Soyadınız" maxlength="20" required><br>
                <input type="text" name="email" placeholder="Emailiniz" maxlength="30" required><br>
                <input type="tel" name="phonenumber" placeholder="Telefon Numaranız" pattern="((5)|(05))[0-9]{9}" required><br>
                <input type="password" name="password" placeholder="Şifre" autocomplete="new-password" required><br>
                <input type="submit" value="GİRİŞ" name="signup">
            </form>
        </div>
    </div>
</div>
<?php
    if(isset($_POST["signup"])){
        if(GetUserID($_POST["email"])==0){
            $userid=CreateUser ($_POST["email"],$_POST["phonenumber"],$_POST["password"],$_POST["firstname"],$_POST["lastname"] );
            $_SESSION["user_id"]=$userid;
             $_SESSION["username"]=$_POST["email"];
            header("Location: create_restaurant.php");
        }
        else{
            header("Location: login.php");
        }        
        
    }
?>
<footer>
<a href='https://www.freepik.com/vectors/building'>Building vector created by macrovector - www.freepik.com</a>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
</body>
</html>
