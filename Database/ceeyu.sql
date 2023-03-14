-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 14, 2023 lúc 05:37 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ceeyu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdh`
--

CREATE TABLE `chitietdh` (
  `idchitiet` int(255) NOT NULL,
  `tensp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `danhmuc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idsp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdh`
--

INSERT INTO `chitietdh` (`idchitiet`, `tensp`, `danhmuc`, `gia`, `soluong`, `id`, `idsp`) VALUES
(26, 'Cà Phê Phin Giấy Trung Nguyên Legend Vietnamese Blend', 'Cà phê Phin Giấy', '105.000', '1', '18', '107'),
(27, 'Cà Phê Hạt Mộc Success 8 Trung Nguyên 340g', 'Cà phê Hạt', '310.000', '1', '18', '115'),
(28, 'Cafe hạt Trung Nguyên Culi Robusta thượng hạng ( hạt số 4)', 'Cà phê Hạt', '840.000', '1', '18', '116'),
(29, 'Cà Phê Phin Giấy Trung Nguyên Legend Vietnamese Blend', 'Cà phê Phin Giấy', '105.000', '1', '19', '107'),
(30, 'Trà Lipton Ice hương Đào', 'Trà', '34.000', '1', '19', '119'),
(31, 'Cà Phê Phin Giấy Trung Nguyên Legend Vietnamese Blend', 'Cà phê Phin Giấy', '105.000', '1', '20', '107'),
(32, 'Cà phê G7 hòa tan 3in1 Trung Nguyên 21 gói', 'Cà phê hòa tan', '48.000', '2', '21', '110'),
(33, 'Cà Phê Phin Giấy Trung Nguyên Legend Vietnamese Blend', 'Cà phê Phin Giấy', '105.000', '1', '22', '107'),
(34, 'Cà Phê Phin Giấy Trung Nguyên Legend Vietnamese Blend', 'Cà phê Phin Giấy', '105.000', '1', '23', '107'),
(35, 'Cà Phê Phin Giấy Trung Nguyên Legend Vietnamese Blend', 'Cà phê Phin Giấy', '105.000', '1', '24', '107'),
(36, 'Cà Phê Phin Lọc Giấy Trung Nguyên Legend Americano', 'Cà phê Phin Giấy', '110.000', '1', '24', '108');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(10) UNSIGNED NOT NULL,
  `tendanhmuc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendanhmuc`) VALUES
(10, 'Cà phê Phin Giấy'),
(11, 'Cà phê hòa tan'),
(12, 'Cà phê Hạt'),
(13, 'Trà');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(255) NOT NULL,
  `tenkh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaydat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghichu` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thanhtoan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idkh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `tenkh`, `ngaydat`, `sdt`, `email`, `diachi`, `tong`, `ghichu`, `thanhtoan`, `trangthai`, `idkh`) VALUES
(18, 'Nguyễn Hiếu Nghĩa', '08/12/2022 00:11 AM', '0911472518', 'changnghia2021@gmail.com', 'Cần Thơ, Ninh Kiều, Cần Thơ, Việt Nam', '1255.000', '', 'Tiền mặt', 'Hoàn Thành', '21'),
(19, 'Nguyễn Hiếu Nghĩa', '08/12/2022 09:18 AM', '0911472518', 'changnghia2021@gmail.com', 'Cần Thơ, Ninh Kiều, Cần Thơ, Việt Nam', '139.000', '', 'Tiền mặt', 'Đã hủy', '21'),
(20, 'Nguyễn Hiếu Nghĩa', '08/12/2022 09:21 AM', '0911472518', 'changnghia2021@gmail.com', 'Cần Thơ, Ninh Kiều, Cần Thơ, Việt Nam', '105.000', '', 'Momo', 'Hoàn Thành', '21'),
(21, 'Chăng Nguyễn Hiếu Nghĩa', '08/12/2022 09:25 AM', '0911472518', 'changnghia2307@gmail.com', '146-Trần Nguyên Hãn', '96.000', '', 'Tiền mặt', 'Đã hủy', '1'),
(22, 'Chăng Nguyễn Hiếu Nghĩa', '12/12/2022 22:39 PM', '0911472518', 'changnghia2307@gmail.com', '146-Trần Nguyên Hãn', '215.000', '', 'Tiền mặt', 'Đã hủy', '1'),
(23, 'Chăng Nguyễn Hiếu Nghĩa', '12/12/2022 22:41 PM', '0911472518', 'changnghia2307@gmail.com', '146-Trần Nguyên Hãn', '215.000', '', 'Tiền mặt', 'Đã hủy', '1'),
(24, 'Chăng Nguyễn Hiếu Nghĩa', '12/12/2022 22:41 PM', '0911472518', 'changnghia2307@gmail.com', '146-Trần Nguyên Hãn', '215.000', '', 'Tiền mặt', 'Hoàn Thành', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member`
--

CREATE TABLE `member` (
  `id` int(11) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `avt` varchar(1000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `username` varchar(40) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `gender` enum('male','female','khac') COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `data` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `member`
--

INSERT INTO `member` (`id`, `ten`, `avt`, `username`, `password`, `phone`, `email`, `gender`, `data`, `address`) VALUES
(1, 'Chăng Nguyễn Hiếu Nghĩa', 'Ceeyulogo-1.png', 'admin', 'nghia123', '0911472518', 'changnghia2307@gmail.com', 'male', '2001-07-23', '146-Trần Nguyên Hãn'),
(21, 'Nguyễn Hiếu Nghĩa', 'nct.png', 'nghia2307', 'nghia123', '0911472518', 'changnghia2021@gmail.com', 'male', '2022-09-01', 'Cần Thơ, Ninh Kiều, Cần Thơ, Việt Nam'),
(38, 'Nguyễn Thanh Tùng', 'Ceeyulogo-1.png', 'tung123', 'tung123', '0923596445', 'tungthanh@gmail.com', 'male', '2022-10-11', 'Cần Thơ, Ninh Kiều, Cần Thơ, Việt Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `tensp` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `loaisp` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gia` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` varchar(2255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sluong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `loaisp`, `gia`, `mota`, `image`, `sluong`) VALUES
(106, 'Cà phê phin giấy Trung Nguyên Legend Fusion Blend', 'Cà phê Phin Giấy', '105.500', 'Thành phần: Cà phê Arabica Hương thơm nồng mùi trái cây tươi xen lẫn một ít mùi vỏ chanh, chua ngọt mạnh và thanh, hậu thanh thoát nhẹ nhàng. Trọng lượng tịnh: 10g/ túi x 10 túi/ hộp', 'fusion-100x100.jpg', '26'),
(107, 'Cà Phê Phin Giấy Trung Nguyên Legend Vietnamese Blend', 'Cà phê Phin Giấy', '105.000', 'Thành phần: Cà phê Arabica, Robusta, hương cà phê, hương chocolate – Hương thơm mang phong vị truyền thống của cà phê Việt Nam, chua ngọt cân bằng, hậu vị êm dịu. Trọng lượng tịnh: 10g/ túi x 10 túi/ hộp', 'vietnames-1606257f12208.jpg', '47'),
(108, 'Cà Phê Phin Lọc Giấy Trung Nguyên Legend Americano', 'Cà phê Phin Giấy', '110.000', 'Thành phần: Cà phê Arabica, Robusta – Sự phối trộn tạo nên hương thơm dịu, vị mạnh mẽ của loại cà phê mang âm hưởng và khí chất của những chàng Cowboy vừa thanh thoát vừa lãng mạn làm say lòng biết bao người thưởng thức. – Trọng lượng tịnh: 10g/ túi x 10 túi/ hộp', 'ca-phe-phin-loc-giay-trung-nguyen-legend-americano-1606256f12208.jpg', '69'),
(109, 'Cà phê G7 – Hoà tan đen Trung Nguyên', 'Cà phê hòa tan', '23.000', 'Cà phê hòa tan G7 hòa tan đen, cà phê đen không đường, không sữa được sử dụng nguyên liệu tốt nhất, công nghệ sản xuất hiện đại, bí quyết Phương Đông độc đáo. Cà phê G7 hòa tan đen dành cho những người thích hương vị cà phê đậm đà, mạnh như cà phê rang xay.', 'G7-Instant-Black-Coffee-no-sugar-317f.jpg', '32'),
(110, 'Cà phê G7 hòa tan 3in1 Trung Nguyên 21 gói', 'Cà phê hòa tan', '48.000', 'Cà phê hòa tan G7 3in1 Trung Nguyên, cà phê hòa tan thượng hạng, với hương vị khác biệt, đậm đà, hương thơm độc đáo quyến rũ mà không một sản phẩm cà phê hòa tan nào khác đạt được.', 'sko1496147646.jpg', '18'),
(111, 'Cà phê G7 hòa tan đen – Bịch 100 sachets', 'Cà phê hòa tan', '125.000', 'Cà phê G7 hòa tan đen – Bịch 100 sachets, Cà Phê G7 Hòa Tan Đen Trung Nguyên Bịch 100 gói, cà phê G7 hòa tan đen dành cho những người thích hương vị cà phê đậm đà, mạnh như cà phê rang xay.', '8d7c71eeb91c4142180d.jpg', '78'),
(112, 'Cafe G7 3in1 Bịch 100 gói', 'Cà phê hòa tan', '215.000', 'Cà phê G7 hòa tan đen là dòng sản phẩm cà phê hòa tan đen thuần túy không đường, có chất lượng và hương vị đậm đà, thơm ngon đúng gu thưởng thức của những người sành cà phê.', '1483501681_capheg73in1-bich100sticks16gr.jpg', '78'),
(113, 'Cà phê hòa tan G7 – Cappuccino', 'Cà phê hòa tan', '51.000', 'Cafe hòa tan G7 Cappuccino Mocha được chắt lọc tinh túy từ những hạt cà phê ngon nhất Buôn Ma Thuột kết hợp bột kem và các nguyên liệu cao cấp khác, cộng với bí quyết độc đáo của Trung Nguyên, mang đến những người đam mê cà phê một loại cà phê hòa tan Cappuccino được pha chế theo phong cách Ý', '4f1ad38c71ec602285a4cd4cded91e1a.jpg', '23'),
(114, 'Cà phê hạt Espresso Trung Nguyên 500gr', 'Cà phê Hạt', '175.000', 'Cà phê hạt cao cấp Espresso – Buôn Ma Thuột là cà phê rang xay dành cho pha máy.\r\nThành phần: Arabica, Robusta', 'ca-phe-hat-espresso-buon-ma-thuot-trung-nguyen-500gram.jpg', '45'),
(115, 'Cà Phê Hạt Mộc Success 8 Trung Nguyên 340g', 'Cà phê Hạt', '310.000', 'Là loại cà phê siêu hạng có hương vị độc đáo và đầy thử thách. Mùi hương dịu nhẹ nhưng rất đa dạng; Thể chất mạnh nhưng cân bằng, hậu vị ngọt dịu.\r\n\r\nTrọng lượng tịnh: 250g', 'ca-phe-hat-so-8-250gam-1200f.jpg', '32'),
(116, 'Cafe hạt Trung Nguyên Culi Robusta thượng hạng ( hạt số 4)', 'Cà phê Hạt', '840.000', 'Cà phê hạt xay Drip – Culi Arabica có vị êm nhẹ. Ít đắng và mùi thơm rất đặc trưng.', '2-3.jpg', '21'),
(117, 'Cafe hạt Culi Robusta Trung Nguyên', 'Cà phê Hạt', '165.000', 'Cà phê hạt culi Robusta Trung Nguyên, được chọn lọc từ những hạt cà phê tròn của giống Robusta, mang trong mình mùi thơm nhẹ nhàng, vị đắng hơi gắt', 'culi_robusta.jpg', '23'),
(118, 'Trà bạc hà Cozy hộp 50g (2g x 25 túi)', 'Trà', '32.000', 'Thương hiệu :Cozy\r\nSản xuất tại :Việt Nam\r\nThành phần :Trà đen, hương Bạc Hà\r\nKhối lượng tịnh hộp : 2g x 25 gói', '9632930398238.jpg', '54'),
(119, 'Trà Lipton Ice hương Đào', 'Trà', '34.000', 'Trà Lipton Ice Tea hương Đào thơm ngon , hấp dẫn sẽ mang đến cho bạn một cảm giác sảng khoái tràn đầy sức sống.\n\n– Tên: Trà Lipton Ice Hương Đào– Loại: Trà hòa tan\n– Nhãn hiệu: Lipton\n\n– Xuất xứ: Việt Nam\n\n– Khối lượng tịnh hộp: 16 gói x 15 gram\n\n-Thành phần chính: Đường, Hương Đào tự nhiên, Vitamin C\n\n– Hãng sản xuất: Unilever\n\n– Bảo quản nơi khô ráo, thoáng gió và tránh ánh nắng.', 'tra-lipton-dao-16-sticks-3-700x467-2_grande.jpg', '21'),
(120, 'Trà Lipton nhãn vàng 100 gói 200g – TNV100LIPTON-200-125', 'Trà', '75.000', 'Trà Lipton Ice Tea vị chanh thanh mát vị trà ngon với sự kết hợp tuyệt vời giữa tinh chất trà đen và hương chanh tự nhiên mang đến sự tỉnh táo và cảm giác sảng khoái bất ngờ.\r\nLà món thức uống vừa đảm bảo chất lượng an toàn vệ sinh thực phẩm, vừa tiết kiệm chi phí, hộp gồm nhiều gói nhỏ, thuận tiện cho mỗi lần pha chế.\r\nPhù hợp khi uống lạnh, giúp tinh thần thư giãn, tỉnh táo, hương vị phù hợp với người Việt, cũng có thể sử dụng làm quà tặng đồng nghiệp, người thân.', '1-1.jpg', '87');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdh`
--
ALTER TABLE `chitietdh`
  ADD PRIMARY KEY (`idchitiet`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdh`
--
ALTER TABLE `chitietdh`
  MODIFY `idchitiet` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
