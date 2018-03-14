-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-03-14 10:48:04
-- 服务器版本： 5.7.16
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jyxb`
--

-- --------------------------------------------------------

--
-- 表的结构 `decorate_list`
--

CREATE TABLE `decorate_list` (
  `id` int(11) NOT NULL,
  `_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `decorate_list`
--

INSERT INTO `decorate_list` (`id`, `_name`) VALUES
(-1, '其它'),
(2, '豪华'),
(3, '毛坯'),
(4, '简装');

-- --------------------------------------------------------

--
-- 表的结构 `house_list`
--

CREATE TABLE `house_list` (
  `id` varchar(32) NOT NULL,
  `title` varchar(200) NOT NULL,
  `region` int(11) NOT NULL,
  `housing` int(11) DEFAULT NULL,
  `style` int(11) NOT NULL,
  `decorate` int(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `host_name` varchar(100) NOT NULL,
  `host_tel` varchar(11) NOT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `imgs` text,
  `detail` text,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `area` decimal(6,2) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `agent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `house_list`
--

INSERT INTO `house_list` (`id`, `title`, `region`, `housing`, `style`, `decorate`, `address`, `host_name`, `host_tel`, `price`, `imgs`, `detail`, `updated_at`, `created_at`, `location`, `area`, `deleted_at`, `agent`) VALUES
('0x94dKs7cgjB0WyA2LDe3RUKd3okjXux', '河南 天成国际 140平米 50万元', 24, 26, 4, 2, '河南 天成国际 14号楼 704', '李开复', '17777888888', '50.00', 'xiaobai_1520841263_fEQlzMhJkt.jpg|xiaobai_1520841261_Ngius5THMi.jpg|xiaobai_1520841261_BynUfYkR8U.jpg|', '业主急售，要出国\n室内装修豪华\n采光好', '2018-03-12 15:56:28', '2018-03-12 15:56:28', NULL, '140.00', '2018-03-12 15:56:28', NULL),
('2RGtlNGPBet31oNayC48B6s9fYdKe9PR', '天健 水岸140平米 50万元', 33, -1, 4, 2, '河南 天成国际 14号楼 704', '李开复', '17777888888', '50.00', 'xiaobai_1520841263_fEQlzMhJkt.jpg|xiaobai_1520841261_Ngius5THMi.jpg|xiaobai_1520841261_BynUfYkR8U.jpg|', '业主急售，要出国\n室内装修豪华\n采光好', '2018-03-12 15:57:41', '2018-03-12 15:57:41', NULL, '140.00', NULL, NULL),
('hTBxNk2GstkQyg3KbhDsAkRGhr6ELriT', '123123123123', 24, 26, 5, 2, '天成国际 A区 18号 503', '白宇', '18170821082', '11.00', 'xiaobai_1520843524_vsois5ZHl4.jpg|xiaobai_1520843524_N8MxrMnHpI.jpg|xiaobai_1520843524_cXu5iCclZO.jpg|xiaobai_1520844949_69wV0YDR0U.jpg|', '123123', '2018-03-12 16:55:50', '2018-03-12 16:55:50', NULL, '11.00', NULL, NULL),
('l7aiTot6CFBYh0Rn39dQp5UPNplwvHQJ', '123123123123', 24, 26, 5, 2, '天成国际 A区 18号 503', '白宇', '18170821082', '11.00', 'xiaobai_1520843524_vsois5ZHl4.jpg|xiaobai_1520843524_N8MxrMnHpI.jpg|xiaobai_1520843524_cXu5iCclZO.jpg|', '123123', '2018-03-12 16:54:54', '2018-03-12 16:54:54', NULL, '11.00', NULL, NULL),
('OPZo1fdJnuBjMyVrvnnwErEctQp8prMK', '123123123123', 24, 26, 5, 2, '天成国际 A区 18号 503', '白宇', '18170821082', '11.00', 'xiaobai_1520845035_c1K9XHMx8a.jpg|xiaobai_1520845034_113KCtIRbs.jpg|xiaobai_1520845033_JyCV3jWfQG.jpg|', '123123', '2018-03-12 16:57:19', '2018-03-12 16:57:19', NULL, '11.00', NULL, NULL),
('w7qetgsG05Sqdb4AgzySmmGismgP4DG2', '123123123123', 24, 26, 5, 2, '天成国际 A区 18号 503', '白宇', '18170821082', '11.00', 'xiaobai_1520843524_vsois5ZHl4.jpg|xiaobai_1520843524_N8MxrMnHpI.jpg|xiaobai_1520843524_cXu5iCclZO.jpg|', '123123', '2018-03-12 16:54:17', '2018-03-12 16:54:17', NULL, '11.00', NULL, NULL),
('YrktTuYcGf5wiaoHYga9Ci9gcosUedqk', '铁北 民乐家园 80㎡ 22万', 34, -1, 5, 4, '铁北 民乐家园 2单元101', '李玉刚', '18170811018', '22.00', 'xiaobai_1521002058_w3wVHf1gR0.jpg|xiaobai_1521002058_hRk83qiJvg.jpg|xiaobai_1521002058_4sybBa8rJQ.jpg|', '业主去外地打工，', '2018-03-14 12:38:35', '2018-03-14 12:38:35', NULL, '80.00', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `house_style`
--

CREATE TABLE `house_style` (
  `id` int(11) NOT NULL,
  `_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `house_style`
--

INSERT INTO `house_style` (`id`, `_name`) VALUES
(-1, '其它'),
(2, '一室一厅'),
(3, '两室一厅'),
(4, '三室两厅'),
(5, '复式loft'),
(6, '三室三厅');

-- --------------------------------------------------------

--
-- 表的结构 `laravel_sms`
--

CREATE TABLE `laravel_sms` (
  `id` int(10) UNSIGNED NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `temp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `voice_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `fail_times` mediumint(9) NOT NULL DEFAULT '0',
  `last_fail_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `sent_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `result_info` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2015_12_21_111514_create_sms_table', 1),
(4, '2018_10_12_100000_create_password_resets_table', 2),
(5, '2018_10_12_000000_create_users_table', 3);

-- --------------------------------------------------------

--
-- 表的结构 `password_resets`
--

CREATE TABLE `password_resets` (
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `region_list`
--

CREATE TABLE `region_list` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `region_list`
--

INSERT INTO `region_list` (`id`, `parent_id`, `_name`) VALUES
(-1, 0, '其它'),
(-1, 24, '其它'),
(-1, 33, '其它'),
(-1, 34, '其它'),
(24, 0, '河南新区'),
(26, 24, '天成国际'),
(33, 0, '天健'),
(34, 0, '铁北');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `password`, `permission`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '白宇', '13155818531', '$2y$10$ezwzK5yjD6zZaa1M/qJJSeUAlGmPSEIKIKCvFQycZ0p3NxxlH3Eay', '0', 'F4SCh7HJm8lXPlbtDs0IJ5p1IWtAAhBUMdZhDW0FTlvqjbCZ4mLW8HSNSieD', '2018-03-13 11:58:31', '2018-03-13 11:58:31');

-- --------------------------------------------------------

--
-- 替换视图以便查看 `v_house`
-- (See below for the actual view)
--
CREATE TABLE `v_house` (
`id` varchar(32)
,`title` varchar(200)
,`region` varchar(200)
,`housing` varchar(200)
,`area` decimal(6,2)
,`price` decimal(6,2)
,`style` varchar(200)
,`decorate` varchar(200)
,`updated_at` datetime
,`detail` text
,`address` varchar(300)
,`imgs` text
,`host_name` varchar(100)
,`host_tel` varchar(11)
,`deleted_at` datetime
);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `v_housing`
-- (See below for the actual view)
--
CREATE TABLE `v_housing` (
`id` int(11)
,`parent_id` int(11)
,`name` varchar(200)
,`pname` varchar(200)
);

-- --------------------------------------------------------

--
-- 视图结构 `v_house`
--
DROP TABLE IF EXISTS `v_house`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_house`  AS  select `house_list`.`id` AS `id`,`house_list`.`title` AS `title`,`v_housing`.`pname` AS `region`,`v_housing`.`name` AS `housing`,`house_list`.`area` AS `area`,`house_list`.`price` AS `price`,`house_style`.`_name` AS `style`,`decorate_list`.`_name` AS `decorate`,`house_list`.`updated_at` AS `updated_at`,`house_list`.`detail` AS `detail`,`house_list`.`address` AS `address`,`house_list`.`imgs` AS `imgs`,`house_list`.`host_name` AS `host_name`,`house_list`.`host_tel` AS `host_tel`,`house_list`.`deleted_at` AS `deleted_at` from (((`house_list` join `v_housing` on(((`house_list`.`housing` = `v_housing`.`id`) and (`house_list`.`region` = `v_housing`.`parent_id`)))) join `house_style` on((`house_list`.`style` = `house_style`.`id`))) join `decorate_list` on((`decorate_list`.`id` = `house_list`.`decorate`))) ;

-- --------------------------------------------------------

--
-- 视图结构 `v_housing`
--
DROP TABLE IF EXISTS `v_housing`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_housing`  AS  select `A`.`id` AS `id`,`A`.`parent_id` AS `parent_id`,`A`.`_name` AS `name`,(select `region_list`.`_name` from `region_list` where (`region_list`.`id` = `A`.`parent_id`)) AS `pname` from `region_list` `A` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `decorate_list`
--
ALTER TABLE `decorate_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house_list`
--
ALTER TABLE `house_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_region` (`region`),
  ADD KEY `index_housing` (`housing`),
  ADD KEY `index_style` (`style`),
  ADD KEY `index_decorate` (`decorate`),
  ADD KEY `index_price` (`price`),
  ADD KEY `index_update_time` (`updated_at`);

--
-- Indexes for table `house_style`
--
ALTER TABLE `house_style`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_sms`
--
ALTER TABLE `laravel_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_phone_index` (`phone`);

--
-- Indexes for table `region_list`
--
ALTER TABLE `region_list`
  ADD PRIMARY KEY (`id`,`parent_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `decorate_list`
--
ALTER TABLE `decorate_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `house_style`
--
ALTER TABLE `house_style`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `laravel_sms`
--
ALTER TABLE `laravel_sms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `region_list`
--
ALTER TABLE `region_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
