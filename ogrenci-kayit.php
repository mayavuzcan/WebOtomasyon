<?php
include 'header.php';
require_once 'baglan.php';

?>

<?php
if ($_GET['durum']=='ok'){?>

    <div class="alert alert-success">
  <strong>Öğrenci Kaydedildi!</strong> Öğrenci kaydı yapıldı ve başarıyla odasına yerleştirildi.
   </div>

<?php }


elseif ($_GET['durum']=='no'){?>

    <div class="alert alert-danger">
  <strong>Success!</strong> Indicates a successful or positive action.
   </div>


<?php }


?>








      <div class="panel panel-primary">

          <div class="panel-heading">
                <h5> <b>Öğrenci Kayıt Sayfasi</b>  </h5>
               </div>

          <div class="panel-body">
                   <form action="islem.php" method="post">

                       <div class="form-group">
                           <label>Adı*</label>
                           <input required class="form-control" type="text"  name="ogr_ad" placeholder="Öğrenci Adını giriniz">

                       </div>

                       <div class="form-group">

                                   <label>Soyadı*</label>
                                   <input  required class="form-control" type="text"  name="ogr_soyad" placeholder="Öğrenci Soyadını Giriniz">

                       </div>

                       <div class="form-group">

                                   <label>TC*</label>
                           <input required class="form-control" type="text"  name="ogr_tc" placeholder="Öğrenci TC numarasini Giriniz">

                       </div>
                       <div class="form-group">

                           <label>Dogum Tarihiniz</label>
                           <input class="form-control" type="text"   name="ogr_dogum" placeholder="Öğrenci Dogum Tarihini Giriniz">

                       </div>
                       <div class="form-group">

                           <label for="sel2">Bolum</label>

                           <select  class="form-control" name="ogr_bolum"  id="sel2">
                           <?php


                           //Secimli Input icin bu kodlari kullandim (Bolumler Icin)

                           $bolumsor=$db->prepare("SELECT * FROM bolum ORDER BY bolum_ad");

                           $bolumsor->execute();



                           while( $bolumcek=$bolumsor->fetch(PDO::FETCH_ASSOC)){  ?>

                               <option><?php echo $bolumcek['bolum_ad'] ?></option>


                           <?php } ?>

                           </select>
                       </div>
                       <div class="form-group">

                                   <label>Telefon</label>
                           <input class="form-control" type="text"  name="ogr_telefon" placeholder="Öğrenci Cep Telefonunu Giriniz">

                       </div>

                       <div class="form-group">

                                   <label>Mail</label>
                           <input class="form-control" type="text"  name="ogr_mail" placeholder="Öğrenci Mailini Giriniz">

                       </div>



                       <div class="form-group">

                                   <label for="sel1">Oda No</label>

                           <select class="form-control" name="ogr_odano"  id="sel1">
                               <?php


                               //Secimli Input icin bu kodlari kullandim

                               $odasor=$db->prepare("SELECT * FROM oda WHERE oda_kapasite != oda_aktif");

                               $odasor->execute();



                               while( $odacek=$odasor->fetch(PDO::FETCH_ASSOC)){  ?>

                               <option><?php echo $odacek['oda_no'] ?></option>


                               <?php } ?>

                               <!-- Php kodunu kapattim html kodlari basladi Oda Numarasi icin-->

                           </select>




                       </div>



                       <div class="form-group">

                                   <label>Veli Adı Soyadı</label>
                           <input class="form-control"  type="text" name="ogr_veliad_soyad" placeholder="Öğrenci Veli Ad Soyadını Giriniz">

                       </div>
                       <div class="form-group">


                           <div class="form-group">
                               <label for="comment">Veli Adresi:</label>
                               <textarea class="form-control" rows="5" name="ogr_veli_adres" ></textarea>
                           </div>



                       </div>

                       <div>



                               <input type="hidden" value="1" name="oda_aktif">
                          <?php
                           $odasor=$db->prepare("SELECT * FROM oda");

                           $odasor->execute();



                          $odacek=$odasor->fetch(PDO::FETCH_ASSOC)  ?>


                           <input type="hidden" value="<?php echo $odacek['oda_aktif'] ?>" name="norm">



                       </div>




                               <button type="submit" class="btn btn-info" name="ogrkayit"> Kaydı Oluştur </button>

                   </form>
          </div>
      </div>


    <?php
     include 'footer.php';
     ?>
