<!DOCTYPE html>
<!-- saved from url=(0038)https://xioyuna.com/envato/yui/mobile/ -->
<html class="ios device-pixel-ratio-2 device-retina device-desktop support-position-sticky"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Required meta tags-->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>Berita</title>
    <link rel="stylesheet" href="./assets/css/framework7.ios.min.css">
    <link rel="stylesheet" href="./assets/css/ionicons.css">
    <link rel="stylesheet" href="./assets/css/style.css">
  <script></script></head>
  <body class="color-theme-pink" cz-shortcut-listen="true">
    <!-- App root element -->
    <div id="app" class="framework7-root">
      <div class="views tabs">
        <!-- Main view -->
        <div id="view-today" class="view view-main tab tab-active">
          <div data-name="home" class="page no-navbar page-current">
            <!-- Scrollable page content -->
            <div class="page-content ptr-content infinite-scroll-content ptr-no-navbar" data-infinite-distance="70">
              <div class="ptr-preloader">
                <div class="preloader"></div>
                <div class="ptr-arrow"></div>
              </div>
              <div class="block" id="today-content">
             

                <?php
        /* Attempt MySQL server connection. Assuming you are running MySQL
        server with default setting (user 'root' with no password) */
        $link = mysqli_connect("119.2.47.130", "nganjukkab", "nganjukkab%%", "nganjukkab");
         
        // Check connection
        if($link === false){
            die("ERROR: Database Belum Terkoneksi. " . mysqli_connect_error());
        }
         
        // Attempt select query execution
        $sql = "SELECT berita.id AS idberita,berita.tanggal,berita.judul,berita.isi,berita.imgpath,berita.isActive,users.nama 
        FROM berita 
        INNER JOIN users ON berita.created_by=users.id
        WHERE berita.isActive=1
        ORDER BY berita.tanggal DESC LIMIT 1,10";

        $sql2 = "SELECT berita.id AS idberita2,berita.tanggal,berita.judul,berita.isi,berita.imgpath,berita.isActive,users.nama 
        FROM berita 
        INNER JOIN users ON berita.created_by=users.id
        WHERE berita.isActive=1
        ORDER BY berita.tanggal DESC LIMIT 1";

        function tgl_indo($tanggal){
            $bulan = array (
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $pecahkan = explode('-', $tanggal);

            return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
        }

        if($result2 = mysqli_query($link, $sql2)){
            if(mysqli_num_rows($result2) > 0){
                while($row2 = mysqli_fetch_array($result2)){
                    echo "    

                       
                <a href='detailBeritav2.php?id=". $row2['idberita2'] ."'>
                  <div class='card medium'>
                    <img class='card-image' src='". $row2['imgpath'] ."'>
                    <div class='card-infos'>
                      <div class='card-date'>". tgl_indo($row2['tanggal']) . "</div>
                      <h2 class='card-title'>". substr($row2['judul'], 0,45) . ". . .</h2>
                    </div>
                  </div>
                </a>";
                }
                mysqli_free_result($result2);
            } else{
                echo "Data Tidak Ditemukan.";
            }
        } else{
            echo "ERROR: Database Tidak Bisa Dijalankan $sql. " . mysqli_error($link);
        }

        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo " <ul class='list media-list post-list' id='infinite-content'>
                  <li>
                    <a href='detailBeritav2.php?id=". $row['idberita'] ."'>
                      <div class='item-content'>
                        <div class='item-media'><img src='". $row['imgpath'] ."'></div>
                        <div class='item-inner'>
                          <div class='item-subtitle'>". tgl_indo($row['tanggal']) . "</div>
                          <div class='item-title'>". $row['judul'] . "</div>
                          <div class='item-subtitle bottom-subtitle'>". $row['nama'] ."</div>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>";
                }
                mysqli_free_result($result);
            } else{
                echo "Data Tidak Ditemukan.";
            }
        } else{
            echo "ERROR: Database Tidak Bisa Dijalankan $sql. " . mysqli_error($link);
        }
         
        // Close connection
        mysqli_close($link);
    ?>
  
           
 
              <!--   <a href="https://xioyuna.com/single/" class="">
                  <div class="card medium">
                    <img class="card-image" src="./Yui_files/thumb-10.jpg" alt="">
                    <div class="card-infos">
                      <div class="card-date"><i class="icon ion-md-time"></i>2 days ago</div>
                      <h2 class="card-title">Booba on Fire in His New Gotham Clip</h2>
                    </div>
                  </div>
                </a>
                <ul class="list media-list post-list" id="infinite-content">
                  <li>
                    <a href="https://xioyuna.com/single/" class="">
                      <div class="item-content">
                        <div class="item-media"><img src="./Yui_files/thumb-11.jpg" alt=""></div>
                        <div class="item-inner">
                          <div class="item-subtitle">Fashion</div>
                          <div class="item-title">The 6th Edition of the Body Painting Contest</div>
                          <div class="item-subtitle bottom-subtitle"><img src="./Yui_files/author-7.jpg" alt="">Elena Anka</div>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="https://xioyuna.com/single/">
                      <div class="item-content">
                        <div class="item-media"><img src="./Yui_files/thumb-12.jpg" alt=""></div>
                        <div class="item-inner">
                          <div class="item-subtitle">Photography</div>
                          <div class="item-title">20 Photography Tips for Taking Pictures</div>
                          <div class="item-subtitle bottom-subtitle"><img src="./Yui_files/author-3.jpg" alt="">Jess Roxana</div>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="https://xioyuna.com/single/">
                      <div class="item-content">
                        <div class="item-media"><img src="./Yui_files/thumb-13.jpg" alt=""></div>
                        <div class="item-inner">
                          <div class="item-subtitle">Beatles</div>
                          <div class="item-title">Tottenham: NFL Turf Is in Place!</div>
                          <div class="item-subtitle bottom-subtitle"><img src="./Yui_files/author-1.jpg" alt="">Camille Aline</div>
                        </div>
                      </div>
                    </a>
                  </li>
               </ul> -->
                
              </div>
            </div>
          </div>
        </div>
        <!-- Categories View -->
        
        <!-- Discover View -->
      
        <!-- Search View -->
        
        <!-- Pages View -->
        
        <!-- Toolbar -->
       
      </div><!--  -->
  

</body></html>