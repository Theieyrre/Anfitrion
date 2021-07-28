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
    $restoranBilgileri=GetRestaurantInfo(GetRestaurantID($_POST["restaurant"]));//restoran name ile id bulunabilir
    if($restoranBilgileri)
    {
        $isopen=($restoranBilgileri["close_time"]>$_POST["hour"])&&($restoranBilgileri["open_time"]<=$_POST["hour"]);

    }
    if(!$isopen){
        echo "<script type='text/javascript'>alert('Restoran belirtilen saatlerde acik degildir');</script>";
        header("Location: /client/");
    }    
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
                <div id="menus" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php 
                    $menuler=GetTableInfoWithAnyKey("menu","restaurant_id",GetRestaurantID($_POST["restaurant"]));
                    if($menuler){
                        $_SESSION["menuler"]=$menuler;
                    }
                    else{
                        echo"hiç menu yok";
                        $_SESSION["menuler"]=0;
                    }?>
                    <ol type="1">
                    foreach ($menuler as $menu){
                        <li>$menu["name"]</li>
                    }
                    </ol>
                    ?>
                    <li data-target="#menus" data-slide-to="0" class="active"></li>
                    <li data-target="#menus" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                    <?php // Gerektiği kadar menüyü iterative aşağı kod sekmesini kullanarak oluştur. daily değilse classta daily olmasın?>
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
                                
                                <p class="label">Kaç kişi bu menüden alıcak ?</p>
                                <input type="number" class="max_person" min="0" name="amount">
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
                                        <p class="label">Kaç kişi bu menüden alıcak ?</p>
                                        <input type="number" class="max_person" min="0" name="amount">
                                        <?php } ?>
                                    </div>
                            </div>
                        </div>
                        </tr>
                     <?php } ?>
                <div class="stars">
                    <input type="radio" name="rating" id="rating1">
                    <label for="rating1" class="fas fa-star"></label>
                    <input type="radio" name="rating" id="rating2">
                    <label for="rating2" class="fas fa-star"></label>
                    <input type="radio" name="rating" id="rating3">
                    <label for="rating3" class="fas fa-star"></label>
                    <input type="radio" name="rating" id="rating4">
                    <label for="rating4" class="fas fa-star"></label>
                    <input type="radio" name="rating" id="rating5">
                    <label for="rating5" class="fas fa-star"></label>
                </div>
                <a class="carousel-control-prev" href="#menus" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#menus" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
        </form>
</div>

<?php
    if(isset($_POST["login"])){
        $has_participated=0;//daha katılmadı
        if(!GetTableInfoWithAnyKey("reservation","date",$_POST["hour"]) ){
             //CreateReservation (GetRestaurantID($_POST["restaurant"]));
        }// reservasyon saatinde başka rezervasyon yoksa
        else{
            echo "<script type='text/javascript'>alert('Bu saat dolu lütfen başka rezervasyon seçiniz');</script>";
            header("Location: reservation.php");
        }
        //$_SESSION["client_id"],$_POST["number"],$_POST["note"],$has_participated1);

        // Giriş yapma işlemleri bura yazılacak  // bunlar zaten üye olanlara gözükmüyor mu?
        // Olmayan üye için registera yönlendir   // başta login ederse anca bu ekran gelsin bence
        header("Location: ./client/");
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
