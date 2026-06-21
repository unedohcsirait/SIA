<li class="nav-item">
  <a class="nav-link" href="index.php">Home</a>
</li>

<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Profil</a>
  <ul class="dropdown-menu">
    <?php
    $profil = mysql_query("SELECT * FROM sh_info_sekolah WHERE posisi_menu='0' AND status_terbit='1' ORDER BY id_info ASC");
    while ($p = mysql_fetch_array($profil)) {
      echo "<li><a class='dropdown-item' href='?p=info&id={$p['id_info']}'>" . htmlspecialchars($p['nama_info']) . "</a></li>";
    }
    ?>
    <li><a class="dropdown-item" href="?p=gmap">Lokasi Sekolah</a></li>
  </ul>
</li>

<?php
$menuutama = mysql_query("SELECT * FROM sh_info_sekolah WHERE posisi_menu='1' AND status_terbit='1'");
while ($m = mysql_fetch_array($menuutama)) {
  echo "<li class='nav-item'><a class='nav-link' href='?p=info&id={$m['id_info']}'>" . htmlspecialchars($m['nama_info']) . "</a></li>";
}
?>

<li class="nav-item">
  <a class="nav-link" href="?p=berita">Berita</a>
</li>

<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Informasi</a>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="?p=agenda">Agenda Sekolah</a></li>
    <li><a class="dropdown-item" href="?p=pengumuman">Pengumuman</a></li>
  </ul>
</li>

<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Warga Sekolah</a>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="?p=guru">Data Guru</a></li>
    <li><a class="dropdown-item" href="?p=staff">Data Staff</a></li>
    <li><a class="dropdown-item" href="?p=siswa">Data Siswa</a></li>
    <li><a class="dropdown-item" href="?p=alumni">Data Alumni</a></li>
  </ul>
</li>

<li class="nav-item">
  <a class="nav-link" href="?p=galeri">Galeri</a>
</li>

<li class="nav-item">
  <a class="nav-link" href="?p=bukutamu">Buku Tamu</a>
</li>

<li class="nav-item">
  <a class="nav-link de-btn-psb" href="?p=psb">PSB Online</a>
</li>
