<?php
error_reporting(0);
header('X-Frame-Options: ALLOWALL');
header('Content-Security-Policy: frame-ancestors *');
header('Content-Type: text/html; charset=utf-8');

include "konfigurasi/koneksi.php";

$namasekolah = mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='8'");
$ns = mysql_fetch_array($namasekolah);

$page = isset($_GET['p']) ? trim($_GET['p']) : '';

include "file/tema/edisi_spesial/hero.php";
?>
<main class="de-main">
  <div class="container">
    <div class="row g-4 g-xl-5">
      <div class="col-lg-8">
        <?php include "file/tema/edisi_spesial/konten.php"; ?>
      </div>
      <div class="col-lg-4">
        <div class="de-sidebar">
          <?php include "file/tema/edisi_spesial/sidebar.php"; ?>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include "file/tema/edisi_spesial/stats.php"; ?>
