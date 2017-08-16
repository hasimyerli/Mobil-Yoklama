<?php

 echo !defined("ADMIN") ? die("HACK?"):null; 
 $sahip  = g("id");
  $sahip2  =  g("dersadi");
$oturumsahibi=session("uye_kadi");
$derskodu = g("derskodu");
  ?>

 <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             <?php echo $derskodu." - ".$sahip2." DERSİ YOKLAMASI" ?>
                          </header>
                          <table class="table table-striped table-advance table-hover">
                       
                <?php
                 
                 // $sahip=$_POST["ders"];
                 //  $sahip  = g("id");
                


                  $query = query("SELECT * FROM `yoklama` WHERE `derskodu` LIKE '$derskodu' AND `dersin_sahibi` LIKE '$oturumsahibi'  ORDER BY `tarih` ASC, `saat` ASC ");


                 // $query = query("SELECT * FROM ogrenciler ORDER BY id ");
                  if (mysql_affected_rows()){

                ?>


                              <thead>
                              <tr>
                                  <th><i class="fa fa-list"></i> Sıra</th>
                                  <th class="hidden-phone"><i class="
glyphicon glyphicon-compressed"></i> Numara</th>
                                  <th><i class="
glyphicon glyphicon-user"></i> Ders Kodu</th>
                                  <th><i class="glyphicon glyphicon-magnet"></i> Tarih</th>
                                  <th><i class="glyphicon glyphicon-qrcode"></i> Saat</th>
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
                                  <td><?php print (ss($row["derskodu"].' '.$row["soyad"])); ?></td>
                                  <td>    
                                  <span class="label label-success label-mini"><?php print $row["tarih"]; ?></span>
                                 </td>
                                  <td>
                                  <span class="label label-danger label-mini"><?php print $row["saat"]; ?></span>
                                  
                                  </td>
                                  <td>
                                     
                                    
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
                                  <strong>Henüz hiç yoklama alınmamış..</strong> <br />
                              </div>


                              <?php } ?>

                          </table>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>