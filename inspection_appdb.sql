-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2016 at 03:54 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inspection_appdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('11b7a1b266bc626e8a19ebbdd0f5a4acbe29ad73', '::1', 1456837841, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363833373536373b757365725f69647c733a333a22353635223b757365725f757365726e616d657c733a373a2272696368617264223b757365725f66697273746e616d657c733a373a2252696368617264223b757365725f6c6173746e616d657c733a373a2245737472616461223b757365725f6d6964646c656e616d657c733a373a2244736164617364223b757365725f67656e6465727c733a343a224d616c65223b757365725f656d61696c7c733a31333a2264617340676d61696c2e636f6d223b757365725f706f736974696f6e7c733a31333a2241646d696e6973747261746f72223b69735f6c6f676765645f696e7c623a313b),
('13d4de77ff910855cea4090852db424e666b9b57', '::1', 1456834675, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363833343436343b757365725f69647c733a333a22353635223b757365725f757365726e616d657c733a373a2272696368617264223b757365725f66697273746e616d657c733a373a2252696368617264223b757365725f6c6173746e616d657c733a373a2245737472616461223b757365725f6d6964646c656e616d657c733a373a2244736164617364223b757365725f67656e6465727c733a343a224d616c65223b757365725f656d61696c7c733a31333a2264617340676d61696c2e636f6d223b757365725f706f736974696f6e7c733a31333a2241646d696e6973747261746f72223b69735f6c6f676765645f696e7c623a313b),
('1434433df843d9a77d864481df8ea4d7b033be26', '::1', 1456834140, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363833343037383b757365725f69647c733a333a22353635223b757365725f757365726e616d657c733a373a2272696368617264223b757365725f66697273746e616d657c733a373a2252696368617264223b757365725f6c6173746e616d657c733a373a2245737472616461223b757365725f6d6964646c656e616d657c733a373a2244736164617364223b757365725f67656e6465727c733a343a224d616c65223b757365725f656d61696c7c733a31333a2264617340676d61696c2e636f6d223b757365725f706f736974696f6e7c733a313a2233223b69735f6c6f676765645f696e7c623a313b),
('1738019f74369ac1636cd6d483c3810c5e1d1a29', '::1', 1456843577, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363834323830313b757365725f69647c733a333a22353635223b757365725f757365726e616d657c733a373a2272696368617264223b757365725f66697273746e616d657c733a373a2252696368617264223b757365725f6c6173746e616d657c733a373a2245737472616461223b757365725f6d6964646c656e616d657c733a373a2244736164617364223b757365725f67656e6465727c733a343a224d616c65223b757365725f656d61696c7c733a31333a2264617340676d61696c2e636f6d223b757365725f706f736974696f6e7c733a31333a2241646d696e6973747261746f72223b69735f6c6f676765645f696e7c623a313b),
('315ff000151c05cc51183a2c522ff7e8f4aa40e5', '::1', 1456838889, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363833383535373b757365725f69647c733a333a22353635223b757365725f757365726e616d657c733a373a2272696368617264223b757365725f66697273746e616d657c733a373a2252696368617264223b757365725f6c6173746e616d657c733a373a2245737472616461223b757365725f6d6964646c656e616d657c733a373a2244736164617364223b757365725f67656e6465727c733a343a224d616c65223b757365725f656d61696c7c733a31333a2264617340676d61696c2e636f6d223b757365725f706f736974696f6e7c733a31333a2241646d696e6973747261746f72223b69735f6c6f676765645f696e7c623a313b),
('4ed790736894f2fd85b6d26a00c67d3ef2fae3f5', '::1', 1456842121, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363834313832373b757365725f69647c733a333a22353635223b757365725f757365726e616d657c733a373a2272696368617264223b757365725f66697273746e616d657c733a373a2252696368617264223b757365725f6c6173746e616d657c733a373a2245737472616461223b757365725f6d6964646c656e616d657c733a373a2244736164617364223b757365725f67656e6465727c733a343a224d616c65223b757365725f656d61696c7c733a31333a2264617340676d61696c2e636f6d223b757365725f706f736974696f6e7c733a31333a2241646d696e6973747261746f72223b69735f6c6f676765645f696e7c623a313b),
('5d7c94ec191b1fdf32305c7e4f5f50f9922cac76', '::1', 1456835072, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363833343739393b757365725f69647c733a333a22353635223b757365725f757365726e616d657c733a373a2272696368617264223b757365725f66697273746e616d657c733a373a2252696368617264223b757365725f6c6173746e616d657c733a373a2245737472616461223b757365725f6d6964646c656e616d657c733a373a2244736164617364223b757365725f67656e6465727c733a343a224d616c65223b757365725f656d61696c7c733a31333a2264617340676d61696c2e636f6d223b757365725f706f736974696f6e7c733a31333a2241646d696e6973747261746f72223b69735f6c6f676765645f696e7c623a313b),
('79e2978015828b3c2ab4e65e9f10730ff3968443', '::1', 1456843638, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363834333537393b757365725f69647c733a333a22353635223b757365725f757365726e616d657c733a373a2272696368617264223b757365725f66697273746e616d657c733a373a2252696368617264223b757365725f6c6173746e616d657c733a373a2245737472616461223b757365725f6d6964646c656e616d657c733a373a2244736164617364223b757365725f67656e6465727c733a343a224d616c65223b757365725f656d61696c7c733a31333a2264617340676d61696c2e636f6d223b757365725f706f736974696f6e7c733a31333a2241646d696e6973747261746f72223b69735f6c6f676765645f696e7c623a313b),
('7d810850fc3584dafb7c849482d5a4d72779149d', '::1', 1456836616, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363833363338383b757365725f69647c733a333a22353635223b757365725f757365726e616d657c733a373a2272696368617264223b757365725f66697273746e616d657c733a373a2252696368617264223b757365725f6c6173746e616d657c733a373a2245737472616461223b757365725f6d6964646c656e616d657c733a373a2244736164617364223b757365725f67656e6465727c733a343a224d616c65223b757365725f656d61696c7c733a31333a2264617340676d61696c2e636f6d223b757365725f706f736974696f6e7c733a31333a2241646d696e6973747261746f72223b69735f6c6f676765645f696e7c623a313b),
('8c080f299c23f0b4befaa3e156d9cd68df77bdfc', '::1', 1456841045, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363834303834353b757365725f69647c733a333a22353635223b757365725f757365726e616d657c733a373a2272696368617264223b757365725f66697273746e616d657c733a373a2252696368617264223b757365725f6c6173746e616d657c733a373a2245737472616461223b757365725f6d6964646c656e616d657c733a373a2244736164617364223b757365725f67656e6465727c733a343a224d616c65223b757365725f656d61696c7c733a31333a2264617340676d61696c2e636f6d223b757365725f706f736974696f6e7c733a31333a2241646d696e6973747261746f72223b69735f6c6f676765645f696e7c623a313b),
('9537732be52020911dd1f858e7747ac45c9092f7', '::1', 1456836022, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363833363032323b757365725f69647c733a333a22353635223b757365725f757365726e616d657c733a373a2272696368617264223b757365725f66697273746e616d657c733a373a2252696368617264223b757365725f6c6173746e616d657c733a373a2245737472616461223b757365725f6d6964646c656e616d657c733a373a2244736164617364223b757365725f67656e6465727c733a343a224d616c65223b757365725f656d61696c7c733a31333a2264617340676d61696c2e636f6d223b757365725f706f736974696f6e7c733a31333a2241646d696e6973747261746f72223b69735f6c6f676765645f696e7c623a313b),
('aa9bcff6c6f26cf2c334fd95ef5c6acc956bf376', '::1', 1456838369, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363833383231383b757365725f69647c733a333a22353635223b757365725f757365726e616d657c733a373a2272696368617264223b757365725f66697273746e616d657c733a373a2252696368617264223b757365725f6c6173746e616d657c733a373a2245737472616461223b757365725f6d6964646c656e616d657c733a373a2244736164617364223b757365725f67656e6465727c733a343a224d616c65223b757365725f656d61696c7c733a31333a2264617340676d61696c2e636f6d223b757365725f706f736974696f6e7c733a31333a2241646d696e6973747261746f72223b69735f6c6f676765645f696e7c623a313b),
('b04d4fb82b8f35ea403279c6da80456ac46f4188', '::1', 1456832343, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363833323333313b),
('b0a1a8a9f69cf356c260625cddeeb714995ceb43', '::1', 1456838186, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363833373931313b757365725f69647c733a333a22353635223b757365725f757365726e616d657c733a373a2272696368617264223b757365725f66697273746e616d657c733a373a2252696368617264223b757365725f6c6173746e616d657c733a373a2245737472616461223b757365725f6d6964646c656e616d657c733a373a2244736164617364223b757365725f67656e6465727c733a343a224d616c65223b757365725f656d61696c7c733a31333a2264617340676d61696c2e636f6d223b757365725f706f736974696f6e7c733a31333a2241646d696e6973747261746f72223b69735f6c6f676765645f696e7c623a313b),
('bfb9078df045f655f4ae83b06ff5f67a37954c56', '::1', 1456840398, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363834303230373b757365725f69647c733a333a22353635223b757365725f757365726e616d657c733a373a2272696368617264223b757365725f66697273746e616d657c733a373a2252696368617264223b757365725f6c6173746e616d657c733a373a2245737472616461223b757365725f6d6964646c656e616d657c733a373a2244736164617364223b757365725f67656e6465727c733a343a224d616c65223b757365725f656d61696c7c733a31333a2264617340676d61696c2e636f6d223b757365725f706f736974696f6e7c733a31333a2241646d696e6973747261746f72223b69735f6c6f676765645f696e7c623a313b),
('d0526e823c860c6163dfeb2db386fb2197811c46', '::1', 1456842800, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363834323436313b757365725f69647c733a333a22353635223b757365725f757365726e616d657c733a373a2272696368617264223b757365725f66697273746e616d657c733a373a2252696368617264223b757365725f6c6173746e616d657c733a373a2245737472616461223b757365725f6d6964646c656e616d657c733a373a2244736164617364223b757365725f67656e6465727c733a343a224d616c65223b757365725f656d61696c7c733a31333a2264617340676d61696c2e636f6d223b757365725f706f736974696f6e7c733a31333a2241646d696e6973747261746f72223b69735f6c6f676765645f696e7c623a313b),
('d1363925afb7595480a2e6ed41c1458bd58f9c04', '::1', 1456842431, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363834323132383b757365725f69647c733a333a22353635223b757365725f757365726e616d657c733a373a2272696368617264223b757365725f66697273746e616d657c733a373a2252696368617264223b757365725f6c6173746e616d657c733a373a2245737472616461223b757365725f6d6964646c656e616d657c733a373a2244736164617364223b757365725f67656e6465727c733a343a224d616c65223b757365725f656d61696c7c733a31333a2264617340676d61696c2e636f6d223b757365725f706f736974696f6e7c733a31333a2241646d696e6973747261746f72223b69735f6c6f676765645f696e7c623a313b),
('e3ea499025bca0fbaa574ac9b732816411436bab', '::1', 1456840842, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363834303534343b757365725f69647c733a333a22353635223b757365725f757365726e616d657c733a373a2272696368617264223b757365725f66697273746e616d657c733a373a2252696368617264223b757365725f6c6173746e616d657c733a373a2245737472616461223b757365725f6d6964646c656e616d657c733a373a2244736164617364223b757365725f67656e6465727c733a343a224d616c65223b757365725f656d61696c7c733a31333a2264617340676d61696c2e636f6d223b757365725f706f736974696f6e7c733a31333a2241646d696e6973747261746f72223b69735f6c6f676765645f696e7c623a313b),
('e883744896f9dbe9068f8fdc8f6d6d732697b98d', '::1', 1456839008, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363833383839303b757365725f69647c733a333a22353635223b757365725f757365726e616d657c733a373a2272696368617264223b757365725f66697273746e616d657c733a373a2252696368617264223b757365725f6c6173746e616d657c733a373a2245737472616461223b757365725f6d6964646c656e616d657c733a373a2244736164617364223b757365725f67656e6465727c733a343a224d616c65223b757365725f656d61696c7c733a31333a2264617340676d61696c2e636f6d223b757365725f706f736974696f6e7c733a31333a2241646d696e6973747261746f72223b69735f6c6f676765645f696e7c623a313b),
('ed79d3ca97b746ffbbc5de5fdd7056d7df7fef33', '::1', 1456837204, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363833363938353b757365725f69647c733a333a22353635223b757365725f757365726e616d657c733a373a2272696368617264223b757365725f66697273746e616d657c733a373a2252696368617264223b757365725f6c6173746e616d657c733a373a2245737472616461223b757365725f6d6964646c656e616d657c733a373a2244736164617364223b757365725f67656e6465727c733a343a224d616c65223b757365725f656d61696c7c733a31333a2264617340676d61696c2e636f6d223b757365725f706f736974696f6e7c733a31333a2241646d696e6973747261746f72223b69735f6c6f676765645f696e7c623a313b),
('ee05ca650301db6ab5efb851c2f81aec31225f44', '::1', 1456835908, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363833353631303b757365725f69647c733a333a22353635223b757365725f757365726e616d657c733a373a2272696368617264223b757365725f66697273746e616d657c733a373a2252696368617264223b757365725f6c6173746e616d657c733a373a2245737472616461223b757365725f6d6964646c656e616d657c733a373a2244736164617364223b757365725f67656e6465727c733a343a224d616c65223b757365725f656d61696c7c733a31333a2264617340676d61696c2e636f6d223b757365725f706f736974696f6e7c733a31333a2241646d696e6973747261746f72223b69735f6c6f676765645f696e7c623a313b);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_architectural`
--

CREATE TABLE IF NOT EXISTS `tbl_architectural` (
  `archi_inspection_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `least_floor_to_celling` varchar(25) NOT NULL,
  `estimated_ventilation` varchar(25) NOT NULL,
  PRIMARY KEY (`archi_inspection_id`),
  KEY `inspection_id` (`archi_inspection_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assigned`
--

CREATE TABLE IF NOT EXISTS `tbl_assigned` (
  `assigned_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `building_permit_number_link` bigint(20) NOT NULL,
  `user_id_link` bigint(20) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  PRIMARY KEY (`assigned_id`),
  KEY `building_permit_number_link_2` (`building_permit_number_link`),
  KEY `user_id_link` (`user_id_link`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=155 ;

--
-- Dumping data for table `tbl_assigned`
--

INSERT INTO `tbl_assigned` (`assigned_id`, `building_permit_number_link`, `user_id_link`, `purpose`) VALUES
(130, 30, 570, 'Occupancy'),
(131, 29, 571, 'Occupancy'),
(132, 28, 569, 'Occupancy'),
(146, 35, 571, 'Occupancy'),
(147, 35, 567, 'Occupancy'),
(148, 36, 571, 'Occupancy'),
(149, 35, 570, 'Occupancy'),
(150, 35, 568, 'Occupancy'),
(151, 35, 569, 'Occupancy'),
(153, 35, 573, 'Occupancy'),
(154, 28, 568, 'Occupancy');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assigned_annual`
--

CREATE TABLE IF NOT EXISTS `tbl_assigned_annual` (
  `assigned_annual_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `assigned_annual_occupancy_id_link` bigint(20) NOT NULL,
  `assigned_annual_user_id_link` bigint(20) NOT NULL,
  PRIMARY KEY (`assigned_annual_id`),
  KEY `assigned_annual_occupancy_id_link` (`assigned_annual_occupancy_id_link`),
  KEY `assigned_annual_user_id_link` (`assigned_annual_user_id_link`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_building_permit`
--

CREATE TABLE IF NOT EXISTS `tbl_building_permit` (
  `building_permit_number` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id_link` bigint(20) NOT NULL,
  PRIMARY KEY (`building_permit_number`),
  KEY `customer_id_link` (`customer_id_link`),
  KEY `customer_id_link_2` (`customer_id_link`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `customer_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `building_permit_number` bigint(20) NOT NULL,
  `customer_lastname` varchar(25) NOT NULL,
  `customer_firstname` varchar(25) NOT NULL,
  `customer_middlename` varchar(25) NOT NULL,
  `customer_tin_no` bigint(20) NOT NULL,
  `customer_form_of_ownership` varchar(100) NOT NULL,
  `customer_address_no` varchar(100) NOT NULL,
  `customer_address_street` varchar(255) NOT NULL,
  `customer_address_barangay` varchar(255) NOT NULL,
  `customer_address_city_or_municipality` varchar(255) NOT NULL,
  `customer_tel_no` bigint(20) NOT NULL,
  `customer_location_address_no` varchar(100) NOT NULL,
  `customer_location_address_street` varchar(255) NOT NULL,
  `customer_location_address_barangay` varchar(255) NOT NULL,
  `customer_location_address_city_or_municipality` varchar(255) NOT NULL,
  `occupancy_type_description` varchar(255) NOT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `building_permit_number` (`building_permit_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=123 ;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `building_permit_number`, `customer_lastname`, `customer_firstname`, `customer_middlename`, `customer_tin_no`, `customer_form_of_ownership`, `customer_address_no`, `customer_address_street`, `customer_address_barangay`, `customer_address_city_or_municipality`, `customer_tel_no`, `customer_location_address_no`, `customer_location_address_street`, `customer_location_address_barangay`, `customer_location_address_city_or_municipality`, `occupancy_type_description`) VALUES
(116, 36, 'Trocio', 'Roger', 'Valenzona', 6854, 'Single', '238', 'Don Apolinar St.', 'Barangay 31', 'Cagayan de Oro City', 9268663645, '361', 'Yacapin St.', 'Barangay 30', 'Cagayan de Oro City', 'Business and Mercantile'),
(117, 30, 'Edrote', 'Sarah', 'Jane', 2132323, 'Single', '21', 'Tabs', 'Tablon', 'Cagayan de Oro City', 3023494343, '32', 'Tabs', 'Tablon', 'Cagayan de Oro  City\r\n', 'Residential Dwelling'),
(118, 29, 'Dulay', 'Jocelyn', 'Caneos', 9744, 'Double', '168', 'Grapes St.', 'Bulua', 'Cagayan de Oro City', 9169149834, '467', 'Capistrano St.', 'Barangay 29', 'Cagayan de Oro City', 'Residential Dwelling'),
(119, 31, 'Dulay', 'Jocelyn', 'Caneos', 9744, 'Double', '168', 'Grapes St.', 'Bulua', 'Cagayan de Oro City', 9169149834, '467', 'Capistrano St.', 'Barangay 29', 'Cagayan de Oro City', 'Residential, Hotel, Apartment'),
(120, 33, 'Edrote', 'Sarah', 'Jane', 2132323, 'Single', '21', 'Tabs', 'Tablon', 'Cagayan de Oro City', 3023494343, '32', 'Tabs', 'Tablon', 'Cagayan de Oro  City\r\n', 'Institutional'),
(121, 35, 'Dulay', 'Jocelyn', 'Caneos', 9744, 'Double', '168', 'Grapes St.', 'Bulua', 'Cagayan de Oro City', 9169149834, '467', 'Capistrano St.', 'Barangay 29', 'Cagayan de Oro City', 'Accessory'),
(122, 28, 'Edrote', 'Sarah', 'Jane', 2132323, 'Single', '21', 'Tabs', 'Tablon', 'Cagayan de Oro City', 3023494343, '32', 'Tabs', 'Tablon', 'Cagayan de Oro  City\r\n', 'Residential Dwelling');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_electrical`
--

CREATE TABLE IF NOT EXISTS `tbl_electrical` (
  `electrical_inspection_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `number_of_light_outlet` bigint(20) NOT NULL,
  `number_of_convenience_outlet` bigint(20) NOT NULL,
  `number_of_aircon_outlet` bigint(20) NOT NULL,
  `number_of_cooking_unit_outlet` bigint(20) NOT NULL,
  `number_of_water_heater_outlet` bigint(20) NOT NULL,
  `number_of_water_pump_outlet` bigint(20) NOT NULL,
  `number_of_toggle_switch` bigint(20) NOT NULL,
  `number_of_bells_or_buzzers` bigint(20) NOT NULL,
  `number_of_push_buttons` bigint(20) NOT NULL,
  `number_of_fa_detectors` bigint(20) NOT NULL,
  PRIMARY KEY (`electrical_inspection_id`),
  KEY `inspection_id` (`electrical_inspection_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_electronics`
--

CREATE TABLE IF NOT EXISTS `tbl_electronics` (
  `electronics_inspection_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `installation_operation_description` varchar(255) NOT NULL,
  PRIMARY KEY (`electronics_inspection_id`),
  KEY `inspection_id` (`electronics_inspection_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inspection`
--

CREATE TABLE IF NOT EXISTS `tbl_inspection` (
  `inspection_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `assigned_id_link` bigint(20) NOT NULL,
  `inspection_type` varchar(255) NOT NULL,
  `scope_of_work` varchar(25) NOT NULL,
  `remarks` varchar(25) NOT NULL,
  `feedbacks` text NOT NULL,
  `payment` double NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `others` text NOT NULL,
  PRIMARY KEY (`inspection_id`),
  KEY `building_permit_number_link` (`assigned_id_link`,`inspection_type`),
  KEY `assigned_id_link` (`assigned_id_link`),
  KEY `inspection_type_id_link` (`inspection_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inspection_area`
--

CREATE TABLE IF NOT EXISTS `tbl_inspection_area` (
  `area_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `area_description` varchar(255) NOT NULL,
  `inspection_type_id_link` bigint(20) NOT NULL,
  PRIMARY KEY (`area_id`),
  KEY `area_type` (`inspection_type_id_link`),
  KEY `inspection_type_id_link` (`inspection_type_id_link`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `tbl_inspection_area`
--

INSERT INTO `tbl_inspection_area` (`area_id`, `area_description`, `inspection_type_id_link`) VALUES
(72, 'sample', 26),
(73, 'cctv', 26),
(74, 'tv', 26);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inspection_type`
--

CREATE TABLE IF NOT EXISTS `tbl_inspection_type` (
  `inspection_type_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inspection_type_description` varchar(255) NOT NULL,
  PRIMARY KEY (`inspection_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tbl_inspection_type`
--

INSERT INTO `tbl_inspection_type` (`inspection_type_id`, `inspection_type_description`) VALUES
(22, 'Architectural'),
(23, 'none'),
(24, 'none'),
(25, 'Electrical'),
(26, 'Electronics'),
(27, 'Mechanical'),
(28, 'Plumbing / Sanitary'),
(29, 'Structural');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mechanical`
--

CREATE TABLE IF NOT EXISTS `tbl_mechanical` (
  `mechanical_inspection_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mechanical_installation_operation_description` varchar(255) NOT NULL,
  PRIMARY KEY (`mechanical_inspection_id`),
  KEY `inspection_id` (`mechanical_inspection_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_occupancy`
--

CREATE TABLE IF NOT EXISTS `tbl_occupancy` (
  `occupancy_number` bigint(20) NOT NULL AUTO_INCREMENT,
  `building_permit_number_link` bigint(20) NOT NULL,
  `date_approved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`occupancy_number`),
  KEY `building_permit_number_link` (`building_permit_number_link`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_occupancy`
--

INSERT INTO `tbl_occupancy` (`occupancy_number`, `building_permit_number_link`, `date_approved`) VALUES
(6, 36, '2016-02-27 01:14:11'),
(7, 29, '2016-02-27 02:57:38'),
(8, 35, '2016-02-27 09:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_others`
--

CREATE TABLE IF NOT EXISTS `tbl_others` (
  `others_inspection_id` bigint(20) NOT NULL,
  KEY `others_inspection_id` (`others_inspection_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_plumbing_or_sanitary`
--

CREATE TABLE IF NOT EXISTS `tbl_plumbing_or_sanitary` (
  `plumbing_inspection_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fixtures_to_be_installed` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `water_supply` varchar(255) NOT NULL,
  `system_of_disposal` varchar(255) NOT NULL,
  `number_of_stories` varchar(255) NOT NULL,
  `date_installed` date NOT NULL,
  `date_completion` date NOT NULL,
  `total_area` varchar(255) NOT NULL,
  PRIMARY KEY (`plumbing_inspection_id`),
  KEY `inspection_id` (`plumbing_inspection_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_positions`
--

CREATE TABLE IF NOT EXISTS `tbl_positions` (
  `position_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `position_description` varchar(255) NOT NULL,
  `inspection_type_id_link` bigint(20) NOT NULL,
  PRIMARY KEY (`position_id`),
  KEY `tbl_inspection_type_id_link` (`inspection_type_id_link`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_positions`
--

INSERT INTO `tbl_positions` (`position_id`, `position_description`, `inspection_type_id_link`) VALUES
(2, 'Super Admin', 23),
(3, 'Administrator', 24),
(4, 'Electrical Inspector', 25),
(5, 'Electronics Inspector', 26),
(6, 'Mechanical Inspector', 27),
(7, 'Plumbing / Sanitary Inspector', 28),
(8, 'Structural Inspector', 29),
(11, 'Architectural Inspector', 26);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_structural`
--

CREATE TABLE IF NOT EXISTS `tbl_structural` (
  `structural_inspection_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `footing_size` varchar(25) NOT NULL,
  `column_size` varchar(25) NOT NULL,
  `main_rebars_size` varchar(25) NOT NULL,
  `front_seatback` varchar(100) NOT NULL,
  `left_side_seatback` varchar(100) NOT NULL,
  `right_side_seatback` varchar(100) NOT NULL,
  `rear_seatback` varchar(100) NOT NULL,
  PRIMARY KEY (`structural_inspection_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_position_link` varchar(50) NOT NULL,
  `user_username` varchar(25) NOT NULL,
  `user_lastname` varchar(25) NOT NULL,
  `user_firstname` varchar(25) NOT NULL,
  `user_middlename` varchar(25) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(64) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_username` (`user_username`),
  KEY `user_position_id_link` (`user_position_link`),
  KEY `user_position_id_link_2` (`user_position_link`),
  KEY `user_position_id_link_3` (`user_position_link`),
  KEY `user_position_link` (`user_position_link`),
  KEY `user_position_link_2` (`user_position_link`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=574 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_position_link`, `user_username`, `user_lastname`, `user_firstname`, `user_middlename`, `user_gender`, `user_email`, `user_password`) VALUES
(565, '3', 'richard', 'Estrada', 'Richard', 'Dsadasd', 'Male', 'das@gmail.com', 'sha256:999:EVKF31/rB4NUbFEuN++Ob1wC:i9JWXNjbt5ZKgHJ1CKJ+5ZDy'),
(567, '4', 'ketx', 'Ibanez', 'Ketx', 'Vilargo', 'Female', 'ketx@gmail.com', 'sha256:999:Su1JlvLloe/DTUU5BuSJfL3d:ZivBaYvkT3IRK8L7Cp5/QHOn'),
(568, '6', 'caroline', 'Paraiso', 'Caroline', 'Oprah', 'Female', 'caroline@gmail.com', 'sha256:999:CDQEMrwT7PxeyYa0ckDR23qY:ZEx2LtwoAof2QK7Gc8t7YZiu'),
(569, '7', 'rich', 'Estrada', 'Richard', 'Sinagod', 'Male', 'rich@gmail.com', 'sha256:999:8hWNME0B/NypIAf4wsIzJysH:I5qi+amoqLVpECQQFE/XmwBO'),
(570, '5', 'norvi', 'Malingin', 'Norvelyn', 'Saome', 'Female', 'norvi@gmail.com', 'sha256:999:yypIoSCA4S0FOrD0SADfyVWJ:4gwx7Kek3PCZeRGjcO5PGFT2'),
(571, '11', 'james', 'Ranido', 'James', 'Lee', 'Male', 'james@gmail.com', 'sha256:999:WweMXafOeSa/BC6ZdBVLsMZN:/wMeJwmgd0KrIsKUNA6Nqpjm'),
(572, '2', 'admin', 'Qteam', 'Team', 'Dynamic', 'Male', 'qteam@gmail.com', 'sha256:999:Z8di22uCPv36pzMDw28iLIg4:yldPK7/KqKrmsrpHscYTQk/s'),
(573, '8', 'john', 'Carvero', 'Lesther', 'Ranido', 'Male', 'john@gmail.com', 'sha256:999:hhrQ2ouu5B5X3oQe6uh9TQVL:nNnNTPGrbrbr97y0BiE5eGL6');

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_occupancy_payment_view`
--
CREATE TABLE IF NOT EXISTS `total_occupancy_payment_view` (
`customer_id` bigint(20)
,`building_permit_number` bigint(20)
,`customer_lastname` varchar(25)
,`customer_firstname` varchar(25)
,`customer_middlename` varchar(25)
,`customer_tin_no` bigint(20)
,`customer_form_of_ownership` varchar(100)
,`customer_address_no` varchar(100)
,`customer_address_street` varchar(255)
,`customer_address_barangay` varchar(255)
,`customer_address_city_or_municipality` varchar(255)
,`customer_tel_no` bigint(20)
,`customer_location_address_no` varchar(100)
,`customer_location_address_street` varchar(255)
,`customer_location_address_barangay` varchar(255)
,`customer_location_address_city_or_municipality` varchar(255)
,`occupancy_type_description` varchar(255)
,`inspection_id` bigint(20)
,`assigned_id_link` bigint(20)
,`inspection_type` varchar(255)
,`scope_of_work` varchar(25)
,`remarks` varchar(25)
,`feedbacks` text
,`payment` double
,`datetime` datetime
,`others` text
,`assigned_id` bigint(20)
,`building_permit_number_link` bigint(20)
,`user_id_link` bigint(20)
,`total_payment` double(19,2)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `user_count_view`
--
CREATE TABLE IF NOT EXISTS `user_count_view` (
`number_of_users` bigint(21)
);
-- --------------------------------------------------------

--
-- Structure for view `total_occupancy_payment_view`
--
DROP TABLE IF EXISTS `total_occupancy_payment_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_occupancy_payment_view` AS select `tbl_customer`.`customer_id` AS `customer_id`,`tbl_customer`.`building_permit_number` AS `building_permit_number`,`tbl_customer`.`customer_lastname` AS `customer_lastname`,`tbl_customer`.`customer_firstname` AS `customer_firstname`,`tbl_customer`.`customer_middlename` AS `customer_middlename`,`tbl_customer`.`customer_tin_no` AS `customer_tin_no`,`tbl_customer`.`customer_form_of_ownership` AS `customer_form_of_ownership`,`tbl_customer`.`customer_address_no` AS `customer_address_no`,`tbl_customer`.`customer_address_street` AS `customer_address_street`,`tbl_customer`.`customer_address_barangay` AS `customer_address_barangay`,`tbl_customer`.`customer_address_city_or_municipality` AS `customer_address_city_or_municipality`,`tbl_customer`.`customer_tel_no` AS `customer_tel_no`,`tbl_customer`.`customer_location_address_no` AS `customer_location_address_no`,`tbl_customer`.`customer_location_address_street` AS `customer_location_address_street`,`tbl_customer`.`customer_location_address_barangay` AS `customer_location_address_barangay`,`tbl_customer`.`customer_location_address_city_or_municipality` AS `customer_location_address_city_or_municipality`,`tbl_customer`.`occupancy_type_description` AS `occupancy_type_description`,`tbl_inspection`.`inspection_id` AS `inspection_id`,`tbl_inspection`.`assigned_id_link` AS `assigned_id_link`,`tbl_inspection`.`inspection_type` AS `inspection_type`,`tbl_inspection`.`scope_of_work` AS `scope_of_work`,`tbl_inspection`.`remarks` AS `remarks`,`tbl_inspection`.`feedbacks` AS `feedbacks`,`tbl_inspection`.`payment` AS `payment`,`tbl_inspection`.`datetime` AS `datetime`,`tbl_inspection`.`others` AS `others`,`tbl_assigned`.`assigned_id` AS `assigned_id`,`tbl_assigned`.`building_permit_number_link` AS `building_permit_number_link`,`tbl_assigned`.`user_id_link` AS `user_id_link`,round(sum(`tbl_inspection`.`payment`),2) AS `total_payment` from (`tbl_customer` join (`tbl_inspection` join `tbl_assigned` on((`tbl_inspection`.`assigned_id_link` = `tbl_assigned`.`assigned_id`))) on((`tbl_assigned`.`building_permit_number_link` = `tbl_customer`.`building_permit_number`))) where (`tbl_inspection`.`scope_of_work` = 'Occupancy Inspection') group by `tbl_customer`.`building_permit_number`;

-- --------------------------------------------------------

--
-- Structure for view `user_count_view`
--
DROP TABLE IF EXISTS `user_count_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_count_view` AS select count(0) AS `number_of_users` from `tbl_users`;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_architectural`
--
ALTER TABLE `tbl_architectural`
  ADD CONSTRAINT `tbl_architectural_ibfk_1` FOREIGN KEY (`archi_inspection_id`) REFERENCES `tbl_inspection` (`inspection_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_assigned`
--
ALTER TABLE `tbl_assigned`
  ADD CONSTRAINT `tbl_assigned_ibfk_1` FOREIGN KEY (`building_permit_number_link`) REFERENCES `tbl_customer` (`building_permit_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_assigned_ibfk_2` FOREIGN KEY (`user_id_link`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_assigned_annual`
--
ALTER TABLE `tbl_assigned_annual`
  ADD CONSTRAINT `tbl_assigned_annual_ibfk_1` FOREIGN KEY (`assigned_annual_occupancy_id_link`) REFERENCES `tbl_customer` (`building_permit_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_assigned_annual_ibfk_2` FOREIGN KEY (`assigned_annual_user_id_link`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_electrical`
--
ALTER TABLE `tbl_electrical`
  ADD CONSTRAINT `tbl_electrical_ibfk_1` FOREIGN KEY (`electrical_inspection_id`) REFERENCES `tbl_inspection` (`inspection_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_electronics`
--
ALTER TABLE `tbl_electronics`
  ADD CONSTRAINT `tbl_electronics_ibfk_1` FOREIGN KEY (`electronics_inspection_id`) REFERENCES `tbl_inspection` (`inspection_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_inspection`
--
ALTER TABLE `tbl_inspection`
  ADD CONSTRAINT `tbl_inspection_ibfk_2` FOREIGN KEY (`assigned_id_link`) REFERENCES `tbl_assigned` (`assigned_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_inspection_area`
--
ALTER TABLE `tbl_inspection_area`
  ADD CONSTRAINT `tbl_inspection_area_ibfk_1` FOREIGN KEY (`inspection_type_id_link`) REFERENCES `tbl_inspection_type` (`inspection_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_mechanical`
--
ALTER TABLE `tbl_mechanical`
  ADD CONSTRAINT `tbl_mechanical_ibfk_1` FOREIGN KEY (`mechanical_inspection_id`) REFERENCES `tbl_inspection` (`inspection_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_occupancy`
--
ALTER TABLE `tbl_occupancy`
  ADD CONSTRAINT `tbl_occupancy_ibfk_1` FOREIGN KEY (`building_permit_number_link`) REFERENCES `tbl_customer` (`building_permit_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_others`
--
ALTER TABLE `tbl_others`
  ADD CONSTRAINT `tbl_others_ibfk_1` FOREIGN KEY (`others_inspection_id`) REFERENCES `tbl_inspection` (`inspection_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_plumbing_or_sanitary`
--
ALTER TABLE `tbl_plumbing_or_sanitary`
  ADD CONSTRAINT `tbl_plumbing_or_sanitary_ibfk_1` FOREIGN KEY (`plumbing_inspection_id`) REFERENCES `tbl_inspection` (`inspection_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_positions`
--
ALTER TABLE `tbl_positions`
  ADD CONSTRAINT `tbl_positions_ibfk_1` FOREIGN KEY (`inspection_type_id_link`) REFERENCES `tbl_inspection_type` (`inspection_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_structural`
--
ALTER TABLE `tbl_structural`
  ADD CONSTRAINT `tbl_structural_ibfk_1` FOREIGN KEY (`structural_inspection_id`) REFERENCES `tbl_inspection` (`inspection_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
