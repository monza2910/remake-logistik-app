-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2021 at 06:53 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kmj-profile`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `thumbnail`, `category_id`, `user_id`, `content`, `created_at`, `updated_at`, `deleted_at`, `status`, `slug`) VALUES
(13, 'Cara membuat website yang baik dan benar', '7576a81d40a511e2724e188bf47d5b99.jpg', 6, 3, '<p>sasasasaa</p>', '2021-08-21 23:18:30', '2021-08-24 02:51:13', NULL, 0, 'cara-membuat-website-yang-baik-dan-benar'),
(14, 'Cara menjadi Businnes Man', '14ae34ad42c811284fae850ca35e72a4.jpg', 6, 3, '<p>dsadasdadadsad</p>', '2021-08-21 23:50:27', '2021-08-24 02:50:27', NULL, 1, 'cara-menjadi-businnes-man'),
(15, 'Cara Mencari informasi di google', '2cd136f5cadcf0b908b9763d66622ace.png', 6, 3, '<p>Aku adalah nauval&nbsp;</p>\n\n<p>aku ganteng no debat&nbsp;</p>', '2021-08-22 20:51:14', '2021-08-24 02:50:51', NULL, 1, 'cara-mencari-informasi-di-google'),
(16, 'Cara membuat Invoice', '09e7042760ec36b79ed06f858479d601.png', 6, 3, '<p><img alt=\"\" src=\"http://127.0.0.1:8000/images/articles/Screenshot (3)_1629690892.png\" style=\"float:left; height:200px; width:356px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '2021-08-22 20:56:06', '2021-08-29 00:22:47', NULL, 1, 'cara-membuat-invoice');

-- --------------------------------------------------------

--
-- Table structure for table `articles_tags`
--

CREATE TABLE `articles_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `articles_id` int(11) NOT NULL,
  `tags_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles_tags`
--

INSERT INTO `articles_tags` (`id`, `articles_id`, `tags_id`, `created_at`, `updated_at`) VALUES
(1, 14, 5, NULL, NULL),
(2, 14, 4, NULL, NULL),
(3, 14, 3, NULL, NULL),
(4, 14, 2, NULL, NULL),
(5, 15, 5, NULL, NULL),
(6, 15, 4, NULL, NULL),
(7, 15, 3, NULL, NULL),
(8, 15, 2, NULL, NULL),
(9, 16, 5, NULL, NULL),
(10, 16, 4, NULL, NULL),
(11, 16, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `buttons`
--

CREATE TABLE `buttons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buttons`
--

INSERT INTO `buttons` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'our-team', '2021-08-09 11:24:19', '2021-08-09 11:24:19'),
(4, 'about-us', '2021-08-09 22:37:46', '2021-08-09 22:37:46'),
(5, 'check-resi', '2021-08-09 22:38:13', '2021-08-09 22:38:13'),
(6, 'hexa-logistics', '2021-08-10 00:34:38', '2021-08-10 00:34:38'),
(7, 'hexa-logistics', '2021-08-10 00:36:52', '2021-08-10 00:36:52'),
(8, 'indocargo', '2021-08-10 00:53:36', '2021-08-10 00:53:36'),
(9, 'about-us', '2021-08-20 04:11:07', '2021-08-20 04:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Artikel', 'artikel', NULL, NULL),
(2, 'Berita', 'berita', NULL, NULL),
(6, 'Technology', 'technology', '2021-08-01 23:26:51', '2021-08-01 23:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contactuses`
--

CREATE TABLE `contactuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactuses`
--

INSERT INTO `contactuses` (`id`, `nama`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Percobaan skuy', 'mochamadnauvalzalbi2910@gmail.com', 439058739457, 'sdfjsgfuwebgfuegcfugfuegufgeufgrcigerygfufdgdgdhfgjhfgj\r\nyghfghfdhdfgdfgdfgdf\r\ndfg\r\nfgdf\r\ng\r\ndfg\r\ndfgdfgdfgdfgdf\r\ngdf\r\ngdfgdfgdfgd\r\ngf\r\ngdfgdfgdfgdfg', '2021-08-20 07:07:40', '2021-08-20 07:07:40'),
(2, 'Udin Kepala Tiga', 'mochamadnauvalzalbii@gmail.com', 88227051172, 'Halo david disini', '2021-08-20 19:49:25', '2021-08-20 19:49:25'),
(3, 'Percobaan skuysa', 'mochnauvalzalbii@gmail.com', 906705496059, 'Halo dengan Noval Dsiini', '2021-08-20 19:50:32', '2021-08-20 19:50:32'),
(4, 'KMJ TRANS CAB.KPJN', 'dewanet182@gmail.com', 88227051172, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tristique metus ac nibh lacinia, sed pellentesque mauris volutpat. Maecenas tempus nulla nec lorem suscipit consectetur. Integer at enim eu nisi vehicula ultrices ac vitae enim. Aliquam id libero at arcu malesuada feugiat dignissim non lacus. Mauris lobortis, erat sit amet consectetur hendrerit, nulla diam dapibus sapien, vitae aliquam neque lacus vel nisl. Suspendisse tincidunt gravida dui sit amet porttitor. Pellentesque neque tellus, placerat ac vulputate lacinia, volutpat sed justo. Quisque sollicitudin neque fermentum ante viverra, quis imperdiet enim tincidunt. Fusce vel vestibulum elit, id dignissim ligula. Pellentesque et arcu ac massa ultricies pellentesque. Quisque lobortis dui nec bibendum tristique. Proin magna libero, scelerisque vitae ante bibendum, tristique commodo elit. Curabitur congue vitae lorem et interdum. Aenean lacinia metus dolor, a lobortis urna porta in. In pretium, augue in rutrum mollis, arcu elit pulvinar dolor, ac vulputate est ex et nisl.\r\n\r\nMaecenas blandit lorem orci, at efficitur elit blandit et. Phasellus elementum in enim vel dapibus. Etiam euismod, ligula ultricies ultricies porttitor, velit sem mattis neque, ut tempus metus eros sed sapien. Mauris laoreet euismod sem eget faucibus. In enim sapien, malesuada in faucibus non, facilisis eget neque. Nulla molestie elit velit, in semper elit molestie eget. Sed id ornare arcu, vitae viverra lacus.\r\n\r\nNunc interdum commodo est eget mattis. Donec ultrices felis in rhoncus maximus. Morbi et imperdiet ex. Etiam vestibulum molestie diam, ut bibendum sem scelerisque eu. Aliquam erat volutpat. Fusce id augue pharetra, consectetur libero sit amet, fringilla diam. Integer bibendum ultricies neque ut gravida.\r\n\r\nCurabitur ex libero, efficitur id egestas sagittis, efficitur sed risus. Nulla ac viverra magna, ut pellentesque purus. Donec non velit nec ligula scelerisque tempor sed vitae eros. Morbi ultricies laoreet justo ut faucibus. Mauris vel erat quis sem sagittis viverra. Nunc eget nisl non enim vestibulum sagittis vitae sed turpis. Cras vehicula, ante non placerat volutpat, enim ex cursus est, vitae tincidunt enim enim id diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sed eros et justo placerat rutrum. Sed congue magna non nunc pharetra dignissim. Nulla in dolor id urna molestie pulvinar ut non tortor. Morbi iaculis lacus sapien, efficitur dignissim dui ultricies sed. Ut pretium, mi sit amet volutpat molestie, ipsum nisl porta arcu, sed tempor dolor risus vitae dolor. In vitae mattis diam, placerat rutrum lectus.\r\n\r\nDonec sed blandit sapien, vitae condimentum diam. Sed a blandit ligula, id aliquam odio. Aenean dignissim lectus nec risus viverra, eu rutrum risus mollis. Vestibulum semper luctus diam, sit amet posuere mi malesuada at. Mauris vitae molestie odio, vitae porta quam. Nulla a justo vitae risus dapibus tincidunt. Pellentesque elementum arcu eget arcu ornare, et ultricies nibh condimentum. Vivamus blandit finibus orci, sit amet euismod ligula suscipit et. Nunc interdum, odio id porttitor mattis, dui ante cursus nibh, ut varius est nisl sit amet ante. Suspendisse nibh ex, rhoncus tincidunt varius condimentum, varius et mauris. Vestibulum id lacus urna. In rhoncus auctor quam, ac iaculis ipsum efficitur sit amet.', '2021-08-20 23:35:57', '2021-08-20 23:35:57'),
(5, 'Percobaan skuy', 'superadmin@mail.com', 883275842, 'aku adalah user', '2021-08-24 02:17:57', '2021-08-24 02:17:57'),
(6, 'Percobaan skuy', 'sasasas@gfdg.com', 86473567, 'Aku adalah saparudin', '2021-08-24 02:19:27', '2021-08-24 02:19:27'),
(7, 'Moch . Nauval Zalbi', 'mochamadnauvalzalbi2910@gmail.com', 88227051172, 'AKu cuma nyoba', '2021-08-24 02:23:28', '2021-08-24 02:23:28'),
(8, 'sasasa', 'petugas@mail.com', 9945743687, 'sdfhdfguidghfghhbdjh', '2021-08-24 02:25:17', '2021-08-24 02:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subdistrict` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `province`, `city`, `subdistrict`, `created_at`, `updated_at`) VALUES
(2, 'Jawa Timur', 'Surabaya', 'Wonokromo', '2021-08-09 23:44:59', '2021-08-09 23:44:59'),
(3, 'Bali', 'Denpasar', 'Denpasar Barat', '2021-08-10 02:24:25', '2021-08-10 02:24:25'),
(4, 'Bali', 'Denpasar', 'Denpasar Timur', '2021-08-10 02:24:36', '2021-08-10 02:24:43');

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
-- Table structure for table `galerys`
--

CREATE TABLE `galerys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galerys`
--

INSERT INTO `galerys` (`id`, `image`, `created_at`, `updated_at`, `status`) VALUES
(2, '4841c22286caa8e2faab72cdca8df944.jpg', '2021-08-29 01:27:43', '2021-08-29 01:27:43', 1),
(3, '73912d43d7dea26ae724a9b17e84af22.jpg', '2021-08-29 01:31:20', '2021-08-29 01:31:20', 1);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_08_02_035500_create_categorys_table', 2),
(6, '2021_08_02_100213_create_tags_table', 3),
(11, '2021_08_05_091542_create_sliders_table', 4),
(12, '2021_08_05_094553_create_buttons_table', 4),
(14, '2021_08_10_043712_create_testimonials_table', 5),
(15, '2021_08_10_054207_create_origins_table', 6),
(17, '2021_08_10_061815_create_destinations_table', 7),
(18, '2021_08_10_070953_create_partners_table', 8),
(20, '2021_08_10_085927_create_shippingrates_table', 9),
(21, '2021_08_16_082415_add_variantservice_id_to_shippingrates_table', 10),
(22, '2021_08_16_082817_create_variantservices_table', 11),
(23, '2014_10_12_000000_create_users_table', 12),
(24, '2021_08_16_140119_create_roles_table', 12),
(25, '2021_08_16_140213_create_contactuses_table', 12),
(27, '2021_08_16_140545_create_comments_table', 12),
(28, '2021_08_16_140558_create_subcomments_table', 12),
(30, '2021_08_16_140437_create_outlets_table', 13),
(31, '2021_08_21_025359_add_sofdelete_to_users', 14),
(32, '2021_08_22_045831_create_articles_table', 15),
(33, '2021_08_22_050712_add_softdelete_to_articles', 16),
(34, '2021_08_22_053648_add_status_to_articles', 17),
(35, '2021_08_22_055915_add_slug_to_articles', 18),
(37, '2021_08_22_062011_create_articles_tags_table', 19),
(38, '2021_08_24_095620_create_ourteams_table', 20),
(39, '2021_08_25_063931_create_trackings_table', 21),
(42, '2021_08_26_040352_create_transactions_table', 22),
(43, '2021_08_26_041630_add_softdelete_to_transactions', 23),
(44, '2021_08_29_075649_create_galerys_table', 24),
(45, '2021_08_29_081400_add_status_to_galerys', 24);

-- --------------------------------------------------------

--
-- Table structure for table `origins`
--

CREATE TABLE `origins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subdistrict` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `origins`
--

INSERT INTO `origins` (`id`, `province`, `city`, `subdistrict`, `created_at`, `updated_at`) VALUES
(2, 'Jawa Timur', 'Kab. Malang', 'Kepanjen', '2021-08-09 23:05:40', '2021-08-09 23:12:41'),
(3, 'Jawa Timur', 'Kab. Malang', 'Sumber Pucung', '2021-08-10 02:19:59', '2021-08-10 02:19:59'),
(4, 'Jawa Timur', 'Kab. Malang', 'Kalipare', '2021-08-10 02:20:22', '2021-08-10 02:20:22'),
(5, 'Jawa Timur', 'Kab. Malang', 'Gondang legi', '2021-08-10 02:20:39', '2021-08-10 02:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `ourteams`
--

CREATE TABLE `ourteams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ourteams`
--

INSERT INTO `ourteams` (`id`, `name`, `jabatan`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Fella Aulia Rizkitaa', 'Calon Pacar Founder', '1737cd28e2829107b1b6770fd805d48a.png', '2021-08-24 03:13:31', '2021-08-24 03:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE `outlets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outlets`
--

INSERT INTO `outlets` (`id`, `name`, `origin_id`, `address`, `created_at`, `updated_at`) VALUES
(2, 'KMJ TRANS CAB.KPJN', 2, 'Mojosari rt 03 rw 02', '2021-08-16 07:51:48', '2021-08-16 07:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `image`, `website`, `created_at`, `updated_at`) VALUES
(2, 'Indah Cargo', 'f84de63d1166f5c6893c6b733b10eda4.jpg', '#', '2021-08-10 00:58:42', '2021-08-23 20:54:54'),
(3, 'Hexa', '47e2e42cd38a1ce5d2a965d9f6dab379.png', 'https://laravel.com/docs/8.x/responses#redirects', '2021-08-10 01:11:43', '2021-08-23 21:55:27');

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', '2021-08-17 05:22:40', '2021-08-17 05:22:40'),
(2, 'admin', '2021-08-17 05:23:02', '2021-08-17 05:23:02'),
(3, 'petugas', '2021-08-17 05:23:26', '2021-08-17 05:23:26'),
(4, 'writer', '2021-08-17 05:23:35', '2021-08-17 05:23:35'),
(5, 'pelanggan', '2021-08-17 05:23:45', '2021-08-17 05:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `shippingrates`
--

CREATE TABLE `shippingrates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `origin_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `under_terms` int(11) NOT NULL,
  `above_terms` int(11) NOT NULL,
  `est_arrived` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `variantservice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippingrates`
--

INSERT INTO `shippingrates` (`id`, `origin_id`, `destination_id`, `under_terms`, `above_terms`, `est_arrived`, `created_at`, `updated_at`, `variantservice_id`) VALUES
(2, 2, 2, 5000, 3000, '2-5', '2021-08-10 20:28:01', '2021-08-13 01:33:39', 1),
(3, 5, 3, 7000, 4000, '2-4', '2021-08-10 20:28:32', '2021-08-10 20:28:32', 3),
(4, 4, 3, 4000, 3000, '2-4', '2021-08-11 09:19:23', '2021-08-11 09:19:23', 3),
(6, 2, 2, 6000, 4000, '1-2', '2021-08-16 02:43:51', '2021-08-16 02:50:20', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_two` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title_one`, `title_two`, `description`, `image`, `button_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 'KMJ TRANS & LOGISTIC', 'Siap Membantu UMKM Kecil', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\nSuspendisse ultricies pellentesque enim, vitae accumsan dui\r\nvolutpat non.', 'a63487982806e88c90aad283d0080139.jpg', '3', 1, '2021-08-08 00:19:57', '2021-08-24 02:44:09'),
(4, 'KMJ TRANS & LOGISTIC', 'Pelayanan Ramah', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\nSuspendisse ultricies pellentesque enim, vitae accumsan dui\r\nvolutpat non.', '65f028dc5f6af42599713dcf1d79adf3.jpg', '3', 1, '2021-08-21 21:14:42', '2021-08-24 02:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `subcomments`
--

CREATE TABLE `subcomments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Percobaan satuo', 'percobaan-satuo', '2021-08-02 03:20:07', '2021-08-09 21:16:16'),
(3, 'Bertia', 'bertia', '2021-08-21 23:36:37', '2021-08-21 23:36:37'),
(4, 'Berita', 'berita', '2021-08-21 23:37:44', '2021-08-21 23:37:44'),
(5, 'teknologi baru', 'teknologi-baru', '2021-08-21 23:38:41', '2021-08-21 23:38:41'),
(6, 'dasdsad', 'dasdsad', '2021-08-21 23:39:31', '2021-08-21 23:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quote` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `image`, `quote`, `position`, `company`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Moch . Nauval Zalbi', '07db56357a66f190cc26ddf09e797640.png', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n                        Mauris sodales aliquam finibus. Quisque non purus a ante\r\n                        luctus rhoncus sit amet et libero.\"', 'OB', 'PT. ISO GAK ISO KUDU ISO', 1, '2021-08-09 22:31:17', '2021-08-23 20:48:10'),
(3, 'Dwiki Alfian P.', '4a99fafa1195c56c7ea9628c7874961b.png', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n                        Mauris sodales aliquam finibus. Quisque non purus a ante\r\n                        luctus rhoncus sit amet et libero.\"', 'CEO', 'PT. ISO GAK ISO KUDU ISO', 1, '2021-08-09 22:32:13', '2021-08-23 20:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `trackings`
--

CREATE TABLE `trackings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trackings`
--

INSERT INTO `trackings` (`id`, `transaction_id`, `status`, `location`, `created_at`, `updated_at`) VALUES
(2, 1, 'Barang sudah berada di kantor KMJ TRANS & LOGISTICS', 'Malang', '2021-08-25 23:15:01', '2021-08-25 23:15:01'),
(3, 1, 'Barang Dalam Proses Pengiriman', 'Malang', '2021-08-25 23:16:47', '2021-08-25 23:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tracking_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_penerima` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_penerima` bigint(20) NOT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_sender` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_sender` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `tracking_number`, `penerima`, `address_penerima`, `phone_penerima`, `sender`, `address_sender`, `phone_sender`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1234567890', 'Monza', 'kepanjen', 8443786754, 'Dimas Julio K.', 'Sumber Pucung, Kab. Malang, Jawa Timur', 877654654, '2021-08-25 21:08:18', '2021-08-25 22:20:41', NULL),
(4, '12345678901', 'Dwiki Alfian Putra', 'Gunung kawi, Malang , Jawa Timur', 8695678784, 'Moch. Nauval Zalbi', 'Kepanjen, Malang, Jawa Timur', 896734632, '2021-08-25 22:45:19', '2021-08-27 05:05:02', NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `outlet_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `outlet_id`, `image`, `phone`, `deleted_at`) VALUES
(3, 'Moch. Nauval Zalbi', 'superadmin@mail.com', NULL, '$2y$10$TnVI8i9hsKjzLLZdLCsESuoQ/bDsOOc5Wpb2wRS.qOUbhN1CdRryu', NULL, '2021-08-17 20:03:11', '2021-08-17 20:03:11', 1, NULL, 'db8f6261bbe12a8d6be4b53146b72c3b.jpg', NULL, NULL),
(16, 'Dimas Julio K.', 'dimasjuliok@gmail.com', NULL, '$2y$10$g02l5o.zGlAjXaZoIxPube2dazR641KPhjIQ/FTXjO6N7TwQLxnCK', NULL, '2021-08-29 04:39:28', '2021-08-29 04:39:28', 2, NULL, NULL, NULL, NULL),
(17, 'Dwiki Alfian P.', 'dwikialfianp@gmail.com', NULL, '$2y$10$kQO3G2.t8lhemTpsldUV9.ac/yIK2zsT4/W0v/lt/xVIGH0Ie2RpK', NULL, '2021-08-29 04:43:13', '2021-08-29 04:43:13', 4, NULL, NULL, NULL, NULL),
(18, 'Fella Aulia Rizkita', 'fellaaulia@gmail.com', NULL, '$2y$10$0ptwIcHZJ8VDk8yFQDF9r.TCCQH.2wJTlzHWL7rEspPHfhc3yFajK', NULL, '2021-08-29 04:44:22', '2021-08-29 04:44:22', 3, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variantservices`
--

CREATE TABLE `variantservices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `variant_service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variantservices`
--

INSERT INTO `variantservices` (`id`, `variant_service`, `created_at`, `updated_at`) VALUES
(1, 'Reguler', '2021-08-16 02:18:52', '2021-08-16 02:18:52'),
(3, 'Express', '2021-08-16 02:25:26', '2021-08-16 02:25:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles_tags`
--
ALTER TABLE `articles_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buttons`
--
ALTER TABLE `buttons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactuses`
--
ALTER TABLE `contactuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galerys`
--
ALTER TABLE `galerys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `origins`
--
ALTER TABLE `origins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ourteams`
--
ALTER TABLE `ourteams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippingrates`
--
ALTER TABLE `shippingrates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcomments`
--
ALTER TABLE `subcomments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trackings`
--
ALTER TABLE `trackings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variantservices`
--
ALTER TABLE `variantservices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `articles_tags`
--
ALTER TABLE `articles_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `buttons`
--
ALTER TABLE `buttons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactuses`
--
ALTER TABLE `contactuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galerys`
--
ALTER TABLE `galerys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `origins`
--
ALTER TABLE `origins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ourteams`
--
ALTER TABLE `ourteams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `outlets`
--
ALTER TABLE `outlets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shippingrates`
--
ALTER TABLE `shippingrates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcomments`
--
ALTER TABLE `subcomments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trackings`
--
ALTER TABLE `trackings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `variantservices`
--
ALTER TABLE `variantservices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
