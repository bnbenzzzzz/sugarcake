-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2021 at 05:22 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sugarcake`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `pd_id` int(10) NOT NULL,
  `user_username` varchar(500) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `pd_id`, `user_username`, `qty`) VALUES
(6, 39, 'marklin', 6),
(7, 46, 'marklin', 4),
(10, 59, 'oh_aew', 1),
(14, 48, 'marklin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(2) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'เค้ก'),
(2, 'โรล'),
(9, 'เครื่องดื่ม');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `detail_id` int(11) NOT NULL,
  `pd_id` int(5) NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(10) NOT NULL,
  `order_type` int(5) NOT NULL,
  `purchase_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`detail_id`, `pd_id`, `qty`, `price`, `order_type`, `purchase_id`) VALUES
(1, 1, 2, 500, 0, 1),
(2, 37, 1, 80, 0, 2),
(3, 38, 1, 80, 0, 2),
(4, 46, 1, 55, 0, 2),
(5, 37, 1, 80, 0, 3),
(6, 38, 1, 80, 0, 3),
(7, 40, 1, 65, 0, 3),
(8, 46, 1, 55, 0, 4),
(9, 47, 1, 35, 0, 4),
(10, 48, 2, 75, 0, 4),
(11, 38, 1, 80, 0, 5),
(12, 39, 1, 65, 0, 5),
(13, 39, 1, 65, 0, 6),
(14, 47, 1, 35, 0, 6),
(15, 38, 1, 80, 0, 7),
(16, 46, 3, 55, 0, 7),
(17, 40, 1, 65, 0, 8),
(18, 48, 1, 75, 0, 8),
(19, 51, 1, 85, 0, 8),
(20, 57, 1, 30, 0, 8),
(21, 40, 1, 65, 0, 9),
(22, 48, 1, 75, 0, 9),
(23, 51, 1, 85, 0, 9),
(24, 57, 1, 30, 0, 9);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pd_id` int(5) NOT NULL,
  `pd_name` varchar(50) NOT NULL,
  `pd_price` int(5) NOT NULL,
  `pd_img` varchar(500) NOT NULL,
  `pd_des` varchar(500) NOT NULL,
  `qty_wholesale` int(50) NOT NULL,
  `price_wholesale` int(50) NOT NULL,
  `cat_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pd_id`, `pd_name`, `pd_price`, `pd_img`, `pd_des`, `qty_wholesale`, `price_wholesale`, `cat_id`) VALUES
(37, 'เครปเค้กชาเขียว', 80, 'img/img6085b01f895e8.jpg', '5', 0, 0, 1),
(38, 'แพนเค้ก', 80, 'img/img6085b08a6a559.png', '3', 0, 0, 1),
(39, 'ชีสเค้ก', 65, 'img/img6085b11dc58fd.png', '5', 0, 0, 1),
(40, 'บลูเบอร์รี่ชีสพาย', 65, 'img/img6085b2f02edbb.jpg', '4', 0, 0, 1),
(46, 'บลูเบอร์รี่ชีสเค้ก', 55, 'img/img6085b81d6740d.jpg', '5', 0, 0, 1),
(47, 'โรลสตอเบอร์รี่', 35, 'img/img6085b84ed7a78.jpg', '5', 0, 0, 2),
(48, 'เครปเค้กเรนโบว์', 75, 'img/img6085b87c1078f.jpg', '5', 0, 0, 1),
(49, 'เค้กวุ้นอัญชัน', 20, 'img/img6085b9a1e8639.jpg', '3', 0, 0, 1),
(50, 'โรลส้ม', 40, 'img/img6085bb2841ab4.jpg', '3', 0, 0, 2),
(51, 'เค้กข้าวเหนียวมะม่วง', 85, 'img/img6085bb66ef635.jpg', '1', 0, 0, 1),
(52, 'บราวนี่', 50, 'img/img6085bd8a97597.jpg', '7', 0, 0, 1),
(53, 'คัพเค้กเบอร์รี่', 50, 'img/img6085bfd4a6c4e.jpg', '3', 0, 0, 1),
(54, 'เค้กเสาวรส', 60, 'img/img6085bfedacb88.jpg', '2', 0, 0, 1),
(55, 'คัพเค้กบลูเบอร์รี่', 50, 'img/img6085c00f0ab66.jpg', '3', 0, 0, 1),
(56, 'น้ำเปล่ากลิ่นมะนาว', 15, 'img/img6085c06a24a3c.png', '-', 0, 0, 9),
(57, 'น้ำแตงโม', 30, 'img/img6085c2d62358b.jpg', '1', 0, 0, 9),
(58, 'น้ำส้ม', 30, 'img/img6085c2eeecd4b.jpg', '1', 0, 0, 9),
(59, 'นมสด', 30, 'img/img6085c31a6d15b.jpg', '3', 0, 0, 9),
(60, 'น้ำชาเขียว', 30, 'img/img6085c33e13e42.jpg', '1', 0, 0, 9),
(61, 'น้ำสตอเบอร์รี่', 30, 'img/img6085c358397af.jpg', '1', 0, 0, 9),
(62, 'น้ำบีทรูท', 30, 'img/img6085c38f477e4.jpg', '1', 0, 0, 9),
(63, 'น้ำอัญชันมะนาว', 30, 'img/img6085c3afe9a56.jpg', '1', 0, 0, 9),
(64, 'ตะโก้', 35, 'img/img60862fc073ace.jpg', '2', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorder`
--

CREATE TABLE `purchaseorder` (
  `purchase_id` int(50) NOT NULL,
  `purchase_price` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_username` varchar(50) NOT NULL,
  `purchase_type` varchar(50) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `payment_status` int(2) NOT NULL,
  `payment_state` varchar(500) NOT NULL,
  `deliver_type` varchar(50) NOT NULL,
  `deliver_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchaseorder`
--

INSERT INTO `purchaseorder` (`purchase_id`, `purchase_price`, `created_at`, `user_username`, `purchase_type`, `payment_type`, `payment_status`, `payment_state`, `deliver_type`, `deliver_status`) VALUES
(1, 500, '2021-04-08 13:22:16', '4', '0', '0', 0, '', '0', 0),
(2, 215, '2021-04-26 06:33:00', '', '0', '0', 0, '', '0', 0),
(3, 225, '2021-08-23 11:58:00', 'marklin', 'online', 'promptpay', 2, '', 'delivery', 1),
(4, 240, '2021-08-03 04:14:23', 'oh_aew', '0', '0', 0, '', '0', 0),
(5, 145, '2021-08-03 06:15:22', 'oh_aew', '0', '0', 0, '', '0', 0),
(6, 100, '2021-08-09 14:14:40', 'oh_aew', '0', '0', 0, '', '0', 0),
(7, 245, '2021-08-09 14:15:21', 'oh_aew', '0', '0', 0, '', '0', 0),
(8, 255, '2021-08-19 14:59:06', 'oh_aew', '0', '0', 0, '', '0', 0),
(9, 255, '2021-08-19 14:59:06', 'oh_aew', '0', '0', 0, '', '0', 0),
(10, 850, '2021-08-23 19:37:27', 'soso', 'store', 'cash', 2, '', 'take', 1),
(11, 0, '2021-08-27 20:05:17', '', '', '', 0, '', '', 0),
(12, 0, '2021-08-27 20:06:07', 'marklin', '', '', 0, '', '', 0),
(13, 0, '2021-08-27 20:06:07', 'marklin', '', '', 0, '', '', 0),
(14, 0, '2021-08-27 20:07:18', 'marklin', '', '', 0, '', '', 0),
(15, 0, '2021-08-27 20:07:18', 'marklin', '', '', 0, '', '', 0),
(16, 0, '2021-08-27 20:07:18', 'marklin', '', '', 0, '', '', 0),
(17, 0, '2021-08-27 20:07:18', 'marklin', '', '', 0, '', '', 0),
(18, 0, '2021-08-27 20:07:18', 'marklin', '', '', 0, '', '', 0),
(19, 0, '2021-08-27 20:07:20', 'marklin', '', '', 0, '', '', 0),
(20, 0, '2021-08-27 20:07:56', 'marklin', '', '', 0, '', '', 0),
(21, 0, '2021-08-27 20:08:03', 'marklin', '', '', 0, '', '', 0),
(22, 0, '2021-08-27 20:08:06', 'marklin', '', '', 0, '', '', 0),
(23, 0, '2021-08-27 20:08:58', 'marklin', '', '', 0, '', '', 0),
(24, 0, '2021-08-27 21:10:45', 'marklin', '', '', 0, '', '', 0),
(25, 0, '2021-08-27 21:13:01', 'marklin', '', '', 0, '', '', 0),
(26, 0, '2021-08-27 21:13:15', 'marklin', '', '', 0, '', '', 0),
(27, 0, '2021-08-27 21:13:18', 'marklin', '', '', 0, '', '', 0),
(28, 0, '2021-08-27 21:13:27', 'marklin', '', '', 0, '', '', 0),
(29, 0, '2021-08-27 21:13:30', 'marklin', '', '', 0, '', '', 0),
(30, 0, '2021-08-27 21:13:32', 'marklin', '', '', 0, '', '', 0),
(31, 0, '2021-08-27 21:15:47', 'marklin', '', '', 0, '', '', 0),
(32, 0, '2021-08-27 21:15:52', 'marklin', '', '', 0, '', '', 0),
(33, 0, '2021-08-27 21:50:12', 'marklin', '', '', 0, '', '', 0),
(34, 0, '2021-08-27 21:55:38', 'marklin', '', '', 0, '', '', 0),
(35, 0, '2021-08-27 21:57:00', 'marklin', '', '', 0, '', '', 0),
(36, 0, '2021-08-27 22:00:39', 'marklin', '', '', 0, '', '', 0),
(37, 0, '2021-08-28 14:07:23', 'marklin', '', '', 0, '', '', 0),
(38, 0, '2021-08-28 14:15:42', 'marklin', '', '', 0, '', '', 0),
(39, 0, '2021-08-28 14:35:24', 'marklin', '', '', 0, '', '', 0),
(40, 0, '2021-08-28 14:35:50', 'marklin', '', '', 0, '', '', 0),
(41, 0, '2021-08-28 14:35:51', 'marklin', '', '', 0, '', '', 0),
(42, 0, '2021-08-28 14:35:51', 'marklin', '', '', 0, '', '', 0),
(43, 0, '2021-08-28 14:35:56', 'marklin', '', '', 0, '', '', 0),
(44, 0, '2021-08-28 14:36:12', 'marklin', '', '', 0, '', '', 0),
(45, 0, '2021-08-28 14:36:13', 'marklin', '', '', 0, '', '', 0),
(46, 0, '2021-08-28 14:36:13', 'marklin', '', '', 0, '', '', 0),
(47, 0, '2021-08-28 14:36:13', 'marklin', '', '', 0, '', '', 0),
(48, 0, '2021-08-28 14:36:13', 'marklin', '', '', 0, '', '', 0),
(49, 0, '2021-08-28 14:36:13', 'marklin', '', '', 0, '', '', 0),
(50, 0, '2021-08-28 14:36:14', 'marklin', '', '', 0, '', '', 0),
(51, 0, '2021-08-28 14:36:14', 'marklin', '', '', 0, '', '', 0),
(52, 0, '2021-08-28 14:36:14', 'marklin', '', '', 0, '', '', 0),
(53, 0, '2021-08-28 14:36:14', 'marklin', '', '', 0, '', '', 0),
(54, 0, '2021-08-28 14:36:15', 'marklin', '', '', 0, '', '', 0),
(55, 0, '2021-08-28 14:36:46', 'marklin', '', '', 0, '', '', 0),
(56, 0, '2021-08-28 14:36:46', 'marklin', '', '', 0, '', '', 0),
(57, 0, '2021-08-28 14:36:47', 'marklin', '', '', 0, '', '', 0),
(58, 0, '2021-08-28 14:36:59', 'marklin', '', '', 0, '', '', 0),
(59, 0, '2021-08-28 14:45:52', 'marklin', '', '', 0, '', '', 0),
(60, 0, '2021-08-28 15:17:48', 'marklin', '', '', 0, '', '', 0),
(61, 0, '2021-08-28 15:20:57', 'marklin', '', '', 0, '', '', 0),
(62, 0, '2021-08-28 15:25:01', 'marklin', '', '', 0, '', '', 0),
(63, 0, '2021-08-28 15:28:34', 'marklin', '', '', 0, '', '', 0),
(64, 0, '2021-08-28 15:28:43', 'marklin', '', '', 0, '', '', 0),
(65, 0, '2021-08-28 15:41:32', 'marklin', '', '', 0, '', '', 0),
(66, 0, '2021-08-28 15:41:48', 'marklin', '', '', 0, '', '', 0),
(67, 0, '2021-08-28 16:03:37', 'marklin', '', '', 0, '', '', 0),
(68, 0, '2021-08-28 16:05:18', 'marklin', '', '', 0, '', '', 0),
(69, 0, '2021-08-28 16:05:54', 'marklin', '', '', 0, '', '', 0),
(70, 0, '2021-08-28 16:05:55', 'marklin', '', '', 0, '', '', 0),
(71, 0, '2021-08-28 16:13:51', 'marklin', '', '', 0, '', '', 0),
(72, 0, '2021-08-28 16:24:46', 'oh_aew', '', '', 0, '', '', 0),
(73, 0, '2021-08-28 16:25:05', 'oh_aew', '', '', 0, '', '', 0),
(74, 0, '2021-08-28 16:25:40', 'oh_aew', '', '', 0, '', '', 0),
(75, 0, '2021-08-28 16:25:41', 'oh_aew', '', '', 0, '', '', 0),
(76, 0, '2021-08-28 16:25:42', 'oh_aew', '', '', 0, '', '', 0),
(77, 0, '2021-08-28 16:25:42', 'oh_aew', '', '', 0, '', '', 0),
(78, 0, '2021-08-28 16:27:29', 'oh_aew', '', '', 0, '', '', 0),
(79, 0, '2021-08-28 16:27:30', 'oh_aew', '', '', 0, '', '', 0),
(80, 0, '2021-08-28 16:27:32', 'oh_aew', '', '', 0, '', '', 0),
(81, 0, '2021-08-28 16:27:36', 'oh_aew', '', '', 0, '', '', 0),
(82, 0, '2021-08-28 16:30:45', 'oh_aew', '', '', 0, '', '', 0),
(83, 0, '2021-08-28 16:30:46', 'oh_aew', '', '', 0, '', '', 0),
(84, 0, '2021-08-28 16:30:46', 'oh_aew', '', '', 0, '', '', 0),
(85, 0, '2021-08-28 16:30:46', 'oh_aew', '', '', 0, '', '', 0),
(86, 0, '2021-08-28 16:30:47', 'oh_aew', '', '', 0, '', '', 0),
(87, 0, '2021-08-28 16:30:47', 'oh_aew', '', '', 0, '', '', 0),
(88, 0, '2021-08-28 16:32:48', 'oh_aew', '', '', 0, '', '', 0),
(89, 0, '2021-08-28 16:32:48', 'oh_aew', '', '', 0, '', '', 0),
(90, 0, '2021-08-28 16:32:48', 'oh_aew', '', '', 0, '', '', 0),
(91, 0, '2021-08-28 16:33:37', 'oh_aew', '', '', 0, '', '', 0),
(92, 0, '2021-08-28 16:35:31', 'oh_aew', '', '', 0, '', '', 0),
(93, 0, '2021-08-28 16:35:32', 'oh_aew', '', '', 0, '', '', 0),
(94, 0, '2021-08-28 16:35:32', 'oh_aew', '', '', 0, '', '', 0),
(95, 0, '2021-08-28 16:35:32', 'oh_aew', '', '', 0, '', '', 0),
(96, 0, '2021-08-28 16:42:00', 'oh_aew', '', '', 0, '', '', 0),
(97, 0, '2021-08-29 16:59:09', 'marklin', '', '', 0, '', '', 0),
(98, 0, '2021-08-29 17:00:55', 'marklin', '', '', 0, '', '', 0),
(99, 0, '2021-08-29 17:01:27', 'marklin', '', '', 0, '', '', 0),
(100, 0, '2021-08-29 17:02:43', 'marklin', '', '', 0, '', '', 0),
(101, 0, '2021-08-29 17:03:44', 'marklin', '', '', 0, '', '', 0),
(102, 0, '2021-08-29 17:04:11', 'marklin', '', '', 0, '', '', 0),
(103, 0, '2021-08-29 17:07:29', 'marklin', '', '', 0, '', '', 0),
(104, 0, '2021-08-29 17:12:19', 'marklin', '', '', 0, '', '', 0),
(105, 0, '2021-08-29 17:13:24', 'marklin', '', '', 0, '', '', 0),
(106, 0, '2021-08-29 17:13:59', 'marklin', '', '', 0, '', '', 0),
(107, 0, '2021-08-29 17:14:37', 'marklin', '', '', 0, '', '', 0),
(108, 0, '2021-08-29 17:22:04', 'marklin', '', '', 0, '', '', 0),
(109, 0, '2021-08-29 17:22:23', 'marklin', '', '', 0, '', '', 0),
(110, 0, '2021-08-29 17:24:26', 'marklin', '', '', 0, '', '', 0),
(111, 0, '2021-08-29 17:25:38', 'marklin', '', '', 0, '', '', 0),
(112, 0, '2021-08-29 17:26:09', 'marklin', '', '', 0, '', '', 0),
(113, 0, '2021-08-29 17:26:24', 'marklin', '', '', 0, '', '', 0),
(114, 0, '2021-08-29 17:30:07', 'marklin', '', '', 0, '', '', 0),
(115, 0, '2021-08-29 17:30:10', 'marklin', '', '', 0, '', '', 0),
(116, 0, '2021-08-29 17:30:48', 'marklin', '', '', 0, '', '', 0),
(117, 0, '2021-08-29 17:30:52', 'marklin', '', '', 0, '', '', 0),
(118, 0, '2021-08-29 17:34:40', 'marklin', '', '', 0, '', '', 0),
(119, 0, '2021-08-29 17:40:37', 'marklin', '', '', 0, '', '', 0),
(120, 0, '2021-08-29 17:43:29', 'marklin', '', '', 0, '', '', 0),
(121, 0, '2021-08-29 17:43:35', 'marklin', '', '', 0, '', '', 0),
(122, 0, '2021-08-29 17:43:35', 'marklin', '', '', 0, '', '', 0),
(123, 0, '2021-08-29 17:43:36', 'marklin', '', '', 0, '', '', 0),
(124, 0, '2021-08-29 17:43:36', 'marklin', '', '', 0, '', '', 0),
(125, 0, '2021-08-29 17:43:36', 'marklin', '', '', 0, '', '', 0),
(126, 0, '2021-08-29 17:43:36', 'marklin', '', '', 0, '', '', 0),
(127, 0, '2021-08-29 17:43:36', 'marklin', '', '', 0, '', '', 0),
(128, 0, '2021-08-29 17:43:36', 'marklin', '', '', 0, '', '', 0),
(129, 0, '2021-08-29 17:43:37', 'marklin', '', '', 0, '', '', 0),
(130, 0, '2021-08-29 17:43:37', 'marklin', '', '', 0, '', '', 0),
(131, 0, '2021-08-29 17:43:37', 'marklin', '', '', 0, '', '', 0),
(132, 0, '2021-08-29 17:43:37', 'marklin', '', '', 0, '', '', 0),
(133, 0, '2021-08-29 17:43:37', 'marklin', '', '', 0, '', '', 0),
(134, 0, '2021-08-29 17:43:38', 'marklin', '', '', 0, '', '', 0),
(135, 0, '2021-08-29 17:43:38', 'marklin', '', '', 0, '', '', 0),
(136, 0, '2021-08-29 17:43:38', 'marklin', '', '', 0, '', '', 0),
(137, 0, '2021-08-29 17:43:38', 'marklin', '', '', 0, '', '', 0),
(138, 0, '2021-08-29 17:43:38', 'marklin', '', '', 0, '', '', 0),
(139, 0, '2021-08-29 17:43:38', 'marklin', '', '', 0, '', '', 0),
(140, 0, '2021-08-29 17:43:39', 'marklin', '', '', 0, '', '', 0),
(141, 0, '2021-08-29 17:43:39', 'marklin', '', '', 0, '', '', 0),
(142, 0, '2021-08-29 17:43:39', 'marklin', '', '', 0, '', '', 0),
(143, 0, '2021-08-29 17:43:39', 'marklin', '', '', 0, '', '', 0),
(144, 0, '2021-08-29 17:43:39', 'marklin', '', '', 0, '', '', 0),
(145, 0, '2021-08-29 17:43:39', 'marklin', '', '', 0, '', '', 0),
(146, 0, '2021-08-29 17:43:39', 'marklin', '', '', 0, '', '', 0),
(147, 0, '2021-08-29 17:43:40', 'marklin', '', '', 0, '', '', 0),
(148, 0, '2021-08-29 17:43:40', 'marklin', '', '', 0, '', '', 0),
(149, 0, '2021-08-29 17:43:40', 'marklin', '', '', 0, '', '', 0),
(150, 0, '2021-08-29 17:43:40', 'marklin', '', '', 0, '', '', 0),
(151, 0, '2021-08-29 17:43:40', 'marklin', '', '', 0, '', '', 0),
(152, 0, '2021-08-29 17:43:40', 'marklin', '', '', 0, '', '', 0),
(153, 0, '2021-08-29 17:43:41', 'marklin', '', '', 0, '', '', 0),
(154, 0, '2021-08-29 17:43:41', 'marklin', '', '', 0, '', '', 0),
(155, 0, '2021-08-29 17:43:41', 'marklin', '', '', 0, '', '', 0),
(156, 0, '2021-08-29 17:43:41', 'marklin', '', '', 0, '', '', 0),
(157, 0, '2021-08-29 17:43:41', 'marklin', '', '', 0, '', '', 0),
(158, 0, '2021-08-29 17:44:31', 'marklin', '', '', 0, '', '', 0),
(159, 0, '2021-08-29 17:44:49', 'marklin', '', '', 0, '', '', 0),
(160, 0, '2021-08-29 17:45:09', 'marklin', '', '', 0, '', '', 0),
(161, 0, '2021-08-29 17:50:28', 'marklin', '', '', 0, '', '', 0),
(162, 0, '2021-08-29 17:55:31', 'marklin', '', '', 0, '', '', 0),
(163, 0, '2021-08-29 17:57:45', 'marklin', '', '', 0, '', '', 0),
(164, 0, '2021-08-29 17:57:48', 'marklin', '', '', 0, '', '', 0),
(165, 0, '2021-08-29 18:02:34', 'marklin', '', '', 0, '', '', 0),
(166, 0, '2021-08-29 18:17:35', 'marklin', '', '', 0, '', '', 0),
(167, 0, '2021-08-29 18:18:19', 'marklin', '', '', 0, '', '', 0),
(168, 1755, '2021-08-29 18:18:54', 'marklin', '', '', 0, '', '', 0),
(169, 1755, '2021-08-29 18:18:56', 'marklin', '', '', 0, '', '', 0),
(170, 1755, '2021-08-29 18:18:56', 'marklin', '', '', 0, '', '', 0),
(171, 1755, '2021-08-29 18:18:56', 'marklin', '', '', 0, '', '', 0),
(172, 1755, '2021-08-29 18:18:56', 'marklin', '', '', 0, '', '', 0),
(173, 1755, '2021-08-29 18:18:57', 'marklin', '', '', 0, '', '', 0),
(174, 1755, '2021-08-29 18:18:57', 'marklin', '', '', 0, '', '', 0),
(175, 1755, '2021-08-29 18:18:57', 'marklin', '', '', 0, '', '', 0),
(176, 1755, '2021-08-29 18:19:20', 'marklin', '', '', 0, '', '', 0),
(177, 1755, '2021-08-29 19:58:43', 'marklin', '', '', 0, '', '', 0),
(178, 1755, '2021-08-29 19:59:15', 'marklin', '', '', 0, '', '', 0),
(179, 1755, '2021-08-29 19:59:15', 'marklin', '', '', 0, '', '', 0),
(180, 1755, '2021-08-29 19:59:15', 'marklin', '', '', 0, '', '', 0),
(181, 1755, '2021-08-29 19:59:15', 'marklin', '', '', 0, '', '', 0),
(182, 1755, '2021-08-29 19:59:16', 'marklin', '', '', 0, '', '', 0),
(183, 1755, '2021-08-29 19:59:16', 'marklin', '', '', 0, '', '', 0),
(184, 1755, '2021-08-29 19:59:16', 'marklin', '', '', 0, '', '', 0),
(185, 1755, '2021-08-29 19:59:16', 'marklin', '', '', 0, '', '', 0),
(186, 1755, '2021-08-29 19:59:16', 'marklin', '', '', 0, '', '', 0),
(187, 1755, '2021-08-29 19:59:17', 'marklin', '', '', 0, '', '', 0),
(188, 1755, '2021-08-29 19:59:17', 'marklin', '', '', 0, '', '', 0),
(189, 1755, '2021-08-29 19:59:17', 'marklin', '', '', 0, '', '', 0),
(190, 1755, '2021-08-29 19:59:17', 'marklin', '', '', 0, '', '', 0),
(191, 1755, '2021-08-29 19:59:17', 'marklin', '', '', 0, '', '', 0),
(192, 1755, '2021-08-29 19:59:17', 'marklin', '', '', 0, '', '', 0),
(193, 1755, '2021-08-29 19:59:18', 'marklin', '', '', 0, '', '', 0),
(194, 1755, '2021-08-29 19:59:18', 'marklin', '', '', 0, '', '', 0),
(195, 1755, '2021-08-29 19:59:18', 'marklin', '', '', 0, '', '', 0),
(196, 1755, '2021-08-29 19:59:18', 'marklin', '', '', 0, '', '', 0),
(197, 1755, '2021-08-29 19:59:18', 'marklin', '', '', 0, '', '', 0),
(198, 1755, '2021-08-29 19:59:18', 'marklin', '', '', 0, '', '', 0),
(199, 1755, '2021-08-29 19:59:19', 'marklin', '', '', 0, '', '', 0),
(200, 1755, '2021-08-29 19:59:19', 'marklin', '', '', 0, '', '', 0),
(201, 1755, '2021-08-29 19:59:19', 'marklin', '', '', 0, '', '', 0),
(202, 1755, '2021-08-29 19:59:19', 'marklin', '', '', 0, '', '', 0),
(203, 1755, '2021-08-29 19:59:19', 'marklin', '', '', 0, '', '', 0),
(204, 1755, '2021-08-29 19:59:20', 'marklin', '', '', 0, '', '', 0),
(205, 1755, '2021-08-29 19:59:20', 'marklin', '', '', 0, '', '', 0),
(206, 1755, '2021-08-29 19:59:20', 'marklin', '', '', 0, '', '', 0),
(207, 1755, '2021-08-29 19:59:21', 'marklin', '', '', 0, '', '', 0),
(208, 1755, '2021-08-29 19:59:21', 'marklin', '', '', 0, '', '', 0),
(209, 1755, '2021-08-29 19:59:21', 'marklin', '', '', 0, '', '', 0),
(210, 1755, '2021-08-29 19:59:21', 'marklin', '', '', 0, '', '', 0),
(211, 1755, '2021-08-29 19:59:22', 'marklin', '', '', 0, '', '', 0),
(212, 1755, '2021-08-29 19:59:22', 'marklin', '', '', 0, '', '', 0),
(213, 1755, '2021-08-29 19:59:22', 'marklin', '', '', 0, '', '', 0),
(214, 1755, '2021-08-29 19:59:22', 'marklin', '', '', 0, '', '', 0),
(215, 1755, '2021-08-29 19:59:22', 'marklin', '', '', 0, '', '', 0),
(216, 1755, '2021-08-29 19:59:22', 'marklin', '', '', 0, '', '', 0),
(217, 1755, '2021-08-29 19:59:23', 'marklin', '', '', 0, '', '', 0),
(218, 1755, '2021-08-29 19:59:23', 'marklin', '', '', 0, '', '', 0),
(219, 1755, '2021-08-29 19:59:23', 'marklin', '', '', 0, '', '', 0),
(220, 1755, '2021-08-29 19:59:23', 'marklin', '', '', 0, '', '', 0),
(221, 1755, '2021-08-29 19:59:23', 'marklin', '', '', 0, '', '', 0),
(222, 1755, '2021-08-29 19:59:23', 'marklin', '', '', 0, '', '', 0),
(223, 1755, '2021-08-29 19:59:24', 'marklin', '', '', 0, '', '', 0),
(224, 1755, '2021-08-29 19:59:28', 'marklin', '', '', 0, '', '', 0),
(225, 1755, '2021-08-29 19:59:28', 'marklin', '', '', 0, '', '', 0),
(226, 1755, '2021-08-29 19:59:28', 'marklin', '', '', 0, '', '', 0),
(227, 1755, '2021-08-29 19:59:29', 'marklin', '', '', 0, '', '', 0),
(228, 1755, '2021-08-29 19:59:29', 'marklin', '', '', 0, '', '', 0),
(229, 1755, '2021-08-29 19:59:29', 'marklin', '', '', 0, '', '', 0),
(230, 1755, '2021-08-29 19:59:29', 'marklin', '', '', 0, '', '', 0),
(231, 1755, '2021-08-29 19:59:29', 'marklin', '', '', 0, '', '', 0),
(232, 1755, '2021-08-29 19:59:30', 'marklin', '', '', 0, '', '', 0),
(233, 1755, '2021-08-29 19:59:30', 'marklin', '', '', 0, '', '', 0),
(234, 1755, '2021-08-29 19:59:30', 'marklin', '', '', 0, '', '', 0),
(235, 1755, '2021-08-29 19:59:30', 'marklin', '', '', 0, '', '', 0),
(236, 1755, '2021-08-29 19:59:30', 'marklin', '', '', 0, '', '', 0),
(237, 1755, '2021-08-29 20:13:08', 'marklin', '', '', 0, '', '', 0),
(238, 810, '2021-08-30 14:53:16', 'marklin', '', '', 0, '', '', 0),
(239, 810, '2021-08-30 14:53:17', 'marklin', '', '', 0, '', '', 0),
(240, 810, '2021-08-30 14:53:18', 'marklin', '', '', 0, '', '', 0),
(241, 810, '2021-08-30 14:53:18', 'marklin', '', '', 0, '', '', 0),
(242, 810, '2021-08-30 14:53:18', 'marklin', '', '', 0, '', '', 0),
(243, 810, '2021-08-30 14:53:18', 'marklin', '', '', 0, '', '', 0),
(244, 810, '2021-08-30 14:53:18', 'marklin', '', '', 0, '', '', 0),
(245, 810, '2021-08-30 14:53:18', 'marklin', '', '', 0, '', '', 0),
(246, 810, '2021-08-30 14:53:19', 'marklin', '', '', 0, '', '', 0),
(247, 810, '2021-08-30 14:53:22', 'marklin', '', '', 0, '', '', 0),
(248, 810, '2021-08-30 14:53:22', 'marklin', '', '', 0, '', '', 0),
(249, 810, '2021-08-30 14:53:22', 'marklin', '', '', 0, '', '', 0),
(250, 810, '2021-08-30 14:53:22', 'marklin', '', '', 0, '', '', 0),
(251, 810, '2021-08-30 14:53:27', 'marklin', '', '', 0, '', '', 0),
(252, 810, '2021-08-30 14:53:27', 'marklin', '', '', 0, '', '', 0),
(253, 810, '2021-08-30 14:53:27', 'marklin', '', '', 0, '', '', 0),
(254, 810, '2021-08-30 14:53:27', 'marklin', '', '', 0, '', '', 0),
(255, 810, '2021-08-30 14:53:28', 'marklin', '', '', 0, '', '', 0),
(256, 810, '2021-08-30 14:53:28', 'marklin', '', '', 0, '', '', 0),
(257, 810, '2021-08-30 14:53:28', 'marklin', '', '', 0, '', '', 0),
(258, 810, '2021-08-30 14:53:28', 'marklin', '', '', 0, '', '', 0),
(259, 810, '2021-08-30 14:53:28', 'marklin', '', '', 0, '', '', 0),
(260, 810, '2021-08-30 14:53:28', 'marklin', '', '', 0, '', '', 0),
(261, 810, '2021-08-30 14:53:29', 'marklin', '', '', 0, '', '', 0),
(262, 810, '2021-08-30 14:53:29', 'marklin', '', '', 0, '', '', 0),
(263, 810, '2021-08-30 14:53:29', 'marklin', '', '', 0, '', '', 0),
(264, 810, '2021-08-30 14:53:29', 'marklin', '', '', 0, '', '', 0),
(265, 810, '2021-08-30 14:53:29', 'marklin', '', '', 0, '', '', 0),
(266, 810, '2021-08-30 14:53:29', 'marklin', '', '', 0, '', '', 0),
(267, 810, '2021-08-30 14:53:30', 'marklin', '', '', 0, '', '', 0),
(268, 810, '2021-08-30 14:53:30', 'marklin', '', '', 0, '', '', 0),
(269, 810, '2021-08-30 14:53:30', 'marklin', '', '', 0, '', '', 0),
(270, 810, '2021-08-30 14:53:30', 'marklin', '', '', 0, '', '', 0),
(271, 810, '2021-08-30 14:53:30', 'marklin', '', '', 0, '', '', 0),
(272, 810, '2021-08-30 14:53:30', 'marklin', '', '', 0, '', '', 0),
(273, 810, '2021-08-30 14:53:31', 'marklin', '', '', 0, '', '', 0),
(274, 810, '2021-08-30 14:53:31', 'marklin', '', '', 0, '', '', 0),
(275, 810, '2021-08-30 14:53:31', 'marklin', '', '', 0, '', '', 0),
(276, 810, '2021-08-30 14:53:31', 'marklin', '', '', 0, '', '', 0),
(277, 810, '2021-08-30 14:53:31', 'marklin', '', '', 0, '', '', 0),
(278, 810, '2021-08-30 14:53:32', 'marklin', '', '', 0, '', '', 0),
(279, 810, '2021-08-30 14:53:32', 'marklin', '', '', 0, '', '', 0),
(280, 810, '2021-08-30 14:53:32', 'marklin', '', '', 0, '', '', 0),
(281, 810, '2021-08-30 14:53:32', 'marklin', '', '', 0, '', '', 0),
(282, 810, '2021-08-30 14:53:32', 'marklin', '', '', 0, '', '', 0),
(283, 810, '2021-08-30 14:53:32', 'marklin', '', '', 0, '', '', 0),
(284, 810, '2021-08-30 14:53:33', 'marklin', '', '', 0, '', '', 0),
(285, 810, '2021-08-30 14:53:33', 'marklin', '', '', 0, '', '', 0),
(286, 810, '2021-08-30 14:53:33', 'marklin', '', '', 0, '', '', 0),
(287, 810, '2021-08-30 14:53:33', 'marklin', '', '', 0, '', '', 0),
(288, 810, '2021-08-30 14:53:33', 'marklin', '', '', 0, '', '', 0),
(289, 810, '2021-08-30 14:53:34', 'marklin', '', '', 0, '', '', 0),
(290, 810, '2021-08-30 14:53:34', 'marklin', '', '', 0, '', '', 0),
(291, 810, '2021-08-30 14:53:34', 'marklin', '', '', 0, '', '', 0),
(292, 810, '2021-08-30 14:53:34', 'marklin', '', '', 0, '', '', 0),
(293, 810, '2021-08-30 14:53:34', 'marklin', '', '', 0, '', '', 0),
(294, 810, '2021-08-30 14:53:34', 'marklin', '', '', 0, '', '', 0),
(295, 810, '2021-08-30 14:53:35', 'marklin', '', '', 0, '', '', 0),
(296, 810, '2021-08-30 14:53:35', 'marklin', '', '', 0, '', '', 0),
(297, 810, '2021-08-30 14:53:35', 'marklin', '', '', 0, '', '', 0),
(298, 810, '2021-08-30 14:53:35', 'marklin', '', '', 0, '', '', 0),
(299, 810, '2021-08-30 14:53:35', 'marklin', '', '', 0, '', '', 0),
(300, 810, '2021-08-30 14:53:36', 'marklin', '', '', 0, '', '', 0),
(301, 810, '2021-08-30 14:53:36', 'marklin', '', '', 0, '', '', 0),
(302, 810, '2021-08-30 14:53:36', 'marklin', '', '', 0, '', '', 0),
(303, 810, '2021-08-30 14:53:36', 'marklin', '', '', 0, '', '', 0),
(304, 810, '2021-08-30 14:53:36', 'marklin', '', '', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `setbox`
--

CREATE TABLE `setbox` (
  `set_id` int(2) NOT NULL,
  `set_name` varchar(100) NOT NULL,
  `set_price` int(10) NOT NULL,
  `set_img` text NOT NULL,
  `set_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setbox`
--

INSERT INTO `setbox` (`set_id`, `set_name`, `set_price`, `set_img`, `set_qty`) VALUES
(1, 'SetA', 105, 'img/img60787edd1659d.png', 3),
(2, 'SetB', 100, 'img/img60787ec9b9c51.png', 3),
(3, 'SetA', 89, 'img/img60787ebc1b51b.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `setcus`
--

CREATE TABLE `setcus` (
  `setcus_id` int(10) NOT NULL,
  `setcus_price` int(10) NOT NULL,
  `user_username` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setcus`
--

INSERT INTO `setcus` (`setcus_id`, `setcus_price`, `user_username`) VALUES
(1, 248, 'marklin'),
(2, 261, 'marklin'),
(3, 189, 'oh_aew');

-- --------------------------------------------------------

--
-- Table structure for table `setcusdetail`
--

CREATE TABLE `setcusdetail` (
  `setcusde_id` int(10) NOT NULL,
  `pd_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `setcus_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setcusdetail`
--

INSERT INTO `setcusdetail` (`setcusde_id`, `pd_id`, `qty`, `setcus_id`) VALUES
(1, 37, 1, 1),
(2, 38, 1, 1),
(3, 39, 1, 1),
(4, 49, 1, 1),
(5, 59, 1, 1),
(6, 37, 1, 2),
(7, 38, 1, 2),
(8, 39, 2, 2),
(9, 38, 1, 3),
(10, 39, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `set_detail`
--

CREATE TABLE `set_detail` (
  `setdetail_id` int(2) NOT NULL,
  `set_id` int(2) NOT NULL,
  `pd_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `set_detail`
--

INSERT INTO `set_detail` (`setdetail_id`, `set_id`, `pd_id`) VALUES
(1, 1, 47),
(2, 1, 55),
(3, 1, 59),
(5, 2, 50),
(6, 2, 53),
(7, 2, 58),
(8, 3, 47),
(9, 3, 57),
(10, 3, 53);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_img` varchar(400) NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_pass` varchar(10) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_tel` varchar(10) NOT NULL,
  `user_birth` date NOT NULL,
  `user_gender` int(2) NOT NULL,
  `user_address` varchar(500) NOT NULL,
  `user_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_img`, `user_fname`, `user_lname`, `user_username`, `user_pass`, `user_email`, `user_tel`, `user_birth`, `user_gender`, `user_address`, `user_status`) VALUES
('img/pp.png', 'ชาคริต', 'กล้าดี', 'marklin', '1234', 'mark@gmail.com', '0623393533', '2021-03-31', 1, 'หนองเรือ', 1),
('', 'พันวา', 'สุรมณฑา', 'oh_aew', '1234', 'ohaew@gmail.com', '0981702726', '1999-01-17', 0, 'Danaiwittaya Puket', 3),
('img/img60858d9e684a4.png', 'ภานุวัฒน์', 'ยี่สุ่นซ้อน', 'panuwat', '1234', 'kk@hotmail.com', '0971147514', '2021-04-15', 1, 'ชลบุรี', 1),
('', 'ตะนอย', 'ลีส์', 'staff', '1234', 'tanoy@gmail.com', '0801630597', '1999-04-11', 2, 'โคราชบ้านเอ็ง', 2),
('', 'นิลาวัณย์', 'จันทนะ', 'taenlvn', '1234', 'taenlvn@gmail.com', '0934652383', '1999-07-13', 0, '777/2 ม. 15 ต. พันดอน อ. กุมภวาปี จ. อุดรธานี\r\n', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `setbox`
--
ALTER TABLE `setbox`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `setcus`
--
ALTER TABLE `setcus`
  ADD PRIMARY KEY (`setcus_id`);

--
-- Indexes for table `setcusdetail`
--
ALTER TABLE `setcusdetail`
  ADD PRIMARY KEY (`setcusde_id`);

--
-- Indexes for table `set_detail`
--
ALTER TABLE `set_detail`
  ADD PRIMARY KEY (`setdetail_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pd_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  MODIFY `purchase_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;

--
-- AUTO_INCREMENT for table `setbox`
--
ALTER TABLE `setbox`
  MODIFY `set_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setcus`
--
ALTER TABLE `setcus`
  MODIFY `setcus_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setcusdetail`
--
ALTER TABLE `setcusdetail`
  MODIFY `setcusde_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `set_detail`
--
ALTER TABLE `set_detail`
  MODIFY `setdetail_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
