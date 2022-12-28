-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 03:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `on_tap_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `backgrounds`
--

CREATE TABLE `backgrounds` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `backgrounds`
--

INSERT INTO `backgrounds` (`id`, `name`, `path_image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'image1', 'uploads/background/1671548367banner8.jpg', 1, NULL, '2022-12-20 07:59:27', '2022-12-20 07:59:27'),
(2, 'image2', 'uploads/background/1671548377banner9.jpg', 1, NULL, '2022-12-20 07:59:37', '2022-12-20 07:59:37'),
(3, 'image3', 'uploads/background/1671548385banner10.jpg', 1, NULL, '2022-12-20 07:59:45', '2022-12-20 07:59:45'),
(4, 'Handbag Men’s Collection', 'uploads/background/1671548393banner11.jpg', 1, NULL, '2022-12-20 07:59:53', '2022-12-20 08:00:53'),
(5, 'Sneaker Men’s Collection', 'uploads/background/1671548408banner12.jpg', 1, NULL, '2022-12-20 08:00:08', '2022-12-20 08:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `path_image`, `description`, `path_link`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Satisfaction guaranteed', 'uploads/banner/1671548530slider4.jpg', 'Satisfaction guaranteed', NULL, 1, NULL, '2022-12-20 08:02:10', '2022-12-20 08:02:10'),
(2, 'Satisfaction', 'uploads/banner/1671548647slider5.jpg', 'Satisfaction guaranteed', NULL, 1, NULL, '2022-12-20 08:04:07', '2022-12-20 08:04:07'),
(3, 'guaranteed', 'uploads/banner/1671548656slider6.jpg', 'Satisfaction guaranteed', NULL, 1, NULL, '2022-12-20 08:04:16', '2022-12-20 08:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `title`, `path_image`, `content`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'The emergence', 'uploads/blog/1671895400blog2.jpg', '<p>Before blogging became popular, digital communities took many forms, including&nbsp;<a href=\"https://en.wikipedia.org/wiki/Usenet\">Usenet</a>, commercial online services such as&nbsp;<a href=\"https://en.wikipedia.org/wiki/GEnie\">GEnie</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Byte_Information_Exchange\">Byte Information Exchange</a>&nbsp;(BIX) and the early&nbsp;<a href=\"https://en.wikipedia.org/wiki/CompuServe\">CompuServe</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Electronic_mailing_list\">e-mail lists</a>,<a href=\"https://en.wikipedia.org/wiki/Blog#cite_note-14\">[14]</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bulletin_Board_System\">Bulletin Board Systems</a>&nbsp;(BBS). In the 1990s,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Internet_forum\">Internet forum</a>&nbsp;software created running conversations with &quot;threads&quot;. Threads are topical connections between messages on a virtual &quot;<a href=\"https://en.wikipedia.org/wiki/Bulletin_board\">corkboard</a>&quot;. From June 14, 1993, Mosaic Communications Corporation maintained their &quot;What&#39;s New&quot;<a href=\"https://en.wikipedia.org/wiki/Blog#cite_note-15\">[15]</a>&nbsp;list of new websites, updated daily and archived monthly. The page was accessible by a special &quot;What&#39;s New&quot; button in the Mosaic web browser.</p>\r\n\r\n<p>The earliest instance of a commercial blog was on the first&nbsp;<a href=\"https://en.wikipedia.org/wiki/Business_to_consumer\">business to consumer</a>&nbsp;Web site created in 1995 by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Ty_Inc\">Ty, Inc.</a>, which featured a blog in a section called &quot;Online Diary&quot;. The entries were maintained by featured&nbsp;<a href=\"https://en.wikipedia.org/wiki/Beanie_Babies\">Beanie Babies</a>&nbsp;that were voted for monthly by Web site visitors.<a href=\"https://en.wikipedia.org/wiki/Blog#cite_note-BeanieBabies-16\">[16]</a></p>', 1, NULL, '2022-12-24 08:21:12', '2022-12-24 08:23:20'),
(2, 1, 'The emergence', 'uploads/blog/1671895289blog4.png', '<p>Before blogging became popular, digital communities took many forms, including&nbsp;<a href=\"https://en.wikipedia.org/wiki/Usenet\">Usenet</a>, commercial online services such as&nbsp;<a href=\"https://en.wikipedia.org/wiki/GEnie\">GEnie</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Byte_Information_Exchange\">Byte Information Exchange</a>&nbsp;(BIX) and the early&nbsp;<a href=\"https://en.wikipedia.org/wiki/CompuServe\">CompuServe</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Electronic_mailing_list\">e-mail lists</a>,<a href=\"https://en.wikipedia.org/wiki/Blog#cite_note-14\">[14]</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bulletin_Board_System\">Bulletin Board Systems</a>&nbsp;(BBS). In the 1990s,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Internet_forum\">Internet forum</a>&nbsp;software created running conversations with &quot;threads&quot;. Threads are topical connections between messages on a virtual &quot;<a href=\"https://en.wikipedia.org/wiki/Bulletin_board\">corkboard</a>&quot;. From June 14, 1993, Mosaic Communications Corporation maintained their &quot;What&#39;s New&quot;<a href=\"https://en.wikipedia.org/wiki/Blog#cite_note-15\">[15]</a>&nbsp;list of new websites, updated daily and archived monthly. The page was accessible by a special &quot;What&#39;s New&quot; button in the Mosaic web browser.</p>\r\n\r\n<p>The earliest instance of a commercial blog was on the first&nbsp;<a href=\"https://en.wikipedia.org/wiki/Business_to_consumer\">business to consumer</a>&nbsp;Web site created in 1995 by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Ty_Inc\">Ty, Inc.</a>, which featured a blog in a section called &quot;Online Diary&quot;. The entries were maintained by featured&nbsp;<a href=\"https://en.wikipedia.org/wiki/Beanie_Babies\">Beanie Babies</a>&nbsp;that were voted for monthly by Web site visitors.<a href=\"https://en.wikipedia.org/wiki/Blog#cite_note-BeanieBabies-16\">[16]</a></p>', 1, NULL, '2022-12-24 08:21:29', '2022-12-24 08:21:29'),
(3, 1, 'The emergence', 'uploads/blog/1671895307blog3.png', '<p>Before blogging became popular, digital communities took many forms, including&nbsp;<a href=\"https://en.wikipedia.org/wiki/Usenet\">Usenet</a>, commercial online services such as&nbsp;<a href=\"https://en.wikipedia.org/wiki/GEnie\">GEnie</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Byte_Information_Exchange\">Byte Information Exchange</a>&nbsp;(BIX) and the early&nbsp;<a href=\"https://en.wikipedia.org/wiki/CompuServe\">CompuServe</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Electronic_mailing_list\">e-mail lists</a>,<a href=\"https://en.wikipedia.org/wiki/Blog#cite_note-14\">[14]</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bulletin_Board_System\">Bulletin Board Systems</a>&nbsp;(BBS). In the 1990s,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Internet_forum\">Internet forum</a>&nbsp;software created running conversations with &quot;threads&quot;. Threads are topical connections between messages on a virtual &quot;<a href=\"https://en.wikipedia.org/wiki/Bulletin_board\">corkboard</a>&quot;. From June 14, 1993, Mosaic Communications Corporation maintained their &quot;What&#39;s New&quot;<a href=\"https://en.wikipedia.org/wiki/Blog#cite_note-15\">[15]</a>&nbsp;list of new websites, updated daily and archived monthly. The page was accessible by a special &quot;What&#39;s New&quot; button in the Mosaic web browser.</p>\r\n\r\n<p>The earliest instance of a commercial blog was on the first&nbsp;<a href=\"https://en.wikipedia.org/wiki/Business_to_consumer\">business to consumer</a>&nbsp;Web site created in 1995 by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Ty_Inc\">Ty, Inc.</a>, which featured a blog in a section called &quot;Online Diary&quot;. The entries were maintained by featured&nbsp;<a href=\"https://en.wikipedia.org/wiki/Beanie_Babies\">Beanie Babies</a>&nbsp;that were voted for monthly by Web site visitors.<a href=\"https://en.wikipedia.org/wiki/Blog#cite_note-BeanieBabies-16\">[16]</a></p>', 1, NULL, '2022-12-24 08:21:47', '2022-12-24 08:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `blog_id`, `user_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'good nice!', '2022-12-24 08:24:17', '2022-12-24 08:24:17'),
(3, 1, 1, 'sadas', '2022-12-27 19:05:22', '2022-12-27 19:05:22'),
(4, 1, 1, 'hello', '2022-12-27 19:08:27', '2022-12-27 19:08:27'),
(5, 1, 1, 'oo nau', '2022-12-27 19:09:48', '2022-12-27 19:09:48');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `path_image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ÁO POLO UNISEX', 'uploads/brand/167154911313102022111018_Web_3.jpg', 1, NULL, '2022-12-20 08:11:53', '2022-12-20 08:11:53'),
(2, 'ÁO THUN UNISEX - TOTODAY - CHAMPS', 'uploads/brand/1671549124hkfyhd__2_.jpg', 1, NULL, '2022-12-20 08:12:04', '2022-12-20 08:12:04');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Women’s', 0, 1, '2022-12-20 08:05:31', '2022-12-20 08:05:31', NULL),
(2, 'Men’s', 0, 1, '2022-12-20 08:05:43', '2022-12-20 08:05:43', NULL),
(3, 'Kid\'s', 0, 1, '2022-12-20 08:05:50', '2022-12-20 08:05:50', NULL),
(4, 'Shoes', 0, 1, '2022-12-20 08:05:57', '2022-12-20 08:05:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Yellow', '2022-12-20 08:13:11', '2022-12-20 08:13:11'),
(2, 'White', '2022-12-20 08:13:11', '2022-12-20 08:13:11'),
(3, 'Black', '2022-12-24 05:46:27', '2022-12-24 05:46:27'),
(4, 'Green', '2022-12-24 05:49:58', '2022-12-24 05:49:58'),
(5, 'Red', '2022-12-24 05:50:52', '2022-12-24 05:50:52'),
(6, 'Blue', '2022-12-24 05:57:11', '2022-12-24 05:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `email_verified_at`, `password`, `path_image`, `phone`, `address`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Join', 'join@gmail.com', NULL, '$2y$10$Tu6A.1ZMAKnCnEJDWi6pQu4OMtBLC1hNH5AswTusLNlKkHgcJKXsW', 'uploads/users/167189039113102022101056_Web_5.jpg', '0389288817', 'Ninh Binh', '9dLGVDnLOkeaxvH068GhIaBTeoV5vGkDWUeQP3iZivfguMF3zglDrQXAGwl7', NULL, '2022-12-24 06:06:23', '2022-12-24 06:59:51'),
(2, 'Đinh văn căn 1', 'das@gmail.com', NULL, '$2y$10$/otYPVtqV58WBUYPfh8GBO2kKOs6ZJRdsS3XCtsH18PSFd1.RRWCq', 'uploads/users/167189043813102022111018_Web_3.jpg', '04783248', 'Ninh Binh', NULL, NULL, '2022-12-24 07:00:38', '2022-12-24 07:00:38'),
(3, 'Đinh văn căn 1', 'dinhcan355@gmail.com', NULL, '$2y$10$AHDlquZflLHqHq/De1Hw6.SuSAFQEw6S3sbEN6GwciO7q6/71163m', NULL, '0389288817', 'Ninh Binh', 'r7cQGuEEHw7MPdwEQHYpunbTpqIwZUSEejMxRC1WUDscnfbc2WZXM75j57Xs', NULL, '2022-12-25 01:53:43', '2022-12-25 01:53:43');

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
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Home', 0, 1, NULL, '2022-12-20 07:55:36', '2022-12-20 07:55:36'),
(2, 'Shop', 0, 1, NULL, '2022-12-20 07:56:02', '2022-12-20 07:56:02'),
(3, 'About Us', 0, 0, NULL, '2022-12-20 07:56:40', '2022-12-24 08:25:03'),
(4, 'Contact Us', 0, 1, NULL, '2022-12-20 07:57:14', '2022-12-20 07:57:14'),
(5, 'Blogs', 0, 1, NULL, '2022-12-20 07:58:11', '2022-12-20 07:58:11');

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
(5, '2022_11_30_020219_create_categories_table', 1),
(6, '2022_11_30_152048_create_add_column_user_table', 1),
(7, '2022_11_30_155337_create_add_column_phone_user_table', 1),
(8, '2022_12_02_004922_create_menus_table', 1),
(9, '2022_12_02_011030_create_brands_table', 1),
(10, '2022_12_03_014156_create_banners_table', 1),
(11, '2022_12_03_025400_create_products_table', 1),
(12, '2022_12_03_025454_create_product_colors_table', 1),
(13, '2022_12_03_025508_create_product_images_table', 1),
(14, '2022_12_03_085647_create_colors_table', 1),
(15, '2022_12_04_090324_create_roles_table', 1),
(16, '2022_12_04_090343_create_permissions_table', 1),
(17, '2022_12_04_090425_role_user', 1),
(18, '2022_12_04_090441_role_permission', 1),
(19, '2022_12_06_034026_create_orders_table', 1),
(20, '2022_12_06_034042_create_order_details_table', 1),
(21, '2022_12_06_133010_create_backgrounds_table', 1),
(22, '2022_12_06_141204_create_product_sizes_table', 1),
(23, '2022_12_06_141224_create_sizes_table', 1),
(24, '2022_12_11_074359_create_contacts_table', 1),
(25, '2022_12_11_081443_create_porduct_comments_table', 1),
(26, '2022_12_12_033616_create_blogs_table', 1),
(27, '2022_12_13_014433_create_blog_comments_table', 1),
(28, '2022_12_15_124919_create_customers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `payment_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name`, `address`, `email`, `phone`, `status`, `payment_name`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 'Join', 'Ninh Binh', 'join@gmail.com', '0389288817', 1, 'pay_last', '123000', '2022-12-24 06:40:07', '2022-12-24 06:40:07'),
(2, 1, 'Join', 'Ninh Binh', 'join@gmail.com', '0389288817', 1, 'pay_last', '123000', '2022-12-24 06:41:20', '2022-12-24 06:41:20'),
(3, 1, 'Join', 'Ninh Binh', 'join@gmail.com', '0389288817', 1, 'pay_last', '120000', '2022-12-25 00:59:09', '2022-12-25 00:59:09'),
(4, 1, 'Join', 'Ninh Binh', 'join@gmail.com', '0389288817', 1, 'pay_last', '100000', '2022-12-25 00:59:38', '2022-12-25 00:59:38'),
(20, 1, 'Join', 'Ninh Binh', 'join@gmail.com', '0389288817', 1, 'momo_payment', '82000', '2022-12-25 01:41:22', '2022-12-25 01:41:22'),
(21, 1, 'Join', 'Ninh Binh', 'join@gmail.com', '0389288817', 1, 'momo_payment', '102000', '2022-12-25 01:44:39', '2022-12-25 01:44:39'),
(24, 1, 'Join', 'Ninh Binh', 'join@gmail.com', '0389288817', 1, 'momo_payment', '102000', '2022-12-25 01:47:11', '2022-12-25 01:47:11'),
(29, 1, 'Join', 'Ninh Binh', 'join@gmail.com', '0389288817', 1, 'pay_last', '82000', '2022-12-25 01:53:08', '2022-12-25 01:53:08'),
(36, 3, 'Đinh văn căn 1', 'Ninh Binh', 'dinhcan355@gmail.com', '0389288817', 4, 'pay_last', '120000', '2022-12-25 02:10:23', '2022-12-25 02:10:55'),
(37, 3, 'Đinh văn căn 1', 'Ninh Binh', 'dinhcan355@gmail.com', '0389288817', 1, 'momo_payment', '102000', '2022-12-25 02:15:31', '2022-12-25 02:15:31'),
(44, 3, 'Đinh văn căn 1', 'Ninh Binh', 'dinhcan355@gmail.com', '0389288817', 1, 'momo_payment', '120000', '2022-12-27 18:49:25', '2022-12-27 18:49:25'),
(46, 3, 'Đinh văn căn 1', 'Ninh Binh', 'dinhcan355@gmail.com', '0389288817', 1, 'momo_payment', '102000', '2022-12-27 18:53:02', '2022-12-27 18:53:02'),
(48, 3, 'Đinh văn căn 1', 'Ninh Binh', 'dinhcan355@gmail.com', '0389288817', 1, 'momo_payment', '325000', '2022-12-27 18:55:28', '2022-12-27 18:55:28');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `product_id`, `order_id`, `quantity`, `price`, `color`, `size`, `total`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '5', '223000', 'Yellow', 'S', '1115000', '2022-12-24 06:40:07', '2022-12-24 06:40:07'),
(2, '7', '1', '1', '99000', 'White', 'S', '99000', '2022-12-24 06:40:07', '2022-12-24 06:40:07'),
(3, '9', '2', '1', '120000', 'Yellow', 'S', '120000', '2022-12-24 06:41:20', '2022-12-24 06:41:20'),
(4, '11', '2', '1', '102000', 'White', 'S', '102000', '2022-12-24 06:41:20', '2022-12-24 06:41:20'),
(5, '1', '3', '1', '223000', 'Yellow', 'S', '223000', '2022-12-25 00:59:09', '2022-12-25 00:59:09'),
(6, '11', '4', '1', '102000', 'White', 'S', '102000', '2022-12-25 00:59:38', '2022-12-25 00:59:38'),
(16, '12', '20', '1', '82000', 'Yellow', 'S', '82000', '2022-12-25 01:41:22', '2022-12-25 01:41:22'),
(17, '11', '21', '1', '102000', 'White', 'S', '102000', '2022-12-25 01:44:39', '2022-12-25 01:44:39'),
(20, '11', '24', '1', '102000', 'White', 'S', '102000', '2022-12-25 01:47:11', '2022-12-25 01:47:11'),
(25, '12', '29', '1', '82000', 'Yellow', 'S', '82000', '2022-12-25 01:53:08', '2022-12-25 01:53:08'),
(26, '9', '36', '1', '120000', 'Yellow', 'S', '120000', '2022-12-25 02:10:23', '2022-12-25 02:10:23'),
(27, '11', '37', '1', '102000', 'White', 'S', '102000', '2022-12-25 02:15:31', '2022-12-25 02:15:31'),
(28, '9', '44', '1', '120000', 'Yellow', 'S', '120000', '2022-12-27 18:49:25', '2022-12-27 18:49:25'),
(29, '11', '46', '1', '102000', 'White', 'S', '102000', '2022-12-27 18:53:02', '2022-12-27 18:53:02'),
(30, '10', '48', '1', '325000', 'Yellow', 'S', '325000', '2022-12-27 18:55:28', '2022-12-27 18:55:28');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `key_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `parent_id`, `key_code`, `created_at`, `updated_at`) VALUES
(1, 'category', 0, NULL, NULL, NULL),
(2, 'category.index', 1, 'category.index', '2022-12-20 07:48:45', '2022-12-20 07:48:45'),
(3, 'category.create', 1, 'category.create', '2022-12-20 07:48:45', '2022-12-20 07:48:45'),
(4, 'category.store', 1, 'category.store', '2022-12-20 07:48:45', '2022-12-20 07:48:45'),
(5, 'category.show', 1, 'category.show', '2022-12-20 07:48:45', '2022-12-20 07:48:45'),
(6, 'category.edit', 1, 'category.edit', '2022-12-20 07:48:45', '2022-12-20 07:48:45'),
(7, 'category.update', 1, 'category.update', '2022-12-20 07:48:45', '2022-12-20 07:48:45'),
(8, 'category.destroy', 1, 'category.destroy', '2022-12-20 07:48:45', '2022-12-20 07:48:45'),
(9, 'categoryName', 1, 'categoryName', '2022-12-20 07:48:45', '2022-12-20 07:48:45'),
(10, 'banner', 0, NULL, NULL, NULL),
(11, 'banner.index', 10, 'banner.index', '2022-12-20 07:48:55', '2022-12-20 07:48:55'),
(12, 'banner.create', 10, 'banner.create', '2022-12-20 07:48:55', '2022-12-20 07:48:55'),
(13, 'banner.store', 10, 'banner.store', '2022-12-20 07:48:55', '2022-12-20 07:48:55'),
(14, 'banner.show', 10, 'banner.show', '2022-12-20 07:48:55', '2022-12-20 07:48:55'),
(15, 'banner.edit', 10, 'banner.edit', '2022-12-20 07:48:55', '2022-12-20 07:48:55'),
(16, 'banner.update', 10, 'banner.update', '2022-12-20 07:48:55', '2022-12-20 07:48:55'),
(17, 'banner.destroy', 10, 'banner.destroy', '2022-12-20 07:48:55', '2022-12-20 07:48:55'),
(18, 'dashboard', 0, NULL, NULL, NULL),
(19, 'dashboard', 18, 'dashboard', '2022-12-20 07:49:03', '2022-12-20 07:49:03'),
(20, 'background', 0, NULL, NULL, NULL),
(21, 'background.index', 20, 'background.index', '2022-12-20 07:49:16', '2022-12-20 07:49:16'),
(22, 'background.create', 20, 'background.create', '2022-12-20 07:49:16', '2022-12-20 07:49:16'),
(23, 'background.store', 20, 'background.store', '2022-12-20 07:49:16', '2022-12-20 07:49:16'),
(24, 'background.show', 20, 'background.show', '2022-12-20 07:49:16', '2022-12-20 07:49:16'),
(25, 'background.edit', 20, 'background.edit', '2022-12-20 07:49:16', '2022-12-20 07:49:16'),
(26, 'background.update', 20, 'background.update', '2022-12-20 07:49:16', '2022-12-20 07:49:16'),
(27, 'background.destroy', 20, 'background.destroy', '2022-12-20 07:49:16', '2022-12-20 07:49:16'),
(28, 'menu', 0, NULL, NULL, NULL),
(29, 'menu.index', 28, 'menu.index', '2022-12-20 07:49:25', '2022-12-20 07:49:25'),
(30, 'menu.create', 28, 'menu.create', '2022-12-20 07:49:25', '2022-12-20 07:49:25'),
(31, 'menu.store', 28, 'menu.store', '2022-12-20 07:49:25', '2022-12-20 07:49:25'),
(32, 'menu.show', 28, 'menu.show', '2022-12-20 07:49:25', '2022-12-20 07:49:25'),
(33, 'menu.edit', 28, 'menu.edit', '2022-12-20 07:49:25', '2022-12-20 07:49:25'),
(34, 'menu.update', 28, 'menu.update', '2022-12-20 07:49:25', '2022-12-20 07:49:25'),
(35, 'menu.destroy', 28, 'menu.destroy', '2022-12-20 07:49:25', '2022-12-20 07:49:25'),
(36, 'role', 0, NULL, NULL, NULL),
(37, 'role.index', 36, 'role.index', '2022-12-20 07:49:35', '2022-12-20 07:49:35'),
(38, 'role.create', 36, 'role.create', '2022-12-20 07:49:35', '2022-12-20 07:49:35'),
(39, 'role.store', 36, 'role.store', '2022-12-20 07:49:35', '2022-12-20 07:49:35'),
(40, 'role.show', 36, 'role.show', '2022-12-20 07:49:35', '2022-12-20 07:49:35'),
(41, 'role.edit', 36, 'role.edit', '2022-12-20 07:49:35', '2022-12-20 07:49:35'),
(42, 'role.update', 36, 'role.update', '2022-12-20 07:49:35', '2022-12-20 07:49:35'),
(43, 'role.destroy', 36, 'role.destroy', '2022-12-20 07:49:35', '2022-12-20 07:49:35'),
(44, 'user', 0, NULL, NULL, NULL),
(45, 'user.index', 44, 'user.index', '2022-12-20 07:49:46', '2022-12-20 07:49:46'),
(46, 'user.create', 44, 'user.create', '2022-12-20 07:49:46', '2022-12-20 07:49:46'),
(47, 'user.store', 44, 'user.store', '2022-12-20 07:49:46', '2022-12-20 07:49:46'),
(48, 'user.show', 44, 'user.show', '2022-12-20 07:49:46', '2022-12-20 07:49:46'),
(49, 'user.edit', 44, 'user.edit', '2022-12-20 07:49:46', '2022-12-20 07:49:46'),
(50, 'user.update', 44, 'user.update', '2022-12-20 07:49:46', '2022-12-20 07:49:46'),
(51, 'user.destroy', 44, 'user.destroy', '2022-12-20 07:49:46', '2022-12-20 07:49:46'),
(52, 'product', 0, NULL, NULL, NULL),
(53, 'product.index', 52, 'product.index', '2022-12-20 07:49:59', '2022-12-20 07:49:59'),
(54, 'product.create', 52, 'product.create', '2022-12-20 07:49:59', '2022-12-20 07:49:59'),
(55, 'product.store', 52, 'product.store', '2022-12-20 07:49:59', '2022-12-20 07:49:59'),
(56, 'product.show', 52, 'product.show', '2022-12-20 07:49:59', '2022-12-20 07:49:59'),
(57, 'product.edit', 52, 'product.edit', '2022-12-20 07:49:59', '2022-12-20 07:49:59'),
(58, 'product.update', 52, 'product.update', '2022-12-20 07:49:59', '2022-12-20 07:49:59'),
(59, 'product.destroy', 52, 'product.destroy', '2022-12-20 07:49:59', '2022-12-20 07:49:59'),
(60, 'product_detail', 52, 'product_detail', '2022-12-20 07:49:59', '2022-12-20 07:49:59'),
(61, 'product_cart', 52, 'product_cart', '2022-12-20 07:49:59', '2022-12-20 07:49:59'),
(62, 'product_cart_add', 52, 'product_cart_add', '2022-12-20 07:49:59', '2022-12-20 07:49:59'),
(63, 'product_cart_update', 52, 'product_cart_update', '2022-12-20 07:49:59', '2022-12-20 07:49:59'),
(64, 'product_cart_delete', 52, 'product_cart_delete', '2022-12-20 07:49:59', '2022-12-20 07:49:59'),
(65, 'product_cart_destroy', 52, 'product_cart_destroy', '2022-12-20 07:49:59', '2022-12-20 07:49:59'),
(66, 'product_cart_checkout', 52, 'product_cart_checkout', '2022-12-20 07:49:59', '2022-12-20 07:49:59'),
(67, 'contact', 0, NULL, NULL, NULL),
(68, 'contact.index', 67, 'contact.index', '2022-12-20 07:50:09', '2022-12-20 07:50:09'),
(69, 'contact.create', 67, 'contact.create', '2022-12-20 07:50:09', '2022-12-20 07:50:09'),
(70, 'contact.store', 67, 'contact.store', '2022-12-20 07:50:09', '2022-12-20 07:50:09'),
(71, 'contact.show', 67, 'contact.show', '2022-12-20 07:50:09', '2022-12-20 07:50:09'),
(72, 'contact.edit', 67, 'contact.edit', '2022-12-20 07:50:09', '2022-12-20 07:50:09'),
(73, 'contact.update', 67, 'contact.update', '2022-12-20 07:50:09', '2022-12-20 07:50:09'),
(74, 'contact.destroy', 67, 'contact.destroy', '2022-12-20 07:50:09', '2022-12-20 07:50:09'),
(75, 'blog', 0, NULL, NULL, NULL),
(76, 'blog.index', 75, 'blog.index', '2022-12-20 07:50:18', '2022-12-20 07:50:18'),
(77, 'blog.create', 75, 'blog.create', '2022-12-20 07:50:18', '2022-12-20 07:50:18'),
(78, 'blog.store', 75, 'blog.store', '2022-12-20 07:50:18', '2022-12-20 07:50:18'),
(79, 'blog.show', 75, 'blog.show', '2022-12-20 07:50:18', '2022-12-20 07:50:18'),
(80, 'blog.edit', 75, 'blog.edit', '2022-12-20 07:50:18', '2022-12-20 07:50:18'),
(81, 'blog.update', 75, 'blog.update', '2022-12-20 07:50:18', '2022-12-20 07:50:18'),
(82, 'blog.destroy', 75, 'blog.destroy', '2022-12-20 07:50:18', '2022-12-20 07:50:18'),
(83, 'blog_detail', 75, 'blog_detail', '2022-12-20 07:50:18', '2022-12-20 07:50:18'),
(84, 'order', 0, NULL, NULL, NULL),
(85, 'order.status', 84, 'order.status', '2022-12-20 07:50:31', '2022-12-20 07:50:31'),
(86, 'order.index', 84, 'order.index', '2022-12-20 07:50:31', '2022-12-20 07:50:31'),
(87, 'order.create', 84, 'order.create', '2022-12-20 07:50:31', '2022-12-20 07:50:31'),
(88, 'order.store', 84, 'order.store', '2022-12-20 07:50:31', '2022-12-20 07:50:31'),
(89, 'order.show', 84, 'order.show', '2022-12-20 07:50:31', '2022-12-20 07:50:31'),
(90, 'order.edit', 84, 'order.edit', '2022-12-20 07:50:31', '2022-12-20 07:50:31'),
(91, 'order.update', 84, 'order.update', '2022-12-20 07:50:31', '2022-12-20 07:50:31'),
(92, 'order.destroy', 84, 'order.destroy', '2022-12-20 07:50:31', '2022-12-20 07:50:31'),
(93, 'order.inPdf', 84, 'order.inPdf', '2022-12-20 07:50:31', '2022-12-20 07:50:31'),
(94, 'orderDetail', 84, 'orderDetail', '2022-12-20 07:50:31', '2022-12-20 07:50:31'),
(95, 'permission', 0, NULL, NULL, NULL),
(96, 'permission.index', 95, 'permission.index', '2022-12-20 07:50:41', '2022-12-20 07:50:41'),
(97, 'permission.create', 95, 'permission.create', '2022-12-20 07:50:41', '2022-12-20 07:50:41'),
(98, 'permission.store', 95, 'permission.store', '2022-12-20 07:50:41', '2022-12-20 07:50:41'),
(99, 'permission.show', 95, 'permission.show', '2022-12-20 07:50:41', '2022-12-20 07:50:41'),
(100, 'permission.edit', 95, 'permission.edit', '2022-12-20 07:50:41', '2022-12-20 07:50:41'),
(101, 'permission.update', 95, 'permission.update', '2022-12-20 07:50:41', '2022-12-20 07:50:41'),
(102, 'permission.destroy', 95, 'permission.destroy', '2022-12-20 07:50:41', '2022-12-20 07:50:41'),
(103, 'brand', 0, NULL, NULL, NULL),
(104, 'brand.index', 103, 'brand.index', '2022-12-20 08:11:17', '2022-12-20 08:11:17'),
(105, 'brand.create', 103, 'brand.create', '2022-12-20 08:11:17', '2022-12-20 08:11:17'),
(106, 'brand.store', 103, 'brand.store', '2022-12-20 08:11:17', '2022-12-20 08:11:17'),
(107, 'brand.show', 103, 'brand.show', '2022-12-20 08:11:17', '2022-12-20 08:11:17'),
(108, 'brand.edit', 103, 'brand.edit', '2022-12-20 08:11:17', '2022-12-20 08:11:17'),
(109, 'brand.update', 103, 'brand.update', '2022-12-20 08:11:17', '2022-12-20 08:11:17'),
(110, 'brand.destroy', 103, 'brand.destroy', '2022-12-20 08:11:17', '2022-12-20 08:11:17'),
(111, 'customer', 0, NULL, NULL, NULL),
(112, 'customer.index', 111, 'customer.index', '2022-12-24 06:44:35', '2022-12-24 06:44:35'),
(113, 'customer.create', 111, 'customer.create', '2022-12-24 06:44:35', '2022-12-24 06:44:35'),
(114, 'customer.store', 111, 'customer.store', '2022-12-24 06:44:35', '2022-12-24 06:44:35'),
(115, 'customer.show', 111, 'customer.show', '2022-12-24 06:44:35', '2022-12-24 06:44:35'),
(116, 'customer.edit', 111, 'customer.edit', '2022-12-24 06:44:35', '2022-12-24 06:44:35'),
(117, 'customer.update', 111, 'customer.update', '2022-12-24 06:44:35', '2022-12-24 06:44:35'),
(118, 'customer.destroy', 111, 'customer.destroy', '2022-12-24 06:44:35', '2022-12-24 06:44:35');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `path_image`, `price`, `sale_price`, `amount`, `content`, `description`, `category_id`, `brand_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ÁO POLO UNISEX', 'uploads/product/167154919113102022111018_Web_3.jpg', '243000.00', '20000.00', 13, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio reiciendis incidunt aliquid animi cum aut facilis! Dolore voluptates officiis minima laboriosam, itaque eveniet iste pariatur nihil perferendis placeat repellendus hic.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio reiciendis incidunt aliquid animi cum aut facilis! Dolore voluptates officiis minima laboriosam, itaque eveniet iste pariatur nihil perferendis placeat repellendus hic.</p>', 2, 1, NULL, NULL, '2022-12-25 00:59:09'),
(2, 'ÁO POLO UNISEX', 'uploads/product/1671885987dhfgbfd__2_.jpg', '243000.00', NULL, 22, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio reiciendis incidunt aliquid animi cum aut facilis! Dolore voluptates officiis minima laboriosam, itaque eveniet iste pariatur nihil perferendis placeat repellendus hic.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio reiciendis incidunt aliquid animi cum aut facilis! Dolore voluptates officiis minima laboriosam, itaque eveniet iste pariatur nihil perferendis placeat repellendus hic.</p>', 2, 2, NULL, NULL, NULL),
(3, 'QUẦN SHORT', 'uploads/product/1671886059gdg.jpg', '122000.00', NULL, 12, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio reiciendis incidunt aliquid animi cum aut facilis! Dolore voluptates officiis minima laboriosam, itaque eveniet iste pariatur nihil perferendis placeat repellendus hic.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio reiciendis incidunt aliquid animi cum aut facilis! Dolore voluptates officiis minima laboriosam, itaque eveniet iste pariatur nihil perferendis placeat repellendus hic.</p>', 1, 1, NULL, NULL, NULL),
(4, 'ÁO KHOÁC NAM POLO', 'uploads/product/1671886119IMG_9238.gif', '255000.00', '20000.00', 33, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio reiciendis incidunt aliquid animi cum aut facilis! Dolore voluptates officiis minima laboriosam, itaque eveniet iste pariatur nihil perferendis placeat repellendus hic.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio reiciendis incidunt aliquid animi cum aut facilis! Dolore voluptates officiis minima laboriosam, itaque eveniet iste pariatur nihil perferendis placeat repellendus hic.</p>', 1, 1, NULL, NULL, NULL),
(5, 'ÁO POLO TOTODAY', 'uploads/product/1671886198product22.jpg', '134000.00', NULL, 22, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio reiciendis incidunt aliquid animi cum aut facilis! Dolore voluptates officiis minima laboriosam, itaque eveniet iste pariatur nihil perferendis placeat repellendus hic.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio reiciendis incidunt aliquid animi cum aut facilis! Dolore voluptates officiis minima laboriosam, itaque eveniet iste pariatur nihil perferendis placeat repellendus hic.</p>', 2, 1, NULL, NULL, NULL),
(6, 'ÁO POLO UNISEX  RED', 'uploads/product/1671886252product444.jpg', '345000.00', '40000.00', 11, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio reiciendis incidunt aliquid animi cum aut facilis! Dolore voluptates officiis minima laboriosam, itaque eveniet iste pariatur nihil perferendis placeat repellendus hic.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio reiciendis incidunt aliquid animi cum aut facilis! Dolore voluptates officiis minima laboriosam, itaque eveniet iste pariatur nihil perferendis placeat repellendus hic.</p>', 3, 1, NULL, NULL, '2022-12-24 06:31:43'),
(7, 'QUẦN NGẮN NỮ', 'uploads/product/1671886364hkfyhd__2_.jpg', '99000.00', NULL, 31, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio reiciendis incidunt aliquid animi cum aut facilis! Dolore voluptates officiis minima laboriosam, itaque eveniet iste pariatur nihil perferendis placeat repellendus hic.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio reiciendis incidunt aliquid animi cum aut facilis! Dolore voluptates officiis minima laboriosam, itaque eveniet iste pariatur nihil perferendis placeat repellendus hic.</p>', 1, 1, NULL, NULL, '2022-12-24 06:40:07'),
(8, 'ÁO POLO WARTA', 'uploads/product/1671886421product2222.jpg', '223000.00', '20000.00', 18, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio reiciendis incidunt aliquid animi cum aut facilis! Dolore voluptates officiis minima laboriosam, itaque eveniet iste pariatur nihil perferendis placeat repellendus hic.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio reiciendis incidunt aliquid animi cum aut facilis! Dolore voluptates officiis minima laboriosam, itaque eveniet iste pariatur nihil perferendis placeat repellendus hic.</p>', 4, 1, NULL, NULL, '2022-12-24 06:33:24'),
(9, 'ÁO POLO SHIRT', 'uploads/product/1671886469product11.jpg', '143000.00', '23000.00', 9, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio reiciendis incidunt aliquid animi cum aut facilis! Dolore voluptates officiis minima laboriosam, itaque eveniet iste pariatur nihil perferendis placeat repellendus hic.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio reiciendis incidunt aliquid animi cum aut facilis! Dolore voluptates officiis minima laboriosam, itaque eveniet iste pariatur nihil perferendis placeat repellendus hic.</p>', 3, 1, NULL, NULL, '2022-12-27 18:49:25'),
(10, 'ÁO HOLDDI NAM NỮ', 'uploads/product/167188653513102022111055_Web_4.jpg', '345000.00', '20000.00', 32, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio reiciendis incidunt aliquid animi cum aut facilis! Dolore voluptates officiis minima laboriosam, itaque eveniet iste pariatur nihil perferendis placeat repellendus hic.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio reiciendis incidunt aliquid animi cum aut facilis! Dolore voluptates officiis minima laboriosam, itaque eveniet iste pariatur nihil perferendis placeat repellendus hic.</p>', 1, 1, NULL, NULL, '2022-12-27 18:55:28'),
(11, 'ÁO POLO UNISEX BLUE', 'uploads/product/1671886631product111.jpg', '122000.00', '20000.00', 16, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio reiciendis incidunt aliquid animi cum aut facilis! Dolore voluptates officiis minima laboriosam, itaque eveniet iste pariatur nihil perferendis placeat repellendus hic.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio reiciendis incidunt aliquid animi cum aut facilis! Dolore voluptates officiis minima laboriosam, itaque eveniet iste pariatur nihil perferendis placeat repellendus hic.</p>', 4, 1, NULL, NULL, '2022-12-27 18:53:02'),
(12, 'QUẦN NGẮN', 'uploads/product/1671886680hkfyhd__3_.jpg', '122000.00', '40000.00', 10, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio reiciendis incidunt aliquid animi cum aut facilis! Dolore voluptates officiis minima laboriosam, itaque eveniet iste pariatur nihil perferendis placeat repellendus hic.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio reiciendis incidunt aliquid animi cum aut facilis! Dolore voluptates officiis minima laboriosam, itaque eveniet iste pariatur nihil perferendis placeat repellendus hic.</p>', 1, 1, NULL, NULL, '2022-12-25 01:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-12-20 08:13:11', '2022-12-20 08:13:11'),
(2, 1, 2, '2022-12-20 08:13:11', '2022-12-20 08:13:11'),
(3, 2, 1, '2022-12-24 05:46:27', '2022-12-24 05:46:27'),
(4, 2, 3, '2022-12-24 05:46:27', '2022-12-24 05:46:27'),
(5, 3, 1, '2022-12-24 05:47:39', '2022-12-24 05:47:39'),
(6, 3, 2, '2022-12-24 05:47:39', '2022-12-24 05:47:39'),
(7, 4, 1, '2022-12-24 05:48:39', '2022-12-24 05:48:39'),
(8, 4, 2, '2022-12-24 05:48:39', '2022-12-24 05:48:39'),
(9, 5, 2, '2022-12-24 05:49:58', '2022-12-24 05:49:58'),
(10, 5, 3, '2022-12-24 05:49:58', '2022-12-24 05:49:58'),
(11, 5, 4, '2022-12-24 05:49:58', '2022-12-24 05:49:58'),
(12, 6, 3, '2022-12-24 05:50:52', '2022-12-24 05:50:52'),
(13, 6, 5, '2022-12-24 05:50:52', '2022-12-24 05:50:52'),
(14, 7, 2, '2022-12-24 05:52:44', '2022-12-24 05:52:44'),
(15, 7, 3, '2022-12-24 05:52:44', '2022-12-24 05:52:44'),
(16, 8, 1, '2022-12-24 05:53:41', '2022-12-24 05:53:41'),
(17, 8, 3, '2022-12-24 05:53:41', '2022-12-24 05:53:41'),
(18, 9, 1, '2022-12-24 05:54:29', '2022-12-24 05:54:29'),
(19, 9, 2, '2022-12-24 05:54:29', '2022-12-24 05:54:29'),
(20, 10, 1, '2022-12-24 05:55:35', '2022-12-24 05:55:35'),
(21, 10, 2, '2022-12-24 05:55:35', '2022-12-24 05:55:35'),
(22, 10, 3, '2022-12-24 05:55:35', '2022-12-24 05:55:35'),
(23, 11, 2, '2022-12-24 05:57:11', '2022-12-24 05:57:11'),
(24, 11, 4, '2022-12-24 05:57:11', '2022-12-24 05:57:11'),
(25, 11, 6, '2022-12-24 05:57:11', '2022-12-24 05:57:11'),
(26, 12, 1, '2022-12-24 05:58:00', '2022-12-24 05:58:00'),
(27, 12, 3, '2022-12-24 05:58:00', '2022-12-24 05:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_comments`
--

CREATE TABLE `product_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_comments`
--

INSERT INTO `product_comments` (`id`, `user_id`, `product_id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 'Đinh văn căn 1', 'dinhcan355@gmail.com', 'nice!', '2022-12-26 20:57:46', '2022-12-26 20:57:46'),
(2, 1, 10, 'Đinh văn căn 1', 'dinhcan355@gmail.com', 'cha hay two nap', '2022-12-26 21:02:38', '2022-12-26 21:02:38'),
(5, 1, 12, 'Join', 'dinhcan355@gmail.com', 'nice!', '2022-12-26 21:22:24', '2022-12-26 21:22:24'),
(6, 1, 12, 'Đinh văn căn 1', 'dinhcan355@gmail.com', 'hay qua', '2022-12-26 21:22:47', '2022-12-26 21:22:47'),
(7, 1, 12, 'Đinh văn căn 1', 'dinhcan355@gmail.com', 'asdsad', '2022-12-26 21:23:34', '2022-12-26 21:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `path_image`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'uploads/productImage/167154919113102022101056_Web_5.jpg', 1, '2022-12-20 08:13:11', '2022-12-20 08:13:11'),
(2, 'uploads/productImage/167154919113102022111034_Web_1.jpg', 1, '2022-12-20 08:13:11', '2022-12-20 08:13:11'),
(3, 'uploads/productImage/167154919113102022111044_Web_2.jpg', 1, '2022-12-20 08:13:11', '2022-12-20 08:13:11'),
(4, 'uploads/productImage/1671885987product1.jpg', 2, '2022-12-24 05:46:27', '2022-12-24 05:46:27'),
(5, 'uploads/productImage/1671885987product3.jpg', 2, '2022-12-24 05:46:27', '2022-12-24 05:46:27'),
(6, 'uploads/productImage/1671885987product4.jpg', 2, '2022-12-24 05:46:27', '2022-12-24 05:46:27'),
(7, 'uploads/productImage/1671886059hkfyhd__1_.jpg', 3, '2022-12-24 05:47:39', '2022-12-24 05:47:39'),
(8, 'uploads/productImage/1671886059hkfyhd__2_.jpg', 3, '2022-12-24 05:47:39', '2022-12-24 05:47:39'),
(9, 'uploads/productImage/1671886059hkfyhd__3_.jpg', 3, '2022-12-24 05:47:39', '2022-12-24 05:47:39'),
(10, 'uploads/productImage/1671886119IMG_9230.gif', 4, '2022-12-24 05:48:39', '2022-12-24 05:48:39'),
(11, 'uploads/productImage/1671886119IMG_9237.gif', 4, '2022-12-24 05:48:39', '2022-12-24 05:48:39'),
(12, 'uploads/productImage/1671886198product4.jpg', 5, '2022-12-24 05:49:58', '2022-12-24 05:49:58'),
(13, 'uploads/productImage/1671886198product5.jpg', 5, '2022-12-24 05:49:58', '2022-12-24 05:49:58'),
(14, 'uploads/productImage/1671886198product11.jpg', 5, '2022-12-24 05:49:58', '2022-12-24 05:49:58'),
(15, 'uploads/productImage/1671886252product55.jpg', 6, '2022-12-24 05:50:52', '2022-12-24 05:50:52'),
(16, 'uploads/productImage/1671886252product111.jpg', 6, '2022-12-24 05:50:52', '2022-12-24 05:50:52'),
(17, 'uploads/productImage/1671886252product333.jpg', 6, '2022-12-24 05:50:52', '2022-12-24 05:50:52'),
(18, 'uploads/productImage/1671886364gdg.jpg', 7, '2022-12-24 05:52:44', '2022-12-24 05:52:44'),
(19, 'uploads/productImage/1671886364hkfyhd__1_.jpg', 7, '2022-12-24 05:52:44', '2022-12-24 05:52:44'),
(20, 'uploads/productImage/1671886364hkfyhd__3_.jpg', 7, '2022-12-24 05:52:44', '2022-12-24 05:52:44'),
(21, 'uploads/productImage/1671886421product5.jpg', 8, '2022-12-24 05:53:41', '2022-12-24 05:53:41'),
(22, 'uploads/productImage/1671886421product11.jpg', 8, '2022-12-24 05:53:41', '2022-12-24 05:53:41'),
(23, 'uploads/productImage/1671886421product22.jpg', 8, '2022-12-24 05:53:41', '2022-12-24 05:53:41'),
(24, 'uploads/productImage/1671886469product4.jpg', 9, '2022-12-24 05:54:29', '2022-12-24 05:54:29'),
(25, 'uploads/productImage/1671886469product5.jpg', 9, '2022-12-24 05:54:29', '2022-12-24 05:54:29'),
(26, 'uploads/productImage/1671886469product11.jpg', 9, '2022-12-24 05:54:29', '2022-12-24 05:54:29'),
(27, 'uploads/productImage/167188653513102022101056_Web_5.jpg', 10, '2022-12-24 05:55:35', '2022-12-24 05:55:35'),
(28, 'uploads/productImage/167188653513102022111034_Web_1.jpg', 10, '2022-12-24 05:55:35', '2022-12-24 05:55:35'),
(29, 'uploads/productImage/167188653513102022111044_Web_2.jpg', 10, '2022-12-24 05:55:35', '2022-12-24 05:55:35'),
(30, 'uploads/productImage/1671886631product5.jpg', 11, '2022-12-24 05:57:11', '2022-12-24 05:57:11'),
(31, 'uploads/productImage/1671886631product11 - Copy.jpg', 11, '2022-12-24 05:57:11', '2022-12-24 05:57:11'),
(32, 'uploads/productImage/1671886631product222.jpg', 11, '2022-12-24 05:57:11', '2022-12-24 05:57:11'),
(33, 'uploads/productImage/1671886680gdg.jpg', 12, '2022-12-24 05:58:00', '2022-12-24 05:58:00'),
(34, 'uploads/productImage/1671886680hkfyhd__1_.jpg', 12, '2022-12-24 05:58:00', '2022-12-24 05:58:00'),
(35, 'uploads/productImage/1671886680hkfyhd__2_.jpg', 12, '2022-12-24 05:58:00', '2022-12-24 05:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-12-20 08:13:11', '2022-12-20 08:13:11'),
(2, 1, 2, '2022-12-20 08:13:11', '2022-12-20 08:13:11'),
(3, 1, 3, '2022-12-20 08:13:11', '2022-12-20 08:13:11'),
(4, 2, 1, '2022-12-24 05:46:27', '2022-12-24 05:46:27'),
(5, 2, 2, '2022-12-24 05:46:27', '2022-12-24 05:46:27'),
(6, 3, 1, '2022-12-24 05:47:39', '2022-12-24 05:47:39'),
(7, 4, 1, '2022-12-24 05:48:39', '2022-12-24 05:48:39'),
(8, 4, 2, '2022-12-24 05:48:39', '2022-12-24 05:48:39'),
(9, 4, 3, '2022-12-24 05:48:39', '2022-12-24 05:48:39'),
(10, 5, 1, '2022-12-24 05:49:58', '2022-12-24 05:49:58'),
(11, 5, 2, '2022-12-24 05:49:58', '2022-12-24 05:49:58'),
(12, 5, 3, '2022-12-24 05:49:58', '2022-12-24 05:49:58'),
(13, 6, 1, '2022-12-24 05:50:52', '2022-12-24 05:50:52'),
(14, 6, 2, '2022-12-24 05:50:52', '2022-12-24 05:50:52'),
(15, 6, 3, '2022-12-24 05:50:52', '2022-12-24 05:50:52'),
(16, 7, 1, '2022-12-24 05:52:44', '2022-12-24 05:52:44'),
(17, 8, 1, '2022-12-24 05:53:41', '2022-12-24 05:53:41'),
(18, 8, 2, '2022-12-24 05:53:41', '2022-12-24 05:53:41'),
(19, 8, 3, '2022-12-24 05:53:41', '2022-12-24 05:53:41'),
(20, 9, 1, '2022-12-24 05:54:29', '2022-12-24 05:54:29'),
(21, 9, 2, '2022-12-24 05:54:29', '2022-12-24 05:54:29'),
(22, 10, 1, '2022-12-24 05:55:35', '2022-12-24 05:55:35'),
(23, 10, 2, '2022-12-24 05:55:35', '2022-12-24 05:55:35'),
(24, 10, 3, '2022-12-24 05:55:35', '2022-12-24 05:55:35'),
(25, 11, 1, '2022-12-24 05:57:11', '2022-12-24 05:57:11'),
(26, 11, 2, '2022-12-24 05:57:11', '2022-12-24 05:57:11'),
(27, 11, 3, '2022-12-24 05:57:11', '2022-12-24 05:57:11'),
(28, 12, 1, '2022-12-24 05:58:00', '2022-12-24 05:58:00'),
(29, 12, 2, '2022-12-24 05:58:00', '2022-12-24 05:58:00'),
(30, 12, 3, '2022-12-24 05:58:00', '2022-12-24 05:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', '2022-12-20 07:48:24', '2022-12-20 07:48:24');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(2, 1, 3, NULL, NULL),
(3, 1, 4, NULL, NULL),
(4, 1, 5, NULL, NULL),
(5, 1, 6, NULL, NULL),
(6, 1, 7, NULL, NULL),
(7, 1, 8, NULL, NULL),
(8, 1, 9, NULL, NULL),
(9, 1, 11, NULL, NULL),
(10, 1, 12, NULL, NULL),
(11, 1, 13, NULL, NULL),
(12, 1, 14, NULL, NULL),
(13, 1, 15, NULL, NULL),
(14, 1, 16, NULL, NULL),
(15, 1, 17, NULL, NULL),
(16, 1, 19, NULL, NULL),
(17, 1, 21, NULL, NULL),
(18, 1, 22, NULL, NULL),
(19, 1, 23, NULL, NULL),
(20, 1, 24, NULL, NULL),
(21, 1, 25, NULL, NULL),
(22, 1, 26, NULL, NULL),
(23, 1, 27, NULL, NULL),
(24, 1, 29, NULL, NULL),
(25, 1, 30, NULL, NULL),
(26, 1, 31, NULL, NULL),
(27, 1, 32, NULL, NULL),
(28, 1, 33, NULL, NULL),
(29, 1, 34, NULL, NULL),
(30, 1, 35, NULL, NULL),
(31, 1, 37, NULL, NULL),
(32, 1, 38, NULL, NULL),
(33, 1, 39, NULL, NULL),
(34, 1, 40, NULL, NULL),
(35, 1, 41, NULL, NULL),
(36, 1, 42, NULL, NULL),
(37, 1, 43, NULL, NULL),
(38, 1, 45, NULL, NULL),
(39, 1, 46, NULL, NULL),
(40, 1, 47, NULL, NULL),
(41, 1, 48, NULL, NULL),
(42, 1, 49, NULL, NULL),
(43, 1, 50, NULL, NULL),
(44, 1, 51, NULL, NULL),
(45, 1, 53, NULL, NULL),
(46, 1, 54, NULL, NULL),
(47, 1, 55, NULL, NULL),
(48, 1, 56, NULL, NULL),
(49, 1, 57, NULL, NULL),
(50, 1, 58, NULL, NULL),
(51, 1, 59, NULL, NULL),
(52, 1, 60, NULL, NULL),
(53, 1, 61, NULL, NULL),
(54, 1, 62, NULL, NULL),
(55, 1, 63, NULL, NULL),
(56, 1, 64, NULL, NULL),
(57, 1, 65, NULL, NULL),
(58, 1, 66, NULL, NULL),
(59, 1, 68, NULL, NULL),
(60, 1, 69, NULL, NULL),
(61, 1, 70, NULL, NULL),
(62, 1, 71, NULL, NULL),
(63, 1, 72, NULL, NULL),
(64, 1, 73, NULL, NULL),
(65, 1, 74, NULL, NULL),
(66, 1, 76, NULL, NULL),
(67, 1, 77, NULL, NULL),
(68, 1, 78, NULL, NULL),
(69, 1, 79, NULL, NULL),
(70, 1, 80, NULL, NULL),
(71, 1, 81, NULL, NULL),
(72, 1, 82, NULL, NULL),
(73, 1, 83, NULL, NULL),
(74, 1, 85, NULL, NULL),
(75, 1, 86, NULL, NULL),
(76, 1, 87, NULL, NULL),
(77, 1, 88, NULL, NULL),
(78, 1, 89, NULL, NULL),
(79, 1, 90, NULL, NULL),
(80, 1, 91, NULL, NULL),
(81, 1, 92, NULL, NULL),
(82, 1, 93, NULL, NULL),
(83, 1, 94, NULL, NULL),
(84, 1, 96, NULL, NULL),
(85, 1, 97, NULL, NULL),
(86, 1, 98, NULL, NULL),
(87, 1, 99, NULL, NULL),
(88, 1, 100, NULL, NULL),
(89, 1, 101, NULL, NULL),
(90, 1, 102, NULL, NULL),
(91, 1, 104, NULL, NULL),
(92, 1, 105, NULL, NULL),
(93, 1, 106, NULL, NULL),
(94, 1, 107, NULL, NULL),
(95, 1, 108, NULL, NULL),
(96, 1, 109, NULL, NULL),
(97, 1, 110, NULL, NULL),
(98, 1, 112, NULL, NULL),
(99, 1, 113, NULL, NULL),
(100, 1, 114, NULL, NULL),
(101, 1, 115, NULL, NULL),
(102, 1, 116, NULL, NULL),
(103, 1, 117, NULL, NULL),
(104, 1, 118, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'S', '2022-12-20 08:13:11', '2022-12-20 08:13:11'),
(2, 'XL', '2022-12-20 08:13:11', '2022-12-20 08:13:11'),
(3, 'M', '2022-12-20 08:13:11', '2022-12-20 08:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `image`, `address`, `phone`) VALUES
(1, 'Đinh Văn Căn', 'dinhcan355@gmail.com', NULL, '$2y$10$8sTnnGRj0ADxkSP4db0QquRcBCfGrS3a9IjlFZPKW2lP0NJY3Mhgm', 'qTCQZqLYTNw6EPBCxWOateksjBB4iWw0E2J2euJKcg0qGkDFPD9kZ0xNOOWA', NULL, '2022-12-14 08:39:30', '2022-12-20 08:39:30', NULL, 'Ninh Bình', '0389288834'),
(2, 'Join', 'join@gmail.com', NULL, '$2y$10$bmLbq65OjK1VzcFGZ6EF9eiXipJKwig8qOQmrY.5qXGEVnOSRtnt6', NULL, NULL, '2022-12-24 08:17:07', '2022-12-24 08:17:07', NULL, 'Ninh Binh', '04783248'),
(3, 'asda', 'das@gmail.com', NULL, '$2y$10$xWRFvu/lEuDxKCTy0rpDqeNjsDXiBPBcxEPZ9/im7xNsbqA6m8XcO', NULL, NULL, '2022-12-24 08:17:51', '2022-12-24 08:17:51', NULL, 'Ninh Binh', '04783248');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backgrounds`
--
ALTER TABLE `backgrounds`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backgrounds`
--
ALTER TABLE `backgrounds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
