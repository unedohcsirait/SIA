<footer class="de-footer">
  <div class="container position-relative">
    <div class="row g-5 mb-0">

      <!-- Kolom 1: Brand -->
      <div class="col-lg-3 col-md-6">
        <div class="de-footer-brand-name">
          🏫 <?php
          $ns_footer = mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='8'");
          $nsf = mysql_fetch_array($ns_footer);
          echo htmlspecialchars($nsf['isi_pengaturan']);
          ?>
        </div>
        <p class="de-footer-desc">
          Membangun generasi bangsa yang unggul, berakhlak mulia, dan berprestasi di tingkat nasional maupun internasional.
        </p>
      </div>

      <!-- Kolom 2: Tautan Cepat -->
      <div class="col-lg-3 col-md-6">
        <h5 class="de-footer-heading">Tautan Cepat</h5>
        <ul class="de-footer-links">
          <?php
          $profil_footer = mysql_query("SELECT * FROM sh_info_sekolah WHERE posisi_menu='0' AND status_terbit='1' ORDER BY id_info ASC LIMIT 6");
          while ($pf = mysql_fetch_array($profil_footer)) {
            echo "<li><a href='?p=info&id={$pf['id_info']}'>" . htmlspecialchars($pf['nama_info']) . "</a></li>";
          }
          ?>
          <li><a href="?p=gmap">Lokasi Sekolah</a></li>
        </ul>
      </div>

      <!-- Kolom 3: Layanan -->
      <div class="col-lg-3 col-md-6">
        <h5 class="de-footer-heading">Layanan</h5>
        <ul class="de-footer-links">
          <li><a href="elearningku/index.php">E-Learning</a></li>
          <li><a href="?p=berita">Berita Sekolah</a></li>
          <li><a href="?p=agenda">Agenda Sekolah</a></li>
          <li><a href="?p=pengumuman">Pengumuman</a></li>
          <li><a href="?p=galeri">Galeri Foto</a></li>
          <li><a href="?p=psb">PSB Online</a></li>
          <li><a href="?p=bukutamu">Buku Tamu</a></li>
        </ul>
      </div>

      <!-- Kolom 4: Kontak -->
      <div class="col-lg-3 col-md-6">
        <h5 class="de-footer-heading">Kontak Kami</h5>
        <?php
        $alamat_footer = mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='12'");
        $af = mysql_fetch_array($alamat_footer);
        $telp_footer = mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='9'");
        $tef = mysql_fetch_array($telp_footer);
        ?>
        <div class="de-footer-contact-item">
          <div class="de-footer-contact-icon"><i class="bi bi-geo-alt-fill"></i></div>
          <dl class="de-footer-contact-text mb-0">
            <dt>Alamat</dt>
            <dd><?php echo htmlspecialchars($af['isi_pengaturan']); ?></dd>
          </dl>
        </div>
        <div class="de-footer-contact-item">
          <div class="de-footer-contact-icon"><i class="bi bi-telephone-fill"></i></div>
          <dl class="de-footer-contact-text mb-0">
            <dt>Telepon</dt>
            <dd><?php echo htmlspecialchars($tef['isi_pengaturan']); ?></dd>
          </dl>
        </div>
        <div class="de-footer-contact-item">
          <div class="de-footer-contact-icon"><i class="bi bi-envelope-fill"></i></div>
          <dl class="de-footer-contact-text mb-0">
            <dt>Email</dt>
            <dd>info@smpn2binjai.sch.id</dd>
          </dl>
        </div>
      </div>

    </div><!-- /row -->

    <!-- Bottom bar -->
    <div class="de-footer-bottom">
      <p class="de-footer-copy mb-0">
        &copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($nsf['isi_pengaturan']); ?>. Hak Cipta Dilindungi.
      </p>
      <div class="de-footer-sub">
        <a href="?p=info&id=1">Tentang Kami</a>
        <a href="?p=bukutamu">Hubungi Kami</a>
        <a href="admin/login.php">Admin</a>
      </div>
    </div>
  </div>
</footer>
