-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2023 at 02:43 PM
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
-- Table structure for table `tbl_features`
--

CREATE TABLE `tbl_features` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_features`
--

INSERT INTO `tbl_features` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'User Only'),
(4, 'Finance'),
(5, 'Accountant'),
(6, 'Sales');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permissions`
--

CREATE TABLE `tbl_permissions` (
  `id` int(11) NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `feature_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_permissions`
--

INSERT INTO `tbl_permissions` (`id`, `permission_id`, `feature_desc`) VALUES
(1, 1, 'add_account_info'),
(2, 2, 'edit_account_info'),
(3, 3, 'view_account_info'),
(4, 4, 'delete_account_info'),
(5, 5, 'add_role'),
(6, 6, 'edit_role'),
(7, 7, 'view_role'),
(8, 8, 'delete_role'),
(9, 9, 'add_balance_sheet'),
(10, 10, 'edit_balance_sheet'),
(11, 11, 'view_balance_sheet'),
(12, 12, 'delete_balance_sheet'),
(30, 2, 'update_user'),
(31, 8, 'view_accounts_info'),
(32, 12, 'view_balance_sheet'),
(33, 20, 'view_billing_info'),
(34, 24, 'view_marketing_info'),
(35, 40, 'view_permission'),
(36, 28, 'view_reports'),
(37, 36, 'view_role'),
(38, 16, 'view_sales_info'),
(39, 32, 'view_system_alert'),
(40, 4, 'view_user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `roleid` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleid`, `role_name`, `value`) VALUES
(1, 'Super Admin', 1),
(2, 'Admin', 2),
(3, 'Manager', 3),
(4, 'User', 4),
(5, 'Finance', 5),
(6, 'IT Manager', 6),
(8, 'Cashier', 10),
(9, 'Secretory', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role_permissions`
--

CREATE TABLE `tbl_role_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_role_permissions`
--

INSERT INTO `tbl_role_permissions` (`id`, `role_id`, `permission_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 2, 1),
(14, 2, 2),
(15, 2, 3),
(16, 2, 5),
(17, 2, 6),
(18, 2, 7),
(19, 2, 9),
(20, 2, 10),
(21, 2, 11),
(22, 3, 2),
(23, 3, 6),
(24, 3, 10);

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
(12, 'Khun Tun Lar', 'Tun', 'khuntun984@gmail.com', '6f84772b926be0e28035577f0f77aee6b3825379', '09755033035', 1, 0, '2023-03-12 08:05:56', '2023-03-12 08:05:56'),
(24, 'Jus Tin', 'JS', 'justin333@gmail.com', '7f0c9d56d40c3cc1e23e0113d5377779a4de86ff', '54277528', 2, 0, '2020-12-19 08:43:39', '2020-12-19 08:43:39'),
(25, 'Nang Hnin Nu Ngwe', 'Hnin', 'hnin984@gmail.com', '0a859b9a4ebbde4f63383bca7e34890985782348', '54672828', 3, 0, '2020-12-19 08:45:52', '2020-12-19 08:45:52'),
(26, 'Nadi', 'Anna', 'anna789@gmail.com', 'adef7009a84a71c226ddf68671e929d68a707762', '42551771', 4, 0, '2020-12-19 08:46:59', '2020-12-19 08:46:59'),
(27, 'Moe Moe', 'Moe', 'moe768@gmail.com', '03ee5fda2eae80be34c0142fe28ac6401e63324c', '23451671', 5, 0, '2020-12-19 08:47:34', '2020-12-19 08:47:34'),
(31, 'James Spot', 'James', 'james@gmail.com', '7f0c9d56d40c3cc1e23e0113d5377779a4de86ff', '(+01)54277528', 6, 0, '2020-12-19 08:43:39', '2020-12-19 08:43:39'),
(32, 'Nang Thu Zar', 'Thu Zar', 'thuzar@gmail.com', '0a859b9a4ebbde4f63383bca7e34890985782348', '0954672828', 5, 0, '2020-12-19 08:45:52', '2020-12-19 08:45:52'),
(33, 'David Luis', 'David', 'david@gmail.com', 'adef7009a84a71c226ddf68671e929d68a707762', '0942551771', 4, 0, '2020-12-19 08:46:59', '2020-12-19 08:46:59'),
(34, 'Sirin', 'Sirin', 'Sirin@gmail.com', '03ee5fda2eae80be34c0142fe28ac6401e63324c', '23451671', 6, 0, '2020-12-19 08:47:34', '2020-12-19 08:47:34'),
(35, 'baby', 'bae', 'baby123@gmail.com', '53341414e1d6b6d47f38207ae0fe4c84eada2ea6', '444444444', 7, 0, '2023-03-13 02:04:11', '2023-03-13 02:04:11'),
(36, 'Nandar Aung', 'Nadar', 'nandar098@gmail.com', '82019e6b64c4e85ce8a22fab895d6830d6f837d8', '5555555555', 5, 0, '2023-03-13 02:07:00', '2023-03-13 02:07:00'),
(37, 'Alank Walker', 'Walker', 'walker876@gmail.com', '2ae46429eaf70dff01eb4035c6f65f567c9f9244', '098888888', 3, 0, '2023-03-13 02:42:28', '2023-03-13 02:42:28'),
(38, 'Nang Eain Dra', 'Eain Dra', 'eaindra678@gmail.com', 'db5340e08ede51fd2a1219c4ca0df10663260c18', '0978653467', 4, 0, '2023-03-13 04:02:45', '2023-03-13 04:02:45'),
(39, 'Rose', 'Rosy', 'rosy528@gmail.com', '820f35c4df2ccc15201508a313284a387e66b782', '(+666123544)', 3, 0, '2023-03-13 07:49:38', '2023-03-13 07:49:38'),
(43, 'Yadana Kin', 'YDNKK', 'yadana678@gmail.com', 'ed8d6c174829e2021335fe1f761e8b3ed231b346', '0988888888888', 2, 0, '2023-03-13 08:31:24', '2023-03-13 08:31:24'),
(44, 'Elizabeth UK', 'Elith', 'eliza457@gmail.com', '75c6b9459572eb74d0447ba0d4611a3bea8a5851', '(+02)896748844', 4, 0, '2023-03-13 08:34:31', '2023-03-13 08:34:31'),
(45, 'Jame Bom UK Actor', 'Bombom', 'bombom123@gmail.com', '652e55f6703c5a063e3ed08765b6698721693749', '90777777777777', 2, 0, '2023-03-13 08:36:57', '2023-03-13 08:36:57'),
(46, 'Ko Saie', 'Sai', 'saiko234@gmail.com', '5d3233d9ae9f2155130bd86999e8c443fdbfe780', '2334555555', 11, 0, '2023-03-16 04:12:03', '2023-03-16 04:12:03'),
(48, 'baby mgmg', 'baby', 'bay123@gmail.com', '678860ae91c4f28e10e977ab37c43d05e0a31434', '233333333333', 10, 0, '2023-03-17 03:36:09', '2023-03-17 03:36:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_features`
--
ALTER TABLE `tbl_features`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_permissions`
--
ALTER TABLE `tbl_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `tbl_role_permissions`
--
ALTER TABLE `tbl_role_permissions`
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
-- AUTO_INCREMENT for table `tbl_features`
--
ALTER TABLE `tbl_features`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_permissions`
--
ALTER TABLE `tbl_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `roleid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_role_permissions`
--
ALTER TABLE `tbl_role_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
