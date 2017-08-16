<?php


    define('ADMIN', true);  
    require_once "../system/baglan.php";
    require_once "../system/func.php";

//$m_kadi=$_POST['kadi'];
//$m_sifre=md5($_POST['sifre']);
 
 //ECHO $m_kadi." -- ".($m_sifre);

$dt = fopen('kullanicilar.txt', 'w');
$yaz1="{\r\n".$tirnak[0]."kullanicilar".$tirnak[0].": [\r\n";
fwrite($dt, $yaz1);


$query = query("SELECT * FROM `kullanici`");
 if (mysql_affected_rows()){


 	 while ($row = row($query)){

 	 	echo $row["kullaniciadi"]." -- ".strtoupper($row["sifre"])."<br>";

 	 	$yaz2='{"kullanıcıadı":"'.$row["kullaniciadi"].'","şifre":"'.strtoupper($row["sifre"]).'"},';


fwrite($dt, $yaz2);
 	 }
 	$yaz3="\r\n{} \r\n ], kategoriler:[] \r\n } ";
 	fwrite($dt, $yaz3);
 	}

 	?>