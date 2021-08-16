<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
    <link rel="shortcut icon" href="../images/Anfitrion-main.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/client_index.css">
    <title>Anfitrión - Online Restoran Rezervasyon</title>
</head>
<body>
<?php 
    include '../db.php';
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: ../client/login.php");
    }
?>
<div class="container">
    <div class="nav_buttons">
        <a href="postbox.php">
            <button>
            <i class="fas fa-envelope fa-2x"></i>
            </button>
        </a>
        <a href="../logout.php">
            <button>
            <i class="fas fa-door-open fa-2x"></i>
            </button>
        </a>
    </div>
    <h1 class="welcome">Hoşgeldiniz, <?php echo ($_SESSION["firstname"]." ".$_SESSION["lastname"]) ?></h1>
    <div class="row">
        <div class="col">
            <h1 class="title">Yorum bekleyen rezervasyonlar</h1>
            <?php
            // Mevuct tarihten eski rezervasyonlar için comment ile join yapıp yorum olmayanları listele
            // Yemeksepeti gibi
            // Eğer burası olmazsa yorum tablosu anlamsız
            // TEMPLATE
            ?>
            <span>%restoran adı%</span>
            <span>%tarih%</span>
            <span>%kişi adedi%</span>
            <span>%toplam fiyat%</span>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#commentModal">
                Yorum Yap
            </button>
        </div>
    </div>
    <?php  
    $reservation=GetTableInfoWithAnyKey("reservation","client_id",$_SESSION["client_id"]);
    if($reservation==0) {
         ?>
    <div class="row">
        <div class="col-2">
            <form action="index.php" method="post">
                <p class="label">Rezervasyon tarihini seçiniz</p>
                <input type="text" name="date" class="date" data-provide="datepicker">
                <p class="label">Hangi mutfaktan istersiniz ?</p>
                <select name="category">
                    <?php 
                        // restoranların kategorisi yok ama
                        $Restorants=GetAllRestaurants();
                        //GetAllRestaurantInfo();// KULLANARAK TÜM RESTORAN BİLGİLERİNİ FOREACH İLE ALABİLİRSİN
                        //GetRestaurantInfo($RestaurantID);// BUNUNLA İSE İD İLE RESTORAN ÇEKEBİLİRSİN 
                        //GetRestaurantInfo(GetRestaurantID($Name));// BUNUNLA İSE RESTORAN NAME İLE RESTORAN ÇEKEBİLİRSİN 

                        // Restoran kategorilerini çekip burda option içerisine listele
                    ?>
                   <option value="%kategori_adı%">%kategori adı%</option>
                </select>
                <p class="label">Restoran minimum yıldız değeri seçiniz</p>
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
                <button type="submit" class="btn btn-secondary" value="uygula" name="apply">Uygula</button> 
            </form>
        </div>
        <div class="col">
            <div class="restaurant">
                <span>%restoran adı%</span>
                <span>%mevcut rezervasyon%</span>
                <a href="reservation.php?id=%restaurant_id%">
                    <button type="button" class="btn btn-success">
                        Rezerve Et
                    </button>
                </a>
            </div>
        </div>
    </div>
    <?php }else{ ?>
        <div class="row">
        <div class="col-6">
            <h1 class="title">
                Mevcut rezervasyonunuz
            </h1>
            <div class="restaurant">
                <form method="post">
                    <span><?php echo GetRestaurantInfo($reservation["restaurant_id"])["name"]?></span>
                    
                    <span><?php echo $reservation["date"]?></span>
                    <span><?php echo $reservation["person_count"]?></span>
                    <button type="button" class="btn btn-danger">İPTAL ET</button>
                </form>
            </div>
        </div>
    </div>    
    <?php } ?>
</div>
<div class="modal fade" id="commentModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yorum yapınız</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="label">Rezervasyonunuz için yıldız değeri verin</p>
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
        <p class="label">Düşüncelerinizi paylaşın</p>
        <input type="text" name="comment-text" maxlength="100">
      </div>
      <div class="modal-footer">
        <form action="index.php" method="post"> 
            <button type="submit" class="btn btn-primary">KAYDET</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php 
    if (isset($_POST['button'])){
        if($reservation!=0){
            Delete("reservation","client_id",$_SESSION["client_id"]);
        }
        else{
            header("Location: reservation.php");
         }
    }
    if(isset($_POST["apply"])){
        // Filtre değerlerini burda okuyup uygun şekilde sayfayı reload et
        // Star rating için en son set edilen değer star değerini verir rating5 ise 5 yıldız seçmiştir mesela
    }
?>
<footer>
<a href='https://www.freepik.com/photos/food'>Food photo created by KamranAydinov - www.freepik.com</a>
</footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function() {
        $(".date").datepicker({dateFormat: "dd-mm-yyyy"});
        $(".date").datepicker("setDate", new Date());
    });
</script>
</body>
</html>
