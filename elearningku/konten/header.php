	<div id="header">
	<h3><a href="" title="Website resmi <?php echo $ns[isi_pengaturan]?>"><?php echo $ns[isi_pengaturan]?></a></h3>
		<div class="profil">
			<div class="pengaturan"><a href="?p=profil" title="Klik untuk sunting profil anda"><b>
			<?php
			if ($_SESSION[siswa]){
			echo "$_SESSION[namasiswa]";
			}
			elseif ($_SESSION[guru]){
			echo "$_SESSION[namaguru]";
			}
			?>
			</b></a></div>
			<div class="logout"><a href='logout.php' onClick="return confirm ('Apakah anda benar-benar akan keluar dari sistem?')" title='Log out'>Logout</a></div>
		</div>
	</div>