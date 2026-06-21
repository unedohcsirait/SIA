<?php
include "../konfigurasi/koneksi.php";

function anti_injection($data) {
    return mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES))));
}

$username = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST['password']));

$login   = mysql_query("SELECT * FROM sh_users WHERE namausers='$username' AND sandiusers='$pass'");
$ketemu  = mysql_num_rows($login);
$r       = mysql_fetch_array($login);

if ($ketemu > 0) {
    session_start();
    $_SESSION['adminsh']     = $r['s_username'];
    $_SESSION['namalengkap'] = $r['nama_lengkap_users'];
    $_SESSION['leveluser']   = $r['level_users'];

    session_regenerate_id(true);
    $sid_baru = session_id();

    date_default_timezone_set('Asia/Jakarta');
    $loginterakhir = date("Y-m-d H:i:s");
    mysql_query("UPDATE sh_users SET login_terakhir='$loginterakhir' WHERE namausers='$username'");

    header('location:index.php');
    exit;
} else {
    header('location:login.php?error=1');
    exit;
}
