<?php
include 'header.php';
require_once 'baglan.php';

?>

<?php
if ($_GET['durum']=='ok'){?>

    <div class="alert alert-success">
  <strong>Giderler Kaydedildi!</strong>
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
                           <label>Elektrik</label>
                           <input required class="form-control" type="text"  name="odeme_elektrik" placeholder="Elektrik Giderini Giriniz">

                       </div>

                       <div class="form-group">

                                   <label>Su</label>
                                   <input  required class="form-control" type="text"  name="odeme_su" placeholder="Su Giderini Giriniz">

                       </div>

                       <div class="form-group">

                                   <label>Yakit</label>
                           <input required class="form-control" type="text"  name="odeme_yakit" placeholder="Yakit Giderini Giriniz">

                       </div>
                       <div class="form-group">

                           <label>Internet</label>
                           <input class="form-control" type="text"   name="odeme_internet" placeholder="Internet Giderini Giriniz">

                       </div>

                       <div class="form-group">

                                   <label>Gida</label>
                           <input class="form-control" type="text"  name="odeme_gida" placeholder="Gida Giderini Giriniz">

                       </div>
                       <div class="form-group">

                           <label for="sel2">Personel</label>

                           <input class="form-control" type="text"  name="odeme_personel" placeholder="Personel Giderini Giriniz">


                       </div>

                       <div class="form-group">

                                   <label>Diger</label>
                           <input class="form-control" type="text"  name="odeme_diger" placeholder="Diger Giderini Giriniz">

                       </div>




                       <button type="submit" class="btn btn-info" name="giderkayit"> Gider Kaydet </button>

                   </form>
          </div>
      </div>


    <?php
     include 'footer.php';
     ?>
