<h3>Profil Guru</h3>
<?php
$profilguru=mysql_query("SELECT * FROM sh_guru_staff, sh_mapel WHERE sh_guru_staff.id_mapel=sh_mapel.id_mapel AND nip='$_GET[nip]'");
$data=mysql_fetch_array($profilguru);
?>
		<table style="margin: 20px 0 20px 0;">
			<tr class="form"><th class="garis" colspan="3" style="text-align: center">Data Guru</th></tr>
			<tr class="form"><td rowspan="5"  width="160px"><img src="../images/foto/guru/<?php echo $data[foto]?>" width="150px" style="padding: 10px; background: #fff; border: 1px solid #dcdcdc;"></td>
			<td><b>Nama</b></td><td><input type="text" class="panjang" value="<?php echo $data[nama_gurustaff]?>" disabled></td></tr>
			<tr class="form"><td><b>Mengajar</b></td><td><input type="text" class="panjang" value="<?php echo $data[nama_mapel]?>" disabled></td></tr>
			<tr class="form"><td><b>Telp/ HP</b></td><td><input type="text" class="panjang" value="<?php echo $data[telepon]?>" disabled></td></tr>
			<tr class="form"><td><b>Email</b></td><td><input type="text" class="panjang" value="<?php echo $data[email]?>" disabled></td></tr>
			<tr class="form"><td><b>Jumlah Materi</b></td><td>
			<?php
			$hitungmateri=mysql_query("SELECT * FROM sh_materi WHERE nip='$_GET[nip]'");
			$jmlmateri=mysql_num_rows($hitungmateri);
			?>
			<b><u><a href=""><?php echo $jmlmateri?></a></u></b>&nbsp;File
			</td></tr>
		</table>
		
		<table class="garis"  id="results">
			<tr><th class="garis" width="30">No</th>
				<th class="garis">Judul Materi</th>
				<th class="garis" width="125">Tgl.Upload</th>
				<th class="garis" width="125">Mata Pelajaran</th>
				<th class="garis" width="75">Download</th>
			</tr>
			<?php
			$no=1;
			$datamateri=mysql_query("SELECT * FROM sh_materi, sh_mapel WHERE sh_materi.id_mapel=sh_mapel.id_mapel AND nip='$_GET[nip]'");
			$hitungmateri=mysql_num_rows($datamateri);
			
			if($hitungmateri > 0){
			while($dm=mysql_fetch_array($datamateri)){
			?>
			<tr><td class="garis" width="30"><?php echo $no?></td>
				<td class="garis"><b><?php echo $dm[judul_materi]?>&nbsp; (<?php echo $dm[download]?>)</b></td>
				<td class="garis"><?php echo $dm[tanggal_upload]?></td>
				<td class="garis"><?php echo $dm[nama_mapel]?></td>
				<td class="garis" style="text-align: center;"><a href="<?php echo "?p=download&id=$dm[id_materi]";?>">Download</a></td>
			</tr>
			<?php $no++; }}
			
			else { ?>
			<tr><td colspan="5"><b>Belum ada materi yang diupload</b></td></tr>
			<?php } ?>
		</table>
		
		
				<div id="pageNavPosition"></div>
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 10); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>