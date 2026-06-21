<h3>Pencarian Materi Pelajaran</h3>

<p>*) Tips : Klik pada judul materi untuk download</p>
<table style="margin: 20px 0 0 0; width: auto;">
<form method="POST" action="?p=pencarian">
<tr class="form">
				<td style="padding: 10px 4px 10px 0"><input type="text" name="cari" class="cari"></td>
				
				<td style="padding: 10px 4px 10px 0"><input type="submit" class="tombol" value="Cari"></td>
				</tr>
</form>
</table>
		<table class="garis" id="results">
			<tr><th class="garis" width="25px">No</th>
				<th class="garis" width="200px">Judul Materi</th>
				<th class="garis" width="175px">Mata Pelajaran</th>
				<th class="garis" width="150px">Guru Pengampu</th>
				<th class="garis" width="95px">Tgl. Upload</th>
			</tr>
			<?php
			$cari = trim($_POST['cari']);
			$cari = htmlentities(htmlspecialchars($cari), ENT_QUOTES);
			$no=1;
			$semua=mysql_query("SELECT * FROM sh_materi, sh_mapel, sh_guru_staff 
			WHERE sh_materi.id_mapel=sh_mapel.id_mapel AND sh_materi.nip=sh_guru_staff.nip 
			AND judul_materi LIKE '%$cari%' ORDER BY id_materi DESC");
			$hitung=mysql_num_rows($semua);
			
			if ($hitung > 0){
			while($sm=mysql_fetch_array($semua)){
			?>
			<tr><td class="garis" width="30"><?php echo $no?></td>
				<td class="garis"><b><a href="<?php echo "?p=download&id=$sm[id_materi]";?>"><?php echo $sm[judul_materi]?></a>&nbsp(<?php echo $sm[download]?>)</b></td>
				<td class="garis"><a href="<?php echo "?p=mmapel&id=$sm[id_mapel]";?>"><?php echo $sm[nama_mapel]?></a></td>
				<td class="garis"><i><a href="<?php echo "?p=pguru&nip=$sm[nip]";?>"><?php echo $sm[nama_gurustaff]?></a></i></td>
				<td class="garis"><?php echo $sm[tanggal_upload]?></td>
				
			</tr>
			<?php $no++; }}
			else {?>
			<tr><td colspan="5"><b>Materi Tidak Ditemukan</b></td></tr>
			<?php } ?>
		</table>
		
				<div id="pageNavPosition"></div>
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 25); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>