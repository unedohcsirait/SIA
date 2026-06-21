<?php
header('Content-Type: application/json');
include "../../konfigurasi/koneksi.php";

$id_kelas = (int)($_GET['id_kelas'] ?? 0);
if (!$id_kelas) { echo json_encode([]); exit; }

$result = mysql_query("SELECT id_siswa, nis, nama_siswa FROM sh_siswa WHERE id_kelas='$id_kelas' AND status_siswa='1' ORDER BY nama_siswa");
$data = [];
while ($row = mysql_fetch_assoc($result)) {
    $data[] = $row;
}
echo json_encode($data);
