 <?php echo !defined("ADMIN") ? die("HACK?"):null; ?>

                <?php
                  
$sahip=session("uye_kadi");

                  
$query = query("SELECT * FROM `dersler` WHERE `ders_sahibi` LIKE '$sahip' ORDER BY `id` ASC");
echo $sahip;

$dt = fopen($sahip.'.txt', 'w');
$yaz1="{\r\n".$tirnak[0]."derslerim".$tirnak[0].": [\r\n";
fwrite($dt, $yaz1);



                  if (mysql_affected_rows()){


                              while ($row = row($query)){

                              echo $row["ders_kodu"]."-".$row["ders_adi"]."<br>	";

                              $yaz2='{"derskodu":"'.$row["ders_kodu"].'","dersadi":"'.$row["ders_adi"].'","devamsiniri":"'.$row["devamsizlik_siniri"].'"},'."\r\n";

                              fwrite($dt, $yaz2);

                            }

                          }

                           	$yaz3="\r\n{} \r\n ], kategoriler:[] \r\n } ";
 	fwrite($dt, $yaz3);
?>