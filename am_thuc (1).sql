-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2021 at 08:20 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `am_thuc`
--

-- --------------------------------------------------------

--
-- Table structure for table `bang_giam_gia`
--

CREATE TABLE `bang_giam_gia` (
  `id_giam_gia` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `gia_giam` float NOT NULL,
  `ngay_het_han` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bang_giam_gia`
--

INSERT INTO `bang_giam_gia` (`id_giam_gia`, `id_san_pham`, `gia_giam`, `ngay_het_han`) VALUES
(5, 20, 10000, '2021-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `bang_san_pham`
--

CREATE TABLE `bang_san_pham` (
  `id_san_pham` int(11) NOT NULL,
  `ten_san_pham` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gia_san_pham` float NOT NULL,
  `hinh_anh` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `luot_mua_hang` int(11) NOT NULL,
  `mo_ta` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hot_san_pham` int(11) NOT NULL,
  `id_danh_muc` int(11) NOT NULL,
  `diem_danh_gia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bang_san_pham`
--

INSERT INTO `bang_san_pham` (`id_san_pham`, `ten_san_pham`, `gia_san_pham`, `hinh_anh`, `luot_mua_hang`, `mo_ta`, `hot_san_pham`, `id_danh_muc`, `diem_danh_gia`) VALUES
(17, 'PORK CHOPS YUM-YUM', 45000, 'lBDNCe9SnyGbB0iOyEVG_pork-chops-yum-yum-5930.jpg', 0, 'dsaasddas', 0, 7, 0),
(18, 'Hủ Tiếu Gõ - Ngã Tư Gadsad', 25000, 'foody-mobile-foody-hu-tieu-go-nga.jpg', 0, 'dsadad', 1, 7, 0),
(19, 'Kem Bơ - Trái Cây Tô 251 - Đặng Nguyên Cẩn', 15000, 'foody-upload-api-foody-mobile-foody-upload-api-foo-210303181659.jpg', 0, 'dsadass', 0, 9, 0),
(20, 'asdasdasdsaadsd', 446547000, 'foody-mobile-foody-hu-tieu-go-nga.jpg', 0, '<p><strong>dsaadsdassdsdadssadadsddadasdsdasdsasdasdsadsaadsdsadsa</strong></p>\r\n', 0, 0, 0),
(21, 'Hủ Tiếu Gõ - Ngã Tư Ga', 1000000, 'quan-tra-sua-o-Phu-Quoc4-min.jpg', 0, '<p>dsaadadsadsadsadsdsadsa</p>\r\n', 1, 9, 0),
(22, 'Rules Of Tea - Trà Sữa Đế Vương - Nguyễn Văn Cừ', 55000, 'PHIN-SUA-DA.png', 0, '<p>Rules Of Tea - Tr&agrave; Sữa Đế Vương - Nguyễn Văn Cừ</p>\r\n', 1, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_binh_luan` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `id_khach_hang` int(11) NOT NULL,
  `text_bl` text NOT NULL,
  `bl_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `binh_luan`
--

INSERT INTO `binh_luan` (`ma_binh_luan`, `id_san_pham`, `id_khach_hang`, `text_bl`, `bl_date`, `status`) VALUES
(1, 18, 5, 'dsadasasdsada', '2021-12-03', 0),
(2, 18, 5, 'dasdas', '2021-12-03', 0),
(7, 19, 12, 'dsadasdasdas', '2021-12-05', 1),
(8, 19, 5, 'dada', '2021-12-09', 1),
(9, 18, 15, 'dsadasasd', '2021-12-12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_uu_dai`
--

CREATE TABLE `chi_tiet_uu_dai` (
  `id_chitietuudai` int(11) NOT NULL,
  `ma_uu_dai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_san_pham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chi_tiet_uu_dai`
--

INSERT INTO `chi_tiet_uu_dai` (`id_chitietuudai`, `ma_uu_dai`, `id_san_pham`) VALUES
(268, 'PC01552S', 17),
(270, 'PC01552S', 20),
(271, 'PC01552S', 21),
(272, 'PC01552S', 18),
(273, 'PC01552S', 19),
(274, 'PC01552S', 20),
(275, 'SVCK11', 17),
(276, 'SVCK11', 20),
(285, 'dsadsad', 19);

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id_danh_muc` int(11) NOT NULL,
  `ten_danh_muc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`id_danh_muc`, `ten_danh_muc`) VALUES
(7, 'Thức ăn'),
(9, 'Đồ uống');

-- --------------------------------------------------------

--
-- Table structure for table `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id_khach_hang` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gio_hang`
--

INSERT INTO `gio_hang` (`id_khach_hang`, `id_san_pham`, `so_luong`) VALUES
(5, 18, 1),
(12, 17, 1),
(13, 18, 3),
(15, 17, 1),
(15, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `id_hoa_don` int(11) NOT NULL,
  `madonhang` int(11) NOT NULL,
  `id_khach_hang` int(11) NOT NULL,
  `thanh_tien` float NOT NULL,
  `ma_uu_dai` varchar(50) NOT NULL,
  `tong_tien` float NOT NULL,
  `hinh_thuc_thanh_toan` int(11) NOT NULL,
  `ghi_chu` text NOT NULL,
  `ngay_mua` date NOT NULL,
  `trang_thai_hoa_hang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don_chi_tiet`
--

CREATE TABLE `hoa_don_chi_tiet` (
  `id_hoa_don_chi_tiet` int(11) NOT NULL,
  `madonhang` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `so_luong_sp` int(11) NOT NULL,
  `thanh_tien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoa_don_chi_tiet`
--

INSERT INTO `hoa_don_chi_tiet` (`id_hoa_don_chi_tiet`, `madonhang`, `id_san_pham`, `so_luong_sp`, `thanh_tien`) VALUES
(1, 4299, 17, 11, 495000),
(2, 4299, 18, 85, 2125000),
(3, 4299, 19, 18, 270000),
(4, 3787, 17, 11, 495000),
(5, 3787, 18, 85, 2125000),
(6, 3787, 19, 18, 270000);

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id_khach_hang` int(11) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `hinh` text NOT NULL,
  `gioi_tinh` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `dia_chi` text NOT NULL,
  `vai_tro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`id_khach_hang`, `ho_ten`, `ten`, `pass`, `hinh`, `gioi_tinh`, `email`, `sdt`, `dia_chi`, `vai_tro`) VALUES
(2, 'sadsadasdas', '', 'dasdadas', '', 0, 'dasdas', 'dasdas', 'dsadas', 1),
(3, 'dsadasads', '', '123123', '', 0, 'dasdas', 'dasds', 'dasdas', 0),
(5, 'Nguyễn Minh Triển', 'Triển', '01214417561', '247692343_1563171030711655_7262436701930799068_n.jpg', 0, 'triennmpc01552@fpt.edu.vn', '0869790865', 'Kiên giang', 1),
(12, 'Nguyễn minh triển', 'Triển', '01214417561', 'foody-mobile-foody-hu-tieu-go-nga.jpg', 0, 'anhtrienpq123@Gmail.com', '0332033402', 'Kiên giang', 0),
(15, 'dsads', 'assaddsa', '01214417561', '', 0, 'dasdas@gmail.com', 'dsadasds', 'dsadasdsa', 0),
(37, 'dsadas', 'dsadasadsdsadasdsadsasaddsasaddsa', '8225bed05d366f62c9b47c81a4b0c1de', '', 0, 'triennmpc01552@fpt.edu.vndsa', '2315616546', 'tobinh', 0),
(38, 'dsadas', 'dsadasadsdsadasdsadsasaddsasaddsa', '8225bed05d366f62c9b47c81a4b0c1de', '', 0, 'triennmpc01552@fpt.edu.vnsda', '2315616546', 'tobinh', 0),
(39, 'dsadas', 'dsadasadsdsadasdsadsasaddsasaddsa', '8225bed05d366f62c9b47c81a4b0c1de', '', 0, 'triennmpc01552@fpt.edu.vnsda', '2315616546', 'tobinh', 0),
(40, 'dsadas', 'dsadasadsdsadasdsadsasaddsasaddsa', '8225bed05d366f62c9b47c81a4b0c1de', '', 0, 'dsadasdsadsasad@gmail.com', '2315616546', 'tobinh', 0),
(41, 'dsadas', 'dsadasadsdsadasdsadsasaddsasaddsa', '8225bed05d366f62c9b47c81a4b0c1de', '', 0, 'triennmpc01552@fpt.edu.vnsssss', '0123456789', 'tobinh', 0),
(42, 'dsadas', 'dsadasadsdsadasdsadsasaddsasaddsa', '25f9e794323b453885f5181f1b624d0b', '', 0, 'triennmpc01552@fpt.edu.vnsssss', '1231564894', 'tobinh', 0),
(43, 'dsadas', 'dsadasadsdsadasdsadsasaddsasaddsa', '25f9e794323b453885f5181f1b624d0b', '', 0, 'trienpqpq22@gmail.com', '5415465468', 'tobinh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `thongke`
--

CREATE TABLE `thongke` (
  `id_thongke` int(11) NOT NULL,
  `ngaydat` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `donhang` int(11) NOT NULL,
  `doanhthu` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thongke`
--

INSERT INTO `thongke` (`id_thongke`, `ngaydat`, `donhang`, `doanhthu`, `soluong`) VALUES
(1, '2021-12-10', 50, '151561651', 100),
(2, '2021-12-16', 31, '119261112', 107),
(3, '2021-12-15', 15, '111111112', 100),
(4, '2021-12-22', 15, '111111112', 80),
(5, '2021-12-06', 150, '111111112', 10),
(6, '2021-12-04', 640, '900000000', 400),
(7, '2021-12-08', 60, '8000000', 40),
(8, '2021-09-09', 4006, '15156165185', 999);

-- --------------------------------------------------------

--
-- Table structure for table `uu_dai_san_pham`
--

CREATE TABLE `uu_dai_san_pham` (
  `ma_uu_dai` varchar(50) NOT NULL,
  `gia_uu_dai` float NOT NULL,
  `ngay_het_han` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uu_dai_san_pham`
--

INSERT INTO `uu_dai_san_pham` (`ma_uu_dai`, `gia_uu_dai`, `ngay_het_han`) VALUES
('dsadsad', 123122, '2021-12-16'),
('PC01552S', 15000, '2021-12-30'),
('SVCK11', 20000, '2021-12-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bang_giam_gia`
--
ALTER TABLE `bang_giam_gia`
  ADD PRIMARY KEY (`id_giam_gia`),
  ADD KEY `id_san_pham` (`id_san_pham`);

--
-- Indexes for table `bang_san_pham`
--
ALTER TABLE `bang_san_pham`
  ADD PRIMARY KEY (`id_san_pham`);

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_binh_luan`);

--
-- Indexes for table `chi_tiet_uu_dai`
--
ALTER TABLE `chi_tiet_uu_dai`
  ADD PRIMARY KEY (`id_chitietuudai`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id_danh_muc`);

--
-- Indexes for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id_khach_hang`,`id_san_pham`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`id_hoa_don`);

--
-- Indexes for table `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD PRIMARY KEY (`id_hoa_don_chi_tiet`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id_khach_hang`);

--
-- Indexes for table `thongke`
--
ALTER TABLE `thongke`
  ADD PRIMARY KEY (`id_thongke`);

--
-- Indexes for table `uu_dai_san_pham`
--
ALTER TABLE `uu_dai_san_pham`
  ADD PRIMARY KEY (`ma_uu_dai`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bang_giam_gia`
--
ALTER TABLE `bang_giam_gia`
  MODIFY `id_giam_gia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bang_san_pham`
--
ALTER TABLE `bang_san_pham`
  MODIFY `id_san_pham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_binh_luan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chi_tiet_uu_dai`
--
ALTER TABLE `chi_tiet_uu_dai`
  MODIFY `id_chitietuudai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id_danh_muc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `id_hoa_don` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  MODIFY `id_hoa_don_chi_tiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id_khach_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `thongke`
--
ALTER TABLE `thongke`
  MODIFY `id_thongke` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bang_giam_gia`
--
ALTER TABLE `bang_giam_gia`
  ADD CONSTRAINT `bang_giam_gia_ibfk_1` FOREIGN KEY (`id_san_pham`) REFERENCES `bang_san_pham` (`id_san_pham`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
