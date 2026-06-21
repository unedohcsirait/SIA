<h3>Upload Materi</h3>
		<form method="POST" action="proses.php?pilih=guru&untukdi=upload" enctype="multipart/form-data" name="tambahmapel" id="tambahmapel">
		<?php
		$mapelku=mysql_query("SELECT * FROM sh_guru_staff WHERE nip='$_SESSION[guru]'");
		$r=mysql_fetch_array($mapelku);
		
		echo "
		<input type='hidden' name='guru' value='$_SESSION[guru]'>
		<input type='hidden' name='mapel' value='$r[id_mapel]'>
		";
		?>
		<table style="margin: 20px 0 20px 0;">
			<tr class="form"><td>Judul Materi</td><td><input type="text" name="judul_materi" class="panjang"></td></tr>
			<tr class="form"><td>Deskripsi Materi</td><td><textarea name="deskripsi" style="height: 100px"></textarea></td></tr>
			<tr class="form"><td>File Materi</td><td><input type="file" name="fupload"></td></tr>
			<tr class="form"><td></td><td><input type="submit" class="tombol" value="Upload"></td></tr>
		</table>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahmapel");
			
			frmvalidator.addValidation("fupload","req","Anda belum memilih file");
			
			frmvalidator.addValidation("judul_materi","req","Judul Materi harus diisi");
			frmvalidator.addValidation("judul_materi","maxlen=30","Judul Materi maksimal 30 karakter");
			//]]>
		</script>
		
		<table class="garis"  id="results">
			<tr><th class="garis" width="30">No</th>
				<th class="garis">Judul Materi</th>
				<th class="garis" width="125">Tgl.Upload</th>
				<th class="garis" width="125">Mata Pelajaran</th>
				<th class="garis" width="75">Download</th>
			</tr>
			<?php
			$no=1;
			$materiku=mysql_query("SELECT * FROM sh_materi, sh_mapel WHERE sh_materi.id_mapel=sh_mapel.id_mapel AND nip='$_SESSION[guru]' ORDER BY id_materi DESC");
			$hitung=mysql_num_rows($materiku);
			
			if ($hitung > 0){
			while ($data=mysql_fetch_array($materiku)){
			?>
			<tr><td class="garis" width="30"><?php echo $no?></td>
				<td class="garis"><b><?php echo $data[judul_materi]?>&nbsp;(<?php echo $data[download]?>)</b></td>
				<td class="garis"><?php echo $data[tanggal_upload]?></td>
				<td class="garis"><?php echo $data[nama_mapel]?></td>
				<td class="garis" style="text-align: center;"><a href="<?php echo "?p=download&id=$data[id_materi]";?>">Download</a></td>
			</tr>
			<?php $no++;} }
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