-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Sep 2021 pada 01.28
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banser`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `no_anggota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ranting_id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tg_badan` bigint(20) NOT NULL,
  `tp_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pkd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rekom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `user_id`, `no_anggota`, `ranting_id`, `nik`, `nama`, `tg_badan`, `tp_lahir`, `tgl_lahir`, `alamat`, `no_hp`, `pkd`, `rekom`, `kta`, `ktp`, `foto`, `created_at`, `updated_at`) VALUES
(2, 20, NULL, 6, '36154789546246', 'Muhamad Yusuf', 172, 'Banyuwangi', '1999-03-17', 'Lateng', '6282236734180', 'PKD1630242493.jpg', NULL, NULL, 'KTP1630242493.jpg', NULL, '2021-08-29 06:08:13', '2021-08-29 06:08:13'),
(3, 1, 'C.3624.876,6187', 1, '35012548796521', 'Yudha Pratama', 165, 'Banyuwangi', '1999-05-11', 'Pengantigan', '6282645351695', 'ufjasdkfhkl.jpg', NULL, NULL, NULL, NULL, '2021-08-29 17:00:00', '2021-08-29 17:00:00'),
(12, 23, NULL, 9, NULL, 'Ali Lukoni', 168, 'Banyuwangi', '1997-12-12', 'Tukang Kayu', '6282242840957', 'PKD1630465227.png', NULL, NULL, 'KTP1630465227.png', NULL, '2021-08-31 20:00:27', '2021-08-31 20:00:27'),
(13, NULL, NULL, 10, '36215424695755', 'Ahmad Syafi\'i', 169, 'Banyuwangi', '1997-12-15', 'Kabat', '6282242840957', 'PKD1630567743.jpg', NULL, NULL, 'KTP1630567743.png', NULL, '2021-09-02 00:29:03', '2021-09-02 00:29:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `anggota_id` bigint(20) UNSIGNED NOT NULL,
  `ranting_id` bigint(20) UNSIGNED NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama`, `tanggal`, `anggota_id`, `ranting_id`, `lokasi`, `foto`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Kegiatan A', '2021-08-25', 2, 7, 'Kertosari', 'KGT1630256178.jpg', 'Pembagian Bansos', '2021-08-29 09:56:18', '2021-08-29 09:56:18'),
(2, 'Kegiatan B', '2021-08-25', 3, 9, 'Tukang Kayu', 'KGT2021-08-25-1630341500.jpg', 'Penyaluran Bantuan Langsung Tunai', '2021-08-30 09:38:20', '2021-08-30 09:38:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_08_10_071119_create_ranting_table', 1),
(10, '2021_08_23_143603_create_proker_table', 3),
(13, '2021_08_13_144229_create_anggota_table', 4),
(15, '2021_08_29_132200_create_kegiatan_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `proker`
--

CREATE TABLE `proker` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ranting_id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `proker`
--

INSERT INTO `proker` (`id`, `nama`, `tanggal`, `lokasi`, `ranting_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Proker A', '2021-08-25', 'Kertosari', 7, 'Mengurusi Tentang Hal-hal yang berkaitan dengan hal A', '2021-08-23 22:26:19', '2021-08-23 22:26:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ranting`
--

CREATE TABLE `ranting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ranting`
--

INSERT INTO `ranting` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Pengantigan', '2021-08-10 04:54:13', '2021-08-10 04:54:13'),
(2, 'Singonegaran', '2021-08-10 05:14:39', '2021-08-10 05:14:39'),
(3, 'Pakis', '2021-08-10 05:14:47', '2021-08-10 05:14:47'),
(5, 'Kebalenan', '2021-08-10 05:15:06', '2021-08-10 05:15:06'),
(6, 'Lateng', '2021-08-10 05:15:12', '2021-08-10 05:15:12'),
(7, 'Kertosari', '2021-08-10 05:19:34', '2021-08-10 05:19:34'),
(9, 'Tukangkayu', '2021-08-10 09:15:10', '2021-08-10 09:15:10'),
(10, 'Kabat', '2021-08-10 09:15:22', '2021-08-10 09:15:22'),
(11, 'Karangrejo', '2021-08-10 09:15:32', '2021-08-10 09:15:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'yudha', 'yudha@gmail.com', NULL, '$2y$10$jPUfWgWpYRoTSwAkFRZFUu0eesqLZc8tEPnT1YcaMA8sLKqTyUjY6', 'caqkaXPQ52uL2b2wcX2tx7q8lIwdZ2UKAxtS1JFLE13lolY4xWpy8HZySUGC', '2021-08-09 23:07:32', '2021-08-09 23:07:32'),
(20, 'satkoryon', 'Muhamad Yusuf', 'yusuf@gmail.com', NULL, '$2y$10$gqAwFQF/KstLcDR1Zx28He0N8nC/z3dZjIvrp5329M3mzrgPb9FDu', '2hl39QaAg1Sw0xBMBWsl0fWGSjhViWCKFPWgiyImPrV4VHfrAzt9W2VOuKZY', '2021-08-29 06:08:13', '2021-08-29 06:08:13'),
(23, 'anggota', 'Ali Lukoni', 'ali.lukoni@gmail.com', NULL, '$2y$10$Lio8O.xpw5NT1TsXJGs86utx0yJdaMmIK0.R1MabI3GvHmxUU/sE2', 'QXCuib6j2pjutmPtVhDA6Ji5lZoSIUVK3mM3CZ3VhfcCNkmsyWuM5WAB1V9c', '2021-08-31 20:51:27', '2021-08-31 20:51:27');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggota_user_id_foreign` (`user_id`),
  ADD KEY `anggota_ranting_id_foreign` (`ranting_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kegiatan_ranting_id_foreign` (`ranting_id`),
  ADD KEY `kegiatan_anggota_id_foreign` (`anggota_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `proker`
--
ALTER TABLE `proker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proker_ranting_id_foreign` (`ranting_id`);

--
-- Indeks untuk tabel `ranting`
--
ALTER TABLE `ranting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `proker`
--
ALTER TABLE `proker`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ranting`
--
ALTER TABLE `ranting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ranting_id_foreign` FOREIGN KEY (`ranting_id`) REFERENCES `ranting` (`id`),
  ADD CONSTRAINT `anggota_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`),
  ADD CONSTRAINT `kegiatan_ranting_id_foreign` FOREIGN KEY (`ranting_id`) REFERENCES `ranting` (`id`);

--
-- Ketidakleluasaan untuk tabel `proker`
--
ALTER TABLE `proker`
  ADD CONSTRAINT `proker_ranting_id_foreign` FOREIGN KEY (`ranting_id`) REFERENCES `ranting` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
