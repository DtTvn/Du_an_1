-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 06, 2024 at 06:35 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `OrderDetailID` int NOT NULL COMMENT 'Mã chi tiết đơn hàng',
  `OrderID` int NOT NULL COMMENT 'Mã đơn hàng',
  `ProductID` int NOT NULL COMMENT 'Mã sản phẩm',
  `Quantity` int NOT NULL COMMENT 'Số lượng sản phẩm ',
  `UnitPrice` decimal(50,0) NOT NULL COMMENT 'Giá tại thời điểm bán',
  `TotalPrice` decimal(50,0) NOT NULL COMMENT 'Tổng giá cho sản phẩm trong đơn hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmucsanpham`
--

CREATE TABLE `danhmucsanpham` (
  `CategoryID` int NOT NULL COMMENT 'Mã danh mục',
  `CategoryName` int NOT NULL COMMENT 'Tên danh mục',
  `Description` varchar(225) DEFAULT NULL COMMENT 'Mô tả danh mục'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `OrderID` int NOT NULL COMMENT 'Mã đơn hàng',
  `CustomerID` int NOT NULL COMMENT 'Mã khách hàng',
  `OrdelDate` date NOT NULL COMMENT 'Ngày đặt hàng',
  `TotalAmount` decimal(50,0) NOT NULL COMMENT 'Tổng số tiền đơn hàng',
  `Starus` int NOT NULL DEFAULT '1' COMMENT 'Trạng thái đơn hàng',
  `PaymentMethod` varchar(225) NOT NULL DEFAULT '1' COMMENT 'Phương thức thanh toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `CartID` int NOT NULL COMMENT 'Mã giỏ hàng',
  `CustomerID` int NOT NULL COMMENT 'Mã khách hàng',
  `ProductID` int NOT NULL COMMENT 'Mã sản phẩm',
  `Quantity` int NOT NULL COMMENT 'Số lượng sản phẩm trong giỏ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hinhanhsanpham`
--

CREATE TABLE `hinhanhsanpham` (
  `ImageID` int NOT NULL COMMENT 'Mã hình ảnh',
  `ProductID` int NOT NULL COMMENT 'Mã sản phẩm',
  `ImageURL` varchar(225) DEFAULT NULL COMMENT 'Đường dẫn hình ảnh',
  `AltText` varchar(225) DEFAULT NULL COMMENT 'Mô tả hình ảnh'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `CustomerID` int NOT NULL COMMENT 'Mã khách hàng',
  `FullName` varchar(100) NOT NULL COMMENT 'Họ tên khách hàng',
  `Email` varchar(225) NOT NULL COMMENT 'Địa chỉ email',
  `Password` text NOT NULL COMMENT 'Mật khẩu',
  `Phone` int NOT NULL COMMENT 'Số điện thoại',
  `Address` varchar(225) NOT NULL COMMENT 'Địa chỉ khách hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `ProductID` int NOT NULL COMMENT 'Mã sản phẩm',
  `ProductName` varchar(225) NOT NULL COMMENT 'Tên sản phẩm',
  `CategoryID` int NOT NULL COMMENT 'Mã danh mục',
  `Price` decimal(50,0) NOT NULL COMMENT 'Giá sản phẩm',
  `Stock` int DEFAULT NULL COMMENT 'Số lượng tồn kho ',
  `Description` text COMMENT 'Mô tả sản phẩm',
  `Material` text COMMENT 'Chất liệu',
  `Color` text COMMENT 'Màu sắc',
  `Weight` int DEFAULT NULL COMMENT 'Trọng lượng',
  `Dimensions` int DEFAULT NULL COMMENT 'Kích thước sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`OrderDetailID`),
  ADD KEY `chitietdonhang_donhang` (`OrderID`),
  ADD KEY `chitietdonhang_sanpham` (`ProductID`);

--
-- Indexes for table `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `donhang_khachang` (`CustomerID`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `giohang_sanpham` (`ProductID`),
  ADD KEY `giohang_khachhang` (`CustomerID`);

--
-- Indexes for table `hinhanhsanpham`
--
ALTER TABLE `hinhanhsanpham`
  ADD PRIMARY KEY (`ImageID`),
  ADD KEY `hinhanhsanpham_sanpham` (`ProductID`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `sanpham_danhmucsanpham` (`CategoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `OrderDetailID` int NOT NULL AUTO_INCREMENT COMMENT 'Mã chi tiết đơn hàng';

--
-- AUTO_INCREMENT for table `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  MODIFY `CategoryID` int NOT NULL AUTO_INCREMENT COMMENT 'Mã danh mục';

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `OrderID` int NOT NULL AUTO_INCREMENT COMMENT 'Mã đơn hàng';

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `CartID` int NOT NULL AUTO_INCREMENT COMMENT 'Mã giỏ hàng';

--
-- AUTO_INCREMENT for table `hinhanhsanpham`
--
ALTER TABLE `hinhanhsanpham`
  MODIFY `ImageID` int NOT NULL AUTO_INCREMENT COMMENT 'Mã hình ảnh';

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `CustomerID` int NOT NULL AUTO_INCREMENT COMMENT 'Mã khách hàng';

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ProductID` int NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_donhang` FOREIGN KEY (`OrderID`) REFERENCES `donhang` (`OrderID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `chitietdonhang_sanpham` FOREIGN KEY (`ProductID`) REFERENCES `sanpham` (`ProductID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_khachang` FOREIGN KEY (`CustomerID`) REFERENCES `khachhang` (`CustomerID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_khachhang` FOREIGN KEY (`CustomerID`) REFERENCES `khachhang` (`CustomerID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `giohang_sanpham` FOREIGN KEY (`ProductID`) REFERENCES `sanpham` (`ProductID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `hinhanhsanpham`
--
ALTER TABLE `hinhanhsanpham`
  ADD CONSTRAINT `hinhanhsanpham_sanpham` FOREIGN KEY (`ProductID`) REFERENCES `sanpham` (`ProductID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_danhmucsanpham` FOREIGN KEY (`CategoryID`) REFERENCES `danhmucsanpham` (`CategoryID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
