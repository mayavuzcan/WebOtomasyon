<?php

require_once 'header.php';
require_once 'baglan.php';

?>



<!--    Hover Rows  -->
<div class="panel panel-primary">
    <div class="panel-heading">
     <h4><b>Bolumler</b></h4>
    </div>



    <?php
    //PDO SELECT ISLEMI

    $bolumsor=$db->prepare("SELECT * FROM bolum  ");

    $bolumsor->execute();

    $bolumcek=$bolumsor->fetch(PDO::FETCH_ASSOC);




    ?>


    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>

                    <th>Bolum ID</th>
                    <th>Bolum Ad</th>
                    <th >islemler</th>


                </tr>
                </thead>
                <tbody>
<?php
                $bolumcek=$db->prepare("SELECT * FROM bolum  ");

                $bolumsor->execute();



                while( $bolumcek=$bolumsor->fetch(PDO::FETCH_ASSOC)){  ?>



                <tr>

                    <td><?php echo $bolumcek['bolum_id'] ?></td>
                    <td><?php echo $bolumcek['bolum_ad'] ?></td>



                    <td allign="center"><a href="bolum-duzenle.php?bolum_id=<?php echo $bolumcek['bolum_id'] ?>">
                            <button class="btn btn-success"> <i class="fa fa-edit"></i> Duzenle  </button></td></a>

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