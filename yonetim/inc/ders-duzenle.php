<?php


  $id  = g("id");
  $query = query("SELECT * FROM dersler WHERE id = '$id'");
  if (mysql_affected_rows() < 1){
    go(URL."/yonetim/index.php?do=dersler");
    exit;
  }
  $row = row($query);
  
?>
 <script type="text/javascript">
jQuery(function($){
   $("#input").mask("9999");
});
</script>
  <script type="text/javascript" src="assets/fuelux/js/spinner.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/bootstrap-fileupload/bootstrap-fileupload.css" />
<script type="text/javascript" src="<?php URL; ?>/yonetim/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>

<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Ders Düzenle
                          </header>
                          <div class="panel-body">
                              <div class="form">

                <div class="form-group last">
                <?php
                 
                 if ($_POST){

                     $ders_sahibi= session("uye_kadi");
                    $ders_kodu = p("ders_kodu", true);
                     $ders_adi = p("ders_adi", true);
                     $devamsizlik=p("devamdurumu", true);
          
      

                    if (!$ders_kodu){

                      echo "<div class='alert alert-block alert-danger fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Hooop!</strong> Gerekli Alanları Doldurun!
                              </div>";

                    }else{

                     $update = query("UPDATE dersler SET 
                     ders_sahibi = '$ders_sahibi',
                     ders_kodu      = '$ders_kodu',
                     ders_adi      = '$ders_adi',
                     devamsizlik_siniri = '$devamsizlik'

                     WHERE id = '$id'");

                     if($update){
                     
                     echo "<div class='alert alert-success fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Güncellendi!</strong> Değişiklikleriniz Kaydedildi.
                              </div>";

                    go(URL."/yonetim/index.php?do=".g("do"),1);

                     }else{
                       echo "<div class='alert alert-block alert-danger fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Hata!</strong> İşlem gerçekleştirilemedi sorun oluştu..
                              </div>";
                     }


                    }

                 }



                ?>

                                  <form action="" method="post">
                                  <div class="cmxform form-horizontal tasi-form" id="signupForm">
                                 

                                    

                                   

                                                       <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Ders kodu</label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  name="ders_kodu" type="text" max="100" min="1" value="<?php  print $row["ders_kodu"]; ?>" />
                                          </div>
                                      </div>

                                           <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Ders sahibi</label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  name="ders_adi" type="text" value="<?php  print $row["ders_adi"]; ?>" />
                                          </div>
                                      </div>


                                       <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Devamsızlık Sınırı(Hafta)</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" value="<?php  print $row["devamsizlik_siniri"]; ?>" id="input"  name="devamdurumu" type="number" max="100" min="1" />
                                          </div>
                                      </div>
                                          



                                    

                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit">Kaydet</button>
                                            
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>

