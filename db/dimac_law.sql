-- phpMyAdmin SQL Dump
-- version 4.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2015 at 01:42 PM
-- Server version: 5.6.22
-- PHP Version: 5.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dimac_law`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `name`, `status`) VALUES
('tam', 'e10adc3949ba59abbe56e057f20f883e', 'Tam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `advertise`
--

CREATE TABLE IF NOT EXISTS `advertise` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cat_id` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vn'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `advertise`
--

INSERT INTO `advertise` (`id`, `name`, `alias`, `url`, `image`, `cat_id`, `order`, `created`, `status`, `lang`) VALUES
(6, 'Banner 1', 'banner-1', '', '1428985696banner-specialist.jpg', 1, 1, '2015-04-14 06:28:16', 1, 'vn'),
(7, 'Banner 2', 'banner-2', '', '1428985729banner.jpg', 1, 2, '2015-04-14 06:28:49', 1, 'vn'),
(11, 'Image giới thiệu', 'image-gioi-thieu', 'http://dimac-law.com', '1428987390img.png', 0, NULL, '2015-04-14 07:02:51', 1, 'vn'),
(13, 'Logo', 'logo', '', '1428987300logo.png', 0, NULL, '2015-04-14 06:55:00', 1, 'vn');

-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

CREATE TABLE IF NOT EXISTS `baiviet` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `cat_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `lang` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vn',
  `order_select` int(11) NOT NULL,
  `selected` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `baiviet`
--

INSERT INTO `baiviet` (`id`, `parent_id`, `cat_id`, `name`, `alias`, `description`, `content`, `image`, `ordering`, `status`, `created`, `lang`, `order_select`, `selected`) VALUES
(21, 0, 1, 'Giới thiệu DIMAC', 'gioi-thieu-dimac', NULL, '<p><strong>DIMAC</strong> l&agrave; một hãng luật độc lập v&agrave; chuy&ecirc;n nghiệp, chuy&ecirc;n tư vấn v&agrave; hỗ trợ kh&aacute;ch h&agrave;ng giải quyết c&aacute;c vấn đề ph&aacute;p l&yacute; v&ecirc;̀ đầu tư, mua b&aacute;n v&agrave; s&aacute;t nhập, c&ocirc;ng ty, thương lượng hiệu quả c&aacute;c thương vụ v&agrave; giải quyết tranh chấp thương mại, x&acirc;y dựng v&agrave; đầu tư nước ngo&agrave;i tại Việt Nam.</p>\r\n\r\n<p><strong>DIMAC</strong> lu&ocirc;n giữ sự cam kết với kh&aacute;ch h&agrave;ng dựa tr&ecirc;n sự tận t&acirc;m, chuy&ecirc;n nghiệp. Ch&uacute;ng t&ocirc;i đảm bảo chất lượng c&aacute;c dịch vụ ph&aacute;p l&yacute; tốt nhất khi cung cấp cho c&aacute;c c&ocirc;ng ty trong nước, c&aacute;c kh&aacute;ch h&agrave;ng c&oacute; vốn đầu tư nước ngo&agrave;i v&agrave; quốc tế, gi&uacute;p khách hàng tập trung v&agrave;o c&ocirc;ng việc kinh doanh m&agrave; kh&ocirc;ng tốn thời gian cho c&aacute;c vấn đề ph&aacute;p l&yacute; hay thủ tục h&agrave;nh ch&iacute;nh rắc rối.</p>\r\n\r\n<p>H&atilde;ng luật <strong>DIMAC</strong> hiện c&oacute; văn ph&ograve;ng ch&iacute;nh đặt tại Th&agrave;nh phố Hồ Ch&iacute; Minh v&agrave; sắp tới sẽ mở c&aacute;c Chi nh&aacute;nh tại H&agrave; Nội, Đ&agrave; Nẵng v&agrave; B&igrave;nh Dương để cung cấp, hỗ trợ v&agrave; giải quyết c&aacute;c vấn đề ph&aacute;p l&yacute; của kh&aacute;ch h&agrave;ng ph&aacute;t sinh tại&nbsp; c&aacute;c th&agrave;nh phố lớn của Việt Nam.</p>\r\n\r\n<p>L&agrave; ưu điểm cạnh tranh, c&aacute;c luật sư chuy&ecirc;n nghiệp của DIMIAC đ&atilde; từng l&agrave;m việc hoặc cung cấp dịch vụ cho c&aacute;c tổ chức lớn, c&ocirc;ng ty đa quốc gia v&agrave; ng&acirc;n h&agrave;ng, c&oacute; thể giải quyết nhanh v&agrave; hiệu quả c&aacute;c c&ocirc;ng việc kh&aacute;ch h&agrave;ng y&ecirc;u cầu. Do đ&oacute;, <strong>DIMAC</strong> ch&iacute;nh l&agrave; sự chọn lựa hợp l&yacute; v&agrave; tốt nhất cho c&aacute;c doanh nghiệp trong nước hay nước ngo&agrave;i v&agrave;o Việt Nam để đầu tư.</p>\r\n\r\n<p><em>Để tải t&agrave;i liệu giới thiệu c&ocirc;ng ty, vui l&ograve;ng bấm v&agrave;o n&uacute;t dưới đ&acirc;y: DOWNLOAD</em></p>\r\n', NULL, 1, 1, '2015-04-14 05:16:06', 'vn', 0, 0),
(22, 0, 4, 'Giải quyết tranh chấp', 'giai-quyet-tranh-chap', NULL, '<p>giải quyết tranh chấp</p>\r\n', NULL, 4, 1, '2015-04-14 08:37:27', 'vn', 0, 0),
(23, 22, 4, 'Tranh chấp dân sự', 'tranh-chap-dan-su', NULL, '<p>tranh chấp d&acirc;n sự</p>\r\n', NULL, 1, 1, '2015-04-13 11:46:24', 'vn', 0, 0),
(24, 0, 1, 'Sứ mệnh và tầm nhìn', 'su-menh-va-tam-nhin', NULL, '<p>Sứ mệnh v&agrave; tầm nh&igrave;n</p>\r\n', NULL, 2, 1, '2015-04-13 11:47:20', 'vn', 0, 0),
(25, 0, 1, 'Văn hoá', 'van-hoa', NULL, '<p>Văn ho&aacute;</p>\r\n', NULL, 3, 1, '2015-04-13 11:47:38', 'vn', 0, 0),
(26, 0, 1, 'Đạo đức và ứng xử', 'dao-duc-va-ung-xu', NULL, '<p>Đạo đức v&agrave; ứng xử</p>\r\n', NULL, 4, 1, '2015-04-13 11:48:03', 'vn', 0, 0),
(27, 0, 1, 'Đối tác kinh doanh', 'doi-tac-kinh-doanh', NULL, '<p>Đối t&aacute;c kinh doanh</p>\r\n', NULL, 5, 1, '2015-04-13 11:48:29', 'vn', 0, 0),
(28, 0, 1, 'Giải thưởng', 'giai-thuong', NULL, '<p>Giải thưởng</p>\r\n', NULL, 6, 1, '2015-04-13 11:50:17', 'vn', 0, 0),
(29, 0, 2, 'Hồ Chí Minh', 'ho-chi-minh', NULL, '<p>Hồ Ch&iacute; Minh</p>\r\n', NULL, 1, 1, '2015-04-13 11:50:36', 'vn', 0, 0),
(30, 0, 2, 'Hà Nội', 'ha-noi', NULL, '<p>H&agrave; Nội</p>\r\n', NULL, 2, 1, '2015-04-13 11:50:50', 'vn', 0, 0),
(31, 0, 2, 'Đà Nẵng', 'da-nang', NULL, '<p>Đ&agrave; Nẵng</p>\r\n', NULL, 3, 1, '2015-04-13 11:51:04', 'vn', 0, 0),
(32, 0, 2, 'Bình Dương', 'binh-duong', NULL, '<p>B&igrave;nh Dương</p>\r\n', NULL, 3, 1, '2015-04-13 11:51:25', 'vn', 0, 0),
(33, 0, 3, 'Các giá trị về nguyên tắc', 'cac-gia-tri-ve-nguyen-tac', NULL, '<p>C&aacute;c gi&aacute; trị về nguy&ecirc;n tắc</p>\r\n', NULL, 1, 1, '2015-04-13 11:51:58', 'vn', 1, 1),
(34, 0, 3, 'Các giá trị trong quan hệ khách hàng', 'cac-gia-tri-trong-quan-he-khach-hang', NULL, '<p>C&aacute;c gi&aacute; trị trong quan hệ kh&aacute;ch h&agrave;ng</p>\r\n', NULL, 2, 1, '2015-04-13 11:52:21', 'vn', 0, 0),
(35, 0, 3, 'Các giá trị trong công việc', 'cac-gia-tri-trong-cong-viec', NULL, '<p>C&aacute;c gi&aacute; trị trong c&ocirc;ng việc</p>\r\n', NULL, 3, 1, '2015-04-13 11:52:45', 'vn', 0, 0),
(36, 0, 3, 'Các giá trị trong quan hệ đồng nghiệp', 'cac-gia-tri-trong-quan-he-dong-nghiep', NULL, '<p>C&aacute;c gi&aacute; trị trong quan hệ đồng nghiệp</p>\r\n', NULL, 4, 1, '2015-04-13 11:53:12', 'vn', 0, 0),
(37, 0, 4, 'Đầu tư', 'dau-tu', NULL, '<p>Đầu tư</p>\r\n', NULL, 1, 1, '2015-04-13 11:53:35', 'vn', 0, 1),
(38, 0, 4, 'Mua bán và sát nhập', 'mua-ban-va-sat-nhap', NULL, '<p>Mua b&aacute;n v&agrave; s&aacute;t nhập</p>\r\n', NULL, 2, 1, '2015-04-13 11:53:54', 'vn', 0, 1),
(39, 0, 4, 'Doanh nghiệp', 'doanh-nghiep', NULL, '<p>Doanh nghiệp</p>\r\n', NULL, 3, 1, '2015-04-13 11:54:12', 'vn', 0, 1),
(40, 0, 4, 'Vụ việc dân sự', 'vu-viec-dan-su', NULL, '<p>Vụ việc d&acirc;n sự</p>\r\n', NULL, 4, 1, '2015-04-13 11:54:30', 'vn', 0, 1),
(41, 0, 4, 'Thương lượng', 'thuong-luong', NULL, '<p>Thương lượng</p>\r\n', NULL, 5, 1, '2015-04-13 11:54:48', 'vn', 0, 1),
(42, 22, 4, 'Tranh chấp thương mại', 'tranh-chap-thuong-mai', NULL, '<p>Tranh chấp thương mại</p>\r\n', NULL, 6, 1, '2015-04-13 11:55:14', 'vn', 0, 1),
(43, 22, 4, 'Tranh chấp lao động', 'tranh-chap-lao-dong', NULL, '<p>Tranh chấp lao động</p>\r\n', NULL, 7, 1, '2015-04-13 11:55:39', 'vn', 0, 1),
(44, 22, 4, 'Tranh chấp xây dựng', 'tranh-chap-xay-dung', NULL, '<p>Tranh chấp x&acirc;y dựng</p>\r\n', NULL, 8, 1, '2015-04-13 11:55:57', 'vn', 0, 1),
(45, 0, 4, 'Thu hồi nợ', 'thu-hoi-no', NULL, '<p>Thu hồi nợ</p>\r\n', NULL, 9, 1, '2015-04-13 11:56:19', 'vn', 0, 1),
(46, 0, 5, 'Các khách hàng lớn ', 'cac-khach-hang-lon-', NULL, '<p>C&aacute;c kh&aacute;ch h&agrave;ng lớn</p>\r\n', NULL, 1, 1, '2015-04-13 11:59:21', 'vn', 0, 0),
(47, 0, 5, 'Giao dịch điển hình ', 'giao-dich-dien-hinh-', NULL, '<p>Giao dịch điển h&igrave;nh</p>\r\n', NULL, 2, 1, '2015-04-13 12:00:09', 'vn', 0, 0),
(48, 0, 5, 'Khách hàng theo lĩnh vực ', 'khach-hang-theo-linh-vuc-', NULL, '<p>Kh&aacute;ch h&agrave;ng theo lĩnh vực</p>\r\n', NULL, 3, 1, '2015-04-13 11:59:58', 'vn', 0, 0),
(49, 0, 7, 'Cơ hội thực tập', 'co-hoi-thuc-tap', NULL, '<p>Cơ hội thực tập</p>\r\n', NULL, 1, 1, '2015-04-13 12:00:35', 'vn', 0, 1),
(50, 0, 7, 'Tuyển dụng', 'tuyen-dung', NULL, '<p>Tuyển dụng</p>\r\n', NULL, 2, 1, '2015-04-13 12:00:52', 'vn', 0, 1),
(52, 0, 6, 'Tin tức', 'tin-tuc', NULL, '<p>Tin tức</p>\r\n', NULL, 1, 1, '2015-04-13 13:02:27', 'vn', 0, 0),
(53, 0, 6, 'Cập nhật pháp lý', 'cap-nhat-phap-ly', NULL, '<p>Cập nhật ph&aacute;p l&yacute;</p>\r\n', NULL, 2, 1, '2015-04-13 13:02:54', 'vn', 0, 0),
(54, 0, 1, 'About DIMAC', 'about-dimac', NULL, '<p>About DIMAC</p>\r\n', NULL, 1, 1, '2015-04-14 05:55:29', 'en', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL,
  `langId` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `selected` tinyint(4) NOT NULL DEFAULT '0',
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vn'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `langId`, `name`, `alias`, `description`, `content`, `image`, `order`, `status`, `created`, `selected`, `lang`) VALUES
(1, 1, 'Spa & Recreation', 'spa--recreation', 'Lorem ipsum dolor sit, consectetuer adipiscing elit, sed diam nonummy euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Ut wisi enim ad minim. ', '<p>Lorem ipsum dolor sit, consectetuer adipiscing elit, sed diam nonummy euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Ut wisi enim ad minim.</p>\r\n', '1413440507page1_img1.jpg', NULL, 1, '2014-10-21 03:59:15', 0, 'vn'),
(2, 2, 'Làng nướng', 'lang-nuong', 'Không gian rộng rãi, thoáng mát\r\nMenu đa dạng hấp dẫn với các món nướng\r\nPhục vụ nhiệt tình, nhanh nhẹn', '<p>Mồi b&eacute;n m&agrave; gi&aacute; lại cực kỳ b&igrave;nh d&acirc;n nữa, 2 người nhậu chưa tới 150, dĩa mồi ho&agrave;nh tr&aacute;ng lu&ocirc;n</p>\r\n\r\n<p style="text-align: center;"><img alt="" src="http://hotelbenluc.com/admin/uploads/images/foody--68233-635331581471291250.jpg" style="height:800px; width:600px" /></p>\r\n\r\n<p style="text-align: center;"><img alt="" src="http://hotelbenluc.com/admin/uploads/images/foody-lang-nuong-ut-chon-635481865622165644.jpg" style="height:1066px; width:800px" /></p>\r\n\r\n<p style="text-align: center;"><img alt="" src="http://hotelbenluc.com/admin/uploads/images/foody-lang-nuong-ut-chon-635481865676141739.jpg" style="height:1066px; width:800px" /><br />\r\n&nbsp;</p>\r\n\r\n<p style="text-align: right;">Nguồn: <a href="http://www.foody.vn/long-an/lang-nuong-ut-chon" title="Làng Nướng Út Chơn | Long An | Foody.vn">http://www.foody.vn/long-an/lang-nuong-ut-chon</a></p>\r\n', '1413863942langnuong.jpg', NULL, 1, '2014-10-21 03:59:02', 1, 'vn'),
(3, 3, 'Hải Sản', 'hai-san', 'Quán nhỏ nhưng là chỗ cung cấp hải sản cho những quán khác nên khá đầy đủ các loại hải sản và các loại ốc nghêu. Ban ngày thì là chỗ bán hải sản ban đêm chế biến hải sản bán luôn. Mình có thể lựa chọn những hải sản để bàn quán làm món cho mình luôn. ', '<p>Qu&aacute;n nhỏ nhưng l&agrave; chỗ cung cấp hải sản cho những qu&aacute;n kh&aacute;c n&ecirc;n kh&aacute; đầy đủ c&aacute;c loại hải sản v&agrave; c&aacute;c loại ốc ngh&ecirc;u. Ban ng&agrave;y th&igrave; l&agrave; chỗ b&aacute;n hải sản ban đ&ecirc;m chế biến hải sản b&aacute;n lu&ocirc;n. M&igrave;nh c&oacute; thể lựa chọn những hải sản để b&agrave;n qu&aacute;n l&agrave;m m&oacute;n cho m&igrave;nh lu&ocirc;n. Bữa ăn thử mấy m&oacute;n c&ograve;n kh&aacute; tươi c&aacute; nướng ngon ngọt v&agrave; s&ograve; + mực ngon</p>\r\n\r\n<p style="text-align:center"><img alt="" src="http://hotelbenluc.com/admin/uploads/images/foody--72325-635341370076927500.jpg" style="height:800px; width:600px" /></p>\r\n\r\n<p style="text-align:center"><img alt="" src="http://hotelbenluc.com/admin/uploads/images/foody--72325-635341370055833750.jpg" style="height:800px; width:600px" /><br />\r\n&nbsp;</p>\r\n\r\n<p style="text-align:right">Nguồn: <a href="http://www.foody.vn/long-an/quan-hai-san-bien-dong" title="(2) Quán Hải Sản Biển Đông | Long An | Foody.vn">http://www.foody.vn/long-an/quan-hai-san-bien-dong</a></p>\r\n', '1413862392haisan_biendong.jpg', NULL, 1, '2014-10-21 03:37:03', 1, 'vn'),
(4, 4, 'Thủy Mộc Cafe', 'thuy-moc-cafe', 'Nơi để tập tụ bạn bè tám chuyện hợp lí quán có không gian khá rộng rãi nhiều không gian riêng trong nhà ngoài trời được bố trí khá nhiều hồ nước với vòi phun nên không gian khá mát mẻ.', '<div style="position:relative">\r\n<div class="title"><a href="http://www.foody.vn/long-an/thuy-moc-cafe/binh-luan-89013">Kh&ocirc;ng gian rộng r&atilde;i tho&aacute;t m&aacute;t</a></div>\r\n</div>\r\n\r\n<div class="desc disableSection" style="white-space: pre-line;">Nằm ngay trung t&acirc;m huyện Bến Lức, Nơi để tập tụ bạn b&egrave; t&aacute;m chuyện hợp l&iacute; qu&aacute;n c&oacute; kh&ocirc;ng gian kh&aacute; rộng r&atilde;i nhiều kh&ocirc;ng gian ri&ecirc;ng trong nh&agrave; ngo&agrave;i trời được bố tr&iacute; kh&aacute; nhiều hồ nước với v&ograve;i phun n&ecirc;n kh&ocirc;ng gian kh&aacute; m&aacute;t mẻ.</div>\r\n\r\n<div class="desc disableSection" style="white-space: pre-line; text-align: center;"><img alt="" src="http://hotelbenluc.com/admin/uploads/images/foody-thuy-moc-cafe-ec45f510-5d76-41a6-9182-48b794bd94fe-635374018589583716.jpg" style="height:800px; width:600px" /></div>\r\n\r\n<div class="desc disableSection" style="white-space: pre-line; text-align: center;"><img alt="" src="http://hotelbenluc.com/admin/uploads/images/foody-thuy-moc-cafe-ec45f510-5d76-41a6-9182-48b794bd94fe-635374018658691837.jpg" style="height:800px; width:600px" /></div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:right"><br />\r\nNguồn: <a href="http://www.foody.vn/long-an/thuy-moc-cafe" title="(2) Thủy Mộc Cafe - Mai Thị Non | Foody.vn">http://www.foody.vn/long-an/thuy-moc-cafe</a></p>\r\n\r\n<p style="text-align: right;"><a href="http://hotelbenluc.com">hotelbenluc.com</a></p>\r\n\r\n<div style="position: absolute; left: -99999px;">\r\n<div style="position:relative">\r\n<div class="title"><a href="http://www.foody.vn/long-an/thuy-moc-cafe/binh-luan-89013">Kh&ocirc;ng gian rộng r&atilde;i tho&aacute;t m&aacute;t</a></div>\r\n</div>\r\n\r\n<div class="desc disableSection" style="white-space: pre-line;">Nơi để tập tụ bạn b&egrave; t&aacute;m chuyện hợp l&iacute; qu&aacute;n c&oacute; kh&ocirc;ng gian kh&aacute; rộng r&atilde;i nhiều kh&ocirc;ng gian ri&ecirc;ng trong nh&agrave; ngo&agrave;i trời được bố tr&iacute; kh&aacute; nhiều hồ nước với v&ograve;i phun n&ecirc;n kh&ocirc;ng gian kh&aacute; m&aacute;t mẻ. Chất lượng thức uống chỉ tạm cafe dở, nh&acirc;n vi&ecirc;n phục vụ kh&ocirc;ng chuy&ecirc;n nghiệp lắm</div>\r\n<br />\r\n<br />\r\nNguồn: <a href="http://www.foody.vn/long-an/thuy-moc-cafe" title="(2) Thủy Mộc Cafe - Mai Thị Non | Foody.vn">http://www.foody.vn/long-an/thuy-moc-cafe</a></div>\r\n\r\n<div style="position: absolute; left: -99999px;">\r\n<div style="position:relative">\r\n<div class="title"><a href="http://www.foody.vn/long-an/thuy-moc-cafe/binh-luan-89013">Kh&ocirc;ng gian rộng r&atilde;i tho&aacute;t m&aacute;t</a></div>\r\n</div>\r\n\r\n<div class="desc disableSection" style="white-space: pre-line;">Nơi để tập tụ bạn b&egrave; t&aacute;m chuyện hợp l&iacute; qu&aacute;n c&oacute; kh&ocirc;ng gian kh&aacute; rộng r&atilde;i nhiều kh&ocirc;ng gian ri&ecirc;ng trong nh&agrave; ngo&agrave;i trời được bố tr&iacute; kh&aacute; nhiều hồ nước với v&ograve;i phun n&ecirc;n kh&ocirc;ng gian kh&aacute; m&aacute;t mẻ. Chất lượng thức uống chỉ tạm cafe dở, nh&acirc;n vi&ecirc;n phục vụ kh&ocirc;ng chuy&ecirc;n nghiệp lắm</div>\r\n<br />\r\n<br />\r\nNguồn: <a href="http://www.foody.vn/long-an/thuy-moc-cafe" title="(2) Thủy Mộc Cafe - Mai Thị Non | Foody.vn">http://www.foody.vn/long-an/thuy-moc-cafe</a></div>\r\n', '1413861676thuymoc_cafe.jpg', NULL, 1, '2014-10-30 07:16:25', 1, 'vn'),
(5, 0, 'Năm 2015, người dân có vào vui chơi được ở HappyLand?', 'nam-2015-nguoi-dan-co-vao-vui-choi-duoc-o-happyland', 'Ngày 14/2/2011, Công ty CP Đầu tư Xây dựng và Phát triển hạ tầng Phú An (công ty con của tập đoàn Khang Thông) khởi động khu phức hợp giải trí HappyLand tại xã Thạnh Đức, huyện Bến Lức, tỉnh Long An, có quy mô 688ha', '<div class="field field-name-body field-type-text-with-summary field-label-hidden">\r\n<div class="field-items">\r\n<div class="field-item even">\r\n<p style="text-align:justify">Ng&agrave;y 14/2/2011, C&ocirc;ng ty CP Đầu tư X&acirc;y dựng v&agrave; Ph&aacute;t triển hạ tầng Ph&uacute; An (c&ocirc;ng ty con của tập đo&agrave;n Khang Th&ocirc;ng) khởi động khu phức hợp giải tr&iacute; HappyLand tại x&atilde; Thạnh Đức, huyện Bến Lức, tỉnh Long An, c&oacute; quy m&ocirc; 688ha. Giai đoạn 1 của dự &aacute;n (DA) 338ha, giai đoạn 2.350ha.</p>\r\n\r\n<p style="text-align: center;"><img alt="Lễ khởi công khu phức hợp giải trí HappyLand (Nguồn Internet)." src="http://tinnhanhdiaoc.vn/sites/default/files/pictures/_mg_7391_ddt_resize.jpg" style="height:400px; width:600px" title="Lễ khởi công khu phức hợp giải trí HappyLand (Nguồn Internet)." /></p>\r\n\r\n<p style="text-align: center;">Lễ khởi c&ocirc;ng khu phức hợp giải tr&iacute; HappyLand (Nguồn Internet).</p>\r\n\r\n<p>HappyLand được Khang Th&ocirc;ng đặt t&ecirc;n l&agrave; &ldquo;Xứ sở hạnh ph&uacute;c&rdquo;, bởi được quy hoạch x&acirc;y dựng th&agrave;nh một quần thể phức hợp du lịch - thương mại - dịch vụ. C&aacute;c c&ocirc;ng tr&igrave;nh giải tr&iacute; kết hợp giữa c&aacute;c yếu tố truyền thống Việt Nam v&agrave; những n&eacute;t hiện đại của c&aacute;c c&ocirc;ng vi&ecirc;n nổi tiếng thế giới như Disneyland, Universal Studio...</p>\r\n\r\n<p>Theo chủ đầu tư, h&agrave;ng trăm c&ocirc;ng tr&igrave;nh giải tr&iacute; hiện đại ở c&ocirc;ng vi&ecirc;n như trung t&acirc;m thương mại, c&ocirc;ng vi&ecirc;n nước, c&ocirc;ng vi&ecirc;n phim trường, vũ trường, s&acirc;n khấu trong v&agrave; ngo&agrave;i trời, nh&agrave; h&agrave;ng, chợ nổi, trung t&acirc;m văn h&oacute;a Việt Nam, bảo t&agrave;ng nghệ thuật, kh&aacute;ch sạn ti&ecirc;u chuẩn 7 sao, khu đ&ocirc; thị liền kề... Đ&acirc;y sẽ l&agrave; &ldquo;xứ sở hạnh ph&uacute;c&rdquo; cho tất cả mọi người. Với tầm cỡ của n&oacute;, HappyLand được đ&aacute;nh gi&aacute; l&agrave; khu vui chơi giải tr&iacute; số 1 tại Đ&ocirc;ng Nam &Aacute;.</p>\r\n\r\n<p>Trong quy hoạch tổng thể dự &aacute;n, Khang Th&ocirc;ng đầu tư khoảng 600 triệu USD x&acirc;y dựng c&ocirc;ng vi&ecirc;n chủ đề 100ha. C&aacute;c hạng mục c&ograve;n lại chủ yếu k&ecirc;u gọi c&aacute;c đối t&aacute;c lớn trong v&agrave; ngo&agrave;i nước đầu tư. C&ocirc;ng tr&igrave;nh dự kiến ho&agrave;n th&agrave;nh v&agrave;o qu&yacute; II/2014 (sau 4 năm thi c&ocirc;ng).</p>\r\n\r\n<p>Tuy nhi&ecirc;n, mới đ&acirc;y nhất, theo b&aacute;o c&aacute;o của chủ dự &aacute;n, do điều kiện kinh tế kh&oacute; khăn, c&ocirc;ng ty sẽ triển khai dự &aacute;n v&agrave; đưa v&agrave;o khai th&aacute;c theo h&igrave;nh thức cuốn chiếu. Kế hoạch đặt ra phấn đấu đền cuối năm 2014 đầu năm 2015 sẽ ho&agrave;n th&agrave;nh, đưa v&agrave;o khai th&aacute;c một phần.</p>\r\n\r\n<p>B&aacute;o c&aacute;o với đo&agrave;n kiểm tra của UBND tỉnh Long An l&agrave; như vậy, nhưng thực tế th&igrave; liệu đến thời điểm ấy chủ đầu tư c&oacute; thực hiện đ&uacute;ng cam kết hay kh&ocirc;ng lại l&agrave; chuyện kh&aacute;c. Bởi v&igrave;, hiện tại ngo&agrave;i chuyện thiếu vốn đầu tư, phải tr&ocirc;ng chờ v&agrave;o vốn của nh&agrave; đầu tư của c&aacute;c đối t&aacute;c trong v&agrave; ngo&agrave;i nước kh&aacute;c do Ph&uacute; An l&agrave;m c&ocirc;ng t&aacute;c quảng b&aacute;, x&uacute;c tiến đầu tư.</p>\r\n\r\n<p>Vấn đề hệ trọng hơn l&agrave; hiện nay tại một số dự &aacute;n th&agrave;nh phần c&ocirc;ng t&aacute;c đền b&ugrave; giải tỏa đang l&agrave; vướng mắc to lớn nhất của đại dự &aacute;n n&agrave;y.</p>\r\n\r\n<p>Theo đ&oacute;, ở giai đoạn 1 sẽ x&acirc;y dựng 2 phần ch&iacute;nh l&agrave; Khu phức hợp giải tr&iacute; c&oacute; diện t&iacute;ch 262,8ha; v&agrave; khu d&acirc;n cư nh&agrave; vườn c&oacute; diện t&iacute;ch 71,6ha. Đến nay khoản giải ng&acirc;n cho giai đoạn 1 của dự &aacute;n đ&atilde; được khoảng 330 triệu USD. Tuy nhi&ecirc;n dự &aacute;n vẫn kh&oacute; l&ograve;ng triển khai khi vẫn c&ograve;n 35 trường hợp kh&ocirc;ng nhận tiền đền b&ugrave; với diện t&iacute;ch 61.477m<sup>2</sup> v&agrave; 21 trường hợp s&oacute;t thửa chờ &aacute;p gi&aacute; với diện t&iacute;ch 29.051m<sup>2</sup>.</p>\r\n\r\n<p>Về vấn đề n&agrave;y, UBND tỉnh Long An vừa c&oacute; văn bản y&ecirc;u cầu huyện Bến Lức phải tập trung phối hợp c&ugrave;ng chủ dự &aacute;n tiến h&agrave;nh r&agrave; so&aacute;t v&agrave; xử l&yacute; dứt điểm, kh&ocirc;ng để k&eacute;o d&agrave;i th&ecirc;m chuyện đền b&ugrave; giải ph&oacute;ng mặt bằng. Trong th&aacute;ng 7/2014 phải thực hiện xong v&agrave; b&aacute;o c&aacute;o kết quả cho UBND tỉnh.</p>\r\n\r\n<p>Đối với những trường hợp đ&atilde; giao nền t&aacute;i định cư cho d&acirc;n, tỉnh cũng y&ecirc;u cầu chủ dự &aacute;n khẩn trương l&agrave;m thủ tục cấp giấy chứng nhận quyền sử dụng đất cho d&acirc;n. Ri&ecirc;ng về c&ocirc;ng t&aacute;c k&ecirc; bi&ecirc;n, bồi thường giải ph&oacute;ng mặt bằng khu t&aacute;i định cư 1 mở rộng, tỉnh y&ecirc;u cầu c&ocirc;ng khi n&agrave;o đủ điều kiện về t&agrave;i ch&iacute;nh th&igrave; mới tiếp tục c&ocirc;ng việc bồi thường giải ph&oacute;ng mặt bằng để tiếp tục triển khai dự &aacute;n.</p>\r\n\r\n<p>Mặc d&ugrave; tỉnh Long An cũng đề nghị c&ocirc;ng ty Ph&uacute; An c&ugrave;ng với địa phương x&acirc;y dựng c&aacute;c giải ph&aacute;p để quảng b&aacute; v&agrave; mời gọi đối t&aacute;c đầu tư, tuy nhi&ecirc;n, theo đ&aacute;nh gi&aacute; của nhiều chuy&ecirc;n gia, trong t&igrave;nh h&igrave;nh thị trường BĐS chưa khởi sắc như hiện nay, v&agrave; với việc một số ph&acirc;n kh&uacute;c thị trường BĐS trong nước mới nổi l&ecirc;n, th&igrave; dự &aacute;n HappyLand vẫn chưa c&oacute; yếu tố nổi trội hay đột ph&aacute; để c&aacute;c nh&agrave; đầu tư r&oacute;t vốn.</p>\r\n\r\n<p>V&agrave; như vậy, cơ hội để người d&acirc;n v&agrave;o vui chơi ở khu giải tr&iacute; HappyLand c&oacute; lẽ kh&oacute; trở th&agrave;nh thực tế v&agrave;o năm 2015.</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="field field-name-field-author field-type-taxonomy-term-reference field-label-hidden">\r\n<p style="text-align: right;"><strong>Nguy&ecirc;n Kh&ocirc;i</strong></p>\r\n</div>\r\n\r\n<p style="text-align: right;"><strong>&nbsp;Ben Luc Hotels</strong></p>\r\n', '1415067910_mg_7391_ddt_resize.jpg', NULL, 1, '2014-11-04 02:25:10', 0, 'vn'),
(6, 0, 'Phước Lộc Thọ', 'phuoc-loc-tho', 'Như đắm mình trong không gian cổ xưa, như đang trở về với nguồn cội, Làng Cổ Phước Lộc Thọ tọa lạc tại vùng đất Đức Hòa, Tỉnh Long An, nơi tiếp giáp chuyển vùng từ Đông Nam Bộ sang Tây Nam Bộ, tạo cho Làng Cổ Phước Lộc Thọ một bản sắc riêng độc đáo v', '<p>Như đắm m&igrave;nh trong kh&ocirc;ng gian cổ xưa, như đang trở về với nguồn cội, L&agrave;ng Cổ Phước Lộc Thọ tọa lạc tại v&ugrave;ng đất Đức H&ograve;a, Tỉnh Long An, nơi tiếp gi&aacute;p chuyển v&ugrave;ng từ Đ&ocirc;ng Nam Bộ sang T&acirc;y Nam Bộ, tạo cho L&agrave;ng Cổ Phước Lộc Thọ một bản sắc ri&ecirc;ng độc đ&aacute;o vừa mang vẻ đẹp của v&ugrave;ng s&ocirc;ng nước đồng bằng s&ocirc;ng Cửu Long, vừa c&oacute; n&eacute;t duy&ecirc;n của miền Đ&ocirc;ng Nam bộ.</p>\r\n\r\n<p style="text-align:justify"><span style="color:#000000">Với hơn 22 căn nh&agrave; gỗ cổ tr&ecirc;n khắp 3 miền nước Việt, v&agrave; h&agrave;ng trăm đồ vật, cổ vật qu&yacute; từ vật dụng sinh hoạt h&agrave;ng ng&agrave;y của vua ch&uacute;a, quan qu&acirc;n, địa chủ, người d&acirc;n đến c&aacute;c vật t&acirc;m linh văn h&oacute;a của người Việt được b&agrave;y tr&iacute; theo từng gian nh&agrave; gỗ được phục dựng v&agrave; lưu giữ tại <a href="http://travel.zizi.vn/thong-tin-du-lich/319/kham-pha-net-dac-sac-cua-lang-co-phuoc-loc-tho-tinh-long-an/thong-tin"><strong>L&agrave;ng cổ Phước Lộc Thọ</strong></a>.</span></p>\r\n\r\n<p style="text-align:center"><span style="color:#000000"><img alt="Làng cổ Phước Lộc Thọ" src="http://travel.zizi.vn/Resources/Editor/Images/langco1.jpg" style="height:333px; width:500px" /></span></p>\r\n\r\n<p style="text-align:center"><span style="color:#000000"><em>L&agrave;ng cổ Phước Lộc Thọ...</em></span></p>\r\n\r\n<p style="text-align:justify"><span style="color:#000000">Những ai th&iacute;ch th&uacute; vẻ đẹp ho&agrave;i cổ, đam m&ecirc; t&igrave;m hiểu gi&aacute; trị phong tuc tập qu&aacute;n, nếp sinh hoạt thường nhật của người Việt Xưa khi đến L&agrave;ng Cổ Phước Lộc Thọ ch&uacute;ng ta sẽ cảm nhận được nhiều điều th&uacute; vị, từ mỗi căn nh&agrave; gỗ mang phong c&aacute;ch 3 miền Bắc, Trung, Nam được phục dựng xen lẫn với những cảnh quan thi&ecirc;n nhi&ecirc;n, s&ocirc;ng nước hữu t&igrave;nh đến c&aacute;c vật dụng sinh hoạt bằng đủ mọi chất liệu gỗ, sắc, đồng, gốm sứ&hellip;đang dạng ni&ecirc;n đại, phong ph&uacute; chủng loại.</span> Bạn muốn <a href="/"><strong>du lịch</strong></a> về đ&acirc;y c&oacute; thể tham gia c&aacute;c <a href="http://travel.zizi.vn/tour-du-lich"><strong>tour du lịch</strong></a> hay đi <a href="http://travel.zizi.vn/cam-nang/3/du-lich-bui"><strong>du lịch bụi</strong></a>.</p>\r\n\r\n<p style="text-align:center"><span style="color:#000000"><img alt="Nơi cảm nhận về con người Việt Xưa" src="http://travel.zizi.vn/Resources/Editor/Images/langco.jpg" style="height:336px; width:500px" /></span></p>\r\n\r\n<p style="text-align:center"><span style="color:#000000"><em>Nơi cảm nhận về con người Việt Xưa...</em></span></p>\r\n\r\n<p style="text-align:justify"><span style="color:#000000">L&agrave;ng cổ Phước Lộc Thọ đ&atilde; được Sở Văn H&oacute;a Thể Thao v&agrave; Du Lịch Tỉnh <a href="http://travel.zizi.vn/du-lich-tinh/40/long-an"><strong>Long An</strong></a> c&ocirc;ng nhận l&agrave; <a href="http://travel.zizi.vn/thong-tin-du-lich/1/dia-danh-du-lich"><strong>Điểm du lịch</strong></a> v&agrave; mở cửa đ&oacute;n kh&aacute;ch tham quan, vui chơi giải tr&iacute;, d&atilde; ngoại, sưu tập những bộ album cưới, tổ chức tiệc cưới, sự kiện cho Qu&yacute; kh&aacute;ch c&oacute; nhu cầu.</span></p>\r\n\r\n<p style="text-align:center"><span style="color:#000000"><img alt="Nơi lưu giữ nhiều loại đồ cổ khác nhau..." src="http://travel.zizi.vn/Resources/Editor/Images/langco4.jpg" style="height:341px; width:500px" /></span></p>\r\n\r\n<p style="text-align:center"><span style="color:#000000"><em>Nơi lưu giữ nhiều loại đồ cổ kh&aacute;c nhau...</em></span></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p style="text-align:center"><span style="color:#000000"><em><img alt="" src="http://travel.zizi.vn/Resources/Editor/Images/langco3.jpg" style="height:375px; width:500px" /></em></span></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p style="text-align:center"><span style="color:#000000"><em><img alt="Hòa cùng cảnh sắc thiên nhiên ..." src="http://travel.zizi.vn/Resources/Editor/Images/langco5.jpg" style="height:333px; width:500px" /></em></span></p>\r\n\r\n<p style="text-align:center"><span style="color:#000000"><em>H&ograve;a c&ugrave;ng cảnh sắc thi&ecirc;n nhi&ecirc;n ...</em></span></p>\r\n\r\n<p><span style="color:#000000">Đến l&agrave;ng cổ Phước Lộc Thọ, du kh&aacute;ch kh&ocirc;ng chỉ c&oacute; dịp kh&aacute;m ph&aacute; vẻ đẹp tiềm ẩn từ những ng&ocirc;i nh&agrave; cổ m&agrave; c&ograve;n c&oacute; cơ hội t&igrave;m hiểu văn h&oacute;a người Việt ở v&ugrave;ng s&ocirc;ng nước Cửu Long dọc theo d&ograve;ng s&ocirc;ng V&agrave;m Cỏ hay văn h&oacute;a &Oacute;c Eo cổ xưa, thưởng thức c&aacute;c m&oacute;n ăn đặc sản của v&ugrave;ng đất Long An v&agrave; miền s&ocirc;ng nước, nghe c&aacute;c l&agrave;n điệu d&acirc;n ca, những b&agrave;i dạ cổ ngọt ng&agrave;o, da diết&hellip;</span></p>\r\n\r\n<p style="text-align:right"><span style="color:#000000">Nguồn: </span><strong>http://travel.zizi.vn</strong></p>\r\n\r\n<p style="text-align:right"><strong><span style="color:#000000">Ben Luc Hotels</span></strong></p>\r\n', '14150696181470184_658610480856999_255302085_n.jpg', NULL, 1, '2014-11-10 07:13:40', 1, 'vn');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vn'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `alias`, `status`, `created`, `lang`) VALUES
(1, 'Giới thiệu', 'gioi-thieu', 1, '2015-04-13 09:50:23', 'vn'),
(2, 'Văn phòng', 'van-phong', 1, '2015-04-13 09:50:54', 'vn'),
(3, 'Giá trị cốt lõi', 'gia-tri-cot-loi', 1, '2015-04-13 09:51:05', 'vn'),
(4, 'Lĩnh vực hoạt động', 'linh-vuc-hoat-dong', 1, '2015-04-13 09:51:18', 'vn'),
(5, 'Khách hàng', 'khach-hang', 1, '2015-04-13 09:51:29', 'vn'),
(6, 'Tin tức và cập nhật', 'tin-tuc-va-cap-nhat', 1, '2015-04-13 09:51:54', 'vn'),
(7, 'Nghề nghiệp', 'nghe-nghiep', 1, '2015-04-13 09:52:10', 'vn');

-- --------------------------------------------------------

--
-- Table structure for table `condition`
--

CREATE TABLE IF NOT EXISTS `condition` (
  `id` int(11) NOT NULL,
  `langId` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `ordering` int(11) NOT NULL,
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vn'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `condition`
--

INSERT INTO `condition` (`id`, `langId`, `name`, `alias`, `content`, `status`, `created`, `ordering`, `lang`) VALUES
(1, 1, 'Quy định', 'quy-dinh', '<div>\r\n<p>Qu&yacute; kh&aacute;ch đến với nh&agrave; nghỉ phải c&oacute; giấy tờ t&ugrave;y th&acirc;n do c&ocirc;ng an cấp ( CMND , hộ chiếu , bắng l&aacute;i xe....)</p>\r\n</div>\r\n\r\n<p>Qu&yacute; kh&aacute;ch tự bảo quản t&agrave;i sản v&agrave; vật dụng chung của m&igrave;nh ( Đối với h&agrave;nh l&yacute; c&oacute; gi&aacute; trị, Qu&yacute; kh&aacute;ch vui l&ograve;ng gửi tại lễ t&acirc;n. Nh&agrave; nghỉ kh&ocirc;ng chịu tr&aacute;ch nhiệm bồi thường khi kh&ocirc;ng k&yacute; gửi)</p>\r\n\r\n<div>\r\n<p>Để đảm bảo vấn đề an ninh &amp; an to&agrave;n cho qu&yacute; kh&aacute;ch . Qu&yacute; kh&aacute;ch vui l&ograve;ng kh&ocirc;ng tiếp kh&aacute;ch trong ph&ograve;ng nghỉ. Qu&yacute; kh&aacute;ch vui l&ograve;ng tiếp kh&aacute;ch tại sảnh.</p>\r\n</div>\r\n\r\n<div>\r\n<p>Nghi&ecirc;m cấm mang c&aacute;c đồ vật dễ ch&aacute;y, chất nổ, vũ kh&iacute;, ma t&uacute;y v&agrave; s&uacute;c vật v&agrave;o ph&ograve;ng nghỉ.</p>\r\n</div>\r\n\r\n<div>\r\n<p>Kh&ocirc;ng nấu nướng, ủi quần &aacute;o trong ph&ograve;ng, kh&ocirc;ng h&uacute;t thuốc tr&ecirc;n giường ngủ.</p>\r\n</div>\r\n\r\n<div>\r\n<p>Trường hợp qu&yacute; kh&aacute;ch l&agrave;m hư hỏng, mất t&agrave;i sản được trang bị trong ph&ograve;ng, Qu&yacute; kh&aacute;ch phải c&oacute; tr&aacute;ch nhiệm bồi thường theo mức gi&aacute; qui định của nh&agrave; nghỉ.</p>\r\n</div>\r\n', 1, '2014-10-23 12:50:04', 1, 'vn'),
(2, 2, 'Nhận phòng & Trả phòng', 'nhan-phong--tra-phong', '<div><strong>Kh&aacute;ch ở ng&agrave;y </strong>: Giờ nhận ph&ograve;ng (01 ng&agrave;y)</div>\r\n\r\n<div>\r\n<div>Giờ nhận : 12h00 đến 17h00 ng&agrave;y h&ocirc;m nay</div>\r\n\r\n<div>Giờ trả : 12h00 ng&agrave;y h&ocirc;m sau.</div>\r\n</div>\r\n\r\n<div style="float:none">Đối với Kh&aacute;ch h&agrave;ng trả ph&ograve;ng sau 12h00, được t&iacute;nh phụ thu th&ecirc;m :</div>\r\n\r\n<div>Ph&ograve;ng thường : 20.000đ/h</div>\r\n\r\n<div>Ph&ograve;ng V.I.P : 40.000đ/h</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><strong>Kh&aacute;ch ở đ&ecirc;m </strong>: Giờ nhận ph&ograve;ng</div>\r\n\r\n<div>\r\n<div>Giờ nhận : 22h00 ng&agrave;y h&ocirc;m nay</div>\r\n\r\n<div>Giờ trả : 12h00 ng&agrave;y h&ocirc;m sau.</div>\r\n</div>\r\n\r\n<div>Đối với Kh&aacute;ch h&agrave;ng nhận ph&ograve;ng trước 22h hoặc trả ph&ograve;ng sau 12h00, được t&iacute;nh phụ thu th&ecirc;m :</div>\r\n\r\n<div>Ph&ograve;ng thường : 20.000đ/h</div>\r\n\r\n<div>Ph&ograve;ng V.I.P : 40.000đ/h</div>\r\n', 0, '2014-10-23 09:01:58', 2, 'vn'),
(3, 3, 'Lưu ý', 'luu-y', '<p>Qu&yacute; kh&aacute;ch vui long kh&oacute;a cửa ra v&agrave;o, cửa ban c&ocirc;ng v&agrave; tắt c&aacute;c thiết bị điện khi ra ngo&agrave;i v&agrave; gửi ch&igrave;a kh&oacute;a tại lễ t&acirc;n.</p>\r\n\r\n<p>Qu&yacute; kh&aacute;ch vui l&ograve;ng giữ vệ sinh chung.</p>\r\n\r\n<p>Khi trả phỏng qu&yacute; kh&aacute;ch vui l&ograve;ng gửi ch&igrave;a kh&oacute;a ,remove tivi ..tại quầy lễ t&acirc;n.</p>\r\n\r\n<p style="text-align: center;">Tr&acirc;n trọng cảm ơn sự hợp t&aacute;c của qu&yacute; kh&aacute;ch.</p>\r\n\r\n<p style="text-align: center;"><strong>Li&ecirc;n hệ lễ t&acirc;n vui l&ograve;ng bấm số : 8</strong></p>\r\n', 1, '2014-10-23 09:04:18', 3, 'vn'),
(4, 0, 'Regulation', 'regulation', '<p>You have to stay with the identification by the police (identity card, passport, driving license ....)</p>\r\n\r\n<p>You self-storage properties and their common objects (for luggage valuable, please deposit at reception. Lodging is not responsible for compensation when no deposit)</p>\r\n\r\n<p>To ensure security &amp; safety for our customers. Please do not stay sitting in the room. Please seating in the lobby.</p>\r\n\r\n<p>Strictly forbidden to carry flammable items, explosives, weapons, drugs and animals to leave the room.</p>\r\n\r\n<p>No cooking, ironing room, do not smoke in bed.</p>\r\n\r\n<p>In case you damage or lose the property is equipped in the room, you have the responsibility to pay compensation under the provisions of the prices right.</p>\r\n', 1, '2014-10-23 09:09:55', 1, 'en'),
(5, 0, 'Check-in & Check-out', 'check-in--check-out', '<p>Guest of the day: Check-in time (01 days)<br />\r\nCheck-in time: 12h00 to 17h00 today<br />\r\nCheck-out time: 12h00 the following day.<br />\r\nFor customers check out after 12:00, are additional charge:<br />\r\nRooms often: 20,000 VND / h<br />\r\nV.I.P Room: 40,000 / h<br />\r\n&nbsp;<br />\r\nGuests at night: Check in time<br />\r\nCheck-in time: 22h00 today<br />\r\nCheck-out time: 12h00 the following day.<br />\r\nFor customers who check-in or check-out before 22 pm after 12h00, surcharges are added:<br />\r\nRooms often: 20,000 VND / h<br />\r\nV.I.P Room: 40,000 / h</p>\r\n', 0, '2014-10-23 09:07:37', 2, 'en'),
(6, 0, 'Note', 'note', '<p>Please lock doors, balcony doors and turn off the lights when out and send the key at reception.</p>\r\n\r\n<p>Please keep general hygiene.</p>\r\n\r\n<p>When asked interview please send the key, remove ..tai TV reception.</p>\r\n\r\n<p style="text-align: center;">Sincerely thank you for your cooperation.</p>\r\n\r\n<p style="text-align: center;"><strong>Reception please call number : 8</strong></p>\r\n', 1, '2014-10-23 09:06:25', 3, 'en'),
(7, 0, '规定', '规定', '<p>贵各来到旅馆必须有公安或有关部门提供的随身证件 （身份证，护照，驾驶执照....）<br />\r\n贵客请保管好自己的财产以及物品（对于有价值的行李，请贵客把行李寄存到接待处。对于没寄存的行李，我们不会负责赔偿）<br />\r\n为了确保各位贵客的安全，请各位贵客不在房间里接待客人，可以在大厅接待。<br />\r\n严禁携带易燃物品，爆炸物，武器，毒品和动物进旅馆。<br />\r\n不可在房间里做饭，熨衣服，不可在床上吸烟。<br />\r\n如果您把房间里的物品损坏或弄丢，您将要根据旅馆的规定价格来支付赔偿金</p>\r\n', 1, '2014-10-24 16:37:33', 1, 'cn'),
(8, 0, '入住及退房', '入住及退房', '<p>当天的来宾：入住时间（01天）<br />\r\n入住时间：中午12点到17点今天<br />\r\n退房时间：中午12点以下的日子。<br />\r\n对于12:00后，客户退房，有额外收费：<br />\r\n通常酒店的客房：20,000越盾/小时<br />\r\nV.I.P房：40,000/小时<br />\r\n&nbsp;<br />\r\n客人晚上：入住时间<br />\r\n入住时间：今天22:00<br />\r\n退房时间：中午12点以下的日子。<br />\r\n对于客户谁办理入住或退房手续22时前中午12点后，附加费增加：<br />\r\n通常酒店的客房：20,000越盾/小时<br />\r\nV.I.P房：40,000/小时</p>\r\n', 0, '2014-10-23 09:12:14', 2, 'cn'),
(9, 0, '注意', '注意', '<p>贵客请在出门前把房间的门和阳台门关上，把所有电器关好，然后把钥匙寄在接待处。<br />\r\n贵客请保持公共卫生。<br />\r\n退房时，请把钥匙，电视遥控器。。。交还给接待员<br />\r\n衷心感谢各位贵客的配合<br />\r\n如有需要联系接待员请按：8</p>\r\n', 1, '2014-10-24 07:00:24', 3, 'cn');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL,
  `subject` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vn'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `subject`, `content`, `name`, `email`, `phone`, `created`, `status`, `lang`) VALUES
(1, 'Facebook management for www.hotelbenluc.com?', 'Hello, \r\n \r\nMy name is Devin Sorbert - I''m a media manager at Social Media Gurus. We''re a 3 person full social media management company based out of Greater Grand Rapids, Michigan. We handle account creation and growth for small businesses - and our 3rd partner has spent 3 years setting up Facebook and Google Adwords campaigns for small businesses for local lead generation for a Grand Rapids media management company before coming to work with us. \r\n \r\nI saw www.hotelbenluc.com and want to know if you''re interested in expanding your social media presence? Basically - more fans, likes and general engagement on your Facebook page? \r\n \r\nIt''s really easy - we''d do a free 15 minute consultation over phone or Skype - where we''ll fill out a simple questionnaire to figure out the specific social media needs for your business. I''ll show you some references and current clients pages that have consented to being used as examples (pet shelters and such) - and explain why more fans and activity on your page will help your business. If during the consultation we learn that you sell commercially/are happy with 10 fans on your page/have no business use for social media presence - I won''t sell you garbage. Chemical factories don''t need Facebook pages (unless they''d like a corporate page) - and I won''t argue with that. \r\n \r\nOur prices start at $189 a month for complete management and assistance of your media profile. Our prices reflect the service quality - if you''ve had bad experiences buying fans for $20 on Fiverr that were deleted/had your account suspended - we can rectify that. We run small media campaigns throughout the month creating natural fan growth to your page - no automated accounts or likes, and no chance of any account issues. We also do not need any security information to promote your page - anyone who does probably uses a form of automation to grow your account. \r\n \r\nCheck out these monthly plans to get a full idea of everything we do for your page and then send me a reply for your consultation :) \r\nhttp://socialmediagurus.net/ \r\n \r\nIf I can help you - reply back at emailsocialmediagurus@mail.com and we''ll set up a good time for you to create a plan for www.hotelbenluc.com. \r\n \r\nHope I can assist you, \r\nDevin', 'Devin', 'understoodyacht3c@rediffmail.com', NULL, '2015-02-25 20:18:40', 0, 'vn'),
(2, '12asdf', 'asdf', 'tam', 'pndtam@gmail.com', NULL, '2015-04-14 10:50:19', 1, 'vn');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL,
  `langId` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `cat_id` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `langId`, `name`, `alias`, `image`, `cat_id`, `order`, `created`, `status`, `lang`) VALUES
(8, 8, 'Gallery 1', 'gallery-1', '["1413443184Depositphotos_22287439_original.jpg","1413443184Depositphotos_25046239_original.jpg","1413443185Depositphotos_30603357_original.jpg","1413443185Depositphotos_11667118_original.jpg","1413443186Depositphotos_12160426_EL4.jpg","1413443186Depositphotos_14484493_original.jpg"]', 0, 1, '2014-10-16 14:06:24', 1, 'vn'),
(9, 9, 'Gallery 2', 'gallery-2', '["1413443225Depositphotos_25046239_original.jpg","1413443226Depositphotos_30603357_original.jpg","1413443226Depositphotos_11667118_original.jpg","1413443227Depositphotos_12160426_EL4.jpg","1413443228Depositphotos_14484493_original.jpg","1413443228Depositphotos_22287439_original.jpg"]', 0, 2, '2014-10-16 14:07:05', 1, 'vn'),
(10, 10, 'Gallery 3', 'gallery-3', '["1413443251Depositphotos_14484493_original.jpg","1413443252Depositphotos_22287439_original.jpg","1413443253Depositphotos_25046239_original.jpg","1413443253Depositphotos_30603357_original.jpg","1413443254Depositphotos_11667118_original.jpg","1413443254Depositphotos_12160426_EL4.jpg"]', 0, 3, '2014-10-16 14:07:31', 1, 'vn'),
(11, 11, 'Gallery 4', 'gallery-4', '["1413443280Depositphotos_22287439_original.jpg","1413443280Depositphotos_25046239_original.jpg","1413443281Depositphotos_30603357_original.jpg","1413443281Depositphotos_11667118_original.jpg","1413443282Depositphotos_12160426_EL4.jpg","1413443282Depositphotos_14484493_original.jpg"]', 0, 4, '2014-10-16 14:08:00', 1, 'vn'),
(12, 12, 'Gallery 5', 'gallery-5', '["1413443307Depositphotos_25046239_original.jpg","1413443307Depositphotos_30603357_original.jpg","1413443308Depositphotos_11667118_original.jpg","1413443309Depositphotos_12160426_EL4.jpg","1413443309Depositphotos_14484493_original.jpg","1413443310Depositphotos_22287439_original.jpg"]', 0, 5, '2014-10-16 14:08:27', 1, 'vn'),
(13, 11, 'Gallery 4 (en)', 'gallery-4-(en)', '["1413443184Depositphotos_22287439_original.jpg","1413443184Depositphotos_25046239_original.jpg","1413443185Depositphotos_30603357_original.jpg","1413443185Depositphotos_11667118_original.jpg","1413443186Depositphotos_12160426_EL4.jpg","1413443186Depositphotos_14484493_original.jpg"]', 0, 1, '2014-10-20 17:28:58', 1, 'en');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `alias`, `description`, `content`, `image`, `order`, `status`, `created`) VALUES
(1, 'Hoa mai Bình Định', 'hoa-mai-binh-dinh', '', '<p>Hoa mai b&igrave;nh định</p>\r\n', '1403765873300x215-7.png', NULL, 1, '2014-06-26 13:58:07'),
(2, 'Hoa mai Bình Định 1', 'hoa-mai-binh-dinh-1', '', '<p>Hoa mai b&igrave;nh định 1</p>\r\n', '1403765906300x215-7.png', NULL, 1, '2014-06-26 13:58:26'),
(3, 'Hoa mai Bình Định 1', 'hoa-mai-binh-dinh-1', '', '<p>Hoa mai b&igrave;nh định 1</p>\r\n', '1403765977hoamai.jpg', NULL, 1, '2014-06-26 13:59:37'),
(4, 'Hoa mai Bình Định 2', 'hoa-mai-binh-dinh-2', '', '<p>Hoa mai b&igrave;nh định 2</p>\r\n', '1403765996300x215-7.png', NULL, 1, '2014-06-26 13:59:56'),
(5, 'b', 'b', 'a', '<p>a</p>\r\n', '1403766007hoamai.jpg', 3, 1, '2014-06-26 14:00:07'),
(6, 'test', 'test', 'abc', '<p>abc</p>\r\n', '1403766016300x215-7.png', 1, 1, '2014-06-26 14:00:16'),
(7, 'test', 'test', 'abc', '<p>abc</p>\r\n', '1403766031hoamai.jpg', 1, 1, '2014-06-26 14:00:31'),
(8, 'test 3', 'test-3', 'test 3', '<p>test 3</p>\r\n', '1403766043300x215-7.png', 1, 1, '2014-06-26 14:00:43'),
(9, 'asdf', 'asdf', 'asdf', '<p>adf</p>\r\n', '1403766058hoamai.jpg', NULL, 1, '2014-06-26 14:00:58'),
(10, 'asdf', 'asdf', 'asdf', '<p>adf</p>\r\n', '1403766070300x215-7.png', NULL, 1, '2014-06-26 14:01:10'),
(11, 'asdf', 'asdf', 'asdf', '<p>adf</p>\r\n', '1403766079hoamai.jpg', NULL, 1, '2014-06-26 14:01:19'),
(12, 'asdf', 'asdf', 'asdf', '<p>adf</p>\r\n', '1403766088300x215-7.png', NULL, 1, '2014-06-26 14:01:28'),
(13, 'asdf', 'asdf', 'asdf', '<p>adf</p>\r\n', '1403766099300x215-7.png', NULL, 1, '2014-06-26 14:01:39'),
(15, 'teaasdfasdf', 'teaasdfasdf', 'asdfasdf', '<p>asdf</p>\r\n', '1403766113300x215-7.png', NULL, 1, '2014-06-26 14:01:53'),
(16, 'Tam', 'tam', 'test', '<p><img alt="" src="http://hoamai.tam/admin/uploads/images/969086_606407099378205_1312607361_n.jpg" style="height:340px; width:509px" /></p>\r\n', '1403766124hoamai.jpg', NULL, 1, '2014-06-26 14:02:11'),
(17, 'Tam adf', 'tam-adf', 'test', '<p><img alt="" src="http://hoamai.tam/admin/uploads/images/969086_606407099378205_1312607361_n.jpg" style="height:340px; width:509px" /></p>\r\n', '1403766143300x215-7.png', NULL, 1, '2014-06-26 17:04:03'),
(18, 'test 1', 'test-1', 'asdf', '<p><img alt="" src="http://hoamai.tam/admin/uploads/images/image1.jpeg" style="height:177px; width:284px" /></p>\r\n', '1403766152hoamai.jpg', NULL, 1, '2014-06-26 14:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `checkIn` datetime NOT NULL,
  `checkOut` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vn'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `id` int(11) NOT NULL,
  `langId` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vn'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `langId`, `name`, `alias`, `description`, `content`, `image`, `ordering`, `status`, `created`, `lang`) VALUES
(1, 1, 'Phòng 101', 'phong-101', 'Phòng sạch sẽ, thoáng mát, đầy đủ tiện nghi( Tivi, máy lạnh, Truyền hình cáp, Wifi, nước nóng lạnh,..). ', '<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img alt="" src="http://lagoon.tam/admin/uploads/images/7b294a017601e2c18ad2acb840b149ed4f103c0c8d60f106513c463e9a7bafd1.jpg" style="height:452px; width:640px" /></p>\r\n\r\n<p style="text-align:right"><a href="http://hotelbenluc.com">hotelbenluc.com</a></p>\r\n', '1413513220page3_img1.jpg', 1, 1, '2014-11-04 02:09:57', 'vn'),
(2, 2, 'Phòng 103', 'phong-103', 'Phòng sạch sẽ, thoáng mát, đầy đủ tiện nghi( Tivi, máy lạnh, Truyền hình cáp, Wifi, nước nóng lạnh,..). ', '<p>Ph&ograve;ng sạch sẽ, tho&aacute;ng m&aacute;t, đầy đủ tiện nghi( Tivi, m&aacute;y lạnh, Truyền h&igrave;nh c&aacute;p, Wifi, nước n&oacute;ng lạnh,..).</p>\r\n', '1413513240page3_img2.jpg', 2, 1, '2014-11-04 02:10:33', 'vn'),
(3, 3, 'Phòng 201', 'phong-201', 'Phòng sạch sẽ, thoáng mát, đầy đủ tiện nghi( Tivi, máy lạnh, Truyền hình cáp, Wifi, nước nóng lạnh,..). ', '<p>Ph&ograve;ng Đ&ocirc;i</p>\r\n', '1413513253page4_img1.jpg', 3, 1, '2014-11-04 02:11:13', 'vn'),
(4, 4, 'Phòng 203', 'phong-203', 'Phòng sạch sẽ, thoáng mát, đầy đủ tiện nghi( Tivi, máy lạnh, Truyền hình cáp, Wifi, nước nóng lạnh,..). ', '<p>Ph&ograve;ng đơn.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:right">Hotel Bến Lức</p>\r\n', '1413513652page3_img2.jpg', 4, 1, '2014-11-04 02:12:53', 'vn'),
(6, 0, 'Room 1 en', 'room-1-en', 'room 1', '<p>room 1</p>\r\n', '1413801247page3_img1.jpg', 1, 1, '2014-10-20 17:34:07', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions_admin`
--

CREATE TABLE IF NOT EXISTS `sessions_admin` (
  `id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions_admin`
--

INSERT INTO `sessions_admin` (`id`, `expire`, `data`) VALUES
('cd1649acb8ed4cfa56f80681fc1ec06b', 1429009769, 0x34303934303036333235316238373762323932323839313061383731303362665f5f69647c733a333a2274616d223b34303934303036333235316238373762323932323839313061383731303362665f5f6e616d657c733a333a2274616d223b34303934303036333235316238373762323932323839313061383731303362666e616d657c733a333a2254616d223b34303934303036333235316238373762323932323839313061383731303362665f5f7374617465737c613a313a7b733a343a226e616d65223b623a313b7d);

-- --------------------------------------------------------

--
-- Table structure for table `static`
--

CREATE TABLE IF NOT EXISTS `static` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vn'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `static`
--

INSERT INTO `static` (`id`, `name`, `alias`, `content`, `status`, `created`, `lang`) VALUES
(1, 'Address', 'address', '<h3>Address</h3>\r\n\r\n<p>442 Đường số 13, Bến Lức, Long An</p>\r\n\r\n<p>Phone: 0723-643577&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mobile: <span style="color:rgb(99, 99, 99); font-family:arial,helvetica neue,helvetica,sans-serif; font-size:14px">0903 080 577&nbsp;&nbsp; - &nbsp; 0937 628 838&nbsp;&nbsp; - &nbsp; 0121 446 4611</span></p>\r\n', 1, '2015-04-14 11:20:57', 'vn'),
(2, 'Description', 'description', '<p>dimac law</p>\r\n', 1, '2015-04-14 05:23:44', 'vn'),
(3, 'Keyword', 'keyword', '<p>dimac law</p>\r\n', 1, '2015-04-14 05:23:31', 'vn'),
(7, 'Address', 'address', '<h3>Address</h3>\r\n\r\n<p>Thuan Dao Motels<br />\r\n442, Street 13, Market Thuan Dao, Ben Luc, Long An<br />\r\nPhone: 0723 643 577<br />\r\nMobile: 0903 080 577 - 0937 628 838 - 0121 446 4611</p>\r\n', 1, '2015-04-14 11:21:53', 'en'),
(11, 'Liên hệ', 'lien-he', '<h3>地址</h3>\r\n\r\n<p>顺岛旅馆<br />\r\n442街13号，卓顺岛，奔吕克，龙安<br />\r\n电话：0723643577<br />\r\n手机：0903080577 - 0937628838 - 01214464611</p>\r\n', 1, '2014-10-21 05:38:31', 'cn'),
(12, '顺道旅馆- 您的舒逸居停', '顺道旅馆您的舒逸居停', '<p style="margin-left:.5in"><strong>顺道旅馆地理位置优越</strong><strong>, </strong><strong>坐落于隆安省滨沥镇的中心地段</strong><strong>, </strong><strong>毗邻顺道工业区与热闹的顺道街市</strong>．<strong>因此交通优势</strong>本馆希望会是您公干旅中的舒逸居停. 全新的设施,全情投入的服务团队顺道旅馆为您提供悉心缔造的入住体验：</p>\r\n\r\n<p style="margin-left:.5in"><strong>高速ｗｉｆｉ</strong></p>\r\n\r\n<p style="margin-left:.5in"><strong>快捷入住及退房服务</strong></p>\r\n\r\n<p style="margin-left:.5in"><strong>客房送餐服务</strong></p>\r\n\r\n<p style="margin-left:.5in"><strong>长期居停优惠</strong></p>\r\n', 1, '2014-10-31 06:17:10', 'cn'),
(14, '手机', '手机', '<p>顺岛旅馆<br />\r\n442街13号，卓顺岛，奔吕克，龙安<br />\r\n电话：0723643577<br />\r\n手机：0903080577 - 0937628838 - 01214464611</p>\r\n\r\n<div class="row">\r\n<div class="grid_4">\r\n<div class="block1">&nbsp;</div>\r\n</div>\r\n</div>\r\n', 1, '2014-10-21 05:34:03', 'cn'),
(15, 'Follow us [ Google ]', 'follow-us-[-google-]', '<p>http://google.com.vn</p>\r\n', 1, '2015-04-14 09:52:26', 'vn'),
(16, 'Follow us [ Facebook ]', 'follow-us-[-facebook-]', '<p>http://facebook.com</p>\r\n', 1, '2015-04-14 09:52:42', 'vn'),
(17, 'Follow us [ Twitter ]', 'follow-us-[-twitter-]', '<p>http://twitter.com</p>\r\n', 1, '2015-04-14 09:52:53', 'vn'),
(18, 'Mô tả liên hệ', 'mo-ta-lien-he', '<p><span style="color:rgb(0, 0, 0); font-family:arial,tahoma,verdana; font-size:12px">Nếu bạn c&oacute; y&ecirc;u cầu về bất kỳ th&ocirc;ng tin n&agrave;o c&oacute; li&ecirc;n quan đến c&aacute;c dịch vụ của ch&uacute;ng t&ocirc;i, xin vui l&ograve;ng li&ecirc;n lạc với ch&uacute;ng t&ocirc;i theo số điện thoại hoặc sử dụng mẫu li&ecirc;n lạc được n&ecirc;u b&ecirc;n dưới. Ch&uacute;ng t&ocirc;i sẽ cố gắng li&ecirc;n lạc với bạn trong thời gian sớm nhất, với sự hồi đ&aacute;p cụ thể đến từng y&ecirc;u cầu của bạn. Th&ocirc;ng tin của bạn sẽ lu&ocirc;n được giữ bảo mật v&agrave; sẽ kh&ocirc;ng được cung cấp cho bất kỳ b&ecirc;n thứ ba n&agrave;o kh&aacute;c.</span></p>\r\n', 1, '2015-04-14 11:22:32', 'vn'),
(19, 'Mô tả liên hệ', 'mo-ta-lien-he', '<p><span style="color:rgb(0, 0, 0); font-family:arial,tahoma,verdana; font-size:12px">Nếu bạn c&oacute; y&ecirc;u cầu về bất kỳ th&ocirc;ng tin n&agrave;o c&oacute; li&ecirc;n quan đến c&aacute;c dịch vụ của ch&uacute;ng t&ocirc;i, xin vui l&ograve;ng li&ecirc;n lạc với ch&uacute;ng t&ocirc;i theo số điện thoại hoặc sử dụng mẫu li&ecirc;n lạc được n&ecirc;u b&ecirc;n dưới. Ch&uacute;ng t&ocirc;i sẽ cố gắng li&ecirc;n lạc với bạn trong thời gian sớm nhất, với sự hồi đ&aacute;p cụ thể đến từng y&ecirc;u cầu của bạn. Th&ocirc;ng tin của bạn sẽ lu&ocirc;n được giữ bảo mật v&agrave; sẽ kh&ocirc;ng được cung cấp cho bất kỳ b&ecirc;n thứ ba n&agrave;o kh&aacute;c.</span></p>\r\n', 1, '2015-04-14 11:22:11', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `tuvan`
--

CREATE TABLE IF NOT EXISTS `tuvan` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `cat_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `lang` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vn'
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tuvan`
--

INSERT INTO `tuvan` (`id`, `parent_id`, `cat_id`, `name`, `alias`, `description`, `content`, `image`, `order`, `status`, `created`, `lang`) VALUES
(21, 0, 1, 'Giới thiệu DIMAC', 'gioi-thieu-dimac', NULL, '<p><strong>DIMAC</strong> l&agrave; một hãng luật độc lập v&agrave; chuy&ecirc;n nghiệp, chuy&ecirc;n tư vấn v&agrave; hỗ trợ kh&aacute;ch h&agrave;ng giải quyết c&aacute;c vấn đề ph&aacute;p l&yacute; v&ecirc;̀ đầu tư, mua b&aacute;n v&agrave; s&aacute;t nhập, c&ocirc;ng ty, thương lượng hiệu quả c&aacute;c thương vụ v&agrave; giải quyết tranh chấp thương mại, x&acirc;y dựng v&agrave; đầu tư nước ngo&agrave;i tại Việt Nam.</p>\r\n\r\n<p><strong>DIMAC</strong> lu&ocirc;n giữ sự cam kết với kh&aacute;ch h&agrave;ng dựa tr&ecirc;n sự tận t&acirc;m, chuy&ecirc;n nghiệp. Ch&uacute;ng t&ocirc;i đảm bảo chất lượng c&aacute;c dịch vụ ph&aacute;p l&yacute; tốt nhất khi cung cấp cho c&aacute;c c&ocirc;ng ty trong nước, c&aacute;c kh&aacute;ch h&agrave;ng c&oacute; vốn đầu tư nước ngo&agrave;i v&agrave; quốc tế, gi&uacute;p khách hàng tập trung v&agrave;o c&ocirc;ng việc kinh doanh m&agrave; kh&ocirc;ng tốn thời gian cho c&aacute;c vấn đề ph&aacute;p l&yacute; hay thủ tục h&agrave;nh ch&iacute;nh rắc rối.</p>\r\n\r\n<p>H&atilde;ng luật <strong>DIMAC</strong> hiện c&oacute; văn ph&ograve;ng ch&iacute;nh đặt tại Th&agrave;nh phố Hồ Ch&iacute; Minh v&agrave; sắp tới sẽ mở c&aacute;c Chi nh&aacute;nh tại H&agrave; Nội, Đ&agrave; Nẵng v&agrave; B&igrave;nh Dương để cung cấp, hỗ trợ v&agrave; giải quyết c&aacute;c vấn đề ph&aacute;p l&yacute; của kh&aacute;ch h&agrave;ng ph&aacute;t sinh tại&nbsp; c&aacute;c th&agrave;nh phố lớn của Việt Nam.</p>\r\n\r\n<p>L&agrave; ưu điểm cạnh tranh, c&aacute;c luật sư chuy&ecirc;n nghiệp của DIMIAC đ&atilde; từng l&agrave;m việc hoặc cung cấp dịch vụ cho c&aacute;c tổ chức lớn, c&ocirc;ng ty đa quốc gia v&agrave; ng&acirc;n h&agrave;ng, c&oacute; thể giải quyết nhanh v&agrave; hiệu quả c&aacute;c c&ocirc;ng việc kh&aacute;ch h&agrave;ng y&ecirc;u cầu. Do đ&oacute;, <strong>DIMAC</strong> ch&iacute;nh l&agrave; sự chọn lựa hợp l&yacute; v&agrave; tốt nhất cho c&aacute;c doanh nghiệp trong nước hay nước ngo&agrave;i v&agrave;o Việt Nam để đầu tư.</p>\r\n\r\n<p><em>Để tải t&agrave;i liệu giới thiệu c&ocirc;ng ty, vui l&ograve;ng bấm v&agrave;o n&uacute;t dưới đ&acirc;y: DOWNLOAD</em></p>\r\n', NULL, 1, 1, '2015-04-14 05:16:06', 'vn'),
(22, 0, 4, 'Giải quyết tranh chấp', 'giai-quyet-tranh-chap', NULL, '<p>giải quyết tranh chấp</p>\r\n', NULL, 1, 1, '2015-04-13 11:42:25', 'vn'),
(23, 22, 4, 'Tranh chấp dân sự', 'tranh-chap-dan-su', NULL, '<p>tranh chấp d&acirc;n sự</p>\r\n', NULL, 1, 1, '2015-04-13 11:46:24', 'vn'),
(24, 0, 1, 'Sứ mệnh và tầm nhìn', 'su-menh-va-tam-nhin', NULL, '<p>Sứ mệnh v&agrave; tầm nh&igrave;n</p>\r\n', NULL, 2, 1, '2015-04-13 11:47:20', 'vn'),
(25, 0, 1, 'Văn hoá', 'van-hoa', NULL, '<p>Văn ho&aacute;</p>\r\n', NULL, 3, 1, '2015-04-13 11:47:38', 'vn'),
(26, 0, 1, 'Đạo đức và ứng xử', 'dao-duc-va-ung-xu', NULL, '<p>Đạo đức v&agrave; ứng xử</p>\r\n', NULL, 4, 1, '2015-04-13 11:48:03', 'vn'),
(27, 0, 1, 'Đối tác kinh doanh', 'doi-tac-kinh-doanh', NULL, '<p>Đối t&aacute;c kinh doanh</p>\r\n', NULL, 5, 1, '2015-04-13 11:48:29', 'vn'),
(28, 0, 1, 'Giải thưởng', 'giai-thuong', NULL, '<p>Giải thưởng</p>\r\n', NULL, 6, 1, '2015-04-13 11:50:17', 'vn'),
(29, 0, 2, 'Hồ Chí Minh', 'ho-chi-minh', NULL, '<p>Hồ Ch&iacute; Minh</p>\r\n', NULL, 1, 1, '2015-04-13 11:50:36', 'vn'),
(30, 0, 2, 'Hà Nội', 'ha-noi', NULL, '<p>H&agrave; Nội</p>\r\n', NULL, 2, 1, '2015-04-13 11:50:50', 'vn'),
(31, 0, 2, 'Đà Nẵng', 'da-nang', NULL, '<p>Đ&agrave; Nẵng</p>\r\n', NULL, 3, 1, '2015-04-13 11:51:04', 'vn'),
(32, 0, 2, 'Bình Dương', 'binh-duong', NULL, '<p>B&igrave;nh Dương</p>\r\n', NULL, 3, 1, '2015-04-13 11:51:25', 'vn'),
(33, 0, 3, 'Các giá trị về nguyên tắc', 'cac-gia-tri-ve-nguyen-tac', NULL, '<p>C&aacute;c gi&aacute; trị về nguy&ecirc;n tắc</p>\r\n', NULL, 1, 1, '2015-04-13 11:51:58', 'vn'),
(34, 0, 3, 'Các giá trị trong quan hệ khách hàng', 'cac-gia-tri-trong-quan-he-khach-hang', NULL, '<p>C&aacute;c gi&aacute; trị trong quan hệ kh&aacute;ch h&agrave;ng</p>\r\n', NULL, 2, 1, '2015-04-13 11:52:21', 'vn'),
(35, 0, 3, 'Các giá trị trong công việc', 'cac-gia-tri-trong-cong-viec', NULL, '<p>C&aacute;c gi&aacute; trị trong c&ocirc;ng việc</p>\r\n', NULL, 3, 1, '2015-04-13 11:52:45', 'vn'),
(36, 0, 3, 'Các giá trị trong quan hệ đồng nghiệp', 'cac-gia-tri-trong-quan-he-dong-nghiep', NULL, '<p>C&aacute;c gi&aacute; trị trong quan hệ đồng nghiệp</p>\r\n', NULL, 4, 1, '2015-04-13 11:53:12', 'vn'),
(37, 0, 4, 'Đầu tư', 'dau-tu', NULL, '<p>Đầu tư</p>\r\n', NULL, 1, 1, '2015-04-13 11:53:35', 'vn'),
(38, 0, 4, 'Mua bán và sát nhập', 'mua-ban-va-sat-nhap', NULL, '<p>Mua b&aacute;n v&agrave; s&aacute;t nhập</p>\r\n', NULL, 2, 1, '2015-04-13 11:53:54', 'vn'),
(39, 0, 4, 'Doanh nghiệp', 'doanh-nghiep', NULL, '<p>Doanh nghiệp</p>\r\n', NULL, 3, 1, '2015-04-13 11:54:12', 'vn'),
(40, 0, 4, 'Vụ việc dân sự', 'vu-viec-dan-su', NULL, '<p>Vụ việc d&acirc;n sự</p>\r\n', NULL, 4, 1, '2015-04-13 11:54:30', 'vn'),
(41, 0, 4, 'Thương lượng', 'thuong-luong', NULL, '<p>Thương lượng</p>\r\n', NULL, 5, 1, '2015-04-13 11:54:48', 'vn'),
(42, 22, 4, 'Tranh chấp thương mại', 'tranh-chap-thuong-mai', NULL, '<p>Tranh chấp thương mại</p>\r\n', NULL, 6, 1, '2015-04-13 11:55:14', 'vn'),
(43, 22, 4, 'Tranh chấp lao động', 'tranh-chap-lao-dong', NULL, '<p>Tranh chấp lao động</p>\r\n', NULL, 7, 1, '2015-04-13 11:55:39', 'vn'),
(44, 22, 4, 'Tranh chấp xây dựng', 'tranh-chap-xay-dung', NULL, '<p>Tranh chấp x&acirc;y dựng</p>\r\n', NULL, 8, 1, '2015-04-13 11:55:57', 'vn'),
(45, 0, 4, 'Thu hồi nợ', 'thu-hoi-no', NULL, '<p>Thu hồi nợ</p>\r\n', NULL, 9, 1, '2015-04-13 11:56:19', 'vn'),
(46, 0, 5, 'Các khách hàng lớn ', 'cac-khach-hang-lon-', NULL, '<p>C&aacute;c kh&aacute;ch h&agrave;ng lớn</p>\r\n', NULL, 1, 1, '2015-04-13 11:59:21', 'vn'),
(47, 0, 5, 'Giao dịch điển hình ', 'giao-dich-dien-hinh-', NULL, '<p>Giao dịch điển h&igrave;nh</p>\r\n', NULL, 2, 1, '2015-04-13 12:00:09', 'vn'),
(48, 0, 5, 'Khách hàng theo lĩnh vực ', 'khach-hang-theo-linh-vuc-', NULL, '<p>Kh&aacute;ch h&agrave;ng theo lĩnh vực</p>\r\n', NULL, 3, 1, '2015-04-13 11:59:58', 'vn'),
(49, 0, 7, 'Cơ hội thực tập', 'co-hoi-thuc-tap', NULL, '<p>Cơ hội thực tập</p>\r\n', NULL, 1, 1, '2015-04-13 12:00:35', 'vn'),
(50, 0, 7, 'Tuyển dụng', 'tuyen-dung', NULL, '<p>Tuyển dụng</p>\r\n', NULL, 2, 1, '2015-04-13 12:00:52', 'vn'),
(52, 0, 6, 'Tin tức', 'tin-tuc', NULL, '<p>Tin tức</p>\r\n', NULL, 1, 1, '2015-04-13 13:02:27', 'vn'),
(53, 0, 6, 'Cập nhật pháp lý', 'cap-nhat-phap-ly', NULL, '<p>Cập nhật ph&aacute;p l&yacute;</p>\r\n', NULL, 2, 1, '2015-04-13 13:02:54', 'vn');

-- --------------------------------------------------------

--
-- Table structure for table `yii_app_cache`
--

CREATE TABLE IF NOT EXISTS `yii_app_cache` (
  `id` char(128) COLLATE utf8_unicode_ci NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `value` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `yii_app_cache`
--

INSERT INTO `yii_app_cache` (`id`, `expire`, `value`) VALUES
('c129ca845132921fb63fe29af6e8c22e', 0, 0x613a323a7b693a303b733a38383a22613a313a7b733a33343a225969692e4353656375726974794d616e616765722e76616c69646174696f6e6b6579223b733a33323a223339666236323332343562323830636431626233326635663331363564303664223b7d223b693a313b4f3a32303a224346696c654361636865446570656e64656e6379223a363a7b733a383a2266696c654e616d65223b733a35363a222f4170706c69636174696f6e732f4d414d502f6874646f63732f686f616d61692f72756e74696d655f61646d696e2f73746174652e62696e223b733a31383a227265757365446570656e64656e7444617461223b623a303b733a32333a2200434361636865446570656e64656e6379005f68617368223b4e3b733a32333a2200434361636865446570656e64656e6379005f64617461223b693a313430323937343030333b733a31343a220043436f6d706f6e656e74005f65223b4e3b733a31343a220043436f6d706f6e656e74005f6d223b4e3b7d7d),
('d0639903250639640a47e0cb7b97ac5b', 0, 0x613a323a7b693a303b613a323a7b693a303b613a31313a7b693a303b4f3a383a224355726c52756c65223a31363a7b733a393a2275726c537566666978223b4e3b733a31333a226361736553656e736974697665223b4e3b733a31333a2264656661756c74506172616d73223b613a303a7b7d733a31303a226d6174636856616c7565223b4e3b733a343a2276657262223b4e3b733a31313a2270617273696e674f6e6c79223b623a303b733a353a22726f757465223b733a31303a22736974652f6c6f67696e223b733a31303a227265666572656e636573223b613a303a7b7d733a31323a22726f7574655061747465726e223b4e3b733a373a227061747465726e223b733a31323a222f5e6c6f67696e5c2f242f75223b733a383a2274656d706c617465223b733a353a226c6f67696e223b733a363a22706172616d73223b613a303a7b7d733a363a22617070656e64223b623a303b733a31313a22686173486f7374496e666f223b623a303b733a31343a220043436f6d706f6e656e74005f65223b4e3b733a31343a220043436f6d706f6e656e74005f6d223b4e3b7d693a313b4f3a383a224355726c52756c65223a31363a7b733a393a2275726c537566666978223b4e3b733a31333a226361736553656e736974697665223b4e3b733a31333a2264656661756c74506172616d73223b613a303a7b7d733a31303a226d6174636856616c7565223b4e3b733a343a2276657262223b4e3b733a31313a2270617273696e674f6e6c79223b623a303b733a353a22726f757465223b733a31323a227374617469632f696e646578223b733a31303a227265666572656e636573223b613a303a7b7d733a31323a22726f7574655061747465726e223b4e3b733a373a227061747465726e223b733a32333a222f5e735c2f283f503c766965773e5c772b295c2f242f75223b733a383a2274656d706c617465223b733a383a22732f3c766965773e223b733a363a22706172616d73223b613a313a7b733a343a2276696577223b733a333a225c772b223b7d733a363a22617070656e64223b623a303b733a31313a22686173486f7374496e666f223b623a303b733a31343a220043436f6d706f6e656e74005f65223b4e3b733a31343a220043436f6d706f6e656e74005f6d223b4e3b7d693a323b4f3a383a224355726c52756c65223a31363a7b733a393a2275726c537566666978223b4e3b733a31333a226361736553656e736974697665223b4e3b733a31333a2264656661756c74506172616d73223b613a303a7b7d733a31303a226d6174636856616c7565223b4e3b733a343a2276657262223b4e3b733a31313a2270617273696e674f6e6c79223b623a303b733a353a22726f757465223b733a32353a226170695f3c636f6e74726f6c6c65723e2f3c616374696f6e3e223b733a31303a227265666572656e636573223b613a323a7b733a31303a22636f6e74726f6c6c6572223b733a31323a223c636f6e74726f6c6c65723e223b733a363a22616374696f6e223b733a383a223c616374696f6e3e223b7d733a31323a22726f7574655061747465726e223b733a34353a222f5e6170695f283f503c636f6e74726f6c6c65723e5c772b295c2f283f503c616374696f6e3e5c772b29242f75223b733a373a227061747465726e223b733a3132333a222f5e6170695c2f283f503c636f6e74726f6c6c65723e5c772b295c2f283f503c616374696f6e3e5c772b295c2f283f503c70726d313e5c772b295c2f283f503c70726d323e5c772b295c2f283f503c70726d333e5c772b295c2f283f503c70726d343e5c772b295c2f283f503c70726d353e5c772b295c2f242f75223b733a383a2274656d706c617465223b733a36303a226170692f3c636f6e74726f6c6c65723e2f3c616374696f6e3e2f3c70726d313e2f3c70726d323e2f3c70726d333e2f3c70726d343e2f3c70726d353e223b733a363a22706172616d73223b613a353a7b733a343a2270726d31223b733a333a225c772b223b733a343a2270726d32223b733a333a225c772b223b733a343a2270726d33223b733a333a225c772b223b733a343a2270726d34223b733a333a225c772b223b733a343a2270726d35223b733a333a225c772b223b7d733a363a22617070656e64223b623a303b733a31313a22686173486f7374496e666f223b623a303b733a31343a220043436f6d706f6e656e74005f65223b4e3b733a31343a220043436f6d706f6e656e74005f6d223b4e3b7d693a333b4f3a383a224355726c52756c65223a31363a7b733a393a2275726c537566666978223b4e3b733a31333a226361736553656e736974697665223b4e3b733a31333a2264656661756c74506172616d73223b613a303a7b7d733a31303a226d6174636856616c7565223b4e3b733a343a2276657262223b4e3b733a31313a2270617273696e674f6e6c79223b623a303b733a353a22726f757465223b733a32353a226170695f3c636f6e74726f6c6c65723e2f3c616374696f6e3e223b733a31303a227265666572656e636573223b613a323a7b733a31303a22636f6e74726f6c6c6572223b733a31323a223c636f6e74726f6c6c65723e223b733a363a22616374696f6e223b733a383a223c616374696f6e3e223b7d733a31323a22726f7574655061747465726e223b733a34353a222f5e6170695f283f503c636f6e74726f6c6c65723e5c772b295c2f283f503c616374696f6e3e5c772b29242f75223b733a373a227061747465726e223b733a34383a222f5e6170695c2f283f503c636f6e74726f6c6c65723e5c772b295c2f283f503c616374696f6e3e5c772b295c2f242f75223b733a383a2274656d706c617465223b733a32353a226170692f3c636f6e74726f6c6c65723e2f3c616374696f6e3e223b733a363a22706172616d73223b613a303a7b7d733a363a22617070656e64223b623a303b733a31313a22686173486f7374496e666f223b623a303b733a31343a220043436f6d706f6e656e74005f65223b4e3b733a31343a220043436f6d706f6e656e74005f6d223b4e3b7d693a343b4f3a383a224355726c52756c65223a31363a7b733a393a2275726c537566666978223b4e3b733a31333a226361736553656e736974697665223b4e3b733a31333a2264656661756c74506172616d73223b613a303a7b7d733a31303a226d6174636856616c7565223b4e3b733a343a2276657262223b4e3b733a31313a2270617273696e674f6e6c79223b623a303b733a353a22726f757465223b733a32393a22676174657761795f3c636f6e74726f6c6c65723e2f3c616374696f6e3e223b733a31303a227265666572656e636573223b613a323a7b733a31303a22636f6e74726f6c6c6572223b733a31323a223c636f6e74726f6c6c65723e223b733a363a22616374696f6e223b733a383a223c616374696f6e3e223b7d733a31323a22726f7574655061747465726e223b733a34393a222f5e676174657761795f283f503c636f6e74726f6c6c65723e5c772b295c2f283f503c616374696f6e3e5c772b29242f75223b733a373a227061747465726e223b733a35323a222f5e676174657761795c2f283f503c636f6e74726f6c6c65723e5c772b295c2f283f503c616374696f6e3e5c772b295c2f242f75223b733a383a2274656d706c617465223b733a32393a22676174657761792f3c636f6e74726f6c6c65723e2f3c616374696f6e3e223b733a363a22706172616d73223b613a303a7b7d733a363a22617070656e64223b623a303b733a31313a22686173486f7374496e666f223b623a303b733a31343a220043436f6d706f6e656e74005f65223b4e3b733a31343a220043436f6d706f6e656e74005f6d223b4e3b7d693a353b4f3a383a224355726c52756c65223a31363a7b733a393a2275726c537566666978223b4e3b733a31333a226361736553656e736974697665223b4e3b733a31333a2264656661756c74506172616d73223b613a303a7b7d733a31303a226d6174636856616c7565223b4e3b733a343a2276657262223b4e3b733a31313a2270617273696e674f6e6c79223b623a303b733a353a22726f757465223b733a31333a227370656369616c2f696e646578223b733a31303a227265666572656e636573223b613a303a7b7d733a31323a22726f7574655061747465726e223b4e3b733a373a227061747465726e223b733a32393a222f5e7370656369616c5c2f283f503c766965773e5c772b295c2f242f75223b733a383a2274656d706c617465223b733a31343a227370656369616c2f3c766965773e223b733a363a22706172616d73223b613a313a7b733a343a2276696577223b733a333a225c772b223b7d733a363a22617070656e64223b623a303b733a31313a22686173486f7374496e666f223b623a303b733a31343a220043436f6d706f6e656e74005f65223b4e3b733a31343a220043436f6d706f6e656e74005f6d223b4e3b7d693a363b4f3a383a224355726c52756c65223a31363a7b733a393a2275726c537566666978223b4e3b733a31333a226361736553656e736974697665223b4e3b733a31333a2264656661756c74506172616d73223b613a303a7b7d733a31303a226d6174636856616c7565223b4e3b733a343a2276657262223b4e3b733a31313a2270617273696e674f6e6c79223b623a303b733a353a22726f757465223b733a32313a223c636f6e74726f6c6c65723e2f3c616374696f6e3e223b733a31303a227265666572656e636573223b613a323a7b733a31303a22636f6e74726f6c6c6572223b733a31323a223c636f6e74726f6c6c65723e223b733a363a22616374696f6e223b733a383a223c616374696f6e3e223b7d733a31323a22726f7574655061747465726e223b733a34313a222f5e283f503c636f6e74726f6c6c65723e5c772b295c2f283f503c616374696f6e3e5c772b29242f75223b733a373a227061747465726e223b733a3130333a222f5e283f503c636f6e74726f6c6c65723e5c772b295c2f283f503c616374696f6e3e5c772b295c2f283f503c70726d313e5c772b295c2f283f503c70726d323e5c772b295c2f283f503c70726d333e5c772b295c2f283f503c70726d343e5c772b295c2f242f75223b733a383a2274656d706c617465223b733a34393a223c636f6e74726f6c6c65723e2f3c616374696f6e3e2f3c70726d313e2f3c70726d323e2f3c70726d333e2f3c70726d343e223b733a363a22706172616d73223b613a343a7b733a343a2270726d31223b733a333a225c772b223b733a343a2270726d32223b733a333a225c772b223b733a343a2270726d33223b733a333a225c772b223b733a343a2270726d34223b733a333a225c772b223b7d733a363a22617070656e64223b623a303b733a31313a22686173486f7374496e666f223b623a303b733a31343a220043436f6d706f6e656e74005f65223b4e3b733a31343a220043436f6d706f6e656e74005f6d223b4e3b7d693a373b4f3a383a224355726c52756c65223a31363a7b733a393a2275726c537566666978223b4e3b733a31333a226361736553656e736974697665223b4e3b733a31333a2264656661756c74506172616d73223b613a303a7b7d733a31303a226d6174636856616c7565223b4e3b733a343a2276657262223b4e3b733a31313a2270617273696e674f6e6c79223b623a303b733a353a22726f757465223b733a32313a223c636f6e74726f6c6c65723e2f3c616374696f6e3e223b733a31303a227265666572656e636573223b613a323a7b733a31303a22636f6e74726f6c6c6572223b733a31323a223c636f6e74726f6c6c65723e223b733a363a22616374696f6e223b733a383a223c616374696f6e3e223b7d733a31323a22726f7574655061747465726e223b733a34313a222f5e283f503c636f6e74726f6c6c65723e5c772b295c2f283f503c616374696f6e3e5c772b29242f75223b733a373a227061747465726e223b733a38383a222f5e283f503c636f6e74726f6c6c65723e5c772b295c2f283f503c616374696f6e3e5c772b295c2f283f503c70726d313e5c772b295c2f283f503c70726d323e5c772b295c2f283f503c70726d333e5c772b295c2f242f75223b733a383a2274656d706c617465223b733a34323a223c636f6e74726f6c6c65723e2f3c616374696f6e3e2f3c70726d313e2f3c70726d323e2f3c70726d333e223b733a363a22706172616d73223b613a333a7b733a343a2270726d31223b733a333a225c772b223b733a343a2270726d32223b733a333a225c772b223b733a343a2270726d33223b733a333a225c772b223b7d733a363a22617070656e64223b623a303b733a31313a22686173486f7374496e666f223b623a303b733a31343a220043436f6d706f6e656e74005f65223b4e3b733a31343a220043436f6d706f6e656e74005f6d223b4e3b7d693a383b4f3a383a224355726c52756c65223a31363a7b733a393a2275726c537566666978223b4e3b733a31333a226361736553656e736974697665223b4e3b733a31333a2264656661756c74506172616d73223b613a303a7b7d733a31303a226d6174636856616c7565223b4e3b733a343a2276657262223b4e3b733a31313a2270617273696e674f6e6c79223b623a303b733a353a22726f757465223b733a32313a223c636f6e74726f6c6c65723e2f3c616374696f6e3e223b733a31303a227265666572656e636573223b613a323a7b733a31303a22636f6e74726f6c6c6572223b733a31323a223c636f6e74726f6c6c65723e223b733a363a22616374696f6e223b733a383a223c616374696f6e3e223b7d733a31323a22726f7574655061747465726e223b733a34313a222f5e283f503c636f6e74726f6c6c65723e5c772b295c2f283f503c616374696f6e3e5c772b29242f75223b733a373a227061747465726e223b733a37333a222f5e283f503c636f6e74726f6c6c65723e5c772b295c2f283f503c616374696f6e3e5c772b295c2f283f503c70726d313e5c772b295c2f283f503c70726d323e5c772b295c2f242f75223b733a383a2274656d706c617465223b733a33353a223c636f6e74726f6c6c65723e2f3c616374696f6e3e2f3c70726d313e2f3c70726d323e223b733a363a22706172616d73223b613a323a7b733a343a2270726d31223b733a333a225c772b223b733a343a2270726d32223b733a333a225c772b223b7d733a363a22617070656e64223b623a303b733a31313a22686173486f7374496e666f223b623a303b733a31343a220043436f6d706f6e656e74005f65223b4e3b733a31343a220043436f6d706f6e656e74005f6d223b4e3b7d693a393b4f3a383a224355726c52756c65223a31363a7b733a393a2275726c537566666978223b4e3b733a31333a226361736553656e736974697665223b4e3b733a31333a2264656661756c74506172616d73223b613a303a7b7d733a31303a226d6174636856616c7565223b4e3b733a343a2276657262223b4e3b733a31313a2270617273696e674f6e6c79223b623a303b733a353a22726f757465223b733a32313a223c636f6e74726f6c6c65723e2f3c616374696f6e3e223b733a31303a227265666572656e636573223b613a323a7b733a31303a22636f6e74726f6c6c6572223b733a31323a223c636f6e74726f6c6c65723e223b733a363a22616374696f6e223b733a383a223c616374696f6e3e223b7d733a31323a22726f7574655061747465726e223b733a34313a222f5e283f503c636f6e74726f6c6c65723e5c772b295c2f283f503c616374696f6e3e5c772b29242f75223b733a373a227061747465726e223b733a35363a222f5e283f503c636f6e74726f6c6c65723e5c772b295c2f283f503c616374696f6e3e5c772b295c2f283f503c69643e5c772b295c2f242f75223b733a383a2274656d706c617465223b733a32363a223c636f6e74726f6c6c65723e2f3c616374696f6e3e2f3c69643e223b733a363a22706172616d73223b613a313a7b733a323a226964223b733a333a225c772b223b7d733a363a22617070656e64223b623a303b733a31313a22686173486f7374496e666f223b623a303b733a31343a220043436f6d706f6e656e74005f65223b4e3b733a31343a220043436f6d706f6e656e74005f6d223b4e3b7d693a31303b4f3a383a224355726c52756c65223a31363a7b733a393a2275726c537566666978223b4e3b733a31333a226361736553656e736974697665223b4e3b733a31333a2264656661756c74506172616d73223b613a303a7b7d733a31303a226d6174636856616c7565223b4e3b733a343a2276657262223b4e3b733a31313a2270617273696e674f6e6c79223b623a303b733a353a22726f757465223b733a32313a223c636f6e74726f6c6c65723e2f3c616374696f6e3e223b733a31303a227265666572656e636573223b613a323a7b733a31303a22636f6e74726f6c6c6572223b733a31323a223c636f6e74726f6c6c65723e223b733a363a22616374696f6e223b733a383a223c616374696f6e3e223b7d733a31323a22726f7574655061747465726e223b733a34313a222f5e283f503c636f6e74726f6c6c65723e5c772b295c2f283f503c616374696f6e3e5c772b29242f75223b733a373a227061747465726e223b733a34333a222f5e283f503c636f6e74726f6c6c65723e5c772b295c2f283f503c616374696f6e3e5c772b295c2f242f75223b733a383a2274656d706c617465223b733a32313a223c636f6e74726f6c6c65723e2f3c616374696f6e3e223b733a363a22706172616d73223b613a303a7b7d733a363a22617070656e64223b623a303b733a31313a22686173486f7374496e666f223b623a303b733a31343a220043436f6d706f6e656e74005f65223b4e3b733a31343a220043436f6d706f6e656e74005f6d223b4e3b7d7d693a313b733a33323a223538663630636433633666333031316435653138303835653266313764633161223b7d693a313b4e3b7d);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `advertise`
--
ALTER TABLE `advertise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `condition`
--
ALTER TABLE `condition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions_admin`
--
ALTER TABLE `sessions_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `static`
--
ALTER TABLE `static`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuvan`
--
ALTER TABLE `tuvan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yii_app_cache`
--
ALTER TABLE `yii_app_cache`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertise`
--
ALTER TABLE `advertise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `condition`
--
ALTER TABLE `condition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `static`
--
ALTER TABLE `static`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tuvan`
--
ALTER TABLE `tuvan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
