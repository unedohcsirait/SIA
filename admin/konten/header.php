<?php
$namasekolah = mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='8'");
$ns = mysql_fetch_array($namasekolah);

$urlsekolah = mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='1'");
$us = mysql_fetch_array($urlsekolah);

$userlink = mysql_query("SELECT * FROM sh_users WHERE s_username='" . mysql_real_escape_string($_SESSION['adminsh']) . "'");
$datauser = mysql_fetch_array($userlink);

$namaAwal = strtoupper(substr($_SESSION['namalengkap'] ?? 'A', 0, 1));
$namaSekolah = $ns['isi_pengaturan'] ?? 'SMPN 2 Binjai';
$urlSekolah  = $us['isi_pengaturan'] ?? '#';
?>

<!-- SIDEBAR -->
<div id="sidebar">
  <a href="index.php" class="sidebar-brand text-decoration-none">
    <div class="sidebar-brand-icon"><i class="bi bi-mortarboard-fill"></i></div>
    <div class="sidebar-brand-text">
      <strong>SIA Admin</strong>
      <span><?php echo htmlspecialchars($namaSekolah); ?></span>
    </div>
  </a>

  <nav class="sidebar-nav">
    <div class="nav-section-label">Utama</div>
    <a href="index.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF'])=='index.php'?'active':''; ?>">
      <i class="bi bi-speedometer2"></i> Dashboard
    </a>

    <div class="nav-section-label">Akademik</div>
    <a href="siswa.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF'])=='siswa.php'?'active':''; ?>">
      <i class="bi bi-people"></i> Siswa
    </a>
    <a href="guru_staff.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF'])=='guru_staff.php'?'active':''; ?>">
      <i class="bi bi-person-badge"></i> Guru & Staff
    </a>
    <a href="mata_pelajaran.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF'])=='mata_pelajaran.php'?'active':''; ?>">
      <i class="bi bi-book"></i> Mata Pelajaran
    </a>
    <a href="kelas.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF'])=='kelas.php'?'active':''; ?>">
      <i class="bi bi-diagram-3"></i> Kelas
    </a>
    <a href="nilai.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF'])=='nilai.php'?'active':''; ?>">
      <i class="bi bi-clipboard-data"></i> Manajemen Nilai
    </a>
    <a href="absensi.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF'])=='absensi.php'?'active':''; ?>">
      <i class="bi bi-calendar-check"></i> Absensi
    </a>

    <div class="nav-section-label">Konten</div>
    <a href="berita.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF'])=='berita.php'?'active':''; ?>">
      <i class="bi bi-newspaper"></i> Berita
    </a>
    <a href="pengumuman.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF'])=='pengumuman.php'?'active':''; ?>">
      <i class="bi bi-megaphone"></i> Pengumuman
    </a>
    <a href="agenda.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF'])=='agenda.php'?'active':''; ?>">
      <i class="bi bi-calendar-event"></i> Agenda
    </a>
    <a href="album_galeri.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF'])=='album_galeri.php'?'active':''; ?>">
      <i class="bi bi-images"></i> Album Galeri
    </a>

    <div class="nav-section-label">Lainnya</div>
    <a href="psb_online.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF'])=='psb_online.php'?'active':''; ?>">
      <i class="bi bi-person-plus"></i> PSB Online
    </a>
    <a href="buku_tamu.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF'])=='buku_tamu.php'?'active':''; ?>">
      <i class="bi bi-chat-square-text"></i> Buku Tamu
    </a>
    <a href="statistik.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF'])=='statistik.php'?'active':''; ?>">
      <i class="bi bi-bar-chart-line"></i> Statistik
    </a>
    <a href="admin.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF'])=='admin.php'?'active':''; ?>">
      <i class="bi bi-shield-person"></i> Manajemen Admin
    </a>
    <?php if($_SESSION['leveluser']=='Super Admin'): ?>
    <a href="pengaturan.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF'])=='pengaturan.php'?'active':''; ?>">
      <i class="bi bi-gear"></i> Pengaturan
    </a>
    <?php endif; ?>
  </nav>

  <div style="padding:16px 20px; border-top:1px solid rgba(255,255,255,0.08);">
    <a href="<?php echo "http://$urlSekolah"; ?>" target="_blank" class="sidebar-link" style="padding:8px 0;">
      <i class="bi bi-globe2"></i> Kunjungi Website
    </a>
    <a href="logout.php" onclick="return confirm('Keluar dari sistem?')" class="sidebar-link" style="padding:8px 0; color:#f87171;">
      <i class="bi bi-box-arrow-left"></i> Logout
    </a>
  </div>
</div>

<!-- TOPBAR -->
<div id="topbar">
  <div class="topbar-left">
    <button class="btn btn-sm d-md-none" id="sidebarToggle" style="background:none;border:none;">
      <i class="bi bi-list fs-5"></i>
    </button>
    <span class="topbar-title">
      <?php
        $titles = [
          'index.php' => 'Dashboard',
          'siswa.php' => 'Manajemen Siswa',
          'guru_staff.php' => 'Guru & Staff',
          'mata_pelajaran.php' => 'Mata Pelajaran',
          'kelas.php' => 'Kelas',
          'nilai.php' => 'Manajemen Nilai',
          'absensi.php' => 'Absensi Siswa',
          'berita.php' => 'Berita',
          'pengumuman.php' => 'Pengumuman',
          'agenda.php' => 'Agenda',
          'psb_online.php' => 'PSB Online',
          'buku_tamu.php' => 'Buku Tamu',
          'statistik.php' => 'Statistik',
          'admin.php' => 'Manajemen Admin',
          'pengaturan.php' => 'Pengaturan',
        ];
        $current = basename($_SERVER['PHP_SELF']);
        echo $titles[$current] ?? 'Admin Panel';
      ?>
    </span>
  </div>
  <div class="topbar-right">
    <span style="font-size:12px; color:#64748b;"><?php echo date('d M Y'); ?></span>
    <a href="admin.php" class="topbar-user">
      <div class="user-avatar"><?php echo $namaAwal; ?></div>
      <span><?php echo htmlspecialchars($_SESSION['namalengkap'] ?? ''); ?></span>
      <small style="color:#64748b; font-size:11px;"><?php echo htmlspecialchars($_SESSION['leveluser'] ?? ''); ?></small>
    </a>
  </div>
</div>

<!-- OVERLAY untuk mobile -->
<div id="sidebarOverlay" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5); z-index:999;" onclick="closeSidebar()"></div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const toggle = document.getElementById('sidebarToggle');
  const sidebar = document.getElementById('sidebar');
  const overlay = document.getElementById('sidebarOverlay');
  if (toggle) {
    toggle.addEventListener('click', function() {
      sidebar.classList.toggle('show');
      overlay.style.display = sidebar.classList.contains('show') ? 'block' : 'none';
    });
  }
});
function closeSidebar() {
  document.getElementById('sidebar').classList.remove('show');
  document.getElementById('sidebarOverlay').style.display = 'none';
}
</script>
