 <!DOCTYPE html>
<!-- saved from url=(0038)https://xioyuna.com/envato/yui/mobile/ -->
<html class="ios device-pixel-ratio-1 device-desktop support-position-sticky"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Required meta tags-->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>Nganjuk Smart City V.2</title>
    <link rel="stylesheet" href="./assets/css/framework7.ios.min.css">
    <!-- <link rel="stylesheet" href="./Yui_files/ionicons.css"> -->
    <link rel="stylesheet" href="./assets/css/style.css">
  <script></script></head>
  <body class="color-theme-pink" cz-shortcut-listen="true">


    <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="/__/firebase/7.15.1/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="/__/firebase/7.15.1/firebase-analytics.js"></script>

<!-- Initialize Firebase -->
<script src="/__/firebase/init.js"></script>



            <div class="page-content">
               
                    <div class="card1">
                      <img class="card-image1" src="assets/img/header_1.jpg" alt="">
                      <div class="card-infos">
                        <h2 class="card-title"></h2>
                      </div>
                    </div>
                  

              <div class="block">
                <div class="title-container">
                  <h1 style="font-size: 30px;">Layanan</h1>
                </div>
                <div class="categories-container">
                  <a href="pendidikanv2.html">
                    <div class="category card" style="background-image: url(assets/img/mainmenu/pendidikan.png); box-shadow: 0px 15px 20px -10px rgba(37, 57, 155, 0.5);">
                      <h2 style="font-size: 17px;">Pendidikan</h2>
                    </div>
                  </a>
                  <a href="https://wadulmasnovi.nganjukkab.go.id/">
                    <div class="category card" style="background-image: url(&#39;assets/img/mainmenu/wadul.png&#39;); box-shadow: 0px 15px 20px -10px rgba(37, 57, 155, 0.5);">
                      <h2 style="font-size: 17px;">Wadulmasnovi</h2>
                    </div>
                  </a>
                   <a href="pariwisatav2.html">
                    <div class="category card" style="background-image: url(assets/img/mainmenu/pariwisata.png); box-shadow: 0px 15px 20px -10px rgba(37, 57, 155, 0.5);">
                      <h2 style="font-size: 17px;">Pariwisata</h2>
                    </div>
                  </a>
                  <a href="https://kominfo.go.id/content/all/laporan_isu_hoaks">
                    <div class="category card" style="background-image: url(&#39;assets/img/mainmenu/hoax.png&#39;); box-shadow: 0px 15px 20px -10px rgba(37, 57, 155, 0.5)">
                      <h2 style="font-size: 17px;">Isu Hoax</h2>
                    </div>
                  </a>
                  <a href="lokerv2.html">
                    <div class="category card" style="background-image: url(&#39;assets/img/mainmenu/loker.png&#39;); box-shadow: 0px 15px 20px -10px rgba(37, 57, 155, 0.5);">
                      <h2 style="font-size: 17px;">Info Kerja</h2>
                    </div>
                  </a>
                  <a href="event.html">
                    <div class="category card" style="background-image: url(&#39;assets/img/mainmenu/event.png&#39;); box-shadow: 0px 15px 20px -10px rgba(37, 57, 155, 0.5);">
                      <h2 style="font-size: 17px;">Event</h2>
                    </div>
                  </a>
                </div>

                <!-- BERITA -->

           <div class="title-container">
                  <span class="title-date">Postingan Terbaru</span>
                  <div class="title-with-link">
                    <h1 style="font-size: 30px;">Berita</h1>
                    <a href="beritav2.php" class="col button button-small button-round button-fill">See All</a>
                  </div>


           <div class="two-columns-cards">

        <?php
        /* Attempt MySQL server connection. Assuming you are running MySQL
        server with default setting (user 'root' with no password) */
        $link = mysqli_connect("119.2.47.130", "nganjukkab", "nganjukkab%%", "nganjukkab");
         
        // Check connection
        if($link === false){
            die("ERROR: Database Belum Terkoneksi. " . mysqli_connect_error());
        }


         
        // Attempt select query execution
        

        $sql2 = "SELECT berita.id AS idberita2,berita.tanggal,berita.judul,berita.isi,berita.imgpath,berita.isActive,users.nama 
        FROM berita 
        INNER JOIN users ON berita.created_by=users.id
        WHERE berita.isActive=1
        ORDER BY berita.tanggal DESC LIMIT 4";

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
                    <div class='card'>
                      <img class='card-image' src='". $row2['imgpath'] ."'>
                      <div class='card-infos'>
                        <h2 class='card-title'>" . substr($row2['judul'], 0,25) . ". . .</h2>
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
         
        // Close connection
        mysqli_close($link);
    ?>    
                </div>
                <!-- BERITA END -->
                

                <div class="title-container">
                  <h1 style="font-size: 30px;">Layanan</h1>
                </div>
                <div class="categories-container">
                  <a href="egovv2.html">
                    <div class="category card" style="background-image: url(&#39;assets/img/mainmenu/egov.png&#39;); box-shadow: 0px 15px 20px -10px rgba(37, 57, 155, 0.5);">
                      <h2 style="font-size: 17px;">E-Government</h2>
                    </div>
                  </a>
                  <a href="layananpublikv2.html">
                    <div class="category card" style="background-image: url(&#39;assets/img/mainmenu/layananpublik.png&#39;); box-shadow: 0px 15px 20px -10px rgba(37, 57, 155, 0.5);">
                      <h2 style="font-size: 17px;">Layanan Publik</h2>
                    </div>
                  </a>
                  <a href="smartVillagev2.html">
                    <div class="category card" style="background-image: url(&#39;assets/img/mainmenu/village.png&#39;); box-shadow: 0px 15px 20px -10px rgba(37, 57, 155, 0.5);">
                      <h2 style="font-size: 17px;">Smart Village</h2>
                    </div>
                  </a>
                  <a href="kesehatanv2.html">
                    <div class="category card" style="background-image: url(&#39;assets/img/mainmenu/kesehatan.png&#39;); box-shadow: 0px 15px 20px -10px rgba(37, 57, 155, 0.5);">
                      <h2 style="font-size: 17px;">Kesehatan</h2>
                    </div>
                  </a>
                  <a href="dprdv2.html">
                    <div class="category card" style="background-image: url(&#39;assets/img/mainmenu/dprd.png&#39;); box-shadow: 0px 15px 20px -10px rgba(37, 57, 155, 0.5);">
                      <h2 style="font-size: 17px;">DPRD</h2>
                    </div>
                  </a>
                  <a href="perizinanv2.html">
                    <div class="category card" style="background-image: url(&#39;assets/img/mainmenu/perijinan.png&#39;); box-shadow: 0px 15px 20px -10px rgba(37, 57, 155, 0.5);">
                      <h2 style="font-size: 17px;">Perizinan</h2>
                    </div>
                  </a>
                </div>

                <div class="title-container">
                  <span class="title-date">Postingan Terbaru</span>
                  <div class="title-with-link">
                    <h1 style="font-size: 30px;">Event Terdekat</h1>
                    <a href="eventDaerahv2.php" class="col button button-small button-round button-fill">See All</a>
                  </div>
                  <div class="two-columns-cards">
           

                    <?php
        /* Attempt MySQL server connection. Assuming you are running MySQL
        server with default setting (user 'root' with no password) */
        $link2 = mysqli_connect("event.nganjukkab.go.id", "event", "event2020", "event");

        // Check connection
        if($link2 === false){
            die("ERROR: Database Belum Terkoneksi. " . mysqli_connect_error());
        }

        // Attempt select query execution
        $sql2 = "SELECT tbl_event.id as idEvent, tbl_event.judul, tbl_event.tanggal_awal_event, tbl_event.tanggal_akhir_event, tbl_event.jam_awal_event, tbl_event.jam_akhir_event, tbl_event.lokasi, tbl_event.no_telp, tbl_event.keterangan, tbl_event.imgpath, tbl_event.created_by as created_by, tbl_event.isActive as isActive, users.nama
FROM tbl_event 
INNER JOIN users ON tbl_event.created_by=users.id
WHERE tbl_event.isActive=1 
AND 
tanggal_awal_event > CURDATE()
ORDER BY tbl_event.tanggal_awal_event ASC, tbl_event.jam_awal_event ASC LIMIT 2";

        function tgl_ind($tanggal){
            $bulan = array (
                1 =>   'Jan',
                'Feb',
                'Mar',
                'Apr',
                'Mei',
                'Jun',
                'Jul',
                'Agu',
                'Sep',
                'Okt',
                'Nov',
                'Des'
                );
            $pecahkan = explode('-', $tanggal);

            return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
        }



        if($result = mysqli_query($link2, $sql2)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo "   

                <a href='detailEventDaerahv2.php?id=". $row2['idEvent'] ."'>
                    <div class='card'>
                      <img class='card-image' src='". $row2['imgpath'] ."'>
                      <div class='card-infos'>
                        <h2 class='card-title'>" . substr($row2['judul'], 0,25) . ". . .</h2>
                      </div>
                    </div>
                  </a>";
            }
            mysqli_free_result($result);
        } else{
            echo "Data Tidak Ditemukan.";
        }
    } else{
        echo "ERROR: Database Tidak Bisa Dijalankan $sql. " . mysqli_error($link2);
    }

        // Close connection
    mysqli_close($link2);
    ?>
             
                </div>

                <div class="title-container">
                  <h1 style="font-size: 30px;">MAPS</h1>
                </div>
                <div class="categories-container">
                  <a href="index.html">
                    <div class="category card" style="background-image: url(/v2/assets/img/maps/znganjuk.png); box-shadow: 0px 15px -10px -10px rgba(37, 57, 155, 0.5);">
                      <h2 style="font-size: 17px;"> map e Nganjuk </h2>
                    </div>
                  </a>
              </div>


              </div>
                

            </div>
   


  

</body></html>