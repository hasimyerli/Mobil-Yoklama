<?php
    session_start();
    ob_start();


     error_reporting(0);
     $host = "localhost";
     $user = "volkanoz_root";
     $pass = "21322132";
     $db   = "volkanoz_yoklama";

     ## Mysql Connect
     $baglan = mysql_connect($host, $user, $pass) or die (mysql_error());
     mysql_select_db($db, $baglan) or die (mysql_error());

     ## Karakter 
     mysql_query("SET CHARACTER SET 'utf8'");
     mysql_query("SET NAMES 'utf8'");

     ## Ayarlar
     $query   = mysql_query("SELECT * FROM ayarlar");
     $ayar    = mysql_fetch_array($query);

       ## Sabitler
       define("PATH", realpath("."));
       define("URL", "http://volkanozer.com.tr/ozerbilisim/yoklama/");



?>