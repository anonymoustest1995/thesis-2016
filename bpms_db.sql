-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2016 at 02:37 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bpms_db`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `building_permit_view`
--
CREATE TABLE IF NOT EXISTS `building_permit_view` (
`customer_id` bigint(20)
,`customer_lastname` varchar(25)
,`customer_firstname` varchar(25)
,`scope_of_work` varchar(100)
,`customer_middlename` varchar(25)
,`customer_tin_no` bigint(20)
,`customer_form_of_ownership` varchar(100)
,`customer_address_no` bigint(20)
,`customer_address_street` varchar(100)
,`customer_address_barangay` varchar(100)
,`customer_address_city_or_municipality` varchar(100)
,`customer_tel_no` bigint(20)
,`customer_location_address_no` bigint(20)
,`customer_location_address_street` varchar(100)
,`customer_location_address_barangay` varchar(100)
,`customer_location_address_city_or_municipality` varchar(100)
,`occupancy_type_id` bigint(20)
,`occupancy_type_description` text
,`detail_id` bigint(20)
,`header_id_link` bigint(20)
,`occupancy_type_id_link` bigint(20)
,`datetime` timestamp
,`header_id` bigint(20)
,`customer_id_link` bigint(20)
,`transaction_date` timestamp
,`building_permit_number` bigint(20)
);
-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `customer_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_lastname` varchar(25) NOT NULL,
  `customer_firstname` varchar(25) NOT NULL,
  `customer_middlename` varchar(25) NOT NULL,
  `customer_tin_no` bigint(20) NOT NULL,
  `customer_form_of_ownership` varchar(100) NOT NULL,
  `customer_address_no` bigint(20) NOT NULL,
  `customer_address_street` varchar(100) NOT NULL,
  `customer_address_barangay` varchar(100) NOT NULL,
  `customer_address_city_or_municipality` varchar(100) NOT NULL,
  `customer_tel_no` bigint(20) NOT NULL,
  `customer_location_address_no` bigint(20) NOT NULL,
  `customer_location_address_street` varchar(100) NOT NULL,
  `customer_location_address_barangay` varchar(100) NOT NULL,
  `customer_location_address_city_or_municipality` varchar(100) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_lastname`, `customer_firstname`, `customer_middlename`, `customer_tin_no`, `customer_form_of_ownership`, `customer_address_no`, `customer_address_street`, `customer_address_barangay`, `customer_address_city_or_municipality`, `customer_tel_no`, `customer_location_address_no`, `customer_location_address_street`, `customer_location_address_barangay`, `customer_location_address_city_or_municipality`) VALUES
(4, 'Paraiso', 'Kero', 'Layyn', 323231231231, 'Partnership', 2, 'Zone 1', 'Macabalan', 'Cagayan de Oro City', 9932212331, 21, 'Zone 3', 'Macabalan', 'Cagayan de Oro City'),
(5, 'Edrote', 'Sarah', 'Jane', 2132323, 'Single', 21, 'Tabs', 'Tablon', 'Cagayan de Oro City', 3023494343, 32, 'Tabs', 'Tablon', 'Cagayan de Oro  City\r\n'),
(6, 'Dulay', 'Jocelyn', 'Caneos', 9744, 'Double', 168, 'Grapes St.', 'Bulua', 'Cagayan de Oro City', 9169149834, 467, 'Capistrano St.', 'Barangay 29', 'Cagayan de Oro City'),
(7, 'Trocio', 'Roger', 'Valenzona', 6854, 'Single', 238, 'Don Apolinar St.', 'Barangay 31', 'Cagayan de Oro City', 9268663645, 361, 'Yacapin St.', 'Barangay 30', 'Cagayan de Oro City');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_detail` (
  `detail_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `header_id_link` bigint(20) NOT NULL,
  `occupancy_type_id_link` bigint(20) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `scope_of_work` varchar(100) NOT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `occupancy_type_id_link` (`occupancy_type_id_link`),
  KEY `occupancy_type_id_link_2` (`occupancy_type_id_link`),
  KEY `occupancy_type_id_link_3` (`occupancy_type_id_link`),
  KEY `customer_id_link` (`header_id_link`),
  KEY `header_id_link` (`header_id_link`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tbl_detail`
--

INSERT INTO `tbl_detail` (`detail_id`, `header_id_link`, `occupancy_type_id_link`, `datetime`, `scope_of_work`) VALUES
(28, 6, 1, '2016-01-08 16:00:00', 'New Installation'),
(29, 7, 1, '2016-01-20 16:00:00', 'New Installation'),
(30, 6, 1, '2016-01-25 14:33:56', ''),
(31, 7, 2, '2016-01-25 14:33:56', 'New Installation'),
(32, 8, 3, '2016-01-25 14:33:56', ''),
(33, 9, 4, '2016-01-25 14:33:56', 'New Installation'),
(34, 9, 5, '2016-01-25 14:33:56', ''),
(35, 10, 8, '2016-01-25 14:33:56', ''),
(36, 11, 5, '2016-01-25 14:33:56', 'New Installation'),
(37, 10, 7, '2016-01-25 14:33:56', 'New Installation'),
(38, 9, 2, '2016-01-25 14:33:56', 'New Installation'),
(39, 6, 7, '2016-01-25 14:33:56', 'New Installation');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_header`
--

CREATE TABLE IF NOT EXISTS `tbl_header` (
  `header_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id_link` bigint(20) NOT NULL,
  `transaction_date` timestamp NOT NULL,
  PRIMARY KEY (`header_id`),
  KEY `customer_id_link` (`customer_id_link`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_header`
--

INSERT INTO `tbl_header` (`header_id`, `customer_id_link`, `transaction_date`) VALUES
(6, 5, '2016-01-25 14:30:44'),
(7, 6, '2016-01-25 14:30:44'),
(8, 4, '2016-01-25 14:32:54'),
(9, 5, '2016-01-25 14:32:54'),
(10, 6, '2016-01-25 14:32:54'),
(11, 7, '2016-01-25 14:32:54'),
(12, 5, '2016-01-25 14:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_occupancy_type`
--

CREATE TABLE IF NOT EXISTS `tbl_occupancy_type` (
  `occupancy_type_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `occupancy_type_description` text NOT NULL,
  PRIMARY KEY (`occupancy_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_occupancy_type`
--

INSERT INTO `tbl_occupancy_type` (`occupancy_type_id`, `occupancy_type_description`) VALUES
(1, 'Residential Dwelling'),
(2, 'Residential, Hotel, Apartment'),
(3, 'Education and Recreation'),
(4, 'Institutional'),
(5, 'Business and Mercantile'),
(6, 'Industrial'),
(7, 'Storage and Hazardous'),
(8, 'Accessory');

-- --------------------------------------------------------

--
-- Structure for view `building_permit_view`
--
DROP TABLE IF EXISTS `building_permit_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `building_permit_view` AS select `tbl_customer`.`customer_id` AS `customer_id`,`tbl_customer`.`customer_lastname` AS `customer_lastname`,`tbl_customer`.`customer_firstname` AS `customer_firstname`,`tbl_detail`.`scope_of_work` AS `scope_of_work`,`tbl_customer`.`customer_middlename` AS `customer_middlename`,`tbl_customer`.`customer_tin_no` AS `customer_tin_no`,`tbl_customer`.`customer_form_of_ownership` AS `customer_form_of_ownership`,`tbl_customer`.`customer_address_no` AS `customer_address_no`,`tbl_customer`.`customer_address_street` AS `customer_address_street`,`tbl_customer`.`customer_address_barangay` AS `customer_address_barangay`,`tbl_customer`.`customer_address_city_or_municipality` AS `customer_address_city_or_municipality`,`tbl_customer`.`customer_tel_no` AS `customer_tel_no`,`tbl_customer`.`customer_location_address_no` AS `customer_location_address_no`,`tbl_customer`.`customer_location_address_street` AS `customer_location_address_street`,`tbl_customer`.`customer_location_address_barangay` AS `customer_location_address_barangay`,`tbl_customer`.`customer_location_address_city_or_municipality` AS `customer_location_address_city_or_municipality`,`tbl_occupancy_type`.`occupancy_type_id` AS `occupancy_type_id`,`tbl_occupancy_type`.`occupancy_type_description` AS `occupancy_type_description`,`tbl_detail`.`detail_id` AS `detail_id`,`tbl_detail`.`header_id_link` AS `header_id_link`,`tbl_detail`.`occupancy_type_id_link` AS `occupancy_type_id_link`,`tbl_detail`.`datetime` AS `datetime`,`tbl_header`.`header_id` AS `header_id`,`tbl_header`.`customer_id_link` AS `customer_id_link`,`tbl_header`.`transaction_date` AS `transaction_date`,`tbl_detail`.`detail_id` AS `building_permit_number` from (`tbl_customer` join (`tbl_occupancy_type` join (`tbl_detail` join `tbl_header` on((`tbl_header`.`header_id` = `tbl_detail`.`header_id_link`))) on((`tbl_detail`.`occupancy_type_id_link` = `tbl_occupancy_type`.`occupancy_type_id`))) on((`tbl_header`.`customer_id_link` = `tbl_customer`.`customer_id`))) group by `tbl_detail`.`detail_id`;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_detail`
--
ALTER TABLE `tbl_detail`
  ADD CONSTRAINT `tbl_detail_ibfk_11` FOREIGN KEY (`header_id_link`) REFERENCES `tbl_header` (`header_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_ibfk_3` FOREIGN KEY (`occupancy_type_id_link`) REFERENCES `tbl_occupancy_type` (`occupancy_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_header`
--
ALTER TABLE `tbl_header`
  ADD CONSTRAINT `tbl_header_ibfk_1` FOREIGN KEY (`customer_id_link`) REFERENCES `tbl_customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
