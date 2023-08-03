-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 03, 2023 at 09:08 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joof`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'ahmed', 'pahmedgomaaeid@gmail.com', '$2y$10$v4y.1lP3FhTd2uLKXIurn.N95NMlzBC6vXSn8uIf44SQv/dVMShza', '2023-08-01 12:56:14', '2023-08-01 12:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, 'تطوير شبكات الانترنت', 'أصبح الحصول على المعلومة أمرًا أكثر سهولة، لما أحدثته تقنية المعلومات من تطور بشبكات الإنترنت', 'news-img-15.jpeg', '2023-07-31 21:00:35', '2023-07-31 21:00:35'),
(3, 'تقنية المعلومات', 'يعد تخصص تقنية المعلومات من التخصصات المطلوبة بشدة في عصرنا اليوم،', 'news-img-1.jpeg', '2023-07-31 21:02:17', '2023-07-31 21:02:17'),
(4, 'تحت رعاية سمو أمير منطقة الجوف', 'وكيل الإمارة يدشّن ورشة العمل \"الخطة الشاملة للتوعية بالسلامة المرورية', 'news-img-01.jpeg', '2023-07-31 21:04:18', '2023-07-31 21:04:18'),
(5, 'اهم الانجازات', 'حققت الاماره ربط جميع المحافظات ومركز صوير الكترونياً ضمن منضومة التحول الرقمي للإماره التي تهدف مفاهيم التحول الرقمي والتعاملات الالكترونيه وفقاً لرؤية المملكه 2030', 'img-news-01.jpeg', '2023-07-31 21:04:54', '2023-07-31 21:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `text`, `created_at`, `updated_at`) VALUES
(2, 'تجربة', '<p><strong>نحن الان نقوم بتجربة القسم حتى نقوم بدمجها فى الموقع</strong></p><h2>نحن نقوم الان بتجربة الموقع حتى سيبةنسي</h2>', '2023-08-01 18:05:28', '2023-08-02 14:04:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
