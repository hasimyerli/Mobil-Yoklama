 <?php echo !defined("ADMIN") ? die("HACK?"):null; ?>

                <?php
                  
$sahip=session("uye_kadi");
$hangiders=g("derskodu");


unlink($sahip.".txt");

unlink($sahip."-".$hangiders.".txt");

unlink("kullanicilar.txt")


?>