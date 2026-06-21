<?php if (isset($_SESSION['siswa']) || isset($_SESSION['guru'])): ?>

  <?php if ($_SESSION['siswa']): ?>
  <?php
  $data_siswa_login = mysql_query("SELECT * FROM sh_siswa WHERE nis='$_SESSION[siswa]'");
  $datasl = mysql_fetch_array($data_siswa_login);
  ?>
  <div class="de-user-card">
    <img src="images/foto/guru/no_photo.jpg" alt="Foto">
    <div>
      <div class="de-user-name"><?php echo htmlspecialchars($datasl['nama_siswa']); ?></div>
      <div class="de-user-id"><?php echo htmlspecialchars($datasl['nis']); ?></div>
      <div class="mt-2 d-flex gap-2 flex-wrap">
        <a href="elearningku/index.php?p=profil" style="color:var(--de-gold);font-size:12px;font-weight:600;">
          <i class="bi bi-person-circle me-1"></i>Profil
        </a>
        <a href="elearningku/logout.php" class="de-user-logout"
           onclick="return confirm('Keluar dari sistem?')">
          <i class="bi bi-box-arrow-right me-1"></i>Logout
        </a>
      </div>
    </div>
  </div>
  <a href="elearningku/index.php" style="display:block;text-align:center;background:var(--de-gold);color:#0D1B2A;font-weight:700;padding:10px;border-radius:5px;font-size:13.5px;margin-top:10px;text-decoration:none;">
    <i class="bi bi-grid-fill me-1"></i> Buka E-Learning
  </a>

  <?php else: ?>
  <?php
  $data_guru_login = mysql_query("SELECT * FROM sh_guru_staff WHERE nip='$_SESSION[guru]'");
  $dgl = mysql_fetch_array($data_guru_login);
  ?>
  <div class="de-user-card">
    <img src="images/foto/guru/<?php echo htmlspecialchars($dgl['foto']); ?>" alt="Foto">
    <div>
      <div class="de-user-name"><?php echo htmlspecialchars($dgl['nama_gurustaff']); ?></div>
      <div class="de-user-id"><?php echo htmlspecialchars($dgl['nip']); ?></div>
      <div class="mt-2 d-flex gap-2 flex-wrap">
        <a href="elearningku/index.php?p=profil" style="color:var(--de-gold);font-size:12px;font-weight:600;">
          <i class="bi bi-person-circle me-1"></i>Profil
        </a>
        <a href="elearningku/logout.php" class="de-user-logout"
           onclick="return confirm('Keluar dari sistem?')">
          <i class="bi bi-box-arrow-right me-1"></i>Logout
        </a>
      </div>
    </div>
  </div>
  <a href="elearningku/index.php" style="display:block;text-align:center;background:var(--de-gold);color:#0D1B2A;font-weight:700;padding:10px;border-radius:5px;font-size:13.5px;margin-top:10px;text-decoration:none;">
    <i class="bi bi-grid-fill me-1"></i> Buka E-Learning
  </a>
  <?php endif; ?>

<?php else: ?>

<p style="color:#94a3b8;font-size:13px;margin-bottom:14px;">
  Akses materi &amp; tugas untuk siswa dan guru.
</p>
<form method="POST" action="elearningku/validasi.php" name="login" id="login" class="de-elearn-form">
  <input type="text" name="username" placeholder="NIS / NIP" title="Masukkan NIP atau NIS anda">
  <input type="password" name="password" placeholder="Password" title="Masukkan password anda">
  <select name="status">
    <option value="" selected>Pilih Status...</option>
    <option value="guru">Guru</option>
    <option value="siswa">Siswa</option>
  </select>
  <button type="submit" class="de-elearn-btn">
    <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
  </button>
</form>
<script language="JavaScript" type="text/javascript" xml:space="preserve">
//<![CDATA[
var frmvalidator = new Validator("login");
frmvalidator.addValidation("username","req","Anda belum memasukkan Username");
frmvalidator.addValidation("password","req","Anda belum memasukkan Password");
frmvalidator.addValidation("status","req","Anda belum memilih status");
//]]>
</script>

<?php endif; ?>
