-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2020 at 06:06 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ibima`
--

-- --------------------------------------------------------

--
-- Table structure for table `downloadable`
--

CREATE TABLE `downloadable` (
  `id` varchar(150) NOT NULL,
  `file_modul` varchar(150) NOT NULL,
  `id_modul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exclusive`
--

CREATE TABLE `exclusive` (
  `id` varchar(255) NOT NULL,
  `file_modul` varchar(255) NOT NULL,
  `id_modul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image`, `name`) VALUES
('hdjahdkahdkahdk', 'laravel_end_point_image.png'),
('hdjahdkahdssdkahdk', 'laravel_end_point_image.png'),
('hdjahdkahdssdlkjkahdk', 'laravel_end_point_image.png');

-- --------------------------------------------------------

--
-- Table structure for table `image_paket`
--

CREATE TABLE `image_paket` (
  `id` varchar(10) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `image_produk`
--

CREATE TABLE `image_produk` (
  `id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `image_triaining`
--

CREATE TABLE `image_triaining` (
  `image` varchar(150) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(11) NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(11) NOT NULL,
  `id_produk` varchar(20) NOT NULL,
  `nama_modul` varchar(30) NOT NULL,
  `file_modul` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id` varchar(10) NOT NULL,
  `nama_paket` varchar(20) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `zoom` tinyint(1) NOT NULL,
  `max_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `nama_paket`, `deskripsi`, `harga`, `zoom`, `max_user`) VALUES
('1', 'Paket 1', 'Ini Adalah Paket 1', 2000000, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `paket_max`
--

CREATE TABLE `paket_max` (
  `paket_id` varchar(10) NOT NULL,
  `max` int(11) DEFAULT NULL,
  `harga` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paket_topik`
--

CREATE TABLE `paket_topik` (
  `id` varchar(20) NOT NULL,
  `paket_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` varchar(150) NOT NULL,
  `users_id` int(11) NOT NULL,
  `bukti_pembayaran` varchar(150) DEFAULT NULL,
  `status_pembayaran` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `users_id`, `bukti_pembayaran`, `status_pembayaran`) VALUES
('b3975b05-43d1-4dcc-a482-8418644bcc86', 1, '098f6bcd4621d373cade4e832627b4f6.png', 'yes'),
('d8c22d63-6dea-46d0-874b-d19ef424f3dc', 2, '098f6bcd4621d373cade4e832627b4f6.png', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_paket`
--

CREATE TABLE `pembelian_paket` (
  `id_pembelian` varchar(100) NOT NULL,
  `id` varchar(10) NOT NULL,
  `list_email` varchar(255) NOT NULL,
  `pembelian_id_pembelian` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `status_pembayaran` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_paket`
--

INSERT INTO `pembelian_paket` (`id_pembelian`, `id`, `list_email`, `pembelian_id_pembelian`, `created_at`, `bukti_pembayaran`, `status_pembayaran`) VALUES
('8c8fb743-089e-4f93-87a4-8a48d545812d', '1', 'email1@gmail.com,email2@gmail.com,email3@gmail.com,email4@gmail.com', 'b3975b05-43d1-4dcc-a482-8418644bcc86', '2020-06-30 17:00:00', 'testsaja.png', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian` varchar(100) NOT NULL,
  `id_produk` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `pembelian_id_pembelian` varchar(150) NOT NULL,
  `bukti_pembayaran` varchar(100) DEFAULT NULL,
  `status_pembayaran` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian`, `id_produk`, `created_at`, `pembelian_id_pembelian`, `bukti_pembayaran`, `status_pembayaran`) VALUES
('8c8fb743-089e-4f93-87a4-8a48d545812d', '1', '2020-07-01 00:00:00', 'b3975b05-43d1-4dcc-a482-8418644bcc86', NULL, 'no'),
('ajdkahdkhadjshk', '1', '2020-07-15 00:00:00', 'b3975b05-43d1-4dcc-a482-8418644bcc86', 'ajdhkajhdkasd.png', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` varchar(150) NOT NULL,
  `quiz_id` varchar(20) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option` varchar(150) NOT NULL,
  `answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `quiz_id`, `question`, `option`, `answer`) VALUES
('5d8b1f439328946758c2baec62b9e45a', '1', 'Contoh Pertanyaan Untuk Quiz Topik Satu', '[Jawaban 1,Jawaban 2,Jawaban 3,Jawaban Update]', 'Jawaban 1');

-- --------------------------------------------------------

--
-- Table structure for table `question_image`
--

CREATE TABLE `question_image` (
  `image` varchar(150) NOT NULL,
  `id` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` varchar(20) NOT NULL,
  `soal` varchar(255) NOT NULL,
  `expiration` varchar(10) NOT NULL,
  `total_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `soal`, `expiration`, `total_question`) VALUES
('1', 'Soal Untuk Quiz Topik Satu', '1', 4);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_session`
--

CREATE TABLE `quiz_session` (
  `id_session` varchar(150) NOT NULL,
  `starting_time` datetime NOT NULL,
  `wrong_count` int(11) NOT NULL,
  `correct_count` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `quiz_id` varchar(20) NOT NULL,
  `certificate` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_session`
--

INSERT INTO `quiz_session` (`id_session`, `starting_time`, `wrong_count`, `correct_count`, `score`, `id`, `quiz_id`, `certificate`) VALUES
('akjhdkjhdhkdhkskd', '2020-07-01 00:00:00', 1, 3, 33, 1, '1', 'linksertifikat_endpoint_laravel.png');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `idruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(45) DEFAULT NULL,
  `link_zoom` varchar(100) DEFAULT NULL,
  `informasi` varchar(255) DEFAULT NULL,
  `topik_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`idruangan`, `nama_ruangan`, `link_zoom`, `informasi`, `topik_id`) VALUES
(1, 'OJD', 'https://zooom.com/hshshshshsh', 'Ini Informasi Ruangan Tersebut Update', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id` varchar(20) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

CREATE TABLE `topik` (
  `id` varchar(20) NOT NULL,
  `nama_topik` varchar(150) NOT NULL,
  `deskripsi_topik` varchar(255) NOT NULL,
  `thumbnail` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `zoom` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topik`
--

INSERT INTO `topik` (`id`, `nama_topik`, `deskripsi_topik`, `thumbnail`, `harga`, `zoom`) VALUES
('1', 'Topik Satu', 'Ini adalah Topik 1', 'thumbnail.png', 7000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad Zaitun', 'user1@gmail.com', '$2y$12$PN3UTdSIwSayV9pmjJg/F.uqzdaPhaUl8piGYNoiHEUK9v57mggSO', NULL, NULL, NULL),
(2, 'Umram Maimar', 'user2@gmail.com', '$2y$12$PN3UTdSIwSayV9pmjJg/F.uqzdaPhaUl8piGYNoiHEUK9v57mggSO', NULL, '2020-07-29 00:00:00', '2020-07-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_modul`
--

CREATE TABLE `user_modul` (
  `id` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `status_penyelesaian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_topik`
--

CREATE TABLE `user_topik` (
  `id` int(11) NOT NULL,
  `jumlah_percobaan` varchar(45) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `topik_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `nama_video` varchar(30) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `downloadable`
--
ALTER TABLE `downloadable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_downloadable_modul1_idx` (`id_modul`);

--
-- Indexes for table `exclusive`
--
ALTER TABLE `exclusive`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_exclusive_modul1_idx` (`id_modul`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image`);

--
-- Indexes for table `image_paket`
--
ALTER TABLE `image_paket`
  ADD PRIMARY KEY (`id`,`image`),
  ADD KEY `image_image_paket_fk` (`image`);

--
-- Indexes for table `image_produk`
--
ALTER TABLE `image_produk`
  ADD KEY `image_image_produk_fk` (`image`);

--
-- Indexes for table `image_triaining`
--
ALTER TABLE `image_triaining`
  ADD PRIMARY KEY (`image`,`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`),
  ADD KEY `produk_modul_fk` (`id_produk`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket_max`
--
ALTER TABLE `paket_max`
  ADD KEY `fk_paket_max_paket1_idx` (`paket_id`);

--
-- Indexes for table `paket_topik`
--
ALTER TABLE `paket_topik`
  ADD PRIMARY KEY (`id`,`paket_id`),
  ADD KEY `paket_paket_produk_fk` (`paket_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `fk_pembelia_users1_idx` (`users_id`);

--
-- Indexes for table `pembelian_paket`
--
ALTER TABLE `pembelian_paket`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `paket_pembelian_paket_fk` (`id`),
  ADD KEY `fk_pembelian_paket_pembelian1_idx` (`pembelian_id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `produk_pembelian_produk_fk` (`id_produk`),
  ADD KEY `fk_pembelian_produk_pembelian1_idx` (`pembelian_id_pembelian`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_question_fk` (`quiz_id`);

--
-- Indexes for table `question_image`
--
ALTER TABLE `question_image`
  ADD PRIMARY KEY (`image`,`id`),
  ADD KEY `question_question_image_fk` (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_session`
--
ALTER TABLE `quiz_session`
  ADD PRIMARY KEY (`id_session`),
  ADD KEY `users_quiz_session_fk` (`id`),
  ADD KEY `quiz_quiz_session_fk` (`quiz_id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`idruangan`),
  ADD KEY `fk_ruangan_topik1_idx` (`topik_id`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id`,`users_id`),
  ADD KEY `users_sertifikat_fk` (`users_id`);

--
-- Indexes for table `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- Indexes for table `user_modul`
--
ALTER TABLE `user_modul`
  ADD PRIMARY KEY (`id`,`id_modul`),
  ADD KEY `modul_user_modul_fk` (`id_modul`);

--
-- Indexes for table `user_topik`
--
ALTER TABLE `user_topik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_topik_users1_idx` (`users_id`),
  ADD KEY `fk_user_topik_topik1_idx` (`topik_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `modul_video_fk` (`id_modul`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `idruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `user_modul`
--
ALTER TABLE `user_modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_topik`
--
ALTER TABLE `user_topik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `downloadable`
--
ALTER TABLE `downloadable`
  ADD CONSTRAINT `fk_downloadable_modul1` FOREIGN KEY (`id_modul`) REFERENCES `modul` (`id_modul`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `exclusive`
--
ALTER TABLE `exclusive`
  ADD CONSTRAINT `fk_exclusive_modul1` FOREIGN KEY (`id_modul`) REFERENCES `modul` (`id_modul`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `image_paket`
--
ALTER TABLE `image_paket`
  ADD CONSTRAINT `image_image_paket_fk` FOREIGN KEY (`image`) REFERENCES `image` (`image`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `paket_image_paket_fk` FOREIGN KEY (`id`) REFERENCES `paket` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `image_produk`
--
ALTER TABLE `image_produk`
  ADD CONSTRAINT `image_image_produk_fk` FOREIGN KEY (`image`) REFERENCES `image` (`image`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `image_triaining`
--
ALTER TABLE `image_triaining`
  ADD CONSTRAINT `image_image_triaining_fk` FOREIGN KEY (`image`) REFERENCES `image` (`image`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `modul`
--
ALTER TABLE `modul`
  ADD CONSTRAINT `produk_modul_fk` FOREIGN KEY (`id_produk`) REFERENCES `topik` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `paket_max`
--
ALTER TABLE `paket_max`
  ADD CONSTRAINT `fk_paket_max_paket1` FOREIGN KEY (`paket_id`) REFERENCES `paket` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `paket_topik`
--
ALTER TABLE `paket_topik`
  ADD CONSTRAINT `paket_paket_produk_fk` FOREIGN KEY (`paket_id`) REFERENCES `paket` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `produk_paket_produk_fk` FOREIGN KEY (`id`) REFERENCES `topik` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `fk_pembelia_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembelian_paket`
--
ALTER TABLE `pembelian_paket`
  ADD CONSTRAINT `fk_pembelian_paket_pembelian1` FOREIGN KEY (`pembelian_id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `paket_pembelian_paket_fk` FOREIGN KEY (`id`) REFERENCES `paket` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD CONSTRAINT `fk_pembelian_produk_pembelian1` FOREIGN KEY (`pembelian_id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `produk_pembelian_produk_fk` FOREIGN KEY (`id_produk`) REFERENCES `topik` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `quiz_question_fk` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question_image`
--
ALTER TABLE `question_image`
  ADD CONSTRAINT `image_question_image_fk` FOREIGN KEY (`image`) REFERENCES `image` (`image`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `question_question_image_fk` FOREIGN KEY (`id`) REFERENCES `question` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `produk_quiz_fk` FOREIGN KEY (`id`) REFERENCES `topik` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `quiz_session`
--
ALTER TABLE `quiz_session`
  ADD CONSTRAINT `quiz_quiz_session_fk` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_quiz_session_fk` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD CONSTRAINT `fk_ruangan_topik1` FOREIGN KEY (`topik_id`) REFERENCES `topik` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD CONSTRAINT `produk_sertifikat_fk` FOREIGN KEY (`id`) REFERENCES `topik` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_sertifikat_fk` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_modul`
--
ALTER TABLE `user_modul`
  ADD CONSTRAINT `modul_user_modul_fk` FOREIGN KEY (`id_modul`) REFERENCES `modul` (`id_modul`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_user_modul_fk` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_topik`
--
ALTER TABLE `user_topik`
  ADD CONSTRAINT `fk_user_topik_topik1` FOREIGN KEY (`topik_id`) REFERENCES `topik` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_topik_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `modul_video_fk` FOREIGN KEY (`id_modul`) REFERENCES `modul` (`id_modul`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
