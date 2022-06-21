-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2022 pada 02.41
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekra`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ddoa`
--

CREATE TABLE `ddoa` (
  `ddoa_id` bigint(20) UNSIGNED NOT NULL,
  `nama_doa` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `ddoa`
--

INSERT INTO `ddoa` (`ddoa_id`, `nama_doa`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'doa masuk rumah', '2022-04-01 03:54:46', '2022-04-01 03:54:46', NULL),
(2, 'doa keluar rumah', '2022-04-01 03:54:46', '2022-04-01 03:54:46', NULL),
(3, 'doa halaman kubur', '2022-04-01 09:18:42', '2022-04-01 22:38:48', NULL),
(4, 'doa menjenguk orang sakit', '2022-04-01 09:19:09', '2022-04-01 09:25:14', NULL),
(5, 'doa ketika turun hujan', '2022-04-01 09:26:12', '2022-04-01 09:27:02', NULL),
(8, 'doa baru', '2022-04-06 10:53:35', '2022-04-06 10:53:35', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dhadits`
--

CREATE TABLE `dhadits` (
  `dhadits_id` bigint(20) UNSIGNED NOT NULL,
  `nama_hadits` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `dhadits`
--

INSERT INTO `dhadits` (`dhadits_id`, `nama_hadits`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'hadits berkata baik', '2022-03-29 08:09:22', '2022-03-29 08:09:22', NULL),
(2, 'hadits sesama muslim', '2022-03-29 08:09:22', '2022-03-29 08:09:22', NULL),
(3, 'hadits indahnya berbagi', '2022-03-29 08:10:03', '2022-03-29 08:10:03', NULL),
(4, 'hadits tentang malu', '2022-03-29 08:10:03', '2022-03-31 14:23:05', NULL),
(5, 'hadits tentang zakat', '2022-03-29 08:10:03', '2022-03-29 08:10:03', NULL),
(6, 'hadits tentang puasa\r\n', '2022-03-29 08:10:03', '2022-03-29 08:10:03', NULL),
(7, 'hadits berbuat baiks', '2022-03-31 11:48:36', '2022-04-01 08:36:49', NULL),
(8, 'hadits tentang kedua orang tua', '2022-03-31 11:50:12', '2022-03-31 11:50:12', NULL),
(9, 'hadits tentang keindahan', '2022-03-31 11:51:43', '2022-03-31 11:51:43', NULL),
(10, 'hadits tentang menutup aurat', '2022-03-31 11:52:42', '2022-03-31 11:52:42', NULL),
(11, 'hadits tentang sebaik-baiknya manusia', '2022-03-31 11:53:00', '2022-03-31 11:53:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `doa`
--

CREATE TABLE `doa` (
  `doa_id` bigint(20) UNSIGNED NOT NULL,
  `tglLulus` date NOT NULL,
  `predikat` varchar(100) NOT NULL,
  `santri_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `doa`
--

INSERT INTO `doa` (`doa_id`, `tglLulus`, `predikat`, `santri_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2022-04-04', 'luluss', 6, '2022-04-18 07:48:20', '2022-05-12 19:46:49', NULL),
(5, '2022-04-14', 'lulus', 3, '2022-04-20 08:56:52', '2022-04-20 09:07:50', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hadits`
--

CREATE TABLE `hadits` (
  `hadits_id` bigint(20) UNSIGNED NOT NULL,
  `tglLulus` date NOT NULL,
  `predikat` varchar(100) NOT NULL,
  `santri_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `hadits`
--

INSERT INTO `hadits` (`hadits_id`, `tglLulus`, `predikat`, `santri_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '2022-04-05', 'lulus', 1, '2022-04-19 22:37:48', '2022-04-20 09:23:16', NULL),
(4, '2022-04-05', 'lulus', 3, '2022-04-20 09:22:56', '2022-04-20 09:23:03', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepsek`
--

CREATE TABLE `kepsek` (
  `kepsek_id` bigint(20) UNSIGNED NOT NULL,
  `nik_kepsek` varchar(20) NOT NULL,
  `name_kepsek` varchar(100) NOT NULL,
  `gender` enum('man','woman') NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lhr` text NOT NULL,
  `status_kepsek` enum('actived','nonActived') NOT NULL DEFAULT 'actived',
  `gelar` enum('D3','S1') NOT NULL DEFAULT 'S1',
  `lulusan` varchar(100) NOT NULL,
  `phone_kepsek` varchar(15) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kepsek`
--

INSERT INTO `kepsek` (`kepsek_id`, `nik_kepsek`, `name_kepsek`, `gender`, `alamat`, `tgl_lahir`, `tempat_lhr`, `status_kepsek`, `gelar`, `lulusan`, `phone_kepsek`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, '131313', 'name kepsekolah', 'man', 'alamat', '2022-04-06', 'ad', 'actived', 'S1', '13', '131133', '2022-04-19 10:40:35', '2022-05-12 20:40:04', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mdoa`
--

CREATE TABLE `mdoa` (
  `mdoa_id` bigint(20) UNSIGNED NOT NULL,
  `santri_id` bigint(20) UNSIGNED NOT NULL,
  `ddoa_id` bigint(20) UNSIGNED NOT NULL,
  `dtgl_ujian` date NOT NULL,
  `predikat` varchar(100) NOT NULL,
  `penguji_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mdoa`
--

INSERT INTO `mdoa` (`mdoa_id`, `santri_id`, `ddoa_id`, `dtgl_ujian`, `predikat`, `penguji_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 3, '2022-04-08', 'lulus', 1, '2022-04-20 09:15:38', '2022-04-22 16:26:47', NULL),
(4, 1, 4, '2022-04-07', 'lulus', 2, '2022-04-20 09:15:55', '2022-04-22 16:26:25', NULL),
(7, 1, 1, '2022-04-06', 'lulus', 2, '2022-04-22 16:33:26', '2022-04-22 16:33:26', NULL),
(9, 6, 1, '2022-04-06', 'oku', 2, '2022-04-23 11:56:24', '2022-04-23 11:56:24', NULL),
(10, 3, 1, '2022-03-31', 'lulus', 2, '2022-04-26 22:22:52', '2022-04-26 22:22:52', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhadits`
--

CREATE TABLE `mhadits` (
  `Mhadits_id` bigint(20) UNSIGNED NOT NULL,
  `santri_id` bigint(20) UNSIGNED NOT NULL,
  `dhadits_id` bigint(20) UNSIGNED NOT NULL,
  `htgl_ujian` date NOT NULL,
  `predikat` varchar(100) NOT NULL,
  `penguji_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mhadits`
--

INSERT INTO `mhadits` (`Mhadits_id`, `santri_id`, `dhadits_id`, `htgl_ujian`, `predikat`, `penguji_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 1, '2022-04-12', 'lulus', 2, '2022-04-19 06:34:36', '2022-04-20 09:13:20', NULL),
(2, 6, 2, '2022-04-05', 'lulus', 2, '2022-04-19 06:34:53', '2022-04-19 06:34:53', NULL),
(3, 6, 3, '2022-04-06', 'lulus', 2, '2022-04-19 06:35:15', '2022-04-19 06:35:15', NULL),
(4, 6, 4, '2022-04-12', 'lulus', 2, '2022-04-19 06:35:59', '2022-04-19 06:35:59', NULL),
(5, 6, 5, '2022-04-13', 'lulus', 2, '2022-04-19 06:39:13', '2022-04-19 06:39:13', NULL),
(6, 1, 1, '2022-04-04', 'lulus', 2, '2022-04-19 07:32:47', '2022-04-21 09:24:49', NULL),
(8, 6, 1, '2022-04-14', 'lulus', 2, '2022-04-20 09:10:48', '2022-04-20 09:13:06', NULL),
(9, 6, 6, '2022-03-31', 'lulus', 1, '2022-04-21 08:50:20', '2022-04-21 08:50:20', NULL),
(10, 6, 7, '2022-04-14', 'lulus', 2, '2022-04-21 08:50:39', '2022-04-21 08:50:39', NULL),
(14, 1, 2, '2022-04-08', 'lulus', 1, '2022-04-21 09:21:46', '2022-04-21 09:24:20', NULL),
(15, 1, 3, '2022-04-06', 'lulus', 1, '2022-04-21 09:43:48', '2022-04-21 09:43:48', NULL),
(16, 9, 2, '2022-03-29', 'lulus', 2, '2022-04-26 23:32:07', '2022-04-26 23:32:22', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(18, '2022-02-28-123606', 'App\\Database\\Migrations\\Santri', 'default', 'App', 1646581362, 1),
(19, '2022-03-04-020734', 'App\\Database\\Migrations\\Createuser', 'default', 'App', 1646581362, 2),
(21, '2022-03-06-142713', 'App\\Database\\Migrations\\Teacher', 'default', 'App', 1646581483, 3),
(35, '2022-03-15-102012', 'App\\Database\\Migrations\\Penguji', 'default', 'App', 1647358110, 4),
(40, '2022-03-10-011747', 'App\\Database\\Migrations\\Surah', 'default', 'App', 1647390252, 5),
(50, '2022-03-28-135750', 'App\\Database\\Migrations\\Kepsek', 'default', 'App', 1648476780, 8),
(52, '2022-03-28-135801', 'App\\Database\\Migrations\\Staff', 'default', 'App', 1648476867, 9),
(58, '2022-03-29-042043', 'App\\Database\\Migrations\\Datahadits', 'default', 'App', 1648533989, 10),
(62, '2022-04-01-015215', 'App\\Database\\Migrations\\Ddoa', 'default', 'App', 1648778021, 11),
(70, '2022-04-01-025513', 'App\\Database\\Migrations\\Masterdoa', 'default', 'App', 1650024412, 13),
(71, '2022-03-29-025232', 'App\\Database\\Migrations\\Masterhadits', 'default', 'App', 1650241052, 12),
(74, '2022-03-24-021701', 'App\\Database\\Migrations\\Doa', 'default', 'App', 1650242674, 7),
(76, '2022-03-16-021628', 'App\\Database\\Migrations\\Hadits', 'default', 'App', 1650243599, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penguji`
--

CREATE TABLE `penguji` (
  `penguji_id` bigint(20) UNSIGNED NOT NULL,
  `nama_penguji` varchar(20) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `penguji`
--

INSERT INTO `penguji` (`penguji_id`, `nama_penguji`, `jk`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ust. muhammad bahri', 'L', '2022-03-15 22:29:04', '2022-03-16 21:55:58', NULL),
(2, 'ust rizki utama', 'L', '2022-03-16 07:16:07', '2022-03-16 09:00:20', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `santri`
--

CREATE TABLE `santri` (
  `santri_id` bigint(20) UNSIGNED NOT NULL,
  `nik_santri` varchar(20) NOT NULL,
  `name_santri` varchar(100) NOT NULL,
  `gender` enum('man','woman') NOT NULL,
  `agama` enum('islam','kristen','katolik','hindu','budha') NOT NULL DEFAULT 'islam',
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lhr` text NOT NULL,
  `statusSantri` enum('0','1') NOT NULL,
  `photos` varchar(70) DEFAULT NULL,
  `nik_ibu` varchar(20) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL,
  `status_ibu` varchar(100) NOT NULL,
  `phoneIbu` varchar(15) NOT NULL,
  `nik_ayah` varchar(20) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `pekerjaan_ayah` varchar(100) NOT NULL,
  `status_ayah` varchar(100) NOT NULL,
  `phoneAyah` varchar(15) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `santri`
--

INSERT INTO `santri` (`santri_id`, `nik_santri`, `name_santri`, `gender`, `agama`, `alamat`, `tgl_lahir`, `tempat_lhr`, `statusSantri`, `photos`, `nik_ibu`, `nama_ibu`, `pekerjaan_ibu`, `status_ibu`, `phoneIbu`, `nik_ayah`, `nama_ayah`, `pekerjaan_ayah`, `status_ayah`, `phoneAyah`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '111', 'muhammad al-gifary', 'man', 'islam', 'adad', '2022-03-16', 'ada', '1', 'santri 1-30-03-2022-1648614629_0b74dbbae0b95cb7370a.jpeg', '123', 'ad', 'ad', 'ada', '13', '1', 'ad', 'ad', 'ad', '13', '2022-03-30 11:30:29', '2022-05-12 19:59:58', NULL),
(2, '112', 'santri 2', 'man', 'islam', 'ad', '2022-03-10', 'ad', '1', 'default.png', '1313', 'asd', 'ad', 'ad', '13', '13', 'ad', 'ad', 'da13', '1313', '2022-03-30 11:31:04', '2022-04-20 08:44:25', '2022-04-20 08:44:25'),
(3, '113', 'santri 3', 'woman', 'islam', 'adad', '2022-03-01', 'adad', '1', 'santri 3-20-04-2022-1650467052_a54bee7422fc0e9720ce.png', '131', 'ad', 'ada', 'ad', '131', '131', 'ad', 'ad', 'ad', '131', '2022-03-31 10:58:17', '2022-05-12 20:00:10', NULL),
(6, '131', 'new update', 'woman', 'islam', 'ada', '2022-04-10', 'ada', '1', 'new-08-04-2022-1649379960_285a36f4ad39f3b63a99.jpeg', '13', 'ads', 'ad', 'ad', '1', '1131', 'ad', 'a', 'a', '1', '2022-04-07 16:25:40', '2022-04-20 09:11:43', NULL),
(8, '122', 'santri 4', 'woman', 'islam', 'adada', '2022-03-29', 'ad', '1', 'default.png', '111', 'aaa', 'ada', 'ada', '1231', '132', 'ad', 'a', 'ad', '123', '2022-04-19 22:30:43', '2022-04-26 23:31:16', '2022-04-26 23:31:16'),
(9, '1211', 'santri 5', 'woman', 'islam', 'adad', '2022-04-04', 'ada', '0', 'default.png', '101', 'ada', 'ad', 'ad', '1313', '11', 'ada', 'as', 'ad', '12', '2022-04-19 22:37:22', '2022-05-12 21:37:36', NULL),
(14, '13112', 'restore santri 2', 'man', 'islam', 'adad', '2022-04-05', '1313', '1', 'default.png', '1313', 'ada', 'ad', 'a', '131', '113131', 'ad', 'ad', 'ad', '1311', '2022-04-20 08:05:16', '2022-04-26 20:33:27', '2022-04-26 20:33:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
--

CREATE TABLE `staff` (
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `nik_staff` varchar(20) NOT NULL,
  `name_staff` varchar(100) NOT NULL,
  `gender` enum('man','woman') NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lhr` text NOT NULL,
  `phone_staff` varchar(15) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `staff`
--

INSERT INTO `staff` (`staff_id`, `nik_staff`, `name_staff`, `gender`, `alamat`, `tgl_lahir`, `tempat_lhr`, `phone_staff`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '121414141', 'rizky adetya', 'man', 'pagar alam', '2022-03-01', 'pagar alam', '08131313', '2022-03-28 16:15:53', '2022-03-28 16:15:53', NULL),
(2, '18131313', 'staff news', 'woman', 'pagar alam', '2019-11-30', 'pagar alam', '09131313', '2022-04-05 19:13:25', '2022-04-05 22:08:14', NULL),
(5, '131', 'staff 3', 'man', 'alamat', '2018-09-28', 'ada', '3', '2022-05-12 21:51:29', '2022-05-12 21:51:29', NULL),
(6, '131131', 'staff 4', 'man', 'adad', '2022-05-10', 'ad', '1', '2022-05-12 21:51:49', '2022-05-12 21:51:49', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surah`
--

CREATE TABLE `surah` (
  `surah_id` bigint(20) UNSIGNED NOT NULL,
  `nama_surah` varchar(20) NOT NULL,
  `surah_ke` int(10) NOT NULL,
  `tgl_ujian` date NOT NULL,
  `predikat` varchar(100) NOT NULL,
  `santri_id` bigint(20) UNSIGNED NOT NULL,
  `penguji_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `surah`
--

INSERT INTO `surah` (`surah_id`, `nama_surah`, `surah_ke`, `tgl_ujian`, `predikat`, `santri_id`, `penguji_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'surah 1', 11, '2020-05-05', 'lulus', 6, 2, '2022-04-19 07:14:08', '2022-04-23 11:53:03', NULL),
(2, 'surah 1', 131, '2022-04-12', 'lulus', 3, 2, '2022-04-19 07:14:25', '2022-04-20 09:31:23', NULL),
(3, 'surah 2', 13, '2022-04-06', 'lulus', 6, 1, '2022-04-19 07:14:40', '2022-04-19 07:15:05', NULL),
(4, 'surah 2', 131, '2022-04-03', 'lulus', 6, 2, '2022-04-19 07:15:43', '2022-04-23 11:19:15', NULL),
(5, 'surah 3', 131, '2022-04-04', 'lulus', 6, 2, '2022-04-19 07:16:06', '2022-04-23 11:19:39', NULL),
(6, 'surah 3', 13, '2022-04-04', 'lulus', 6, 2, '2022-04-19 07:16:26', '2022-04-19 07:16:26', NULL),
(8, 'surah 4', 130, '2022-04-04', 'lulus', 1, 2, '2022-04-19 07:26:12', '2022-04-26 22:29:15', NULL),
(10, 'surah 5', 112, '2022-04-05', 'lulus', 6, 1, '2022-04-20 08:29:34', '2022-04-23 11:22:15', NULL),
(12, 'surah 64', 111, '2022-04-12', 'lulus`', 1, 1, '2022-04-21 08:14:17', '2022-05-12 19:43:53', NULL),
(14, 'tes surah', 111, '2018-10-28', 'lulus', 3, 1, '2022-04-23 07:24:42', '2022-04-23 07:24:42', NULL),
(15, 'al-baqarah', 1313, '2019-09-26', 'oke', 3, 1, '2022-04-26 20:35:26', '2022-04-26 20:35:26', NULL),
(16, 'surah 6', 131, '2022-04-10', 'lulus', 6, 1, '2022-04-26 22:35:51', '2022-04-26 22:35:51', NULL),
(17, 'surah 3', 111, '2022-05-03', 'baik', 1, 2, '2022-05-12 20:02:08', '2022-05-12 20:02:08', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `nik_teacher` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('man','woman') NOT NULL,
  `agama` enum('islam','kristen','katolik','hindu','budha') NOT NULL DEFAULT 'islam',
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lhr` text NOT NULL,
  `foto` varchar(70) DEFAULT NULL,
  `telp` varchar(15) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `nik_teacher`, `name`, `gender`, `agama`, `alamat`, `tgl_lahir`, `tempat_lhr`, `foto`, `telp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1812121243123123', 'guru 1', 'woman', 'islam', 'alamat', '2022-02-28', 'ada new\r\n', 'guru 1-09-03-2022-1646797565_eb5e8b1c80e0f1d95ca9.jpeg', '081313', '2022-03-09 10:46:05', '2022-04-08 10:59:12', NULL),
(2, '1812121243123125', 'guru 2', 'man', 'islam', 'pagar alam', '2022-03-01', 'tempat', 'default.png', '081318313', '2022-03-09 10:48:32', '2022-04-08 10:59:15', NULL),
(4, '1313141', 'guru newss', 'man', 'islam', 'pagar alam', '2022-11-29', 'pagar alam', 'guru new-21-03-2022-1647827230_1afb4076783d1329f89c.jpeg', '0813131', '2022-03-21 08:47:10', '2022-05-12 19:57:22', NULL),
(12, '11111', 'aad', 'man', 'islam', '11', '2022-03-29', '1', 'default.png', '1', '2022-04-19 09:46:53', '2022-04-19 10:44:51', '2022-04-19 10:44:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `oauth_id` varchar(100) NOT NULL,
  `nameUser` varchar(150) NOT NULL,
  `emailUser` varchar(100) NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `phoneUser` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `roleUser` enum('adminsuper','staff','kepsek','walisantri') NOT NULL DEFAULT 'walisantri',
  `agent` varchar(255) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `platform` varchar(100) NOT NULL,
  `isactive` enum('actived','nonActived') NOT NULL DEFAULT 'nonActived',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `oauth_id`, `nameUser`, `emailUser`, `picture`, `phoneUser`, `password`, `roleUser`, `agent`, `browser`, `mobile`, `platform`, `isactive`, `created_at`, `updated_at`) VALUES
(1, '113097448093627629922', 'apdy 0997', 'apdy0997@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14GgCQLN2FyQBqaoGdhWqdpGFamkPoEU4mXrWIgad=s96-c', '', '$2y$10$ySUCZ1Mz.VQtvl.aTG8C2Oe7ORE6anM1FLirc5yLbrOmMUm9vNgW6', 'adminsuper', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Chrome', '', 'Windows 10', 'actived', '2022-04-14 08:07:14', '2022-06-06 07:35:56'),
(2, '109441949320449939195', 'apdy tv', 'apdy1997@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14GjpzIwZXx-knaAoE51YDEM7CoePGwKyovYsi-sM=s96-c', '', '$2y$10$zHvbsbPnheDq6v4iQ.Vi9.4EB8YUU/KYZUfQOo6kmnjDGsyJocbkq', 'staff', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Chrome', '', 'Windows 10', 'actived', '2022-04-14 08:21:18', '2022-06-06 07:38:59'),
(4, '101241444030148942302', 'MA Tahfidz', 'matahfidz1@gmail.com', 'https://lh3.googleusercontent.com/a/AATXAJwYRm9iL6NLpzoKHssw0UbkIV5tX9FfEeyjvQs=s96-c', '08', '$2y$10$93vV2CTQJUc9sY94HinxXek0B.SEDEF4EXw7FAAQ8TALNSQfYFF7m', 'kepsek', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Chrome', '', 'Windows 10', 'actived', '2022-05-12 20:05:08', '2022-06-06 07:39:36'),
(7, '110942845179305178166', 'psb daarulkutub', 'psbdaarulkutub@gmail.com', 'https://lh3.googleusercontent.com/a/AATXAJzUkw7c_n7qZ9WZbcV73i183h47j8Etjd1Q24ab=s96-c', '', '$2y$10$DcTYrjKaRlExF1CUPx8z2eu4WdFCgYHFoonRgXfLaHxil1nA8I8Pm', 'walisantri', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Chrome', '', 'Windows 10', 'actived', '2022-05-18 09:58:13', '2022-06-06 07:37:36');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ddoa`
--
ALTER TABLE `ddoa`
  ADD PRIMARY KEY (`ddoa_id`);

--
-- Indeks untuk tabel `dhadits`
--
ALTER TABLE `dhadits`
  ADD PRIMARY KEY (`dhadits_id`);

--
-- Indeks untuk tabel `doa`
--
ALTER TABLE `doa`
  ADD PRIMARY KEY (`doa_id`),
  ADD KEY `doa_santri_id_foreign` (`santri_id`);

--
-- Indeks untuk tabel `hadits`
--
ALTER TABLE `hadits`
  ADD PRIMARY KEY (`hadits_id`),
  ADD KEY `hadits_santri_id_foreign` (`santri_id`);

--
-- Indeks untuk tabel `kepsek`
--
ALTER TABLE `kepsek`
  ADD PRIMARY KEY (`kepsek_id`);

--
-- Indeks untuk tabel `mdoa`
--
ALTER TABLE `mdoa`
  ADD PRIMARY KEY (`mdoa_id`),
  ADD KEY `mdoa_santri_id_foreign` (`santri_id`),
  ADD KEY `mdoa_penguji_id_foreign` (`penguji_id`),
  ADD KEY `mdoa_ddoa_id_foreign` (`ddoa_id`);

--
-- Indeks untuk tabel `mhadits`
--
ALTER TABLE `mhadits`
  ADD PRIMARY KEY (`Mhadits_id`),
  ADD KEY `mhadits_santri_id_foreign` (`santri_id`),
  ADD KEY `mhadits_penguji_id_foreign` (`penguji_id`),
  ADD KEY `mhadits_dhadits_id_foreign` (`dhadits_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penguji`
--
ALTER TABLE `penguji`
  ADD PRIMARY KEY (`penguji_id`);

--
-- Indeks untuk tabel `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`santri_id`);

--
-- Indeks untuk tabel `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indeks untuk tabel `surah`
--
ALTER TABLE `surah`
  ADD PRIMARY KEY (`surah_id`),
  ADD KEY `surah_santri_id_foreign` (`santri_id`),
  ADD KEY `surah_penguji_id_foreign` (`penguji_id`);

--
-- Indeks untuk tabel `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ddoa`
--
ALTER TABLE `ddoa`
  MODIFY `ddoa_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `dhadits`
--
ALTER TABLE `dhadits`
  MODIFY `dhadits_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `doa`
--
ALTER TABLE `doa`
  MODIFY `doa_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `hadits`
--
ALTER TABLE `hadits`
  MODIFY `hadits_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kepsek`
--
ALTER TABLE `kepsek`
  MODIFY `kepsek_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `mdoa`
--
ALTER TABLE `mdoa`
  MODIFY `mdoa_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `mhadits`
--
ALTER TABLE `mhadits`
  MODIFY `Mhadits_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `penguji`
--
ALTER TABLE `penguji`
  MODIFY `penguji_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `santri`
--
ALTER TABLE `santri`
  MODIFY `santri_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `surah`
--
ALTER TABLE `surah`
  MODIFY `surah_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `doa`
--
ALTER TABLE `doa`
  ADD CONSTRAINT `doa_santri_id_foreign` FOREIGN KEY (`santri_id`) REFERENCES `santri` (`santri_id`);

--
-- Ketidakleluasaan untuk tabel `hadits`
--
ALTER TABLE `hadits`
  ADD CONSTRAINT `hadits_santri_id_foreign` FOREIGN KEY (`santri_id`) REFERENCES `santri` (`santri_id`);

--
-- Ketidakleluasaan untuk tabel `mdoa`
--
ALTER TABLE `mdoa`
  ADD CONSTRAINT `mdoa_ddoa_id_foreign` FOREIGN KEY (`ddoa_id`) REFERENCES `ddoa` (`ddoa_id`),
  ADD CONSTRAINT `mdoa_penguji_id_foreign` FOREIGN KEY (`penguji_id`) REFERENCES `penguji` (`penguji_id`),
  ADD CONSTRAINT `mdoa_santri_id_foreign` FOREIGN KEY (`santri_id`) REFERENCES `santri` (`santri_id`);

--
-- Ketidakleluasaan untuk tabel `mhadits`
--
ALTER TABLE `mhadits`
  ADD CONSTRAINT `mhadits_dhadits_id_foreign` FOREIGN KEY (`dhadits_id`) REFERENCES `dhadits` (`dhadits_id`),
  ADD CONSTRAINT `mhadits_penguji_id_foreign` FOREIGN KEY (`penguji_id`) REFERENCES `penguji` (`penguji_id`),
  ADD CONSTRAINT `mhadits_santri_id_foreign` FOREIGN KEY (`santri_id`) REFERENCES `santri` (`santri_id`);

--
-- Ketidakleluasaan untuk tabel `surah`
--
ALTER TABLE `surah`
  ADD CONSTRAINT `surah_penguji_id_foreign` FOREIGN KEY (`penguji_id`) REFERENCES `penguji` (`penguji_id`),
  ADD CONSTRAINT `surah_santri_id_foreign` FOREIGN KEY (`santri_id`) REFERENCES `santri` (`santri_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
