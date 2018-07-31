<?php

require_once 'header.php';
require_once 'baglan.php';

?>



<!--    Hover Rows  -->
<div class="panel panel-primary">
    <div class="panel-heading">
     <h4><b>Gider Listesi</b></h4>
    </div>



    <?php
    //PDO SELECT ISLEMI

    $gidersor=$db->prepare("SELECT * FROM odeme");

    $gidersor->execute();

    $gidercek=$gidersor->fetch(PDO::FETCH_ASSOC);




    ?>


    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered  table-hover">
                <thead>
                <tr>

                    <th>Ay</th>
                    <th>Elektrik</th>
                    <th>Su</th>
                    <th>Yakit</th>
                    <th>Internet</th>
                    <th>Gida</th>
                    <th>Personel</th>
                    <th>Diger</th>
                    <th>islemler</th>
                    <th>islemler</th>


                </tr>
                </thead>
                <tbody>
<?php
                $gidersor=$db->prepare("SELECT * FROM odeme");

                $gidersor->execute();

                $say;

                while( $gidercek=$gidersor->fetch(PDO::FETCH_ASSOC)){ $say++; ?>



                <tr class="success">


                    <td><?php echo $say ?></td>
                    <td><?php echo $gidercek['odeme_elektrik']?></td>
                    <td><?php echo $gidercek['odeme_su'] ?></td>
                    <td><?php echo $gidercek['odeme_yakit'] ?></td>
                    <td><?php echo $gidercek['odeme_internet'] ?></td>
                    <td><?php echo $gidercek['odeme_gida'] ?></td>
                    <td><?php echo $gidercek['odeme_personel'] ?></td>
                    <td><?php echo $gidercek['odeme_diger'] ?></td>
                    <td ><a href="gider-duzenle.php?odeme_id=<?php echo $gidercek['odeme_id'] ?>"><button class="btn btn-success "> <i class="fa fa-edit" ></i> Duzenle  </button></td></a>
                    <td  ><a href="islem.php?odeme_id=<?php echo $gidercek['odeme_id'] ?>&odemesil=ok"><button class="btn btn-danger"> <i class="glyphicon glyphicon-remove"></i> Sil  </button></td></a>

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