-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2025 at 07:26 PM
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
-- Database: `digital-wallet`
--

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` enum('complaint','comment','review') NOT NULL,
  `content` text NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `verification` varchar(11) NOT NULL,
  `time_verified` datetime NOT NULL,
  `time_created` datetime NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `phone_number`, `password`, `is_verified`, `verification`, `time_verified`, `time_created`, `is_admin`) VALUES
(1, 'Halim', 'Njeim', 'michaelnjeim44@gmail.com', 0, 'Kratos123', 1, 'passport', '2025-02-28 12:03:51', '2025-02-28 12:03:51', 1),
(2, 'Mohsen', 'Chokr', 'hnjeim76@gmail.com', 0, 'Mohsen123', 0, '', '2025-02-28 12:04:31', '2025-02-28 12:04:31', 0),
(3, 'wonder', 'woman', '123@email.com', 12345, '1234EDR', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(4, 'wonder', 'woman', 'captainamerica@usermail.com', 555, '1234EDR', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, 'lucifer', 'devil', '666@gmail.com', 666, 'IamAwesome', 0, '', '0000-00-00 00:00:00', '2025-03-01 13:32:39', 0),
(6, 'captain', 'slash', '123@gmai.com', 300, '231', 0, '', '0000-00-00 00:00:00', '2025-03-02 19:04:54', 0),
(8, 'samwise', 'gamgi', 'frodoandsam@gmail.com', 223313, '$2y$10$YlFKtOFWTT3NieHpMhRMF.uHld/659Af/co6DPWDiLXyCIxuvOHyq', 0, '', '0000-00-00 00:00:00', '2025-03-03 11:04:48', 0),
(9, 'metro', 'boomin', 'wantsomemore@gmail.com', 999, '$2y$10$uIIlQr8zBvTXDkCwzt61v.NJq2U5qBIUj6Ov8Zrd9d1SfPC.60TU2', 0, '', '0000-00-00 00:00:00', '2025-03-03 21:39:06', 0),
(10, 'ali', 'seblani', 'seblou@gmail.com', 12345678, '$2y$10$p/KrEH4vOGe11e9.uKbIbuA3sz1sjx4aCHxsdNBanHzdzHuoJSam.', 0, '', '0000-00-00 00:00:00', '2025-03-04 22:39:23', 0),
(11, 'khaled', 'rifai', 'kiks@gmail.com', 44445555, '$2y$10$FqLii.JO0zxZfmUTzyiMCesEAiGSMeO.FVcUtk/BOHmTVsvrGSIJW', 0, '', '0000-00-00 00:00:00', '2025-03-04 22:53:55', 0),
(12, 'loulou', 'chou', 'chaw@gmail.com', 878787878, '$2y$10$DBaVGxlYGJeJSoMaiMo7HOLiasIoB/w2v56VxHnm1vf6Ds2TAD1Ky', 0, '', '0000-00-00 00:00:00', '2025-03-04 23:34:36', 0),
(13, 'bat', 'man', 'robin@gmail.com', 0, '$2y$10$/wwq2Q61u7XhQiT33jLvYeUGnEBoMepOOkqDids3WSc0sKl8YKue2', 0, '', '0000-00-00 00:00:00', '2025-03-04 23:35:11', 0),
(14, 'alaa', 'mortada', 'amg@gmail.com', 8370189, '$2y$10$72LEmYA.LW9fOPhSvZneQev2xUHAtyHb8X6hReEC4SrGw7Cq49pa6', 0, '', '0000-00-00 00:00:00', '2025-03-04 23:36:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `balance` float NOT NULL,
  `card_number` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `balance`, `card_number`, `date_created`) VALUES
(1, 1, 15, 111, '2025-03-02 16:46:15'),
(2, 1, 200, 123, '2025-03-02 17:06:15'),
(3, 1, 0, 898, '2025-03-02 18:10:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN_KEY` (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_key` (`sender_id`),
  ADD KEY `receriver_key` (`receiver_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallet_owner_key` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `FOREIGN_KEY` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `receriver_key` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `sender_key` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallet_owner_key` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
