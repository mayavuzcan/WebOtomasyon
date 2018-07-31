<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Yurto</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <style>
        body {
            background-image: url("assets/img/bg.jpg");


            background-attachment: fixed;
            -moz-background-size: 100% 100%;
            -o-background-size: 100% 100%;
            -webkit-background-size:  100% 100%;
            background-size:  100% 100%;
        }

    </style>



</head>
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:200px;">
            <div class="col-md-12">

            </div>
        </div>
         <div class="row ">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">

                  <?php  if ($_GET['login']=='no'){?>

                    <div class="alert alert-danger">
                        <strong>Basarisiz!!</strong>Kullanici adi veya sifre yanlis.
                    </div>


                    <?php }


                    ?>
                            <div style=" background-color:#1ab7ea ;margin-top: 40px;opacity: 0.9;" class=" panel-body">
                                <form action="islem.php" method="post">


                                    <div style="text-align: center;"> <h3><b style="font-family: 'Gothic Uralic';font-size: 40px">YURTO</b></h3></div>
                                    <br />

                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" name="admin_kadi" placeholder="Kullanici Adi " />
                                     </div>

                                    <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" name="admin_parola" placeholder="Parola" />
                                    </div>



                                    <button style="width: 100%" class="btn btn-danger" name="loggin" type="submit"> Giris Yap</button>
                                      <hr/>
                                   
                                    </form>
                            </div>
                           
                </div>
                
                
        </div>
    </div>

</body>
</html>
