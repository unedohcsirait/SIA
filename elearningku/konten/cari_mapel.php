<?php
$namamapel=mysql_query("SELECT * FROM sh_mapel WHERE id_mapel='$_GET[id]'");
$namajudul=mysql_fetch_array($namamapel);
?>
<h3>Data Materi Mata Pelajaran <?php echo $namajudul[nama_mapel]?></h3>
		<p>*) Tips : Klik pada judul materi untuk download</p>
		<table class="garis" id="results">
			<tr><th class="garis" width="25px">No</th>
				<th class="garis" width="200px">Judul Materi</th>
				<th class="garis" width="175px">Mata Pelajaran</th>
				<th class="garis" width="150px">Guru Pengampu</th>
				<th class="garis" width="95px">Tgl. Upload</th>
			</tr>
			<?php
			$no=1;
			$semua=mysql_query("SELECT * FROM sh_materi, sh_mapel, sh_guru_staff 
			WHERE sh_materi.id_mapel=sh_mapel.id_mapel AND sh_materi.nip=sh_guru_staff.nip AND sh_materi.id_mapel='$_GET[id]' ORDER BY id_materi DESC");
			$hitung=mysql_num_rows($semua);
			if ($hitung > 0){
			while($sm=mysql_fetch_array($semua)){
			?>
			<tr><td class="garis" width="30"><?php echo $no?></td>
				<td class="garis"><b><a href="<?php echo "?p=download&id=$sm[id_materi]";?>"><?php echo $sm[judul_materi]?></a>&nbsp(<?php echo $sm[download]?>)</b></td>
				<td class="garis"><?php echo $sm[nama_mapel]?></td>
				<td class="garis"><i><a href="<?php echo "?p=pguru&nip=$sm[nip]";?>"><?php echo $sm[nama_gurustaff]?></a></i></td>
				<td class="garis"><?php echo $sm[tanggal_upload]?></td>
				
			</tr>
			<?php $no++; }}
			else  {?>
			<tr><td colspan="5"><b>Belum ada materi yang diupload</b></td></tr>
			<?php } ?>
		</table>