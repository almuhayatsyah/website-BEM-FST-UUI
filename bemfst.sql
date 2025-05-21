-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2025 at 09:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bemfst`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `upload` varchar(255) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `deskripsi`, `upload`, `tgl_input`, `created_at`, `updated_at`) VALUES
(2, 'Ketua Umum Bem Fst Ubudiyah ', 'Lilwa Ulhamdhi terpillih sebagai Ketua Bem fst 2024/2025', '1747597589_70d2058aa51d9877fc39.jpg', '2025-05-18', '2025-05-18 12:46:29', '2025-05-18 12:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `upload` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tgl_input` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hubungi_kami`
--

CREATE TABLE `hubungi_kami` (
  `id` int(11) NOT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `tiktok` varchar(50) DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hubungi_kami`
--

INSERT INTO `hubungi_kami` (`id`, `instagram`, `tiktok`, `whatsapp`, `created_at`, `updated_at`) VALUES
(1, '@almuhayats_', '@123', '08154452627', '2025-05-15 16:51:40', '2025-05-15 16:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `attempt_time` datetime NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-03-21-000000', 'App\\Database\\Migrations\\AddLastLoginToUsers', 'default', 'App', 1745917077, 1),
(2, '2025-05-01-193734', 'App\\Database\\Migrations\\CreateLoginAttemptsTable', 'default', 'App', 1746128299, 2);

-- --------------------------------------------------------

--
-- Table structure for table `program_kerja`
--

CREATE TABLE `program_kerja` (
  `id` int(11) NOT NULL,
  `nama_program_kerja` varchar(50) NOT NULL,
  `tujuan_kegiatan` varchar(500) DEFAULT NULL,
  `sasaran` varchar(50) DEFAULT NULL,
  `target_pelaksanaan` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_kerja`
--

INSERT INTO `program_kerja` (`id`, `nama_program_kerja`, `tujuan_kegiatan`, `sasaran`, `target_pelaksanaan`, `keterangan`, `created_at`, `updated_at`) VALUES
(4, ' Leadercamp IV', 'Untuk menciptakan mahasiswa yang mengetahui peran dan arah gerak kontribusi yang bisa di lakukan oleh seorang mahasiswa baik wilayah pendidikan maupun kepemimpinan.\r\nAgar   peserta  Saintek Leadership Camp IV mengetahui urgensi dan peran strategis seorang pemimpindanmahasiswa.\r\nSebagai salah satu sarana mencetak para pemimpin organisasi mahasiswa Fakultas Sains  dan Teknologi Universitas Ubudiyah Indonesia\r\n', 'mahasiswa fst', ' Desember 2024', 'Terlaksana\r\n', '2025-05-18 07:05:52', '2025-05-18 07:14:36'),
(5, 'Seminar Leadership', 'Membangun mental yang baik untuk membangun organisasi kedepannya', 'Mahasiswa fakultas sains dan teknologi', 'Desember / Januari 2024', 'Belum Terlaksana', '2025-05-18 11:57:51', '2025-05-18 11:57:51'),
(7, 'Eiusmod nisi dolor n', 'Sint at laborum Et ', 'Amet soluta non ali', 'Qui aut explicabo Q', 'Ullam laborum explic', '2025-05-20 01:29:38', '2025-05-20 01:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `sejarah`
--

CREATE TABLE `sejarah` (
  `id` int(11) NOT NULL,
  `sejarah` varchar(255) NOT NULL,
  `upload_logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `struktur_organisasi`
--

CREATE TABLE `struktur_organisasi` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `divisi` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `struktur_organisasi`
--

INSERT INTO `struktur_organisasi` (`id`, `gambar`, `nama`, `jabatan`, `divisi`, `created_at`, `updated_at`) VALUES
(16, '1747738676_0a5f8b99a4363d1ed699.jpg', 'Lilwa Ulhamdhi', 'Ketua Umum', 'Dewan Pengurus Harian', '2025-05-20 03:57:56', '2025-05-20 03:57:56'),
(17, '1747738708_a38799fccf834d6520ff.png', 'Almuhayatsyah', 'Sekretaris Jendral', 'Dewan Pengurus Harian', '2025-05-20 03:58:28', '2025-05-20 03:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('super_admin','admin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`, `created_at`, `updated_at`, `last_login`) VALUES
(1, 'superadmin@gmail.com', '$2y$10$UUz82S/.VwJ82sEqvyC51epj6JhMGkrUrXm5B5nPf2TeLSK2ydZRO', 'super_admin', '2025-04-28 19:43:49', '2025-04-28 21:02:00', NULL),
(3, 'hamdi@gmail.com', '$2y$10$ZuFClnksOxn4yufhwIjQaOz8EHBXWUrpOmAvVAzKSD.VNNXQL6PEq', 'super_admin', '2025-04-28 14:34:40', '2025-04-29 02:00:53', '2025-04-29 09:00:53'),
(8, 'ayat', '$2y$10$1FUpkfO0lOmCK7qet22JCOxui8T3s/riaD.Omy9JoKp9qpCPrKdQe', 'super_admin', '2025-04-29 02:56:31', '2025-04-29 02:56:31', NULL),
(9, 'hehe', '$2y$10$jAGvImNsKehhgpfv2RTvTu5TxWKsvRAJ6KvEOGHXCo/WWRl7hf.V.', 'admin', '2025-04-29 03:05:12', '2025-04-29 10:07:17', NULL),
(11, 'ayat12345', '$2y$10$WVPevdaifOGKZZcipkJhdOqjWT5dNRoaAEYFO17fmoebYo0/jfxKK', 'super_admin', '2025-05-01 05:41:18', '2025-05-01 05:41:18', NULL),
(14, 'haii', '$2y$10$BDF1Y5j3C/ux1MytjRi78.nkuczY8HlaMUc2SSj6H424Bz.pRfFvi', 'admin', '2025-05-01 08:12:14', '2025-05-01 08:12:14', NULL),
(15, 'superadmin1@gmail.com', '$2y$10$9gMeZ0yWqTHiUrK3KaGr0.iFUa99p3Ro0jOwfCFNvdmiUa8MeR9F2', 'super_admin', '2025-05-09 11:39:35', '2025-05-09 11:39:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visi_misi`
--

CREATE TABLE `visi_misi` (
  `id` int(11) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hubungi_kami`
--
ALTER TABLE `hubungi_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_kerja`
--
ALTER TABLE `program_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sejarah`
--
ALTER TABLE `sejarah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hubungi_kami`
--
ALTER TABLE `hubungi_kami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `program_kerja`
--
ALTER TABLE `program_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sejarah`
--
ALTER TABLE `sejarah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
