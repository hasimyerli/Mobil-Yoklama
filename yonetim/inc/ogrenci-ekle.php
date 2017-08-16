<?php

  echo !defined("ADMIN") ? die("HACK?"):null;
  $query = query("SELECT * FROM ogrenciler");
  $row = row($query);

?>

<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Öğrenci Ekle 
                          </header>
                          <div class="panel-body">
                              <div class="form">

                <div class="form-group last">
                <?php


                 if ($_POST){

                    $ders_sahibi = session("uye_kadi");
                    $ders_kodu=g("id");
                    $ad = p("ad");
                    $soyad = p("soyad");
                    $numara = p("numara");
                    


                    if (!$ders_kodu || !$ad || !$soyad || !$numara){

                      echo "<div class='alert alert-block alert-danger fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Hooop!</strong> Gerekli Alanları Doldurun!
                              </div>";

                    }else{
$sql=query("INSERT INTO `ogrenciler` (`id`, `ders`, `dersin_sahibi`, `ogrenci_no`, `ad`, `soyad`, `QRkodu`, `NFCkodu`, `devamsizlik`) VALUES (NULL, '$ders_kodu', '$ders_sahibi', '$numara', '$ad', '$soyad', '', '', '0')");
                    // $insert = query("INSERT INTO ogrenciler SET 
                   //  ders              = '$ders_kodu',
                  //   dersin_sahibi     = '$ders_sahibi',
                  //   ogrenci_no        = '$numara',
                  //   ad                = '$ad',
                  //   soyad             = '$soyad'");

                     if($sql){
                     
                     echo "<div class='alert alert-success fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Başarılı!</strong> Öğrenci başarıyla eklendi.
                              </div>";

                    go(URL."/yonetim/index.php?do=".g("do")."&id=".$ders_kodu,1);

                     }else{
                       echo "<div class='alert alert-block alert-danger fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Hata!</strong> Öğrenci eklenemedi.
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
                                              <input class="form-control " id="input"   name="ad" type="text" />
                                          </div>
                                      </div>

                                               <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Soyad</label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  id="input"  name="soyad" type="text" />
                                          </div>
                                      </div>

                                           <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Numara</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="input"   name="numara" type="text" />
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

