-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2024 at 01:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `precosting`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts_by_user`
--

CREATE TABLE `accounts_by_user` (
  `accuserid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts_by_user`
--

INSERT INTO `accounts_by_user` (`accuserid`) VALUES
('tanvir');

-- --------------------------------------------------------

--
-- Table structure for table `accseason`
--

CREATE TABLE `accseason` (
  `accseasonid` varchar(50) NOT NULL,
  `fid` varchar(50) NOT NULL,
  `accseason` varchar(50) NOT NULL,
  `accdate` date NOT NULL,
  `accyear` year(4) NOT NULL,
  `accstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accseason`
--

INSERT INTO `accseason` (`accseasonid`, `fid`, `accseason`, `accdate`, `accyear`, `accstatus`) VALUES
('20231118045208', 'AFL', 'AFL-2023', '2023-11-18', 2023, 1),
('20231118094351', 'BGL', 'BGL-2023', '2023-11-18', 2023, 1),
('20231118100939', 'BCL', 'BCL-2023', '2023-11-18', 2023, 1);

-- --------------------------------------------------------

--
-- Table structure for table `aoh`
--

CREATE TABLE `aoh` (
  `aohid` varchar(50) NOT NULL,
  `accseasonid` varchar(50) NOT NULL,
  `aoh` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aoh`
--

INSERT INTO `aoh` (`aohid`, `accseasonid`, `aoh`) VALUES
('20231118045451', '20231118045208', 0.0055846),
('20231118094505', '20231118094351', 0.0055846),
('20231118101046', '20231118100939', 0.00369);

-- --------------------------------------------------------

--
-- Table structure for table `approved_by_user`
--

CREATE TABLE `approved_by_user` (
  `appuserid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `approved_by_user`
--

INSERT INTO `approved_by_user` (`appuserid`) VALUES
('reza');

-- --------------------------------------------------------

--
-- Table structure for table `authorized_by_user`
--

CREATE TABLE `authorized_by_user` (
  `authuserid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authorized_by_user`
--

INSERT INTO `authorized_by_user` (`authuserid`) VALUES
('mainuddinauth'),
('shafiur');

-- --------------------------------------------------------

--
-- Table structure for table `bill_disc_commission`
--

CREATE TABLE `bill_disc_commission` (
  `bidiscid` varchar(50) NOT NULL,
  `accseasonid` varchar(50) NOT NULL,
  `buyerid` varchar(50) NOT NULL,
  `commision` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_disc_commission`
--

INSERT INTO `bill_disc_commission` (`bidiscid`, `accseasonid`, `buyerid`, `commision`) VALUES
('20231118094203', '20231118045208', 'GEO', 1.29),
('20231118105512', '20231118094351', 'GEO', 1.29),
('20231118105541', '20231118045208', 'Sai', 1.2),
('20231118105553', '20231118094351', 'Sai', 1.2),
('20231118105612', '20231118045208', 'HNM', 1.15),
('20231118105625', '20231118094351', 'HNM', 1.15),
('20231119053220', '20231118045208', 'TAR', 1.36),
('20231119053235', '20231118094351', 'TAR', 1.36),
('20231119054024', '20231118045208', 'PER', 1),
('20231119054041', '20231118094351', 'PER', 1);

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `buyerid` varchar(3) NOT NULL,
  `buyername` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`buyerid`, `buyername`) VALUES
('BET', 'Betty Barclay'),
('CEL', 'CELIO'),
('ECL', 'E/Classic'),
('GAS', 'GASL(K-MART/MEIJERS)'),
('GEO', 'GEORGE'),
('GER', 'GERRY WEBER(RA INTL)'),
('GMS', 'GMS'),
('HNM', 'H&M'),
('JCR', 'JCRFT-KAZO'),
('JOY', 'JO Y JO'),
('KBT', 'KB Trading'),
('KON', 'KONTOOR'),
('LCW', 'LC WAIKIKI'),
('LIC', 'LI & FUNG(CK)'),
('LIT', 'LI & FUNG(TOMMY)'),
('MAN', 'Mango'),
('MON', 'Monoprix'),
('NEX', 'Next'),
('NIS', 'NISHIMATSUYA'),
('NIT', 'Nitex'),
('PER', 'PERRY ELLIS'),
('POL', 'Polan'),
('PUL', 'Pull & Bear'),
('RAD', 'RADHAMANI'),
('RAI', 'RAINBOW'),
('SAI', 'Sainsbury'),
('SOL', 'S Oliver'),
('SRS', 'Silk Route'),
('TAO', 'Tao'),
('TAR', 'TARGET'),
('TES', 'Tesco'),
('WEA', 'Weatherproof'),
('ZAR', 'Zara');

-- --------------------------------------------------------

--
-- Table structure for table `checked_by_user`
--

CREATE TABLE `checked_by_user` (
  `kamuserid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checked_by_user`
--

INSERT INTO `checked_by_user` (`kamuserid`) VALUES
('mahossain'),
('mainuddin'),
('mmahbub'),
('sohely'),
('suja');

-- --------------------------------------------------------

--
-- Table structure for table `cpm`
--

CREATE TABLE `cpm` (
  `cpmid` varchar(50) NOT NULL,
  `accseasonid` varchar(50) NOT NULL,
  `cpm` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cpm`
--

INSERT INTO `cpm` (`cpmid`, `accseasonid`, `cpm`) VALUES
('20231118045404', '20231118045208', 0.0282078),
('20231118094426', '20231118094351', 0.0282078),
('20231118101025', '20231118100939', 0.02935);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `deptid` int(11) NOT NULL,
  `departmentname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptid`, `departmentname`) VALUES
(1, 'Store'),
(2, 'Fabric'),
(3, 'Accessories'),
(4, 'Fab & Acc'),
(5, 'Marketing'),
(6, 'Accounts');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `desigid` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`desigid`, `designation`) VALUES
(1, 'Manager'),
(2, 'Jr Officer'),
(3, 'Sr. Officer'),
(4, 'Officer'),
(5, 'AGM'),
(6, 'COO'),
(7, 'Asst. Merchandiser'),
(8, 'Merchandiser '),
(9, 'Asst. Manager'),
(10, 'MTO'),
(11, 'Sr. Merchandiser');

-- --------------------------------------------------------

--
-- Table structure for table `directexpense_budget`
--

CREATE TABLE `directexpense_budget` (
  `debid` varchar(50) NOT NULL,
  `debcdate` date NOT NULL,
  `pcid` varchar(50) NOT NULL,
  `directexpenseitemid` varchar(50) NOT NULL,
  `directexpensetypeid` varchar(50) NOT NULL,
  `supplierid` varchar(50) NOT NULL,
  `nomiid` int(11) NOT NULL,
  `deborderqty` float NOT NULL,
  `cad` float NOT NULL,
  `allowance` float NOT NULL,
  `puomid` int(11) NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `directexpense_item`
--

CREATE TABLE `directexpense_item` (
  `directexpenseitemid` int(11) NOT NULL,
  `directexpenseitem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `directexpense_type`
--

CREATE TABLE `directexpense_type` (
  `directexpensetypeid` int(11) NOT NULL,
  `directexpensetype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `embellishment_budget`
--

CREATE TABLE `embellishment_budget` (
  `ebid` varchar(50) NOT NULL,
  `ebcdate` date NOT NULL,
  `pcid` varchar(50) NOT NULL,
  `embellishmentitemid` varchar(50) NOT NULL,
  `embellishmenttypeid` varchar(50) NOT NULL,
  `supplierid` varchar(50) NOT NULL,
  `nomiid` int(11) NOT NULL,
  `eborderqty` float NOT NULL,
  `cad` float NOT NULL,
  `allowance` float NOT NULL,
  `puomid` int(11) NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `embellishment_item`
--

CREATE TABLE `embellishment_item` (
  `embellishmentitemid` int(11) NOT NULL,
  `embellishmentitem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `embellishment_type`
--

CREATE TABLE `embellishment_type` (
  `embellishmenttypeid` int(11) NOT NULL,
  `embellishmenttype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exoh`
--

CREATE TABLE `exoh` (
  `exohid` varchar(50) NOT NULL,
  `accseasonid` varchar(50) NOT NULL,
  `buyerid` varchar(50) NOT NULL,
  `exoh` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exoh`
--

INSERT INTO `exoh` (`exohid`, `accseasonid`, `buyerid`, `exoh`) VALUES
('20231118045637', '20231118045208', 'HNM', 1.95),
('20231118094931', '20231118094351', 'GEO', 1.88),
('20231118094949', '20231118094351', 'HNM', 1.95),
('20231118095105', '20231118094351', 'Sai', 2.16),
('20231118095125', '20231118045208', 'Sai', 2.16),
('20231118095155', '20231118045208', 'GEO', 1.88),
('20231118095324', '20231118045208', 'SOL', 1.93),
('20231118095341', '20231118094351', 'SOL', 1.93),
('20231118095358', '20231118045208', 'Nex', 1.74),
('20231118095411', '20231118094351', 'Nex', 1.74),
('20231118095439', '20231118045208', 'Zar', 2.05),
('20231118095458', '20231118094351', 'Zar', 2.05),
('20231118095616', '20231118045208', 'Bet', 1.83),
('20231118095631', '20231118094351', 'Bet', 1.83),
('20231118101825', '20231118100939', 'Nex', 2.26),
('20231118101914', '20231118100939', 'GEO', 1.86),
('20231119050919', '20231118045208', 'LIC', 2.1),
('20231119050940', '20231118094351', 'LIC', 2.1),
('20231119051006', '20231118045208', 'LIT', 2.32),
('20231119051027', '20231118094351', 'LIT', 2.32),
('20231119051045', '20231118045208', 'CEL', 1.93),
('20231119051120', '20231118094351', 'CEL', 1.93),
('20231119051208', '20231118045208', 'TAR', 1.87),
('20231119051252', '20231118094351', 'TAR', 1.87),
('20231119051317', '20231118045208', 'PER', 1.94),
('20231119051334', '20231118094351', 'PER', 1.94),
('20231119051356', '20231118045208', 'GAS', 2.04),
('20231119051410', '20231118094351', 'GAS', 2.04),
('20231119051432', '20231118045208', 'LCW', 2.03),
('20231119051447', '20231118094351', 'LCW', 2.03),
('20231119051500', '20231118045208', 'GER', 1.88),
('20231119051514', '20231118094351', 'GER', 1.88),
('20231119051537', '20231118045208', 'RAD', 1.75),
('20231119051550', '20231118094351', 'RAD', 1.75),
('20231119051609', '20231118045208', 'RAI', 1.76),
('20231119051627', '20231118094351', 'RAI', 1.76),
('20231119051643', '20231118045208', 'KON', 2.07),
('20231119051656', '20231118094351', 'KON', 2.07),
('20231119051834', '20231118100939', 'JOY', 1.76),
('20231119051901', '20231118100939', 'PER', 1.64),
('20231119051919', '20231118100939', 'GMS', 1.73),
('20231119051942', '20231118100939', 'NIS', 2.34),
('20231119052751', '20231118100939', 'LCW', 1.8),
('20231119053058', '20231118045208', 'NIS', 2.37),
('20231119053113', '20231118094351', 'NIS', 2.37),
('20231119095954', '20231118100939', 'SRS', 1.42),
('20231119100107', '20231118100939', 'POL', 1.95),
('20231119100133', '20231118100939', 'MAN', 1.62),
('20231119100226', '20231118100939', 'NIT', 1.83),
('20231119100247', '20231118100939', 'KBT', 4.23),
('20231119100300', '20231118100939', 'JCR', 1.71);

-- --------------------------------------------------------

--
-- Table structure for table `fabric_budget`
--

CREATE TABLE `fabric_budget` (
  `fbid` varchar(50) NOT NULL,
  `fbcdate` date NOT NULL,
  `pcid` varchar(50) NOT NULL,
  `fabricitemid` varchar(50) NOT NULL,
  `fabrictypeid` varchar(50) NOT NULL,
  `supplierid` varchar(50) NOT NULL,
  `nomiid` int(11) NOT NULL,
  `fborderqty` float NOT NULL,
  `cad` float NOT NULL,
  `allowance` float NOT NULL,
  `puomid` int(11) NOT NULL,
  `rate` float NOT NULL,
  `fbtb` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fabric_item`
--

CREATE TABLE `fabric_item` (
  `fabricitemid` int(11) NOT NULL,
  `fabricitem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fabric_part`
--

CREATE TABLE `fabric_part` (
  `fabricpartid` int(11) NOT NULL,
  `fabricpart` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fabric_part`
--

INSERT INTO `fabric_part` (`fabricpartid`, `fabricpart`) VALUES
(1, 'Body Part'),
(2, 'RIB'),
(3, 'Collar cuff'),
(4, 'S/jersey');

-- --------------------------------------------------------

--
-- Table structure for table `fabric_type`
--

CREATE TABLE `fabric_type` (
  `fabrictypeid` int(11) NOT NULL,
  `fabrictype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `factory`
--

CREATE TABLE `factory` (
  `factoryid` varchar(50) NOT NULL,
  `factoryname` varchar(50) NOT NULL,
  `factory_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `factory`
--

INSERT INTO `factory` (`factoryid`, `factoryname`, `factory_address`) VALUES
('AFL', 'Aboni Fashion Ltd', 'Hemayetpur'),
('AKL', 'AKL', 'Hemayetpur'),
('BCL', 'Babylon Casualwear ltd', 'Hemayetpur'),
('BGL', 'Babylon Garments', 'Mirpur');

-- --------------------------------------------------------

--
-- Table structure for table `garments_type`
--

CREATE TABLE `garments_type` (
  `garmentstypeid` int(11) NOT NULL,
  `garmentstype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `garments_type`
--

INSERT INTO `garments_type` (`garmentstypeid`, `garmentstype`) VALUES
(1, 'Boys'),
(2, 'Girls'),
(3, 'Ladies'),
(4, 'MENS');

-- --------------------------------------------------------

--
-- Table structure for table `ie_analysis`
--

CREATE TABLE `ie_analysis` (
  `ieaid` varchar(50) NOT NULL,
  `iecdate` date NOT NULL,
  `pcid` varchar(50) NOT NULL,
  `productiontypeid` varchar(50) NOT NULL,
  `man` varchar(50) NOT NULL,
  `machine` float NOT NULL,
  `ph` float NOT NULL,
  `sm` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `imoh`
--

CREATE TABLE `imoh` (
  `imohid` varchar(50) NOT NULL,
  `accseasonid` varchar(50) NOT NULL,
  `stiid` varchar(50) NOT NULL,
  `imoh` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imoh`
--

INSERT INTO `imoh` (`imohid`, `accseasonid`, `stiid`, `imoh`) VALUES
('20231118094119', '20231118045208', '20230413110659', 2.01),
('20231118094137', '20231118045208', '20230413110653', 0.4),
('20231118094737', '20231118094351', '20230413110659', 2.01),
('20231118094749', '20231118094351', '20230413110653', 0.4),
('20231119052901', '20231118100939', '20230413110659', 2.01),
('20231119052912', '20231118100939', '20230413110653', 0.4);

-- --------------------------------------------------------

--
-- Stand-in structure for view `imoh_foreign`
-- (See below for the actual view)
--
CREATE TABLE `imoh_foreign` (
`imohid` varchar(50)
,`accseasonid` varchar(50)
,`stiid` varchar(50)
,`imoh` float
,`suppliertype` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `imoh_local`
-- (See below for the actual view)
--
CREATE TABLE `imoh_local` (
`imohid` varchar(50)
,`accseasonid` varchar(50)
,`stiid` varchar(50)
,`imohl` float
,`suppliertype` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `interestrate`
--

CREATE TABLE `interestrate` (
  `inrateid` varchar(50) NOT NULL,
  `accseasonid` varchar(50) NOT NULL,
  `intrate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interestrate`
--

INSERT INTO `interestrate` (`inrateid`, `accseasonid`, `intrate`) VALUES
('20231118102019', '20231118045208', 9),
('20231118102024', '20231118094351', 9),
('20231118102031', '20231118100939', 9);

-- --------------------------------------------------------

--
-- Table structure for table `jobno_format`
--

CREATE TABLE `jobno_format` (
  `jobnoformatid` varchar(50) NOT NULL,
  `orderforid` varchar(2) NOT NULL,
  `buyerid` varchar(50) NOT NULL,
  `jobyear` year(4) NOT NULL,
  `orderseasonid` varchar(2) NOT NULL,
  `jobnum` int(11) NOT NULL,
  `jobno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nomination`
--

CREATE TABLE `nomination` (
  `nomiid` int(11) NOT NULL,
  `nominame` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nomination`
--

INSERT INTO `nomination` (`nomiid`, `nominame`) VALUES
(1, 'Nominated'),
(2, 'Non-Nominated');

-- --------------------------------------------------------

--
-- Table structure for table `orderfor_insert`
--

CREATE TABLE `orderfor_insert` (
  `orderforid` varchar(1) NOT NULL,
  `orderfor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderfor_insert`
--

INSERT INTO `orderfor_insert` (`orderforid`, `orderfor`) VALUES
('B', 'Woven Bottom'),
('T', 'Woven Top');

-- --------------------------------------------------------

--
-- Table structure for table `orderseason_insert`
--

CREATE TABLE `orderseason_insert` (
  `orderseasonid` varchar(2) NOT NULL,
  `orderseason` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderseason_insert`
--

INSERT INTO `orderseason_insert` (`orderseasonid`, `orderseason`) VALUES
('AW', 'Autumn Winter'),
('SS', 'Spring Summer');

-- --------------------------------------------------------

--
-- Table structure for table `precost_insert`
--

CREATE TABLE `precost_insert` (
  `pcid` varchar(50) NOT NULL,
  `orderforid` varchar(1) NOT NULL,
  `jobno` varchar(50) NOT NULL,
  `pcdate` date NOT NULL,
  `buyerid` varchar(50) NOT NULL,
  `styleid` varchar(50) NOT NULL,
  `lc` varchar(50) NOT NULL,
  `mlc` varchar(50) NOT NULL,
  `accseasonid` varchar(50) NOT NULL,
  `oqty` int(11) NOT NULL,
  `fpc` float NOT NULL,
  `cmdz` float NOT NULL,
  `dmlc` int(11) NOT NULL,
  `finhdate` date NOT NULL,
  `prdate` date NOT NULL,
  `fsdate` date NOT NULL,
  `btp` int(11) NOT NULL,
  `garmentstypeid` int(11) NOT NULL,
  `orderseasonid` varchar(2) NOT NULL,
  `sample_file` varchar(100) NOT NULL,
  `bf` int(11) NOT NULL,
  `bt` int(11) NOT NULL,
  `be` int(11) NOT NULL,
  `bde` int(11) NOT NULL,
  `ie` int(11) NOT NULL,
  `confirm_status` int(11) NOT NULL,
  `ship_status` int(11) NOT NULL,
  `puserid` varchar(20) NOT NULL,
  `pkamuserid` varchar(20) NOT NULL,
  `pauthuserid` varchar(20) NOT NULL,
  `pappuserid` varchar(20) NOT NULL,
  `paccuserid` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `kamname` varchar(100) NOT NULL,
  `authname` varchar(100) NOT NULL,
  `appname` varchar(100) NOT NULL,
  `accname` varchar(100) NOT NULL,
  `pcmonth` varchar(100) NOT NULL,
  `pcyear` year(4) NOT NULL,
  `comments` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `production_type`
--

CREATE TABLE `production_type` (
  `productiontypeid` varchar(50) NOT NULL,
  `productiontype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `production_type`
--

INSERT INTO `production_type` (`productiontypeid`, `productiontype`) VALUES
('20230513072735', 'Cutting'),
('20230513072749', 'Sewing'),
('20230513072810', 'Finishing');

-- --------------------------------------------------------

--
-- Table structure for table `product_uom_insert`
--

CREATE TABLE `product_uom_insert` (
  `puomid` int(11) NOT NULL,
  `puom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_uom_insert`
--

INSERT INTO `product_uom_insert` (`puomid`, `puom`) VALUES
(1, 'KG'),
(2, 'Meter'),
(3, 'pcs'),
(4, 'Yds'),
(5, 'Cone'),
(6, 'DZN'),
(7, 'Gross');

-- --------------------------------------------------------

--
-- Table structure for table `style`
--

CREATE TABLE `style` (
  `styleid` varchar(50) NOT NULL,
  `stylename` varchar(50) NOT NULL,
  `buyerid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplierid` varchar(50) NOT NULL,
  `stiid` varchar(50) NOT NULL,
  `supplier` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierid`, `stiid`, `supplier`) VALUES
('20230716063515', '20230413110653', 'RM/Etasia/OTL'),
('20230716063533', '20230413110653', 'NASSA /APEX/Aman/Coats'),
('20230716063545', '20230413110653', 'MAHEEN '),
('20230716063600', '20230413110653', 'CHECKPOINT/SML'),
('20230716063613', '20230413110653', 'Impress /Dekko /Uniglory'),
('20230716063629', '20230413110653', 'Nahid Plastic'),
('20230716063642', '20230413110653', 'BTL'),
('20230716063656', '20230413110653', 'UNIGLORY/BTL'),
('20230716063706', '20230413110653', 'UNIGLORY'),
('20230716063717', '20230413110653', 'MCDry'),
('20230820083900', '20230413110659', 'AMGT'),
('20230925130726', '20230413110653', 'Pioneer Denim Ltd'),
('20230925131939', '20230413110653', 'Unitex'),
('20230925131958', '20230413110653', 'M & U'),
('20230925132012', '20230413110653', 'Babylon Trims ltd'),
('20230925132034', '20230413110653', 'Desh Trims ltd'),
('20230925132044', '20230413110659', 'M Y Union'),
('20230925132055', '20230413110653', 'Coats Bangladesh ltd'),
('20230925132108', '20230413110653', 'Checkpoint systems ltd'),
('20230925132155', '20230413110653', 'Babylon Washing ltd'),
('20230928072101', '20230413110659', 'RONG HENG TEXTILE'),
('20230928073017', '20230413110659', 'WENDLER-FOREIGN'),
('20230928073054', '20230413110653', 'ORIENT BUTTON-LOCAL'),
('20230928073129', '20230413110653', 'CHECKPOINT-LOCAL'),
('20230928073208', '20230413110653', 'BRITANNIA-LOCAL'),
('20230928073334', '20230413110653', 'PACKMAN-LOCAL'),
('20230928073557', '20230413110653', 'NOWRIN TEX-LOCAL'),
('20231003161443', '20230413110659', 'XINLIDA GROUP-TIE SUPPLIER'),
('20231007122730', '20230413110653', 'Mahmud Denim Ltd');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_type`
--

CREATE TABLE `supplier_type` (
  `stiid` varchar(50) NOT NULL,
  `suppliertype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_type`
--

INSERT INTO `supplier_type` (`stiid`, `suppliertype`) VALUES
('20230413110653', 'Local'),
('20230413110659', 'Foreign');

-- --------------------------------------------------------

--
-- Stand-in structure for view `supplier_view`
-- (See below for the actual view)
--
CREATE TABLE `supplier_view` (
`stiid` varchar(50)
,`suppliertype` varchar(50)
,`supplierid` varchar(50)
,`supplier` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `trims_budget`
--

CREATE TABLE `trims_budget` (
  `tbid` varchar(50) NOT NULL,
  `tbcdate` date NOT NULL,
  `pcid` varchar(50) NOT NULL,
  `trimsitemid` varchar(50) NOT NULL,
  `trimstypeid` varchar(50) NOT NULL,
  `supplierid` varchar(50) NOT NULL,
  `nomiid` int(11) NOT NULL,
  `tborderqty` float NOT NULL,
  `cad` float NOT NULL,
  `allowance` float NOT NULL,
  `puomid` int(11) NOT NULL,
  `rate` float NOT NULL,
  `tbtb` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trims_item`
--

CREATE TABLE `trims_item` (
  `trimsitemid` int(11) NOT NULL,
  `trimsitem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trims_item`
--

INSERT INTO `trims_item` (`trimsitemid`, `trimsitem`) VALUES
(1, 'White Interlining T/C FUSE'),
(2, 'Charcola Interlining T/C FUSE'),
(3, 'Thread 20/2'),
(4, 'MAIN LABEL  HM18560'),
(5, 'Interlining'),
(6, 'Main Label'),
(7, 'Care label'),
(8, 'Caution label'),
(9, 'String'),
(10, 'Price tag'),
(11, 'Fire label'),
(12, 'Size sticker'),
(13, 'Garment dye tag'),
(14, 'Waist tag'),
(15, 'Poly'),
(16, 'Back board'),
(17, 'Carton'),
(18, 'Cord'),
(19, 'Stopper'),
(20, 'Thread'),
(21, 'RFID care label'),
(22, 'Others'),
(23, 'Gross grain tape'),
(24, 'Elastic'),
(25, 'Adjustable Elastic'),
(26, 'Clear button'),
(27, 'Zipper'),
(28, 'HANGER LOZENGE MC1'),
(29, 'SWING TICKET/ SU-/ 1 pc/pk'),
(30, 'BOX END LABEL'),
(31, 'Stay white sticker 1 pc'),
(32, 'POLYBAG+SBTCP'),
(33, 'BUTTON'),
(34, 'THREAD-50/2'),
(35, 'TACRE-Main labe/1pc'),
(36, 'Logo label/TCSP/1pc'),
(37, 'HANGER LOZENGE'),
(38, 'SWING TICKET'),
(39, 'NECK BOARD'),
(40, 'PLASTIC COLLAR INSERT'),
(41, 'TIE BUTTER FLY'),
(42, 'M-CLIP'),
(43, 'TEETCH CLIP'),
(44, 'COLLAR BONE'),
(45, 'GUM TAPE '),
(46, 'CARTON-GCX1 '),
(47, 'TRANSPARENT STICKER'),
(48, 'TIE CLIP'),
(49, 'IE tissue paper/ 1pc per gmt'),
(50, 'TIE');

-- --------------------------------------------------------

--
-- Table structure for table `trims_type`
--

CREATE TABLE `trims_type` (
  `trimstypeid` int(11) NOT NULL,
  `trimstype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trims_type`
--

INSERT INTO `trims_type` (`trimstypeid`, `trimstype`) VALUES
(3, 'WLZKBBC001'),
(4, 'CLZCALL027'),
(5, 'MRZCALL006'),
(6, 'HPZKBBC001'),
(7, 'WLZKACC008'),
(8, 'BACK BOARD'),
(9, 'NECK BOARD'),
(10, 'PLASTIC COLLAR INSERT'),
(11, 'TIE BUTTER FLY'),
(12, 'M-CLIP'),
(13, 'TEETCH CLIP'),
(14, 'COLLAR BONE'),
(15, 'GUM TAPE '),
(16, 'CARTON-GCX1'),
(17, 'TRANSPARENT STICKER'),
(18, 'TIE CLIP'),
(19, 'TIE tissue paper/ 1pc per gmt'),
(20, 'POLYBAG+SBTCP'),
(21, 'Stay white sticker 1 pc'),
(22, 'BOX END LABEL'),
(23, 'SWING TICKET/ SU-/ 1 pc/pk'),
(24, 'HANGER LOZENGE MC1'),
(25, 'Logo label/TCSP/1pc'),
(26, 'TACRE-Main labe/1pc');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `factoryid` varchar(50) NOT NULL,
  `departmentid` int(11) NOT NULL,
  `designationid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `kamuserid` varchar(50) NOT NULL,
  `authuserid` varchar(50) NOT NULL,
  `appuserid` varchar(50) NOT NULL,
  `accuserid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ustatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`factoryid`, `departmentid`, `designationid`, `name`, `email`, `mobile`, `user_type`, `userid`, `kamuserid`, `authuserid`, `appuserid`, `accuserid`, `password`, `ustatus`) VALUES
('BCL', 5, 8, 'Abu Huzaifa', 'abuhuzaifa@babylon-bd.com', '', '2', 'abuhuzaifa', 'mainuddin', 'mainuddinauth', 'reza', 'tanvir', 'abuhuzaifa123456', '1'),
('BCL', 5, 10, 'Arzu', 'arzu@babylon-bd.com', '', '2', 'arzu', 'mahossain', 'mainuddinauth', 'reza', 'tanvir', 'arzu123456', '1'),
('BGL', 5, 10, 'Badhan', 'badhan@babylon-bd.com', '', '2', 'badhan', 'suja', 'shafiur', 'reza', 'tanvir', 'badhan123456', '1'),
('BCL', 5, 7, 'Hafizul', 'hafizulmkt@babylon-bd.com', '', '2', 'hafizulmkt', 'mahossain', 'mainuddinauth', 'reza', 'tanvir', 'hafizulmkt123456', '1'),
('BCL', 5, 7, 'Hemon', 'hemon@babylon-bd.com', '', '2', 'hemon', 'mahossain', 'mainuddinauth', 'reza', 'tanvir', 'hemon123456', '1'),
('HO', 0, 0, 'MD. Mushfequr Rahman', '', '', '1', 'HO926', '', '', '', '', 'adhoc', '1'),
('BGL', 5, 10, 'Imtiaj', 'imtiaj@babylon-bd.com', '', '2', 'imtiaj', 'mmahbub', 'shafiur', 'reza', 'tanvir', 'imtiaj123456', '1'),
('BGL', 5, 7, 'Jatmay', 'jatmay@babylon-bd.com', '', '2', 'jatmay', 'mmahbub', 'shafiur', 'reza', 'tanvir', 'jatmay123456', '1'),
('BCL', 5, 11, 'Kamrul', 'kamrul@babylon-bd.com', '', '2', 'kamrul', 'mainuddin', 'mainuddinauth', 'reza', 'tanvir', 'kamrul123456', '1'),
('BGL', 5, 7, 'Kawsar', 'kawsarmkt@babylon-bd.com', '', '2', 'kawsarmkt', 'mmahbub', 'shafiur', 'reza', 'tanvir', 'kawsarmkt123456', '1'),
('BCL', 5, 7, 'Khadiza', 'khadiza@babylon-bd.com', '', '2', 'khadiza', 'mainuddin', 'mainuddinauth', 'reza', 'tanvir', 'khadiza123456', '1'),
('BCL', 5, 1, 'Alamin Hossain', 'mahossain@babylon-bd.com', '', '4', 'mahossain', 'mahossain', 'mainuddinauth', 'reza', 'tanvir', 'mahossain123456', '1'),
('BCL', 5, 5, 'Mainuddin', 'mainuddin@babylon-bd.com', '', '4', 'mainuddin', 'mainuddin', 'mainuddinauth', 'reza', 'tanvir', 'mainuddin123456', '1'),
('BCL', 5, 5, 'Mainuddin', 'mainuddin@babylon-bd.com', '', '5', 'mainuddinauth', '', '', '', '', 'mainuddinauth123456', '1'),
('BCL', 5, 7, 'Maruf', 'mdmaruf@babylon-bd.com', '', '2', 'mdmaruf@babylon-bd.com', 'mainuddin', 'mainuddinauth', 'reza', 'tanvir', 'mdmaruf123456', '1'),
('BCL', 5, 7, 'Mehedi', 'mehedimkt@babylon-bd.com', '', '2', 'mehedimkt', 'mainuddin', 'mainuddinauth', 'reza', 'tanvir', 'mehedimkt123456', '1'),
('BCL', 5, 8, 'Milton', 'miltonmkt@babylon-bd.com', '', '2', 'miltonmkt', 'mainuddin', 'mainuddinauth', 'reza', 'tanvir', 'miltonmkt123456', '1'),
('BGL', 5, 7, 'Minhaz', 'minhaz@babylon-bd.com', '', '2', 'minhaz', 'sohely', 'shafiur', 'reza', 'tanvir', 'minhaz123456', '1'),
('BGL', 5, 1, 'Mahbub', 'mmahbub@babylon-bd.com', '', '4', 'mmahbub', 'mmahbub', 'shafiur', 'reza', 'tanvir', 'mmahbub123456', '1'),
('BCL', 5, 8, 'Mosiur', 'mosiurmkt@babylon-bd.com', '', '2', 'mosiurmkt', 'mainuddin', 'mainuddinauth', 'reza', 'tanvir', 'mosiurmkt123456', '1'),
('BCL', 5, 8, 'Nafia', 'nafia@babylon-bd.com', '', '2', 'nafia', 'mahossain', 'mainuddinauth', 'reza', 'tanvir', 'nafia123456', '1'),
('BCL', 5, 7, 'Naser', 'nasermkt@babylon-bd.com', '', '2', 'nasermkt', 'mainuddin', 'mainuddinauth', 'reza', 'tanvir', 'nasermkt123456', '1'),
('BCL', 5, 8, 'Nayeem', 'nayeem@babylon-bd.com', '', '2', 'nayeem', 'mahossain', 'mainuddinauth', 'reza', 'tanvir', 'nayeem123456', '1'),
('BCL', 5, 8, 'Nazmul', 'nazmulmkt@babylon-bd.com', '', '2', 'nazmulmkt', 'mahossain', 'mainuddinauth', 'reza', 'tanvir', 'nazmulmkt123456', '1'),
('BGL', 5, 10, 'Neeaz', 'neeaz@babylon-bd.com', '', '2', 'neeaz', 'mmahbub', 'shafiur', 'reza', 'tanvir', 'neeaz123456', '1'),
('BGL', 5, 7, 'Niloy', 'niloymkt@babylon-bd.com', '', '2', 'niloymkt', 'sohely', 'shafiur', 'reza', 'tanvir', 'niloymkt123456', '1'),
('BCL', 5, 8, 'Rasel', 'raselmkt@babylon-bd.com', '', '2', 'raselmkt', 'mainuddin', 'mainuddinauth', 'reza', 'tanvir', 'raselmkt123456', '1'),
('BCL', 5, 7, 'Rejaul', 'rejaul@babylon-bd.com', '', '2', 'rejaul', 'mahossain', 'mainuddinauth', 'reza', 'tanvir', 'rejaul123456', '1'),
('BGL', 5, 6, 'Reza', 'reza@babylon-bd.com', '', '6', 'reza', '', '', 'reza', '', 'reza123456', '1'),
('BGL', 5, 11, 'Riad', 'riadmkt@babylon-bd.com', '', '2', 'riadmkt', 'mmahbub', 'shafiur', 'reza', 'tanvir', 'riadmkt123456', '1'),
('BCL', 5, 7, 'Ripon', 'ripon@babylon-bd.com', '', '2', 'ripon', 'mainuddin', 'mainuddinauth', 'reza', 'tanvir', 'ripon123456', '1'),
('BCL', 5, 9, 'Riyad', 'riyad@babylon-bd.com', '', '2', 'riyad', 'mainuddin', 'mainuddinauth', 'reza', 'tanvir', 'riyad123456', '1'),
('BGL', 5, 7, 'Saadjill', 'saadjill@babylon-bd.com', '', '2', 'saadjill@babylon-bd.com', 'sohely', 'shafiur', 'reza', 'tanvir', 'saadjill123456', '1'),
('BGL', 5, 7, 'Sadia', 'sadia@babylon-bd.com', '', '2', 'sadia', 'suja', 'shafiur', 'reza', 'tanvir', 'sadia123456', '1'),
('BCL', 5, 7, 'Sayid', 'sayid@babylon-bd.com', '', '2', 'sayid', 'mainuddin', 'mainuddinauth', 'reza', 'tanvir', 'sayid123456', '1'),
('BGL', 5, 5, 'Shafiur', 'shafiur@babylon-bd.com', '', '5', 'shafiur', '', '', '', '', 'shafiur123456', '1'),
('BGL', 5, 8, 'Shahnewaz', 'shahnewaz@babylon-bd.com', '', '2', 'shahnewaz', 'suja', 'shafiur', 'reza', 'tanvir', 'shahnewaz123456', '1'),
('BGL', 5, 10, 'Shakil', 'shakilmkt@babylon-bd.com', '', '2', 'shakilmkt', 'sohely', 'shafiur', 'reza', 'tanvir', 'shakilmkt123456', '1'),
('BGL', 5, 7, 'Shawon', 'shawonmkt@babylon-bd.com', '', '2', 'shawonmkt', 'mmahbub', 'shafiur', 'reza', 'tanvir', 'shawonmkt123456', '1'),
('BGL', 5, 11, 'Shibly', 'shibly@babylon-bd.com', '', '2', 'shibly', 'sohely', 'shafiur', 'reza', 'tanvir', 'shibly123456', '1'),
('BGL', 5, 10, 'Shihab', 'shihab@babylon-bd.com', '', '2', 'shihab', 'mmahbub', 'shafiur', 'reza', 'tanvir', 'shihab123456', '1'),
('BGL', 5, 7, 'Sabbir', 'shsabbir@babylon-bd.com', '', '2', 'shsabbir', 'mmahbub', 'shafiur', 'reza', 'tanvir', 'shsabbir123456', '1'),
('BGL', 5, 7, 'Siddiqi', 'siddiqi@babylon-bd.com', '', '2', 'siddiqi', 'suja', 'shafiur', 'reza', 'tanvir', 'siddiqi123456', '1'),
('BGL', 5, 1, 'Sohely', 'sohely@babylon-bd.com', '', '4', 'sohely', 'sohely', 'shafiur', 'reza', 'tanvir', 'sohely123456', '1'),
('BGL', 5, 1, 'Suja', 'suja@babylon-bd.com', '', '4', 'suja', 'suja', 'shafiur', 'reza', 'tanvir', 'suja123456', '1'),
('BGL', 5, 9, 'Sujon', 'sujon@babylon-bd.com', '', '2', 'sujon', 'suja', 'shafiur', 'reza', 'tanvir', 'sujon123456', '1'),
('BGL', 5, 7, 'Supto', 'supto@babylon-bd.com', '', '2', 'supto', 'sohely', 'shafiur', 'reza', 'tanvir', 'supto123456', '1'),
('BGL', 6, 1, 'Tanvir', 'tanvir@babylon-bd.com', '', '3', 'tanvir', '', '', '', '', 'tanvir123456', '1'),
('BCL', 5, 11, 'Tariq', 'tariqmkt@babylon-bd.com', '', '2', 'tariqmkt', 'mainuddin', 'mainuddinauth', 'reza', 'tanvir', 'tariqmkt123456', '1'),
('BGL', 5, 8, 'Tariqur', 'tariqur@babylon-bd.com', '', '2', 'tariqur', 'suja', 'shafiur', 'reza', 'tanvir', 'tariqur123456', '1'),
('BGL', 5, 8, 'Teon', 'teon@babylon-bd.com', '', '2', 'teon', 'sohely', 'shafiur', 'reza', 'tanvir', 'teon123456', '1'),
('BGL', 5, 11, 'Ahsan', 'tmahsan@babylon-bd.com', '', '2', 'tmahsan', 'sohely', 'shafiur', 'reza', 'tanvir', 'tmahsan123456', '1'),
('BGL', 5, 8, 'Tonoy', 'tonoy@babylon-bd.com', '', '2', 'tonoy', 'suja', 'shafiur', 'reza', 'tanvir', 'tonoy123456', '1'),
('BCL', 5, 9, 'Torikul', 'torikul@babylon-bd.com', '', '2', 'torikul', 'mahossain', 'mainuddinauth', 'reza', 'tanvir', 'torikul123456', '1'),
('BGL', 5, 8, 'Tumpa', 'tumpa@babylon-bd.com', '', '2', 'tumpa', 'sohely', 'shafiur', 'reza', 'tanvir', 'tumpa123456', '1'),
('BCL', 5, 9, 'Yusuf', 'yusuf@babylon-bd.com', '', '2', 'yusuf', 'mahossain', 'mainuddinauth', 'reza', 'tanvir', 'yusuf123456', '1');

-- --------------------------------------------------------

--
-- Table structure for table `userstatus`
--

CREATE TABLE `userstatus` (
  `userstatusid` int(11) NOT NULL,
  `userstatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userstatus`
--

INSERT INTO `userstatus` (`userstatusid`, `userstatus`) VALUES
(1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `usertypeid` int(11) NOT NULL,
  `usertype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`usertypeid`, `usertype`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Accounts'),
(4, 'KAM'),
(5, 'Authorized'),
(6, 'Approved');

-- --------------------------------------------------------

--
-- Structure for view `imoh_foreign`
--
DROP TABLE IF EXISTS `imoh_foreign`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `imoh_foreign`  AS  select `imoh`.`imohid` AS `imohid`,`imoh`.`accseasonid` AS `accseasonid`,`imoh`.`stiid` AS `stiid`,`imoh`.`imoh` AS `imoh`,`supplier_type`.`suppliertype` AS `suppliertype` from (`imoh` join `supplier_type` on(`supplier_type`.`stiid` = `imoh`.`stiid`)) where `imoh`.`stiid` = '20230413110659' ;

-- --------------------------------------------------------

--
-- Structure for view `imoh_local`
--
DROP TABLE IF EXISTS `imoh_local`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `imoh_local`  AS  select `imoh`.`imohid` AS `imohid`,`imoh`.`accseasonid` AS `accseasonid`,`imoh`.`stiid` AS `stiid`,`imoh`.`imoh` AS `imohl`,`supplier_type`.`suppliertype` AS `suppliertype` from (`imoh` join `supplier_type` on(`supplier_type`.`stiid` = `imoh`.`stiid`)) where `imoh`.`stiid` = '20230413110653' ;

-- --------------------------------------------------------

--
-- Structure for view `supplier_view`
--
DROP TABLE IF EXISTS `supplier_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `supplier_view`  AS  select `supplier_type`.`stiid` AS `stiid`,`supplier_type`.`suppliertype` AS `suppliertype`,`supplier`.`supplierid` AS `supplierid`,`supplier`.`supplier` AS `supplier` from (`supplier` join `supplier_type` on(`supplier_type`.`stiid` = `supplier`.`stiid`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_by_user`
--
ALTER TABLE `accounts_by_user`
  ADD PRIMARY KEY (`accuserid`) USING BTREE;

--
-- Indexes for table `accseason`
--
ALTER TABLE `accseason`
  ADD PRIMARY KEY (`accseasonid`);

--
-- Indexes for table `aoh`
--
ALTER TABLE `aoh`
  ADD PRIMARY KEY (`aohid`);

--
-- Indexes for table `approved_by_user`
--
ALTER TABLE `approved_by_user`
  ADD PRIMARY KEY (`appuserid`);

--
-- Indexes for table `authorized_by_user`
--
ALTER TABLE `authorized_by_user`
  ADD PRIMARY KEY (`authuserid`);

--
-- Indexes for table `bill_disc_commission`
--
ALTER TABLE `bill_disc_commission`
  ADD PRIMARY KEY (`bidiscid`) USING BTREE;

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`buyerid`);

--
-- Indexes for table `checked_by_user`
--
ALTER TABLE `checked_by_user`
  ADD PRIMARY KEY (`kamuserid`);

--
-- Indexes for table `cpm`
--
ALTER TABLE `cpm`
  ADD PRIMARY KEY (`cpmid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`deptid`) USING BTREE;

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`desigid`) USING BTREE;

--
-- Indexes for table `directexpense_budget`
--
ALTER TABLE `directexpense_budget`
  ADD PRIMARY KEY (`debid`) USING BTREE;

--
-- Indexes for table `directexpense_item`
--
ALTER TABLE `directexpense_item`
  ADD PRIMARY KEY (`directexpenseitemid`) USING BTREE;

--
-- Indexes for table `directexpense_type`
--
ALTER TABLE `directexpense_type`
  ADD PRIMARY KEY (`directexpensetypeid`) USING BTREE;

--
-- Indexes for table `embellishment_budget`
--
ALTER TABLE `embellishment_budget`
  ADD PRIMARY KEY (`ebid`) USING BTREE;

--
-- Indexes for table `embellishment_item`
--
ALTER TABLE `embellishment_item`
  ADD PRIMARY KEY (`embellishmentitemid`) USING BTREE;

--
-- Indexes for table `embellishment_type`
--
ALTER TABLE `embellishment_type`
  ADD PRIMARY KEY (`embellishmenttypeid`) USING BTREE;

--
-- Indexes for table `exoh`
--
ALTER TABLE `exoh`
  ADD PRIMARY KEY (`exohid`);

--
-- Indexes for table `fabric_budget`
--
ALTER TABLE `fabric_budget`
  ADD PRIMARY KEY (`fbid`);

--
-- Indexes for table `fabric_item`
--
ALTER TABLE `fabric_item`
  ADD PRIMARY KEY (`fabricitemid`) USING BTREE;

--
-- Indexes for table `fabric_part`
--
ALTER TABLE `fabric_part`
  ADD PRIMARY KEY (`fabricpartid`) USING BTREE;

--
-- Indexes for table `fabric_type`
--
ALTER TABLE `fabric_type`
  ADD PRIMARY KEY (`fabrictypeid`);

--
-- Indexes for table `factory`
--
ALTER TABLE `factory`
  ADD PRIMARY KEY (`factoryid`) USING BTREE;

--
-- Indexes for table `garments_type`
--
ALTER TABLE `garments_type`
  ADD PRIMARY KEY (`garmentstypeid`) USING BTREE;

--
-- Indexes for table `ie_analysis`
--
ALTER TABLE `ie_analysis`
  ADD PRIMARY KEY (`ieaid`) USING BTREE;

--
-- Indexes for table `imoh`
--
ALTER TABLE `imoh`
  ADD PRIMARY KEY (`imohid`);

--
-- Indexes for table `interestrate`
--
ALTER TABLE `interestrate`
  ADD PRIMARY KEY (`inrateid`);

--
-- Indexes for table `jobno_format`
--
ALTER TABLE `jobno_format`
  ADD PRIMARY KEY (`jobnoformatid`);

--
-- Indexes for table `nomination`
--
ALTER TABLE `nomination`
  ADD PRIMARY KEY (`nomiid`);

--
-- Indexes for table `orderfor_insert`
--
ALTER TABLE `orderfor_insert`
  ADD PRIMARY KEY (`orderforid`);

--
-- Indexes for table `orderseason_insert`
--
ALTER TABLE `orderseason_insert`
  ADD PRIMARY KEY (`orderseasonid`);

--
-- Indexes for table `precost_insert`
--
ALTER TABLE `precost_insert`
  ADD PRIMARY KEY (`pcid`);

--
-- Indexes for table `production_type`
--
ALTER TABLE `production_type`
  ADD PRIMARY KEY (`productiontypeid`);

--
-- Indexes for table `product_uom_insert`
--
ALTER TABLE `product_uom_insert`
  ADD PRIMARY KEY (`puomid`);

--
-- Indexes for table `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`styleid`) USING BTREE;

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierid`) USING BTREE;

--
-- Indexes for table `supplier_type`
--
ALTER TABLE `supplier_type`
  ADD PRIMARY KEY (`stiid`) USING BTREE;

--
-- Indexes for table `trims_budget`
--
ALTER TABLE `trims_budget`
  ADD PRIMARY KEY (`tbid`) USING BTREE;

--
-- Indexes for table `trims_item`
--
ALTER TABLE `trims_item`
  ADD PRIMARY KEY (`trimsitemid`) USING BTREE;

--
-- Indexes for table `trims_type`
--
ALTER TABLE `trims_type`
  ADD PRIMARY KEY (`trimstypeid`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`) USING BTREE;

--
-- Indexes for table `userstatus`
--
ALTER TABLE `userstatus`
  ADD PRIMARY KEY (`userstatusid`) USING BTREE;

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`usertypeid`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `deptid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `desigid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `directexpense_item`
--
ALTER TABLE `directexpense_item`
  MODIFY `directexpenseitemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `directexpense_type`
--
ALTER TABLE `directexpense_type`
  MODIFY `directexpensetypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `embellishment_item`
--
ALTER TABLE `embellishment_item`
  MODIFY `embellishmentitemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `embellishment_type`
--
ALTER TABLE `embellishment_type`
  MODIFY `embellishmenttypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fabric_item`
--
ALTER TABLE `fabric_item`
  MODIFY `fabricitemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fabric_part`
--
ALTER TABLE `fabric_part`
  MODIFY `fabricpartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fabric_type`
--
ALTER TABLE `fabric_type`
  MODIFY `fabrictypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `garments_type`
--
ALTER TABLE `garments_type`
  MODIFY `garmentstypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nomination`
--
ALTER TABLE `nomination`
  MODIFY `nomiid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_uom_insert`
--
ALTER TABLE `product_uom_insert`
  MODIFY `puomid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trims_item`
--
ALTER TABLE `trims_item`
  MODIFY `trimsitemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `trims_type`
--
ALTER TABLE `trims_type`
  MODIFY `trimstypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `userstatus`
--
ALTER TABLE `userstatus`
  MODIFY `userstatusid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `usertypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
