<?php
$ip      = $_SERVER['REMOTE_ADDR'];
$tanggal = date("Ymd");
$waktu   = time();
$cekstatistik = mysql_query("SELECT * FROM sh_statistik WHERE ip_addres='$ip' AND tanggal='$tanggal'");
if (mysql_num_rows($cekstatistik) == 0) {
  mysql_query("INSERT INTO sh_statistik(ip_addres,tanggal,mengunjungi,online) VALUES('$ip','$tanggal','1','$waktu')");
} else {
  mysql_query("UPDATE sh_statistik SET mengunjungi=mengunjungi+1, online='$waktu' WHERE ip_addres='$ip' AND tanggal='$tanggal'");
}
$pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM sh_statistik WHERE tanggal='$tanggal' GROUP BY ip_addres"));
$totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(mengunjungi) FROM sh_statistik"), 0);
$hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(mengunjungi) as kunjunganhariini FROM sh_statistik WHERE tanggal='$tanggal' GROUP BY tanggal"));
$totalhits        = mysql_result(mysql_query("SELECT SUM(mengunjungi) FROM sh_statistik"), 0);
$bataswaktu       = time() - 300;
$pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM sh_statistik WHERE online > '$bataswaktu'"));
?>

<!-- ===== E-LEARNING WIDGET ===== -->
<div class="de-glass">
  <div class="de-widget-title">
    <i class="bi bi-laptop-fill"></i> Portal E-Learning
  </div>
  <?php include "file/tema/edisi_spesial/login.php"; ?>
</div>

<!-- ===== POLLING WIDGET ===== -->
<?php
$pertanyaan = mysql_query("SELECT * FROM sh_sidebar WHERE jenis='polling' AND status='1' AND isi2='pertanyaan'");
$tanya = mysql_fetch_array($pertanyaan);
if ($tanya):
?>
<div class="de-glass">
  <div class="de-widget-title"><i class="bi bi-bar-chart-fill"></i> Polling Sekolah</div>
  <p style="color:#94a3b8;font-size:13.5px;margin-bottom:14px;"><?php echo htmlspecialchars($tanya['nama']); ?></p>
  <form method="POST" action="kontenweb/insert_polling.php">
    <?php
    $polling = mysql_query("SELECT * FROM sh_sidebar WHERE jenis='polling' AND status='1' AND isi2!='pertanyaan'");
    while ($pol = mysql_fetch_array($polling)):
    ?>
    <label class="de-poll-option">
      <input type="radio" name="poll" value="<?php echo $pol['id_sidebar']; ?>">
      <?php echo htmlspecialchars($pol['nama']); ?>
    </label>
    <?php endwhile; ?>
    <div class="de-poll-btns">
      <button type="submit" class="de-poll-btn"><i class="bi bi-check2-circle me-1"></i>Vote</button>
      <button type="button" class="de-poll-btn" onclick="window.location.href='?p=polling'"><i class="bi bi-eye me-1"></i>Hasil</button>
    </div>
  </form>
</div>
<?php endif; ?>

<!-- ===== STATISTIK WIDGET ===== -->
<div class="de-glass">
  <div class="de-widget-title"><i class="bi bi-graph-up-arrow"></i> Statistik Pengunjung</div>
  <div class="de-stat-row">
    <span class="de-stat-val"><?php echo number_format($totalhits); ?></span>
    <i class="bi bi-cursor-fill" style="color:var(--de-gold)"></i>
    <span class="de-stat-lbl">Total Hits</span>
  </div>
  <div class="de-stat-row">
    <span class="de-stat-val"><?php echo number_format($totalpengunjung); ?></span>
    <i class="bi bi-people-fill" style="color:var(--de-gold)"></i>
    <span class="de-stat-lbl">Total Pengunjung</span>
  </div>
  <div class="de-stat-row">
    <span class="de-stat-val"><?php echo number_format($hits['kunjunganhariini']); ?></span>
    <i class="bi bi-activity" style="color:var(--de-gold)"></i>
    <span class="de-stat-lbl">Hits Hari Ini</span>
  </div>
  <div class="de-stat-row">
    <span class="de-stat-val"><?php echo number_format($pengunjung); ?></span>
    <i class="bi bi-person-check-fill" style="color:var(--de-gold)"></i>
    <span class="de-stat-lbl">Pengunjung Hari Ini</span>
  </div>
  <div class="de-stat-row">
    <span class="de-stat-val"><?php echo number_format($pengunjungonline); ?></span>
    <i class="bi bi-circle-fill" style="color:#4ecca3;font-size:10px"></i>
    <span class="de-stat-lbl">Sedang Online</span>
  </div>
</div>

<!-- ===== TAUTAN WIDGET ===== -->
<?php
$link = mysql_query("SELECT * FROM sh_sidebar WHERE jenis='link' AND status='1'");
$totalLink = mysql_num_rows($link);
if ($totalLink > 0):
$link = mysql_query("SELECT * FROM sh_sidebar WHERE jenis='link' AND status='1'");
?>
<div class="de-glass">
  <div class="de-widget-title"><i class="bi bi-link-45deg"></i> Tautan</div>
  <ul class="de-link-list">
    <?php while ($lnk = mysql_fetch_array($link)): ?>
    <li>
      <a href="http://<?php echo htmlspecialchars($lnk['isi1']); ?>" target="_blank" rel="noopener">
        <?php echo htmlspecialchars($lnk['nama']); ?>
      </a>
    </li>
    <?php endwhile; ?>
  </ul>
</div>
<?php endif; ?>

<!-- ===== KONTAK WIDGET ===== -->
<div class="de-glass">
  <div class="de-widget-title"><i class="bi bi-info-circle-fill"></i> Informasi Kontak</div>
  <div class="de-footer-contact-item">
    <div class="de-footer-contact-icon"><i class="bi bi-geo-alt-fill"></i></div>
    <dl class="de-footer-contact-text mb-0">
      <dt>Alamat</dt>
      <dd><?php
        $alamat2 = mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='12'");
        $a2 = mysql_fetch_array($alamat2);
        echo htmlspecialchars($a2['isi_pengaturan']);
      ?></dd>
    </dl>
  </div>
  <div class="de-footer-contact-item">
    <div class="de-footer-contact-icon"><i class="bi bi-telephone-fill"></i></div>
    <dl class="de-footer-contact-text mb-0">
      <dt>Telepon</dt>
      <dd><?php
        $telp2 = mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='9'");
        $te2 = mysql_fetch_array($telp2);
        echo htmlspecialchars($te2['isi_pengaturan']);
      ?></dd>
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
