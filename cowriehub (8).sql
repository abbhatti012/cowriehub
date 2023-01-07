-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2022 at 09:23 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cowriehub`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `billing_detail` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_detail` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `billing_detail`, `shipping_detail`, `created_at`, `updated_at`) VALUES
(5, 34, 'a:8:{s:6:\"_token\";s:40:\"x6h72ETt8i07STfpF8o1zAkmAoKydwiMjmrz7JCq\";s:10:\"first_name\";s:5:\"Abdul\";s:9:\"last_name\";s:5:\"Basit\";s:7:\"country\";s:2:\"PK\";s:5:\"email\";s:16:\"john@yopmail.com\";s:7:\"address\";s:14:\"Street address\";s:5:\"phone\";s:10:\"1234567890\";s:5:\"notes\";s:5:\"Notes\";}', NULL, '2022-08-27 13:12:48', '2022-08-27 13:12:48'),
(6, 23, 'a:8:{s:6:\"_token\";s:40:\"UCgKswdacdsCoFrFejegKqTZjnjYUU2WlGC2kK9G\";s:10:\"first_name\";s:5:\"Abdul\";s:9:\"last_name\";s:5:\"Basit\";s:7:\"country\";s:2:\"PK\";s:5:\"email\";s:16:\"user@yopmail.com\";s:7:\"address\";s:14:\"Street address\";s:5:\"phone\";s:18:\"+1 (689) 766-16443\";s:5:\"notes\";s:16:\"Additional Notes\";}', NULL, '2022-08-28 07:28:13', '2022-08-28 07:28:13'),
(7, 36, 'a:8:{s:6:\"_token\";s:40:\"NzNJjy3UCFqRFZkIKJnKHIjci4UlKdcOL1jMjbqi\";s:10:\"first_name\";s:5:\"Abdul\";s:9:\"last_name\";s:5:\"Basit\";s:7:\"country\";s:2:\"PK\";s:5:\"email\";s:16:\"john@yopmail.com\";s:7:\"address\";s:12:\"Address Here\";s:5:\"phone\";s:10:\"1234567890\";s:5:\"notes\";s:10:\"Notes Here\";}', NULL, '2022-08-28 13:43:22', '2022-08-28 13:43:22'),
(8, 82, 'a:8:{s:6:\"_token\";s:40:\"m9tKZsvTPm6XSYdgfLlGwHpFywXtTpQARO8SpYYf\";s:10:\"first_name\";s:5:\"Abdul\";s:9:\"last_name\";s:5:\"Basit\";s:7:\"country\";s:2:\"PK\";s:5:\"email\";s:18:\"test12@yopmail.com\";s:7:\"address\";s:12:\"address here\";s:5:\"phone\";s:10:\"1234567890\";s:5:\"notes\";s:5:\"Notes\";}', NULL, '2022-09-11 14:51:55', '2022-09-11 14:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `affiliates`
--

CREATE TABLE `affiliates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referrel_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landmark_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_agree_policy` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `payment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `networks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `affiliates`
--

INSERT INTO `affiliates` (`id`, `user_id`, `company_name`, `company_email`, `company_phone`, `referrel_code`, `landmark_area`, `is_agree_policy`, `status`, `payment`, `account_name`, `account_number`, `networks`, `bank_account_name`, `bank_account_number`, `bank_name`, `branch`, `primary_account`, `created_at`, `updated_at`) VALUES
(3, 36, NULL, NULL, NULL, NULL, NULL, 0, 0, 'bank_settelments', 'test account name', 'test account number', 'at', 'Bank Name', 'Bank Number', 'test bank name', 'branch name', 'mobile_money', '2022-09-03 11:40:55', '2022-09-03 11:44:31'),
(4, 23, NULL, NULL, NULL, NULL, NULL, 0, 1, 'bank_settelments', 'test account name', 'test account number', 'at', 'UBL', '1234567890', 'UBL', 'Lahore', 'bank', '2022-09-04 08:36:04', '2022-09-06 14:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `author-detail`
--

CREATE TABLE `author-detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biography` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `achievement` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `networks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `author-detail`
--

INSERT INTO `author-detail` (`id`, `user_id`, `cover`, `profile`, `name`, `biography`, `achievement`, `email`, `address`, `website`, `facebook`, `twitter`, `instagram`, `payment`, `account_name`, `account_number`, `networks`, `bank_account_name`, `bank_account_number`, `bank_name`, `branch`, `primary_account`, `cover_type`, `status`, `created_at`, `updated_at`) VALUES
(12, 23, 'images/authors/1661711334.png', 'images/authors/1661711335.png', 'Carol Knox', 'auto', 'achievements', 'user@yopmail.com', 'Street address', 'https://www.hojyvo.com', 'www.facebook.com', 'www.twitter.com', 'www.instagram.com', 'mobile_money', NULL, NULL, 'at', '', '', '', '', NULL, 'portrait', 1, '2022-08-28 13:28:55', '2022-08-28 13:31:24'),
(13, 36, 'images/authors/1662223896.png', 'images/authors/1662223897.psd', 'Carol Knox', 'Testing', 'Testin', 'john@yopmail.com', 'Lahore', 'https://www.hojyvo.com', 'www.facebook.com', 'www.twitter.com', 'www.instagram.com', 'bank_settelments', 'test account name', 'test account number', 'at', 'Bank Name', 'test account number', 'test bank name', 'branch name', 'mobile_money', 'portrait', 1, '2022-09-03 11:51:37', '2022-09-03 11:55:56');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `type`, `title`, `month`, `category`, `banner`, `created_at`, `updated_at`) VALUES
(2, 'The Bookworm Editors', 'Featured books of the', 'February', 'Hero Banner', 'images/banners/1652624751.jpg', '2022-05-15 09:25:51', '2022-05-15 09:25:51'),
(3, 'The Bookworm Editors', 'Featured books of the', 'February', 'Hero Banner', 'images/banners/1652624771.jpg', '2022-05-15 09:26:11', '2022-05-15 09:26:11'),
(4, 'The Bookworm Editors', 'Featured books of the', 'February', 'Hero Banner', 'images/banners/1652624788.png', '2022-05-15 09:26:28', '2022-05-15 09:26:28'),
(5, 'The Bookworm Editors', 'Featured books of the', 'February', 'Hero Banner', 'images/banners/1652624803.png', '2022-05-15 09:26:43', '2022-05-15 09:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `long_description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Biographies & Memoirs', 'It’s nice to win awards. Last night, the Ueno team in Reykjavík came home from the Icelandic Web Awards.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt, erat in malesuada aliquam, est erat faucibus purus, eget viverra nulla sem vitae neque. Quisque id sodales libero. In nec enim nisi, in ultricies quam. Sed lacinia feugiat velit, cursus molestie lectus mollis et.</p><p>Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum. Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus. Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue. Pellentesque vitae eros eget enim mollis placerat. Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus. Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue. Pellentesque vitae eros eget enim mollis placerat.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum, leo metus luctus sem, vel vulputate diam ipsum sed lorem. Donec tempor arcu nisl, et molestie massa scelerisque ut. Nunc at rutrum leo. Mauris metus mauris, tristique quis sapien eu, rutrum vulputate enim.</p><p>Pellentesque sodales augue eget ultricies ultricies. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur sagittis ultrices condimentum.</p>', 'images/books/b1652303719.jpg', '2022-08-14 15:47:33', '2022-08-14 16:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hero_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sample` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `synopsis` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT 0,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher_id` int(11) NOT NULL DEFAULT 0,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `hard_price` double(8,2) DEFAULT NULL,
  `hard_page` double(8,2) DEFAULT NULL,
  `hard_isbn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hard_weight` double(8,2) DEFAULT NULL,
  `hard_ship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hard_allow_preorders` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hard_expected_shipment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hard_stock` double(8,2) DEFAULT NULL,
  `paper_price` double(8,2) DEFAULT NULL,
  `paper_page` double(8,2) DEFAULT NULL,
  `paper_isbn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paper_weight` double(8,2) DEFAULT NULL,
  `paper_ship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paper_allow_preorders` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paper_expected_shipment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paper_stock` double(8,2) DEFAULT NULL,
  `digital_price` double(8,2) DEFAULT NULL,
  `digital_page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `digital_isbn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `epub` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_hardcover` int(11) NOT NULL DEFAULT 0,
  `is_paperback` int(11) NOT NULL DEFAULT 0,
  `is_digital` int(11) NOT NULL DEFAULT 0,
  `is_featured` int(11) NOT NULL DEFAULT 0,
  `is_sale` int(11) NOT NULL DEFAULT 0,
  `is_most_viewed` int(11) NOT NULL DEFAULT 0,
  `is_new` int(11) NOT NULL DEFAULT 0,
  `is_biographies` int(11) NOT NULL DEFAULT 0,
  `is_best` int(11) NOT NULL DEFAULT 0,
  `is_campaign` int(11) NOT NULL DEFAULT 0,
  `old_price` int(11) DEFAULT NULL,
  `cover_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_reviews` int(11) NOT NULL DEFAULT 0,
  `total_ratings` int(11) NOT NULL DEFAULT 0,
  `book_purchased` int(11) NOT NULL DEFAULT 0,
  `searches` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `user_id`, `role`, `hero_image`, `cover`, `sample`, `trailer`, `title`, `slug`, `price`, `subtitle`, `synopsis`, `quantity`, `genre`, `sub_author`, `publisher`, `publisher_id`, `country`, `publication_date`, `status`, `hard_price`, `hard_page`, `hard_isbn`, `hard_weight`, `hard_ship`, `hard_allow_preorders`, `hard_expected_shipment`, `hard_stock`, `paper_price`, `paper_page`, `paper_isbn`, `paper_weight`, `paper_ship`, `paper_allow_preorders`, `paper_expected_shipment`, `paper_stock`, `digital_price`, `digital_page`, `digital_isbn`, `epub`, `is_hardcover`, `is_paperback`, `is_digital`, `is_featured`, `is_sale`, `is_most_viewed`, `is_new`, `is_biographies`, `is_best`, `is_campaign`, `old_price`, `cover_type`, `total_reviews`, `total_ratings`, `book_purchased`, `searches`, `created_at`, `updated_at`) VALUES
(8, 1, 'admin', 'images/books/a1652303888.jpg', 'images/books/b1652303888.jpg', 'images/books/c1652303888.pdf', NULL, 'OUR WORLD OUR PEOPLE FOR PRIMARY 1- EXCELLENCE SERIES', 'our-world-our-people-for-primary-1-excellence-series', 100, 'OUR WORLD OUR PEOPLE FOR PRIMARY 1- EXCELLENCE SERIES', 'OUR WORLD OUR PEOPLE FOR PRIMARY 1 (EXCELLENCE SERIES). THIS BOOK IS APPROVED BY NACCA FOR TUITION AND STUDIES.', 20, '4', NULL, 'Published by EXCELLENCE PUBLICATION AND STATIONERY LIMITED, Ghana on Mon Nov 01 2021', 0, 'Ghana', '2022-05-18', 1, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 45.00, 45.00, 'asdfghjk', 1.00, '0', '', '', 45.00, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 1, 0, 0, 0, 1, 1, 100, 'portrait', 1, 3, 0, 0, '2022-05-11 16:18:08', '2022-05-22 16:41:37'),
(9, 1, 'admin', 'images/books/a1652304031.jpg', 'images/books/b1652304031.jpg', 'images/books/c1652304031.pdf', NULL, 'AABOK RELIGIOUS AND MORAL EDUCATION BOOK 1', 'aabok-religious-and-moral-education-book-1', 100, 'AABOK RELIGIOUS AND MORAL EDUCATION BOOK 1', 'A very simple but comprehensive textbook. This book has been approved by NACCA for use in all basic schools in Ghana.', 20, '4', NULL, 'Published by AABOK PUBLICATION, Ghana on Fri Jan 22 2021', 0, 'Ghana', '2022-05-19', 1, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 100.00, 40.00, '9789988637767', 1.00, '0', '', '', 40.00, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 1, 0, 0, 1, 1, 1, 100, 'landscape', 1, 5, 7, 3, '2022-05-11 16:20:31', '2022-09-12 15:55:59'),
(10, 1, 'admin', 'images/books/a1652304156.jpg', 'images/books/b1652304156.jpg', 'images/books/c1652304156.pdf', NULL, 'AABOK RELIGIOUS AND MORAL EDUCATION BOOK 2', 'aabok-religious-and-moral-education-book-2', 100, 'AABOK RELIGIOUS AND MORAL EDUCATION BOOK 2', 'A very simple but comprehensive textbook. This book has been approved by NACCA for use in all basic schools in Ghana.', 20, '1', NULL, 'Published by AABOK PUBLICATION, Ghana on Fri Jan 22 2021', 0, 'Ghana', '2022-05-12', 1, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 100.00, 40.00, '9789988637095', 1.00, '0', '', '', 40.00, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 1, 0, 0, 1, 1, 1, 100, 'landscape', 0, 0, 0, 0, '2022-05-11 16:22:36', '2022-05-21 14:31:15'),
(11, 1, 'admin', 'images/books/a1652304407.jpg', 'images/books/b1652304407.jpg', 'images/books/c1652304407.pdf', NULL, 'I Testify', 'i-testify', 100, 'of His goodness', '\'I Testify’ is a book that recounts the true story of the life of the Author, her testimony of the unflinching love of God at her lowest level in her life. In the book, she tells of the challenges and the disappointments she faced as a young lady with the desire to stay pure until marriage, the difficulty she suffered whiles giving birth and the traumatic event that unfolded afterwards. She narrates how God intervened and why it is important to praise God, especially in times of difficulty. As you read, you will appreciate why it is important to have faith in God against all odds. Your lack of faith will not make your problems go awa y, anyway. It is better to depend on God than depend on yourself and strength, which will fail you.', 20, '4', NULL, 'Published by BKC Consulting, Ghana on Mon Jul 13 2020', 0, 'Ghana', '2022-05-19', 1, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 81.00, 81.00, '978-9988-53-909-2', 1.00, '0', '', '', 81.00, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 1, 0, 0, 1, 1, 1, 100, 'portrait', 0, 0, 0, 0, '2022-05-11 16:26:47', '2022-05-21 14:31:20'),
(12, 1, 'admin', 'images/books/a1652304580.jpg', 'images/books/b1652304580.jpg', 'images/books/c1652304580.pdf', NULL, 'AABOK RELIGIOUS AND MORAL EDUCATION BOOK 6', 'aabok-religious-and-moral-education-book-6', 100, 'AABOK RELIGIOUS AND MORAL EDUCATION BOOK 6', 'A very simple but comprehensive textbook. This book has been approved by NACCA for use in all basic schools in Ghana.', 20, '4', NULL, 'Published by AABOK PUBLICATIONS, Ghana on Fri Jan 22 2021', 0, 'Ghana', '2022-05-12', 1, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 100.00, 40.00, '9789988637215', 1.00, '0', '', '', 40.00, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 1, 0, 0, 1, 1, 0, NULL, 'landscape', 0, 0, 0, 0, '2022-05-11 16:29:40', '2022-05-21 14:31:23'),
(13, 1, 'admin', 'images/books/a1652304802.jpg', 'images/books/b1652304802.jpg', 'images/books/c1652304802.pdf', NULL, 'AABOK RELIGIOUS AND MORAL EDUCATION BOOK 6', 'aabok-religious-and-moral-education-book-6', 100, 'AABOK RELIGIOUS AND MORAL EDUCATION BOOK 6', 'A very simple but comprehensive textbook. This book has been approved by NACCA for use in all basic schools in Ghana.', 20, '4', NULL, 'Published by AABOK PUBLICATIONS, Ghana on Fri Jan 22 2021', 0, 'Ghana', '2022-05-12', 1, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 100.00, 40.00, '9789988637215', 1.00, '0', '', '', 44.00, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 1, 0, 0, 1, 1, 0, NULL, 'landscape', 0, 0, 0, 0, '2022-05-11 16:33:22', '2022-05-21 14:31:26'),
(14, 1, 'admin', 'images/books/a1652304931.jpg', 'images/books/b1652304931.jpg', 'images/books/c1652304931.pdf', NULL, 'SHOOT EM DOWN', 'shoot-em-down', 100, 'Discover modern insights for building a solid business from scratch.', 'Building a solid company from scratch is no joke. Most importantly, a lot of things have changed over the past few years, giving room for fresher business concepts, insights, and strategies to run successful businesses in this modern age. Written by an outstanding African Entrepreneur and business consultant who doubles as an international marketing and business strategist working with different clients in various markets across Africa and Europe, “Shoot Em Down” is loaded with detailed guidance on key aspects of building an impactful business from scratch. You’ll learn how to: • Scan business opportunities like a professional • Design a p urposeful organization • Model your business idea into an actual business • Improve your current business model • Manage basic business crisis • Create compelling marketing campaigns • Establish meaningful business partnerships', 20, '4', NULL, 'Published by Platinum Africa Solutions Limited, Ghana on Tue Mar 02 2021', 0, 'Ghana', '2022-05-12', 1, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 102.00, 102.00, '978-164970117-6', 1.00, '0', '', '', 102.00, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 1, 0, 0, 1, 1, 0, NULL, 'portrait', 2, 10, 4, 0, '2022-05-11 16:35:31', '2022-08-28 07:46:57'),
(15, 1, 'admin', 'images/books/a1652305051.jpg', 'images/books/b1652305051.jpg', 'images/books/c1652305051.pdf', NULL, 'WRITERPRENEUR', 'writerpreneur', 100, '25 Innovative Secrets to Generate Multiple Income Streams as a Writer', 'Many writers have been in various forms of dilemmas when it comes to making use of their creativity to earn good money. There are many beliefs that a writer can only make money from authoring a book. Unknowingly however, there are other ways available to writers that rather generate even more than just writing and publishing a book. There is a great opportunity to earn good money by using writing as the foundation to solve people’s problems. It is not about accessibility which becomes the challenge to these creative secrets but rather the realization that such even exist. There are many accessible ways writers can position themselves to make good money either on fulltime or part time basis when explored and taken advantage of. This book is to help reveal many of these secrets, how and where to access them, and the ability to take advantage of them to realize their long-cherished dreams of becoming entrepreneurial writers. This will bring in multiple streams of income and will create that dream business for the writer. To the ‘newbies’ who are yet to begin the writing journey, this is more than a companion which will lead them to the ‘promise land’. Your writing journey is beginning in earnest and will propel you to greater heights with this material. You will not just write an d publish but also build a conglomerate from your writing. The concepts outlined are easy to assimilate and will direct you to be able to get the most out of your writing. Prepare to be educated, provoked, and redirected to the right path on your writing journey. There are 25 innovative secrets yet to be explored by writers. Get this material and explore. Your journey to the entrepreneurial side of writing begins now!', 20, '4', NULL, 'Published by PrintInnovation, Ghana on Wed Jun 10 2020', 0, 'Ghana', '2022-05-12', 1, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 137.00, 147.00, '978 – 9988 – 53 – 621 – 3', 1.00, '0', '', '', 137.00, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 1, 1, 1, 1, 1, 0, NULL, 'landscape', 0, 0, 56, 0, '2022-05-11 16:37:31', '2022-05-21 14:31:31'),
(16, 1, 'admin', 'images/books/a1652305336.jpg', 'images/books/b1652305336.jpg', 'images/books/c1652305336.pdf', NULL, 'CREATIVE ARTS AND DESIGN FOR JHS ONE (BASIC 7)', 'creative-arts-and-design-for-jhs-one-basic-7', 150, 'creative book', 'CREATIVE ARTS AND DESIGN FOR JHS ONE', 20, '4', NULL, 'Published by EXCELLENCE PUBLICATION AND STATIONERY LIMITED, Ghana on Thu Sep 30 2021', 0, 'Ghana', '2022-05-12', 1, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 450.00, 450.00, '9786144687890', 1.00, '0', '', '', 21.00, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 0, 1, 1, 1, 0, 0, NULL, 'landscape', 0, 0, 0, 0, '2022-05-11 16:42:16', '2022-05-21 14:31:34'),
(17, 1, 'admin', 'images/books/a1652305428.jpg', 'images/books/b1652305428.jpg', 'images/books/c1652305428.pdf', NULL, 'EXCELLENCE SCIENCE JHS 1', 'excellence-science-jhs-1', 100, 'EXCELLENCE SCIENCE JHS 1', 'THIS IS A NACCA APPROVED BOOK FOR JHS 1', 20, '4', NULL, 'blished by EXCELLENCE PUBLICATION, Ghana on Tue Sep 10 2019', 0, 'Ghana', '2022-05-12', 1, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 187.00, 187.00, '978-9988-8884-5-9', 187.00, '0', '', '', 187.00, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 0, 1, 1, 0, 0, 0, NULL, 'portrait', 0, 0, 0, 0, '2022-05-11 16:43:48', '2022-05-21 14:31:38'),
(18, 1, 'admin', 'images/books/a1652305535.jpg', 'images/books/b1652305535.jpg', 'images/books/c1652305535.pdf', NULL, 'EXCELLENCE MATHEMATICS JHS 1', 'excellence-mathematics-jhs-1', 123, 'EXCELLENCE MATHEMATICS JHS 1', 'THIS IS A NACCA APPROVED BOOK FOR JHS 1', 20, '4', NULL, 'Published by EXCELLENCE PUBLICATION, Ghana on Tue Sep 10 2019', 0, 'Ghana', '2022-05-11', 1, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 372.00, 372.00, '978-9988-8884-4-2', 372.00, '0', '', '', 372.00, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 0, 1, 1, 0, 0, 0, NULL, 'landscape', 0, 0, 0, 0, '2022-05-11 16:45:35', '2022-05-21 14:31:41'),
(19, 1, 'admin', 'images/books/a1652305619.jpg', 'images/books/b1652305619.jpg', 'images/books/c1652305619.pdf', NULL, 'ALPHA NUMERACY FOR KG 2', 'alpha-numeracy-for-kg-2', 123, 'ALPHA NUMERACY FOR KG 2', 'ALPHA NUMERACY FOR KG 2', 20, '4', NULL, 'Published by ALPHA AND OMEGA PUBLICATIONS, Ghana on Mon Dec 06 2021', 0, 'Ghana', '2022-05-12', 1, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 120.00, 120.00, '9786144455768', 120.00, '0', '', '', 120.00, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 0, 1, 1, 0, 0, 0, NULL, 'landscape', 0, 0, 0, 0, '2022-05-11 16:46:59', '2022-05-21 14:31:52'),
(20, 1, 'admin', 'images/books/a1652305703.jpg', 'images/books/b1652305703.jpg', 'images/books/c1652305703.pdf', NULL, 'ALPHA NUMERACY FOR KG 1', 'alpha-numeracy-for-kg-1', 100, 'ALPHA NUMERACY FOR KG 1', 'ALPHA NUMERACY FOR KG 1', 20, '4', NULL, 'Published by ALPHA AND OMEGA PUBLICATIONS, Ghana on Mon Dec 06 2021', 0, 'Ghana', '2022-05-12', 1, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 100.00, 100.00, '9786144456546', 1.00, '0', '', '', 12.00, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 0, 1, 1, 0, 0, 0, NULL, 'portrait', 0, 0, 0, 1, '2022-05-11 16:48:23', '2022-08-27 13:07:15'),
(21, 1, 'admin', 'images/books/a1652305801.jpg', 'images/books/b1652305801.jpg', 'images/books/c1652305801.pdf', NULL, 'ALPHA NUMERACY FOR NURSERY 2', 'alpha-numeracy-for-nursery-2', 123, 'ALPHA NUMERACY FOR NURSERY 2', 'ALPHA NUMERACY FOR NURSERY 2', 20, '4', NULL, 'Published by ALPHA AND OMEGA PUBLICATIONS, Ghana on Mon Dec 06 2021', 0, 'Ghana', '2022-05-05', 1, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 120.00, 120.00, '9786144789876', 1.00, '0', '', '', 120.00, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 0, 1, 1, 0, 0, 0, NULL, 'landscape', 0, 0, 0, 0, '2022-05-11 16:50:01', '2022-05-21 14:31:59'),
(22, 1, 'admin', 'images/books/a1652305889.jpg', 'images/books/b1652305889.jpg', 'images/books/c1652305889.pdf', NULL, 'ALPHA NUMERACY FOR NURSERY 1', 'alpha-numeracy-for-nursery-1', 123, 'ALPHA NUMERACY FOR NURSERY 1', 'ALPHA NUMERACY FOR NURSERY 1', 20, '4', NULL, 'Published by ALPHA AND OMEGA PUBLICATIONS, Ghana on Mon Dec 06 2021', 0, 'Ghana', '2022-05-15', 1, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 120.00, 120.00, '978614498789', 120.00, '0', '', '', 120.00, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 0, 1, 1, 0, 0, 0, NULL, 'landscape', 0, 0, 0, 0, '2022-05-11 16:51:29', '2022-05-21 14:32:03'),
(23, 1, 'admin', 'images/books/a1652305976.jpg', 'images/books/b1652305976.jpg', 'images/books/c1652305976.pdf', NULL, 'ALPHA HANDWRITING BOOK 4', 'alpha-handwriting-book-4', 123, 'ALPHA HANDWRITING BOOK 4', 'ALPHA HANDWRITING BOOK 4', 20, '4', NULL, 'Published by ALPHA AND OMEGA PUBLICATIONS, Ghana on Tue Dec 07 2021', 0, 'Ghana', '2022-05-12', 1, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 100.00, 100.00, '9786144765879', 100.00, '0', '', '', 100.00, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 0, 1, 1, 0, 0, 0, NULL, 'portrait', 0, 0, 0, 0, '2022-05-11 16:52:56', '2022-05-21 14:32:06'),
(25, 1, 'admin', 'images/books/a1653082589.png', 'images/books/b1653082589.png', 'images/books/c1653082589.png', NULL, 'Id aut quidem dolori', 'id-aut-quidem-dolori', 860, 'Eius libero perspici', 'Excepteur unde deser', 20, '1', NULL, 'Doloremque recusanda', 0, 'Fiji', '1990-08-01', 1, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 'landscape', 0, 0, 0, 0, '2022-05-20 16:36:29', '2022-05-20 16:36:29'),
(26, 1, 'admin', 'images/books/a1653746013.png', 'images/books/b1653746013.png', 'images/books/c1653746013.pdf', NULL, 'With pre order', 'with-pre-order', 100, 'With pre order', 'Testing Description', 20, '2', '3,8', 'Test Publisher', 0, 'Pakistan', '2022-05-28', 1, 150.00, 2.00, 'asdfrgthjk', 2.00, '0', '1', '2022-06-11', 12.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, NULL, 'landscape', 0, 0, 5, 0, '2022-05-28 08:53:33', '2022-06-01 16:08:26'),
(27, 1, 'admin', 'images/books/a1653746348.png', 'images/books/b1653746348.png', 'images/books/c1653746349.pdf', NULL, 'With pre order 2', 'with-pre-order-2', 100, 'With pre order 2', 'Testing Description', 20, '2', NULL, 'Test Publisher', 0, 'Pakistan', '2022-05-28', 1, 150.00, 2.00, 'asdfrgthjk', 2.00, '1', '0', '2022-06-11', NULL, 170.00, 4.00, 'qweryut', 4.00, '1', '1', '2022-06-09', 3.00, NULL, NULL, NULL, NULL, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, NULL, 'landscape', 0, 0, 2, 0, '2022-05-28 08:59:09', '2022-06-15 16:40:01'),
(28, 1, 'admin', 'images/books/a1653859060.jpg', 'images/books/b1653859060.webp', 'images/books/c1653859060.pdf', NULL, 'preorder testing', 'preorder-testing', 1, 'preorder testing', 'Testing description', 20, '3', NULL, 'publisher here', 0, 'Pakistan', '2022-05-30', 1, 0.00, 12.00, 'asdfghjkl', 2.00, '0', '1', '2022-06-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, NULL, 'landscape', 0, 0, 0, 0, '2022-05-29 16:17:40', '2022-05-29 16:36:40'),
(32, 1, 'admin', 'images/books/a1659282923.png', 'images/books/b1659282923.png', 'images/books/c1659282923.pdf', NULL, 'Book title', 'book-title', 100, 'Test Subtitle', 'Test Description', 20, '2', NULL, 'publisher here', 0, 'Pakistan', '2022-07-31', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 'landscape', 0, 0, 0, 0, '2022-07-31 10:55:23', '2022-07-31 10:55:23'),
(33, 1, 'admin', 'images/books/a1659283233.jpg', 'images/books/b1659283233.webp', 'images/books/c1659283233.pdf', NULL, 'Test Title', 'test-title', 100, 'subtitle here', 'Description', 20, '2', NULL, 'publisher here', 0, 'Pakistan', '2022-07-31', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 'landscape', 0, 0, 0, 0, '2022-07-31 11:00:33', '2022-07-31 11:00:33'),
(38, 23, 'author', 'images/books/a1661718640.png', 'images/books/b1661711602.png', 'images/books/c1661711602.png', 'images/books/b1663104273.mp4', 'Title Here', 'title-here', 100, 'In non molestias qua', 'Description Here', 20, '2', NULL, 'publisher here', 0, 'Pakistan', '2022-08-29', 1, 50.00, 2.00, 'asdfghjkl', 100.00, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, '2022-08-28 13:33:22', '2022-09-13 16:27:34');

-- --------------------------------------------------------

--
-- Table structure for table `consultant`
--

CREATE TABLE `consultant` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `skill` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_skill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skill_certificate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_of_completion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identity_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro_viedo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `portfolio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `networks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultant`
--

INSERT INTO `consultant` (`id`, `user_id`, `job_id`, `skill`, `custom_skill`, `skill_certificate`, `phone_number`, `country`, `address`, `institution`, `year_of_completion`, `id_type`, `identity_card`, `intro_viedo`, `description`, `portfolio`, `terms`, `payment`, `account_name`, `account_number`, `networks`, `bank_account_name`, `bank_account_number`, `bank_name`, `branch`, `primary_account`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(10, 23, NULL, 'Skill', NULL, 'images/consultant/a1661713036.pdf', '+92 3111671835', 'pk', 'Address Here', 'Institutaion Here', 'present', 'natioanl_id', 'images/consultant/b1661713036.png', 'images/consultant/c1661713036.png', 'Summary Here', 'images/consultant/d1661713036.pdf', '1', 'mobile_money', 'test account name', 'test account number', 'at', '', '', '', '', NULL, 0, NULL, '2022-08-28 13:57:16', '2022-09-04 09:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `phone`, `detail`, `created_at`, `updated_at`) VALUES
(3, 'Abdul Basit', 'john@gmail.com', 'Subject', '1234567890', 'Details', '2022-09-03 10:28:54', '2022-09-03 10:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `off` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `book_id`, `user_id`, `code`, `start_date`, `end_date`, `off`, `is_active`, `created_at`, `updated_at`) VALUES
(13, 'a:5:{i:0;s:1:\"7\";i:1;s:1:\"8\";i:2;s:1:\"9\";i:3;s:2:\"10\";i:4;s:2:\"11\";}', 1, '32423', '2022-06-16', '2022-08-31', 23, 1, '2022-06-17 16:27:10', '2022-08-14 03:17:59'),
(15, 'a:1:{i:0;s:1:\"9\";}', 1, '3244', '2022-06-16', '2022-08-31', 23, 1, '2022-08-14 03:16:14', '2022-08-14 03:16:14'),
(16, 'a:2:{i:0;s:1:\"7\";i:1;s:2:\"29\";}', 2, '289439', '2022-08-14', '2022-08-31', 3, 0, '2022-08-14 14:33:11', '2022-08-14 14:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exchange_rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `currency_symbol`, `currency_code`, `exchange_rate`, `default`, `created_at`, `updated_at`) VALUES
(1, '$', 'USD', '1', 1, '2022-08-28 03:54:38', '2022-08-28 03:54:38'),
(2, '¢', 'GHS', '10.03', 0, '2022-08-28 04:13:44', '2022-08-28 04:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `extra_fields`
--

CREATE TABLE `extra_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extra_fields`
--

INSERT INTO `extra_fields` (`id`, `book_id`, `user_id`, `label`, `value`, `created_at`, `updated_at`) VALUES
(5, 31, 1, 'Notice of sale', 'Test Notification', '2022-07-31 10:35:08', '2022-07-31 10:35:08'),
(6, 31, 1, 'Test record', 'Test Notification', '2022-07-31 10:35:08', '2022-07-31 10:35:08'),
(12, 33, 1, 'Notification confirmed on publication', 'Test Notification', '2022-07-31 12:42:16', '2022-07-31 12:42:16'),
(13, 33, 1, 'Update (partial)', 'Test Update', '2022-07-31 12:42:16', '2022-07-31 12:42:16'),
(14, 33, 1, 'Notice of acquisition', 'Test acquisition', '2022-07-31 12:42:16', '2022-07-31 12:42:16'),
(15, 7, 2, 'Notice of acquisition', 'Test Notification', '2022-08-01 15:42:46', '2022-08-01 15:42:46'),
(16, 7, 2, 'Test record', 'Test Record', '2022-08-01 15:42:46', '2022-08-01 15:42:46'),
(17, 32, 1, 'Notification confirmed on publication', 'Test Notification', '2022-08-01 16:17:24', '2022-08-01 16:17:24'),
(18, 32, 1, 'Delete', 'Test Delete', '2022-08-01 16:17:24', '2022-08-01 16:17:24'),
(19, 32, 1, 'Notice of sale', 'Test Notice of sale', '2022-08-01 16:17:24', '2022-08-01 16:17:24'),
(20, 34, 2, 'Delete', 'Here', '2022-08-14 13:50:35', '2022-08-14 13:50:35'),
(21, 38, 23, 'Advance notification (confirmed)', 'Test Advance Notification', '2022-08-28 13:33:22', '2022-08-28 13:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Fiction', 'fiction', '2022-08-14 19:06:34', NULL),
(2, 'Non Fiction', 'non-fiction', '2022-08-14 19:06:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `marketing_id` bigint(20) UNSIGNED NOT NULL,
  `assign_to` bigint(20) NOT NULL,
  `admin_note` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_status` int(11) NOT NULL DEFAULT 0 COMMENT '1- Approved\r\n2- Rejected',
  `is_completed` int(11) NOT NULL DEFAULT 0,
  `reject_note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_payment` int(11) NOT NULL DEFAULT 0,
  `confirmation` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `marketing_id`, `assign_to`, `admin_note`, `job_status`, `is_completed`, `reject_note`, `document`, `document_note`, `payment_note`, `payment_proof`, `is_payment`, `confirmation`, `created_at`, `updated_at`) VALUES
(7, 23, 2, 23, 'Hi, This is your first job. I hope you will make a good job.', 1, 1, NULL, 'a:1:{i:0;s:33:\"images/consultant/01661713955.pdf\";}', 'Job Has Been Completed!', 'ok thanks.\r\nGood Job.', 'images/consultant/1661714002.png', 1, 1, '2022-08-28 14:09:58', '2022-08-28 14:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_cod` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `weight`, `location`, `price`, `type`, `is_cod`, `created_at`, `updated_at`) VALUES
(3, '5-10', 'Karachi', '200', 'express', NULL, '2022-05-24 22:23:19', '2022-05-24 17:23:19'),
(4, '0-5', 'Lahore', '100', 'standard', NULL, '2022-05-27 22:35:02', '2022-05-27 17:35:02'),
(5, '10-15', 'Multan', '0', 'standard', NULL, '2022-05-28 12:15:15', '2022-05-28 07:15:15'),
(6, '15-20', 'Islamabad', '400', 'express', '1', '2022-05-28 12:52:59', '2022-08-13 12:49:15'),
(14, '2-10', 'With COD', '200', 'standard', '1', '2022-06-02 20:21:18', '2022-06-02 15:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `marketing`
--

CREATE TABLE `marketing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `point` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marketing`
--

INSERT INTO `marketing` (`id`, `package`, `price`, `duration`, `point`, `created_at`, `updated_at`) VALUES
(2, 'Starter 1', 25.90, 'Per Month 1', 'a:2:{i:0;s:29:\"Quality & Customer Experience\";i:1;s:28:\"Power And Predictive Dialing\";}', '2022-05-15 05:03:24', '2022-08-14 11:25:07'),
(3, 'Medium', 35.99, 'Per Month', 'a:4:{i:0;s:10:\"600+ pages\";i:1;s:29:\"Quality & Customer Experience\";i:2;s:28:\"Power And Predictive Dialing\";i:3;s:28:\"24/7 phone and email support\";}', '2022-05-15 05:04:05', '2022-05-15 05:04:05'),
(4, 'Professional', 45.99, 'Per Month', 'a:4:{i:0;s:10:\"600+ pages\";i:1;s:29:\"Quality & Customer Experience\";i:2;s:28:\"Power And Predictive Dialing\";i:3;s:28:\"24/7 phone and email support\";}', '2022-05-15 05:08:38', '2022-05-15 05:08:38'),
(5, 'Premium', 99.99, 'Per Month', 'a:4:{i:0;s:10:\"600+ pages\";i:1;s:29:\"Quality & Customer Experience\";i:2;s:28:\"Power And Predictive Dialing\";i:3;s:28:\"24/7 phone and email support\";}', '2022-05-15 05:09:12', '2022-05-15 05:09:12');

-- --------------------------------------------------------

--
-- Table structure for table `marketing_orders`
--

CREATE TABLE `marketing_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marketing_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_completed` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marketing_orders`
--

INSERT INTO `marketing_orders` (`id`, `marketing_id`, `user_id`, `first_name`, `last_name`, `email`, `phone`, `notes`, `is_completed`, `created_at`, `updated_at`) VALUES
(3, 2, 23, 'Abdul', 'Basit', 'admin@gmail.com', '1234567890', 'Notes', 0, '2022-08-28 14:09:23', '2022-08-28 14:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_25_205720_add_social_login_field', 1),
(6, '2022_05_01_210245_author-detail', 1),
(7, '2022_05_04_180947_create_genres_table', 1),
(8, '2022_05_04_181200_create_sub_genres_table', 1),
(9, '2022_05_04_211224_create_books_table', 1),
(10, '2022_05_14_201645_settings', 2),
(11, '2022_05_15_095300_marketing', 3),
(12, '2022_05_15_104619_marketing_orders', 4),
(13, '2022_05_15_114522_banners', 4),
(14, '2022_05_21_205815_reviews', 5),
(15, '2022_05_22_120259_wishlist', 6),
(16, '2022_05_22_194927_marketing_orders', 7),
(17, '2022_05_24_221133_locations', 7),
(18, '2022_05_28_171642_payments', 8),
(19, '2022_05_28_171658_orders', 8),
(20, '2022_05_28_173607_create_orders_table', 9),
(21, '2022_05_28_173637_create_payments_table', 9),
(22, '2022_06_02_204228_create_coupons_table', 10),
(23, '2022_06_18_125026_skills', 11),
(24, '2022_06_18_132656_consultant', 12),
(25, '2022_06_25_093546_create_publishers_table', 13),
(26, '2022_06_28_190913_create_jobs_table', 14),
(27, '2022_07_01_203916_revenue', 15),
(28, '2022_07_31_142740_extra_fields', 16),
(29, '2022_08_14_203958_create_blogs_table', 17),
(30, '2022_08_21_100050_create_pos_table', 18),
(31, '2022_08_21_112038_create_addresses_table', 19),
(32, '2022_08_21_115509_create_affiliates_table', 20),
(33, '2022_08_27_133754_create_contacts_table', 21),
(34, '2022_08_27_133823_create_subscribers_table', 21),
(35, '2022_08_27_162715_create_search_books_table', 22),
(36, '2022_08_28_072638_create_currencies_table', 23);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_owner_id` bigint(20) DEFAULT NULL,
  `role` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `is_preorder` int(11) NOT NULL,
  `extra_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_price` double(8,2) NOT NULL,
  `extra_price` double(8,2) NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `remaining_price` double(8,2) DEFAULT NULL,
  `amount_paid` float DEFAULT NULL COMMENT 'without shipping',
  `currency` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exchange_rate` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `payment_id`, `user_id`, `book_owner_id`, `role`, `book_id`, `is_preorder`, `extra_type`, `book_price`, `extra_price`, `total_price`, `quantity`, `remaining_price`, `amount_paid`, `currency`, `exchange_rate`, `deleted_at`, `created_at`, `updated_at`) VALUES
(112, 74, 36, 23, 'author', 38, 0, 'hardcover', 100.00, 50.00, 150.00, 2, 0.00, 300, 'USD', '1', NULL, '2022-08-28 13:45:17', '2022-08-28 13:45:17'),
(113, 76, 23, 1, 'admin', 9, 0, 'paperback', 100.00, 100.00, 200.00, 99, 0.00, 19800, 'USD', '1', NULL, '2022-08-28 14:29:38', '2022-08-28 14:29:38'),
(114, 77, 23, 1, 'admin', 9, 0, 'paperback', 100.00, 100.00, 200.00, 30, 0.00, 6000, 'USD', '1', NULL, '2022-09-06 15:17:08', '2022-09-06 15:17:08'),
(115, 78, 23, 1, 'admin', 14, 0, 'paperback', 100.00, 102.00, 202.00, 3, 0.00, 606, 'USD', '1', NULL, '2022-09-06 15:18:56', '2022-09-06 15:18:56'),
(116, 81, 82, 1, 'admin', 9, 0, 'paperback', 100.00, 100.00, 200.00, 1, 0.00, 200, 'USD', '1', NULL, '2022-09-11 14:52:24', '2022-09-11 14:52:24'),
(117, 82, 0, 1, 'admin', 9, 0, 'paperback', 100.00, 100.00, 200.00, 2, 0.00, 400, 'USD', '1', NULL, '2022-09-12 15:55:59', '2022-09-12 15:55:59'),
(118, 83, 0, 1, 'admin', 27, 1, '170', 100.00, 170.00, 470.00, 1, 443.00, 27, 'USD', '1', NULL, '2022-09-12 16:10:05', '2022-09-12 16:10:05'),
(119, 83, 0, 1, 'admin', 27, 1, '170', 100.00, 170.00, 470.00, 1, 443.00, 27, 'USD', '1', NULL, '2022-09-12 16:10:20', '2022-09-12 16:10:20'),
(120, 83, 0, 1, 'admin', 27, 1, '170', 100.00, 170.00, 470.00, 1, 443.00, 27, 'USD', '1', NULL, '2022-09-12 16:10:49', '2022-09-12 16:10:49'),
(121, 84, 23, 1, 'admin', 9, 0, 'paperback', 100.00, 100.00, 200.00, 1, 0.00, 200, 'USD', '1', NULL, '2022-09-13 14:30:01', '2022-09-13 14:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precise_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` float NOT NULL,
  `total_amount` float DEFAULT 0,
  `shipping_price` float DEFAULT 0,
  `billing_detail` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_detail` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_paid` float DEFAULT 0,
  `extraType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extraPrice` int(11) DEFAULT NULL,
  `book_id` bigint(20) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_fraud` int(11) NOT NULL DEFAULT 0,
  `is_preorder` int(11) NOT NULL DEFAULT 0,
  `token` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_coupon` int(11) NOT NULL DEFAULT 0,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_pos` int(11) DEFAULT 0,
  `is_pos_payment` int(11) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `transaction_id`, `location`, `precise_location`, `post_code`, `notes`, `subtotal`, `total_amount`, `shipping_price`, `billing_detail`, `shipping_detail`, `amount_paid`, `extraType`, `extraPrice`, `book_id`, `status`, `is_fraud`, `is_preorder`, `token`, `payment_method`, `is_coupon`, `coupon_code`, `is_pos`, `is_pos_payment`, `deleted_at`, `created_at`, `updated_at`) VALUES
(74, 36, '123', NULL, 'Lahore, Pakistan', '54000', NULL, 300, 0, 0, 'a:7:{s:10:\"first_name\";s:5:\"Abdul\";s:9:\"last_name\";s:5:\"Basit\";s:7:\"country\";s:2:\"PK\";s:15:\"billing_address\";s:12:\"Address Here\";s:5:\"phone\";s:10:\"1234567890\";s:5:\"email\";s:16:\"john@yopmail.com\";s:5:\"notes\";N;}', 'a:7:{s:10:\"first_name\";s:5:\"Abdul\";s:9:\"last_name\";N;s:7:\"country\";s:2:\"PK\";s:16:\"shipping_address\";s:12:\"Address Here\";s:5:\"phone\";s:10:\"1234567890\";s:5:\"email\";s:16:\"john@yopmail.com\";s:5:\"notes\";N;}', 300, NULL, NULL, NULL, 'cancelled', 0, 0, 'Vwzd9oPHokluCZaH5E7ZCphlpbrIHj5d', 'flutterwave', 0, NULL, 1, 2, NULL, '2022-08-28 13:42:56', '2022-09-04 14:53:45'),
(76, 23, '312', NULL, 'Lahore, Pakistan', '54000', NULL, 19800, 20200, 0, 'a:7:{s:10:\"first_name\";s:5:\"Abdul\";s:9:\"last_name\";s:5:\"Basit\";s:7:\"country\";s:2:\"PK\";s:15:\"billing_address\";s:14:\"Street address\";s:5:\"phone\";s:18:\"+1 (689) 766-16443\";s:5:\"email\";s:16:\"user@yopmail.com\";s:5:\"notes\";N;}', 'a:7:{s:10:\"first_name\";s:5:\"Abdul\";s:9:\"last_name\";N;s:7:\"country\";s:2:\"PK\";s:16:\"shipping_address\";s:14:\"Street address\";s:5:\"phone\";s:18:\"+1 (689) 766-16443\";s:5:\"email\";s:16:\"user@yopmail.com\";s:5:\"notes\";N;}', 19800, NULL, NULL, NULL, 'pending', 0, 0, 'pO7HYzuFvF1emEasQT9XIpYyY2IF36gG', NULL, 0, NULL, 0, 1, NULL, '2022-08-28 14:29:31', '2022-08-28 14:57:08'),
(77, 23, NULL, NULL, 'Lahore, Pakistan', '54000', NULL, 6000, 6100, 0, 'a:7:{s:10:\"first_name\";s:5:\"Abdul\";s:9:\"last_name\";s:5:\"Basit\";s:7:\"country\";s:2:\"PK\";s:15:\"billing_address\";s:14:\"Street address\";s:5:\"phone\";s:18:\"+1 (689) 766-16443\";s:5:\"email\";s:16:\"user@yopmail.com\";s:5:\"notes\";N;}', 'a:7:{s:10:\"first_name\";s:5:\"Abdul\";s:9:\"last_name\";N;s:7:\"country\";s:2:\"PK\";s:16:\"shipping_address\";s:14:\"Street address\";s:5:\"phone\";s:18:\"+1 (689) 766-16443\";s:5:\"email\";s:16:\"user@yopmail.com\";s:5:\"notes\";N;}', 6000, NULL, NULL, NULL, 'cancelled', 0, 0, 'urxipfxYdPMaxltxnYEfB58RIEqxya0G', NULL, 0, NULL, 1, 2, NULL, '2022-09-06 15:16:43', '2022-09-06 15:17:41'),
(78, 23, NULL, NULL, 'Lahore, Pakistan', '54000', NULL, 606, 606, 0, 'a:7:{s:10:\"first_name\";s:5:\"Abdul\";s:9:\"last_name\";s:5:\"Basit\";s:7:\"country\";s:2:\"PK\";s:15:\"billing_address\";s:14:\"Street address\";s:5:\"phone\";s:18:\"+1 (689) 766-16443\";s:5:\"email\";s:16:\"user@yopmail.com\";s:5:\"notes\";N;}', 'a:7:{s:10:\"first_name\";s:5:\"Abdul\";s:9:\"last_name\";N;s:7:\"country\";s:2:\"PK\";s:16:\"shipping_address\";s:14:\"Street address\";s:5:\"phone\";s:18:\"+1 (689) 766-16443\";s:5:\"email\";s:16:\"user@yopmail.com\";s:5:\"notes\";N;}', 606, NULL, NULL, NULL, 'pending', 0, 0, 'ssbCK2HdKsXmV1hOns58FXAICUsHjZdO', NULL, 0, NULL, 1, 0, NULL, '2022-09-06 15:18:50', '2022-09-06 15:18:56'),
(79, 23, NULL, NULL, 'Lahore, Pakistan', '54000', NULL, 400, 600, 0, NULL, NULL, 0, NULL, NULL, NULL, 'pending', 0, 0, 'ODxrhw7xGDiY0Lf6OC2yfdXlR0Sko6LG', NULL, 0, NULL, 0, 0, NULL, '2022-09-06 15:39:10', '2022-09-06 15:39:10'),
(80, 23, NULL, NULL, 'Lahore, Pakistan', '54000', NULL, 600, 600, 0, NULL, NULL, 0, NULL, NULL, NULL, 'pending', 0, 0, 'TyZPeej23qryfFFbVRUiVM5DgY2X40Aw', NULL, 0, NULL, 0, 0, NULL, '2022-09-06 15:45:48', '2022-09-06 15:45:48'),
(81, 82, '', NULL, 'Lahore, Pakistan', '54000', NULL, 200, 400, 0, 'a:7:{s:10:\"first_name\";s:5:\"Abdul\";s:9:\"last_name\";s:5:\"Basit\";s:7:\"country\";s:2:\"PK\";s:15:\"billing_address\";s:12:\"address here\";s:5:\"phone\";s:10:\"1234567890\";s:5:\"email\";s:18:\"test12@yopmail.com\";s:5:\"notes\";N;}', 'a:7:{s:10:\"first_name\";s:5:\"Abdul\";s:9:\"last_name\";N;s:7:\"country\";s:2:\"PK\";s:16:\"shipping_address\";s:12:\"address here\";s:5:\"phone\";s:10:\"1234567890\";s:5:\"email\";s:18:\"test12@yopmail.com\";s:5:\"notes\";N;}', 200, NULL, NULL, NULL, 'pending', 0, 0, 'jtTlWkjrV3W3WCumFcWv6Oq0pn1Te68h', 'cod', 0, NULL, 0, 0, NULL, '2022-09-11 14:51:30', '2022-09-11 14:52:24'),
(82, 0, '', NULL, 'lahore', '54000', NULL, 400, 600, 0, 'a:7:{s:10:\"first_name\";s:5:\"Abdul\";s:9:\"last_name\";s:5:\"Basit\";s:7:\"country\";s:2:\"AE\";s:15:\"billing_address\";s:14:\"Street address\";s:5:\"phone\";s:14:\"00923111671835\";s:5:\"email\";s:18:\"ab.pk012@gmail.com\";s:5:\"notes\";N;}', 'a:7:{s:10:\"first_name\";s:5:\"Abdul\";s:9:\"last_name\";N;s:7:\"country\";s:2:\"GB\";s:16:\"shipping_address\";s:14:\"Street address\";s:5:\"phone\";s:14:\"00923111671835\";s:5:\"email\";s:18:\"ab.pk012@gmail.com\";s:5:\"notes\";N;}', 400, NULL, NULL, NULL, 'pending', 0, 0, 'V8ySa8ahUiDWxTxFVcpKtOFAzlJ66hvg', 'cod', 0, NULL, 0, 0, NULL, '2022-09-12 15:55:21', '2022-09-12 15:55:59'),
(83, 0, NULL, 'With COD', 'Lahore, Pakistan', 'Street address', NULL, 27, 270, 200, 'a:7:{s:10:\"first_name\";s:5:\"Abdul\";s:9:\"last_name\";s:5:\"Basit\";s:7:\"country\";s:2:\"PK\";s:15:\"billing_address\";s:14:\"Street address\";s:5:\"phone\";s:13:\"+923111671835\";s:5:\"email\";s:15:\"admin@gmail.com\";s:5:\"notes\";N;}', 'a:7:{s:10:\"first_name\";s:5:\"Abdul\";s:9:\"last_name\";N;s:7:\"country\";s:2:\"GB\";s:16:\"shipping_address\";s:14:\"Street address\";s:5:\"phone\";s:13:\"+923111671835\";s:5:\"email\";s:15:\"admin@gmail.com\";s:5:\"notes\";N;}', 27, '170', 170, 27, 'cancelled', 0, 1, '3U0RyDemAZ6jdYAhbh8EhIt4V7jLp7ZM', 'flutterwave', 0, NULL, 0, 0, NULL, '2022-09-12 16:02:03', '2022-09-12 16:12:06'),
(84, 23, NULL, NULL, '', NULL, NULL, 200, 200, NULL, 'a:7:{s:10:\"first_name\";s:5:\"Abdul\";s:9:\"last_name\";s:5:\"Basit\";s:7:\"country\";s:2:\"PK\";s:15:\"billing_address\";s:14:\"Street address\";s:5:\"phone\";s:18:\"+1 (689) 766-16443\";s:5:\"email\";s:16:\"user@yopmail.com\";s:5:\"notes\";N;}', 'a:7:{s:10:\"first_name\";s:5:\"Abdul\";s:9:\"last_name\";N;s:7:\"country\";s:2:\"PK\";s:16:\"shipping_address\";s:14:\"Street address\";s:5:\"phone\";s:18:\"+1 (689) 766-16443\";s:5:\"email\";s:16:\"user@yopmail.com\";s:5:\"notes\";N;}', 200, NULL, NULL, NULL, 'pending', 0, 0, 'qPBEURfu07zRMDh6rmmjRYgUeQkEdlzR', NULL, 0, NULL, 1, 0, NULL, '2022-09-13 14:27:46', '2022-09-13 14:30:01'),
(85, 23, NULL, NULL, '', NULL, NULL, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'pending', 0, 0, 'ZueP3fjiZbtosdCDQVxTG3Qrd0GlLFnQ', NULL, 0, NULL, 1, 0, NULL, '2022-09-13 15:13:16', '2022-09-13 15:13:16');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referrel_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landmark_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_agree_policy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT 0,
  `payment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `networks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account_number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pos`
--

INSERT INTO `pos` (`id`, `user_id`, `company_name`, `company_email`, `company_phone`, `referrel_code`, `landmark_area`, `is_agree_policy`, `status`, `payment`, `account_name`, `account_number`, `networks`, `bank_account_name`, `bank_account_number`, `bank_name`, `branch`, `primary_account`, `created_at`, `updated_at`) VALUES
(12, 23, 'Company Name', 'john@yopmail.com', '1234567890', 'fd74c0529d57edf2a9bd72f51e0d3e98', 'Lahore, Pakistan', '1', 1, 'sd', '', '', '', '', '', '', '', NULL, '2022-08-28 14:16:04', '2022-09-06 15:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_certificate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_authors` int(11) NOT NULL,
  `number_of_publishers` int(11) NOT NULL,
  `name_of_ceo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `networks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `revenue`
--

CREATE TABLE `revenue` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'amount to be pay\r\n',
  `role` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `user_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `affiliate_amount` float NOT NULL DEFAULT 0,
  `consultant_amount` float NOT NULL DEFAULT 0,
  `payment_status` int(11) NOT NULL DEFAULT 0,
  `admin_payment_status` int(11) NOT NULL DEFAULT 0,
  `is_referrer` int(11) NOT NULL DEFAULT 0,
  `payment_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exchange_rate` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `revenue`
--

INSERT INTO `revenue` (`id`, `user_id`, `role`, `order_id`, `total_amount`, `user_amount`, `affiliate_amount`, `consultant_amount`, `payment_status`, `admin_payment_status`, `is_referrer`, `payment_proof`, `payment_note`, `currency`, `exchange_rate`, `deleted_at`, `created_at`, `updated_at`) VALUES
(33, 23, 'author', 112, 300.00, 180.00, 0, 0, 2, 1, 0, 'images/proofs/1661712842.png', 'Hi, Your payment has been done.', 'USD', '1', NULL, '2022-08-28 13:45:17', '2022-09-04 14:53:45'),
(34, 1, 'admin', 113, 19800.00, 11880.00, 0, 0, 1, 0, 0, NULL, NULL, 'USD', '1', NULL, '2022-08-28 14:29:38', '2022-08-28 14:31:57'),
(35, 36, 'affiliate', 113, 0.00, 0.00, 1980, 0, 1, 0, 1, NULL, NULL, 'USD', '1', NULL, '2022-08-28 14:29:38', '2022-08-28 14:31:57'),
(36, 1, 'admin', 114, 6000.00, 3600.00, 0, 0, 0, 0, 0, NULL, NULL, 'USD', '1', NULL, '2022-09-06 15:17:09', '2022-09-06 15:17:09'),
(37, 36, 'affiliate', 114, 0.00, 0.00, 600, 0, 0, 0, 1, NULL, NULL, 'USD', '1', NULL, '2022-09-06 15:17:09', '2022-09-06 15:17:09'),
(38, 1, 'admin', 115, 606.00, 364.00, 0, 0, 0, 0, 0, NULL, NULL, 'USD', '1', NULL, '2022-09-06 15:18:56', '2022-09-06 15:18:56'),
(39, 36, 'affiliate', 115, 0.00, 0.00, 61, 0, 0, 0, 1, NULL, NULL, 'USD', '1', NULL, '2022-09-06 15:18:56', '2022-09-06 15:18:56'),
(40, 1, 'admin', 116, 200.00, 120.00, 0, 0, 0, 0, 0, NULL, NULL, 'USD', '1', NULL, '2022-09-11 14:52:24', '2022-09-11 14:52:24'),
(41, 23, 'affiliate', 116, 0.00, 0.00, 20, 0, 0, 0, 1, NULL, NULL, 'USD', '1', NULL, '2022-09-11 14:52:24', '2022-09-11 14:52:24'),
(42, 1, 'admin', 117, 400.00, 240.00, 0, 0, 0, 0, 0, NULL, NULL, 'USD', '1', NULL, '2022-09-12 15:55:59', '2022-09-12 15:55:59'),
(43, 23, 'affiliate', 117, 0.00, 0.00, 40, 0, 0, 0, 1, NULL, NULL, 'USD', '1', NULL, '2022-09-12 15:55:59', '2022-09-12 15:55:59'),
(44, 1, 'admin', 118, 27.00, 16.00, 0, 0, 0, 0, 0, NULL, NULL, 'USD', '1', NULL, '2022-09-12 16:10:05', '2022-09-12 16:10:05'),
(45, 1, 'admin', 119, 27.00, 16.00, 0, 0, 0, 0, 0, NULL, NULL, 'USD', '1', NULL, '2022-09-12 16:10:20', '2022-09-12 16:10:20'),
(46, 1, 'admin', 120, 27.00, 16.00, 0, 0, 0, 0, 0, NULL, NULL, 'USD', '1', NULL, '2022-09-12 16:10:49', '2022-09-12 16:10:49'),
(47, 23, 'affiliate', 120, 0.00, 0.00, 3, 0, 0, 0, 1, NULL, NULL, 'USD', '1', NULL, '2022-09-12 16:10:49', '2022-09-12 16:10:49'),
(48, 1, 'admin', 121, 200.00, 120.00, 0, 0, 0, 0, 0, NULL, NULL, 'USD', '1', NULL, '2022-09-13 14:30:01', '2022-09-13 14:30:01'),
(49, 36, 'affiliate', 121, 0.00, 0.00, 20, 0, 0, 0, 1, NULL, NULL, 'USD', '1', NULL, '2022-09-13 14:30:01', '2022-09-13 14:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `affiliate_commission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consultant_commission` int(11) NOT NULL DEFAULT 0,
  `user_commission` int(11) DEFAULT 0,
  `privacy_policy` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content_policy` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `affiliate_network_agreement` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authors_contract` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marketers_networks_agreement` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referred_customers_agreement` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_contracts_for_authors` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_contracts_for_publishers` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_followers` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_followers` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_followers` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tumbler_followers` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free_delivery` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secure_payment` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money_back` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_banner` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `start_date`, `end_date`, `affiliate_commission`, `consultant_commission`, `user_commission`, `privacy_policy`, `created_at`, `updated_at`, `content_policy`, `terms`, `affiliate_network_agreement`, `authors_contract`, `marketers_networks_agreement`, `referred_customers_agreement`, `seller_contracts_for_authors`, `seller_contracts_for_publishers`, `about_us`, `instagram_followers`, `facebook_followers`, `youtube_followers`, `tumbler_followers`, `free_delivery`, `secure_payment`, `money_back`, `support`, `about_banner`, `support_phone`, `support_email`, `support_address`, `pinterest_link`, `twitter_link`, `youtube_link`, `facebook_link`, `instagram_link`) VALUES
(1, '2022-05-13', '2022-05-23', '10', 20, 60, '<h4>Intellectual Propertly</h4><ol><li>1- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum.</li><li>2- Leo metus luctus sem, vel vulputate diam ipsum sed lorem. Donec tempor arcu nisl, et molestie massa scelerisque ut. Nunc at rutrum leo. Mauris metus mauris, tristique quis sapien eu, rutrum vulputate enim.</li><li>3- Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum.</li><li>4- Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus.</li><li>5- Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue.</li><li>6- Pellentesque vitae eros eget enim mollis placerat.</li></ol><h4>Termination</h4><ol><li>1- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum.</li><li>2- Leo metus luctus sem, vel vulputate diam ipsum sed lorem. Donec tempor arcu nisl, et molestie massa scelerisque ut. Nunc at rutrum leo. Mauris metus mauris, tristique quis sapien eu, rutrum vulputate enim.</li><li>3- Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum.</li><li>4- Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus.</li><li>5- Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue.</li><li>6- Pellentesque vitae eros eget enim mollis placerat.</li></ol><h4>Changes To This Agreement</h4><p>We reserve the right, at our sole discretion, to modify or replace these Terms and Conditions by posting the updated terms on the Site. Your continued use of the Site after any such changes constitutes your acceptance of the new Terms and Conditions.</p><h4>Hyperlinks</h4><p>Our website may contain hyperlinks. These hyperlinks connect you to sites of other organisations which are not our responsibility. We have used our reasonable endeavours in preparing our own website and the information included in it is done so in good faith. However, we have no control over any of the information you can access via other websites. Therefore, no mention of any organisation, company or individual to which our website is linked shall imply any approval or warranty as to the standing and capability of any such organisations, company or individual on the part of The Book Depository.</p>', '2022-05-14 20:19:42', '2022-08-27 12:42:43', '<h4>Intellectual Propertly</h4><ol><li>1- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum.</li><li>2- Leo metus luctus sem, vel vulputate diam ipsum sed lorem. Donec tempor arcu nisl, et molestie massa scelerisque ut. Nunc at rutrum leo. Mauris metus mauris, tristique quis sapien eu, rutrum vulputate enim.</li><li>3- Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum.</li><li>4- Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus.</li><li>5- Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue.</li><li>6- Pellentesque vitae eros eget enim mollis placerat.</li></ol><h4>Termination</h4><ol><li>1- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum.</li><li>2- Leo metus luctus sem, vel vulputate diam ipsum sed lorem. Donec tempor arcu nisl, et molestie massa scelerisque ut. Nunc at rutrum leo. Mauris metus mauris, tristique quis sapien eu, rutrum vulputate enim.</li><li>3- Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum.</li><li>4- Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus.</li><li>5- Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue.</li><li>6- Pellentesque vitae eros eget enim mollis placerat.</li></ol><h4>Changes To This Agreement</h4><p>We reserve the right, at our sole discretion, to modify or replace these Terms and Conditions by posting the updated terms on the Site. Your continued use of the Site after any such changes constitutes your acceptance of the new Terms and Conditions.</p><h4>Hyperlinks</h4><p>Our website may contain hyperlinks. These hyperlinks connect you to sites of other organisations which are not our responsibility. We have used our reasonable endeavours in preparing our own website and the information included in it is done so in good faith. However, we have no control over any of the information you can access via other websites. Therefore, no mention of any organisation, company or individual to which our website is linked shall imply any approval or warranty as to the standing and capability of any such organisations, company or individual on the part of The Book Depository.</p>', '<h4>Intellectual Propertly</h4><ol><li>1- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum.</li><li>2- Leo metus luctus sem, vel vulputate diam ipsum sed lorem. Donec tempor arcu nisl, et molestie massa scelerisque ut. Nunc at rutrum leo. Mauris metus mauris, tristique quis sapien eu, rutrum vulputate enim.</li><li>3- Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum.</li><li>4- Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus.</li><li>5- Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue.</li><li>6- Pellentesque vitae eros eget enim mollis placerat.</li></ol><h4>Termination</h4><ol><li>1- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum.</li><li>2- Leo metus luctus sem, vel vulputate diam ipsum sed lorem. Donec tempor arcu nisl, et molestie massa scelerisque ut. Nunc at rutrum leo. Mauris metus mauris, tristique quis sapien eu, rutrum vulputate enim.</li><li>3- Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum.</li><li>4- Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus.</li><li>5- Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue.</li><li>6- Pellentesque vitae eros eget enim mollis placerat.</li></ol><h4>Changes To This Agreement</h4><p>We reserve the right, at our sole discretion, to modify or replace these Terms and Conditions by posting the updated terms on the Site. Your continued use of the Site after any such changes constitutes your acceptance of the new Terms and Conditions.</p><h4>Hyperlinks</h4><p>Our website may contain hyperlinks. These hyperlinks connect you to sites of other organisations which are not our responsibility. We have used our reasonable endeavours in preparing our own website and the information included in it is done so in good faith. However, we have no control over any of the information you can access via other websites. Therefore, no mention of any organisation, company or individual to which our website is linked shall imply any approval or warranty as to the standing and capability of any such organisations, company or individual on the part of The Book Depository.</p>', '<h4>Intellectual Propertly</h4><ol><li>1- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum.</li><li>2- Leo metus luctus sem, vel vulputate diam ipsum sed lorem. Donec tempor arcu nisl, et molestie massa scelerisque ut. Nunc at rutrum leo. Mauris metus mauris, tristique quis sapien eu, rutrum vulputate enim.</li><li>3- Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum.</li><li>4- Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus.</li><li>5- Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue.</li><li>6- Pellentesque vitae eros eget enim mollis placerat.</li></ol><h4>Termination</h4><ol><li>1- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum.</li><li>2- Leo metus luctus sem, vel vulputate diam ipsum sed lorem. Donec tempor arcu nisl, et molestie massa scelerisque ut. Nunc at rutrum leo. Mauris metus mauris, tristique quis sapien eu, rutrum vulputate enim.</li><li>3- Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum.</li><li>4- Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus.</li><li>5- Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue.</li><li>6- Pellentesque vitae eros eget enim mollis placerat.</li></ol><h4>Changes To This Agreement</h4><p>We reserve the right, at our sole discretion, to modify or replace these Terms and Conditions by posting the updated terms on the Site. Your continued use of the Site after any such changes constitutes your acceptance of the new Terms and Conditions.</p><h4>Hyperlinks</h4><p>Our website may contain hyperlinks. These hyperlinks connect you to sites of other organisations which are not our responsibility. We have used our reasonable endeavours in preparing our own website and the information included in it is done so in good faith. However, we have no control over any of the information you can access via other websites. Therefore, no mention of any organisation, company or individual to which our website is linked shall imply any approval or warranty as to the standing and capability of any such organisations, company or individual on the part of The Book Depository.</p>', '<h4>Intellectual Propertly</h4><ol><li>1- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum.</li><li>2- Leo metus luctus sem, vel vulputate diam ipsum sed lorem. Donec tempor arcu nisl, et molestie massa scelerisque ut. Nunc at rutrum leo. Mauris metus mauris, tristique quis sapien eu, rutrum vulputate enim.</li><li>3- Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum.</li><li>4- Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus.</li><li>5- Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue.</li><li>6- Pellentesque vitae eros eget enim mollis placerat.</li></ol><h4>Termination</h4><ol><li>1- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum.</li><li>2- Leo metus luctus sem, vel vulputate diam ipsum sed lorem. Donec tempor arcu nisl, et molestie massa scelerisque ut. Nunc at rutrum leo. Mauris metus mauris, tristique quis sapien eu, rutrum vulputate enim.</li><li>3- Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum.</li><li>4- Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus.</li><li>5- Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue.</li><li>6- Pellentesque vitae eros eget enim mollis placerat.</li></ol><h4>Changes To This Agreement</h4><p>We reserve the right, at our sole discretion, to modify or replace these Terms and Conditions by posting the updated terms on the Site. Your continued use of the Site after any such changes constitutes your acceptance of the new Terms and Conditions.</p><h4>Hyperlinks</h4><p>Our website may contain hyperlinks. These hyperlinks connect you to sites of other organisations which are not our responsibility. We have used our reasonable endeavours in preparing our own website and the information included in it is done so in good faith. However, we have no control over any of the information you can access via other websites. Therefore, no mention of any organisation, company or individual to which our website is linked shall imply any approval or warranty as to the standing and capability of any such organisations, company or individual on the part of The Book Depository.</p>', '<h4>Intellectual Propertly</h4><ol><li>1- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum.</li><li>2- Leo metus luctus sem, vel vulputate diam ipsum sed lorem. Donec tempor arcu nisl, et molestie massa scelerisque ut. Nunc at rutrum leo. Mauris metus mauris, tristique quis sapien eu, rutrum vulputate enim.</li><li>3- Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum.</li><li>4- Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus.</li><li>5- Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue.</li><li>6- Pellentesque vitae eros eget enim mollis placerat.</li></ol><h4>Termination</h4><ol><li>1- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum.</li><li>2- Leo metus luctus sem, vel vulputate diam ipsum sed lorem. Donec tempor arcu nisl, et molestie massa scelerisque ut. Nunc at rutrum leo. Mauris metus mauris, tristique quis sapien eu, rutrum vulputate enim.</li><li>3- Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum.</li><li>4- Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus.</li><li>5- Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue.</li><li>6- Pellentesque vitae eros eget enim mollis placerat.</li></ol><h4>Changes To This Agreement</h4><p>We reserve the right, at our sole discretion, to modify or replace these Terms and Conditions by posting the updated terms on the Site. Your continued use of the Site after any such changes constitutes your acceptance of the new Terms and Conditions.</p><h4>Hyperlinks</h4><p>Our website may contain hyperlinks. These hyperlinks connect you to sites of other organisations which are not our responsibility. We have used our reasonable endeavours in preparing our own website and the information included in it is done so in good faith. However, we have no control over any of the information you can access via other websites. Therefore, no mention of any organisation, company or individual to which our website is linked shall imply any approval or warranty as to the standing and capability of any such organisations, company or individual on the part of The Book Depository.</p>', '<h4>Intellectual Propertly</h4><ol><li>1- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum.</li><li>2- Leo metus luctus sem, vel vulputate diam ipsum sed lorem. Donec tempor arcu nisl, et molestie massa scelerisque ut. Nunc at rutrum leo. Mauris metus mauris, tristique quis sapien eu, rutrum vulputate enim.</li><li>3- Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum.</li><li>4- Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus.</li><li>5- Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue.</li><li>6- Pellentesque vitae eros eget enim mollis placerat.</li></ol><h4>Termination</h4><ol><li>1- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum.</li><li>2- Leo metus luctus sem, vel vulputate diam ipsum sed lorem. Donec tempor arcu nisl, et molestie massa scelerisque ut. Nunc at rutrum leo. Mauris metus mauris, tristique quis sapien eu, rutrum vulputate enim.</li><li>3- Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum.</li><li>4- Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus.</li><li>5- Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue.</li><li>6- Pellentesque vitae eros eget enim mollis placerat.</li></ol><h4>Changes To This Agreement</h4><p>We reserve the right, at our sole discretion, to modify or replace these Terms and Conditions by posting the updated terms on the Site. Your continued use of the Site after any such changes constitutes your acceptance of the new Terms and Conditions.</p><h4>Hyperlinks</h4><p>Our website may contain hyperlinks. These hyperlinks connect you to sites of other organisations which are not our responsibility. We have used our reasonable endeavours in preparing our own website and the information included in it is done so in good faith. However, we have no control over any of the information you can access via other websites. Therefore, no mention of any organisation, company or individual to which our website is linked shall imply any approval or warranty as to the standing and capability of any such organisations, company or individual on the part of The Book Depository.</p>', '<h4>Intellectual Propertly</h4><ol><li>1- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum.</li><li>2- Leo metus luctus sem, vel vulputate diam ipsum sed lorem. Donec tempor arcu nisl, et molestie massa scelerisque ut. Nunc at rutrum leo. Mauris metus mauris, tristique quis sapien eu, rutrum vulputate enim.</li><li>3- Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum.</li><li>4- Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus.</li><li>5- Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue.</li><li>6- Pellentesque vitae eros eget enim mollis placerat.</li></ol><h4>Termination</h4><ol><li>1- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum.</li><li>2- Leo metus luctus sem, vel vulputate diam ipsum sed lorem. Donec tempor arcu nisl, et molestie massa scelerisque ut. Nunc at rutrum leo. Mauris metus mauris, tristique quis sapien eu, rutrum vulputate enim.</li><li>3- Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum.</li><li>4- Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus.</li><li>5- Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue.</li><li>6- Pellentesque vitae eros eget enim mollis placerat.</li></ol><h4>Changes To This Agreement</h4><p>We reserve the right, at our sole discretion, to modify or replace these Terms and Conditions by posting the updated terms on the Site. Your continued use of the Site after any such changes constitutes your acceptance of the new Terms and Conditions.</p><h4>Hyperlinks</h4><p>Our website may contain hyperlinks. These hyperlinks connect you to sites of other organisations which are not our responsibility. We have used our reasonable endeavours in preparing our own website and the information included in it is done so in good faith. However, we have no control over any of the information you can access via other websites. Therefore, no mention of any organisation, company or individual to which our website is linked shall imply any approval or warranty as to the standing and capability of any such organisations, company or individual on the part of The Book Depository.</p>', '<h4>Intellectual Propertly</h4><ol><li>1- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum.</li><li>2- Leo metus luctus sem, vel vulputate diam ipsum sed lorem. Donec tempor arcu nisl, et molestie massa scelerisque ut. Nunc at rutrum leo. Mauris metus mauris, tristique quis sapien eu, rutrum vulputate enim.</li><li>3- Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum.</li><li>4- Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus.</li><li>5- Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue.</li><li>6- Pellentesque vitae eros eget enim mollis placerat.</li></ol><h4>Termination</h4><ol><li>1- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum.</li><li>2- Leo metus luctus sem, vel vulputate diam ipsum sed lorem. Donec tempor arcu nisl, et molestie massa scelerisque ut. Nunc at rutrum leo. Mauris metus mauris, tristique quis sapien eu, rutrum vulputate enim.</li><li>3- Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum.</li><li>4- Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus.</li><li>5- Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue.</li><li>6- Pellentesque vitae eros eget enim mollis placerat.</li></ol><h4>Changes To This Agreement</h4><p>We reserve the right, at our sole discretion, to modify or replace these Terms and Conditions by posting the updated terms on the Site. Your continued use of the Site after any such changes constitutes your acceptance of the new Terms and Conditions.</p><h4>Hyperlinks</h4><p>Our website may contain hyperlinks. These hyperlinks connect you to sites of other organisations which are not our responsibility. We have used our reasonable endeavours in preparing our own website and the information included in it is done so in good faith. However, we have no control over any of the information you can access via other websites. Therefore, no mention of any organisation, company or individual to which our website is linked shall imply any approval or warranty as to the standing and capability of any such organisations, company or individual on the part of The Book Depository.</p>', '<h2>Welcome to Bookworm</h2><p>“ Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model search for eolved over sometimes by accident, sometimes on purpose ”</p><h4>What we really do?</h4><p>Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum. Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus. Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue. Pellentesque vitae eros eget enim mollis placerat. Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus. Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue. Pellentesque vitae eros eget enim mollis placerat.</p><h4>Our Vision</h4><p>Pellentesque sodales augue eget ultricies ultricies. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur sagittis ultrices condimentum.</p><h4>Our Vision</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit metus mauris, tristique quis sapien eu, rutrum vulputate enim.</p>', '45M', '+6k', '30.6M', '283', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu.', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu.', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu.', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu.', 'images/authors/1661606516.jpg', '+1 246-345-0695', 'sale@bookworm.com', '1418 River Drive, Suite 35 Cottonhall, CA 9622 United States', 'https://www.pinterest.com', 'https://www.twitter.com', 'https://www.youtube.com', 'https://www.facebook.com', 'https://www.instagram.com');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `skill` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `user_id`, `skill`, `created_at`, `updated_at`) VALUES
(2, 1, 'Skill', '2022-06-18 08:08:23', '2022-08-14 03:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `country`, `city`, `postal_code`, `ip`, `created_at`, `updated_at`) VALUES
(6, 'ab.pk012@yopmail.com', NULL, NULL, NULL, '127.0.0.1', '2022-09-03 10:22:00', '2022-09-03 10:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_genres`
--

CREATE TABLE `sub_genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_genres`
--

INSERT INTO `sub_genres` (`id`, `genre_id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Children', 'children', NULL, NULL),
(2, 1, 'Christian', 'christian', NULL, NULL),
(3, 1, 'Literary Fiction', 'literary-fiction', NULL, NULL),
(4, 2, 'Textbook', 'textbook', NULL, NULL),
(5, 2, 'Christian', 'christian-2', NULL, NULL),
(6, 2, 'Children', 'children-2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `referrer_id` int(11) DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fcm_token` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `social_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkout` int(11) NOT NULL DEFAULT 0,
  `checkin` int(11) NOT NULL DEFAULT 0,
  `is_subscribe` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `referrer_id`, `name`, `email`, `phone`, `role`, `avatar`, `email_verified_at`, `password`, `code`, `verification_code`, `fcm_token`, `remember_token`, `created_by`, `created_at`, `updated_at`, `deleted_at`, `social_id`, `social_type`, `checkout`, `checkin`, `is_subscribe`) VALUES
(1, 0, 'Admin', 'admincowriehub@yopmail.com', '1234567890', 'admin', NULL, '2022-09-01 21:15:03', '$2y$10$0D64Qpr/BsaOzxiMcSF8Te/bUNFFHEBMgE1Ao0AY0nYvi56imZvkK', 'b6ce34152362bc335214e334a6179272h98', NULL, NULL, NULL, 0, '2022-05-06 12:17:27', '2022-09-13 15:46:40', NULL, NULL, NULL, 14, 54, 0),
(23, 36, 'John Doe', 'user@yopmail.com', '03111671835', 'affiliate', 'images/authors/1663012481.jpg', '2022-09-01 21:15:08', '$2y$10$thY1gVlNO4h0kZ6f.Mm41uLuYM9.xKd0JWRmXONqAyp2zbf/wRmkO', 'b6ce34152362bc335214e334a6179272', '', NULL, NULL, 0, '2022-08-25 14:42:53', '2022-09-13 15:48:23', NULL, NULL, NULL, 16, 32, 0),
(36, 0, 'Abdul Basit', 'user1@yopmail.com', '1234567890', 'affiliate', NULL, '2022-09-01 21:15:11', '$2y$10$iW8E5GUN3zHW8LrzA2RG4O49VcElYFy3jqPRrXrNEemg8kRroXZiO', 'fd74c0529d57edf2a9bd72f51e0d3e98', NULL, NULL, NULL, 0, '2022-08-28 13:35:44', '2022-09-11 12:11:58', NULL, NULL, NULL, 2, 6, 0),
(77, 0, 'Carol Knox', 'ab.pk@yopmail.com', '1234567890', 'user', NULL, '2022-09-02 15:39:57', '$2y$10$0AktuOyBV9R0VHREq9Gk7ulNpto10Et8Bp//D8ogl6ag/0G4ZwGsG', '8a35db46a730ff2d0d1ec9616f568de5', NULL, NULL, NULL, 0, '2022-09-02 15:38:38', '2022-09-02 15:40:10', NULL, NULL, NULL, 1, 1, 0),
(78, 23, 'Abdul', 'test@yopmail.com', '1234567890', 'user', NULL, '2022-09-06 14:56:34', '$2y$10$fVFWPtZKyYTfdQntyB7LrecDbk6GhFkwIWjPG.1hH4mx9RwkCZi/W', '202aa9986af1a1c643fad67cc0d28a74', NULL, NULL, NULL, 0, '2022-09-06 14:55:28', '2022-09-11 12:11:48', NULL, NULL, NULL, 1, 2, 0),
(79, 0, 'John Doe', 'test1@yopmail.com', '1234567890', 'user', NULL, '2022-09-06 15:05:09', '$2y$10$30L6tIay6oxmwnjCU8o06eTopjZ0l00.fxXdgOjvKmTOe9QvuwhbO', 'e9bbf95ae0d12382fe6c52eb38bcae85', NULL, NULL, NULL, 0, '2022-09-06 15:04:29', '2022-09-06 15:05:48', NULL, NULL, NULL, 1, 1, 0),
(81, 23, 'Abdul Basit', 'user12@yopmail.com', '1234567890', 'user', NULL, NULL, '$2y$10$KBBPDYYopZGagfZK.CjSXO7akeo4cSki8mtus3yi9HUtA26mu3nFS', '71d36f1418e767df64353f86ac70c842', NULL, NULL, NULL, 0, '2022-09-11 13:24:09', '2022-09-11 13:24:09', NULL, NULL, NULL, 0, 0, 0),
(82, 23, 'Abdul Basit', 'test12@yopmail.com', '+92123456789', 'affiliate', NULL, '2022-09-11 14:42:19', '$2y$10$pn8vC3hTwGw4srZ/25tHZ.AUnvGh0Q77vmiQEoJ6QoosL40ZWVxL.', '2b980aecd323035f9c28211cfe27d6bc', NULL, NULL, NULL, 0, '2022-09-11 14:36:27', '2022-09-11 15:00:04', NULL, NULL, NULL, 0, 1, 0),
(83, 23, 'Abdul Basit', 'user13@yopmail.com', '+923111671835', 'user', NULL, '2022-09-12 16:30:08', '$2y$10$0ZmJEL/5VAho.8QTiB010.H/Vi7qoW9dS0rrkOR69CG5x1IO/g5yK', '765e1d43b8711108ddb4e43f2c4412b7', NULL, NULL, NULL, 0, '2022-09-12 16:29:46', '2022-09-12 16:35:46', NULL, NULL, NULL, 0, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `affiliates`
--
ALTER TABLE `affiliates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author-detail`
--
ALTER TABLE `author-detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_detail_user_id_foreign` (`user_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_user_id_foreign` (`user_id`);

--
-- Indexes for table `consultant`
--
ALTER TABLE `consultant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consultant_user_id_foreign` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_fields`
--
ALTER TABLE `extra_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_user_id_foreign` (`user_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketing`
--
ALTER TABLE `marketing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketing_orders`
--
ALTER TABLE `marketing_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_book_id_foreign` (`book_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `publishers_company_email_unique` (`company_email`);

--
-- Indexes for table `revenue`
--
ALTER TABLE `revenue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_book_id_foreign` (`book_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_genres`
--
ALTER TABLE `sub_genres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_genres_genre_id_foreign` (`genre_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlist_user_id_foreign` (`user_id`),
  ADD KEY `wishlist_book_id_foreign` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `affiliates`
--
ALTER TABLE `affiliates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `author-detail`
--
ALTER TABLE `author-detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `consultant`
--
ALTER TABLE `consultant`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `extra_fields`
--
ALTER TABLE `extra_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `marketing`
--
ALTER TABLE `marketing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `marketing_orders`
--
ALTER TABLE `marketing_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `revenue`
--
ALTER TABLE `revenue`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_genres`
--
ALTER TABLE `sub_genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `author-detail`
--
ALTER TABLE `author-detail`
  ADD CONSTRAINT `author_detail_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `consultant`
--
ALTER TABLE `consultant`
  ADD CONSTRAINT `consultant_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_genres`
--
ALTER TABLE `sub_genres`
  ADD CONSTRAINT `sub_genres_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlist_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
