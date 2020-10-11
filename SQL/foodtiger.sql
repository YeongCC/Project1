-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2020 at 01:25 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodtiger`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `Name`, `Email`, `Password`, `Position`) VALUES
(1, 'Foodtiger', 'admin@admin.com', '$2y$10$U4pkflE7x9vTSuZe7U6Inu.1/Aac4QGIbplbvyihNEHzGfFKrSj.m', 'Super Admin'),
(2, 'HandsomeC', 'yeong4470@gmail.com', '$2y$10$bLnd7aj3muaETBOKSFJ/kuRyn2X2I3bsyL74v.pjIIoaI0JKIZ9g.', 'Admin'),
(3, 'fdfdgr', '123@123gmail.com', '$2y$10$EXlUvS9HVIUmXRXgSqY1KOBryV41rgJbZ7R7PzvSi/TWXYYLaqunC', 'Deliver Man'),
(6, 'ewew hahahahfewf', 'admin@admin.com', '$2y$10$hsnlY8iBZ2ADuFVOAS3Em.Et1yA6VZqlMKOWXOx8QCqbW1XrR9xsK', 'Deliver Man');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `contain` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Email` varchar(255) NOT NULL,
  `Name` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `contain`, `image`, `time_date`, `Email`, `Name`) VALUES
(22, 'How does the recommen', '\"Looking back on a childhood filled with events and memories, I find it rather difficult to pick one that leaves me with the fabled \"warm and fuzzy feelings.\" As the daughter of an Air Force major, I had the pleasure of traveling across America in many moving trips. I have visited the monstrous trees of the Sequoia National Forest, stood on the edge of the Grand Canyon and have jumped on the beds at Caesar\'s Palace in Lake Tahoe.\"\r\n\r\n\"The day I picked my dog up from the pound was one of the happiest days of both of our lives. I had gone to the pound just a week earlier with the idea that I would just \"look\" at a puppy. Of course, you can no more just look at those squiggling little faces so filled with hope and joy than you can stop the sun from setting in the evening. I knew within minutes of walking in the door that I would get a puppy… but it wasn\'t until I saw him that I knew I had found my puppy.\"\r\n\r\n\"Looking for houses was supposed to be a fun and exciting process. Unfortunately, none of the ones that we saw seemed to match the specifications that we had established. They were too small, too impersonal, too close to the neighbors. After days of finding nothing even close, we began to wonder: was there really a perfect house out there for us?\"', '../image/blog/western food.jpg', '2020-10-06 23:16:17', 'admin@admin.com', 'Foodtiger'),
(23, '中国的王帝大传 ', 'deefqefeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花', '../image/blog/food5.jpg', '2020-10-06 23:08:32', 'admin@admin.com', 'Foodtiger'),
(25, 'How does the recommendation system help in our cognitive aspects ', '祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花', '../image/blog/food4.jpg', '2020-10-06 23:05:57', 'admin@admin.com', 'Foodtiger'),
(26, 'How does the recommendation system help in our cognitive aspects ', '祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花祝你福如加勒比海寿比晕花', '../image/blog/food5.jpg', '2020-10-06 22:46:01', 'admin@admin.com', 'Foodtiger'),
(28, 'How does the re', '<div class=\"col col-xs-8\">\r\n                    <ul class=\"pagination hidden-xs pull-right\">  \r\n                      <?php\r\n                      for ($page=1;$page<=$number_of_pages;$page++) {\r\n                        echo \' <li><a href=\"category.php?page=\' . $page . \'\">\' . $page . \'</a> </li> \';}\r\n                        ?>                \r\n                    </ul>\r\n                  </div><div class=\"col col-xs-8\">\r\n                    <ul class=\"pagination hidden-xs pull-right\">  \r\n                      <?php\r\n                      for ($page=1;$page<=$number_of_pages;$page++) {\r\n                        echo \' <li><a href=\"category.php?page=\' . $page . \'\">\' . $page . \'</a> </li> \';}\r\n                        ?>                \r\n                    </ul>\r\n                  </div><div class=\"col col-xs-8\">\r\n                    <ul class=\"pagination hidden-xs pull-right\">  \r\n                      <?php\r\n                      for ($page=1;$page<=$number_of_pages;$page++) {\r\n                        echo \' <li><a href=\"category.php?page=\' . $page . \'\">\' . $page . \'</a> </li> \';}\r\n                        ?>                \r\n                    </ul>\r\n                  </div>', '../image/blog/food4.jpg', '2020-10-06 23:15:37', 'admin@admin.com', 'Foodtiger');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `category_exixts` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `name`, `description`, `image`, `category_exixts`) VALUES
(2, 'Chinese', 'Chinese cuisine is an important part of Chinese culture, which includes cuisine originating from the diverse regions of China, as well as from Overseas Chinese who have settled in other parts of the world.', '../../image/category/chinese food.jpg', '1'),
(3, 'Western', 'European or western cuisine is the cuisines of Europe and other Western countries, including the cuisines brought to other countries by European settlers and colonists. Sometimes the term ', '../../image/category/western food.jpg', '1'),
(4, 'Indian', 'Indian cuisine consists of a variety of regional and traditional cuisines native to the Indian subcontinent. Given the diversity in soil, climate, culture, ethnic groups, and occupations,', '../../image/category/indian food.jpg', '1'),
(5, 'Korean', 'Korean cuisine is largely based on rice, vegetables, and (at least in the South) meats. Traditional Korean meals are named for the number of side dishes that accompany steam-cooked short-grain rice. Kimchi is served at nearly every meal.', '../../image/category/Korean food.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `to_user` varchar(255) NOT NULL,
  `from_user` varchar(255) NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `to_user`, `from_user`, `message`, `time_date`, `status`) VALUES
(110, 'admin', 'admin@admin.com', 'e', '2020-10-04 08:14:47', 2),
(111, 'admin', 'admin@admin.com', 'ewew', '2020-10-05 09:23:18', 2),
(112, 'admin', 'admin@admin.com', 'jm', '2020-10-05 09:23:08', 1),
(113, 'admin', 'admin@admin.com', 'erre', '2020-10-05 09:48:30', 2),
(114, 'kohmingseng@gmail.com', 'admin', 'gr', '2020-10-07 11:53:51', 1),
(115, 'kohmingseng@gmail.com', 'admin', 'ewfwefwe', '2020-10-07 12:21:46', 1),
(116, 'kohmingseng@gmail.com', 'admin', 'haiya', '2020-10-07 12:22:08', 1),
(117, 'admin', 'yeong4470@gmail.com', 'dsf', '2020-10-07 12:39:58', 1),
(118, 'admin', 'admin@awefwedmin.com', 'wfewf', '2020-10-07 12:44:57', 1),
(119, 'admin', 'admin@awefwedmin.com', 'erg', '2020-10-07 13:08:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNo` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `Name`, `Email`, `PhoneNo`, `Address`, `Password`) VALUES
(1, 'HandsomeC', 'yeong4470@gmail.com', '0147464470', '27,jalan indah', '$2y$10$gevtf749FJBJMhkydZPDOuLdjxLF1O5xiNF6R9uQga7lWRR13Fyq.'),
(2, 'qefewf', 'grwg@rfver.com', '0147464470', '27edweewfef', '$2y$10$Nzh2jASFeCUJobmfYgweX.kaa1jneALLvHX6AVSeWwSWipmH1H3im'),
(3, 'egewge', 'admin@admin.com', '014-7464470', '27edwe', '$2y$10$s94xO95WlK6wBRDEjwSmduF0JzXtBEBtmsYydMt8GNvLvdONgWnfS'),
(4, 'Jiahuitey', 'jiahuitey852003@hotmail.com', '01110858782', 'No53,Jalan Indah12/12,Taman Bukit Indah,81200 JB', '$2y$10$3joXWrQdw2LPSgCbUv0YzOPWOQaRPuFENZaf4eMkf5klv1vS3N6lu'),
(51, 'KOH', 'kohmingseng@gmail.com', '01122334567', '81200 Johor Bahru,Johor', '$2y$10$9W0CLS3p61tJoSAlbCfQde2oTDRR8cgl8Q2puGF6qoXJOF5kbMQq2'),
(52, 'yang che', 'admin@awefwedmin.com', '01473464470', '27edwe', '$2y$10$MIxSVot/AwbvWD.4dICGRupIIXBiySjoOYVVl1p5NcfMcAc67cQbu'),
(53, '', '', '', '', '$2y$10$gfi3SlBv1el3Iseiv8/8Bu9INH3eFKAclwpzHOyzxE/x/w74F6WpO');

-- --------------------------------------------------------

--
-- Table structure for table `cus_order`
--

CREATE TABLE `cus_order` (
  `custorder_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cus_order`
--

INSERT INTO `cus_order` (`custorder_id`, `order_id`, `email`, `time_date`) VALUES
(12, '5f7e7645e3b14', 'yeong4470@gmail.com', '2020-10-08 02:15:34'),
(13, '5f7e7676a5808', 'yeong4470@gmail.com', '2020-10-08 02:16:23'),
(14, '5f7e771c88796', 'yeong4470@gmail.com', '2020-10-08 02:19:10'),
(15, '5f7e772bf179c', 'yeong4470@gmail.com', '2020-10-08 02:19:25'),
(16, '5f7e77893b441', 'yeong4470@gmail.com', '2020-10-08 02:20:58'),
(17, '5f7e77aed5040', 'yeong4470@gmail.com', '2020-10-08 02:21:36'),
(18, '5f7e93b897870', 'yeong4470@gmail.com', '2020-10-08 04:21:14'),
(19, '5f800d7f90561', 'yeong4470@gmail.com', '2020-10-09 07:13:05'),
(20, '5f800efab5cb9', 'yeong4470@gmail.com', '2020-10-09 07:19:24'),
(21, '5f801e19095b9', 'yeong4470@gmail.com', '2020-10-09 08:23:54');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `suggestions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `Email`, `Name`, `phone`, `feedback`, `suggestions`) VALUES
(2, 'yeong4470@gmail.com', 'HandsomeC', '0147464470', 'good', 'reff');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `f_id` int(11) NOT NULL,
  `cart_id` int(10) NOT NULL,
  `nameFood` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `imageFood` varchar(500) NOT NULL,
  `price` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`f_id`, `cart_id`, `nameFood`, `description`, `imageFood`, `price`) VALUES
(5, 2, 'Char kway teow', 'Char kway teow  is a popular noodle dish from Maritime Southeast Asia, notably in Indonesia, Malaysia, Singapore, and Brunei. In Hokkien, Char means â€œstir-friedâ€ and kway teow refers to flat rice noodles. The dish is considered a national favourite in', '../../image/food/char kway teow.jpg', 6),
(6, 2, 'Bak kut teh', 'Bak kut teh is a pork rib dish cooked in broth popularly served in Malaysia and Singapore where there is a predominant Hoklo and Teochew community, and also in neighbouring areas like Indonesia in Riau Islands and Southern Thailand.', '../../image/food/Bak Kut Teh.jpg', 8),
(8, 3, 'Pizza', 'Pizza is a savory dish of Italian origin consisting of a usually round, flattened base of leavened wheat-based dough topped with tomatoes, cheese, and often various other ingredients', '../../image/food/pizza.jpg', 12),
(9, 3, 'Burger', 'Burger is a sandwich consisting of one or more cooked patties of ground meat, usually beef, placed inside a sliced bread roll or bun. The patty may be pan fried, grilled, smoked or flame broiled. ... A hamburger topped with cheese is called a cheeseburger', '../../image/food/burger.jpg', 8),
(10, 3, 'Beef', 'Beef, flesh of mature cattle, as distinguished from veal, the flesh of calves. The best beef is obtained from early maturing, special beef breeds. High-quality beef has firm, velvety, fine-grained lean, bright red in colour and well-marbled. The fat is sm', '../../image/food/beef.jpg', 15),
(11, 4, 'Roti Canai', 'Roti canai is made from dough which is usually composed of fat (usually ghee), flour and water; some recipes also include sweetened condensed milk. The dough is repeatedly kneaded, flattened, oiled, and folded before proofing, creating layers.', '../../image/food/roti canai.jpeg', 3),
(12, 4, 'Dosa', 'A dosa is a rice pancake, originating from South India, made from a fermented batter. It is somewhat similar to a crepe in appearance. Its main ingredients are rice and black gram, ground together in a fine, smooth batter with a dash of salt.', '../../image/food/tosei.jpg', 2),
(14, 4, 'Maggi goreng', 'Maggi goreng is a style of cooking instant noodles, in particular the Maggi product range, which is common in Malaysia. It is commonly served at Indian Muslim (or Mamak) food stalls in Malaysia and Singapore.', '../../image/food/maggi goreng.jpg', 6),
(17, 5, 'Kimchi', 'Kimchi is Korean terminology for fermented vegetables, and encompasses salt and seasoned vegetables. Kimchi is a traditional Korean dish consisting of pickled vegetables, which is mainly served as a side dish with every meal, but also can be served as a m', '../../image/food/Kimchi.jpg', 8),
(18, 5, 'Bibimbap ', 'Bibimbap sometimes romanized as bi bim bap or bi bim bop, is a Korean rice dish. The term  sometimes romanized as bi bim bap or bi bim bop, is a Korean rice dish.', '../../image/food/bibimbap.jpg', 10),
(19, 5, 'Japchae', 'Japchae is a sweet and savory dish of stir-fried glass noodles and vegetables that is popular in Korean cuisine.Japchae is typically prepared with dangmyeon (ë‹¹ë©´, å”éºµ), a type of cellophane noodles made from sweet potato starch; the noodles are topp', '../../image/food/Japchae.jpg', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `cust_id` varchar(255) NOT NULL,
  `order_id` int(30) NOT NULL,
  `foodname` varchar(255) NOT NULL,
  `price` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`cust_id`, `order_id`, `foodname`, `price`, `quantity`, `username`, `date_time`) VALUES
('5f7e7645e3b14', 16, ' Bak kut teh ', 8, 1, ' yeong4470@gmail.com ', '2020-10-08 02:15:34'),
('5f7e7676a5808', 17, ' Bak kut teh ', 8, 1, ' yeong4470@gmail.com ', '2020-10-08 02:16:23'),
('5f7e771c88796', 18, ' Bak kut teh ', 8, 1, ' yeong4470@gmail.com ', '2020-10-08 02:19:10'),
('5f7e772bf179c', 19, ' Burger ', 8, 1, ' yeong4470@gmail.com ', '2020-10-08 02:19:25'),
('5f7e77893b441', 20, ' Burger ', 8, 1, ' yeong4470@gmail.com ', '2020-10-08 02:20:58'),
('5f7e77aed5040', 21, ' Burger ', 8, 1, ' yeong4470@gmail.com ', '2020-10-08 02:21:36'),
('5f7e93b897870', 22, ' Burger ', 8, 1, ' yeong4470@gmail.com ', '2020-10-08 04:21:14'),
('5f800d7f90561', 23, ' Bak kut teh ', 8, 2, ' yeong4470@gmail.com ', '2020-10-09 07:13:05'),
('5f800d7f90561', 24, ' Pizza ', 12, 3, ' yeong4470@gmail.com ', '2020-10-09 07:13:05'),
('5f800efab5cb9', 25, ' Bak kut teh ', 8, 2, ' yeong4470@gmail.com ', '2020-10-09 07:19:24'),
('5f801e19095b9', 26, ' Burger ', 8, 1, ' yeong4470@gmail.com ', '2020-10-09 08:23:54');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `PhoneNo` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_way` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `receive` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `order_id`, `email`, `Name`, `PhoneNo`, `Address`, `price`, `time_date`, `payment_way`, `status`, `receive`) VALUES
(10, '5f7e7676a5808', 'yeong4470@gmail.com', 'HandsomeC', '0147464470', '27,jalan indah', 9, '2020-10-08 02:16:23', 'stripe', 'paid', 'yes'),
(11, '5f7e771c88796', 'yeong4470@gmail.com', 'HandsomeC', '0147464470', '27,jalan indah', 9, '2020-10-08 02:19:10', 'cash', 'paid', 'yes'),
(12, '5f7e772bf179c', 'yeong4470@gmail.com', 'HandsomeC', '0147464470', '27,jalan indah', 9, '2020-10-08 02:19:25', 'stripe', 'paid', 'yes'),
(13, '5f7e77893b441', 'yeong4470@gmail.com', 'HandsomeC', '0147464470', '27,jalan indah', 9, '2020-10-08 02:20:58', 'stripe', 'paid', 'yes'),
(14, '5f7e93b897870', 'yeong4470@gmail.com', 'HandsomeC', '0147464470', '27,jalan indah', 9, '2020-10-08 04:21:14', 'cash', 'unpaid', 'no'),
(15, '5f800d7f90561', 'yeong4470@gmail.com', 'HandsomeC', '0147464470', '27,jalan indah', 57, '2020-10-09 07:13:05', 'cash', 'unpaid', 'no'),
(16, '5f800efab5cb9', 'yeong4470@gmail.com', 'HandsomeC', '0147464470', '27,jalan indah', 18, '2020-10-09 07:19:24', 'cash', 'unpaid', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `requestjob`
--

CREATE TABLE `requestjob` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `PhoneNo` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `years` varchar(255) NOT NULL,
  `language` varchar(50) NOT NULL,
  `citizen` varchar(15) NOT NULL,
  `validDriverLicense` varchar(50) NOT NULL,
  `vehicle` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requestjob`
--

INSERT INTO `requestjob` (`id`, `firstName`, `lastName`, `PhoneNo`, `Email`, `years`, `language`, `citizen`, `validDriverLicense`, `vehicle`, `City`, `status`, `time_date`) VALUES
(15, 'ewew', 'hahahah', '234234234 ', 'admin@admin.com', 'above', ' Malay', 'Yes', 'Valid', 'Motorcycle', 'Seremban', 'have not approve', '2020-10-09 10:18:13');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `customer_id`, `product`, `amount`, `currency`, `status`, `created_at`) VALUES
(3, 'cus_IA90SaHdf3wHGw', 'Food', '880', 'myr', 'succeeded', '2020-10-08 02:18:49'),
(4, 'cus_IA91Ske59I8mui', 'Food', '880', 'myr', 'succeeded', '2020-10-08 02:19:37'),
(5, 'cus_IA92scF6s7zFev', 'Food', '880', 'myr', 'succeeded', '2020-10-08 02:21:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `cus_order`
--
ALTER TABLE `cus_order`
  ADD PRIMARY KEY (`custorder_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestjob`
--
ALTER TABLE `requestjob`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `cus_order`
--
ALTER TABLE `cus_order`
  MODIFY `custorder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `requestjob`
--
ALTER TABLE `requestjob`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
