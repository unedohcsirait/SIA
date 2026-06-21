-- Tabel Nilai Siswa
CREATE TABLE IF NOT EXISTS `sh_nilai` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `nilai_tugas` decimal(5,2) DEFAULT 0,
  `nilai_uts` decimal(5,2) DEFAULT 0,
  `nilai_uas` decimal(5,2) DEFAULT 0,
  `nilai_akhir` decimal(5,2) DEFAULT 0,
  `keterangan` varchar(100) DEFAULT '',
  `s_username` varchar(30) NOT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Tabel Absensi Siswa
CREATE TABLE IF NOT EXISTS `sh_absensi` (
  `id_absensi` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Hadir','Sakit','Izin','Alfa') NOT NULL DEFAULT 'Hadir',
  `keterangan` varchar(200) DEFAULT '',
  `s_username` varchar(30) NOT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_absensi`),
  UNIQUE KEY `unique_absensi` (`id_siswa`, `tanggal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
