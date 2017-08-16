<?php

  echo !defined("ADMIN") ? die("HACK?"):null;
  $query = query("SELECT * FROM dersler");
  $row = row($query);
  
?>

<script type="text/javascript" src="assets/fuelux/js/spinner.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/bootstrap-fileupload/bootstrap-fileupload.css" />
<script type="text/javascript" src="<?php URL; ?>/yonetim/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>

<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Ders ekle
                          </header>
                          <div class="panel-body">
                              <div class="form">

                <div class="form-group last">
                <?php
                 
                 if ($_POST){
				
                    $ders_kodu = p("ders_kodu");
                    $ders_adi= p("ders_adi");
                   $ders_sahibi= session("uye_kadi");
                   $devamsiniri= p("devamdurumu");

                    if (!$ders_kodu || !$ders_adi || !$devamsiniri ){

                      echo "<div class='alert alert-block alert-danger fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Hooop!</strong> Gerekli Alanları Doldurun!
                              </div>";

                    }else{

                     $insert = query("INSERT INTO dersler SET 
                     	ders_sahibi='$ders_sahibi',
                     ders_kodu  = '$ders_kodu',
                     ders_adi       = '$ders_adi',
                     devamsizlik_siniri='$devamsiniri'");


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

                 }



                ?>

                                  <form action="" method="post">
                                  <div class="cmxform form-horizontal tasi-form" id="signupForm">
                                 
                                    

                                 

                                                       <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Ders kodu</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="input"  name="ders_kodu" type="text" max="100" min="1" />
                                          </div>
                                      </div>

                                       <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Ders Adı</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="input"  name="ders_adi" type="text" max="100" min="1" />
                                          </div>
                                      </div>
                        
                                       <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Devamsızlık Sınırı(Hafta)</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="input"  name="devamdurumu" type="number" max="100" min="1" />
                                          </div>
                                      </div>



                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit">Dersi Kaydet</button>
                                            
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>

