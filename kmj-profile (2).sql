-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2021 at 02:46 PM
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
-- Table structure for table `armadas`
--

CREATE TABLE `armadas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `variant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origin_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `armadas`
--

INSERT INTO `armadas` (`id`, `name`, `variant`, `origin_id`, `destination_id`, `price`, `thumbnail`, `content`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Truck Fuso', 'pickup', 5, 4, 2000000, '2e29b49f0b1231c12ccfa2170b23fc9c.png', '<p>INI TREK BOSS</p>', 'truck-fuso-pickup-2000000', NULL, '2021-09-21 05:56:44', '2021-09-24 08:16:35'),
(3, 'Truck klFuso', 'pickup', 5, 4, 2000000, 'da492cc01c17284c86ce7919a9634ca1.png', '<p>INI TREK BOSS</p>', 'truck-fuso-big-2000000', '2021-09-21 06:26:57', '2021-09-21 05:57:00', '2021-09-21 06:26:57'),
(4, 'Bus Pariwisata', 'bus', 5, 4, 1000000, 'f176f4acd08cc850a31bc7164a502680.png', '<p>Halo ini bus kmj trans</p>', 'bus-pariwisata-bus-1000000', NULL, '2021-09-24 05:20:43', '2021-09-24 05:20:43'),
(5, 'Bus Juragan 99', 'bus', 5, 3, 1000000, 'c5f60372292e1d19744891ae38febd8a.png', '<p>sasasasa</p>', 'bus-juragan-99-bus-1000000', NULL, '2021-09-24 05:32:58', '2021-09-24 05:32:58'),
(6, 'Trek e KMJ', 'pickup', 3, 4, 1000000, 'f2a697e7673d877d79ce499b1dd23e99.png', '<p>sasasasa</p>', 'trek-e-kmj-pickup-1000000', NULL, '2021-09-24 05:39:23', '2021-09-24 05:39:23');

-- --------------------------------------------------------

--
-- Table structure for table `armada_details`
--

CREATE TABLE `armada_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `armada_transaction_id` int(11) NOT NULL,
  `armada_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `armada_details`
--

INSERT INTO `armada_details` (`id`, `armada_transaction_id`, `armada_id`, `qty`, `harga`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 10, 2000000, NULL, '2021-10-10 22:35:14', '2021-10-10 22:35:14'),
(2, 1, 6, 5, 1000000, NULL, '2021-10-10 22:35:14', '2021-10-10 22:35:14'),
(3, 2, 2, 1, 2000000, NULL, '2021-10-10 22:46:45', '2021-10-10 22:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `armada_facilitys`
--

CREATE TABLE `armada_facilitys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `armada_id` int(11) NOT NULL,
  `facilitys_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `armada_facilitys`
--

INSERT INTO `armada_facilitys` (`id`, `armada_id`, `facilitys_id`, `created_at`, `updated_at`) VALUES
(1, 2, 3, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 3, NULL, NULL),
(4, 3, 1, NULL, NULL),
(5, 1, 1, NULL, NULL),
(6, 4, 3, NULL, NULL),
(7, 4, 1, NULL, NULL),
(8, 5, 3, NULL, NULL),
(9, 5, 1, NULL, NULL),
(10, 6, 3, NULL, NULL),
(11, 6, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `armada_transactions`
--

CREATE TABLE `armada_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qr_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyewa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_penyewa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_penyewa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `lama_sewa` int(11) DEFAULT NULL,
  `sub_total` int(11) NOT NULL,
  `diskon` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `armada_transactions`
--

INSERT INTO `armada_transactions` (`id`, `invoice`, `qr_code`, `penyewa`, `alamat_penyewa`, `no_penyewa`, `tgl_berangkat`, `tgl_kembali`, `lama_sewa`, `sub_total`, `diskon`, `total`, `total_bayar`, `status`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'INV/KMJ/ARM/001/1011/2021', 'INV-KMJ-ARM-001-1011-2021.svg', 'Dwiki Alfian P.', 'G. Kawi', '0876473546', '2021-10-12', '2021-10-14', NULL, 25000000, NULL, 25000000, 25000000, 'paid', '3', '2021-10-10 22:35:14', '2021-10-10 22:35:14', NULL),
(2, 'INV/KMJ/ARM/002/1011/2021', 'INV-KMJ-ARM-002-1011-2021.svg', 'asas', 'asas', '08954735843', '2021-10-21', '2021-10-22', NULL, 2000000, 20000, 1980000, 1980000, 'paid', '3', '2021-10-10 22:46:45', '2021-10-10 22:46:45', NULL);

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
(14, 'Cara menjadi Businnes Man', '14ae34ad42c811284fae850ca35e72a4.jpg', 6, 3, '<p>dsadasdadadsad</p>', '2021-08-21 23:50:27', '2021-09-21 04:00:49', NULL, 0, 'cara-menjadi-businnes-man'),
(15, 'Cara Mencari informasi di google', '2cd136f5cadcf0b908b9763d66622ace.png', 7, 3, '<p>Aku adalah nauval&nbsp;</p>\r\n\r\n<p>aku ganteng no debat&nbsp;</p>', '2021-08-22 20:51:14', '2021-10-10 09:58:50', NULL, 1, 'cara-mencari-informasi-di-google'),
(16, 'Cara membuat Invoice', '09e7042760ec36b79ed06f858479d601.png', 7, 3, '<p><img alt=\"\" src=\"http://127.0.0.1:8000/images/articles/Screenshot (3)_1629690892.png\" style=\"float:left; height:281px; width:500px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Cara Membuat Invoice</strong>&nbsp;&ndash; Invoice atau yang biasa juga dikenal sebagai faktur adalah sebuah dokumen yang sangat penting dalam bisnis. Jika kamu memiliki usaha baik itu usaha kecil maupun usaha yang sudah besar, kamu harus memahami bahwa&nbsp;<a href=\"https://www.akseleran.co.id/blog/invoice-adalah/\">invoice adalah</a>&nbsp;bagian dari branding. Namun, sebagian dari orang tidak terlalu mementingkan bentuk atau isi dari invoice, baginya invoice hanya sebuah angka, detail barang dan sebuah transaksi bisnis yang dilakukan bagi dua pihak.</p>\r\n\r\n<p>Bahwa invoice yang kurang jelas atau sulit dimengerti tentu akan mempersulit proses pengecekan sehingga dapat menyebabkan keterlambatan pembayaran. Melalui artikel ini kita akan membahas bagaimana cara membuat invoice yang benar dan lebih professional.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>Ciri-Ciri Invoice yang Baik</strong></h2>\r\n\r\n<p>Invoice yang baik adalah invoice yang informatif dan dapat membantu proses menjadi lebih cepat. Hal ini akan membuat klien senang dan puas atas pelayanan yang diberikan. Lalu, apa saja sih ciri-ciri invoice yang baik?</p>\r\n\r\n<ul>\r\n	<li>Memiliki informasi yang benar dan akurat</li>\r\n	<li>Memiliki tampilan yang sesuai dan profesional</li>\r\n	<li>Dikirim secara tepat waktu</li>\r\n</ul>\r\n\r\n<p>Kita akan membahas ketiga ciri-ciri di atas lebih dalam seperti di bawah ini:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><strong>Invoice yang Baik adalah Invoice yang Bersifat Informatif</strong></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>Seperti yang sudah kita bahas sedikit di atas, tanpa informasi yang sesuai, klien kamu mungkin tidak akan mengetahui untuk apa invoice tersebut digunakan. Bahkan beberapa dari mereka mungkin tidak akan mengetahui berapa banyak nominal dan harus mengirimnya kemana. Karena itu beberapa informasi dasar yang harus tertera di dalam faktur seperti:</p>\r\n\r\n<ul>\r\n	<li>Nama dan Informasi Kontak</li>\r\n	<li>Logo Usaha</li>\r\n	<li>Nama dan Alamat Klien</li>\r\n	<li>Nomor Invoice</li>\r\n	<li>Tanggal Invoice</li>\r\n	<li>Tanggal Jatuh Tempo</li>\r\n	<li>Jumlah Tagihan Total</li>\r\n	<li>Keterangan Pekerjaan yang Dilakukan atau Barang yang Dijual</li>\r\n	<li>Pilihan Cara Pembayaran</li>\r\n	<li>Dan ketentuan pembayaran</li>\r\n</ul>\r\n\r\n<p>Pastikan invoice milikmu berisi hal-hal yang sudah kita sebutkan di atas. Dengan menampilkan informasi-informasi seperti di atas, klien juga akan merasa puas dan jelas melihat isi dari invoicenya.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><strong>Invoice yang Baik adalah yang Dapat Menampilkan Informasi Secara Profesional</strong></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>Tampilan dari invoice yang dibuat juga harus diperhatikan dari berbagai sisi. Kamu harus mempertimbangkan invoice milikmu dapat memiliki ciri khas dari&nbsp;<em>brand&nbsp;</em>yang kamu miliki. Namun, itu tidak hanya berlaku untuk invoice yang kamu miliki kartu nama, email dan dokumen penting lainnya juga harus merepresentasikan bisnis atau usaha milikmu.&nbsp;</p>\r\n\r\n<p>Lalu jangan lupa untuk menghindari kesalahan-kesalahan seperti beberapa hal di bawah ini:</p>\r\n\r\n<ul>\r\n	<li>Salah ketik</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Terlalu Banyak Warna</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Jarak Spasi yang Tidak Sesuai</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Kurang Fokus</li>\r\n</ul>\r\n\r\n<p>Hal-hal seperti di atas seringkali ditemui saat membuat invoice. Karena itu untuk meningkatkan kredibilitas dari bisnis maupun usaha milikmu, buatlah invoice yang sebaik dan seinformatif mungkin agar dapat dimengerti oleh klien.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><strong>Invoice yang Baik itu adalah Invoice yang Tepat Waktu</strong></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>Jadi kapan waktu terbaik untuk kamu dapat melakukan penagihan invoice kepada klien?</p>\r\n\r\n<p>Dalam banyak hal, invoice dapat dikirimkan apabila pekerjaan telah selesai dilakukan semua. Tetapi, jangan lupa juga apabila terdapat kesepakatan yang sudah dibuat sebelum memulainya dengan klien.&nbsp;</p>\r\n\r\n<p>Namun untuk sebagian orang banyak yang yang ragu-ragu dalam melakukan penagihan invoice kepada kliennya. Mereka biasanya akan mengirimkan fakturnya setelah pekerjaan tersebut selesai berhari-berhari. Padahal hal ini harus dihindari karena dengan mengirimkan invoice yang telat, maka pembayaran yang akan diterima pun akan telat. Mereka juga biasanya mengharapkan untuk melakukan pembayaran dengan tepat waktu.</p>\r\n\r\n<p>Karena itu penting untukmu selalu memberikan invoicenya secara tepat waktu.&nbsp;</p>\r\n\r\n<p>Setelah mengetahui ciri-ciri dari invoice yang baik, maka kamu dapat lebih memahami cara membuat invoice yang benar dan sesuai. Untuk semakin mempermudah kamu saat membuat invoice berikut contoh invoice yang baik dan sesuai di bawah ini:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.akseleran.co.id/blog/wp-content/uploads/2020/02/cara-membuat-invoice1211.png\"><img alt=\"cara membuat invoice\" src=\"https://www.akseleran.co.id/blog/wp-content/uploads/2020/02/cara-membuat-invoice1211.png\" style=\"height:665px; width:618px\" /></a></p>\r\n\r\n<p>Bagaimana sekarang sudah tahu kan ciri-ciri invoice yang baik? Mulai sekarang perhatikan invoicemu dengan lebih baik, karena invoice yang sesuai dapat dijadikan agunan untuk pinjaman untuk pengembangan usahamu.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>Ajukan Pinjaman Sekarang dan Dapatkan Kemudahan Pinjaman Modal Usaha di Akseleran!</strong></h2>\r\n\r\n<p>Dapatkan pinjaman dengan bunga kompetitif dan kemudahan proses pengajuan. Ajukan pinjaman untuk mengembangkan usahamu sekarang. Akseleran juga sudah terdaftar resmi di Otoritas Jasa Keuangan (OJK) sehingga proses transaksi yang kamu lakukan jadi lebih aman dan terjamin.</p>', '2021-08-22 20:56:06', '2021-10-10 09:16:33', NULL, 1, 'cara-membuat-invoice');

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
(13, 16, 6, NULL, NULL);

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
(7, 'Article', 'article', '2021-10-10 09:14:38', '2021-10-10 09:14:38'),
(8, 'Technology', 'technology', '2021-10-10 10:11:09', '2021-10-10 10:11:09');

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
-- Table structure for table `detaillogistics`
--

CREATE TABLE `detaillogistics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detaillogistics`
--

INSERT INTO `detaillogistics` (`id`, `transaction_id`, `nama_barang`, `berat`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 6, 'Vga ', 124, NULL, '2021-09-09 02:32:08', '2021-09-09 02:32:08'),
(2, 6, 'sasa', 122, NULL, '2021-09-09 02:32:08', '2021-09-09 02:32:08'),
(3, 7, 'Test', 12, NULL, '2021-09-09 02:35:36', '2021-09-09 02:35:36'),
(4, 8, 'sasa', 3243, NULL, '2021-09-10 05:36:38', '2021-09-10 05:36:38'),
(5, 9, 'Komputer', 12, NULL, '2021-09-16 23:07:49', '2021-09-16 23:07:49'),
(6, 9, 'Monitor', 15, NULL, '2021-09-16 23:07:49', '2021-09-16 23:07:49'),
(7, 9, 'Sepeda Motor', 75, NULL, '2021-09-16 23:07:49', '2021-09-16 23:07:49'),
(8, 10, 'Komputer 1 set', 10, NULL, '2021-10-10 20:58:23', '2021-10-10 20:58:23'),
(9, 10, 'computer gear ', 2, NULL, '2021-10-10 20:58:23', '2021-10-10 20:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `facilitys`
--

CREATE TABLE `facilitys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilitys`
--

INSERT INTO `facilitys` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'AC', NULL, NULL),
(3, 'Rak koper', '2021-09-14 16:25:54', '2021-09-14 16:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `facilitys_travel`
--

CREATE TABLE `facilitys_travel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `travel_id` int(11) NOT NULL,
  `facilitys_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilitys_travel`
--

INSERT INTO `facilitys_travel` (`id`, `travel_id`, `facilitys_id`, `created_at`, `updated_at`) VALUES
(2, 5, 1, NULL, NULL),
(3, 2, 1, NULL, NULL),
(4, 2, 3, NULL, NULL),
(5, 1, 1, NULL, NULL),
(6, 1, 3, NULL, NULL),
(7, 5, 3, NULL, NULL);

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
  `status` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galerys`
--

INSERT INTO `galerys` (`id`, `image`, `created_at`, `updated_at`, `status`, `description`) VALUES
(2, '4841c22286caa8e2faab72cdca8df944.jpg', '2021-08-29 01:27:43', '2021-09-08 22:12:22', 1, 'KMJ Belajar ngoding 2020'),
(3, '73912d43d7dea26ae724a9b17e84af22.jpg', '2021-08-29 01:31:20', '2021-08-31 07:55:51', 1, 'Ini adalah sebuiah deskripsi'),
(4, '18d5ebeb610d89a112e6ce828e014ee2.png', '2021-08-31 07:56:12', '2021-09-08 22:10:49', 1, 'Kirim buah Jogja - Malang 2020');

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
(44, '2021_08_29_075649_create_galerys_table', 24),
(45, '2021_08_29_081400_add_status_to_galerys', 24),
(46, '2021_08_31_143853_add_description_to_galerys', 25),
(49, '2021_09_09_075526_create_detaillogistics_table', 28),
(51, '2021_08_26_040352_create_transactions_table', 29),
(53, '2021_09_14_230550_create_facilitys_table', 30),
(54, '2021_09_14_222144_create_travel_table', 31),
(58, '2021_09_15_003822_create_travels_facilitys_table', 32),
(59, '2021_09_15_140939_create_travel_transactions_table', 33),
(60, '2021_09_15_142242_create_travel_details_table', 33),
(61, '2021_09_15_222613_add_travel_id_to_travel_details', 34),
(64, '2021_09_15_223505_add_tgl_berangkat_to_travel_transactions', 35),
(65, '2021_09_15_231836_add_dibayar_to_travel_transactions', 36),
(66, '2021_09_17_034454_add_travel_id_to_travel_transactions_table', 37),
(68, '2021_09_19_161456_add_slug_to_travels_table', 38),
(69, '2021_09_21_122500_create_armadas_table', 39),
(70, '2021_09_21_125556_create_armada_facilitys_table', 40),
(74, '2021_09_22_162504_create_armada_details_table', 43),
(77, '2021_09_22_161214_create_armada_transactions_table', 44);

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
(2, 'KMJ TRANS CAB.KPJN', 2, 'Mojosari rt 03 rw 02', '2021-08-16 07:51:48', '2021-08-16 07:51:48'),
(3, 'Percobaan skuy', 4, 'Jalibar', '2021-10-10 09:20:44', '2021-10-10 09:21:06');

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
(6, 2, 2, 6000, 4000, '1-2', '2021-08-16 02:43:51', '2021-08-16 02:50:20', 3),
(7, 2, 3, 4000, 3000, '3-4', '2021-09-08 07:41:48', '2021-09-08 07:41:48', 1),
(8, 5, 3, 5000, 4000, '2-5', '2021-09-08 08:26:18', '2021-09-08 08:26:18', 1),
(9, 5, 2, 5000, 4000, '3-5', '2021-09-08 08:27:13', '2021-09-08 08:27:13', 1),
(10, 7, 2, 10000, 8000, '4', '2021-10-10 09:24:31', '2021-10-10 09:24:31', 1);

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
(4, 'KMJ TRANS & LOGISTIC', 'Pelayanan Ramah', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\nSuspendisse ultricies pellentesque enim, vitae accumsan dui\r\nvolutpat non.', '65f028dc5f6af42599713dcf1d79adf3.jpg', '3', 1, '2021-08-21 21:14:42', '2021-09-21 04:06:56');

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
(5, 'teknologi baru', 'teknologi-baru', '2021-08-21 23:38:41', '2021-08-21 23:38:41');

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
(4, 6, 'Barang sudah berada di kantor KMJ TRANS & LOGISTICS', 'Kepanjen', '2021-09-09 08:35:25', '2021-09-09 08:35:25'),
(5, 7, 'Barang Dalam Proses Pengiriman', 'Malang', '2021-09-09 08:37:30', '2021-09-09 08:37:30'),
(7, 7, 'Barang Sudah Diterima', 'Kepanjen', '2021-09-09 08:39:27', '2021-09-09 08:39:27'),
(8, 8, 'Barang sudah berada di kantor KMJ TRANS & LOGISTICS', 'Malang', '2021-09-12 04:05:05', '2021-09-12 04:05:05'),
(9, 9, 'Barang sudah berada di kantor KMJ TRANS & LOGISTICS', 'Malang', '2021-09-21 04:09:35', '2021-09-21 04:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracking_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qr_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_penerima` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pengirim` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `variantservice_id` int(11) NOT NULL,
  `berat_total` int(11) NOT NULL,
  `harga_kg` int(11) NOT NULL,
  `sub_total` bigint(20) NOT NULL,
  `diskon` bigint(20) DEFAULT NULL,
  `total` bigint(20) NOT NULL,
  `total_bayar` bigint(20) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `invoice`, `tracking_number`, `qr_code`, `penerima`, `alamat_penerima`, `no_penerima`, `pengirim`, `alamat_pengirim`, `no_pengirim`, `origin_id`, `destination_id`, `variantservice_id`, `berat_total`, `harga_kg`, `sub_total`, `diskon`, `total`, `total_bayar`, `status`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'INV/KMJ/001/0909/2021', 'KMJO-001-2021090909', 'Test.png', 'Nauval', 'Kepanjen', '086475634564', 'Dimas', 'Sumber Pucung', '09978847', 2, 2, 1, 246, 3000, 738000, 8000, 730000, 738000, 'paid', '3', '2021-09-09 02:06:10', '2021-09-17 05:52:51', '2021-09-17 05:52:51'),
(2, 'INV/KMJ/002/0909/2021', 'KMJO-002-2021090909', 'Test.png', 'Nauval', 'Kepanjen', '086475634564', 'Dimas', 'Sumber Pucung', '09978847', 2, 2, 1, 246, 3000, 738000, 8000, 730000, 738000, 'paid', '3', '2021-09-09 02:06:51', '2021-09-17 05:58:16', '2021-09-17 05:58:16'),
(3, 'INV/KMJ/003/0909/2021', 'KMJO-003-2021090909', 'Test.png', 'dfhdg', 'djfgsjdgf', '9754835', 'Noval', 'Kepanjen', '9758478', 5, 2, 1, 246, 4000, 984000, 4000, 980000, NULL, 'debit', '3', '2021-09-09 02:12:35', '2021-09-17 05:58:19', '2021-09-17 05:58:19'),
(4, 'INV/KMJ/004/0909/2021', 'KMJO-004-2021090909', 'Test.png', 'dfhdg', 'djfgsjdgf', '9754835', 'Noval', 'Kepanjen', '9758478', 5, 2, 1, 246, 4000, 984000, 4000, 980000, 800000, 'debit', '3', '2021-09-09 02:14:03', '2021-09-17 05:58:22', '2021-09-17 05:58:22'),
(5, 'INV/KMJ/005/0909/2021', 'KMJO-005-2021090909', 'Test.png', 'DImas', 'SUCUNG', '098457465', 'Nauval', 'Kepanjen', '08945784', 5, 3, 3, 246, 4000, 984000, 0, 984000, NULL, 'paid', '3', '2021-09-09 02:25:03', '2021-09-17 05:58:25', '2021-09-17 05:58:25'),
(6, 'INV/KMJ/006/0909/2021', 'KMJO-006-2021090909', 'Test.png', 'DImas', 'sumber pucung', '098457465', 'Nauval', 'Kepanjen', '08945784', 5, 3, 3, 246, 4000, 984000, 0, 984000, NULL, 'paid', '3', '2021-09-09 02:32:08', '2021-09-17 05:58:27', '2021-09-17 05:58:27'),
(7, 'INV/KMJ/007/0909/2021', 'KMJO-007-2021090909', 'Test.png', 'dgdfghdfgh', 'dfgdfghdgd', '9805734985', 'aajskj', 'jkdsfgdjk', '089687546895', 2, 2, 1, 12, 5000, 60000, 0, 60000, 60000, 'paid', '3', '2021-09-09 02:35:36', '2021-09-17 05:58:29', '2021-09-17 05:58:29'),
(8, 'INV/KMJ/008/0910/2021', 'KMJO-008-2021091012', 'KMJO-008-2021091012.svg', 'asdsad', 'sadasd', '5345453', 'asasa', 'asasa', '2343543', 5, 3, 3, 3243, 4000, 12972000, 0, 12972000, 12972000, 'paid', '3', '2021-09-10 05:36:38', '2021-09-10 05:36:38', NULL),
(9, 'INV/KMJ/009/0917/2021', 'KMJO-009-2021091706', 'KMJO-009-2021091706.svg', 'Dimas', 'maksjfsa', '98768456456', 'Nauval', 'Malang', '085934784', 2, 2, 3, 102, 4000, 408000, 0, 408000, 408000, 'paid', '3', '2021-09-16 23:07:49', '2021-09-16 23:07:49', NULL),
(10, 'INV/KMJ/0010/1011/2021', 'KMJO-0010-2021101103', 'KMJO-0010-2021101103.svg', 'Nauval ', 'Kepanjen ', '088224398543', 'Dwiki', 'G. KAwi', '08834656767', 2, 2, 1, 12, 5000, 60000, 10000, 50000, 50000, 'paid', '3', '2021-10-10 20:58:23', '2021-10-10 20:58:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `travels`
--

CREATE TABLE `travels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `variant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origin_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `travels`
--

INSERT INTO `travels` (`id`, `name`, `variant`, `origin_id`, `destination_id`, `price`, `thumbnail`, `content`, `deleted_at`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Elf Mini Bus', 'Express-sameday', 5, 4, 200000, '5146867b81cbbf3dd39640e2936eb357.jpg', '<p>ghjjhghjghjghjg</p>', NULL, '2021-09-14 17:28:01', '2021-09-19 09:43:40', 'elf-mini-bus-express-sameday-200000'),
(2, 'Elf Mini Bus', 'Reguler', 5, 4, 176000, 'a601e96b1afb26f2647afea65f11dc4a.jpg', '<p>sadadsa</p>', NULL, '2021-09-14 17:32:55', '2021-09-19 09:43:33', 'elf-mini-bus-reguler-176000'),
(5, 'Bis Malam', 'Reguler', 5, 4, 30000, '95c97d728f86de02d7264735ffb34427.jpg', '<p>Halo ini Mini bus murah</p>', NULL, '2021-09-14 17:40:55', '2021-09-19 09:24:27', 'bis-malam-reguler-30000');

-- --------------------------------------------------------

--
-- Table structure for table `travel_transactions`
--

CREATE TABLE `travel_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qrcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penumpang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_penumpang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_penumpang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_penjemputan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pemberhentian` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `diskon` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `tgl_berangkat` date NOT NULL,
  `jam_berangkat` time NOT NULL,
  `dibayar` bigint(20) DEFAULT NULL,
  `travel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `travel_transactions`
--

INSERT INTO `travel_transactions` (`id`, `user_id`, `invoice`, `qrcode`, `nama_penumpang`, `alamat_penumpang`, `no_penumpang`, `alamat_penjemputan`, `alamat_pemberhentian`, `origin_id`, `destination_id`, `subtotal`, `diskon`, `total`, `status`, `created_at`, `updated_at`, `deleted_at`, `tgl_berangkat`, `jam_berangkat`, `dibayar`, `travel_id`) VALUES
(1, 3, 'INV/KMJ/TRV/001/0917/2021', 'INV/KMJ/TRV/001/0917/2021.svg', 'Noval', 'Kepanjen', '08834786754', 'Malang', 'YOgyakarta', 5, 4, 176000, 0, 176000, 'paid', '2021-09-16 23:20:18', '2021-09-17 06:45:04', '2021-09-17 06:45:04', '2021-09-18', '13:18:00', 176000, 2),
(2, 3, 'INV/KMJ/TRV/002/0917/2021', 'INV-KMJ-TRV-002-0917-2021.svg', 'Monza', 'Kepanjen', '088784637432', 'Per4an Kepnajne', 'yogyakarta, Malioboro , titik nol', 5, 4, 200000, 0, 200000, 'paid', '2021-09-16 23:23:32', '2021-09-17 06:47:30', NULL, '2021-09-19', '13:22:00', 200000, 1),
(3, 3, 'INV/KMJ/TRV/003/0917/2021', 'INV-KMJ-TRV-003-0917-2021.svg', 'Dwiki Alfian P.', 'G. Kawi', '0485974983759', 'Per4an Kepanjen', 'Denpasar Timur', 5, 4, 200000, 10000, 190000, 'paid', '2021-09-17 06:47:07', '2021-09-17 06:51:15', NULL, '2021-09-20', '20:46:00', 190000, 1),
(4, 3, 'INV/KMJ/TRV/004/1011/2021', 'INV-KMJ-TRV-004-1011-2021.svg', 'Moch. Nauval Zalbi', 'Kepanjen', '088227643547', 'Kepanjen', 'Denpasar Bali ', 5, 4, 200000, 0, 200000, 'paid', '2021-10-10 21:00:43', '2021-10-10 21:00:43', NULL, '2021-10-12', '11:00:00', 200000, 1);

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
(3, 'Monza', 'monzanoval@gmail.com', NULL, '$2y$10$Y.0iVMQt7F.qrCviv876qOzBJDuk6gPsa6x7M1pfpyGXaPkw3ShcO', NULL, '2021-08-17 20:03:11', '2021-10-10 21:06:48', 1, NULL, 'ffe26f7157a36d4954b49b23533f2c29.jpg', 88227051172, NULL),
(16, 'Dimas Julio K.', 'dimasjuliok@gmail.com', NULL, '$2y$10$g02l5o.zGlAjXaZoIxPube2dazR641KPhjIQ/FTXjO6N7TwQLxnCK', NULL, '2021-08-29 04:39:28', '2021-08-29 04:39:28', 2, NULL, NULL, NULL, NULL),
(17, 'Dwiki Alfian P.', 'dwikialfianp@gmail.com', NULL, '$2y$10$kQO3G2.t8lhemTpsldUV9.ac/yIK2zsT4/W0v/lt/xVIGH0Ie2RpK', NULL, '2021-08-29 04:43:13', '2021-08-30 05:07:13', 4, NULL, NULL, NULL, NULL),
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
-- Indexes for table `armadas`
--
ALTER TABLE `armadas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `armada_details`
--
ALTER TABLE `armada_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `armada_facilitys`
--
ALTER TABLE `armada_facilitys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `armada_transactions`
--
ALTER TABLE `armada_transactions`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `detaillogistics`
--
ALTER TABLE `detaillogistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilitys`
--
ALTER TABLE `facilitys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilitys_travel`
--
ALTER TABLE `facilitys_travel`
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
-- Indexes for table `travels`
--
ALTER TABLE `travels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_transactions`
--
ALTER TABLE `travel_transactions`
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
-- AUTO_INCREMENT for table `armadas`
--
ALTER TABLE `armadas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `armada_details`
--
ALTER TABLE `armada_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `armada_facilitys`
--
ALTER TABLE `armada_facilitys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `armada_transactions`
--
ALTER TABLE `armada_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `articles_tags`
--
ALTER TABLE `articles_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `buttons`
--
ALTER TABLE `buttons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT for table `detaillogistics`
--
ALTER TABLE `detaillogistics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `facilitys`
--
ALTER TABLE `facilitys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `facilitys_travel`
--
ALTER TABLE `facilitys_travel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galerys`
--
ALTER TABLE `galerys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `origins`
--
ALTER TABLE `origins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ourteams`
--
ALTER TABLE `ourteams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `outlets`
--
ALTER TABLE `outlets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trackings`
--
ALTER TABLE `trackings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `travels`
--
ALTER TABLE `travels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `travel_transactions`
--
ALTER TABLE `travel_transactions`
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
