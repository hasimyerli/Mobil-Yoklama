<?php

  echo !defined("ADMIN") ? die("HACK?"):null;
  $query = query("SELECT * FROM profil WHERE id = '1'");
  $row = row($query);

	
?>


<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Profili Düzenle
                          </header>
                          <div class="panel-body">
                              <div class="form">

                <div class="form-group last">
                <?php

                 if ($_POST){

                    $pro_adsoyad     = p("pro_adsoyad", true);
                    $pro_meslek      = p("pro_meslek", true);
                    $pro_dogumtarihi = p("pro_dogumtarihi", true);
                    $pro_dogumyeri   = p("pro_dogumyeri", true);
                    $pro_linkedin    = p("pro_linkedin", true);
                    $pro_hakkimda    = p("pro_hakkimda", true);
                    $pro_adres       = p("pro_adres", true);
                    $pro_telefon     = p("pro_telefon", true);
                    $pro_email       = p("pro_email", true);
      
   
                    if (!$pro_adsoyad || !$pro_meslek || !$pro_dogumtarihi || !$pro_linkedin || !$pro_hakkimda || !$pro_email){

                      echo "<div class='alert alert-block alert-danger fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Hooop!</strong> Gerekli Alanları Doldurun!
                              </div>";

                    }else{

                     $update = query("UPDATE profil SET 
                     pro_adsoyad     = '$pro_adsoyad',
                     pro_meslek      = '$pro_meslek',
                     pro_dogumtarihi = '$pro_dogumtarihi',
                     pro_dogumyeri   = '$pro_dogumyeri',
                     pro_linkedin    = '$pro_linkedin',
                     pro_hakkimda    = '$pro_hakkimda',
                     pro_adres       = '$pro_adres',
                     pro_telefon     = '$pro_telefon',
                     pro_email       = '$pro_email'");

                     if($update){
                     
                     echo "<div class='alert alert-success fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Güncellendi!</strong> Değişiklikleriniz Kaydedildi.
                              </div>";

                    go(URL."/yonetim/index.php?do=".g("do"),1);

                     }else{
                       echo "<div class='alert alert-block alert-danger fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Hata!</strong> Bir hata oluştu güncellenemedi.
                              </div>";
                     }


                    }

                 }



                ?>

                                  <form action="" method="post" enctype="multipart/form-data">
                                  <div class="cmxform form-horizontal tasi-form" id="signupForm">

                                     <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Profil Resmi *</label>
                                          <div class="col-lg-10">
      <?php
 if($_POST){//Form gönderildi mi?
  if ($_FILES["pro_resim"]["size"]<1024*1024){//Dosya boyutu 1Mb tan az olsun
    if ($_FILES["pro_resim"]["type"]=="image/jpeg"){//dosya tipi jpeg olsun
      $dosya_adi=$_FILES["pro_resim"]["name"];
      //Dosyaya yeni bir isim oluşturuluyor
      $uzanti=substr($dosya_adi,-4,4);
      $sayi_tut= print "";
      $yeni_ad="img/avatar/".$sayi_tut .$uzanti;
      //Dosya yeni adıyla dosyalar klasörüne kaydedilecek
      if (move_uploaded_file($_FILES["pro_resim"]["tmp_name"],$yeni_ad)){
       
        //Bilgiler veri tabanına kaydedilsin
         $sorgu = query("UPDATE profil SET 
                     pro_resim = '$yeni_ad'
                     WHERE id = '1'");
        if ($sorgu){
          echo '';
        }else{
          echo "<div class='alert alert-block alert-danger fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>Hata!</strong> Avatar Güncellenemedi.
                              </div>";
        }
      }else{
        echo 'Dosya Yüklenemedi!';
      }
    }else{
      echo 'Dosya yalnızca jpeg formatında olabilir!';
    }
  }else{      
    echo 'Dosya boyutu 1 Mb ı geçemez!';
  }
}
?>
          


<?php
$sorgu2=mysql_query("SELECT * FROM profil");
if (mysql_num_rows($sorgu2)){

  while($kayit=mysql_fetch_array($sorgu2)){
    echo '<div style="float:left; border: solid 2px #eee;"><img src="'.$kayit["pro_resim"].'" width="80" height="80"/></div>';
  }


}
?>



                                    <input type="file" name="pro_resim" style="margin-top:30px;">

                           

                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="firstname" class="control-label col-lg-2">Ad Soyad *</label>
                                          <div class="col-lg-10">
                                             <input class=" form-control"  type="text" name="pro_adsoyad"  value= "<?php  print $row["pro_adsoyad"]; ?>" />
                                          </div>
                                      </div>
                  

                                   <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Meslek *</label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  name="pro_meslek" type="text" value="<?php  print $row["pro_meslek"]; ?>" />
                                          </div>
                                      </div>


                                     <div class="form-group">
                                              <label class="col-sm-2 control-label">Doğum Tarihi *</label>
                                              <div class="col-sm-10">
                                                  <input type="date" name="pro_dogumtarihi" value="<?php  print $row["pro_dogumtarihi"]; ?>"  class="form-control">
                                                  <span class="help-inline">dd-mm-yyyy</span>
                                              </div>
                                          </div>

                                    

                                      <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Doğum Yeri</label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  name="pro_dogumyeri" type="text" value="<?php  print $row["pro_dogumyeri"]; ?>" />
                                          </div>
                                      </div>

                                        <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Linkedin *</label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  name="pro_linkedin" type="text" value="<?php  print $row["pro_linkedin"]; ?>" />
                                          </div>
                                      </div>



                                        <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Adres</label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  name="pro_adres" type="text" value="<?php  print $row["pro_adres"]; ?>" />
                                          </div>
                                      </div>

                                         <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Telefon</label>
                                          <div class="col-lg-10">
                                              <input type="tel" placeholder="" data-mask="(536) 000-0000" class="form-control" name="pro_telefon" value="<?php  print $row["pro_telefon"]; ?>" />
                                              <span class="help-inline">(536) 000-0000</span>
                                          </div>
                                      </div>

                                       <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Email *</label>
                                          <div class="col-lg-10">
                                              <input class="form-control"  name="pro_email" type="email" value="<?php  print $row["pro_email"]; ?>" />
                                          </div>
                                      </div>

                                    <form>
  
                                   <div class="row">
                          <div class="col-lg-12">
                              <section class="panel">
                                
                                      <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Hakkımda *</label>
                                          <div class="col-lg-10">

                                    
                                         
                                                      <textarea class="form-control" name="pro_hakkimda" rows="5"><?php  print $row["pro_hakkimda"]; ?></textarea>
                                                 

                                          </div>
                                      </div>
                                
                              </section>
                          </div>
                      </div>

                                    

                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit">Kaydet</button>
                                            
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>


 <script type="text/javascript" src="<?php  print URL; ?>/yonetim/assets/ckeditor/ckeditor.js"></script>