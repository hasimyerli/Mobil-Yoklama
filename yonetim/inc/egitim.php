<?php echo !defined("ADMIN") ? die("HACK?"):null;
$oturumsahibi=session("uye_kadi");


 ?>
 <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Tüm Öğrencilerimin Listesi
                          </header>
                          <table class="table table-striped table-advance table-hover">
                       
                <?php
                  

                  $query = query("SELECT * FROM `ogrenciler` WHERE `dersin_sahibi` LIKE '$oturumsahibi' ORDER BY `ogrenci_no` ASC");

                  if (mysql_affected_rows()){

                ?>


                              <thead>
                              <tr>
                                  <th><i class="fa fa-list"></i> Sıra</th>
                                  <th class="hidden-phone"><i class="
glyphicon glyphicon-compressed"></i> Numara</th>
                                  <th><i class="
glyphicon glyphicon-user"></i> Ad Soyad</th>
                                  <th><i class="glyphicon glyphicon-qrcode"></i> Durum</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>

                              <?php
$sayac=1;
                              while ($row = row($query)){

                              ?>

                              <tr>
                                  <td><?php echo $sayac; ?></td>
                                  <td class="hidden-phone"><?php print ss($row["ogrenci_no"]); ?></td>
                                  <td><?php print timeTR(ss($row["ad"].' '.$row["ad"])); ?></td>
                                  <td>


                                  <?php
                                  $devamsizlik = $row["devamsizlik"];
                                  if($devamsizlik < 4)
                                  { 
                                  ?>
                                  <span class="label label-success label-mini"><?php print "Devamlı"; ?></span>
                                  <?php
                                  } else{
                                  ?>
                                  <span class="label label-danger label-mini"><?php print "Devamsız"; ?></span>
                                  <?php
                                  }
                                  ?>


                                  </td>
                                  <td>
                                      <a href="<?php print URL; ?>/yonetim/index.php?do=egitim-duzenle&id=<?php print $row["egitim_id"]; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                      <a onclick="return confirm('Eğitimi Silmek İstediğinize Emin misiniz?');" href="<?php print URL; ?>/yonetim/index.php?do=egitim-sil&id=<?php print $row["egitim_id"]; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                                  </td>
                              </tr>
                              
                              <?php  
                                $sayac++;

                              } ?>
                              
                              </tbody>

                              <?php }else { ?>
                                
                                   <div class="alert alert-warning fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <strong>Henüz Eğitim Durumu Eklenmemiş..</strong> <br />Eğitim Durumu eklemek için <a href="<?php  print URL; ?>/yonetim/index.php?do=egitim-ekle">tıklayın.</a>
                              </div>


                              <?php } ?>

                          </table>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>