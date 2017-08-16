<?php

  echo !defined("ADMIN") ? die("HACK?"):null;
  $query = query("SELECT * FROM egitim");
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

                    $ders_kodu = p("derskodu");
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

                     $insert = query("INSERT INTO ogrenciler SET 
                     ders          = '$ders_kodu',
                     ogrenci_no        = '$numara',
                     ad                = '$ad',
                     soyad             = '$soyad'");

                     if($insert){
                     
                     echo "<div class='alert alert-success fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Başarılı!</strong> Öğrenci başarıyla eklendi.
                              </div>";

                    go(URL."/yonetim/index.php?do=".g("do"),1);

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
                                          <label for="username" class="control-label col-lg-2">Ders Kodu</label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  name="derskodu" type="text" value="" /></input>
                                          </div>
                                      </div>

                                                       <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Ad</label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  name="ad" type="text" />
                                          </div>
                                      </div>

                                               <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Soyad</label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  name="soyad" type="text" />
                                          </div>
                                      </div>

                                           <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Numara</label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  name="numara" type="text" />
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

