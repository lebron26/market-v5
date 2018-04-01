SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prod`
--
CREATE DATABASE IF NOT EXISTS `prod` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `prod`;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(15) NOT NULL auto_increment,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `units` int(5) NOT NULL,
  `total` int(15) NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `tsa_num` int(5) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL auto_increment,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `product_code` (`product_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `qty`, `price`) VALUES
(1, 'C3', 'Cosmos Three', 'Delivering Unmatched Power Efficiency With Mediatek X20 Deca-Core', 'cosmos3.png', 26, 9999.00),
(2, 'FP1', 'Flare P1', 'The Cherry Mobile Flare P1 flaunts a 5-inch HD display and runs on a combination of a quad core processor, 1GB of RAM and Android 7.0 Nougat operating system.', 'flarep1.png', 7, 3999.00),
(3, 'FS5', 'Flare S5 Plus', 'A definite flagship device, the Cherry Mobile Flare S5 Plus sports a bigger 32GB internal storage', 'flares5.png', 34, 8999.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `tsa_num` int(5) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `date_hired` date NOT NULL,
  `emp_stat` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `dept_two` varchar(255) NOT NULL,
  `div` varchar(255) NOT NULL,
  `div_two` varchar(255) NOT NULL,
  `team` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'user',
  `points` int(5) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `tsa_num` (`tsa_num`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;