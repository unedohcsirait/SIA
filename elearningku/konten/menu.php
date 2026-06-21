		<div class="menuHome"><a href="index.php">Home</a></div>
		<?php
		if ($_SESSION['guru']){
		?>
		<div class="menuUpload"><a href="?p=upload">Upload Materi</a></div>
		<?php } ?>
		<div class="menuMapel"><a href="?p=mapel">Mata Pelajaran</a></div>
		<div class="menuGuru"><a href="?p=guru">Guru</a></div>
		<div class="menuPencarian"><a href="?p=semua">Pencarian</a></div>
		
		<div class="statistikMenu">
		<b>Informasi E-learning</b>
		<?php
		$siswa=mysql_query("SELECT * FROM sh_siswa WHERE status_siswa='1'");
		$jmlsiswa=mysql_num_rows($siswa);
		$guru=mysql_query("SELECT * FROM sh_guru_staff WHERE posisi='guru'");
		$jmlguru=mysql_num_rows($guru);
		$mapelm=mysql_query("SELECT * FROM sh_mapel");
		$jmlmapel=mysql_num_rows($mapelm);
		$materim=mysql_query("SELECT * FROM sh_materi");
		$jmlmateri=mysql_num_rows($materim);
		?>
		<ul>
		<li><b><?php echo $jmlsiswa?></b> Jumlah Siswa</li>
		<li><b><?php echo $jmlguru?></b> Jumlah Guru</li>
		<li><b><?php echo $jmlmapel?></b> Jumlah Mata Pelajaran</li>
		<li><b><?php echo $jmlmateri?></b> Jumlah Materi</li>
		
		</ul>
		</div>
		