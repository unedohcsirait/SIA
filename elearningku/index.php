<?php
session_start();
error_reporting(0);
if (isset($_SESSION['siswa']) OR isset($_SESSION['guru']))
{
include "../konfigurasi/koneksi.php";
include "konten/atas.php";
?>
<body>
<div id="wrapper">
	<div id="container">
	  <?php
include "konten/header.php";
?>
	  <div class="clear"></div>
	
	<div id="menu">
		<?php include "konten/menu.php"; ?>
	</div>
	
	<div id="konten">
	<?php
	switch($_GET['p']){
	default:
	?>
		
		<div class="info">
		
		</div>
		<div class="kotak">
			<?php
			include "materi_terbaru.php";
			?>
		</div>
		<div class="kotak">
			<?php
			include "materi_terpopuler.php";
			?>
		</div>
	<?php
	break;
	
	case "upload":
	if ($_SESSION['guru']){
	include "konten/upload.php";}
	break;
	
	case "profil":
	include "konten/profil.php";
	break;
	
	case "mapel":
	include "konten/mapel.php";
	break;
	
	case "guru":
	include "konten/guru.php";
	break;
	
	case "semua":
	include "konten/semua.php";
	break;
	
	case "pencarian":
	include "konten/pencarian.php";
	break;
	
	case "mmapel":
	include "konten/cari_mapel.php";
	break;
	
	case "pguru":
	include "konten/profil_guru.php";
	break;
	
	case "download":
	include "konten/download_materi.php";
	break;
	
	case "password":
	include "konten/password.php";
	break;
	}
	?>
	</div>
	<div class="clear"></div>
	
	<?php include "konten/footer.php"; ?>
	
	</div>
  <div class="clear"></div>
</div>
</body>
</html>
<?php }
else{

	header('location:../index.php');
	exit;
}
?>