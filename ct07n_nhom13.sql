-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2024 at 11:45 AM
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
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(50) DEFAULT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `class_name`, `student_id`) VALUES
(1, '10A2', 71),
(3, '10A4', 29),
(4, '10A5', 30),
(5, '12A2', 31),
(6, '12A6', 33),
(7, '10A4', 34),
(10, '10A6', 36),
(11, '10A6', 37),
(12, '10A2', 40),
(13, '11A5', 41),
(14, '10A5', 42),
(15, '11A3', 47),
(16, '11A4', 48),
(17, '12A2', 50),
(18, '12A4', 57),
(19, '10A5', 58),
(20, '11A3', 59),
(21, '12A2', 60),
(22, '12A3', 61),
(23, '10A2', 62),
(24, '10A3', 63),
(25, '11A5', 64),
(26, '12A1', 65),
(27, '12A4', 66),
(28, '11A2', 67),
(29, '10A4', 68),
(30, '11A5', 69),
(31, '10A2', 70),
(32, '10A6', 72),
(40, '10A4', 74);

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
(29, 'Lâm Hoàng Nghiệp', '2004-12-20', 'Phường 8, Bạc Liêu', 'nghieplam456@gmail.com', 'glasses_man(2)jpg', 10),
(30, 'Tăng Thành Tính', '2004-10-09', 'Phường 5, Bạc Liêu', 'tinhtang456@gmail.com', '5556468.png', 10),
(31, 'Lê Hoàng Nhật', '2000-10-10', 'Quận Bình Thạnh, Hồ Chí Minh', 'nhat123@gmail.com', 'student-avatar-user-profile-icon-vector-47025187.jpg', 10),
(33, 'Trịnh Thùy Dung', '1999-10-10', 'Yên Thế, Bắc Giang', 'dungtrinh29@gmail.com', 'korean_girl.jpg', 9),
(34, 'Lê Nhật Trí', '2000-09-23', 'Cần Thơ', 'trile123@gmail.com', 'glasses_man.jpg', 6),
(36, 'Thái Mỹ Duyên', '2003-12-09', 'Bình Phước', 'gaupoo123@gmail.com', 'japanese_girl.jpg', 7.6),
(37, 'Hoàng Minh Thông', '2005-10-10', 'Gia Lai', 'johnstone123@gmail.com', 'bussi_man.jpg', 9.3),
(40, 'Phan Tấn Trung', '2003-10-10', 'Đồng Tháp', 'thaygiaba123@gmail.com', 'baroibeo.jpg', 9.2),
(41, 'Phạm Minh Lộc', '2000-02-02', 'Đồng Tháp', 'zeros123@gmail.com', 'joyful_boy.jpg', 5.5),
(42, 'Trần Hồng Sang', '2003-07-07', 'Bắc Ninh', 'sangtran123@gmail.com', 'glasses_man(1)jpg', 7),
(47, 'Lê Thị Nhàn', '2000-10-10', 'Bình Phước', 'nhan123@gmail.com', 'short_hair_girl.png', 9),
(48, 'Lê Hoàng Sơn', '2000-10-10', 'Cần Thơ', 'sonle123@gmail.com', 'uk_boy.jpg', 10),
(50, 'Lương Vũ Trang Anh', '2004-12-15', 'Bạc Liêu', 'tranganh123@gmail.com', 'light_hair_girl.jpg', 10),
(57, 'Nguyễn Đình Chiêu', '2004-03-07', 'Bạc Liêu', 'ndchieu73@gmail.com', 'uk_boy(1)jpg', 7),
(58, 'Trần Hữu Vĩ', '2004-08-01', 'Bạc Liêu', 'vi123@gmail.com', 'boy_cool(1)jpg', 6),
(59, 'Nguyễn Đức Quang', '2000-10-10', 'Thái Bình', 'quangnguyen123@gmai.com', NULL, 10),
(60, 'Hoàng Nga My', '2003-08-09', 'Tây Ninh', 'myhoang21@gmail.com', NULL, 10),
(61, 'Huỳnh Minh Đức', '2000-08-09', 'Cần Thơ', 'duchuynh123@gmail.com', NULL, 10),
(62, 'Huỳnh Đắc Thịnh', '2000-10-10', 'Bạc Liêu', 'thinhhuynh123@gmail.com', NULL, 10),
(63, 'Lý An Lan', '2004-09-12', 'Cần Thơ', 'lananh164@gmail.com', NULL, 10),
(64, 'Trần Thái Sơn', '2000-10-10', 'Hà Nội', 'sontran123@gmail.com', NULL, 10),
(65, 'Lê Khả Giáp', '2000-10-10', 'Hà Nội', 'giapkhale123@gmail.com', NULL, 9),
(66, 'Đỗ Nhật Trường', '2000-10-10', 'Cà Mau', 'truongdo123@gmail.com', NULL, 10),
(67, 'Lê Hoàng Nhật', '2000-10-10', 'Cà Mau', 'ndchieu73@gmail.com', NULL, 10),
(68, 'Lê Hoàng Nhật', '2003-02-02', 'Bắc Ninh', 'large8104@msgsafe.io', NULL, 9),
(69, 'Nguyễn Đình Chiêu', '2000-02-02', 'Cần Thơ', 'large8104@msgsafe.io', NULL, 10),
(70, 'Trần Hữu Vĩ', '2000-01-01', 'Bạc Liêu', 'vitran123@gmail.com', NULL, 9),
(71, 'Lê Long Nhật', '2003-02-02', 'Yên Bái', 'longnhat1993@gmail.com', NULL, 10),
(72, 'Lê Thanh Hùng', '2000-10-10', 'Cần Thơ', 'hungle123@gmail.com', NULL, 10),
(74, 'Lê Hoàng Bảo', '2003-09-10', 'Long An', 'baohoangkak123@gmail.com', NULL, 9);

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
(1, NULL, 'admin123', '$2y$10$J89wzN4txrLbGJHnuTshCuYem2fvgMFI.SUIqDUydKA8LRdLRRk7K', 1),
(25, 29, 'chieu123bl', '$2y$10$DLo1h7fmwaf.lZ8XEJOeI.SrOWgLvoSlomMqQo2k2S0GrLOtalEX6', 0),
(26, 30, 'tinh123bl', '$2y$10$3uIJppJk2kfqCMFxZkfCm.xs7OI18Ceb0qBlAH0.LNYqIDwUuOWx6', 0),
(27, 50, 'tranganh1205', '$2y$10$8AyI1.FC90z9gGEeh70JBetWSU4B9YyMKuX8wepvtRKkgBFNEWGya', 0),
(28, 37, 'thonghoang123', '$2y$10$229p0VYdpikMjC5DAQofGOhoyGp.M2dFqys4dhmhiLLhIuBpCO3Uu', 0),
(29, 34, 'nhattri123bl', '$2y$10$BotWRyHoIFLPZa3Uvf9.1.DluNz3SCdmGXvUBaQqaB1lKL9Z9RY.S', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

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
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `student_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
