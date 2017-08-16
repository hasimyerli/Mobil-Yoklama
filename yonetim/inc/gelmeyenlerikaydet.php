 <?php echo !defined("ADMIN") ? die("HACK?"):null; ?>

                <?php
                  

$ogrenci_no	=	g("ogrno");
$tarih		=	date('d/m/Y');
$saat		=	date('H:i:s');
$ders_kodu	=	g("derskodu");
$sahip		= 	session("uye_kadi");
	

                  
/*$query = query("SELECT * FROM `ogrenciler` WHERE `ders` LIKE '$ders_kodu' AND `dersin_sahibi` LIKE '$sahip' AND `ogrenci_no` LIKE '$ogrenci_no'");

  $row = row($query);

  $dene=$row["devamsizlik"]+4;*/
$query = query("SELECT * FROM `ogrenciler` WHERE `ders` LIKE '$ders_kodu' AND `dersin_sahibi` LIKE '$sahip' AND `ogrenci_no` LIKE '$ogrenci_no'");

$row = row($query);
$devamsizlik=$row["devamsizlik"]+1;

$query = query("UPDATE `ogrenciler` SET `devamsizlik` = '$devamsizlik' WHERE `ders` LIKE '$ders_kodu' AND `dersin_sahibi` LIKE '$sahip' AND `ogrenci_no` LIKE '$ogrenci_no'");

echo $sahip;

if ($insert)
{
echo "başarılı";
}
else
{
echo "başarısız";
}
?>