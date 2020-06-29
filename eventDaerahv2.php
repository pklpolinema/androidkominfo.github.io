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

            <div class="page-content ptr-content infinite-scroll-content ptr-no-navbar" data-infinite-distance="70">
              <div class="ptr-preloader">
                <div class="preloader"></div>
                <div class="ptr-arrow"></div>
              </div>
              <div class="block" id="today-content">
             
            <div data-name="search" class="page no-navbar page-current">
            <div class="page-content page-search">
              <div class="searchbar-backdrop"></div>
              <div class="block searchbar-container">
                <div class="title-container">
                  <h1>Event Terdekat</h1>
                </div>
                <div class="row form-input">
                <form class="searchbar">
                  <div class="searchbar-inner">
                    <div class="searchbar-input-wrap">
                      <input type="search" placeholder="Search" class="">
                      <i class="searchbar-icon"></i>
                      <span class="input-clear-button"></span>
                    </div>
                    <!-- <span class="searchbar-disable-button" style="display: block; margin-right: -53px;">Cancel</span> -->
                  </div>
                </form>
              </div>
              </div>
            </div>
          </div>
          <br><br><br><br><br><br><br><br>
            <!-- Scrollable page content -->
            <div class="page-content ptr-content infinite-scroll-content ptr-no-navbar" data-infinite-distance="70">
              <div class="ptr-preloader">
                <div class="preloader"></div>
                <!-- <div class="ptr-arrow"></div> -->
              </div>
              <div class="block" id="today-content">

                    <?php
$db_host = 'event.nganjukkab.go.id'; // Nama Server
$db_user = 'event'; // User Server
$db_pass = 'event2020'; // Password Server
$db_name = 'event'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die ('Gagal terhubung MySQL: ' . mysqli_connect_error());   
}

$sql = 'SELECT tbl_event.id as idEvent, tbl_event.judul, tbl_event.tanggal_awal_event, tbl_event.tanggal_akhir_event, tbl_event.jam_awal_event, tbl_event.jam_akhir_event, tbl_event.lokasi, tbl_event.no_telp, tbl_event.keterangan, tbl_event.imgpath, tbl_event.created_by as created_by, tbl_event.isActive as isActive, users.nama
FROM tbl_event 
INNER JOIN users ON tbl_event.created_by=users.id
WHERE tbl_event.isActive=1 
AND 
tanggal_awal_event > CURDATE()
ORDER BY tbl_event.tanggal_awal_event ASC, tbl_event.jam_awal_event ASC';


$query = mysqli_query($conn, $sql);

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

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}

echo '<table id="example" class="table" style="width:100%">
<thead>
    <tr>
        <th></th>
    </tr>
</thead>
<tbody>';

    while ($row = mysqli_fetch_array($query))
    {
        echo "
        <tr>
            <td>
                <a href='detailEventDaerahv2.php?id=". $row['idEvent'] ."'>
                  <div class='card card-style-2'>
                    <div class='card-image-container'><img class='card-image' src='". $row['imgpath'] ."'></div>
                    <div class='card-infos'>
                      <div class='card-category'>". $row['nama'] ." </div>
                      <h2 class='card-title'>". $row['judul'] . "</h2>
                      <p class='card-description'>Tanggal Event : " . tgl_ind($row['tanggal_awal_event']) . " - " . tgl_ind($row['tanggal_akhir_event']) . "</p>
                      <p class='card-description'>Jam Event : "  . $row['jam_awal_event'] . " - " . $row['jam_akhir_event'] . "</p>
                    </div>
                  </div>
                </a>
            </td>
        </tr>";
    }
    echo '
</tbody>
</table>';

mysqli_free_result($query);
mysqli_close($conn);

?>

</div>
<div class="margin-bot">

</div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.js" integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI=" crossorigin="anonymous"></script>
<script type="text/javascript" src="assets/dist/materialize/js/materialize.min.js"></script>
<script src='assets/main.js'></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable({
      "ordering": false
  });
} );
</script>
             
<!--                      <a href="home.html">
                  <div class="card card-style-2">
                    <div class="card-image-container"><img class="card-image" src="./assets/img/gambar/pura.jpg" alt=""></div>
                    <div class="card-infos">
                      <div class="card-category">Dinas Kominfo</div>
                      <h2 class="card-title">Pembagian Giveaway</h2>
                      <p class="card-description">Tanggal Event : 25 Feb 2020 - 25 Feb 2020</p>
                      <p class="card-description">Jam Event : 09:00:00 - 12:00:00</p>
                    </div>
                  </div>
                </a>

                   <a href="home.html">
                  <div class="card card-style-2">
                    <div class="card-image-container"><img class="card-image" src="./assets/img/gambar/pendopo.jpg" alt=""></div>
                    <div class="card-infos">
                      <div class="card-category">Kecamatan Tanjunganom</div>
                      <h2 class="card-title">Nganji bareng Cak Nun</h2>
                      <p class="card-description">Tanggal Event : 25 Apr 2020 - 25 Apr 2020</p>
                      <p class="card-description">Jam Event : 09:00:00 - 12:00:00</p>
                    </div>
                  </div>
                </a>

                   <a href="home.html">
                  <div class="card card-style-2">
                    <div class="card-image-container"><img class="card-image" src="./assets/img/gambar/sedudo.jpg" alt=""></div>
                    <div class="card-infos">
                      <div class="card-category">Dinas Kominfo</div>
                      <h2 class="card-title">Turnamen PUBG 2020</h2>
                      <p class="card-description">Tanggal Event : 30 Feb 2020 - 25 Apr 2020</p>
                      <p class="card-description">Jam Event : 09:00:00 - 12:00:00</p>
                    </div>
                  </div>
                </a>
 -->

                
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