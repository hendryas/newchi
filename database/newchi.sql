-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Sep 2022 pada 05.32
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newchi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `additional`
--

CREATE TABLE `additional` (
  `kode` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `additional`
--

INSERT INTO `additional` (`kode`, `nama`, `harga`, `date_created`, `date_updated`) VALUES
('37WHL9OQJN', 'Tambah Cairan Pembersih Kaca', '12000', '2022-08-31 11:30:42', '2022-08-31 11:30:42'),
('4AFY7EUH2T', 'Tambah Busa Segar', '11000', '2022-08-31 11:31:15', '2022-08-31 11:40:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `kode` varchar(128) NOT NULL,
  `nama_bank` varchar(256) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`kode`, `nama_bank`, `date_created`, `date_updated`) VALUES
('ODJH89SQG4', 'MANDIRI', '2022-08-30 06:52:15', '2022-08-30 06:52:15'),
('QXCW63MJAP', 'BRI', '2022-08-30 06:52:21', '2022-08-30 06:52:21'),
('S2RI8L41PU', 'BCA', '2022-08-30 06:52:08', '2022-08-30 06:52:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner_promo`
--

CREATE TABLE `banner_promo` (
  `id` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_layanan`
--

CREATE TABLE `jenis_layanan` (
  `id` int(11) NOT NULL,
  `kode` varchar(256) NOT NULL,
  `nama_jenis_layanan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_layanan`
--

INSERT INTO `jenis_layanan` (`id`, `kode`, `nama_jenis_layanan`) VALUES
(1, '9X7MON4YAF', 'Small Car'),
(2, 'HW1XTRLZF5', 'Medium Car'),
(3, 'TM6X91YIOD', 'Big Car'),
(4, 'SWKH9U5BRO', 'Super Car');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kode` varchar(10) NOT NULL,
  `kode_kota` varchar(10) DEFAULT NULL,
  `kode_admin` varchar(10) DEFAULT NULL,
  `nama_kecamatan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`kode`, `kode_kota`, `kode_admin`, `nama_kecamatan`) VALUES
('1', '1', '13', 'Banyumanik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `kode` varchar(20) DEFAULT NULL,
  `nama_kota` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`kode`, `nama_kota`) VALUES
('1', 'Semarang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id` int(11) NOT NULL,
  `kode` varchar(128) NOT NULL,
  `kode_jenis` varchar(128) NOT NULL,
  `nama_layanan` varchar(256) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `harga` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id`, `kode`, `kode_jenis`, `nama_layanan`, `deskripsi`, `harga`) VALUES
(3, 'VXMS8FJTNH', '9X7MON4YAF', 'Paket 1', '<p>Cuci Mengkilap</p>\r\n', '150000'),
(4, 'RV1ELCPGKD', 'HW1XTRLZF5', 'Paket 1', '<p>Cuci Mengkilap</p>\r\n', '200000'),
(5, 'HX3OUB4K86', '9X7MON4YAF', 'Paket 2', '<p>Cuci Khusus</p>\r\n', '280000'),
(6, '1MW9LVIC56', 'HW1XTRLZF5', 'Paket 2', '<p>Cuci Khusus</p>\r\n', '300000'),
(7, 'SZUL812YXR', 'TM6X91YIOD', 'Paket 1', '<p>Cuci Mengkilap</p>\r\n', '250000'),
(8, 'Y4OMI6R9DA', 'TM6X91YIOD', 'Paket 2', '<p>Cuci Khusus</p>\r\n', '320000'),
(9, 'LYAXQ7VOK6', 'SWKH9U5BRO', 'Paket 1', '<p>Cuci Mengkilap</p>\r\n', '300000'),
(10, '8IQLFTRUB2', 'SWKH9U5BRO', 'Paket 2', '<p>Cuci Khusus</p>\r\n', '350000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_additional`
--

CREATE TABLE `order_additional` (
  `id` int(11) NOT NULL,
  `kode_order` varchar(128) NOT NULL,
  `kode_additional` varchar(128) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order_additional`
--

INSERT INTO `order_additional` (`id`, `kode_order`, `kode_additional`, `date_created`, `date_updated`) VALUES
(3, '9S8V15GHUK', '37WHL9OQJN', '2022-08-31 23:09:05', '2022-08-31 23:09:05'),
(4, '9S8V15GHUK', '4AFY7EUH2T', '2022-08-31 23:09:05', '2022-08-31 23:09:05'),
(5, 'YKTUJZPO4B', '37WHL9OQJN', '2022-09-02 13:32:48', '2022-09-02 13:32:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `nama_bank` varchar(256) NOT NULL,
  `nomor_rekening` bigint(20) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `nama_bank`, `nomor_rekening`, `date_created`, `date_updated`) VALUES
(2, 'MANDIRI', 1234565432, '2022-08-08 10:45:22', '2022-08-08 10:49:57'),
(3, 'BCA', 98764456321, '2022-08-08 10:50:24', '2022-08-08 10:50:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_pembayaran_customer`
--

CREATE TABLE `rekap_pembayaran_customer` (
  `id` int(11) NOT NULL,
  `kode_order` varchar(128) NOT NULL,
  `nama_rekening_customer` varchar(128) NOT NULL,
  `nama_bank_customer` varchar(128) NOT NULL,
  `no_rekening_customer` varchar(128) NOT NULL,
  `bukti_bayar_customer` varchar(128) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekap_pembayaran_customer`
--

INSERT INTO `rekap_pembayaran_customer` (`id`, `kode_order`, `nama_rekening_customer`, `nama_bank_customer`, `no_rekening_customer`, `bukti_bayar_customer`, `date_created`, `date_updated`) VALUES
(1, 'YKTUJZPO4B', 'Arifin', 'BCA', '2345678910', 'bukti_bayar_yktujzpo4b.png', '2022-09-02 15:09:46', '2022-09-02 15:09:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `kode` varchar(128) NOT NULL,
  `kode_bank` varchar(128) NOT NULL,
  `no_rekening` varchar(128) NOT NULL,
  `atas_nama` varchar(256) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`kode`, `kode_bank`, `no_rekening`, `atas_nama`, `date_created`, `date_updated`) VALUES
('LSJXWG8CYO', 'S2RI8L41PU', '1234567890', 'Samsudin', '2022-08-30 07:40:43', '2022-08-30 07:53:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `kode` varchar(128) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `alamat` longtext NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `tgl_order` date NOT NULL,
  `wkt_order` time NOT NULL,
  `phone` varchar(128) NOT NULL,
  `note` longtext NOT NULL,
  `voucher` varchar(128) NOT NULL,
  `harga_final` varchar(128) NOT NULL,
  `kode_layanan` varchar(128) NOT NULL,
  `status_order` int(11) NOT NULL,
  `status_pembayaran` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `kode`, `id_customer`, `alamat`, `id_kecamatan`, `tgl_order`, `wkt_order`, `phone`, `note`, `voucher`, `harga_final`, `kode_layanan`, `status_order`, `status_pembayaran`, `id_staff`, `date_created`, `date_updated`) VALUES
(36, '9S8V15GHUK', 15, 'Jl. Kelud 16', 1, '2022-08-31', '09:15:00', '086756789090', 'Depan Gor', 'kosong', '223000', 'RV1ELCPGKD', 4, 1, 0, '2022-08-31 23:09:05', '2022-08-31 23:09:05'),
(37, 'YKTUJZPO4B', 15, 'Gang Anggrek 02', 1, '2022-09-02', '08:45:00', '08674563528', '', 'kosong', '332000', 'Y4OMI6R9DA', 2, 1, 16, '2022-09-02 13:32:48', '2022-09-02 13:32:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(10) NOT NULL,
  `is_active` int(10) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `tgl_lahir`, `gender`, `phone`, `email`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Bisri', NULL, '1', '082134703291', 'bisrimustafaaa@gmail.com', '$2y$10$1Y5ALImDUmwS.kCBQGzUeeo//N2l/rECscqfPRxLuLHnkzbYXNlia', 2, 1, '2022-06-13 00:00:00'),
(13, 'Vanessa Ananda', '1999-03-04', '2', '085921685125', 'vanessaanandaputri@gmail.com', '$2y$10$nTk.mN2J05GD/tlMkViFKulF/uv9Wj1wKtAKxmTap.IcJ9yp6LGBe', 1, 1, '2022-06-22 00:20:38'),
(15, 'Setiawan', '1997-06-25', '1', '085325026752', 'hendryas321@gmail.com', '$2y$10$P1qTgz8vM0neFJ54acVn2uaIdyFg4JAMCtwuAqe64uSWu32A7qNye', 4, 1, '2022-07-31 12:57:56'),
(16, 'Samsul', NULL, '1', '086789897656', 'samsul12@gmail.com', '$2y$10$P1qTgz8vM0neFJ54acVn2uaIdyFg4JAMCtwuAqe64uSWu32A7qNye', 3, 1, '2022-09-03 08:01:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 2, 1),
(11, 1, 2),
(12, 2, 3),
(13, 1, 3),
(17, 4, 5),
(18, 3, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_has_sub_menu`
--

CREATE TABLE `user_has_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `status_sub` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_has_sub_menu`
--

INSERT INTO `user_has_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`, `status_sub`, `date_created`) VALUES
(1, 1, 'Role', 'admin/role', 'fal fa-fw fa-list', 1, 1, '2022-07-06 00:00:00'),
(3, 1, 'Management User', 'admin/user', 'fal fa-fw fa-user', 1, 1, '2022-07-06 00:00:00'),
(4, 3, 'Menu Management', '-', 'fal fa-fw fa-bars', 1, 0, '2022-08-02 20:30:48'),
(8, 3, 'Voucher', 'master/voucher', 'fal fa-fw fa-barcode', 1, 1, '2022-08-02 17:07:56'),
(9, 3, 'Banner promo', 'master/bannerpromo', 'fal fa-fw fa-images', 1, 1, '2022-08-02 23:22:53'),
(10, 3, 'Jenis Pembayaran', 'master/pembayaran', 'fal fa-fw fa-credit-card', 1, 1, '2022-08-08 10:22:30'),
(11, 3, 'Jenis Layanan', 'master/jenislayanan', 'fal fa-fw fa-list-alt', 1, 1, '2022-08-27 22:29:20'),
(12, 3, 'Layanan', 'master/layanan', 'fal fa-fw fa-cogs', 1, 1, '2022-08-27 23:08:49'),
(13, 3, 'Bank', 'master/bank', 'fal fa-fw fa-bank', 1, 1, '2022-08-30 06:16:13'),
(14, 3, 'Nomor Rekening Bank', 'master/rekening', 'fal fa-fw fa-credit-card', 1, 1, '2022-08-30 07:06:40'),
(15, 5, 'Dashboard', 'customer/dashboard', 'fal fa-fw fa-tachometer', 1, 1, '2022-08-30 10:36:38'),
(16, 5, 'Order', 'customer/order', 'fal fa-fw fa-shopping-cart', 1, 1, '2022-08-30 10:39:32'),
(17, 5, 'History', 'customer/history', 'fal fa-fw fa-book', 1, 1, '2022-08-30 10:40:37'),
(18, 3, 'Lokasi', '#', 'fal fa-fw fa-map-marker', 1, 0, '2022-08-30 10:51:55'),
(19, 3, 'Additional Layanan', 'master/additional', 'fal fa-fw fa-cart-plus', 1, 1, '2022-08-31 11:10:43'),
(20, 6, 'Dashboard', 'staff/dashboard', 'fal fa-fw fa-tachometer', 1, 1, '2022-09-03 08:15:58'),
(21, 1, 'History Customer', 'admin/history', 'fal fa-fw fa-history', 1, 1, '2022-09-03 08:49:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `menu_nama` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `menu_nama`, `date_created`) VALUES
(1, 'Admin', 'Super Admin', '2022-06-14 00:00:00'),
(2, 'User', 'User', '2022-06-14 00:00:00'),
(3, 'Master', 'Master', '2022-08-02 20:22:27'),
(5, 'customer', 'Customer', '2022-08-30 10:34:33'),
(6, 'staff', 'Staff', '2022-09-03 08:13:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Staff'),
(4, 'Customer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `has_sub_menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `has_sub_menu_id`, `title`, `url`, `icon`, `is_active`, `date_created`) VALUES
(1, 1, 4, 'Menu Management (Level 1)', 'master/menulevel1', 'fal fa-fw fa-folder', 1, '2022-07-06 00:00:00'),
(2, 1, 4, 'Submenu Management (Level 2)', 'master/menulevel2', 'fal fa-fw fa-folder-open', 1, '2022-07-06 00:00:00'),
(3, 1, 4, 'Submenu Management (Level 3)', 'master/menulevel3', 'fal fa-fw fa-folder-open', 1, '2022-07-06 00:00:00'),
(6, 0, 18, 'Kecamatan', 'master/kecamatan', 'fal fa-fw fa-location-arrow', 1, '2022-08-30 10:53:01'),
(7, 0, 18, 'Kota', 'master/kota', 'fal fa-fw fa-location-arrow', 1, '2022-08-30 10:53:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(4, 'bisrimustafaaa@gmail.com', 'sb/4fleHhmubeA4moQ+mzUUZheJ4dvxchgzBcjQWopU=', '1656414096'),
(5, 'bisrimustafaaa@gmail.com', '6oOjis8s++0lycjye1iOQ2onW740zrpMvS6K7rba+6I=', '1656414157'),
(6, 'bisrimustafaaa@gmail.com', 'FBTu9P4N+jnCh+Mql8eJsmPqtaDUueFOKE6mIaZ7eHg=', '1656414618'),
(7, 'bisrimustafaaa@gmail.com', 'XPb2uv3kY0/PYaZP9U9WajqG7v99PYjw7iqB8gInxZc=', '1656415463'),
(8, 'bisrimustafaaa@gmail.com', 'AyQ/6oCtKuaO7noE+rxwGjAViAjqUPrnf/9e9XXq8zM=', '1656415641'),
(9, 'bisrimustafaaa@gmail.com', 'U7yMfejhbhWtMtY6zPfu6/LEtwc3a69+2ePgTrcffQw=', '1656415743'),
(13, 'hendryas321@gmail.com', 'V4oEtsNkmPXAT5DCzyBIDgYDwst7H4U8OO/IWrC/DCs=', '1659247214'),
(14, 'hendryas321@gmail.com', 'eQmlRkB5GQbpwxy3HA8GfRhiSZIiQoMPJx1ns2jHsKQ=', '1661829689');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `nama_voucher` varchar(256) NOT NULL,
  `kode_voucher` varchar(256) NOT NULL,
  `diskon_voucher` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `voucher`
--

INSERT INTO `voucher` (`id`, `nama_voucher`, `kode_voucher`, `diskon_voucher`, `date_created`, `date_updated`) VALUES
(2, 'Voucher Tahun Baru 2023', 'TAHUNBARU23', 80, '2022-08-02 23:11:03', '2022-08-02 23:12:44');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `additional`
--
ALTER TABLE `additional`
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `banner_promo`
--
ALTER TABLE `banner_promo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_layanan`
--
ALTER TABLE `jenis_layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_additional`
--
ALTER TABLE `order_additional`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekap_pembayaran_customer`
--
ALTER TABLE `rekap_pembayaran_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekening`
--
ALTER TABLE `rekening`
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_has_sub_menu`
--
ALTER TABLE `user_has_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `banner_promo`
--
ALTER TABLE `banner_promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jenis_layanan`
--
ALTER TABLE `jenis_layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `order_additional`
--
ALTER TABLE `order_additional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rekap_pembayaran_customer`
--
ALTER TABLE `rekap_pembayaran_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user_has_sub_menu`
--
ALTER TABLE `user_has_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
