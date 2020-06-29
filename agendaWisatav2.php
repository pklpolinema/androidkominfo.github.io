<!DOCTYPE html>
<!-- saved from url=(0038)https://xioyuna.com/envato/yui/mobile/ -->
<html class="ios device-pixel-ratio-2 device-retina device-desktop support-position-sticky"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Required meta tags-->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>Event</title>
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
                 <div class="title-container">
                  <!-- <span class="title-date">17 March</span> -->
                  <h1>Agenda Wisata</h1>
                </div>
                <br>



                    <?php
        /* Attempt MySQL server connection. Assuming you are running MySQL
        server with default setting (user 'root' with no password) */
        $link = mysqli_connect("agendawisata.nganjukkab.go.id", "agendawisata", "agendawisata2020", "agendawisata");

        // Check connection
        if($link === false){
            die("ERROR: Database Belum Terkoneksi. " . mysqli_connect_error());
        }

        // Attempt select query execution
        $sql = "SELECT tbl_event.id as idEvent, tbl_event.judul, tbl_event.tanggal_awal_event, tbl_event.tanggal_akhir_event, tbl_event.jam_awal_event, tbl_event.jam_akhir_event, tbl_event.lokasi, tbl_event.no_telp, tbl_event.keterangan, tbl_event.imgpath, tbl_event.created_by as created_by, tbl_event.isActive as isActive, users.nama
        FROM tbl_event 
        INNER JOIN users ON tbl_event.created_by=users.id
        WHERE tbl_event.isActive=1
        ORDER BY tbl_event.id DESC LIMIT 10";

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

        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo "   <a href='detailAgendaWisatav2.php?id=". $row['idEvent'] ."'>
                  <div class='card card-style-2'>
                    <div class='card-image-container'><img class='card-image' src='". $row['imgpath'] ."'></div>
                    <div class='card-infos'>
                      <div class='card-category'>". $row['nama'] ." </div>
                      <h2 class='card-title'>". $row['judul'] . "</h2>
                      <p class='card-description'>Tanggal Event : " . tgl_ind($row['tanggal_awal_event']) . " - " . tgl_ind($row['tanggal_akhir_event']) . "</p>
                      <p class='card-description'>Jam Event : "  . $row['jam_awal_event'] . " - " . $row['jam_akhir_event'] . "</p>
                    </div>
                  </div>
                </a>";
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