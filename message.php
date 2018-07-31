<?php

include 'header.php';
require_once 'baglan.php';

?>

<?php
if ($_GET['silindi']=='ok'){?>

    <div class="alert alert-success">
       Öğrenci kaydı başarıyla silinmiştir.Odalar Guncellenmistir... <a href="index.php" class="alert-link">Ana Sayfaya Dön</a>.
    </div>


<?php }


elseif ($_GET['silindi']=='no'){?>

    <div class="alert alert-danger">
        Kaydi Silme Islemi gerceklesmedi <a href="" class="alert-link">Yardim</a>.
    </div>



<?php }


?>




<?php
include 'footer.php';
?>