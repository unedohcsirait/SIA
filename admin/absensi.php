<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['adminsh'])) { header('location:login.php'); exit; }

include "konten/awal.php";
?>
<body>
<?php include "konten/header.php"; ?>
<div id="main-content">

  <div class="page-header">
    <div>
      <h4>Absensi Siswa</h4>
      <nav aria-label="breadcrumb"><ol class="breadcrumb" style="font-size:12px;margin:4px 0 0;">
        <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
        <li class="breadcrumb-item active">Absensi</li>
      </ol></nav>
    </div>
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalInputAbsensi">
      <i class="bi bi-plus-circle me-1"></i>Input Absensi
    </button>
  </div>

  <?php
  include "../konfigurasi/koneksi.php";
  $msg = '';

  // Handle hapus
  if (isset($_GET['hapus'])) {
    $id = (int)$_GET['hapus'];
    mysql_query("DELETE FROM sh_absensi WHERE id_absensi='$id'");
    $msg = '<div class="alert-modern alert-danger-modern mb-3"><i class="bi bi-trash-fill"></i> Data absensi berhasil dihapus.</div>';
  }

  // Handle simpan (bisa bulk per kelas)
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['simpan_absensi'])) {
    $id_kelas = (int)$_POST['id_kelas'];
    $tanggal  = mysql_real_escape_string($_POST['tanggal']);
    $user     = mysql_real_escape_string($_SESSION['adminsh']);
    $statuses = $_POST['status'] ?? [];
    $keterangan = $_POST['keterangan'] ?? [];
    $saved = 0;
    foreach ($statuses as $id_siswa => $status) {
      $id_siswa = (int)$id_siswa;
      $status = mysql_real_escape_string($status);
      $ket    = mysql_real_escape_string($keterangan[$id_siswa] ?? '');
      $check  = mysql_num_rows(mysql_query("SELECT id_absensi FROM sh_absensi WHERE id_siswa='$id_siswa' AND tanggal='$tanggal'"));
      if ($check > 0) {
        mysql_query("UPDATE sh_absensi SET status='$status', keterangan='$ket', s_username='$user' WHERE id_siswa='$id_siswa' AND tanggal='$tanggal'");
      } else {
        mysql_query("INSERT INTO sh_absensi (id_siswa, id_kelas, tanggal, status, keterangan, s_username) VALUES ('$id_siswa','$id_kelas','$tanggal','$status','$ket','$user')");
      }
      $saved++;
    }
    $msg = '<div class="alert-modern alert-success-modern mb-3"><i class="bi bi-check-circle-fill"></i> Absensi untuk ' . $saved . ' siswa berhasil disimpan.</div>';
  }

  echo $msg;

  // Filter
  $filterKelas   = (int)($_GET['kelas'] ?? 0);
  $filterTanggal = mysql_real_escape_string($_GET['tanggal'] ?? '');
  $filterStatus  = mysql_real_escape_string($_GET['status'] ?? '');

  $where = "WHERE 1=1";
  if ($filterKelas)   $where .= " AND a.id_kelas='$filterKelas'";
  if ($filterTanggal) $where .= " AND a.tanggal='$filterTanggal'";
  if ($filterStatus)  $where .= " AND a.status='$filterStatus'";

  $resAbsensi = mysql_query("SELECT a.*, s.nama_siswa, s.nis, k.nama_kelas
    FROM sh_absensi a
    JOIN sh_siswa s ON a.id_siswa = s.id_siswa
    LEFT JOIN sh_kelas k ON a.id_kelas = k.id_kelas
    $where ORDER BY a.tanggal DESC, s.nama_siswa ASC LIMIT 100");

  $allKelas = mysql_query("SELECT * FROM sh_kelas ORDER BY nama_kelas");

  // Statistik
  $statHadir = mysql_num_rows(mysql_query("SELECT id_absensi FROM sh_absensi WHERE status='Hadir'"));
  $statSakit = mysql_num_rows(mysql_query("SELECT id_absensi FROM sh_absensi WHERE status='Sakit'"));
  $statIzin  = mysql_num_rows(mysql_query("SELECT id_absensi FROM sh_absensi WHERE status='Izin'"));
  $statAlfa  = mysql_num_rows(mysql_query("SELECT id_absensi FROM sh_absensi WHERE status='Alfa'"));
  $statTotal = $statHadir + $statSakit + $statIzin + $statAlfa;
  ?>

  <!-- Stat Cards Absensi -->
  <div class="row g-3 mb-3">
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <div class="stat-icon" style="background:#dcfce7;color:#15803d;"><i class="bi bi-check-circle-fill"></i></div>
        <div class="stat-info"><div class="stat-value" style="font-size:22px;"><?php echo $statHadir; ?></div><div class="stat-label">Hadir</div></div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <div class="stat-icon" style="background:#fef9c3;color:#b45309;"><i class="bi bi-heart-pulse-fill"></i></div>
        <div class="stat-info"><div class="stat-value" style="font-size:22px;"><?php echo $statSakit; ?></div><div class="stat-label">Sakit</div></div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <div class="stat-icon" style="background:#dbeafe;color:#1d4ed8;"><i class="bi bi-envelope-fill"></i></div>
        <div class="stat-info"><div class="stat-value" style="font-size:22px;"><?php echo $statIzin; ?></div><div class="stat-label">Izin</div></div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-card">
        <div class="stat-icon" style="background:#fee2e2;color:#dc2626;"><i class="bi bi-x-circle-fill"></i></div>
        <div class="stat-info"><div class="stat-value" style="font-size:22px;"><?php echo $statAlfa; ?></div><div class="stat-label">Alfa/Bolos</div></div>
      </div>
    </div>
  </div>

  <!-- Filter -->
  <div class="content-card mb-3">
    <div class="content-card-header"><h6><i class="bi bi-funnel me-2"></i>Filter Data Absensi</h6></div>
    <div class="content-card-body">
      <form method="GET" class="row g-2 align-items-end">
        <div class="col-md-3">
          <label class="form-label">Kelas</label>
          <select name="kelas" class="form-select form-select-sm">
            <option value="">Semua Kelas</option>
            <?php $kf = mysql_query("SELECT * FROM sh_kelas ORDER BY nama_kelas");
            while($k=mysql_fetch_array($kf)): ?>
            <option value="<?php echo $k['id_kelas']; ?>" <?php echo $filterKelas==$k['id_kelas']?'selected':''; ?>>
              <?php echo htmlspecialchars($k['nama_kelas']); ?>
            </option>
            <?php endwhile; ?>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">Tanggal</label>
          <input type="date" name="tanggal" class="form-control form-control-sm" value="<?php echo htmlspecialchars($filterTanggal); ?>">
        </div>
        <div class="col-md-3">
          <label class="form-label">Status</label>
          <select name="status" class="form-select form-select-sm">
            <option value="">Semua Status</option>
            <option value="Hadir" <?php echo $filterStatus=='Hadir'?'selected':''; ?>>Hadir</option>
            <option value="Sakit" <?php echo $filterStatus=='Sakit'?'selected':''; ?>>Sakit</option>
            <option value="Izin"  <?php echo $filterStatus=='Izin'?'selected':''; ?>>Izin</option>
            <option value="Alfa"  <?php echo $filterStatus=='Alfa'?'selected':''; ?>>Alfa</option>
          </select>
        </div>
        <div class="col-md-3">
          <button type="submit" class="btn btn-primary btn-sm w-100">
            <i class="bi bi-search me-1"></i>Filter
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Tabel Absensi -->
  <div class="content-card">
    <div class="content-card-header">
      <h6><i class="bi bi-table me-2"></i>Data Absensi</h6>
      <span style="font-size:12px;color:#64748b;"><?php echo mysql_num_rows($resAbsensi); ?> data</span>
    </div>
    <div style="overflow-x:auto;">
      <table class="table-modern">
        <thead>
          <tr>
            <th>#</th>
            <th>Tanggal</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Dicatat Oleh</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $badgeMap = [
            'Hadir' => 'badge-hadir',
            'Sakit' => 'badge-sakit',
            'Izin'  => 'badge-izin',
            'Alfa'  => 'badge-alfa',
          ];
          $no = 1;
          while ($row = mysql_fetch_array($resAbsensi)):
            $badgeCls = $badgeMap[$row['status']] ?? '';
          ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo date('d M Y', strtotime($row['tanggal'])); ?></td>
            <td><?php echo htmlspecialchars($row['nis']); ?></td>
            <td><strong><?php echo htmlspecialchars($row['nama_siswa']); ?></strong></td>
            <td><?php echo htmlspecialchars($row['nama_kelas'] ?? '-'); ?></td>
            <td><span class="badge <?php echo $badgeCls; ?>" style="padding:4px 12px;border-radius:6px;font-weight:600;"><?php echo $row['status']; ?></span></td>
            <td><?php echo htmlspecialchars($row['keterangan'] ?: '-'); ?></td>
            <td><?php echo htmlspecialchars($row['s_username']); ?></td>
            <td>
              <a href="?hapus=<?php echo $row['id_absensi']; ?>" onclick="return confirm('Hapus data absensi ini?')" class="btn btn-sm" style="background:#fee2e2;color:#dc2626;border:none;border-radius:6px;padding:4px 10px;">
                <i class="bi bi-trash"></i>
              </a>
            </td>
          </tr>
          <?php endwhile; ?>
          <?php if ($no === 1): ?>
          <tr><td colspan="9" class="text-center" style="padding:32px;color:#94a3b8;">
            <i class="bi bi-calendar-x" style="font-size:28px;display:block;margin-bottom:8px;"></i>
            Belum ada data absensi
          </td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Input Absensi (Bulk per Kelas) -->
<div class="modal fade" id="modalInputAbsensi" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="border-radius:16px;border:none;">
      <div class="modal-header" style="border-bottom:1px solid #f1f5f9;padding:20px 24px;">
        <h5 class="modal-title fw-bold"><i class="bi bi-calendar-check me-2 text-primary"></i>Input Absensi Per Kelas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" style="padding:24px;">
        <!-- Step 1: Pilih kelas & tanggal -->
        <div id="step1">
          <div class="row g-2 mb-3">
            <div class="col-md-6">
              <label class="form-label">Kelas</label>
              <select id="pilihKelas" class="form-select">
                <option value="">-- Pilih Kelas --</option>
                <?php while($k=mysql_fetch_array($allKelas)): ?>
                <option value="<?php echo $k['id_kelas']; ?>"><?php echo htmlspecialchars($k['nama_kelas']); ?></option>
                <?php endwhile; ?>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Tanggal</label>
              <input type="date" id="pilihTanggal" class="form-control" value="<?php echo date('Y-m-d'); ?>">
            </div>
          </div>
          <button type="button" class="btn btn-primary btn-sm" onclick="loadSiswa()">
            <i class="bi bi-arrow-right me-1"></i>Muat Daftar Siswa
          </button>
        </div>
        <!-- Step 2: Form Absensi -->
        <form method="POST" id="formAbsensi" style="display:none;">
          <input type="hidden" name="id_kelas" id="hdnKelas">
          <input type="hidden" name="tanggal" id="hdnTanggal">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <strong id="labelKelas" style="font-size:14px;"></strong>
            <div>
              <button type="button" class="btn btn-sm btn-outline-success me-1" onclick="setAllStatus('Hadir')">Semua Hadir</button>
              <button type="button" class="btn btn-sm btn-outline-secondary" onclick="document.getElementById('step1').style.display='block';document.getElementById('formAbsensi').style.display='none';">Kembali</button>
            </div>
          </div>
          <div style="max-height:350px;overflow-y:auto;">
            <table class="table-modern" id="tblAbsensi">
              <thead>
                <tr><th>#</th><th>NIS</th><th>Nama Siswa</th><th>Status</th><th>Keterangan</th></tr>
              </thead>
              <tbody id="tbodySiswa"></tbody>
            </table>
          </div>
          <div class="mt-3">
            <button type="submit" name="simpan_absensi" class="btn btn-primary">
              <i class="bi bi-save me-1"></i>Simpan Semua Absensi
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
function loadSiswa() {
  const kelasId = document.getElementById('pilihKelas').value;
  const tgl     = document.getElementById('pilihTanggal').value;
  if (!kelasId || !tgl) { alert('Pilih kelas dan tanggal terlebih dahulu.'); return; }

  fetch('aplikasi/get_siswa_kelas.php?id_kelas=' + kelasId)
    .then(r => r.json())
    .then(data => {
      if (!data.length) { alert('Tidak ada siswa di kelas ini.'); return; }

      document.getElementById('hdnKelas').value   = kelasId;
      document.getElementById('hdnTanggal').value = tgl;
      document.getElementById('labelKelas').textContent = 'Kelas: ' + document.getElementById('pilihKelas').selectedOptions[0].text + ' — ' + tgl;

      const tbody = document.getElementById('tbodySiswa');
      tbody.innerHTML = '';
      data.forEach((s, i) => {
        const row = `<tr>
          <td>${i+1}</td>
          <td>${s.nis}</td>
          <td><strong>${s.nama_siswa}</strong></td>
          <td>
            <select name="status[${s.id_siswa}]" class="form-select form-select-sm" style="width:110px;" required>
              <option value="Hadir" selected>Hadir</option>
              <option value="Sakit">Sakit</option>
              <option value="Izin">Izin</option>
              <option value="Alfa">Alfa</option>
            </select>
          </td>
          <td><input type="text" name="keterangan[${s.id_siswa}]" class="form-control form-control-sm" placeholder="Keterangan..." style="width:160px;"></td>
        </tr>`;
        tbody.insertAdjacentHTML('beforeend', row);
      });

      document.getElementById('step1').style.display = 'none';
      document.getElementById('formAbsensi').style.display = 'block';
    })
    .catch(() => alert('Gagal memuat data siswa.'));
}

function setAllStatus(status) {
  document.querySelectorAll('#tbodySiswa select').forEach(s => s.value = status);
}
</script>

<?php include "konten/footer.php"; ?>
</body>
