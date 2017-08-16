<?php

  

  function p($par, $st = false){
    if ($st){
      return htmlspecialchars(addslashes(trim($_POST[$par])));
    }else {
      return addslashes(trim($_POST[$par]));
    }
  }


  
  function g($par){
    return strip_tags(trim(addslashes($_GET[$par])));
  }
  
  function kisalt($par, $uzunluk = 25){
    if (strlen($par) > $uzunluk){
      $par = mb_substr($par, 0, $uzunluk, "UTF-8")."..";
    }
    return $par;
  }


  
  function go($par, $time = 0){
    if ($time == 0){
      header("Location: {$par}");
    }else {
      header("Refresh: {$time}; url={$par}");
    }
  }
  
  function session($par){
    if ($_SESSION[$par]){
      return $_SESSION[$par];
    }else {
      return false;
    }
  }

  function say(){
    static $a = 1;
    print $a;
    $a++;
  }
  
  function ss($par){
    return stripslashes($par);
  }
  
  function session_olustur($par){
    foreach ($par as $anahtar => $deger){
      $_SESSION[$anahtar] = $deger;
    }
  }

  

  function query($query){
    return mysql_query($query);
  }
  
  function row($query){
    return mysql_fetch_array($query);
  }
  
  function rows($query){
    return mysql_num_rows($query);
  }

function timeTR($par)
   {
      $explode = explode(" ", $par);
      $explode2 = explode("-", $explode[0]);
      $zaman = substr($explode[1], 0, 5);
      
      if ($explode2[1] == "1") $ay = "Ocak";
      elseif ($explode2[1] == "2") $ay = "Şubat";
      elseif ($explode2[1] == "3") $ay = "Mart";
      elseif ($explode2[1] == "4") $ay = "Nisan";
      elseif ($explode2[1] == "5") $ay = "Mayıs";
      elseif ($explode2[1] == "6") $ay = "Haziran";
      elseif ($explode2[1] == "7") $ay = "Temmuz";
      elseif ($explode2[1] == "8") $ay = "Ağustos";
      elseif ($explode2[1] == "9") $ay = "Eylül";
      elseif ($explode2[1] == "10") $ay = "Ekim";
      elseif ($explode2[1] == "11") $ay = "Kasım";
      elseif ($explode2[1] == "12") $ay = "Aralık";
      
      return $explode2[2]." ".$ay." ".$explode2[0]." ".$zaman;
    }


    function timeConvert ( $zaman ){
   date_default_timezone_set('Europe/Istanbul');
   $zaman =  strtotime($zaman);
   $zaman_farki = time() - $zaman;
   $saniye = $zaman_farki;
   $dakika = round($zaman_farki/60);
   $saat = round($zaman_farki/3600);
   $gun = round($zaman_farki/86400);
   $hafta = round($zaman_farki/604800);
   $ay = round($zaman_farki/2419200);
   $yil = round($zaman_farki/29030400);

   if( $saniye < 60 ){
      if ($saniye == 0){
         return "az önce";
      } else {
         return $saniye .' saniye önce';
      }
   } else if ( $dakika < 60 ){
      return $dakika .' dakika önce';
   } else if ( $saat < 24 ){
      return $saat.' saat önce';
   } else if ( $gun < 7 ){
      return $gun .' gün önce';
   } else if ( $hafta < 4 ){
      return $hafta.' hafta önce';
   } else if ( $ay < 12 ){
      return $ay .' ay önce';
   } else {
      return $yil.' yıl önce';
   }
}


function GetIP(){
  if(getenv("HTTP_CLIENT_IP")) {
    $ip = getenv("HTTP_CLIENT_IP");
  } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
    $ip = getenv("HTTP_X_FORWARDED_FOR");
    if (strstr($ip, ',')) {
      $tmp = explode (',', $ip);
      $ip = trim($tmp[0]);
    }
  } else {
  $ip = getenv("REMOTE_ADDR");
  }
  return $ip;
}




 function tarih_fark($tarih1, $tarih2){
      list($yil1, $ay1, $gun1) = explode ('-', $tarih1);
      list($yil2, $ay2, $gun2) = explode ('-', $tarih2);
      $zaman1 = mktime(0, 0, 0, $ay1, $gun1, $yil1);
      $zaman2 = mktime(0, 0, 0, $ay2, $gun2, $yil2);
      $fark = ($zaman1 > $zaman2) ? ($zaman1 - $zaman2) : ($zaman2 - $zaman1);
      $yil_farki = date("Y", $fark) - 1970;
      $ay_farki = date("m", $fark) - 1;
      $gun_farki = date ("d", $fark) - 1;
      $sonuc = '';
      $yil_farki >= 1 ? $sonuc .= $yil_farki.' Yıl ' : $sonuc;
      $ay_farki >= 1 ? $sonuc .= $ay_farki.' Ay ' : $sonuc;
      $gun_farki >= 1 ? $sonuc .= $gun_farki.' Gün ' : $sonuc;    
      return $sonuc;
   }


?>
<?php
function sosyalaglar() {
?>
<?php
$query = query("SELECT * FROM sosyalaglar");
if (mysql_affected_rows()){
while ($row = row($query)){
?>
              <?php
              $face = $row["sosyal_facebook"];
              if($face == ""){ ?>
              <?php } else{ ?>
              <a href='https://facebook.com/<?php  print $row['sosyal_facebook']; ?>' title='Facebook'da Abone Olun!' target='_blank' rel='nofollow'>
              <img src='https://cdn3.iconfinder.com/data/icons/free-social-icons/67/facebook_square-32.png' alt='' />
              </a>
              <?php } ?>


              <?php
              $twitter = $row["sosyal_twitter"];
              if($twitter == ""){ ?>
              <?php } else{ ?>
              <a href="https://twitter.com/<?php  print $row["sosyal_twitter"]; ?>" title="Twitter'da Takip Edin!" target="_blank" rel="nofollow">
              <img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/twitter_square-32.png" alt="" />
              </a>
              <?php } ?>

              <?php
              $youtube = $row["sosyal_youtube"];
              if($youtube == ""){ ?>
              <?php } else{ ?>
              <a href="https://youtube.com/<?php  print $row["sosyal_youtube"]; ?>" title="Youtube'da Takip Edin!" target="_blank" rel="nofollow">
              <img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/youtube_square_color-32.png" alt="" />
              </a>
              <?php } ?>


              <?php
              $instagram = $row["sosyal_instagram"];
              if($instagram == ""){ ?>
              <?php } else{ ?>
              <a href="https://instagram.com/<?php  print $row["sosyal_instagram"]; ?>" title="İnstagram'da Takip Edin!" target="_blank" rel="nofollow">
              <img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/instagram_square_color-32.png" alt="" />
              </a> 
              <?php } ?>


              <?php
              $skype = $row["sosyal_skype"];
              if($skype == ""){ ?>
              <?php } else{ ?>
              <a href="skype:<?php  print $row["sosyal_skype"]; ?>" title="skype:<?php  print $row["sosyal_skype"];?>" target="_blank" rel="nofollow">
              <img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/skype_square_color-32.png" alt="" />
              </a>
              <?php } ?>         
<?php  
 } 

  }
}
?>




