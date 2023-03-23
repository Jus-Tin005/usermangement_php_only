-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 02:24 AM
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
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_features`
--

INSERT INTO `tbl_features` (`id`, `name`) VALUES
(1, 'product'),
(2, 'accountant'),
(3, 'cashier'),
(4, 'finance');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permissions`
--

CREATE TABLE `tbl_permissions` (
  `per_id` int(11) NOT NULL,
  `per_access` varchar(255) NOT NULL,
  `per_create` varchar(255) NOT NULL,
  `per_show` varchar(255) NOT NULL,
  `per_edit` varchar(255) NOT NULL,
  `per_delete` varchar(255) NOT NULL,
  `ban_active_user` varchar(255) NOT NULL,
  `per_onlyUser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_permissions`
--

INSERT INTO `tbl_permissions` (`per_id`, `per_access`, `per_create`, `per_show`, `per_edit`, `per_delete`, `ban_active_user`, `per_onlyUser`) VALUES
(1, 'Access', 'Create', 'Show', 'Edit', 'Delete', 'Ban/Active user', 'User Only');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `role_id` int(10) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `roled_name` varchar(255) NOT NULL,
  `permission_items` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`role_id`, `role_name`, `roled_name`, `permission_items`, `status`) VALUES
(1, 'Author', 'Khun Tun', 'Access,Create,Show,Edit,Delete,Ban/Active user,User Only', 0),
(2, 'Admin', 'Jus Tin', 'Show, Edit', 0),
(3, 'Super Admin', 'Khun Tun Lar', 'Create,Show,Edit,Delete,Ban/Active user,User Only', 0),
(4, 'Contributor', 'Khun Tun Tun', 'Create,Show,Edit,Delete,Ban/Active user', 0),
(6, 'Only User', 'James', 'Show,User Only', 0),
(10, 'IT Manager', 'Nang Hni', 'Create', 0),
(12, 'Financial Manager', 'Elizabeth', 'Create,Edit,Delete,User Only', 0),
(13, 'Admin', 'Daisy', 'Create', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role_permissions`
--

CREATE TABLE `tbl_role_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(48, 'baby mgmg', 'baby', 'bay123@gmail.com', '678860ae91c4f28e10e977ab37c43d05e0a31434', '233333333333', 10, 0, '2023-03-17 03:36:09', '2023-03-17 03:36:09'),
(58, 'baby nou', 'babynou', 'babynou123@gmail.com', 'a92fab8fa7b9824e925e4ca749d685da6331a17a', '09345555', NULL, 0, '2023-03-19 10:02:21', '2023-03-19 10:02:21'),
(59, 'kakaka', 'kakaka', 'kakaka321@gmail.com', '757ad605aba186074ad1b88ca31f1d045ac2f540', '1234433333', NULL, 0, '2023-03-19 10:03:26', '2023-03-19 10:03:26'),
(60, 'Carcarwwww', 'Carcar', 'Carcar123@gmail.com', 'e9f11b878f6301ab6770d134098f05a119b2120c', '2345688', NULL, 0, '2023-03-19 10:04:29', '2023-03-19 10:04:29'),
(61, 'gogogoeeeee', 'gogogo', 'gogogo321@gmail.com', '964a3451a05765c6aaeb781d6da2e7143daa385d', '44444444444444', 0, 0, '2023-03-19 10:05:23', '2023-03-19 10:05:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_features`
--
ALTER TABLE `tbl_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_permissions`
--
ALTER TABLE `tbl_permissions`
  ADD PRIMARY KEY (`per_id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`role_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_permissions`
--
ALTER TABLE `tbl_permissions`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `role_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_role_permissions`
--
ALTER TABLE `tbl_role_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
