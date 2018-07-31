<?php

require_once 'header.php';
require_once 'baglan.php';

?>



<!--    Hover Rows  -->
<div class="panel panel-primary">
    <div class="panel-heading">
     <h4><b>Kayitli Ogrenciler</b></h4>
    </div>



    <?php
    //PDO SELECT ISLEMI

    $ogrencisor=$db->prepare("SELECT * FROM ogrenci");

    $ogrencisor->execute();

    $ogrencicek=$ogrencisor->fetch(PDO::FETCH_ASSOC);




    ?>


    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered  table-hover">

            <thead>
                <tr>
                    <th>S.No</th>
                    <th>AD</th>
                    <th>Soyad</th>
                    <th>TC Numarasi</th>
                    <th >islemler</th>
                    <th >islemler</th>


                </tr>
                </thead>
                <tbody>
<?php
                $ogrencisor=$db->prepare("SELECT * FROM ogrenci");

                $ogrencisor->execute();

                $say=0;

                while( $ogrencicek=$ogrencisor->fetch(PDO::FETCH_ASSOC)){ $say++; ?>



                <tr>
                     <td><?php echo $say?></td>

                    <td><?php echo $ogrencicek['ogr_ad'] ?></td>
                    <td><?php echo $ogrencicek['ogr_soyad'] ?></td>
                    <td><?php echo $ogrencicek['ogr_tc'] ?></td>
                    <td allign="center"><a href="ogrenci-kayit-duzenle.php?ogr_id=<?php echo $ogrencicek['ogr_id'] ?>"><button class="btn btn-success "> <i class="fa fa-edit" ></i> Duzenle  </button></td></a>
                    <td allign="center"><a href="islem.php?ogr_id=<?php echo $ogrencicek['ogr_id'] ?>&ogr_odano=<?php echo $ogrencicek['ogr_odano'] ?>&ogrsil=ok"><button class="btn btn-danger"> <i class="glyphicon glyphicon-remove"></i> Sil  </button></td></a>

                </tr>


                 <?php } ?>


                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End  Hover Rows  -->

<?php

require_once 'footer.php';

?>