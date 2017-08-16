 <?php echo !defined("ADMIN") ? die("HACK?"):null; ?>

                <?php
                  

$ogrenci_no	=	g("ogrno");
$tarih		=	date('d/m/Y');
$saat		=	date('H:i:s');
$ders_kodu	=	g("derskodu");
$sahip		= 	session("uye_kadi");
	

                  
$query = query("INSERT INTO `yoklama` (`id`, `ogrenci_no`, `tarih`, `saat`, `derskodu`, `dersin_sahibi`) VALUES (NULL, '$ogrenci_no', '$tarih', '$saat', '$ders_kodu', '$sahip');");
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