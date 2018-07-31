<?php
require_once 'header.php';
require_once 'baglan.php';
?>



<?php
if ($_GET['durum']=='ok'){

    echo "Islem Basarili";

}elseif ($_GET['durum']=='no'){

    echo "Islem Basarisiz";

}

?>



<?php
//id sorgulamali PDO SELECT ISLEMI

$bolumsor=$db->prepare("SELECT * FROM bolum WHERE bolum_id=:id");

$bolumsor->execute(array(

'id'=>$_GET['bolum_id']

));

$bolumcek=$bolumsor->fetch(PDO::FETCH_ASSOC);

?>





      <div class="panel panel-info">

               <div class="panel-heading">
                 Bolum Duzenleme
               </div>

          <div class="panel-body">
                   <form action="islem.php" method="post">

                       <div class="form-group">
                           <label>Bolum Adı</label>
                           <input class="form-control" type="text" required name="bolum_ad" value="<?php echo $bolumcek['bolum_ad']?>">

                       </div>



                       <input type="hidden" value="<?php echo $bolumcek['bolum_id'] ?>" name="bolum_id">

                               <button type="submit" class="btn btn-info" name="bupdateislem"> Bolumu Duzenle </button>

                   </form>
          </div>
      </div>



    <?php
     include 'footer.php';
     ?>
