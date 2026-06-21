<h3>Materi Berdasarkan Mata Pelajaran</h3>
		<table class="garis">
			<tr><th class="garis" width="30">No</th>
				<th class="garis">Mata Pelajaran</th>
				<th class="garis" width="75">Jml.Materi</th>
				<th class="garis" width="225">Guru Pengampu</th>
			</tr>
			<?php
			$no=1;
			$mapel=mysql_query("SELECT * FROM sh_mapel ORDER BY id_mapel DESC");
			while($data=mysql_fetch_array($mapel)){
			?>
			<tr><td class="garis" width="30"><?php echo $no?></td>
				<td class="garis"><b><a href="<?php echo "?p=mmapel&id=$data[id_mapel]";?>"><?php echo $data[nama_mapel]?></a></b></td>
				<td class="garis">
				<?php
				$hitungmateri=mysql_query("SELECT * FROM sh_materi WHERE id_mapel='$data[id_mapel]'");
				$totalmateri=mysql_num_rows($hitungmateri);
				echo $totalmateri
				?>
				&nbsp; File
				</td>
				<td class="garis">
				<?php
				$gurupengampu=mysql_query("SELECT * FROM sh_guru_staff WHERE id_mapel='$data[id_mapel]'");
				while ($gp=mysql_fetch_array($gurupengampu)){
				?>
				<a href="<?php echo "?p=pguru&nip=$gp[nip]";?>"><i><?php echo $gp[nama_gurustaff]?></i><br>
				<?php } ?>
				</td>
			</tr>
			<?php $no++; } ?>
		</table>