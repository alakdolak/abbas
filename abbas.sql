-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2020 at 08:36 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abbas`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `mode` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `user_id`, `item_id`, `mode`) VALUES
(1, 1, 5, 1),
(2, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(12, 1, '2020-07-13 01:36:20', '2020-07-13 01:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `common_question`
--

CREATE TABLE `common_question` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `common_question`
--

INSERT INTO `common_question` (`id`, `category_id`, `question`, `answer`) VALUES
(5, 5, '<p>asdsada</p>\r\n', '<p>sadasdas</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `change_rate` int(11) NOT NULL DEFAULT '10',
  `initial_point` int(11) NOT NULL DEFAULT '1000',
  `id` int(11) NOT NULL,
  `initial_star` int(11) NOT NULL DEFAULT '0',
  `project_limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`change_rate`, `initial_point`, `id`, `initial_star`, `project_limit`) VALUES
(20, 200, 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `faq_category`
--

CREATE TABLE `faq_category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq_category`
--

INSERT INTO `faq_category` (`id`, `name`) VALUES
(5, 'C'),
(6, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `name`) VALUES
(3, 'آول دبستان'),
(4, 'دوم دبستان'),
(5, 'سوم دبستان'),
(6, 'چهارم دبستان');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mode` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `item_id`, `user_id`, `mode`) VALUES
(3, 5, 1, 1),
(4, 11, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `is_me` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seen` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `chat_id`, `text`, `is_me`, `created_at`, `updated_at`, `seen`) VALUES
(53, 12, 'سلام', 1, '2020-07-13 01:36:20', '2020-07-13 01:36:20', 1),
(54, 12, 'علیک سلام', 0, '2020-07-13 01:36:35', '2020-07-13 01:36:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `star` int(1) NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT '0',
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `user_id`, `name`, `price`, `description`, `created_at`, `updated_at`, `star`, `hide`, `project_id`) VALUES
(3, 2, 'تست', 2000, '<p>شسیسظ</p>\r\n\r\n<p>ظطز</p>\r\n\r\n<p>ص</p>\r\n', '2020-07-12 09:54:16', '2020-07-12 09:54:16', 3, 0, 6),
(4, 2, 'ططظ', 100, '<p>شس</p>\r\n\r\n<p>ضصی</p>\r\n\r\n<p>س</p>\r\n', '2020-07-12 09:55:54', '2020-07-12 09:55:54', 1, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `product_attach`
--

CREATE TABLE `product_attach` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_attach`
--

INSERT INTO `product_attach` (`id`, `name`, `product_id`) VALUES
(1, '159446757066.png', 1),
(2, '1594467570GBES LEED AP BD+C v4 Exam Prep 01 Introduction.mp3', 1),
(3, '1594467570dena.pdf', 1),
(4, '1594467570test.xlsx', 1),
(5, '1594467570قیمه.png', 1),
(6, '1594467570گزارش پیشرفت.docx', 1),
(7, '159456385766.png', 3),
(8, '1594563857GBES LEED AP BD+C v4 Exam Prep 01 Introduction.mp3', 3),
(9, '1594563857dena.pdf', 3),
(10, '1594563857test.xlsx', 3),
(11, '1594563857قیمه.png', 3),
(12, '1594563857گزارش پیشرفت.docx', 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_pic`
--

CREATE TABLE `product_pic` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_pic`
--

INSERT INTO `product_pic` (`id`, `product_id`, `name`) VALUES
(1, 1, '15944675693.png'),
(2, 1, '159446756933.png'),
(3, 1, '159446756934.png'),
(4, 1, '1594467569قیمه.png'),
(5, 3, '15945638573.png'),
(6, 3, '159456385733.png'),
(7, 3, '159456385734.png'),
(8, 3, '1594563857قیمه.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_trailer`
--

CREATE TABLE `product_trailer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_trailer`
--

INSERT INTO `product_trailer` (`id`, `name`, `product_id`) VALUES
(1, '159456385766.png', 3),
(2, '1594563857GBES LEED AP BD+C v4 Exam Prep 01 Introduction.mp3', 3),
(3, '1594563857dena.pdf', 3),
(4, '1594563857test.xlsx', 3),
(5, '1594563857قیمه.png', 3),
(6, '1594563857گزارش پیشرفت.docx', 3);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `grade_id` int(11) NOT NULL,
  `start_reg` varchar(8) NOT NULL,
  `end_reg` varchar(8) NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `title`, `description`, `price`, `created_at`, `updated_at`, `grade_id`, `start_reg`, `end_reg`, `hide`) VALUES
(5, 'asda', '<p>sad</p>\r\n\r\n<p>qwewq</p>\r\n', 300, '2020-07-10 09:31:52', '2020-07-10 09:31:52', 4, '13990417', '13990431', 0),
(6, 'تست 2', '<p>تست بعدی</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>چک شود که درست باشد</p>\r\n', 600, '2020-07-10 11:56:14', '2020-07-12 07:32:51', 4, '13990420', '13990425', 0),
(9, 'dsa', '<p>sda</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>zx</p>\r\n', 2000, '2020-07-10 13:28:14', '2020-07-12 07:32:53', 4, '13990412', '13990425', 0),
(11, 'تست بعدی', '<p>شسیشس</p>\r\n\r\n<p>ظطزطظ</p>\r\n\r\n<p>ضس</p>\r\n', 400, '2020-07-11 04:47:47', '2020-07-11 04:47:47', 4, '13990420', '13990428', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_attach`
--

CREATE TABLE `project_attach` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_attach`
--

INSERT INTO `project_attach` (`id`, `name`, `project_id`) VALUES
(1, '159445906766.png', 11),
(2, '1594459067GBES LEED AP BD+C v4 Exam Prep 01 Introduction.mp3', 11),
(3, '1594459067dena.pdf', 11),
(4, '1594459067test.xlsx', 11),
(5, '1594459067قیمه.png', 11),
(6, '1594459067گزارش پیشرفت.docx', 11);

-- --------------------------------------------------------

--
-- Table structure for table `project_buyers`
--

CREATE TABLE `project_buyers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_buyers`
--

INSERT INTO `project_buyers` (`id`, `user_id`, `project_id`, `created_at`, `updated_at`, `status`) VALUES
(3, 2, 6, '2020-07-10 17:27:17', '2020-07-12 09:54:16', 1),
(4, 2, 5, '2020-07-10 17:27:35', '2020-07-12 09:55:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_pic`
--

CREATE TABLE `project_pic` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_pic`
--

INSERT INTO `project_pic` (`id`, `name`, `project_id`) VALUES
(1, '15944037933.jpg', 8),
(2, '15944037933.png', 8),
(3, '1594403793new.png', 8),
(4, '15944038943.jpg', 9),
(5, '15944038943.png', 9),
(6, '1594403894new.png', 9),
(11, '15944590673.png', 11),
(12, '159445906733.png', 11),
(13, '159445906734.png', 11),
(14, '1594459067قیمه.png', 11);

-- --------------------------------------------------------

--
-- Table structure for table `project_tag`
--

CREATE TABLE `project_tag` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_tag`
--

INSERT INTO `project_tag` (`id`, `tag_id`, `project_id`) VALUES
(5, 1, 5),
(6, 2, 5),
(4, 3, 6),
(3, 2, 9),
(1, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `star` int(11) NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `grade_id` int(11) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `title`, `description`, `star`, `hide`, `created_at`, `updated_at`, `grade_id`, `capacity`) VALUES
(1, 'zxsd', '<p>asdwqwdsadsa</p>\r\n', 3, 0, '2020-07-12 10:44:25', '2020-07-12 10:44:25', 4, 2),
(2, 'cdasq', '<p>xxzc</p>\r\n\r\n<p>sdwq</p>\r\n\r\n<p>asd</p>\r\n', 3, 0, '2020-07-13 01:41:54', '2020-07-13 01:41:54', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `service_buyer`
--

CREATE TABLE `service_buyer` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `star` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_buyer`
--

INSERT INTO `service_buyer` (`id`, `service_id`, `user_id`, `status`, `star`) VALUES
(1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_pic`
--

CREATE TABLE `service_pic` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_pic`
--

INSERT INTO `service_pic` (`id`, `service_id`, `name`) VALUES
(1, 1, '15945668653.png'),
(2, 1, '159456686533.png'),
(3, 1, '159456686534.png'),
(4, 1, '1594566865قیمه.png');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`) VALUES
(1, 'یک'),
(2, 'دو'),
(3, 'سه');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `follow_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `nid` varchar(10) DEFAULT NULL,
  `level` int(1) NOT NULL,
  `updated_at` varchar(100) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `phone_num` varchar(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` varchar(100) NOT NULL,
  `money` int(11) NOT NULL DEFAULT '0',
  `grade_id` int(11) DEFAULT NULL,
  `stars` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `nid`, `level`, `updated_at`, `remember_token`, `phone_num`, `status`, `created_at`, `money`, `grade_id`, `stars`) VALUES
(1, 'admin', '$2y$10$OOQJFnUhp0GkNmOi7FWwOui0oLUe2UtqKroGVIDVcCJygb8gpoQb6', 'محمد', 'قانع', '0018914373', 3, '2020-07-12 16:12:42', 'wV5l3LYPHtVaCUHKkPOLTB6umTAYvTHZwUjpPtXOCR73wPNRhueLFVWCSixc', '09214915905', 1, '', 1840, 4, 9),
(2, 'ahmad', '$2y$10$YIuKpCu6TIRyKcImSinoQuk3zVV.Tm2c7GiooTLAgXLxvAIe4LA/i', 'احمد', 'رضایی', '0020033087', 1, '2020-07-10 11:04:07', 'HeK5UfuuHihElQJGuSKvo6qfCJVgEQKFc8uaVM24LqL4O3cqldhRdu2RAE4X', '09121593106', 1, '2020-07-10 10:38:50', 200, 4, 2),
(3, 'hosein', '$2y$10$kVhdNktk3n8zbc57Yfxrg.U6oiFX/fmq5ISjUlBISyI11Awe4Tag6', 'حسین', 'نوری', '0074804456', 1, '2020-07-12 12:21:30', NULL, '09356602828', 0, '2020-07-10 10:38:50', 300, 4, 3),
(4, 'hasan', '$2y$10$0MTpZ3ja7SS8gMNpHP9oVu3dI1cT7dkP.SsfsJeIPU8vxzhkBNZR2', 'حسن', 'سلامت', '3861338300', 1, '2020-07-10 11:03:36', NULL, '09124793481', 1, '2020-07-10 10:38:50', 200, 4, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `mode` (`mode`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `common_question`
--
ALTER TABLE `common_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_category`
--
ALTER TABLE `faq_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `mode` (`mode`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_id` (`chat_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id_foreign` (`user_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `product_attach`
--
ALTER TABLE `product_attach`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_pic`
--
ALTER TABLE `product_pic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_pic_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_trailer`
--
ALTER TABLE `product_trailer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grade_id`);

--
-- Indexes for table `project_attach`
--
ALTER TABLE `project_attach`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `project_buyers`
--
ALTER TABLE `project_buyers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `project_pic`
--
ALTER TABLE `project_pic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `project_tag`
--
ALTER TABLE `project_tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projectTagUnique` (`project_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grade_id`);

--
-- Indexes for table `service_buyer`
--
ALTER TABLE `service_buyer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `service_pic`
--
ALTER TABLE `service_pic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `follow_code` (`follow_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `NID` (`nid`),
  ADD KEY `grade_id` (`grade_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `common_question`
--
ALTER TABLE `common_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faq_category`
--
ALTER TABLE `faq_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_attach`
--
ALTER TABLE `product_attach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_pic`
--
ALTER TABLE `product_pic`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_trailer`
--
ALTER TABLE `product_trailer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `project_attach`
--
ALTER TABLE `project_attach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_buyers`
--
ALTER TABLE `project_buyers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_pic`
--
ALTER TABLE `project_pic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `project_tag`
--
ALTER TABLE `project_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_buyer`
--
ALTER TABLE `service_buyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_pic`
--
ALTER TABLE `service_pic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `msg`
--
ALTER TABLE `msg`
  ADD CONSTRAINT `chatForeignInMsg` FOREIGN KEY (`chat_id`) REFERENCES `chat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_tag`
--
ALTER TABLE `project_tag`
  ADD CONSTRAINT `projectForeignInTag` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tagForeignInProject` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `productForeignInTransaction` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userForeignInTransaction` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
