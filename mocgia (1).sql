-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2026 at 11:56 AM
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
-- Database: `mocgia`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `desktop_image` varchar(255) NOT NULL,
  `mobile_image` varchar(255) DEFAULT NULL,
  `button_text` varchar(100) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `subtitle`, `desktop_image`, `mobile_image`, `button_text`, `button_link`, `sort_order`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 'MỘC GIA - GIẢI PHÁP VẬT LIỆU GỖ CAO CẤP', 'Sản phẩm cốt ván chống ẩm đạt chuẩn an toàn sức khỏe quốc tế E0, E1', '1784532716_9cfdede375887911423e.jpg', '1784532554_a4d0fbd8a029c84540f8.jpg', 'Khám phá giải pháp', '#services', 1, 1, '2026-07-20 03:16:41', '2026-07-20 07:35:50', NULL, NULL, 1),
(2, 'KIẾN TẠO KHÔNG GIAN  NỘI THẤT MAY ĐO', 'Hơn 1.000 màu sắc và bề mặt vân gỗ thời thượng dẫn đầu xu hướng thiết kế', '1784532564_c4abe56f6e762f0fd079.jpg', '1784532564_77ed4dab27cd5ca68f26.jpg', 'Liên hệ tư vấn', '#contact', 2, 1, '2026-07-20 03:16:41', '2026-07-20 07:35:30', NULL, NULL, 1),
(3, 'NGÂN GIA NGUYỄN', 'Thiết kế - thi công - lắp đặt nội thất trọn gói', '1784532635_7864901a5489956bd5f4.jpg', '1784532635_31a6aa755f3aed29ded8.jpg', 'Xem sản phẩm', 'san-pham', 3, 1, '2026-07-20 07:30:35', '2026-07-20 07:30:35', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `pdf_attachment` varchar(255) DEFAULT NULL,
  `file_attachment` varchar(255) DEFAULT NULL,
  `file_mime` varchar(100) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `category_id`, `title`, `description`, `image`, `issue_date`, `organization`, `pdf_attachment`, `file_attachment`, `file_mime`, `sort_order`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 1, 'Giấy chứng nhận 1', 'Giấy chứng nhận 1', '1783746126_fc42ccc4528257eb6c6f.png', NULL, 'Sở GTVT Gia Lai', '1783746073_455c76990398fffce865.pdf', '1783746126_fc42ccc4528257eb6c6f.png', 'image/png', 0, 1, '2026-07-11 05:01:13', '2026-07-11 05:02:06', NULL, 1, 1),
(2, 1, 'Giấy chứng nhận số 2', 'Giấy chứng nhận 2', '1784540140_de28f2941b3e7c82894f.jpg', NULL, 'Giấy chứng nhận 2', '1783746093_690235cc4ad468a05c89.pdf', '1784540140_de28f2941b3e7c82894f.jpg', 'image/jpeg', 0, 1, '2026-07-11 05:01:33', '2026-07-20 09:35:40', NULL, 1, 1),
(3, 1, 'Giấy chứng nhận số 3', 'Giấy chứng nhận số 3', NULL, NULL, 'Công an', '1783746315_86341e587336029a0ead.pdf', '1783746315_86341e587336029a0ead.pdf', 'application/pdf', 0, 1, '2026-07-11 05:05:15', '2026-07-11 05:05:15', NULL, 1, NULL),
(4, 1, 'Giấy chứng nhận số 4', 'Giấy chứng nhận số 4', NULL, NULL, 'aaaaaaaaaaa', '1783746449_39bfbb81fa7eeaad5bbf.pdf', '1783746449_39bfbb81fa7eeaad5bbf.pdf', 'application/pdf', 0, 1, '2026-07-11 05:07:29', '2026-07-11 05:07:29', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_milestones`
--

CREATE TABLE `company_milestones` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` smallint(5) UNSIGNED NOT NULL COMMENT 'Năm của mốc lịch sử',
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL COMMENT 'Tên file ảnh minh hoạ',
  `sort_order` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_milestones`
--

INSERT INTO `company_milestones` (`id`, `year`, `title`, `description`, `image`, `sort_order`, `created_at`, `updated_at`, `deleted_at`, `created_by`) VALUES
(1, 2017, 'Thành lập Mộc Gia', 'Thành lập xưởng sản xuất gỗ công nghiệp đầu tiên tại TP. Hồ Chí Minh với công nghệ ép nhiệt cơ bản.', NULL, 1, '2026-07-20 03:16:41', '2026-07-20 03:16:41', NULL, NULL),
(2, 2020, 'Mở rộng quy mô nhà máy', 'Đầu tư dây chuyền dán cạnh không đường line tự động nhập khẩu từ Đức, nâng công suất gấp 3 lần.', NULL, 2, '2026-07-20 03:16:41', '2026-07-20 03:16:41', NULL, NULL),
(3, 2023, 'Đạt tiêu chuẩn E0 & Xuất khẩu', 'Chính thức xuất khẩu lô hàng ván gỗ MDF E0 đầu tiên sang thị trường Mỹ và các nước Đông Nam Á.', NULL, 3, '2026-07-20 03:16:41', '2026-07-20 03:16:41', NULL, NULL),
(4, 2026, 'Showroom Trải Nghiệm Cao Cấp', 'Phát triển hệ thống showroom trưng bày trải nghiệm gỗ và nội thất may đo cao cấp tại các thành phố lớn.', NULL, 4, '2026-07-20 03:16:41', '2026-07-20 03:16:41', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document_categories`
--

CREATE TABLE `document_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document_categories`
--

INSERT INTO `document_categories` (`id`, `title`, `slug`, `description`, `sort_order`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 'Giấy chứng nhận', 'giay-chung-nhan', 'Nhóm giấy chứng nhận', 1, 1, '2026-07-11 04:59:31', '2026-07-11 04:59:31', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `album_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `album` varchar(100) NOT NULL DEFAULT 'general',
  `image` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `album_id`, `title`, `album`, `image`, `video`, `is_featured`, `sort_order`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, NULL, 'Phòng đơn sạch sẽ tiện nghi', 'albul-nha-djep', '1784536658_54ae0ba26def55ae72e4.jpg', '', 0, 1, 1, '2026-07-11 02:49:34', '2026-07-20 08:37:38', NULL, 2, 1),
(2, NULL, 'Lê bá dũng', 'khong-gian-phong-nghi', '1783750984_f7ad521b476636edab83.png', 'https://www.youtube.com/watch?v=lqMltpHNmig', 0, 2, 1, '2026-07-11 06:23:04', '2026-07-11 06:23:04', NULL, 1, NULL),
(3, NULL, 'Ảnh số 2 ', 'albul-nha-djep', '1784536577_7e96c53ab139fc1cd7fa.jpg', '', 0, 2, 1, '2026-07-20 08:36:17', '2026-07-20 08:36:17', NULL, 1, NULL),
(4, NULL, 'Anhr số 3', 'albul-nha-djep', '1784536602_7750091d520d2057bc44.jpg', '', 0, 0, 1, '2026-07-20 08:36:42', '2026-07-20 08:36:42', NULL, 1, NULL),
(5, NULL, 'Anhr số 4', 'albul-nha-djep', '1784536615_5954004d51cb6b0d9a4f.jpg', '', 0, 0, 1, '2026-07-20 08:36:55', '2026-07-20 08:36:55', NULL, 1, NULL),
(6, NULL, 'Ảnh số 5 ', 'albul-nha-djep', '1784536643_a2807ded1426257a0162.jpg', '', 0, 4, 1, '2026-07-20 08:37:23', '2026-07-20 08:37:23', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_albums`
--

CREATE TABLE `gallery_albums` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery_albums`
--

INSERT INTO `gallery_albums` (`id`, `title`, `slug`, `sort_order`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 'Albul nhà đẹp', 'albul-nha-djep', 1, 1, '2026-07-11 02:48:42', '2026-07-20 08:35:44', NULL, 2, 1),
(2, 'Thi công công trình', 'thi-cong-cong-trinh', 2, 1, '2026-07-11 02:48:55', '2026-07-11 02:48:55', NULL, 2, NULL),
(3, 'Trang trại hữu cơ', 'trang-trai-huu-co', 3, 1, '2026-07-11 02:49:06', '2026-07-11 02:49:06', NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2026-07-11-021144', 'App\\Database\\Migrations\\CreateInitialTables', 'default', 'App', 1783735917, 1),
(2, '2026-07-11-024533', 'App\\Database\\Migrations\\AddGalleryAlbumsTable', 'default', 'App', 1783737944, 2),
(3, '2026-07-11-033814', 'App\\Database\\Migrations\\CreateMilestonesTable', 'default', 'App', 1783741122, 3),
(4, '2026-07-11-120001', 'App\\Database\\Migrations\\AddDocumentCategoriesAndDocumentFields', 'default', 'App', 1783745971, 4),
(5, '2026-07-11-130500', 'App\\Database\\Migrations\\AddDeletedAtToCompanyMilestones', 'default', 'App', 1783750860, 5);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `summary` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(20) NOT NULL DEFAULT 'draft',
  `published_at` datetime DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `seo_keywords` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category_id`, `title`, `slug`, `summary`, `content`, `image`, `is_featured`, `status`, `published_at`, `tags`, `seo_title`, `seo_description`, `seo_keywords`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 1, 'Mộc Gia ra mắt Bộ sưu tập Bề mặt gỗ Công nghiệp Xu hướng 2026/2027', 'moc-gia-ra-mat-bo-suu-tap-be-mat-go-cong-nghiep-xu-huong-2026-2027', 'Lấy cảm hứng từ tự nhiên và phong cách tối giản Bắc Âu, Mộc Gia chính thức giới thiệu bộ sưu tập mới với 50+ bề mặt vân gỗ và giả đá siêu thực.', '<p>Đón đầu xu hướng thiết kế nội thất xanh và tối giản, Mộc Gia đã chính thức công bố Bộ sưu tập bề mặt gỗ công nghiệp xu hướng 2026/2027. Bộ sưu tập mang chủ đề \"Chạm vào Cảm xúc\", tập trung vào các tông màu gỗ ấm áp, bề mặt nhám sần siêu thực mô phỏng hoàn hảo gỗ tự nhiên.</p><p>Tất cả sản phẩm trong bộ sưu tập mới đều sử dụng cốt ván chống ẩm đạt chuẩn Super E0 cao cấp, hoàn toàn không mùi, bảo vệ sức khỏe cho các thành viên trong gia đình. Đây hứa hẹn sẽ là nguồn cảm hứng mới cho các kiến trúc sư trong các dự án sắp tới.</p>', 'news_collection.webp', 1, 'published', '2026-07-20 03:16:41', 'gỗ công nghiệp, bộ sưu tập, nội thất, xu hướng 2026', 'Bộ sưu tập bề mặt gỗ công nghiệp xu hướng 2026 - Mộc Gia', 'Mộc Gia ra mắt bộ sưu tập bề mặt gỗ công nghiệp mới 2026 với cốt ván siêu sạch đạt chuẩn an toàn Super E0 và vân gỗ sần sâu thời thượng.', 'bo suu tap go mọc gia, xu huong noi that 2026, go super e0', '2026-07-20 03:16:41', '2026-07-20 03:16:41', NULL, NULL, NULL),
(2, 1, 'Mộc Gia nhận chứng chỉ An toàn Sức khỏe Tiêu chuẩn Châu Âu E0', 'moc-gia-nhan-chung-chi-an-toan-suc-khoe-tieu-chuan-chau-au-e0', 'Hội đồng kiểm định quốc tế vừa trao chứng nhận tiêu chuẩn E0 cho toàn bộ dòng sản phẩm gỗ công nghiệp của Mộc Gia.', '<p>Vừa qua, Công ty Cổ phần Gỗ Mộc Gia đã vinh dự đón nhận chứng chỉ tiêu chuẩn an toàn sức khỏe E0 từ Tổ chức kiểm định quốc tế. Đây là cột mốc quan trọng khẳng định cam kết của Mộc Gia trong việc đem lại các sản phẩm xanh, sạch và an toàn cho người sử dụng.</p><p>Tiêu chuẩn E0 quy định nghiêm ngặt về lượng phát thải Formaldehyde từ gỗ công nghiệp. Việc đạt chứng chỉ này giúp Mộc Gia vững bước xuất khẩu sang các thị trường khó tính như Mỹ, Châu Âu và Nhật Bản.</p>', 'news_certificate.webp', 0, 'published', '2026-07-20 03:16:41', 'chứng chỉ, tiêu chuẩn E0, sức khỏe, gỗ sạch', 'Gỗ công nghiệp Mộc Gia đạt chuẩn quốc tế E0 - Bảo vệ sức khỏe', 'Chứng nhận tiêu chuẩn phát thải E0 cho ván gỗ công nghiệp MDF MFC Mộc Gia. Đảm bảo an toàn không độc hại cho môi trường sống.', 'chung chi go e0, van mdf an toan, go sach mọc gia', '2026-07-20 03:16:41', '2026-07-20 03:16:41', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

CREATE TABLE `news_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `title`, `slug`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 'Tin Tức Hoạt Động', 'tin-tuc-hoat-dong', '2026-07-20 03:16:41', '2026-07-20 03:16:41', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `logo`, `link`, `sort_order`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 'Vicostone', '1784533802_c1ae92ea0a1ea7120edd.jpg', 'https://www.facebook.com/VicostoneVietnam', 0, 1, '2026-07-20 03:16:41', '2026-07-20 07:50:02', NULL, NULL, 1),
(2, 'An Cường ', '1784533832_f1bb886d7bfe9544f2f0.jpg', 'https://www.facebook.com/ancuongcompany', 0, 1, '2026-07-20 03:16:41', '2026-07-20 07:50:32', NULL, NULL, 1),
(3, 'ALPHA Decor', '1784533858_5a21e0cc2823762d3bde.jpg', 'https://www.facebook.com/profile.php?id=100064379940207', 0, 1, '2026-07-20 03:16:41', '2026-07-20 07:50:58', NULL, NULL, 1),
(4, 'Khang Điền', 'partner_khangdien.webp', '#', 0, 1, '2026-07-20 03:16:41', '2026-07-20 07:51:04', '2026-07-20 07:51:04', NULL, NULL),
(5, 'Ngân Gia Nguyễn', '1784533910_6fc7cf1fbe00ded9b822.jpg', 'https://www.facebook.com/noithatngangianguyen', 0, 1, '2026-07-20 03:16:41', '2026-07-20 07:51:50', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sku` varchar(100) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `specs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`specs`)),
  `price` decimal(18,2) DEFAULT NULL,
  `price_label` varchar(150) DEFAULT NULL,
  `cover_image` varchar(500) DEFAULT NULL,
  `is_featured` tinyint(3) UNSIGNED DEFAULT 0,
  `sort_order` int(10) UNSIGNED DEFAULT 0,
  `status` tinyint(3) UNSIGNED DEFAULT 1,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `seo_keywords` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `slug`, `sku`, `summary`, `content`, `specs`, `price`, `price_label`, `cover_image`, `is_featured`, `sort_order`, `status`, `seo_title`, `seo_description`, `seo_keywords`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 1, 'VICOSTONE x ALPHA DECOR', 'vicostone-x-alpha-decor', 'MG-VICOSTONE x ALPHA DECOR', 'Giữa lòng phố thị nhộn nhịp, NyNic House do ALPHA Decor thiết kế gợi nhớ hình ảnh ngôi nhà tuổi thơ với mái dốc thân thuộc, chất liệu gỗ mộc mạc, không gian mở và những mảng xanh dịu mát. Nét hoài niệm được ALPHA Decor làm mới bằng đường bo cong mềm mại, sắc xanh Olive độc đáo, phòng khách thông tầng và các trang thiết bị thông minh.', '<p> Tiếp nối tinh thần gần gũi với thiên nhiên ấy, đá VICOSTONE® White Shells™ BQ370 được lựa chọn ốp bề mặt khu vực bếp, đảo bếp và lavabo. Sản phẩm sở hữu những mảnh vỏ sò lấp lánh trên bề mặt, khi kết hợp với ánh sáng sẽ tạo hiệu ứng lấp lánh đầy mê hoặc, không chỉ tạo điểm nhấn tinh tế mà còn giúp hoàn thiện một không gian sống vừa giàu cảm xúc, vừa tiện nghi. Đó cũng là lý do vì sao mẫu đá này luôn được ưa chuộng tại các công trình nhà phố hay chung cư hiện đại.<br> Cùng Vicostone và ALPHA Decor khám phá NyNic House để cảm nhận nơi ký ức tuổi thơ hòa quyện với nhịp sống hiện đại.<br><br></p>', NULL, NULL, 'Liên hệ báo giá', 'uploads/products/1784520345_46fe175d36257bd40771.jpg', 1, 0, 1, 'VICOSTONE x ALPHA DECOR', 'Giữa lòng phố thị nhộn nhịp, NyNic House do ALPHA Decor thiết kế gợi nhớ hình ảnh ngôi nhà tuổi thơ với mái dốc thân thuộc, chất liệu gỗ mộc mạc, không gian mở và những mảng xanh dịu mát. Nét hoài niệm được ALPHA Decor làm mới bằng đường bo cong mềm mại, sắc xanh Olive độc đáo, phòng khách thông tầng và các trang thiết bị thông minh.', '', '2026-07-20 04:05:45', '2026-07-20 04:08:46', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `icon` varchar(100) DEFAULT 'bi-box-seam',
  `sort_order` tinyint(3) UNSIGNED DEFAULT 0,
  `status` tinyint(3) UNSIGNED DEFAULT 1,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `seo_keywords` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `parent_id`, `title`, `slug`, `description`, `image`, `icon`, `sort_order`, `status`, `seo_title`, `seo_description`, `seo_keywords`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, NULL, 'Vật liệu nội thất', 'vat-lieu-noi-that', 'Vật liệu nội thất', 'uploads/product_categories/1784519985_c36cc8da21d4d6b33f2f.png', 'bi bi-box', 0, 1, 'Vật liệu nội thất', '', '', '2026-07-20 03:59:45', '2026-07-20 03:59:45', NULL, 1, NULL),
(2, 1, 'Lõi ván', 'loi-van', 'Lõi ván', 'uploads/product_categories/1784520015_d252699973f8a5df3fd6.jpg', 'bi-box-seam', 0, 1, 'Lõi ván', '', '', '2026-07-20 04:00:15', '2026-07-20 04:00:15', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_media`
--

CREATE TABLE `product_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `type` enum('image','video') DEFAULT 'image',
  `file_path` varchar(500) DEFAULT NULL,
  `video_url` varchar(500) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `sort_order` int(10) UNSIGNED DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_media`
--

INSERT INTO `product_media` (`id`, `product_id`, `type`, `file_path`, `video_url`, `caption`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'image', 'uploads/products/gallery/1784520345_553fd9f633e5f11e816c.jpg', NULL, '', 0, '2026-07-20 04:05:45', '2026-07-20 04:05:45'),
(2, 1, 'image', 'uploads/products/gallery/1784520345_09c15039f2376129ddff.jpg', NULL, '', 1, '2026-07-20 04:05:45', '2026-07-20 04:05:45'),
(3, 1, 'image', 'uploads/products/gallery/1784520345_dedb05a4f858f1d96750.jpg', NULL, '', 2, '2026-07-20 04:05:46', '2026-07-20 04:05:46'),
(4, 1, 'image', 'uploads/products/gallery/1784520346_727492d3f898a7dbf5ba.jpg', NULL, '', 3, '2026-07-20 04:05:46', '2026-07-20 04:05:46'),
(5, 1, 'image', 'uploads/products/gallery/1784520346_c8dd17c8867cd3a7ab7d.jpg', NULL, '', 4, '2026-07-20 04:05:46', '2026-07-20 04:05:46'),
(9, 1, 'video', NULL, 'https://www.youtube.com/watch?v=bCcy4mV4oAM', '', 3, '2026-07-20 04:08:00', '2026-07-20 04:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `summary` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `seo_keywords` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `summary`, `content`, `image`, `icon`, `seo_title`, `seo_description`, `seo_keywords`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 'Vật Liệu & Giải Pháp Gỗ Công Nghiệp', 'vat-lieu-va-giai-phap-go-cong-nghiep', 'Cung cấp ván gỗ công nghiệp chất lượng cao, MFC, MDF phủ Melamine, Laminate, Acrylic đa dạng màu sắc và bề mặt đạt tiêu chuẩn xuất khẩu.', '<p>Mộc Gia tự hào là đơn vị tiên phong cung cấp vật liệu gỗ công nghiệp cao cấp tại thị trường Việt Nam. Chúng tôi sở hữu danh mục sản phẩm đa dạng với hơn 1.000 màu sắc và bề mặt khác nhau, từ vân gỗ tự nhiên, vân đá, giả da đến các bề mặt đơn sắc sang trọng.</p><p>Các dòng sản phẩm ván MFC, MDF, HDF của Mộc Gia đều đạt tiêu chuẩn quốc tế E1, E0 về nồng độ phát thải Formaldehyde, đảm bảo an toàn tuyệt đối cho sức khỏe người tiêu dùng và độ bền vượt trội theo thời gian.</p>', 'wood_materials.webp', 'bi-grid-1x2-fill', 'Vật Liệu Gỗ Công Nghiệp MFC MDF HDF E0 E1 - Mộc Gia', 'Mộc Gia cung cấp gỗ công nghiệp chất lượng cao đạt chuẩn châu Âu E0, E1. Hơn 1000 màu sắc bề mặt vân gỗ, melamine, acrylic bóng gương, laminate chống trầy.', 'go cong nghiep mdf, van go melamine, tam acrylic, laminate go mọc gia', 1, '2026-07-20 03:16:41', '2026-07-20 03:16:41', NULL, NULL, NULL),
(2, 'Nội Thất May Đo & Giải Pháp Thiết Kế (Bespoke)', 'noi-that-may-do-va-giai-phap-thiet-ke', 'Thiết kế và sản xuất nội thất gia đình, căn hộ, biệt thự và văn phòng theo yêu cầu riêng biệt, mang lại tính độc bản và tối ưu hóa công năng.', '<p>Không chỉ dừng lại ở cung cấp vật liệu, Mộc Gia mang đến giải pháp thiết kế và thi công nội thất may đo độc bản (bespoke). Chúng tôi thấu hiểu mỗi không gian sống là một câu chuyện riêng của gia chủ, vì thế đội ngũ kiến trúc sư của Mộc Gia luôn sáng tạo để tạo nên các tác phẩm nội thất hoàn hảo nhất.</p><p>Nhờ dây chuyền sản xuất hiện đại và quy trình kiểm soát chất lượng chặt chẽ, sản phẩm nội thất may đo của Mộc Gia đạt độ tinh xảo cao, đường nét sắc sảo và độ hoàn thiện tinh tế chuẩn châu Âu.</p>', 'bespoke_furniture.webp', 'bi-palette-fill', 'Thiết kế thi công nội thất may đo Bespoke cao cấp - Mộc Gia', 'Giải pháp thiết kế và sản xuất đồ gỗ nội thất gia đình, tủ bếp, tủ áo, giường ngủ may đo chuẩn xác theo yêu cầu khách hàng cá nhân.', 'noi that may do, noi that bespoke, thiet ke noi that cao cap, tu bep mdf moc gia', 1, '2026-07-20 03:16:41', '2026-07-20 03:16:41', NULL, NULL, NULL),
(3, 'Thi Thi Công Dự Án Trọn Gói', 'thi-cong-du-an-tron-goi', 'Nhà thầu thi công lắp đặt hoàn thiện nội thất trọn gói cho biệt thự, căn hộ cao cấp, văn phòng và các dự án thương mại quy mô lớn.', '<p>Mộc Gia là đối tác tin cậy của các chủ đầu tư, tập đoàn bất động sản lớn tại Việt Nam trong lĩnh vực thi công hoàn thiện nội thất dự án. Với quy mô xưởng sản xuất lớn và đội ngũ thợ lành nghề, chúng tôi tự tin đảm nhận các dự án có độ khó kỹ thuật cao.</p><p>Chúng tôi cam kết tiến độ thi công chính xác, chất lượng vật liệu bàn giao đúng cam kết hợp đồng và dịch vụ bảo hành, bảo trì chuyên nghiệp, kịp thời.</p>', 'project_construction.webp', 'bi-tools', 'Nhà thầu thi công nội thất dự án căn hộ biệt thự - Mộc Gia', 'Mộc Gia nhận thi công lắp đặt nội thất trọn gói cho các dự án biệt thự, chung cư cao cấp, văn phòng làm việc quy mô lớn chuyên nghiệp.', 'thi cong noi that tron goi, thau noi that van phong, lap dat do go du an', 1, '2026-07-20 03:16:41', '2026-07-20 03:16:41', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 'company_name', 'Nội thất Ngân Gia Nguyễn', '2026-07-20 03:16:41', '2026-07-20 09:55:21', NULL, NULL, 1),
(2, 'company_name_en', 'Ngan Gia Nguyen Interior', '2026-07-20 03:16:41', '2026-07-20 09:55:21', NULL, NULL, 1),
(3, 'address', '126 Lý Thái Tổ, phường Diên Hồng, Gia Lai', '2026-07-20 03:16:41', '2026-07-20 09:55:21', NULL, NULL, 1),
(4, 'phone', '0916113169', '2026-07-20 03:16:41', '2026-07-20 09:55:21', NULL, NULL, 1),
(5, 'email', 'info@mocgiawood.com', '2026-07-20 03:16:41', '2026-07-20 09:55:21', NULL, NULL, 1),
(6, 'map_embed', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.231987515155!2d106.6775191!3d10.7935405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528cb2c6d4825%3A0xe5a36398d5c414!2s128%20Nguy%E1%BB%85n%20V%C4%83n%20Tr%E1%BB%97i%2C%20Ph%C6%B0%E1%BB%9Dng%208%2C%20Ph%C3%BA%20Nhu%E1%BA%ADn%2C%20Th%C3%A0nh%20ph%E1%BB%91%20H%E1%BB%93%20Ch%C3%AD%20Minh!5e0!3m2!1svi!2s!4v1720668000000!5m2!1svi!2s', '2026-07-20 03:16:41', '2026-07-20 07:48:45', NULL, NULL, 1),
(7, 'seo_title', 'NGÂN GIA NGUYỄN - Giải pháp vật liệu gỗ công nghiệp & nội thất cao cấp', '2026-07-20 03:16:41', '2026-07-20 07:48:33', NULL, NULL, 1),
(8, 'seo_description', 'NGÂN GIA NGUYỄN chuyên cung cấp ván gỗ công nghiệp cao cấp, MDF phủ Melamine, Acrylic, Laminate đạt tiêu chuẩn châu Âu và dịch vụ thi công nội thất may đo đẳng cấp.', '2026-07-20 03:16:41', '2026-07-20 07:48:33', NULL, NULL, 1),
(9, 'seo_keywords', 'go cong nghiep moc gia, mdf moc gia, melamine moc gia, noi that may do, thiet ke noi that', '2026-07-20 03:16:41', '2026-07-20 07:48:33', NULL, NULL, 1),
(10, 'facebook', 'https://www.facebook.com/noithatngangianguyen', '2026-07-20 03:16:41', '2026-07-20 10:25:56', NULL, NULL, 1),
(11, 'zalo', '0916113169', '2026-07-20 03:16:41', '2026-07-20 10:25:56', NULL, NULL, 1),
(12, 'working_hours', '8:00 - 18:00 (Thứ 2 - Thứ 7)', '2026-07-20 03:16:41', '2026-07-20 09:55:21', NULL, NULL, 1),
(13, 'theme_color_preset', 'luxury_walnut_gold', '2026-07-20 03:16:41', '2026-07-20 09:55:21', NULL, NULL, 1),
(14, 'theme_font_preset', 'mocgia_font', '2026-07-20 03:16:41', '2026-07-20 09:55:21', NULL, NULL, 1),
(15, 'theme_border_radius_btn', '8px', '2026-07-20 03:16:41', '2026-07-20 09:55:21', NULL, NULL, 1),
(16, 'theme_border_radius_block', '8px', '2026-07-20 03:16:41', '2026-07-20 09:55:21', NULL, NULL, 1),
(17, 'site_logo', '1784521487_761e2a023eba6e1cac5e.jpg', '2026-07-20 04:14:48', '2026-07-20 04:24:47', NULL, 1, 1),
(18, 'settings_tab', 'general', '2026-07-20 04:14:48', '2026-07-20 09:55:21', NULL, 1, 1),
(19, 'home_hero_label', 'Ngân Gia Nguyễn', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(20, 'home_hero_title', 'Đối tác tin cậy trong thiết kế, thi công , nội thất', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(21, 'home_hero_sub', 'Doanh nghiệp đa ngành tại Đức Cơ - Gia Lai với cam kết chất lượng và uy tín bền vững.', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(22, 'home_cta_text', 'Liên hệ tư vấn', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(23, 'home_cta_link', '/lien-he', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(24, 'home_hero_contact_text', 'Liên Hệ Ngay', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(25, 'home_hero_contact_link', '/lien-he', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(26, 'home_intro_title', 'Về chúng tôi', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(27, 'home_intro_text', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(28, 'home_intro_eyebrow', 'Giới Thiệu Chung', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(29, 'home_intro_heading', 'CÔNG TY CỔ PHẦN GỖ MỘC GIA', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(30, 'home_intro_body1', 'Được thành lập từ năm 2017 tại huyện Đức Cơ, tỉnh Gia Lai, Công ty TNHH Một Thành Viên Việt Lệ Thanh đã và đang khẳng định vị thế là một trong những doanh nghiệp đa ngành uy tín hàng đầu trong khu vực.', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(31, 'home_intro_body2', 'Lấy dịch vụ lưu trú ngắn ngày làm trọng tâm phát triển với hệ thống phòng nghỉ tiện nghi, sạch sẽ và an toàn. Bên cạnh đó, công ty còn phát triển mạnh mẽ mảng thi công xây dựng hạ tầng giao thông và trang trại chăn nuôi gia súc theo hướng bền vững.', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(32, 'home_intro_card_title', 'MỘC GIA', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(33, 'home_intro_card_address', 'VP: 126 Lý Thái Tổ, P. Diên Hồng | Xưởng: 772 Nguyễn Chí Thanh, P. An Phú, Gia Lai', '2026-07-20 04:16:03', '2026-07-20 10:25:56', NULL, 1, 1),
(34, 'home_intro_feature1_title', 'Uy Tín Hàng Đầu', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(35, 'home_intro_feature1_sub', 'Đặt chất lượng lên trên hết', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(36, 'home_intro_feature2_title', 'Dịch Vụ Chu Đáo', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(37, 'home_intro_feature2_sub', 'Phục vụ khách hàng 24/7', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(38, 'home_intro_button_text', 'Xem Chi Tiết', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(39, 'home_intro_button_link', '/gioi-thieu', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(40, 'home_why_eyebrow', 'Giá Trị Cốt Lõi', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(41, 'home_why_title', 'Tại Sao Nên Chọn Chúng Tôi', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(42, 'home_why_card1_title', 'Vị Trí Đắc Địa', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(43, 'home_why_card1_desc', 'Nằm ngay trung tâm thị trấn Chư Ty, Đức Cơ, thuận tiện cho việc di chuyển, giao thương và lưu trú nghỉ dưỡng.', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(44, 'home_why_card2_title', 'Giá Cả Hợp Lý', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(45, 'home_why_card2_desc', 'Cung cấp phòng lưu trú đầy đủ tiện nghi và các dịch vụ xây dựng với mức giá cạnh tranh nhất thị trường.', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(46, 'home_why_card3_title', 'Đội Ngũ Tận Tâm', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(47, 'home_why_card3_desc', 'Đội ngũ kỹ sư xây dựng lành nghề và nhân viên khách sạn phục vụ chuyên nghiệp, chu đáo.', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(48, 'home_stats_item1_value', '9+', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(49, 'home_stats_item1_title', 'Năm Hoạt Động', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(50, 'home_stats_item2_value', '100%', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(51, 'home_stats_item2_title', 'Khách Hàng Hài Lòng', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(52, 'home_stats_item3_value', '50+', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(53, 'home_stats_item3_title', 'Công Trình Đã Thi Công', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(54, 'home_stats_item4_value', '24/7', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(55, 'home_stats_item4_title', 'Hỗ Trợ Phục Vụ', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(56, 'home_services_eyebrow', 'Lĩnh Vực Hoạt Động', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(57, 'home_services_title', 'Dịch Vụ Của Chúng Tôi', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(58, 'home_services_empty_text', 'Đang cập nhật danh sách dịch vụ...', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(59, 'home_gallery_eyebrow', 'Hình Ảnh Thực Tế', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(60, 'home_gallery_title', 'Thư Viện Ảnh Hoạt Động', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(61, 'home_gallery_view_all_text', 'Xem Tất Cả Hình Ảnh', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(62, 'home_gallery_empty_text', 'Đang cập nhật thư viện ảnh...', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(63, 'home_news_eyebrow', 'Tin Tức Mới Nhất', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(64, 'home_news_title', 'Bản Tin Mộc Gia', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(65, 'home_news_empty_text', 'Đang cập nhật tin tức mới...', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(66, 'home_news_read_more_text', 'Đọc Tiếp', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(67, 'home_partners_empty_prefix', 'Đối tác', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(68, 'home_section_order_intro', '10', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(69, 'home_section_order_why', '20', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(70, 'home_section_order_services', '30', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(71, 'home_section_order_gallery', '40', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(72, 'home_section_order_news', '50', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(73, 'home_section_order_partners', '60', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(74, 'home_section_order_certificates', '70', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(75, 'home_hero_label_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(76, 'home_hero_title_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(77, 'home_hero_sub_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(78, 'home_cta_text_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(79, 'home_cta_link_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(80, 'home_hero_contact_text_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(81, 'home_hero_contact_link_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(82, 'home_intro_title_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(83, 'home_intro_text_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(84, 'home_intro_eyebrow_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(85, 'home_intro_heading_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(86, 'home_intro_body1_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(87, 'home_intro_body2_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(88, 'home_intro_card_title_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(89, 'home_intro_card_address_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(90, 'home_intro_feature1_title_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(91, 'home_intro_feature1_sub_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(92, 'home_intro_feature2_title_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(93, 'home_intro_feature2_sub_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(94, 'home_intro_button_text_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(95, 'home_intro_button_link_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(96, 'home_why_eyebrow_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(97, 'home_why_title_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(98, 'home_why_card1_title_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(99, 'home_why_card1_desc_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(100, 'home_why_card2_title_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(101, 'home_why_card2_desc_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(102, 'home_why_card3_title_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(103, 'home_why_card3_desc_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(104, 'home_stats_item1_value_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(105, 'home_stats_item1_title_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(106, 'home_stats_item2_value_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(107, 'home_stats_item2_title_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(108, 'home_stats_item3_value_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(109, 'home_stats_item3_title_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(110, 'home_stats_item4_value_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(111, 'home_stats_item4_title_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(112, 'home_services_eyebrow_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(113, 'home_services_title_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(114, 'home_services_empty_text_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(115, 'home_gallery_eyebrow_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(116, 'home_gallery_title_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(117, 'home_gallery_view_all_text_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(118, 'home_gallery_empty_text_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(119, 'home_news_eyebrow_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(120, 'home_news_title_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(121, 'home_news_empty_text_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(122, 'home_news_read_more_text_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(123, 'home_partners_empty_prefix_en', '', '2026-07-20 04:16:03', '2026-07-20 07:44:57', NULL, 1, 1),
(124, 'zalo_phone', '0916113169', '2026-07-20 08:13:31', '2026-07-20 09:55:21', NULL, 1, 1),
(125, 'office_address', '126 Lý Thái Tổ, phường Diên Hồng, Gia Lai', '2026-07-20 10:25:56', '2026-07-20 10:25:56', NULL, NULL, NULL),
(126, 'factory_address', '772 Nguyễn Chí Thanh, phường An Phú, Gia Lai', '2026-07-20 10:25:56', '2026-07-20 10:25:56', NULL, NULL, NULL),
(127, 'about_address', '126 Lý Thái Tổ, phường Diên Hồng, Gia Lai', '2026-07-20 10:25:56', '2026-07-20 10:25:56', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'admin',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fullname`, `role`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 'admin', 'admin@mocgiawood.com', '$2y$10$CvyRfpOwsaSwXZ1x.JI6XuDZbQfDRMYiczQMoJtUiMH/s6NWTxHO6', 'Quản trị viên Mộc Gia', 'superadmin', 1, '2026-07-20 03:16:41', '2026-07-20 03:16:41', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_milestones`
--
ALTER TABLE `company_milestones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sort_order` (`sort_order`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_categories`
--
ALTER TABLE `document_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `sort_order` (`sort_order`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_albums`
--
ALTER TABLE `gallery_albums`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `slug` (`slug`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `product_media`
--
ALTER TABLE `product_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company_milestones`
--
ALTER TABLE `company_milestones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document_categories`
--
ALTER TABLE `document_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gallery_albums`
--
ALTER TABLE `gallery_albums`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_media`
--
ALTER TABLE `product_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
