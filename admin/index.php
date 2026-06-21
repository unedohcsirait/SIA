<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['adminsh'])) {
    header('location:login.php');
    exit;
}
include "konten/awal.php";
?>
<body>
<?php include "konten/header.php"; ?>

<div id="main-content">

  <!-- Page Header -->
  <div class="page-header">
    <div>
      <h4>Dashboard</h4>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="font-size:12px;margin:4px 0 0;">
          <li class="breadcrumb-item active">Beranda</li>
        </ol>
      </nav>
    </div>
    <span style="font-size:13px;color:#64748b;">
      <i class="bi bi-clock me-1"></i><?php echo date('l, d F Y'); ?>
    </span>
  </div>

  <?php
  // --- Query semua statistik ---
  $jmlsiswa    = mysql_num_rows(mysql_query("SELECT id_siswa FROM sh_siswa WHERE status_siswa='1'"));
  $jmlalumni   = mysql_num_rows(mysql_query("SELECT id_siswa FROM sh_siswa WHERE status_siswa='0'"));
  $jmlguru     = mysql_num_rows(mysql_query("SELECT id_guru_staff FROM sh_guru_staff WHERE posisi='guru'"));
  $jmlstaff    = mysql_num_rows(mysql_query("SELECT id_guru_staff FROM sh_guru_staff WHERE posisi='staff'"));
  $jmlmapel    = mysql_num_rows(mysql_query("SELECT id_mapel FROM sh_mapel"));
  $jmlkelas    = mysql_num_rows(mysql_query("SELECT id_kelas FROM sh_kelas"));
  $jmlberita   = mysql_num_rows(mysql_query("SELECT id_berita FROM sh_berita"));
  $jmlpsb      = mysql_num_rows(mysql_query("SELECT id_psb FROM sh_psb"));
  $jmlmateri   = mysql_num_rows(mysql_query("SELECT id_materi FROM sh_materi"));
  $jmlpengumuman = mysql_num_rows(mysql_query("SELECT id_pengumuman FROM sh_pengumuman"));

  $tanggal = date("Ymd");
  $bataswaktu = time() - 300;
  $pengunjungHariIni = mysql_num_rows(mysql_query("SELECT * FROM sh_statistik WHERE tanggal='$tanggal' GROUP BY ip_addres"));
  $pengunjungOnline  = mysql_num_rows(mysql_query("SELECT * FROM sh_statistik WHERE online > '$bataswaktu'"));
  $totalPengunjung   = mysql_result(mysql_query("SELECT COUNT(mengunjungi) FROM sh_statistik"), 0);

  // Siswa per kelas untuk chart
  $kelasData  = [];
  $resKelas   = mysql_query("SELECT k.nama_kelas, COUNT(s.id_siswa) AS jumlah FROM sh_kelas k LEFT JOIN sh_siswa s ON k.id_kelas = s.id_kelas AND s.status_siswa='1' GROUP BY k.id_kelas, k.nama_kelas ORDER BY k.nama_kelas");
  while ($row = mysql_fetch_array($resKelas)) {
      $kelasData[] = $row;
  }
  ?>

  <!-- Stat Cards Row 1 -->
  <div class="row g-3 mb-3">
    <div class="col-6 col-md-3">
      <a href="siswa.php" class="stat-card d-flex">
        <div class="stat-icon" style="background:#dbeafe; color:#2563eb;"><i class="bi bi-people-fill"></i></div>
        <div class="stat-info">
          <div class="stat-value"><?php echo $jmlsiswa; ?></div>
          <div class="stat-label">Siswa Aktif</div>
        </div>
      </a>
    </div>
    <div class="col-6 col-md-3">
      <a href="guru_staff.php" class="stat-card d-flex">
        <div class="stat-icon" style="background:#dcfce7; color:#16a34a;"><i class="bi bi-person-badge-fill"></i></div>
        <div class="stat-info">
          <div class="stat-value"><?php echo $jmlguru; ?></div>
          <div class="stat-label">Guru</div>
        </div>
      </a>
    </div>
    <div class="col-6 col-md-3">
      <a href="mata_pelajaran.php" class="stat-card d-flex">
        <div class="stat-icon" style="background:#fef9c3; color:#ca8a04;"><i class="bi bi-book-fill"></i></div>
        <div class="stat-info">
          <div class="stat-value"><?php echo $jmlmapel; ?></div>
          <div class="stat-label">Mata Pelajaran</div>
        </div>
      </a>
    </div>
    <div class="col-6 col-md-3">
      <a href="kelas.php" class="stat-card d-flex">
        <div class="stat-icon" style="background:#fce7f3; color:#be185d;"><i class="bi bi-diagram-3-fill"></i></div>
        <div class="stat-info">
          <div class="stat-value"><?php echo $jmlkelas; ?></div>
          <div class="stat-label">Kelas</div>
        </div>
      </a>
    </div>
  </div>

  <!-- Stat Cards Row 2 -->
  <div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
      <a href="berita.php" class="stat-card d-flex">
        <div class="stat-icon" style="background:#ede9fe; color:#7c3aed;"><i class="bi bi-newspaper"></i></div>
        <div class="stat-info">
          <div class="stat-value"><?php echo $jmlberita; ?></div>
          <div class="stat-label">Berita</div>
        </div>
      </a>
    </div>
    <div class="col-6 col-md-3">
      <a href="psb_online.php" class="stat-card d-flex">
        <div class="stat-icon" style="background:#ffedd5; color:#ea580c;"><i class="bi bi-person-plus-fill"></i></div>
        <div class="stat-info">
          <div class="stat-value"><?php echo $jmlpsb; ?></div>
          <div class="stat-label">Pendaftar PSB</div>
        </div>
      </a>
    </div>
    <div class="col-6 col-md-3">
      <a href="statistik.php" class="stat-card d-flex">
        <div class="stat-icon" style="background:#e0f2fe; color:#0284c7;"><i class="bi bi-eye-fill"></i></div>
        <div class="stat-info">
          <div class="stat-value"><?php echo $pengunjungHariIni; ?></div>
          <div class="stat-label">Pengunjung Hari Ini</div>
        </div>
      </a>
    </div>
    <div class="col-6 col-md-3">
      <a href="statistik.php" class="stat-card d-flex">
        <div class="stat-icon" style="background:#d1fae5; color:#059669;"><i class="bi bi-wifi"></i></div>
        <div class="stat-info">
          <div class="stat-value"><?php echo $pengunjungOnline; ?></div>
          <div class="stat-label">Online Sekarang</div>
        </div>
      </a>
    </div>
  </div>

  <!-- Charts & Info Row -->
  <div class="row g-3 mb-3">
    <!-- Chart Siswa per Kelas -->
    <div class="col-md-7">
      <div class="content-card">
        <div class="content-card-header">
          <h6><i class="bi bi-bar-chart-fill me-2 text-primary"></i>Jumlah Siswa per Kelas</h6>
        </div>
        <div class="content-card-body">
          <canvas id="chartKelas" height="220"></canvas>
        </div>
      </div>
    </div>
    <!-- Pie Chart Komposisi -->
    <div class="col-md-5">
      <div class="content-card">
        <div class="content-card-header">
          <h6><i class="bi bi-pie-chart-fill me-2 text-success"></i>Komposisi Warga Sekolah</h6>
        </div>
        <div class="content-card-body d-flex align-items-center justify-content-center">
          <canvas id="chartKomposisi" height="220"></canvas>
        </div>
      </div>
    </div>
  </div>

  <!-- Info Ringkas & Komentar Terbaru -->
  <div class="row g-3 mb-3">
    <!-- Ringkasan Data -->
    <div class="col-md-5">
      <div class="content-card">
        <div class="content-card-header">
          <h6><i class="bi bi-list-check me-2"></i>Ringkasan Data Website</h6>
          <a href="statistik.php" style="font-size:12px; color:#2563eb;">Lihat Statistik</a>
        </div>
        <div class="content-card-body p-0">
          <table class="table-modern" style="width:100%">
            <tbody>
              <tr><td><i class="bi bi-people me-2 text-primary"></i>Siswa Aktif</td><td class="text-end fw-bold"><?php echo $jmlsiswa; ?></td></tr>
              <tr><td><i class="bi bi-person-check me-2 text-success"></i>Alumni</td><td class="text-end fw-bold"><?php echo $jmlalumni; ?></td></tr>
              <tr><td><i class="bi bi-person-badge me-2 text-warning"></i>Guru</td><td class="text-end fw-bold"><?php echo $jmlguru; ?></td></tr>
              <tr><td><i class="bi bi-person-workspace me-2 text-secondary"></i>Staff</td><td class="text-end fw-bold"><?php echo $jmlstaff; ?></td></tr>
              <tr><td><i class="bi bi-megaphone me-2 text-danger"></i>Pengumuman</td><td class="text-end fw-bold"><?php echo $jmlpengumuman; ?></td></tr>
              <tr><td><i class="bi bi-file-earmark me-2 text-info"></i>Materi E-Learning</td><td class="text-end fw-bold"><?php echo $jmlmateri; ?></td></tr>
              <tr><td><i class="bi bi-globe me-2"></i>Total Pengunjung</td><td class="text-end fw-bold"><?php echo number_format($totalPengunjung); ?></td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Komentar Terbaru -->
    <div class="col-md-7">
      <div class="content-card">
        <div class="content-card-header">
          <h6><i class="bi bi-chat-dots-fill me-2"></i>Komentar Terbaru</h6>
          <a href="komentar.php" style="font-size:12px; color:#2563eb;">Lihat Semua</a>
        </div>
        <div class="content-card-body p-0">
          <?php
          $komterbaru = mysql_query("SELECT k.*, b.judul_berita FROM sh_komentar k JOIN sh_berita b ON k.id_berita=b.id_berita ORDER BY k.id_komentar DESC LIMIT 6");
          $ctr = 0;
          while ($kt = mysql_fetch_array($komterbaru)):
            $ctr++;
          ?>
          <div style="padding:12px 20px; border-bottom:1px solid #f1f5f9; font-size:13px;">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:3px;">
              <strong style="color:#1e293b;"><?php echo htmlspecialchars($kt['nama_komentar']); ?></strong>
              <span style="font-size:11px;color:#94a3b8;"><?php echo $kt['tanggal_komentar']; ?></span>
            </div>
            <div style="color:#64748b;margin-bottom:2px;">pada <a href="berita.php?pilih=edit&id=<?php echo $kt['id_berita']; ?>" style="color:#2563eb;"><?php echo htmlspecialchars($kt['judul_berita']); ?></a></div>
            <div style="color:#475569;"><?php echo htmlspecialchars(substr($kt['isi_komentar'], 0, 80)) . (strlen($kt['isi_komentar'])>80 ? '...' : ''); ?></div>
          </div>
          <?php endwhile; ?>
          <?php if ($ctr === 0): ?>
          <div style="padding:20px;text-align:center;color:#94a3b8;font-size:13px;">
            <i class="bi bi-chat-square" style="font-size:28px;display:block;margin-bottom:8px;"></i>
            Belum ada komentar
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Quick Actions -->
  <div class="row g-3 mb-3">
    <div class="col-12">
      <div class="content-card">
        <div class="content-card-header">
          <h6><i class="bi bi-lightning-fill me-2 text-warning"></i>Aksi Cepat</h6>
        </div>
        <div class="content-card-body">
          <div class="d-flex flex-wrap gap-2">
            <a href="berita.php?pilih=tambah" class="btn btn-sm btn-outline-primary"><i class="bi bi-plus-circle me-1"></i>Tambah Berita</a>
            <a href="pengumuman.php?pilih=tambah" class="btn btn-sm btn-outline-success"><i class="bi bi-plus-circle me-1"></i>Tambah Pengumuman</a>
            <a href="siswa.php?pilih=tambah" class="btn btn-sm btn-outline-info"><i class="bi bi-plus-circle me-1"></i>Tambah Siswa</a>
            <a href="nilai.php" class="btn btn-sm btn-outline-warning"><i class="bi bi-clipboard-data me-1"></i>Input Nilai</a>
            <a href="absensi.php" class="btn btn-sm btn-outline-danger"><i class="bi bi-calendar-check me-1"></i>Input Absensi</a>
            <a href="psb_online.php" class="btn btn-sm btn-outline-secondary"><i class="bi bi-person-plus me-1"></i>Lihat Pendaftar</a>
          </div>
        </div>
      </div>
    </div>
  </div>

</div><!-- end main-content -->

<?php include "konten/footer.php"; ?>

<script>
// Chart Siswa per Kelas
const kelasLabels = <?php echo json_encode(array_column($kelasData, 'nama_kelas')); ?>;
const kelasJumlah = <?php echo json_encode(array_map('intval', array_column($kelasData, 'jumlah'))); ?>;

const ctxKelas = document.getElementById('chartKelas').getContext('2d');
new Chart(ctxKelas, {
  type: 'bar',
  data: {
    labels: kelasLabels.length ? kelasLabels : ['Belum ada data'],
    datasets: [{
      label: 'Jumlah Siswa',
      data: kelasJumlah.length ? kelasJumlah : [0],
      backgroundColor: 'rgba(37, 99, 235, 0.75)',
      borderColor: 'rgba(37, 99, 235, 1)',
      borderWidth: 1.5,
      borderRadius: 6,
    }]
  },
  options: {
    responsive: true,
    plugins: { legend: { display: false } },
    scales: {
      y: { beginAtZero: true, grid: { color: '#f1f5f9' }, ticks: { stepSize: 1 } },
      x: { grid: { display: false } }
    }
  }
});

// Pie Chart Komposisi
const ctxPie = document.getElementById('chartKomposisi').getContext('2d');
new Chart(ctxPie, {
  type: 'doughnut',
  data: {
    labels: ['Siswa Aktif', 'Alumni', 'Guru', 'Staff'],
    datasets: [{
      data: [<?php echo $jmlsiswa; ?>, <?php echo $jmlalumni; ?>, <?php echo $jmlguru; ?>, <?php echo $jmlstaff; ?>],
      backgroundColor: ['#2563eb', '#16a34a', '#ca8a04', '#7c3aed'],
      borderWidth: 2,
      borderColor: '#fff',
    }]
  },
  options: {
    responsive: true,
    plugins: {
      legend: { position: 'bottom', labels: { font: { size: 12 }, padding: 16 } }
    },
    cutout: '60%',
  }
});
</script>
</body>
