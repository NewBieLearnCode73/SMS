-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 03:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ct07n_nhom13`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `birthdate`, `address`, `email`, `image`, `score`) VALUES
(28, 'Lê Thanh Hiếu', '2004-03-25', 'Vĩnh Lợi, Bạc Liêu', 'leeparkVal123@gmail.com', 'images__1_.png', 9),
(29, 'Lâm Hoàng Nghiệp', '2004-12-20', 'Phường 8, Bạc Liêu', 'nghieplam456@gmail.com', 'glasses_man(2)jpg', 10),
(30, 'Tăng Thành Tính', '2004-10-09', 'Phường 5, Bạc Liêu', 'tinhtang456@gmail.com', '5556468.png', 10),
(31, 'Lê Hoàng Nhật', '2000-10-10', 'Quận Bình Thạnh, Hồ Chí Minh', 'nhat123@gmail.com', 'student-avatar-user-profile-icon-vector-47025187.jpg', 10),
(33, 'Trịnh Thùy Dung', '1999-10-10', 'Yên Thế, Bắc Giang', 'dungtrinh29@gmail.com', 'korean_girl.jpg', 9),
(34, 'Lê Nhật Trí', '2000-09-23', 'Cần Thơ', 'trile123@gmail.com', 'glasses_man.jpg', 6),
(36, 'Thái Mỹ Duyên', '2003-12-09', 'Bình Phước', 'gaupoo123@gmail.com', 'japanese_girl.jpg', 7.6),
(37, 'Hoàng Minh Thông', '2005-10-10', 'Gia Lai', 'johnstone123@gmail.com', 'bussi_man.jpg', 9.3),
(38, 'Trần Minh Nhật', '2000-10-10', 'Bạc Liêu', 'nhatminhtran123@gmail.com', 'boy_cool.jpg', 7),
(40, 'Phan Tấn Trung', '2003-10-10', 'Đồng Tháp', 'thaygiaba123@gmail.com', 'baroibeo.jpg', 9.2),
(41, 'Phạm Minh Lộc', '2000-02-02', 'Đồng Tháp', 'zeros123@gmail.com', 'joyful_boy.jpg', 5.5),
(42, 'Trần Hồng Sang', '2003-07-07', 'Bắc Ninh', 'sangtran123@gmail.com', 'glasses_man(1)jpg', 7),
(47, 'Lê Thị Nhàn', '2000-10-10', 'Bình Phước', 'nhan123@gmail.com', 'short_hair_girl.png', 9),
(48, 'Lê Hoàng Sơn', '2000-10-10', 'Cần Thơ', 'sonle123@gmail.com', 'uk_boy.jpg', 10),
(50, 'Lương Vũ Trang Anh', '2004-12-15', 'Bạc Liêu', 'tranganh123@gmail.com', 'light_hair_girl.jpg', 10),
(54, 'Hoàng Sơn Thạch', '2000-10-10', 'Tây Ninh', 'thanhhoang123@gmail.com', 'bussi_man(1)jpg', 6.7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 is admin, 0 is user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `student_id`, `username`, `password`, `role`) VALUES
(1, NULL, 'admin123', '$2y$10$Thg55V8f0Ri4t1Q/GaWZ..5GzQIBnJNgAUlSlHTm03xXTaA1WAbPa', 1),
(24, 28, 'leepark113', '$2y$10$3XkDaR/nh4Gxl54gBN75COnBq/1eo36GeMTwdtf8TqcodV5pe4DqW', 0),
(25, 29, 'chieu123bl', '$2y$10$DLo1h7fmwaf.lZ8XEJOeI.SrOWgLvoSlomMqQo2k2S0GrLOtalEX6', 0),
(26, 30, 'tinh123bl', '$2y$10$3uIJppJk2kfqCMFxZkfCm.xs7OI18Ceb0qBlAH0.LNYqIDwUuOWx6', 0),
(27, 50, 'tranganh1205', '$2y$10$8AyI1.FC90z9gGEeh70JBetWSU4B9YyMKuX8wepvtRKkgBFNEWGya', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `student_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
