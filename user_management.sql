-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2023 at 09:01 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` int(11) NOT NULL COMMENT 'role_id',
  `role` varchar(255) DEFAULT NULL COMMENT 'role_text'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  `roleid` tinyint(4) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `username`, `email`, `password`, `mobile`, `roleid`, `isActive`, `created_at`, `updated_at`) VALUES
(12, 'Khun Tun', 'Tun', 'khuntun984@gmail.com', '6f84772b926be0e28035577f0f77aee6b3825379', '09755033035', 1, 0, '2023-03-12 08:05:56', '2023-03-12 08:05:56'),
(24, 'Jus Tin', 'JS', 'justin333@gmail.com', '7f0c9d56d40c3cc1e23e0113d5377779a4de86ff', '54277528', 3, 0, '2020-12-19 08:43:39', '2020-12-19 08:43:39'),
(25, 'Nang Hnin Nu Ngwe', 'Hnin', 'hnin984@gmail.com', '0a859b9a4ebbde4f63383bca7e34890985782348', '54672828', 3, 0, '2020-12-19 08:45:52', '2020-12-19 08:45:52'),
(26, 'Nadi', 'Anna', 'anna789@gmail.com', 'adef7009a84a71c226ddf68671e929d68a707762', '42551771', 3, 0, '2020-12-19 08:46:59', '2020-12-19 08:46:59'),
(27, 'Moe Moe', 'Moe', 'moe768@gmail.com', '03ee5fda2eae80be34c0142fe28ac6401e63324c', '23451671', 3, 0, '2020-12-19 08:47:34', '2020-12-19 08:47:34'),
(31, 'James Spot', 'James', 'james@gmail.com', '7f0c9d56d40c3cc1e23e0113d5377779a4de86ff', '(+01)54277528', 3, 0, '2020-12-19 08:43:39', '2020-12-19 08:43:39'),
(32, 'Nang Thu Zar', 'Thu Zar', 'thuzar@gmail.com', '0a859b9a4ebbde4f63383bca7e34890985782348', '0954672828', 3, 0, '2020-12-19 08:45:52', '2020-12-19 08:45:52'),
(33, 'David Luis', 'David', 'david@gmail.com', 'adef7009a84a71c226ddf68671e929d68a707762', '0942551771', 3, 0, '2020-12-19 08:46:59', '2020-12-19 08:46:59'),
(34, 'Sirin', 'Sirin', 'Sirin@gmail.com', '03ee5fda2eae80be34c0142fe28ac6401e63324c', '23451671', 3, 0, '2020-12-19 08:47:34', '2020-12-19 08:47:34'),
(35, 'baby', 'bae', 'baby123@gmail.com', '53341414e1d6b6d47f38207ae0fe4c84eada2ea6', '444444444', 3, 0, '2023-03-13 02:04:11', '2023-03-13 02:04:11'),
(36, 'Nandar Aung', 'Nadar', 'nandar098@gmail.com', '82019e6b64c4e85ce8a22fab895d6830d6f837d8', '5555555555', 3, 0, '2023-03-13 02:07:00', '2023-03-13 02:07:00'),
(37, 'Alank Walker', 'Walker', 'walker876@gmail.com', '2ae46429eaf70dff01eb4035c6f65f567c9f9244', '098888888', 3, 0, '2023-03-13 02:42:28', '2023-03-13 02:42:28'),
(38, 'Nang Eain Dra', 'Eain Dra', 'eaindra678@gmail.com', 'db5340e08ede51fd2a1219c4ca0df10663260c18', '0978653467', 3, 0, '2023-03-13 04:02:45', '2023-03-13 04:02:45'),
(39, 'Rose', 'Rosy', 'rosy528@gmail.com', '820f35c4df2ccc15201508a313284a387e66b782', '(+666123544)', 2, 1, '2023-03-13 07:49:38', '2023-03-13 07:49:38'),
(40, 'Baby Boss', 'Boss', 'boss789@gmail.com', '6b630c25fe88e77f45e7fb48d4a4579356878a49', '(+01)9999990', 2, 0, '2023-03-13 07:58:43', '2023-03-13 07:58:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'role_id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
