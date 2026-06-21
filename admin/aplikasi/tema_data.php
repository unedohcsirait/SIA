<?php
if($_SESSION['leveluser'] == 'Super Admin') {
$database="aplikasi/database/tema.php";
?>
<h3>Tema Website</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="pengaturan.php">Website</a></div>
		
			<div class="menuhorisontal"><a href="ym.php">Yahoo! Messenger</a></div>
			<div class="menuhorisontal"><a href="polling.php">Polling</a></div>
			<div class="menuhorisontal"><a href="link.php">Link</a></div>
			<div class="menuhorisontal"><a href="statistik.php">Statistik</a></div>
		</div>

		<div class="atastabel" style="margin-bottom: 10px">
		</div>
		
		<div class="clear"></div>
		
		<?php
		$tema=mysql_query("SELECT * FROM sh_tema WHERE status='0'");
		while($r=mysql_fetch_array($tema)){
		?>
		
		<?php
		} ?>
		
		<div class="clear"></div>
</div><!--Akhir class isi kanan-->
<?php }?>