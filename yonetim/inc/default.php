
  <?php      
  echo !defined("ADMIN") ? die("HACK?"):null;
  $okunmayan_mesajlar = query("SELECT * FROM iletisim where iletisim_okundu = 0  ");
  $okunmayan_ileti = rows($okunmayan_mesajlar);

  ?>
  <section id="container" >
      <!--header start-->
      <header class="header white-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="<?php echo URL; ?>/yonetim" class="logo">Yönetim<span>Paneli</span></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
     
            </div>
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder="Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">                          
                    <?php
                    $avatar=mysql_query("SELECT * FROM profil");
                    if (mysql_num_rows($avatar)){
                    while($avatarcek=mysql_fetch_array($avatar)){
                    echo '<img src="'.$avatarcek["pro_resim"].'"" width="30" height="30"/>';
                    }
                     }
                  ?>
                            <span class="username"><?php echo session("uye_kadi"); ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="<?php echo URL; ?>/yonetim/index.php?do=dersler"><i class=" fa fa-suitcase"></i>Dersler</a></li>
                            <li><a href="<?php echo URL; ?>/yonetim/index.php?do=uye-duzenle"><i class="fa fa-user"></i> Güncelle</a></li>
                            <li><a href="<?php echo URL; ?>/yonetim/index.php?do=ayarlar"><i class="fa fa-cog"></i> Ayarlar</a></li>
                            <li><a href="index.php?do=cikis"><i class="fa fa-key"></i>Çıkış Yap</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a class="active" href="<?php echo URL; ?>/yonetim">
                          <i class="fa fa-dashboard"></i>
                          <span>E-Yoklama</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Ayarlar</span>
                      </a>
                      <ul class="sub">
                          
                          <li><a href="index.php?do=uye-duzenle">Bilgilerimi Güncelle</a></li>
                          <li><a  href="index.php?do=ayarlar">Ayarlar</a></li>
                      </ul>
                  </li>


          

                    <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Öğrencilerim</span>
                      </a>
                      <ul class="sub">
                      <li><a  href="index.php?do=tumogrencilerim">Öğrenciler</a></li>
                      </ul>
                  </li>

                     <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Derslerim</span>
                      </a>
                      <ul class="sub">
                      <li><a  href="index.php?do=dersler">Dersler</a></li>
                      <li><a  href="index.php?do=ders-ekle">Ders Ekle</a></li>
                      </ul>
                  </li>


                

        
 


                  

                 

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            

     <?php

       $do = g("do");
       if (file_exists("inc/{$do}.php")){
           require("inc/{$do}.php");
       }else{
           require_once("inc/anasayfa.php");
       }


     ?>









          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
  
  </section>

 
