<?php
    $id = $_GET['id'];
?>
<!DOCTYPE html>
<!-- saved from url=(0038)https://xioyuna.com/envato/yui/mobile/ -->
<html class="ios device-pixel-ratio-1 device-desktop support-position-sticky"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Required meta tags-->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>Agenda Wisata</title>
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
    $link = mysqli_connect("event.nganjukkab.go.id", "event", "event2020", "event");

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

    $sql = "SELECT tbl_event.id as idEvent, tbl_event.judul, tbl_event.tanggal_awal_event, tbl_event.tanggal_akhir_event, tbl_event.jam_awal_event, tbl_event.jam_akhir_event, tbl_event.lokasi, tbl_event.no_telp, tbl_event.keterangan, tbl_event.imgpath, tbl_event.created_by as created_by, tbl_event.isActive as isActive, users.nama 
    FROM tbl_event 
    INNER JOIN users ON tbl_event.created_by=users.id
    WHERE tbl_event.isActive=1 AND tbl_event.id = $id";

    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                echo "<a href='eventDaerahv2.php' class='link back close-button'>
      <img src='./assets/img/close.svg' alt='Close'>
    </a>
    <img class='cover-image' src='".$row['imgpath']."'>
    <div class='block article'>
      <div class='post-infos'>
        <div class='post-category'>".$row['nama']."</div>
        <div class='post-date'>". tgl_indo($row['tanggal_awal_event']) . "</div>
      </div>
      <h1>".$row['judul']."</h1>
       <p>
                      <b> Tanggal Agenda : </b> <br> ".tgl_indo($row['tanggal_awal_event'])." -  ".tgl_indo($row['tanggal_akhir_event'])."<br><br>
                      <b> Jam Agenda     : </b> <br> ".$row['jam_awal_event']." -  ".$row['jam_akhir_event']."<br><br>
                      <b> Lokasi   : </b> <br> ".$row['lokasi']." <br><br>
                      <b> Kontak Penyelenggara  : </b> <br> ".$row['no_telp']." <br><br>
                      <b> Keterangan  : </b> <br> ".$row['keterangan']." <br>
        </p>   
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