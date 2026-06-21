<?php
include "../konfigurasi/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST['password']));
$status	  = $_POST['status'];
if ($status=='guru'){
$login=mysql_query("SELECT * FROM sh_guru_staff WHERE nip='$username' AND password='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
}
elseif ($status=='siswa'){
$login=mysql_query("SELECT * FROM sh_siswa WHERE nis='$username' AND password='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
}

else {
header ('location: ../index.php');
}


	if ($ketemu > 0){
	  session_start();
	  if($status=='guru'){
	  $_SESSION['guru']      			= $r[nip];
	  $_SESSION['namaguru']	  		= $r[nama_gurustaff];
	  }
	  else {
	  $_SESSION['siswa']      		= $r[nis];
	  $_SESSION['namasiswa']	  		= $r[nama_siswa];
	  }
	  header('location:index.php');
	}
	else{
	echo "<script>window.alert('Kesalahan kombinasi username dan password, silahkan ulangi lagi.');window.location=('../index.php')</script>";	  
}

?>
