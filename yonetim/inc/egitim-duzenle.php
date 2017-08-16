<?php

  echo !defined("ADMIN") ? die("HACK?"):null;
  $id  = g("id");
  $query = query("SELECT * FROM egitim WHERE egitim_id = '$id'");
  if (mysql_affected_rows() < 1){
    go(URL."/yonetim/index.php?do=egitim");
    exit;
  }
  $row = row($query);
  
?>
  <script type="text/javascript" src="assets/fuelux/js/spinner.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/bootstrap-fileupload/bootstrap-fileupload.css" />
<script type="text/javascript" src="<?php URL; ?>/yonetim/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>

<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Eğitim Düzenle 
                          </header>
                          <div class="panel-body">
                              <div class="form">

                <div class="form-group last">
                <?php
                 
                 if ($_POST){

                    $egitim_baslanginc  = p("egitim_baslanginc", true);
                    $egitim_bitis       = p("egitim_bitis", true);
                    $egitim_nitelik     = p("egitim_nitelik", true);
                    $egitim_okul        = p("egitim_okul", true);
                    $egitim_hakkinda    = p("egitim_hakkinda", true);
                    $egitim_sehir       = p("egitim_sehir", true);
      

                    if (!$egitim_baslanginc || !$egitim_okul || !$egitim_sehir || !$egitim_hakkinda){

                      echo "<div class='alert alert-block alert-danger fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Hooop!</strong> Gerekli Alanları Doldurun!
                              </div>";

                    }else{

                     $update = query("UPDATE egitim SET 
                     egitim_baslanginc     = '$egitim_baslanginc',
                     egitim_bitis          = '$egitim_bitis',
                     egitim_nitelik        = '$egitim_nitelik',
                     egitim_okul           = '$egitim_okul',
                     egitim_hakkinda       = '$egitim_hakkinda',
                     egitim_sehir          = '$egitim_sehir'
                     WHERE egitim_id       = '$id'");

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
                                  <strong>Hata!</strong> Şuan bu işlemi gerçekleştiremiyoruz..
                              </div>";
                     }


                    }

                 }



                ?>

                                  <form action="" method="post">
                                  <div class="cmxform form-horizontal tasi-form" id="signupForm">
                                 

                                    
                                     <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Eğitim Başlama Tarihi</label>
                                          <div class="col-lg-10">
                                               <input type="date" name="egitim_baslanginc" value="<?php  print $row["egitim_baslanginc"]; ?>"  class="form-control">
                                          </div>
                                      </div>

                                       <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Eğitim Bitiş Tarihi</label>
                                          <div class="col-lg-10">
                                               <input type="date" name="egitim_bitis" value="<?php  print $row["egitim_bitis"]; ?>"  class="form-control">
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Eğitim Bölümü</label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  name="egitim_nitelik" type="text" value="<?php  print $row["egitim_nitelik"]; ?>" />
                                          </div>
                                      </div>

                                                       <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Okul</label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  name="egitim_okul" type="text" value="<?php  print $row["egitim_okul"]; ?>" />
                                          </div>
                                      </div>


                                       <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Şehir</label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  name="egitim_sehir" type="text" value="<?php  print $row["egitim_sehir"]; ?> " />
                                          </div>
                                      </div>

                                         <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Okul Hakkında</label>
                                          <div class="col-lg-10">
                                              <textarea class="form-control "  name="egitim_hakkinda" type="text"><?php  print $row["egitim_hakkinda"]; ?> </textarea>
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


 <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>


