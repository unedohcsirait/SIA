<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['adminsh'])) { header('location:login.php'); exit; }
include "konten/awal.php";
?>
<body>
<?php include "konten/header.php"; ?>
<div id="main-content">
<!--Awal id kanan-->
				
					<?php include "aplikasi/jabatan_data.php"; ?>
</div>
<?php include "konten/footer.php"; ?>
