<?php
include "../konfigurasi/koneksi.php";
include "../konfigurasi/file_upload.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];
date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");
$sandi=MD5($_POST[password]);

if ($pilih=='siswa' AND $untukdi=='edit'){
	mysql_query("UPDATE sh_siswa SET 	alamat='$_POST[alamat]',
										email='$_POST[email]',
										telepon='$_POST[telepon]'
										WHERE nis ='$_POST[nis]'");						
	echo "<script>window.alert('Profil anda berhasil di update.');window.location=('index.php?p=profil')</script>";
}


elseif ($pilih=='guru' AND $untukdi=='edit'){
	mysql_query("UPDATE sh_guru_staff SET 	alamat='$_POST[alamat]',
											email='$_POST[email]',
											telepon='$_POST[telepon]'
											WHERE nip ='$_POST[nip]'");						
	echo "<script>window.alert('Profil anda berhasil di update.');window.location=('index.php?p=profil')</script>";
}

elseif ($pilih=='siswa' AND $untukdi=='gantipassword'){
	mysql_query("UPDATE sh_siswa SET 	password='$sandi'
										WHERE nis ='$_POST[nis]'");						
	echo "<script>window.alert('Password anda berhasil di update.');window.location=('index.php?p=profil')</script>";
}


elseif ($pilih=='guru' AND $untukdi=='gantipassword'){
	mysql_query("UPDATE sh_guru_staff	 SET 	password='$sandi'
										 WHERE 	nip ='$_POST[nip]'");						
	echo "<script>window.alert('Password anda berhasil di update.');window.location=('index.php?p=profil')</script>";
}


elseif ($pilih=='guru' AND $untukdi=='upload'){
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
	UploadMateri($nama_file);	
	mysql_query("INSERT INTO sh_materi
				(file_materi,judul_materi, deskripsi_materi, id_mapel, nip, tanggal_upload)
				VALUES
				(	'$nama_file',
					'$_POST[judul_materi]',
					'$_POST[deskripsi]',
					'$_POST[mapel]',
					'$_POST[guru]',
					'$tanggal')");
	header('location:index.php?p=upload');
}

?>