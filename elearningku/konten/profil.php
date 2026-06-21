<h3>Profil Anda</h3>
<?php
if ($_SESSION['guru']){
$profilsaya=mysql_query("SELECT * FROM sh_guru_staff, sh_mapel WHERE sh_guru_staff.id_mapel=sh_mapel.id_mapel AND nip='$_SESSION[guru]'");
$ps=mysql_fetch_array($profilsaya);
?>		<form method="POST" action="proses.php?pilih=guru&untukdi=edit" name="editprofil" id="editprofil">
		<?php
		echo "<input type='hidden' name='nip' value='$_SESSION[guru]'>";
		?>
		<table style="margin: 20px 0 20px 0;">
			<tr class="form"><th class="garis" colspan="3" style="text-align: center">Data Guru</th></tr>
			<tr class="form"><td rowspan="4"  width="160px"><img src="../images/foto/guru/<?php echo $ps[foto]?>" width="150px" style="padding: 10px; background: #fff; border: 1px solid #dcdcdc;"></td>
			<td><b>Nama</b></td><td><input type="text" class="panjang" value="<?php echo $ps[nama_gurustaff]?>" disabled></td></tr>
			<tr class="form"><td><b>NIP</b></td><td><input type="text" class="panjang" value="<?php echo $ps[nip]?>" disabled></td></tr>
			<tr class="form"><td><b>Mengajar</b></td><td><input type="text" class="panjang" value="<?php echo $ps[nama_mapel]?>" disabled></td></tr>
			<tr class="form"><td><b>Password</b></td><td>
			<a href="<?php echo "index.php?p=password&nip=$_SESSION[guru]"; ?>"><b><u>Ganti Password</u></b></a>
			</td></tr>
		</table>
		
		<table>
			<tr class="form"><th class="garis" colspan="3" style="text-align: center">Data Personal</th></tr>
			<tr class="form"><td><b>Tempat, Tanggal Lahir</b></td><td><input type="text" class="sedang" value="<?php echo $ps[tempat_lahir]?>" disabled>, <input type="text" class="pendek" value="<?php echo $ps[tanggal_lahir]?>" disabled></td></tr>
			<tr class="form"><td><b>Alamat</b></td><td colspan="2"><textarea name="alamat"><?php echo $ps[alamat]?></textarea></td></tr>
			<tr class="form"><td><b>Email</b></td><td><input type="text" name="email" class="panjang" value="<?php echo $ps[email]?>"></td></tr>
			<tr class="form"><td><b>Telepon</b></td><td><input type="text" name="telepon" class="panjang" value="<?php echo $ps[telepon]?>"></td></tr>
			<tr class="form"><td><b>Pendidikan Terakhir</b></td><td><input type="text" class="panjang" value="<?php echo $ps[pendidikan_terakhir]?>" disabled></td></tr>
			<tr class="form"><td><b>Tahun Masuk</b></td><td><input type="text" class="panjang" value="<?php echo $ps[tahun_masuk]?>" disabled></td></tr>
			<tr class="form"><td><b>Status Perkawinan</b></td><td><input type="text" class="panjang" value="<?php echo $ps[status_kawin]?>" disabled></td></tr>
			<tr class="form"><td></td><td><input type="submit" class="tombol" value="Simpan"></td></tr>
		
		</table>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editprofil");
			frmvalidator.addValidation("email","email","Format email salah");
			//]]>
		</script>
<?php }

else { 
$profilsaya=mysql_query("SELECT * FROM sh_siswa, sh_kelas WHERE sh_siswa.id_kelas=sh_kelas.id_kelas AND nis='$_SESSION[siswa]'");
$ps=mysql_fetch_array($profilsaya);
?>		<form method="POST" action="proses.php?pilih=siswa&untukdi=edit" name="editprofil" id="editprofil">
		<?php
		echo "<input type='hidden' name='nis' value='$_SESSION[siswa]'>";
		?>
		<table style="margin: 20px 0 20px 0;">
			<tr class="form"><th class="garis" colspan="3" style="text-align: center">Data Siswa</th></tr>
			<tr class="form"><td><b>Nama</b></td><td><input type="text" class="panjang" value="<?php echo $ps[nama_siswa]?>" disabled></td></tr>
			<tr class="form"><td><b>NIS</b></td><td><input type="text" class="panjang" value="<?php echo $ps[nis]?>" disabled></td></tr>
			<tr class="form"><td><b>Kelas</b></td><td><input type="text" class="panjang" value="<?php echo $ps[nama_kelas]?>" disabled></td></tr>
			<tr class="form"><td><b>Password</b></td><td>
			<a href="<?php echo "index.php?p=password&nis=$_SESSION[siswa]"; ?>"><b><u>Ganti Password</u></b></a>
			</td></tr>
		</table>
		
		<table>
			<tr class="form"><th class="garis" colspan="3" style="text-align: center">Data Personal</th></tr>
			<tr class="form"><td><b>Tempat, Tanggal Lahir</b></td><td><input type="text" class="sedang" value="<?php echo $ps[tempat_lahir]?>" disabled>, <input type="text" class="pendek" value="<?php echo $ps[tanggal_lahir]?>" disabled></td></tr>
			<tr class="form"><td><b>Alamat</b></td><td colspan="2"><textarea name="alamat"><?php echo $ps[alamat]?></textarea></td></tr>
			<tr class="form"><td><b>Email</b></td><td><input type="text"  name="email" class="panjang" value="<?php echo $ps[email]?>"></td></tr>
			<tr class="form"><td><b>Telepon</b></td><td><input type="text"  name="telepon" class="panjang" value="<?php echo $ps[telepon]?>"></td></tr>
			<tr class="form"><td><b>Sekolah Asal</b></td><td><input type="text" class="panjang" value="<?php echo $ps[sekolah_asal]?>" disabled></td></tr>
			<tr class="form"><td><b>Tahun Registrasi</b></td><td><input type="text" class="panjang" value="<?php echo $ps[tahun_registrasi]?>" disabled></td></tr>
			<tr class="form"><td><b>Nama Orang Tua</b></td><td><input type="text" class="panjang" value="<?php echo $ps[nama_ortu]?>" disabled></td></tr>
			<tr class="form"><td></td><td><input type="submit" class="tombol" value="Simpan"></td></tr>
		
		</table>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editprofil");
			frmvalidator.addValidation("email","email","Format email salah");
			//]]>
		</script>
<?php } ?>