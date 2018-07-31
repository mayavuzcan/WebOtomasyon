<?php

require_once 'header.php';
require_once 'baglan.php';

?>



<!--    Hover Rows  -->
<div class="panel panel-primary">
    <div class="panel-heading">
     <h4><b>Kasa</b></h4>
    </div>



    <?php
    //PDO SELECT ISLEMI

    $kasasor=$db->prepare("SELECT SUM(kasa_miktar) FROM kasa");

    $kasasor->execute();

    $kasacek=$kasasor->fetch(PDO::FETCH_ASSOC);




    ?>


    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>


                    <th style="margin-left: 300pt">--Kasadaki Para--</th>




                </tr>
                </thead>
                <tbody>
<?php
$kasasor=$db->prepare("SELECT  SUM(kasa_miktar) AS toplam FROM kasa");

$kasasor->execute();



                 $kasacek=$kasasor->fetch(PDO::FETCH_ASSOC) ?>



                <tr>


                    <td style="background-color: #5cb85c" ><?php echo $kasacek['toplam'] ?></td>




                </tr>





                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End  Hover Rows  -->

<?php

require_once 'footer.php';

?>