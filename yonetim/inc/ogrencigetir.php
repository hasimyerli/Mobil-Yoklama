 <?php echo !defined("ADMIN") ? die("HACK?"):null; ?>

                <?php
                  
$sahip=session("uye_kadi");
$hangiders=g("derskodu");
                  
  $query = query("SELECT * FROM `ogrenciler` WHERE `dersin_sahibi` LIKE '$sahip' AND `ders` LIKE '$hangiders'  ORDER BY `ogrenci_no` ASC");
//echo $sahip;

$dt = fopen($sahip.'-'.$hangiders.'.txt', 'w');
$yaz1="{\r\n".$tirnak[0]."ogrenciler".$tirnak[0].": [\r\n";
fwrite($dt, $yaz1);



                  if (mysql_affected_rows()){


                              while ($row = row($query)){

                               echo $row["ogrenci_no"]." - ".$row["ad"].$row["soyad"]."	devamsızlık: ".$row["devamsizlik"]."<br>	";

                              $yaz2='{"ogrencino":"'.$row["ogrenci_no"].'" , "adi" : "'.$row["ad"].'" , "soyadi" : "'.$row["soyad"].'" , "derskodu" : "'.$row["ders"].'" , "derssahibi" : "'.$row["dersin_sahibi"].'" , "devamsizlik" : "'.$row["devamsizlik"].'"},'."\r\n";

                              fwrite($dt, $yaz2);

                            }

                          }

                           	$yaz3="\r\n{} \r\n ], kategoriler:[] \r\n } ";
 	fwrite($dt, $yaz3);
?>