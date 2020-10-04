-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2020 at 01:18 PM
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
(3, 'fdfdgr', '123@123gmail.com', '$2y$10$EXlUvS9HVIUmXRXgSqY1KOBryV41rgJbZ7R7PzvSi/TWXYYLaqunC', 'Deliver Man');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(255) NOT NULL,
  `Name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `message` text CHARACTER SET latin1 NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Malay', 'Malay cuisine is the cooking tradition of ethnic Malays of Southeast Asia, residing in modern-day Malaysia, Indonesia , Singapore, Brunei and Southern Thailand. Malay cooking also makes plentiful use of lemongrass.', '../../image/category/malay food.jpg', '1'),
(2, 'Chinese', 'Chinese cuisine is an important part of Chinese culture, which includes cuisine originating from the diverse regions of China, as well as from Overseas Chinese who have settled in other parts of the world.', '../../image/category/chinese food.jpg', '1'),
(3, 'Western', 'European or western cuisine is the cuisines of Europe and other Western countries, including the cuisines brought to other countries by European settlers and colonists. Sometimes the term ', '../../image/category/western food.jpg', '1'),
(4, 'Indian', 'Indian cuisine consists of a variety of regional and traditional cuisines native to the Indian subcontinent. Given the diversity in soil, climate, culture, ethnic groups, and occupations,', '../../image/category/indian food.jpg', '1'),
(5, 'Korean', 'Korean cuisine is largely based on rice, vegetables, and (at least in the South) meats. Traditional Korean meals are named for the number of side dishes that accompany steam-cooked short-grain rice. Kimchi is served at nearly every meal.', '../../image/category/Korean food.jpg', '1'),
(6, 'Japanese', 'The traditional cuisine of Japan, is based on rice with miso soup and other dishes; there is an emphasis on seasonal ingredients. Side dishes often consist of fish, pickled vegetables, and vegetables cooked in broth.', '../../image/category/japanese food.jpg', '1');

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
(5, 'ewew', 'wen@admin.com', '234234234', '27edwe', '$2y$10$2YQgeKx1NtS/2hXuHplVsuVugO4QPfOdYHHU1WY3PTS.5qnXd1Cf6');

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
(8, '5f66fd441d137', 'jiahuitey852003@hotmail.com', '2020-09-20 06:57:11');

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
(2, 1, 'Nasi Lemak', 'Nasi lemak is a Malay cuisine dish consisting of fragrant rice cooked in coconut milk and pandan leaf. It is commonly found in Malaysia, where it is considered the national dish;', '../../image/food/malay food.jpg', 5),
(3, 1, 'Otak-otak', ' Otak-otak is well-known and commonly found in a town called Muar, Johor located south of West Peninsular Malaysia. it is usually a mixture between fish paste, chili peppers, garlic, shallots, turmeric, lemon grass and coconut milk.', '../../image/food/otak.jpg', 3),
(4, 1, 'Nasi Briyani', 'Nasi Biryani  is a rice dish flavored with spices and rose water. The word â€œnasiâ€ is rice in Malay. This aromatic rice is the base for all your meat biryanis. You can also serve it separately, topped with your choice of curries.', '../../image/food/NasiBriyani.jpg', 7),
(5, 2, 'Char kway teow', 'Char kway teow  is a popular noodle dish from Maritime Southeast Asia, notably in Indonesia, Malaysia, Singapore, and Brunei. In Hokkien, Char means â€œstir-friedâ€ and kway teow refers to flat rice noodles. The dish is considered a national favourite in', '../../image/food/char kway teow.jpg', 6),
(6, 2, 'Bak kut teh', 'Bak kut teh is a pork rib dish cooked in broth popularly served in Malaysia and Singapore where there is a predominant Hoklo and Teochew community, and also in neighbouring areas like Indonesia in Riau Islands and Southern Thailand.', '../../image/food/Bak Kut Teh.jpg', 8),
(8, 3, 'Pizza', 'Pizza is a savory dish of Italian origin consisting of a usually round, flattened base of leavened wheat-based dough topped with tomatoes, cheese, and often various other ingredients', '../../image/food/pizza.jpg', 12),
(9, 3, 'Burger', 'Burger is a sandwich consisting of one or more cooked patties of ground meat, usually beef, placed inside a sliced bread roll or bun. The patty may be pan fried, grilled, smoked or flame broiled. ... A hamburger topped with cheese is called a cheeseburger', '../../image/food/burger.jpg', 8),
(10, 3, 'Beef', 'Beef, flesh of mature cattle, as distinguished from veal, the flesh of calves. The best beef is obtained from early maturing, special beef breeds. High-quality beef has firm, velvety, fine-grained lean, bright red in colour and well-marbled. The fat is sm', '../../image/food/beef.jpg', 15),
(11, 4, 'Roti Canai', 'Roti canai is made from dough which is usually composed of fat (usually ghee), flour and water; some recipes also include sweetened condensed milk. The dough is repeatedly kneaded, flattened, oiled, and folded before proofing, creating layers.', '../../image/food/roti canai.jpeg', 3),
(12, 4, 'Dosa', 'A dosa is a rice pancake, originating from South India, made from a fermented batter. It is somewhat similar to a crepe in appearance. Its main ingredients are rice and black gram, ground together in a fine, smooth batter with a dash of salt.', '../../image/food/tosei.jpg', 2),
(14, 4, 'Maggi goreng', 'Maggi goreng is a style of cooking instant noodles, in particular the Maggi product range, which is common in Malaysia. It is commonly served at Indian Muslim (or Mamak) food stalls in Malaysia and Singapore.', '../../image/food/maggi goreng.jpg', 6),
(15, 6, 'Unagi', 'Unagi is the Japanese word for freshwater eel, especially the Japanese eel, Anguilla japonica. Unagi is a common ingredient in Japanese cooking, often as kabayaki. It is not to be confused with saltwater eel, which is known as anago in Japanese. ', '../../image/food/unagi.jpg', 10),
(16, 6, 'Udon', 'Udon  is a type of thick, wheat-flour noodle used frequently in Japanese cuisine. It is often served hot as a noodle soup in its simplest form, as kake udon, in a mildly flavoured broth called kakejiru, which is made of dashi, soy sauce, and mirin.', '../../image/food/Udon.jpg', 8),
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
('5f66fd441d137', 11, ' Nasi Lemak ', 5, 1, ' jiahuitey852003@hotmail.com ', '2020-09-20 06:57:11');

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
(7, '5f66fd441d137', 'jiahuitey852003@hotmail.com', 'Jiahuitey', '01110858782', 'No53,Jalan Indah12/12,Taman Bukit Indah,81200 JB', 6, '2020-09-20 06:57:11', 'cash', 'paid', 'yes'),
(8, '5f66fd441d137', 'jiahuitey852003@hotmail.com', 'Jiahuitey', '01110858782', 'No53,Jalan Indah12/12,Taman Bukit Indah,81200 JB', 0, '2020-09-20 06:57:11', 'cash', 'unpaid', 'no');

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
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cus_order`
--
ALTER TABLE `cus_order`
  MODIFY `custorder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
