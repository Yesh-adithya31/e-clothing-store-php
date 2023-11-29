-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3309
-- Generation Time: Nov 29, 2023 at 01:07 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothingshopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@theknot.com', '2ecf97aca8b441b323b133d8fc061845');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `qty` int(11) NOT NULL,
  `price` varchar(45) NOT NULL,
  `product_master_id` int(11) NOT NULL,
  `order_details_id` int(11) NOT NULL,
  PRIMARY KEY (`bill_id`),
  KEY `fk_bills_product_master1_idx` (`product_master_id`),
  KEY `fk_bills_order_details1_idx` (`order_details_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`bill_id`, `qty`, `price`, `product_master_id`, `order_details_id`) VALUES
(1, 1, '4795', 7, 5),
(2, 1, '3760', 5, 5),
(3, 1, '2850', 4, 6),
(4, 1, '3995', 2, 6),
(5, 1, '3450', 6, 6),
(6, 1, '3995', 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) NOT NULL,
  `is_Deleted` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `is_Deleted`) VALUES
(1, 'Mens', 0),
(2, 'Womens', 0),
(3, 'Child', 0),
(4, 'Top', 0),
(5, 'Bottom', 0),
(6, 'CropTop', 0),
(7, 'New Category', 0),
(8, 'Sample 1', 1),
(9, 'New Category', 1),
(10, 'Bags', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customrequest`
--

DROP TABLE IF EXISTS `customrequest`;
CREATE TABLE IF NOT EXISTS `customrequest` (
  `custom_req_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `shipping_address_id` int(11) NOT NULL,
  `request_note` varchar(500) NOT NULL,
  `order_status` varchar(55) NOT NULL,
  PRIMARY KEY (`custom_req_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customrequest`
--

INSERT INTO `customrequest` (`custom_req_id`, `user_id`, `shipping_address_id`, `request_note`, `order_status`) VALUES
(1, 1, 1, ' Give some note', 'Order Plced'),
(2, 2, 5, ' Make an custom order', 'Order Plced');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `district_id` int(11) NOT NULL AUTO_INCREMENT,
  `district_name` varchar(45) NOT NULL,
  `province_id` int(11) NOT NULL,
  PRIMARY KEY (`district_id`),
  KEY `fk_district_province1_idx` (`province_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district_name`, `province_id`) VALUES
(1, 'Colombo', 1),
(2, 'Gampaha', 1),
(3, 'Kaluthara', 1),
(4, 'Kandy', 3),
(5, 'Matale', 3),
(6, 'Nuwara Eliya', 3),
(7, 'Anuradhapura', 4),
(8, 'Polonnaruwa', 4),
(9, 'Jaffna', 5),
(10, 'Kilinochchi', 5),
(11, 'Mannar', 5),
(12, 'Vavuniya', 5),
(13, 'Mullativu', 5),
(14, 'Ampara', 6),
(15, 'Batticaloa', 6),
(16, 'Trincomalee', 6),
(17, 'Kurunagala', 7),
(18, 'Puttalam', 7),
(19, 'Galle', 2),
(20, 'Hambanthota', 2),
(21, 'Mathara', 2),
(22, 'Badulla', 8),
(23, 'Monaragala', 8),
(24, 'Kegalle', 9),
(25, 'Rathnapura', 9);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `bills_id` int(11) NOT NULL,
  `comment` varchar(45) NOT NULL,
  PRIMARY KEY (`feedback_id`),
  KEY `fk_feedback_bills1_idx` (`bills_id`),
  KEY `fk_feedback_user1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `shipping_address_id` int(11) NOT NULL,
  `order_status_id` int(11) NOT NULL,
  `order_total` double NOT NULL,
  `delivery_note` varchar(200) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`order_id`),
  KEY `fk_purchase_details_user1_idx` (`user_id`),
  KEY `fk_purchase_details_shipping_address1_idx` (`shipping_address_id`),
  KEY `fk_purchase_details_order_status1_idx` (`order_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `user_id`, `shipping_address_id`, `order_status_id`, `order_total`, `delivery_note`, `order_date`) VALUES
(1, 1, 6, 1, 8555, 'Order wants nrea to hosteal', '2023-11-29 04:39:22'),
(2, 1, 7, 1, 8555, 'Order wants nrea to hosteal', '2023-11-29 04:39:31'),
(5, 1, 10, 1, 8555, 'This is order not type', '2023-11-29 04:51:22'),
(6, 1, 11, 1, 10295, 'This is order not type2', '2023-11-29 04:53:10'),
(7, 2, 12, 1, 3995, 'This is order not type3', '2023-11-29 04:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

DROP TABLE IF EXISTS `order_status`;
CREATE TABLE IF NOT EXISTS `order_status` (
  `order_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`order_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`order_status_id`, `status`) VALUES
(1, 'Order Placed'),
(2, 'Order Processing'),
(3, 'Order Shipped'),
(4, 'In Transit'),
(5, 'Out for Delivery'),
(6, 'Delivered'),
(7, 'Order Completed'),
(8, 'Cancelled'),
(9, 'Pending Payment'),
(10, 'On Hold');

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

DROP TABLE IF EXISTS `payment_type`;
CREATE TABLE IF NOT EXISTS `payment_type` (
  `payment_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(45) NOT NULL,
  PRIMARY KEY (`payment_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`payment_type_id`, `value`) VALUES
(1, 'Cash on Delivery'),
(2, 'Paypal');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

DROP TABLE IF EXISTS `product_details`;
CREATE TABLE IF NOT EXISTS `product_details` (
  `product_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(45) NOT NULL,
  `description` varchar(500) NOT NULL,
  `product_image` varchar(45) NOT NULL,
  PRIMARY KEY (`product_details_id`),
  KEY `fk_product_detail_category1_idx` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`product_details_id`, `category_id`, `product_name`, `description`, `product_image`) VALUES
(1, 2, 'Euphoria Crop Blouse', 'The Euphoria Crop Blouse likely has a brief description detailing its style, fabric, design features, and any unique aspects. Material and Fabric: Information about the fabric used (e.g., cotton, silk, polyester), care instructions, and details about the garment\'s construction.', 'best-seller-1.png'),
(2, 2, 'Venus Halter Dress', 'Venus Halter Dress Venus Halter DressVenus Halter Dress', 'best-seller-2.png'),
(3, 2, 'Snap Pure Blouse', 'Snap Pure BlouseSnap Pure BlouseSnap Pure BlouseSnap Pure BlouseSnap Pure BlouseSnap Pure BlouseSnap Pure BlouseSnap Pure BlouseSnap Pure BlouseSnap Pure Blouse ', 'seasonal-1.png'),
(4, 2, 'COLORFUL KNITWEAR', 'COLORFUL KNITWEARCOLORFUL KNITWEAR COLORFUL KNITWEARCOLORFUL KNITWEAR ', 'featured-1.png'),
(5, 1, 'Hooded thermal anorak', 'Hooded thermal anorakHooded thermal anorakHooded thermal anorakHooded thermal anorak ', 'product-2.jpg'),
(6, 2, 'PiquÃ© Biker Jacket', 'PiquÃ© Biker Jacket PiquÃ© Biker Jacket PiquÃ© Biker JacketPiquÃ© Biker Jacket', 'product-9.jpg'),
(7, 4, 'Ankle Boots', 'Ankle BootsAnkle BootsAnkle Boots Ankle BootsAnkle BootsAnkle Boots vAnkle Boots', 'product-12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

DROP TABLE IF EXISTS `product_master`;
CREATE TABLE IF NOT EXISTS `product_master` (
  `product_master_id` int(11) NOT NULL AUTO_INCREMENT,
  `SKU` varchar(45) NOT NULL,
  `product_detail_id` int(11) NOT NULL,
  `qty_in_stock` int(11) NOT NULL,
  `price` double NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`product_master_id`),
  KEY `fk_product_master_product_detail1_idx` (`product_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`product_master_id`, `SKU`, `product_detail_id`, `qty_in_stock`, `price`, `is_deleted`) VALUES
(1, 'ECB001', 1, 34, 3450, 0),
(2, 'VHD001', 2, 35, 3995, 0),
(3, 'SPB0001', 3, 32, 2100, 0),
(4, 'CK0001', 4, 32, 2850, 0),
(5, 'HTA0001', 5, 14, 3760, 0),
(6, 'PBJ0001', 6, 20, 3450, 0),
(7, 'AB001', 7, 20, 4795, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_master_has_variation_option`
--

DROP TABLE IF EXISTS `product_master_has_variation_option`;
CREATE TABLE IF NOT EXISTS `product_master_has_variation_option` (
  `product_master_id` int(11) NOT NULL,
  `variation_option_id` int(11) NOT NULL,
  PRIMARY KEY (`product_master_id`,`variation_option_id`),
  KEY `fk_product_master_has_variation_option_variation_option1_idx` (`variation_option_id`),
  KEY `fk_product_master_has_variation_option_product_master1_idx` (`product_master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_master_has_variation_option`
--

INSERT INTO `product_master_has_variation_option` (`product_master_id`, `variation_option_id`) VALUES
(1, 5),
(2, 4),
(3, 4),
(4, 3),
(5, 1),
(6, 4),
(7, 10);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
CREATE TABLE IF NOT EXISTS `province` (
  `province_id` int(11) NOT NULL AUTO_INCREMENT,
  `province_name` varchar(45) NOT NULL,
  PRIMARY KEY (`province_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `province_name`) VALUES
(1, 'Western Province'),
(2, 'Southern Province'),
(3, 'Central Province'),
(4, 'North Central Province'),
(5, 'Northern Province'),
(6, 'Eastern Province'),
(7, 'North Western Province'),
(8, 'Uva Province'),
(9, 'Sabaragamuwa Province');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

DROP TABLE IF EXISTS `shipping_address`;
CREATE TABLE IF NOT EXISTS `shipping_address` (
  `shipping_add_id` int(11) NOT NULL AUTO_INCREMENT,
  `street_number` varchar(5) NOT NULL,
  `address_line1` varchar(50) NOT NULL,
  `address_line2` varchar(45) NOT NULL,
  `postal_code` varchar(45) NOT NULL,
  `district` varchar(55) NOT NULL,
  PRIMARY KEY (`shipping_add_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`shipping_add_id`, `street_number`, `address_line1`, `address_line2`, `postal_code`, `district`) VALUES
(1, '23', 'Lane1 ', 'Lane 3', '10400', 'Colombo'),
(5, '45/1', 'Rawathwaththa', 'Moratuwa', '10400', 'Colombo'),
(6, '30', 'Nuwara lane', 'Kururnegala', '85391', 'Kururnegala'),
(7, '30', 'Nuwara lane', 'Kururnegala', '85391', 'Kururnegala'),
(10, '45/1', 'Nuwara lane', 'Kururnegala', '85391', 'Colombo'),
(11, '45/1', 'Rawathwaththa', 'Moratuwa', '10400', 'Colombo'),
(12, '50', 'Lakshapathiya', 'Moratuwa', '10400', 'Colombo');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

DROP TABLE IF EXISTS `shopping_cart`;
CREATE TABLE IF NOT EXISTS `shopping_cart` (
  `shopping_cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `qty` int(11) NOT NULL,
  `product_master_id` int(11) NOT NULL,
  PRIMARY KEY (`shopping_cart_id`),
  KEY `fk_shopping_cart_product_master1_idx` (`product_master_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`shopping_cart_id`, `qty`, `product_master_id`) VALUES
(16, 1, 7),
(17, 1, 7),
(18, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone_number` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `phone_number`, `password`) VALUES
(1, 'Yesh', 'Adithya', 'yesh@gmail.com', '0766901343', '2ecf97aca8b441b323b133d8fc061845'),
(2, 'Nishan', 'Fernando', 'nishan@gmail.com', '0766901343', '2ecf97aca8b441b323b133d8fc061845');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_shipping_address`
--

DROP TABLE IF EXISTS `user_has_shipping_address`;
CREATE TABLE IF NOT EXISTS `user_has_shipping_address` (
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`address_id`),
  KEY `fk_user_has_address_address1_idx` (`address_id`),
  KEY `fk_user_has_address_user1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_has_shopping_cart`
--

DROP TABLE IF EXISTS `user_has_shopping_cart`;
CREATE TABLE IF NOT EXISTS `user_has_shopping_cart` (
  `user_id` int(11) NOT NULL,
  `shopping_cart_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`shopping_cart_id`),
  KEY `fk_user_has_shopping_cart_shopping_cart1_idx` (`shopping_cart_id`),
  KEY `fk_user_has_shopping_cart_user1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_payment_method`
--

DROP TABLE IF EXISTS `user_payment_method`;
CREATE TABLE IF NOT EXISTS `user_payment_method` (
  `user_payment_method_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `id_default` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_payment_method_id`),
  KEY `fk_user_payment_method_user1_idx` (`user_id`),
  KEY `fk_user_payment_method_payment_type1_idx` (`payment_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `variation`
--

DROP TABLE IF EXISTS `variation`;
CREATE TABLE IF NOT EXISTS `variation` (
  `variant_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`variant_id`),
  KEY `fk_variation_category1_idx` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variation`
--

INSERT INTO `variation` (`variant_id`, `category_id`, `name`) VALUES
(2, 1, 'Color'),
(3, 2, 'Color'),
(4, 3, 'Color'),
(5, 1, 'Sizes'),
(6, 2, 'Sizes'),
(7, 4, 'Color'),
(8, 10, 'Color'),
(9, 3, 'Color'),
(10, 3, 'Sizes'),
(12, 4, 'Sizes');

-- --------------------------------------------------------

--
-- Table structure for table `variation_option`
--

DROP TABLE IF EXISTS `variation_option`;
CREATE TABLE IF NOT EXISTS `variation_option` (
  `variant_option_id` int(11) NOT NULL AUTO_INCREMENT,
  `variation_id` int(11) NOT NULL,
  `value` varchar(45) NOT NULL,
  PRIMARY KEY (`variant_option_id`),
  KEY `fk_variation_option_variation1_idx` (`variation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variation_option`
--

INSERT INTO `variation_option` (`variant_option_id`, `variation_id`, `value`) VALUES
(1, 2, 'white,black,red'),
(3, 3, 'black,white,green'),
(4, 6, 'sm,lg,xl,xxl'),
(5, 3, 'green,yellow,brown'),
(6, 7, 'sm,lg,xl'),
(7, 8, 'white,yellow,green,black'),
(8, 4, 'green,white'),
(9, 7, 'green,white,black'),
(10, 12, 'xsm,sm,l');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`product_master_id`) REFERENCES `product_master` (`product_master_id`),
  ADD CONSTRAINT `fk_bills_order_details1` FOREIGN KEY (`order_details_id`) REFERENCES `order_details` (`order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `fk_district_province1` FOREIGN KEY (`province_id`) REFERENCES `province` (`province_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_feedback_bills1` FOREIGN KEY (`bills_id`) REFERENCES `bills` (`bill_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_feedback_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_purchase_details_order_status1` FOREIGN KEY (`order_status_id`) REFERENCES `order_status` (`order_status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_purchase_details_shipping_address1` FOREIGN KEY (`shipping_address_id`) REFERENCES `shipping_address` (`shipping_add_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_purchase_details_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `fk_product_detail_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_master`
--
ALTER TABLE `product_master`
  ADD CONSTRAINT `product_master_ibfk_1` FOREIGN KEY (`product_detail_id`) REFERENCES `product_details` (`product_details_id`);

--
-- Constraints for table `product_master_has_variation_option`
--
ALTER TABLE `product_master_has_variation_option`
  ADD CONSTRAINT `fk_product_master_has_variation_option_variation_option1` FOREIGN KEY (`variation_option_id`) REFERENCES `variation_option` (`variant_option_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_master_has_variation_option_ibfk_1` FOREIGN KEY (`product_master_id`) REFERENCES `product_master` (`product_master_id`);

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`product_master_id`) REFERENCES `product_master` (`product_master_id`);

--
-- Constraints for table `user_has_shipping_address`
--
ALTER TABLE `user_has_shipping_address`
  ADD CONSTRAINT `fk_user_has_address_address1` FOREIGN KEY (`address_id`) REFERENCES `shipping_address` (`shipping_add_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_address_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_has_shopping_cart`
--
ALTER TABLE `user_has_shopping_cart`
  ADD CONSTRAINT `fk_user_has_shopping_cart_shopping_cart1` FOREIGN KEY (`shopping_cart_id`) REFERENCES `shopping_cart` (`shopping_cart_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_shopping_cart_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_payment_method`
--
ALTER TABLE `user_payment_method`
  ADD CONSTRAINT `fk_user_payment_method_payment_type1` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_type` (`payment_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_payment_method_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `variation`
--
ALTER TABLE `variation`
  ADD CONSTRAINT `fk_variation_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `variation_option`
--
ALTER TABLE `variation_option`
  ADD CONSTRAINT `fk_variation_option_variation1` FOREIGN KEY (`variation_id`) REFERENCES `variation` (`variant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
