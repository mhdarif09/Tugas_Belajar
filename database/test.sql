-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2023 pada 06.15
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_attachment`
--

CREATE TABLE `tb_attachment` (
  `attachment_id` int(11) NOT NULL,
  `attachment_at_id` int(11) NOT NULL,
  `attachment_eizin_id` int(11) NOT NULL,
  `attachment_file_name` varchar(255) NOT NULL,
  `attachment_file_type` varchar(255) NOT NULL,
  `attachment_file_size` float NOT NULL,
  `attachment_file_ext` varchar(255) NOT NULL,
  `attachment_entri` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_attachment`
--

INSERT INTO `tb_attachment` (`attachment_id`, `attachment_at_id`, `attachment_eizin_id`, `attachment_file_name`, `attachment_file_type`, `attachment_file_size`, `attachment_file_ext`, `attachment_entri`) VALUES
(1, 4, 1, '123.jpg', 'image/jpeg', 168.46, '.jpg', '2019-09-13 13:09:20'),
(2, 5, 1, '105959_wallpaper-klasik.jpg', 'image/jpeg', 291.58, '.jpg', '2019-09-13 13:09:32'),
(3, 6, 1, '14500757_904164333050845_2169061377105923088_o.jpg', 'image/jpeg', 474.3, '.jpg', '2019-09-13 13:09:45'),
(4, 7, 1, '19400408_667441313466158_7891115233347522882_o.jpg', 'image/jpeg', 92.22, '.jpg', '2019-09-13 13:09:58'),
(5, 8, 1, '20180920_145709.jpg', 'image/jpeg', 2150.36, '.jpg', '2019-09-13 13:10:12'),
(6, 10, 1, '20190322_163723.jpg', 'image/jpeg', 243.38, '.jpg', '2019-09-13 13:10:26'),
(7, 16, 1, '21765289_707052959504993_8903786092870033883_n.jpg', 'image/jpeg', 24.66, '.jpg', '2019-09-13 13:10:39'),
(8, 11, 2, '123.jpg', 'image/jpeg', 168.46, '.jpg', '2019-09-13 13:22:39'),
(9, 12, 2, '105959_wallpaper-klasik.jpg', 'image/jpeg', 291.58, '.jpg', '2019-09-13 13:22:51'),
(10, 13, 2, '14500757_904164333050845_2169061377105923088_o.jpg', 'image/jpeg', 474.3, '.jpg', '2019-09-13 13:23:01'),
(11, 14, 2, '20180920_145709.jpg', 'image/jpeg', 2150.36, '.jpg', '2019-09-13 13:23:14'),
(12, 15, 2, '20190322_163959.jpg', 'image/jpeg', 204.01, '.jpg', '2019-09-13 13:23:25'),
(13, 16, 2, '21765289_707052959504993_8903786092870033883_n.jpg', 'image/jpeg', 24.66, '.jpg', '2019-09-13 13:23:38'),
(14, 17, 2, 'aaa.jpg', 'image/jpeg', 1665.26, '.jpg', '2019-09-13 13:23:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_attachment_type`
--

CREATE TABLE `tb_attachment_type` (
  `at_id` int(11) NOT NULL,
  `at_nama` varchar(255) NOT NULL,
  `at_deskripsi` text NOT NULL,
  `at_type` enum('IB','SKLK','semua') NOT NULL,
  `at_entri` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_attachment_type`
--

INSERT INTO `tb_attachment_type` (`at_id`, `at_nama`, `at_deskripsi`, `at_type`, `at_entri`) VALUES
(4, 'Surat Pengantar dari SKPD', '', 'IB', '2017-12-26 19:35:57'),
(5, 'SK Pangkat Terakhir', '', 'IB', '2017-12-26 19:39:06'),
(6, 'SKP 2 (dua) tahun terakhir', '', 'IB', '2017-12-26 19:39:28'),
(7, 'Ijazah terakhir dan Transkip Nilai', '', 'IB', '2017-12-26 19:39:55'),
(8, 'Surat Pernyataan dari Perguruan Tinggi', '', 'IB', '2017-12-26 19:40:32'),
(10, 'Surat Keterangan dari SKPD', '', 'IB', '2017-12-26 19:42:09'),
(11, 'Surat Pengantar dari SKPD', '', 'SKLK', '2017-12-26 19:42:47'),
(12, 'Surat Keterangan Lulus dari Perguruan Tinggi', '', 'SKLK', '2017-12-26 19:43:15'),
(13, 'Ijazah terakhir dan Transkip Nilai', '', 'SKLK', '2017-12-26 19:43:44'),
(14, 'Surat Keterangan dari SKPD', '', 'SKLK', '2017-12-26 19:43:55'),
(15, 'Sertifikat Akreditasi', '', 'SKLK', '2017-12-26 19:44:06'),
(16, 'Surat Pernyataan Keaslian Ijazah', '', 'semua', '2017-12-26 19:44:22'),
(17, 'SKP 2 (dua) tahun terakhir', '', 'SKLK', '2017-12-26 19:44:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_biodata`
--

CREATE TABLE `tb_biodata` (
  `biodata_id` int(11) NOT NULL,
  `biodata_eizin_id` int(11) NOT NULL,
  `biodata_nomor` varchar(255) NOT NULL,
  `biodata_nama` varchar(255) NOT NULL,
  `biodata_tanggal_surat` date NOT NULL,
  `biodata_nip` varchar(255) NOT NULL,
  `biodata_pangkat` varchar(255) NOT NULL,
  `biodata_jabatan` varchar(255) NOT NULL,
  `biodata_unit_kerja` varchar(255) NOT NULL,
  `biodata_almamater` varchar(255) NOT NULL,
  `biodata_penyelenggara` varchar(255) NOT NULL,
  `biodata_jurusan` varchar(255) NOT NULL,
  `biodata_program` varchar(255) NOT NULL,
  `biodata_no_ijazah` varchar(255) NOT NULL,
  `biodata_tahun_kelulusan` varchar(255) NOT NULL,
  `biodata_nilai` int(11) NOT NULL,
  `biodata_dasar` text NOT NULL,
  `biodata_akreditasi` enum('A','B') NOT NULL,
  `biodata_alamat` text NOT NULL,
  `biodata_entri` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_biodata`
--

INSERT INTO `tb_biodata` (`biodata_id`, `biodata_eizin_id`, `biodata_nomor`, `biodata_nama`, `biodata_tanggal_surat`, `biodata_nip`, `biodata_pangkat`, `biodata_jabatan`, `biodata_unit_kerja`, `biodata_almamater`, `biodata_penyelenggara`, `biodata_jurusan`, `biodata_program`, `biodata_no_ijazah`, `biodata_tahun_kelulusan`, `biodata_nilai`, `biodata_dasar`, `biodata_akreditasi`, `biodata_alamat`, `biodata_entri`) VALUES
(3, 1, '121/53535', 'Aldhitya Prasetya', '2019-09-13', '531415056', 'Penata Tingkat I', 'Ketua Bidang', 'Kecamatan Boliyohuto', 'UNG', '', 'Teknik Informatika', 'Sistem Informasi', '', '2018/2019', 0, '', 'A', '-', '2019-09-13 13:08:32'),
(4, 2, '121/53535', 'Aldhitya Prasetya', '2019-09-02', '53415056', 'Penata Tingkat I', 'Ketua Bidang', 'Kecamatan Boliyohuto', 'UNG', 'UNG', 'Teknik Informatika', 'Sistem Informasi', 'DN132', '2018/2019', 356, '', 'A', '-', '2019-09-13 13:16:03'),
(5, 3, 'Gd', 'Ggsg', '2023-05-28', '1421421421', '3', 'r', 'Gee', 'r', 'Rr', 'rrR', 'rR', 'HR', '2022/2023', 23, '', 'A', 'gdsGG', '2023-05-28 10:49:21'),
(6, 4, 'DWd', 'dWD', '2023-05-28', '2424', '3', '244', 'agd', 'dgdg', '', 'sdg', 'dgs', '', '2022/2023', 0, '', 'A', 'sgd', '2023-05-28 10:51:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dinas`
--

CREATE TABLE `tb_dinas` (
  `dinas_id` int(11) NOT NULL,
  `dinas_nama` varchar(255) NOT NULL,
  `dinas_email` varchar(255) DEFAULT NULL,
  `dinas_photo` varchar(255) NOT NULL,
  `dinas_password` varchar(255) NOT NULL,
  `dinas_entri` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dinas`
--

INSERT INTO `tb_dinas` (`dinas_id`, `dinas_nama`, `dinas_email`, `dinas_photo`, `dinas_password`, `dinas_entri`) VALUES
(52, 'SEKETARIS DINAS PALEMBANG', 'arifgaming2124@gmail.com', '21.png', '629052673', '2023-05-28 10:46:24'),
(53, 'arif', 'arifgaming2124@gmail.com', '22.png', '741956055', '2023-05-28 11:04:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_eizin`
--

CREATE TABLE `tb_eizin` (
  `eizin_id` int(11) NOT NULL,
  `eizin_dinas_id` int(11) NOT NULL,
  `eizin_dir` varchar(255) NOT NULL,
  `eizin_entri` datetime NOT NULL,
  `eizin_type` enum('IB','SKLK') NOT NULL,
  `eizin_date_kirim` datetime NOT NULL,
  `eizin_kode` varchar(255) NOT NULL,
  `eizin_status` enum('belum dikirim','terkirim','verifikasi 1','verifikasi 2') NOT NULL DEFAULT 'belum dikirim'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_eizin`
--

INSERT INTO `tb_eizin` (`eizin_id`, `eizin_dinas_id`, `eizin_dir`, `eizin_entri`, `eizin_type`, `eizin_date_kirim`, `eizin_kode`, `eizin_status`) VALUES
(1, 51, 'ib1', '2019-09-13 13:08:32', 'IB', '2019-09-14 00:04:09', 'C4CA4238A0B923820DCC509A6F75849B', 'verifikasi 2'),
(2, 51, 'sklk2', '2019-09-13 13:16:03', 'SKLK', '2019-09-13 13:46:46', 'C81E728D9D4C2F636F067F89CC14862C', 'verifikasi 2'),
(3, 52, 'sklk3', '2023-05-28 10:49:21', 'SKLK', '0000-00-00 00:00:00', 'ECCBC87E4B5CE2FE28308FD9F2A7BAF3', 'belum dikirim'),
(4, 52, 'ib4', '2023-05-28 10:51:51', 'IB', '0000-00-00 00:00:00', 'A87FF679A2F3E71D9181A67B7542122C', 'belum dikirim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_notif`
--

CREATE TABLE `tb_notif` (
  `notif_id` int(11) NOT NULL,
  `notif_user_id` int(11) NOT NULL,
  `notif_to_user_id` int(11) NOT NULL,
  `notif_eizin_id` int(11) NOT NULL,
  `notif_type` varchar(255) NOT NULL,
  `notif_title` varchar(255) NOT NULL,
  `notif_text` text NOT NULL,
  `notif_link` varchar(255) NOT NULL DEFAULT '#',
  `notif_status` enum('delive','read') NOT NULL,
  `notif_entri` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_notif`
--

INSERT INTO `tb_notif` (`notif_id`, `notif_user_id`, `notif_to_user_id`, `notif_eizin_id`, `notif_type`, `notif_title`, `notif_text`, `notif_link`, `notif_status`, `notif_entri`) VALUES
(1, 83, 1, 1, 'kirim admin1', 'Kecamatan Tanjungsiang : Mengirimkan Persyaratan Pengajuan atas nama huhuh', 'Kecamatan TanjungsiangMengirim Persyaratan Pengajuan huhuh', 'ib/62/1/terkirim', 'read', '2019-09-09 00:10:40'),
(2, 1, 83, 1, 'verifikasi 1', 'Kecamatan Tanjungsiang : huhuh telah diverifikasi ke-1', 'Persyaratan Pengajuan huhuh telah diverifikasi ke-1 oleh admin', 'ib/1/view', 'read', '2019-09-09 00:11:18'),
(3, 1, 19, 1, 'verifikasi 1', 'Kecamatan Tanjungsiang : huhuh telah diverifikasi ke-1', 'Persyaratan Pengajuan huhuh telah diverifikasi ke-1. Silahkan Verifikasi ke-2', 'ib/62/1/verifikasi-1', 'read', '2019-09-09 00:11:18'),
(4, 19, 83, 1, 'verifikasi 2', 'Kecamatan Tanjungsiang : huhuh telah diverifikasi ke-2', 'Silahkan print dan tukarkan kartu pengambilan untuk mendapatkan surat', 'ib/1/view', 'read', '2019-09-09 00:12:10'),
(5, 19, 1, 1, 'verifikasi 2', 'Kecamatan Tanjungsiang : huhuh telah diverifikasi ke-2', 'Anda bisa print surat apabila dinas menyerahkan kartu pengambilan untuk dicari', 'ib/62/1/verifikasi-2', 'read', '2019-09-09 00:12:10'),
(6, 50, 1, 2, 'kirim admin1', 'Badan Perencanaan Pembangunan, Penelitian dan Pengembangan Daerah Kabupaten Subang : Mengirimkan Persyaratan Surat Keterangan Lulus Kuliah atas nama huhuh', 'Badan Perencanaan Pembangunan, Penelitian dan Pengembangan Daerah Kabupaten SubangMengirim Persyaratan Pengajuan huhuh', 'sklk/29/2/terkirim', 'read', '2019-09-13 03:18:04'),
(7, 1, 50, 2, 'verifikasi 1', 'Badan Perencanaan Pembangunan, Penelitian dan Pengembangan Daerah Kabupaten Subang : huhuh telah diverifikasi ke-1', 'Persyaratan Pengajuan huhuh telah diverifikasi ke-1 oleh admin', 'sklk/2/view', 'delive', '2019-09-13 03:23:45'),
(8, 1, 19, 2, 'verifikasi 1', 'Badan Perencanaan Pembangunan, Penelitian dan Pengembangan Daerah Kabupaten Subang : huhuh telah diverifikasi ke-1', 'Persyaratan Pengajuan huhuh telah diverifikasi ke-1. Silahkan Verifikasi ke-2', 'sklk/29/2/verifikasi-1', 'read', '2019-09-13 03:23:46'),
(9, 19, 50, 2, 'verifikasi 2', 'Badan Perencanaan Pembangunan, Penelitian dan Pengembangan Daerah Kabupaten Subang : huhuh telah diverifikasi ke-2', 'Silahkan print dan tukarkan kartu pengambilan untuk mendapatkan surat', 'sklk/2/view', 'delive', '2019-09-13 03:25:16'),
(10, 19, 1, 2, 'verifikasi 2', 'Badan Perencanaan Pembangunan, Penelitian dan Pengembangan Daerah Kabupaten Subang : huhuh telah diverifikasi ke-2', 'Anda bisa print surat apabila dinas menyerahkan kartu pengambilan untuk dicari', 'sklk/29/2/verifikasi-2', 'read', '2019-09-13 03:25:16'),
(11, 1, 118, 0, 'hapus persyaratan', 'huhuh telah dihapus admin', 'Persyaratan Surat Keterangan Lulus Kuliah huhuh yang telah selesai dihapus oleh admin', '#', 'delive', '2019-09-13 06:07:35'),
(12, 140, 1, 1, 'kirim admin1', 'Kecamatan Boliyohuto : Mengirimkan Persyaratan Pengajuan atas nama Aldhitya Prasetya', 'Kecamatan BoliyohutoMengirim Persyaratan Pengajuan Aldhitya Prasetya', 'ib/51/1/terkirim', 'read', '2019-09-13 13:10:49'),
(13, 140, 1, 2, 'kirim admin1', 'Kecamatan Boliyohuto : Mengirimkan Persyaratan Surat Keterangan Lulus Kuliah atas nama Aldhitya Prasetya', 'Kecamatan BoliyohutoMengirim Persyaratan Pengajuan Aldhitya Prasetya', 'sklk/51/2/terkirim', 'read', '2019-09-13 13:23:59'),
(14, 1, 140, 2, 'verifikasi 1', 'Kecamatan Boliyohuto : Aldhitya Prasetya telah diverifikasi ke-1', 'Persyaratan Pengajuan Aldhitya Prasetya telah diverifikasi ke-1 oleh admin', 'sklk/2/view', 'read', '2019-09-13 13:32:38'),
(15, 1, 19, 2, 'verifikasi 1', 'Kecamatan Boliyohuto : Aldhitya Prasetya telah diverifikasi ke-1', 'Persyaratan Pengajuan Aldhitya Prasetya telah diverifikasi ke-1. Silahkan Verifikasi ke-2', 'sklk/51/2/verifikasi-1', 'delive', '2019-09-13 13:32:38'),
(16, 19, 140, 2, 'verifikasi 2', 'Kecamatan Boliyohuto : Aldhitya Prasetya telah diverifikasi ke-2', 'Silahkan print dan tukarkan kartu pengambilan untuk mendapatkan surat', 'sklk/2/view', 'read', '2019-09-13 13:46:46'),
(17, 19, 1, 2, 'verifikasi 2', 'Kecamatan Boliyohuto : Aldhitya Prasetya telah diverifikasi ke-2', 'Anda bisa print surat apabila dinas menyerahkan kartu pengambilan untuk dicari', 'sklk/51/2/verifikasi-2', 'read', '2019-09-13 13:46:47'),
(18, 1, 140, 1, 'verifikasi 1', 'Kecamatan Boliyohuto : Aldhitya Prasetya telah diverifikasi ke-1', 'Persyaratan Pengajuan Aldhitya Prasetya telah diverifikasi ke-1 oleh admin', 'ib/1/view', 'read', '2019-09-14 00:03:42'),
(19, 1, 19, 1, 'verifikasi 1', 'Kecamatan Boliyohuto : Aldhitya Prasetya telah diverifikasi ke-1', 'Persyaratan Pengajuan Aldhitya Prasetya telah diverifikasi ke-1. Silahkan Verifikasi ke-2', 'ib/51/1/verifikasi-1', 'delive', '2019-09-14 00:03:42'),
(20, 19, 140, 1, 'verifikasi 2', 'Kecamatan Boliyohuto : Aldhitya Prasetya telah diverifikasi ke-2', 'Silahkan print dan tukarkan kartu pengambilan untuk mendapatkan surat', 'ib/1/view', 'read', '2019-09-14 00:04:09'),
(21, 19, 1, 1, 'verifikasi 2', 'Kecamatan Boliyohuto : Aldhitya Prasetya telah diverifikasi ke-2', 'Anda bisa cetak surat apabila OPD menyerahkan kartu pengambilan untuk dicari', 'ib/51/1/verifikasi-2', 'read', '2019-09-14 00:04:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` int(11) NOT NULL,
  `user_dinas_id` int(11) DEFAULT NULL,
  `user_level` enum('dinas','admin1','admin2') NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_entri` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `user_dinas_id`, `user_level`, `user_username`, `user_password`, `user_entri`) VALUES
(1, NULL, 'admin1', 'admin1', '1058a6b21b461590b461590c2149f37d3f88eb1058a6b', '2017-12-19 00:00:00'),
(19, NULL, 'admin2', 'admin2', '9c2485439d7dd55ad7dd55aa8dda4bea31f62e9c24854', '2017-12-21 00:00:00'),
(142, 53, 'dinas', '0FF6C3ACE', 'dfcee98817ce3c777ce3c778a2152a08440e3edfcee98', '2023-05-28 11:04:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_attachment`
--
ALTER TABLE `tb_attachment`
  ADD PRIMARY KEY (`attachment_id`);

--
-- Indeks untuk tabel `tb_attachment_type`
--
ALTER TABLE `tb_attachment_type`
  ADD PRIMARY KEY (`at_id`);

--
-- Indeks untuk tabel `tb_biodata`
--
ALTER TABLE `tb_biodata`
  ADD PRIMARY KEY (`biodata_id`);

--
-- Indeks untuk tabel `tb_dinas`
--
ALTER TABLE `tb_dinas`
  ADD PRIMARY KEY (`dinas_id`);

--
-- Indeks untuk tabel `tb_eizin`
--
ALTER TABLE `tb_eizin`
  ADD PRIMARY KEY (`eizin_id`);

--
-- Indeks untuk tabel `tb_notif`
--
ALTER TABLE `tb_notif`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_attachment`
--
ALTER TABLE `tb_attachment`
  MODIFY `attachment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_attachment_type`
--
ALTER TABLE `tb_attachment_type`
  MODIFY `at_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_biodata`
--
ALTER TABLE `tb_biodata`
  MODIFY `biodata_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_dinas`
--
ALTER TABLE `tb_dinas`
  MODIFY `dinas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `tb_eizin`
--
ALTER TABLE `tb_eizin`
  MODIFY `eizin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_notif`
--
ALTER TABLE `tb_notif`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
