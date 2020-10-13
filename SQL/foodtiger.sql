-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2020 at 04:22 AM
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
  `description` varchar(500) NOT NULL,
  `contain` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Email` varchar(255) NOT NULL,
  `Name` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `description`, `contain`, `image`, `time_date`, `Email`, `Name`) VALUES
(29, 'Malay ', '        Malay cuisine is the cooking tradition of ethnic Malays of Southeast Asia, residing in modern-day Malaysia, Indonesia , Singapore, Brunei and Southern Thailand. Malay cooking also makes plentiful use of lemongrass.', 'Malay cuisine is the cooking tradition of ethnic Malays of Southeast Asia, residing in modern-day Malaysia, Indonesia , Singapore, Brunei and Southern Thailand. Malay cooking also makes plentiful use of lemongrass.', '../image/blog/malay food.jpg', '2020-10-09 12:48:19', 'admin@admin.com', 'ewew hahahahfewf'),
(30, 'Chinese ', 'Chinese cuisine is an important part of Chinese culture, which includes cuisine originating from the diverse regions of China, as well as from Overseas Chinese who have settled in other parts of the world.', 'Chinese cuisine is an important part of Chinese culture, which includes cuisine originating from the diverse regions of China, as well as from Overseas Chinese who have settled in other parts of the world.', '../image/blog/chinese food.jpg', '2020-10-09 12:07:15', 'admin@admin.com', 'ewew hahahahfewf'),
(31, 'Western ', 'European or western cuisine is the cuisines of Europe and other Western countries, including the cuisines brought to other countries by European settlers and colonists. Sometimes the term \"European\".  ', 'European or western cuisine is the cuisines of Europe and other Western countries, including the cuisines brought to other countries by European settlers and colonists. Sometimes the term \"European\".  ', '../image/blog/western food.jpg', '2020-10-09 12:07:19', 'admin@admin.com', 'ewew hahahahfewf'),
(33, '中国的王帝大传 ', '        中国历史上的君主最初被称为后、帝、皇、王、天子等。皇帝称号则始创于秦始皇，他以自己一统海内的功绩为傲，认为自己德兼“三皇”、功过“五帝”，古往今来的统治者无人能及，宜用新的称号来标志自己的尊贵身份，于是创号“皇帝”，自己称“始皇帝”，规定后世称“二世皇帝”、“三世皇帝”，乃至千秋万世；与“皇帝”称号相对应的，秦始皇还创立并推行了一整套中央直接统治地方、加强中央集权、巩固皇帝政治权力的国家机制。这一整套体制在秦朝被民乱和战国诸侯后裔推翻后，被汉朝承袭并加以巩固，并随“皇帝”的称号流传后世。自秦始皇创制“皇帝”称号以来，中国后世王朝的最高君主纷纷以“皇帝”为号；而秦始皇创制的以“皇帝”为最高、最权威统治者的国家体制，也被称为帝制?', '中国历史上在同一时期被公认为“皇帝”正统的只能是一个“大一统”政权的君主，该政权必须统治中国的大部分地区、并取得周围地区名义上的臣服，如此才能被肯定为“正统”。“正统”政权往往被称为“某朝”、“某代”，而不称为“某国”。历史上某些政权统治区域相对较小，其君主也在自己的国内称皇帝，却一般不被二十四史体系认同为真正的“皇帝”，实际仅相当于“国王”，如历史上越南地区的南越国，其开国君主对内称皇帝，对汉称臣。此类政权的称谓仅仅是“某国”，而不能称“某朝代”。在某些大分裂时期，中国没有公认正统的皇帝，如南北朝时与五代十国时期，同时有两个或数个中型王朝并立，这些中型王朝的实力超过了一般的“国”，各自称“皇帝”，并质疑对方的“正统性”，却始终没能实现一统海内的功绩。三国时期时，魏、蜀、吴三国国君也曾相继称帝；然而短暂地并存之后，由西晋完成了统一，成为了继汉朝而来的正统王朝。\r\n\r\n中国历史上最早的正统朝代的标志之一是相传为夏朝大禹制作的九鼎，传至周代，到秦朝末年失传；自中国第一位皇帝秦始皇帝创制皇帝称号以来，正统朝代的标志则变成了始皇帝传国玉玺，然而该玉玺几经失传、后世所谓重新发现者又多是伪作，故而自晋以后已经基本丧失了其标志性地位。\r\n\r\n中国皇帝一直延续到1912年2月12日溥仪退位，至此中国皇帝制结束，共和制建立。中华民国成立后，虽有袁世凯自称中华帝国皇帝、张勋推动辫军复辟、日本在中国东北扶植满洲国之傀儡皇帝溥仪，但都以失败告终。在中国历史上一共出现了83个王朝，共有559个帝王，包括397个帝和162个王。\r\n\r\n历代中国的皇帝中，寿命最长的皇帝为清高宗弘历（乾隆皇帝），享年89岁；寿命最短的皇帝是东汉殇帝刘隆，不满2岁即驾崩。在位时间最长的皇帝是清圣祖玄烨（康熙皇帝），在位近62年[1]；在位时间最短的是金末帝完颜承麟，在位仅半天。\r\n\r\n在中国历史上，仅有一位得到普遍承认的女皇帝，是为唐朝时唐太宗宫人、唐高宗皇后，篡唐建“周”（史称武周），尊号“则天大圣皇帝”，即后世谓“武则天”者，其晚年退位将政权复归于自己的儿子，恢复了唐朝宗室，死后仍以唐高宗皇后的身份合葬于乾陵。唐朝之后虽然有多位太后临朝听政，具有皇帝的实权，但仅是有实无名，未再出现真正登基、享有皇帝称号的女帝政权出现。', '../image/blog/avatar6.png', '2020-10-09 12:20:01', 'admin@admin.com', 'ewew hahahahfewf'),
(34, 'How does the recommendation system help in our cognitive aspects ', '   r32r', '32r2', '../image/blog/food4.jpg', '2020-10-09 12:53:55', 'admin@admin.com', 'ewew hahahahfewf');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `name`, `description`, `image`) VALUES
(2, 'Chinese', 'Chinese cuisine is an important part of Chinese culture, which includes cuisine originating from the diverse regions of China, as well as from Overseas Chinese who have settled in other parts of the world.', '../../image/category/chinese food.jpg'),
(3, 'Western', 'European or western cuisine is the cuisines of Europe and other Western countries, including the cuisines brought to other countries by European settlers and colonists. Sometimes the term ', '../../image/category/western food.jpg'),
(4, 'Indian', 'Indian cuisine consists of a variety of regional and traditional cuisines native to the Indian subcontinent. Given the diversity in soil, climate, culture, ethnic groups, and occupations,', '../../image/category/indian food.jpg'),
(5, 'Korean', 'Korean cuisine is largely based on rice, vegetables, and (at least in the South) meats. Traditional Korean meals are named for the number of side dishes that accompany steam-cooked short-grain rice. Kimchi is served at nearly every meal.', '../../image/category/Korean food.jpg');

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
(51, 'KOH', 'kohmingseng@gmail.com', '01122334567', '81200 Johor Bahru,Johor', '$2y$10$9W0CLS3p61tJoSAlbCfQde2oTDRR8cgl8Q2puGF6qoXJOF5kbMQq2'),
(52, 'yang che', 'admin@awefwedmin.com', '01473464470', '27edwe', '$2y$10$MIxSVot/AwbvWD.4dICGRupIIXBiySjoOYVVl1p5NcfMcAc67cQbu');

-- --------------------------------------------------------

--
-- Table structure for table `cus_order`
--

CREATE TABLE `cus_order` (
  `custorder_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'yeong4470@gmail.com', 'HandsomeC', '0147464470', 'good', 'reff'),
(3, 'admin@admin.com', 'egewge', '014-7464470', 'good', 'thrth');

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

-- --------------------------------------------------------

--
-- Table structure for table `paypal`
--

CREATE TABLE `paypal` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payer_id` varchar(255) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `order_id` varchar(255) NOT NULL,
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
-- Indexes for table `paypal`
--
ALTER TABLE `paypal`
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
-- AUTO_INCREMENT for table `paypal`
--
ALTER TABLE `paypal`
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
