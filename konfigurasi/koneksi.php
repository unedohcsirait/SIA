<?php
// Load compatibility layer untuk menggantikan fungsi mysql_* yang deprecated
require_once __DIR__ . "/mysql_compat.php";

$SERVER       = "127.0.0.1";
$NAMAUSER     = "root";
$PASSWORDUSER = "";
$DATABASE     = "db_smpn2";

mysql_connect($SERVER, $NAMAUSER, $PASSWORDUSER);
mysql_select_db($DATABASE);
