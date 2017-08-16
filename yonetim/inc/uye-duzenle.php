<?php


  echo !defined("ADMIN") ? die("HACK?"):null;
  $query = query("SELECT * FROM kullanici");
  if (mysql_affected_rows());

  $row = row($query);
  $oturumsahibi=session("uye_kadi", true);
?>

<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Kullanıcı Düzenle
                          </header>
                          <div class="panel-body">
                              <div class="form">

                <div class="form-group last">
                <?php
                 
                 if ($_POST){


                    if (p("k_sifre")){
                      $uye_sifre = md5(p("k_sifre"));
                    }else {
                      $uye_sifre = $row["k_sifre"];
                    }
                    $uye_eposta = p("k_posta");


                    if ( !$uye_sifre || !$uye_eposta){

                      echo "<div class='alert alert-block alert-danger fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Hooop!</strong> Gerekli Alanları Doldurun!
                              </div>";

                    }else{

                     $update = query("UPDATE kullanici SET 
                     sifre           = '$uye_sifre',
                     email  = '$uye_eposta'
                     WHERE kullaniciadi  = '$oturumsahibi'");

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
                                  <strong>Hata!</strong> Bir hata oluştu..
                              </div>";
                     }


                    }

                 }



                ?>

                                  <form action="" method="post">
                                  <div class="cmxform form-horizontal tasi-form" id="signupForm">
                                      <div class="form-group ">
                                          <label for="firstname" class="control-label col-lg-2">Kullanıcı Adı</label>
                                          <div class="col-lg-10">
                                            <label for="firstname" class="control-label col-lg-2"><?php  print $oturumsahibi; ?></label>
                                             
                                          </div>
                                      </div>
                  

                                   <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Şifre</label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  name="k_sifre" type="text" />
                                          </div>
                                      </div>

                                    

                                      <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Email Adresi</label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  name="k_posta" type="text" value="<?php  print ss($row["email"]); ?>" />
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
