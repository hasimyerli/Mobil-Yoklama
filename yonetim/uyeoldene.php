<?php


    define('ADMIN', true);  
    require_once "../system/baglan.php";
    require_once "../system/func.php";

 
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Mosaddek">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Üye ol</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>


       <?php
                 
                 if ($_POST){
          $ad = p("ad");
                    $soyad = p("soyad");
                    $k_adi= p("kadi");
                    $sifre= p("sifre");
                    $sifre2= p("sifre2");
                    $email= p("mail");
                    $telefon= p("telefon");
      

                    if (!$ad || !$soyad || !$k_adi || !$sifre || !$sifre2 | $email ){

                      echo "<div class='alert alert-block alert-danger fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Hata !</strong> Gerekli Alanları Doldurun!
                              </div>";

                    }else{

                      if ($sifre==$sifre2){

                     $insert = query("INSERT INTO kullanici SET 
                      ad='$ad',
                     soyadi  = '$soyad',
                     Kullaniciadi  = '$k_adi',
                     sifre  = '$sifre',
                     email  = '$email',
                     telefon  = '$telefon'");



                     if($insert){
                     
                     echo "<div class='alert alert-success fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Başarılı!</strong> Ders başarıyla eklendi.
                              </div>";

                    go(URL."/yonetim/index.php?do=".g("do"),1);

                     }else{
                       echo "<div class='alert alert-block alert-danger fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Hata!</strong> Ders eklenemedi.
                              </div>";
                     }
}
else
{
    echo "<div class='alert alert-block alert-danger fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Hata !</strong>Şifreler eşleşmiyor!
                              </div>";
}

                    }

                 }



                ?>






                <body class="login-body">

                <div class="container">
  
  
              <div class="form-signin">
             <h2 class="form-signin-heading">KAYIT PANELİ</h2>
           <div class="login-wrap">
             <form action="" method="post">
            <input type="text" class="form-control" name="ad" placeholder="Ad" autofocus>
             <input type="text" class="form-control" name="soyad" placeholder="Soyad" autofocus>
             <input type="text" class="form-control" name="kadi" placeholder="Kullanici adi" autofocus>
            <input type="password" class="form-control" name="sifre" placeholder="Şifre">
            <input type="password" class="form-control" name="sifre2" placeholder="Şifre tekrar">
       <input type="text" class="form-control" name="mail" placeholder="Email" autofocus>
        <input type="text" class="form-control" name="telefon" placeholder="Telefon" autofocus>
            <button class="btn btn-lg btn-login btn-block" type="submit">kayıt ol</button>
            </form>
            <p></p>
            

        </div>

            
		                 
     

          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="button">Submit</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->

      </form>

    </div>





   <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <script src="js/jquery.customSelect.min.js" ></script>
    <script src="js/respond.min.js" ></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/count.js"></script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
        autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
