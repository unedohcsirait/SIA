<h3>Download Materi</h3>
<?php
$detailmateri=mysql_query("SELECT * FROM sh_materi, sh_mapel, sh_guru_staff WHERE sh_materi.id_mapel=sh_mapel.id_mapel
AND sh_materi.nip=sh_guru_staff.nip AND id_materi='$_GET[id]'");
$data=mysql_fetch_array($detailmateri);
?>
		<table style="margin: 20px 0 20px 0;" class="garis">
			<tr class="form"><th class="garis" colspan="2" style="text-align: center">Detail Materi</th></tr>
			<tr class="form"><td width="150px"><b>Judul Materi</b></td><td><input type="text" class="panjang" value="<?php echo $data[judul_materi]?>" disabled></td></tr>
			<tr class="form"><td><b>Guru Pengampu</b></td><td><input type="text" class="panjang" value="<?php echo $data[nama_gurustaff]?>" disabled></td></tr>
			<tr class="form"><td><b>Tanggal Upload</b></td><td><input type="text" class="panjang" value="<?php echo $data[tanggal_upload]?>" disabled></td></tr>
			<tr class="form"><td><b>Mata Pelajaran</b></td><td><input type="text" class="panjang" value="<?php echo $data[nama_mapel]?>" disabled></td></tr>
			<tr class="form"><td><b>Deskripsi</b></td><td><textarea disabled><?php echo $data[deskripsi_materi]?></textarea></td></tr>
			<tr class="form"><td><b>Jumlah Download</b></td><td><b><u><a href=""><?php echo $data[download]?></a></u></b>
			</td></tr>
			<tr class="form"><td><b>Download</b></td><td><a href="<?php echo "download.php?id=$data[id_materi]";?>"><b>[DOWNLOAD]</b></a></td></tr>
		</table>