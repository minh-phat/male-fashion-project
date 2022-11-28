CREATE Database abc_clothing;
USE abc_clothing;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2022 at 08:12 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abc_clothing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Admin_Username` varchar(100) NOT NULL,
  `Admin_Password` text NOT NULL,
  `Admin_Name` varchar(50) NOT NULL,
  `Admin_Class` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Admin_Username`, `Admin_Password`, `Admin_Name`, `Admin_Class`) VALUES
('admin', 'admin', 'admin', 'Full Control'),
('huy', '$2y$10$r2zCb4/NVIbwhy7IrXE/Teq4E/MbqjzKnBpqaOwYC/4DTsLX..VOG', 'Dinh Quang Huy', 'Manager'),
('loc', '$2y$10$jhK6FHK1zLf75td0J3DAKOZ5DKJNcZbuww.htzwNVZBFvspLEqZTS', 'Truong Tan Loc', 'Product Operator'),
('phat', '$2y$10$U6bFPeP9ci3DIjIXVY/B9eW.HBRNs1EcZHYS3Ai4heTdb96rNaGY.', 'Nguyen Le Minh Phat', 'Manager'),
('tam', '$2y$10$H3fWY1U6o0eFFUbEb4UMHe9pSkF0jOfYyQMt4GK1cwvLxg5lwwh.y', 'Phan Minh Tam', 'Manager'),
('triet', '$2y$10$rWD8wICJc8PFjBdEt/2xBu5WekevvrSK2RfhMEl0CfecqknSr8RYG', 'Nguyen Minh Triet', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Category_ID` int(5) NOT NULL,
  `Category_Name` varchar(50) NOT NULL,
  `Category_Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_ID`, `Category_Name`, `Category_Image`) VALUES
(2, 'Shirt', '00000001510423Shirt.jpg'),
(3, 'Pants', '00000028510423Pants.jpg'),
(4, 'Hat', '00000037510423Hat.jpg'),
(5, 'Socks', '00000047510423Socks.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Customer_ID` int(5) NOT NULL,
  `Customer_Username` varchar(100) NOT NULL,
  `Customer_Password` text NOT NULL,
  `Customer_Name` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Date_of_Birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Customer_ID`, `Customer_Username`, `Customer_Password`, `Customer_Name`, `Email`, `Phone`, `Address`, `Gender`, `Date_of_Birth`) VALUES
(1, 'HungNXBGCS200058', '$2y$10$eju2Wr9/4EaEiJgR/HD/hOlT.aM5fdfNvbaL1K89JkzUrcRg1tIvO', 'Ninh Xuan Bao Hung', 'HungNXBGCS200058@fpt.edu.vn', '0123456789', '1234567890 qwertyuiop', 'male', '2002-01-01'),
(2, 'PhatNLMGCS200137', '$2y$10$Kw08NrHiPZxhNv7DPw66oOimNbGh22gurNDeQmO7R14vRwnNLFGxC', 'Nguyen Le Minh Phat', 'PhatNLMGCS200137@fpt.edu.vn', '0123456789', '1234567890 qwertyuiop', 'female', '2002-01-01'),
(3, 'HieuNTGCS200208', '$2y$10$ZI21dBjNzVPn.2s78h1EB.tW4NeUOiOMuXhBGDBHzkt/pjg/3h8Em', 'Nguyen Trung Hieu', 'HieuNTGCS200208@fpt.edu.vn', '0123456789', '1234567890 qwertyuiop', 'other', '2002-01-01'),
(4, 'TuanTAGCS200269', '$2y$10$DRBQLYWA60rd6NCPzcpoFu9eoDJ.01RyBV.gUS0lH50280ksBPMR.', 'Tong Anh Tuan', 'TuanTAGCS200269@fpt.edu.vn', '0123456789', '1234567890qwertyuiop', 'male', '2002-01-01'),
(5, 'DatDQTGCS200378', '$2y$10$ze0myyAo8NiroDQgNnmWX.bR5QWilwqbT2RyZWfZUcioXO3FTrQcG', 'Duong Quang Tien Dat', 'DatDQTGCS200378@fpt.edu.vn', '0123456789', '1234567890 qwertyuiop', 'female', '2002-01-01'),
(6, 'LoiVCGCS200381', '$2y$10$h6aLp92FdBKrek7w4ixX9OwwehQ.9TIIkCemuvfyVz1FivgkMKk8i', 'Vong Canh Loi', 'LoiVCGCS200381@fpt.edu.vn', '0123456789', '1234567890 qwertyuiop', 'other', '2002-01-01'),
(7, 'TaiPKGCS200427', '$2y$10$h6gTt3oLip19lnXgvDbcheDVGNiChKUxMAJYXYlgjLAfNqoT.KdIO', 'Pham Kim Tai', 'TaiPKGCS200427@fpt.edu.vn', '0123456789', '1234567890 qwertyuiop', 'male', '2002-01-01'),
(8, 'TinhTCTGCS200451', '$2y$10$8FjqOT1PN3O9AwQ9KG6PtuHt/IR//EUovk86GU56pl/IzhllFJqHW', 'Truong Cong Tue Tinh', 'TinhTCTGCS200451@fpt.edu.vn', '0123456789', '1234567890 qwertyuiop', 'female', '2002-01-01'),
(9, 'LocDCGCS200461', '$2y$10$XMOOCHMthSMX6q7BNtCuXebFpE191xO3z6jdMewjLuiP912JEyobW', 'Duong Chi Loc', 'LocDCGCS200461@fpt.edu.vn', '0123456789', '1234567890 qwertyuiop', 'other', '2002-01-01'),
(10, 'PhatSSGCS200485', '$2y$10$hQrdJH4MzRiTt5tgU1GkpOcDbiGtkC49F3EyCsdr44/aNh5LQYGQO', 'Su Say Phat', 'PhatSSGCS200485@fpt.edu.vn', '0123456789', '1234567890 qwertyuiop[', 'male', '2002-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_ID` int(5) NOT NULL,
  `Customer_ID` int(5) NOT NULL,
  `Receive_Phone` varchar(10) NOT NULL,
  `Receive_Address` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `Order_Details_ID` int(5) NOT NULL,
  `Order_ID` int(5) NOT NULL,
  `Product_ID` int(5) NOT NULL,
  `Quantity` int(4) NOT NULL,
  `Size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_ID` int(5) NOT NULL,
  `Product_Name` varchar(50) NOT NULL,
  `Category_ID` int(5) NOT NULL,
  `Price` int(4) NOT NULL,
  `Details` text DEFAULT NULL,
  `Images` text NOT NULL,
  `Size` text NOT NULL,
  `Available` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_ID`, `Product_Name`, `Category_ID`, `Price`, `Details`, `Images`, `Size`, `Available`) VALUES
(1, 'Áo Polo nam Pique Cotton USA thấm hút tối đa', 2, 15, 'Chất liệu: 97% Cotton USA + 3% Spandex\r\nVới chất liệu Cotton USA chất lượng cao, mang lại sự mềm mại và thấm hút mồ hôi tốt\r\nCo giãn 4 chiều mang lại sự thoải mái khi mặc\r\nBo cổ dệt bằng sợi Cotton, viền phối Polyester để đảm bảo độ đàn hồi, chống bai và giữ màu qua các lần giặt\r\nForm áo hơi ôm eo và phù hợp với dáng nam giới Việt\r\nTự hào sản xuất tại Việt Nam', '00000036570423Shirt1-1.jpg@@@00000037570423Shirt1-2.jpg@@@00000037570423Shirt1-3.jpg@@@00000037570423Shirt1-4.jpg', 'S M L XL XXL', 50),
(2, 'Áo Tank top thể thao nam thoáng khí', 2, 5, 'Chất liệu 100% Recycle Polyester, theo xu hương thời trang bền vững\r\nVải được xử lý hoàn thiện theo công nghệ Wicking (thoáng khí) & Quick-Dry (Nhanh khô)\r\nKiểu dáng áo tanktop khoét nách sâu, đem đến sự thoải mái trong quá trình vận động\r\nNhà cung cấp vải hàng đầu thế giới trong lĩnh vực đồ thể thao: Promax\r\nTự hào may và hoàn thiện tại nhà máy Nobland, Bình Dương', '00000042110523Shirt2-1.jpg@@@00000042110523Shirt2-2.jpg@@@00000042110523Shirt2-3.jpg@@@00000042110523Shirt2-4.jpg', 'S M L XL', 50),
(3, 'Áo thun thể thao nam Recycle Active V1', 2, 8, 'Chất liệu 100% Recycle Polyester, theo xu hương thời trang bền vững\r\nVải được xử lý hoàn thiện theo công nghệ Wicking (thoáng khí) & Quick-Dry (Nhanh khô)\r\nKiểu dáng áo thun thể thao vừa vặn với dáng nam giới Việt Nam\r\nNhà cung cấp vải hàng đầu thế giới trong lĩnh vực đồ thể thao: Promax\r\nTự hào may và hoàn thiện tại nhà máy Nobland, Bình Dương', '00000001150523Shirt3-1.jpg@@@00000001150523Shirt3-2.jpg@@@00000001150523Shirt3-3.jpg@@@00000002150523Shirt3-4.jpg', 'M L XL', 50),
(4, 'Quần Short Nam New French Terry', 3, 9, 'Chất liệu: 60% Cotton + 35% Polyester + 5% Spandex đem đến bề mặt vải cứng cáp, không nhăn\r\nThiết kế đơn giản, kiểu dáng khỏe khoắn với đường may chắc chắn\r\nTúi 2 bên Có khoá YKK tiện lợi khi đựng đồ\r\nKiểu dệt French Terry mang lại sự Cooling khi tiếp xúc với da\r\nĐộ dài quần: 8 inch\r\nVải dệt và may tại Việt Nam', '00000056450523Pants1-1.jpg@@@00000056450523Pants1-2.jpg@@@00000056450523Pants1-3.jpg@@@00000057450523Pants1-4.jpg', 'M XL XXL', 50),
(5, 'Quần Jeans Clean Denim dáng Slimfit S2', 3, 20, 'Vải Denim được dệt toàn bộ tại nhà máy Nhơn Trạch, Đồng Nai của Saitex \r\nChất liệu: 98% Regenerative Cotton (Cotton Tái sinh) + 2% Spandex, tạo sự co giãn đem đến sự thoải mái khi vận động\r\nĐịnh lượng vải: 12.5 Oz\r\nCông nghệ nhuộm KHÔNG sử dụng Sufur (lưu huỳnh) và KHÔNG có nước thải ra môi trường\r\nCông nghệ nhuộm Rope Dyeing mang lại độ bền màu cao hơn cho vải\r\nKiểu dáng Slimfit, không bo ống phù hợp mặc đa chức năng\r\nBẢO HÀNH TRỌN ĐỜI khoá kéo YKK, bất kỳ khi nào khoá kéo hỏng Coolmate sẽ đổi cho bạn sản phẩm mới!\r\nHDSD: Tránh ngâm trong nước quá lâu - Tránh tiếp xúc với các chất liệu gây loang màu - Không sử dụng chất tẩy, tránh giặt bằng máy', '00000013490523Pants2-1.jpg@@@00000014490523Pants2-2.jpg@@@00000014490523Pants2-3.jpg@@@00000015490523Pants2-4.jpg', 'XL', 50),
(6, 'Quần dài Kaki Excool co giãn', 3, 18, 'Chất liệu: 43% Sợi Sorona + 57% Polyester co giãn\r\nQuần ống dài, lưng quần âu có chun CO GIÃN bên trong vừa vặn với cơ thể\r\nDáng quần hơi ôm một chút để bạn luôn cảm thấy thoải mái và lịch sự\r\nỨng dụng công nghệ Excool: Co giãn 4 chiều, Nhẹ, Thoáng khí, Chống tia UV SPF50+\r\nKhông nên ủi, nếu cần thì ủi ở nhiệt độ thấp dưới 110 độ\r\nTự hào sản xuất tại Việt Nam\r\nNgười mẫu: 1m80 - 75kg, mặc XL', '00000010520523Pants3-1.jpg@@@00000010520523Pants3-2.jpg@@@00000010520523Pants3-3.jpg@@@00000011520523Pants3-4.jpg', 'XL', 50),
(7, 'Nón Bucket Hat thêu Care & Share Handwriting', 4, 8, 'Bucket hat còn được gọi là mũ của ngư dân. Nó được tạo ra cho những người Ireland chuyên đánh bắt cá đầu thập niên 1900. Những ngày đầu, chiếc mũ được làm từ chất liệu len thô pha vải tweed, rất được ngư dân và nông dân ưa chuộng bởi đặc tính không thấm nước, có khả năng bảo vệ đầu hiệu quả trong quá trình lao động.\r\n\r\nVào những năm 1980, mũ bucket hat bắt đầu trở thành vật dụng nổi tiếng khi nó xuất hiện cùng các ngôi sao hip hop như LL Cool J, Run DMC và tiếp tục làm mưa làm gió trong thập niên 90. Và đến thời điểm hiện tại những chiếc mũ này vẫn không ngừng làm mưa làm gió bởi sự tiện lợi và hữu ích mà nó mang lại.', '00000054550523Hat1-1.jpg@@@00000054550523Hat1-2.jpg@@@00000055550523Hat1-3.jpg', 'L', 50),
(8, 'Nón lưỡi trai nam phối lưới Baseball Cap', 4, 7, 'Một chiếc mũ phù hợp cho nhiều hoạt động của bạn từ những buổi đi chơi dạo phố, hay những buổi luyện tập thể thao thì Baseball Cap chắc chắn sẽ là một người bạn đồng hành cực chất lượng với bạn', '00000054570523Hat2-1.jpg@@@00000055570523Hat2-2.jpg@@@00000056570523Hat2-3.jpg', 'L', 50),
(9, 'Vớ thể thao cổ ngắn Compression Bouncing', 5, 3, 'Chất liệu: 65% nylon, 20% cotton, 10% polyester, 5% spandex\r\nTất thể thao có đệm dày ở gót, mũi và cổ chân tạo cảm giác êm ái, thoải mái\r\nPhần dệt thoáng, thoải mái khi sử dụng trong hoạt động thể thao nặng\r\nCông nghệ dệt nén để tất vừa vặn và ôm chân hơn khi vận động\r\nKiểu dệt mesh giúp cho chiếc tất ôm chân hơn và thoáng khí hơn\r\nLựa chọn 1 đôi, thoải mái trong mọi vận động\r\nTự hào sản xuất tại Việt Nam', '00000014000623Socks1-1.jpg@@@00000015000623Socks1-2.jpg@@@00000016000623Socks1-3.jpg', 'M L XL', 50),
(10, 'Combo 3 đôi vớ cổ ngắn phối màu', 5, 5, 'Thành phần: 80% Cotton, 18% Polyester, 2% Spandex\r\nThoáng khí, hút ẩm, hút mùi và kháng khuẩn với thành phầnCotton\r\nCombo 3 màu phối lựa chọn\r\nTự hào sản xuất tại Việt Nam', '00000037030623Socks2-1.jpg@@@00000037030623Socks2-2.jpg@@@00000038030623Socks2-3.jpg', 'M L XL', 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Admin_Username`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`Order_Details_ID`),
  ADD KEY `Order_ID` (`Order_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `Category_ID` (`Category_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Customer_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `Order_Details_ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customers` (`Customer_ID`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `orders` (`Order_ID`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`Category_ID`) REFERENCES `categories` (`Category_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
