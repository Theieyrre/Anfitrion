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
<div class="container">
    <h1 class="welcome">Hoşgeldiniz, %username%</h1>
    <div class="row">
        <div class="col-2">
            <form action="index.php" method="post">
                <p class="label">Rezervasyon tarihini seçiniz</p>
                <input type="text" name="date" class="date" data-provide="datepicker">
                <p class="label">Hangi mutfaktan istersiniz ?</p>
                <select name="category">
                    <?php 
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
                <input type="submit" value="Uygula" name="apply">
            </form>
        </div>
        <div class="col-6">
            <div class="restaurant">
                <span>%restoran adı%</span>
                <span>%restoran kategori%</span>
                <span>%mevcut rezervasyon%</span>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reservationModal" data-restaurant-name="%restoran adı%" data-date="%date%">
                    Rezerve Et
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="reservationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Rezervasyon detaylarını giriniz</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post">
            <p class="label">Restoran adı</p>
            <input type="text" name="restaurant" class="name" disabled>
            <p class="label">Tarih</p>
            <input type="text" name="date" class="date" disabled>
            <p class="label">Kaç kişi olacaksınız ?</p>
            <input type="number" name="person">
            <p class="label">Ne zaman geleceksiniz ?</p>
            <input type="time" name="hour" min="%restoran_min" max="%restoran_max" required>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">REZERVE ET</button>
      </div>
    </div>
  </div>
</div>
<?php 
    //if(!isset($_SESSION["username"])){
    //    header("Location: login.php");
    //}
    if(isset($_POST["apply"])){
        // Filtre değerlerini burda okuyup uygun şekilde sayfayı reload et
        // Star rating için en son set edilen değer star değerini verir rating5 ise 5 yıldız seçmiştir mesela
    }
?>
<footer>

</footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".date").datepicker({dateFormat: "dd-mm-yyyy"});
        $(".date").datepicker("setDate", new Date());

        $('#reservationModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var name = button.data('restaurant-name')
            var modal = $(this)
            modal.find('.modal-body input.name').val(name)
            modal.find('.modal-body input.name').attr("placeholder",name);
            var date = button.data('date')
            modal.find('.modal-body input.date').val(date)
            modal.find('.modal-body input.date').attr("placeholder",date);
        });
    });
</script>
</body>
</html>