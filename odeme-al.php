<?php

require_once 'header.php';
require_once 'baglan.php';

?>



<!--    Hover Rows  -->
<div class="panel panel-primary">
    <div class="panel-heading">
     <h4><b>Kayitli Ogrenciler</b></h4>
    </div>






    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered  table-hover">

            <thead>
                <tr>

                    <th >Ogrenci ID</th>
                    <th>AD</th>
                    <th>Soyad</th>

                    <th>Kalan Borc</th>
                    <th> Odeme </th>




                </tr>
                </thead>
                <tbody>
<?php
                $borcsor=$db->prepare("SELECT * FROM borc");

              $borcsor->execute();



                while( $borccek=$borcsor->fetch(PDO::FETCH_ASSOC)){  ?>



                <tr>

                    <td><?php echo $borccek['ogr_id'] ?></td>
                    <td><?php echo $borccek['ogr_ad'] ?></td>
                    <td><?php echo $borccek['ogr_soyad'] ?></td>

                    <td><?php echo $borccek['ogr_borc'] ?></td>
                    <td allign="center"><a href="odeme-yap.php?ogr_id=<?php echo $borccek['ogr_id'] ?>"><button class="btn btn-success "> <i class="fa fa-edit" ></i> Odeme Yap  </button></td></a>



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