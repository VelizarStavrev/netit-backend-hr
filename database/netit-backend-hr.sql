-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2021 at 08:53 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netit-backend-hr`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(255) NOT NULL,
  `job_id` int(50) NOT NULL,
  `employee_id` int(50) NOT NULL,
  `status` char(50) NOT NULL DEFAULT '',
  `applied` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table combines the job ids, the candidate ids, the current status and the date applied.';

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

CREATE TABLE `employee_info` (
  `user_id` int(11) NOT NULL,
  `first_name` char(50) NOT NULL DEFAULT 'first name',
  `last_name` char(50) NOT NULL DEFAULT 'last name',
  `country` char(50) NOT NULL DEFAULT 'country',
  `city` char(50) NOT NULL DEFAULT 'country',
  `p_email` char(50) NOT NULL DEFAULT 'public email',
  `p_phone` char(50) NOT NULL DEFAULT 'public phone',
  `p_site` char(50) NOT NULL DEFAULT 'public site',
  `p_linkedin` char(50) NOT NULL DEFAULT 'public linkedin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='All of the employee data submitted from the front end is saved here.';

-- --------------------------------------------------------

--
-- Table structure for table `employer_info`
--

CREATE TABLE `employer_info` (
  `user_id` int(11) NOT NULL,
  `company_name` char(50) NOT NULL DEFAULT 'company name',
  `industry` char(50) NOT NULL DEFAULT 'industry',
  `country` char(50) NOT NULL DEFAULT 'country',
  `city` char(50) NOT NULL DEFAULT 'country',
  `company_description` varchar(500) NOT NULL DEFAULT 'description',
  `p_site` char(50) NOT NULL DEFAULT 'public site',
  `p_linkedin` char(50) NOT NULL DEFAULT 'public linkedin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='All of the employee data submitted from the front end is saved here.' ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` char(50) NOT NULL DEFAULT 'No title',
  `creator` int(11) NOT NULL,
  `location` char(50) NOT NULL DEFAULT 'no creator id',
  `salary` char(50) NOT NULL DEFAULT '-',
  `description` varchar(500) NOT NULL DEFAULT 'no description',
  `job_status` char(50) NOT NULL,
  `created` int(50) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='All of the job offers are going to be stored into this table.';

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender` char(50) NOT NULL DEFAULT 'No sender',
  `receiver` char(50) NOT NULL DEFAULT 'No receiver',
  `topic` char(50) NOT NULL DEFAULT 'No topic',
  `message` char(255) NOT NULL DEFAULT 'No message',
  `sent` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table stores all of the messages in the system.';

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table defines all roles of the database.';

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'super'),
(2, 'hr'),
(3, 'employer'),
(4, 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` char(50) NOT NULL DEFAULT '0',
  `email` char(50) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0',
  `role` int(11) NOT NULL DEFAULT 5,
  `joined` char(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table holds all users of the database.';

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_candidates_jobs` (`job_id`),
  ADD KEY `FK_candidates_employee_info` (`employee_id`);

--
-- Indexes for table `employee_info`
--
ALTER TABLE `employee_info`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- Indexes for table `employer_info`
--
ALTER TABLE `employer_info`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__users` (`creator`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_messages_users` (`sender`) USING BTREE,
  ADD KEY `FK_messages_users_2` (`receiver`) USING BTREE;

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_id` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `FK_candidates_employee_info` FOREIGN KEY (`employee_id`) REFERENCES `employee_info` (`user_id`),
  ADD CONSTRAINT `FK_candidates_jobs` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`);

--
-- Constraints for table `employee_info`
--
ALTER TABLE `employee_info`
  ADD CONSTRAINT `FK_employee_info_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `employer_info`
--
ALTER TABLE `employer_info`
  ADD CONSTRAINT `employer_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `FK__users` FOREIGN KEY (`creator`) REFERENCES `users` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `FK_messages_users` FOREIGN KEY (`sender`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `FK_messages_users_2` FOREIGN KEY (`receiver`) REFERENCES `users` (`username`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role_id` FOREIGN KEY (`role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
