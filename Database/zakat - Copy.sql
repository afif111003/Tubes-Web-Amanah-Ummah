SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `t_user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `t_user` (`username`, `password`, `status`, `level`) VALUES
('admin', 'admin123', 'aktif', 1),
('Mahmud', '0813121321', 'aktif', 2),
('Sutoyo', '0821123123', 'aktif', 2);

CREATE TABLE IF NOT EXISTS `t_masjid` (
`id_masjid` int(11) NOT NULL,
  `nama_masjid` varchar(20) NOT NULL,
  `alamat_masjid` varchar(50) NOT NULL,
  `RT` varchar(4) NOT NULL,
  `RW` varchar(4) NOT NULL,
  PRIMARY KEY (`id_masjid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `t_masjid` (`id_masjid`, `nama_masjid`, `alamat_masjid`, `RT`, `RW`) VALUES
(1, 'Al-Huda', 'Jl. Garuda Sakti', '012', '002'),
(2, 'Baiturrahman', 'Jl. Bawal', '002', '001'),
(3, 'Al-Khairat', 'Jl. Paus', '008', '002'),
(4, 'Al-Jabbar', 'Jl. Simpang Baru', '003', '001');

CREATE TABLE IF NOT EXISTS `t_amil` (
`id_amil` int(11) NOT NULL,
  `nama_amil` varchar(30) NOT NULL,
  `no_hp_amil` varchar(14) NOT NULL,
  `alamat_amil` varchar(50) NOT NULL,
  `id_masjid` int(11) NOT NULL,
  PRIMARY KEY (`id_amil`),
  CONSTRAINT `fk_t_amil_t_masjid` FOREIGN KEY (`id_masjid`) REFERENCES `t_masjid` (`id_masjid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `t_amil` (`id_amil`, `nama_amil`, `no_hp_amil`, `alamat_amil`, `id_masjid`) VALUES
(1, 'Sutoyo', '0821123123', 'Jl. Durianni', 2),
(2, 'Mahmud', '0813121321', 'Jl. Pepaya', 3);

CREATE TABLE IF NOT EXISTS `t_donasi` (
`id_donasi` int(11) NOT NULL,
  `nama_donatur` varchar(50) NOT NULL,
  `no_hp_donatur` varchar(14) NOT NULL,
  `alamat_donatur` varchar(100) NOT NULL,
  `tgl_donasi` date NOT NULL,
  `total_donasi` int(11) NOT NULL,
  `bukti_donasi` varchar(250) NOT NULL,
  `tgl_validasi` date NOT NULL,
  `id_amil` int(11) NOT NULL,
  `status_validasi` varchar(1) NOT NULL,
  PRIMARY KEY (`id_donasi`),
  CONSTRAINT `fk_t_donasi_t_amil` FOREIGN KEY (`id_amil`) REFERENCES `t_amil` (`id_amil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `t_donasi` (`id_donasi`, `nama_donatur`, `no_hp_donatur`, `alamat_donatur`, `tgl_donasi`, `total_donasi`, `bukti_donasi`, `tgl_validasi`, `id_amil`, `status_validasi`) VALUES
(1, 'Wayoik', '0823198938123', 'Jl. Melati', '2020-03-11', 45000, './assets/img/bukti_donasi/bukti1.jpeg', '2020-03-12', 2, '1'),
(2, 'Tukimin', '0812983912', 'Jl. Merpati', '2020-03-11', 80000, './assets/img/bukti_donasi/bukti2.jpeg', '2020-03-12', 2, '1'),
(3, 'Sunarto', '0182399123', 'Jl. Naga Sakti', '2020-03-12', 100000, './assets/img/bukti_donasi/bukti3.jpeg', '2020-03-12', 2, '0');


CREATE TABLE IF NOT EXISTS `t_infak` (
`id_infak` int(11) NOT NULL,
  `nama_pembayar` varchar(20) NOT NULL,
  `tgl_infak` date NOT NULL,
  `total_infak` int(11) NOT NULL,
  PRIMARY KEY (`id_infak`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `t_infak` (`id_infak`, `nama_pembayar`, `tgl_infak`, `total_infak`) VALUES
(1, 'Hiruzen', '2020-02-03', 4000),
(2, 'Sarutobi', '2020-02-03', 5000),
(3, 'Carlos', '2020-03-02', 150000),
(4, 'Sabiru', '2020-03-05', 20000);


CREATE TABLE IF NOT EXISTS `t_kritik_saran` (
`id_saran` int(11) NOT NULL,
  `tgl_saran` date NOT NULL,
  `nama_saran` varchar(50) NOT NULL,
  `subjek_saran` varchar(200) NOT NULL,
  `saran` varchar(250) NOT NULL,
  PRIMARY KEY (`id_saran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `t_kritik_saran` (`id_saran`, `tgl_saran`, `nama_saran`, `subjek_saran`, `saran`) VALUES
(1, '2020-03-06', 'test saran', 'test doang', ' haha hihi'),
(2, '2020-03-06', 'test2', 'hihi', 'huhu hehe'),
(3, '2020-03-11', 'haha', 'asjdasd', 'mxzncmnxc'),
(4, '2020-03-24', 'asdad', 'asdad', 'asdasd'),
(5, '2020-03-24', '', '', ''),
(6, '2020-03-24', 'haha', 'hihi', 'huhuhuhuhu');

CREATE TABLE IF NOT EXISTS `t_pembayar` (
`id_pembayar` int(11) NOT NULL,
  `nama_pembayar` varchar(30) NOT NULL,
  `no_hp_pembayar` varchar(14) NOT NULL,
  `alamat_pembayar` varchar(50) NOT NULL,
  `id_masjid` int(11) NOT NULL,
  PRIMARY KEY (`id_pembayar`),
  CONSTRAINT `fk_t_pembayar_t_masjid` FOREIGN KEY (`id_masjid`) REFERENCES `t_masjid` (`id_masjid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `t_pembayar` (`id_pembayar`, `nama_pembayar`, `no_hp_pembayar`, `alamat_pembayar`, `id_masjid`) VALUES
(1, 'Hiruzen', '01823123', 'Jl. Rajawali', 2),
(2, 'Sarutobi', '2193898123', 'Jl. Pelangi', 3),
(3, 'Minato', '080819289123', 'Jl. Indah Karya', 2),
(4, 'Mizuki', '08129389123', 'Jl. Ambalang', 3),
(5, 'Sabiru', '081823123', 'Jl. Tulip', 2);

CREATE TABLE IF NOT EXISTS `t_zakat` (
`id_zakat` int(11) NOT NULL,
  `jenis_zakat` varchar(30) NOT NULL,
  PRIMARY KEY (`id_zakat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `t_zakat` (`id_zakat`, `jenis_zakat`) VALUES
(5, 'Zakat Fitrah'),
(6, 'Zakat Mal'),
(11, 'Zakat Fidiah');

CREATE TABLE IF NOT EXISTS `t_pembayaran` (
`id_pembayaran` int(11) NOT NULL,
  `id_zakat` int(11) NOT NULL,
  `id_amil` int(11) NOT NULL,
  `id_pembayar` int(11) NOT NULL,
  `tgl_penyerahan` date NOT NULL,
  `pembayaran_beras` double NOT NULL,
  `pembayaran_uang` int(11) NOT NULL,
  `jumlah_tanggungan` int(2) NOT NULL,
  `total_pembayaran` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pembayaran`),
  CONSTRAINT `fk_t_pembayaran_t_zakat` FOREIGN KEY (`id_zakat`) REFERENCES `t_zakat` (`id_zakat`),
  CONSTRAINT `fk_t_pembayaran_t_amil` FOREIGN KEY (`id_amil`) REFERENCES `t_amil` (`id_amil`),
  CONSTRAINT `fk_t_pembayaran_t_pembayar` FOREIGN KEY (`id_pembayar`) REFERENCES `t_pembayar` (`id_pembayar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `t_pembayaran` (`id_pembayaran`, `id_zakat`, `id_amil`, `id_pembayar`, `tgl_penyerahan`, `pembayaran_beras`, `pembayaran_uang`, `jumlah_tanggungan`, `total_pembayaran`) VALUES
(1, 5, 2, 1, '2020-02-03', 2.7, 0, 3, '8.1'),
(2, 6, 2, 2, '2020-02-03', 0, 7000, 4, '28000'),
(3, 5, 1, 3, '2020-03-02', 2.5, 0, 5, '12.5'),
(4, 6, 2, 4, '2020-03-05', 0, 8333, 6, '50000'),
(5, 5, 2, 5, '2020-03-05', 0, 15000, 2, '30000');

CREATE TABLE IF NOT EXISTS `t_penerima` (
`id_penerima` int(11) NOT NULL,
  `nama_penerima` varchar(30) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `alamat_penerima` varchar(30) NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`id_penerima`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `t_penerima` (`id_penerima`, `nama_penerima`, `kategori`, `alamat_penerima`, `status`) VALUES
(1, 'Si A', 'Fakir', 'Jl. Jalan', '1'),
(2, 'Si B', 'Fakir', 'Jl. Mawar', '1'),
(3, 'Si C', 'Miskin', 'Jl. Kamboja', '1'),
(4, 'Si D', 'Gharim', 'Jl. Kembang', '1'),
(5, 'Si E', 'Mualaf', 'Jl. Kartama', '1');

CREATE TABLE IF NOT EXISTS `t_penerimaan` (
`id_penerimaan` int(11) NOT NULL,
  `id_amil` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `tgl_penerimaan` date NOT NULL,
  `jumlah_penerimaan_uang` int(11) NOT NULL,
  `jumlah_penerimaan_beras` double NOT NULL,
  PRIMARY KEY (`id_penerimaan`),
  CONSTRAINT `fk_t_penerimaan_t_amil` FOREIGN KEY (`id_amil`) REFERENCES `t_amil` (`id_amil`),
  CONSTRAINT `fk_t_penerimaan_t_penerima` FOREIGN KEY (`id_penerima`) REFERENCES `t_penerima` (`id_penerima`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `t_penerimaan` (`id_penerimaan`, `id_amil`, `id_penerima`, `tgl_penerimaan`, `jumlah_penerimaan_uang`, `jumlah_penerimaan_beras`) VALUES
(1, 1, 1, '2020-03-02', 40000, 0),
(2, 1, 2, '2020-03-02', 40000, 0),
(3, 1, 3, '2020-03-02', 0, 4),
(4, 1, 4, '2020-03-02', 40000, 0),
(5, 1, 5, '2020-03-02', 0, 4),
(7, 1, 1, '2020-03-04', 35000, 0),
(8, 1, 2, '2020-03-04', 0, 3),
(9, 1, 3, '2020-03-04', 0, 3),
(10, 1, 4, '2020-03-04', 35000, 0),
(12, 2, 1, '2020-03-10', 21600, 4.12),
(13, 2, 2, '2020-03-10', 21600, 4.12),
(14, 2, 3, '2020-03-10', 21600, 4.12),
(15, 2, 5, '2020-03-10', 21600, 4.12),
(17, 2, 1, '2020-03-11', 18000, 3.4333333333333),
(18, 2, 2, '2020-03-11', 18000, 3.4333333333333),
(19, 2, 3, '2020-03-11', 18000, 3.4333333333333),
(20, 2, 4, '2020-03-11', 18000, 3.4333333333333),
(21, 2, 5, '2020-03-11', 18000, 3.4333333333333);
