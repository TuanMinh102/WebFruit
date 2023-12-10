-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 10, 2023 lúc 02:35 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoptraicay2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `album`
--

CREATE TABLE `album` (
  `HinhAnh` mediumtext NOT NULL,
  `LinkVideo` mediumtext DEFAULT NULL,
  `TieuDe` mediumtext DEFAULT NULL,
  `Link` mediumtext DEFAULT NULL,
  `Loai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `album`
--

INSERT INTO `album` (`HinhAnh`, `LinkVideo`, `TieuDe`, `Link`, `Loai`) VALUES
('album1.jpg', NULL, NULL, NULL, NULL),
('album2.jpg', NULL, NULL, NULL, NULL),
('album3.jpg', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet`
--

CREATE TABLE `baiviet` (
  `MaBaiViet` int(255) NOT NULL,
  `TieuDe` varchar(255) NOT NULL,
  `Anh` varchar(255) NOT NULL,
  `MoTa` varchar(255) NOT NULL,
  `NoiDung` mediumtext DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `NgayDang` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `baiviet`
--

INSERT INTO `baiviet` (`MaBaiViet`, `TieuDe`, `Anh`, `MoTa`, `NoiDung`, `Type`, `NgayDang`) VALUES
(4, 'dá', 'pic5.jpg', 'dá', '<p>đá</p>', 'dá', '2023-11-06'),
(5, 'dá', 'pic5.jpg', 'mota', '<p>dsad</p>', 'tin-tuc', '2023-11-12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banggia`
--

CREATE TABLE `banggia` (
  `MaLo` varchar(20) NOT NULL,
  `GiaBan` int(11) NOT NULL,
  `GiaTheoNgay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `banggia`
--

INSERT INTO `banggia` (`MaLo`, `GiaBan`, `GiaTheoNgay`) VALUES
('cam-lo1', 120, '2023-11-30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chatbox`
--

CREATE TABLE `chatbox` (
  `chatID` int(255) NOT NULL,
  `MaTK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chatbox`
--

INSERT INTO `chatbox` (`chatID`, `MaTK`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_hoadon`
--

CREATE TABLE `ct_hoadon` (
  `MaHD` int(11) NOT NULL,
  `MaTraiCay` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL,
  `TongGia` int(11) NOT NULL,
  `HoTen` varchar(20) NOT NULL,
  `Email` char(30) NOT NULL,
  `Note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ct_hoadon`
--

INSERT INTO `ct_hoadon` (`MaHD`, `MaTraiCay`, `SoLuong`, `DonGia`, `TongGia`, `HoTen`, `Email`, `Note`) VALUES
(1, 1, 2, 288, 1476, 'Nguyen Van A', 'nguyenvana@gmail.com', 'ok'),
(1, 14, 3, 300, 1476, 'Nguyen Van A', 'www@gmail.com', 'ok'),
(1, 8, 2, 200, 288, 'Nguyen Van A', 'www@gmail.com', 'ok'),
(1, 10, 2, 200, 288, 'Nguyen Van A', 'www@gmail.com', 'ok'),
(1, 13, 2, 200, 288, 'Nguyen Van A', 'www@gmail.com', 'ok'),
(1, 9, 2, 200, 288, 'Nguyen Van A', 'www@gmail.com', 'ok');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discount`
--

CREATE TABLE `discount` (
  `MaGiamGia` mediumtext NOT NULL,
  `MaSp` int(11) NOT NULL,
  `GiaGoc` int(11) NOT NULL,
  `ChietKhau` int(11) NOT NULL,
  `GiaSauKhiGiam` int(11) NOT NULL,
  `NgayApDung` date NOT NULL,
  `NgayKetThuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gallery`
--

CREATE TABLE `gallery` (
  `MaTCay` int(11) NOT NULL,
  `Anh` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `gallery`
--

INSERT INTO `gallery` (`MaTCay`, `Anh`) VALUES
(2, 'dautay2.jpg'),
(2, 'dautay3.jpg'),
(3, 'taomy2.jpg'),
(3, 'taomy3.jpg'),
(4, 'kiwi2.jpg'),
(4, 'kiwi3.jpg'),
(5, 'nho3.jpg'),
(5, 'nho2.jpg'),
(6, 'bo2.jpg'),
(6, 'bo3.jpg'),
(7, 'duahau3.jpg'),
(7, 'duahau2.jpg'),
(8, 'chuoi2.jpg'),
(8, 'chuoi3.jpg'),
(9, 'cherry2.jpg'),
(9, 'cherry3.jpg'),
(10, 'xoai2.jpg'),
(10, 'xoai3.jpg'),
(1, 'cam2.jpg'),
(1, 'cam3.jpg'),
(1, 'cam1.jpg'),
(2, 'dautay1.jpg'),
(3, 'taomy1.jpg'),
(4, 'kiwi1.jpg'),
(5, 'nho1.jpg'),
(6, 'bo1.jpg'),
(7, 'duahau1.jpg'),
(8, 'chuoi1.jpg'),
(9, 'cherry1.jpg'),
(10, 'xoai1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `MaGioHang` int(11) NOT NULL,
  `MaTaiKhoan` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`MaGioHang`, `MaTaiKhoan`, `MaSanPham`, `SoLuong`) VALUES
(25, 2, 8, 10),
(26, 1, 1, 1),
(27, 1, 2, 1),
(28, 1, 6, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_chat`
--

CREATE TABLE `history_chat` (
  `MaChat` int(11) NOT NULL,
  `NoiDung` varchar(255) NOT NULL,
  `ThoiGian` datetime NOT NULL,
  `IsUser` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` int(11) NOT NULL,
  `MaTaiKhoan` int(11) NOT NULL,
  `NgayLapHD` date NOT NULL,
  `DiaChiGiaoHang` varchar(30) NOT NULL,
  `Phone` char(11) NOT NULL,
  `TinhTrang` varchar(10) NOT NULL,
  `DanhGia` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `MaTaiKhoan`, `NgayLapHD`, `DiaChiGiaoHang`, `Phone`, `TinhTrang`, `DanhGia`) VALUES
(1, 1, '2023-11-06', 'huynh thuc khang q1', '0123456789', 'Đang Chờ', 'false');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitraicay`
--

CREATE TABLE `loaitraicay` (
  `MaLoai` int(11) NOT NULL,
  `TenLoai` varchar(20) NOT NULL,
  `MoTa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitraicay`
--

INSERT INTO `loaitraicay` (`MaLoai`, `TenLoai`, `MoTa`) VALUES
(1, 'trái cây mùa hè', 'aaaa'),
(2, 'trái cây mùa đông', 'aaaa'),
(3, 'giỏ quà', 'tặng người thân');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lo_nhap`
--

CREATE TABLE `lo_nhap` (
  `MaLo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lo_nhap`
--

INSERT INTO `lo_nhap` (`MaLo`) VALUES
('cam-lo1'),
('ma lo 3'),
('malo1'),
('malo2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `News_ID` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Content` longtext NOT NULL,
  `MoTa` mediumtext NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Created_at` datetime NOT NULL,
  `Update_at` datetime NOT NULL,
  `Anh` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`News_ID`, `Title`, `Content`, `MoTa`, `Type`, `Created_at`, `Update_at`, `Anh`) VALUES
(1, 'Loại cam đắt đỏ nhất thế giới nhìn như \"sumo\", ở Việt Nam vào mùa rẻ \"như cho không\"', '<h2><strong>Giống cam đắt đỏ trên thế giới được lai tạo giữa cam và quýt có vị ngọt và chua đến hoàn hảo khiến người ăn chỉ thử một lần cũng sẽ bị mê hoặc.</strong></h2><ul><li><a href=\"https://tintuconline.com.vn/mua-sam/nang-thieu-dot-cam-sanh-giai-nhiet-gia-re-bat-ngo-n-563258.html\">Nắng thiêu đốt, cam sành giải nhiệt giá rẻ bất ngờ</a></li><li><a href=\"https://tintuconline.com.vn/mua-sam/ga-thai-loai-di-bo-tu-thai-lan-qua-campuchia-vao-viet-nam-gia-sieu-re-nguoi-chan-nuoi-trong-nuoc-keu-troi-n-559547.html\">Gà thải loại \"đi bộ\" từ Thái Lan, qua Campuchia vào Việt Nam giá siêu rẻ, người chăn nuôi trong nước kêu trời</a></li><li><a href=\"https://tintuconline.com.vn/mua-sam/ngon-hon-quyt-uc-cam-on-chau-co-gia-re-bat-ngo-tai-cho-dau-moi-n-557810.html\">Ngon hơn quýt Úc, cam Ôn Châu có giá rẻ bất ngờ tại chợ đầu mối</a></li></ul><p><a href=\"https://tintuconline.com.vn/tags/trai-cay-213135.vnn\">Trái cây</a> là nguồn cung cấp chất dinh dưỡng và năng lượng dồi dào cho sức khỏe con người. Chúng có thể được ăn trực tiếp, chế biến thành nước ép, thạch, hoặc làm mứt. Đặc biệt, các chuyên gia khuyến cáo mỗi người nên ăn từ 200 g đến 250 g hoa quả một ngày.</p><p>Theo Trung tâm Kiểm soát và Phòng ngừa Dịch bệnh (CDC) Mỹ, cứ 10 người thì chỉ có một người ăn đủ lượng trái cây hoặc rau xanh hàng ngày. Các nhà khoa học chỉ ra 6 lợi ích tuyệt vời mà trái cây mang lại.</p><p>Bổ sung trái cây hàng ngày là điều cần thiết cho sức khỏe, tuy nhiên không phải loại nào cũng phù hợp túi tiền của người tiêu dùng. Trên thế giới có một số thuộc tính quý hiếm, cùng giá trị dinh dưỡng cao, và sự khan hiếm, một số loại trái cây đã trở thành những mặt hàng có giá không hề rẻ, thậm chí đắt ngoài sức tưởng tượng.&nbsp;Với mức giá hơn 300.000 đồng/quả, cam&nbsp;Dekopon thực là trái cây đắt đỏ.</p><p><img src=\"https://ttol.vietnamnetjsc.vn/images/2023/10/27/11/30/cam-1.jpg\" alt=\"Loại cam đắt đỏ nhất thế giới nhìn như sumo, ở Việt Nam vào mùa rẻ như cho không-1\" width=\"450\" height=\"338\"></p><p><i>Hình dáng quả cam Dekopon hơn 300.000/quả khiến ai cũng mê hoặc.</i></p><p>Dekopon, hay Sumo Fruit, là một loại cam nổi tiếng đắt đỏ xuất xứ từ Nhật Bản. Loại cam&nbsp;Dekopon được lai tạo giữa cam và quýt, cam Dekopon đạt được sự cân bằng lí tưởng giữa vị ngọt và chua đến hoàn hảo khiến người ăn chỉ thử một lần cũng sẽ bị mê hoặc.</p><p>Loại cam đắt đỏ có \"1-0-2\" được khen ngợi về chất lượng thơm ngon tuyệt vời.</p><p>Điều đặc biệt ở cam Dekopon là sau khi thu hoạch sẽ được để khoảng 20-40 ngày cho lượng axit citric trong trái cây thấp hơn, đồng thời lượng đường tăng lên, tạo ra hương vị hấp dẫn.</p><p><img src=\"https://ttol.vietnamnetjsc.vn/images/2023/10/27/11/30/cam-2.jpg\" alt=\"Loại cam đắt đỏ nhất thế giới nhìn như sumo, ở Việt Nam vào mùa rẻ như cho không-2\" width=\"450\" height=\"299\"></p><p><i>Loại quả này ngọt, dễ bóc và không có hạt. Chúng là lựa chọn hoàn hảo cho những người thích ăn ngọt nhưng vẫn muốn giữ dáng.</i></p><p>Đây là sản phẩm lai tạo giữa quýt và cam, điều này khiến hương vị của nó cân bằng lý tưởng giữa vị ngọt và chua đến hoàn hảo khiến người ăn chỉ thử một lần cũng sẽ bị mê hoặc.</p><p>Để loại quả này luôn thơm ngon và đạt độ vàng óng. Tại Nhật Bản, cam Dekopon được trồng trong nhà kính để đảm bảo nhiệt độ và độ ẩm ổn định. Cam thu hoạch vào mùa đông Nhật Bản. Bên trong nhà kính có hệ thống tưới nước và tạo ẩm tự động. Tất cả đều được kiểm soát chặt chẽ để đảm bảo đúng yêu cầu kỹ thuật.</p><p>Mùa thu hoạch là từ tháng 12 đến tháng 2 (mùa đông ở Nhật Bản).&nbsp;Một quả dekopon có giá bán 13 euro (khoảng 340.000 VND).</p><p><img src=\"https://ttol.vietnamnetjsc.vn/images/2023/10/27/11/30/cam-3.jpg\" alt=\"Loại cam đắt đỏ nhất thế giới nhìn như sumo, ở Việt Nam vào mùa rẻ như cho không-3\" width=\"450\" height=\"338\"></p><p><i>Quả cam Dekopon khi còn xanh. Ảnh: Rakuten.</i></p><p>Là sản phẩm lai giữa quýt và cam, cam Dekopon nổi tiếng về độ mọng của màng ngăn giữa các múi và có chất lượng thơm ngon tuyệt vời. Do hương vị cân bằng lý tưởng giữa vị ngọt và chua đã khiến các khách hàng hài lòng và tiếp tục mua chúng nhiều lần.</p><p>Điển hình cam Dekopon là một loại trái cây lớn - mỗi quả có thể nặng tới 0,5 kg. Đôi khi chúng còn được gọi là cam Sumo vì hình dáng độc đáo giống các võ sĩ của môn võ truyền thống của nước Nhật.</p><p><img src=\"https://ttol.vietnamnetjsc.vn/images/2023/10/27/11/30/cam-4.jpg\" alt=\"Loại cam đắt đỏ nhất thế giới nhìn như sumo, ở Việt Nam vào mùa rẻ như cho không-4\" width=\"450\" height=\"338\"></p><p><i>&nbsp;Dekopon là giống cam lai quýt nổi tiếng tại Nhật Bản, được phát triển từ năm 1972.</i></p>', 'Dekopon, hay Sumo Fruit, là một loại cam nổi tiếng đắt đỏ xuất xứ từ Nhật Bản. Loại cam Dekopon được lai tạo giữa cam và quýt, cam Dekopon đạt được sự cân bằng lí tưởng giữa vị ngọt và chua đến hoàn hảo khiến người ăn chỉ thử một lần cũng sẽ bị mê hoặc.', 'tin tuc', '2023-11-24 13:28:29', '2023-11-24 13:28:29', 'https://ttol.vietnamnetjsc.vn/images/2023/10/27/11/30/cam-1.jpg'),
(2, 'Trái cây ngoại giá rẻ tràn ngập thị trường', '<p><img src=\"https://media1.nguoiduatin.vn/thumb_x992x595/media/ngac-kim-giang/2023/08/31/trai-cay-nhap-khau.jpg\" alt=\"Trái cây ngoại giá rẻ tràn ngập thị trường\" width=\"900\" height=\"595\"></p><h2>Trái cây ngoại giá rẻ tràn ngập thị trường</h2><p>&nbsp;</p><p><strong>Trái cây ngoại ngày càng rẻ, nhiều loại chỉ còn 30.000 - 40.000 đồng/kg. Thậm chí, các loại trái cây cao cấp cũng giảm giá mạnh nên được nhiều người chọn mua.</strong></p><p><strong>Trái cây ngoại giá rẻ bất ngờ</strong></p><p>Thị trường tháng 7 âm lịch, thường gọi là tháng chay, sức mua các mặt hàng trái cây tăng khá mạnh với đủ mặt hàng, phân khúc. Trái cây bình dân ở chợ truyền thống hiện có lựu, lê, nho xanh Trung Quốc. Trong đó, lựu dù mới vào mùa nhưng giá bán lẻ chỉ từ 20.000 - 40.000 đồng/kg, bán rất chạy do hạt đỏ, vị ngọt.</p><p>Trong khi đó, siêu thị đang tràn ngập các loại táo từ nhiều nước như: New Zealand, Pháp, Nam Phi… với giá từ 49.000 - 200.000 đồng/kg tùy giống, kích cỡ và xuất xứ.</p><p>&nbsp;</p><p>Ghi nhận của báo <i>Người Lao Động</i>, tại siêu thị MM Mega An Phú (Tp. Thủ Đức, Tp.HCM), táo Nam Phi loại túi 3 kg được bày ngay lối vào để thu hút khách. Phía bên trong khu vực trái cây các loại được đổ đống, bên dưới kê các thùng đựng táo rất bắt mắt cho khách hàng lựa chọn. Tại các cửa hàng tiện lợi, dù diện tích nhỏ nhưng tủ mát luôn dành vị trí đẹp để trưng bày các loại trái cây ngoại như táo, lê, cam vàng, cherry…</p><p>Bà Nguyễn Tuyết Nga, chủ một cửa hàng thực phẩm cao cấp tại quận 12, Tp.HCM, cho hay trước dịch <a href=\"https://www.nguoiduatin.vn/tag/virus-covid19\">Covid-19</a>, cửa hàng chủ yếu bán các loại thực phẩm khô ăn liền, còn nay tập trung bán trái cây ngoại.</p><p>\"Người tiêu dùng cắt giảm chi tiêu nhiều thứ nhưng lại tăng mua trái cây vì quan tâm hơn đến sức khỏe. Trái cây ngoại giờ rẻ lắm, về giá trị thật, nên không còn đắt đỏ như trước, dễ mua hơn. Khu vực cửa hàng tôi có nhiều nhà máy, xí nghiệp, họ thường đặt mua chung theo giá sỉ nên càng rẻ\", bà Nga nói thêm.</p><p>&nbsp;</p><p>Cũng theo bà Nga, trái cây ngoại luôn là ưu tiên số 1 để làm quà biếu hay đi đám tiệc và nhóm khách hàng này thường ít quan tâm về giá, miễn đóng gói <a href=\"https://www.nguoiduatin.vn/c/ngoi-sao\">sao</a> cho thật đẹp, thật sang và trái cây phải chất lượng.</p><p>\"Trái cây nhập khẩu đã qua tuyển chọn, chỉ cần hàng mới về thì quả nào cũng ngon, đồng đều, còn hàng trong nước lựa rất cực, dù cố gắng vẫn có tỉ lệ quả hỏng\", bà Nga dẫn chứng.</p><figure class=\"image\"><img style=\"aspect-ratio:450/338;\" src=\"https://media1.nguoiduatin.vn/media/ngac-kim-giang/2023/08/31/trai-cay-nhap-khau1.jpg\" alt=\"Kinh tế - Trái cây ngoại giá rẻ tràn ngập thị trường\" width=\"450\" height=\"338\"><figcaption>Các loại trái cây nhập khẩu giá rẻ tràn ngập thị trường nội địa. Ảnh: Chí Nhân/báo Thanh Niên</figcaption></figure><p>Một nhà nhập khẩu trái cây tại Tp.HCM cho biết, giá nhiều loại táo đang rẻ hơn trước do các doanh nghiệp nhập loại cỡ nhỏ và siêu nhỏ. Những loại táo này trước đây các trang trại của nước ngoài phải bán cho chế biến với giá rẻ thì nay bán tươi cho Việt Nam vì vừa hợp thị hiếu vừa túi tiền, dễ chia. Trái cây nhập khẩu nhiều loại bảo quản được lâu, lưu trữ kho lạnh bán dần nên ít bị áp lực bán nhanh.</p><p>Trong khi đó, theo Hiệp hội Cherry Mỹ tại Việt Nam, năm nay cherry được mùa nên sản lượng tăng mạnh, hàng được chuyển bằng đường tàu biển về Việt Nam thay vì đường hàng không như trước kia. Sản lượng lớn và chi phí giảm mạnh là lý do khiến giá cherry Mỹ tại Việt Nam rẻ hơn rất nhiều so với những năm trước. Việt Nam chủ yếu nhập cherry từ Washington và California, năm nay tổng sản lượng cả 2 bang này khoảng trên 30 triệu thùng, tăng gần gấp đôi so với năm ngoái.</p><p>&nbsp;</p><p>Theo báo <i>Thanh Niên</i>, không chỉ giá rẻ, các nhà xuất khẩu nông sản Mỹ còn thường xuyên tổ chức các chương trình quảng bá và khuyến mãi lớn. Cụ thể, trong những ngày đầu tháng 8, Phòng Nông nghiệp đối ngoại thuộc Bộ Nông nghiệp Mỹ (USDA) tổ chức chương trình \"Khám phá mỹ vị Hoa Kỳ\" giới thiệu nhiều loại thực phẩm và đồ uống đặc sản Mỹ đến người tiêu dùng Việt. Trong chương trình này, nhiều loại trái cây đặc sản Mỹ như cherry, việt quất, nho… được bán với giá khuyến mãi hấp dẫn.</p><p>Trái cây từ EU, Nhật Bản, Hàn Quốc, Úc… cũng giảm mạnh trong những năm gần đây do Việt Nam tham gia sâu vào các hiệp định thương mại tự do (FTA) với các nước này, nên thuế nhập khẩu giảm. Mặt khác, trong năm nay, kinh tế khó khăn, người tiêu dùng khắp nơi cắt giảm chi tiêu nên các nhà xuất khẩu cũng đẩy mạnh các chương trình khuyến mãi nhằm kích thích sức mua.</p>', 'Trái cây ngoại ngày càng rẻ, nhiều loại chỉ còn 30.000 - 40.000 đồng/kg. Thậm chí, các loại trái cây cao cấp cũng giảm giá mạnh nên được nhiều người chọn mua.', 'tin tuc', '2023-11-24 13:35:08', '2023-11-24 13:35:08', 'https://media1.nguoiduatin.vn/thumb_x992x595/media/ngac-kim-giang/2023/08/31/trai-cay-nhap-khau.jpg'),
(3, 'Cherry Mỹ về Việt Nam giá thấp kỷ lục', '<p>Mỗi kg cherry Mỹ về Việt Nam được các cửa hàng, siêu thị bán giá 250.000-340.000 đồng một kg, rẻ nhất từ trước tới nay.</p><p>Chị Loan, người chuộng trái cây ngoại, cho biết năm ngoái phải bỏ ra nửa triệu đồng để mua một kg cherry có xuất xứ từ Mỹ, nay cũng số tiền ấy nhưng mua được 2 kg. \"Đây là mức giá thấp nhất từ trước tới nay\", chị nói.</p><p>Ghi nhận tại các cửa hàng trái cây nhập khẩu cũng cho thấy cherry Mỹ được rao bán với giá 250.000-340.000 đồng một kg (tùy kích cỡ), giảm 50% so với cùng kỳ năm ngoái. Đặc biệt với cherry vàng - loại cao cấp hơn, cũng chỉ có giá 350.000 đồng một kg.</p><p><picture><source srcset=\"https://i1-kinhdoanh.vnecdn.net/2023/08/07/cherry-jpeg-1691402027-6674-1691413026.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=foFjeUvEESJw-V1oa33S5Q 1x, https://i1-kinhdoanh.vnecdn.net/2023/08/07/cherry-jpeg-1691402027-6674-1691413026.jpg?w=1020&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=tiFL7ENUTGOrUfksC46hOA 1.5x, https://i1-kinhdoanh.vnecdn.net/2023/08/07/cherry-jpeg-1691402027-6674-1691413026.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=2&amp;fit=crop&amp;s=6vj0YVouMbHstIGxBhwOeA 2x\"><img src=\"https://i1-kinhdoanh.vnecdn.net/2023/08/07/cherry-jpeg-1691402027-6674-1691413026.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=foFjeUvEESJw-V1oa33S5Q\" alt=\"Cherry Mỹ được bán tại cửa hàng ở TP HCM.\" width=\"680\" height=\"543\"></picture></p><p>Cherry Mỹ được bán tại cửa hàng ở TP HCM. Ảnh: <i>Nhân vật cung cấp</i></p><p>Bán cherry Mỹ với giá 1,2 triệu đồng một thùng 5 kg, chị Mỹ Hạnh - đầu mối bán hàng ở quận Tân Bình - cho rằng mức giá này rẻ hơn năm 2019 (năm đầu tiên giá cherry Mỹ về mức 300.000 đồng một kg).</p><p>\"Năm nay, tôi nhập về Việt Nam với số lượng 500 thùng, tăng 30% so với năm ngoái. Vì giá thấp nên rất hút khách\", chị Hạnh chia sẻ.</p><p>Chị Lan Anh - chủ cửa hàng trái cây nhập khẩu ở quận Bình Thạnh - cũng cho biết cherry đang có giá hấp dẫn hơn so với các dòng trái cây nhập khẩu cao cấp khác. Do đó, sức mua sản phẩm này đang tăng 30% so với cùng kỳ 2022.</p><p>\"Với mức giá này, ngoài khách có thu nhập cao, giới bình dân cũng dễ dàng mua về thưởng thức\", chị Lan Anh nhìn nhận.</p><p><picture><source srcset=\"https://i1-kinhdoanh.vnecdn.net/2023/08/07/cherry-1691412153-7952-1691413026.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=YbLbkIJFNcg4kgcR5rSRWg 1x, https://i1-kinhdoanh.vnecdn.net/2023/08/07/cherry-1691412153-7952-1691413026.jpg?w=1020&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=OealqM86LjzzoslHaB4fvg 1.5x, https://i1-kinhdoanh.vnecdn.net/2023/08/07/cherry-1691412153-7952-1691413026.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=2&amp;fit=crop&amp;s=6TZoMXY7zoOxYY4-s-AIGQ 2x\"><img src=\"https://i1-kinhdoanh.vnecdn.net/2023/08/07/cherry-1691412153-7952-1691413026.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=YbLbkIJFNcg4kgcR5rSRWg\" alt=\"Cherry Mỹ được bán tại hệ thống siêu thị Go! Gò Vấp (TP HCM). Ảnh: Thi Hà\" width=\"680\" height=\"465\"></picture></p><p>Cherry Mỹ được bán tại hệ thống siêu thị Go! Gò Vấp (TP HCM). Ảnh: <i>Thi Hà</i></p><p>Tương tự, tại các hệ thống siêu thị như Co.opmart, MM Mega Market, Go! cũng đang bán loại trái cây này với giá 299.000-349.000 đồng một kg.</p><p><strong>Lý giải việc giá cherry xuống thấp</strong>, các nhà nhập khẩu cho biết do nguồn cung dồi dào, hàng đang vào vụ thu hoạch ở Mỹ. Đây cũng là nông sản được Bộ Nông nghiệp nước này hỗ trợ xúc tiến ra nước ngoài, trong đó có Việt Nam.</p>', 'Mỗi kg cherry Mỹ về Việt Nam được các cửa hàng, siêu thị bán giá 250.000-340.000 đồng một kg, rẻ nhất từ trước tới nay.', 'tin tuc', '2023-11-24 14:10:01', '2023-11-24 14:10:01', 'https://i1-kinhdoanh.vnecdn.net/2023/08/07/cherry-jpeg-1691402027-6674-1691413026.jpg?w=1020&h=0&q=100&dpr=1&fit=crop&s=tiFL7ENUTGOrUfksC46hOA'),
(4, 'Chống táo bón', 'bla bla bla', 'Thực phẩm tốt cho dạ dày.', 'bai viet', '2023-11-24 16:01:04', '2023-11-24 16:01:04', 'new1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNcc` int(11) NOT NULL,
  `TenNcc` varchar(20) NOT NULL,
  `DiaChi` varchar(30) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `SoFax` varchar(10) NOT NULL,
  `DcMail` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNcc`, `TenNcc`, `DiaChi`, `Phone`, `SoFax`, `DcMail`) VALUES
(1, 'Nông Sản Sao Khuê', 'quan1', '0123456789', '1111', 'saokhue@gmail.com'),
(2, 'Đông Dương Food', 'quan2', '0987654321', '2222', 'dongduong@gmail.com'),
(3, 'Nông Sản Nguyễn Vy', 'quan3', '0456893644', '3333', 'nguyenvy@gmail.com'),
(4, 'Nông Sản Dagrifood', 'quan4', '0123456784', '4444', 'dagrifood@gmail.com'),
(5, 'Nông Sản Vilaconic', 'quan5', '0123456783', '5555', 'vilaconic@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhaphang`
--

CREATE TABLE `nhaphang` (
  `MaLoNhap` varchar(20) NOT NULL,
  `MaTraiCay` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaNhap` int(11) NOT NULL,
  `MaNhaCungCap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhaphang`
--

INSERT INTO `nhaphang` (`MaLoNhap`, `MaTraiCay`, `SoLuong`, `GiaNhap`, `MaNhaCungCap`) VALUES
('cam-lo1', 1, 10, 100, 1),
('cam-lo1', 1, 25, 102, 2),
('ma lo 3', 2, 6, 99, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review`
--

CREATE TABLE `review` (
  `MaTk` int(11) NOT NULL,
  `MaSp` int(11) NOT NULL,
  `Comment` mediumtext NOT NULL,
  `Rating` int(11) NOT NULL,
  `NgayThang` datetime NOT NULL,
  `TinhTrang` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `review`
--

INSERT INTO `review` (`MaTk`, `MaSp`, `Comment`, `Rating`, `NgayThang`, `TinhTrang`) VALUES
(1, 1, 'cam', 3, '2023-12-08 04:19:44', 'true'),
(1, 8, 'chuối', 5, '2023-12-08 04:19:44', 'true'),
(1, 14, 'hộp cam', 4, '2023-12-08 04:19:45', 'true');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTaiKhoan` int(11) NOT NULL,
  `TaiKhoan` varchar(50) NOT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `IsAdmin` int(11) NOT NULL,
  `Avatar` varchar(50) NOT NULL,
  `TrangThai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MaTaiKhoan`, `TaiKhoan`, `MatKhau`, `Email`, `Phone`, `DiaChi`, `HoTen`, `IsAdmin`, `Avatar`, `TrangThai`) VALUES
(1, 'tuan', '123', 'tuanww012@gmail.com', '0999999997', 'quan binhtan,tphcm', 'NguyenMinhTuan', 0, '', ''),
(2, 'tuan2', 'ttt', '0306201093@caothang.edu.vn', '0123456789', 'huynh thuc khang, quan1', 'Nguyen Van A', 0, '1.jpg', ''),
(3, 'admin', 'admin123', '', '', '', '', 1, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongke`
--

CREATE TABLE `thongke` (
  `MaThongKe` int(11) DEFAULT NULL,
  `TongDoanhThu` mediumint(9) NOT NULL,
  `Date` date NOT NULL,
  `ChiPhi` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thongke`
--

INSERT INTO `thongke` (`MaThongKe`, `TongDoanhThu`, `Date`, `ChiPhi`) VALUES
(1, 64, '2023-11-30', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `traicay`
--

CREATE TABLE `traicay` (
  `MaTraiCay` int(11) NOT NULL,
  `TenTraiCay` varchar(30) NOT NULL,
  `MoTa` varchar(30) NOT NULL,
  `GiaNhap` varchar(10) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaBan` int(11) NOT NULL,
  `Discount` int(11) NOT NULL,
  `GiaGoc` int(11) NOT NULL,
  `MaNcc` int(11) NOT NULL,
  `MaLoai` int(11) NOT NULL,
  `Anh` varchar(50) NOT NULL,
  `TinhTrang` varchar(10) NOT NULL,
  `Type` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `traicay`
--

INSERT INTO `traicay` (`MaTraiCay`, `TenTraiCay`, `MoTa`, `GiaNhap`, `SoLuong`, `GiaBan`, `Discount`, `GiaGoc`, `MaNcc`, `MaLoai`, `Anh`, `TinhTrang`, `Type`) VALUES
(1, 'Cam', 'Được nhập từ Mỹ,...', '124', 10, 144, 0, 144, 1, 1, 'pic1.jpg', 'true', NULL),
(2, 'Dâu Tây', 'Được trồng trên Đà Lạt xa xôi', '130', 10, 150, 0, 150, 2, 2, 'pic2.jpg', 'true', NULL),
(3, 'Táo Mỹ', 'Giống táo mới được lai giống', '100', 2, 120, 0, 120, 3, 1, 'pic3.jpg', 'true', NULL),
(4, 'Kiwi', 'Vị chua,ngọt tự nhiên', '183', 5, 199, 20, 220, 3, 1, 'pic4.jpg', 'true', NULL),
(5, 'Nho', 'Rất ngon', '150', 25, 170, 0, 170, 5, 2, 'pic5.jpg', 'true', NULL),
(6, 'Bơ Việt Nam', 'Được nhập tại Việt Nam', '130', 10, 144, 0, 144, 1, 1, 'pic6.jpg', 'true', NULL),
(7, 'Dưa hấu', 'Ngọt, ít hạt', '100', 25, 199, 25, 230, 2, 1, 'pic7.jpg', 'true', NULL),
(8, 'Chuối ', 'Nhiều chất vitamin', '100', 2, 199, 0, 199, 3, 1, 'pic8.jpg', 'true', NULL),
(9, 'Cherry', 'Ngon tuyệt', '150', 15, 200, 50, 400, 4, 2, 'pic9.jpg', 'true', NULL),
(10, 'Xoài Cát', 'Ngọt thanh thanh', '99', 20, 150, 15, 170, 1, 2, 'pic10.jpg', 'true', NULL),
(11, 'Khay Ngũ Quả Cúng', 'Bao gồm Nho,Kiwi,Cam,Táo', '124', 10, 155, 0, 150, 1, 3, '4-01.jpg', 'true', NULL),
(12, 'Khay Trái Cây Trìu Mến', 'Bao gồm Cam,Táo', '134', 11, 165, 0, 165, 1, 3, '4-08.jpg', 'true', NULL),
(13, 'Bliss Gift', 'Bao gồm Nho,Cam,Táo', '136', 14, 155, 0, 155, 1, 3, '7-01.jpg', 'true', NULL),
(14, 'Gift Box Quýt Úc', 'Thích hợp làm quà', '135', 24, 188, 0, 188, 1, 3, '5-13-1.jpg', 'true', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banggia`
--
ALTER TABLE `banggia`
  ADD KEY `MaLo` (`MaLo`);

--
-- Chỉ mục cho bảng `chatbox`
--
ALTER TABLE `chatbox`
  ADD PRIMARY KEY (`chatID`),
  ADD KEY `FK_matkmessage` (`MaTK`);

--
-- Chỉ mục cho bảng `ct_hoadon`
--
ALTER TABLE `ct_hoadon`
  ADD KEY `FK_mahd2` (`MaHD`),
  ADD KEY `FK_matc` (`MaTraiCay`);

--
-- Chỉ mục cho bảng `discount`
--
ALTER TABLE `discount`
  ADD KEY `FK_masp` (`MaSp`);

--
-- Chỉ mục cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD KEY `FK_matcay` (`MaTCay`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MaGioHang`),
  ADD KEY `FK_masp_magiay` (`MaSanPham`),
  ADD KEY `FK_matk` (`MaTaiKhoan`);

--
-- Chỉ mục cho bảng `history_chat`
--
ALTER TABLE `history_chat`
  ADD KEY `FK_machat` (`MaChat`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `FK_matk_x2` (`MaTaiKhoan`);

--
-- Chỉ mục cho bảng `loaitraicay`
--
ALTER TABLE `loaitraicay`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Chỉ mục cho bảng `lo_nhap`
--
ALTER TABLE `lo_nhap`
  ADD PRIMARY KEY (`MaLo`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`News_ID`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaNcc`);

--
-- Chỉ mục cho bảng `nhaphang`
--
ALTER TABLE `nhaphang`
  ADD KEY `khoangoai` (`MaLoNhap`),
  ADD KEY `khoangoai2` (`MaTraiCay`),
  ADD KEY `khoangoai3` (`MaNhaCungCap`);

--
-- Chỉ mục cho bảng `review`
--
ALTER TABLE `review`
  ADD KEY `FK_matk_review` (`MaTk`),
  ADD KEY `FK_masp_review` (`MaSp`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTaiKhoan`);

--
-- Chỉ mục cho bảng `traicay`
--
ALTER TABLE `traicay`
  ADD PRIMARY KEY (`MaTraiCay`),
  ADD KEY `FK_ma_ncc_x2` (`MaNcc`),
  ADD KEY `FK_maloai` (`MaLoai`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `banggia`
--
ALTER TABLE `banggia`
  ADD CONSTRAINT `banggia_ibfk_1` FOREIGN KEY (`MaLo`) REFERENCES `lo_nhap` (`MaLo`);

--
-- Các ràng buộc cho bảng `chatbox`
--
ALTER TABLE `chatbox`
  ADD CONSTRAINT `FK_matkmessage` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTaiKhoan`);

--
-- Các ràng buộc cho bảng `ct_hoadon`
--
ALTER TABLE `ct_hoadon`
  ADD CONSTRAINT `FK_mahd2` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`),
  ADD CONSTRAINT `FK_matc` FOREIGN KEY (`MaTraiCay`) REFERENCES `traicay` (`MaTraiCay`);

--
-- Các ràng buộc cho bảng `discount`
--
ALTER TABLE `discount`
  ADD CONSTRAINT `FK_masp` FOREIGN KEY (`MaSp`) REFERENCES `traicay` (`MaTraiCay`);

--
-- Các ràng buộc cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `FK_matcay` FOREIGN KEY (`MaTCay`) REFERENCES `traicay` (`MaTraiCay`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `FK_masp_magiay` FOREIGN KEY (`MaSanPham`) REFERENCES `traicay` (`MaTraiCay`),
  ADD CONSTRAINT `FK_matk` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`MaTaiKhoan`);

--
-- Các ràng buộc cho bảng `history_chat`
--
ALTER TABLE `history_chat`
  ADD CONSTRAINT `FK_machat` FOREIGN KEY (`MaChat`) REFERENCES `chatbox` (`chatID`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `FK_matk_x2` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`MaTaiKhoan`);

--
-- Các ràng buộc cho bảng `nhaphang`
--
ALTER TABLE `nhaphang`
  ADD CONSTRAINT `khoangoai` FOREIGN KEY (`MaLoNhap`) REFERENCES `lo_nhap` (`MaLo`),
  ADD CONSTRAINT `khoangoai2` FOREIGN KEY (`MaTraiCay`) REFERENCES `traicay` (`MaTraiCay`),
  ADD CONSTRAINT `khoangoai3` FOREIGN KEY (`MaNhaCungCap`) REFERENCES `nhacungcap` (`MaNcc`);

--
-- Các ràng buộc cho bảng `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `FK_masp_review` FOREIGN KEY (`MaSp`) REFERENCES `traicay` (`MaTraiCay`),
  ADD CONSTRAINT `FK_matk_review` FOREIGN KEY (`MaTk`) REFERENCES `taikhoan` (`MaTaiKhoan`);

--
-- Các ràng buộc cho bảng `traicay`
--
ALTER TABLE `traicay`
  ADD CONSTRAINT `FK_ma_ncc_x2` FOREIGN KEY (`MaNcc`) REFERENCES `nhacungcap` (`MaNcc`),
  ADD CONSTRAINT `FK_maloai` FOREIGN KEY (`MaLoai`) REFERENCES `loaitraicay` (`MaLoai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
