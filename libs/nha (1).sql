-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 14, 2023 lúc 04:59 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nha`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `MaAccount` int(11) NOT NULL,
  `Email` text NOT NULL,
  `hashPass` text NOT NULL,
  `role` tinyint(1) NOT NULL,
  `dateCreate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateTime` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `verify` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`MaAccount`, `Email`, `hashPass`, `role`, `dateCreate`, `updateTime`, `verify`) VALUES
(34, 'lphoanglong1304@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$NVY2cXVCWC9meTAyN1A4Mw$Eu8cZ8AZ6HZmiFsaCnkYAcU9gLtHZQy/sMQfKjlU6+o', 0, '2023-04-03 13:32:22', '2023-04-11 07:47:56', 1),
(35, 'than.gio.kid@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$NVY2cXVCWC9meTAyN1A4Mw$Eu8cZ8AZ6HZmiFsaCnkYAcU9gLtHZQy/sMQfKjlU6+o', 1, '2023-04-03 13:32:53', '2023-04-11 07:47:56', 1),
(77, 'mine1342001@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$eEg2VUEzQzdYTVBBVy43ZQ$xmjnSOob7cGjzZjUuoUVrd8NYafva4jcBYRBwQsKsPs', 1, '2023-04-11 07:49:00', '2023-04-11 07:50:32', 1),
(78, 'lphoanglong130401@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$ZFNqaGRUa29KZUZuWFMxWA$szLhB7H5QCcHLy1eVTLx5rUjKkFYu219DVI4QaExHA8', 1, '2023-04-25 05:43:56', '2023-04-27 13:21:45', 1),
(79, 'thaibinh06102000@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$Tlc3aUxteGc3STNLaTRncA$cEQNknyNmd0G2xnX6y3ORE+GhgAgyNB/dy5q2/FY4PQ', 1, '2023-05-05 10:51:47', '2023-05-09 10:14:11', 1),
(80, 'kenkainguyettram@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$TzU5RFhDZ2pmMkJwMGRBQQ$Ztp+0bpjeQxlARDKYl1BuQs5RXOQYzlwdlEwSOu4RB4', 0, '2023-05-07 09:31:47', '2023-05-07 09:32:18', 1),
(81, 'miraikazuo2000@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$cVh0R3VST0dITlp6cld5SQ$v5l62Xc2PZaLg9ThLtchb0+h2uKLCdyjK0j1bEAFxxA', 1, '2023-05-09 12:25:09', '2023-05-09 12:25:09', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chutro`
--

CREATE TABLE `chutro` (
  `MaChuTro` int(11) NOT NULL,
  `MaAccount` int(11) NOT NULL,
  `Ten` text NOT NULL,
  `CMND` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chutro`
--

INSERT INTO `chutro` (`MaChuTro`, `MaAccount`, `Ten`, `CMND`) VALUES
(7, 34, 'Long', '123'),
(17, 80, 'Nguyễn Thái Bình', '888');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hopdongthue`
--

CREATE TABLE `hopdongthue` (
  `id` int(11) NOT NULL,
  `MaPhongTro` int(11) NOT NULL,
  `MaChuTro` int(11) NOT NULL,
  `MaKhachTro` int(11) NOT NULL,
  `sothangthue` int(11) DEFAULT NULL,
  `thanhtien` text NOT NULL,
  `ngaylaphoadon` datetime NOT NULL,
  `ngaytraphong` datetime DEFAULT NULL,
  `ngaynhanphong` datetime DEFAULT NULL,
  `MaPhuongThuc` int(11) NOT NULL,
  `ngayhuyhopdong` datetime DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1,
  `sdt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hopdongthue`
--

INSERT INTO `hopdongthue` (`id`, `MaPhongTro`, `MaChuTro`, `MaKhachTro`, `sothangthue`, `thanhtien`, `ngaylaphoadon`, `ngaytraphong`, `ngaynhanphong`, `MaPhuongThuc`, `ngayhuyhopdong`, `visible`, `sdt`) VALUES
(3, 6, 7, 9, 1, '2100000', '2023-04-29 00:00:00', '2023-05-02 00:00:00', '2023-06-02 00:00:00', 1, NULL, 1, '0909298578'),
(5, 8, 17, 10, 1, '300000', '2023-05-09 00:00:00', '2023-06-12 00:00:00', '2023-05-12 00:00:00', 1, NULL, 2, '0123456'),
(13, 8, 17, 10, 1, '300000', '2023-05-12 00:00:00', '2023-06-15 00:00:00', '2023-05-15 00:00:00', 1, NULL, 1, '0123456'),
(18, 4, 7, 10, 4, '5400000', '2023-05-12 00:00:00', '2023-09-15 00:00:00', '2023-05-15 00:00:00', 1, NULL, 2, '0123456'),
(19, 15, 17, 10, 1, '2500000', '2023-05-13 00:00:00', '2023-06-16 00:00:00', '2023-05-16 00:00:00', 2, NULL, 2, '0123456'),
(20, 14, 17, 10, 5, '12500000', '2023-05-13 00:00:00', '2023-10-16 00:00:00', '2023-05-16 00:00:00', 1, NULL, 2, '0123456'),
(23, 29, 17, 10, 7, '17500000', '2023-05-16 00:00:00', '2023-12-16 00:00:00', '2023-05-09 00:00:00', 1, NULL, 1, '0123456'),
(24, 19, 17, 10, 2, '5000000', '2023-05-14 00:00:00', '2023-07-17 00:00:00', '2023-05-17 00:00:00', 1, NULL, 1, '789'),
(26, 35, 7, 10, 1, '1350000', '2023-05-14 00:00:00', '2023-06-17 00:00:00', '2023-05-17 00:00:00', 1, NULL, 1, '0123456'),
(27, 34, 17, 10, 1, '1300000', '2023-05-14 00:00:00', '2023-06-17 00:00:00', '2023-05-17 00:00:00', 1, NULL, 1, '0123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachtro`
--

CREATE TABLE `khachtro` (
  `MaKhachTro` int(11) NOT NULL,
  `MaAccount` int(11) NOT NULL,
  `Ten` text NOT NULL,
  `CMND` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachtro`
--

INSERT INTO `khachtro` (`MaKhachTro`, `MaAccount`, `Ten`, `CMND`) VALUES
(1, 35, 'Phong', '123'),
(8, 77, 'Long Guest', '0792xxxxxxxx'),
(9, 78, 'Long Guest Test', '1'),
(10, 81, 'Nguyễn Thái Bình', '0792036');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhatro`
--

CREATE TABLE `nhatro` (
  `MaNhaTro` int(11) NOT NULL,
  `DiaChi` text NOT NULL,
  `MoTaNhaTro` text NOT NULL,
  `MaChuTro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhatro`
--

INSERT INTO `nhatro` (`MaNhaTro`, `DiaChi`, `MoTaNhaTro`, `MaChuTro`) VALUES
(23, '461c Bình Đông', 'Đẹp, có máy lạnh', 7),
(24, '2A Bình thạnh', 'Oke', 7),
(27, 'oke', 'test oke\r\ncheck line test', 7),
(28, '45/18 Lê Cơ , khu phố 4', 'Có bãi gửi xe rộng, có wifi miễn phí', 17),
(29, '45/32 Hoàng Văn Chiểu', 'Có bãi gửi xe rộng, có wifi miễn phí', 17),
(30, '96/56/2  Tran Hung Dao', 'Có bãi gửi xe rộng, có wifi miễn phí', 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieudanhgiakhachtro`
--

CREATE TABLE `phieudanhgiakhachtro` (
  `id` int(11) NOT NULL,
  `MaChuTro` int(11) DEFAULT NULL,
  `MaKhachTro` int(11) DEFAULT NULL,
  `MaPhongTro` int(11) DEFAULT NULL,
  `MoiTruong` int(11) DEFAULT NULL,
  `AnNinh` int(11) DEFAULT NULL,
  `LuatPhap` int(11) DEFAULT NULL,
  `ThaiDo` int(11) DEFAULT NULL,
  `TienDungHen` int(11) DEFAULT NULL,
  `TaiSanChung` int(11) DEFAULT NULL,
  `VanHoaDaoDuc` int(11) DEFAULT NULL,
  `AvgKhachTro` int(11) DEFAULT NULL,
  `RoleEvalKhachTro` int(11) DEFAULT NULL,
  `TimeEvelAbove` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieudanhgiakhachtro`
--

INSERT INTO `phieudanhgiakhachtro` (`id`, `MaChuTro`, `MaKhachTro`, `MaPhongTro`, `MoiTruong`, `AnNinh`, `LuatPhap`, `ThaiDo`, `TienDungHen`, `TaiSanChung`, `VanHoaDaoDuc`, `AvgKhachTro`, `RoleEvalKhachTro`, `TimeEvelAbove`) VALUES
(3, 7, 9, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(4, 17, 10, 8, 10, 8, 8, 10, 6, 6, 10, 6, 2, '2023-05-14 21:51:42'),
(5, 17, 10, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(6, 7, 10, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(7, 17, 10, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(8, 17, 10, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(9, 17, 10, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(11, 17, 10, 34, 10, 8, 8, 8, 10, 10, 8, 6, 2, '2023-05-14 21:51:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieudanhgiaphongtro`
--

CREATE TABLE `phieudanhgiaphongtro` (
  `IdEval` int(11) NOT NULL,
  `MaChuTro` int(11) DEFAULT NULL,
  `MaKhachTro` int(11) DEFAULT NULL,
  `MaPhongTro` int(11) DEFAULT NULL,
  `SachSe` int(11) DEFAULT NULL,
  `NguonNuoc` int(11) DEFAULT NULL,
  `KhongNgapNuoc` int(11) DEFAULT NULL,
  `KhoaCua` int(11) DEFAULT NULL,
  `CongToDien` int(11) DEFAULT NULL,
  `NhaXe` int(11) DEFAULT NULL,
  `HangXom` int(11) DEFAULT NULL,
  `NhaChu` int(11) DEFAULT NULL,
  `GiaNuocHopLy` int(11) DEFAULT NULL,
  `GiaThueHopLy` int(11) DEFAULT NULL,
  `AvgPhongTro` int(11) DEFAULT NULL,
  `RoleEval` int(11) DEFAULT NULL,
  `TimeEval` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieudanhgiaphongtro`
--

INSERT INTO `phieudanhgiaphongtro` (`IdEval`, `MaChuTro`, `MaKhachTro`, `MaPhongTro`, `SachSe`, `NguonNuoc`, `KhongNgapNuoc`, `KhoaCua`, `CongToDien`, `NhaXe`, `HangXom`, `NhaChu`, `GiaNuocHopLy`, `GiaThueHopLy`, `AvgPhongTro`, `RoleEval`, `TimeEval`) VALUES
(1, 7, 9, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(2, 17, 10, 8, 8, 8, 6, 6, 6, 6, 10, 8, 10, 10, 8, 2, '2023-05-14 20:45:50'),
(3, 17, 10, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(4, 7, 10, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(5, 17, 10, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(6, 17, 10, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(7, 17, 10, 29, 10, 8, 10, 8, 10, 8, 10, 8, 10, 8, 9, 2, '2023-05-14 20:26:50'),
(11, 17, 10, 34, 10, 8, 10, 8, 10, 8, 10, 8, 10, 8, 9, 2, '2023-05-14 20:23:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongtro`
--

CREATE TABLE `phongtro` (
  `MaPhongTro` int(11) NOT NULL,
  `MaNhaTro` int(11) NOT NULL,
  `MoTaPhongTro` text NOT NULL,
  `GiaThue` text NOT NULL,
  `DienTich` text NOT NULL,
  `SoPhong` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phongtro`
--

INSERT INTO `phongtro` (`MaPhongTro`, `MaNhaTro`, `MoTaPhongTro`, `GiaThue`, `DienTich`, `SoPhong`) VALUES
(4, 24, 'có máy lạnh', '1350000', '40m2', 'B01.02'),
(5, 24, 'có máy nước nóng', '1400000', '40m2', 'B01.03'),
(6, 23, 'có nước nóng\r\ncó máy lạnh\r\nbao bếp ga\r\ncó  lò sưởi khắp phòng\r\nthuê ngay 12 tháng được tặng 2 tháng', '2100000', '50m2`', 'A05.03'),
(8, 29, '<p>Nh&agrave; tro nằm tr&ecirc;n đường&nbsp;45/32 Ho&agrave;ng Văn Chiểu. C&aacute;ch bệnh viện khoảng 2km, 10 ph&uacute;t đi bộ tới c&ocirc;ng vi&ecirc;n vui chơi.</p>\r\n<p><img src=\"https://s-housing.vn/wp-content/uploads/2022/09/thiet-ke-phong-tro-dep-7.jpg\" /></p>\r\n<p>H&igrave;nh ảnh 1: M&ocirc; tả ẩn dụ ph&ograve;ng trọ</p>\r\n<p>Ph&ograve;ng trọ c&oacute; g&aacute;c xếp 1 ph&ograve;ng bếp, 2 ph&ograve;ng ngủ, 1 ph&ograve;ng tắm , 1 ph&ograve;ng vệ sinh,&nbsp; c&oacute; 1 cửa sổ lớn để c&oacute; thể nh&igrave;n ra b&ecirc;n ngo&agrave;i</p>\r\n', '300000', '35m2', 'C02-22'),
(9, 29, '<p>Ph&ograve;ng trọ c&oacute; diện t&iacute;ch 25m2 gồm 1 g&aacute;c, 2 chỗ ngủ, một ph&ograve;ng vệ sinh,1 nh&agrave; bếp, 1 ph&ograve;ng kh&aacute;ch. Ngo&agrave;i ra ph&ograve;ng trọ c&oacute; 1 ban c&ocirc;ng ri&ecirc;ng rộng 3m2 kh&ocirc;ng được t&iacute;nh chung với diện t&iacute;ch ph&ograve;ng trọ, d&ugrave;ng dể phơi quần &aacute;o.</p>\r\n<p><img alt=\"\" src=\"https://taxitai.org/wp-content/uploads/2021/04/nha-tro22.jpg\" /></p>\r\n\r\n<p>H&igrave;nh ảnh 1: H&igrave;nh m&ocirc; t&agrave; ẩn dụ cho ph&ograve;ng trọ</p>\r\n\r\n<p>Ngo&agrave;i ra chủ nh&agrave; trọ c&ograve;n t&iacute;ch hợp cho mỗi ph&ograve;ng trọ c&oacute; t&iacute;ch hợp một m&aacute;y ph&aacute;t wifi cho người ở. Chi ph&iacute; gửi xe ở đ&acirc;y l&agrave; miễn ph&iacute; cho mỗi một ph&ograve;ng trọ 3 chiếc xe (ngoại trừ c&aacute;c loại xe cỡ lớn như xe hơi, xe tải,...).</p>\r\n\r\n<p>&nbsp;</p>', '1300000', '25m2', 'D22-07'),
(10, 28, '<p>Ph&ograve;ng n&agrave;y c&oacute; 1 g&aacute;c , 1 ph&ograve;ng ngủ 1 , 1 ph&ograve;ng vệ sinh, 1 ph&ograve;ng bếp. Khu vưc nh&agrave; trọ gần bệnh viện, gần đồn c&ocirc;ng an.</p>\r\n\r\n<p><img alt=\"\" src=\"https://img.meta.com.vn/Data/image/2020/11/24/mau-decor-trang-tri-phong-tro-sinh-vien-4.jpg\" style=\"height:458px; width:600px\" /></p>\r\n', '750000', '25m2', 'G22-026'),
(11, 29, '<p>Căn hộ n&agrave;y thuộc căn chung cư cao 70 tầng.</p>\r\n\r\n<p>Căn hộ n&aacute;y c&oacute; diện t&iacute;ch 50m2, bao gồm 2 ph&ograve;ng ngủ, 2 ph&ograve;ng vệ sinh, 1 ph&ograve;ng bếp, 1 ban c&ocirc;ng rộng 5m2. Phần ban c&ocirc;ng kh&ocirc;ng được t&iacute;nh v&agrave;o diện t&iacute;ch căn hộ.</p>\r\n\r\n<p><img alt=\"\" src=\"https://img.meta.com.vn/Data/image/2020/11/24/mau-decor-trang-tri-phong-tro-sinh-vien-4.jpg\" style=\"height:458px; width:600px\" /></p>\r\n', '1300000', '50m2', 'C59-22'),
(12, 30, '<p>Căn hộ thuộc t&ograve;a cao ốc ABCD.</p>\r\n\r\n<p>Căn họ n&agrave;y c&oacute; 3 ph&ograve;ng ngủ, 2 ph&ograve;ng vệ sinh, 1 ph&ograve;ng bếp, 1 ph&ograve;ng kh&aacute;ch, 1 ban c&ocirc;ng rộng 5m2 kh&ocirc;ng được t&iacute;nh v&agrave;o diện t&iacute;ch căn hộ.</p>\r\n\r\n<p><img alt=\"\" src=\"https://img.meta.com.vn/Data/image/2020/11/24/mau-decor-trang-tri-phong-tro-sinh-vien-4.jpg\" style=\"height:458px; width:600px\" /></p>\r\n', '1600000', '60m2', 'A07-01'),
(13, 30, '<p>Căn hộ thuộc t&ograve;a cao ốc ABCD.</p>\r\n\r\n<p>Căn họ n&agrave;y c&oacute; 3 ph&ograve;ng ngủ, 2 ph&ograve;ng vệ sinh, 1 ph&ograve;ng bếp, 1 ph&ograve;ng kh&aacute;ch, 1 ban c&ocirc;ng rộng 5m2 kh&ocirc;ng được t&iacute;nh v&agrave;o diện t&iacute;ch căn hộ.</p>\r\n\r\n<p><img alt=\"\" src=\"https://img.meta.com.vn/Data/image/2020/11/24/mau-decor-trang-tri-phong-tro-sinh-vien-4.jpg\" style=\"height:458px; width:600px\" /></p>\r\n', '2500000', '60m2', 'F93-03'),
(14, 30, '<p>Căn hộ thuộc t&ograve;a cao ốc ABCD.</p>\r\n\r\n<p>Căn họ n&agrave;y c&oacute; 3 ph&ograve;ng ngủ, 2 ph&ograve;ng vệ sinh, 1 ph&ograve;ng bếp, 1 ph&ograve;ng kh&aacute;ch, 1 ban c&ocirc;ng rộng 5m2 kh&ocirc;ng được t&iacute;nh v&agrave;o diện t&iacute;ch căn hộ.</p>\r\n\r\n<p><img alt=\"\" src=\"https://img.meta.com.vn/Data/image/2020/11/24/mau-decor-trang-tri-phong-tro-sinh-vien-4.jpg\" style=\"height:458px; width:600px\" /></p>\r\n', '2500000', '70m2', 'F97-03'),
(15, 30, '<p>Căn hộ thuộc t&ograve;a cao ốc ABCD.</p>\r\n\r\n<p>Căn họ n&agrave;y c&oacute; 3 ph&ograve;ng ngủ, 2 ph&ograve;ng vệ sinh, 1 ph&ograve;ng bếp, 1 ph&ograve;ng kh&aacute;ch, 1 ban c&ocirc;ng rộng 5m2 kh&ocirc;ng được t&iacute;nh v&agrave;o diện t&iacute;ch căn hộ.</p>\r\n\r\n<p><img alt=\"\" src=\"https://img.meta.com.vn/Data/image/2020/11/24/mau-decor-trang-tri-phong-tro-sinh-vien-4.jpg\" style=\"height:458px; width:600px\" /></p>\r\n', '2500000', '60m2', 'F57-03'),
(16, 30, '<p>Căn hộ thuộc t&ograve;a cao ốc ABCD.</p>\r\n\r\n<p>Căn họ n&agrave;y c&oacute; 3 ph&ograve;ng ngủ, 2 ph&ograve;ng vệ sinh, 1 ph&ograve;ng bếp, 1 ph&ograve;ng kh&aacute;ch, 1 ban c&ocirc;ng rộng 5m2 kh&ocirc;ng được t&iacute;nh v&agrave;o diện t&iacute;ch căn hộ.</p>\r\n\r\n<p><img alt=\"\" src=\"https://img.meta.com.vn/Data/image/2020/11/24/mau-decor-trang-tri-phong-tro-sinh-vien-4.jpg\" style=\"height:458px; width:600px\" /></p>\r\n', '2500000', '60m2', 'F37-03'),
(17, 30, '<p>Căn hộ thuộc t&ograve;a cao ốc ABCD.</p> <p>Căn họ n&agrave;y c&oacute; 3 ph&ograve;ng ngủ, 2 ph&ograve;ng vệ sinh, 1 ph&ograve;ng bếp, 1 ph&ograve;ng kh&aacute;ch, 1 ban c&ocirc;ng rộng 5m2 kh&ocirc;ng được t&iacute;nh v&agrave;o diện t&iacute;ch căn hộ.</p> <p><img alt=\"\" src=\"https://img.meta.com.vn/Data/image/2020/11/24/mau-decor-trang-tri-phong-tro-sinh-vien-4.jpg\" style=\"height:458px; width:600px\" /></p> ', '2500000', '80m2', 'B37-03'),
(18, 30, '<p>Căn hộ thuộc t&ograve;a cao ốc ABCD.</p> <p>Căn họ n&agrave;y c&oacute; 3 ph&ograve;ng ngủ, 2 ph&ograve;ng vệ sinh, 1 ph&ograve;ng bếp, 1 ph&ograve;ng kh&aacute;ch, 1 ban c&ocirc;ng rộng 5m2 kh&ocirc;ng được t&iacute;nh v&agrave;o diện t&iacute;ch căn hộ.</p> <p><img alt=\"\" src=\"https://img.meta.com.vn/Data/image/2020/11/24/mau-decor-trang-tri-phong-tro-sinh-vien-4.jpg\" style=\"height:458px; width:600px\" /></p> ', '2500000', '70m2', 'A37-03'),
(19, 30, '<p>Căn hộ thuộc t&ograve;a cao ốc ABCD.</p> <p>Căn họ n&agrave;y c&oacute; 3 ph&ograve;ng ngủ, 2 ph&ograve;ng vệ sinh, 1 ph&ograve;ng bếp, 1 ph&ograve;ng kh&aacute;ch, 1 ban c&ocirc;ng rộng 5m2 kh&ocirc;ng được t&iacute;nh v&agrave;o diện t&iacute;ch căn hộ.</p> <p><img alt=\"\" src=\"https://img.meta.com.vn/Data/image/2020/11/24/mau-decor-trang-tri-phong-tro-sinh-vien-4.jpg\" style=\"height:458px; width:600px\" /></p> ', '2500000', '90m2', 'C91-03'),
(20, 30, '<p>Căn hộ thuộc t&ograve;a cao ốc ABCD.</p> <p>Căn họ n&agrave;y c&oacute; 3 ph&ograve;ng ngủ, 2 ph&ograve;ng vệ sinh, 1 ph&ograve;ng bếp, 1 ph&ograve;ng kh&aacute;ch, 1 ban c&ocirc;ng rộng 5m2 kh&ocirc;ng được t&iacute;nh v&agrave;o diện t&iacute;ch căn hộ.</p> <p><img alt=\"\" src=\"https://img.meta.com.vn/Data/image/2020/11/24/mau-decor-trang-tri-phong-tro-sinh-vien-4.jpg\" style=\"height:458px; width:600px\" /></p> ', '2500000', '60m2', 'E31-09'),
(21, 30, '<p>Căn hộ thuộc t&ograve;a cao ốc ABCD.</p>\r\n\r\n<p>Căn họ n&agrave;y c&oacute; 3 ph&ograve;ng ngủ, 2 ph&ograve;ng vệ sinh, 1 ph&ograve;ng bếp, 1 ph&ograve;ng kh&aacute;ch, 1 ban c&ocirc;ng rộng 5m2 kh&ocirc;ng được t&iacute;nh v&agrave;o diện t&iacute;ch căn hộ.</p>\r\n\r\n<p><img alt=\"\" src=\"https://img.meta.com.vn/Data/image/2020/11/24/mau-decor-trang-tri-phong-tro-sinh-vien-4.jpg\" style=\"height:458px; width:600px\" /></p>\r\n', '2500000', '60m2', 'F37-03'),
(22, 29, '<p>Căn hộ n&agrave;y thuộc căn chung cư cao 70 tầng.</p>\r\n\r\n<p>Căn hộ n&aacute;y c&oacute; diện t&iacute;ch 50m2, bao gồm 2 ph&ograve;ng ngủ, 2 ph&ograve;ng vệ sinh, 1 ph&ograve;ng bếp, 1 ban c&ocirc;ng rộng 5m2. Phần ban c&ocirc;ng kh&ocirc;ng được t&iacute;nh v&agrave;o diện t&iacute;ch căn hộ.</p>\r\n\r\n<p><img alt=\"\" src=\"https://img.meta.com.vn/Data/image/2020/11/24/mau-decor-trang-tri-phong-tro-sinh-vien-4.jpg\" style=\"height:458px; width:600px\" /></p>\r\n', '1300000', '50m2', 'C59-22'),
(23, 30, '<p>Căn hộ thuộc t&ograve;a cao ốc ABCD.</p>\r\n\r\n<p>Căn họ n&agrave;y c&oacute; 3 ph&ograve;ng ngủ, 2 ph&ograve;ng vệ sinh, 1 ph&ograve;ng bếp, 1 ph&ograve;ng kh&aacute;ch, 1 ban c&ocirc;ng rộng 5m2 kh&ocirc;ng được t&iacute;nh v&agrave;o diện t&iacute;ch căn hộ.</p>\r\n\r\n<p><img alt=\"\" src=\"https://img.meta.com.vn/Data/image/2020/11/24/mau-decor-trang-tri-phong-tro-sinh-vien-4.jpg\" style=\"height:458px; width:600px\" /></p>\r\n', '1600000', '60m2', 'A07-01'),
(24, 30, '<p>Căn hộ thuộc t&ograve;a cao ốc ABCD.</p>\r\n\r\n<p>Căn họ n&agrave;y c&oacute; 3 ph&ograve;ng ngủ, 2 ph&ograve;ng vệ sinh, 1 ph&ograve;ng bếp, 1 ph&ograve;ng kh&aacute;ch, 1 ban c&ocirc;ng rộng 5m2 kh&ocirc;ng được t&iacute;nh v&agrave;o diện t&iacute;ch căn hộ.</p>\r\n\r\n<p><img alt=\"\" src=\"https://img.meta.com.vn/Data/image/2020/11/24/mau-decor-trang-tri-phong-tro-sinh-vien-4.jpg\" style=\"height:458px; width:600px\" /></p>\r\n', '2500000', '60m2', 'A37-03'),
(25, 30, '<p>Căn hộ thuộc t&ograve;a cao ốc ABCD.</p>\r\n\r\n<p>Căn họ n&agrave;y c&oacute; 3 ph&ograve;ng ngủ, 2 ph&ograve;ng vệ sinh, 1 ph&ograve;ng bếp, 1 ph&ograve;ng kh&aacute;ch, 1 ban c&ocirc;ng rộng 5m2 kh&ocirc;ng được t&iacute;nh v&agrave;o diện t&iacute;ch căn hộ.</p>\r\n\r\n<p><img alt=\"\" src=\"https://img.meta.com.vn/Data/image/2020/11/24/mau-decor-trang-tri-phong-tro-sinh-vien-4.jpg\" style=\"height:458px; width:600px\" /></p>\r\n', '1600000', '60m2', 'B07-01'),
(26, 30, '<p>Căn hộ thuộc t&ograve;a cao ốc ABCD.</p>\r\n\r\n<p>Căn họ n&agrave;y c&oacute; 3 ph&ograve;ng ngủ, 2 ph&ograve;ng vệ sinh, 1 ph&ograve;ng bếp, 1 ph&ograve;ng kh&aacute;ch, 1 ban c&ocirc;ng rộng 5m2 kh&ocirc;ng được t&iacute;nh v&agrave;o diện t&iacute;ch căn hộ.</p>\r\n\r\n<p><img alt=\"\" src=\"https://img.meta.com.vn/Data/image/2020/11/24/mau-decor-trang-tri-phong-tro-sinh-vien-4.jpg\" style=\"height:458px; width:600px\" /></p>\r\n', '1600000', '60m2', 'C07-01'),
(27, 29, '<p>Căn hộ n&agrave;y thuộc căn chung cư cao 70 tầng.</p>\r\n\r\n<p>Căn hộ n&aacute;y c&oacute; diện t&iacute;ch 50m2, bao gồm 2 ph&ograve;ng ngủ, 2 ph&ograve;ng vệ sinh, 1 ph&ograve;ng bếp, 1 ban c&ocirc;ng rộng 5m2. Phần ban c&ocirc;ng kh&ocirc;ng được t&iacute;nh v&agrave;o diện t&iacute;ch căn hộ.</p>\r\n\r\n<p><img alt=\"\" src=\"https://img.meta.com.vn/Data/image/2020/11/24/mau-decor-trang-tri-phong-tro-sinh-vien-4.jpg\" style=\"height:458px; width:600px\" /></p>\r\n', '1300000', '50m2', 'C69-22'),
(28, 29, '<p>Nh&agrave; tro nằm tr&ecirc;n đường&nbsp;45/32 Ho&agrave;ng Văn Chiểu. C&aacute;ch bệnh viện khoảng 2km, 10 ph&uacute;t đi bộ tới c&ocirc;ng vi&ecirc;n vui chơi.</p>\r\n<p><img src=\"https://s-housing.vn/wp-content/uploads/2022/09/thiet-ke-phong-tro-dep-7.jpg\" /></p>\r\n<p>H&igrave;nh ảnh 1: M&ocirc; tả ẩn dụ ph&ograve;ng trọ</p>\r\n<p>Ph&ograve;ng trọ c&oacute; g&aacute;c xếp 1 ph&ograve;ng bếp, 2 ph&ograve;ng ngủ, 1 ph&ograve;ng tắm , 1 ph&ograve;ng vệ sinh,&nbsp; c&oacute; 1 cửa sổ lớn để c&oacute; thể nh&igrave;n ra b&ecirc;n ngo&agrave;i</p>\r\n', '300000', '35m2', 'C42-22'),
(29, 29, '<p>Nh&agrave; tro nằm tr&ecirc;n đường&nbsp;45/32 Ho&agrave;ng Văn Chiểu. C&aacute;ch bệnh viện khoảng 2km, 10 ph&uacute;t đi bộ tới c&ocirc;ng vi&ecirc;n vui chơi.</p>\r\n<p><img src=\"https://s-housing.vn/wp-content/uploads/2022/09/thiet-ke-phong-tro-dep-7.jpg\" /></p>\r\n<p>H&igrave;nh ảnh 1: M&ocirc; tả ẩn dụ ph&ograve;ng trọ</p>\r\n<p>Ph&ograve;ng trọ c&oacute; g&aacute;c xếp 1 ph&ograve;ng bếp, 2 ph&ograve;ng ngủ, 1 ph&ograve;ng tắm , 1 ph&ograve;ng vệ sinh,&nbsp; c&oacute; 1 cửa sổ lớn để c&oacute; thể nh&igrave;n ra b&ecirc;n ngo&agrave;i</p>\r\n', '300000', '35m2', 'E42-11'),
(30, 29, '<p>Nh&agrave; tro nằm tr&ecirc;n đường&nbsp;45/32 Ho&agrave;ng Văn Chiểu. C&aacute;ch bệnh viện khoảng 2km, 10 ph&uacute;t đi bộ tới c&ocirc;ng vi&ecirc;n vui chơi.</p>\r\n<p><img src=\"https://s-housing.vn/wp-content/uploads/2022/09/thiet-ke-phong-tro-dep-7.jpg\" /></p>\r\n<p>H&igrave;nh ảnh 1: M&ocirc; tả ẩn dụ ph&ograve;ng trọ</p>\r\n<p>Ph&ograve;ng trọ c&oacute; g&aacute;c xếp 1 ph&ograve;ng bếp, 2 ph&ograve;ng ngủ, 1 ph&ograve;ng tắm , 1 ph&ograve;ng vệ sinh,&nbsp; c&oacute; 1 cửa sổ lớn để c&oacute; thể nh&igrave;n ra b&ecirc;n ngo&agrave;i</p>\r\n', '300000', '35m2', 'E12-22'),
(31, 29, '<p>Nh&agrave; tro nằm tr&ecirc;n đường&nbsp;45/32 Ho&agrave;ng Văn Chiểu. C&aacute;ch bệnh viện khoảng 2km, 10 ph&uacute;t đi bộ tới c&ocirc;ng vi&ecirc;n vui chơi.</p>\r\n<p><img src=\"https://s-housing.vn/wp-content/uploads/2022/09/thiet-ke-phong-tro-dep-7.jpg\" /></p>\r\n<p>H&igrave;nh ảnh 1: M&ocirc; tả ẩn dụ ph&ograve;ng trọ</p>\r\n<p>Ph&ograve;ng trọ c&oacute; g&aacute;c xếp 1 ph&ograve;ng bếp, 2 ph&ograve;ng ngủ, 1 ph&ograve;ng tắm , 1 ph&ograve;ng vệ sinh,&nbsp; c&oacute; 1 cửa sổ lớn để c&oacute; thể nh&igrave;n ra b&ecirc;n ngo&agrave;i</p>\r\n', '300000', '35m2', 'D12-11'),
(32, 24, 'có máy lạnh', '1350000', '40m2', 'C01.02'),
(33, 29, '<p>Nh&agrave; tro nằm tr&ecirc;n đường&nbsp;45/32 Ho&agrave;ng Văn Chiểu. C&aacute;ch bệnh viện khoảng 2km, 10 ph&uacute;t đi bộ tới c&ocirc;ng vi&ecirc;n vui chơi.</p>\r\n<p><img src=\"https://s-housing.vn/wp-content/uploads/2022/09/thiet-ke-phong-tro-dep-7.jpg\" /></p>\r\n<p>H&igrave;nh ảnh 1: M&ocirc; tả ẩn dụ ph&ograve;ng trọ</p>\r\n<p>Ph&ograve;ng trọ c&oacute; g&aacute;c xếp 1 ph&ograve;ng bếp, 2 ph&ograve;ng ngủ, 1 ph&ograve;ng tắm , 1 ph&ograve;ng vệ sinh,&nbsp; c&oacute; 1 cửa sổ lớn để c&oacute; thể nh&igrave;n ra b&ecirc;n ngo&agrave;i</p>\r\n', '300000', '35m2', 'D62-11'),
(34, 29, '<p>Căn hộ n&agrave;y thuộc căn chung cư cao 70 tầng.</p>\r\n\r\n<p>Căn hộ n&aacute;y c&oacute; diện t&iacute;ch 50m2, bao gồm 2 ph&ograve;ng ngủ, 2 ph&ograve;ng vệ sinh, 1 ph&ograve;ng bếp, 1 ban c&ocirc;ng rộng 5m2. Phần ban c&ocirc;ng kh&ocirc;ng được t&iacute;nh v&agrave;o diện t&iacute;ch căn hộ.</p>\r\n\r\n<p><img alt=\"\" src=\"https://img.meta.com.vn/Data/image/2020/11/24/mau-decor-trang-tri-phong-tro-sinh-vien-4.jpg\" style=\"height:458px; width:600px\" /></p>\r\n', '1300000', '50m2', 'C79-31'),
(35, 24, 'có máy lạnh', '1350000', '40m2', 'A21.02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuongthucthanhtoan`
--

CREATE TABLE `phuongthucthanhtoan` (
  `MaPhuongThuc` int(11) NOT NULL,
  `tenphuongthuc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phuongthucthanhtoan`
--

INSERT INTO `phuongthucthanhtoan` (`MaPhuongThuc`, `tenphuongthuc`) VALUES
(1, 'Tiền mặt'),
(2, 'Chuyển khoản ngân hàng'),
(3, 'Thẻ tín dụng/thẻ ghi nợ'),
(4, 'Ví điện tử');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL,
  `MaPhongTro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `picture`
--

INSERT INTO `picture` (`id`, `url`, `MaPhongTro`) VALUES
(8, 'https://storage.googleapis.com/project-motel.appspot.com/images/644c83bb76709.png?GoogleAccessId=firebase-adminsdk-gbzxz%40project-motel.iam.gserviceaccount.com&Expires=1685328060&Signature=AfuzY%2Fpu8TwJhhAC9AOrq6erOqad7CJIBoBb8bhdMpl4pT3hDaPjYpHl6aoxbZBoqvA9hFr5I2B3XdR2TuRWVgdGPDC%2BJlpP%2FG%2FQQkuqoQAS3lCbHcEZcXDis17M2Mpoq7owXQh7TzVMJ%2Fzo3sn0nBr8qrCif98hCuuHIpDYvic35nk54fd%2Fl2aKBusiUa81l4Ib0GScuZzEERFLGvKn%2FRwnhnaEXmRnxA8RsV9XGMgRotMm2kn3H9q8MA2%2Fwsp2uubZZd9F%2BgRXi7hgO1D6ekNj9Ejrde6gqbNUqXw49Utqf3%2Fl8F1wKkm4yDUFLAR2H5IG39Q5O%2FI0uUlJXsJKnw%3D%3D&generation=1682736061137012', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `MaReviews` int(11) NOT NULL,
  `MaPhongTro` int(11) DEFAULT NULL,
  `MaAccount` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `submit_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`MaReviews`, `MaPhongTro`, `MaAccount`, `content`, `submit_date`) VALUES
(15, 8, 81, 'Phòng này khá ổn', '2023-05-11 07:31:48');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`MaAccount`);

--
-- Chỉ mục cho bảng `chutro`
--
ALTER TABLE `chutro`
  ADD PRIMARY KEY (`MaChuTro`),
  ADD KEY `MaAccount` (`MaAccount`);

--
-- Chỉ mục cho bảng `hopdongthue`
--
ALTER TABLE `hopdongthue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaChuTro` (`MaChuTro`),
  ADD KEY `MaKhachTro` (`MaKhachTro`),
  ADD KEY `MaPhongTro` (`MaPhongTro`),
  ADD KEY `MaPhuongThuc` (`MaPhuongThuc`);

--
-- Chỉ mục cho bảng `khachtro`
--
ALTER TABLE `khachtro`
  ADD PRIMARY KEY (`MaKhachTro`),
  ADD KEY `MaAccount` (`MaAccount`);

--
-- Chỉ mục cho bảng `nhatro`
--
ALTER TABLE `nhatro`
  ADD PRIMARY KEY (`MaNhaTro`),
  ADD KEY `MaChuTro` (`MaChuTro`);

--
-- Chỉ mục cho bảng `phieudanhgiakhachtro`
--
ALTER TABLE `phieudanhgiakhachtro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaChuTro` (`MaChuTro`),
  ADD KEY `MaKhachTro` (`MaKhachTro`),
  ADD KEY `MaPhongTro` (`MaPhongTro`);

--
-- Chỉ mục cho bảng `phieudanhgiaphongtro`
--
ALTER TABLE `phieudanhgiaphongtro`
  ADD PRIMARY KEY (`IdEval`),
  ADD KEY `MaChuTro` (`MaChuTro`),
  ADD KEY `MaKhachTro` (`MaKhachTro`),
  ADD KEY `MaPhongTro` (`MaPhongTro`);

--
-- Chỉ mục cho bảng `phongtro`
--
ALTER TABLE `phongtro`
  ADD PRIMARY KEY (`MaPhongTro`),
  ADD KEY `MaNhaTro` (`MaNhaTro`);

--
-- Chỉ mục cho bảng `phuongthucthanhtoan`
--
ALTER TABLE `phuongthucthanhtoan`
  ADD PRIMARY KEY (`MaPhuongThuc`);

--
-- Chỉ mục cho bảng `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaPhongTro` (`MaPhongTro`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`MaReviews`),
  ADD KEY `MaAccount` (`MaAccount`),
  ADD KEY `MaPhongTro` (`MaPhongTro`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `MaAccount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `chutro`
--
ALTER TABLE `chutro`
  MODIFY `MaChuTro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `hopdongthue`
--
ALTER TABLE `hopdongthue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `khachtro`
--
ALTER TABLE `khachtro`
  MODIFY `MaKhachTro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `nhatro`
--
ALTER TABLE `nhatro`
  MODIFY `MaNhaTro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `phieudanhgiakhachtro`
--
ALTER TABLE `phieudanhgiakhachtro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `phieudanhgiaphongtro`
--
ALTER TABLE `phieudanhgiaphongtro`
  MODIFY `IdEval` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `phongtro`
--
ALTER TABLE `phongtro`
  MODIFY `MaPhongTro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `phuongthucthanhtoan`
--
ALTER TABLE `phuongthucthanhtoan`
  MODIFY `MaPhuongThuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `MaReviews` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chutro`
--
ALTER TABLE `chutro`
  ADD CONSTRAINT `chutro_ibfk_1` FOREIGN KEY (`MaAccount`) REFERENCES `account` (`MaAccount`);

--
-- Các ràng buộc cho bảng `hopdongthue`
--
ALTER TABLE `hopdongthue`
  ADD CONSTRAINT `hopdongthue_ibfk_1` FOREIGN KEY (`MaChuTro`) REFERENCES `chutro` (`MaChuTro`),
  ADD CONSTRAINT `hopdongthue_ibfk_2` FOREIGN KEY (`MaKhachTro`) REFERENCES `khachtro` (`MaKhachTro`),
  ADD CONSTRAINT `hopdongthue_ibfk_3` FOREIGN KEY (`MaPhongTro`) REFERENCES `phongtro` (`MaPhongTro`),
  ADD CONSTRAINT `hopdongthue_ibfk_4` FOREIGN KEY (`MaPhuongThuc`) REFERENCES `phuongthucthanhtoan` (`MaPhuongThuc`);

--
-- Các ràng buộc cho bảng `khachtro`
--
ALTER TABLE `khachtro`
  ADD CONSTRAINT `khachtro_ibfk_1` FOREIGN KEY (`MaAccount`) REFERENCES `account` (`MaAccount`);

--
-- Các ràng buộc cho bảng `nhatro`
--
ALTER TABLE `nhatro`
  ADD CONSTRAINT `nhatro_ibfk_1` FOREIGN KEY (`MaChuTro`) REFERENCES `chutro` (`MaChuTro`);

--
-- Các ràng buộc cho bảng `phieudanhgiakhachtro`
--
ALTER TABLE `phieudanhgiakhachtro`
  ADD CONSTRAINT `phieudanhgiakhachtro_ibfk_1` FOREIGN KEY (`MaChuTro`) REFERENCES `chutro` (`MaChuTro`),
  ADD CONSTRAINT `phieudanhgiakhachtro_ibfk_2` FOREIGN KEY (`MaKhachTro`) REFERENCES `khachtro` (`MaKhachTro`),
  ADD CONSTRAINT `phieudanhgiakhachtro_ibfk_3` FOREIGN KEY (`MaPhongTro`) REFERENCES `phongtro` (`MaPhongTro`);

--
-- Các ràng buộc cho bảng `phieudanhgiaphongtro`
--
ALTER TABLE `phieudanhgiaphongtro`
  ADD CONSTRAINT `phieudanhgiaphongtro_ibfk_1` FOREIGN KEY (`MaChuTro`) REFERENCES `chutro` (`MaChuTro`),
  ADD CONSTRAINT `phieudanhgiaphongtro_ibfk_2` FOREIGN KEY (`MaKhachTro`) REFERENCES `khachtro` (`MaKhachTro`),
  ADD CONSTRAINT `phieudanhgiaphongtro_ibfk_3` FOREIGN KEY (`MaPhongTro`) REFERENCES `phongtro` (`MaPhongTro`);

--
-- Các ràng buộc cho bảng `phongtro`
--
ALTER TABLE `phongtro`
  ADD CONSTRAINT `phongtro_ibfk_1` FOREIGN KEY (`MaNhaTro`) REFERENCES `nhatro` (`MaNhaTro`);

--
-- Các ràng buộc cho bảng `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `picture_ibfk_1` FOREIGN KEY (`MaPhongTro`) REFERENCES `phongtro` (`MaPhongTro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`MaAccount`) REFERENCES `account` (`MaAccount`) ON DELETE SET NULL,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`MaPhongTro`) REFERENCES `phongtro` (`MaPhongTro`) ON DELETE SET NULL;

DELIMITER $$
--
-- Sự kiện
--
CREATE DEFINER=`root`@`localhost` EVENT `delete_unverified_accounts_event` ON SCHEDULE EVERY 1 MINUTE STARTS '2023-04-04 18:33:32' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    DELETE FROM `account`
    WHERE `verify` = 0 AND TIMEDIFF(NOW(), `dateCreate`) > '00:15:00';
  END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
