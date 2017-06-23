-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 03, 2016 at 02:51 AM
-- Server version: 5.5.49-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wieseld_Your_Average_Joe`
--

-- --------------------------------------------------------

--
-- Table structure for table `Brand`
--

CREATE TABLE IF NOT EXISTS `Brand` (
  `Brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `Brand_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`Brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii AUTO_INCREMENT=16 ;

--
-- Dumping data for table `Brand`
--

INSERT INTO `Brand` (`Brand_id`, `Brand_name`, `description`, `image`) VALUES
(1, 'Dunkin Donuts', 'Dunkin Donuts makes and serves the freshest, most delicious coffee  quickly and courteously in modern, well-merchandised stores.', 'http://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/brand1.jpg'),
(2, 'Starbucks', 'To inspire and nurture the human spirit - one person, one cup and one neighborhood at a time.', 'http://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/brand2.jpg'),
(3, 'TeaLeava', 'TeaLeava is a small business that makes every possible attempt to serve the growing number of people in the world that are drinking tea. Especially loose-leaf tea.', 'http://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/brand3.jpg'),
(4, 'Lipton', 'Lipton cup size is the tea from where it all started. Lipton orange pekoe and pekoe cut black tea is the perfect blend for the perfect cup of tea. Lipton''s original tea has been brewed for years for a reason,it tastes delicious.', 'http://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/brand4.jpg'),
(5, 'Bigelow', 'The company continues to be 100% family owned and managed by the Bigelow family with a special blend of pride and enthusiasm. ', 'http://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/brand5.jpg'),
(6, 'Yogi', 'In 1984, this grassroots endeavor blossomed into the Yogi Tea Company. Packages of the dried spices began to appear in natural foods stores throughout Southern California and in Europe. By 1986, Yogi Tea was distributed nationwide in three flavors. ', 'http://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/brand6.jpg'),
(7, 'Twinnings', 'For more than 300 years, Twinings and tea have been one and the same. No other blender combines such a rich history with a depth of flavors, aroma and expertise like Twinnings.', 'http://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/brand7.jpg'),
(8, 'Swiss Miss', 'For more than 50 years, Swiss Miss has been creating signature Swiss Miss blend in a real dairy in Menomonie, Wisconsin. Swiss Miss supports more than 80 local dairy farms that supply them with farm-fresh milk every day.', 'http://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/brand8.jpg'),
(9, 'Nestle', 'With over 100 years of making chocolatey memories, the chocolate experts at Nestle know how to bring a rich mug of hot cocoa like no one else! This season, create warm connections and memories with loved ones by enjoying a delicious hot cocoa anytime.', 'http://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/brand9.jpg'),
(10, 'Ghirardelli', 'Ghirardelli has made premium chocolate for more than 150 years. It all began when Domingo Ghirardelli sold chocolate to the miners of the California Gold Rush, providing a much-needed respite from a hard day''s work.', 'http://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/brand10.jpg'),
(11, 'Alpine', 'A unique blend of spices and refreshing flavors make Alpine Cider Mix a favorite for any occasion. Unlike coffee, tea and even cocoa, Alpine Cider Mix is caffeine-free - and fortified with vitamin C.', 'http://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/brand11.jpg'),
(12, 'Mr. Coffee', 'Mr. Coffee knows more than anyone how perfect-tasting coffee can make or break the day, and they never want you to be disappointed when you take that first sip.', 'http://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/brand12.jpg'),
(13, 'Hamilton', 'Help yourself to cafe-quality coffee every morning. Whether you''re brewing coffee for one or making enough coffee for family and friends, Hamilton Beach has the perfect design, size, and features to fit your coffee brewer needs.', 'http://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/brand13.jpg'),
(14, 'Keurig', 'Keurig blended the disruptive innovation of a leading-edge technology company with the consumer focus of a socially conscious, premium coffee company.', 'http://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/brand14.jpg'),
(15, 'Breville', 'An Australian publicly listed company which is a leading provider of small electrical appliances in the consumer products industry. Breville product development centre in Sydney Australia provides us with world class innovative products.', 'http://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/brand15.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `b_address`
--

CREATE TABLE IF NOT EXISTS `b_address` (
  `b_fname` varchar(255) NOT NULL,
  `b_lname` varchar(255) NOT NULL,
  `b_street` varchar(255) NOT NULL,
  `b_city` varchar(255) NOT NULL,
  `b_state` varchar(255) NOT NULL,
  `b_zip_code` varchar(5) NOT NULL,
  `b_address_id` int(255) NOT NULL AUTO_INCREMENT,
  `c_id` int(255) NOT NULL,
  UNIQUE KEY `b_address_id` (`b_address_id`),
  KEY `c_id` (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii AUTO_INCREMENT=8 ;

--
-- Dumping data for table `b_address`
--

INSERT INTO `b_address` (`b_fname`, `b_lname`, `b_street`, `b_city`, `b_state`, `b_zip_code`, `b_address_id`, `c_id`) VALUES
('Ronald', 'Mangiliman', '10 Stark Way', 'Winterfell', 'New Jersey', '15614', 1, 1),
('Arthur', 'Rozenberg', '22 Kobe Street', 'Las Vegas', 'New Jersey', '81455', 2, 2),
('Gene', 'Hernandez', '30B Traphagen', 'Wayne', 'Pennsylvania', '77777', 3, 3),
('Spongebob', 'Squarepants', '124 Conch Street', 'Bikini Bottom', 'California', '55555', 4, 4),
('Ronald', 'Mangiliman', '10 Lucille Drive', 'Lodi', 'New Jersey', '07644', 5, 1),
('Arthur', 'Rozenberg', '9 Jeremy Way', 'Old Bridge', 'New Jersey', '08857', 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Card`
--

CREATE TABLE IF NOT EXISTS `Card` (
  `card_letters` varchar(255) NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `card_type` varchar(255) NOT NULL,
  `card_month` varchar(2) NOT NULL,
  `card_year` int(4) NOT NULL,
  `c_id` int(255) NOT NULL,
  PRIMARY KEY (`card_letters`),
  UNIQUE KEY `card_letters` (`card_letters`),
  KEY `c_id` (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `Card`
--

INSERT INTO `Card` (`card_letters`, `card_name`, `card_type`, `card_month`, `card_year`, `c_id`) VALUES
('00e111d3dddbbfe5bd969daa9b6f276072a93a2b', 'gene', 'Best Card', '01', 2017, 3),
('0ba059a3520eaa49b3a6565ce7d4cac9d1b82d62', 'Gene Hernandez', 'Rock Bottom', '10', 2019, 3),
('19b1928d58a2030d08023f3d7054516dbc186f20', 'Arthur Rozenberg', 'Rock Bottom', '03', 2020, 2),
('7dd534e7b7088910600e0ad88a29772d1ab06a3a', 'Arthur Rozenberg', 'Best Card', '01', 2017, 2),
('a6af36c750818d880907fe527dad9939bf87c9de', 'Gene Hernandez', 'Magic Conch', '07', 2017, 3),
('d1b7c3b05bb22f586ed588a976efa7807dcacb99', 'Ronald Mangiliman', 'Rock Bottom', '07', 2017, 1),
('eb7ff18b50ae38e58d9c5308ecfcdc3bfa50359c', '', 'Best Card', '01', 2017, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE IF NOT EXISTS `Category` (
  `c_name` varchar(255) DEFAULT NULL,
  `c_desc` text,
  `c_image` text,
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`c_name`, `c_desc`, `c_image`, `category_id`) VALUES
('Coffee Bags', 'Bags of ground coffee beans.', 'http://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/cat1.jpg', 1),
('Accessories', 'From mugs to enfusers, there is many different varities', 'http://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/cat2.jpg', 2),
('Tea', 'Different types and flavors of tea.', 'http://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/cat3.jpg', 3),
('Hot Chocolate', 'Bags containing different varieties of hot cocoa mix', 'http://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/cat4.jpg', 4),
('Other Beverages', 'Miscellaneous drinks including mixes and bottled drinks', 'http://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/cat5.jpg', 5),
('K-cups', 'Different types of K-cups and flavors', 'http://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/cat6.jpg', 6),
('Coffee Machines', 'Different types of coffee machines', 'http://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/cat7.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE IF NOT EXISTS `Customer` (
  `First_Name` varchar(255) DEFAULT NULL,
  `Last_Name` varchar(255) DEFAULT NULL,
  `c_username` varchar(20) NOT NULL DEFAULT '',
  `Password` varchar(255) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `c_id` int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`c_id`),
  KEY `c_id` (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`First_Name`, `Last_Name`, `c_username`, `Password`, `email`, `c_id`) VALUES
('Ronald', 'Mangiliman', 'rahnweasley', 'd3ea1cf956cc3cdd521eecef4effa5ac23b6e1c5', 'ronjcanlas@yahoo.com', 1),
('Arthur', 'Rozenberg', 'King_Arthur', 'c48232aad5b3110f05e35760498efbdf61b19e4d', 'rozenberga1@montclair.edu', 2),
('Gene', 'Hernandez', 'Animeh124', '3a980b537ce6698b6af47cb20f28c05a065cdeba', 'geneh96@gmail.com', 3),
('Spongebob', 'Squarepants ', 'jellyfishfan94', '4ddcecc4011449104c3fe7772447f35101ca8034', 'fryboy846@gmail.com', 4),
('Sandy', 'Cheeks', 'nuttysquirrel', '83a460c6c1f0dad9895c52f6148ff9132b1dd272', 'Texas@gmail.com', 5);

-- --------------------------------------------------------

--
-- Table structure for table `DB_Admin`
--

CREATE TABLE IF NOT EXISTS `DB_Admin` (
  `fName` varchar(255) DEFAULT NULL,
  `lName` varchar(255) DEFAULT NULL,
  `a_ssn` int(10) NOT NULL DEFAULT '0',
  `emp_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`a_ssn`),
  KEY `fk_emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `DB_Admin`
--

INSERT INTO `DB_Admin` (`fName`, `lName`, `a_ssn`, `emp_id`, `username`, `password`) VALUES
('Sheldon', 'Plankton', 0, 1, 'chummybuddy', 'be121f2d01af53fa6da2ea34f3d98f6cabd93524');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE IF NOT EXISTS `Employee` (
  `fName` varchar(255) DEFAULT NULL,
  `lName` varchar(255) DEFAULT NULL,
  `e_ssn` int(10) NOT NULL DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `emp_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `ix_emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`fName`, `lName`, `e_ssn`, `title`, `emp_id`, `username`, `password`, `email`) VALUES
('Spongebob', 'Squarepants', 1234567890, 'Frycook', 1, 'SpongeBoyMeBob', 'cfe6ca814ee676ad9755ba3e0795a9f07b2c39a5', 'fryboy846@gmail.com'),
('Squidward', 'Tentacles', 1234658978, 'Cashier', 2, 'squidboy', '05ab5c35696dae6690836f692a9037870079424b', 'none@none.com'),
('Larry', 'Lobster', 865954877, 'Lifter', 7, 'workouterryday', '9961c70f8f18a1844e7cabafb4008320e82213a2', 'lobsters@dancing.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee_address`
--

CREATE TABLE IF NOT EXISTS `employee_address` (
  `e_street` varchar(255) NOT NULL,
  `e_city` varchar(255) NOT NULL,
  `e_state` varchar(255) NOT NULL,
  `e_zipcode` varchar(5) NOT NULL,
  `e_id` int(11) DEFAULT NULL,
  KEY `e_id` (`e_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `employee_address`
--

INSERT INTO `employee_address` (`e_street`, `e_city`, `e_state`, `e_zipcode`, `e_id`) VALUES
('124 Conch Street', 'Bikini Bottom', 'California', '44444', 1),
('123 Conch Street', 'Bikini Bottom', 'California', '44444', 2),
('111 Goo Lagoon', 'Bikini Bottom', 'California', '11111', 7);

-- --------------------------------------------------------

--
-- Table structure for table `Ordered_items`
--

CREATE TABLE IF NOT EXISTS `Ordered_items` (
  `ord_id` int(255) NOT NULL,
  `prod_id` int(255) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `quantity` int(255) NOT NULL,
  KEY `order_id_fk` (`ord_id`),
  KEY `prod_id` (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `Ordered_items`
--

INSERT INTO `Ordered_items` (`ord_id`, `prod_id`, `item_price`, `quantity`) VALUES
(10, 1, '9.99', 1),
(10, 16, '7.99', 2),
(10, 22, '8.99', 1),
(17, 48, '34.99', 1),
(18, 1, '9.99', 2),
(45, 1, '9.99', 1),
(47, 1, '9.99', 1),
(49, 1, '9.99', 99),
(50, 22, '8.99', 2),
(52, 49, '18.99', 1),
(54, 17, '8.99', 1),
(55, 28, '4.99', 2),
(56, 1, '9.99', 1),
(56, 26, '9.99', 1),
(58, 1, '9.99', 1),
(59, 34, '13.50', 1),
(60, 31, '6.99', 1),
(61, 18, '2.99', 1),
(62, 52, '123.99', 1),
(63, 20, '9.99', 1),
(63, 21, '2.99', 1),
(64, 27, '4.99', 2),
(65, 1, '9.99', 1),
(65, 4, '9.99', 2),
(66, 19, '9.99', 1),
(67, 19, '9.99', 1),
(67, 16, '7.99', 1),
(68, 23, '8.99', 1),
(73, 24, '13.99', 1),
(74, 2, '9.99', 1),
(75, 1, '9.99', 2),
(76, 29, '4.99', 1),
(66, 1, '9.99', 1),
(80, 14, '7.99', 1),
(81, 1, '9.99', 5),
(82, 1, '9.99', 7),
(83, 1, '9.99', 8),
(84, 1, '9.99', 9),
(85, 2, '9.99', 2),
(86, 1, '9.99', 2),
(86, 23, '8.99', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE IF NOT EXISTS `Orders` (
  `ord_id` int(255) NOT NULL AUTO_INCREMENT,
  `c_id` int(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `ship_fname` varchar(255) NOT NULL,
  `ship_lname` varchar(255) NOT NULL,
  `ship_street` varchar(255) NOT NULL,
  `ship_city` varchar(255) NOT NULL,
  `ship_state` varchar(255) NOT NULL,
  `ship_zip` varchar(5) NOT NULL,
  PRIMARY KEY (`ord_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii AUTO_INCREMENT=87 ;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`ord_id`, `c_id`, `amount`, `date`, `order_status`, `ship_fname`, `ship_lname`, `ship_street`, `ship_city`, `ship_state`, `ship_zip`) VALUES
(10, 1, '34.96', '2016-04-27', 'Shipped', 'Ronald', 'Mangiliman', '10 Stark Way', 'Winterfell', 'New Jersey', '15614'),
(17, 1, '34.99', '2016-04-27', 'Delivered', 'Ronald', 'Mangiliman', '10 Stark Way', 'Winterfell', 'New Jersey', '15614'),
(18, 1, '19.98', '2016-04-28', 'Shipped', 'Ronald', 'Mangiliman', '10 Stark Way', 'Winterfell', 'New Jersey', '15614'),
(45, 2, '9.99', '2016-04-28', 'PARTIAL', 'Arthur', 'Rozenberg', '22 Kobe Street', 'Las Vegas', 'New Jersey', '81455'),
(47, 1, '9.99', '2016-04-28', 'PARTIAL', 'Ronald', 'Mangiliman', '10 Lucille Drive', 'Lodi', 'New Jersey', '07644'),
(49, 2, '989.01', '2016-04-28', 'PARTIAL', 'Arthur', 'Rozenberg', '9 Jeremy Way', 'Old Bridge', 'New Jersey', '08857'),
(50, 4, '17.98', '2016-04-29', 'PARTIAL', 'Spongebob', 'Squarepants', '124 Conch Street', 'Bikini Bottom', 'California', '55555'),
(52, 4, '18.99', '2016-04-29', 'PARTIAL', 'Spongebob', 'Squarepants', '124 Conch Street', 'Bikini Bottom', 'California', '55555'),
(54, 4, '8.99', '2016-04-29', 'PARTIAL', 'Spongebob', 'Squarepants', '124 Conch Street', 'Bikini Bottom', 'California', '55555'),
(55, 4, '9.98', '2016-04-29', 'PARTIAL', 'Patrick', 'Star', '122 Conch Street', 'Bikini Bottom', 'California', '55555'),
(56, 1, '9.99', '2016-04-29', 'PARTIAL', 'Ronald', 'Mangiliman', '10 Lucille Drive', 'Lodi', 'New Jersey', '07644'),
(58, 4, '9.99', '2016-04-29', 'PARTIAL', 'Spongebob', 'Squarepants', '124 Conch Street', 'Bikini Bottom', 'California', '55555'),
(59, 4, '13.50', '2016-04-29', 'PARTIAL', 'Spongebob', 'Squarepants', '124 Conch Street', 'Bikini Bottom', 'California', '55555'),
(60, 1, '6.99', '2016-04-29', 'PARTIAL', 'Ronald', 'Mangiliman', '10 Lucille Drive', 'Lodi', 'New Jersey', '07644'),
(61, 1, '2.99', '2016-04-29', 'PARTIAL', 'Ronald', 'Mangiliman', '10 Lucille Drive', 'Lodi', 'New Jersey', '07644'),
(62, 3, '123.99', '2016-04-29', 'Delivered', 'Gene', 'Hernandez', '5 Brian Street', 'Wayne', 'New Jersey', '77777'),
(63, 2, '12.98', '2016-04-29', 'PARTIAL', 'Arthur', 'Rozenberg', '9 Jeremy Way', 'Old Bridge', 'New Jersey', '08857'),
(64, 3, '9.98', '2016-04-29', 'PARTIAL', 'Brian', 'Phelan', '69 Dumb Street', 'Wayne', 'New Jersey', '11111'),
(65, 1, '29.97', '2016-04-30', 'PARTIAL', 'Ronald', 'Mangiliman', '10 Lucille Drive', 'Lodi', 'New Jersey', '07644'),
(66, 1, '9.99', '2016-04-30', 'PARTIAL', 'Ronald', 'Mangiliman', '10 Lucille Drive', 'Lodi', 'New Jersey', '07644'),
(67, 1, '17.98', '2016-04-30', 'PARTIAL', 'Ronald', 'Mangiliman', '10 Lucille Drive', 'Lodi', 'New Jersey', '07644'),
(68, 1, '8.99', '2016-04-30', 'PARTIAL', 'Ronald', 'Mangiliman', '10 Lucille Drive', 'Lodi', 'New Jersey', '07644'),
(73, 2, '13.99', '2016-04-30', 'PARTIAL', 'Arthur', 'Rozenberg', '22 Kobe Street', 'Las Vegas', 'New Jersey', '81455'),
(74, 2, '9.99', '2016-04-30', 'PARTIAL', 'Arthur', 'Rozenberg', '9 Jeremy Way', 'Old Bridge', 'New Jersey', '08857'),
(75, 1, '19.98', '2016-04-30', 'PARTIAL', 'Ronald', 'Mangiliman', '10 Lucille Drive', 'Lodi', 'New Jersey', '07644'),
(76, 1, '4.99', '2016-04-30', 'PARTIAL', 'Ronald', 'Mangiliman', '10 Lucille Drive', 'Lodi', 'New Jersey', '07644'),
(80, 1, '7.99', '2016-05-01', 'PARTIAL', 'Karen', 'Tiozon', '10 Cousin Avenue', 'Little Ferry', 'New Jersey', '11111'),
(81, 3, '49.95', '2016-05-01', 'PARTIAL', 'Gene', 'Hernandez', '5 Brian Street', 'Wayne', 'New Jersey', '77777'),
(82, 3, '69.93', '2016-05-01', 'PARTIAL', 'Gene', 'Hernandez', '5 Brian Street', 'Wayne', 'New Jersey', '77777'),
(83, 3, '79.92', '2016-05-01', 'PARTIAL', 'Brian', 'Phelan', '69 Dumb Street', 'Wayne', 'Louisiana', '11111'),
(84, 3, '89.91', '2016-05-01', 'PARTIAL', 'Gene', 'Hernandez', '5 Brian Street', 'Wayne', 'Maine', '77777'),
(85, 3, '19.98', '2016-05-01', 'PARTIAL', 'Brian', 'Phelan', '69 Dumb Street', 'Wayne', 'Louisiana', '11111'),
(86, 1, '28.97', '2016-05-02', 'PARTIAL', 'Ronald', 'Mangiliman', '10 Lucille Drive', 'Lodi', 'New Jersey', '07644');

-- --------------------------------------------------------

--
-- Table structure for table `Owner`
--

CREATE TABLE IF NOT EXISTS `Owner` (
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `o_ssn` int(10) NOT NULL DEFAULT '0',
  `o_username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) DEFAULT NULL,
  `Access_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`o_username`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `Owner`
--

INSERT INTO `Owner` (`firstName`, `lastName`, `o_ssn`, `o_username`, `password`, `Access_code`) VALUES
('Joe', 'Whatzittooya', 0, 'whatzit2joe', 'cd2b5e176d23599666ff6c7f2fdc0289da86bceb', 'd210932bd30c4c4909d9d0e30e3e10f873b8fe89');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE IF NOT EXISTS `Product` (
  `name` varchar(255) DEFAULT NULL,
  `p_desc` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `Items_In_stock` int(11) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `Category_id` int(11) NOT NULL,
  `Shipper_id` int(11) NOT NULL,
  `brand_id` int(255) NOT NULL,
  PRIMARY KEY (`prod_id`),
  KEY `Category_fk` (`Category_id`),
  KEY `ship_fk` (`Shipper_id`),
  KEY `brand_id` (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii AUTO_INCREMENT=58 ;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`name`, `p_desc`, `price`, `Items_In_stock`, `image`, `prod_id`, `Category_id`, `Shipper_id`, `brand_id`) VALUES
('Dunkin Donuts Ground Coffee - Original Blend, 12 oz.', 'Dunkin Donuts 1 pound of ground coffee, original blend. Makes 40 6 oz. servings. Guaranteed fresh.', '9.99', 50, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd1.jpg', 1, 1, 2, 1),
('Dunkin Donuts Ground Coffee - Dunkin Decaf, 12 oz.', 'Dunkin Donuts 12 oz. of ground coffee, Dunkin Decaf. Guaranteed fresh.', '9.99', 3, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd2.jpg', 2, 1, 2, 1),
('Dunkin Donuts Ground Coffee - Dark Roast, 12 oz', 'Dunkin Donuts 12 oz. of ground coffee, Dark Roast. Guaranteed fresh.', '9.99', 0, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd3.jpg', 3, 1, 2, 1),
('Dunkin Donuts Ground Coffee - Hazelnut, 12 oz.', 'Dunkin Donuts 12 oz. of ground coffee, hazelnut flavor. Guaranteed fresh.', '9.99', 6, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd4.jpg', 4, 1, 2, 1),
('Dunkin Donuts Ground Coffee - Pumpkin, 12 oz.', 'Dunkin Donuts 12 oz. of ground coffee, pumpkin flavor. Guaranteed fresh.', '9.99', 5, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd5.jpg', 5, 1, 2, 1),
('Dunkin Donuts Ground Coffee - French Vanilla, 12 oz.', 'Dunkin Donuts 12 oz. of ground coffee, French vanilla flavor. Guaranteed fresh.', '9.99', 7, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd6.jpg', 6, 1, 2, 1),
('Starbucks Medium House Blend Ground Coffee, 12 oz.', 'Starbucks 12 oz. of ground coffee. Rich and lively medium roast.', '13.99', 17, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd7.jpg', 7, 1, 2, 2),
('Starbucks Pike Place Roast Ground Coffee, 12 oz.', 'Starbucks 12 oz. of ground coffee. Smoother finish and subtle flavors of cocoa and toasted nuts.', '13.99', 2, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd8.jpg', 8, 1, 2, 2),
('Starbucks Dark Caffe Verona Ground Coffee, 12 oz', 'Starbucks 12 oz. of ground coffee. Roasty sweet and dark cocoa.', '13.99', 51, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd9.jpg', 9, 1, 2, 2),
('Starbucks Blonde Veranda Blend Ground Coffee, 12 oz.', ' Starbucks 12 oz. of ground coffee. Lighter body and mellow flavors.', '13.99', 15, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd10.jpg', 10, 1, 2, 2),
('Dunkin Donuts Classic White Mug, 16 oz.', 'Ceramic white Dunkin Donuts mug, 16 oz. Microwave and dish washer safe.', '7.99', 18, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd11.jpg', 11, 2, 2, 1),
('Dunkin Donuts America Runs On Dunkin Mug, 16 oz.', 'Ceramic white Dunkin Donuts mug with exact replica of Dunkin Donuts ?America Runs On Dunkin? logo, 16 oz. Microwave and dish washer safe.', '7.99', 13, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd12.jpg', 12, 2, 2, 1),
('Starbucks Reusable Travel Cup, 16 oz.', 'Starbucks reusable travel cup to go. You will receive a $.10 discount every time you bring this cup in.', '7.99', 6, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd13.jpg', 13, 2, 2, 2),
('Starbucks Stainless Steel Tumbler, 16 oz.', 'Starbucks stainless steel, high polished tumbler', '7.99', 13, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd14.jpg', 14, 2, 2, 2),
('TeaLeava Clear Glass Tea Pot, 16 oz.', 'A simple and elegant teapot to steep your loose tea. Comes with a stainless steel infuser, and is dishwasher safe', '24.99', 15, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd15.jpg', 15, 2, 3, 3),
('Lipton Black Tea Bags, 100 ct.', '100% natural. America''s favorite tea.', '7.99', 54, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd16.jpg', 16, 3, 2, 4),
('Bigelow Green Tea Bags, 40 ct.', 'Our signature green blend enlivens the earthy flavors of this delicate tea.', '8.99', 7, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd17.jpg', 17, 3, 2, 5),
('Yogi Honey Lavender Stress Relief , 16 ct.', 'Specially formulated to help calm your body and mind. Honey Lavender flavor.', '2.99', 67, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd18.jpg', 18, 3, 2, 6),
('Twinnings Tea English Breakfast, 100 ct.', 'A rich and satisfying robust black tea. The malty character of this tea comes from pure Assam and Kenyan tea leaves grown in India.', '9.99', 11, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd19.jpg', 19, 3, 2, 7),
('Twinnings Tea Earl Grey, 100 ct.', 'An uplifting tea with a unique floral aroma. Perfectly balanced with the distinctive flavor of bergamot, a citrus fruit', '9.99', 22, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd20.jpg', 20, 3, 2, 7),
(' Twinnings Tea Pure Peppermint Herbal Tea, 20 ct', 'Herbal tea made with select peppermint leaves. Light refreshing flavor with an uplifting aroma', '2.99', 6, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd21.jpg', 21, 3, 2, 7),
('Swiss Miss Hot Cocoa Mix Milk Chocolate, 60 ct.', 'Swiss Miss Milk Chocolate Cocoa Mix is made with fresh milk blended with premium imported cocoa', '8.99', 7, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd22.jpg', 22, 4, 2, 8),
('Swiss Miss Hot Cocoa Mix With Marshmallows, 60 ct', 'Swiss Miss Cocoa Mix With Marshmallows is made with fresh milk blended', '8.99', 3, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd23.jpg', 23, 4, 2, 8),
('Starbucks Classic Hot Cocoa, 30 oz.', '30 oz tin can of classic hot cocoa. Easy prep and makes 30 servings.', '13.99', 6, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd24.jpg', 24, 4, 2, 2),
('Nestle Hot Cocoa Mix, Rich Chocolate, 50 ct.', 'Nestl? Hot Cocoa Mix Rich Chocolate delivers the hot cocoa your customers have come to trust and love', '10.99', 5, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd25.jpg', 25, 4, 2, 9),
('Ghirardelli Hot Cocoa Double Chocolate Packets, 15 ct.', 'To achieve our award-winning distinctively intense chocolate, we blend our beans and roast them to pefection', '9.99', 7, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd26.jpg', 26, 4, 2, 10),
('Starbucks Frappuccino Chilled Coffee, Vanilla - 4 pack', 'Discover Vanilla Frappuccino coffee drink, a creamy blend of Starbucks coffee and milk, mingled together with sweetly divine vanilla.', '4.99', 3, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd27.jpg', 27, 5, 2, 2),
('Starbucks Frappuccino Chilled Coffee, Mocha -4 pack', 'Discover Mocha Frappuccino coffee drink, a creamy blend of Starbucks coffee and milk, mingled together with rich mocha.', '4.99', 0, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd28.jpg', 28, 5, 2, 2),
('Starbucks Doubleshot Espresso and Cream Coffee-4 pack', 'Starbucks DoubleShot Espresso & Cream is a deliciously intense mixture of rich Starbucks espresso mellowed by a touch of cream.', '4.99', 1, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd29.jpg', 29, 5, 2, 2),
('Starbucks Logo Mug, 16 oz.', 'This glossy white mug features our bold Siren logo and celebrates the welcoming, iconic figure that is recognised by customers around the world. Enjoy sipping coffee, tea or your favourite beverage from this dishwasher- and microwave-safe mug.', '15.99', 8, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd30.jpg', 30, 2, 2, 2),
('Alpine Spiced Apple Cider Instant Drink Mix Original - 10 ct', 'Enjoy delicious cider moments - every season, any occasion! Use recipes for mulled spiced cider, warm caramel apple drink, Apple pie shake.', '6.99', 6, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd31.jpg', 31, 5, 2, 11),
('Alpine Spiced Apple Cider Instant Drink Mix Caramel - 10 ct', 'Enjoy delicious cider moments - every season, any occasion! Use recipes for mulled spiced cider, warm caramel apple drink, Apple pie shake.', '6.99', 8, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd32.jpg', 32, 5, 2, 11),
(' Alpine Spiced Apple Cider Instant Drink Mix Sugar-Free - 10 ct', 'Enjoy delicious cider moments - every season, any occasion! Use recipes for mulled spiced cider, warm caramel apple drink, Apple pie shake.', '6.99', 15, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd33.jpg', 33, 5, 2, 11),
('Dunkin Donuts Box of 12 K-Cups, Original Blend', 'Dunkin Donuts K-Cups allow you to enjoy that same great taste and flavor in the comfort of your own home or office using the Keurig K-Cup brewing system.', '13.50', 19, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd34.jpg', 34, 6, 2, 1),
(' Dunkin Donuts Box of 12 K-Cups, Dunkin Decaf', 'Dunkin Donuts K-Cups allow you to enjoy that same great taste and flavor in the comfort of your own home or office using the Keurig K-Cup brewing system.', '13.50', 7, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd35.jpg', 35, 6, 2, 1),
('Dunkin Donuts Box of 12 K-Cups, Pumpkin', 'Dunkin Donuts K-Cups allow you to enjoy that same great taste and flavor in the comfort of your own home or office using the Keurig K-Cup brewing system.', '13.50', 12, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd36.jpg', 36, 6, 2, 1),
('Dunkin Donuts Box of 12 K-Cups, French Vanilla', 'Dunkin Donuts K-Cups allow you to enjoy that same great taste and flavor in the comfort of your own home or office using the Keurig K-Cup brewing system.', '13.50', 7, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd37.jpg', 37, 6, 2, 1),
('Dunkin Donuts Box of 12 K-Cups, Hazelnut', 'Dunkin Donuts K-Cups allow you to enjoy that same great taste and flavor in the comfort of your own home or office using the Keurig K-Cup brewing system.', '13.50', 7, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd38.jpg', 38, 6, 2, 1),
('Dunkin Donuts Box of 12 K-Cups, Milk Chocolate Hot Cocoa', 'Dunkin Donuts K-Cups allow you to enjoy that same great taste and flavor in the comfort of your own home or office using the Keurig K-Cup brewing system.', '13.50', 25, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd39.jpg', 39, 6, 2, 1),
('Starbucks Box of 16 K-Cups, House Blend', 'A medium-bodied blend of Latin American coffees with a vibrant acidity and clean, balanced flavors.', '14.99', 7, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd40.jpg', 40, 6, 2, 2),
('Starbucks Box of 16 K-Cups, Caramel', 'Our blend of caramel flavor with a medium-roasted coffee creates moments to savor from the brewing aroma to the very last sip.', '14.99', 8, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd41.jpg', 41, 6, 2, 2),
('Starbucks Box of 16 K-Cups, Sumatra', 'Starbucks Sumatra blend mixes big and bold flavors with distinctive earthy aroma and lingering low notes', '14.99', 9, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd42.jpg', 42, 6, 2, 2),
('Starbucks Box of 16 K-Cups, French Roast', 'Starbucks French Roast blends our darkest and boldest flavors, and is definitely not for the faint of heart.', '14.99', 7, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd43.jpg', 43, 6, 2, 2),
('Starbucks Box of 16 K-Cups, Mocha', 'This unique combination of Medium roast beans and cocoa notes creates a richness you can indulge in every day.', '14.99', 14, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd44.jpg', 44, 6, 2, 2),
('Starbucks Box of 16 K-Cups, Veranda Blend', 'Starbucks Blonde Roast blends lighter-bodied and mellow flavors, and awakens the senses gently. They?re subtle and soft with mellow acidity, and deliver a flavorful cup with slight hints of roast.', '14.99', 17, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd45.jpg', 45, 6, 2, 2),
('Starbucks Box of 16 K-Cups, Breakfast Blend', 'Starbucks Breakfast Blend favors a crisp and tangy taste, and emphasizes bright citrus notes and a clean, delicious finish. Make this breakfast blend your wonderful first cup of the day.', '14.99', 13, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd46.jpg', 46, 6, 2, 2),
('Starbucks Box of 16 K-Cups, Salted Caramel Hot Cocoa', 'A new take on the classic warmer - velvety cocoa, perfectly complemented by a pinch of sea salt and a dash of natural caramel flavor.', '14.99', 11, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd47.jpg', 47, 6, 2, 2),
('Mr. Coffee BVMC-SJX33GT 12-Cup Programmable Coffeemaker, Chrome', ' Its good looks are only surpassed by its great performance. This coffeemaker automatically detects a glass carafe or thermal carafe and optimizes your brew for maximum flavor.', '34.99', 10, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd48.jpg', 48, 7, 3, 12),
('Mr. Coffee DRX5 4-Cup Programmable Coffeemaker, Black', 'Set the Delay Brew feature up to 24 hours in advance and get ready to wake up to a freshly brewed pot of hot, delicious coffee.', '18.99', 18, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd49.jpg', 49, 7, 2, 12),
('Hamilton Beach BrewStation 12-Cup Dispensing Coffeemaker, Black', 'The BrewStation 12 Cup Dispensing Coffeemaker offers convenient one-hand dispensing without a conventional glass carafe.', '29.99', 19, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd50.jpg', 50, 7, 3, 13),
('Keurig K15 Coffeemaker, Black', 'A compact personal coffee maker. The Keurig K15 brews over 500 different K-Cup pod varieties from 75 brands including Green Mountain Coffee, Starbucks, Lipton, and more.', '69.99', 23, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd51.jpg', 51, 7, 1, 14),
('Keurig K475 Coffeemaker, Black', 'A premium coffee maker. The Keurig K475 Coffee Maker features revolutionary Keurig 2.0 Brewing Technology, designed to read the lid of each K-Cup, K-Mug, or K-Carafe pod to brew the perfect beverage every time.', '123.99', 14, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd52.jpg', 52, 7, 1, 14),
('Keurig My K-Cup Reusable Coffee Filter', 'Allows users to use their own gourmet ground coffee in a Keurig brewer.', '8.99', 17, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd53.jpg', 53, 2, 2, 14),
('Keurig K250 2.0 Brewing System, Black', 'The Keurig 2.0 K250 Brewing System features revolutionary Keurig 2.0 Brewing Technology , designed to read the lid of each K-Cup or K-Carafe pack to brew the perfect beverage every time.', '129.99', 9, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd54.jpg', 54, 7, 1, 14),
('Mr. Coffee ECMP50 Espresso/Cappuccino Maker, Black', 'Have the ability to make coffeehouse quality espressos and cappuccinos in the comfort of you own home. The Mr. Coffee 15-bar pump espresso maker delivers high-quality drinks on a consistent basis.', '69.99', 12, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd55.jpg', 55, 7, 1, 12),
('Mr. Coffee Cafe Barista Espresso Maker  BVMC-ECMP1000', 'The Mr. Coffee Caf? Barista lets you be your own Barista right at home. With the touch of a button, you can choose between single or double servings of espresso, latte, or cappuccino', '149.99', 5, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd56.jpg', 56, 7, 1, 12),
('Breville BES870XL Barista Express Espresso Machine', ' As either a crash-course or a continuation study, the Barista Express gives you free rein to explore the art of espresso.', '559.99', 7, 'https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/pd57.jpg', 57, 7, 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `Shipper`
--

CREATE TABLE IF NOT EXISTS `Shipper` (
  `ship_name` varchar(255) DEFAULT NULL,
  `ship_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ship_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `Shipper`
--

INSERT INTO `Shipper` (`ship_name`, `ship_id`) VALUES
('UPS', 1),
('USPS', 2),
('FedEx', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Supplier`
--

CREATE TABLE IF NOT EXISTS `Supplier` (
  `comp_name` text,
  `cont_info` text,
  `supplier_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `Supplier`
--

INSERT INTO `Supplier` (`comp_name`, `cont_info`, `supplier_id`) VALUES
('Starbucks', '9737472717', 1),
('Dunkin Donuts', '2012832665', 2),
('Private', '9736554000', 3);

-- --------------------------------------------------------

--
-- Table structure for table `s_address`
--

CREATE TABLE IF NOT EXISTS `s_address` (
  `s_fname` varchar(255) NOT NULL,
  `s_lname` varchar(255) NOT NULL,
  `s_street` varchar(255) NOT NULL,
  `s_city` varchar(255) NOT NULL,
  `s_state` varchar(255) NOT NULL,
  `s_zip_code` varchar(5) NOT NULL,
  `s_address_id` int(255) NOT NULL AUTO_INCREMENT,
  `c_id` int(255) NOT NULL,
  UNIQUE KEY `s_address_id` (`s_address_id`),
  UNIQUE KEY `s_address_id_2` (`s_address_id`),
  KEY `s_address_id_3` (`s_address_id`),
  KEY `s_address_id_4` (`s_address_id`),
  KEY `c_id` (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii AUTO_INCREMENT=16 ;

--
-- Dumping data for table `s_address`
--

INSERT INTO `s_address` (`s_fname`, `s_lname`, `s_street`, `s_city`, `s_state`, `s_zip_code`, `s_address_id`, `c_id`) VALUES
('Ronald', 'Mangiliman', '10 Stark Way', 'Winterfell', 'New Jersey', '15614', 1, 1),
('Arthur', 'Rozenberg', '22 Kobe Street', 'Las Vegas', 'New Jersey', '81455', 2, 2),
('Gene', 'Hernandez', '5 Brian Street', 'Wayne', 'Maine', '77777', 3, 3),
('Spongebob', 'Squarepants', '124 Conch Street', 'Bikini Bottom', 'California', '55555', 4, 4),
('Ronald', 'Mangiliman', '10 Lucille Drive', 'Lodi', 'New Jersey', '07644', 6, 1),
('Arthur', 'Rozenberg', '9 Jeremy Way', 'Old Bridge', 'New Jersey', '08857', 11, 2),
('Patrick', 'Star', '122 Conch Street', 'Bikini Bottom', 'California', '55555', 13, 4),
('Brian', 'Phelan', '69 Dumb Street', 'Wayne', 'Louisiana', '11111', 14, 3),
('Karen', 'Tiozon', '10 Cousin Avenue', 'Little Ferry', 'New Jersey', '11111', 15, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `b_address`
--
ALTER TABLE `b_address`
  ADD CONSTRAINT `btoc_fk` FOREIGN KEY (`c_id`) REFERENCES `Customer` (`c_id`) ON UPDATE CASCADE;

--
-- Constraints for table `Card`
--
ALTER TABLE `Card`
  ADD CONSTRAINT `card_customer_fk` FOREIGN KEY (`c_id`) REFERENCES `Customer` (`c_id`) ON UPDATE CASCADE;

--
-- Constraints for table `employee_address`
--
ALTER TABLE `employee_address`
  ADD CONSTRAINT `emp_id_fk` FOREIGN KEY (`e_id`) REFERENCES `Employee` (`emp_id`) ON UPDATE CASCADE;

--
-- Constraints for table `Ordered_items`
--
ALTER TABLE `Ordered_items`
  ADD CONSTRAINT `order_id_fk` FOREIGN KEY (`ord_id`) REFERENCES `Orders` (`ord_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_prod_kf` FOREIGN KEY (`prod_id`) REFERENCES `Product` (`prod_id`) ON UPDATE CASCADE;

--
-- Constraints for table `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `brands_fk` FOREIGN KEY (`brand_id`) REFERENCES `Brand` (`Brand_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Category_fk` FOREIGN KEY (`Category_id`) REFERENCES `Category` (`category_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `shipper_fk` FOREIGN KEY (`shipper_id`) REFERENCES `Shipper` (`ship_id`) ON UPDATE CASCADE;

--
-- Constraints for table `s_address`
--
ALTER TABLE `s_address`
  ADD CONSTRAINT `stoc` FOREIGN KEY (`c_id`) REFERENCES `Customer` (`c_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
