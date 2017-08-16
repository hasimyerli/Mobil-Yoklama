 <?php echo !defined("ADMIN") ? die("HACK?"):null; ?>
 <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Dersler
                          </header>
                          <table class="table table-striped table-advance table-hover">
                       
                <?php
                  
$sahip=session("uye_kadi");
                 // $query = query("SELECT * FROM dersler ORDER BY id DESC");
                  
$query = query("SELECT * FROM `dersler` WHERE `ders_sahibi` LIKE '$sahip' ORDER BY `id` ASC");

                  if (mysql_affected_rows()){

                ?>


                              <thead>
                              <tr>
                                  <th><i class="glyphicon glyphicon-user"></i> Dersin Sahibi</th>
                                  <th class="hidden-phone"><i class="glyphicon glyphicon-barcode"></i> Ders Kodu</th>
                                    <th class="hidden-phone"><i class="glyphicon glyphicon-book"></i> Ders Adı</th>
                                    <th class="hidden-phone"><i class="glyphicon glyphicon-indent-right"></i> Devam Sınırı</th>
                                    <th class="hidden-phone"><i class="glyphicon glyphicon-asterisk"></i> İşlemler</th>

                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>

                              <?php

                              while ($row = row($query)){

                              ?>

                              <tr style="cursor: pointer;" onClick="window.location.href='<?php print URL; ?>/yonetim/index.php?do=ogrenciler&id=<?php print $row["ders_kodu"]; ?>&ad=<?php print $row["ders_adi"]; ?>'">
                                  <td><?php print ss($row["ders_sahibi"]); ?></td>
                                  <td class="hidden-phone"><?php print ss($row["ders_kodu"]); ?> </td>
                                  
                                <td class="hidden-phone"><?php print ss($row["ders_adi"]); ?></td>

                                  <td>
                                   <center> <span class="label label-info label-mini"><?php print ss($row["devamsizlik_siniri"]); ?></span></center>
                                  </td>
                                  <td>
                                      <a href="<?php print URL; ?>/yonetim/index.php?do=ders-duzenle&id=<?php print $row["id"]; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>

                                      <a onclick="return confirm('Dersi Silmek İstediğinize Emin misiniz?');" href="<?php print URL; ?>/yonetim/index.php?do=ders-sil&id=<?php print $row["id"]; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>

                                  <a href="<?php print URL; ?>/yonetim/index.php?do=ogrenciler&id=<?php print $row["ders_kodu"]; ?>&ad=<?php print $row["ders_adi"]; ?>" class="btn btn-success btn-xs"><i class="fa fa-users"></i></a>    

                                   <a href="<?php print URL; ?>/yonetim/index.php?do=yoklama&derskodu=<?php print $row["ders_kodu"]; ?>&dersadi=<?php print $row["ders_adi"]; ?>" class="btn-warning btn-xs"><i class="fa fa-check-circle-o"></i> yoklama</a>   


                                  </td><td></td>
                             </a> </tr> 
                              
                              <?php  } ?>
                              
                              </tbody>

                              <?php }else { ?>
                                
                                   <div class="alert alert-warning fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <strong>Henüz Ders Eklenmemiş..</strong> <br /> Ders eklemek için <a href="<?php  print URL; ?>/yonetim/index.php?do=ders-ekle">tıklayın.</a>
                              </div>


                              <?php } ?>

                          </table>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>