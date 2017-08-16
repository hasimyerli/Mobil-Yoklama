<?php

  echo !defined("ADMIN") ? die("HACK?"):null;
  $query = query("SELECT * FROM ayarlar");
  $row = row($query);
	
?>

<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Ayarlar
                          </header>
                          <div class="panel-body">
                              <div class="form">

                <div class="form-group last">
                <?php
                 
                 if ($_POST){

                    $site_baslik = p("site_baslik", true);
                    $site_desc = p("site_desc", true);
                    $site_keyw = p("site_keyw", true);


                    if (!$site_baslik || !$site_desc || !$site_keyw){

                      echo "<div class='alert alert-block alert-danger fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Hooop!</strong> Gerekli Alanları Doldurun!
                              </div>";

                    }else{

                     $update = query("UPDATE ayarlar SET 
                     site_baslik = '$site_baslik',
                     site_desc   = '$site_desc',
                     site_keyw   = '$site_keyw'");

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
                                  <strong>Hata!</strong> İşlem gerçekleştirilemiyor.
                              </div>";
                     }


                    }

                 }



                ?>

                                  <form action="" method="post">
                                  <div class="cmxform form-horizontal tasi-form" id="signupForm">
                       
                  

                                   <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Site Başlık</label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  name="site_baslik" type="text" value="<?php  print $ayar["site_baslik"]; ?>" />
                                          </div>
                                      </div>

                                    

                                      <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Site Desc</label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  name="site_desc" type="text" value="<?php  print $ayar["site_desc"]; ?>" />
                                          </div>
                                      </div>

                                                       <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Site Keyw</label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  name="site_keyw" type="text" value="<?php  print $ayar["site_keyw"]; ?>" />
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



