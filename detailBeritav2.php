<?php
    $id = $_GET['id'];
?>
<!DOCTYPE html>
<!-- saved from url=(0038)https://xioyuna.com/envato/yui/mobile/ -->
<html class="ios device-pixel-ratio-1 device-desktop support-position-sticky"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
          
        <div class="page single single-1 no-navbar page-current" data-name="single">
  <div class="page-content">

      <?php
        $link = mysqli_connect("119.2.47.130", "nganjukkab", "nganjukkab%%", "nganjukkab");
         
        if($link === false){
            die("ERROR: Database Belum Terkoneksi. " . mysqli_connect_error());
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
         
        $sql = "SELECT berita.id AS idberita,berita.tanggal,berita.judul,berita.isi,berita.imgpath,berita.isActive,users.nama 
                FROM berita 
                INNER JOIN users ON berita.created_by=users.id
                WHERE berita.isActive=1 AND berita.id = $id";

        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo " <a href='beritav2.php' class='link back close-button'>
      <img src='./assets/img/close.svg' alt='Close'>
    </a>
    <img class='cover-image' src='".$row['imgpath']."'>
    <div class='block article'>
      <div class='post-infos'>
        <div class='post-category'>".$row['nama']."</div>
        <div class='post-date'>".tgl_indo($row['tanggal'])."</div>
      </div>
      <h1>".$row['judul']."</h1>
      <p>".$row['isi']."</p>
      
    </div>";
                }
                mysqli_free_result($result);
            } else{
                echo "Data Tidak Ditemukan.";
            }
        } else{
            echo "ERROR: Database Tidak Bisa Dijalankan $sql. " . mysqli_error($link);
        }

        mysqli_close($link);
    ?>


   <!--  <a href='beritav2.php' class='link back close-button'>
      <img src="./Yui_files/close.svg" alt="Close">
    </a>
    <img class='cover-image' src='".$row['imgpath']."'>
    <div class='block article'>
      <div class='post-infos'>
        <div class='post-category'>".$row['nama']."</div>
        <div class='post-date'>".tgl_indo($row['tanggal'])."</div>
      </div>
      <h1>".$row['judul']."</h1>
      <p>".$row['isi']."</p>
      
    </div> -->
   
   

    
  </div>
</div>
</div>
        <!-- Categories View -->
        
        <!-- Discover View -->
        
        <!-- Search View -->
        
        <!-- Pages View -->
        
        <!-- Toolbar -->
        
      </div>
    </div>

  

</body></html>