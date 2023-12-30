-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 02:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `linhkienmaytinh`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` bigint(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0' COMMENT '0:đang duyệt 1:đang vận chuyển 2:đã giao hàng',
  `method` varchar(200) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `fullname`, `phone`, `email`, `address`, `note`, `total`, `status`, `method`, `user_id`, `created_at`, `updated_at`) VALUES
(58, 'Vũ  Hảo', '383825813', 'vuhao@gmail.com', 'Hoang Mai, Ha Noi', '', '3450000', '2', 'home-payment', 22, '2023-12-19', NULL),
(59, 'Vũ  Hảo', '383825813', 'vuhao@gmail.com', 'Hoang Mai, Ha Noi', '', '765000', '2', 'home-payment', 22, '2023-12-19', NULL),
(60, 'Vũ  Hảo', '383825813', 'vuhao@gmail.com', 'Hoang Mai, Ha Noi', '', '220000', '2', 'home-payment', 22, '2023-12-20', NULL),
(61, 'Vũ Thị Thanh Hảo', '383825812', 'thanhhaovu19@gmail.com', 'Hà Nội', '', '3900000', '2', 'home-payment', 18, '2023-12-20', NULL),
(62, 'Vũ Thị Thanh Hảo', '383825812', 'thanhhaovu19@gmail.com', 'Hà Nội', '', '2340000', '2', 'home-payment', 18, '2023-12-24', NULL),
(63, 'thanh Hảo', '383825812', 'thanhhaovu19@gmail.com', 'Hà Nội', '', '6280000', '2', 'home-payment', 18, '2023-12-24', NULL),
(64, 'Vũ Thị Thanh Hảo', '383825812', 'thanhhaovu19@gmail.com', 'Hà Nội', '', '5000000', '2', 'home-payment', 18, '2023-12-24', NULL),
(65, 'Hảo', '383825812', 'thanhhaovu19@gmail.com', 'Thái Bình', '', '6800000', '2', 'home-payment', 18, '2023-12-25', NULL),
(66, ' Hảo', '383825812', 'thanhhaovu19@gmail.com', 'Thái Bình', '', '11750000', '2', 'home-payment', 18, '2023-12-25', NULL),
(67, 'Vũ  Hảo', '383825813', 'vuhao@gmail.com', 'Hoang Mai, Ha Noi', '', '6000000', '2', 'home-payment', 22, '2023-12-26', '0000-00-00'),
(68, 'Vũ  Hảo', '383825813', 'vuhao@gmail.com', 'Hoang Mai, Ha Noi', '', '255000', '1', 'home-payment', 22, '2023-12-26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(13, 'CPU', '2023-11-24 16:07:14', '2023-12-21 11:23:37'),
(14, 'RAM', '2023-11-24 16:07:40', '2023-12-21 11:23:55'),
(15, 'VGA', '2023-11-24 16:07:54', '2023-12-21 11:24:15'),
(16, 'TẢN NHIỆT', '2023-11-24 16:08:12', '2023-12-21 11:24:29'),
(17, 'Ổ ĐĨA QUANG', '2023-11-24 16:08:31', '2023-12-21 11:24:39'),
(18, 'TAI NGHE', '2023-11-24 16:08:36', '2023-12-21 11:24:49'),
(19, 'MÀN HÌNH', '2023-12-21 11:25:01', NULL),
(20, 'CHUỘT', '2023-12-21 11:25:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_bill`
--

CREATE TABLE `detail_bill` (
  `id` int(11) NOT NULL,
  `id_bill` bigint(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `price` float NOT NULL,
  `total` int(11) NOT NULL,
  `image` text NOT NULL,
  `name_pro` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `detail_bill`
--

INSERT INTO `detail_bill` (`id`, `id_bill`, `id_pro`, `number`, `price`, `total`, `image`, `name_pro`, `created_at`, `updated_at`) VALUES
(88, 58, 128, 1, 2250000, 2250000, '17031667921593062997.png', 'Màn hình Gaming Acer VG240Y S/23.8 inch/FHD (1920x1080)/IPS 165Hz', '2023-12-26 04:04:18', NULL),
(89, 58, 84, 1, 1200000, 1200000, '17031553141584402455.png', ' CPU Intel Core i5-10400F + Quạt ', '2023-12-26 04:04:18', NULL),
(90, 59, 120, 3, 255000, 765000, '17031659781719646838.png', 'Chuột Gaming Zadez G153M', '2023-12-26 04:04:41', NULL),
(91, 60, 116, 1, 220000, 220000, '17031655351963212718.png', 'Chuột Gaming Asus CERBERUS', '2023-12-26 04:07:00', NULL),
(92, 61, 83, 1, 2100000, 2100000, '17031551841549167391.png', ' CPU Intel Core i5-10400F + Quạt ', '2023-12-26 04:13:58', NULL),
(93, 61, 82, 1, 1800000, 1800000, '1703154959604396400.png', 'CPU Intel Core i3-10100F + Quạt', '2023-12-26 04:13:58', NULL),
(94, 62, 88, 2, 1170000, 2340000, '1703155935812662712.png', 'RAM G.SKILL Trident 16G (8Gx2) F4-3000C16D-16GTZR', '2023-12-26 04:14:33', NULL),
(95, 63, 127, 1, 3850000, 3850000, '17031666831062891579.png', 'Màn hình Gaming Gigabyte GS27F/27 inch/FHD (1920x1080)/IPS 170Hz', '2023-12-26 04:15:31', NULL),
(96, 63, 126, 1, 2430000, 2430000, '17031665831614231559.png', 'Màn hình Samsung LS27R350FHEXXV/27 inch/FHD (1920x1080)/IPS 75Hz', '2023-12-26 04:15:31', NULL),
(97, 64, 129, 1, 5000000, 5000000, '17031669121309578148.png', 'Màn hình MSI Optix MAG274R/27 inch/FHD (1920x1080)/144Hz', '2023-12-26 04:16:36', NULL),
(98, 65, 99, 1, 3800000, 3800000, '1703163141687993787.png', 'Card đồ họa Asus DUAL RX 6600XT O8G', '2023-12-26 04:17:12', NULL),
(99, 65, 96, 1, 3000000, 3000000, '1703162787351675815.png', 'Card đồ hoạ Gigabyte N3060VISION OC-12GD - 12GB GDDR6 - 192 bit', '2023-12-26 04:17:12', NULL),
(100, 66, 92, 1, 900000, 900000, '17031564381205766325.png', 'RAM Laptop Kingston 8GB - DDR5 - 4800MHz (KVR48S40BS6-8)', '2023-12-26 04:18:00', NULL),
(101, 66, 97, 1, 1250000, 1250000, '1703162923142162099.png', 'Card đồ hoạ MSI N730K-2GD3H/LPV1', '2023-12-26 04:18:00', NULL),
(102, 66, 95, 1, 9600000, 9600000, '1703162688504910753.png', 'Card đồ hoạ Gigabyte N307TGAMING OC-8GD - 8GB GDDR6 - 256 bit', '2023-12-26 04:18:00', NULL),
(103, 67, 125, 2, 3000000, 6000000, '17031664811374813024.png', 'Màn hình đồ họa Asus ProArt PA247CV-P/23.8 inch/FHD (1920x1080)/IPS 75Hz', '2023-12-26 04:20:12', NULL),
(104, 68, 120, 1, 255000, 255000, '17031659781719646838.png', 'Chuột Gaming Zadez G153M', '2023-12-26 04:44:27', NULL);

--
-- Triggers `detail_bill`
--
DELIMITER $$
CREATE TRIGGER `tg_order` BEFORE INSERT ON `detail_bill` FOR EACH ROW BEGIN
	UPDATE product SET quantity = quantity - NEW.number WHERE id = NEW.id_pro;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `group_user`
--

CREATE TABLE `group_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `group_user`
--

INSERT INTO `group_user` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-11-15 05:14:46', '2023-11-01 16:10:16'),
(2, 'Client', '2023-11-15 05:14:46', '2023-11-01 05:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `img_product`
--

CREATE TABLE `img_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `img_product`
--

INSERT INTO `img_product` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(219, 82, '', '2023-12-21 11:36:08', NULL),
(220, 83, '17031551841023021775.png', '2023-12-21 11:39:44', NULL),
(221, 84, '17031553141674932797.png', '2023-12-21 11:41:54', NULL),
(222, 85, '17031554731935283435.png', '2023-12-21 11:44:33', NULL),
(223, 87, '1703155792308544531.png', '2023-12-21 11:49:52', NULL),
(224, 88, '17031559351274305693.png', '2023-12-21 11:52:15', NULL),
(225, 89, '1703156042449967150.png', '2023-12-21 11:54:02', NULL),
(227, 90, '17031561991145779226.png', '2023-12-21 11:56:39', NULL),
(228, 91, '1703156328452221488.png', '2023-12-21 11:58:48', NULL),
(229, 92, '17031564381990380558.png', '2023-12-21 12:00:38', NULL),
(230, 93, '17031565732039973647.png', '2023-12-21 12:02:53', NULL),
(231, 94, '17031567911765265513.png', '2023-12-21 12:06:31', NULL),
(232, 95, '17031626881839490752.png', '2023-12-21 13:44:48', NULL),
(233, 96, '1703162787389857784.png', '2023-12-21 13:46:27', NULL),
(234, 97, '17031629231581456990.png', '2023-12-21 13:48:43', NULL),
(235, 98, '17031630442009858607.png', '2023-12-21 13:50:44', NULL),
(236, 99, '17031631412028621932.png', '2023-12-21 13:52:21', NULL),
(237, 100, '1703163285220303216.png', '2023-12-21 13:54:45', NULL),
(238, 101, '1703163399568007205.png', '2023-12-21 13:56:39', NULL),
(239, 102, '170316355880632366.png', '2023-12-21 13:59:18', NULL),
(240, 103, '1703163677344256400.png', '2023-12-21 14:01:17', NULL),
(241, 104, '17031638881371897716.png', '2023-12-21 14:04:48', NULL),
(242, 105, '1703164001348596215.png', '2023-12-21 14:06:41', NULL),
(243, 106, '17031641682133856029.png', '2023-12-21 14:09:28', NULL),
(244, 107, '1703164282195542563.png', '2023-12-21 14:11:22', NULL),
(245, 108, '17031644211440850691.png', '2023-12-21 14:13:41', NULL),
(246, 109, '17031645531427014662.png', '2023-12-21 14:15:53', NULL),
(247, 112, '17031647251555532808.png', '2023-12-21 14:18:45', NULL),
(248, 113, '1703164854984786162.png', '2023-12-21 14:20:54', NULL),
(249, 114, '1703165110566650008.png', '2023-12-21 14:25:10', NULL),
(250, 115, '1703165383710896253.png', '2023-12-21 14:29:43', NULL),
(251, 117, '17031656521309792209.png', '2023-12-21 14:34:12', NULL),
(252, 118, '1703165778302535236.png', '2023-12-21 14:36:18', NULL),
(253, 119, '17031658701081472707.png', '2023-12-21 14:37:50', NULL),
(254, 120, '1703165978891022718.png', '2023-12-21 14:39:38', NULL),
(255, 122, '1703166087956603602.png', '2023-12-21 14:41:27', NULL),
(256, 123, '17031663041619889245.png', '2023-12-21 14:45:04', NULL),
(257, 124, '170316639651201305.png', '2023-12-21 14:46:36', NULL),
(258, 126, '170316658324789499.png', '2023-12-21 14:49:43', NULL),
(259, 127, '17031666832024882000.png', '2023-12-21 14:51:23', NULL),
(260, 128, '1703166792632201027.png', '2023-12-21 14:53:12', NULL),
(261, 129, '17031669121244786514.png', '2023-12-21 14:55:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` text NOT NULL,
  `cate_id` int(11) NOT NULL,
  `price` double NOT NULL COMMENT 'vnd',
  `quantity` int(11) NOT NULL,
  `promotion` double NOT NULL,
  `description` text DEFAULT NULL,
  `view` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `cate_id`, `price`, `quantity`, `promotion`, `description`, `view`, `created_at`, `updated_at`) VALUES
(82, 'CPU Intel Core i3-10100F + Quạt', '1703154959604396400.png', 13, 2000000, 67, 10, 'Chi tiết thông số kỹ thuật\r\nThông tin hàng hóa\r\nModel	                                               i3-10100F\r\nThương hiệu	                               Intel\r\nXuất xứ	                                               Malaysia\r\nThời gian bảo hành (tháng)       36\r\nCấu hình chi tiết\r\nHãng CPU	                                       Intel\r\nCông nghệ CPU	                       Core i3\r\nLoại CPU	                                       10100F\r\nTên thế hệ	                                       Comet Lake\r\nSocket	                                               LGA 1200\r\nSố nhân	                                       4\r\nSố luồng	                                       8\r\nTốc độ xử lý	                              Tối đa 4.3 GHz\r\nBộ nhớ đệm	                              6 MB\r\nTiến trình sản xuất	                     14 nm\r\nHỗ trợ loại RAM	                     DDR4\r\nTDP	                                             65 W', 0, '2023-11-28 13:57:44', '2023-12-21 04:36:08'),
(83, ' CPU Intel Core i5-10400F + Quạt ', '17031551841549167391.png', 13, 3000000, 26, 30, 'Bộ xử lý Intel Core i5-10400F là một vi xử lý thuộc dòng Core i5 thế hệ thứ 10 của Intel. Dưới đây là mô tả cơ bản về CPU và thông số kỹ thuật liên quan:\r\n\r\nIntel Core i5-10400F:\r\n\r\nSố Lõi/Chạy Đồng Thời (Threads): 6 lõi / 12 threads.\r\n\r\nTần Số Cơ Bản: 2.9 GHz.\r\n\r\nTần Số Turbo Tối Đa: 4.3 GHz.\r\n\r\nBộ Nhớ Cache: 12 MB Intel Smart Cache.\r\n\r\nTính Năng Đặc Biệt: Hỗ trợ công nghệ Intel Hyper-Threading, giúp nâng cao hiệu suất đa nhiệm.\r\n\r\nĐồ Họa tích hợp: Không có (do đó có chữ \"F\" ở cuối tên).\r\n\r\nHỗ trợ bộ nhớ: DDR4-2666.\r\n\r\nQuạt (Tản Nhiệt):\r\n\r\nKhông rõ thông tin chi tiết về quạt mà bạn đang đề cập. Thông thường, khi mua CPU, nếu không có thông số cụ thể, quạt tản nhiệt đi kèm thường là một quạt tản nhiệt cơ bản của Intel. Tuy nhiên, nếu bạn muốn cải thiện hiệu suất tản nhiệt hoặc nâng cấp hệ thống làm mát, bạn có thể xem xét việc sử dụng các quạt tản nhiệt của bên thứ ba hoặc các giải pháp tản nhiệt nước.', 0, '2023-11-29 04:39:44', NULL),
(84, ' CPU Intel Core i5-10400F + Quạt ', '17031553141584402455.png', 13, 3000000, 28, 60, 'CPU AMD Ryzen 3 3200G là một bộ vi xử lý dành cho máy tính desktop, thuộc dòng Ryzen 3000 series của AMD. Dưới đây là một mô tả tổng quan về CPU này:\r\nAMD Ryzen 3 3200G:\r\nSố Lõi/Chạy Đồng Thời (Threads): 4 lõi / 4 threads.\r\nTần Số Cơ Bản: 3.6 GHz.\r\nTần Số Turbo Tối Đa: 4.0 GHz.\r\nBộ Nhớ Cache: 6 MB (2 MB L2 + 4 MB L3) Cache.\r\nĐồ Họa tích hợp: Radeon Vega 8 Graphics.\r\nHỗ trợ bộ nhớ: DDR4-2933.\r\nTiến Trình Sản Xuất: 12nm.\r\nĐồ Họa tích hợp (Radeon Vega 8 Graphics):\r\nSố Lõi Đồ Họa: 8 lõi.\r\nTần Số Đồ Họa Tối Đa: 1250 MHz.\r\nHỗ trợ Độ Phân Giải Màn Hình: Hỗ trợ độ phân giải lên đến 4K.\r\nTính Năng Đặc Biệt:\r\nAMD Simultaneous Multithreading (SMT): Không hỗ trợ (mỗi lõi chỉ xử lý một luồng đồng thời).\r\nAMD Precision Boost: Có.\r\nHỗ trợ PCIe 3.0: Có.\r\nQuản lý Nhiệt Độ và Năng Lượng:\r\nTDP (Năng Lượng Tổng): 65 Watts.\r\nBộ Tản Nhiệt Đi Kèm: Có thể đi kèm với một tản nhiệt khí, tùy vào bản OEM hoặc lựa chọn của nhà sản xuất.', 0, '2023-11-29 04:41:54', NULL),
(85, 'CPU Intel Core i9-12900K ', '1703155473304892488.png', 13, 17000000, 60, 30, 'CPU Intel Core i9-12900K là một bộ xử lý mạnh mẽ thuộc dòng Alder Lake thế hệ 12 của Intel. Dưới đây là một mô tả về CPU này:\r\nIntel Core i9-12900K:\r\nSố Lõi/Chạy Đồng Thời (Threads): 16 lõi / 24 threads.\r\nKiến Trúc: Alder Lake.\r\nTần Số Cơ Bản (P-Core): 3.2 GHz.\r\nTần Số Turbo Tối Đa (P-Core): 5.2 GHz.\r\nTần Số Cơ Bản (E-Core): 1.8 GHz.\r\nTần Số Turbo Tối Đa (E-Core): 4.0\r\nBộ Nhớ Cache: 30 MB (24 MB L3 + 5.5 MB L2).\r\nĐồ Họa tích hợp: Intel UHD Graphics 770.\r\nHỗ trợ bộ nhớ: DDR5-8400, DDR4-6400.\r\nTiến Trình Sản Xuất: 10nm SuperFin.\r\nTính Năng Đặc Biệt:\r\nIntel Hyper-Threading: Có (24 threads giúp xử lý đa nhiệm tốt hơn).\r\nIntel Turbo Boost Max Technology 3.0: Có.\r\nIntel SpeedStep: Có.\r\nHỗ trợ PCIe 5.0: Có.\r\nĐồ Họa tích hợp (Intel UHD Graphics 770):\r\nSố Đơn Đồ Họa: 32.\r\nTần Số Đồ Họa Tối Đa: 1.45 GHz.\r\nHỗ trợ Độ Phân Giải Màn Hình: 4096x2304 @ 60Hz.\r\nQuản lý Nhiệt Độ và Năng Lượng:\r\nTDP (Năng Lượng Tổng): 125 Watts.\r\n', 0, '2023-11-29 04:44:33', NULL),
(86, 'CPU Intel Core i3-12100', '17031556751791428236.png', 13, 3500000, 90, 10, 'Mô Tả Chung:\r\nSố Lõi/Chạy Đồng Thời (Threads): Dự kiến là 4 lõi / 8 threads (nếu hỗ trợ Hyper-Threading).\r\nKiến Trúc: Dự kiến sử dụng kiến trúc mới nhất của Intel (có thể là Alder Lake hoặc một thế hệ khác).\r\nTần Số Cơ Bản: Dự kiến là một giá trị xác định, thường từ 3.0 GHz trở lên.\r\nTính Năng Đặc Biệt: Các tính năng như Intel Hyper-Threading (nếu có), Intel Turbo Boost (nếu có), Intel Quick Sync Video, và các tính năng bảo mật của Intel.\r\nĐồ Họa tích hợp: Có thể có hoặc không tùy thuộc vào mô hình cụ thể. Nếu có, có thể sử dụng đồ họa tích hợp Intel UHD hoặc Intel Iris Xe Graphics.\r\nHỗ trợ bộ nhớ: Hỗ trợ bộ nhớ DDR4, tuy nhiên, tốc độ cụ thể sẽ phụ thuộc vào mô hình và kiến trúc.', 0, '2023-11-29 04:47:55', NULL),
(87, 'CPU Intel Core i9-10900 + Quạt', '1703155792386985859.png', 13, 11700000, 10, 0, 'CPU Intel Core i9-10900:\r\nSố Lõi/Chạy Đồng Thời (Threads): 10 lõi / 20 threads.\r\nKiến Trúc: Comet Lake.\r\nTần Số Cơ Bản: 2.8 GHz.\r\nTần Số Turbo Tối Đa: 5.2 GHz.\r\nBộ Nhớ Cache: 20 MB Intel Smart Cache.\r\nHỗ trợ bộ nhớ: DDR4-2933.\r\nTiến Trình Sản Xuất: 14nm.\r\nTính Năng Đặc Biệt:\r\nIntel Hyper-Threading: Có (20 threads giúp xử lý đa nhiệm tốt hơn).\r\nIntel Turbo Boost Max Technology 3.0: Có.\r\nIntel Optane Memory Support: Có.\r\nHỗ trợ PCIe 3.0: Có.\r\nTDP (Năng Lượng Tổng): 65 Watts.\r\nĐồ Họa tích hợp:\r\nIntel UHD Graphics 630.\r\nTần Số Đồ Họa Tối Đa: 1200 MHz.\r\nHỗ trợ Độ Phân Giải Màn Hình: 4096x2304 @ 60Hz.\r\nQuản lý Nhiệt Độ và Năng Lượng:\r\nBộ Tản Nhiệt Đi Kèm: Thường đi kèm với một tản nhiệt khí, nhưng các bản OEM có thể có tản nhiệt khác nhau.', 0, '2023-11-29 04:49:52', NULL),
(88, 'RAM G.SKILL Trident 16G (8Gx2) F4-3000C16D-16GTZR', '1703155935812662712.png', 14, 1950000, 48, 40, 'RAM G.SKILL Trident Z RGB 16GB (8GBx2) DDR4-3000MHz CL16 (F4-3000C16D-16GTZR):\r\nDung Lượng: 16GB (8GBx2).\r\nLoại Bộ Nhớ: DDR4.\r\nTốc Độ: 3000 MHz.\r\nĐộ Trễ: CL16-18-18-38.\r\nĐiện Áp: 1.35V.\r\nKích Thước Module: Standard 288-pin.\r\nRGB Lighting: Có (Trident Z RGB).\r\nXMP 2.0 Support: Có.\r\nThiết Kế Hệ Thống Tản Nhiệt: Có.\r\nMô Tả Chi Tiết:\r\nDung Lượng 16GB (8GBx2): Cung cấp khả năng xử lý đa nhiệm và làm việc với các ứng dụng đòi hỏi nhiều bộ nhớ.\r\nTốc Độ 3000 MHz: Tốc độ này đảm bảo hiệu suất tốt cho nhiều ứng dụng, từ chơi game đến công việc sáng tạo.\r\nĐộ Trễ CL16-18-18-38: Thời gian đáp ứng nhanh chóng giúp tăng cường hiệu suất.\r\nRGB Lighting - Trident Z RGB: Thiết kế với đèn LED RGB có thể tùy chỉnh, tạo điểm nhấn thẩm mỹ và hỗ trợ đồng bộ với các hệ thống ánh sáng RGB khác.\r\nXMP 2.0 Support: Hỗ trợ chế độ XMP giúp dễ dàng cài đặt và đạt được tốc độ định sẵn một cách nhanh chóng.\r\nThiết Kế Hệ Thống Tản Nhiệt: Được thiết kế để giúp duy trì nhiệt độ ổn định trong quá trình hoạt động.', 0, '2023-11-29 04:52:15', NULL),
(89, 'RAM G.SKILL Trident 16G (8Gx2) F4-3000C16D-16GTZR', '17031560421788362593.png', 14, 3450000, 50, 40, 'RAM CORSAIR Dominator Platinum RGB 16GB (8GBx2) DDR4-3200MHz (CMT16GX4M2E3200C16):\r\nDung Lượng: 16GB (8GBx2).\r\nLoại Bộ Nhớ: DDR4.\r\nTốc Độ: 3200 MHz.\r\nĐộ Trễ: CL16-18-18-36.\r\nĐiện Áp: 1.35V.\r\nKích Thước Module: 288-pin DIMM.\r\nRGB Lighting: Có (Dominator Platinum RGB).\r\nXMP 2.0 Support: Có.\r\nAluminum Heat Spreader: Có.\r\n10-Layer PCB: Có.\r\nMô Tả Chi Tiết:\r\nDung Lượng 16GB (8GBx2): Cung cấp khả năng xử lý đa nhiệm và làm việc với các ứng dụng đòi hỏi nhiều bộ nhớ.\r\nTốc Độ 3200 MHz: Tốc độ này đảm bảo hiệu suất tốt cho nhiều ứng dụng, từ chơi game đến công việc sáng tạo.\r\nĐộ Trễ CL16-18-18-36: Thời gian đáp ứng nhanh chóng giúp tăng cường hiệu suất.\r\nĐiện Áp 1.35V: Điện áp thấp giúp giảm tiêu thụ năng lượng và duy trì nhiệt độ ổn định.\r\nRGB Lighting - Dominator Platinum RGB: Thiết kế với đèn LED RGB có thể tùy chỉnh, tạo điểm nhấn thẩm mỹ và hỗ trợ đồng bộ với các hệ thống ánh sáng RGB khác.\r\nXMP 2.0 Support: Hỗ trợ chế độ XMP giúp dễ dàng cài đặt và đạt được tốc độ định sẵn một cách nhanh chóng.\r\nAluminum Heat Spreader: Tản nhiệt bằng nhôm giúp duy trì nhiệt độ ổn định và bảo vệ RAM khỏi quá nhiệt.\r\n10-Layer PCB: Thiết kế PCB 10 lớp giúp cải thiện độ ổn định và hiệu suất của RAM.', 0, '2023-11-29 04:54:02', NULL),
(90, 'RAM Kingston Fury 16 GB-DDR4-3200 MHz (KF432C16BBAK2/16)', '17031561991784063509.png', 14, 1400000, 55, 0, 'RAM Kingston Fury 16GB (8GBx2) DDR4-3200MHz (KF432C16BBAK2/16):\r\nDung Lượng: 16GB (8GBx2).\r\nLoại Bộ Nhớ: DDR4.\r\nTốc Độ: 3200 MHz.\r\nĐộ Trễ: CL16.\r\nĐiện Áp: 1.2V.\r\nKích Thước Module: 288-pin DIMM.\r\nAluminum Heat Spreader: Có.\r\nPlug and Play (PnP): Có.\r\nHỗ Trợ Intel XMP 2.0: Có.\r\nMô Tả Chi Tiết:\r\nDung Lượng 16GB (8GBx2): Cung cấp khả năng xử lý đa nhiệm và làm việc với các ứng dụng đòi hỏi nhiều bộ nhớ.\r\nTốc Độ 3200 MHz: Tốc độ này đảm bảo hiệu suất tốt cho nhiều ứng dụng, từ chơi game đến công việc sáng tạo.\r\nĐộ Trễ CL16: Thời gian đáp ứng nhanh chóng giúp tăng cường hiệu suất.\r\nĐiện Áp 1.2V: Điện áp thấp giúp giảm tiêu thụ năng lượng và duy trì nhiệt độ ổn định.\r\nKích Thước Module 288-pin DIMM: Chuẩn kích thước phổ biến, phù hợp với hầu hết các bo mạch chủ.', 0, '2023-11-29 04:56:15', '2023-12-21 04:56:39'),
(91, 'RAM G.SKILL Trident Z5 32 GB-DDR5-6000 MHz (F5-6000U3636E16GX2-TZ5S)', '17031563281476967847.png', 14, 6000000, 23, 40, 'RAM G.SKILL Trident Z5 32GB (F5-6000U3636E16GX2-TZ5S):\r\nDung Lượng: 32GB (16GBx2).\r\nLoại Bộ Nhớ: DDR5.\r\nTốc Độ: 6000 MHz.\r\nĐộ Trễ: Dự kiến là CL16.\r\nĐiện Áp: Thông thường trong khoảng 1.1V đến 1.6V.\r\nKích Thước Module: 288-pin DIMM.\r\nHeat Spreader: Có, có thể là một thiết kế tản nhiệt hiệu quả.\r\nRGB Lighting: Có, có thể tích hợp đèn LED RGB cho hiệu ứng ánh sáng đa dạng.\r\nHỗ Trợ XMP: Có, để dễ dàng cài đặt và đạt được tốc độ định sẵn.', 0, '2023-11-29 04:58:48', NULL),
(92, 'RAM Laptop Kingston 8GB - DDR5 - 4800MHz (KVR48S40BS6-8)', '17031564381205766325.png', 14, 1000000, 64, 10, 'RAM Laptop Kingston 8GB DDR5-4800MHz (KVR48S40BS6-8):\r\nDung Lượng: 8GB.\r\nLoại Bộ Nhớ: DDR5.\r\nTốc Độ: 4800 MHz.\r\nĐộ Trễ: Thông tin chi tiết về độ trễ chưa được công bố.\r\nĐiện Áp: Thông thường trong khoảng 1.1V đến 1.6V.\r\nKích Thước Module: Thông tin chi tiết về kích thước module chưa được công bố.\r\nHeat Spreader: Thông tin chi tiết về thiết kế tản nhiệt chưa được công bố.\r\nHỗ Trợ XMP: Có thể hỗ trợ các chế độ đặc biệt để tối ưu hóa hiệu suất.', 0, '2023-11-29 05:00:38', NULL),
(93, 'RAM G.SKILL Trident Z5 RGB 64GB 6400MHz DDR5 (32GBx2) (F5-6400J3239G32GX2-TZ5RK)', '1703156573175477873.png', 14, 8000000, 39, 10, 'RAM G.SKILL Trident Z5 RGB 64GB 6400MHz DDR5 (32GBx2) (F5-6400J3239G32GX2-TZ5RK):\r\nDung Lượng: 64GB (32GBx2).\r\nLoại Bộ Nhớ: DDR5.\r\nTốc Độ: 6400 MHz.\r\nĐộ Trễ: Thông tin chi tiết về độ trễ chưa được công bố.\r\nĐiện Áp: Thông thường trong khoảng 1.1V đến 1.6V.\r\nKích Thước Module: 288-pin DIMM.\r\nHeat Spreader: Có, có thể là một thiết kế tản nhiệt hiệu quả.\r\nRGB Lighting: Có, tích hợp đèn LED RGB cho hiệu ứng ánh sáng đa dạng.\r\nHỗ Trợ XMP: Có, để dễ dàng cài đặt và đạt được tốc độ định sẵn.\r\nMô Tả Chi Tiết:\r\nDung Lượng 64GB (32GBx2): Cung cấp khả năng xử lý đa nhiệm và làm việc với các ứng dụng đòi hỏi nhiều bộ nhớ, là lựa chọn lý tưởng cho các hệ thống máy tính hiệu suất cao.\r\nTốc Độ 6400 MHz: Tốc độ này cung cấp hiệu suất đỉnh cao cho các ứng dụng đòi hỏi cao như chơi game và các tác vụ đa nhiệm nặng.\r\nRGB Lighting - Trident Z5 RGB: Thiết kế với đèn LED RGB có thể tùy chỉnh, tạo điểm nhấn thẩm mỹ và hỗ trợ đồng bộ với các hệ thống ánh sáng RGB khác.\r\nKích Thước Module 288-pin DIMM: Chuẩn kích thước phổ biến, phù hợp với hầu hết các bo mạch chủ.\r\nHeat Spreader: Thiết kế tản nhiệt giúp duy trì nhiệt độ ổn định và bảo vệ RAM khỏi quá nhiệt.\r\nHỗ Trợ XMP: Hỗ trợ chế độ XMP giúp dễ dàng cài đặt và đạt được tốc độ định sẵn một cách nhanh chóng.', 0, '2023-11-29 05:02:53', NULL),
(94, 'Card đồ họa Asus TUF RTX4070-O12G Gaming', '1703156791577450604.png', 15, 21000000, 39, 15, 'ASUS TUF RTX 4070-O12G Gaming:\r\nChip đồ họa: Dự kiến sử dụng chip đồ họa NVIDIA GeForce RTX 4070.\r\nDung Lượng VRAM: 12GB GDDR6 hoặc GDDR6X.\r\nKiến Trúc: Dự kiến sử dụng kiến trúc đồ họa NVIDIA Ampere hoặc một thế hệ mới hơn (tùy thuộc vào thời điểm ra mắt).\r\nTốc Độ Nhân GPU: Dự kiến có các chế độ tăng tốc và có thể có tính năng Boost Clock cao.\r\nGiao Tiếp Bộ Nhớ: Giao tiếp bộ nhớ 384-bit (tùy thuộc vào kiến trúc và cấu hình).\r\nCổng Kết Nối: Có thể bao gồm DisplayPort, HDMI, và các cổng xuất âm thanh tùy thuộc vào mô hình cụ thể.\r\nTản Nhiệt: Dự kiến có hệ thống làm mát hiệu quả, có thể là ba quạt hoặc giải pháp tản nhiệt nước (nếu có).\r\nChế Độ RGB Lighting: Có thể có đèn LED RGB có thể tùy chỉnh để phù hợp với hệ thống ánh sáng RGB chung.\r\nTính Năng Đặc Biệt: Hỗ trợ Ray Tracing, DLSS (Deep Learning Super Sampling), NVIDIA Reflex, và các tính năng hiện đại khác của NVIDIA.', 0, '2023-11-29 05:06:31', NULL),
(95, 'Card đồ hoạ Gigabyte N307TGAMING OC-8GD - 8GB GDDR6 - 256 bit', '1703162688504910753.png', 15, 12000000, 25, 20, 'Card Đồ Họa Gigabyte N307TGAMING OC-8GD:\r\nChip Đồ Họa (GPU): NVIDIA GeForce RTX 3070.\r\nDung Lượng VRAM: 8GB GDDR6.\r\nKiến Trúc: Kiến trúc đồ họa NVIDIA Ampere.\r\nGiao Tiếp Bộ Nhớ: 256-bit.\r\nTốc Độ Nhân GPU: Dự kiến có các chế độ tăng tốc và có thể có tính năng Boost Clock cao.\r\nCông Nghệ Đồng Ray Tracing (RT Cores): Có, hỗ trợ kỹ thuật ray tracing để cải thiện chất lượng đồ họa.\r\nTensor Cores (DLSS): Có, hỗ trợ Deep Learning Super Sampling (DLSS) để tăng cường hiệu suất đồ họa.\r\nGiao Tiếp PCIe: PCIe Gen 4.0 (tùy thuộc vào hỗ trợ của bo mạch chủ).\r\nDạng Kích Thước: Dự kiến là dạng card đồ họa full-size (thường là dual-slot hoặc triple-slot).\r\nTản Nhiệt: Có thể có hệ thống làm mát tản nhiệt hiệu quả, với quạt đa cấp độ và các tính năng làm mát tiên tiến khác.\r\nChế Độ RGB Lighting: Có thể có đèn LED RGB có thể tùy chỉnh để phù hợp với hệ thống ánh sáng RGB chung.\r\nCổng Kết Nối: Bao gồm các cổng như DisplayPort, HDMI, và có thể có các cổng kết nối khác tùy thuộc vào mô hình cụ thể.\r\nCổng Nguồn: Yêu cầu nguồn điện từ nguồn cung cấp năng lượng có đủ công suất, thường là từ 600W trở lên.\r\nHỗ Trợ HDCP: Có, để bảo vệ nội dung video cao cấp.\r\nHỗ Trợ NVIDIA Ansel, NVIDIA G-SYNC, và NVIDIA GPU Boost.', 0, '2023-11-29 06:44:48', NULL),
(96, 'Card đồ hoạ Gigabyte N3060VISION OC-12GD - 12GB GDDR6 - 192 bit', '1703162787351675815.png', 15, 15000000, 53, 80, 'Card Đồ Họa Gigabyte N3060VISION OC-12GD:\r\nChip Đồ Họa (GPU): Dự kiến là NVIDIA GeForce RTX 3060 (hoặc có thể là một phiên bản mới của GPU).\r\nDung Lượng VRAM: 12GB GDDR6.\r\nKiến Trúc: Dự kiến sử dụng kiến trúc đồ họa NVIDIA Turing hoặc kiến trúc mới hơn (tùy thuộc vào thời điểm ra mắt).\r\nGiao Tiếp Bộ Nhớ: 192-bit.\r\nTốc Độ Nhân GPU: Dự kiến có các chế độ tăng tốc và có thể có tính năng Boost Clock cao.\r\nCông Nghệ Đồng Ray Tracing (RT Cores): Có, hỗ trợ kỹ thuật ray tracing để cải thiện chất lượng đồ họa.\r\nTensor Cores (DLSS): Có, hỗ trợ Deep Learning Super Sampling (DLSS) để tăng cường hiệu suất đồ họa.\r\nGiao Tiếp PCIe: PCIe Gen 4.0 (tùy thuộc vào hỗ trợ của bo mạch chủ).\r\nDạng Kích Thước: Dự kiến là dạng card đồ họa full-size (thường là dual-slot hoặc triple-slot).\r\nTản Nhiệt: Có thể có hệ thống làm mát tản nhiệt hiệu quả, với quạt đa cấp độ và các tính năng làm mát tiên tiến khác.\r\nChế Độ RGB Lighting: Có thể có đèn LED RGB có thể tùy chỉnh để phù hợp với hệ thống ánh sáng RGB chung.\r\nCổng Kết Nối: Bao gồm các cổng như DisplayPort, HDMI, và có thể có các cổng kết nối khác tùy thuộc vào mô hình cụ thể.\r\nCổng Nguồn: Yêu cầu nguồn điện từ nguồn cung cấp năng lượng có đủ công suất, thường là từ 600W trở lên.\r\nHỗ Trợ HDCP: Có, để bảo vệ nội dung video cao cấp.\r\nHỗ Trợ NVIDIA Ansel, NVIDIA G-SYNC, và NVIDIA GPU Boost.', 0, '2023-11-29 06:46:27', NULL),
(97, 'Card đồ hoạ MSI N730K-2GD3H/LPV1', '1703162923142162099.png', 15, 2500000, 53, 50, 'Card Đồ Họa MSI N730K-2GD3H/LPV1:\r\nChip Đồ Họa (GPU): Dự kiến là một biến thể của GPU NVIDIA GeForce GT 730 (hoặc tương tự).\r\nDung Lượng VRAM: 2GB GDDR3.\r\nKiến Trúc: Dự kiến là một kiến trúc thấp cấp, phù hợp cho các ứng dụng văn phòng và giải trí cơ bản.\r\nGiao Tiếp Bộ Nhớ: 128-bit (dựa trên các phiên bản trước đó của GT 730).\r\nTốc Độ Nhân GPU: Dự kiến là tốc độ cơ bản, không có tính năng tăng tốc độ cao.\r\nDạng Kích Thước: Thường là dạng card đồ họa low-profile, phù hợp cho các hệ thống nhỏ gọn.\r\nTản Nhiệt: Có thể có một tản nhiệt tản nhiệt đơn giản hoặc một quạt tản nhiệt để duy trì nhiệt độ ổn định.\r\nCổng Kết Nối: Bao gồm các cổng như VGA, DVI, HDMI (tùy thuộc vào phiên bản cụ thể).\r\nCổng Nguồn: Có thể cần một cổng nguồn PCIe x16 để cấp nguồn điện cho card đồ họa.\r\nHỗ Trợ HDCP: Có thể hỗ trợ HDCP để phát lại nội dung bảo mật cao cấp.\r\nHiệu Suất: Dành cho các công việc văn phòng cơ bản và giải trí nhẹ, không phải là card đồ họa chuyên dụng cho gaming hoặc công việc đòi hỏi nhiều tài nguyên đồ họa.', 0, '2023-11-29 06:48:43', NULL),
(98, 'Card đồ hoạ MSI RX 6600 MECH 2X 8G - 8GB GDDR6 - 128 bit ', '1703163044735028381.png', 15, 6200000, 50, 40, 'Card Đồ Họa MSI RX 6600 MECH 2X 8G:\r\nChip Đồ Họa (GPU): AMD Radeon RX 6600.\r\nDung Lượng VRAM: 8GB GDDR6.\r\nKiến Trúc: Kiến trúc AMD RDNA 2.\r\nGiao Tiếp Bộ Nhớ: 128-bit.\r\nTốc Độ Nhân GPU: Dự kiến có các chế độ tăng tốc và có thể có tính năng Boost Clock cao.\r\nCông Nghệ Ray Tracing: Có, hỗ trợ kỹ thuật ray tracing để cải thiện chất lượng đồ họa.\r\nTensor Cores (FidelityFX Super Resolution - FSR): Có, hỗ trợ FSR để tăng cường hiệu suất đồ họa.\r\nGiao Tiếp PCIe: PCIe Gen 4.0 (tùy thuộc vào hỗ trợ của bo mạch chủ).\r\nDạng Kích Thước: Thường là dạng card đồ họa dual-slot.\r\nTản Nhiệt: Có thể có hệ thống làm mát tản nhiệt hiệu quả, với quạt đa cấp độ và các tính năng làm mát tiên tiến khác.\r\nChế Độ RGB Lighting: Có thể có đèn LED RGB có thể tùy chỉnh để phù hợp với hệ thống ánh sáng RGB chung.\r\nCổng Kết Nối: Bao gồm các cổng như DisplayPort, HDMI, và có thể có các cổng kết nối khác tùy thuộc vào mô hình cụ thể.\r\nCổng Nguồn: Yêu cầu nguồn điện từ nguồn cung cấp năng lượng có đủ công suất, thường là từ 500W trở lên.\r\nHỗ Trợ HDCP: Có, để bảo vệ nội dung video cao cấp.\r\nHỗ Trợ AMD FreeSync: Có, để đảm bảo trải nghiệm gaming mượt mà và không bị tearing.', 0, '2023-11-29 06:50:44', NULL),
(99, 'Card đồ họa Asus DUAL RX 6600XT O8G', '1703163141687993787.png', 15, 9500000, 26, 60, 'Card Đồ Họa ASUS DUAL RX 6600XT O8G:\r\nChip Đồ Họa (GPU): AMD Radeon RX 6600 XT.\r\nDung Lượng VRAM: 8GB GDDR6.\r\nKiến Trúc: Kiến trúc AMD RDNA 2.\r\nGiao Tiếp Bộ Nhớ: 128-bit.\r\nTốc Độ Nhân GPU: Có các chế độ tăng tốc và có thể có tính năng Boost Clock cao.\r\nCông Nghệ Ray Tracing: Có, hỗ trợ kỹ thuật ray tracing để cải thiện chất lượng đồ họa.\r\nTensor Cores (FidelityFX Super Resolution - FSR): Có, hỗ trợ FSR để tăng cường hiệu suất đồ họa.\r\nGiao Tiếp PCIe: PCIe Gen 4.0 (tùy thuộc vào hỗ trợ của bo mạch chủ).\r\nDạng Kích Thước: Dạng card đồ họa dual-slot hoặc triple-slot, tùy thuộc vào thiết kế cụ thể.\r\nTản Nhiệt: Có thể có hệ thống làm mát tản nhiệt hiệu quả, với quạt đa cấp độ và các tính năng làm mát tiên tiến khác.\r\nChế Độ RGB Lighting: Có thể có đèn LED RGB có thể tùy chỉnh để phù hợp với hệ thống ánh sáng RGB chung.\r\nCổng Kết Nối: Bao gồm các cổng như DisplayPort, HDMI, và có thể có các cổng kết nối khác tùy thuộc vào mô hình cụ thể.\r\nCổng Nguồn: Yêu cầu nguồn điện từ nguồn cung cấp năng lượng có đủ công suất, thường là từ 500W trở lên.\r\nHỗ Trợ HDCP: Có, để bảo vệ nội dung video cao cấp.\r\nHỗ Trợ AMD FreeSync: Có, để đảm bảo trải nghiệm gaming mượt mà và không bị tearing.', 0, '2023-11-29 06:52:21', NULL),
(100, 'Quạt tản nhiệt LED Xigmatek STARZ X20A Arctic ( White ARGB x3)', '17031632851070894181.png', 16, 550000, 12, 60, 'Quạt Tản Nhiệt LED Xigmatek STARZ X20A Arctic (White ARGB x3):\r\nKích Thước: Dự kiến sử dụng kích thước chuẩn của quạt tản nhiệt, thường là 120mm hoặc 140mm.\r\nMàu Sắc: Mô hình được mô tả với màu trắng (Arctic White) và có đèn LED RGB có thể điều chỉnh (ARGB).\r\nChế Độ RGB Lighting: Có thể hỗ trợ đèn LED có thể tùy chỉnh với nhiều màu sắc và hiệu ứng ánh sáng khác nhau.\r\nCông Suất: Thông tin về công suất hoạt động của quạt và áp lực gió không được cung cấp.\r\nTốc Độ Quay: Dự kiến có khả năng điều chỉnh tốc độ quay thông qua các chế độ hoạt động khác nhau để đảm bảo cân bằng giữa hiệu suất làm mát và âm thanh.\r\nChất Liệu và Thiết Kế: Có thể sử dụng lược dẫn gió và cánh quạt thiết kế để tối ưu hóa luồng không khí và làm mát.\r\nCổng Kết Nối: Thường có cổng kết nối thông dụng như 3-pin hoặc 4-pin để kết nối với bo mạch chủ và điều khiển qua phần mềm.\r\nTính Năng Thêm: Có thể có các tính năng bảo vệ như chống rung và chống nước để tăng độ bền và tin cậy.', 0, '2023-11-29 06:54:45', NULL),
(101, 'Tản nhiệt khí cho CPU Deepcool Gammaxx GTE V2 ', '1703163399819237846.png', 16, 550000, 45, 0, 'Tản Nhiệt Khí cho CPU Deepcool Gammaxx GTE V2:\r\nKích Thước và Thiết Kế:\r\nKích thước lớn với cảm nhận lực mạnh mẽ để tản nhiệt hiệu quả.\r\nThiết kế tản nhiệt làm từ các vật liệu chất lượng cao để đảm bảo độ bền và hiệu suất tối ưu.\r\nQuạt Tản Nhiệt:\r\nBao gồm một hoặc nhiều quạt tản nhiệt với kích thước lớn (thường là 120mm hoặc 140mm).\r\nQuạt thường có thiết kế cánh quạt đặc biệt để tối ưu hóa luồng không khí và giảm tiếng ồn.\r\nTự Động Điều Chỉnh Tốc Độ Quạt:\r\nCó thể hỗ trợ chức năng PWM (Pulse Width Modulation) để tự động điều chỉnh tốc độ quạt dựa trên nhiệt độ CPU.\r\nCơ Sở Đầu Tiên và Cao Cấp:\r\nCó thể có cơ sở đầu tiên cảm ứng và cơ sở cao cấp giúp tản nhiệt tốt hơn và tăng tính ổn định của hệ thống.\r\nỐng Nhiệt Đồng:\r\nSử dụng ống nhiệt đồng với thiết kế đa lớp để tăng cường khả năng tản nhiệt.\r\nỨng Dụng Cho Nhiều CPU:\r\nHỗ trợ cho nhiều loại CPU khác nhau, bao gồm cả các dòng CPU mới nhất từ AMD và Intel.\r\nCao Cấp và Hiệu Suất Cao:\r\nThiết kế để đảm bảo hiệu suất làm mát tối ưu trong điều kiện tải công việc nặng.\r\nLED RGB:\r\nCó thể tích hợp đèn LED RGB để tạo điểm nhấn thẩm mỹ và đồng bộ với hệ thống ánh sáng RGB khác.\r\nDễ Lắp Đặt:\r\nThiết kế dễ lắp đặt với hướng dẫn chi tiết và các cổng kết nối chuẩn để kết nối với bo mạch chủ.\r\nChất Lượng và Bền Bỉ:\r\nDeepcool Gammaxx GTE V2 được xây dựng với chất lượng cao để đảm bảo sự ổn định và độ bền lâu dài.', 0, '2023-11-29 06:56:39', NULL),
(102, 'Tản nhiệt khí cho CPU Deepcool AK620 ', '17031635581963453026.png', 16, 2000000, 42, 30, 'Tản Nhiệt Khí Deepcool AK620 (Giả Định):\r\nKích Thước và Thiết Kế:\r\nKích thước lớn với cảm nhận lực mạnh mẽ để tản nhiệt hiệu quả.\r\nThiết kế cản nhiệt làm từ các vật liệu chất lượng cao để đảm bảo độ bền và hiệu suất tối ưu.\r\nQuạt Tản Nhiệt:\r\nBao gồm một hoặc nhiều quạt tản nhiệt, có thể là 120mm hoặc 140mm.\r\nThiết kế cánh quạt đặc biệt để tối ưu hóa luồng không khí và giảm tiếng ồn.\r\nTự Động Điều Chỉnh Tốc Độ Quạt:\r\nHỗ trợ chức năng PWM để tự động điều chỉnh tốc độ quạt dựa trên nhiệt độ CPU.\r\nỐng Nhiệt Đồng:\r\nSử dụng ống nhiệt đồng với thiết kế đa lớp để tăng cường khả năng tản nhiệt.\r\nCao Cấp và Hiệu Suất Cao:\r\nThiết kế để đảm bảo hiệu suất làm mát tối ưu trong điều kiện tải công việc nặng.\r\nĐèn LED RGB (Nếu Có):\r\nCó thể tích hợp đèn LED RGB để tạo điểm nhấn thẩm mỹ và đồng bộ với hệ thống ánh sáng RGB khác.\r\nDễ Lắp Đặt:\r\nThiết kế dễ lắp đặt với hướng dẫn chi tiết và các cổng kết nối chuẩn để kết nối với bo mạch chủ.\r\nChất Lượng và Bền Bỉ:\r\nDeepcool AK620 được xây dựng với chất lượng cao để đảm bảo sự ổn định và độ bền lâu dài.', 0, '2023-11-29 06:59:18', NULL),
(103, 'Tản nhiệt khí CPU Deepcool AG400LED', '17031636771853758020.png', 16, 400000, 32, 10, 'Tản Nhiệt Khí CPU Deepcool AG400LED (Giả Định):\r\nKích Thước và Thiết Kế:\r\nThiết kế tản nhiệt lớn với cảm nhận lực mạnh mẽ để tản nhiệt hiệu quả.\r\nCác lớp tản nhiệt có thể làm từ nhôm hoặc các vật liệu chất lượng cao khác để tăng khả năng tản nhiệt.\r\nQuạt Tản Nhiệt:\r\nBao gồm một hoặc nhiều quạt tản nhiệt, có thể là 120mm hoặc 140mm.\r\nQuạt thường có thiết kế cánh đặc biệt để tối ưu hóa luồng không khí và giảm tiếng ồn.\r\nTự Động Điều Chỉnh Tốc Độ Quạt:\r\nHỗ trợ chức năng PWM để tự động điều chỉnh tốc độ quạt dựa trên nhiệt độ CPU.\r\nỐng Nhiệt Đồng:\r\nSử dụng ống nhiệt đồng với thiết kế đa lớp để tăng cường khả năng tản nhiệt.\r\nLED RGB Lighting:\r\nCó thể tích hợp đèn LED RGB để tạo điểm nhấn thẩm mỹ và đồng bộ với hệ thống ánh sáng RGB khác.\r\nDễ Lắp Đặt:\r\nThiết kế dễ lắp đặt với hướng dẫn chi tiết và các cổng kết nối chuẩn để kết nối với bo mạch chủ.\r\nChất Lượng và Bền Bỉ:\r\nDeepcool AG400LED được xây dựng với chất lượng cao để đảm bảo sự ổn định và độ bền lâu dài.', 0, '2023-11-29 07:01:17', NULL),
(104, 'Tản nhiệt nước AIO Cooler Master ML240L V2 ARGB', '1703163888292346957.png', 16, 2000000, 13, 10, 'Tản Nhiệt Nước AIO Cooler Master ML240L V2 ARGB:\r\nKích Thước Radiator:\r\nML240L V2 có thể đi kèm với một tấm tản nhiệt kích thước 240mm, phù hợp cho nhiều vị trí lắp đặt trong case.\r\nBộ Tản Nhiệt Nước:\r\nSử dụng bộ tản nhiệt nước đóng (All-in-One - AIO) để đơn giản hóa quá trình lắp đặt và giảm áp lực công việc.\r\nBộ Quạt:\r\nCó thể đi kèm với hai quạt 120mm hoặc 140mm, tùy thuộc vào mô hình cụ thể.\r\nQuạt thường có thiết kế cánh quạt đặc biệt để tối ưu hóa luồng không khí và giảm tiếng ồn.\r\nBơi Làm Mát Nước:\r\nSử dụng bơi làm mát nước để truyền nhiệt hiệu quả từ CPU đến radiator và sau đó tản nhiệt qua quạt.\r\nTự Động Điều Chỉnh Tốc Độ Quạt và Bơi Làm Mát Nước:\r\nHỗ trợ chức năng PWM để tự động điều chỉnh tốc độ quạt và bơi làm mát nước dựa trên nhiệt độ CPU.\r\nĐèn LED RGB ARGB:\r\nTản nhiệt được trang bị đèn LED RGB Addressable (ARGB) để tạo điểm nhấn thẩm mỹ và đồng bộ với hệ thống ánh sáng RGB khác.\r\nBộ Kiểm Soát LED và Quạt:\r\nCó thể có bộ điều khiển LED ARGB để tùy chỉnh màu sắc và hiệu ứng ánh sáng của đèn LED và quạt.\r\nPhần Mềm Điều Khiển:\r\nCó thể hỗ trợ phần mềm của Cooler Master để điều chỉnh các cài đặt ánh sáng và tốc độ quạt thông qua giao diện đồ họa người dùng.\r\nỐng Dẫn Nước Linh Hoạt:\r\nSử dụng ống dẫn nước linh hoạt để tạo ra các kết nối tản nhiệt đa dạng và dễ dàng lắp đặt.\r\nTương Thích CPU:\r\nTương thích với nhiều loại CPU từ cả AMD và Intel, bao gồm cả các dòng CPU mới nhất.\r\nDễ Lắp Đặt:\r\nThiết kế dễ lắp đặt với hướng dẫn chi tiết và các cổng kết nối chuẩn để kết nối với bo mạch chủ.', 0, '2023-11-29 07:04:48', NULL),
(105, '', '170316400110297600.png', 16, 600000, 18, 20, 'Tản Nhiệt Khí Xigmatek AIR KILLER S ARCTIC (Giả Định):\r\nKích Thước và Thiết\r\nThiết kế nhỏ gọn với kích thước tối ưu để phù hợp với nhiều loại case.\r\nThiết kế tản nhiệt hiện đại với cảm nhận lực mạnh mẽ để tản nhiệt hiệu quả.\r\nQuạt Tản Nhiệt:\r\nCó thể đi kèm với một hoặc nhiều quạt tản nhiệt, có thể là 120mm hoặc 140mm.\r\nThiết kế cánh quạt để tối ưu hóa luồng không khí và giảm tiếng ồn.\r\nTản Nhiệt:\r\nSử dụng các lớp tản nhiệt được làm từ nhôm hoặc các vật liệu chất lượng cao để tăng khả năng tản nhiệt.\r\nTự Động Điều Chỉnh Tốc Độ Quạt:\r\nHỗ trợ chức năng PWM để tự động điều chỉnh tốc độ quạt dựa trên nhiệt độ CPU.\r\nLED RGB Lighting (Nếu Có):\r\nCó thể đi kèm với đèn LED RGB để tạo điểm nhấn thẩm mỹ và đồng bộ với hệ thống ánh sáng RGB khác.\r\nTương Thích CPU:\r\nTương thích với nhiều loại CPU từ cả AMD và Intel, bao gồm cả các dòng CPU mới nhất.\r\nDễ Lắp Đặt:\r\nThiết kế dễ lắp đặt với hướng dẫn chi tiết và các cổng kết nối chuẩn để kết nối với bo mạch chủ.', 0, '2023-11-29 07:06:41', NULL),
(106, 'Ổ Đĩa Quang Asus DVD-E818A9T/BLK/B/AS Tray', '1703164168329397092.png', 17, 350000, 28, 20, 'Ổ Đĩa Quang Asus DVD-E818A9T/BLK/B/AS Tray:\r\nKiểu Đĩa:\r\nỔ đĩa quang DVD-ROM hoặc DVD-RW, dùng để đọc và ghi đĩa DVD.\r\nGiao Tiếp:\r\nSử dụng giao tiếp SATA hoặc SATA III để kết nối với bo mạch chủ.\r\nTốc Độ Đọc và Ghi:\r\nHỗ trợ tốc độ đọc và ghi đĩa DVD với các tốc độ khác nhau tùy thuộc vào mô hình cụ thể.\r\nDạng Kích Thước:\r\nDạng ổ đĩa quang 5.25 inch, phổ biến và phù hợp với nhiều loại case máy tính.\r\nChế Độ Đọc Tốc Độ Cao:\r\nCó thể hỗ trợ chế độ đọc nhanh để tối ưu hóa thời gian truy cập dữ liệu từ đĩa.\r\nĐèn LED:\r\nCó thể có đèn LED hoặc đèn chỉ thị để hiển thị trạng thái hoạt động của ổ đĩa.\r\nNút Bấm Điều Khiển:\r\nCó nút bấm hoặc cổng điều khiển để mở và đóng khay đĩa.\r\nCài Đặt Dễ Dàng:\r\nThiết kế dễ cài đặt với ổ gắn chuẩn 5.25 inch và cổng kết nối SATA chuẩn.\r\nHỗ Trợ Hệ Điều Hành:\r\nTương thích với nhiều hệ điều hành khác nhau như Windows, Linux, và có thể MacOS tùy thuộc vào thông số kỹ thuật cụ thể.\r\nChức Năng Đặc Biệt (Nếu Có):\r\nCó thể hỗ trợ các tính năng đặc biệt như chống rung, chống sốc, hay chức năng tự điều chỉnh tốc độ quay để giảm tiếng ồn.', 0, '2023-11-29 07:09:28', NULL),
(107, 'Ổ Đĩa Quang Asus DRW-24D5MT/BLK/B/AS/P2G', '1703164282849764883.png', 17, 550000, 36, 30, 'Ổ Đĩa Quang Asus DRW-24D5MT/BLK/B/AS/P2G:\r\nKiểu Đĩa:\r\nỔ đĩa quang DVD-RW, có khả năng đọc và ghi đĩa DVD.\r\nGiao Tiếp:\r\nKết nối với bo mạch chủ thông qua cổng SATA hoặc SATA III.\r\nTốc Độ Đọc và Ghi:\r\nHỗ trợ tốc độ đọc và ghi đĩa DVD ở nhiều tốc độ khác nhau, tùy thuộc vào mô hình cụ thể.\r\nDạng Kích Thước:\r\nDạng ổ đĩa quang 5.25 inch, phổ biến trong nhiều loại case máy tính.\r\nChức Năng Chống Rung và Chống Sốc:\r\nCó thể đi kèm với các chức năng chống rung và chống sốc để tăng khả năng ổn định và bảo vệ đĩa.\r\nChức Năng Ghi Nhanh (Nếu Có):\r\nHỗ trợ chức năng ghi nhanh để giảm thời gian ghi đĩa.\r\nĐèn LED Chỉ Thị Trạng Thái:\r\nCó thể có đèn LED hoặc đèn chỉ thị để hiển thị trạng thái hoạt động của ổ đĩa.\r\nChức Năng Đặc Biệt (Nếu Có):\r\nCó thể tích hợp các chức năng đặc biệt như chức năng chống xước, chức năng tiết kiệm năng lượng, hoặc chức năng tự điều chỉnh tốc độ quay.\r\nHỗ Trợ Hệ Điều Hành:\r\nTương thích với nhiều hệ điều hành khác nhau như Windows, Linux, và có thể MacOS tùy thuộc vào thông số kỹ thuật cụ thể.\r\nPhần Mềm Đính Kèm (P2G):\r\nCó thể đi kèm với phần mềm Power2Go (P2G) của Asus để hỗ trợ quá trình ghi đĩa và quản lý nội dung đa phương tiện.', 0, '2023-11-29 07:11:22', NULL),
(108, 'Tai nghe choàng đầu có mic Gaming Soundmax AH335', '17031644211023103537.png', 18, 520000, 89, 0, 'Tai Nghe Gaming Soundmax AH335 (Giả Định):\r\nKiểu Thiết Kế:\r\nTai nghe có thiết kế đeo đầu, phù hợp cho việc sử dụng trong thời gian dài và đảm bảo thoải mái.\r\nÂm Thanh Chất Lượng Cao:\r\nCông nghệ âm thanh cao cấp để mang đến trải nghiệm chơi game sống động và chất lượng.\r\nMicró Có Điều Chỉnh:\r\nMicró tích hợp có thể điều chỉnh được để thuận tiện trong việc trò chuyện và gọi thoại trong khi chơi game.\r\nKiểm Soát Âm Lượng và Tắt/Bật Mic:\r\nNút điều chỉnh âm lượng và nút tắt/bật mic tích hợp trên dây cáp để dễ dàng điều chỉnh.\r\nĐèn LED (Nếu Có):\r\nCó thể có đèn LED trang trí hoặc ánh sáng nền để tạo điểm nhấn thẩm mỹ.\r\nTương Thích Đa Nền Tảng:\r\nTương thích với nhiều nền tảng gaming khác nhau như PC, console, và thiết bị di động.\r\nTai Nghe Đóng:\r\nThiết kế tai nghe đóng giúp cách âm tốt, tạo ra không gian riêng tư khi sử dụng.\r\nChất Liệu Chất Lượng:\r\nSử dụng vật liệu chất lượng cao để đảm bảo độ bền và thoải mái.\r\nDây Cáp Chống Nút:\r\nDây cáp chống nút giúp tránh rối dây và gia tăng độ bền.\r\nỨng Dụng Đa Mục Đích:\r\nPhù hợp không chỉ cho chơi game mà còn để nghe nhạc, xem phim và thực hiện cuộc gọi.', 0, '2023-11-29 07:13:41', NULL),
(109, 'Tai nghe gaming Corsair HS35 Stereo', '17031645531656223753.png', 18, 900000, 7, 10, 'Tai Nghe Gaming Corsair HS35 Stereo:\r\nKiểu Thiết Kế:\r\nTai nghe chụp đầu với thiết kế nhẹ và thoải mái, có tai nghe đóng đảm bảo cách âm tốt.\r\nÂm Thanh Stereo Chất Lượng Cao:\r\nCung cấp âm thanh stereo chất lượng cao, mang lại trải nghiệm chơi game sống động.\r\nMicró Unidirectional:\r\nMicró unidirectional có khả năng lọc tiếng ồn xung quanh, giúp truyền tải âm thanh chất lượng trong khi giảm tiếng ồn không mong muốn.\r\nKiểm Soát Trên Dây Cáp:\r\nNút điều chỉnh âm lượng và nút tắt/bật mic tích hợp trên dây cáp giúp dễ dàng điều chỉnh cũng như kiểm soát mic.\r\nKiểm Soát Tiếng Lớn Nhỏ:\r\nNút điều chỉnh âm lượng trên tai nghe cho phép điều chỉnh tiện lợi.\r\nĐệm Tai và Đệm Đầu Có Thể Tháo Rời:\r\nĐệm tai và đệm đầu có thể tháo rời giúp dễ dàng vệ sinh và bảo trì.\r\nChất Liệu Bền Bỉ:\r\nSử dụng chất liệu chất lượng cao để đảm bảo độ bền và thoải mái trong thời gian dài sử dụng.\r\nTai Nghe Gập Gọn:\r\nCó thể gập gọn để thuận tiện mang theo khi di chuyển.\r\nTương Thích Đa Nền Tảng:\r\nTương thích với nhiều nền tảng gaming như PC, console, và thiết bị di động.\r\nPhong Cách Thể Thao:\r\nThiết kế thể thao, hiện đại và có thể có nhiều tùy chọn màu sắc để phản ánh phong cách cá nhân.\r\nSử Dụng Trong Nhiều Mục Đích:\r\nPhù hợp không chỉ cho chơi game mà còn để nghe nhạc, xem phim và thực hiện cuộc gọi.\r\nDây Cáp Bền:\r\nDây cáp chống nút và chất lượng cao, giúp tránh rối dây và gia tăng độ bền.', 0, '2023-11-29 07:15:53', NULL),
(112, 'Tai nghe HyperX Cloud Alpha ', '1703164725832391950.png', 18, 2100000, 57, 51, 'Tai Nghe HyperX Cloud Alpha:\r\nKiểu Thiết Kế:\r\nTai nghe over-ear (chụp đầu) với thiết kế circumaural giúp đóng đảm bảo cách âm tốt.\r\nÂm Thanh Hiệu Quả:\r\nCông nghệ âm thanh kép (dual-chamber) giúp tách biệt âm bass và âm treble, mang lại trải nghiệm âm thanh chất lượng cao.\r\nCủ Loa Động 50mm:\r\nCủ loa động lớn 50mm cho âm thanh mạnh mẽ và chi tiết.\r\nTai Nghe Đóng Đảm Bảo Cách Âm:\r\nĐệm tai và thiết kế đóng đảm bảo cách âm tốt, giúp tập trung vào trải nghiệm âm thanh.\r\nMicró Có Khả Năng Điều Chỉnh:\r\nMicró có khả năng điều chỉnh và có chức năng lọc tiếng ồn, giúp truyền tải âm thanh rõ ràng trong khi giảm tiếng ồn xung quanh.\r\nKhung Cấu Trúc Bền Bỉ:\r\nKhung cấu trúc bền bỉ được làm từ nhôm, giảm trọng lượng nhưng vẫn đảm bảo độ bền.\r\nĐệm Tai và Đệm Đầu Có Thể Tháo Rời:\r\nĐệm tai và đệm đầu có thể tháo rời để dễ dàng vệ sinh và bảo trì.\r\nKiểm Soát Trên Dây Cáp:\r\nNút điều chỉnh âm lượng và nút tắt/bật mic tích hợp trên dây cáp giúp dễ dàng điều chỉnh.\r\nTương Thích Đa Nền Tảng:\r\nTương thích với nhiều nền tảng gaming như PC, console, và thiết bị di động.\r\nĐèn LED (Nếu Có):\r\nCó thể có đèn LED trang trí để tạo điểm nhấn thẩm mỹ.\r\nDây Cáp Chống Nút:\r\nDây cáp chống nút giúp tránh rối dây và gia tăng độ bền.\r\nPhần Mềm Điều Khiển (Nếu Có):\r\nPhần mềm điều khiển âm thanh để tùy chỉnh cài đặt và trải nghiệm âm thanh.\r\nSử Dụng Trong Nhiều Mục Đích:\r\nPhù hợp không chỉ cho chơi game mà còn để nghe nhạc, xem phim và thực hiện cuộc gọi.', 0, '2023-11-29 07:18:45', NULL),
(113, 'Tai nghe truyền dẫn xương Klatre LS1', '1703164854546181668.png', 18, 3000000, 80, 41, 'Tai Nghe Truyền Dẫn Xương Klatre LS1 (Giả Định):\r\nKiểu Thiết Kế:\r\nTai nghe truyền dẫn xương thường có thiết kế nằm ngoài tai thay vì che phủ đầu và tai.\r\nTruyền Dẫn Âm Thanh Qua Xương:\r\nSử dụng công nghệ truyền dẫn âm thanh qua xương để truyền âm thanh trực tiếp vào xương sọ, giúp tai người nghe vẫn giữ mở để nghe môi trường xung quanh.\r\nKhả Năng An Toàn:\r\nĐiểm mạnh của tai nghe truyền dẫn xương là giữ tai mở, giúp người nghe có thể cảm nhận âm thanh từ môi trường xung quanh, làm tăng an toàn khi di chuyển.\r\nThiết Kế Nhẹ và Thuận Tiện:\r\nTai nghe thường có thiết kế nhẹ và thoải mái, thuận tiện cho việc sử dụng trong các hoạt động ngoại ô như tập thể dục, chạy bộ, hay đạp xe.\r\nKhả Năng Chống Nước (Nếu Có):\r\nMột số tai nghe truyền dẫn xương có khả năng chống nước, làm tăng tính ứng dụng trong các hoạt động ngoại ô dưới điều kiện thời tiết khắc nghiệt.\r\nMicró tích hợp (Nếu Có):\r\nCó thể có micró tích hợp để thuận tiện trong việc thực hiện cuộc gọi hoặc sử dụng trò chơi trực tuyến.\r\nKết Nối Không Dây (Bluetooth):\r\nTai nghe có thể kết nối không dây thông qua Bluetooth để giảm rối dây và tăng tính linh hoạt.\r\nPin Durable:\r\nPin có thể thiết kế để đảm bảo thời lượng sử dụng lâu dài, đủ cho các hoạt động dài hạn.\r\nĐiều Khiển Trên Dây (Nếu Có):\r\nNút điều khiển trên dây có thể cho phép điều chỉnh âm lượng, chuyển bài, và tắt/bật micró.', 0, '2023-11-29 07:20:54', NULL),
(114, 'Tai nghe Corsair HS50 PRO Stereo ', '1703165110925701740.png', 18, 1278000, 76, 0, 'Tai Nghe Corsair HS50 PRO Stereo:\r\nKiểu Thiết Kế:\r\nTai nghe over-ear (chụp đầu) với thiết kế circumaural để che phủ tai, cung cấp trải nghiệm âm thanh chất lượng và thoải mái.\r\nÂm Thanh Stereo Chất Lượng Cao:\r\nCung cấp âm thanh stereo chất lượng cao, thích hợp cho chơi game, nghe nhạc, và xem phim.\r\nCủ Loa Động 50mm:\r\nSử dụng củ loa động lớn 50mm để mang lại âm thanh mạnh mẽ và chi tiết.\r\nMicró Unidirectional Điều Chỉnh:\r\nMicró unidirectional có khả năng điều chỉnh, giúp giảm tiếng ồn xung quanh và tập trung thu âm từ hướng người dùng.\r\nĐiều Khiển Trên Dây Cáp:\r\nNút điều chỉnh âm lượng và nút tắt/bật mic tích hợp trên dây cáp giúp dễ dàng điều chỉnh.\r\nTai Nghe Đóng Đảm Bảo Cách Âm:\r\nĐệm tai và thiết kế đóng đảm bảo cách âm tốt, giúp tập trung vào trải nghiệm âm thanh.\r\nKhung Cấu Trúc Nhẹ và Bền Bỉ:\r\nKhung cấu trúc nhẹ với chất liệu bền bỉ để đảm bảo thoải mái trong thời gian dài sử dụng.\r\nĐệm Tai và Đệm Đầu Có Thể Tháo Rời:\r\nĐệm tai và đệm đầu có thể tháo rời giúp dễ dàng vệ sinh và bảo trì.\r\nKết Nối 3.5mm Đa Năng:\r\nKết nối 3.5mm phổ biến, tương thích với nhiều thiết bị như PC, console, điện thoại di động, và máy tính bảng.\r\nTương Thích Đa Nền Tảng:\r\nTương thích với nhiều nền tảng gaming như PC, Xbox, PlayStation và các thiết bị di động khác.\r\nThiết Kế Đơn Giản và Hiện Đại:\r\nThiết kế trang nhã và hiện đại, thích hợp với nhiều phong cách sử dụng.\r\nDây Cáp Chống Nút:\r\nDây cáp chống nút giúp tránh rối dây và gia tăng độ bền.', 0, '2023-11-29 07:25:10', NULL),
(115, ' Tai nghe Corsair HS60 PRO Surround', '17031653831461319902.png', 18, 2000000, 35, 40, 'Tai Nghe Corsair HS60 PRO Surround:\r\nKiểu Thiết Kế:\r\nTai nghe over-ear (chụp đầu) với thiết kế circumaural để che phủ tai, mang lại trải nghiệm âm thanh chất lượng và thoải mái.\r\nÂm Thanh Surround 7.1:\r\nHỗ trợ âm thanh surround 7.1, tăng cường trải nghiệm chơi game và giải trí đa phương tiện.\r\nCủ Loa Động 50mm:\r\nSử dụng củ loa động lớn 50mm để mang lại âm thanh mạnh mẽ và chi tiết.\r\nMicró Unidirectional Điều Chỉnh:\r\nMicró unidirectional có khả năng điều chỉnh, giúp giảm tiếng ồn xung quanh và tập trung thu âm từ hướng người dùng.\r\nĐiều Khiển Trên Dây Cáp:\r\nNút điều chỉnh âm lượng và nút tắt/bật mic tích hợp trên dây cáp giúp dễ dàng điều chỉnh.\r\nTai Nghe Đóng Đảm Bảo Cách Âm:\r\nĐệm tai và thiết kế đóng đảm bảo cách âm tốt, giúp tập trung vào trải nghiệm âm thanh.\r\nKhung Cấu Trúc Nhẹ và Bền Bỉ:\r\nKhung cấu trúc nhẹ với chất liệu bền bỉ để đảm bảo thoải mái trong thời gian dài sử dụng.\r\nĐệm Tai và Đệm Đầu Có Thể Tháo Rời:\r\nĐệm tai và đệm đầu có thể tháo rời giúp dễ dàng vệ sinh và bảo trì.\r\nKết Nối USB:\r\nKết nối USB cho âm thanh chất lượng cao và tương thích với nhiều thiết bị.\r\nTương Thích Đa Nền Tảng:\r\nTương thích với nhiều nền tảng gaming như PC, Xbox, PlayStation và các thiết bị di động khác.\r\nThiết Kế Đơn Giản và Hiện Đại:\r\nThiết kế trang nhã và hiện đại, thích hợp với nhiều phong cách sử dụng.\r\nDây Cáp Chống Nút:\r\nDây cáp chống nút giúp tránh rối dây và gia tăng độ bền.', 0, '2023-11-29 07:29:43', NULL),
(116, 'Chuột Gaming Asus CERBERUS', '17031655351963212718.png', 20, 550000, 66, 60, 'Chuột Gaming Asus CERBERUS:\r\nThiết Kế Ergonomic:\r\nThiết kế ergonomics giúp chuột ôm vừa tay, tạo cảm giác thoải mái trong thời gian sử dụng dài hạn.\r\nCảm Biến Chất Lượng Cao:\r\nSử dụng cảm biến chất lượng cao để đảm bảo độ chính xác và đáng tin cậy trong các tình huống gaming.\r\nĐộ Phân Giải Điều Chỉnh:\r\nCó thể điều chỉnh độ phân giải của chuột để phù hợp với sở thích và nhu cầu sử dụng cụ thể.\r\nNút Bấm Ergonomic và Độ Bền:\r\nNút bấm được thiết kế với kiểu dáng ergonomic và có độ bền cao, giúp chịu được lực nhấn lớn và tuổi thọ sử dụng cao.\r\nĐèn LED RGB (Nếu Có):\r\nCó thể có đèn LED RGB để tùy chỉnh ánh sáng và tạo điểm nhấn thẩm mỹ, cũng như đồng bộ với các sản phẩm gaming khác.\r\nCó Nút Điều Chỉnh DPI:\r\nNút điều chỉnh DPI giúp người dùng dễ dàng thay đổi độ nhạy của chuột trong quá trình sử dụng.\r\nChất Liệu Chất Lượng Cao:\r\nSử dụng chất liệu chất lượng cao để đảm bảo độ bền và cảm giác chắc chắn.\r\nChuột Lướt Nhẹ và Mượt:\r\nChân trượt được thiết kế để di chuyển mượt mà trên nhiều bề mặt, cung cấp trải nghiệm chơi game suất sắc.\r\nNút Lặp Tự Động (Auto-Repeat):\r\nCó thể có chế độ nút lặp tự động giúp thực hiện các hành động nhanh chóng trong game.\r\nChế Độ Chống Nghẽn (Anti-Ghosting):\r\nChế độ chống nghẽn giúp đảm bảo mọi lệnh được nhận đúng và chính xác.\r\nNút Điều Hướng và Nút Lật:\r\nNút điều hướng và nút lật giúp dễ dàng chuyển đổi giữa các chế độ và lựa chọn tùy chọn nhanh chóng.\r\nPhần Mềm Tùy Chỉnh (Nếu Có):\r\nCó thể đi kèm với phần mềm tùy chỉnh để điều chỉnh cài đặt và thiết lập chuột theo ý muốn.', 0, '2023-11-29 07:32:15', NULL),
(117, 'Chuột Gaming Zadez G156M', '1703165652446727072.png', 20, 3000000, 10, 20, 'Chuột Gaming Zadez G156M (Giả Định):\r\nThiết Kế Ergonomic:\r\nThiết kế ergonomic để tối ưu hóa thoải mái trong thời gian sử dụng và giảm mệt mỏi.\r\nCảm Biến Chất Lượng Cao:\r\nSử dụng cảm biến chất lượng cao giúp cung cấp độ chính xác và độ nhạy cao trong các tình huống gaming.\r\nNút Bấm Chất Lượng:\r\nNút bấm được thiết kế để có độ nhạy và độ bền cao, phản hồi nhanh chóng trong mọi tình huống.\r\nĐèn LED RGB Đa Dạng (Nếu Có):\r\nCó thể có đèn LED RGB đa dạng để tùy chỉnh và tạo điểm nhấn thẩm mỹ, cũng như đồng bộ với các sản phẩm gaming khác.\r\nCó Nút Điều Chỉnh DPI:\r\nNút điều chỉnh DPI giúp người dùng có thể thay đổi độ nhạy của chuột theo nhu cầu cụ thể.\r\nChất Liệu Chất Lượng:\r\nSử dụng chất liệu chất lượng cao giúp đảm bảo độ bền và cảm giác chắc chắn.\r\nChân Trượt Nhẹ và Mượt:\r\nChân trượt được thiết kế để di chuyển mượt mà trên nhiều bề mặt, mang lại trải nghiệm chơi game tốt.', 0, '2023-11-29 07:34:12', NULL),
(118, 'Chuột Gaming không dây MSI Multi-connect GM41 Lightweight', '17031657781997872072.png', 20, 2000000, 45, 40, 'Chuột Gaming không dây MSI Multi-connect GM41 Lightweight:\r\nThiết Kế Nhẹ và Ergonomic:\r\nThiết kế nhẹ giúp giảm mệt mỏi khi sử dụng trong thời gian dài, cùng với thiết kế ergonomic để ôm vừa tay người dùng.\r\nCảm Biến Gaming Chất Lượng Cao:\r\nSử dụng cảm biến gaming chất lượng cao để đảm bảo độ chính xác và phản hồi nhanh chóng trong các tình huống gaming.\r\nKết Nối Multi-connect:\r\nHỗ trợ kết nối multi-connect, cho phép chuột được kết nối đồng thời với nhiều thiết bị qua nhiều giao thức khác nhau.\r\nNút Bấm Nhẹ và Phản Hồi Tốt:\r\nNút bấm được thiết kế nhẹ nhàng nhưng vẫn đảm bảo phản hồi chính xác và tốt.\r\nĐèn LED RGB Đa Dạng:\r\nĐèn LED RGB đa dạng cho phép tùy chỉnh ánh sáng theo sở thích cá nhân và đồng bộ với các sản phẩm gaming khác.\r\nChế Độ Chống Nghẽn (Anti-Ghosting):\r\nChế độ chống nghẽn giúp đảm bảo mọi lệnh được nhận đúng và chính xác, đặc biệt là trong các tình huống gaming yêu cầu độ chính xác cao.\r\nNút Điều Chỉnh DPI Đa Cấp:\r\nNút điều chỉnh DPI đa cấp giúp người dùng dễ dàng thay đổi độ nhạy của chuột tùy thuộc vào yêu cầu sử dụng cụ thể.\r\nChất Liệu Chất Lượng và Chân Trượt Mượt:\r\nSử dụng chất liệu chất lượng cao để đảm bảo độ bền, cùng với chân trượt mượt mà để di chuyển dễ dàng trên nhiều bề mặt.', 0, '2023-11-29 07:36:18', NULL),
(119, 'Chuột Gaming Logitech G502 Hero High Performance', '1703165870669766959.png', 20, 1600000, 26, 35, 'Chuột Gaming Logitech G502 Hero High Performance\r\nThiết Kế Nhẹ và Ergonomic:\r\nThiết kế nhẹ giúp giảm mệt mỏi khi sử dụng trong thời gian dài, cùng với thiết kế ergonomic để ôm vừa tay người dùng.\r\nCảm Biến Gaming Chất Lượng Cao:\r\nSử dụng cảm biến gaming chất lượng cao để đảm bảo độ chính xác và phản hồi nhanh chóng trong các tình huống gaming.\r\nKết Nối Multi-connect:\r\nHỗ trợ kết nối multi-connect, cho phép chuột được kết nối đồng thời với nhiều thiết bị qua nhiều giao thức khác nhau.\r\nNút Bấm Nhẹ và Phản Hồi Tốt:\r\nNút bấm được thiết kế nhẹ nhàng nhưng vẫn đảm bảo phản hồi chính xác và tốt.\r\nĐèn LED RGB Đa Dạng:\r\nĐèn LED RGB đa dạng cho phép tùy chỉnh ánh sáng theo sở thích cá nhân và đồng bộ với các sản phẩm gaming khác.\r\nChế Độ Chống Nghẽn (Anti-Ghosting):\r\nChế độ chống nghẽn giúp đảm bảo mọi lệnh được nhận đúng và chính xác, đặc biệt là trong các tình huống gaming yêu cầu độ chính xác cao.\r\nNút Điều Chỉnh DPI Đa Cấp:\r\nNút điều chỉnh DPI đa cấp giúp người dùng dễ dàng thay đổi độ nhạy của chuột tùy thuộc vào yêu cầu sử dụng cụ thể.\r\nChất Liệu Chất Lượng và Chân Trượt Mượt:\r\nSử dụng chất liệu chất lượng cao để đảm bảo độ bền, cùng với chân trượt mượt mà để di chuyển dễ dàng trên nhiều bề mặt.', 0, '2023-11-29 07:37:50', NULL),
(120, 'Chuột Gaming Zadez G153M', '17031659781719646838.png', 20, 300000, 49, 15, 'Chuột Gaming Zadez G153M\r\nThiết Kế Nhẹ và Ergonomic:\r\nThiết kế nhẹ giúp giảm mệt mỏi khi sử dụng trong thời gian dài, cùng với thiết kế ergonomic để ôm vừa tay người dùng.\r\nCảm Biến Gaming Chất Lượng Cao:\r\nSử dụng cảm biến gaming chất lượng cao để đảm bảo độ chính xác và phản hồi nhanh chóng trong các tình huống gaming.\r\nKết Nối Multi-connect:\r\nHỗ trợ kết nối multi-connect, cho phép chuột được kết nối đồng thời với nhiều thiết bị qua nhiều giao thức khác nhau.\r\nNút Bấm Nhẹ và Phản Hồi Tốt:\r\nNút bấm được thiết kế nhẹ nhàng nhưng vẫn đảm bảo phản hồi chính xác và tốt.\r\nĐèn LED RGB Đa Dạng:\r\nĐèn LED RGB đa dạng cho phép tùy chỉnh ánh sáng theo sở thích cá nhân và đồng bộ với các sản phẩm gaming khác.\r\nChế Độ Chống Nghẽn (Anti-Ghosting):\r\nChế độ chống nghẽn giúp đảm bảo mọi lệnh được nhận đúng và chính xác, đặc biệt là trong các tình huống gaming yêu cầu độ chính xác cao.\r\nNút Điều Chỉnh DPI Đa Cấp:\r\nNút điều chỉnh DPI đa cấp giúp người dùng dễ dàng thay đổi độ nhạy của chuột tùy thuộc vào yêu cầu sử dụng cụ thể.\r\nChất Liệu Chất Lượng và Chân Trượt Mượt:\r\nSử dụng chất liệu chất lượng cao để đảm bảo độ bền, cùng với chân trượt mượt mà để di chuyển dễ dàng trên nhiều bề mặt.\r\nPin Sử Dụng Lâu Dài:\r\nPin có thể sử dụng lâu dài, giúp giảm tần suất sạc và giữ cho chuột luôn sẵn sàng.\r\nChế Độ Tiết Kiệm Năng Lượng:\r\nCó thể có chế độ tiết kiệm năng lượng để giảm tiêu thụ pin khi không sử dụng.\r\nPhần Mềm Tùy Chỉnh (Nếu Có):\r\nPhần mềm tùy chỉnh giúp người dùng điều chỉnh cài đặt và tùy chỉnh chức năng theo ý muốn.', 0, '2023-11-29 07:39:38', NULL),
(122, 'Chuột gaming Corsair Harpoon RGB PRO', '1703166087139120250.png', 20, 500000, 21, 30, 'Chuột gaming Corsair Harpoon RGB PRO\r\nThiết Kế Nhẹ và Ergonomic:\r\nThiết kế nhẹ giúp giảm mệt mỏi khi sử dụng trong thời gian dài, cùng với thiết kế ergonomic để ôm vừa tay người dùng.\r\nCảm Biến Gaming Chất Lượng Cao:\r\nSử dụng cảm biến gaming chất lượng cao để đảm bảo độ chính xác và phản hồi nhanh chóng trong các tình huống gaming.\r\nKết Nối Multi-connect:\r\nHỗ trợ kết nối multi-connect, cho phép chuột được kết nối đồng thời với nhiều thiết bị qua nhiều giao thức khác nhau.\r\nNút Bấm Nhẹ và Phản Hồi Tốt:\r\nNút bấm được thiết kế nhẹ nhàng nhưng vẫn đảm bảo phản hồi chính xác và tốt.\r\nĐèn LED RGB Đa Dạng:\r\nĐèn LED RGB đa dạng cho phép tùy chỉnh ánh sáng theo sở thích cá nhân và đồng bộ với các sản phẩm gaming khác.\r\nChế Độ Chống Nghẽn (Anti-Ghosting):\r\nChế độ chống nghẽn giúp đảm bảo mọi lệnh được nhận đúng và chính xác, đặc biệt là trong các tình huống gaming yêu cầu độ chính xác cao.\r\nNút Điều Chỉnh DPI Đa Cấp:\r\nNút điều chỉnh DPI đa cấp giúp người dùng dễ dàng thay đổi độ nhạy của chuột tùy thuộc vào yêu cầu sử dụng cụ thể.\r\nChất Liệu Chất Lượng và Chân Trượt Mượt:\r\nSử dụng chất liệu chất lượng cao để đảm bảo độ bền, cùng với chân trượt mượt mà để di chuyển dễ dàng trên nhiều bề mặt.\r\nPin Sử Dụng Lâu Dài:\r\nPin có thể sử dụng lâu dài, giúp giảm tần suất sạc và giữ cho chuột luôn sẵn sàng.\r\nChế Độ Tiết Kiệm Năng Lượng:\r\nCó thể có chế độ tiết kiệm năng lượng để giảm tiêu thụ pin khi không sử dụng.\r\nPhần Mềm Tùy Chỉnh (Nếu Có):\r\nPhần mềm tùy chỉnh giúp người dùng điều chỉnh cài đặt và tùy chỉnh chức năng theo ý muốn.', 0, '2023-11-29 07:41:27', NULL);
INSERT INTO `product` (`id`, `name`, `image`, `cate_id`, `price`, `quantity`, `promotion`, `description`, `view`, `created_at`, `updated_at`) VALUES
(123, 'Màn hình Gaming MSI G2412V/23.8 inch/FHD//IPS/100hz', '17031663042105682632.png', 19, 2500000, 8, 30, 'Màn Hình Gaming MSI G2412V - 23.8 inch - FHD - IPS - 100Hz:\r\nKích Thước Màn Hình:\r\nKích thước màn hình 23.8 inch, cung cấp một trải nghiệm hiển thị rộng rãi và chi tiết.\r\nĐộ Phân Giải FHD (Full HD):\r\nĐộ phân giải Full HD (1920 x 1080 pixels) mang lại hình ảnh sắc nét và chất lượng cao.\r\nCông Nghệ Màn Hình IPS:\r\nSử dụng công nghệ màn hình IPS (In-Plane Switching) để cung cấp góc nhìn rộng và màu sắc chính xác.\r\nTần Số Làm Mới 100Hz:\r\nTần số làm mới 100Hz giúp giảm hiện tượng mờ và đảm bảo hình ảnh chuyển động mượt mà, làm tăng trải nghiệm gaming.\r\nThời Gian Đáp Ứng Nhanh:\r\nThời gian đáp ứng nhanh giúp giảm hiện tượng nhòe và đảm bảo hiệu suất ổn định trong các trò chơi yêu cầu độ chính xác cao.\r\nChức Năng FreeSync (Nếu Có):\r\nHỗ trợ công nghệ FreeSync để đồng bộ hóa tần số làm mới của màn hình với tốc độ làm mới của card đồ họa, giảm giữa hiện tượng tearing và stuttering.\r\nThiết Kế Màn Hình Siêu Mỏng:\r\nThiết kế màn hình siêu mỏng giúp tối ưu hóa diện tích hiển thị và tạo ra trải nghiệm hấp dẫn.\r\nChế Độ Chăm Sóc Mắt (Eye Care):\r\nCó thể có chế độ chăm sóc mắt để giảm ánh sáng xanh và giảm mệt mỏi khi sử dụng màn hình trong thời gian dài.\r\nCổng Kết Nối Đa Dạng:\r\nCó các cổng kết nối đa dạng như HDMI, DisplayPort, để tương thích với nhiều thiết bị và card đồ họa khác nhau.\r\nĐèn LED RGB (Nếu Có):\r\nCó thể có đèn LED RGB để tùy chỉnh ánh sáng và tạo điểm nhấn thẩm mỹ.\r\nChế Độ Game Tích Hợp:\r\nChế độ game tích hợp với các cài đặt tối ưu hóa cho trải nghiệm gaming tốt nhất.\r\nChất Lượng Hình Ảnh MSI:\r\nSản phẩm có thương hiệu MSI, nổi tiếng trong lĩnh vực gaming, với chất lượng hình ảnh và độ bền cao.', 0, '2023-12-21 07:45:04', NULL),
(124, 'Màn hình Gaming LG 24GQ50F-B/23.8inch/FHD (1920x1080)/VA 165Hz', '17031663961062864582.png', 19, 3000000, 13, 40, 'Màn hình Gaming LG 24GQ50F-B/23.8inch/FHD (1920x1080)/VA 165Hz\r\nKích Thước Màn Hình:\r\nKích thước màn hình 23.8 inch, cung cấp một trải nghiệm hiển thị rộng rãi và chi tiết.\r\nĐộ Phân Giải FHD (Full HD):\r\nĐộ phân giải Full HD (1920 x 1080 pixels) mang lại hình ảnh sắc nét và chất lượng cao.\r\nCông Nghệ Màn Hình IPS:\r\nSử dụng công nghệ màn hình IPS (In-Plane Switching) để cung cấp góc nhìn rộng và màu sắc chính xác.\r\nTần Số Làm Mới 100Hz:\r\nTần số làm mới 100Hz giúp giảm hiện tượng mờ và đảm bảo hình ảnh chuyển động mượt mà, làm tăng trải nghiệm gaming.\r\nThời Gian Đáp Ứng Nhanh:\r\nThời gian đáp ứng nhanh giúp giảm hiện tượng nhòe và đảm bảo hiệu suất ổn định trong các trò chơi yêu cầu độ chính xác cao.\r\nChức Năng FreeSync (Nếu Có):\r\nHỗ trợ công nghệ FreeSync để đồng bộ hóa tần số làm mới của màn hình với tốc độ làm mới của card đồ họa, giảm giữa hiện tượng tearing và stuttering.\r\nThiết Kế Màn Hình Siêu Mỏng:\r\nThiết kế màn hình siêu mỏng giúp tối ưu hóa diện tích hiển thị và tạo ra trải nghiệm hấp dẫn.\r\nChế Độ Chăm Sóc Mắt (Eye Care):\r\nCó thể có chế độ chăm sóc mắt để giảm ánh sáng xanh và giảm mệt mỏi khi sử dụng màn hình trong thời gian dài.\r\nCổng Kết Nối Đa Dạng:\r\nCó các cổng kết nối đa dạng như HDMI, DisplayPort, để tương thích với nhiều thiết bị và card đồ họa khác nhau.\r\nĐèn LED RGB (Nếu Có):\r\nCó thể có đèn LED RGB để tùy chỉnh ánh sáng và tạo điểm nhấn thẩm mỹ.\r\nChế Độ Game Tích Hợp:\r\nChế độ game tích hợp với các cài đặt tối ưu hóa cho trải nghiệm gaming tốt nhất.\r\nChất Lượng Hình Ảnh MSI:\r\nSản phẩm có thương hiệu MSI, nổi tiếng trong lĩnh vực gaming, với chất lượng hình ảnh và độ bền cao.', 0, '2023-11-29 07:46:36', NULL),
(125, 'Màn hình đồ họa Asus ProArt PA247CV-P/23.8 inch/FHD (1920x1080)/IPS 75Hz', '17031664811374813024.png', 19, 6000000, 6, 50, 'Màn hình đồ họa Asus ProArt PA247CV-P/23.8 inch/FHD (1920x1080)/IPS 75Hz\r\nKích Thước Màn Hình:\r\nKích thước màn hình 23.8 inch, cung cấp một trải nghiệm hiển thị rộng rãi và chi tiết.\r\nĐộ Phân Giải FHD (Full HD):\r\nĐộ phân giải Full HD (1920 x 1080 pixels) mang lại hình ảnh sắc nét và chất lượng cao.\r\nCông Nghệ Màn Hình IPS:\r\nSử dụng công nghệ màn hình IPS (In-Plane Switching) để cung cấp góc nhìn rộng và màu sắc chính xác.\r\nTần Số Làm Mới 100Hz:\r\nTần số làm mới 100Hz giúp giảm hiện tượng mờ và đảm bảo hình ảnh chuyển động mượt mà, làm tăng trải nghiệm gaming.\r\nThời Gian Đáp Ứng Nhanh:\r\nThời gian đáp ứng nhanh giúp giảm hiện tượng nhòe và đảm bảo hiệu suất ổn định trong các trò chơi yêu cầu độ chính xác cao.\r\nChức Năng FreeSync (Nếu Có):\r\nHỗ trợ công nghệ FreeSync để đồng bộ hóa tần số làm mới của màn hình với tốc độ làm mới của card đồ họa, giảm giữa hiện tượng tearing và stuttering.\r\nThiết Kế Màn Hình Siêu Mỏng:\r\nThiết kế màn hình siêu mỏng giúp tối ưu hóa diện tích hiển thị và tạo ra trải nghiệm hấp dẫn.\r\nChế Độ Chăm Sóc Mắt (Eye Care):\r\nCó thể có chế độ chăm sóc mắt để giảm ánh sáng xanh và giảm mệt mỏi khi sử dụng màn hình trong thời gian dài.\r\nCổng Kết Nối Đa Dạng:\r\nCó các cổng kết nối đa dạng như HDMI, DisplayPort, để tương thích với nhiều thiết bị và card đồ họa khác nhau.\r\nĐèn LED RGB (Nếu Có):\r\nCó thể có đèn LED RGB để tùy chỉnh ánh sáng và tạo điểm nhấn thẩm mỹ.\r\nChế Độ Game Tích Hợp:\r\nChế độ game tích hợp với các cài đặt tối ưu hóa cho trải nghiệm gaming tốt nhất.\r\nChất Lượng Hình Ảnh MSI:\r\nSản phẩm có thương hiệu MSI, nổi tiếng trong lĩnh vực gaming, với chất lượng hình ảnh và độ bền cao.', 0, '2023-11-29 07:48:01', NULL),
(126, 'Màn hình Samsung LS27R350FHEXXV/27 inch/FHD (1920x1080)/IPS 75Hz', '17031665831614231559.png', 19, 3000000, 13, 19, 'Màn hình Samsung LS27R350FHEXXV/27 inch/FHD (1920x1080)/IPS 75Hz:\r\nKích Thước Màn Hình:\r\nKích thước màn hình 23.8 inch, cung cấp một trải nghiệm hiển thị rộng rãi và chi tiết.\r\nĐộ Phân Giải FHD (Full HD):\r\nĐộ phân giải Full HD (1920 x 1080 pixels) mang lại hình ảnh sắc nét và chất lượng cao.\r\nCông Nghệ Màn Hình IPS:\r\nSử dụng công nghệ màn hình IPS (In-Plane Switching) để cung cấp góc nhìn rộng và màu sắc chính xác.\r\nTần Số Làm Mới 100Hz:\r\nTần số làm mới 100Hz giúp giảm hiện tượng mờ và đảm bảo hình ảnh chuyển động mượt mà, làm tăng trải nghiệm gaming.\r\nThời Gian Đáp Ứng Nhanh:\r\nThời gian đáp ứng nhanh giúp giảm hiện tượng nhòe và đảm bảo hiệu suất ổn định trong các trò chơi yêu cầu độ chính xác cao.\r\nChức Năng FreeSync (Nếu Có):\r\nHỗ trợ công nghệ FreeSync để đồng bộ hóa tần số làm mới của màn hình với tốc độ làm mới của card đồ họa, giảm giữa hiện tượng tearing và stuttering.\r\nThiết Kế Màn Hình Siêu Mỏng:\r\nThiết kế màn hình siêu mỏng giúp tối ưu hóa diện tích hiển thị và tạo ra trải nghiệm hấp dẫn.\r\nChế Độ Chăm Sóc Mắt (Eye Care):\r\nCó thể có chế độ chăm sóc mắt để giảm ánh sáng xanh và giảm mệt mỏi khi sử dụng màn hình trong thời gian dài.\r\nCổng Kết Nối Đa Dạng:\r\nCó các cổng kết nối đa dạng như HDMI, DisplayPort, để tương thích với nhiều thiết bị và card đồ họa khác nhau.\r\nĐèn LED RGB (Nếu Có):\r\nCó thể có đèn LED RGB để tùy chỉnh ánh sáng và tạo điểm nhấn thẩm mỹ.\r\nChế Độ Game Tích Hợp:\r\nChế độ game tích hợp với các cài đặt tối ưu hóa cho trải nghiệm gaming tốt nhất.\r\nChất Lượng Hình Ảnh MSI:\r\nSản phẩm có thương hiệu MSI, nổi tiếng trong lĩnh vực gaming, với chất lượng hình ảnh và độ bền cao.', 0, '2023-11-29 07:49:43', NULL),
(127, 'Màn hình Gaming Gigabyte GS27F/27 inch/FHD (1920x1080)/IPS 170Hz', '17031666831062891579.png', 19, 5500000, 33, 30, 'Màn hình Gaming Gigabyte GS27F/27 inch/FHD (1920x1080)/IPS 170Hz\r\nĐộ Phân Giải FHD (Full HD):\r\nĐộ phân giải Full HD (1920 x 1080 pixels) mang lại hình ảnh sắc nét và chất lượng cao.\r\nCông Nghệ Màn Hình IPS:\r\nSử dụng công nghệ màn hình IPS (In-Plane Switching) để cung cấp góc nhìn rộng và màu sắc chính xác.\r\nTần Số Làm Mới 100Hz:\r\nTần số làm mới 100Hz giúp giảm hiện tượng mờ và đảm bảo hình ảnh chuyển động mượt mà, làm tăng trải nghiệm gaming.\r\nThời Gian Đáp Ứng Nhanh:\r\nThời gian đáp ứng nhanh giúp giảm hiện tượng nhòe và đảm bảo hiệu suất ổn định trong các trò chơi yêu cầu độ chính xác cao.\r\nChức Năng FreeSync (Nếu Có):\r\nHỗ trợ công nghệ FreeSync để đồng bộ hóa tần số làm mới của màn hình với tốc độ làm mới của card đồ họa, giảm giữa hiện tượng tearing và stuttering.\r\nThiết Kế Màn Hình Siêu Mỏng:\r\nThiết kế màn hình siêu mỏng giúp tối ưu hóa diện tích hiển thị và tạo ra trải nghiệm hấp dẫn.\r\nChế Độ Chăm Sóc Mắt (Eye Care):\r\nCó thể có chế độ chăm sóc mắt để giảm ánh sáng xanh và giảm mệt mỏi khi sử dụng màn hình trong thời gian dài.\r\nCổng Kết Nối Đa Dạng:\r\nCó các cổng kết nối đa dạng như HDMI, DisplayPort, để tương thích với nhiều thiết bị và card đồ họa khác nhau.\r\nĐèn LED RGB (Nếu Có):\r\nCó thể có đèn LED RGB để tùy chỉnh ánh sáng và tạo điểm nhấn thẩm mỹ.\r\nChế Độ Game Tích Hợp:\r\nChế độ game tích hợp với các cài đặt tối ưu hóa cho trải nghiệm gaming tốt nhất.\r\nChất Lượng Hình Ảnh MSI:\r\nSản phẩm có thương hiệu MSI, nổi tiếng trong lĩnh vực gaming, với chất lượng hình ảnh và độ bền cao.', 0, '2023-11-29 07:51:23', NULL),
(128, 'Màn hình Gaming Acer VG240Y S/23.8 inch/FHD (1920x1080)/IPS 165Hz', '17031667921593062997.png', 19, 4500000, 19, 50, 'Màn hình Gaming Acer VG240Y S/23.8 inch/FHD (1920x1080)/IPS 165Hz\r\nĐộ Phân Giải FHD (Full HD):\r\nĐộ phân giải Full HD (1920 x 1080 pixels) mang lại hình ảnh sắc nét và chất lượng cao.\r\nCông Nghệ Màn Hình IPS:\r\nSử dụng công nghệ màn hình IPS (In-Plane Switching) để cung cấp góc nhìn rộng và màu sắc chính xác.\r\nTần Số Làm Mới 100Hz:\r\nTần số làm mới 100Hz giúp giảm hiện tượng mờ và đảm bảo hình ảnh chuyển động mượt mà, làm tăng trải nghiệm gaming.\r\nThời Gian Đáp Ứng Nhanh:\r\nThời gian đáp ứng nhanh giúp giảm hiện tượng nhòe và đảm bảo hiệu suất ổn định trong các trò chơi yêu cầu độ chính xác cao.\r\nChức Năng FreeSync (Nếu Có):\r\nHỗ trợ công nghệ FreeSync để đồng bộ hóa tần số làm mới của màn hình với tốc độ làm mới của card đồ họa, giảm giữa hiện tượng tearing và stuttering.\r\nThiết Kế Màn Hình Siêu Mỏng:\r\nThiết kế màn hình siêu mỏng giúp tối ưu hóa diện tích hiển thị và tạo ra trải nghiệm hấp dẫn.\r\nChế Độ Chăm Sóc Mắt (Eye Care):\r\nCó thể có chế độ chăm sóc mắt để giảm ánh sáng xanh và giảm mệt mỏi khi sử dụng màn hình trong thời gian dài.\r\nCổng Kết Nối Đa Dạng:\r\nCó các cổng kết nối đa dạng như HDMI, DisplayPort, để tương thích với nhiều thiết bị và card đồ họa khác nhau.\r\nĐèn LED RGB (Nếu Có):\r\nCó thể có đèn LED RGB để tùy chỉnh ánh sáng và tạo điểm nhấn thẩm mỹ.\r\nChế Độ Game Tích Hợp:\r\nChế độ game tích hợp với các cài đặt tối ưu hóa cho trải nghiệm gaming tốt nhất.\r\nChất Lượng Hình Ảnh MSI:\r\nSản phẩm có thương hiệu MSI, nổi tiếng trong lĩnh vực gaming, với chất lượng hình ảnh và độ bền cao.', 0, '2023-11-29 07:53:12', NULL),
(129, 'Màn hình MSI Optix MAG274R/27 inch/FHD (1920x1080)/144Hz', '17031669121309578148.png', 19, 10000000, 13, 50, 'Màn hình MSI Optix MAG274R/27 inch/FHD (1920x1080)/144Hz\r\nĐộ Phân Giải FHD (Full HD):\r\nĐộ phân giải Full HD (1920 x 1080 pixels) mang lại hình ảnh sắc nét và chất lượng cao.\r\nCông Nghệ Màn Hình IPS:\r\nSử dụng công nghệ màn hình IPS (In-Plane Switching) để cung cấp góc nhìn rộng và màu sắc chính xác.\r\nTần Số Làm Mới 100Hz:\r\nTần số làm mới 100Hz giúp giảm hiện tượng mờ và đảm bảo hình ảnh chuyển động mượt mà, làm tăng trải nghiệm gaming.\r\nThời Gian Đáp Ứng Nhanh:\r\nThời gian đáp ứng nhanh giúp giảm hiện tượng nhòe và đảm bảo hiệu suất ổn định trong các trò chơi yêu cầu độ chính xác cao.\r\nChức Năng FreeSync (Nếu Có):\r\nHỗ trợ công nghệ FreeSync để đồng bộ hóa tần số làm mới của màn hình với tốc độ làm mới của card đồ họa, giảm giữa hiện tượng tearing và stuttering.\r\nThiết Kế Màn Hình Siêu Mỏng:\r\nThiết kế màn hình siêu mỏng giúp tối ưu hóa diện tích hiển thị và tạo ra trải nghiệm hấp dẫn.\r\nChế Độ Chăm Sóc Mắt (Eye Care):\r\nCó thể có chế độ chăm sóc mắt để giảm ánh sáng xanh và giảm mệt mỏi khi sử dụng màn hình trong thời gian dài.\r\nCổng Kết Nối Đa Dạng:\r\nCó các cổng kết nối đa dạng như HDMI, DisplayPort, để tương thích với nhiều thiết bị và card đồ họa khác nhau.\r\nĐèn LED RGB (Nếu Có):\r\nCó thể có đèn LED RGB để tùy chỉnh ánh sáng và tạo điểm nhấn thẩm mỹ.\r\nChế Độ Game Tích Hợp:\r\nChế độ game tích hợp với các cài đặt tối ưu hóa cho trải nghiệm gaming tốt nhất.\r\nChất Lượng Hình Ảnh MSI:\r\nSản phẩm có thương hiệu MSI, nổi tiếng trong lĩnh vực gaming, với chất lượng hình ảnh và độ bền cao.', 0, '2023-11-29 07:55:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rate_bill`
--

CREATE TABLE `rate_bill` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` bigint(11) NOT NULL,
  `date_rate` datetime NOT NULL DEFAULT current_timestamp(),
  `rate_article` varchar(1000) NOT NULL,
  `rate_radio` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rate_bill`
--

INSERT INTO `rate_bill` (`id`, `user_id`, `order_id`, `date_rate`, `rate_article`, `rate_radio`) VALUES
(6, 18, 63, '2023-12-26 04:18:20', 'Chất lượng', 'Tốt'),
(7, 18, 62, '2023-12-26 04:18:29', '10 điểm', 'Tốt'),
(8, 18, 61, '2023-12-26 04:18:53', 'Tốt', 'Tốt'),
(9, 22, 67, '2023-12-26 16:59:24', 'sản phẩm tốt', 'Tốt');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `avatar` text DEFAULT NULL,
  `gr_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(20) NOT NULL,
  `address` text NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `gr_id`, `email`, `password`, `phone`, `address`, `description`, `created_at`, `updated_at`) VALUES
(10, 'Quản trị viên', '1700816514.png', 1, 'admin@gmail.com', '$2y$10$u.rxS1Gr63XYW0kh/UZPYOa2K3LWGpC98DxoEq9wTLaCM.P3kx2V6', 383825812, 'Hà Nội', '', '2023-10-31 20:01:52', '2023-11-24 17:29:08'),
(18, 'Vũ Thị Thanh Hảo', '1700816764.jpg', 2, 'thanhhaovu19@gmail.com', '$2y$10$9KMTdO2sVBjjNw6u2mMkxeFMw69fA3LgwGua0.0QHeJy4ZBTDTHoW', 383825812, 'Hà Nội', '', '2023-10-31 15:58:30', '2023-12-21 15:21:18'),
(22, 'Vũ  Hảo', '1703172384.jpg', 2, 'vuhao@gmail.com', '$2y$10$E4qZdhW1NBS0GjbCKJBjguvNJsM.aOzIwFcdzOCghwn1yl7ghvycu', 383825813, 'Hoang Mai, Ha Noi', '', '2023-12-21 16:13:06', '2023-12-21 16:42:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pro` (`id_pro`),
  ADD KEY `id_bill` (`id_bill`);

--
-- Indexes for table `group_user`
--
ALTER TABLE `group_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img_product`
--
ALTER TABLE `img_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cate_id`);

--
-- Indexes for table `rate_bill`
--
ALTER TABLE `rate_bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ten_khoa_ngoai` (`user_id`),
  ADD KEY `ten_khoa_ngoai1` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gr_id` (`gr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `detail_bill`
--
ALTER TABLE `detail_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `group_user`
--
ALTER TABLE `group_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `img_product`
--
ALTER TABLE `img_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `rate_bill`
--
ALTER TABLE `rate_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD CONSTRAINT `detail_bill_ibfk_1` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id`);

--
-- Constraints for table `img_product`
--
ALTER TABLE `img_product`
  ADD CONSTRAINT `img_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `rate_bill`
--
ALTER TABLE `rate_bill`
  ADD CONSTRAINT `ten_khoa_ngoai` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ten_khoa_ngoai1` FOREIGN KEY (`order_id`) REFERENCES `bill` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`gr_id`) REFERENCES `group_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
