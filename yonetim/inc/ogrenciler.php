<?php

 echo !defined("ADMIN") ? die("HACK?"):null; 
 $sahip  = g("id");
  $sahip2  = g("ad");
$oturumsahibi=session("uye_kadi");

  ?>

 <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             <?php echo $sahip." - ".$sahip2." DERSİ ÖĞRENCİLERİ" ?>
                          </header>
                          <table class="table table-striped table-advance table-hover">
                       
                <?php
                 
                 // $sahip=$_POST["ders"];
                 //  $sahip  = g("id");
                


                  $query = query("SELECT * FROM `ogrenciler` WHERE `dersin_sahibi` LIKE '$oturumsahibi' AND `ders` LIKE '$sahip'  ORDER BY `ogrenci_no` ASC");


                 // $query = query("SELECT * FROM ogrenciler ORDER BY id ");
                  if (mysql_affected_rows()){

                ?>


                              <thead>
                              <tr>
                                  <th><i class="fa fa-list"></i> Sıra</th>
                                  <th class="hidden-phone"><i class="
glyphicon glyphicon-compressed"></i> Numara</th>
                                  <th><i class="
glyphicon glyphicon-user"></i> Ad Soyad</th>
                                  <th><i class="glyphicon glyphicon-magnet"></i> Devamsızlık</th>
                                  <th><i class="glyphicon glyphicon-qrcode"></i> Durum</th>
                                  <th><a href="<?php print URL; ?>/yonetim/index.php?do=ogrenci-ekle&id=<?php print $sahip; ?>" class="btn btn-warning btn-xs "><i class="
glyphicon glyphicon-plus" ></i>  Öğrenci ekle</a></th>
                              </tr>
                              </thead>
                              <tbody>

                              <?php
 $sayac=1;
                              while ($row = row($query)){

                              ?>

                              <tr>
                                  <td><?php print $sayac; ?></td>
                                  <td class="hidden-phone"><?php print ss($row["ogrenci_no"]); ?></td>
                                  <td><?php print (ss($row["ad"].' '.$row["soyad"])); ?></td>
                                  <td><?php print (ss($row["devamsizlik"])); ?></td>
                                  <td>


                                  <?php
                                  $devamsizlik = $row["devamsizlik"];
                                  $sql=query("SELECT * FROM `dersler` WHERE `ders_sahibi` LIKE '$oturumsahibi' AND `ders_kodu` LIKE '$sahip' ORDER BY `id` ASC");
if (mysql_affected_rows()){
while ($satir = row($sql)){
  $devamsizlik_siniri=$satir["devamsizlik_siniri"];
}
}

                                  
                                  if($devamsizlik <= $devamsizlik_siniri)
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
                                      <a href="<?php print URL; ?>/yonetim/index.php?do=ogrenci-duzenle&id=<?php print $row["id"]; ?>&derskodu=<?php echo $sahip; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Düzenle</a>

                                      <a onclick="return confirm('Öğrenciyi Silmek İstediğinize Emin misiniz?');" href="<?php print URL; ?>/yonetim/index.php?do=ogrenci-sil&id=<?php print $row["id"]; ?>&derskodu=<?php echo $sahip; ?>&dersadi=<?php print $sahip2; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i> Sil</a>
                                  </td>
                              </tr>
                              
                              <?php  $sayac++; 
                              } ?>
                              
                              </tbody>

                              <?php }else { ?>
                                
                                   <div class="alert alert-warning fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <strong>Henüz bu derse öğrenci eklenmemiş..</strong> <br />Öğrenci eklemek için <a href="<?php  print URL; ?>/yonetim/index.php?do=ogrenci-ekle&id=<?php echo $sahip; ?>">tıklayın.</a>
                              </div>


                              <?php } ?>

                          </table>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>