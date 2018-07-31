
<?php
ob_start();
session_start();
include 'baglan.php';

if (!isset($_SESSION['kullanici_adi'])){


    header("Location:login.php");


}

?>





<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>YURTO</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">

                <a class="navbar-brand" href="index.php">YURTO</a>
            </div>

            <div class="header-right">

                <a href="logout.php" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">

                            <img src="assets/img/user.png" class="img-thumbnail" />

                            <div class="inner-text">
                               <b><i><?php echo  $_SESSION['kullanici_adi']?></i></b>

                            </div>
                        </div>

                    </li>


                    <li>
                        <a class="active-menu" href="index.php"><i class="fa fa-dashboard "></i>Ana Bölüm</a>
                    </li>


                    <li>
                        <a href="ogrenci-kayit.php"><i class="fa fa-plus-circle"></i>Kayıt</a>
                    </li>


                    <li>
                        <a  href="ogrenci-liste.php"><i class="fa fa-users "></i>Ogrenci Listesi</a>
                    </li>


                    <li>
                        <a href="bolum-liste.php"><i class="fa fa-edit "></i>Bolum Listesi</a>
                    </li>


                    <li>
                        <a href="odeme-al.php"><i class="fa fa-credit-card "></i>Odeme Al</a>
                    </li>


                    <li>
                        <a href="gider.php"><i class="fa fa-edit "></i>Gider</a>
                    </li>

                    <li>
                        <a href="gider-liste.php"><i class="fa fa-edit "></i>Gider Listele</a>
                    </li>

                    <li>
                        <a href="kasa.php"><i class="fa fa-dollar "></i>Kasa</a>
                    </li>









                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
