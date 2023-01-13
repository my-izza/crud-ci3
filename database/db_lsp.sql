-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 13 Jan 2023 pada 14.08
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lsp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` varchar(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_buku` varchar(225) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `id_penerbit` varchar(11) NOT NULL,
  `detail` text NOT NULL,
  `gambar` tinytext NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `id_kategori`, `nama_buku`, `harga`, `stok`, `id_penerbit`, `detail`, `gambar`, `tahun`) VALUES
('B1001', 2, 'Bisnis Online', 75000, 9, 'SP01', 'Kode Buku:0056580090\r\nJudul Buku:BISNIS ONLINE (AHLI BISNIS DARING&PEMASARAN) KLS.XI/KIKD17\r\nPenulis:FATKHUL A.-UMAR S\r\n\r\nBerikut materi yang dibahas dalam buku ini.\r\nBab 1 Memahami Bisnis Online (Daring)\r\nBab 2 Merancang dan Membuat Website\r\nBab 3 Menggunakan Mesin Pencari dengan Memanfaatkan Search Engine Optimization (SEO)\r\nBab 4 Menerapkan Pemasaran Online dengan Memanfaatkan Media Sosial\r\nBab 5 Menerapkan Pemasaran Online dengan Menggunakan Email', 'buku-bo.jpg', 2004),
('K1001', 1, 'Analisis & Perancangan Sistem Informasi', 50000, 60, 'SP01', 'Analisa dan perancangan sistem informasi adalah proses penguraian suatu pokok dan menyelidiki keadaan yang sebenarnya dalam sebuah entitas atau guna mencari indikasi komponen dan usur-unsur penting dalam membangun sistem informasi.', 'buku-si.jpg', 0),
('K2001', 2, 'Etika Bisnis', 65000, 4, 'SP02', 'Berat 0.80 Tahun 2012 Halaman 528 ISBN 9789790756465 Penerbit Informatika', 'buku-etika1.jpg', 2012),
('K2003', 1, 'Autocad 3 Dimensi', 45000, 25, 'SP01', 'Pembahasan Buku :\r\n\r\nPengenalan Autocad 2015 \r\nMenggambar Objek 2 Dimensi \r\nDasarMenggambar Objek 2 Dimensi KompleksMembuat Teks dan Ukuran (Dimensi)\r\nMenggambar Objek Solid 3D \r\nDasarMenggambar Objek Solid 3D Sederhana \r\nMenggambar Objek Solid 3D Kompleks \r\nAplikasi Menggambar Meja dan Kursi \r\nAplikasi Menggambar Rumah \r\nMencetak Gambar \r\nLatihan Uji Kemampuan', 'buku-ad.jpg', 0),
('K3004', 1, 'Cloud Computing Technology', 85000, 15, 'SP01', 'Penulis : Mohamad Jamil\r\nRosihan\r\nAchmad Fuad\r\nviii, 78 hlm.; Uk:14x20 cm\r\nISBN 978-602-401-230-4\r\nCetakan Maret 2016.', 'buku-cc.jpg', 0),
('N1001', 3, 'Cahaya Di Penjuru Hati', 68500, 10, 'SP02', 'Layaknya kehidupan yang juga dialami banyak orang, perpisahan akhirnya menjadi bagian yang tak terhindarkan. Istrinya yang sedang koma mengalirkan sinyal perpisahan. Novel berdasarkan kisah nyata ini menggulirkan cerita sederhana yang sangat menyentuh dan menjadi cermin bagi kebanyakan orang. Cinta adalah tonggak penting yang mampu menegakkan seseorang. Di dalam pertarungan kehidupan yang berat dan sering tak tertanggungkan, cinta memainkan perannya yang vital dan berpengaruh.', 'novel-cahaya.jpg', 0),
('N1002', 3, 'Aku Ingin Cerita', 48000, 12, 'SP03', 'Rasa cemas kehilangan cinta sejati yang amat ia kasihi membuatnya memutar ulang kenangan yang membangun hidupnya. Dan ia temukan suatu perjalanan yang menakjubkan yang tidak disadarinya. Hidupnya selama ini luar biasa. Ternyata ketika seseorang berada di tepian jurang rasa takut kehilangan, segala keindahan yang pernah diberikan orang tercinta muncul bagai gelombang tak terbendung. Kehidupan maha dahsyat dengan kekuatan cinta pun mengalir kembali, seperti sebuah film yang diputar dalam benak.', 'novel-cerita.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penerbit`
--

CREATE TABLE `tbl_penerbit` (
  `id_penerbit` varchar(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `alamat` tinytext NOT NULL,
  `kota` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_penerbit`
--

INSERT INTO `tbl_penerbit` (`id_penerbit`, `nama`, `alamat`, `kota`, `telp`) VALUES
('SP01', 'Penerbit Informatika', 'Jl. Buah Batu No. 121', 'Bandung', '0813-2220-1946'),
('SP02', 'Andi Offset', 'Jl. Suryalaya IX No. 3', 'Bandung', '0878-3903-0688'),
('SP03', 'Danendra', 'Jl. Moch. Toha 44', 'Bandung', '022-5201215');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama`) VALUES
(1, 'Keilmuan'),
(2, 'Bisnis'),
(3, 'Novel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name`, `username`, `password`, `role_id`) VALUES
(5, 'Namikaze Minato', 'minato', '8034c43d15bb7ef42e2cc24255217acfc5f4b2f4', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `tbl_buku as tbl_penerbit` (`id_penerbit`),
  ADD KEY `tbl_buku as tb_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tbl_penerbit`
--
ALTER TABLE `tbl_penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD CONSTRAINT `tbl_buku as tb_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
