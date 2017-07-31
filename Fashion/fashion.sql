-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2017 at 07:22 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashion`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `brand_slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `brand_status` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_slug`, `brand_status`) VALUES
(1, 'Mercedes Ben', 'mercedes-ben', 0),
(2, 'Lexus', 'lexus', 0),
(3, 'Mazda', 'mazda', 0),
(4, 'BMW', 'BMW', 0),
(5, 'Honda', 'honda', 0),
(6, 'Hyundai', 'hyundai', 0),
(7, 'Audi', 'audi', 0),
(8, 'Chevrolet', 'chevrolet', 0),
(9, 'Mitsubishi', 'mitsubishi', 0),
(10, 'Suzuki', 'suzuki', 0),
(11, 'Toyota', 'toyota', 0),
(12, 'Ford', 'ford', 0),
(13, 'KIA', 'kia', 0),
(17, 'Tên hiệu xe cần thêm', 'ten-hieu-xe-can-them', 0),
(18, 'Isuzu', 'isuzu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cate_slug` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cate_parent` int(11) NOT NULL,
  `cate_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cate_order` tinyint(4) NOT NULL,
  `cate_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cate_id`, `cate_name`, `cate_slug`, `cate_parent`, `cate_img`, `cate_order`, `cate_status`) VALUES
(1, 'Phối đồ thời trang', 'phoi-do-thoi-trang', 0, '', 1, 0),
(2, 'Phụ kiện thời trang', 'phu-kien-thoi-trang', 0, '', 2, 0),
(3, 'Cập nhật xu hướng', 'cap-nhat-xu-huong', 0, '', 3, 0),
(4, 'Làm đẹp', 'lam-dep', 0, '', 4, 0),
(5, 'Thời trang công sở', 'thoi-trang-cong-so', 1, 'xe-du-lich-4-cho.jpg', 1, 0),
(6, 'Thời trang dạo phố', 'thoi-trang-dao-pho', 1, 'xe-du-lich-7-cho.jpg', 2, 0),
(7, 'Xe du lịch 16 chỗ', 'xe-du-lich-16-cho', 1, 'xe-du-lich-16-cho.jpg', 3, 0),
(8, 'Xe du lịch 29 chỗ', 'xe-du-lich-29-cho', 1, 'xe-du-lich-29-cho.jpg', 4, 0),
(9, 'Xe du lịch 35 chỗ', 'xe-du-lich-35-cho', 1, 'xe-du-lich-35-cho.jpg', 5, 0),
(10, 'Xe du lịch 45 chỗ', 'xe-du-lich-45-cho', 1, 'xe-du-lich-45-cho.jpg', 6, 0),
(11, 'Trang chủ', 'trang-chu', 0, '', 0, 0),
(13, 'Xe tự lái 4 chổ', 'xe-tu-lai-4-cho', 2, 'xe-tu-lai-4-cho.jpg', 1, 0),
(14, 'xe tự lái 7 chỗ', 'xe-tu-lai-7-cho', 2, 'xe-tu-lai-7-cho.jpg', 2, 0),
(15, 'Xe tự lái 16 chổ', 'xe-tu-lai-16-cho', 2, 'xe-tu-lai-16-cho.jpg', 3, 0),
(16, 'xe tự lái 29 chỗ', 'xe-tu-lai-29-cho', 2, 'xe-tu-lai-29-cho.jpg', 4, 0),
(17, 'Xe tự lái 35 chổ', 'xe-tu-lai-35-cho', 2, 'xe-tu-lai-35-cho.jpg', 5, 0),
(18, 'xe tự lái 45 chỗ', 'xe-tu-lai-45-cho', 2, 'xe-tu-lai-45-cho.jpg', 6, 0),
(19, 'xe cưới hỏi 4 chỗ', 'xe-cuoi-hoi-4-cho', 3, 'xe-cuoi-hoi-4-cho.jpg', 1, 0),
(20, 'xe cưới hỏi 7 chỗ', 'xe-cuoi-hoi-7-cho', 3, 'xe-cuoi-hoi-7-cho.jpg', 2, 0),
(21, 'xe cưới hỏi 16 chỗ', 'xe-cuoi-hoi-16-cho', 3, 'xe-cuoi-hoi-16-cho.jpg', 3, 0),
(22, 'xe cưới hỏi 29 chỗ', 'xe-cuoi-hoi-29-cho', 3, 'xe-cuoi-hoi-29-cho.jpg', 4, 0),
(23, 'xe cưới hỏi 35 chỗ', 'xe-cuoi-hoi-35-cho', 3, 'xe-cuoi-hoi-35-cho.jpg', 5, 0),
(24, 'xe cưới hỏi 45 chỗ', 'xe-cuoi-hoi-45-cho', 3, 'xe-cuoi-hoi-45-cho.jpg', 6, 0),
(25, 'xe thuê tháng 4 chỗ', 'xe-thue-thang-4-cho', 4, 'xe-thue-thang-4-cho.png', 1, 0),
(26, 'xe thuê tháng 7 chỗ', 'xe-thue-thang-7-cho', 4, 'xe-thue-thang-7-cho.jpg', 2, 0),
(27, 'xe thuê tháng 16 chỗ', 'xe-thue-thang-16-cho', 4, 'xe-thue-thang-16-cho.png', 3, 0),
(30, 'thuê xe tháng 29 chỗ', 'thue-xe-thang-29-cho', 4, 'xe-thue-thang-29-cho.1492661133.JPG', 4, 0),
(31, 'thuê xe tháng 35 chỗ', 'thue-xe-thang-35-cho', 4, 'xe-thue-thang-35-cho.jpg', 5, 0),
(32, 'thuê xe tháng 45 chỗ', 'thue-xe-thang-45-cho', 4, 'xe-thue-thang-45-cho.jpg', 6, 0),
(33, 'Sức khỏe', 'suc-khoe', 0, '', 8, 0),
(34, 'Tâm sự', 'tam-su', 0, '', 9, 0),
(35, 'Giới thiệu', 'gioi-thieu', 0, '', 7, 0),
(36, 'Liên hệ', 'lien-he', 0, '', 6, 0),
(38, 'Tình yêu', 'tinh-yeu', 34, 'xe-thue-thang-16-cho.png', 1, 0),
(39, 'Hôn nhân gia đình', 'hon-nhan-gia-dinh', 34, 'xe-thue-thang-45-cho.jpg', 2, 0),
(40, 'Chuyện công sở', 'chuyen-cong-so', 34, 'xe-du-lich-4-cho.jpg', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `color_slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `color_name`, `color_slug`) VALUES
(1, 'Đen', 'den'),
(2, 'Trắng', 'trang'),
(3, 'Đỏ', 'do'),
(4, 'Xanh', 'xanh'),
(5, 'Vàng', 'vang'),
(6, 'Cam', 'cam');

-- --------------------------------------------------------

--
-- Table structure for table `infor`
--

CREATE TABLE `infor` (
  `infor_id` int(11) NOT NULL,
  `infor_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `infor_detail` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `infor`
--

INSERT INTO `infor` (`infor_id`, `infor_name`, `infor_detail`) VALUES
(1, 'Số hotline', '090 134 5959  - (+84) 90 134 5959'),
(2, 'Email', 'vivuhuongly@gmail.com'),
(3, 'Thời gian bắt đầu làm việc', '08:00'),
(4, 'Thời gian hết giờ làm', '22:00'),
(5, 'Địa chỉ công ty', '39/7, Nguyễn Tư Giản, Phường 12, Gò Vấp, Tp. HCM'),
(6, 'Ảnh Logo', 'logo.png'),
(9, 'Liên kết facebook', 'http://fb.com/vivuthuexe'),
(10, 'Liên kết Page Zalo', '#'),
(11, 'Liên kết twitter', 'http://twitter.com/vivuthuexe'),
(12, 'Liên kết instagram', '#'),
(13, 'Chất lượng', 'Sự hài lòng của bạn là chất lượng của chúng tôi'),
(14, 'Nhanh chóng', 'Vivu Thuê Xe sẽ liên hệ với bạn ngay khi nhận book vé'),
(15, 'An toàn', 'Tiêu chí hàng đầu của chúng tôi là  an toàn của khách hàng trên đường.');

-- --------------------------------------------------------

--
-- Table structure for table `kind`
--

CREATE TABLE `kind` (
  `kind_id` int(11) NOT NULL,
  `kind_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kind_slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kind`
--

INSERT INTO `kind` (`kind_id`, `kind_name`, `kind_slug`, `brand_id`) VALUES
(1, 'Camry', 'camry', 11),
(2, 'Highlander', 'highlander', 11),
(3, 'GT86', 'gt86', 11),
(4, 'Zace', 'zace', 11),
(5, 'Innova', 'innova', 11),
(6, 'Vios', 'vios', 11),
(7, 'K3 Cerato', 'k3-cerato', 13),
(8, 'Morning', 'morning', 13),
(9, 'Rio', 'rio', 13),
(10, 'Civic', 'civic', 5),
(11, 'CRV', 'crv', 5),
(12, 'Jazz', 'jazz', 5),
(13, 'Mazda3', 'mazda3', 3),
(14, 'Mirage', 'mirage', 9),
(15, 'Attragea', 'attragea', 9),
(16, 'Outlander Sport', 'outlander-sport', 9),
(17, 'Fiesta', 'fiesta', 12),
(18, 'EcoSport', 'ecosport', 12),
(19, 'New Everest', 'new-everest', 12),
(20, 'Transit', 'transit', 12),
(21, 'MORNING Si', 'morning-si', 13),
(22, 'RIO HATCHBACK', 'rio-hatchback', 13),
(23, 'CERATO HATCHBACK', 'cerato-hatchback', 13),
(24, 'RIO SEDAN', 'rio-sedan', 13),
(25, 'CERATO KOUP', 'cerato-koup', 13),
(26, 'Audi Q7', 'audi-q7', 7),
(27, 'Audi Q3', 'audi-q3', 7),
(28, 'Audi Q6', 'audi-q6', 7),
(29, 'Audi A4', 'audi-a4', 7),
(30, 'Audi Q5', 'audi-q5', 7),
(31, 'BMW X5', 'bmw-x5', 4),
(32, 'BMW 116i', 'bmw-116i', 4),
(33, 'BMW 218i', 'bmw-218i', 4),
(34, 'Sedan', 'sedan', 2),
(35, 'SUV', 'suv', 2),
(36, 'Coupe', 'coupe', 2),
(37, 'GS', 'gs', 2),
(38, 'Swift', 'swift', 10),
(39, 'VITARA', 'vitara', 10),
(40, 'NEW ERTIGA', 'new-ertiga', 10),
(41, 'CIAZ', 'ciaz', 10),
(42, 'MERCEDES C CLASS 2017', 'mercedes-c-class-2017', 1),
(43, 'MERCEDES E CLASS', 'mercedes-e-class', 1),
(44, 'MERCEDES V CLASS', 'mercedes-v-class', 1),
(45, 'Hyundai I10', 'hyundai-i10', 5),
(48, 'Dòng xe mới', 'dong-xe-moi', 16),
(49, 'Tên dòng xe mới', 'ten-dong-xe-moi', 17),
(50, 'Chevrolet Cruze', 'chevrolet-cruze', 8),
(51, 'Chevrolet Spark', 'chevrolet-spark', 8),
(52, 'Sprinter', 'sprinter', 1),
(53, 'Samco', 'samco', 18),
(54, 'Thaco', 'thaco', 6);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `menu_slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `menu_parent` int(11) NOT NULL,
  `menu_order` tinyint(4) NOT NULL,
  `menu_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_slug`, `menu_parent`, `menu_order`, `menu_status`) VALUES
(1, 'Trang chủ', 'trang-chu', 0, 1, 0),
(2, 'Về chúng tôi', 'gioi-thieu', 0, 2, 0),
(4, 'Liên hệ', 'lien-he', 0, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `new_id` int(11) NOT NULL,
  `new_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `new_slug` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `new_desc` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `new_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `new_img` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cate_id` int(11) NOT NULL,
  `new_create` datetime NOT NULL,
  `new_modify` datetime NOT NULL,
  `new_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`new_id`, `new_title`, `new_slug`, `new_desc`, `new_detail`, `new_img`, `cate_id`, `new_create`, `new_modify`, `new_status`) VALUES
(18, '5 mẫu xe đáng chờ đợi sắp ra mắt tại Việt Nam', '5-mau-xe-dang-cho-doi-sap-ra-mat-tai-viet-nam', '<p>Honda Civic đời mới, Mazda CX-3 hay Ford Explorer là những mẫu xe nổi bật sẽ ra mắt thị trường Việt Nam trong tháng 10<br></p>', '<strong>Honda Civic 2016</strong><br />\r\nHonda Civic phiên bản 2016 đã chốt ngày ra mắt thị trường Việt Nam vào 5/10 tại triển lãm Vietnam Motor Show (Hà Nội). Dòng xe này đã được giới thiệu tại Thái Lan vào tháng 3 năm nay.<br />\r\nHonda Civic 2016 trở lại với ngoại hình hoàn toàn khác. Phần đuôi dày hơn, khiến mẫu xe này trông giống một chiếc GT hơn là sedan truyền thống. Đường nét thiết kế gân guốc đang là trào lưu trên các dòng xe Honda thời gian gần đây.<br />\r\n<strong>Mazda CX-3</strong><br />\r\nMazda đang sống những ngày tháng huy hoàng tại Việt Nam, khi liên tiếp vượt qua thương hiệu Toyota để dẫn đầu nhiều phân khúc. Đây là thời điểm để liên doanh Trường Hải tung ra một con bài chiến lược, Mazda CX-3.&nbsp;<br />\r\nCX-3 là mẫu crossover cỡ trung được xây dựng chung hệ khung gầm với Mazda2. Bản concept của&nbsp;Mazda CX-3 được giới thiệu năm 2014, tuy nhiên phiên bản sản xuất mới được giới thiệu cuối năm 2015.', 'ford_everest_1.jpg', 28, '2017-05-06 00:33:55', '2017-05-06 01:05:59', 0),
(19, 'Bí quyết chạy xe tiết kiệm nhiên liệu từ Isuzu Diesel Challenge 2017', 'bi-quyet-chay-xe-tiet-kiem-nhien-lieu-tu-isuzu-diesel-challenge-2017', '<p>\r\n\r\nKhi áp dụng điều kiện đặc biệt trong hành trình Isuzu Diesel Challenge 2017, D-MAX và mu-X đã chứng tỏ khả năng tiết kiệm nhiên liệu ấn tượng.\r\n\r\n<br></p>', '<strong>Khi áp dụng điều kiện đặc biệt trong hành trình Isuzu Diesel Challenge 2017, D-MAX và mu-X đã chứng tỏ khả năng tiết kiệm nhiên liệu ấn tượng.</strong>\r\n<p>Trong điều kiện thực tế được ghi nhận bởi Cục đăng kiểm Việt Nam, Isuzu mu-X đạt mức tiêu hao nhiên liệu 7,25 lít/100 km trên đường hỗn hợp đối với bản 2.5 và 7,41 lít với bản 3.0. Khi được áp dụng những điều kiện đặc biệt trong &ldquo;Hành trình lái xe an toàn và tiết kiệm nhiên liệu&rdquo; - Isuzu Diesel Challenge 2017, D-MAX và mu-X đã tiêu thụ nhiên liệu thấp hơn con số trên.</p>\r\n\r\n<p>Sau hành trình 242 km TP.HCM - Phnompenh, xe mu-X và D-MAX có mức tiêu thụ trung bình là 7,29 lít với dòng xe 2.5L và 7,46 lít với dòng xe 3.0L. Dưới đây là những kỹ năng được hầu hết tài xế áp dụng trong hành trình lái xe an toàn và tiết kiệm nhiên liệu Isuzu Challenge 2017.</p>\r\n\r\n<h3 style=\"color:rgb(34, 34, 34); font-style:normal\"><strong>Giữ khoảng cách an toàn</strong></h3>\r\n\r\n<p>Đây là chia sẻ của anh Nguyễn Văn Thời - giải nhất hành trình với kết quả 5,93 lít/241,6 km trên dòng xe 3.0L. Cụ thể lái xe cần có sự quan sát và phán đoán với tầm nhìn trước mặt luôn ở mức 200-300 m trở lên. Nếu đi quá sát xe trước, lái xe sẽ bị động và khi họ phanh, mình phải thực hiện hiện theo.</p>\r\n\r\n<p>Tình huống này vừa mất an toàn vừa làm xe mất đà (mất trớn), việc tiết kiệm nhiên liệu trở nên khó khăn. Kỹ năng này được anh Thời áp dụng khi lái xe trong mọi hành trình khác nhau, kể cả ở cuộc sống hàng ngày. Nhờ đó anh luôn phán đoán tốt tình huống và sẽ quyết định vượt lên hay buông ga để xe trôi theo đà.</p>\r\n\r\n<h3 style=\"color:rgb(34, 34, 34); font-style:normal\"><strong>Giữ vận tốc xe trung bình 60-70 km/h</strong></h3>\r\n\r\n<p>Xuyên suốt hành trình, đoàn xe duy trì tốc độ đều 60-70 km/h, đi hết số với vòng tua máy thấp nhất để đạt điều kiện vận hành tối ưu. Đây là ngưỡng tiết kiệm nhiên liệu nhất.</p>\r\n\r\n<p>Anh Đoàn Ngọc Anh Vũ (Gò Vấp, TP Hồ Chí Minh) là người cầm lái chiếc xe D-MAX 2.5L, về nhất với con số tiêu hao nhiên liệu ấn tượng: 2,81 lít/242 km. Trong suốt hành trình, anh luôn điều khiển xe chạy với tốc độ không quá 60 km/h. Với vận tốc này, người lái hoàn toàn có thể chủ động và xử lý được mọi tình huống trên đường đi.</p>\r\n<br />\r\n&nbsp;', 'ChevroletCruze_2.jpg', 28, '2017-05-06 00:36:46', '2017-05-06 01:05:16', 0),
(20, '[Quận Gò Vấp] Bán Honda Air Blade giá tốt', 'quan-go-vap-ban-honda-air-blade-gia-tot', '<p>\r\n\r\nSang tên chuyển vùng vô tư. Mua bán tại nhà cho anh em yên tâm. Giá em nó là <b>36tr5</b>\r\n\r\n<br></p>', 'Xe đk 2016. Tình trạng xe còn rất tốt. Máy móc êm, zin bao test, dàn áo bọc keo nguyên con rất đẹp. Bs 60C1-716.50. Odo ~6.000km. Sang tên chuyển vùng vô tư. Mua bán tại nhà cho anh em yên tâm. Giá em nó là <strong>36tr5</strong>, sẽ fix cho ai mua bán nhanh gọn. Nếu bạn nào đang có nhu cầu cần mua thì gọi ngay cho mình qua số <strong>0129 39 78910 (gặp Thịnh)</strong> để biết thêm thông tin nhé. Vài tấm hình của em nó.<br />\r\n<br />\r\n<strong>Honda Air Blade FI</strong><br />\r\nXe đk 9/2011. Tình trạng xe còn rất tốt. Máy móc êm, zin bao test, dàn áo rất đẹp. Bs 60B1-348.59. Odo ~18.000km. Sang tên chuyển vùng vô tư. Mua bán tại nhà cho anh em yên tâm. Giá em nó là <strong>22tr5</strong>, sẽ fix cho ai mua bán nhanh gọn. Nếu bạn nào đang có nhu cầu cần mua thì gọi ngay cho mình qua số <strong>0129 39 78910 (gặp Thịnh)</strong> để biết thêm thông tin nhé. Vài tấm hình của em nó', 'honda.jpg', 29, '2017-05-06 00:42:52', '2017-05-06 01:03:06', 0),
(21, 'Bán nhanh Eos 1100d như mới đầy đủ phụ kiện', 'ban-nhanh-eos-1100d-nhu-moi-day-du-phu-kien', '<p>\r\n\r\nCanon EOS 1100d new 98%, nguyên zin, hoạt động tốt, số shot đã chụp 10k. Hoàn toàn không 1 vết trầy, rất mới. Hoạt động hoàn hảo.<br>Phụ kiện gồm: Dây đeo zin, sạc zin, pin zin, tặng thẻ nhớ 8gb.<br>Giá: 3.200.000 vnđ.<br>Địa chỉ: Q5, HCM\r\n\r\n<br></p>', 'Canon EOS 1100d new 98%, nguyên zin, hoạt động tốt, số shot đã chụp 10k. Hoàn toàn không 1 vết trầy, rất mới. Hoạt động hoàn hảo.<br />\r\nPhụ kiện gồm: Dây đeo zin, sạc zin, pin zin, tặng thẻ nhớ 8gb.<br />\r\nGiá: 3.200.000 vnđ.<br />\r\nĐịa chỉ: Q5, HCM', '20170505121040-185b.jpg', 29, '2017-05-06 00:47:05', '2017-05-06 01:03:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ordercar`
--

CREATE TABLE `ordercar` (
  `order_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `order_date` datetime NOT NULL,
  `customer` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `order_status` int(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ordercar`
--

INSERT INTO `ordercar` (`order_id`, `order_date`, `customer`, `phone`, `address`, `order_status`) VALUES
('1493399161', '2017-04-29 00:06:01', 'jjnj', '0154878898', 'pghgvb', 0),
('1492752244', '2017-04-21 12:24:04', 'Trần Minh Nhật', '0198989896', '56 Tô Hiến Thành, Q, Phú Nhuận, Hà Nội', 1),
('1492373723', '2017-04-17 03:15:23', 'Lại Văn Sâm', '09333333333', '56 Tô Hiến Thành, Q, Phú Nhuận, Hà Nội', 1),
('1492373950', '2017-04-17 03:19:10', 'Trần Anh Tuấn', '0865552321', '47/8 Hàm Tử, Quận 4, TP.HCM', 1),
('1493439230', '2017-04-29 11:13:50', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `order_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `placego` int(11) NOT NULL,
  `placeoff` int(11) NOT NULL,
  `datego` date NOT NULL,
  `dateoff` date NOT NULL,
  `pro_kind` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`order_id`, `pro_id`, `placego`, `placeoff`, `datego`, `dateoff`, `pro_kind`, `cate_id`, `status`) VALUES
(1492752244, 20, 24, 5, '2017-04-21', '1970-01-01', 0, 1, 0),
(1492752244, 19, 24, 5, '2017-04-21', '1970-01-01', 0, 1, 0),
(1492373723, 22, 24, 3, '2017-04-17', '2017-04-19', 0, 1, 0),
(1492373723, 21, 24, 3, '2017-04-17', '2017-04-19', 0, 1, 0),
(1492373723, 27, 24, 3, '2017-04-17', '2017-04-19', 0, 1, 0),
(1493399161, 19, 24, 3, '2017-04-28', '1970-01-01', 0, 1, 0),
(1493399161, 21, 24, 3, '2017-04-28', '1970-01-01', 0, 1, 0),
(1493399161, 20, 24, 3, '2017-04-28', '1970-01-01', 0, 1, 0),
(1492373723, 30, 24, 6, '2017-04-17', '2017-04-25', 0, 2, 0),
(1492373950, 19, 24, 25, '2017-04-17', '1970-01-01', 0, 1, 0),
(1492373950, 20, 24, 25, '2017-04-17', '1970-01-01', 0, 1, 0),
(1492373950, 23, 24, 25, '2017-04-17', '1970-01-01', 0, 1, 0),
(1492373950, 31, 24, 25, '2017-04-17', '1970-01-01', 0, 2, 0),
(1492373950, 32, 24, 25, '2017-04-17', '1970-01-01', 0, 2, 0),
(1493399161, 41, 0, 0, '2017-04-29', '2017-04-29', 29, 5, 0),
(1493439230, 19, 24, 8, '2017-04-29', '1970-01-01', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pages_id` int(11) NOT NULL,
  `pages_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pages_slug` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `pages_content` text COLLATE utf8_unicode_ci NOT NULL,
  `pages_create` datetime NOT NULL,
  `pages_modify` datetime NOT NULL,
  `pages_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pages_id`, `pages_name`, `pages_slug`, `pages_content`, `pages_create`, `pages_modify`, `pages_status`) VALUES
(1, 'Giới thiệu công ty', 'gioi-thieu-cong-ty', '<p>Xin gửi đến quý khách ngàn lời chúc tốt đẹp nhất! Chúc quý khách luôn thành công trong công việc, gia đình hạnh phúc, lúc nào cũng đầy ấp tiếng cười! Chúc kinh tế gia đình ngày càng khấm khá để quý khách được thỏa niềm đam mê đi chu du bốn bể bên cạnh những người thân yêu!</p>\r\n\r\n<p>ViVuThueXe hoạt động chính ở lĩnh vực cho thuê xe du lịch, xe cưới, xe tự lái, cho thuê xe đưa rước chuyên gia nước ngoài... ViVuThueXe ra đời với mong muốn được là bạn đồng hành của quý khách trong các chuyến du lịch, dã ngoại, các chuyến về thăm quê, cưới hỏi, các chuyến công tác, với niềm khát khao trở thành một trong số ít địa chỉ cho thuê xe đáng tin cậy ở TPHCM!</p>\r\nVới danh mục đầy đủ các loại xe ô tô mới nhất, đa dạng về chủng loại, tất cả các loại xe trong danh mục cho thuê đều được mua bảo hiểm và trang bị đầy đủ các thiết bị đảm bảo an toàn nhất cho Khách hàng, định kỳ chúng tôi luôn luôn bổ sung thêm xe mới, loại bỏ những xe không còn đảm bảo an toàn.</p>\r\n<p>Danh mục các loại xe ô tô của ViVuThueXe rất đầy đủ về chủng loại xe, tất cả các thông tin về xe được thể hiện chi tiết giúp Khách hàng không mất nhiều thời gian để lựa chọn cho mình chiếc xe phù hợp và ra quyết định đặc xe, đến với ViVuThueXe&nbsp;Khách hàng như cảm thấy rằng việc đặt xe giống như việc bạn vào nhà để xe của mình và chọn chiếc xe mình thích đồng hành cùng nó.</p>\r\n<p>Đội ngũ tài xế lái xe của ViVuThueXe được tuyển chọn cẩn thận, được đào tạo, tập huấn thường xuyên về về nghiệp vụ. chúng tôi luôn quan tâm đến đời sống của đội ngũ lái xe, vì thế chúng tôi tin rằng Khách hàng sẽ hài lòng với phong cách phục vụ chuyên nghiệp của các bác tài người mà sẽ cùng đồng hành với Khách hàng trong suốt hành trình.</p>\r\n<p>Xe của ViVuThueXe luôn cung cấp đúng giờ đã cam kết với Khách hàng, quý khách không phải lo lắng nếu cần sử dụng thêm giờ chỉ cần điện thoại, email, sms hay chat trực tiếp với chúng tôi là Khách hàng có thể sử dụng xe tiếp theo nhu cầu của mình.</p>\r\n<p>Liên lạc với ViVuThueXe bằng rất nhiều hình thức như: Điện thoại, fax, e-mail, SMS, chat hay khách hàng đến trực tiếp tại văn phòng. ViVuThueXe sẽ nhanh chóng đáp ứng nhu cầu của bạn khi chúng tôi nhận được thông tìn từ khách hàng ViVuThueXe sẽ có nhân viên đến tận nơi của Khách hàng nếu được yêu cầu, giúp khách hàng tiết kiệm thời gian đi lại.</p>\r\n<p>Hệ thống tổng đài viên chuyên nghiệp, đội ngũ nhân viên giao dịch chuyên nghiệp tận tình và chu đáo.</p>\r\n<p>Phương thức thanh toán linh hoạt sẽ giúp Khách hàng thuận tiện và tiết kiệm thời gian.</p>', '2017-02-15 02:13:48', '2017-05-05 19:56:37', 0),
(2, 'liên hệ trong giới thiệu', 'lien-he', '<p><strong>Trụ Sở 1</strong>: 39/7, Nguyễn Tư Giản, Phường 12, Gò Vấp, Tp. HCM<br />\r\n<strong>Hotline</strong>: 090 .1345.959</p>', '2017-04-21 10:22:21', '2017-05-05 19:59:27', 0),
(3, 'Giấy phép kinh doanh', 'giay-phep-kinh-doanh', '<p>Mã số thuế: Vui lòng bổ sung<br />\r\nGiấy phép kinh doanh: Vui lòng bổ sung<br />\r\nTrụ sở: 39/7, Nguyễn Tư Giản, Phường 12, Gò Vấp, Tp. HCM</p>', '2017-04-21 10:27:10', '2017-05-18 09:48:21', 0),
(4, 'hỏi đáp', 'hoi-dap', '<strong>Hỏi: Khi tôi thuê xe bên VivuThueXe có được cung cấp nước suối và khăn lạnh không ?</strong><br />\r\n<strong><em>Trả lời:</em></strong> VivuThueXe sẽ cung cấp nước suối cộng khăn lạnh cho quý khách trong suốt cuộc hành trình,ngoài ra công ty còn Hổ Trợ &nbsp; &nbsp;quý khách thuê phòng khách sạn ở nhưng địa điểm Du Lịch nổi tiếng<br />\r\n<br />\r\n<strong>Hỏi: Tôi muốn booking xe bên VivuThueXe thì phương thức đặt xe và thanh toán sẽ như thế nào?</strong><br />\r\n<em><strong>Trả lời:</strong></em> Trước hết bạn liên lạc với chúng tôi qua số tổng đài của trung tâm giao dịch và cho thuê xe: 090 .1345.959 hoặc gửi Email booking cho chúng tôi, nhân viên kinh doanh sẽ lấy thông tin chuyến đi&nbsp; báo giá cho bạn, nếu bạn đồng ý về giá cả, chúng tôi sẽ xin thông tin từ bạn để tiến hành làm hợp đồng. Nếu bạn không thể đến công ty để kí hợp đồng thì nhân viên kinh doanh sẽ đến tận địa chỉ nhà bạn, hoặc ký hợp đồng qua Email, Fax. Hình thức thanh toán sau khi kí hợp đồng&nbsp; bạn sẽ đặt cọc trước 30% trên tổng giá trị hợp đồng. Khi kết thúc chuyến vận chuyển bạn sẽ thanh toán hết số còn lại cho tài xế.Chúng tôi sẽ tạo mọi điều kiện tốt nhất cho bạn, để hai bên có thể hợp tác.<br />\r\n&nbsp;', '2017-04-21 10:28:28', '2017-05-05 20:15:04', 0),
(5, 'Trang báo giá', 'bao-gia', 'Nội dung đang cập nhật ...', '2017-04-21 10:29:58', '2017-04-23 06:43:21', 0),
(6, 'Hình thức thanh toán (ngắn)', 'hinh-thuc-thanh-toan-ngan', '<h2 class=\"TitlLeft-txdl\">\r\n                                Hình thức thanh toán\r\n                            </h2>\r\n                            <div class=\"bcoLeftContent-txdl\">\r\n                                <div class=\"bcoLeftContent-txdl\">\r\n                                    <ul class=\"ul-ProcessStep\">\r\n                                        <li class=\"payment-list\">\r\n                                            <div >\r\n                                                <div class=\"contentPayment\">\r\n                                                    <p class=\"titlePayment\">Thanh toán bằng chuyển khoản ngân hàng</p>\r\n                                                    <span> Quý khách có thể chuyển khoản trực tiếp tại ngân hàng, qua thẻ ATM hoặc qua Internet banking.</span>\r\n                                                </div>\r\n                                            </div>\r\n                                        </li>\r\n                                        <li class=\"payment-list\">\r\n                                            <div >\r\n                                                <div class=\"contentPayment\">\r\n                                                    <p class=\"titlePayment\">Thanh toán tại văn phòng</p>\r\n                                                    <span> Sau khi đặt thuê xe thành công. Quý khách vui lòng qua văn phòng vivuthuexe để thanh toán.</span>\r\n                                                </div>\r\n                                            </div>\r\n                                        </li>\r\n                                        \r\n                                    </ul>\r\n                                </div>\r\n                                \r\n                            </div>', '2017-04-21 10:31:55', '2017-04-28 22:18:18', 0),
(7, 'Lưu ý khi thuê xe', 'luu-khi-thue-xe', '<strong>Lưu ý:</strong><br />\r\n- Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .<br />\r\n- Giá chưa bao gồm: phí cầu đường, bến bãi, thuế VAT 10%, phí phát sinh.<br />\r\n- Xe đời mới, đẹp, sang trọng, lái xe phục vụ nhiệt tình chu đáo, tác phong chuyên nghiệp.<br />\r\n- Du Lịch Gia Đình Việt cam kết giao xe Chất Lượng, đón khách đúng giờ.<br />\r\n- Giá trên chỉ áp dụng cho xe đi nội thành, nếu quý khách đi Ngoại Thành, Đi Cưới.......vui lòng liên hệ phòng điều hành xe để đươc tư vấn chi tiết,và có được giá tốt nhất&nbsp;<br />\r\nPhòng Điều Hành:<br />\r\n&nbsp; Hotline: <strong>0901.345.959</strong><strong> Mrs&nbsp; Hương Ly</strong> (Trưởng phòng điều hành)', '2017-04-25 07:54:40', '2017-05-05 19:31:03', 0),
(8, 'Quy trình thuê xe (ngắn)', 'quy-trinh-thue-xe-ngan', '<h2 class=\"TitlLeft-txdl\">\r\n                           Quy trình thuê xe dễ dàng\r\n                        </h2>\r\n                        <div class=\"bcoLeftContent-txdl\">\r\n                            <div class=\"bcoLeftContent-txdl\">\r\n                                <ul class=\"ul-ProcessStep\">\r\n                                    <li>\r\n                                        <div class=\"StepProcess\">\r\n                                            <span class=\"number\">1</span> <span class=\"\">Tìm kiếm xe cần thuê.</span>\r\n                                        </div>\r\n                                    </li>\r\n                                    <li>\r\n                                        <div class=\"StepProcess\">\r\n                                            <span class=\"number\">2</span> <span class=\"\">Chọn xe cần thuê.</span>\r\n                                        </div>\r\n                                    </li>\r\n                                    <li>\r\n                                        <div class=\"StepProcess\">\r\n                                            <span class=\"number\">3</span> <span class=\"\">Nhập thông tin khách hàng.</span>\r\n                                        </div>\r\n                                    </li>\r\n                                    <li>\r\n                                        <div class=\"StepProcess\">\r\n                                            <span class=\"number\">4</span> <span class=\"\">Chúng tôi sẽ liên hệ với bạn.</span>\r\n                                        </div>\r\n                                    </li>\r\n                                </ul>\r\n                            </div>\r\n                        </div>', '2017-04-28 21:05:11', '2017-04-28 21:08:00', 0),
(9, 'Qui trình thuê xe (chi tiết)', 'qui-trinh-thue-xe-chi-tiet', 'Nội dung đang cập nhật ...', '2017-04-28 22:37:03', '2017-04-28 22:37:03', 0),
(10, 'Hình thức thanh toán (chi tiết)', 'hinh-thuc-thanh-toan-chi-tiet', 'Nội dung đang cập nhật', '2017-04-28 22:37:46', '2017-04-28 22:37:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `user_id` int(11) NOT NULL,
  `table_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `per_create` tinyint(4) NOT NULL DEFAULT '0',
  `per_modify` tinyint(4) NOT NULL DEFAULT '0',
  `per_delete` tinyint(4) NOT NULL DEFAULT '0',
  `per_show` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`user_id`, `table_name`, `per_create`, `per_modify`, `per_delete`, `per_show`) VALUES
(1, 'system', 1, 1, 1, 1),
(2, 'system', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `photo_key` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `photo_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `photo_create` datetime NOT NULL,
  `photo_size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`photo_key`, `photo_id`, `photo_name`, `photo_create`, `photo_size`) VALUES
(108, 1493995716, '2.jpg', '2017-05-05 21:48:36', 45727),
(109, 1493995716, '3.jpg', '2017-05-05 21:48:37', 180339),
(110, 1493995716, '4.jpg', '2017-05-05 21:48:37', 37558),
(111, 1493995716, '5.jpg', '2017-05-05 21:48:37', 25396),
(112, 1493996039, '2.1493996039.JPG', '2017-05-05 21:54:00', 98975),
(113, 1493996039, '3.1493996040.JPG', '2017-05-05 21:54:01', 60468),
(114, 1493996039, '4.1493996041.JPG', '2017-05-05 21:54:03', 1179020),
(115, 1493996039, '5.1493996043.JPG', '2017-05-05 21:54:04', 37085),
(116, 1493996039, '6.jpg', '2017-05-05 21:54:05', 224392),
(117, 1493996232, '1.1493996232.JPG', '2017-05-05 21:57:12', 11857),
(118, 1493996232, '2.1493996232.JPG', '2017-05-05 21:57:12', 7234),
(119, 1493996232, '3.1493996233.JPG', '2017-05-05 21:57:13', 7212),
(120, 1493996943, 'ChevroletCruze_2.jpg', '2017-05-05 22:09:03', 113721),
(121, 1493997672, 'chevrolet-spark-2.jpg', '2017-05-05 22:21:12', 58514),
(122, 1493998295, 'Toyota_Camry_2015_3.jpg', '2017-05-05 22:31:36', 60154),
(123, 1493998295, 'Toyota_Camry_2015_4.jpg', '2017-05-05 22:31:36', 158587),
(125, 1493998628, 'Toyota_Camry_2015_4.1493998629.JPG', '2017-05-05 22:37:09', 158587),
(128, 1493998824, 'KIAMorning_2.jpg', '2017-05-05 22:41:46', 54706),
(129, 1493998628, 'KIAMorning_1.1493999008.JPG', '2017-05-05 22:43:28', 80927),
(130, 1493999202, '1.png', '2017-05-05 22:46:46', 1469924),
(131, 1493999202, '3.1493999206.JPG', '2017-05-05 22:46:46', 134204),
(132, 1493999539, '2.1493999539.JPG', '2017-05-05 22:52:19', 7783),
(133, 1493999539, '3.1493999539.JPG', '2017-05-05 22:52:20', 292269),
(134, 1493999783, 'CiVic_2.jpg', '2017-05-05 22:56:23', 66948),
(135, 1494000032, 'honda-civic-2.jpg', '2017-05-05 23:00:32', 51666),
(136, 1494000392, '78332835.jpg', '2017-05-05 23:06:32', 25071),
(137, 1494000517, '78332837.jpg', '2017-05-05 23:08:37', 55753),
(138, 1494000899, 'ford_everest_2.jpg', '2017-05-05 23:14:59', 188586),
(139, 1494001446, 'FordTransit_2.jpg', '2017-05-05 23:24:06', 103321),
(140, 1494001591, 'FordTransit_1.1494001591.JPG', '2017-05-05 23:26:32', 208707),
(141, 1494001936, 'P1080513-2.jpg', '2017-05-05 23:32:20', 820236),
(142, 1494002061, 'P1080513-1.1494002061.JPG', '2017-05-05 23:34:21', 30630),
(143, 1494002486, '145221.jpg', '2017-05-05 23:41:27', 170955),
(144, 1494003175, 'ygc1484366361.JPG', '2017-05-05 23:52:55', 122390),
(145, 1494003275, 'ygc1484366360.1494003275.JPG', '2017-05-05 23:54:35', 66292),
(146, 1494003575, 'honda civic 2.jpg', '2017-05-05 23:59:35', 38191),
(147, 1494003885, 'ChevroletCruze_1.1494003885.JPG', '2017-05-06 00:04:45', 369743),
(148, 1494004612, 'Lusiverse_1.jpg', '2017-05-06 00:16:52', 30192),
(149, 1494004867, '4.1494004867.JPG', '2017-05-06 00:21:08', 1179020),
(150, 1494005013, 'ford_everest_1.1494005013.JPG', '2017-05-06 00:23:33', 174545),
(151, 1494005232, 'honda civic 5.jpg', '2017-05-06 00:27:12', 63566);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pro_slug` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `pro_year` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `pro_color` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pro_kind` int(11) NOT NULL,
  `pro_desc` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `pro_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `pro_spec` text COLLATE utf8_unicode_ci NOT NULL,
  `pro_price` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `pro_typerend` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pro_img` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `photo_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `pro_create` datetime NOT NULL,
  `pro_modify` datetime NOT NULL,
  `pro_view` int(11) NOT NULL DEFAULT '0',
  `pro_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `pro_slug`, `pro_year`, `pro_color`, `pro_kind`, `pro_desc`, `pro_detail`, `pro_spec`, `pro_price`, `pro_typerend`, `pro_img`, `photo_id`, `cate_id`, `pro_create`, `pro_modify`, `pro_view`, `pro_status`) VALUES
(42, 'Honda Civic - 2012 - Đỏ', 'honda-civic-2012-do', '2012', 'Đỏ', 10, '<p>\r\n\r\n</p><p>Thông tin thêm về xe:</p>Cho thuê xe cưới hỏi, du lịch, xe thuê tháng<br>', '<br />\r\n&nbsp;', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', '2011-honda-civic.jpg', 1493995716, 5, '2017-05-05 21:48:38', '2017-05-05 21:58:20', 13, 0),
(43, 'Honda Civic - 2013 - Đen', 'honda-civic-2013-den', '2013', 'Đen', 10, '<p>Honda Civic 2013 - Đen cho thuê thành xe du lịch, cưới hỏi, xe tháng<br></p>', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', '1.jpg', 1493996039, 5, '2017-05-05 21:54:07', '2017-05-05 21:54:07', 0, 0),
(44, 'Honda City - 2012 - Trắng', 'honda-city-2012-trang', '2012', 'Trắng', 11, '<p>Cho thuê đám cưới, du lịch, cho thuê tháng<br></p>', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', '4.1493996233.JPG', 1493996232, 5, '2017-05-05 21:57:13', '2017-05-05 21:59:59', 1, 0),
(45, 'Chevrolet Cruze - 2017 - Trắng', 'chevrolet-cruze-2017-trang', '2017', 'Trắng', 50, '<p>Cho thuê xe Chevrolet Cruze đám cưới, hỏi, du lịch<br></p>', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', 'ChevroletCruze_1.jpg', 1493996943, 5, '2017-05-05 22:09:03', '2017-05-05 22:13:35', 1, 0),
(46, 'Chevrolet spark - 2014 - Đỏ', 'chevrolet-spark-2014-do', '2014', 'Đỏ', 51, '<p>Cho thuê du lịch, đám cưới, đám hỏi<br></p>', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', 'chevrolet-spark-1.jpg', 1493997672, 5, '2017-05-05 22:21:13', '2017-05-05 22:21:13', 1, 0),
(47, 'Toyota Camry - 2015 - Đỏ', 'toyota-camry-2015-do', '2015', 'Đỏ', 1, '<p>Cho thuê xe Toyota Camry cưới hỏi, du lịch, thuê theo giờ, ngày<br></p>', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', 'Toyota_Camry_2015_1.jpg', 1493998295, 5, '2017-05-05 22:31:36', '2017-05-05 22:31:36', 0, 0),
(48, 'KIA Morning - 2010 - Đỏ', 'kia-morning-2010-do', '2010', 'Đỏ', 8, '<p>Cho thuê xe cưới hỏi, đám tiệc, du lịch<br></p>', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', 'KIAMorning_2.1493999008.JPG', 1493998628, 5, '2017-05-05 22:37:10', '2017-05-05 22:43:29', 0, 0),
(49, 'KIA Morning - 2010 - Đỏ - TL', 'kia-morning-2010-do-tl', '2010', 'Đỏ', 8, '<p>Cho thuê xe du lịch, cưới hỏi, đám tiệc<br></p>', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', 'KIAMorning_1.jpg', 1493998824, 13, '2017-05-05 22:40:25', '2017-05-05 22:42:12', 0, 0),
(50, 'Chevrolet Cruze - 2012 - Đen - TL', 'chevrolet-cruze-2012-den-tl', '2012', 'Trắng', 50, '<p>Cho thuê xe tự lái, cưới hỏi, du lịch<br></p>', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', '2.png', 1493999202, 13, '2017-05-05 22:46:49', '2017-05-05 22:47:39', 0, 0),
(51, 'Toyota Camry - 2012 - Đỏ - TL', 'toyota-camry-2012-do-tl', '2012', 'Đỏ', 1, '<p>Cho thuê xe du lịch, đám cưới, hỏi<br></p>', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', '1.1493999540.JPG', 1493999539, 13, '2017-05-05 22:52:20', '2017-05-05 22:52:20', 0, 0),
(52, 'Honda Civic - 2013 - Đen - TL', 'honda-civic-2013-den-tl', '2013', 'Đen', 10, '<p>Cho thuê xe Honda Civic tự lái. cưới hỏi, du lịch<br></p>', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', 'CiVic_1.jpg', 1493999783, 13, '2017-05-05 22:56:23', '2017-05-05 22:56:23', 0, 0),
(53, 'Honda Civic -2013 - Xanh- TL', 'honda-civic-2013-xanh-tl', '2013', 'Xanh', 11, '<p>Cho thuê xe Honda Civic tự lái, đám cưới, du lịch<br></p>', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', 'honda-civic-1.jpg', 1494000032, 13, '2017-05-05 23:00:33', '2017-05-05 23:00:33', 0, 0),
(54, 'Toyota Innova - 2015 - Xanh', 'toyota-innova-2015-xanh', '2015', 'Xanh', 5, '<p>Cho thuê Toyota Innova đám cưới hỏi, du lịch, tự lái<br></p>', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', '78332834.jpg', 1494000392, 6, '2017-05-05 23:06:32', '2017-05-05 23:06:32', 0, 0),
(55, 'Toyota Innova - 2015 - Xanh - TL', 'toyota-innova-2015-xanh-tl', '2015', 'Xanh', 5, '<p>Cho thuê xe Toyota Innova đám cưới, hỏi, du lịch<br></p>', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', '78332836.jpg', 1494000517, 14, '2017-05-05 23:08:37', '2017-05-05 23:08:37', 0, 0),
(56, 'Ford Everest - 2015 - Đỏ - DL', 'ford-everest-2015-do-dl', '2015', 'Đỏ', 19, '<p>Cho thuê xe Ford Everest tự lái, đám cưới, hỏi, du lịch<br></p>', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', 'ford_everest_1.jpg', 1494000899, 6, '2017-05-05 23:14:59', '2017-05-05 23:16:09', 0, 0),
(57, 'Ford Sransit - 2013 - Trắng - DL', 'ford-sransit-2013-trang-dl', '2013', 'Trắng', 20, '<p>Cho thuê xe Ford Transit đám cưới, hỏi, du lịch, tự lái<br></p>', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', 'FordTransit_1.jpg', 1494001446, 7, '2017-05-05 23:24:07', '2017-05-05 23:24:07', 2, 0),
(58, 'Ford Transit - 2013 - Trắng - CH', 'ford-transit-2013-trang-ch', '2013', 'Trắng', 20, '<p>Cho thuê xe Ford Transit đám cưới hỏi, du lịch<br></p>', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', 'FordTransit_2.1494001592.JPG', 1494001591, 21, '2017-05-05 23:26:32', '2017-05-05 23:26:32', 0, 0),
(59, 'Mercedes Sprinter 16 chỗ - 2012 - Trắng - CH', 'mercedes-sprinter-16-cho-2012-trang-ch', '2013', 'Trắng', 52, '<p>Cho thuê Mercedes Sprinter đám cưới, du lịch<br></p>', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', 'P1080513-1.jpg', 1494001936, 21, '2017-05-05 23:32:20', '2017-05-05 23:32:20', 0, 0),
(60, 'Mercedes Sprinter 16 chỗ - 2012 - Trắng - TL', 'mercedes-sprinter-16-cho-2012-trang-tl', '2012', 'Trắng', 52, '<p>Cho thuê xe \r\n\r\nMercedes Sprinter\r\n\r\ntự lái, cưới hỏi<br></p>', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', 'P1080513-2.1494002061.JPG', 1494002061, 15, '2017-05-05 23:34:25', '2017-05-05 23:34:25', 0, 0),
(61, 'Toyota Hiace 16 chỗ - 2015 - Trắng DL', 'toyota-hiace-16-cho-2015-trang-dl', '2015', 'Trắng', 2, '<p>Cho thuê xe du lịch, cưới hỏi<br></p>', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', '145225.jpg', 1494002486, 7, '2017-05-05 23:41:27', '2017-05-05 23:43:50', 4, 0),
(62, 'Isuzu Samco 29 chỗ - 2010 - Trắng', 'isuzu-samco-29-cho-2010-trang', '2010', 'Trắng', 53, '<p>Cho thuê Isuzu Samco 29 chỗ cưới hỏi, du lịch<br></p>', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', 'ygc1484366360.jpg', 1494003175, 8, '2017-05-05 23:52:55', '2017-05-05 23:52:55', 2, 0),
(63, 'Isuzu Samco 29 chỗ - 2010 - Trắng - CH', 'isuzu-samco-29-cho-2010-trang-ch', '2010', 'Trắng', 53, '', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', 'ygc1484366361.1494003275.JPG', 1494003275, 22, '2017-05-05 23:54:35', '2017-05-05 23:54:35', 0, 0),
(64, 'Honda Civic - 2015 - Trắng - CH', 'honda-civic-2015-trang-ch', '2015', 'Trắng', 10, '', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', 'honda civic.jpg', 1494003575, 19, '2017-05-05 23:59:35', '2017-05-05 23:59:35', 0, 0),
(65, 'Chevrolet Cruze - 2016 - Trắng - CH', 'chevrolet-cruze-2016-trang-ch', '2016', 'Trắng', 50, '<p>Cho thuê xe Chevrolet Cruze đám cưới hỏi, du lịch<br></p>', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', '', 'ChevroletCruze_2.1494003885.JPG', 1494003885, 19, '2017-05-06 00:04:46', '2017-05-06 00:04:46', 2, 0),
(66, 'Thaco Huynhdai Universe 29 chỗ', 'thaco-huynhdai-universe-29-cho', '2012-2014', 'Trắng', 54, '', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', 'Lusiverse.jpg', 1494004612, 22, '2017-05-06 00:17:00', '2017-05-06 00:17:00', 0, 0),
(67, 'Honda Civic - 2015 - Đen', 'honda-civic-2015-den', '2015', 'Đen', 10, '<p>Honda Civic 2015 - Đen cho thuê thành xe du lịch, cưới hỏi, xe tháng<br></p>', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', 'honda civic 3.jpg', 1494004867, 25, '2017-05-06 00:21:09', '2017-05-06 00:21:09', 2, 0),
(68, 'Ford Everest - XT', 'ford-everest-xt', '2012', 'Đen', 19, '<p>Ford Everest - XT cho thuê thành xe du lịch, cưới hỏi, xe tháng<br></p>', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe', 'ford_everest_2.1494005013.JPG', 1494005013, 26, '2017-05-06 00:23:34', '2017-05-06 00:23:34', 1, 0),
(69, 'Honda Civic - 2015 -Xanh - XT', 'honda-civic-2015-xanh-xt', '2015', 'Xanh', 11, '<p>Honda Civic 2015 - Xanh - XT cho thuê thành xe du lịch, cưới hỏi, xe tháng<br></p>', '', 'Khi việc tư vấn và thỏa thuận giá đã hoàn tất Quý khách có thể đặt thuê xe bằng các phương thức\r\n<ul>\r\n	<li>\r\n	<p>Giá cước trên đã bao gồm: xe, xăng dầu, lương tài xế lái xe .</p>\r\n	</li>\r\n	<li>\r\n	<p>Giá chưa bao gồm: phí cầu đường,bến bãi,thuế VAT 10%,phí phát sinh</p>\r\n	</li>\r\n	<li>\r\n	<p>Wobo cam kết giao xe Chất Lượng,đón khách đúng giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tại trụ sở chính,quý khách được trực tiếp xem xe,giúp quý khách an tâm về chất lượng xe mình chuẩn bị thuê</p>\r\n	</li>\r\n	<li>\r\n	<p>Nếu quý khách không có nhiều thời gian,nhân viên công ty VivuThueXe sẽ đến tận nơi ở,nơi làm việc để ký hợp đồng thuê xe cùng quý khách</p>\r\n	</li>\r\n</ul>', 'Thương lượng', 'xe, tài xế, NL', 'honda civic 4.jpg', 1494005232, 25, '2017-05-06 00:27:13', '2017-05-06 00:27:13', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `province_id` int(11) NOT NULL,
  `province_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `province_slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `province_name`, `province_slug`) VALUES
(1, 'An Giang', 'an-giang'),
(2, 'Bà Rịa - Vũng Tàu', 'ba-ria-vung-tau'),
(3, 'Bắc Giang', 'bac-giang'),
(4, 'Bắc Kạn', 'bac-kan'),
(5, 'Bạc Liêu', 'ba-lieu'),
(6, 'Bắc Ninh', 'bac-ninh'),
(7, 'Bến Tre', 'ben-tre'),
(8, 'Bình Định', 'binh-dinh'),
(9, 'Bình Dương', 'binh-duong'),
(10, 'Bình Phước', 'binh-phuoc'),
(11, 'Bình Thuận', 'binh-thuan'),
(12, 'Cà Mau', 'ca-mau'),
(13, 'Cao Bằng', 'cao-bang'),
(14, 'Đắk Lắk', 'dak-lak'),
(15, 'Đồng Nai', 'dong-nai'),
(16, 'Đồng Tháp', 'dong-thap'),
(17, 'Hậu Giang', 'hau-giang'),
(18, 'Kiên Giang', 'kien-giang'),
(19, 'Long An', 'long-an'),
(20, 'Tiền Giang', 'tien-giang'),
(21, 'Trà Vinh', 'tra-vinh'),
(22, 'Vĩnh Long', 'vinh-long'),
(23, 'Cần Thơ', 'can-tho'),
(24, 'TP. HCM', 'tp-hcm'),
(25, 'Hà Nội', 'ha-noi');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` int(11) NOT NULL,
  `slider_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slider_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slider_desc` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `slider_size` int(11) NOT NULL,
  `slider_modify` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`slider_id`, `slider_name`, `slider_img`, `slider_desc`, `slider_size`, `slider_modify`, `status`) VALUES
(5, 'Gọi cho chúng tôi để có giá ưu đãi', 'templatemo_banner_slide_03.jpg', '<p>Nhân ngày 30-04 và 1-05, giảm 30% các chuyến xe đi miền Tây<br></p>', 750366, '2017-05-05 21:07:58', 0),
(6, 'Sang chảnh với xe cưới mui trần', 'slider2.jpg', '<p>Góp phần cho đám cưới của bạn thêm phần ý nghĩa<br></p>', 1267549, '2017-05-05 21:29:24', 0),
(7, 'Xe cưới sang trọng lịch lãm', 'cho-thue-xe-cuoi-bentley-gia-re1.jpg', '<p>Năm sản xuất 2016, 2017<br></p>', 1699438, '2017-05-05 21:24:12', 0),
(8, 'Đội ngũ chăm sóc khách hàng chuyên nghiệp', 'slider3.jpg', '<p>Đảm bảo ân cần, chu đáo<br></p>', 822759, '2017-05-05 21:34:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `support_id` int(11) NOT NULL,
  `support_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `support_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `support_phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `support_fb` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `support_status` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`support_id`, `support_name`, `support_img`, `support_phone`, `support_fb`, `support_status`) VALUES
(1, 'Thúy Liễu', 'hinh1.1493992034.PNG', '093.3063.111', 'https://www.facebook.com/thuylieu', 0),
(2, 'Minh Đức', 'hinh1.png', '096.2458.255', 'http://fb.com/minhduc', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_reset` tinyint(4) NOT NULL DEFAULT '0',
  `user_slug` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_img` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_create` datetime NOT NULL,
  `user_modify` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_phone`, `user_code`, `user_reset`, `user_slug`, `user_img`, `user_create`, `user_modify`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '01696236691', '', 0, 'admin', '4-cho-02.jpg', '0000-00-00 00:00:00', '2017-04-29 06:55:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`),
  ADD UNIQUE KEY `brand_name` (`brand_name`),
  ADD UNIQUE KEY `brand_slug` (`brand_slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cate_id`),
  ADD UNIQUE KEY `cate_slug` (`cate_slug`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`),
  ADD UNIQUE KEY `color_slug` (`color_slug`);

--
-- Indexes for table `infor`
--
ALTER TABLE `infor`
  ADD PRIMARY KEY (`infor_id`);

--
-- Indexes for table `kind`
--
ALTER TABLE `kind`
  ADD PRIMARY KEY (`kind_id`),
  ADD UNIQUE KEY `kind_name` (`kind_name`),
  ADD UNIQUE KEY `kind_slug` (`kind_slug`),
  ADD UNIQUE KEY `kind_name_2` (`kind_name`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`new_id`),
  ADD UNIQUE KEY `new_slug` (`new_slug`);

--
-- Indexes for table `ordercar`
--
ALTER TABLE `ordercar`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`order_id`,`pro_id`,`datego`,`dateoff`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pages_id`),
  ADD UNIQUE KEY `pages_slug` (`pages_slug`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`table_name`,`user_id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`photo_key`),
  ADD UNIQUE KEY `photo_id` (`photo_id`,`photo_name`,`photo_size`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`),
  ADD UNIQUE KEY `pro_slug` (`pro_slug`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`province_id`),
  ADD UNIQUE KEY `province_name` (`province_name`),
  ADD UNIQUE KEY `province_slug` (`province_slug`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`support_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_slug` (`user_slug`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_phone` (`user_phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `infor`
--
ALTER TABLE `infor`
  MODIFY `infor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `kind`
--
ALTER TABLE `kind`
  MODIFY `kind_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `new_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `photo_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `support_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
