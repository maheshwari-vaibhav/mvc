-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 06:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccc_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `username`, `password`, `status`, `createdDate`) VALUES
(2, 'test234', 'd41d8cd98f00b204e9800998ecf8427e', 1, '2021-02-25 06:04:08'),
(4, 'test333', 'd41d8cd98f00b204e9800998ecf8427e', 0, '2021-03-01 04:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attributeId` int(11) NOT NULL,
  `entityTypeId` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `inputType` varchar(50) NOT NULL,
  `backendType` varchar(50) NOT NULL,
  `sortOrder` tinyint(4) NOT NULL,
  `backendModel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attributeId`, `entityTypeId`, `name`, `code`, `inputType`, `backendType`, `sortOrder`, `backendModel`) VALUES
(1, 'product', 'color', 'color', 'multi', 'varchar', 1, NULL),
(6, 'product', 'Brand', 'brand', 'checkbox', 'varchar', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_option`
--

CREATE TABLE `attribute_option` (
  `optionId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `attributeId` int(11) DEFAULT NULL,
  `sortOrder` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute_option`
--

INSERT INTO `attribute_option` (`optionId`, `name`, `attributeId`, `sortOrder`) VALUES
(1, 'black', 1, 3),
(2, 'red', 1, 2),
(3, 'green', 1, 1),
(4, 'd', 3, 4),
(5, 'c', 3, 3),
(6, 'b', 3, 2),
(7, 'a', 3, 1),
(17, 'c', 6, 3),
(18, 'b', 6, 2),
(19, 'a', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `parentId` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `description` text NOT NULL,
  `path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `parentId`, `name`, `status`, `description`, `path`) VALUES
(1, 0, 'Bedroom', 1, 'Bedroom', '1'),
(2, 0, 'Living Room', 1, 'Living Room', '2'),
(3, 0, 'Dining & Kitchen', 1, 'Dining & Kitchen', '3'),
(4, 0, 'Office', 1, 'Office', '4'),
(5, 0, 'Bar & Game Room', 1, 'Bar & Game Room', '5'),
(6, 0, 'Accessories', 1, 'Accessories', '6'),
(7, 0, 'Outdoor', 1, 'Outdoor', '7'),
(8, 0, 'Entry & Mudroom', 1, 'Entry & Mudroom', '8'),
(9, 1, 'Bedroom Sets', 1, 'Bedroom Sets\r\n', '1/9'),
(10, 1, 'Beds', 0, 'Beds', '1/10'),
(11, 1, 'Nightstands', 1, 'Nightstands', '1/11'),
(12, 1, 'Dressers', 1, 'Dressers', '1/12'),
(13, 1, 'Dresser Mirrors', 1, 'Dresser Mirrors', '1/13'),
(14, 1, 'Chests', 1, 'Chests', '1/14'),
(15, 1, 'Bedroom Benches', 1, 'Bedroom Benches', '1/15'),
(16, 1, 'Bed Frames & Headboards', 1, 'Bed Frames & Headboards', '1/16'),
(17, 1, 'Armoires and Wardrobes', 1, 'Armoires and Wardrobes', '1/17'),
(18, 1, 'Bedroom Vanities', 1, 'Bedroom Vanities', '1/18'),
(19, 1, 'Media Chests', 1, 'Media Chests', '1/19'),
(20, 1, 'Jewelry Armoires', 1, 'Jewelry Armoires', '1/20'),
(21, 1, 'Day Beds and Futons', 1, 'Day Beds and Futons', '1/21'),
(22, 1, 'Kids Room', 1, 'Kids Room', '1/22'),
(23, 1, 'Kids and Youth Furniture', 1, 'Kids and Youth Furniture', '1/23'),
(24, 1, 'Baby Furniture', 1, 'Baby Furniture', '1/24'),
(25, 1, 'Mattresses', 1, 'Mattresses', '1/25'),
(26, 1, 'Box Springs & Foundations', 0, 'Box Springs & Foundations', '1/26'),
(27, 1, 'Adjustable Beds', 1, 'Adjustable Beds', '1/27'),
(28, 1, 'Pillows', 1, 'Pillows', '1/28'),
(29, 1, 'Bedding and Comforter Sets', 1, 'Bedding and Comforter Sets', '1/29'),
(30, 2, 'Living Room Sets', 1, 'Living Room Sets', '2/30'),
(31, 2, 'Sectionals', 1, 'Sectionals', '2/31'),
(32, 2, 'Sofas', 1, 'Sofas', '2/32'),
(33, 2, 'Loveseats', 1, 'Loveseats', '2/33'),
(34, 2, 'Reclining Loveseats', 1, 'Reclining Loveseats', '2/34'),
(35, 2, 'Sleeper Sofas', 1, 'Sleeper Sofas', '2/35'),
(36, 2, 'Recliners and Rockers', 1, 'Recliners and Rockers', '2/36'),
(37, 2, 'Theater Seating', 1, 'Theater Seating', '2/37'),
(38, 2, 'Chairs', 1, 'Chairs', '2/38'),
(39, 2, 'Accent Chairs', 1, 'Accent Chairs', '2/39'),
(40, 2, 'Chaises', 1, 'Chaises', '2/40'),
(41, 2, 'Ottomans', 1, 'Ottomans', '2/41'),
(42, 2, 'Futons', 1, 'Futons', '2/42'),
(43, 2, 'Leather Furniture', 1, 'Leather Furniture', '2/43'),
(44, 2, 'Occasional Table Sets', 1, 'Occasional Table Sets', '2/44'),
(45, 2, 'Sofa Tables', 1, 'Sofa Tables', '2/45'),
(46, 2, 'Accent Chests and Cabinets', 1, 'Accent Chests and Cabinets', '2/46'),
(47, 2, 'Console Tables', 1, 'Console Tables', '2/47'),
(48, 2, 'Coffee and Cocktail Tables', 1, 'Coffee and Cocktail Tables', '2/48'),
(49, 2, 'End Tables', 1, 'End Tables', '2/49'),
(50, 2, 'Accent Tables', 1, 'Accent Tables', '2/50'),
(51, 2, 'Side Tables', 1, 'Side Tables', '2/51'),
(52, 2, 'Rugs and Accessories', 1, 'Rugs and Accessories', '2/52'),
(53, 2, 'Entertainment Centers and Walls', 1, 'Entertainment Centers and Walls', '2/53'),
(54, 2, 'TV Stands and TV Consoles', 1, 'TV Stands and TV Consoles', '2/54'),
(55, 2, 'CD and DVD Media Storage', 1, 'CD and DVD Media Storage', '2/55'),
(56, 3, 'Dining Sets', 1, 'Dining Sets', '3/56'),
(57, 3, 'Dinette Sets', 1, 'Dinette Sets', '3/57'),
(58, 3, 'Dining Chairs', 1, 'Dining Chairs', '3/58'),
(59, 3, 'Dining Tables', 1, 'Dining Tables', '3/59'),
(60, 3, 'Dining Benches', 1, 'Dining Benches', '3/60'),
(61, 3, 'China Cabinets', 1, 'China Cabinets', '3/61'),
(62, 3, 'Curios & Displays', 1, 'Curios & Displays', '3/62'),
(63, 3, 'Kitchen Island, Kitchen Cart', 1, 'Kitchen Island, Kitchen Cart', '3/63'),
(64, 3, 'Servers, Sideboards & Buffets', 1, 'Servers, Sideboards & Buffets', '3/64'),
(65, 4, 'Home Office Sets', 1, 'Home Office Sets', '4/65'),
(66, 4, 'Office Chairs', 1, 'Office Chairs', '4/66'),
(67, 4, 'Desks & Hutches', 1, 'Desks & Hutches', '4/67'),
(68, 4, 'Modular Office Furniture', 1, 'Modular Office Furniture', '4/68'),
(69, 4, 'Conference Room', 1, 'Conference Room', '4/69'),
(70, 4, 'Filing Cabinets and Storage', 1, 'Filing Cabinets and Storage', '4/70'),
(71, 4, 'Bookcases, Book Shelves', 1, 'Bookcases, Book Shelves', '4/71'),
(72, 4, 'Office Accessories', 1, 'Office Accessories', '4/72'),
(73, 4, 'Miscellaneous', 1, 'Miscellaneous', '4/73'),
(74, 5, 'Home Bar Sets', 1, 'Home Bar Sets', '5/74'),
(75, 5, 'Bistro and Bar Table Sets', 1, 'Bistro and Bar Table Sets', '5/75'),
(76, 5, 'Game Table Sets', 1, 'Game Table Sets', '5/76'),
(77, 5, 'Bar Tables and Pub Tables', 1, 'Bar Tables and Pub Tables', '5/77'),
(78, 5, 'Barstools', 1, 'Barstools', '5/78'),
(79, 5, 'Wine Racks', 1, 'Wine Racks', '5/79'),
(80, 5, 'Game Tables', 1, 'Game Tables', '5/80'),
(81, 5, 'Game Room Chairs', 1, 'Game Room Chairs', '5/81'),
(82, 5, 'Bar and Wine Cabinets', 1, 'Bar and Wine Cabinets', '5/82'),
(83, 6, 'Rugs', 1, 'Rugs', '6/83'),
(84, 6, 'Wall Art', 1, 'Wall Art', '6/84'),
(85, 6, 'Accent and Storage Benches', 1, 'Accent and Storage Benches', '6/85'),
(86, 6, 'Accent Mirrors', 1, 'Accent Mirrors', '6/86'),
(87, 6, 'Curios', 1, 'Curios', '6/87'),
(88, 6, 'Pillows and Throws', 1, 'Pillows and Throws', '6/88'),
(89, 6, 'Decorative Accessories', 1, 'Decorative Accessories', '6/89'),
(90, 6, 'Entryway Furniture', 1, 'Entryway Furniture', '6/90'),
(91, 6, 'Storage and Organization', 1, 'Storage and Organization', '6/91'),
(92, 6, 'Etageres', 1, 'Etageres', '6/92'),
(93, 6, 'Clocks', 1, 'Clocks', '6/93'),
(94, 6, 'Artificial Plants', 1, 'Artificial Plants', '6/94'),
(95, 6, 'Picture Frames', 1, 'Picture Frames', '6/95'),
(96, 6, 'Lighting', 1, 'Lighting', '6/96'),
(97, 6, 'Desk and Buffet Lamps', 1, 'Desk and Buffet Lamps', '6/97'),
(98, 6, 'Lamp Sets', 1, 'Lamp Sets', '6/98'),
(99, 6, 'Floor Lamps', 1, 'Floor Lamps', '6/99'),
(100, 6, 'Pendant Lighting', 1, 'Pendant Lighting', '6/100'),
(101, 6, 'Wall Sconces', 1, 'Wall Sconces', '6/101'),
(102, 6, 'Bathroom Furniture', 1, 'Bathroom Furniture', '6/102'),
(103, 7, 'Outdoor Conversation Sets', 1, 'Outdoor Conversation Sets', '7/103'),
(104, 7, 'Outdoor Dining Furniture', 1, 'Outdoor Dining Furniture', '7/104'),
(105, 7, 'Outdoor Tables', 1, 'Outdoor Tables', '7/105'),
(106, 7, 'Outdoor Chairs', 1, 'Outdoor Chairs', '7/106'),
(107, 7, 'Outdoor Sofas & Loveseats', 1, 'Outdoor Sofas & Loveseats', '7/107'),
(108, 7, 'Outdoor Chaise Loungers', 1, 'Outdoor Chaise Loungers', '7/108'),
(109, 7, 'Outdoor Bar Furniture', 1, 'Outdoor Bar Furniture', '7/109'),
(110, 7, 'Outdoor Accessories', 1, 'Outdoor Accessories', '7/110'),
(111, 7, 'Outdoor Fireplaces', 1, 'Outdoor Fireplaces', '7/111'),
(112, 7, 'Outdoor Benches', 1, 'Outdoor Benches', '7/112'),
(113, 7, 'Outdoor Ottomans', 1, 'Outdoor Ottomans', '7/113'),
(114, 8, 'Console Tables', 1, 'Console Tables', '8/114'),
(115, 8, 'Storage Benches', 1, 'Storage Benches', '8/115'),
(116, 8, 'Hall Trees', 1, 'Hall Trees', '8/116'),
(117, 8, 'Coat Racks', 1, 'Coat Racks', '8/117');

-- --------------------------------------------------------

--
-- Table structure for table `cms_page`
--

CREATE TABLE `cms_page` (
  `pageId` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `identifier` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_page`
--

INSERT INTO `cms_page` (`pageId`, `title`, `identifier`, `content`, `status`, `createdDate`) VALUES
(1, 'test', '1253', '<p><b>123</b></p><p><b><br></b></p><table class=\"table table-bordered\"><tbody><tr><td>456</td></tr><tr><td>145</td></tr><tr><td>856</td></tr></tbody></table><p><b><br></b></p>', 1, '2021-03-07 19:20:17');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `groupId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `firstName`, `lastName`, `email`, `mobile`, `password`, `status`, `createdDate`, `updatedDate`, `groupId`) VALUES
(2, 'Vaibhav', 'Maheshwari', 'v.s.maheshwari1998@gmail.com', '9081654835', 'd41d8cd98f00b204e9800998ecf8427e', 1, '2021-02-14 15:28:17', '2021-03-02 09:10:21', 3),
(13, 'test444', 'test', 'test', '7485748574', 'd41d8cd98f00b204e9800998ecf8427e', 1, '2021-02-25 05:05:33', '2021-03-16 06:23:34', 1),
(14, 'test', 'test', 'test', '7485748574', 'd41d8cd98f00b204e9800998ecf8427e', 1, '2021-03-02 06:48:18', '2021-03-02 09:13:08', 3),
(15, 'ravi', 'modi', 'ravi@gmail.com', '7485748574', 'ceb6c970658f31504a901b89dcd3e461', 1, '2021-03-02 09:41:50', NULL, 1),
(16, 'jaydeep', 'modi', 'jaydeep@gmail.com', '8574857485', 'd41d8cd98f00b204e9800998ecf8427e', 1, '2021-03-02 09:45:19', '2021-03-02 09:50:28', 1),
(17, 'jaydeep', 'modi', 'ravi@gmail.com', '7485748574', 'd41d8cd98f00b204e9800998ecf8427e', 0, '2021-03-04 14:36:16', '2021-03-07 05:27:15', 3);

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `addressId` int(11) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `country` varchar(100) NOT NULL,
  `addressType` tinyint(1) NOT NULL,
  `customerId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`addressId`, `address`, `city`, `state`, `zipcode`, `country`, `addressType`, `customerId`) VALUES
(1, 'ahmedabad', 'ahmedabad', 'rj', '385535', 'ind', 1, 2),
(2, '                        deesa                    ', 'deesa', 'gjssss', '380009', 'ind', 2, 2),
(10, '                                                                        test                                                    ', 'test', 'test', '748574', 'India', 1, 13),
(11, '                                                                        test                                                    ', 'test', 'test', '748574', 'India', 2, 13),
(12, 'test', 'test', 'test', '748574', 'India', 1, 14),
(13, 'test', 'test', 'test', '748574', 'India', 2, 14),
(14, '                        test                    ', 'test', 'test', '748574', 'India', 1, 16),
(15, '                        test                    ', 'test', 'test', '748574', 'India', 2, 16),
(18, 'test', 'test', 'test', '748574', 'India', 1, 17),
(19, 'test', 'test', 'test', '748574', 'India', 2, 17),
(20, '                        test                    ', 'test', 'test', '748574', 'India', 1, 18),
(21, '                        test1                    ', 'test1', 'test1', '589685', 'India', 2, 18),
(22, '                        test1            ', 'test1', 'test1', '589685', 'India', 1, 19),
(23, '                        test1            ', 'test1', 'test1', '589685', 'India', 2, 19);

-- --------------------------------------------------------

--
-- Table structure for table `customer_group`
--

CREATE TABLE `customer_group` (
  `groupId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `createdDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_group`
--

INSERT INTO `customer_group` (`groupId`, `name`, `status`, `createdDate`) VALUES
(1, 'Retail', 1, '2021-03-02 05:13:15'),
(3, 'Wholesale', 1, '2021-03-02 09:02:44'),
(4, 'ttt', 0, '2021-03-07 06:08:55');

-- --------------------------------------------------------

--
-- Table structure for table `customer_group_price`
--

CREATE TABLE `customer_group_price` (
  `entityId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `customerGroupId` int(11) NOT NULL,
  `groupPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_group_price`
--

INSERT INTO `customer_group_price` (`entityId`, `productId`, `customerGroupId`, `groupPrice`) VALUES
(1, 2, 1, 7600),
(2, 2, 3, 8400),
(5, 2, 4, 7900),
(6, 22, 1, 80),
(7, 22, 3, 80),
(8, 22, 4, 45),
(9, 35, 1, 80),
(10, 35, 3, 80),
(11, 35, 4, 100),
(12, 4, 1, 1400),
(13, 4, 3, 1320),
(14, 4, 4, 220);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `methodId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`methodId`, `name`, `code`, `description`, `status`, `createdDate`) VALUES
(1, 'test21', 'test12', '                                 test                                                                                                        ', 1, '2021-02-17 05:37:51'),
(8, 'test', 'test', '                        qws                    ', 0, '2021-03-07 05:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `sku` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `color` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `sku`, `name`, `price`, `discount`, `quantity`, `description`, `status`, `createdDate`, `updatedDate`, `color`, `brand`) VALUES
(1, 'CM7424IV-SF', 'Curated Sloane White Living Room Set', 4370, 100, 10, 'Part of Sloane Collection from Universal\nSky salt finish\nStructural integrity is secured by mortise & tenon joints and corner blocks in all stress areas\nPremium down blend cushions\nTightly woven premium fabric made for comfort and durability\nSinuous spring backs for added comfort and support', 1, '2021-03-18 07:04:32', NULL, NULL, NULL),
(2, 'CM7824IV-SF', 'Mila Living Room Set (Black)?', 2785.81, 50, 5, 'Gold Stainless Steel Base\nBlack Velvet\nThrow Pillows\nSeat guests in complete luxury on the Mila Velvet Collection by Meridian Furniture. The bold color makes a statement in your space, and the gold stainless steel frame ensures sturdy support while you relax or take a nap. It comes with two throw pillows that cradle your sides as you sit, elevating its comfort level. Lots of clearance beneath this piece makes cleaning and vacuuming a breeze.', 1, '2021-03-18 07:04:32', NULL, NULL, NULL),
(3, 'FM7424IV-SF', 'Morgan Rose Accolade Living Room Set', 2555.1, 152, 15, 'Part of Morgan Rose Collection from ART\nExposed wood frame construction\nFabric content: 100% Polyester\nUpholstered in fabric\nAccolade finish\nMetallic finish\nSmall scale\nSquare tapered wood legs\nButton detail\nTransitional style\nInspired by the sophisticate modern style of the 1920s and 30s, the sleek Morgan Rose Sofa has a dramatic curved shape and stands on six slender square-tapered leg; the exposed wood frame is finished to bring out the beautiful grain of the wood. The upholstered back is button tufted and the single long seat cushion comes with hidden tie-downs.', 1, '2021-03-18 07:04:32', NULL, NULL, NULL),
(4, 'OL9624IV-SF', 'Greeley Double Reclining Living Room Set', 1734.07, 140, 20, 'Part of Greeley Collection from Homelegance\nUpholstered in top grain leather\nPlush seating and backs\nDual reclining mechanism\nContemporary design', 1, '2021-03-18 07:04:32', NULL, NULL, NULL),
(5, '', 'Braelyn Living Room Set (Black / Red)', 1481.22, 45, 11, 'Contemporary Style\nSuede, Leatherette, Solid Wood Frame\nBlack / Red Color\nFlared Arms\nLoose Back Pillows\nTapered Feet\nPillows Included\nMade in the USA\nThis ultra modern Braelyn Living Room Collection by Furniture of America takes on a two toned coloring and a dual textured approach. The back pillows introduce a touch of white in order to calm the strong black and red combination. The contrast between sleek black leatherette and smooth red suede caters to different parts of the body. The suede seat feels comfortable and the leatherette arms offer support and grip.', 1, '2021-03-18 07:04:33', NULL, NULL, NULL),
(6, 'CM7424IJ-SF', 'Pierre Black Living Room Set', 1231.94, 65, 25, 'Part of Pierre Collection\nBlack Finish\nContemporary Style\nCushioned Inside Armrests\nDouble Stitching\nBlack Leatherette\nMaximum comfort\nAlthough simple at first glance this seating group has special features found in the details. Double stitching runs across the black white or mahogany red leatherette while the inside armrests are cushioned for maximum comfort.-', 1, '2021-03-18 07:04:33', NULL, NULL, NULL),
(7, '17906111-L', 'A973 Black Italian Leather Living Room Set', 3640.84, 185, 23, 'Thick Premium Italian Leather\nStyle and Comfort\nModernistic Clean Design\n2 Independant Ratchet Headrest\nFirm seating', 1, '2021-03-18 07:04:33', NULL, NULL, NULL),
(8, 'CM6324IV-SF', 'Parma Ivory Leatherette Living Room Set', 1579.18, 58, 22, 'Part of Parma Collection\nIvory Finish\nContemporary Style\nLarge Padded Arms\nPlush Cushions\nModern and stylish\nUnique d?cor', 1, '2021-03-18 07:04:33', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `entityId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_media`
--

CREATE TABLE `product_media` (
  `mediaId` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `label` varchar(100) DEFAULT NULL,
  `small` tinyint(1) DEFAULT NULL,
  `thumb` tinyint(1) DEFAULT NULL,
  `base` tinyint(1) DEFAULT NULL,
  `gallary` tinyint(1) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `createdDate` timestamp NULL DEFAULT NULL,
  `updatedDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_media`
--

INSERT INTO `product_media` (`mediaId`, `path`, `label`, `small`, `thumb`, `base`, `gallary`, `productId`, `createdDate`, `updatedDate`) VALUES
(1, '237604011Screenshot (10).png', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(6, '1612149153Screenshot (6).png', 'rrr', 1, 0, 0, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '1743537859Screenshot (10).png', 'rrr', 0, 1, 1, 0, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '1035352130Screenshot (10).png', 'test1', 0, 0, 1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, '1385392519cs2021.jpg', 'sss', 1, 1, 1, 1, 35, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `methodId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` float NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`methodId`, `name`, `amount`, `code`, `description`, `status`, `createdDate`) VALUES
(1, 'test', 230.44, 'test', '                                                                                test                                                                ', 1, '2021-02-17 06:10:02'),
(4, 'test2', 7485, 'test2', '                        test                    ', 1, '2021-02-19 04:34:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attributeId`);

--
-- Indexes for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD PRIMARY KEY (`optionId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `cms_page`
--
ALTER TABLE `cms_page`
  ADD PRIMARY KEY (`pageId`),
  ADD UNIQUE KEY `identifier` (`identifier`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`addressId`);

--
-- Indexes for table `customer_group`
--
ALTER TABLE `customer_group`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `customer_group_price`
--
ALTER TABLE `customer_group_price`
  ADD PRIMARY KEY (`entityId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`methodId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`entityId`),
  ADD KEY `productId` (`productId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `product_media`
--
ALTER TABLE `product_media`
  ADD PRIMARY KEY (`mediaId`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`methodId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attributeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `attribute_option`
--
ALTER TABLE `attribute_option`
  MODIFY `optionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `cms_page`
--
ALTER TABLE `cms_page`
  MODIFY `pageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `customer_group`
--
ALTER TABLE `customer_group`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_group_price`
--
ALTER TABLE `customer_group_price`
  MODIFY `entityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `methodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `entityId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_media`
--
ALTER TABLE `product_media`
  MODIFY `mediaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `methodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_category_ibfk_2` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
