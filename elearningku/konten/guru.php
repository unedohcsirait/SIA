<h3>Materi Berdasarkan Guru</h3>
		<table class="garis">
			<tr><th class="garis" width="30">No</th>
				<th class="garis">Nama Guru</th>
				<th class="garis" width="125">Mengajar</th>
				<th class="garis" width="125">Jumlah Materi</th>
			</tr>
			<?php
			$no=1;
			$dirguru=mysql_query("SELECT * FROM sh_guru_staff, sh_mapel WHERE sh_guru_staff.id_mapel=sh_mapel.id_mapel AND posisi='guru' ORDER BY nama_gurustaff");
			while ($dg=mysql_fetch_array($dirguru)){
			?>
			<tr><td class="garis" width="30"><?php echo $no?></td>
				<td class="garis"><a href="<?php echo "?p=pguru&nip=$dg[nip]";?>"><b><?php echo $dg[nama_gurustaff]?></b></a></td>
				<td class="garis"><?php echo $dg[nama_mapel]?></td>
				<td class="garis">
				<?php
				$materiguru=mysql_query("SELECT * FROM sh_materi WHERE nip='$dg[nip]'");
				$hitungmg=mysql_num_rows($materiguru);
				echo $hitungmg
				?>
				 File
				</td>
			</tr>
			
		<?php $no++; } ?>
		</table>