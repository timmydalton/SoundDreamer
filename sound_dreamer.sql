-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 05:14 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sound_dreamer`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `IDacc` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_avatar` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`IDacc`, `username`, `password`, `display_name`, `email`, `status`, `phone`, `description`, `url_avatar`, `role`) VALUES
(2, 'test', 'c4ca4238a0b923820dcc509a6f75849b', 'Testing account', 'abc@gmail.com', 1, 392645338, 'This is a test account', 'test.jpg', 0),
(4, 'test2', 'c4ca4238a0b923820dcc509a6f75849b', 'test2', '', 0, 0, '', 'default.png', 0),
(5, 'duyabc', '202cb962ac59075b964b07152d234b70', 'Khánh Duy', 'timmydalton2k@gmail.com', 1, 392645338, 'Đây là admin đi du hành hihi :)', '248499035.jpg', 1),
(6, 'abcxyz', 'c4ca4238a0b923820dcc509a6f75849b', 'abcxyz', '', 1, 0, '', 'default.png', 1),
(7, 'ok123', '202cb962ac59075b964b07152d234b70', 'Husky 123', 'abc@gmail.com', 1, 12345678, 'Đây là tài khoản của husky', 'husky.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `badwords`
--

CREATE TABLE `badwords` (
  `IDword` int(11) NOT NULL,
  `word` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `badwords`
--

INSERT INTO `badwords` (`IDword`, `word`) VALUES
(1, 'dm'),
(2, 'fuck');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `IDCmt` int(11) NOT NULL,
  `IDSong` int(11) NOT NULL,
  `IDacc` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`IDCmt`, `IDSong`, `IDacc`, `date`, `data`, `status`) VALUES
(1, 7, 2, '2022-02-23 09:11:25', 'Hi', 0),
(2, 7, 2, '2022-02-23 09:11:25', 'Hi', 0),
(3, 7, 2, '2022-02-23 09:16:20', 'Hi', 0),
(4, 7, 2, '2022-02-23 09:38:06', 'Hello', 0),
(5, 7, 2, '2022-02-23 09:38:47', 'Bình luận thứ ba', 0),
(6, 10, 5, '2022-02-23 09:52:37', 'Xin chào các bạn :)', 1),
(7, 10, 2, '2022-02-23 10:25:19', 'Wow bài hát hay quá\nPhải nghe thôi :)', 1),
(8, 7, 5, '2022-02-23 16:00:15', 'Comment nè...', 1),
(9, 7, 5, '2022-02-23 16:03:40', 'Bình luận tiếp nè!!', 1),
(10, 7, 5, '2022-02-23 16:04:08', 'Cái nữa nè', 1),
(11, 7, 5, '2022-02-23 16:04:08', 'Comment tiếp chơi', 1),
(12, 9, 5, '2022-02-23 16:05:04', 'Bài hát hay quá', 1),
(13, 8, 5, '2022-02-23 16:05:51', 'This is spectacular', 1),
(14, 6, 5, '2022-02-23 16:11:28', 'Comments nè...', 1),
(15, 6, 5, '2022-02-23 16:12:16', 'Để làm lại', 1),
(16, 13, 2, '2022-02-23 16:43:11', 'Ui sếp đẹp choai', 1),
(17, 13, 5, '2022-02-23 16:43:34', 'Sếp&#039;sssss', 1),
(18, 7, 7, '2022-02-23 17:08:36', 'Bài hát này hay quá', 1);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `IDSong` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `songtitle` varchar(100) NOT NULL,
  `songsinger` varchar(100) NOT NULL,
  `songlyrics` longtext NOT NULL,
  `url_cover` text NOT NULL,
  `url_audio` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`IDSong`, `username`, `songtitle`, `songsinger`, `songlyrics`, `url_cover`, `url_audio`, `status`) VALUES
(6, 'test', 'Easy On Me', 'Adele', 'There ain&#039;t no gold in this river\r\nThat I&#039;ve been washin&#039; my hands in forever\r\nI know there is hope in these waters\r\nBut I can&#039;t bring myself to swim\r\nWhen I am drowning in this silence\r\nBaby, let me in\r\nGo easy on me, baby\r\nI was still a child\r\nDidn&#039;t get the chance to\r\nFeel the world around me\r\nI had no time to choose\r\nWhat I chose to do\r\nSo go easy on me\r\nThere ain&#039;t no room for things to change\r\nWhen we are both so deeply stuck in our ways\r\nYou can&#039;t deny how hard I have tried\r\nI changed who I was to put you both first\r\nBut now I give up\r\nGo easy on me, baby\r\nI was still a child\r\nDidn&#039;t get the chance to\r\nFeel the world around me\r\nHad no time to choose\r\nWhat I chose to do\r\nSo go easy on me\r\nI had good intentions\r\nAnd the highest hopes\r\nBut I know right now\r\nThat probably doesn&#039;t even show\r\nGo easy on me, baby\r\nI was still a child\r\nI didn&#039;t get the chance to\r\nFeel the world around me\r\nI had no time to choose\r\nWhat I chose to do\r\nSo go easy on me', 'test/Adele30.jpg', 'test/Adele30Easyonme.mp3', 1),
(7, 'test', 'Mang tiền về cho mẹ', 'Đen Vâu', 'Mang tiền về cho mẹ\r\nMang tiền về cho mẹ\r\nMang tiền về cho mẹ\r\nĐừng mang ưu phiền về cho mẹ\r\nMang tiền về cho mẹ\r\nMang tiền về cho mẹ\r\nMang tiền về cho mẹ\r\nĐừng mang ưu phiền về cho mẹ\r\nOh\r\nNếu không có mẹ con cũng chỉ là đồ bỏ mà thôi\r\nSẽ không có nề có nếp dù đặt mình lên cái chõ đồ xôi\r\nCái máy tính mà con thu âm mấy bài đầu\r\nMẹ đổi bằng nhiều ngày đổ mồ hôi (ướt nhoè)\r\nGiờ con đã đi làm và con kiếm tiền về\r\nMẹ chỉ cần ngồi đó mà xơi oh (nước chè)\r\nÔi những ngày xám ngoét\r\nGió liêu xiêu dáng mẹ gầy so\r\nCó khi mẹ ngất giữa đường vì cả ngày chẳng có gì no\r\nMẹ không dám ăn không dám mặc\r\nKhông dám tiêu cũng chỉ vì lo (lo cho con)\r\nGiờ con đeo túi tò te đi mua cho mẹ cái túi Dior\r\nTiếng nói đầu tiên là do ai dạy (chính là mẹ)\r\nNét chữ đầu tiên là tay ai cầm (chính là mẹ)\r\nSai lầm đầu tiên là nhờ ai sửa (chính là mẹ)\r\nVấp ngã đầu đời là được ai nâng (luôn là mẹ)\r\nBài hát hay nhất trần đời là lời mẹ ru giữa trưa nắng hè (trưa nắng hè)\r\nNhững ngày dài nhất trần đời là mẹ đi chợ xa chưa thấy về (chưa thấy về)\r\nThức ăn ngon nhất trần đời là cơm bếp củi mẹ nấu xoong gang (quá ngon)\r\nBước ra đời là ông này bà nọ trở về nhà là một đứa con ngoan (yeah)\r\nBước ra đời là ông này bà nọ trở về nhà là một đứa con ngoan oh yeah\r\nNhững đứa trẻ rồi sẽ đi xa nhà\r\nSẽ có rất nhiều hành trình qua trong đời\r\nMặc dù đời có lúc chẳng được như mong đợi\r\nRời xa mái nhà đừng hòng còn ai nuông chiều\r\nNhững đứa trẻ sẽ phải đi xa nhà\r\nSẽ phải nếm rất nhiều mặn ngọt cay chua đắng\r\nMẹ chỉ muốn chúng mày phải tự lo cho mình\r\nVề đây mà gầy là mẹ cho ăn đòn\r\nMang tiền về cho mẹ (mẹ ơi)\r\nMang tiền về cho mẹ (mẹ à)\r\nMang tiền về cho mẹ\r\nĐừng mang ưu phiền về cho mẹ\r\nMang tiền về cho mẹ (mẹ ơi)\r\nMang tiền về cho mẹ (mẹ à)\r\nMang tiền về cho mẹ\r\nĐừng mang ưu phiền về cho mẹ\r\nCon đã kiếm được tiền từ hình ảnh\r\nKiếm được tiền từ âm thanh\r\nTất cả đều do cha sinh mẹ đẻ\r\nDù không phải thế phiệt hay trâm anh\r\nNgười hâm mộ đợi con từ Đồng Khởi\r\nXếp hàng dài đến hết đường Ký Con\r\nXin chữ ký con\r\nCon rất quý họ và cũng hy vọng là họ đều quý con\r\nTiền của con không có cần phải rửa\r\nNó cũng chỉ ám mùi mồ hôi\r\nMẹ yên tâm con là công dân tốt\r\nĐóng thuế đều và chỉ có đủ mà thôi\r\nNhạc con phiêu ở nhiều phương diện\r\nTiền con kiếm là tiền lương thiện\r\nĐem sức lực ra làm phương tiện\r\nSống phải đẹp như là hoa hậu dù không cần thiết được tặng vương miện oh\r\nCon trai giống mẹ nên là con hiền khô\r\nLao vào đời không làm mẹ thêm phiền lo\r\nBỏ qua dè bỉu không cho cơm no\r\nMang về cho mẹ toàn tiền thơm tiền tho\r\nMẹ là mẹ của con\r\nCon là của mọi người\r\nLên sâu khấu làm mọi người vui\r\nVề nhà làm cho mẹ cười\r\nVì thời gian nó thật là tàn khốc nên con thấy mình càng ngày càng non gan\r\nBao nhiêu tiền mua lại được một ngày mà con còn ngồi vừa lọt cái xoong gang (xoong gang)\r\nMuốn được nghe tiếng mẹ mắng mỗi ngày để con thấy mình còn chưa được khôn ngoan\r\nCon trai mẹ chỉ là người phục vụ nhưng muốn đời đối xử với mẹ như một bà hoàng\r\nNhư một bà hoàng\r\nNhững đứa trẻ rồi sẽ đi xa nhà (như một bà hoàng)\r\nSẽ có rất nhiều hành trình qua trong đời\r\nMặc dù đời có lúc chẳng được như mong đợi\r\nRời xa mái nhà đừng hòng còn ai nuông chiều\r\nNhững đứa trẻ sẽ phải đi xa nhà\r\nSẽ phải nếm rất nhiều mặn ngọt cay chua đắng\r\nMẹ chỉ muốn chúng mày phải tự lo cho mình\r\nVề đây mà gầy là mẹ cho ăn đòn\r\nMấy đứa chúng mày liệu mà ăn cho nhiều\r\nĐừng ham chơi và chọn bạn mà chơi cho đúng\r\nNếu có gì gọi điện ngay cho mẹ\r\nChạy xe ra đường đừng rồ ga bốc đầu\r\nRa bên ngoài học điều hay mang về\r\nĐừng mang mất dạy mày về đây tao đánh\r\nTiền đã khó kiếm rồi tập xài cho tiết kiệm\r\nĐừng hút thuốc nhiều mày lại như ba mày\r\nÀ á a à ời\r\nÀ á a à ơi\r\nÀ á a à ời\r\nÀ á a à ơi\r\nÀ á a à ời\r\nÀ á a à ơi\r\nÀ á a à ời\r\nÀ á a à ơi\r\nAh con biết thời gian lạnh lùng và tàn khốc\r\nNó ám người ta từ da tới làn tóc\r\nVà không có ngoại lệ cũng không có miễn trừ\r\nLà người quan sát không bao giờ có điểm mù\r\nMẹ bán lưng cho trời bán mặt cho đất\r\nMẹ dạy đôi chân đừng dao động như con lắc\r\nVà nếu có nhiều tiền con sản xuất son môi\r\nMàu cho các mẹ con đặt tên là son sắt\r\nDù không phải doanh nhân con vẫn có kế toán\r\nĐể tiền của con không có đứa nào thó mất\r\nVì tay mẹ đã có có quá nhiều vết chai\r\nNên con đưa tiền để mẹ cầm cho nó chắc\r\nChim thì có tổ là con người thì chắc chắn phải có tông\r\nMuốn bay vào trời cao rộng con nào không cần có lông\r\nMang tiền về cho mẹ hiền để mẹ may thêm đôi cánh\r\nMang buồn về cho mẹ phiền sẽ gặp ngay thiên lôi đánh\r\nNhạc Rap đến từ Đông Nam Á (Việt Nam)\r\nMang lời mẹ bật cho bảy lục địa nghe (tiếng Việt)\r\nVâng lời mẹ không gian trá\r\nXuất khẩu âm nhạc mang tiền về ya\r\nĐưa tiền cho mẹ mẹ là tiền vệ\r\nĐừng làm điều xấu sẽ thành tiền lệ\r\nLao động hăng say hơn cả tiền đề\r\nCầm về tiền tốt đừng có cầm về tiền tệ (đừng có cầm về tiền tệ)\r\nYeah\r\nĐưa tiền cho mẹ mẹ là tiền vệ\r\nĐừng làm điều xấu sẽ thành tiền lệ\r\nLao động hăng say hơn cả tiền đề\r\nCầm về tiền tốt đừng có cầm về tiền tệ ya\r\nEy cũng may là từng lênh đênh để con biết yếu thì đừng ra gió\r\nCũng may là friend của Đen họ chưa bao giờ từng la ó\r\nCũng may là tìm thấy đường trong bao la muôn trùng xa đó\r\nVà cũng may là ba mẹ nghèo để cho con biết tiền làm ra khó ya\r\nCũng may là từng lênh đênh để con biết yếu thì đừng ra gió\r\nCũng may là fan của Đen họ chưa bao giờ từng la ó\r\nCũng may là tìm thấy đường trong bao la muôn trùng xa đó\r\nCũng may là ba mẹ nghèo để cho con biết tiền làm ra khó\r\nMang tiền về cho mẹ\r\nMang tiền về cho mẹ\r\nMang tiền về cho mẹ\r\nĐừng mang ưu phiền về cho mẹ oh\r\nMang tiền về cho mẹ (về cho mẹ)\r\nMang tiền về cho mẹ (về cho mẹ)\r\nMang tiền về cho mẹ\r\nBa cần thì xin mẹ', 'test/DenvauSingleMangtienvechome.jpg', 'test/DenSingleMangtienvechome.mp3', 1),
(8, 'test', 'Xuân thì', 'Hà Anh Tuấn', 'Gặp em trong những người bạn thân quen một ngày mùa đông\r\nNhiều năm xa cách kể từ lúc ấy chẳng còn chờ mong\r\nVà thời gian đã nhuốm màu trên ta nên giờ mình khác xưa\r\nĐôi nếp nhăn đầu mùa\r\nGiờ thôi xao xuyến nhưng còn bâng khuâng như chuyện vừa qua\r\nChuyện thời thương mến chỉ bằng đan tay hôn vội vài giây\r\nVà rồi ta cũng có niềm chưa vui mất ngàn ngày để vơi\r\nNhưng đã qua cả rồi khi vui hẵng nhớ\r\nTình buồn không phải lúc nào cũng chỉ để quên đi\r\nTình buồn lưu giữ bao nhiêu mộng mơ lúc xuân thì\r\nTại mưa tại nắng hay muôn niềm thương đã vấn vương rồi như sương một hôm mãi xa\r\nĐể rồi nghĩ tới ta đau nhẹ tênh giữa trái tim\r\nNụ cười nước mắt sau những bão giông đã ngủ yên\r\nVà nhìn lại xem ta có hạnh phúc với chính ta ngày hôm nay\r\nCó khi bước không chung đường vậy lại hay\r\nCảnh xưa nơi cũ những miền ta qua cũng nhiều đổi thay\r\nMộng mơ hoa tuyết khắp trời trắng xoá đôi tà áo bay\r\nGiờ còn bóng dáng hai người an nhiên sau không ít những chênh vênh\r\nMỉm cười với nhau lần đầu kể từ nỗi đau\r\nTình buồn không phải lúc nào cũng chỉ để quên đi\r\nTình buồn lưu giữ bao nhiêu mộng mơ lúc xuân thì\r\nTại mưa tại nắng hay muôn niềm thương đã vấn vương rồi như sương một hôm mãi xa\r\nĐể rồi nghĩ tới ta đau nhẹ tênh giữa trái tim\r\nNụ cười nước mắt sau những bão giông đã ngủ yên\r\nVà nhìn lại xem ta có hạnh phúc với chính ta ngày hôm nay\r\nCó khi bước không chung đường vậy lại hay\r\nTình buồn không phải lúc nào cũng chỉ để quên đi\r\nTình buồn lưu giữ bao nhiêu mộng mơ lúc xuân thì (lúc xuân thì)\r\nTại mưa tại nắng hay muôn niềm thương đã vấn vương rồi như sương một hôm mãi xa hah\r\nĐể rồi nghĩ tới ta đau nhẹ tênh giữa trái tim (giữa trái tim)\r\nNụ cười nước mắt sau những bão giông đã ngủ yên\r\nVà nhìn lại xem ta có hạnh phúc với chính ta ngày hôm nay\r\nCó khi bước không chung đường vậy lại hay\r\nCó khi bước không chung đường có khi mất nhau\r\nCó khi bước không chung đường vậy lại hay', 'test/HaanhtuanSingleXuanthi.jpg', 'test/HaanhtuanSingleXuanthi.mp3', 1),
(9, 'test', 'Gieo quẻ', 'Hoàng Thuỳ Linh', 'Thầy ơi cho con một quẻ xem bói đầu năm\r\nCon xin chắp tay nguyện cầu cung kính thành tâm\r\nNăm nay kinh tế thế nào\r\nBao nhiêu đồng ra đồng vào\r\nCông danh sự nghiệp ra sao\r\nCho con biết ngay đi nào\r\nChỉ riêng tình duyên thì con chẳng cần thầy phán ra\r\nTrời cho biết ngay thôi mà\r\nPhận duyên đến như món quà\r\nChờ mong tình yêu vội vàng rồi lại chẳng đến đâu\r\nThất tình thêm rồi âu sầu thôi thì ta đừng âu sầu\r\nHẹn ngày sau sẽ gặp nhau\r\nTình yêu đến như phép màu chẳng ai bói ra được đâu\r\nGặp nhau có duyên không hẹn tự nhiên ý hợp tâm đầu\r\nNgười ta ép mỡ ép dầu nào ai ép duyên được đâu\r\nTình yêu đến không mong cầu\r\nRồi mai có khi i dài lâu uh\r\nRồi mai có khi i dài lâu uh\r\nThầy ơi cho con một quẻ xem bói đầu năm\r\nCon xin chắp tay nguyện cầu cung kính thành tâm\r\nBao lâu chưa đi sang Hàn\r\nVisa con sắp hết hạn\r\nCó đứa bạn nào đâm ngang\r\nNên mua đất hay mua vàng\r\nChỉ riêng tình duyên thì con chẳng cần thầy phán ra\r\nTrời cho biết ngay thôi mà\r\nPhận duyên đến như món quà\r\nChờ mong tình yêu vội vàng rồi lại chẳng đến đâu\r\nThất tình thêm rồi âu sầu thôi thì ta đừng âu sầu\r\nHẹn ngày sau sẽ gặp nhau\r\nTình yêu đến như phép màu chẳng ai bói ra được đâu\r\nGặp nhau có duyên không hẹn tự nhiên ý hợp tâm đầu\r\nNgười ta ép mỡ ép dầu nào ai ép duyên được đâu\r\nTình yêu đến không mong cầu\r\nRồi mai có khi i dài lâu uh\r\nRồi mai có khi i dài lâu uh\r\nAh càng nhiều thứ trong đầu càng nhiều điều nuối tiếc\r\nÍt đi điều mong cầu lòng êm như suối biếc\r\nHôm qua đã xong rồi ngày mai thì khó biết\r\nCố gắng ngày hôm nay không gì là khó hết\r\nMuốn thì phải làm mà dịch ám đành phải lùi\r\nCòn sức còn khoẻ là còn mừng còn phải cười\r\nNhìn các cô chú đang chống dịch mòn cả người\r\nBớt than bớt thở mình khổ một họ khổ mười (bớt than đi)\r\nNếu mà nếu mà nếu mà đợi\r\nĐời người chỉ đường chắc gì là đường bước được\r\nTương lai là thứ không bao giờ lường trước được\r\nĐi tìm điều tích cực để vui lên mà sống thì hướng nào cũng tốt đường nào cũng thông\r\nYeah\r\nĐi tìm điều tích cực để vui lên mà sống thì hướng nào cũng tốt đường nào cũng thông\r\nRồi mai có khi i dài lâu uh\r\nRồi mai có khi i dài lâu uh', 'test/HoangthuylinhSingleGieoque.jpg', 'test/HoangthuylinhSingleGieoque.mp3', 1),
(10, 'test', 'Bước qua nhau', 'Vũ', 'Cuộc đời cứ trôi\r\nTa nhìn lại ngày tháng còn bên nhau\r\nCùng những thăng trầm\r\nTại sao không vẫy tay chào nơi ta đứng bây giờ\r\nHai nơi hai người dưng\r\nĐợi em bước qua\r\nĐể khiến anh nhận ra là đôi mắt em còn đang buồn\r\nMàu hoa cài áo vẫn còn như lời hứa đã từng\r\nGiờ đây còn như xưa\r\nDòng người vội vàng bước qua\r\nChợt như chiếc hôn thế thôi\r\nĐôi môi chia làm đôi\r\nNhư ta đang mong vậy thôi\r\nNgười nghẹn ngào bước đi\r\nChợt như chúng ta quay về\r\nGiấu trái tim mình và đừng thổn thức khi thấy nhau oh\r\nĐoàn tàu kia dừng lại\r\nCòn hai ta bước qua nhau\r\nCuộc đời cứ trôi\r\nTa nhìn lại ngày tháng còn bên nhau\r\nCùng những thăng trầm\r\nVà tại sao không vẫy tay chào nơi ta đứng bây giờ\r\nHai nơi hai người dưng\r\nĐợi em bước qua\r\nĐể khiến anh nhận ra là đôi mắt em còn đang buồn\r\nVà màu hoa cài áo vẫn còn như lời hứa đã từng\r\nGiờ đây còn như xưa\r\nDòng người vội vàng bước qua\r\nChợt như chiếc hôn thế thôi\r\nĐôi môi chia làm đôi\r\nNhư ta đang mong vậy thôi\r\nNgười nghẹn ngào bước đi\r\nChợt như chúng ta quay về\r\nGiấu trái tim mình và đừng thổn thức khi thấy nhau oh\r\nĐoàn tàu kia dừng lại (đoàn tàu kia)\r\nCòn hai ta trôi đi theo mây trời\r\nTừng cảm xúc trong tim anh đang cô đơn cùng với ngàn lời\r\nViết riêng cho bài ca tình đầu\r\nChỉ còn lại một thói quen từ lâu woh\r\nDòng người vội vàng bước qua\r\nChợt như chiếc hôn thế thôi\r\nĐôi môi chia làm đôi\r\nNhư ta đang mong vậy thôi oh oh', 'test/VuSingleBuocquanhau.jpg', 'test/VuSingleBuocquanhau.mp3', 1),
(11, 'test', '3107-2', 'DuongG x Nâu x W/N', 'Đến bao giờ mới có thể quên đi những câu chuyện mà ta đã trao\r\nĐến bao giờ mới có thể yêu một người đến sau\r\nĐến bao giờ mới có thể quên đi những kỉ niệm mà ta đã qua\r\nVà nếu hôm nay là ngày mà chúng ta đã rời xa.\r\n\r\nChỉ cần ai đó cạnh bên dừng lại và níu lấy em chỉ một phút giây\r\nDù là có đúng hay sai vẫn cứ yêu thêm một lần chẳng cần nghi ngại\r\nNgày dài vẫn thế cứ thế trôi hoài lạc mất nhau sao mình còn đi mãi\r\nNơi anh đến sẽ là một nơi chẳng còn có em.', 'test/31702-image.jpg', 'test/31072.mp3', 1),
(12, 'test', 'Chúng ta sau này', 'TRI', 'Cuộc sống từ khi ngày anh lỡ buông mất tay em\r\nLà mỗi buổi sáng bật dậy trong nỗi bơ vơ\r\nLàm mọi điều để có thể\r\nĐể lòng này sẽ mau quên\r\nĐiều gì xảy đến\r\nChắc sẽ qua nhanh\r\nDạo qua một nơi mà giờ cũng vẫn chỉ là\r\nNhìn lên là cả bầu trời kí ức mình từng\r\nTừng ngồi nhìn ngắm phố xá\r\nThì thầm chỉ yêu riêng em\r\nChẳng hiểu giờ thế nào, anh lỡ mất em\r\nSau này liệu chúng ta\r\nGặp nhau vẫn sẽ mỉm cười?\r\nHay là chỉ lướt qua\r\nMặt nhau rồi nhanh bước\r\nSau này liệu chúng ta\r\nCó thể sẽ có được tất cả nhưng lại chẳng có nhau\r\nTa liệu có vui, hay quên mau?\r\nVì đôi khi trong phút chốc\r\nMà ta làm nhau thêm đau\r\nHuh uh huh uh huh\r\nHuh uh huh uh huh\r\nDạo qua một nơi mà giờ cũng vẫn chỉ là (chỉ là quá khứ)\r\nNhìn lên là cả bầu trời kí ức mình từng\r\nMình từng ngồi nhìn ngắm phố xá\r\nThì thầm chỉ yêu mỗi em thôi\r\nChẳng hiểu giờ thế nào, anh lỡ mất em\r\nSau này liệu chúng ta\r\nGặp nhau vẫn sẽ mỉm cười?\r\nHay là chỉ lướt qua\r\nMặt nhau rồi nhanh bước\r\nSau này liệu chúng ta\r\nCó thể sẽ có được tất cả nhưng lại chẳng có nhau\r\nTa liệu có vui, hay sẽ sớm quên nhau?\r\nTa liệu có vui?', 'test/ChungTaSauNay-image.jpg', 'test/ChungTaSauNay.mp3', 1),
(13, 'test', 'Hãy trao cho anh', 'Sơn Tùng M-TP', 'Lala lala lala\r\nHình bóng ai đó nhẹ nhàng vụt qua nơi đây\r\nQuyến rũ ngây ngất loạn nhịp làm tim mê say\r\nCuốn lấy áng mây theo cơn sóng xô dập dìu\r\nNụ cười ngọt ngào cho ta tan vào phút giây miên man quên hết con đường về eh\r\nLet me know your name\r\nChẳng thể tìm thấy lối về eh\r\nLet me know your name\r\nĐiệu nhạc hòa quyện trong ánh mắt đôi môi\r\nDẫn lối những bối rối rung động khẽ lên ngôi\r\nVà rồi khẽ và rồi khẽ khẽ\r\nChạm nhau mang vô vàn đắm đuối vấn vương dâng tràn\r\nLấp kín chốn nhân gian làn gió hoá sắc hương mơ màng\r\nMột giây ngang qua đời cất tiếng nói không nên lời\r\nẤm áp đến trao tay ngàn sao trời thêm chơi vơi\r\nDịu êm không gian bừng sáng đánh thức muôn hoa mừng\r\nQuấn quít hát ngân nga từng chút níu bước chân em dừng\r\nBao ý thơ tương tư ngẩn ngơ (la la la)\r\nLưu dấu nơi mê cung đẹp thẫn thờ\r\nOh oh oh oh uh\r\nHãy trao cho anh hãy trao cho anh\r\nHãy trao cho anh thứ anh đang mong chờ (oh oh oh oh)\r\nHãy trao cho anh hãy trao cho anh\r\nHãy mau làm điều ta muốn vào khoảnh khắc này đê (oh oh oh oh)\r\nHãy trao cho anh đê hãy trao cho anh đê\r\nHãy trao anh trao cho anh đi những yêu thương nồng cháy (chỉ mình anh thôi)\r\nTrao anh ái ân nguyên vẹn đong đầy\r\nLala lala\r\nLala lala\r\nLala lala\r\nLala lala\r\nLooking at my Gucci is about that time\r\nWe can smoke a blunt and pop a bottle of wine\r\nNow get yourself together and be ready by nine\r\nCuz we gon&#039; do some things that will shatter your spine\r\nCome one undone Snoop Dogg Son Tung\r\nLong Beach is the city that I come from\r\nSo if you want some get some\r\nBetter enough take some take some\r\nChạm nhau mang vô vàn đắm đuối vấn vương dâng tràn\r\nLấp kín chốn nhân gian làn gió hóa sắc hương mơ màng\r\nMột giây ngang qua đời cất tiếng nói không nên lời\r\nẤm áp đến trao tay ngàn sao trời lòng càng thêm chơi vơi\r\nDịu êm không gian bừng sáng đánh thức muôn hoa mừng\r\nQuấn quít hát ngân nga từng chút níu bước chân em dừng\r\nBao ý thơ tương tư ngẩn ngơ (la la la)\r\nLưu dấu nơi mê cung đẹp thẫn thờ\r\nOh oh oh oh uh\r\nHãy trao cho anh hãy trao cho anh\r\nHãy trao cho anh thứ anh đang mong chờ (oh oh oh oh)\r\nHãy trao cho anh hãy trao cho anh\r\nHãy mau làm điều ta muốn vào khoảnh khắc này đê (oh oh oh oh)\r\nHãy trao cho anh đê hãy trao cho anh đê\r\nHãy trao anh trao cho anh đi những yêu thương nồng cháy (chỉ mình anh thôi)\r\nTrao anh ái ân nguyên vẹn đong đầy\r\nLala lala\r\nLala lala\r\nLala lala\r\nLala lala\r\nLàm cho ta ngắm thêm nàng vội vàng qua chốc lát\r\nNhư thanh âm chứa bao lời gọi mời trong khúc hát\r\nLiêu xiêu ta xuyến xao rạo rực khát khao trông mong\r\nDịu dàng lại gần nhau hơn dang tay ôm em vào lòng\r\nThôi trao đi trao hết đi đừng ngập ngừng che dấu nữa\r\nQuên đi quên hết đi ngại ngùng lại gần thêm chút nữa\r\nChìm đắm giữa khung trời riêng hai ta như dần hòa quyện\r\nMắt nhắm mắt tay đan tay hồn lạc về miền trăng sao\r\nBuông lơi cho ta ngắm thêm nàng vội vàng qua chốc lát\r\nNhư thanh âm chứa bao lời gọi mời trong khúc hát\r\nLiêu xiêu ta xuyến xao rạo rực khát khao trông mong\r\nDịu dàng lại gần nhau hơn dang tay ôm em vào lòng\r\nTrao đi trao hết đi đừng ngập ngừng che dấu nữa\r\nQuên đi quên hết đi ngại ngùng lại gần thêm chút nữa\r\nChìm đắm giữa khung trời riêng hai ta như dần hòa quyện\r\nMắt nhắm mắt tay đan tay hồn lạc về miền trăng sao\r\nHãy trao cho anh hãy trao cho anh (let&#039;s go)\r\nHãy trao cho anh cho anh cho anh (lala)\r\nHãy trao cho anh hãy trao cho anh\r\nHãy trao cho anh cho anh cho anh (lala)\r\nHãy trao cho anh hãy trao cho anh\r\nHãy trao cho anh cho anh cho anh (lala)\r\nHãy trao cho anh hãy trao cho anh\r\nHãy trao cho anh thứ anh đang mong chờ', 'test/HayTraoChoAnh-image.jpg', 'test/HayTraoChoAnh.mp3', 1),
(14, 'test', 'Hôm nay tôi buồn', 'Phùng Khánh Linh', 'Hôm nay tôi buồn một mình trên phố đông\r\nNơi ánh đèn soi sáng long lanh\r\nNhững gương mặt lạ lẫm\r\nThương cho mối tình của tôi chẳng có vui\r\nHỡi anh này tôi rất yêu anh\r\nSao anh lại ra đi?\r\nChờ những giấc mơ qua\r\nHay chờ hình bóng ai kia\r\nTheo mùa yêu dấu nay mang nỗi sầu\r\nĐợi một tiếng yêu đã thân thuộc\r\nMà bóng nghe sao xa lạ?\r\nNhư ngày hôm nay\r\nVà theo tiếng yêu nơi phương trời xa\r\nTạm biệt chuyến xe anh đi về đâu\r\nAnh có ngoảnh mặt lại không anh?\r\nĐể nhìn em thêm lần nữa\r\nĐèn đường hắt hiu góc phố mình em\r\nBuồn ơi cớ sao vây quanh lòng em\r\nChỉ hôm nay thôi, tôi xin nhắc lại\r\nChỉ hôm nay thôi\r\nHôm nay tôi buồn\r\nChờ những giấc mơ qua\r\nHay chờ hình bóng ai kia\r\nTheo mùa yêu dấu nay mang nỗi sầu\r\nĐợi một tiếng yêu đã thân thuộc\r\nMà bóng nghe sao xa lạ\r\nNhư ngày hôm nay\r\nVà theo ước mơ nơi phương trời xa\r\nTạm biệt chuyến xe anh đi về đâu\r\nAnh có ngoảnh mặt lại không anh?\r\nĐể nhìn em thêm lần nữa\r\nĐèn đường hắt hiu góc phố mình em\r\nMột hai bước chân cô đơn lạc lõng\r\nChỉ hôm nay thôi, tôi xin nhắc lại\r\nChỉ hôm nay thôi\r\nChạy theo những ước mơ\r\nBỏ quên đi những tháng năm mình đã\r\nBên nhau nồng nàn\r\nVà ngày ta đã hứa bên nhau\r\nMà giờ sao như gió mây bay\r\nLòng em luôn nhớ\r\nVà theo tiếng yêu nơi phương trời xa\r\nTạm biệt chuyến xe anh đi về đâu\r\nAnh có ngoảnh mặt lại không anh?\r\nĐể nhìn em thêm lần nữa\r\nĐèn đường hắt hiu góc phố mình em\r\nBuồn ơi cớ sao vây quanh lòng em\r\nChỉ hôm nay thôi, tôi xin nhắc lại\r\nChỉ hôm nay thôi\r\nEm nhớ\r\nNhớ anh\r\nHôm nay tôi buồn', 'test/HomNayToiBuon-image.jpg', 'test/HomNayToiBuon.mp3', 1),
(15, 'test', 'Em đây chẳng phải Thuý Kiều', 'Hoàng Thuỳ Linh', 'Bao ngày không nói\nNgười nơi đâu mất rồi\nSao từng vui thế?\nÂn cần thế?\nNhưng giờ lại thôi\nEm từng mong ngóng\nMột câu anh ngỏ lời\nThật tâm anh có yêu không?\nNếu anh cứ đi và tìm chốn xa lạ\nNếu em cứ yêu và chờ anh ở nhà\nNếu mai cách xa liệu anh có thấy vui?\nNếu em cứ ngây khờ như ban đầu\nVẫn tin dẫu đôi lần em ưu sầu\nRồi anh vội mang ấm áp trao người khác\nEm đây chẳng phải Thúy Kiều\nGiam thanh xuân chờ tình yêu anh\nTrao em nụ hôn nhưng chẳng mong mình có nhau\nTrăm năm Kiều vẫn là Kiều\nNhưng em đâu liều mình yêu anh\nXin anh rời xa trao lại em chút bình yên\nHuh-huh-huh-huh\nOh-bae-bae-bae-bae-bae\nHuh-huh-huh-huh\nOh-bae-bae-bae-bae-bae\nHuh-huh-huh-huh\nOh-bae-bae-bae-bae-bae\nHuh-huh-huh-huh\nOh-bae-bae-bae-bae-bae\nAnh đừng như thế\nMàu môi em úa tàn\nĐêm buồn ngơ ngác\nTrăng dù sáng\nSoi hồ nhòe tan\nEm chỉ nhìn thấy\nVầng trăng anh giữa trời\nCòn anh thấy lấp lánh muôn sao\nNếu anh cứ đi và tìm chốn xa lạ\nNếu em cứ yêu và chờ anh ở nhà\nNếu ta cách xa liệu anh có thấy vui?\nNếu em cứ ngây khờ như ban đầu\nVẫn tin dẫu bao lần em ưu sầu\nThì anh không mang ấm áp trao người khác?\nEm đây chẳng phải Thúy Kiều\nGiam thanh xuân chờ tình yêu anh\nTrao em nụ hôn nhưng chẳng mong mình có nhau\nTrăm năm Kiều vẫn là Kiều\nNhưng em đâu liều mình yêu anh\nXin anh rời xa trao lại em chút bình yên\nHuh-huh-huh-huh\nHuh-huh-huh-huh\nHuh-huh-huh-huh\nHuh-huh-huh-huh\nHuh-huh-huh-huh\nOh-bae-bae-bae-bae-bae\nHuh-huh-huh-huh\nOh-bae-bae-bae-bae-bae\nHuh-huh-huh-huh\nOh-bae-bae-bae-bae-bae\nHuh-huh-huh-huh\nOh-bae-bae-bae-bae-bae\nEm đây chẳng phải Thúy Kiều', 'test/EmDayChangPhaiThuyKieu-image.jpg', 'test/EmDayChangPhaiThuyKieu.mp3', 1),
(16, 'test', 'Gác lại âu lo', 'DaLAB', 'Anh đi lạc trong sóng gió cuộc đời\r\nNào biết đâu sớm mai liệu bình yên có tới\r\nÂu lo chạy theo những ánh sao đêm\r\nNgày cứ trôi chớp mắt thành phố đã sáng đèn\r\nTa cứ lặng lẽ chạy thật mau\r\nYêu thương chẳng nói kịp thành câu\r\nBiết đâu liệu mai còn thấy nhau\r\nThức giấc để anh còn được thấy\r\nÁnh mắt của em nhẹ nhìn anh\r\nĐôi tay này sẽ không xa rời\r\nTạm gác hết những âu lo lại, cùng anh bước trên con đường\r\nTa sẽ không quay đầu để rồi phải tiếc nuối những chuyện cũ đã qua\r\nGiữ trái tim luôn yên bình và quên hết những ưu phiền vấn vương\r\nCuộc đời này được bao lần nói yêu\r\nAnh biết nơi để quay về, em biết nơi phải đi\r\nAnh biết chỗ trú chân dọc đường để tránh cơn mưa hạ đến mỗi chiều\r\nTa biết trao nhau ân cần, biết mỗi khi vui buồn có nhau\r\nThời gian để ta trưởng thành với nhau\r\nNhảy với anh đến khi đôi chân rã rời\r\nHát anh nghe những câu ca từ ngày xưa cũ\r\nThì thầm khẽ anh nghe em vẫn còn bao niềm mơ\r\nÔm lấy anh nghe mưa đầu mùa ghé chơi\r\nMột giây không thấy nhau như một đời cô đơn quá\r\nTrời mù mây bỗng nhiên ngát xanh khi em khẽ cười\r\nMột ngày anh biết hết nguyên do của những yên vui trong đời\r\nLà ngày duyên kiếp kia đưa ta gần lại với nhau\r\nTạm gác hết những âu lo lại, cùng anh bước trên con đường\r\nTa sẽ không quay đầu để rồi phải tiếc nuối những chuyện cũ đã qua\r\nGiữ trái tim luôn yên bình và quên hết những ưu phiền vấn vương\r\nCuộc đời này được bao lần nói yêu\r\nAnh biết nơi để quay về, em biết nơi phải đi\r\nAnh biết chỗ trú chân dọc đường để tránh cơn mưa hạ đến mỗi chiều\r\nTa biết trao nhau ân cần, biết mỗi khi vui buồn có nhau\r\nThời gian để ta trưởng thành với nhau\r\nBờ vai anh rộng đủ để che chở cho em\r\nWas a boy now a man cho em\r\nTừng đi lạc ở trong thế giới điên rồ ngoài kia\r\nVà tình yêu em trao anh ngày ấy đã mang anh về bên em\r\nYêu em như a fat kid loves cake\r\nNhắm mắt cảm nhận tình yêu tan dịu ngọt trên môi khi em hôn môi anh đây\r\nKhông có happy ending\r\nMỗi bình minh ta biết thêm trang mới nối dài câu chuyện mình\r\nNhư trong mơ nơi xa kia xanh biếc xanh biếc\r\nThiên đàng bên em nơi đây anh biết anh biết\r\nBóng đêm đã qua yên bình\r\nCó thêm chúng ta nghe lòng đàn từng câu ca\r\nCuộc đời này chẳng hề hối tiếc những tháng năm ta đi cùng nhau\r\nAnh biết em luôn ở đó nơi anh thuộc về\r\nTạm gác hết những âu lo lại, cùng anh bước trên con đường\r\nTa sẽ không quay đầu để rồi phải tiếc nuối những chuyện cũ đã qua\r\nGiữ trái tim luôn yên bình và quên hết những ưu phiền vấn vương\r\nCuộc đời này được bao lần nói yêu\r\nAnh biết nơi để quay về, em biết nơi phải đi\r\nAnh biết chỗ trú chân dọc đường để tránh cơn mưa hạ đến mỗi chiều\r\nTa biết trao nhau ân cần, biết mỗi khi vui buồn có nhau\r\nThời gian để ta trưởng thành với nhau', 'test/GacLaiAuLo-image.jpg', 'test/GacLaiAuLo.mp3', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`IDacc`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `badwords`
--
ALTER TABLE `badwords`
  ADD PRIMARY KEY (`IDword`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`IDCmt`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`IDSong`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `IDacc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `badwords`
--
ALTER TABLE `badwords`
  MODIFY `IDword` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `IDCmt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `IDSong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
