<?php
$ogrenci_derskodu = g("derskodu");
 
  $id  = g("id");
  $query = query("SELECT * FROM ogrenciler WHERE id = '$id'");
  if (mysql_affected_rows() < 1){
   // go(URL."/yonetim/index.php?do=ogrenciler&id=".$ogrenci_derskodu);
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
                             Öğrenci Düzenle 
                          </header>
                          <div class="panel-body">
                              <div class="form">

                <div class="form-group last">
                <?php
                 
                 if ($_POST){


                    $ders_sahibi  = session("uye_kadi", true);
                    $ders_kodu    = $ogrenci_derskodu;
                    $ad           = p("ad", true);
                    $soyad        = p("soyad", true);
                    $numara       = p("numara", true);
                    $devamsizlik  =p("devam_durumu", true);
                  

                    if (!$ogrenci_derskodu || !$ad || !$soyad || !$numara){

                      echo "<div class='alert alert-block alert-danger fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Hooop!</strong> Gerekli Alanları Doldurun!
                              </div>";

                    }else{


                     $update = query("UPDATE ogrenciler SET 
                     ders               = '$ogrenci_derskodu',
                     dersin_sahibi      = '$ders_sahibi',
                     ogrenci_no         = '$numara',
                     ad                 = '$ad',
                     soyad              = '$soyad',
                     devamsizlik        = '$devamsizlik'
                     WHERE id           = '$id'");

                     if($update){
                     
                     echo "<div class='alert alert-success fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Güncellendi!</strong> Değişiklikleriniz Kaydedildi.
                              </div>";

                    go(URL."/yonetim/index.php?do=ogrenciler&id=".$ogrenci_derskodu,1);

                     }else{
                       echo "<div class='alert alert-block alert-danger fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Hata!</strong> Şuan bu işlemi gerçekleştiremiyoruz..
                              </div>";
                     }


                    }

                 }



                ?>

                                  <form action="" method="post">
                                  <div class="cmxform form-horizontal tasi-form" id="signupForm">
                                 

                                    
                                                           <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Ad</label>
                                          <div class="col-lg-10">
                                              <input value=" <?php  print $row["ad"]; ?>" class="form-control " id="input"   name="ad" type="text" />
                                          </div>
                                      </div>

                                               <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Soyad</label>
                                          <div class="col-lg-10">
                                              <input value=" <?php  print $row["soyad"]; ?>" class="form-control "  id="input"  name="soyad" type="text" />
                                          </div>
                                      </div>

                                           <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Numara</label>
                                          <div class="col-lg-10">
                                              <input value=" <?php  print $row["ogrenci_no"]; ?>" class="form-control " id="input"   name="numara" type="text" />
                                          </div>
                                      </div>

                                       <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Devamsızlık</label>
                                          <div class="col-lg-10">
                                              <input value=" <?php  print $row["devamsizlik"]; ?>" class="form-control " id="input"   name="devam_durumu" type="text" />
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



