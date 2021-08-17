<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="shortcut icon" href="../images/Anfitrion-main.png" type="image/png">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/form.css">
    <link rel="stylesheet" href="../styles/postbox.css">
    <title>Anfitrión - Online Restoran Rezervasyon</title>
</head>
<body>
<?php 
    include '../db.php';
    session_start();
    if(isset($_SESSION["username"])){
        header("Location: /client/");
    }
    $postid=GetTableInfo("user",$_SESSION["user_id"])["postbox_id"];
   print_r( GetTableInfo("postbox",$postid));//GET ALL RESPONSES
    GetTableInfo("postbox",$postid)["read"]=1; // UPDATE all responses read=true
    
?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-10">
            <form method="post" autocomplete="off" >
                <?php //TEMPLATE ?>
                <h1 class="form--header">
                    Yorumlarınıza gelen cevaplar
                </h1>
                <?php 
                    $postid=GetTableInfo("user",$_SESSION["user_id"])["postbox_id"];
                     print_r( GetTableInfo("postbox",$postid));// User tüm commentlar için responselar
                    GetTableInfo("postbox",$postid)["read"]=1;// okunmadı olanlar gelsin sayfa yüklenince hepsini okundu olarak update et
                ?>
                <h2 class="form--header">%restoran adı%</h2>
                <p class="label">%tarih%</p>
                <p>%metin%</p>
                <button type="submit" name="remove" placeholder="">CEVABI SİL</input>
            </form>
        </div>
    </div>
</div>
<?php
    if(isset($_POST["remove"])){ 
        $postid=GetTableInfo("user",$_SESSION["user_id"])["postbox_id"];
        Set("postbox",$postid,"message","");// postboxdan sil
        header("Location: register.php");
    }
?>
<footer>
<a href='https://www.freepik.com/photos/business'>Business photo created by creativeart - www.freepik.com</a>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
</body>
</html>

