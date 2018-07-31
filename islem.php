
<?php

ob_start();
session_start();
include 'baglan.php';


//OGRENCI KAYIT KISMI

if (isset($_POST['ogrkayit'])){

    $kaydet=$db->prepare("INSERT INTO ogrenci SET
      ogr_ad=:ogr_ad,
      ogr_soyad=:ogr_soyad,
      ogr_tc=:ogr_tc,
      ogr_telefon=:ogr_telefon,
      ogr_dogum=:ogr_dogum,
      ogr_bolum=:ogr_bolum,
      ogr_mail=:ogr_mail,
      ogr_odano=:ogr_odano,
      ogr_veliad_soyad=:ogr_veliad_soyad,
      ogr_veli_adres=:ogr_veli_adres

");


    $insert=$kaydet->execute(array(
        'ogr_ad'=>$_POST['ogr_ad'],
        'ogr_soyad'=>$_POST['ogr_soyad'],
        'ogr_tc'=>$_POST['ogr_tc'],
        'ogr_telefon'=>$_POST['ogr_telefon'],
        'ogr_dogum'=>$_POST['ogr_dogum'],
        'ogr_bolum'=>$_POST['ogr_bolum'],
        'ogr_mail'=>$_POST['ogr_mail'],
        'ogr_odano'=>$_POST['ogr_odano'],
        'ogr_veliad_soyad'=>$_POST['ogr_veliad_soyad'],
        'ogr_veli_adres'=>$_POST['ogr_veli_adres']


    ));






    if ($insert){





//Kayıt işlemi varsa öğrencileri odaya kaydetme işlemi

$onay=$_POST['ogr_odano'];

$odasor=$db->prepare("SELECT * FROM oda WHERE oda_no=$onay");

$odasor->execute();



$odacek=$odasor->fetch(PDO::FETCH_ASSOC);

       $oda_aktif= $odacek['oda_aktif'];
//Burada oda da ki aktiflik durumu için oda tablosundan oda_aktif çekildi


    $oda_no=$_POST['ogr_odano'];

        $kaydet1=$db->prepare("UPDATE oda SET
      oda_aktif=:oda_aktif
    
      WHERE oda_no={$_POST['ogr_odano']}

");
        $kaydet1->execute(array(
            'oda_aktif'=> $oda_aktif+$_POST['oda_aktif']


        ));




//Borc Tablosuna kayit islemi icin gereken secimi tc numarasi ile kontrol ettim
        $onay=$_POST['ogr_tc'];

        $ogrencisor=$db->prepare("SELECT ogr_id FROM ogrenci WHERE ogr_tc=$onay");

        $ogrencisor->execute();

        $ogrencicek=$ogrencisor->fetch(PDO::FETCH_ASSOC);

        $ogr_id= $ogrencicek['ogr_id'];





        $kaydet2=$db->prepare("INSERT INTO borc SET
         
      ogr_id=:ogr_id,
      ogr_ad=:ogr_ad,
      ogr_soyad=:ogr_soyad
     

");

        $kaydet2->execute(array(
            'ogr_id'=>$ogr_id,
            'ogr_ad'=>$_POST['ogr_ad'],
            'ogr_soyad'=>$_POST['ogr_soyad']


        ));



      Header("Location:ogrenci-kayit.php?durum=ok");
      exit;


    }else{


        Header("Location:ogrenci-kayit.php?durum=no");
        exit;
    }







}


//Gider KAydi

if (isset($_POST['giderkayit'])){

    $kaydet=$db->prepare("INSERT INTO odeme SET
      odeme_elektrik=:odeme_elektrik,
      odeme_su=:odeme_su,
      odeme_yakit=:odeme_yakit,
      odeme_internet=:odeme_internet,
      odeme_gida=:odeme_gida,
      odeme_personel=:odeme_personel,
      odeme_diger=:odeme_diger

");


    $insert=$kaydet->execute(array(
        'odeme_elektrik'=>$_POST['odeme_elektrik'],
        'odeme_su'=>$_POST['odeme_su'],
        'odeme_yakit'=>$_POST['odeme_yakit'],
        'odeme_internet'=>$_POST['odeme_internet'],
        'odeme_gida'=>$_POST['odeme_gida'],
        'odeme_personel'=>$_POST['odeme_personel'],
        'odeme_diger'=>$_POST['odeme_diger']


    ));






    if ($insert){


        Header("Location:gider.php?durum=ok");
        exit;


    }else{


        Header("Location:gider.php?durum=no");
        exit;
    }







}







//OGRENCI DUZENLEME KISMI

if (isset($_POST['updateislem'])){



    $ogr_id=$_POST['ogr_id'];


    $kaydet=$db->prepare("UPDATE ogrenci SET
      ogr_ad=:ogr_ad,
      ogr_soyad=:ogr_soyad,
      ogr_tc=:ogr_tc,
      ogr_telefon=:ogr_telefon,
      ogr_dogum=:ogr_dogum,
      ogr_bolum=:ogr_bolum,
      ogr_mail=:ogr_mail,
      ogr_odano=:ogr_odano,
      ogr_veliad_soyad=:ogr_veliad_soyad,
      ogr_veli_adres=:ogr_veli_adres
      WHERE ogr_id={$_POST['ogr_id']}

");

    $update=$kaydet->execute(array(
        'ogr_ad'=>$_POST['ogr_ad'],
        'ogr_soyad'=>$_POST['ogr_soyad'],
        'ogr_tc'=>$_POST['ogr_tc'],
        'ogr_telefon'=>$_POST['ogr_telefon'],
        'ogr_dogum'=>$_POST['ogr_dogum'],
        'ogr_bolum'=>$_POST['ogr_bolum'],
        'ogr_mail'=>$_POST['ogr_mail'],
        'ogr_odano'=>$_POST['ogr_odano'],
        'ogr_veliad_soyad'=>$_POST['ogr_veliad_soyad'],
        'ogr_veli_adres'=>$_POST['ogr_veli_adres']


    ));

    if ($update){


        //Odasi degistirilen ogrenci icin bu islem yapildi

        $onay2=$_POST['ogr_eskiodano'];

        $odasor2=$db->prepare("SELECT * FROM oda WHERE oda_no=$onay2");

        $odasor2->execute();



        $odacek2=$odasor2->fetch(PDO::FETCH_ASSOC);

        $oda_aktif1= $odacek2['oda_aktif'];
//Burada ESKI oda da ki aktiflik durumu için oda tablosundan oda_aktif çekildi




        $kaydet3=$db->prepare("UPDATE oda SET
      oda_aktif=:oda_aktif
    
      WHERE oda_no={$_POST['ogr_eskiodano']}

");
        $kaydet3->execute(array(
            'oda_aktif'=> $oda_aktif1-1


        ));



        //Kayıt işlemi varsa öğrencileri odaya kaydetme işlemi

        $onay=$_POST['ogr_odano'];

        $odasor=$db->prepare("SELECT * FROM oda WHERE oda_no=$onay");

        $odasor->execute();



        $odacek=$odasor->fetch(PDO::FETCH_ASSOC);

        $oda_aktif= $odacek['oda_aktif'];
//Burada oda da ki aktiflik durumu için oda tablosundan oda_aktif çekildi


        $oda_no=$_POST['ogr_odano'];

        $kaydet1=$db->prepare("UPDATE oda SET
      oda_aktif=:oda_aktif
    
      WHERE oda_no={$_POST['ogr_odano']}

");
        $kaydet1->execute(array(
            'oda_aktif'=> $oda_aktif+$_POST['oda_aktif']


        ));







      Header("Location:ogrenci-kayit-duzenle.php?durum=ok&ogr_id=$ogr_id");
      exit;


    }else{


        Header("Location:ogrenci-kayit-duzenle.php?durum=no&ogr_id=$ogr_id");
        exit;
    }

}


//Gider Duzenleme Kismi

if (isset($_POST['giderupdate'])){



    $odeme_id=$_POST['odeme_id'];


    $kaydet=$db->prepare("UPDATE odeme SET
      odeme_elektrik=:odeme_elektrik,
      odeme_su=:odeme_su,
      odeme_yakit=:odeme_yakit,
      odeme_internet=:odeme_internet,
      odeme_gida=:odeme_gida,
      odeme_personel=:odeme_personel,
      odeme_diger=:odeme_diger
      WHERE odeme_id={$_POST['odeme_id']}

");

    $update=$kaydet->execute(array(
        'odeme_elektrik'=>$_POST['odeme_elektrik'],
        'odeme_su'=>$_POST['odeme_su'],
        'odeme_yakit'=>$_POST['odeme_yakit'],
        'odeme_internet'=>$_POST['odeme_internet'],
        'odeme_gida'=>$_POST['odeme_gida'],
        'odeme_personel'=>$_POST['odeme_personel'],
        'odeme_diger'=>$_POST['odeme_diger']


    ));

    if ($update){


        Header("Location:gider-duzenle.php?durum=ok&ogr_id=$ogr_id");
        exit;


    }else{


        Header("Location:gider-duzenle.php?durum=no&ogr_id=$ogr_id");
        exit;
    }

}




//Odeme islemi
if (isset($_POST['odemeislem'])) {

    $ogr_id = $_POST['ogr_id'];


    $kaydet3 = $db->prepare("UPDATE borc SET
      ogr_id=:ogr_id,
      ogr_borc=:ogr_borc
      WHERE ogr_id={$_POST['ogr_id']}

");

    $insert3 = $kaydet3->execute(array(
        'ogr_id'=>$_POST['ogr_id'],
        'ogr_borc' => $_POST['ogr_borc']-$_POST['ogr_odenen']


    ));

    if ($insert3) {


        $kaydet4 = $db->prepare("INSERT INTO kasa SET
      kasa_ay=:kasa_ay,
      kasa_miktar=:kasa_miktar
   

");

         $kaydet4->execute(array(
            'kasa_ay'=>$_POST['kasa_ay'],
            'kasa_miktar' =>$_POST['ogr_odenen']


        ));


        Header("Location:odeme-al.php?durum=ok&ogr_id=$ogr_id");
        exit;


    } else {


        Header("Location:odeme-al.php?durum=no&ogr_id=$ogr_id");
        exit;
    }


}




//Ogrenci kaydi duzenleme iptal islemi
if (isset($_POST['iptal'])) {


    Header("Location:ogrenci-liste.php");
    exit;


}

//Gider Duzenleme Iptal Islemi
if (isset($_POST['gideriptal'])) {


    Header("Location:gider-liste.php");
    exit;


}
//Login islemi

if (isset($_POST['loggin'])){



$kullanici_adi=$_POST['admin_kadi'];
$kullanici_parola=$_POST['admin_parola'];


    $kullanicisor=$db->prepare("SELECT * FROM admin WHERE admin_kadi=:kadi AND admin_parola=:parola");

    $kullanicisor->execute(array(

        'kadi'=>$kullanici_adi,
        'parola'=>$kullanici_parola,


    ));
$sayac=$kullanicisor->rowCount();

if ($sayac==1){

$_SESSION['kullanici_adi']=$kullanici_adi;
    header("Location:index.php");


}else{

    header("Location:login.php?durum=no");
exit;
}








}



//BOLUM DUZENLEME KISMI

if (isset($_POST['bupdateislem'])){

    $bolum_id=$_POST['bolum_id'];


    $kaydet=$db->prepare("UPDATE bolum SET
      bolum_ad=:bolum_ad,
      
      WHERE bolum_id={$_POST['bolum_id']}

");

    $insert=$kaydet->execute(array(
        'bolum_ad'=>$_POST['bolum_ad']




    ));

    if ($insert){


        Header("Location:bolum-duzenle.php?durum=ok&bolum_id=$bolum_id");
        exit;


    }else{


        Header("Location:bolum-duzenle.php?durum=no&bolum_id=$bolum_id");
        exit;
    }







}

//OGRENCI SILME KISMI

if ($_GET['ogrsil']=="ok"){


    //Silme ve oda aktifligini duzeltme
    $ret=$_GET['ogr_odano'];


    $odasor=$db->prepare("SELECT * FROM oda WHERE oda_no=$ret");

    $odasor->execute();



    $odacek=$odasor->fetch(PDO::FETCH_ASSOC);

    $artis= $odacek['oda_aktif'];

    $oda_no=$_GET['ogr_odano'];

    $kaydet=$db->prepare("UPDATE oda SET
      oda_aktif=:oda_aktif
    
      WHERE oda_no={$_GET['ogr_odano']}

");
    $kaydet->execute(array(
        'oda_aktif'=> $artis-1


    ));


    //aktiflik duzeltme son



    //----------------------------------------------------//
    $silborc=$db->prepare("DELETE FROM borc WHERE ogr_id=:id");
    $kontrolborc=$silborc->execute(array(

        'id'=>$_GET['ogr_id']
    ));
//---------------------------------------------------------//
    //Silme islemi
    $sil=$db->prepare("DELETE FROM ogrenci WHERE ogr_id=:id");
    $kontrol=$sil->execute(array(

        'id'=>$_GET['ogr_id']
    ));



     //Sayfa Yonlendirme
      if ($kontrol){


          Header("Location:message.php?silindi=ok");
          exit;


      }else{


          Header("Location:message.php?silindi=no");
          exit;
      }





}

//Gider Silme Kismi

if ($_GET['odemesil']=="ok"){



//---------------------------------------------------------//
    //Silme islemi
    $sil=$db->prepare("DELETE FROM odeme WHERE odeme_id=:id");
    $kontrol=$sil->execute(array(

        'id'=>$_GET['odeme_id']
    ));



    //Sayfa Yonlendirme
    if ($kontrol){


        Header("Location:message.php?silindi=ok");
        exit;


    }else{


        Header("Location:message.php?silindi=no");
        exit;
    }





}




