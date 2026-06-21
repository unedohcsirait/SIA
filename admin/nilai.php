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
      <h4>Manajemen Nilai</h4>
      <nav aria-label="breadcrumb"><ol class="breadcrumb" style="font-size:12px;margin:4px 0 0;">
        <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
        <li class="breadcrumb-item active">Manajemen Nilai</li>
      </ol></nav>
    </div>
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahNilai">
      <i class="bi bi-plus-circle me-1"></i>Input Nilai
    </button>
  </div>

  <?php
  include "../konfigurasi/koneksi.php";
  $msg = '';

  // Handle hapus
  if (isset($_GET['hapus'])) {
    $id = (int)$_GET['hapus'];
    mysql_query("DELETE FROM sh_nilai WHERE id_nilai='$id'");
    $msg = '<div class="alert-modern alert-danger-modern mb-3"><i class="bi bi-trash-fill"></i> Data nilai berhasil dihapus.</div>';
  }

  // Handle simpan
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['simpan_nilai'])) {
    $id_siswa     = (int)$_POST['id_siswa'];
    $id_mapel     = (int)$_POST['id_mapel'];
    $semester     = mysql_real_escape_string($_POST['semester']);
    $tahun_ajaran = mysql_real_escape_string($_POST['tahun_ajaran']);
    $nil_tugas    = (float)$_POST['nilai_tugas'];
    $nil_uts      = (float)$_POST['nilai_uts'];
    $nil_uas      = (float)$_POST['nilai_uas'];
    $nil_akhir    = round(($nil_tugas * 0.3) + ($nil_uts * 0.3) + ($nil_uas * 0.4), 2);
    $ket          = mysql_real_escape_string($_POST['keterangan'] ?? '');
    $user         = mysql_real_escape_string($_SESSION['adminsh']);

    mysql_query("INSERT INTO sh_nilai (id_siswa, id_mapel, semester, tahun_ajaran, nilai_tugas, nilai_uts, nilai_uas, nilai_akhir, keterangan, s_username)
                 VALUES ('$id_siswa','$id_mapel','$semester','$tahun_ajaran','$nil_tugas','$nil_uts','$nil_uas','$nil_akhir','$ket','$user')");
    $msg = '<div class="alert-modern alert-success-modern mb-3"><i class="bi bi-check-circle-fill"></i> Nilai berhasil disimpan. Nilai akhir: <strong>' . $nil_akhir . '</strong></div>';
  }

  echo $msg;

  // Filter
  $filterKelas = (int)($_GET['kelas'] ?? 0);
  $filterMapel = (int)($_GET['mapel'] ?? 0);
  $filterSem   = mysql_real_escape_string($_GET['semester'] ?? '');

  $where = "WHERE 1=1";
  if ($filterKelas) $where .= " AND s.id_kelas='$filterKelas'";
  if ($filterMapel) $where .= " AND n.id_mapel='$filterMapel'";
  if ($filterSem)   $where .= " AND n.semester='$filterSem'";

  $resNilai = mysql_query("SELECT n.*, s.nama_siswa, s.nis, m.nama_mapel, k.nama_kelas
    FROM sh_nilai n
    JOIN sh_siswa s ON n.id_siswa = s.id_siswa
    JOIN sh_mapel m ON n.id_mapel = m.id_mapel
    LEFT JOIN sh_kelas k ON s.id_kelas = k.id_kelas
    $where ORDER BY n.id_nilai DESC LIMIT 100");

  $allKelas = mysql_query("SELECT * FROM sh_kelas ORDER BY nama_kelas");
  $allMapel = mysql_query("SELECT * FROM sh_mapel ORDER BY nama_mapel");
  $allSiswa = mysql_query("SELECT id_siswa, nama_siswa, nis FROM sh_siswa WHERE status_siswa='1' ORDER BY nama_siswa");
  ?>

  <!-- Filter -->
  <div class="content-card mb-3">
    <div class="content-card-header"><h6><i class="bi bi-funnel me-2"></i>Filter Data</h6></div>
    <div class="content-card-body">
      <form method="GET" class="row g-2 align-items-end">
        <div class="col-md-3">
          <label class="form-label">Kelas</label>
          <select name="kelas" class="form-select form-select-sm">
            <option value="">Semua Kelas</option>
            <?php $allKelasFilter = mysql_query("SELECT * FROM sh_kelas ORDER BY nama_kelas");
            while($k=mysql_fetch_array($allKelasFilter)): ?>
            <option value="<?php echo $k['id_kelas']; ?>" <?php echo $filterKelas==$k['id_kelas']?'selected':''; ?>>
              <?php echo htmlspecialchars($k['nama_kelas']); ?>
            </option>
            <?php endwhile; ?>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">Mata Pelajaran</label>
          <select name="mapel" class="form-select form-select-sm">
            <option value="">Semua Mapel</option>
            <?php $allMapelFilter = mysql_query("SELECT * FROM sh_mapel ORDER BY nama_mapel");
            while($m=mysql_fetch_array($allMapelFilter)): ?>
            <option value="<?php echo $m['id_mapel']; ?>" <?php echo $filterMapel==$m['id_mapel']?'selected':''; ?>>
              <?php echo htmlspecialchars($m['nama_mapel']); ?>
            </option>
            <?php endwhile; ?>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">Semester</label>
          <select name="semester" class="form-select form-select-sm">
            <option value="">Semua Semester</option>
            <option value="Ganjil" <?php echo $filterSem=='Ganjil'?'selected':''; ?>>Ganjil</option>
            <option value="Genap"  <?php echo $filterSem=='Genap'?'selected':''; ?>>Genap</option>
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

  <!-- Tabel Nilai -->
  <div class="content-card">
    <div class="content-card-header">
      <h6><i class="bi bi-table me-2"></i>Data Nilai Siswa</h6>
      <span style="font-size:12px;color:#64748b;"><?php echo mysql_num_rows($resNilai); ?> data</span>
    </div>
    <div style="overflow-x:auto;">
      <table class="table-modern">
        <thead>
          <tr>
            <th>#</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Mata Pelajaran</th>
            <th>Semester</th>
            <th>Tugas</th>
            <th>UTS</th>
            <th>UAS</th>
            <th>Nilai Akhir</th>
            <th>Predikat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          while ($row = mysql_fetch_array($resNilai)):
            $na = (float)$row['nilai_akhir'];
            if ($na >= 90) { $pred = 'A'; $predColor = '#15803d'; $predBg = '#dcfce7'; }
            elseif ($na >= 80) { $pred = 'B'; $predColor = '#1d4ed8'; $predBg = '#dbeafe'; }
            elseif ($na >= 70) { $pred = 'C'; $predColor = '#b45309'; $predBg = '#fef9c3'; }
            elseif ($na >= 60) { $pred = 'D'; $predColor = '#ea580c'; $predBg = '#ffedd5'; }
            else { $pred = 'E'; $predColor = '#dc2626'; $predBg = '#fee2e2'; }
          ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($row['nis']); ?></td>
            <td><strong><?php echo htmlspecialchars($row['nama_siswa']); ?></strong></td>
            <td><?php echo htmlspecialchars($row['nama_kelas'] ?? '-'); ?></td>
            <td><?php echo htmlspecialchars($row['nama_mapel']); ?></td>
            <td><?php echo htmlspecialchars($row['semester']); ?></td>
            <td><?php echo number_format($row['nilai_tugas'],1); ?></td>
            <td><?php echo number_format($row['nilai_uts'],1); ?></td>
            <td><?php echo number_format($row['nilai_uas'],1); ?></td>
            <td><strong><?php echo number_format($na,1); ?></strong></td>
            <td><span class="badge" style="background:<?php echo $predBg; ?>;color:<?php echo $predColor; ?>;padding:4px 10px;border-radius:6px;font-weight:600;"><?php echo $pred; ?></span></td>
            <td>
              <a href="?hapus=<?php echo $row['id_nilai']; ?>" onclick="return confirm('Hapus nilai ini?')" class="btn btn-sm" style="background:#fee2e2;color:#dc2626;border:none;border-radius:6px;padding:4px 10px;" title="Hapus">
                <i class="bi bi-trash"></i>
              </a>
            </td>
          </tr>
          <?php endwhile; ?>
          <?php if ($no === 1): ?>
          <tr><td colspan="12" class="text-center" style="padding:32px;color:#94a3b8;">
            <i class="bi bi-inbox" style="font-size:28px;display:block;margin-bottom:8px;"></i>
            Belum ada data nilai
          </td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Input Nilai -->
<div class="modal fade" id="modalTambahNilai" tabindex="-1">
  <div class="modal-dialog modal-md">
    <div class="modal-content" style="border-radius:16px; border:none;">
      <div class="modal-header" style="border-bottom:1px solid #f1f5f9;padding:20px 24px;">
        <h5 class="modal-title fw-bold"><i class="bi bi-clipboard-data me-2 text-primary"></i>Input Nilai Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST">
        <div class="modal-body" style="padding:24px;">
          <div class="mb-3">
            <label class="form-label">Siswa</label>
            <select name="id_siswa" class="form-select" required>
              <option value="">-- Pilih Siswa --</option>
              <?php
              while ($s = mysql_fetch_array($allSiswa)):
              ?>
              <option value="<?php echo $s['id_siswa']; ?>"><?php echo htmlspecialchars($s['nis'] . ' - ' . $s['nama_siswa']); ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Mata Pelajaran</label>
            <select name="id_mapel" class="form-select" required>
              <option value="">-- Pilih Mapel --</option>
              <?php
              while ($m = mysql_fetch_array($allMapel)):
              ?>
              <option value="<?php echo $m['id_mapel']; ?>"><?php echo htmlspecialchars($m['nama_mapel']); ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="row g-2">
            <div class="col-6">
              <label class="form-label">Semester</label>
              <select name="semester" class="form-select" required>
                <option value="Ganjil">Ganjil</option>
                <option value="Genap">Genap</option>
              </select>
            </div>
            <div class="col-6">
              <label class="form-label">Tahun Ajaran</label>
              <input type="text" name="tahun_ajaran" class="form-control" placeholder="2024/2025" required>
            </div>
          </div>
          <div class="row g-2 mt-1">
            <div class="col-4">
              <label class="form-label">Nilai Tugas <small class="text-muted">(30%)</small></label>
              <input type="number" name="nilai_tugas" class="form-control" min="0" max="100" step="0.1" placeholder="0-100" required oninput="hitungAkhir()">
            </div>
            <div class="col-4">
              <label class="form-label">Nilai UTS <small class="text-muted">(30%)</small></label>
              <input type="number" name="nilai_uts" class="form-control" min="0" max="100" step="0.1" placeholder="0-100" required oninput="hitungAkhir()">
            </div>
            <div class="col-4">
              <label class="form-label">Nilai UAS <small class="text-muted">(40%)</small></label>
              <input type="number" name="nilai_uas" class="form-control" min="0" max="100" step="0.1" placeholder="0-100" required oninput="hitungAkhir()">
            </div>
          </div>
          <div class="mt-3 p-3" style="background:#f0f9ff;border-radius:10px;border:1px solid #bae6fd;">
            <div style="font-size:13px;color:#0369a1;">
              <strong>Nilai Akhir (Otomatis):</strong>
              <span id="previewNilai" style="font-size:20px;font-weight:700;color:#0284c7;margin-left:8px;">-</span>
            </div>
          </div>
          <div class="mb-0 mt-3">
            <label class="form-label">Keterangan (opsional)</label>
            <input type="text" name="keterangan" class="form-control" placeholder="Misal: Nilai remedial">
          </div>
        </div>
        <div class="modal-footer" style="border-top:1px solid #f1f5f9;padding:16px 24px;">
          <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
          <button type="submit" name="simpan_nilai" class="btn btn-primary btn-sm">
            <i class="bi bi-save me-1"></i>Simpan Nilai
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function hitungAkhir() {
  const t = parseFloat(document.querySelector('[name=nilai_tugas]').value) || 0;
  const uts = parseFloat(document.querySelector('[name=nilai_uts]').value) || 0;
  const uas = parseFloat(document.querySelector('[name=nilai_uas]').value) || 0;
  const akhir = (t * 0.3) + (uts * 0.3) + (uas * 0.4);
  document.getElementById('previewNilai').textContent = akhir.toFixed(2);
}
<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['simpan_nilai'])): ?>
document.addEventListener('DOMContentLoaded', function() {
  const modal = document.getElementById('modalTambahNilai');
  if (modal) { const m = new bootstrap.Modal(modal); m.hide(); }
});
<?php endif; ?>
</script>

<?php include "konten/footer.php"; ?>
</body>
