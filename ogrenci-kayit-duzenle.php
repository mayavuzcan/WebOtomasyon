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

$ogrencisor=$db->prepare("SELECT * FROM ogrenci WHERE ogr_id=:id");

$ogrencisor->execute(array(

'id'=>$_GET['ogr_id']

));

$ogrencicek=$ogrencisor->fetch(PDO::FETCH_ASSOC);

?>





      <div class="panel panel-info">

               <div class="panel-heading">
                  Öğrenci Kayıt Sayfasi
               </div>

          <div class="panel-body">
                   <form action="islem.php" method="post">

                       <div class="form-group">
                           <label>Adı</label>
                           <input class="form-control" type="text" required name="ogr_ad" value="<?php echo $ogrencicek['ogr_ad']?>">

                       </div>

                       <div class="form-group">

                                   <label>Soyadı</label>

                           <input class="form-control" type="text" required name="ogr_soyad" value="<?php echo $ogrencicek['ogr_soyad']?>">

                       </div>

                       <div class="form-group">

                                   <label>TC</label>

                           <input class="form-control" type="text" required name="ogr_tc" value="<?php echo $ogrencicek['ogr_tc']?>">

                       </div>
                       <div class="form-group">

                                   <label>Dogum Tarihini</label>

                           <input class="form-control" type="text"  required name="ogr_dogum" value="<?php echo $ogrencicek['ogr_dogum']?>">

                       </div>
                       <div class="form-group">

                           <label>Ogrencinin Kayitli Oldugu Bolum</label>

                           <input class="form-control"  disabled="readonly" type="text"   value="<?php echo $ogrencicek['ogr_bolum']?>">

                       </div>

                       <div class="form-group">
                           <label for="sel1">Diger Bolumler</label>

                           <select class="form-control" name="ogr_bolum" required id="sel1">
                               <?php


                               //Secimli Input icin bu kodlari kullandim (Bolumler Icin)

                               $bolumsor=$db->prepare("SELECT * FROM bolum");

                               $bolumsor->execute();



                               while( $bolumcek=$bolumsor->fetch(PDO::FETCH_ASSOC)){  ?>

                                   <option><?php echo $bolumcek['bolum_ad'] ?></option>


                               <?php } ?>

                           </select>
                       </div>

                       <div class="form-group">

                                   <label>Telefon</label>

                           <input class="form-control" type="text" required name="ogr_telefon" value="<?php echo $ogrencicek['ogr_telefon']?>">

                       </div>

                       <div class="form-group">

                                   <label>Mail</label>

                           <input class="form-control" type="text" required name="ogr_mail" value="<?php echo $ogrencicek['ogr_mail']?>">

                       </div>
                       <div class="form-group">

                                   <label>Ogrencinin Odasi</label>

                           <input class="form-control" disabled type="text" name="ogr_eskiodano"  value="<?php echo $ogrencicek['ogr_odano']?>">


                       <!-- Kullaniciya bilgi verildikten sonra eski odano adresi islem php ye gizli gondererek islem yapmak icin -->
                           <input class="form-control" type="hidden" name="ogr_eskiodano"  value="<?php echo $ogrencicek['ogr_odano']?>">



                       </div>


                       <div class="form-group">
                       <label for="sel1">Bos odalar</label>

                       <select class="form-control" name="ogr_odano" required id="sel1">
                           <?php


                           //Secimli Input

                           $odasor=$db->prepare("SELECT oda_no FROM oda WHERE oda_kapasite != oda_aktif");

                           $odasor->execute();



                           while( $odacek=$odasor->fetch(PDO::FETCH_ASSOC)){  ?>

                               <option><?php echo $odacek['oda_no'] ?></option>


                           <?php } ?>

                           <!-- Php kodunu kapattim html kodlari basladi Oda Numarasi icin-->

                       </select>
                       </div>
                       <div class="form-group">

                                   <label>Veli Adı Soyadı</label>

                           <input class="form-control" required type="text" name="ogr_veliad_soyad" value="<?php echo $ogrencicek['ogr_veliad_soyad']?>">

                       </div>



                       <div class="form-group">

                               <label for="comment">Veli Adresi:</label>
                               <textarea class="form-control" rows="5" name="ogr_veli_adres" id="veliadres" value="<?php echo $ogrencicek['ogr_veli_adres']?>" ></textarea>
                       </div>

                       <div>



                           <input type="hidden" value="1" name="oda_aktif">
                           <?php
                           $odasor=$db->prepare("SELECT * FROM oda");

                           $odasor->execute();



                           $odacek=$odasor->fetch(PDO::FETCH_ASSOC)  ?>


                           <input type="hidden" value="<?php echo $odacek['oda_aktif'] ?>" name="norm">



                       </div>




                       <input type="hidden" value="<?php echo $ogrencicek['ogr_id'] ?>" name="ogr_id">

                       <div class="form-group col-md-12">
                           <button type="submit" class="btn btn-info col-md-6" name="updateislem"> Kaydı Duzenle </button>
                           <a href="ogrenci-liste.php"><button  class="btn btn-warning col-md-6 " name="iptal" > Iptal </button></a>
                       </div>

                   </form>
          </div>
      </div>



    <?php
     include 'footer.php';
     ?>
