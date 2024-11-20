-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 09, 2024 lúc 03:33 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `productdb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_library`
--

CREATE TABLE `image_library` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `product_images` varchar(255) NOT NULL,
  `product_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `image_library`
--

INSERT INTO `image_library` (`id`, `productid`, `product_images`, `product_description`) VALUES
(5, 1, 'upload/BÀN PHÍM CƠ MACHENIKE AIR50-B84W TRI-MODE RGB RED SHAFT RED SWITCH.jpg', 'Thông số sản phẩ\r\n\r\n- Bàn Phím Cơ Machenike AIR50-B84W Tri-mode RGB Red Shaft\r\n- Chuẩn kết nối: Wireless 2.4Ghz / Bluetooth 5.0 / Dây USB\r\n- Layout 75% gọn nhẹ - 84 phím\r\n- Thiết kế siêu mỏng - nhẹ, chỉ nặng 456g\r\n- Switch Outemu Low Profile Red Switch, độ bền lên đến 50 triệu lần nhấn - Mạch hỗ trợ Hotswap switch 3pin (chỉ hỗ trợ Switch Low profile)\r\n- Keycap PBT Doubleshot Low profile\r\n- Led RGB 16.8 triệu màu\r\n- Tương thích Window / MAC\r\n- Dung lượng pin 1600mAh'),
(15, 2, 'upload/BÀN PHÍM CƠ MACHENIKE K500F-B94W TRI-MODE RGB WHITE TRANSPARENT GR CRYSTAL SWITCH.jpg', 'Thông số sản phẩm\r\n\r\n- Bàn Phím Cơ Machenike K500F-B94W Tri-mode RGB White Transparent\r\n- Chuẩn kết nối: Wireless 2.4Ghz / Bluetooth 5.0 / Dây USB\r\n- Layout 96% đầy đủ, gọn gàng - 94 phím\r\n- Cấu trúc Gasket Mount\r\n-Switch Gr Crystal (Tactile) - Mạch hỗ trợ Hotswap 3pin\r\n- Keycap PBT Doubleshot\r\n- Led RGB\r\n- 100% Anti-ghosting và N-key rollcover\r\n-Dung lượng PIN Lithium: 3000mAh\r\n'),
(16, 3, 'upload/BÀN PHÍM GAMING ASUS ROG AZOTH NX RED.jpg', 'Thông số sản phẩm\r\n\r\n- Bàn phím Gaming ASUS ROG AZOTH NX RED\r\n- Bàn phím Gaming ASUS ROG AZOTH TRẮNG\r\n- Thiết kế gasket mount độc đáo: Kết hợp gasket mount silicone với ba lớp bọt giảm chấn tạo ra trải nghiệm gõ phím tuyệt vời.\r\n- Kết nối tri-mode: Sử dụng Bluetooth® để kết nối và chuyển đổi giữa ba thiết bị cùng lúc, công nghệ không dây ROG SpeedNova cung cấp hơn 2.000 giờ chơi game độ trễ thấp trong chế độ không dây RF 2,4 GHz (tắt OLED và RGB) hoặc sử dụng kết nối chuẩn USB.\r\n- Màn hình OLED và điều khiển trực quan: Xem thông tin hệ thống và cài đặt bàn phím một cách dễ dàng; nút xoay tích hợp cho phép điều chỉnh cài đặt nhanh chóng.\r\n-Switch cơ học ROG NX có thể thay thế (Hot-swappable): Switch được bôi trơn sẵn giúp các lần nhấn phím trở nên mượt mà hơn và loại bỏ tiếng ồn; khả năng kích hoạt nhanh và đường cong lực được điều chỉnh bởi ROG mang lại cảm giác và độ nhất quán tốt cho các phím.\r\n- Trải nghiệm gõ phím được cải thiện: Đệm phím được bôi trơn trước đó giảm ma sát để nhấn phím trở nên mượt mà hơn và ổn định hơn cho các phím dài hơn; các keycap PBT doubleshot ROG bền chắc cho trải nghiệm cao cấp.\r\n- Bộ kit dầu bôi trơn Switch: Bao gồm các sản phẩm dầu bôi trơn Krytox™ GPL-205-GD0 hỗ trợ cho người mới bắt đầu DIY bàn phím.\r\n- Thiết kế tiện dụng: Hai cặp chân bàn phím với độ cao khác nhau cung cấp đến ba vị trí nghiêng khác nhau.\r\n- Hỗ trợ MacOS: Dễ dàng chuyển đổi giữa chế độ Windows và MacOS.'),
(18, 4, 'upload/BÀN PHÍM GAMING KHÔNG DÂY ASUS ROG AZOTH NX ĐEN RED SWITCH.jpg', ' Thông số sản phẩm\r\n\r\n- Thiết kế gasket mount độc đáo: Kết hợp gasket mount silicone với ba lớp bọt giảm chấn tạo ra trải nghiệm gõ phím tuyệt vời.\r\n- Kết nối tri-mode: Sử dụng Bluetooth® để kết nối và chuyển đổi giữa ba thiết bị cùng lúc, công nghệ không dây ROG SpeedNova cung cấp hơn 2.000 giờ chơi game độ trễ thấp trong chế độ không dây RF 2,4 GHz (tắt OLED và RGB) hoặc sử dụng kết nối chuẩn USB.\r\n- Màn hình OLED và điều khiển trực quan: Xem thông tin hệ thống và cài đặt bàn phím một cách dễ dàng; nút xoay tích hợp cho phép điều chỉnh cài đặt nhanh chóng.\r\n- Switch cơ học ROG NX có thể thay thế (Hot-swappable): Switch được bôi trơn sẵn giúp các lần nhấn phím trở nên mượt mà hơn và loại bỏ tiếng ồn; khả năng kích hoạt nhanh và đường cong lực được điều chỉnh bởi ROG mang lại cảm giác và độ nhất quán tốt cho các phím.\r\n- Trải nghiệm gõ phím được cải thiện: Đệm phím được bôi trơn trước đó giảm ma sát để nhấn phím trở nên mượt mà hơn và ổn định hơn cho các phím dài hơn; các keycap PBT doubleshot ROG bền chắc cho trải nghiệm cao cấp.\r\n- Bộ kit dầu bôi trơn Switch: Bao gồm các sản phẩm dầu bôi trơn Krytox™ GPL-205-GD0 hỗ trợ cho người mới bắt đầu DIY bàn phím.\r\n- Thiết kế tiện dụng: Hai cặp chân bàn phím với độ cao khác nhau cung cấp đến ba vị trí nghiêng khác nhau.\r\n- Hỗ trợ MacOS: Dễ dàng chuyển đổi giữa chế độ Windows và MacOS.'),
(19, 6, 'upload/BÀN PHÍM CƠ CÓ DÂY LOGITECH G713 RGB TKL OFF WHITE LINEAR (920-010679).jpg', ' Thông số sản phẩm\r\n\r\n- Bàn phím cơ có dây Logitech G713 RGB TKL Off White\r\n-  Chuẩn kết nối: Dây USB\r\n- Layout TKL 87 phím\r\n- Công nghệ Switch GX (linear) cao cấp đến từ Logitech\r\n- Keycao PBT Doubleshot\r\n- Led RGB Lightsync\r\n- Đi kèm kê tay mềm mại, độc đáo\r\n'),
(22, 8, 'upload/BÀN PHÍM CƠ MACHENIKE AIR50-B84W TRI-MODE RGB GREY BLUE RED SWITCH.jpg', 'Thông số sản phẩm\r\n\r\n- Bàn Phím Cơ Machenike AIR50-B84W Tri-mode RGB Grey Blue\r\n- Chuẩn kết nối: Wireless 2.4Ghz / Bluetooth 5.0 / Dây USB\r\n- Layout 75% gọn nhẹ - 84 phím\r\n- Thiết kế siêu mỏng - nhẹ, chỉ nặng 456g\r\n- Switch Outemu Low Profile Red Switch, độ bền lên đến 50 triệu lần nhấn - Mạch hỗ trợ Hotswap switch 3pin (chỉ hỗ trợ Switch Low profile)\r\n- Keycap PBT Doubleshot Low profile\r\n- Led RGB 16.8 triệu màu\r\n- Tương thích Window / MAC\r\n- Dung lượng pin 1600mAh'),
(23, 2, 'upload/id2.jpg', ''),
(24, 1, 'upload/BÀN PHÍM CƠ MACHENIKE AIR50-B84W TRI-MODE RGB RED SHAFT RED SWITCH.jpg', 'Thông số sản phẩ\r\n\r\n- Bàn Phím Cơ Machenike AIR50-B84W Tri-mode RGB Red Shaft\r\n- Chuẩn kết nối: Wireless 2.4Ghz / Bluetooth 5.0 / Dây USB\r\n- Layout 75% gọn nhẹ - 84 phím\r\n- Thiết kế siêu mỏng - nhẹ, chỉ nặng 456g\r\n- Switch Outemu Low Profile Red Switch, độ bền lên đến 50 triệu lần nhấn - Mạch hỗ trợ Hotswap switch 3pin (chỉ hỗ trợ Switch Low profile)\r\n- Keycap PBT Doubleshot Low profile\r\n- Led RGB 16.8 triệu màu\r\n- Tương thích Window / MAC\r\n- Dung lượng pin 1600mAh'),
(25, 3, 'upload/id3.jpg', ''),
(26, 4, 'upload/id4.jpg', ''),
(28, 6, 'upload/id6.jpg', ''),
(30, 8, 'upload/id8.jpg', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tinh` varchar(255) NOT NULL,
  `huyen` varchar(255) NOT NULL,
  `xa` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `tinhtrangdon` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productdb`
--

CREATE TABLE `productdb` (
  `id` int(11) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `product_price` float DEFAULT NULL,
  `product_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `producttb`
--

CREATE TABLE `producttb` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float DEFAULT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `producttb`
--

INSERT INTO `producttb` (`id`, `product_name`, `product_price`, `product_image`, `product_description`) VALUES
(1, 'BÀN PHÍM CƠ MACHENIKE AIR50-B84W TRI-MODE RGB RED SHAFT RED SWITCH', 99900, 'upload/BÀN PHÍM CƠ MACHENIKE AIR50-B84W TRI-MODE RGB RED SHAFT RED SWITCH.jpg', 'ABB'),
(2, 'BÀN PHÍM CƠ MACHENIKE K500F-B94W TRI-MODE RGB WHITE TRANSPARENT GR CRYSTAL SWITCH', 1599000, 'upload/BÀN PHÍM CƠ MACHENIKE K500F-B94W TRI-MODE RGB WHITE TRANSPARENT GR CRYSTAL SWITCH.jpg', ''),
(3, 'BÀN PHÍM GAMING ASUS ROG AZOTH NX RED', 1699000, 'upload/BÀN PHÍM GAMING ASUS ROG AZOTH NX RED.jpg', ''),
(4, 'BÀN PHÍM GAMING KHÔNG DÂY ASUS ROG AZOTH NX ĐEN RED SWITCH', 2999000, 'upload/BÀN PHÍM GAMING KHÔNG DÂY ASUS ROG AZOTH NX ĐEN RED SWITCH.jpg', ''),
(6, 'BÀN PHÍM CƠ CÓ DÂY LOGITECH G713 RGB TKL OFF WHITE LINEAR (920-010679)', 1999000, 'upload/BÀN PHÍM CƠ CÓ DÂY LOGITECH G713 RGB TKL OFF WHITE LINEAR (920-010679).jpg', ''),
(8, 'BÀN PHÍM CƠ MACHENIKE AIR50-B84W TRI-MODE RGB GREY BLUE RED SWITCH', 5999000, 'upload/BÀN PHÍM CƠ MACHENIKE AIR50-B84W TRI-MODE RGB GREY BLUE RED SWITCH.jpg', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tin`
--

CREATE TABLE `tin` (
  `idTin` int(11) NOT NULL,
  `lang` varchar(2) NOT NULL,
  `TieuDe` text NOT NULL,
  `TomTat` text NOT NULL,
  `Content` text DEFAULT NULL,
  `urlHinh` varchar(255) NOT NULL,
  `Ngay` date NOT NULL,
  `idTL` int(11) NOT NULL,
  `idLT` int(11) NOT NULL,
  `SoLanXem` int(11) NOT NULL,
  `NoiBat` int(11) NOT NULL,
  `AnHien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tin`
--

INSERT INTO `tin` (`idTin`, `lang`, `TieuDe`, `TomTat`, `Content`, `urlHinh`, `Ngay`, `idTL`, `idLT`, `SoLanXem`, `NoiBat`, `AnHien`) VALUES
(46, 'vi', 'Việt nam đứng tỷ phú nhất', '', 'Việt Nam đang chứng kiến sự gia tăng đáng kể số lượng tỷ phú, đặc biệt là trong lĩnh vực công nghệ và bất động sản. Sự phát triển kinh tế nhanh chóng của đất nước đã tạo ra nhiều cơ hội cho các doanh nhân. Tuy nhiên, khoảng cách giàu nghèo cũng đang ngày càng rộng ra, đặt ra nhiều thách thức cho xã hội. Bài viết phân tích chi tiết về nguồn gốc của sự giàu có này, tác động đến nền kinh tế, và những thách thức xã hội mà nó mang lại.', 'uploads/id46.jpg', '2008-05-04', 1, 22, 494, 0, 0),
(295, 'en', 'Quy Nhon chili sauce turns up integral for deliciousness', 'People often think about seafood like grilled chop...', 'Quy Nhon chili sauce, a local specialty, has become an essential ingredient in many Vietnamese dishes. Its unique flavor profile, combining heat with a subtle sweetness, has made it a favorite among food enthusiasts. Local chefs praise its versatility, using it in both traditional and modern cuisine. The article explores the history of this sauce, its production process, and its rising popularity in international markets. It also includes recipes and suggestions for pairing the sauce with various dishes, highlighting its role in enhancing the flavors of seafood and grilled meats.', 'uploads/id295.jpg', '2010-01-06', 11, 3, 241, 0, 1),
(321, 'en', 'Keeping A Dog?Get A Registration Book. Please!', 'A new circular requires dog owners to register for...', 'Dog owners in Vietnam are now required to register their pets with local authorities. This new circular aims to improve pet management and reduce the number of stray dogs. The registration book will contain information about the dog\'s vaccinations, health status, and owner details. The article discusses the implementation process, the benefits of this new system, and addresses common concerns from pet owners. It also explores how similar systems have worked in other countries and the potential impact on animal welfare in Vietnam.', 'uploads/id321.jpg', '2009-09-09', 18, 9, 119, 0, 1),
(410, 'vi', 'Thông điệp tình yêu', 'Dành cho những ai đang có đơn. Tình yêu như là cần...', 'Tình yêu là một cảm xúc phức tạp và đa dạng. Bài viết này khám phá những khía cạnh khác nhau của tình yêu, từ giai đoạn say nắng ban đầu đến sự gắn bó sâu sắc lâu dài. Chúng tôi thảo luận về cách vượt qua những thử thách trong tình yêu và làm thế nào để duy trì một mối quan hệ lành mạnh. Đối với những người đang độc thân, bài viết cung cấp lời khuyên về cách tìm kiếm và nuôi dưỡng tình yêu mới. Các chuyên gia tâm lý học chia sẻ những hiểu biết sâu sắc về tầm quan trọng của tình yêu đối với sức khỏe tinh thần và hạnh phúc tổng thể.', 'uploads/id410.webp', '2011-06-14', 3, 12, 187, 0, 1),
(506, 'vi', 'Nét đẹp riêng của hoa và lá cây phi lao', '(Dân trí) - Nói đến hoa là của loài cây phi lao th...', 'Cây phi lao, thường được biết đến với vai trò chắn gió, cát ven biển, còn có một vẻ đẹp riêng rất đặc biệt. Bài viết này khám phá vẻ đẹp tinh tế của hoa và lá cây phi lao. Mặc dù hoa phi lao không rực rỡ như nhiều loài hoa khác, chúng có sự thanh tao và mộc mạc riêng. Lá cây phi lao với hình dáng mảnh mai, xanh mướt quanh năm, tạo nên một bức tranh thiên nhiên đẹp mắt. Bài viết cũng đề cập đến vai trò sinh thái quan trọng của cây phi lao trong hệ sinh thái ven biển, cũng như các nỗ lực bảo tồn loài cây này.', 'uploads/id506.png', '2011-06-17', 1, 4, 0, 0, 1),
(550, 'vi', 'Nhà lái vàng', '(Dân trí) - Ông lái thả chơi ra quét sân. Một ngày...', 'Ông lái vàng là một nhân vật đặc biệt trong làng quê Việt Nam. Bài viết kể về cuộc sống hàng ngày của ông, từ việc quét sân buổi sáng đến những giao dịch vàng phức tạp. Qua câu chuyện của ông, chúng ta thấy được sự thay đổi của nền kinh tế nông thôn, vai trò của vàng trong xã hội Việt Nam, và những thách thức mà các \"lái vàng\" phải đối mặt trong thời đại số. Bài viết cũng đề cập đến những rủi ro và cơ hội trong nghề này, cũng như tác động của nó đối với cộng đồng địa phương.', 'uploads/id550.jpg', '2011-08-18', 3, 77, 0, 0, 1),
(580, 'vi', 'Giỏi nghề, thu nhập cao', 'Với sự chịu khó, nhanh nhẹn và sáng ý, nhiều công...', 'Trong bối cảnh kinh tế đang phát triển nhanh chóng, nhiều công nhân đã tìm ra cách để nâng cao thu nhập của mình thông qua việc trau dồi kỹ năng và sáng tạo trong công việc. Bài viết này giới thiệu những câu chuyện thành công của các công nhân đã vượt qua khó khăn để trở thành chuyên gia trong lĩnh vực của họ. Từ thợ hàn trở thành kỹ sư, hay từ công nhân may trở thành nhà thiết kế thời trang, những câu chuyện này minh họa cho sự quan trọng của việc học hỏi liên tục và tinh thần sáng tạo. Bài viết cũng đưa ra lời khuyên cho những ai muốn nâng cao thu nhập và phát triển sự nghiệp của mình.', 'uploads/id580.jpg', '2011-06-21', 1, 9, 0, 0, 1),
(601, 'vi', 'Inter chính thức chia tay với \"công thần\" Materazz...', '(Dân trí) - Sau 10 năm gắn bó cùng sắc xanh - đen...', 'Sau một thập kỷ gắn bó với câu lạc bộ Inter Milan, Marco Materazzi chính thức chia tay đội bóng. Bài viết này nhìn lại sự nghiệp đáng nhớ của Materazzi tại Inter, từ những khoảnh khắc vinh quang đến những thử thách khó khăn. Chúng tôi phân tích vai trò quan trọng của anh trong thành công của đội bóng, đặc biệt là trong mùa giải treble năm 2010. Bài viết cũng đề cập đến phản ứng của người hâm mộ, đồng đội và ban lãnh đạo câu lạc bộ trước quyết định này, cũng như suy đoán về tương lai của Materazzi sau khi rời Inter.', 'uploads/id601.jpg', '2011-06-22', 1, 1, 0, 0, 1),
(701, 'vi', 'Công nghệ AI mới nhất trong năm 2024', 'Những tiến bộ đột phá trong lĩnh vực trí tuệ nhân tạo đang thay đổi cách chúng ta sống và làm việc...', 'Năm 2024 đánh dấu những bước tiến vượt bậc trong lĩnh vực trí tuệ nhân tạo (AI). Bài viết này đi sâu vào các công nghệ AI mới nhất đang định hình lại nhiều ngành công nghiệp. Chúng tôi thảo luận về sự phát triển của các mô hình ngôn ngữ lớn, khả năng tạo ra nội dung sáng tạo của AI, và ứng dụng của AI trong y tế, giáo dục, và sản xuất. Bài viết cũng đề cập đến những thách thức đạo đức và xã hội mà công nghệ AI mang lại, cũng như các nỗ lực quốc tế nhằm quản lý sự phát triển của AI một cách có trách nhiệm.', 'uploads/id701.jpg', '2024-03-15', 21, 82, 1501, 0, 1),
(702, 'en', 'Top 10 Travel Destinations for 2024', 'Discover the most breathtaking and unexplored places to visit this year...', 'As travel restrictions ease and the world adapts to a new normal, 2024 brings exciting opportunities for adventure seekers. This article unveils the top 10 must-visit destinations for the year, ranging from hidden gems to reimagined classics. We explore emerging eco-tourism hotspots, culturally rich cities undergoing renaissance, and remote natural wonders. Each destination is analyzed for its unique attractions, cultural significance, and sustainability efforts. The article also provides practical tips for responsible travel, local customs to be aware of, and the best times to visit each location.', 'uploads/id702.jpg', '2024-03-16', 11, 3, 2000, 0, 1),
(703, 'vi', 'Bí quyết sống khỏe mỗi ngày', 'Những thói quen đơn giản giúp bạn cải thiện sức khỏe và tinh thần...', 'Sống khỏe mỗi ngày không chỉ là về chế độ ăn uống và tập luyện, mà còn là về cách chúng ta quản lý stress và duy trì sự cân bằng trong cuộc sống. Bài viết này chia sẻ những thói quen đơn giản nhưng hiệu quả để cải thiện sức khỏe thể chất và tinh thần. Từ kỹ thuật thở đúng cách, chế độ ăn cân bằng, đến việc duy trì một lịch trình ngủ đều đặn, chúng tôi cung cấp những lời khuyên thiết thực có thể áp dụng ngay vào cuộc sống hàng ngày. Bài viết cũng thảo luận về tầm quan trọng của việc kết nối xã hội và tìm kiếm mục đích sống đối với sức khỏe tổng thể.', 'uploads/id703.jpg', '2024-03-17', 12, 79, 801, 0, 1),
(704, 'vi', 'Xu hướng thời trang mùa hè 2024', 'Khám phá những phong cách thời trang hot nhất cho mùa hè năm nay...', 'Mùa hè 2024 hứa hẹn mang đến những xu hướng thời trang mới mẻ và đa dạng. Bài viết này khám phá các phong cách hot nhất, từ trang phục bền vững đến sự trở lại của thời trang Y2K. Chúng tôi phân tích các xu hướng màu sắc, chất liệu, và kiểu dáng đang thống trị sàn diễn và đường phố. Bài viết cũng đề cập đến cách kết hợp các xu hướng này vào tủ quần áo hàng ngày, cũng như cách điều chỉnh chúng cho phù hợp với nhiều dáng người khác nhau. Cuối cùng, chúng tôi thảo luận về tác động của công nghệ và mạng xã hội đối với xu hướng thời trang mùa hè năm nay.', 'uploads/id704.png', '2024-03-18', 18, 40, 1202, 0, 1),
(705, 'en', 'Hướng dẫn cách chỉnh đèn bàn phím cơ đơn giản, chi tiết', '﻿Bàn phím cơ có chức năng đổi màu đèn giúp không gian chơi game của game thủ trở nên thú vị hơn. Tuy nhiên nhiều người còn chưa biết cách bật đèn hay cách đổi màu đèn bàn phím cơ. Hãy cùng Blessing Keyboard hướng dẫn bạn chi tiết trong bài viết dưới đây nhé!', 'Bàn phím cơ là gì?\r\n\r\n\r\nBàn phím cơ là loại bàn phím sử dụng công tắc cơ học (Switch) trên từng phím, tạo cảm giác gõ có độ nảy tốt, êm ái cùng độ phản hồi cao, bền bỉ và giảm thiểu chứng đau đầu ngón tay. Đèn bàn phím cơ là gì? Có mấy loại?\r\nĐèn bàn phím cơ là dãy đèn LED được thiết kế nằm dưới bàn phím cơ, có chức năng phát sáng giúp người dùng dễ dàng thực hiện các thao tác trên bàn phím trong điều kiện thiếu ánh sáng.<img src=\"upload/qr.jpg\" alt=\"Description\">\r\n\r\nCó 2 loại là đèn LED đơn sắc và đèn LED RGB. Đèn LED đơn sắc chỉ thể hiện được một màu cố định còn đèn LED RGB có đến tận ba màu bao gồm đỏ, xanh lá và xanh dương nên đèn LED RGB sẽ có giá thành cao hơn đèn LED đơn sắc. Ngoài ra, nó còn được phân loại là LED tròn, vuông và dán. LED tròn là loại đèn phổ biến nhất, dễ thay thế và có giá thành rẻ. LED vuông thường được bán tại các cửa hàng chuyên dụng cho bàn phím cơ, nó có ánh sáng đẹp và giá cả đắt hơn LED tròn. Còn LED dán có giá cả đắt nhất, khó gỡ và khó thay thế nhưng có ưu điểm là nhỏ gọn.\r\n\r\nChỉnh đèn bàn phím cơ bằng phím cứng\r\nLưu ý: Bảng bên dưới đây chỉ mang tính tham khảo (trích từ sản phẩm MASTERKEYS MK750), chế độ đèn, cách bật, tắt cụ thể còn tùy vào loại, bố cục hay hãng sản xuất bàn phím khác nhau. Để biết chính xác phím chức năng, bạn nên xem hướng dẫn đi kèm sản phẩm.\r\n\r\n\r\n\r\nCác bạn có thể thực hiện chỉnh đèn bàn phím cơ bằng cách nhấn tổ hợp phím Fn+1 đến Fn+8.', 'uploads/id705.jpg', '2024-03-19', 21, 82, 1802, 0, 1),
(706, 'vi', 'Top 5 món ăn đường phố Hà Nội', 'Khám phá những món ăn vặt ngon nhất của Thủ đô, từ phở cuốn đến bánh mì que...', 'Hà Nội nổi tiếng với ẩm thực đường phố đa dạng và hấp dẫn. Bài viết này giới thiệu top 5 món ăn vặt không thể bỏ qua khi đến Thủ đô. Chúng tôi khám phá hương vị độc đáo của phở cuốn, sự giòn tan của bánh mì que, vị ngọt thanh của chè, và cảm giác mát lạnh từ kem dừa. Mỗi món ăn không chỉ thể hiện văn hóa ẩm thực phong phú của Hà Nội, mà còn mang đến những trải nghiệm khó quên cho thực khách. Bài viết cũng cung cấp thông tin về những địa chỉ uy tín, giá cả hợp lý, và lời khuyên khi thưởng thức ẩm thực đường phố tại Hà Nội.', 'uploads/id706.webp', '2024-03-20', 6, 12, 3000, 0, 1),
(707, 'en', 'Hướng dẫn cách chỉnh đèn bàn phím cơ đơn giản, chi tiết', '﻿Bàn phím cơ có chức năng đổi màu đèn giúp không gian chơi game của game thủ trở nên thú vị hơn. Tuy nhiên nhiều người còn chưa biết cách bật đèn hay cách đổi màu đèn bàn phím cơ. Hãy cùng Blessing Keyboard hướng dẫn bạn chi tiết trong bài viết dưới đây nhé!', 'Bàn phím cơ là gì?\r\n\r\n\r\nBàn phím cơ là loại bàn phím sử dụng công tắc cơ học (Switch) trên từng phím, tạo cảm giác gõ có độ nảy tốt, êm ái cùng độ phản hồi cao, bền bỉ và giảm thiểu chứng đau đầu ngón tay.\r\n\r\n\r\nĐèn bàn phím cơ là gì? Có mấy loại?\r\n  Đèn bàn phím cơ là dãy đèn LED được thiết kế nằm dưới bàn phím cơ, có chức năng phát sáng giúp người dùng dễ dàng thực hiện các thao tác trên bàn phím trong điều kiện thiếu ánh sáng.\r\n\r\n  Có 2 loại là đèn LED đơn sắc và đèn LED RGB. Đèn LED đơn sắc chỉ thể hiện được một màu cố định còn đèn LED RGB có đến tận ba màu bao gồm đỏ, xanh lá và xanh dương nên đèn LED RGB sẽ có giá thành cao hơn đèn LED đơn sắc.\r\n\r\n  Ngoài ra, nó còn được phân loại là LED tròn, vuông và dán. LED tròn là loại đèn phổ biến nhất, dễ thay thế và có giá thành rẻ. LED vuông thường được bán tại các cửa hàng chuyên dụng cho bàn phím cơ, nó có ánh sáng đẹp và giá cả đắt hơn LED tròn. Còn LED dán có giá cả đắt nhất, khó gỡ và khó thay thế nhưng có ưu điểm là nhỏ gọn.\r\n\r\n\r\nChỉnh đèn bàn phím cơ bằng phím cứng\r\nLưu ý: Bảng bên dưới đây chỉ mang tính tham khảo (trích từ sản phẩm MASTERKEYS MK750), chế độ đèn, cách bật, tắt cụ thể còn tùy vào loại, bố cục hay hãng sản xuất bàn phím khác nhau. Để biết chính xác phím chức năng, bạn nên xem hướng dẫn đi kèm sản phẩm.\r\n\r\nCác bạn có thể thực hiện chỉnh đèn bàn phím cơ bằng cách nhấn tổ hợp phím Fn+1 đến Fn+8, chức năng của từng tổ hợp phím như sau:\r\n\r\nTổ hợp phím: Fn + 1. Hiển thị: Hiệu ứng LED đơn sắc. Ghi chú: Nhấn nhiều Fn+1 để đổi màu\r\n\r\nTổ hợp phím: Fn + 2. Hiển thị: Đèn chuyển đổi liên tiếp 7 màu. Ghi chú: Tốc độ chậm, các màu luân phiên nhau.\r\n\r\nTổ hợp phím: Fn + 3. Hiển thị: Đổi màu theo ý thích. Ghi chú: Không nhiều bàn phím hỗ trợ.\r\n\r\nTổ hợp phím: Fn + 4. Hiển thị: 7 màu sáng lên rồi mờ dần. Ghi chú: Không nhiều bàn phím hỗ trợ.\r\n\r\nTổ hợp phím: Fn + 5. Hiển thị: Chọn màu yêu thích. Ghi chú: Ấn nút nào thì nút đó mới sáng.\r\n\r\nTổ hợp phím: Fn + 6. Hiển thị: Hiệu ứng ánh sao lấp lánh. Ghi chú: Nhấn lại Fn+6 nếu muốn đổi màu.\r\n\r\nTổ hợp phím: Fn + 7. Hiển thị: Hiệu ứng sóng vỗ. Ghi chú: Không.\r\n\r\nTổ hợp phím: Fn + 8. Hiển thị: Hiệu ứng sóng dạt hai bên\r\n. Ghi chú: Không.\r\n\r\n\r\nNgoài ra, đối với một số hãng, bộ hot key để chỉnh LED nền bàn phím chính là các phím mũi tên. Không chỉ bật, tắt đèn nền mà các phím này còn có chức năng chỉnh tốc độ đèn nhảy, cường độ sáng của đèn LED,...\r\n\r\n\r\n\r\n\r\n', 'upload/phanloai.webp', '2024-03-21', 19, 1, 2527, 1, 1),
(708, 'vi', 'Bí quyết chăm sóc cây cảnh trong nhà', 'Hướng dẫn chi tiết cách chăm sóc các loại cây cảnh phổ biến để không gian sống thêm xanh mát...', 'Sau một loạt các cuộc điều tra và phân tích, các nhà khoa học đã phát hiện ra rằng việc sử dụng điện thoại di động trong thời gian dài có thể gây ra nhiều vấn đề về sức khỏe, đặc biệt là đối với hệ thần kinh. Bài viết này trình bày các kết quả nghiên cứu mới nhất về tác động của sóng điện từ từ điện thoại di động lên não bộ và các cơ quan khác. Chúng tôi cũng thảo luận về những biện pháp phòng ngừa mà người dùng có thể áp dụng để giảm thiểu rủi ro, cũng như các chính sách đang được đề xuất để kiểm soát việc sử dụng điện thoại di động một cách an toàn.', 'uploads/id708.jpg', '2024-03-22', 20, 24, 1801, 0, 1),
(709, 'vi', 'Hướng Dẫn Cách Thay Switch Bàn Phím Cơ Và Một Vài Lưu Ý Cần Biết', 'Nếu bạn đang có ý định custom bàn phím cơ của mình sau một khoản thời gian sử dụng, vây thay switch bàn phím cơ như thế nào, bắt đầu từ đâu và cần chuẩn bị những dụng cụ gì là những câu hỏi mà ai cũng gặp phải. Dưới đây là một số hướng dẫn và kinh nghiệm cách thay Switch bàn phím cơ từ các chuyên viên tại Blessing \r\n\r\n ', 'Khi nào cần thay switch bàn phím cơ?\r\n \r\n\r\nTrong quá trình sử dụng bàn phím cơ, bên cạnh việc cần phải vệ sinh để tránh những yếu tố bên ngoài tác động đến chất lượng. Người dùng vẫn có thể gặp một số lỗi như ấn phím không được, double-click (nhấp đúp), triple-click (nhấn 3 lần) hay nhấn một phím lại hiện lên nhiều ký tự khác nhau.\r\nHơn hết, một trong những lý do gây khó chịu nhất mà cần thay switch chính là người dùng không nghe được tiếng click quen thuộc hay cảm giác ấn không còn mượt. Nếu phải gặp một trong những dấu hiệu trên thì đã đến lúc bạn nên tiến hành thay switch cho chiếc bàn phím cơ của mình rồi đấy.\r\n\r\n \r\nĐể tiến hành thay switch cho bàn phím cơ sẽ không hề khó như bạn nghĩ. Đặc biệt, nếu cẩn thận hơn bạn có thể tiến hành thay switch tại nhà đấy nhé!\r\n\r\nCần chuẩn bị gì để tiến hành thay switch bàn phím cơ?\r\nTrước khi thực hiện các bước thay switch bàn phím cơ, bạn cần chuẩn bị một số dụng cụ cần thiết sau: Hàn sắt, bơm hàn, hàn cấp điện tử, keypuller hoặc dùng O-ring, tua vít nhỏ, thanh nâng để mở vỏ bàn phím, công tắc switch bàn phím thay thế tương thích, nhíp hoặc kìm nhỏ, đèn Led tương ứng và máy cắt dây.\r\n\r\n \r\nLưu ý: Khi chuẩn bị dụng cụ để thay các công tắc cho bàn phím chính là việc chọn được dòng switch phù hợp với nhà sản xuất. Nhằm tránh được tình trạng các khớp công tắc không khớp với mề mặt tiếp xúc với bản mạch.\r\n\r\nHướng dẫn cách thay switch bàn phím cơ đơn giản\r\nSau khi đã chuẩn bị dụng cụ để thay công tắc switch như trên bạn chỉ cần thực hiện một cách tỉ mỉ, cẩn thận với một số bước đơn giản dưới đây.\r\n\r\nBước 1: Tiến hành tháo rời bàn phím một cách thật cẩn thận.\r\nTrước hết bạn cần ngắt kết nối giữa bàn phím với hệ thống PC của mình rồi tiến hành bước tháo rời bàn phím.\r\n\r\nSau khi tiến hành tháo keycaps bằng keypuller, đối với một số loại bàn phím đơn giản bạn chỉ cần gỡ ốc vít ở các cạnh ra (nhớ dùng một chiếc hộp nhỏ để đựng, tránh rơi mất). Các kiểu phức tạp hơn thì tháo keycap, gỡ bít nhựa, tháo ốc vít, chân giữ ra khỏi bàn phím.\r\n\r\nKhi đã tháo gỡ hoàn toàn thì anh em sẽ thấy toàn cảnh bảng mạch in phía trong của bàn phím gồm một loạt các công tắc với tấm kim loại.\r\n\r\nBước 2: Chuẩn bị khử hàn cho bản mạch.\r\nLàm nóng hàn và máy bơm hàn, lật ngược PCB lại trên mặt bàn sao cho mặt sau hướng lên trên và các công tắc nằm hẳn trên bàn. Nhưng trước hết, một trong những lưu ý chính là việc bạn phải làm sạch bản mạch.\r\n\r\nKhi máy hàn đủ nóng hãy tiến hành làm sạch các chất cặn bị oxy hóa sau một khoản thời gian sử dụng. Sau đó, nhấn đầu nhọn của máy hàn vào ngạnh điện của switch cần thay để làm tan chảy mối hàn cũ.\r\n\r\nKhi mối hàn đã chuyển sang dạng lỏng hãy nhanh dẹp mỏ hàn qua một bên, chuyển qua dùng bơm hàn lên trên đỉnh mối hàn và hút hết phần chất lỏng trước khi nguội và đông cứng lại. Bước này có thể lặp đi lặp lại hai đến ba lần tùy theo kích cỡ mối hàn. Tương tự làm như vậy cho tiếp điểm thứ hai của switch.\r\n\r\nLưu ý: Hãy luôn làm sạch que hàn trong toàn bộ quá trình và cẩn thận để tay không chạm vào vật liệu không dẫn điện của PCB kẻo làm hỏng các phần còn lại trên bảng mạch bàn phím cơ. Đồng thời tiếp tục lặp lại thao tác này cho các chân của LED (chỉ áp dụng cho trường hợp Led đính trên switch). \r\n\r\nBước 3: Tháo các công tắc switch cũ ra khỏi bàn phím.\r\n\r\nKhi đã khử các mối hàn cũ, việc làm đơn giản lúc này sẽ tiến hành gỡ switch cũ ra khỏi bảng mạch. Theo kinh nghiệm của bản thân khi gỡ phần Led ra là cần ghi chú kỹ hướng nằm của led trên để sau này đặt lại đúng vị trí. Đặc biệt, là trên các dòng bàn phím bluetooth gaming.\r\n\r\nNếu bàn phím dùng switch gắn PCB, chỉ cần rút nó ra bằng ngón tay hoặc một chiếc kìm nhỏ.\r\n\r\nĐối với một số dòng switch được gắn trên tấm nhựa hoặc kim loại, bạn cần ấn xuống và lắc nhẹ để rút switch ra khỏi bề mặt kết nối. Nếu trong quá trình tháo, lắp switch gặp một số tình trạng cứng hoặc gặp khó khăn thì hãy đưa lại gần để xem kỹ coi mối hàn cũ đã thật sự bong ra hết chưa hay còn sót ở phần chân. Để tránh ảnh hưởng đến chất lượng của bảng mạch.\r\n\r\nBước 4: Lắp switch mới đã chuẩn bị vào bàn phím.\r\nSau khi đã tháo các switch cũ bạn chỉ cần kiểm tra công tắc mới lần nữa trước gắn vào đảm bảo hai chân của switch thẳng không có vết chất liệu thừa nào.\r\n\r\nĐến đây, các thao tác lắp gần như vô cùng đơn giản, bạn chỉ cần cố định các switch mới bằng các mối hàn để gắn cố định switch mới vào PCB và đóng mạch hoàn chỉnh. Sau khi làm sạch máy hàn, đặt lên ngạnh của switch để làm nóng phần kim loại trong vài giây, sau đó cẩn thận cho dây hàn vào vị trí để làm nóng xung quanh pin và phần tiếp xúc điện.\r\n\r\nĐối với một số dòng switch có hỗ trợ đèn Led thì bạn cần lắp một cách thật cẩn thận và cân chỉnh lại cho đúng hướng. Sau khi hàn xong có thể uốn cong phần dây của Led một chút để giữ nó vững đúng vị trí và cắt các dây gần với điểm hàn để tăng thêm phần thẩm mỹ và gọn gàng.\r\n \r\nLưu ý: Chỉ nên dùng đủ chất hàn nóng chảy tại chỗ để bao quanh toàn phần chân của switch nhưng không quá nhiều dễ chảy tràn vào vật liệu không dẫn điện của mạch.\r\n\r\nBước 5: Kiểm tra chất lượng các switch mới thay\r\nĐể kiểm tra việc thay switch mới thay có hoạt động ổn định không? Bạn chỉ cần di chuyển bảng mạch với switch mới thay và kết nối với máy tính đang mở để thử.\r\n\r\n \r\n\r\nĐây cũng là cách mình thường chọn để kiểm tra sau mỗi lần thay switch bàn phím đã ổn chưa và vận hành thế nào bằng cách mở trình duyệt web, xử lý các thao tác soạn thảo văn bản. Nếu không còn lỗi như trước khi thay switch thì quá trình thay switch đã thành công.\r\n\r\nBước 6: Lắp lại bàn phím và sử dụng.\r\n\r\nSau khi kiểm tra switch đã được thay, bạn chỉ cần đặt bảng mạch trở lại vào trong vỏ keyboard, đóng chặt lại và gắn lại các ốc vít đã mở ra trước đó. Đồng thời gắn từng keycap vào đúng vị trí bang đầu và trải nghiệm.\r\n\r\nTổng kết\r\nVới một số kinh nghiệm và hướng dẫn thay switch bàn phím cơ trên đây từ Blessing Keyboard chắc chắn bạn sẽ có thể từ custom hoặc thay switch bàn phím cơ của mình một cách nhanh chóng.\r\n\r\n\r\nNếu bạn có nhu cầu thay hoặc mua một chiếc bàn phím cơ, bàn phím cơ không dây mới hãy đến ngay các chi nhánh của TNC Store để trải nghiệm sản phẩm trước khi mua để có sự lựa chọn hợp lý về nhu cầu sử dụng và giá cả nhé!\r\n ', 'upload/tt2.jpg', '2024-03-23', 21, 82, 2204, 1, 1),
(710, 'en', 'Nên Mua Bàn Phím Cơ Switch Nào? Cách Lựa Chọn Switch Với Từng Đối Tượng Sử Dụng', 'Khi nhắc tới một chiếc bàn phím cơ, điều quan trọng nhất phải nhắc tới đó chính là Switch, đặc trưng tiêu biểu đã làm nên vị thế quan trọng của những chiếc bàn phím cơ trong lòng người sử dụng. Với những đặc điểm riêng biệt, phù hợp với nhu cầu của từng khách hàng, việc lựa chọn nên mua bàn phím cơ switch nào là điều mà nhiều người quan tâm. Trong bài viết này, Blessing  sẽ giúp bạn hiểu rõ hơn cách lựa chọn switch với từng đối tượng sử dụng.', 'Switch là gì và sự quan trọng của switch trên bàn phím cơ \r\n \r\n\r\nSwitch là phần công tắc phím được đặt phần phía dưới của mỗi phím của một bàn phím cơ. Đặc điểm chính của Switch là tạo ra độ nhạy và phát ra âm thanh khi sử dụng chính là những tiếng clicky. Mỗi bàn phím cơ sẽ được trang bị từng công nghệ Switch khác nhau theo đặc điểm riêng của nhà sản xuất.\r\n\r\nĐiểm cốt lõi trong mỗi bàn phím cơ chính là nó sử dụng công nghệ Switch nào. Switch giúp so sánh chất lượng, đánh giá sự hài lòng và là điểm giúp thương hiệu đứng sau thu hút đông đảo các khách hàng. Bên cạnh những yếu tố như kích thước, thiết kế, hệ thống đèn LED,...thì Switch xuất hiện như làm tăng thêm tính chất lượng, sự hoàn hảo và hiệu suất làm việc.\r\n\r\nNguyên tắc quan trọng khi lựa chọn switch, Trước khi lựa chọn switch cần xem xét kỹ:\r\n\r\n- Phản hồi xúc giác: Khi chạm và ấn phím xuống bạn cảm thấy độ đàn hồi hay độ nảy của phím ra sao. Đây sẽ là nguyên tắc đầu tiên khi lựa chọn bất kỳ bàn phím nào, vì dù có nhiều tính năng hiện đại thế nào, điều quan trọng của bàn phím cơ vẫn là cảm giác gõ.\r\n- Phản hồi âm thanh: Sau hoạt động ấn phím thì có tạo ra âm thanh nào không. Thêm nữa môi trường công việc hiện tại của bạn như thế nào, có phù hợp với switch yên tĩnh hay có thể đi kèm tiếng click không?\r\n\r\n- Lực truyền động: Đây là lực cần thiết từ hành động gõ của tay để kích hoạt phím. Hay còn cách gọi khác là phím nặng tay hay không. Bạn cần xác định rõ mục đích dùng bàn phím cơ là gì để có lựa chọn phù hợp.\r\n\r\n\r\nChọn loại switch nào hợp với bạn nhất?\r\n \r\nCó rất nhiều loại switch khác nhau cho các bàn phím cơ khác nhau. Một số hãng phổ biến như: Razer với switch cơ học Razer, switch quang học Razer, Steelseries với switch Steelseries QX2,... Vậy nên, bạn có thể chọn một trong các loại switch sau nhé:\r\n- Clicky và có Tactile.\r\n- Không Clicky và có Tactile.\r\n- Linear và không Clicky.\r\n- Switch Low-profile.\r\n- Nhóm switch Topre: Soft-Tactile là khái niệm chỉ switch Topre có mà thôi.\r\n\r\n\r\nCách lựa chọn switch với từng đối tượng sử dụng\r\n\r\n* Game thủ\r\n \r\nNếu bạn là một game thủ thì Blue switch, Red switch hoặc Low profile switch, Topre switch phù hợp với bạn nhất.\r\n\r\nBạn là một game thủ chơi những tựa game bắn súng, low profile red và Red switch sẽ rất phù hợp với bạn. Switch sẽ hỗ trợ bạn nhấn chuẩn xác và thật nhanh.\r\n\r\nBạn là một game thủ chơi các tựa game MOBA, chiến thuật như Liên Minh và Dota 2 thì những cú nhấn chuẩn xác, những chuỗi phím đúng thứ tự có thể thay đổi cục diện của một trận đấu. Bạn nên sử dụng chiếc bàn phím cơ blue switch vì đây là loại switch cho phản hồi về tay nhiều nhất và rất thích hợp. Ngoài ra, bạn có thể thử trải nghiệm loại switch khá đó là Topre thường được sử dụng trên các sản phẩm bàn phím Realforce cũng rất phù hợp với bạn bởi đây là loại switch cực nhạy. Bạn chỉ cần nhấn vừa đến điểm nhận phím là nhận lệnh ngay hoặc bạn cũng có thể tùy chỉnh độ nhạy trên từng phím với một số phiên bản Realforce cao cấp.\r\n\r\n* Người sợ tiếng ồn\r\n\r\nNếu bạn là một người sợ tiếng ồn ảnh hưởng đến mọi người dùng quanh, bạn không nên chọn Blue switch. Âm thanh mà switch này tạo nên có thể khiến cho không gian của bạn không thể yên tĩnh. Vì vậy, bạn nên chọn những loại switch sau theo thứ tự từ âm thanh vừa đủ nghe đến êm nhất: Glorious Panda, Brown switch, Red switch, low profile red switch, Black switch, Pink switch, Topre Switch.\r\n\r\n* Người thích nghe tiếng gõ phím\r\n\r\nNếu bạn thích tận hưởng công việc gõ phím cường độ mạnh của mình, chiếc bàn phím cơ sử dụng Blue switch cũng rất đáng thử. Còn nếu bạn là một người làm việc với tính hiệu quả được thể hiện bằng số lượng con chữ thì cả Blue, Brown, Red, Black, Low profile, Topre, Glorious Panda đều có thể lựa chọn. \r\n\r\n\r\nLời Kết\r\n \r\nQua bài viết này, mong rằng những thông tin này có thể giúp bạn hiểu rõ hơn về switch cũng như bàn phím cơ. Từ đây, bạn có thể dễ dàng lựa chọn loại switch phù hợp với nhu cầu sử dụng khi mới trải nghiệm bàn phím cơ. Nếu bạn đã chọn được cho mình một mẫu bàn phím cơ với switch phù hợp thì bạn sẽ không còn muốn trở lại với bàn phím truyền thống nữa. Hi vọng bài viết sẽ hữu ích với bạn.\r\n\r\n', 'upload/tt3.jpg', '2024-03-24', 18, 40, 1901, 1, 1),
(711, 'vi', 'Những điểm du lịch mới nổi ở Việt Nam năm 2024', 'Khám phá các địa điểm du lịch độc đáo và ít người biết đến tại Việt Nam...', 'Tại những vùng núi cao phía Bắc Việt Nam, cây mắc ca đã trở thành một nguồn thu nhập quan trọng cho người dân địa phương. Bài viết này khám phá quá trình trồng trọt, chăm sóc và thu hoạch mắc ca, cũng như các thách thức và cơ hội mà ngành này mang lại. Chúng tôi cũng phân tích tiềm năng xuất khẩu của mắc ca Việt Nam, so sánh với các thị trường lớn khác trên thế giới. Bài viết không quên nhấn mạnh vai trò của mắc ca trong việc cải thiện đời sống người dân, bảo vệ môi trường, và phát triển kinh tế bền vững.', 'uploads/id711.jpg', '2024-03-25', 3, 3, 2804, 0, 1),
(712, 'vi', 'Cách tạo động lực học tập hiệu quả cho sinh viên', 'Những phương pháp giúp sinh viên duy trì động lực và cải thiện kết quả học tập...', 'Với sự bùng nổ của các dịch vụ phát trực tuyến, ngành công nghiệp phim ảnh đang trải qua một cuộc cách mạng. Bài viết này phân tích cách mà các nền tảng như Netflix, Disney+, và các dịch vụ khác đang thay đổi cách chúng ta xem phim. Chúng tôi cũng thảo luận về tác động của phát trực tuyến đối với ngành sản xuất phim truyền thống, từ việc giảm số lượng khán giả tại rạp chiếu phim đến sự thay đổi trong cách tạo ra và phân phối nội dung. Bài viết cũng đưa ra những dự đoán về tương lai của ngành công nghiệp phim ảnh trong thời đại số.', 'uploads/id712.jpg', '2024-03-26', 78, 4, 1618, 0, 1),
(713, 'en', 'Vì Sao Đèn Bàn Phím Cơ Keychron Không Sáng?', 'Trong quá trình sử dụng bàn phím cơ Keychron, đôi khi bạn sẽ gặp phải một số vấn đề như switch bị kẹt, tình trạng double phím… và lỗi liên quan đến đèn led bàn phím với bàn phím cơ có led cũng khá thường gặp. Trong bài viết này, Blessing Keyboard sẽ cùng bạn tìm câu trả lời cho vấn đề Vì sao đèn bàn phím cơ Keychron không sáng nhé!', '2 loại LED bàn phím cơ\r\n \r\n\r\nĐèn LED bàn phím cơ là dãy đèn được thiết kế đặc biệt phía dưới bàn phím cơ, có chức năng phát sáng giúp người sử dụng dễ dàng thực hiện các thao tác trên bàn phím trong điều kiện thiếu ánh sáng cũng như thể hiện được phong cách riêng của người dùng. Đây là loại bàn phím mà nhiều game thủ rất ưa thích, có thể thỏa mãn nhu cầu chơi game, thi đấu bất kể ngày, đêm.\r\n\r\nĐèn Led RGB\r\nBàn phím cơ được trang bị đèn Led RGB là những chiếc bàn phím sự phối hợp đèn về cường độ ánh sáng của 3 nguồn ánh sáng cơ bản là: Màu đỏ (Red), màu xanh lá (Green) và màu xanh dương (Blue), cần 4 chân cấp điện và firmware phức tạp để điều khiển. \r\n\r\nLed đơn sắc\r\nMỗi bóng led chỉ thể hiện được một màu cố định, người dùng chỉ có khả năng tùy chỉnh độ sáng tối theo nhu cầu.\r\n\r\nĐèn bàn phím cơ keychron không sáng vì sao?\r\nNguyên nhân 1: Người dùng vô tình tắt chức năng sáng đèn của bàn phím\r\n \r\nNguyên nhân đầu tiên có thể kể đến là trong quá trình sử dụng vô tình tắt chức năng sáng đèn của bàn phím. Lúc này bạn cần nhấn tổ hợp phím Fn + Phím biểu tượng đèn Keyboard (tùy từng model mà vị trí phím này khác nhau) để kiểm tra và kích hoạt lại. \r\n\r\nNguyên nhân 2: Bàn phím bám bụi, chập mạch hoặc lỗi phần mềm\r\n \r\n\r\nNguyên nhân kế tiếp là do bàn phím led sau 1 thời gian sử dụng bám bụi bẩn hoặc bị chập mạch, lỗi phần mềm. Lúc này, bạn sử dụng dung dịch chuyên dụng vệ sinh lại bàn phím cẩn thận cho bụi bẩn trôi ra ngoài, để khô ráo tầm 1 giờ mới mang ra sử dụng lại, nếu may mắn đèn bàn phím sẽ hoạt động bình thường như trước.\r\n\r\nSau khi thực hiện thao tác trên màn led bàn phím cơ Keychron vẫn không sáng thì khả năng bàn phím đang gặp lỗi liên quan tới lỏng cable đèn bàn phím hay lỗi bàn phím hoặc thậm chí nặng hơn là led đã bị cháy, bị hỏng. Lúc này, bàn phím của bạn cần có sự kiểm tra, thay thế từ các chuyên gia có kinh nghiệm nên việc cần làm lúc này là bạn mang ngay bàn phím đến các cơ sở sửa chữa uy tín, chính hãng để được hỗ trợ kịp thời nhé.\r\n\r\n \r\nLời Kết\r\n \r\nBạn có thể thấy rằng để bàn phím led có tuổi thọ tốt nhất ngoài tần suất sử dụng thì các yếu tố  như thực hiện vệ sinh định kỳ đặc biệt là chất lượng led bàn phím Keychron có tốt không đóng vai trò then chốt. Blessing Keyboard tự tin cung cấp cho bạn một giải pháp hoàn hảo về hệ thống bàn phím cơ Keychron có led uy tín, giá thành hợp lý, phong cách đa dạng, thỏa mãn mọi nhu cầu.\r\n', 'upload/tt1.jpg', '2024-03-27', 21, 82, 2110, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_form`
--

CREATE TABLE `user_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Phúc', 'a@com', '0cc175b9c0f1b6a831c399e269772661', 'user'),
(2, '', 'admin@example.com', '6dd544e6b7ab3369a62d4c994362a3cc', 'admin'),
(3, '', 'admin@example.com', '6dd544e6b7ab3369a62d4c994362a3cc', 'admin'),
(4, 'a', 'huynhbaophuc2k3@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `image_library`
--
ALTER TABLE `image_library`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `productdb`
--
ALTER TABLE `productdb`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `producttb`
--
ALTER TABLE `producttb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `tin`
--
ALTER TABLE `tin`
  ADD PRIMARY KEY (`idTin`);

--
-- Chỉ mục cho bảng `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `image_library`
--
ALTER TABLE `image_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `productdb`
--
ALTER TABLE `productdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `producttb`
--
ALTER TABLE `producttb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tin`
--
ALTER TABLE `tin`
  MODIFY `idTin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=714;

--
-- AUTO_INCREMENT cho bảng `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `image_library`
--
ALTER TABLE `image_library`
  ADD CONSTRAINT `image_library_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `producttb` (`id`);

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `producttb` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
