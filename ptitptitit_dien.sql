-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 12 Juin 2020 à 07:44
-- Version du serveur :  5.5.31
-- Version de PHP :  5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ptitptitit_dien`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_account`
--

CREATE TABLE IF NOT EXISTS `tbl_account` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `tel` text COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `enable` int(11) NOT NULL,
  `province` int(11) NOT NULL,
  `district` int(11) NOT NULL,
  `ward` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tbl_account`
--

INSERT INTO `tbl_account` (`id`, `username`, `password`, `email`, `tel`, `fullname`, `address`, `type`, `enable`, `province`, `district`, `ward`) VALUES
(1, 'master', '48a8578000db0591608c3130a5aef80b', 'master@localhost', '', 'Master', '', 'master', 1, 0, 0, 0),
(2, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@localhost', '', 'Admin', '', 'admin', 1, 0, 0, 0),
(3, 'hiep', '662f707d5491e9bce8238a6c0be92190', 'master@localhost', '', 'Master', '', 'master', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(10) unsigned NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `uri` text COLLATE utf8_unicode_ci,
  `thumbnail` text COLLATE utf8_unicode_ci NOT NULL,
  `video` text COLLATE utf8_unicode_ci NOT NULL,
  `svg` text COLLATE utf8_unicode_ci NOT NULL,
  `index` int(11) NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `related_id` text COLLATE utf8_unicode_ci NOT NULL,
  `enable` int(1) NOT NULL DEFAULT '1',
  `popular` int(11) NOT NULL DEFAULT '0',
  `row` int(11) NOT NULL,
  `column` int(11) NOT NULL,
  `column_sm` int(11) NOT NULL,
  `column_xs` int(11) NOT NULL,
  `slide` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `checkbox_admin` text COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `create_date` int(11) NOT NULL,
  `lock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `uri`, `thumbnail`, `video`, `svg`, `index`, `type`, `parent_id`, `related_id`, `enable`, `popular`, `row`, `column`, `column_sm`, `column_xs`, `slide`, `admin`, `checkbox_admin`, `quantity`, `create_date`, `lock`) VALUES
(1, 'Danh mục trang 1', 'danh-muc-trang-1', '', '', '', 0, 'page', NULL, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591582306, 0),
(2, 'Danh mục trang 2', 'danh-muc-trang-2', '', '', '', 0, 'page', 0, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591582305, 0),
(3, 'Danh mục trang 3', 'danh-muc-trang-3', '', '', '', 0, 'page', 0, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591582304, 0),
(4, 'Danh mục sản phẩm 1', 'danh-muc-san-pham-1', 'upload/image/pin.png', '', '', 0, 'product', NULL, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591586563, 0),
(5, 'Danh mục sản phẩm 2', 'danh-muc-san-pham-2', 'upload/image/pin.png', '', '', 0, 'product', 0, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591586562, 0),
(6, 'Danh mục sản phẩm 3', 'danh-muc-san-pham-3', 'upload/image/pin.png', '', '', 0, 'product', 0, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591586561, 0),
(7, 'Danh mục sản phẩm con 1', 'danh-muc-san-pham-con-1', '', '', '', 0, 'product', NULL, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591586788, 0),
(8, 'Danh mục sản phẩm con 2', 'danh-muc-san-pham-con-2', '', '', '', 0, 'product', 0, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591586787, 0),
(9, 'Danh mục sản phẩm 3 - Copy (1)', 'danh-muc-san-pham-3-copy-1', 'upload/image/pin.png', '', '', 0, 'product', 0, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591586560, 0),
(10, 'Danh mục sản phẩm 3 - Copy (2)', 'danh-muc-san-pham-3-copy-2', 'upload/image/pin.png', '', '', 0, 'product', 0, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591586559, 0),
(11, 'Danh mục sản phẩm 3 - Copy (3)', 'danh-muc-san-pham-3-copy-3', 'upload/image/pin.png', '', '', 0, 'product', 0, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591586558, 0),
(12, 'Danh mục sản phẩm 3 - Copy (4)', 'danh-muc-san-pham-3-copy-4', 'upload/image/pin.png', '', '', 0, 'product', 0, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591586557, 0),
(13, 'Danh mục sản phẩm 3 - Copy (5)', 'danh-muc-san-pham-3-copy-5', 'upload/image/pin.png', '', '', 0, 'product', 0, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591586556, 0),
(14, 'Danh mục sản phẩm 3 - Copy (6)', 'danh-muc-san-pham-3-copy-6', 'upload/image/pin.png', '', '', 0, 'product', 0, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591586555, 0),
(15, 'Hệ thống 1037 siêu thị', 'he-thong-1037-sieu-thi', '', '', '', 0, 'page', NULL, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591666469, 0),
(16, 'Giới thiệu công ty', 'gioi-thieu-cong-ty', '', '', '', 0, 'page', NULL, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591666488, 0),
(17, 'Tìm việc làm', 'tim-viec-lam', '', '', '', 0, 'page', NULL, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591666505, 0),
(18, 'Liên hệ, góp ý', 'lien-he-gop-y', '', '', '', 0, 'page', NULL, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591666522, 0),
(19, 'Tìm hiểu về mua trả góp', 'tim-hieu-ve-mua-tra-gop', '', '', '', 0, 'page', NULL, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591666580, 0),
(20, 'Giao hàng, lắp đặt', 'giao-hang-lap-dat', '', '', '', 0, 'page', NULL, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591666608, 0),
(21, 'Bảo hành, đổi trả', 'bao-hanh-doi-tra', '', '', '', 0, 'page', NULL, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591666639, 0),
(22, 'DV vệ sinh máy lạnh, máy giặt', 'dv-ve-sinh-may-lanh-may-giat', '', '', '', 0, 'page', NULL, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591666662, 0),
(23, 'Tất cả sản phẩm', 'tat-ca-san-pham', '', '', '', 0, 'product', NULL, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591686956, 0),
(24, 'Tin tức', 'tin-tuc', 'upload/image/banner3.png', '', '', 0, 'post', NULL, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591687237, 0),
(25, 'Giỏ hàng', 'gio-hang', '', '', '', 0, 'page', NULL, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591776286, 0),
(26, 'Tìm kiếm', 'tim-kiem', '', '', '', 0, 'product', NULL, '', 1, 0, 0, 0, 0, 0, 0, 0, 'thumbnail,title,first_tag,content', 0, 1591947586, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_category_extend`
--

CREATE TABLE IF NOT EXISTS `tbl_category_extend` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` text COLLATE utf8_unicode_ci NOT NULL,
  `video` text COLLATE utf8_unicode_ci NOT NULL,
  `popular` int(11) NOT NULL,
  `enable` int(11) NOT NULL,
  `index` int(11) NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `gender` text COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `tel` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `age` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `first_tag` text COLLATE utf8_unicode_ci NOT NULL,
  `second_tag` text COLLATE utf8_unicode_ci NOT NULL,
  `third_tag` text COLLATE utf8_unicode_ci NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `create_date` int(11) NOT NULL,
  `location` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `product_id`, `name`, `gender`, `address`, `tel`, `email`, `age`, `content`, `first_tag`, `second_tag`, `third_tag`, `type`, `create_date`, `location`) VALUES
(1, 0, 'Dương Hoàng Khải', '', '', '0855519521', 'khaib1400697@student.ctu.edu.vn', '...', 'nhận hỗ trợ', '...', '...', '...', 'contact', 1591947454, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_district`
--

CREATE TABLE IF NOT EXISTS `tbl_district` (
  `id` int(5) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `location` text COLLATE utf8_unicode_ci NOT NULL,
  `pid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tbl_district`
--

INSERT INTO `tbl_district` (`id`, `name`, `type`, `location`, `pid`) VALUES
(1, 'Ba Đình', 'Quận', '21 02 08N, 105 49 38E', 1),
(2, 'Hoàn Kiếm', 'Quận', '21 01 53N, 105 51 09E', 1),
(3, 'Tây Hồ', 'Quận', '21 04 10N, 105 49 07E', 1),
(4, 'Long Biên', 'Quận', '21 02 21N, 105 53 07E', 1),
(5, 'Cầu Giấy', 'Quận', '21 01 52N, 105 47 20E', 1),
(6, 'Đống Đa', 'Quận', '21 00 56N, 105 49 06E', 1),
(7, 'Hai Bà Trưng', 'Quận', '21 00 27N, 105 51 35E', 1),
(8, 'Hoàng Mai', 'Quận', '20 58 33N, 105 51 22E', 1),
(9, 'Thanh Xuân', 'Quận', '20 59 44N, 105 48 56E', 1),
(16, 'Sóc Sơn', 'Huyện', '21 16 55N, 105 49 46E', 1),
(17, 'Đông Anh', 'Huyện', '21 08 16N, 105 49 38E', 1),
(18, 'Gia Lâm', 'Huyện', '21 01 28N, 105 56 54E', 1),
(19, 'Từ Liêm', 'Huyện', '21 02 39N, 105 45 32E', 1),
(20, 'Thanh Trì', 'Huyện', '20 56 32N, 105 50 55E', 1),
(24, 'Hà Giang', 'Thị Xã', '22 46 23N, 105 02 39E', 2),
(26, 'Đồng Văn', 'Huyện', '23 14 34N, 105 15 48E', 2),
(27, 'Mèo Vạc', 'Huyện', '23 09 10N, 105 26 38E', 2),
(28, 'Yên Minh', 'Huyện', '23 04 20N, 105 10 13E', 2),
(29, 'Quản Bạ', 'Huyện', '23 04 03N, 104 58 05E', 2),
(30, 'Vị Xuyên', 'Huyện', '22 45 50N, 104 56 26E', 2),
(31, 'Bắc Mê', 'Huyện', '22 45 48N, 105 16 26E', 2),
(32, 'Hoàng Su Phì', 'Huyện', '22 41 37N, 104 40 06E', 2),
(33, 'Xín Mần', 'Huyện', '22 38 05N, 104 28 35E', 2),
(34, 'Bắc Quang', 'Huyện', '22 23 42N, 104 55 06E', 2),
(35, 'Quang Bình', 'Huyện', '22 23 07N, 104 37 11E', 2),
(40, 'Cao Bằng', 'Thị Xã', '22 39 20N, 106 15 20E', 4),
(42, 'Bảo Lâm', 'Huyện', '22 52 37N, 105 27 28E', 4),
(43, 'Bảo Lạc', 'Huyện', '22 52 31N, 105 42 41E', 4),
(44, 'Thông Nông', 'Huyện', '22 49 09N, 105 57 05E', 4),
(45, 'Hà Quảng', 'Huyện', '22 53 42N, 106 06 32E', 4),
(46, 'Trà Lĩnh', 'Huyện', '22 48 14N, 106 19 47E', 4),
(47, 'Trùng Khánh', 'Huyện', '22 49 31N, 106 33 58E', 4),
(48, 'Hạ Lang', 'Huyện', '22 42 37N, 106 41 42E', 4),
(49, 'Quảng Uyên', 'Huyện', '22 40 15N, 106 27 42E', 4),
(50, 'Phục Hoà', 'Huyện', '22 33 52N, 106 30 02E', 4),
(51, 'Hoà An', 'Huyện', '22 41 20N, 106 02 05E', 4),
(52, 'Nguyên Bình', 'Huyện', '22 38 52N, 105 57 02E', 4),
(53, 'Thạch An', 'Huyện', '22 28 51N, 106 19 51E', 4),
(58, 'Bắc Kạn', 'Thị Xã', '22 08 00N, 105 51 10E', 6),
(60, 'Pác Nặm', 'Huyện', '22 35 46N, 105 40 25E', 6),
(61, 'Ba Bể', 'Huyện', '22 23 54N, 105 43 30E', 6),
(62, 'Ngân Sơn', 'Huyện', '22 25 50N, 106 01 00E', 6),
(63, 'Bạch Thông', 'Huyện', '22 12 04N, 105 51 01E', 6),
(64, 'Chợ Đồn', 'Huyện', '22 11 18N, 105 34 43E', 6),
(65, 'Chợ Mới', 'Huyện', '21 57 56N, 105 51 29E', 6),
(66, 'Na Rì', 'Huyện', '22 09 48N, 106 05 09E', 6),
(70, 'Tuyên Quang', 'Thị Xã', '21 49 40N, 105 13 12E', 8),
(72, 'Nà Hang', 'Huyện', '22 28 34N, 105 21 03E', 8),
(73, 'Chiêm Hóa', 'Huyện', '22 12 49N, 105 14 32E', 8),
(74, 'Hàm Yên', 'Huyện', '22 05 46N, 105 00 13E', 8),
(75, 'Yên Sơn', 'Huyện', '21 51 53N, 105 18 14E', 8),
(76, 'Sơn Dương', 'Huyện', '21 40 22N, 105 22 57E', 8),
(80, 'Lào Cai', 'Thành Phố', '22 25 07N, 103 58 43E', 10),
(82, 'Bát Xát', 'Huyện', '22 35 50N, 103 44 49E', 10),
(83, 'Mường Khương', 'Huyện', '22 41 05N, 104 08 26E', 10),
(84, 'Si Ma Cai', 'Huyện', '22 39 46N, 104 16 05E', 10),
(85, 'Bắc Hà', 'Huyện', '22 30 08N, 104 18 54E', 10),
(86, 'Bảo Thắng', 'Huyện', '22 22 47N, 104 10 00E', 10),
(87, 'Bảo Yên', 'Huyện', '22 17 38N, 104 25 02E', 10),
(88, 'Sa Pa', 'Huyện', '22 18 54N, 103 54 18E', 10),
(89, 'Văn Bàn', 'Huyện', '22 03 48N, 104 10 59E', 10),
(94, 'Điện Biên Phủ', 'Thành Phố', '21 24 52N, 103 02 31E', 11),
(95, 'Mường Lay', 'Thị Xã', '22 01 47N, 103 07 10E', 11),
(96, 'Mường Nhé', 'Huyện', '22 06 11N, 102 30 54E', 11),
(97, 'Mường Chà', 'Huyện', '21 50 31N, 103 03 15E', 11),
(98, 'Tủa Chùa', 'Huyện', '21 58 19N, 103 23 01E', 11),
(99, 'Tuần Giáo', 'Huyện', '21 38 03N, 103 21 06E', 11),
(100, 'Điện Biên', 'Huyện', '21 15 19N, 103 03 19E', 11),
(101, 'Điện Biên Đông', 'Huyện', '21 14 07N, 103 15 19E', 11),
(102, 'Mường Ảng', 'Huyện', '', 11),
(104, 'Lai Châu', 'Thị Xã', '22 23 15N, 103 24 22E', 12),
(106, 'Tam Đường', 'Huyện', '22 20 16N, 103 32 53E', 12),
(107, 'Mường Tè', 'Huyện', '22 24 16N, 102 43 11E', 12),
(108, 'Sìn Hồ', 'Huyện', '22 17 21N, 103 18 12E', 12),
(109, 'Phong Thổ', 'Huyện', '22 38 24N, 103 22 38E', 12),
(110, 'Than Uyên', 'Huyện', '21 59 35N, 103 45 30E', 12),
(111, 'Tân Uyên', 'Huyện', '', 12),
(116, 'Sơn La', 'Thành Phố', '21 20 39N, 103 54 52E', 14),
(118, 'Quỳnh Nhai', 'Huyện', '21 46 34N, 103 39 02E', 14),
(119, 'Thuận Châu', 'Huyện', '21 24 54N, 103 39 46E', 14),
(120, 'Mường La', 'Huyện', '21 31 38N, 104 02 48E', 14),
(121, 'Bắc Yên', 'Huyện', '21 13 23N, 104 22 09E', 14),
(122, 'Phù Yên', 'Huyện', '21 13 33N, 104 41 51E', 14),
(123, 'Mộc Châu', 'Huyện', '20 49 21N, 104 43 10E', 14),
(124, 'Yên Châu', 'Huyện', '20 59 33N, 104 19 51E', 14),
(125, 'Mai Sơn', 'Huyện', '21 10 08N, 103 59 36E', 14),
(126, 'Sông Mã', 'Huyện', '21 06 04N, 103 43 56E', 14),
(127, 'Sốp Cộp', 'Huyện', '20 52 46N, 103 30 38E', 14),
(132, 'Yên Bái', 'Thành Phố', '21 44 28N, 104 53 42E', 15),
(133, 'Nghĩa Lộ', 'Thị Xã', '21 35 58N, 104 29 22E', 15),
(135, 'Lục Yên', 'Huyện', '22 06 44N, 104 43 12E', 15),
(136, 'Văn Yên', 'Huyện', '21 55 55N, 104 33 51E', 15),
(137, 'Mù Cang Chải', 'Huyện', '21 48 22N, 104 09 01E', 15),
(138, 'Trấn Yên', 'Huyện', '21 42 20N, 104 48 56E', 15),
(139, 'Trạm Tấu', 'Huyện', '21 30 40N, 104 28 03E', 15),
(140, 'Văn Chấn', 'Huyện', '21 34 15N, 104 35 19E', 15),
(141, 'Yên Bình', 'Huyện', '21 52 24N, 104 55 16E', 15),
(148, 'Hòa Bình', 'Thành Phố', '20 50 36N, 105 19 20E', 17),
(150, 'Đà Bắc', 'Huyện', '20 55 58N, 105 04 52E', 17),
(151, 'Kỳ Sơn', 'Huyện', '20 54 06N, 105 23 18E', 17),
(152, 'Lương Sơn', 'Huyện', '20 53 16N, 105 30 55E', 17),
(153, 'Kim Bôi', 'Huyện', '20 40 34N, 105 32 15E', 17),
(154, 'Cao Phong', 'Huyện', '20 41 23N, 105 17 48E', 17),
(155, 'Tân Lạc', 'Huyện', '20 36 44N, 105 15 03E', 17),
(156, 'Mai Châu', 'Huyện', '20 40 56N, 104 59 46E', 17),
(157, 'Lạc Sơn', 'Huyện', '20 29 59N, 105 24 57E', 17),
(158, 'Yên Thủy', 'Huyện', '20 25 42N, 105 37 59E', 17),
(159, 'Lạc Thủy', 'Huyện', '20 29 12N, 105 44 06E', 17),
(164, 'Thái Nguyên', 'Thành Phố', '21 33 20N, 105 48 26E', 19),
(165, 'Sông Công', 'Thị Xã', '21 29 14N, 105 48 47E', 19),
(167, 'Định Hóa', 'Huyện', '21 53 50N, 105 38 01E', 19),
(168, 'Phú Lương', 'Huyện', '21 45 57N, 105 43 22E', 19),
(169, 'Đồng Hỷ', 'Huyện', '21 41 10N, 105 55 43E', 19),
(170, 'Võ Nhai', 'Huyện', '21 47 14N, 106 02 29E', 19),
(171, 'Đại Từ', 'Huyện', '21 36 17N, 105 37 28E', 19),
(172, 'Phổ Yên', 'Huyện', '21 27 08N, 105 45 19E', 19),
(173, 'Phú Bình', 'Huyện', '21 29 36N, 105 57 42E', 19),
(178, 'Lạng Sơn', 'Thành Phố', '21 51 19N, 106 44 50E', 20),
(180, 'Tràng Định', 'Huyện', '22 18 09N, 106 26 32E', 20),
(181, 'Bình Gia', 'Huyện', '22 03 56N, 106 19 01E', 20),
(182, 'Văn Lãng', 'Huyện', '22 01 59N, 106 34 17E', 20),
(183, 'Cao Lộc', 'Huyện', '21 53 05N, 106 50 34E', 20),
(184, 'Văn Quan', 'Huyện', '21 51 04N, 106 33 04E', 20),
(185, 'Bắc Sơn', 'Huyện', '21 48 57N, 106 15 28E', 20),
(186, 'Hữu Lũng', 'Huyện', '21 34 33N, 106 20 33E', 20),
(187, 'Chi Lăng', 'Huyện', '21 40 05N, 106 37 24E', 20),
(188, 'Lộc Bình', 'Huyện', '21 40 41N, 106 58 12E', 20),
(189, 'Đình Lập', 'Huyện', '21 32 07N, 107 07 25E', 20),
(193, 'Hạ Long', 'Thành Phố', '20 52 24N, 107 05 23E', 22),
(194, 'Móng Cái', 'Thành Phố', '21 26 31N, 107 55 09E', 22),
(195, 'Cẩm Phả', 'Thị Xã', '21 03 42N, 107 17 22E', 22),
(196, 'Uông Bí', 'Thị Xã', '21 04 33N, 106 45 07E', 22),
(198, 'Bình Liêu', 'Huyện', '21 33 07N, 107 26 24E', 22),
(199, 'Tiên Yên', 'Huyện', '21 22 24N, 107 22 50E', 22),
(200, 'Đầm Hà', 'Huyện', '21 21 23N, 107 34 32E', 22),
(201, 'Hải Hà', 'Huyện', '21 25 50N, 107 41 26E', 22),
(202, 'Ba Chẽ', 'Huyện', '21 15 40N, 107 09 52E', 22),
(203, 'Vân Đồn', 'Huyện', '20 56 17N, 107 28 02E', 22),
(204, 'Hoành Bồ', 'Huyện', '21 06 30N, 107 02 43E', 22),
(205, 'Đông Triều', 'Huyện', '21 07 10N, 106 34 36E', 22),
(206, 'Yên Hưng', 'Huyện', '20 55 40N, 106 51 05E', 22),
(207, 'Cô Tô', 'Huyện', '21 05 01N, 107 49 10E', 22),
(213, 'Bắc Giang', 'Thành Phố', '21 17 36N, 106 11 18E', 24),
(215, 'Yên Thế', 'Huyện', '21 31 29N, 106 09 27E', 24),
(216, 'Tân Yên', 'Huyện', '21 23 23N, 106 05 55E', 24),
(217, 'Lạng Giang', 'Huyện', '21 21 58N, 106 15 21E', 24),
(218, 'Lục Nam', 'Huyện', '21 18 16N, 106 29 24E', 24),
(219, 'Lục Ngạn', 'Huyện', '21 26 15N, 106 39 09E', 24),
(220, 'Sơn Động', 'Huyện', '21 19 42N, 106 51 09E', 24),
(221, 'Yên Dũng', 'Huyện', '21 12 22N, 106 14 12E', 24),
(222, 'Việt Yên', 'Huyện', '21 16 16N, 106 04 59E', 24),
(223, 'Hiệp Hòa', 'Huyện', '21 15 51N, 105 57 30E', 24),
(227, 'Việt Trì', 'Thành Phố', '21 19 01N, 105 23 35E', 25),
(228, 'Phú Thọ', 'Thị Xã', '21 24 54N, 105 13 46E', 25),
(230, 'Đoan Hùng', 'Huyện', '21 36 56N, 105 08 42E', 25),
(231, 'Hạ Hoà', 'Huyện', '21 35 13N, 105 00 22E', 25),
(232, 'Thanh Ba', 'Huyện', '21 27 04N, 105 09 10E', 25),
(233, 'Phù Ninh', 'Huyện', '21 26 59N, 105 18 13E', 25),
(234, 'Yên Lập', 'Huyện', '21 22 21N, 105 01 25E', 25),
(235, 'Cẩm Khê', 'Huyện', '21 23 04N, 105 05 25E', 25),
(236, 'Tam Nông', 'Huyện', '21 18 24N, 105 14 59E', 25),
(237, 'Lâm Thao', 'Huyện', '21 19 37N, 105 18 09E', 25),
(238, 'Thanh Sơn', 'Huyện', '21 08 32N, 105 04 40E', 25),
(239, 'Thanh Thuỷ', 'Huyện', '21 07 26N, 105 17 18E', 25),
(240, 'Tân Sơn', 'Huyện', '', 25),
(243, 'Vĩnh Yên', 'Thành Phố', '21 18 26N, 105 35 33E', 26),
(244, 'Phúc Yên', 'Thị Xã', '21 18 55N, 105 43 54E', 26),
(246, 'Lập Thạch', 'Huyện', '21 24 45N, 105 25 39E', 26),
(247, 'Tam Dương', 'Huyện', '21 21 40N, 105 33 36E', 26),
(248, 'Tam Đảo', 'Huyện', '21 27 34N, 105 35 09E', 26),
(249, 'Bình Xuyên', 'Huyện', '21 19 48N, 105 39 43E', 26),
(250, 'Mê Linh', 'Huyện', '21 10 53N, 105 42 05E', 1),
(251, 'Yên Lạc', 'Huyện', '21 13 17N, 105 34 44E', 26),
(252, 'Vĩnh Tường', 'Huyện', '21 14 58N, 105 29 37E', 26),
(253, 'Sông Lô', 'Huyện', '', 26),
(256, 'Bắc Ninh', 'Thành Phố', '21 10 48N, 106 03 58E', 27),
(258, 'Yên Phong', 'Huyện', '21 12 40N, 105 59 36E', 27),
(259, 'Quế Võ', 'Huyện', '21 08 44N, 106 11 06E', 27),
(260, 'Tiên Du', 'Huyện', '21 07 37N, 106 02 19E', 27),
(261, 'Từ Sơn', 'Thị Xã', '21 07 12N, 105 57 26E', 27),
(262, 'Thuận Thành', 'Huyện', '21 02 24N, 106 04 10E', 27),
(263, 'Gia Bình', 'Huyện', '21 03 55N, 106 12 53E', 27),
(264, 'Lương Tài', 'Huyện', '21 01 33N, 106 13 28E', 27),
(268, 'Hà Đông', 'Quận', '20 57 25N, 105 45 21E', 1),
(269, 'Sơn Tây', 'Thị Xã', '21 05 51N, 105 28 27E', 1),
(271, 'Ba Vì', 'Huyện', '21 09 40N, 105 22 43E', 1),
(272, 'Phúc Thọ', 'Huyện', '21 06 32N, 105 34 52E', 1),
(273, 'Đan Phượng', 'Huyện', '21 07 13N, 105 40 49E', 1),
(274, 'Hoài Đức', 'Huyện', '21 01 25N, 105 42 03E', 1),
(275, 'Quốc Oai', 'Huyện', '20 58 45N, 105 36 43E', 1),
(276, 'Thạch Thất', 'Huyện', '21 02 17N, 105 33 05E', 1),
(277, 'Chương Mỹ', 'Huyện', '20 52 46N, 105 39 01E', 1),
(278, 'Thanh Oai', 'Huyện', '20 51 44N, 105 46 18E', 1),
(279, 'Thường Tín', 'Huyện', '20 49 59N, 105 22 19E', 1),
(280, 'Phú Xuyên', 'Huyện', '20 43 37N, 105 53 43E', 1),
(281, 'Ứng Hòa', 'Huyện', '20 42 41N, 105 47 58E', 1),
(282, 'Mỹ Đức', 'Huyện', '20 41 53N, 105 43 31E', 1),
(288, 'Hải Dương', 'Thành Phố', '20 56 14N, 106 18 21E', 30),
(290, 'Chí Linh', 'Huyện', '21 07 47N, 106 23 46E', 30),
(291, 'Nam Sách', 'Huyện', '21 00 15N, 106 20 26E', 30),
(292, 'Kinh Môn', 'Huyện', '21 00 04N, 106 30 23E', 30),
(293, 'Kim Thành', 'Huyện', '20 55 40N, 106 30 33E', 30),
(294, 'Thanh Hà', 'Huyện', '20 53 19N, 106 25 43E', 30),
(295, 'Cẩm Giàng', 'Huyện', '20 57 05N, 106 12 29E', 30),
(296, 'Bình Giang', 'Huyện', '20 52 36N, 106 11 24E', 30),
(297, 'Gia Lộc', 'Huyện', '20 51 01N, 106 17 34E', 30),
(298, 'Tứ Kỳ', 'Huyện', '20 49 05N, 106 24 05E', 30),
(299, 'Ninh Giang', 'Huyện', '20 45 13N, 106 20 09E', 30),
(300, 'Thanh Miện', 'Huyện', '20 46 02N, 106 12 26E', 30),
(303, 'Hồng Bàng', 'Quận', '20 52 37N, 106 38 32E', 31),
(304, 'Ngô Quyền', 'Quận', '20 51 13N, 106 41 57E', 31),
(305, 'Lê Chân', 'Quận', '20 50 12N, 106 40 30E', 31),
(306, 'Hải An', 'Quận', '20 49 38N, 106 45 57E', 31),
(307, 'Kiến An', 'Quận', '20 48 26N, 106 38 03E', 31),
(308, 'Đồ Sơn', 'Quận', '20 42 41N, 106 44 54E', 31),
(309, 'Kinh Dương', 'Quận', '', 31),
(311, 'Thuỷ Nguyên', 'Huyện', '20 56 36N, 106 39 38E', 31),
(312, 'An Dương', 'Huyện', '20 53 06N, 106 35 36E', 31),
(313, 'An Lão', 'Huyện', '20 47 54N, 106 33 19E', 31),
(314, 'Kiến Thụy', 'Huyện', '20 45 13N, 106 41 47E', 31),
(315, 'Tiên Lãng', 'Huyện', '20 42 23N, 106 36 03E', 31),
(316, 'Vĩnh Bảo', 'Huyện', '20 40 56N, 106 29 57E', 31),
(317, 'Cát Hải', 'Huyện', '20 47 09N, 106 58 07E', 31),
(318, 'Bạch Long Vĩ', 'Huyện', '20 08 41N, 107 42 51E', 31),
(323, 'Hưng Yên', 'Thành Phố', '20 39 38N, 106 03 08E', 33),
(325, 'Văn Lâm', 'Huyện', '20 58 31N, 106 02 51E', 33),
(326, 'Văn Giang', 'Huyện', '20 55 51N, 105 57 14E', 33),
(327, 'Yên Mỹ', 'Huyện', '20 53 45N, 106 01 21E', 33),
(328, 'Mỹ Hào', 'Huyện', '20 55 35N, 106 05 34E', 33),
(329, 'Ân Thi', 'Huyện', '20 48 49N, 106 05 30E', 33),
(330, 'Khoái Châu', 'Huyện', '20 49 53N, 105 58 28E', 33),
(331, 'Kim Động', 'Huyện', '20 44 47N, 106 01 47E', 33),
(332, 'Tiên Lữ', 'Huyện', '20 40 05N, 106 07 59E', 33),
(333, 'Phù Cừ', 'Huyện', '20 42 51N, 106 11 30E', 33),
(336, 'Thái Bình', 'Thành Phố', '20 26 45N, 106 19 56E', 34),
(338, 'Quỳnh Phụ', 'Huyện', '20 38 57N, 106 21 16E', 34),
(339, 'Hưng Hà', 'Huyện', '20 35 38N, 106 12 42E', 34),
(340, 'Đông Hưng', 'Huyện', '20 32 50N, 106 20 15E', 34),
(341, 'Thái Thụy', 'Huyện', '20 32 33N, 106 32 32E', 34),
(342, 'Tiền Hải', 'Huyện', '20 21 05N, 106 32 45E', 34),
(343, 'Kiến Xương', 'Huyện', '20 23 52N, 106 25 22E', 34),
(344, 'Vũ Thư', 'Huyện', '20 25 29N, 106 16 43E', 34),
(347, 'Phủ Lý', 'Thành Phố', '20 32 19N, 105 54 55E', 35),
(349, 'Duy Tiên', 'Huyện', '20 37 33N, 105 58 01E', 35),
(350, 'Kim Bảng', 'Huyện', '20 34 19N, 105 50 41E', 35),
(351, 'Thanh Liêm', 'Huyện', '20 27 31N, 105 55 09E', 35),
(352, 'Bình Lục', 'Huyện', '20 29 23N, 106 02 52E', 35),
(353, 'Lý Nhân', 'Huyện', '20 32 55N, 106 04 48E', 35),
(356, 'Nam Định', 'Thành Phố', '20 25 07N, 106 09 54E', 36),
(358, 'Mỹ Lộc', 'Huyện', '20 27 21N, 106 07 56E', 36),
(359, 'Vụ Bản', 'Huyện', '20 22 57N, 106 05 35E', 36),
(360, 'Ý Yên', 'Huyện', '20 19 48N, 106 01 55E', 36),
(361, 'Nghĩa Hưng', 'Huyện', '20 05 37N, 106 08 59E', 36),
(362, 'Nam Trực', 'Huyện', '20 20 08N, 106 12 54E', 36),
(363, 'Trực Ninh', 'Huyện', '20 14 42N, 106 12 45E', 36),
(364, 'Xuân Trường', 'Huyện', '20 17 53N, 106 21 43E', 36),
(365, 'Giao Thủy', 'Huyện', '20 14 45N, 106 28 39E', 36),
(366, 'Hải Hậu', 'Huyện', '20 06 26N, 106 16 29E', 36),
(369, 'Ninh Bình', 'Thành Phố', '20 14 45N, 105 58 24E', 37),
(370, 'Tam Điệp', 'Thị Xã', '20 09 42N, 103 52 43E', 37),
(372, 'Nho Quan', 'Huyện', '20 18 46N, 105 42 48E', 37),
(373, 'Gia Viễn', 'Huyện', '20 19 50N, 105 52 20E', 37),
(374, 'Hoa Lư', 'Huyện', '20 15 04N, 105 55 52E', 37),
(375, 'Yên Khánh', 'Huyện', '20 11 26N, 106 04 33E', 37),
(376, 'Kim Sơn', 'Huyện', '20 02 07N, 106 05 27E', 37),
(377, 'Yên Mô', 'Huyện', '20 07 45N, 105 59 45E', 37),
(380, 'Thanh Hóa', 'Thành Phố', '19 48 26N, 105 47 37E', 38),
(381, 'Bỉm Sơn', 'Thị Xã', '20 05 21N, 105 51 48E', 38),
(382, 'Sầm Sơn', 'Thị Xã', '19 45 11N, 105 54 03E', 38),
(384, 'Mường Lát', 'Huyện', '20 30 42N, 104 37 27E', 38),
(385, 'Quan Hóa', 'Huyện', '20 29 15N, 104 56 35E', 38),
(386, 'Bá Thước', 'Huyện', '20 22 48N, 105 14 50E', 38),
(387, 'Quan Sơn', 'Huyện', '20 15 17N, 104 51 58E', 38),
(388, 'Lang Chánh', 'Huyện', '20 08 58N, 105 07 40E', 38),
(389, 'Ngọc Lặc', 'Huyện', '20 04 08N, 105 22 39E', 38),
(390, 'Cẩm Thủy', 'Huyện', '20 12 20N, 105 27 22E', 38),
(391, 'Thạch Thành', 'Huyện', '21 12 41N, 105 36 38E', 38),
(392, 'Hà Trung', 'Huyện', '20 03 20N, 105 51 20E', 38),
(393, 'Vĩnh Lộc', 'Huyện', '20 02 29N, 105 39 28E', 38),
(394, 'Yên Định', 'Huyện', '20 00 31N, 105 37 44E', 38),
(395, 'Thọ Xuân', 'Huyện', '19 55 39N, 105 29 14E', 38),
(396, 'Thường Xuân', 'Huyện', '19 54 55N, 105 10 46E', 38),
(397, 'Triệu Sơn', 'Huyện', '19 48 11N, 105 34 03E', 38),
(398, 'Thiệu Hoá', 'Huyện', '19 53 56N, 105 40 57E', 38),
(399, 'Hoằng Hóa', 'Huyện', '19 51 59N, 105 51 34E', 38),
(400, 'Hậu Lộc', 'Huyện', '19 56 02N, 105 53 19E', 38),
(401, 'Nga Sơn', 'Huyện', '20 00 16N, 105 59 26E', 38),
(402, 'Như Xuân', 'Huyện', '19 5 55N, 105 20 22E', 38),
(403, 'Như Thanh', 'Huyện', '19 35 19N, 105 33 09E', 38),
(404, 'Nông Cống', 'Huyện', '19 36 58N, 105 40 54E', 38),
(405, 'Đông Sơn', 'Huyện', '19 47 44N, 105 42 19E', 38),
(406, 'Quảng Xương', 'Huyện', '19 40 53N, 105 48 01E', 38),
(407, 'Tĩnh Gia', 'Huyện', '19 27 13N, 105 43 38E', 38),
(412, 'Vinh', 'Thành Phố', '18 41 06N, 105 42 05E', 40),
(413, 'Cửa Lò', 'Thị Xã', '18 47 26N, 105 43 31E', 40),
(414, 'Thái Hoà', 'Thị Xã', '', 40),
(415, 'Quế Phong', 'Huyện', '19 42 25N, 104 54 21E', 40),
(416, 'Quỳ Châu', 'Huyện', '19 32 16N, 105 03 18E', 40),
(417, 'Kỳ Sơn', 'Huyện', '19 24 36N, 104 09 45E', 40),
(418, 'Tương Dương', 'Huyện', '19 19 15N, 104 35 41E', 40),
(419, 'Nghĩa Đàn', 'Huyện', '19 21 19N, 105 26 33E', 40),
(420, 'Quỳ Hợp', 'Huyện', '19 19 24N, 105 09 12E', 40),
(421, 'Quỳnh Lưu', 'Huyện', '19 14 01N, 105 37 00E', 40),
(422, 'Con Cuông', 'Huyện', '19 03 50N, 107 47 15E', 40),
(423, 'Tân Kỳ', 'Huyện', '19 06 11N, 105 14 14E', 40),
(424, 'Anh Sơn', 'Huyện', '18 58 04N, 105 04 30E', 40),
(425, 'Diễn Châu', 'Huyện', '19 01 20N, 105 34 13E', 40),
(426, 'Yên Thành', 'Huyện', '19 01 25N, 105 26 17E', 40),
(427, 'Đô Lương', 'Huyện', '18 55 00N, 105 21 03E', 40),
(428, 'Thanh Chương', 'Huyện', '18 44 11N, 105 12 59E', 40),
(429, 'Nghi Lộc', 'Huyện', '18 47 41N, 105 31 30E', 40),
(430, 'Nam Đàn', 'Huyện', '18 40 28N, 105 30 32E', 40),
(431, 'Hưng Nguyên', 'Huyện', '18 41 13N, 105 37 41E', 40),
(436, 'Hà Tĩnh', 'Thành Phố', '18 21 20N, 105 54 00E', 42),
(437, 'Hồng Lĩnh', 'Thị Xã', '18 32 05N, 105 42 40E', 42),
(439, 'Hương Sơn', 'Huyện', '18 26 47N, 105 19 36E', 42),
(440, 'Đức Thọ', 'Huyện', '18 29 23N, 105 36 39E', 42),
(441, 'Vũ Quang', 'Huyện', '18 19 30N, 105 26 38E', 42),
(442, 'Nghi Xuân', 'Huyện', '18 38 46N, 105 46 17E', 42),
(443, 'Can Lộc', 'Huyện', '18 26 39N, 105 46 13E', 42),
(444, 'Hương Khê', 'Huyện', '18 11 36N, 105 41 24E', 42),
(445, 'Thạch Hà', 'Huyện', '18 19 29N, 105 52 43E', 42),
(446, 'Cẩm Xuyên', 'Huyện', '18 11 32N, 106 00 04E', 42),
(447, 'Kỳ Anh', 'Huyện', '18 05 15N, 106 15 49E', 42),
(448, 'Lộc Hà', 'Huyện', '', 42),
(450, 'Đồng Hới', 'Thành Phố', '17 26 53N, 106 35 15E', 44),
(452, 'Minh Hóa', 'Huyện', '17 44 03N, 105 51 45E', 44),
(453, 'Tuyên Hóa', 'Huyện', '17 54 04N, 105 58 17E', 44),
(454, 'Quảng Trạch', 'Huyện', '17 50 04N, 106 22 24E', 44),
(455, 'Bố Trạch', 'Huyện', '17 29 13N, 106 06 54E', 44),
(456, 'Quảng Ninh', 'Huyện', '17 15 15N, 106 32 31E', 44),
(457, 'Lệ Thủy', 'Huyện', '17 07 35N, 106 41 47E', 44),
(461, 'Đông Hà', 'Thành Phố', '16 48 12N, 107 05 12E', 45),
(462, 'Quảng Trị', 'Thị Xã', '16 44 37N, 107 11 20E', 45),
(464, 'Vĩnh Linh', 'Huyện', '17 01 35N, 106 53 49E', 45),
(465, 'Hướng Hóa', 'Huyện', '16 42 19N, 106 40 14E', 45),
(466, 'Gio Linh', 'Huyện', '16 54 49N, 106 56 16E', 45),
(467, 'Đa Krông', 'Huyện', '16 33 58N, 106 55 49E', 45),
(468, 'Cam Lộ', 'Huyện', '16 47 09N, 106 57 52E', 45),
(469, 'Triệu Phong', 'Huyện', '16 46 32N, 107 09 12E', 45),
(470, 'Hải Lăng', 'Huyện', '16 41 07N, 107 13 34E', 45),
(471, 'Cồn Cỏ', 'Huyện', '19 09 39N, 107 19 58E', 45),
(474, 'Huế', 'Thành Phố', '16 27 16N, 107 34 29E', 46),
(476, 'Phong Điền', 'Huyện', '16 32 42N, 106 16 37E', 46),
(477, 'Quảng Điền', 'Huyện', '16 35 21N, 107 29 31E', 46),
(478, 'Phú Vang', 'Huyện', '16 27 20N, 107 42 28E', 46),
(479, 'Hương Thủy', 'Huyện', '16 19 27N, 107 37 26E', 46),
(480, 'Hương Trà', 'Huyện', '16 25 49N, 107 28 37E', 46),
(481, 'A Lưới', 'Huyện', '16 13 59N, 107 16 12E', 46),
(482, 'Phú Lộc', 'Huyện', '16 17 16N, 107 55 25E', 46),
(483, 'Nam Đông', 'Huyện', '16 07 11N, 107 41 25E', 46),
(490, 'Liên Chiểu', 'Quận', '16 07 26N, 108 07 04E', 48),
(491, 'Thanh Khê', 'Quận', '16 03 28N, 108 11 00E', 48),
(492, 'Hải Châu', 'Quận', '16 03 38N, 108 11 46E', 48),
(493, 'Sơn Trà', 'Quận', '16 06 13N, 108 16 26E', 48),
(494, 'Ngũ Hành Sơn', 'Quận', '16 00 30N, 108 15 09E', 48),
(495, 'Cẩm Lệ', 'Quận', '', 48),
(497, 'Hoà Vang', 'Huyện', '16 03 59N, 108 01 57E', 48),
(498, 'Hoàng Sa', 'Huyện', '16 21 36N, 111 57 01E', 48),
(502, 'Tam Kỳ', 'Thành Phố', '15 34 37N, 108 29 52E', 49),
(503, 'Hội An', 'Thành Phố', '15 53 20N, 108 20 42E', 49),
(504, 'Tây Giang', 'Huyện', '15 53 46N, 107 25 52E', 49),
(505, 'Đông Giang', 'Huyện', '15 54 44N, 107 47 06E', 49),
(506, 'Đại Lộc', 'Huyện', '15 50 10N, 107 58 27E', 49),
(507, 'Điện Bàn', 'Huyện', '15 54 15N, 108 13 38E', 49),
(508, 'Duy Xuyên', 'Huyện', '15 47 58N, 108 13 27E', 49),
(509, 'Quế Sơn', 'Huyện', '15 41 03N, 108 05 34E', 49),
(510, 'Nam Giang', 'Huyện', '15 36 37N, 107 33 52E', 49),
(511, 'Phước Sơn', 'Huyện', '15 23 17N, 107 50 22E', 49),
(512, 'Hiệp Đức', 'Huyện', '15 31 09N, 108 05 56E', 49),
(513, 'Thăng Bình', 'Huyện', '15 42 29N, 108 22 04E', 49),
(514, 'Tiên Phước', 'Huyện', '15 29 30N, 108 15 28E', 49),
(515, 'Bắc Trà My', 'Huyện', '15 08 00N, 108 05 32E', 49),
(516, 'Nam Trà My', 'Huyện', '15 16 40N, 108 12 15E', 49),
(517, 'Núi Thành', 'Huyện', '15 26 53N, 108 34 49E', 49),
(518, 'Phú Ninh', 'Huyện', '15 30 43N, 108 24 43E', 49),
(519, 'Nông Sơn', 'Huyện', '', 49),
(522, 'Quảng Ngãi', 'Thành Phố', '15 07 17N, 108 48 24E', 51),
(524, 'Bình Sơn', 'Huyện', '15 18 45N, 108 45 35E', 51),
(525, 'Trà Bồng', 'Huyện', '15 13 30N, 108 29 57E', 51),
(526, 'Tây Trà', 'Huyện', '15 11 13N, 108 22 23E', 51),
(527, 'Sơn Tịnh', 'Huyện', '15 11 49N, 108 45 03E', 51),
(528, 'Tư Nghĩa', 'Huyện', '15 05 25N, 108 45 23E', 51),
(529, 'Sơn Hà', 'Huyện', '14 58 35N, 108 29 09E', 51),
(530, 'Sơn Tây', 'Huyện', '14 58 11N, 108 21 22E', 51),
(531, 'Minh Long', 'Huyện', '14 56 49N, 108 40 19E', 51),
(532, 'Nghĩa Hành', 'Huyện', '14 58 06N, 108 46 05E', 51),
(533, 'Mộ Đức', 'Huyện', '11 59 13N, 108 52 21E', 51),
(534, 'Đức Phổ', 'Huyện', '14 44 59N, 108 56 58E', 51),
(535, 'Ba Tơ', 'Huyện', '14 42 52N, 108 43 44E', 51),
(536, 'Lý Sơn', 'Huyện', '15 22 50N, 109 06 56E', 51),
(540, 'Qui Nhơn', 'Thành Phố', '13 47 15N, 109 12 48E', 52),
(542, 'An Lão', 'Huyện', '14 32 10N, 108 47 52E', 52),
(543, 'Hoài Nhơn', 'Huyện', '14 30 56N, 109 01 56E', 52),
(544, 'Hoài Ân', 'Huyện', '14 20 51N, 108 54 04E', 52),
(545, 'Phù Mỹ', 'Huyện', '14 14 41N, 109 05 43E', 52),
(546, 'Vĩnh Thạnh', 'Huyện', '14 14 26N, 108 44 08E', 52),
(547, 'Tây Sơn', 'Huyện', '13 56 47N, 108 53 06E', 52),
(548, 'Phù Cát', 'Huyện', '14 03 48N, 109 03 57E', 52),
(549, 'An Nhơn', 'Huyện', '13 51 28N, 109 04 02E', 52),
(550, 'Tuy Phước', 'Huyện', '13 46 30N, 109 05 38E', 52),
(551, 'Vân Canh', 'Huyện', '13 40 35N, 108 57 52E', 52),
(555, 'Tuy Hòa', 'Thành Phố', '13 05 42N, 109 15 50E', 54),
(557, 'Sông Cầu', 'Thị Xã', '13 31 40N, 109 12 39E', 54),
(558, 'Đồng Xuân', 'Huyện', '13 24 59N, 108 56 46E', 54),
(559, 'Tuy An', 'Huyện', '13 15 19N, 109 12 21E', 54),
(560, 'Sơn Hòa', 'Huyện', '13 12 16N, 108 57 17E', 54),
(561, 'Sông Hinh', 'Huyện', '12 54 19N, 108 53 38E', 54),
(562, 'Tây Hoà', 'Huyện', '', 54),
(563, 'Phú Hoà', 'Huyện', '13 04 07N, 109 11 24E', 54),
(564, 'Đông Hoà', 'Huyện', '', 54),
(568, 'Nha Trang', 'Thành Phố', '12 15 40N, 109 10 40E', 56),
(569, 'Cam Ranh', 'Thị Xã', '11 59 05N, 108 08 17E', 56),
(570, 'Cam Lâm', 'Huyện', '', 56),
(571, 'Vạn Ninh', 'Huyện', '12 43 10N, 109 11 18E', 56),
(572, 'Ninh Hòa', 'Huyện', '12 32 54N, 109 06 11E', 56),
(573, 'Khánh Vĩnh', 'Huyện', '12 17 50N, 108 51 56E', 56),
(574, 'Diên Khánh', 'Huyện', '12 13 19N, 109 02 16E', 56),
(575, 'Khánh Sơn', 'Huyện', '12 02 17N, 108 53 47E', 56),
(576, 'Trường Sa', 'Huyện', '9 07 27N, 114 15 00E', 56),
(582, 'Phan Rang-Tháp Chàm', 'Thành Phố', '11 36 11N, 108 58 34E', 58),
(584, 'Bác Ái', 'Huyện', '11 54 45N, 108 51 29E', 58),
(585, 'Ninh Sơn', 'Huyện', '11 42 36N, 108 44 55E', 58),
(586, 'Ninh Hải', 'Huyện', '11 42 46N, 109 05 41E', 58),
(587, 'Ninh Phước', 'Huyện', '11 28 56N, 108 50 34E', 58),
(588, 'Thuận Bắc', 'Huyện', '', 58),
(589, 'Thuận Nam', 'Huyện', '', 58),
(593, 'Phan Thiết', 'Thành Phố', '10 54 16N, 108 03 44E', 60),
(594, 'La Gi', 'Thị Xã', '', 60),
(595, 'Tuy Phong', 'Huyện', '11 20 26N, 108 41 15E', 60),
(596, 'Bắc Bình', 'Huyện', '11 15 52N, 108 21 33E', 60),
(597, 'Hàm Thuận Bắc', 'Huyện', '11 09 18N, 108 03 07E', 60),
(598, 'Hàm Thuận Nam', 'Huyện', '10 56 20N, 107 54 38E', 60),
(599, 'Tánh Linh', 'Huyện', '11 08 26N, 107 41 22E', 60),
(600, 'Đức Linh', 'Huyện', '11 11 43N, 107 31 34E', 60),
(601, 'Hàm Tân', 'Huyện', '10 44 41N, 107 41 33E', 60),
(602, 'Phú Quí', 'Huyện', '10 33 13N, 108 57 46E', 60),
(608, 'Kon Tum', 'Thành Phố', '14 20 32N, 107 58 04E', 62),
(610, 'Đắk Glei', 'Huyện', '15 08 13N, 107 44 03E', 62),
(611, 'Ngọc Hồi', 'Huyện', '14 44 23N, 107 38 49E', 62),
(612, 'Đắk Tô', 'Huyện', '14 46 49N, 107 55 36E', 62),
(613, 'Kon Plông', 'Huyện', '14 48 13N, 108 20 05E', 62),
(614, 'Kon Rẫy', 'Huyện', '14 32 56N, 108 13 09E', 62),
(615, 'Đắk Hà', 'Huyện', '14 36 50N, 107 59 55E', 62),
(616, 'Sa Thầy', 'Huyện', '14 16 02N, 107 36 30E', 62),
(617, 'Tu Mơ Rông', 'Huyện', '', 62),
(622, 'Pleiku', 'Thành Phố', '13 57 42N, 107 58 03E', 64),
(623, 'An Khê', 'Thị Xã', '14 01 24N, 108 41 29E', 64),
(624, 'Ayun Pa', 'Thị Xã', '', 64),
(625, 'Kbang', 'Huyện', '14 18 08N, 108 29 17E', 64),
(626, 'Đăk Đoa', 'Huyện', '14 07 02N, 108 09 36E', 64),
(627, 'Chư Păh', 'Huyện', '14 13 30N, 107 56 33E', 64),
(628, 'Ia Grai', 'Huyện', '13 59 25N, 107 43 16E', 64),
(629, 'Mang Yang', 'Huyện', '13 57 26N, 108 18 37E', 64),
(630, 'Kông Chro', 'Huyện', '13 45 47N, 108 36 04E', 64),
(631, 'Đức Cơ', 'Huyện', '13 46 16N, 107 38 26E', 64),
(632, 'Chư Prông', 'Huyện', '13 35 39N, 107 47 36E', 64),
(633, 'Chư Sê', 'Huyện', '13 37 04N, 108 06 56E', 64),
(634, 'Đăk Pơ', 'Huyện', '13 55 47N, 108 36 16E', 64),
(635, 'Ia Pa', 'Huyện', '13 31 37N, 108 30 34E', 64),
(637, 'Krông Pa', 'Huyện', '13 14 13N, 108 39 12E', 64),
(638, 'Phú Thiện', 'Huyện', '', 64),
(639, 'Chư Pưh', 'Huyện', '', 64),
(643, 'Buôn Ma Thuột', 'Thành Phố', '12 39 43N, 108 10 40E', 66),
(644, 'Buôn Hồ', 'Thị Xã', '', 66),
(645, 'Ea H''leo', 'Huyện', '13 13 52N, 108 12 30E', 66),
(646, 'Ea Súp', 'Huyện', '13 10 59N, 107 46 49E', 66),
(647, 'Buôn Đôn', 'Huyện', '12 52 45N, 107 45 20E', 66),
(648, 'Cư M''gar', 'Huyện', '12 53 47N, 108 04 16E', 66),
(649, 'Krông Búk', 'Huyện', '12 56 27N, 108 13 54E', 66),
(650, 'Krông Năng', 'Huyện', '12 59 41N, 108 23 42E', 66),
(651, 'Ea Kar', 'Huyện', '12 48 17N, 108 32 42E', 66),
(652, 'M''đrắk', 'Huyện', '12 42 14N, 108 47 09E', 66),
(653, 'Krông Bông', 'Huyện', '12 27 08N, 108 27 01E', 66),
(654, 'Krông Pắc', 'Huyện', '12 41 20N, 108 18 42E', 66),
(655, 'Krông A Na', 'Huyện', '12 31 51N, 108 05 03E', 66),
(656, 'Lắk', 'Huyện', '12 19 20N, 108 12 17E', 66),
(657, 'Cư Kuin', 'Huyện', '', 66),
(660, 'Gia Nghĩa', 'Thị Xã', '', 67),
(661, 'Đắk Glong', 'Huyện', '12 01 53N, 107 50 37E', 67),
(662, 'Cư Jút', 'Huyện', '12 40 56N, 107 44 44E', 67),
(663, 'Đắk Mil', 'Huyện', '12 31 08N, 107 42 24E', 67),
(664, 'Krông Nô', 'Huyện', '12 22 16N, 107 53 49E', 67),
(665, 'Đắk Song', 'Huyện', '12 14 04N, 107 36 30E', 67),
(666, 'Đắk R''lấp', 'Huyện', '12 02 30N, 107 25 59E', 67),
(667, 'Tuy Đức', 'Huyện', '', 67),
(672, 'Đà Lạt', 'Thành Phố', '11 54 33N, 108 27 08E', 68),
(673, 'Bảo Lộc', 'Thị Xã', '11 32 48N, 107 47 37E', 68),
(674, 'Đam Rông', 'Huyện', '12 02 35N, 108 10 26E', 68),
(675, 'Lạc Dương', 'Huyện', '12 08 30N, 108 27 48E', 68),
(676, 'Lâm Hà', 'Huyện', '11 55 26N, 108 11 31E', 68),
(677, 'Đơn Dương', 'Huyện', '11 48 26N, 108 32 48E', 68),
(678, 'Đức Trọng', 'Huyện', '11 41 50N, 108 18 58E', 68),
(679, 'Di Linh', 'Huyện', '11 31 10N, 108 05 23E', 68),
(680, 'Bảo Lâm', 'Huyện', '11 38 31N, 107 43 25E', 68),
(681, 'Đạ Huoai', 'Huyện', '11 27 11N, 107 38 08E', 68),
(682, 'Đạ Tẻh', 'Huyện', '11 33 46N, 107 32 00E', 68),
(683, 'Cát Tiên', 'Huyện', '11 39 38N, 107 23 27E', 68),
(688, 'Phước Long', 'Thị Xã', '', 70),
(689, 'Đồng Xoài', 'Thị Xã', '11 31 01N, 106 50 21E', 70),
(690, 'Bình Long', 'Thị Xã', '', 70),
(691, 'Bù Gia Mập', 'Huyện', '11 56 57N, 106 59 21E', 70),
(692, 'Lộc Ninh', 'Huyện', '11 49 28N, 106 35 11E', 70),
(693, 'Bù Đốp', 'Huyện', '11 59 08N, 106 49 54E', 70),
(694, 'Hớn Quản', 'Huyện', '11 37 37N, 106 36 02E', 70),
(695, 'Đồng Phù', 'Huyện', '11 28 45N, 106 57 07E', 70),
(696, 'Bù Đăng', 'Huyện', '11 46 09N, 107 14 14E', 70),
(697, 'Chơn Thành', 'Huyện', '11 28 45N, 106 39 26E', 70),
(703, 'Tây Ninh', 'Thị Xã', '11 21 59N, 106 07 47E', 72),
(705, 'Tân Biên', 'Huyện', '11 35 14N, 105 57 53E', 72),
(706, 'Tân Châu', 'Huyện', '11 34 49N, 106 17 48E', 72),
(707, 'Dương Minh Châu', 'Huyện', '11 22 04N, 106 16 58E', 72),
(708, 'Châu Thành', 'Huyện', '11 19 02N, 106 00 15E', 72),
(709, 'Hòa Thành', 'Huyện', '11 15 31N, 106 08 44E', 72),
(710, 'Gò Dầu', 'Huyện', '11 09 39N, 106 14 42E', 72),
(711, 'Bến Cầu', 'Huyện', '11 07 50N, 106 08 25E', 72),
(712, 'Trảng Bàng', 'Huyện', '11 06 18N, 106 23 12E', 72),
(718, 'Thủ Dầu Một', 'Thị Xã', '11 00 01N, 106 38 56E', 74),
(720, 'Dầu Tiếng', 'Huyện', '11 19 07N, 106 26 59E', 74),
(721, 'Bến Cát', 'Huyện', '11 12 42N, 106 36 28E', 74),
(722, 'Phú Giáo', 'Huyện', '11 20 21N, 106 47 48E', 74),
(723, 'Tân Uyên', 'Huyện', '11 06 31N, 106 49 02E', 74),
(724, 'Dĩ An', 'Huyện', '10 55 03N, 106 47 09E', 74),
(725, 'Thuận An', 'Huyện', '10 55 58N, 106 41 59E', 74),
(731, 'Biên Hòa', 'Thành Phố', '10 56 31N, 106 50 50E', 75),
(732, 'Long Khánh', 'Thị Xã', '10 56 24N, 107 14 29E', 75),
(734, 'Tân Phú', 'Huyện', '11 22 51N, 107 21 35E', 75),
(735, 'Vĩnh Cửu', 'Huyện', '11 14 31N, 107 00 06E', 75),
(736, 'Định Quán', 'Huyện', '11 12 41N, 107 17 03E', 75),
(737, 'Trảng Bom', 'Huyện', '10 58 39N, 107 00 52E', 75),
(738, 'Thống Nhất', 'Huyện', '10 58 29N, 107 09 26E', 75),
(739, 'Cẩm Mỹ', 'Huyện', '10 47 05N, 107 14 36E', 75),
(740, 'Long Thành', 'Huyện', '10 47 38N, 106 59 42E', 75),
(741, 'Xuân Lộc', 'Huyện', '10 55 39N, 107 24 21E', 75),
(742, 'Nhơn Trạch', 'Huyện', '10 39 18N, 106 53 18E', 75),
(747, 'Vũng Tầu', 'Thành Phố', '10 24 08N, 107 07 05E', 77),
(748, 'Bà Rịa', 'Thị Xã', '10 30 33N, 107 10 47E', 77),
(750, 'Châu Đức', 'Huyện', '10 39 23N, 107 15 08E', 77),
(751, 'Xuyên Mộc', 'Huyện', '10 37 46N, 107 29 39E', 77),
(752, 'Long Điền', 'Huyện', '10 26 47N, 107 12 53E', 77),
(753, 'Đất Đỏ', 'Huyện', '10 28 40N, 107 18 27E', 77),
(754, 'Tân Thành', 'Huyện', '10 34 50N, 107 05 06E', 77),
(755, 'Côn Đảo', 'Huyện', '8 42 25N, 106 36 05E', 77),
(760, '1', 'Quận', '10 46 34N, 106 41 45E', 79),
(761, '12', 'Quận', '10 51 43N, 106 39 32E', 79),
(762, 'Thủ Đức', 'Quận', '10 51 20N, 106 45 05E', 79),
(763, '9', 'Quận', '10 49 49N, 106 49 03E', 79),
(764, 'Gò Vấp', 'Quận', '10 50 12N, 106 39 52E', 79),
(765, 'Bình Thạnh', 'Quận', '10 48 46N, 106 42 57E', 79),
(766, 'Tân Bình', 'Quận', '10 48 13N, 106 39 03E', 79),
(767, 'Tân Phú', 'Quận', '10 47 32N, 106 37 31E', 79),
(768, 'Phú Nhuận', 'Quận', '10 48 06N, 106 40 39E', 79),
(769, '2', 'Quận', '10 46 51N, 106 45 25E', 79),
(770, '3', 'Quận', '10 46 48N, 106 40 46E', 79),
(771, '10', 'Quận', '10 46 25N, 106 40 02E', 79),
(772, '11', 'Quận', '10 46 01N, 106 38 44E', 79),
(773, '4', 'Quận', '10 45 42N, 106 42 09E', 79),
(774, '5', 'Quận', '10 45 24N, 106 40 00E', 79),
(775, '6', 'Quận', '10 44 46N, 106 38 10E', 79),
(776, '8', 'Quận', '10 43 24N, 106 37 40E', 79),
(777, 'Bình Tân', 'Quận', '10 46 16N, 106 35 26E', 79),
(778, '7', 'Quận', '10 44 19N, 106 43 35E', 79),
(783, 'Củ Chi', 'Huyện', '11 02 17N, 106 30 20E', 79),
(784, 'Hóc Môn', 'Huyện', '10 52 42N, 106 35 33E', 79),
(785, 'Bình Chánh', 'Huyện', '10 45 01N, 106 30 45E', 79),
(786, 'Nhà Bè', 'Huyện', '10 39 06N, 106 43 35E', 79),
(787, 'Cần Giờ', 'Huyện', '10 30 43N, 106 52 50E', 79),
(794, 'Tân An', 'Thành Phố', '10 31 36N, 106 24 06E', 80),
(796, 'Tân Hưng', 'Huyện', '10 49 05N, 105 39 26E', 80),
(797, 'Vĩnh Hưng', 'Huyện', '10 52 54N, 105 45 58E', 80),
(798, 'Mộc Hóa', 'Huyện', '10 47 09N, 105 57 56E', 80),
(799, 'Tân Thạnh', 'Huyện', '10 37 44N, 105 57 07E', 80),
(800, 'Thạnh Hóa', 'Huyện', '10 41 37N, 106 11 08E', 80),
(801, 'Đức Huệ', 'Huyện', '10 51 57N, 106 15 48E', 80),
(802, 'Đức Hòa', 'Huyện', '10 53 04N, 106 23 58E', 80),
(803, 'Bến Lức', 'Huyện', '10 41 40N, 106 26 28E', 80),
(804, 'Thủ Thừa', 'Huyện', '10 39 41N, 106 20 12E', 80),
(805, 'Tân Trụ', 'Huyện', '10 31 47N, 106 30 06E', 80),
(806, 'Cần Đước', 'Huyện', '10 32 21N, 106 36 33E', 80),
(807, 'Cần Giuộc', 'Huyện', '10 34 43N, 106 38 35E', 80),
(808, 'Châu Thành', 'Huyện', '10 27 52N, 106 30 00E', 80),
(815, 'Mỹ Tho', 'Thành Phố', '10 22 14N, 106 21 52E', 82),
(816, 'Gò Công', 'Thị Xã', '10 21 55N, 106 40 24E', 82),
(818, 'Tân Phước', 'Huyện', '10 30 36N, 106 13 02E', 82),
(819, 'Cái Bè', 'Huyện', '10 24 21N, 105 56 01E', 82),
(820, 'Cai Lậy', 'Huyện', '10 24 20N, 106 06 05E', 82),
(821, 'Châu Thành', 'Huyện', '20 25 21N, 106 16 57E', 82),
(822, 'Chợ Gạo', 'Huyện', '10 23 45N, 106 26 53E', 82),
(823, 'Gò Công Tây', 'Huyện', '10 19 55N, 106 35 02E', 82),
(824, 'Gò Công Đông', 'Huyện', '10 20 42N, 106 42 54E', 82),
(825, 'Tân Phú Đông', 'Huyện', '', 82),
(829, 'Bến Tre', 'Thành Phố', '10 14 17N, 106 22 26E', 83),
(831, 'Châu Thành', 'Huyện', '10 17 24N, 106 17 45E', 83),
(832, 'Chợ Lách', 'Huyện', '10 13 26N, 106 09 08E', 83),
(833, 'Mỏ Cày Nam', 'Huyện', '10 06 56N, 106 19 40E', 83),
(834, 'Giồng Trôm', 'Huyện', '10 08 46N, 106 28 12E', 83),
(835, 'Bình Đại', 'Huyện', '10 09 56N, 106 37 46E', 83),
(836, 'Ba Tri', 'Huyện', '10 04 08N, 106 35 10E', 83),
(837, 'Thạnh Phú', 'Huyện', '9 55 53N, 106 32 45E', 83),
(838, 'Mỏ Cày Bắc', 'Huyện', '', 83),
(842, 'Trà Vinh', 'Thị Xã', '9 57 09N, 106 20 39E', 84),
(844, 'Càng Long', 'Huyện', '9 58 18N, 106 12 52E', 84),
(845, 'Cầu Kè', 'Huyện', '9 51 23N, 106 03 33E', 84),
(846, 'Tiểu Cần', 'Huyện', '9 48 37N, 106 12 06E', 84),
(847, 'Châu Thành', 'Huyện', '9 52 57N, 106 24 12E', 84),
(848, 'Cầu Ngang', 'Huyện', '9 47 14N, 106 29 19E', 84),
(849, 'Trà Cú', 'Huyện', '9 42 06N, 106 16 24E', 84),
(850, 'Duyên Hải', 'Huyện', '9 39 58N, 106 26 23E', 84),
(855, 'Vĩnh Long', 'Thành Phố', '10 15 09N, 105 56 08E', 86),
(857, 'Long Hồ', 'Huyện', '10 13 58N, 105 55 47E', 86),
(858, 'Mang Thít', 'Huyện', '10 10 58N, 106 05 13E', 86),
(859, 'Vũng Liêm', 'Huyện', '10 03 32N, 106 10 35E', 86),
(860, 'Tam Bình', 'Huyện', '10 03 58N, 105 58 03E', 86),
(861, 'Bình Minh', 'Huyện', '10 05 45N, 105 47 21E', 86),
(862, 'Trà Ôn', 'Huyện', '9 59 20N, 105 57 56E', 86),
(863, 'Bình Tân', 'Huyện', '', 86),
(866, 'Cao Lãnh', 'Thành Phố', '10 27 38N, 105 37 21E', 87),
(867, 'Sa Đéc', 'Thị Xã', '10 19 22N, 105 44 31E', 87),
(868, 'Hồng Ngự', 'Thị Xã', '', 87),
(869, 'Tân Hồng', 'Huyện', '10 52 48N, 105 29 21E', 87),
(870, 'Hồng Ngự', 'Huyện', '10 48 13N, 105 19 00E', 87),
(871, 'Tam Nông', 'Huyện', '10 44 06N, 105 30 58E', 87),
(872, 'Tháp Mười', 'Huyện', '10 33 36N, 105 47 13E', 87),
(873, 'Cao Lãnh', 'Huyện', '10 29 03N, 105 41 40E', 87),
(874, 'Thanh Bình', 'Huyện', '10 36 38N, 105 28 51E', 87),
(875, 'Lấp Vò', 'Huyện', '10 21 27N, 105 36 06E', 87),
(876, 'Lai Vung', 'Huyện', '10 14 43N, 105 38 40E', 87),
(877, 'Châu Thành', 'Huyện', '10 13 27N, 105 48 38E', 87),
(883, 'Long Xuyên', 'Thành Phố', '10 22 22N, 105 25 33E', 89),
(884, 'Châu Đốc', 'Thị Xã', '10 41 20N, 105 05 15E', 89),
(886, 'An Phú', 'Huyện', '10 50 12N, 105 05 33E', 89),
(887, 'Tân Châu', 'Thị Xã', '10 49 11N, 105 11 18E', 89),
(888, 'Phú Tân', 'Huyện', '10 40 26N, 105 14 40E', 89),
(889, 'Châu Phú', 'Huyện', '10 34 12N, 105 12 13E', 89),
(890, 'Tịnh Biên', 'Huyện', '10 33 30N, 105 00 17E', 89),
(891, 'Tri Tôn', 'Huyện', '10 24 41N, 104 56 58E', 89),
(892, 'Châu Thành', 'Huyện', '10 25 39N, 105 15 31E', 89),
(893, 'Chợ Mới', 'Huyện', '10 27 23N, 105 26 57E', 89),
(894, 'Thoại Sơn', 'Huyện', '10 16 45N, 105 15 59E', 89),
(899, 'Rạch Giá', 'Thành Phố', '10 01 35N, 105 06 20E', 91),
(900, 'Hà Tiên', 'Thị Xã', '10 22 54N, 104 30 10E', 91),
(902, 'Kiên Lương', 'Huyện', '10 20 21N, 104 39 46E', 91),
(903, 'Hòn Đất', 'Huyện', '10 14 20N, 104 55 57E', 91),
(904, 'Tân Hiệp', 'Huyện', '10 05 18N, 105 14 04E', 91),
(905, 'Châu Thành', 'Huyện', '9 57 37N, 105 10 16E', 91),
(906, 'Giồng Giềng', 'Huyện', '9 56 05N, 105 22 06E', 91),
(907, 'Gò Quao', 'Huyện', '9 43 17N, 105 17 06E', 91),
(908, 'An Biên', 'Huyện', '9 48 37N, 105 03 18E', 91),
(909, 'An Minh', 'Huyện', '9 40 24N, 104 59 05E', 91),
(910, 'Vĩnh Thuận', 'Huyện', '9 33 25N, 105 11 30E', 91),
(911, 'Phú Quốc', 'Huyện', '10 13 44N, 103 57 25E', 91),
(912, 'Kiên Hải', 'Huyện', '9 48 31N, 104 37 48E', 91),
(913, 'U Minh Thượng', 'Huyện', '', 91),
(914, 'Giang Thành', 'Huyện', '', 91),
(916, 'Ninh Kiều', 'Quận', '10 01 58N, 105 45 34E', 92),
(917, 'Ô Môn', 'Quận', '10 07 28N, 105 37 51E', 92),
(918, 'Bình Thuỷ', 'Quận', '10 03 42N, 105 43 17E', 92),
(919, 'Cái Răng', 'Quận', '9 59 57N, 105 46 56E', 92),
(923, 'Thốt Nốt', 'Quận', '10 14 23N, 105 32 02E', 92),
(924, 'Vĩnh Thạnh', 'Huyện', '10 11 35N, 105 22 45E', 92),
(925, 'Cờ Đỏ', 'Huyện', '10 02 48N, 105 29 46E', 92),
(926, 'Phong Điền', 'Huyện', '9 59 57N, 105 39 35E', 92),
(927, 'Thới Lai', 'Huyện', '', 92),
(930, 'Vị Thanh', 'Thị Xã', '9 45 15N, 105 24 50E', 93),
(931, 'Ngã Bảy', 'Thị Xã', '', 93),
(932, 'Châu Thành A', 'Huyện', '9 55 50N, 105 38 31E', 93),
(933, 'Châu Thành', 'Huyện', '9 55 22N, 105 48 37E', 93),
(934, 'Phụng Hiệp', 'Huyện', '9 47 20N, 105 43 29E', 93),
(935, 'Vị Thuỷ', 'Huyện', '9 48 05N, 105 32 13E', 93),
(936, 'Long Mỹ', 'Huyện', '9 40 47N, 105 30 53E', 93),
(941, 'Sóc Trăng', 'Thành Phố', '9 36 39N, 105 59 00E', 94),
(942, 'Châu Thành', 'Huyện', '', 94),
(943, 'Kế Sách', 'Huyện', '9 49 30N, 105 57 25E', 94),
(944, 'Mỹ Tú', 'Huyện', '9 38 21N, 105 49 52E', 94),
(945, 'Cù Lao Dung', 'Huyện', '9 37 36N, 106 12 13E', 94),
(946, 'Long Phú', 'Huyện', '9 34 38N, 106 06 07E', 94),
(947, 'Mỹ Xuyên', 'Huyện', '9 28 16N, 105 55 51E', 94),
(948, 'Ngã Năm', 'Huyện', '9 31 38N, 105 37 22E', 94),
(949, 'Thạnh Trị', 'Huyện', '9 28 05N, 105 43 02E', 94),
(950, 'Vĩnh Châu', 'Huyện', '9 20 50N, 105 59 58E', 94),
(951, 'Trần Đề', 'Huyện', '', 94),
(954, 'Bạc Liêu', 'Thị Xã', '9 16 05N, 105 45 08E', 95),
(956, 'Hồng Dân', 'Huyện', '9 30 37N, 105 24 25E', 95),
(957, 'Phước Long', 'Huyện', '9 23 13N, 105 24 41E', 95),
(958, 'Vĩnh Lợi', 'Huyện', '9 16 51N, 105 40 54E', 95),
(959, 'Giá Rai', 'Huyện', '9 15 51N, 105 23 18E', 95),
(960, 'Đông Hải', 'Huyện', '9 08 11N, 105 24 42E', 95),
(961, 'Hoà Bình', 'Huyện', '', 95),
(964, 'Cà Mau', 'Thành Phố', '9 10 33N, 105 11 11E', 96),
(966, 'U Minh', 'Huyện', '9 22 30N, 104 57 00E', 96),
(967, 'Thới Bình', 'Huyện', '9 22 50N, 105 07 35E', 96),
(968, 'Trần Văn Thời', 'Huyện', '9 07 36N, 104 57 27E', 96),
(969, 'Cái Nước', 'Huyện', '9 00 31N, 105 03 23E', 96),
(970, 'Đầm Dơi', 'Huyện', '8 57 48N, 105 13 56E', 96),
(971, 'Năm Căn', 'Huyện', '8 46 59N, 104 58 20E', 96),
(972, 'Phú Tân', 'Huyện', '8 52 47N, 104 53 35E', 96),
(973, 'Ngọc Hiển', 'Huyện', '8 40 47N, 104 57 58E', 96);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_language`
--

CREATE TABLE IF NOT EXISTS `tbl_language` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `uri` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` text COLLATE utf8_unicode_ci NOT NULL,
  `index` int(11) NOT NULL,
  `enable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tbl_language`
--

INSERT INTO `tbl_language` (`id`, `title`, `uri`, `thumbnail`, `index`, `enable`) VALUES
(1, 'Việt Nam', 'vn', 'upload/image/Vietnam.png', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_layout`
--

CREATE TABLE IF NOT EXISTS `tbl_layout` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tbl_layout`
--

INSERT INTO `tbl_layout` (`id`, `name`, `value`, `link`, `type`) VALUES
(1, 'layout-header', '[{"type":"image","name":"iamgeQC","value":"upload/image/topbanner.png","link":"javascript:void(0);"},{"type":"image","name":"logo","value":"upload/image/logodienmay.jpg"},{"type":"image","name":"logo_mobile","value":"upload/image/acc.jpg"},{"type":"image","name":"giohang","value":"upload/image/cartnone.png"},{"type":"image","name":"messenger","value":"upload/image/mes-512x512.png","link":"javascript:void(0);"},{"type":"image","name":"zalo","value":"upload/image/zalo-2.png","link":"javascript:void(0);"},{"type":"text","name":"tel","value":"{\\"vn\\":1800.1061}","link":18001061,"value_vn":1800.1061},{"type":"text","name":"title_hotline","value":"{\\"vn\\":\\"Tổng đài miễn phí\\"}","value_vn":"Tổng đài miễn phí"},{"type":"position","name":"menu-center","value":"[{\\"id\\":\\"4\\",\\"value\\":[{\\"id\\":\\"7\\",\\"value\\":[]},{\\"id\\":\\"8\\",\\"value\\":[]}]},{\\"id\\":\\"5\\",\\"value\\":[{\\"id\\":\\"7\\",\\"value\\":[]}]},{\\"id\\":\\"6\\",\\"value\\":[{\\"id\\":\\"8\\",\\"value\\":[]}]},{\\"id\\":\\"9\\",\\"value\\":[]},{\\"id\\":\\"10\\",\\"value\\":[]},{\\"id\\":\\"11\\",\\"value\\":[]},{\\"id\\":\\"12\\",\\"value\\":[]},{\\"id\\":\\"13\\",\\"value\\":[]},{\\"id\\":\\"14\\",\\"value\\":[]}]"},{"type":"position","name":"trang","value":"[{\\"id\\":\\"1\\",\\"value\\":[]},{\\"id\\":\\"2\\",\\"value\\":[]},{\\"id\\":\\"3\\",\\"value\\":[]}]"}]', '', 'group'),
(2, 'layout-index', '[{"type":"image-list","name":"slider","value":"[{\\"value\\":\\"upload/image/banner1.png\\",\\"link\\":\\"javascript:void(0);\\"},{\\"value\\":\\"upload/image/banner2.png\\",\\"link\\":\\"javascript:void(0);\\"},{\\"value\\":\\"upload/image/banner3.png\\",\\"link\\":\\"javascript:void(0);\\"}]"},{"type":"image","name":"image_1","value":"upload/image/banner1.png","link":"javascript:void(0);"},{"type":"image","name":"image_2","value":"upload/image/banner2.png","link":"javascript:void(0);"},{"type":"image","name":"image_3","value":"upload/image/banner3.png","link":"javascript:void(0);"},{"type":"image","name":"image_4","value":"upload/image/dienmayxanh.jpg","link":"javascript:void(0);"},{"type":"image","name":"image_5","value":"upload/image/banner1.png","link":"javascript:void(0);"},{"type":"image","name":"hinh_noibat","value":"upload/image/desk-1176x50.png"},{"type":"image","name":"hinh_giamgia","value":"upload/image/giamsoc-optimized.png"},{"type":"image","name":"hinh_khuyenmai","value":"upload/image/khuyenmai.png"},{"type":"image","name":"hinh_giamgia1","value":"upload/image/online-gia-m-so-c-1x.png"},{"type":"position","name":"product","value":"[]"},{"type":"text","name":"google","value":"{\\"vn\\":\\"\\"}"}]', '', 'group'),
(3, 'layout-footer', '[{"type":"position","name":"k1","value":"[{\\"id\\":\\"15\\",\\"value\\":[]},{\\"id\\":\\"16\\",\\"value\\":[]},{\\"id\\":\\"17\\",\\"value\\":[]},{\\"id\\":\\"18\\",\\"value\\":[]}]"},{"type":"text","name":"title_k1","value":"{\\"vn\\":\\"THÔNG TIN ĐIỆN MÁY XANH\\"}","value_vn":"THÔNG TIN ĐIỆN MÁY XANH"},{"type":"position","name":"k2","value":"[{\\"id\\":\\"19\\",\\"value\\":[]},{\\"id\\":\\"20\\",\\"value\\":[]},{\\"id\\":\\"21\\",\\"value\\":[]},{\\"id\\":\\"22\\",\\"value\\":[]}]"},{"type":"text","name":"title_k2","value":"{\\"vn\\":\\"HỖ TRỢ KHÁCH HÀNG\\"}","value_vn":"HỖ TRỢ KHÁCH HÀNG"},{"type":"text","name":"title_k3","value":"{\\"vn\\":\\"TỔNG ĐÀI HỖ TRỢ (GỌI MIỄN PHÍ)\\"}","link":"0855519521","value_vn":"TỔNG ĐÀI HỖ TRỢ (GỌI MIỄN PHÍ)"},{"type":"text","name":"title_k31","value":"{\\"vn\\":\\"Mua hàng <strong><span style=\\\\\\"color:#000000;\\\\\\">1800.1061</span></strong> (7:30 - 22:00)\\"}","link":"0855519521","value_vn":"Mua hàng <strong><span style=\\"color:#000000;\\">1800.1061</span></strong> (7:30 - 22:00)"},{"type":"text","name":"title_k32","value":"{\\"vn\\":\\"Kỹ thuật <strong>1800.1764</strong> (7:30 - 22:00)\\"}","link":"0855519521","value_vn":"Kỹ thuật <strong>1800.1764</strong> (7:30 - 22:00)"},{"type":"text","name":"title_k33","value":"{\\"vn\\":\\"Bảo hành <strong>1800.1065</strong> (8:00 - 21:00)\\"}","link":"0855519521","value_vn":"Bảo hành <strong>1800.1065</strong> (8:00 - 21:00)"},{"type":"text","name":"title_k34","value":"{\\"vn\\":\\"Khiếu nại <strong>1800.1063</strong> (8:00 - 21:30)\\"}","link":"0855519521","value_vn":"Khiếu nại <strong>1800.1063</strong> (8:00 - 21:30)"},{"type":"image","name":"hinh3","value":"upload/image/bocongthuong.png","link":"javascript:void(0);"},{"type":"text","name":"title_k4","value":"{\\"vn\\":\\"LIÊN KẾT\\"}","value_vn":"LIÊN KẾT"},{"type":"image-list","name":"hinh4","value":"[{\\"value\\":\\"upload/image/facebook-logo-circle.png\\",\\"link\\":\\"javascript:void(0);\\"},{\\"value\\":\\"upload/image/youtube.png\\",\\"link\\":\\"javascript:void(0);\\"},{\\"value\\":\\"upload/image/zalo.png\\",\\"link\\":\\"javascript:void(0);\\"}]"},{"type":"image","name":"bocongthuong","value":"upload/image/bocongthuong.png","link":"javascript:void(0);"},{"type":"text","name":"copyright","value":"{\\"vn\\":\\"© 2018. Công ty cổ phần Thế Giới Di Động. GPDKKD: 0303217354 do sở KH & ĐT TP.HCM cấp ngày 02/01/2007. GP số 57/GP-TTĐT do Sở TTTT TP HCM cấp ngày 30/07/2018. <br />\\\\nĐịa chỉ: 128 Trần Quang Khải, P. Tân Định, Quận 1, TP.Hồ Chí Minh. Điện thoại: (028)3812.59.60. Email: cskh@dienmayxanh.com. Chịu trách nhiệm nội dung: Trần Nhật Linh.\\"}","link":"javascript:void(0);","value_vn":"© 2018. Công ty cổ phần Thế Giới Di Động. GPDKKD: 0303217354 do sở KH & ĐT TP.HCM cấp ngày 02/01/2007. GP số 57/GP-TTĐT do Sở TTTT TP HCM cấp ngày 30/07/2018. <br />\\nĐịa chỉ: 128 Trần Quang Khải, P. Tân Định, Quận 1, TP.Hồ Chí Minh. Điện thoại: (028)3812.59.60. Email: cskh@dienmayxanh.com. Chịu trách nhiệm nội dung: Trần Nhật Linh."}]', '', 'group'),
(4, 'classify', '[{"type":"position","name":"contact","value":"[{\\"id\\":\\"18\\",\\"value\\":[]}]"},{"type":"position","name":"cart","value":"[{\\"id\\":\\"25\\",\\"value\\":[]}]"},{"type":"position","name":"search","value":"[{\\"id\\":\\"26\\",\\"value\\":[]}]"},{"type":"position","name":"product-all","value":"[{\\"id\\":\\"23\\",\\"value\\":[]}]"}]', '', 'group');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_online`
--

CREATE TABLE IF NOT EXISTS `tbl_online` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `ip` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tbl_online`
--

INSERT INTO `tbl_online` (`id`, `time`, `ip`) VALUES
('4e0rff7s68l32267684nembdo3', 1591947683, '113.23.31.29'),
('517nllp66r796b5cnvm0n3gqu3', 1591614367, '::1'),
('7cu2u1pogl9g60qpnfg5rboo81', 1591783442, '::1'),
('8bnrbl2eeqpsd7sq7mcsfp68v0', 1591872461, '103.199.32.98'),
('9e7aojp2v57b3ahtjc3ab9f6v1', 1591722099, '::1'),
('alidskr5bkaois63gt7kigp3o1', 1591870299, '113.23.31.29'),
('ckt44u62nlhbot9q2d3v1760t3', 1591808918, '::1'),
('cv72plgdd8riem06ckskhlv082', 1591420220, '::1'),
('lcg2hbbbb8gnen4qpjjtkf2du6', 1591931106, '113.23.31.29'),
('r8sd114v8pl4n405fe9qls7lb1', 1591859615, '::1'),
('usri3kvqosqhori10jnapi7ns2', 1591696993, '::1');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_option`
--

CREATE TABLE IF NOT EXISTS `tbl_option` (
  `id` int(10) unsigned NOT NULL,
  `category_id` text COLLATE utf8_unicode_ci NOT NULL,
  `review_id` text COLLATE utf8_unicode_ci NOT NULL,
  `uri` text COLLATE utf8_unicode_ci NOT NULL,
  `uri_enable` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `video` text COLLATE utf8_unicode_ci NOT NULL,
  `index` int(11) NOT NULL,
  `enable` int(1) NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `gender` text COLLATE utf8_unicode_ci NOT NULL,
  `tel` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `first_tag` text COLLATE utf8_unicode_ci NOT NULL,
  `second_tag` text COLLATE utf8_unicode_ci NOT NULL,
  `third_tag` text COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `create_date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `name`, `gender`, `tel`, `email`, `address`, `content`, `first_tag`, `second_tag`, `third_tag`, `detail`, `create_date`) VALUES
(1, 'Dương Hoàng Khải', 'Nam', '0855519521', 'khaib1400697@student.ctu.edu.vn', '<span style=''display: inline-block; font-weight: normal;''>Địa chỉ:</span> trần văn hoài<br><span style=''display: inline-block; font-weight: normal;''>Quận - huyện:</span> Quận Ninh Kiều<br><span style=''display: inline-block; font-weight: normal;''>Tỉnh - Thành phố:</span> Thành Phố Cần Thơ', 'accc', '', '', '', '<table class="table table-striped table-bordered" style="width: 100%;" border="1">\n			<tbody>\n				<tr>\n					<td style="text-align: center; padding: 8px;"><strong>STT</strong></td>\n					<td style="text-align: center; padding: 8px;"><strong>Tên sản phẩm</strong></td>\n					<td style="text-align: center; padding: 8px;"><strong>Màu sắc</strong></td>\n					<td style="text-align: center; padding: 8px;"><strong>Số lượng</strong></td>\n					<td style="text-align: center; padding: 8px;"><strong>Đơn giá</strong></td>\n					<td style="text-align: center; padding: 8px;"><strong>Thành tiền</strong></td>\n				</tr><tr>\n					<td style="text-align: center; padding: 8px;">1</td>\n					<td style="text-align: left; padding: 8px;"><b><a href="http://localhost/dienmay/lg-inverter-1-5-hp.html" target="_blank">LG Inverter 1.5 HP</a></b></td>\n					<td style="text-align: center; padding: 8px;"><b>Mặc định</b></td>\n					<td style="text-align: center; padding: 8px; color: blue; font-weight: bold;"><div>2</div></td>\n					<td style="text-align: center; padding: 8px;"><b style="color: red;">32,400,000đ</b> <b style="color: #777;">(<del>36,000,000đ</del>)</b></td>\n					<td style="text-align: center; padding: 8px;"><b style="color: red;">32,400,000đ</b> <b style="color: #777;">(<del>0đ</del>)</b></td>\n				</tr><tr>\n					<td style="text-align: center; padding: 8px;">2</td>\n					<td style="text-align: left; padding: 8px;"><b><a href="http://localhost/dienmay/smart-tivi-samsung-4k-50-inch-ua50ru7200.html" target="_blank">Smart Tivi Samsung 4K 50 inch UA50RU7200</a></b></td>\n					<td style="text-align: center; padding: 8px;"><b>Mặc định</b></td>\n					<td style="text-align: center; padding: 8px; color: blue; font-weight: bold;"><div>2</div></td>\n					<td style="text-align: center; padding: 8px;"><b style="color: red;">28,800,000đ</b> <b style="color: #777;">(<del>36,000,000đ</del>)</b></td>\n					<td style="text-align: center; padding: 8px;"><b style="color: red;">57,600,000đ</b> <b style="color: #777;">(<del>0đ</del>)</b></td>\n				</tr></tbody>\n		</table>', 1591777314),
(2, 'Dương Hoàng Khải', 'Nam', '0855519521', 'khaib1400697@student.ctu.edu.vn', '<span style=''display: inline-block; min-width: 132px; font-weight: normal;''>Địa chỉ:</span> trần văn hoài<br><span style=''display: inline-block; min-width: 132px; font-weight: normal;''>Tỉnh - Thành phố:</span> Thành Phố Hà Nội<br><span style=''display: inline-block; min-width: 132px; font-weight: normal;''>Quận - huyện:</span> Quận Ba Đình', 'acc', '', '', '', '<table class="table table-striped table-bordered" style="width: 100%;" border="1">\n			<tbody>\n				<tr>\n					<td style="text-align: center; padding: 8px;"><strong>STT</strong></td>\n					<td style="text-align: center; padding: 8px;"><strong>Tên sản phẩm</strong></td>\n					<td style="text-align: center; padding: 8px;"><strong>Màu sắc</strong></td>\n					<td style="text-align: center; padding: 8px;"><strong>Đơn giá</strong></td>\n					<td style="text-align: center; padding: 8px;"><strong>Số lượng</strong></td>\n					<td style="text-align: center; padding: 8px;"><strong>Thành tiền</strong></td>\n					<td style="text-align: center; padding: 8px;"><strong>Loại</strong></td>\n				</tr><tr>\n					<td style="text-align: center; padding: 8px;">1</td>\n					<td style="text-align: left; padding: 8px;"><b><a href="http://demo.ptit.vn/dienmay/lg-inverter-1-5-hp.html" target="_blank">LG Inverter 1.5 HP</a></b></td>\n					<td style="text-align: center; padding: 8px;"><b>Mặc định</b></td>\n					<td style="text-align: center; padding: 8px;"><b style="color: red;">32,400,000đ</b> <b style="color: #777;">(<del>36,000,000đ</del>)</b></td>\n					<td style="text-align: center; padding: 8px; color: blue; font-weight: bold;">2</td>\n					<td style="text-align: center; padding: 8px;"><b style="color: red;">64,800,000đ</b> <b style="color: #777;">(<del>72,000,000đ</del>)</b></td>\n					<td style="text-align: center; padding: 8px;"><b>Mua trực tiếp</b></td>\n				</tr></tbody>\n		</table>', 1591947077),
(3, 'Dương Hoàng Khải', 'Nam', '0855519521', 'khaib1400697@student.ctu.edu.vn', '<span style=''display: inline-block; min-width: 132px; font-weight: normal;''>Địa chỉ:</span> trần văn hoài<br><span style=''display: inline-block; min-width: 132px; font-weight: normal;''>Tỉnh - Thành phố:</span> Tỉnh Hà Giang<br><span style=''display: inline-block; min-width: 132px; font-weight: normal;''>Quận - huyện:</span> Huyện Yên Minh', 'acc', '', '', '', '<table class="table table-striped table-bordered" style="width: 100%;" border="1">\n			<tbody>\n				<tr>\n					<td style="text-align: center; padding: 8px;"><strong>STT</strong></td>\n					<td style="text-align: center; padding: 8px;"><strong>Tên sản phẩm</strong></td>\n					<td style="text-align: center; padding: 8px;"><strong>Đơn giá</strong></td>\n					<td style="text-align: center; padding: 8px;"><strong>Số lượng</strong></td>\n					<td style="text-align: center; padding: 8px;"><strong>Thành tiền</strong></td>\n					<td style="text-align: center; padding: 8px;"><strong>Loại</strong></td>\n				</tr><tr>\n					<td style="text-align: center; padding: 8px;">1</td>\n					<td style="text-align: left; padding: 8px;"><b><a href="http://demo.ptit.vn/dienmay/lg-inverter-1-5-hp.html" target="_blank">LG Inverter 1.5 HP</a></b></td>\n					<td style="text-align: center; padding: 8px;"><b style="color: red;">32,400,000đ</b> <b style="color: #777;">(<del>36,000,000đ</del>)</b></td>\n					<td style="text-align: center; padding: 8px; color: blue; font-weight: bold;">1</td>\n					<td style="text-align: center; padding: 8px;"><b style="color: red;">32,400,000đ</b> <b style="color: #777;">(<del>36,000,000đ</del>)</b></td>\n					<td style="text-align: center; padding: 8px;"><b>Mua trực tiếp</b></td>\n				</tr></tbody>\n		</table>', 1591947128);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_post`
--

CREATE TABLE IF NOT EXISTS `tbl_post` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `uri` text COLLATE utf8_unicode_ci,
  `link` text COLLATE utf8_unicode_ci,
  `thumbnail` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video` text COLLATE utf8_unicode_ci NOT NULL,
  `svg` text COLLATE utf8_unicode_ci NOT NULL,
  `enable` int(11) NOT NULL DEFAULT '1',
  `level` int(11) NOT NULL DEFAULT '0',
  `new` int(11) NOT NULL,
  `popular` int(11) DEFAULT NULL,
  `popular2` int(11) NOT NULL,
  `popular3` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `create_date` text COLLATE utf8_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `category_id` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Contenu de la table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `title`, `uri`, `link`, `thumbnail`, `video`, `svg`, `enable`, `level`, `new`, `popular`, `popular2`, `popular3`, `view`, `create_date`, `user_id`, `category_id`) VALUES
(1, 'Tư vấn cách chọn mua máy đánh trứng phù hợp nhu cầu, túi tiền, chất lượng tốt', 'tu-van-cach-chon-mua-may-danh-trung-phu-hop-nhu-cau-tui-tien-chat-luong-tot', '', 'upload/image/bolg.jpg', '', '', 1, 1, 0, 1, 0, 0, 15, '1591687879', NULL, '24'),
(2, 'Tư vấn cách chọn mua máy đánh trứng phù hợp nhu cầu, túi tiền, chất lượng tốt - Copy (1)', 'tu-van-cach-chon-mua-may-danh-trung-phu-hop-nhu-cau-tui-tien-chat-luong-tot-copy-1', '', 'upload/image/bolg.jpg', '', '', 1, 2, 0, 1, 0, 0, 8, '1591687878', 0, '24'),
(3, 'Tư vấn cách chọn mua máy đánh trứng phù hợp nhu cầu, túi tiền, chất lượng tốt - Copy (2)', 'tu-van-cach-chon-mua-may-danh-trung-phu-hop-nhu-cau-tui-tien-chat-luong-tot-copy-2', '', 'upload/image/bolg.jpg', '', '', 1, 0, 0, 1, 0, 0, 5, '1591687877', 0, '24'),
(4, 'Tư vấn cách chọn mua máy đánh trứng phù hợp nhu cầu, túi tiền, chất lượng tốt - Copy (3)', 'tu-van-cach-chon-mua-may-danh-trung-phu-hop-nhu-cau-tui-tien-chat-luong-tot-copy-3', '', 'upload/image/bolg.jpg', '', '', 1, 0, 0, 1, 0, 0, 2, '1591687876', 0, '24'),
(5, 'Tư vấn cách chọn mua máy đánh trứng phù hợp nhu cầu, túi tiền, chất lượng tốt - Copy (4)', 'tu-van-cach-chon-mua-may-danh-trung-phu-hop-nhu-cau-tui-tien-chat-luong-tot-copy-4', '', 'upload/image/bolg.jpg', '', '', 1, 0, 0, 1, 0, 0, 0, '1591687875', 0, '24'),
(6, 'Tư vấn cách chọn mua máy đánh trứng phù hợp nhu cầu, túi tiền, chất lượng tốt - Copy (5)', 'tu-van-cach-chon-mua-may-danh-trung-phu-hop-nhu-cau-tui-tien-chat-luong-tot-copy-5', '', 'upload/image/bolg.jpg', '', '', 1, 0, 0, 1, 0, 0, 1, '1591687874', 0, '24');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `uri` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serial` text COLLATE utf8_unicode_ci,
  `serial_international` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail_featured` text COLLATE utf8_unicode_ci NOT NULL,
  `svg` text COLLATE utf8_unicode_ci NOT NULL,
  `price` text COLLATE utf8_unicode_ci,
  `address` text COLLATE utf8_unicode_ci,
  `province` int(11) DEFAULT NULL,
  `district` int(11) DEFAULT NULL,
  `ward` int(11) DEFAULT NULL,
  `attribute` text COLLATE utf8_unicode_ci,
  `level` int(10) unsigned NOT NULL DEFAULT '0',
  `popular` int(1) NOT NULL DEFAULT '0',
  `new` int(11) NOT NULL,
  `promotion` int(11) NOT NULL,
  `popular2` int(11) NOT NULL,
  `popular3` int(11) NOT NULL,
  `enable` int(1) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL,
  `category_id` text COLLATE utf8_unicode_ci,
  `category_id_2` text COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `chucnang_id` text COLLATE utf8_unicode_ci NOT NULL,
  `giatien_id` text COLLATE utf8_unicode_ci NOT NULL,
  `color_id` text COLLATE utf8_unicode_ci NOT NULL,
  `gender_id` text COLLATE utf8_unicode_ci NOT NULL,
  `price_id` text COLLATE utf8_unicode_ci NOT NULL,
  `masterial_id` text COLLATE utf8_unicode_ci NOT NULL,
  `style_id` text COLLATE utf8_unicode_ci NOT NULL,
  `female_id` text COLLATE utf8_unicode_ci NOT NULL,
  `combo` text COLLATE utf8_unicode_ci NOT NULL,
  `create_date` text COLLATE utf8_unicode_ci,
  `view` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `title`, `uri`, `serial`, `serial_international`, `thumbnail`, `video`, `thumbnail_featured`, `svg`, `price`, `address`, `province`, `district`, `ward`, `attribute`, `level`, `popular`, `new`, `promotion`, `popular2`, `popular3`, `enable`, `status`, `category_id`, `category_id_2`, `brand_id`, `chucnang_id`, `giatien_id`, `color_id`, `gender_id`, `price_id`, `masterial_id`, `style_id`, `female_id`, `combo`, `create_date`, `view`, `user_id`) VALUES
(1, 'Smart Tivi Samsung 4K 50 inch UA50RU7200', 'smart-tivi-samsung-4k-50-inch-ua50ru7200', '', '', 'upload/image/samsung.jpg', '', '', '', NULL, '', 0, 0, 0, NULL, 0, 1, 0, 0, 1, 0, 1, 1, '4,5,6,8,9,10,11,12,13,14', '', 0, '', '', '', '', '', '', '', '', '{}', '1591672840', 12, NULL),
(2, 'Aqua Inverter 10 Kg', 'aqua-inverter-10-kg', '', '', 'upload/image/aqua.jpg', '', '', '', '', '', 0, 0, 0, '', 0, 1, 0, 0, 1, 0, 1, 1, '4,5,6,7,8,9,10,11,12,13,14', '', 0, '', '', '', '', '', '', '', '', '{}', '1591672839', 15, 0),
(3, 'LG Inverter 1.5 HP', 'lg-inverter-1-5-hp', '', '', 'upload/image/may-lanh.jpg', '', '', '', '', '', 0, 0, 0, '', 0, 1, 0, 0, 1, 0, 1, 1, '4,5,6,7,8,9,10,11,12,13,14', '', 0, '', '', '', '', '', '', '', '', '{}', '1591672838', 19, 0),
(4, 'LG Inverter 1.5 HP - Copy (1)', 'lg-inverter-1-5-hp-copy-1', '', '', 'upload/image/may-lanh.jpg', '', '', '', '', '', 0, 0, 0, '', 0, 1, 0, 0, 1, 0, 1, 1, '4,5,6,7,8,9,10,11,12,13,14', '', 0, '', '', '', '', '', '', '', '', '{}', '1591672837', 4, 0),
(5, 'Smart Tivi Samsung 4K 50 inch UA50RU7200 - Copy (1)', 'smart-tivi-samsung-4k-50-inch-ua50ru7200-copy-1', '', '', 'upload/image/samsung.jpg', '', '', '', '', '', 0, 0, 0, '', 0, 1, 0, 0, 1, 0, 1, 1, '4,5,6,7,8,9,10,11,12,13,14', '', 0, '', '', '', '', '', '', '', '', '{}', '1591672839', 5, 0),
(6, 'Smart Tivi Samsung 4K 50 inch UA50RU7200 - Copy (2)', 'smart-tivi-samsung-4k-50-inch-ua50ru7200-copy-2', '', '', 'upload/image/samsung.jpg', '', '', '', '', '', 0, 0, 0, '', 0, 1, 0, 0, 1, 0, 1, 1, '4,5,6,7,8,9,10,11,12,13,14', '', 0, '', '', '', '', '', '', '', '', '{}', '1591672838', 6, 0),
(7, 'LG Inverter 1.5 HP - Copy (2)', 'lg-inverter-1-5-hp-copy-2', '', '', 'upload/image/may-lanh.jpg', '', '', '', '', '', 0, 0, 0, '', 0, 1, 0, 0, 1, 0, 1, 1, '4,5,6,7,8,9,10,11,12,13,14', '', 0, '', '', '', '', '', '', '', '', '{}', '1591672836', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_product_extend`
--

CREATE TABLE IF NOT EXISTS `tbl_product_extend` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` text COLLATE utf8_unicode_ci NOT NULL,
  `video` text COLLATE utf8_unicode_ci NOT NULL,
  `popular` int(11) NOT NULL,
  `enable` int(11) NOT NULL,
  `index` int(11) NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `price` text COLLATE utf8_unicode_ci NOT NULL,
  `price_sale` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tbl_product_extend`
--

INSERT INTO `tbl_product_extend` (`id`, `product_id`, `color_id`, `title`, `thumbnail`, `video`, `popular`, `enable`, `index`, `type`, `price`, `price_sale`) VALUES
(7, 2, 0, '', 'upload/image/aqua.jpg', '', 0, 1, 1, 'image', '', ''),
(8, 1, 0, '', 'upload/image/samsung.jpg', '', 0, 1, 1, 'image', '', ''),
(9, 3, 0, '', 'upload/image/may-lanh.jpg', '', 0, 1, 1, 'image', '', ''),
(10, 3, 0, '', 'upload/image/nhuy-hoa-nghe-tay-saffron-1g-g.jpg', '', 0, 1, 2, 'image', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_province`
--

CREATE TABLE IF NOT EXISTS `tbl_province` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tbl_province`
--

INSERT INTO `tbl_province` (`id`, `name`, `type`) VALUES
(1, 'Hà Nội', 'Thành Phố'),
(2, 'Hà Giang', 'Tỉnh'),
(4, 'Cao Bằng', 'Tỉnh'),
(6, 'Bắc Kạn', 'Tỉnh'),
(8, 'Tuyên Quang', 'Tỉnh'),
(10, 'Lào Cai', 'Tỉnh'),
(11, 'Điện Biên', 'Tỉnh'),
(12, 'Lai Châu', 'Tỉnh'),
(14, 'Sơn La', 'Tỉnh'),
(15, 'Yên Bái', 'Tỉnh'),
(17, 'Hòa Bình', 'Tỉnh'),
(19, 'Thái Nguyên', 'Tỉnh'),
(20, 'Lạng Sơn', 'Tỉnh'),
(22, 'Quảng Ninh', 'Tỉnh'),
(24, 'Bắc Giang', 'Tỉnh'),
(25, 'Phú Thọ', 'Tỉnh'),
(26, 'Vĩnh Phúc', 'Tỉnh'),
(27, 'Bắc Ninh', 'Tỉnh'),
(30, 'Hải Dương', 'Tỉnh'),
(31, 'Hải Phòng', 'Thành Phố'),
(33, 'Hưng Yên', 'Tỉnh'),
(34, 'Thái Bình', 'Tỉnh'),
(35, 'Hà Nam', 'Tỉnh'),
(36, 'Nam Định', 'Tỉnh'),
(37, 'Ninh Bình', 'Tỉnh'),
(38, 'Thanh Hóa', 'Tỉnh'),
(40, 'Nghệ An', 'Tỉnh'),
(42, 'Hà Tĩnh', 'Tỉnh'),
(44, 'Quảng Bình', 'Tỉnh'),
(45, 'Quảng Trị', 'Tỉnh'),
(46, 'Thừa Thiên Huế', 'Tỉnh'),
(48, 'Đà Nẵng', 'Thành Phố'),
(49, 'Quảng Nam', 'Tỉnh'),
(51, 'Quảng Ngãi', 'Tỉnh'),
(52, 'Bình Định', 'Tỉnh'),
(54, 'Phú Yên', 'Tỉnh'),
(56, 'Khánh Hòa', 'Tỉnh'),
(58, 'Ninh Thuận', 'Tỉnh'),
(60, 'Bình Thuận', 'Tỉnh'),
(62, 'Kon Tum', 'Tỉnh'),
(64, 'Gia Lai', 'Tỉnh'),
(66, 'Đắk Lắk', 'Tỉnh'),
(67, 'Đắk Nông', 'Tỉnh'),
(68, 'Lâm Đồng', 'Tỉnh'),
(70, 'Bình Phước', 'Tỉnh'),
(72, 'Tây Ninh', 'Tỉnh'),
(74, 'Bình Dương', 'Tỉnh'),
(75, 'Đồng Nai', 'Tỉnh'),
(77, 'Bà Rịa - Vũng Tàu', 'Tỉnh'),
(79, 'Hồ Chí Minh', 'Thành Phố'),
(80, 'Long An', 'Tỉnh'),
(82, 'Tiền Giang', 'Tỉnh'),
(83, 'Bến Tre', 'Tỉnh'),
(84, 'Trà Vinh', 'Tỉnh'),
(86, 'Vĩnh Long', 'Tỉnh'),
(87, 'Đồng Tháp', 'Tỉnh'),
(89, 'An Giang', 'Tỉnh'),
(91, 'Kiên Giang', 'Tỉnh'),
(92, 'Cần Thơ', 'Thành Phố'),
(93, 'Hậu Giang', 'Tỉnh'),
(94, 'Sóc Trăng', 'Tỉnh'),
(95, 'Bạc Liêu', 'Tỉnh'),
(96, 'Cà Mau', 'Tỉnh');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_review`
--

CREATE TABLE IF NOT EXISTS `tbl_review` (
  `id` int(11) NOT NULL,
  `ip` text COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text COLLATE utf8_unicode_ci NOT NULL,
  `reply_review` text COLLATE utf8_unicode_ci NOT NULL,
  `reply_name` text COLLATE utf8_unicode_ci NOT NULL,
  `enable` int(11) NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `create_date` int(11) NOT NULL,
  `confirm_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_translate`
--

CREATE TABLE IF NOT EXISTS `tbl_translate` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `table_name` text COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `price` text COLLATE utf8_unicode_ci,
  `price_sale` text COLLATE utf8_unicode_ci NOT NULL,
  `price_entry` text COLLATE utf8_unicode_ci NOT NULL,
  `price_percent` text COLLATE utf8_unicode_ci NOT NULL,
  `promotion_price` text COLLATE utf8_unicode_ci NOT NULL,
  `promotion_percent` text COLLATE utf8_unicode_ci NOT NULL,
  `promotion_type` int(11) NOT NULL,
  `deposit1` text COLLATE utf8_unicode_ci NOT NULL,
  `deposit2` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `first_tag` text COLLATE utf8_unicode_ci NOT NULL,
  `second_tag` text COLLATE utf8_unicode_ci NOT NULL,
  `third_tag` text COLLATE utf8_unicode_ci NOT NULL,
  `index_first_tag` text COLLATE utf8_unicode_ci NOT NULL,
  `index_second_tag` text COLLATE utf8_unicode_ci NOT NULL,
  `index_third_tag` text COLLATE utf8_unicode_ci NOT NULL,
  `installment_1` text COLLATE utf8_unicode_ci NOT NULL,
  `installment_2` text COLLATE utf8_unicode_ci NOT NULL,
  `installment_3` text COLLATE utf8_unicode_ci NOT NULL,
  `installment_4` text COLLATE utf8_unicode_ci NOT NULL,
  `version` text COLLATE utf8_unicode_ci NOT NULL,
  `keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `h1` text COLLATE utf8_unicode_ci NOT NULL,
  `h2` text COLLATE utf8_unicode_ci NOT NULL,
  `h3` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tbl_translate`
--

INSERT INTO `tbl_translate` (`id`, `language_id`, `item_id`, `table_name`, `title`, `price`, `price_sale`, `price_entry`, `price_percent`, `promotion_price`, `promotion_percent`, `promotion_type`, `deposit1`, `deposit2`, `description`, `content`, `first_tag`, `second_tag`, `third_tag`, `index_first_tag`, `index_second_tag`, `index_third_tag`, `installment_1`, `installment_2`, `installment_3`, `installment_4`, `version`, `keyword`, `desc`, `h1`, `h2`, `h3`) VALUES
(1, 1, 1, 'category', 'Danh mục trang 1', NULL, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 1, 2, 'category', 'Danh mục trang 2', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 1, 3, 'category', 'Danh mục trang 3', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 1, 4, 'category', 'Danh mục sản phẩm 1', NULL, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 1, 5, 'category', 'Danh mục sản phẩm 2', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 1, 6, 'category', 'Danh mục sản phẩm 3', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 1, 7, 'category', 'Danh mục sản phẩm con 1', NULL, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 1, 8, 'category', 'Danh mục sản phẩm con 2', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 1, 9, 'category', 'Danh mục sản phẩm 3 - Copy (1)', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 1, 10, 'category', 'Danh mục sản phẩm 3 - Copy (2)', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 1, 11, 'category', 'Danh mục sản phẩm 3 - Copy (3)', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 1, 12, 'category', 'Danh mục sản phẩm 3 - Copy (4)', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 1, 13, 'category', 'Danh mục sản phẩm 3 - Copy (5)', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 1, 14, 'category', 'Danh mục sản phẩm 3 - Copy (6)', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 1, 15, 'category', 'Hệ thống 1037 siêu thị', NULL, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, 1, 16, 'category', 'Giới thiệu công ty', NULL, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 1, 17, 'category', 'Tìm việc làm', NULL, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 1, 18, 'category', 'Liên hệ, góp ý', NULL, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, 1, 19, 'category', 'Tìm hiểu về mua trả góp', NULL, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, 1, 20, 'category', 'Giao hàng, lắp đặt', NULL, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, 1, 21, 'category', 'Bảo hành, đổi trả', NULL, '', '', '', '', '', 0, '', '', '', '<h2>Ch&iacute;nh s&aacute;ch bảo h&agrave;nh đổi trả tại hệ thống si&ecirc;u thị Điện m&aacute;y XANH</h2>\r\n\r\n<p>Si&ecirc;u thị Điện m&aacute;y XANH xin th&ocirc;ng tin đến qu&yacute; kh&aacute;ch h&agrave;ng ch&iacute;nh s&aacute;ch bảo h&agrave;nh đổi trả tại hệ thống si&ecirc;u thị Điện m&aacute;y XANH.</p>\r\n\r\n<h3>I- Ch&iacute;nh s&aacute;ch bảo h&agrave;nh đổi trả đối với sản phẩm b&aacute;n tại Điện m&aacute;y XANH</h3>\r\n\r\n<p>Ch&iacute;nh s&aacute;ch bảo h&agrave;nh đổi trả cụ thể cho từng nh&oacute;m h&agrave;ng như sau:</p>\r\n\r\n<p>1.&nbsp;<a href="https://www.dienmayxanh.com/bao-hanh-doi-tra?id=1150" target="_blank" title="Chính sách bảo hành đổi trả nhóm hàng điện thoại , laptop, smartwatch, máy tính bảng, tivi, tủ lạnh, máy lạnh, máy giặt, máy sấy quần áo, dàn máy và máy nước nóng">&nbsp;Điện thoại, laptop, smartwatch, m&aacute;y t&iacute;nh bảng, tivi, tủ lạnh, m&aacute;y lạnh, m&aacute;y giặt, m&aacute;y sấy quần &aacute;o, d&agrave;n m&aacute;y v&agrave; loa (trừ loa vi t&iacute;nh), m&aacute;y nước n&oacute;ng, m&aacute;y t&iacute;nh bộ, m&agrave;n h&igrave;nh, m&aacute;y in, mực in, thiết bị mạng</a></p>\r\n\r\n<p>2.&nbsp;<a href="https://www.dienmayxanh.com/bao-hanh-doi-tra?id=1147" target="_blank" title="Chính sách bảo hành đổi trả nhóm hàng gia dụng">Gia dụng, M&aacute;y lọc nước, Quạt điều h&ograve;a v&agrave; Đồ d&ugrave;ng gia đ&igrave;nh</a></p>\r\n\r\n<p>3.&nbsp;<a href="https://www.dienmayxanh.com/bao-hanh-doi-tra?id=1148" target="_blank" title="Chính sách bảo hành đổi trả nhóm hàng phụ kiện">Phụ kiện (bao gồm cả loa vi t&iacute;nh)</a></p>\r\n\r\n<p><strong>Lưu &yacute;: Đối với kh&aacute;ch h&agrave;ng mua trả g&oacute;p , ch&iacute;nh s&aacute;ch bảo h&agrave;nh vẫn &aacute;p dụng giống như đối với kh&aacute;ch h&agrave;ng mua thẳng.</strong></p>\r\n\r\n<p>- Kh&aacute;ch h&agrave;ng vẫn c&oacute; thể trả h&agrave;ng v&agrave; hủy hợp đồng trả g&oacute;p. Ph&iacute; trả m&aacute;y theo quy định đổi trả h&agrave;ng của Điện m&aacute;y XANH.</p>\r\n\r\n<p>- Ph&iacute; thanh l&yacute; hợp đồng được t&iacute;nh như sau:</p>\r\n\r\n<p>+&nbsp;Trong 14 ng&agrave;y đầu ti&ecirc;n:&nbsp;Kh&ocirc;ng mất ph&iacute;&nbsp;hủy&nbsp;hợp đồng.</p>\r\n\r\n<p>+&nbsp;Sau 14 ng&agrave;y:&nbsp;Kh&aacute;ch h&agrave;ng li&ecirc;n hệ tổng đ&agrave;i của c&ocirc;ng ty t&agrave;i ch&iacute;nh để biết số tiền ch&iacute;nh x&aacute;c</p>\r\n\r\n<h3>II- Quy định về việc ho&agrave;n tiền tiền khi thanh to&aacute;n trực tuyến:</h3>\r\n\r\n<p>Trong trường hợp qu&yacute; kh&aacute;ch h&agrave;ng đ&atilde; mua h&agrave;ng &amp; thanh to&aacute;n trực tuyến th&agrave;nh c&ocirc;ng nhưng dư tiền, hoặc trả sản phẩm, Điện m&aacute;y Xanh sẽ ho&agrave;n tiền v&agrave;o thẻ qu&yacute; kh&aacute;ch đ&atilde; d&ugrave;ng để thanh to&aacute;n, theo thời hạn như sau:</p>\r\n\r\n<p>- Đối với thẻ ATM: Thời gian kh&aacute;ch h&agrave;ng nhận được tiền ho&agrave;n từ 7-10 ng&agrave;y (trừ thứ 7, chủ nhật v&agrave; ng&agrave;y lễ.) Nếu qua thời gian tr&ecirc;n kh&ocirc;ng nhận được tiền, Điện m&aacute;y Xanh sẽ hỗ trợ li&ecirc;n hệ ng&acirc;n h&agrave;ng của kh&aacute;ch h&agrave;ng để giải quyết.</p>\r\n\r\n<p>- Đối với thẻ Visa/Master card/JCB: Thời gian Kh&aacute;ch h&agrave;ng nhận được tiền ho&agrave;n 7-15 ng&agrave;y. Nếu qua thời gian tr&ecirc;n kh&aacute;ch h&agrave;ng kh&ocirc;ng nhận được tiền, kh&aacute;ch h&agrave;ng li&ecirc;n hệ ng&acirc;n h&agrave;ng để giải quyết.</p>\r\n\r\n<h3>III. Th&ocirc;ng tin th&ecirc;m</h3>\r\n\r\n<p>- Từ 1.6.2015 (Tại TPHCM) &amp; 1.7.2015 (Tr&ecirc;n to&agrave;n quốc), Điện m&aacute;y Xanh sử dụng&nbsp;<a href="https://hddt.thegioididong.com/" target="_blank" title="Hoá đơn điện tử">ho&aacute; đơn điện tử</a>&nbsp;thay cho ho&aacute; đơn giấy.</p>\r\n\r\n<p>- Kh&aacute;ch h&agrave;ng mua h&agrave;ng từ thời gian n&agrave;y trở về sau kh&ocirc;ng cần ho&aacute; đơn giấy v&agrave; kh&ocirc;ng bị trừ ph&iacute; mất ho&aacute; đơn khi đổi trả sản phẩm.</p>\r\n\r\n<p>- Kh&aacute;ch h&agrave;ng mua h&agrave;ng trước thời gian n&agrave;y, vẫn cần c&oacute; ho&aacute; đơn khi đổi trả sản phẩm, nếu mất sẽ trừ ph&iacute; theo quy định (10% gi&aacute; tr&ecirc;n ho&aacute; đơn).</p>\r\n\r\n<p>MỌI CHI TIẾT LI&Ecirc;N HỆ TỔNG Đ&Agrave;I (GỌI MIỄN PH&Iacute;): 1800.1061 (8:00 - 21:00).</p>', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(22, 1, 22, 'category', 'DV vệ sinh máy lạnh, máy giặt', NULL, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(23, 1, 1, 'product', 'Smart Tivi Samsung 4K 50 inch UA50RU7200', '36000000', '28800000', '', '', '', '20', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(24, 1, 2, 'product', 'Aqua Inverter 10 Kg', '36000000', '', '', '', '', '0', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(25, 1, 3, 'product', 'LG Inverter 1.5 HP', '36000000', '32400000', '', '', '', '10', 0, '', '', '<p>Thương hiệu:&nbsp;<a href="https://meta.vn/sunhouse.html" title="Các sản phẩm của Sunhouse">Sunhouse</a>&nbsp;|&nbsp;<a href="https://meta.vn/cay-nuoc-nong-lanh-c565?brands=263">C&acirc;y nước n&oacute;ng lạnh Sunhouse</a></p>\r\n\r\n<p>Bảo h&agrave;nh:&nbsp;<a href="https://meta.vn/cay-nuoc-nong-lanh-c565?specs=67.1002" target="_blank" title="Xem thêm sản phẩm Cây nước nóng lạnh cùng Bảo hành 12 tháng">12 th&aacute;ng</a></p>\r\n\r\n<p>Sản xuất tại:&nbsp;<a href="https://meta.vn/cay-nuoc-nong-lanh-c565?specs=68.1154" target="_blank" title="Xem thêm sản phẩm Cây nước nóng lạnh cùng Sản xuất tại Trung Quốc">Trung Quốc</a></p>\r\n\r\n<p>Đơn vị t&iacute;nh:&nbsp;Chiếc</p>', '<p><a href="https://meta.vn/cay-nuoc-nong-lanh-c565" target="_blank" title="Cây nước nóng lạnh">C&acirc;y nước n&oacute;ng lạnh</a>&nbsp;<strong>Sunhouse SHD9601</strong>&nbsp;chắc hẳn kh&ocirc;ng thể thiếu trong mỗi gia đ&igrave;nh hay văn ph&ograve;ng l&agrave;m việc. Đ&acirc;y l&agrave; sản phẩm sử dụng c&ocirc;ng nghệ n&oacute;ng/lạnh ti&ecirc;n tiến nhất gi&uacute;p vừa cung cấp nước n&oacute;ng để pha tr&agrave;, uống c&agrave; ph&ecirc;... lại vừa đem đến cho bạn ly nước m&aacute;t lạnh giải kh&aacute;t nhanh ch&oacute;ng trong những ng&agrave;y h&egrave; oi bức.</p>\r\n\r\n<p><strong>Tham khảo</strong>:&nbsp;</p>\r\n\r\n<ul>\r\n	<li><a href="https://meta.vn/hotro/so-sanh-cay-nuoc-nong-lanh-mini-sunhouse-va-kangaroo-2452" target="_blank" title="Cây nước nóng lạnh mini nào tốt Sunhouse hay Kangaroo">C&acirc;y nước n&oacute;ng lạnh mini n&agrave;o tốt Sunhouse hay Kangaroo</a></li>\r\n	<li><a href="https://meta.vn/hotro/top-3-cay-nuoc-nong-lanh-co-ngan-lam-mat-mini-2160" target="_blank" title="Top 3 cây nước nóng lạnh có ngăn làm mát mini">Top 3 c&acirc;y nước n&oacute;ng lạnh c&oacute; ngăn l&agrave;m m&aacute;t mini</a></li>\r\n</ul>\r\n\r\n<p><img alt="Hình ảnh cây nước nóng lạnh Sunhouse SHD9601" data-i="0" data-xsrc="/Data/image/2018/08/22/cay-nuoc-nong-lanh-sunhouse-shd9601.jpg" height="600" src="https://s.meta.com.vn/Data/image/2018/08/22/cay-nuoc-nong-lanh-sunhouse-shd9601.jpg" width="700" /></p>\r\n\r\n<p>H&igrave;nh ảnh c&acirc;y nước n&oacute;ng lạnh Sunhouse SHD9601</p>\r\n\r\n<h2>C&acirc;y nước n&oacute;ng lạnh Sunhouse SHD9601 cung cấp nước n&oacute;ng v&agrave; lạnh&nbsp;</h2>\r\n\r\n<h3>Nhiệt độ n&oacute;ng 86&deg;C - 94&deg;C, nhiệt độ lạnh&nbsp;10&deg;C - 15&deg;C</h3>\r\n\r\n<p><a href="https://meta.vn/cay-nuoc-nong-lanh-sunhouse-shd9601-p53190" title="Cây nước nóng lạnh Sunhouse SHD9601">C&acirc;y nước n&oacute;ng lạnh Sunhouse SHD9601</a>&nbsp;c&oacute; 2 chế độ lấy nước n&oacute;ng v&agrave; lạnh. Với nhiệt độ n&oacute;ng 86&deg;C - 94&deg;C, gi&uacute;p bạn dễ d&agrave;ng pha coffee, pha sữa hay pha tr&agrave;, nấu m&igrave; nhanh ch&oacute;ng v&agrave; tiện dụng. B&ecirc;n cạnh đ&oacute;, nước lạnh c&oacute; nhiệt độ khoảng&nbsp;10&deg;C - 15&deg;C gi&uacute;p bạn giải kh&aacute;t nhanh ch&oacute;ng trong m&ugrave;a h&egrave; oi bức. Ngo&agrave;i ra, c&acirc;y nước n&oacute;ng c&ograve;n c&oacute; m&agrave;n h&igrave;nh v&agrave; đ&egrave;n b&aacute;o hiệu chế độ lấy nước n&oacute;ng lạnh cho người d&ugrave;ng dễ d&agrave;ng quan s&aacute;t.</p>\r\n\r\n<p>Nhiệt độ l&agrave;m lạnh từ 10 - 15 độ C (trong m&ocirc;i trường l&yacute; tưởng). Trong điều kiện thực tế sử dụng ở c&aacute;c nước nhiệt đới như Việt Nam th&igrave; nhiệt độ l&agrave;m lạnh dao động trong khoảng từ 15 - 25 độ C.</p>\r\n\r\n<p><strong>Tham khảo</strong>:&nbsp;<a href="https://meta.vn/hotro/huong-dan-su-dung-cay-nuoc-nong-lanh-an-toan-va-hieu-qua-1510" target="_blank" title="Hướng dẫn sử dụng cây nước nóng lạnh an toàn và hiệu quả">Hướng dẫn sử dụng c&acirc;y nước n&oacute;ng lạnh an to&agrave;n v&agrave; hiệu quả</a></p>\r\n\r\n<p><img alt="Cây nước nóng lạnh Sunhouse SHD9601 có màu trắng trang nhã" data-i="1" data-xsrc="/Data/image/2018/08/22/cay-nuoc-nong-lanh-sunhouse-shd9601-trang.jpg" src="https://s.meta.com.vn/Data/image/2018/08/22/cay-nuoc-nong-lanh-sunhouse-shd9601-trang.jpg" title="Cây nước nóng lạnh Sunhouse SHD9601 " /></p>\r\n\r\n<p>C&acirc;y nước n&oacute;ng lạnh Sunhouse SHD9601 c&oacute; m&agrave;u trắng trang nh&atilde;</p>\r\n\r\n<h3>C&ocirc;ng nghệ đun kh&ocirc; k&eacute;p</h3>\r\n\r\n<p><a href="https://meta.vn/cay-nuoc-nong-lanh-c565?brands=263" target="_blank" title="Cây nước nóng lạnh Sunhouse">C&acirc;y nước n&oacute;ng lạnh Sunhouse</a>&nbsp;c&oacute; t&iacute;nh năng bảo vệ qu&aacute; nhiệt, c&ocirc;ng nghệ chống đun kh&ocirc; k&eacute;p&nbsp;gi&uacute;p hoạt động an to&agrave;n hơn, tăng tuổi thọ cho sản phẩm. Sản phẩm được trang bị 2 v&ograve;i lấy nước n&oacute;ng v&agrave; lạnh ri&ecirc;ng, ph&acirc;n biệt dễ d&agrave;ng bằng k&yacute; hiệu c&oacute; m&agrave;u đỏ v&agrave; xanh dương gi&uacute;p bạn lấy nước dễ d&agrave;ng, an to&agrave;n.</p>\r\n\r\n<p><em><strong>Lưu &yacute;:</strong></em>&nbsp;Khi sử dụng nước n&oacute;ng, bạn kh&ocirc;ng đặt tay dưới v&ograve;i nước để tr&aacute;nh bị bỏng.</p>\r\n\r\n<p><strong>Tham khảo:&nbsp;</strong><a href="https://meta.vn/hotro/top-5-cay-nuoc-nong-lanh-sunhouse-tot-nhat-2271" target="_blank" title="Top 5 cây nước nóng lạnh Sunhouse tốt nhất">Top 5 c&acirc;y nước n&oacute;ng lạnh Sunhouse tốt nhất</a></p>\r\n\r\n<p><img alt=" Kích thước cây nước nóng lạnh SHD9601" data-i="2" data-xsrc="/Data/image/2018/08/22/cay-nuoc-nong-lanh-sunhouse-shd9601-kich-thuoc.jpg" height="600" src="https://s.meta.com.vn/Data/image/2018/08/22/cay-nuoc-nong-lanh-sunhouse-shd9601-kich-thuoc.jpg" width="700" /></p>\r\n\r\n<p>&nbsp;K&iacute;ch thước c&acirc;y nước n&oacute;ng lạnh SHD9601</p>\r\n\r\n<h3>Dung t&iacute;ch n&oacute;ng 0.8 l&iacute;t, dung t&iacute;ch lạnh 0.6 l&iacute;t</h3>\r\n\r\n<p>Dung t&iacute;ch b&igrave;nh chứa nước n&oacute;ng 0.8 l&iacute;t, c&ocirc;ng suất l&agrave;m n&oacute;ng 580W gi&uacute;p đ&aacute;p ứng nhu cầu nước n&oacute;ng nhanh ch&oacute;ng, đầy đủ cho bạn sử dụng để nấu m&igrave;, pha tr&agrave;, pha sữa tiện lợi.&nbsp;Dung t&iacute;ch b&igrave;nh chứa nước lạnh 0.6 l&iacute;t, c&ocirc;ng suất l&agrave;m lạnh 75W, hệ thống l&agrave;m lạnh bằng&nbsp;<a href="https://meta.vn/cay-nuoc-nong-lanh-c565?specs=100.29175" title="chíp điện tử">ch&iacute;p điện tử</a>&nbsp;gi&uacute;p l&agrave;m lạnh nước nhanh, tiết kiệm điện. Thiết kế của c&acirc;y nước n&oacute;ng lạnh nhỏ gọn, c&oacute; thể đặt tr&ecirc;n b&agrave;n, tr&ecirc;n kệ rất tiện lợi.</p>\r\n\r\n<p><img alt="Cây nước Sunhouse SHD9601 có 2 chế độ lấy nước nóng và lạnh " data-i="3" data-xsrc="/Data/image/2018/08/22/cay-nuoc-nong-lanh-sunhouse-shd9601-man-hinh.jpg" height="600" src="https://s.meta.com.vn/Data/image/2018/08/22/cay-nuoc-nong-lanh-sunhouse-shd9601-man-hinh.jpg" width="700" /></p>\r\n\r\n<p>C&acirc;y nước Sunhouse SHD9601 c&oacute; 2 chế độ lấy nước n&oacute;ng v&agrave; lạnh&nbsp;</p>\r\n\r\n<h3>Khay hứng nước dễ th&aacute;o lắp gi&uacute;p người d&ugrave;ng vệ sinh</h3>\r\n\r\n<p>Ngo&agrave;i chức năng hứng nước cặn, khay hứng nước ph&iacute;a b&ecirc;n dưới c&acirc;y nước n&oacute;ng lạnh c&oacute; thể&nbsp;<a href="https://meta.vn/hotro/cach-ve-sinh-cay-nuoc-nong-lanh-an-toan-hieu-qua-2896" title="cách vệ sinh cây nước nóng lạnh an toàn">dễ d&agrave;ng th&aacute;o lắp v&agrave; vệ sinh</a>. C&aacute;c chị em sẽ kh&ocirc;ng cần tốn nhiều thời gian v&agrave; c&ocirc;ng sức mỗi lần vệ sinh m&aacute;y nữa.</p>\r\n\r\n<p><img alt="Khay chứa nước thải dễ dàng thao rời " data-i="4" data-xsrc="/Data/image/2018/08/22/cay-nuoc-nong-lanh-sunhouse-shd9601-khay-chua-nuoc-thai.jpg" height="600" src="https://s.meta.com.vn/Data/image/2018/08/22/cay-nuoc-nong-lanh-sunhouse-shd9601-khay-chua-nuoc-thai.jpg" title="Khay chứa nước thải dễ dàng thao rời " width="700" /></p>\r\n\r\n<p>Khay chứa nước thải dễ d&agrave;ng th&aacute;o rời&nbsp;</p>\r\n\r\n<h3>Chất liệu bền bỉ, an to&agrave;n</h3>\r\n\r\n<p>B&igrave;nh chứa nước của c&acirc;y nước n&oacute;ng lạnh được l&agrave;m bằng inox 304, gi&uacute;p giảm đ&oacute;ng cặn cho nước, tăng tuổi thọ. Vỏ m&aacute;y được l&agrave;m bằng nhựa PP bền bỉ, dễ d&agrave;ng vệ sinh trong qu&aacute; tr&igrave;nh sử dụng.</p>\r\n\r\n<p><img alt="Hộc chứa bình nước tiện lợi " data-i="5" data-xsrc="/Data/image/2018/08/22/cay-nuoc-nong-lanh-sunhouse-shd9601-hoc-chua-nuoc.jpg" height="600" src="https://s.meta.com.vn/Data/image/2018/08/22/cay-nuoc-nong-lanh-sunhouse-shd9601-hoc-chua-nuoc.jpg" width="700" /></p>\r\n\r\n<p>Hộc chứa b&igrave;nh nước tiện lợi&nbsp;</p>\r\n\r\n<p><img alt="Cây nước nóng lạnh Sunhouse SHD9601 có nhiệt độ nóng lên tới 98 độ C " data-i="6" data-xsrc="/Data/image/2018/08/22/cay-nuoc-nong-lanh-sunhouse-shd9601-khay-de-coc.jpg" height="600" src="https://s.meta.com.vn/Data/image/2018/08/22/cay-nuoc-nong-lanh-sunhouse-shd9601-khay-de-coc.jpg" width="700" /></p>\r\n\r\n<p>C&acirc;y nước n&oacute;ng lạnh Sunhouse SHD9601 c&oacute; nhiệt độ n&oacute;ng l&ecirc;n tới 98 độ C&nbsp;</p>\r\n\r\n<p><img alt="Công tắc nóng lạnh phía sau thân máy " data-i="7" data-xsrc="/Data/image/2018/08/22/cay-nuoc-nong-lanh-sunhouse-shd9601-ON-OFF.jpg" height="600" src="https://s.meta.com.vn/Data/image/2018/08/22/cay-nuoc-nong-lanh-sunhouse-shd9601-ON-OFF.jpg" title="Công tắc nóng lạnh phía sau thân máy " width="700" /></p>\r\n\r\n<p>C&ocirc;ng tắc n&oacute;ng lạnh ph&iacute;a sau th&acirc;n m&aacute;y&nbsp;</p>\r\n\r\n<p><img alt="Cây nước nóng lạnh Sunhouse SHD9601 có dung tích lạnh 0.8L " data-i="8" data-xsrc="/Data/image/2018/08/22/cay-nuoc-nong-lanh-sunhouse-shd9601-sau.jpg" height="600" src="https://s.meta.com.vn/Data/image/2018/08/22/cay-nuoc-nong-lanh-sunhouse-shd9601-sau.jpg" title="Cây nước nóng lạnh Sunhouse SHD9601 có dung tích lạnh 0.8L " width="700" /></p>\r\n\r\n<p>C&acirc;y nước n&oacute;ng lạnh Sunhouse SHD9601 c&oacute; dung t&iacute;ch lạnh 0.8L&nbsp;</p>\r\n\r\n<p><img alt="Thông số kỹ thuật và tem chính hãng " data-i="9" data-xsrc="/Data/image/2018/08/22/cay-nuoc-nong-lanh-sunhouse-shd9601-tem.jpg" height="600" src="https://s.meta.com.vn/Data/image/2018/08/22/cay-nuoc-nong-lanh-sunhouse-shd9601-tem.jpg" width="700" /></p>\r\n\r\n<p>Th&ocirc;ng số kỹ thuật v&agrave; tem ch&iacute;nh h&atilde;ng&nbsp;</p>\r\n\r\n<p><img alt="Tay cầm tiện lợi " data-i="10" data-xsrc="/Data/image/2018/08/22/cay-nuoc-nong-lanh-sunhouse-shd9601-tay-cam.jpg" height="600" src="https://s.meta.com.vn/Data/image/2018/08/22/cay-nuoc-nong-lanh-sunhouse-shd9601-tay-cam.jpg" title="Tay cầm tiện lợi " width="700" /></p>\r\n\r\n<p>Tay cầm tiện lợi&nbsp;</p>', 'Lưu ý: Trước khi bật công tắc, mọi cây nước nóng lạnh đều phải cho nước chảy đầy bình. Riêng cây nước nóng lạnh công nghệ Block cần chờ từ 2 - 4 giờ để gas ổn định mới được cho nước vào và sử dụng.', '<div class="table-responsive">&nbsp;</div>\r\n\r\n<div class="body-specs group-specs">\r\n<div class="table-responsive">\r\n<table class="table" style="width: 100%;">\r\n	<caption>Th&ocirc;ng tin chung</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;u sắc</td>\r\n			<td>Trắng</td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch thước</td>\r\n			<td><a href="https://meta.vn/cay-nuoc-nong-lanh-c565?specs=29.28821" target="_blank" title="Xem thêm sản phẩm Cây nước nóng lạnh cùng Kích thước 312mm x 300mm x 397mm">312mm x 300mm x 397mm</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trọng lượng sản phẩm</td>\r\n			<td>2,5kg</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sản xuất tại</td>\r\n			<td><a href="https://meta.vn/cay-nuoc-nong-lanh-c565?specs=68.1154" target="_blank" title="Xem thêm sản phẩm Cây nước nóng lạnh cùng Sản xuất tại Trung Quốc">Trung Quốc</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bảo h&agrave;nh</td>\r\n			<td><a href="https://meta.vn/cay-nuoc-nong-lanh-c565?specs=67.1002" target="_blank" title="Xem thêm sản phẩm Cây nước nóng lạnh cùng Bảo hành 12 tháng">12 th&aacute;ng</a></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n\r\n<p><span class="specs-right block"></span></p>\r\n</div>', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(26, 1, 4, 'product', 'LG Inverter 1.5 HP - Copy (1)', '36000000', '35999975', '', '', '25', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(27, 1, 5, 'product', 'Smart Tivi Samsung 4K 50 inch UA50RU7200 - Copy (1)', '36000000', '21600000', '', '', '', '40', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(28, 1, 6, 'product', 'Smart Tivi Samsung 4K 50 inch UA50RU7200 - Copy (2)', '36000000', '25560000', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(29, 1, 7, 'product', 'LG Inverter 1.5 HP - Copy (2)', '1000000', '359999', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(30, 1, 23, 'category', 'Tất cả sản phẩm', NULL, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(31, 1, 24, 'category', 'Tin tức', NULL, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(32, 1, 1, 'post', 'Tư vấn cách chọn mua máy đánh trứng phù hợp nhu cầu, túi tiền, chất lượng tốt', NULL, '', '', '', '', '', 0, '', '', 'Máy đánh trứng là một thiết bị hỗ trợ đánh đều hơn thậm chí đánh bông dễ dàng các loại thực phẩm như trứng, bột hay kem trong quá trình chế biến món ăn.\r\n\r\nMáy đánh trứng có cấu tạo và nguyên lý hoạt động tương đối đơn giản, sử dụng không quá phức tạp nên được sử dụng rất phổ biến trong các căn bếp ngày nay.', '<h3>Tư vấn c&aacute;ch chọn mua m&aacute;y đ&aacute;nh trứng ph&ugrave; hợp nhu cầu, t&uacute;i tiền, chất lượng tốt</h3>\r\n\r\n<article>\r\n<h3>1M&aacute;y đ&aacute;nh trứng l&agrave; g&igrave;?</h3>\r\n\r\n<p>M&aacute;y đ&aacute;nh trứng l&agrave; một thiết bị hỗ trợ đ&aacute;nh đều hơn thậm ch&iacute; đ&aacute;nh b&ocirc;ng dễ d&agrave;ng c&aacute;c loại thực phẩm như trứng, bột hay kem trong qu&aacute; tr&igrave;nh chế biến m&oacute;n ăn.</p>\r\n\r\n<p>M&aacute;y đ&aacute;nh trứng c&oacute; cấu tạo v&agrave; nguy&ecirc;n l&yacute; hoạt động tương đối đơn giản, sử dụng kh&ocirc;ng qu&aacute; phức tạp n&ecirc;n được sử dụng rất phổ biến trong c&aacute;c căn bếp ng&agrave;y nay.</p>\r\n<img alt="Hai loại máy đánh trứng cơ bản trên thị trường hiện nay" data-src="https://cdn.tgdd.vn/Files/2016/05/04/824481/cach-chon-mua-may-danh-trung.jpg" height="486" src="https://cdn.tgdd.vn/Files/2016/05/04/824481/cach-chon-mua-may-danh-trung.jpg" title="Hai loại máy đánh trứng cơ bản trên thị trường hiện nay" width="730" />\r\n<h3>2C&aacute;c loại m&aacute;y đ&aacute;nh trứng phổ biến hiện nay</h3>\r\n\r\n<p>Dựa tr&ecirc;n k&iacute;ch thước v&agrave; c&aacute;ch sử dụng, c&oacute; 2 loại m&aacute;y đ&aacute;nh trứng thường thấy nhất tr&ecirc;n thị trường hiện nay đ&oacute; l&agrave;<strong>&nbsp;m&aacute;y đ&aacute;nh trứng cầm tay</strong>&nbsp;v&agrave;&nbsp;<strong>m&aacute;y đ&aacute;nh trứng để b&agrave;n</strong>.</p>\r\n\r\n<h4><strong>1. M&aacute;y đ&aacute;nh trứng cầm tay</strong></h4>\r\n\r\n<p>M&aacute;y đ&aacute;nh trứng cầm tay c&oacute; k&iacute;ch thước nhỏ gọn, c&oacute; thể sử dụng để đ&aacute;nh trứng, nghiền khoai t&acirc;y, đ&aacute;nh kem hay trộn bột với một lượng vừa phải.</p>\r\n\r\n<p>Trong qu&aacute; tr&igrave;nh m&aacute;y hoạt động, người d&ugrave;ng phải cầm bằng tay v&agrave; di chuyển xung quanh thực phẩm cần đ&aacute;nh để đảm bảo việc đ&aacute;nh được đều hơn. Cũng nhờ sự thuận tiện n&agrave;y m&agrave;&nbsp;m&aacute;y đ&aacute;nh trứng cầm tay c&oacute; thể hoạt động với nhiều dụng cụ chứa kh&aacute;c nhau như b&aacute;t, xoong, cốc&hellip;</p>\r\n<img alt="Máy đánh trứng cầm tay" data-src="https://cdn.tgdd.vn/Files/2016/05/04/824481/cach-chon-mua-may-danh-trung-3.jpg" height="486" src="https://cdn.tgdd.vn/Files/2016/05/04/824481/cach-chon-mua-may-danh-trung-3.jpg" title="Máy đánh trứng cầm tay" width="730" />\r\n<p>M&aacute;y đ&aacute;nh trứng bằng tay c&oacute; c&ocirc;ng suất nhỏ, chỉ ph&ugrave; hợp sử dụng với nguy&ecirc;n liệu mềm, lỏng, lượng vừa phải. V&igrave; vậy m&aacute;y ph&ugrave; hợp với nhu cầu sử dụng l&agrave;m b&aacute;nh trong gia đ&igrave;nh với thiết kế nhỏ gọn, tiết kiệm diện t&iacute;ch, kh&ocirc;ng th&iacute;ch hợp để kinh doanh h&agrave;ng ăn lớn v&agrave; nhu cầu đ&aacute;nh thực phẩm một lượng lớn li&ecirc;n tục.</p>\r\n\r\n<ul>\r\n	<li><strong>Ưu điểm:</strong></li>\r\n</ul>\r\n\r\n<p>- Gi&aacute; b&aacute;n rẻ hơn dao động từ 500.000 cho đến 1 triệu đồng.</p>\r\n\r\n<p>-&nbsp;Thiết kế nhỏ gọn, c&oacute; thể đ&aacute;p ứng được hầu hết mọi nhu cầu cơ bản trong đời sống hằng ng&agrave;y, đặc biệt l&agrave; với những người c&oacute; nhu cầu l&agrave;m b&aacute;nh nhưng kh&ocirc;ng thường xuy&ecirc;n.</p>\r\n\r\n<p>- M&aacute;y dễ d&agrave;ng th&aacute;o lắp, từ đ&oacute; thuận tiện cho việc vệ sinh, cất giữ, di chuyển.</p>\r\n\r\n<ul>\r\n	<li><strong>Nhược điểm</strong></li>\r\n</ul>\r\n\r\n<p><strong>-&nbsp;</strong>C&ocirc;ng suất nhỏ,<strong>&nbsp;</strong>chỉ trộn được một lượng rất nhỏ bột m&igrave;.</p>\r\n\r\n<p>- Cầm m&aacute;y tr&ecirc;n tay di chuyển thời gian d&agrave;i sẽ g&acirc;y mỏi tay.</p>\r\n\r\n<h4><strong>2. M&aacute;y đ&aacute;nh trứng để b&agrave;n</strong></h4>\r\n\r\n<p>So với m&aacute;y đ&aacute;nh trứng cầm tay, m&aacute;y đ&aacute;nh trứng để b&agrave;n c&oacute; k&iacute;ch thước lớn v&agrave; cồng kềnh hơn. M&aacute;y được thiết kế c&oacute; thể đứng được cố định tr&ecirc;n mặt phẳng v&agrave; th&ocirc;ng thường c&oacute; k&egrave;m theo t&ocirc; đựng với dung t&iacute;ch khoảng&nbsp;<strong>2.5 - 4 l&iacute;t</strong>, bạn cũng c&oacute; thể thay thế bằng vật chứa kh&aacute;c như xoong, ca cốc,&hellip; ph&ugrave; hợp.</p>\r\n\r\n<p>M&aacute;y đ&aacute;nh trứng để b&agrave;n c&oacute; c&ocirc;ng suất mạnh mẽ, c&ugrave;ng với b&aacute;t đựng lớn n&ecirc;n rất th&iacute;ch hợp để trộn nguy&ecirc;n liệu lượng lớn, đặc, cứng. M&aacute;y c&oacute; thể trộn nguy&ecirc;n liệu đều, mịn v&agrave; nhanh ch&oacute;ng.</p>\r\n<img alt="Máy đánh trứng để bàn" data-src="https://cdn.tgdd.vn/Files/2016/05/04/824481/cach-chon-mua-may-danh-trung-5.jpg" height="486" src="https://cdn.tgdd.vn/Files/2016/05/04/824481/cach-chon-mua-may-danh-trung-5.jpg" title="Máy đánh trứng để bàn" width="730" />\r\n<p>B&ecirc;n cạnh đ&oacute;, khi mua m&aacute;y đ&aacute;nh trứng để b&agrave;n, người mua cũng được tặng đi k&egrave;m que trộn thay thế hay c&aacute;c phụ kiện cho ph&eacute;p bạn d&ugrave;ng được v&agrave;o nhiều việc hơn từ l&agrave;m kem cho đến l&agrave;m x&uacute;c x&iacute;ch.</p>\r\n\r\n<ul>\r\n	<li><strong>Ưu điểm:</strong></li>\r\n</ul>\r\n\r\n<p>- C&ocirc;ng suất lớn, đ&aacute;nh được nhiều m&agrave; vẫn giữ được đều v&agrave; mịn.</p>\r\n\r\n<p>- Kh&ocirc;ng d&ugrave;ng sức tay n&ecirc;n kh&ocirc;ng c&oacute; t&igrave;nh trạng mỏi tay, chỉ cần để m&aacute;y chạy tr&ecirc;n b&agrave;n rất tiện lợi, lại an to&agrave;n khi sử dụng</p>\r\n\r\n<p>- Đa chức năng, c&oacute; thể sử dụng để l&agrave;m nhiều c&ocirc;ng việc kh&aacute;c nhau, đặc biệt l&agrave; khả năng trộn được nhiều loại bột kh&aacute;c nhau với số lượng lớn.</p>\r\n\r\n<p>- Tiết kiệm thời gian khi c&oacute; thể rảnh tay để l&agrave;m việc kh&aacute;c.</p>\r\n\r\n<h3>3C&aacute;c ti&ecirc;u ch&iacute; cần quan t&acirc;m khi chọn mua m&aacute;y đ&aacute;nh trứng</h3>\r\n\r\n<h4><strong>Thiết kế v&agrave; chất liệu sử dụng</strong></h4>\r\n\r\n<p>M&aacute;y đ&aacute;nh trứng cầm tay hay để b&agrave;n c&oacute; k&iacute;ch thước ch&ecirc;nh lệch nhau kh&aacute; lớn, v&igrave; vậy, h&atilde;y c&acirc;n nhắc chọn mua một trong hai loại c&ograve;n t&ugrave;y thuộc v&agrave;o nhu cầu sử dụng của bạn. Một số m&aacute;y đ&aacute;nh trứng để b&agrave;n c&oacute; thể th&aacute;o lắp th&agrave;nh m&aacute;y cầm tay dễ d&agrave;ng, điều n&agrave;y gi&uacute;p tiết kiệm kh&ocirc;ng gian đ&aacute;ng kể.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, ngo&agrave;i việc ch&uacute; trọng v&agrave;o mẫu m&atilde; m&aacute;y đẹp mắt,&nbsp;<strong>chất liệu của c&aacute;c bộ phận của m&aacute;y</strong>&nbsp;cũng đ&aacute;ng được quan t&acirc;m v&igrave; điều n&agrave;y quyết định độ bền v&agrave;&nbsp;ảnh hưởng trực tiếp đến sức khỏe người sử dụng.</p>\r\n<img alt="Chú ý chất liệu que đánh trứng" data-src="https://cdn.tgdd.vn/Files/2016/05/04/824481/cach-chon-mua-may-danh-trung-6.jpg" height="486" src="https://cdn.tgdd.vn/Files/2016/05/04/824481/cach-chon-mua-may-danh-trung-6.jpg" title="Chú ý chất liệu que đánh trứng" width="730" />\r\n<p>Hai bộ phận quan trọng nhất của m&aacute;y đ&aacute;nh trứng l&agrave;&nbsp;<strong>động cơ</strong>&nbsp;v&agrave;&nbsp;<strong>que đ&aacute;nh trứng</strong>. Que đ&aacute;nh trứng n&ecirc;n chọn chất liệu an to&agrave;n v&agrave; cao cấp c&oacute; thể chống rỉ s&eacute;t như<strong>&nbsp;inox</strong>&nbsp;hay&nbsp;<strong>hợp kim th&eacute;p kh&ocirc;ng gỉ</strong>.</p>\r\n\r\n<p>Với d&ograve;ng m&aacute;y đ&aacute;nh trứng để b&agrave;n, t&ocirc; m&aacute;y thường c&oacute; dung t&iacute;ch khoảng 2 - 4 l&iacute;t v&agrave; sử dụng chất liệu l&agrave; kim loại hoặc nhựa ABS, so với nhựa th&igrave;&nbsp;<strong>kim loại</strong>&nbsp;c&oacute; độ bền cao hơn.</p>\r\n\r\n<h4><strong>C&ocirc;ng suất</strong></h4>\r\n\r\n<p>C&ocirc;ng suất c&agrave;ng lớn th&igrave; m&aacute;y đ&aacute;nh trứng sẽ hoạt động c&agrave;ng nhanh, mạnh, đ&aacute;nh trứng nhanh b&ocirc;ng hơn v&agrave; nếu m&aacute;y đ&aacute;nh trứng c&ocirc;ng suất lớn (tr&ecirc;n 300 W) th&igrave; c&ograve;n c&oacute; thể trộn nguy&ecirc;n liệu hay trộn bột l&agrave;m b&aacute;nh m&igrave; (khoảng 500 gram nguy&ecirc;n liệu v&agrave; nước).</p>\r\n\r\n<p>Th&ocirc;ng thường c&aacute;c m&aacute;y đ&aacute;nh trứng tr&ecirc;n thị trường c&oacute; c&ocirc;ng suất từ 200 - 400 W. Với nhu cầu sử dụng hằng ng&agrave;y của gia đ&igrave;nh, một chiếc m&aacute;y c&oacute; c&ocirc;ng suất<strong>&nbsp;200W</strong>l&agrave; hợp l&yacute; nhất.&nbsp;</p>\r\n<img alt="Công suất máy" data-src="https://cdn.tgdd.vn/Files/2016/05/04/824481/cach-chon-mua-may-danh-trung-7.jpg" height="547" src="https://cdn.tgdd.vn/Files/2016/05/04/824481/cach-chon-mua-may-danh-trung-7.jpg" title="Công suất máy" width="730" />\r\n<p>Nếu bạn chọn mua m&aacute;y cho nhu cầu nh&agrave; h&agrave;ng hay kinh doanh b&aacute;nh th&igrave; n&ecirc;n chọn m&aacute;y c&oacute; c&ocirc;ng suất cao hơn.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, kiểm tra &acirc;m thanh m&aacute;y khi hoạt động xem thử c&oacute; g&acirc;y tiếng ồn kh&oacute; chịu hay kh&ocirc;ng. &Acirc;m thanh c&agrave;ng nhỏ th&igrave; c&agrave;ng chứng tỏ m&aacute;y được lắp đặt tốt v&agrave; hoạt động &ecirc;m &aacute;i. Để kiểm tra điều, chỉ cần nghe &acirc;m thanh m&aacute;y hoạt động ngo&agrave;i cửa h&agrave;ng trước khi quyết định mua.</p>\r\n\r\n<h4><strong>Tốc độ đ&aacute;nh trứng</strong></h4>\r\n\r\n<p>Một chiếc m&aacute;y đ&aacute;nh trứng c&oacute; nhiều mức tốc độ sẽ gi&uacute;p bạn thực hiện c&ocirc;ng việc đ&aacute;nh trứng của m&igrave;nh dễ d&agrave;ng hơn. Th&ocirc;ng thường m&aacute;y đ&aacute;nh trứng cầm tay c&oacute; từ 3 - 7 tốc độ, m&aacute;y đ&aacute;nh trứng để b&agrave;n th&igrave; c&oacute; loại l&ecirc;n đến 16 tốc độ. Tuy nhi&ecirc;n, với nhu cầu th&ocirc;ng thường, bạn chỉ cần sử dụng 3 - 7 tốc độ.</p>\r\n<img alt="Tốc độ đánh trứng" data-src="https://cdn.tgdd.vn/Files/2016/05/04/824481/cach-chon-mua-may-danh-trung-8.jpg" height="486" src="https://cdn.tgdd.vn/Files/2016/05/04/824481/cach-chon-mua-may-danh-trung-8.jpg" title="Tốc độ đánh trứng" width="730" />\r\n<p>D&ugrave; l&agrave; m&aacute;y đ&aacute;nh trứng c&oacute; 3 hay 7 tốc độ hoặc nhiều hơn đều được chia th&agrave;nh 3 mức tốc độ ch&iacute;nh d&ugrave;ng để đ&aacute;nh c&aacute;c nguy&ecirc;n liệu kh&aacute;c nhau m&agrave; bạn cần ghi nhớ:</p>\r\n\r\n<p>- Tốc độ thấp: D&ugrave;ng trộn nguy&ecirc;n liệu hay trộn bột kh&ocirc; l&agrave;m b&aacute;nh m&igrave;,...</p>\r\n\r\n<p>- Tốc độ trung b&igrave;nh: Đ&aacute;nh bơ với đường, trộn trứng với hỗn hợp bột.</p>\r\n\r\n<p>- Tốc độ cao: Đ&aacute;nh l&ograve;ng trắng trứng, đ&aacute;nh trứng nguy&ecirc;n quả, đ&aacute;nh kem,...</p>\r\n\r\n<h4><strong>Phụ kiện đi k&egrave;m</strong></h4>\r\n\r\n<p>C&aacute;c phụ kiện k&egrave;m theo trong qu&aacute; tr&igrave;nh mua m&aacute;y đ&aacute;nh trứng cũng gi&uacute;p bạn dễ d&agrave;ng sử dụng m&aacute;y hơn v&agrave; tận dụng tối đa khả năng trộn đều của m&aacute;y.</p>\r\n<img alt="Phụ kiện que chân vịt đi kèm máy đánh trứng" data-src="https://cdn.tgdd.vn/Files/2016/05/04/824481/cach-chon-mua-may-danh-trung-9.jpg" height="480" src="https://cdn.tgdd.vn/Files/2016/05/04/824481/cach-chon-mua-may-danh-trung-9.jpg" title="Phụ kiện que chân vịt đi kèm máy đánh trứng" width="730" />\r\n<p>Những phụ kiện đi k&egrave;m thường l&agrave;&nbsp;<strong>que trộn ch&acirc;n vịt</strong>hay<strong>&nbsp;thanh trộn m&oacute;c c&acirc;u</strong>&nbsp;tuy kh&ocirc;ng qu&aacute; quan trọng nhưng cũng sẽ hỗ trợ bạn tốt hơn trong qu&aacute; tr&igrave;nh sử dụng m&aacute;y.</p>\r\n\r\n<h4><strong>Thương hiệu</strong></h4>\r\n\r\n<p>Ngo&agrave;i mẫu m&atilde; th&igrave; thương hiệu l&agrave; yếu tố đầu ti&ecirc;n bạn n&ecirc;n ch&uacute; &yacute; để mua được chiếc m&aacute;y đ&aacute;nh trứng ưng &yacute; về chất lượng v&agrave; c&oacute; chế độ bảo h&agrave;nh tốt.</p>\r\n\r\n<p><a href="https://www.dienmayxanh.com/may-danh-trung-panasonic" target="_blank" title="Panasonics">Panasonics</a>&nbsp;hay&nbsp;<a href="https://www.dienmayxanh.com/may-danh-trung-philips" target="_blank" title="Phillips">Philips</a>&nbsp;l&agrave; h&atilde;ng lớn, c&oacute; t&ecirc;n tuổi trong thị trường sản xuất h&agrave;ng gia dụng, m&aacute;y đ&aacute;nh trứng của những h&atilde;ng n&agrave;y kh&ocirc;ng những c&oacute; mẫu m&atilde; đẹp m&agrave; c&ograve;n bền v&agrave; tiện dụng.</p>\r\n\r\n<p>Phillips l&agrave; một trong những thương hiệu m&aacute;y đ&aacute;nh trứng phổ biến nhất hiện nay, m&aacute;y tốt về động cơ v&agrave; cũng đa dạng về mẫu m&atilde;, nhiều mức gi&aacute; kh&aacute;c nhau để người d&ugrave;ng chọn lựa.&nbsp;</p>\r\n<img alt="Máy đánh trứng cầm tay Phillips" data-src="https://cdn.tgdd.vn/Files/2016/05/04/824481/cach-chon-mua-may-danh-trung.png" height="486" src="https://cdn.tgdd.vn/Files/2016/05/04/824481/cach-chon-mua-may-danh-trung.png" title="Máy đánh trứng cầm tay Phillips" width="730" />\r\n<p>B&ecirc;n cạnh đ&oacute; c&aacute;c sản phẩm của Philips c&ograve;n c&oacute; thiết kế rất sang trọng, kiểu d&aacute;ng hiện đại c&ugrave;ng với khả năng hoạt động cực kỳ &ecirc;m &aacute;i v&agrave; bền bỉ.</p>\r\n\r\n<p>B&ecirc;n cạnh h&atilde;ng Phillips, m&aacute;y đ&aacute;nh trứng của&nbsp;Panasonics, Bluestone cũng được đ&aacute;nh gi&aacute; cao.&nbsp;C&aacute;c sản phẩm của Panasonic từ m&aacute;y đ&aacute;nh trứng cầm tay cho đến m&aacute;y đ&aacute;nh trứng để b&agrave;n đều c&oacute; gi&aacute; b&aacute;n tương đối rẻ dao động từ 500 ng&agrave;n cho đến 1.5 triệu đồng.</p>\r\n</article>', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(33, 1, 2, 'post', 'Tư vấn cách chọn mua máy đánh trứng phù hợp nhu cầu, túi tiền, chất lượng tốt - Copy (1)', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(34, 1, 3, 'post', 'Tư vấn cách chọn mua máy đánh trứng phù hợp nhu cầu, túi tiền, chất lượng tốt - Copy (2)', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(35, 1, 4, 'post', 'Tư vấn cách chọn mua máy đánh trứng phù hợp nhu cầu, túi tiền, chất lượng tốt - Copy (3)', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(36, 1, 5, 'post', 'Tư vấn cách chọn mua máy đánh trứng phù hợp nhu cầu, túi tiền, chất lượng tốt - Copy (4)', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(37, 1, 6, 'post', 'Tư vấn cách chọn mua máy đánh trứng phù hợp nhu cầu, túi tiền, chất lượng tốt - Copy (5)', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 1, 25, 'category', 'Giỏ hàng', NULL, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(39, 1, 26, 'category', 'Tìm kiếm', NULL, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_ward`
--

CREATE TABLE IF NOT EXISTS `tbl_ward` (
  `id` int(5) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `location` text COLLATE utf8_unicode_ci NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_website`
--

CREATE TABLE IF NOT EXISTS `tbl_website` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `slogan` text COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `h1` text COLLATE utf8_unicode_ci,
  `h2` text COLLATE utf8_unicode_ci,
  `h3` text COLLATE utf8_unicode_ci,
  `keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `maps` text COLLATE utf8_unicode_ci NOT NULL,
  `favicon` text COLLATE utf8_unicode_ci NOT NULL,
  `logo` text COLLATE utf8_unicode_ci NOT NULL,
  `information` text COLLATE utf8_unicode_ci NOT NULL,
  `footer_bg` text COLLATE utf8_unicode_ci NOT NULL,
  `copyright` text COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `tel` text COLLATE utf8_unicode_ci NOT NULL,
  `hotline` text COLLATE utf8_unicode_ci NOT NULL,
  `email_host` text COLLATE utf8_unicode_ci NOT NULL,
  `email_port` int(11) NOT NULL,
  `email_secure` text COLLATE utf8_unicode_ci NOT NULL,
  `email_name` text COLLATE utf8_unicode_ci NOT NULL,
  `email_subject` text COLLATE utf8_unicode_ci NOT NULL,
  `email_receive` text COLLATE utf8_unicode_ci NOT NULL,
  `email_send` text COLLATE utf8_unicode_ci NOT NULL,
  `email_content` text COLLATE utf8_unicode_ci NOT NULL,
  `password_send` text COLLATE utf8_unicode_ci NOT NULL,
  `script_head` text COLLATE utf8_unicode_ci NOT NULL,
  `script_body` text COLLATE utf8_unicode_ci NOT NULL,
  `livechat` text COLLATE utf8_unicode_ci NOT NULL,
  `fax` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tbl_website`
--

INSERT INTO `tbl_website` (`id`, `language_id`, `title`, `slogan`, `facebook`, `h1`, `h2`, `h3`, `keyword`, `desc`, `maps`, `favicon`, `logo`, `information`, `footer_bg`, `copyright`, `address`, `tel`, `hotline`, `email_host`, `email_port`, `email_secure`, `email_name`, `email_subject`, `email_receive`, `email_send`, `email_content`, `password_send`, `script_head`, `script_body`, `livechat`, `fax`) VALUES
(1, 1, 'dienmay', '', '', 'phụ kiện điện thoại iphone', 'điện thoại apple', 'linh kiện điện thoại iphone', 'phụ kiện điện thoại iphone các dòng', 'chuyên cung cấp sỉ và lẻ phụ kiện điện thoại apple', '', 'upload/image/logo-sao-viet-chinh.png', '', '', '', 'Copyright © 2015. Design by Sao Việt Co.,ltd Company', '', '', '0782 336 366', 'smtp.gmail.com', 25, 'tls', 'phukien.com.vn', 'Xác nhận đơn hàng', '', 'noreply.ptit@gmail.com', '', 'ptit@123', '', '', '', ''),
(2, 2, 'Vinmart', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Index pour la table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_category_extend`
--
ALTER TABLE `tbl_category_extend`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provinceid` (`pid`);

--
-- Index pour la table `tbl_language`
--
ALTER TABLE `tbl_language`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_layout`
--
ALTER TABLE `tbl_layout`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_online`
--
ALTER TABLE `tbl_online`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_option`
--
ALTER TABLE `tbl_option`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uri` (`uri`);

--
-- Index pour la table `tbl_product_extend`
--
ALTER TABLE `tbl_product_extend`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_province`
--
ALTER TABLE `tbl_province`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_translate`
--
ALTER TABLE `tbl_translate`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_ward`
--
ALTER TABLE `tbl_ward`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districtid` (`pid`);

--
-- Index pour la table `tbl_website`
--
ALTER TABLE `tbl_website`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
