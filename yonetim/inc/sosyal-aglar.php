<?php

  echo !defined("ADMIN") ? die("HACK?"):null;
  $query = query("SELECT * FROM sosyalaglar");
  $row = row($query);
	
?>

<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Sosyal Ağlar 
                          </header>
                          <div class="panel-body">
                              <div class="form">

                <div class="form-group last">
                <?php
                 
                 if ($_POST){

                    $sosyal_facebook = p("sosyal_facebook", true);
                    $sosyal_twitter = p("sosyal_twitter", true);
                    $sosyal_youtube = p("sosyal_youtube", true);
                    $sosyal_instagram = p("sosyal_instagram", true);
                    $sosyal_skype = p("sosyal_skype", true);



                     $update = query("UPDATE sosyalaglar SET 
                     sosyal_facebook  = '$sosyal_facebook',
                     sosyal_twitter   = '$sosyal_twitter',
                     sosyal_youtube   = '$sosyal_youtube',
                     sosyal_instagram = '$sosyal_instagram',
                     sosyal_skype     = '$sosyal_skype'");

                     if($update){
                     
                     echo "<div class='alert alert-success fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Güncellendi!</strong> Sosyal Ağlarınız Başarıyla Güncellendi
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



                ?>

                                  <form action="" method="post">
                                  <div class="cmxform form-horizontal tasi-form" id="signupForm">
                       
                  

                                   <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Facebook Kullanıcı Adı:</label>

                                          <div class="col-lg-10">
                                              <input class="form-control "  name="sosyal_facebook" type="text" value="<?php  print $row["sosyal_facebook"]; ?>" />
                                          </div>
                                      </div>

                                    

                                      <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Twitter Kullanıcı Adı:</label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  name="sosyal_twitter" type="text" value="<?php  print $row["sosyal_twitter"]; ?>" />
                                          </div>
                                      </div>

                                    <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Youtube Kullanıcı Adı:</label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  name="sosyal_youtube" type="text" value="<?php  print $row["sosyal_youtube"]; ?>" />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">İnstagram Kullanıcı Adı:</label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  name="sosyal_instagram" type="text" value="<?php  print $row["sosyal_instagram"]; ?>" />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Skype Adınız:</label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  name="sosyal_skype" type="text" value="<?php  print $row["sosyal_skype"]; ?>" />
                                          </div>


                                      </div>


                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit">Kaydet</button>
                                            
                                          </div>


                                      </div>
                                  </form>
                                    <p>dipnot: sadece kullanıcı adlarınızı yazın. örn; <b>okanagca</b></p>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>



