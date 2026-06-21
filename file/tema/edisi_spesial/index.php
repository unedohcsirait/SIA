<?php
error_reporting(0);
session_start();
include "konfigurasi/koneksi.php";
include "file/tema/edisi_spesial/atas.php";
$page = isset($_GET['p']) ? trim($_GET['p']) : '';
?>
<body>

<?php include "file/tema/edisi_spesial/header.php"; ?>

<?php if ($page === ''): ?>
<!-- ===== HERO — Homepage Only ===== -->
<section class="de-hero">
  <div class="de-hero-bg"></div>
  <div class="de-hero-circle1"></div>
  <div class="de-hero-circle2"></div>
  <div class="container de-hero-inner">
    <div class="de-hero-badge">
      <span class="de-hero-badge-dot"></span>
      PENDAFTARAN SISWA BARU 2024/2025 DIBUKA
    </div>
    <h1 class="de-hero-title">
      Membentuk <span class="de-hero-accent">Karakter</span> &amp;<br>Prestasi Gemilang.
    </h1>
    <p class="de-hero-text">
      Selamat datang di website resmi <?php echo htmlspecialchars($ns['isi_pengaturan']); ?>.
      Kami berkomitmen memberikan pendidikan berkualitas untuk mempersiapkan generasi pemimpin masa depan.
    </p>
    <div class="de-hero-actions">
      <a href="?p=info&id=1" class="de-btn-primary">
        Jelajahi Profil <i class="bi bi-arrow-right ms-2"></i>
      </a>
      <a href="?p=psb" class="de-btn-outline">Daftar PSB Online</a>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ===== MAIN CONTENT ===== -->
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

<?php if ($page === ''): ?>
<!-- ===== STATS STRIP — Homepage Only ===== -->
<section class="de-stats">
  <div class="container position-relative">
    <div class="row g-4">
      <div class="col-6 col-md-3">
        <div class="de-stat-item">
          <div class="de-stat-icon"><i class="bi bi-people-fill"></i></div>
          <div class="de-stat-num">850+</div>
          <div class="de-stat-label">Siswa Aktif</div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="de-stat-item">
          <div class="de-stat-icon"><i class="bi bi-mortarboard-fill"></i></div>
          <div class="de-stat-num">65</div>
          <div class="de-stat-label">Tenaga Pendidik</div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="de-stat-item">
          <div class="de-stat-icon"><i class="bi bi-door-open-fill"></i></div>
          <div class="de-stat-num">32</div>
          <div class="de-stat-label">Ruang Kelas</div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="de-stat-item">
          <div class="de-stat-icon"><i class="bi bi-trophy-fill"></i></div>
          <div class="de-stat-num">124</div>
          <div class="de-stat-label">Penghargaan</div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php include "file/tema/edisi_spesial/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
