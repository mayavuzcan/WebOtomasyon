<?php
require_once 'header.php';
require_once 'baglan.php';
?>



<?php
if ($_GET['durum']=='ok'){?>

    <div class="alert alert-success">
        <strong>Basarili!!</strong>Ogrenci bilgileri basariyla guncellendi
    </div>

<?php }


elseif ($_GET['durum']=='no'){?>

    <div class="alert alert-danger">
        <strong>Basarisiz!</strong> Ogrenci Bilgileri Guncellenemedi
    </div>


<?php }

?>


<?php
//id sorgulamali PDO SELECT ISLEMI
$borcsor=$db->prepare("SELECT * FROM borc WHERE ogr_id=:id");

$borcsor->execute(array(

    'id'=>$_GET['ogr_id']

));


 $borccek=$borcsor->fetch(PDO::FETCH_ASSOC)
?>





      <div class="panel panel-info">

               <div class="panel-heading">
                  Odeme Formu
               </div>

          <div class="panel-body">
                   <form action="islem.php" method="post">

                       <div class="form-group">
                           <label>Adı</label>

                           <input disabled class="form-control" type="text" required name="ogr_ad" value="<?php echo $borccek['ogr_ad']?>">

                           <input type="hidden" required name="ogr_ad" value="<?php echo $borccek['ogr_ad']?>">

                       </div>

                       <div class="form-group">

                                   <label>Soyadı</label>

                           <input disabled class="form-control" type="text" required name="ogr_soyad" value="<?php echo $borccek['ogr_soyad']?>">

                           <input class="form-control" type="hidden" required name="ogr_soyad" value="<?php echo $borccek['ogr_soyad']?>">

                       </div>

                       <div class="form-group">

                                   <label>Ogrenci ID</label>

                           <input disabled class="form-control" type="text" required value="<?php echo $borccek['ogr_id'] ?>" name="ogr_id">

                           <input  type="hidden" required value="<?php echo $borccek['ogr_id'] ?>" name="ogr_id">

                       </div>

                       <div class="form-group">

                           <label>Kalan Borc</label>

                           <input disabled class="form-control" type="text" required value="<?php echo $borccek['ogr_borc'] ?>" name="ogr_borc">


                           <!--Disabled ile deger ilsem php kullanilmadigi icin degerleri ayriyeten hidden olarak gonderdik -->
                           <input type="hidden" required value="<?php echo $borccek['ogr_borc'] ?>" name="ogr_borc">

                       </div>

                       <div class="form-group">

                           <label>Odenen</label>

                           <input class="form-control" type="text" required placeholder="Odenen miktari giriniz" name="ogr_odenen">

                       </div>

                       <div class="form-group">

                           <label>Odenen Ay</label>

                           <input class="form-control" type="text" required placeholder="Odenen Ayi" name="kasa_ay">

                       </div>







                       <div class="form-group col-md-12">
                           <button type="submit" class="btn btn-info col-md-6" name="odemeislem">  Odeme Onayi </button>
                           <a href="odeme-al.php"><button  class="btn btn-warning col-md-6 " name="iptal" > Odeme Iptal </button></a>
                       </div>

                   </form>
          </div>
      </div>



    <?php
     include 'footer.php';
     ?>
