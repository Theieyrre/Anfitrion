<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="shortcut icon" href="../images/Anfitrion-main.png" type="image/png">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/form.css">
    <link rel="stylesheet" href="../styles/foods.css">
    <title>Anfitrión - Online Restoran Rezervasyon</title>
</head>
<body>
<?php 
    include '../db.php';
    session_start();
    if(isset($_SESSION["username"])){
        header("Location: /host/");
    }
    // Restorana ait tüm food ve menü listelenecek
    // Buradan host isterse update ve delete yapacak
?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-10">
            <form method="post" autocomplete="off" >
                <div id="foodsCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php // food için template
                            // diğerleri için div class'ta active olmamalı
                        ?>
                        <div class="carousel-item active">
                            <div class="food">
                                <h1>
                                    %food_name%
                                </h1>
                                <p>%food_description%</p>
                                <p>%food_cuisine%</p>
                                <p>%category%</p>
                                <p class="price">%price%</p>
                                <p>Mevcut mu ?</p>
                                <?php //eğer is_available ?>
                                <i class="fas fa-check fa-2x"></i>
                                <?php //değilse ?>
                                <i class="fas fa-times fa-2x"></i>
                                <br>
                                <?php //basılan food belli olması için name yerine food_id koyabilirsin ?>
                                <a href="edit_food?id=%food_id%">
                                    <button class="update">Düzenle</button>
                                </a>
                                <button class="delete" type="submit" name="food%food_id%" >Sil</button>
                            </div>    
                        </div>
                </div>
                <a class="carousel-control-prev" href="#foodsCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#foodsCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <div id="menuCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php // menu için template
                            // diğerleri için div class'ta active olmamalı
                        ?>
                        <div class="menu-card daily carousel-item active">
                            <div class="menu-card-header">
                                Günün Menüsü 
                            </div>
                            <div class="menu-card-body">
                                <?php // Gerektiği kadar kategori ile iterative aşağı kod sekmesini kullanarak menu oluştur?>
                                <h5 class="menu-card-title"><?php                               
                                    echo GetFoodInfo(GetTableInfoWithAnyKey("contains","menu_id",$_SESSION["menuler"][0]["menu_id"])[0]["food_id"])["category"];
                                    ?></h5>
                                <p class="menu-card-text"><?php                               
                                   echo GetFoodInfo(GetTableInfoWithAnyKey("contains","menu_id",$_SESSION["menuler"][0]["menu_id"])[0]["food_id"])["description"];
                                    ?></p>
                                <br>
                                <a href="edit_menu?id=%menu_id%">
                                    <button class="update">Düzenle</button>
                                </a>
                                <button class="delete" type="submit" name="menu%menu_id%" >SİL</button>
                            </div>
                        </div>
                        <?php foreach($_SESSION["menuler"] as $menu){ ?>
                         <tr>
                            <div class="menu-card carousel-item">
                                    <div class="menu-card-header">
                                        Menü  
                                    </div>
                                    <div class="menu-card-body">
                                        <?php // Gerektiği kadar kategori ile iterative aşağı kod sekmesini kullanarak menu oluştur
                                        $_SESSION["foods"]=GetTableInfoWithAnyKey("contains","menu_id",$menu["menu_id"])?>
                                        <?php foreach($_SESSION["foods"] as $food){ ?>
                                        <h5 class="menu-card-title"><?php                               
                                         echo GetFoodInfo($food["food_id"])["category"];
                                    ?><</h5>
                                        <p class="menu-card-text"><?php                               
                                         echo GetFoodInfo($food["food_id"])["description"];
                                    ?></p>
                                        <?php } ?>
                                        <br>
                                        <?php //basılan menu belli olması için name yerine menu_id koyabilirsin ?>
                                        <a href="edit_menu?id=%menu_id%">
                                            <button class="update">Düzenle</button>
                                        </a>
                                        <button class="delete" type="submit" name="menu%menu_id%" >SİL</button>
                                    </div>
                            </div>
                         </tr>    
                        <?php } ?>                            
                    </div>    
                </div>
                <a class="carousel-control-prev" href="#menuCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#menuCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>   
                
            </form>
        </div>
    </div>
</div>
<?php
    if(isset($_POST)){ 
        // post işlemi yapıldı array içinde id ara 
        // menu15 veya food7 gibi
    }
?>
<footer>
<a href='https://www.freepik.com/photos/food'>Food photo created by KamranAydinov - www.freepik.com</a>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
</body>
</html>

