<?php

   echo !defined("ADMIN") ? die("HACK?"):null;
   session_destroy();
   go(URL."/yonetim",2);

?>



  <div class="alert alert-success alert-block fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
       <i class="fa fa-times"></i>
       </button>
    <h4>
     <i class="fa fa-ok-sign"></i>
     Başarılı!
     </h4>
     <p>Çıkış Yaptınız Yönlendiriliyorsunuz...</p>
 </div>