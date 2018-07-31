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

$gidersor=$db->prepare("SELECT * FROM odeme WHERE odeme_id=:id");

$gidersor->execute(array(

'id'=>$_GET['odeme_id']

));

$gidercek=$gidersor->fetch(PDO::FETCH_ASSOC);

?>





      <div class="panel panel-info">

               <div class="panel-heading">
                  Öğrenci Kayıt Sayfasi
               </div>

          <div class="panel-body">
                   <form action="islem.php" method="post">

                       <div class="form-group">
                           <label>Elektrik</label>
                           <input class="form-control" type="text" required name="odeme_elektrik" value="<?php echo $gidercek['odeme_elektrik']?>">

                       </div>

                       <div class="form-group">

                                   <label>Su</label>

                           <input class="form-control" type="text" required name="odeme_su" value="<?php echo $gidercek['odeme_su']?>">

                       </div>

                       <div class="form-group">

                                   <label>Yakit</label>

                           <input class="form-control" type="text" required name="odeme_yakit" value="<?php echo $gidercek['odeme_yakit']?>">

                       </div>
                       <div class="form-group">

                                   <label>Internet</label>

                           <input class="form-control" type="text"  required name="odeme_internet" value="<?php echo $gidercek['odeme_internet']?>">

                       </div>
                       <div class="form-group">

                           <label>Gida</label>

                           <input class="form-control" type="text"  required name="odeme_gida" value="<?php echo $gidercek['odeme_gida']?>">

                       </div>



                       <div class="form-group">

                                   <label>Personel</label>

                           <input class="form-control" type="text" required name="odeme_personel" value="<?php echo $gidercek['odeme_personel']?>">

                       </div>

                       <div class="form-group">

                                   <label>Diger</label>

                           <input class="form-control" type="text" required name="odeme_diger" value="<?php echo $gidercek['odeme_diger']?>">

                       </div>






                       <input type="hidden" value="<?php echo $gidercek['odeme_id'] ?>" name="odeme_id">











                       <div class="form-group col-md-12">
                           <button type="submit" class="btn btn-info col-md-6" name="giderupdate"> Kaydı Duzenle </button>
                           <a href="gider-liste.php"><button  class="btn btn-warning col-md-6 " name="gideriptal" > Iptal </button></a>
                       </div>

                   </form>
          </div>
      </div>



    <?php
     include 'footer.php';
     ?>
