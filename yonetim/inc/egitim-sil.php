<?php

  echo !defined("ADMIN") ? die("HACK?"):null;
  $id  = g("id");
 
  
?>
  <script type="text/javascript" src="assets/fuelux/js/spinner.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/bootstrap-fileupload/bootstrap-fileupload.css" />
<script type="text/javascript" src="<?php URL; ?>/yonetim/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>

<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             İş Deneyimi Ekle 
                          </header>
                          <div class="panel-body">
                              <div class="form">

                <div class="form-group last">
                <?php
                 
                 
             
                     $id    = g("id");
                     $delete =  query("DELETE FROM egitim WHERE egitim_id = '$id'");
                     if($delete){
                     echo "<div class='alert alert-success fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Eğitim Durumu Başarılı bir şekilde silindi!</strong>
                              </div>";

                    go(URL."/yonetim/index.php?do=egitim",1);

                     }else{
                       echo "<div class='alert alert-block alert-danger fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Hata!</strong> Eğitim Durumu Silinemedi.
                              </div>";

                        }
                ?>

                                  <form action="" method="post">
                                  <div class="cmxform form-horizontal tasi-form" id="signupForm">
                                 

                                      </div>
                                  </form>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>



