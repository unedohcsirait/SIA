<?php
$alamatsekolah = mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='12'");
$a = mysql_fetch_array($alamatsekolah);
$telp = mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='9'");
$te = mysql_fetch_array($telp);
$logo = mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='13'");
$l = mysql_fetch_array($logo);
?>
<!-- ===== TOP BAR ===== -->
<div class="de-topbar">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <div class="de-topbar-info">
        <span><i class="bi bi-telephone-fill"></i> <?php echo htmlspecialchars($te['isi_pengaturan']); ?></span>
        <span class="d-none d-md-flex"><i class="bi bi-envelope-fill"></i> info@smpn2binjai.sch.id</span>
        <span class="d-none d-lg-flex"><i class="bi bi-geo-alt-fill"></i> <?php echo htmlspecialchars($a['isi_pengaturan']); ?></span>
      </div>
      <div class="de-topbar-right">
        <form method="POST" action="?p=pencarian" class="de-search-wrap">
          <button type="submit"><i class="bi bi-search"></i></button>
          <input type="text" name="cari" placeholder="Cari berita, info...">
        </form>
      </div>
    </div>
  </div>
</div>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg de-navbar">
  <div class="container">
    <a class="de-brand" href="index.php">
      <div class="de-brand-icon">
        <?php
        $logoFile = "images/" . $l['isi_pengaturan'];
        if ($l['isi_pengaturan'] && file_exists($logoFile)) {
          echo "<img src='" . htmlspecialchars($logoFile) . "' alt='Logo'>";
        } else {
          echo "🏫";
        }
        ?>
      </div>
      <div>
        <div class="de-brand-name"><?php echo htmlspecialchars($ns['isi_pengaturan']); ?></div>
        <div class="de-brand-sub">Membangun Generasi Unggul</div>
      </div>
    </a>

    <button class="navbar-toggler de-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#deNavMain"
            aria-controls="deNavMain" aria-expanded="false" aria-label="Toggle navigation">
      <i class="bi bi-list"></i>
    </button>

    <div class="collapse navbar-collapse" id="deNavMain">
      <ul class="navbar-nav ms-auto align-items-lg-center de-nav">
        <?php include "file/tema/edisi_spesial/menu.php"; ?>
      </ul>
    </div>
  </div>
</nav>
