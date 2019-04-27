-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 08, 2019 at 03:20 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.11-2+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `generic` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `strength` varchar(100) NOT NULL,
  `pharma` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `name`, `generic`, `price`, `img`, `strength`, `pharma`) VALUES
(1, 'Napa', 'Paracetamol', 3, 'medImg/napa.jpg', '500mg', 'Beximco Pharmaceuticals Ltd.'),
(2, 'Adovas', 'Nonsedating Herbal Cough Syrup', 65, 'medImg/RKS_9756.JPG', '100ml', 'Square Pharmaceuticals Ltd.'),
(3, 'Betnovate ', 'Betamethasone valerate', 80, 'medImg/1.jpg', '100 grams', 'GlaxoSmithKline'),
(4, 'Brofex', 'Dextromethorphan', 25, 'medImg/BROFEX-100ML.jpg', '100ml', 'Square Pharmaceuticals Ltd.'),
(5, 'Pain Relief', 'Acetamnofmin', 100, 'medImg/CVS31750.jpg', '100mg', 'ABC Ltd.'),
(6, 'Ativan', 'Lorazepam', 105, 'medImg/Ativan-1mg.png', '1mg', 'D Pharmacy Ltd.'),
(7, 'Sleep', 'Brauer natural medicine', 500, 'medImg/Sleep200mL-1.jpg', '200ml', 'Brauer'),
(8, 'Fexo', 'Fexofenadine Hydrochloride USP', 250, 'medImg/FEXO-120.jpg', '120mg', 'Square Pharmaceuticals Ltd.'),
(9, 'Acineutra Liquid', 'Ayurvedic Proprietory Medicine', 96, 'medImg/acineutra-liquid-500x500.jpg', '100ml', 'UAP Pharma Pvt. Ltd.'),
(10, 'Omidon', 'Domperidone Maleate', 15, 'medImg/Omidon-10mg.jpg', '10mg', 'Incepta Pharmaceuticals'),
(11, 'Neotack', 'Ranitidine USP', 5, 'medImg/Neotack 300.jpg', '300mg', 'Square Pharmaceuticals Ltd.'),
(12, 'Filfresh', 'Melatonin', 48, 'medImg/Filfresh.jpg', '3mg', 'Square Pharmaceuticals Ltd.'),
(13, 'Protium', 'Pantoprazole', 5, 'medImg/4.jpg', '20mg', 'Unimed Unihealth MFG. Ltd.'),
(14, 'Algin Syrup', ' Tiemonium Methylsulphate', 90, 'medImg/Pharmaceuticals-Algin-Syrup.jpg', ' 10 mg', 'Renata Limited'),
(15, 'Angivent MR', 'Trimetazidine Dihydrochloride', 5, 'medImg/ANGIVENT-MR-35.jpg', '35 mg', 'Square Pharmaceuticals Ltd.'),
(16, 'Deflux', 'Domperidone Maleate', 38, 'medImg/Deflux.jpg', ' 5 mg/ 5 ml', 'Beximco Pharmaceuticals Ltd.');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderid` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `pharmaId` int(11) NOT NULL,
  `total` varchar(500) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `uaddress` varchar(100) NOT NULL,
  `uphone` varchar(25) NOT NULL,
  `phName` varchar(50) NOT NULL,
  `status` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderid`, `userId`, `pharmaId`, `total`, `userName`, `uaddress`, `uphone`, `phName`, `status`, `date`) VALUES
(7, 2, 3, '128', 'Mili', 'Uttara , Sector-13', '0199999', 'ABC Pharmacy', 'order delivered', '2019-03-30 16:15:39'),
(8, 2, 3, '250', 'Mili', 'Uttara , Sector-13', '0199999', 'ABC Pharmacy', 'order delivered', '2019-03-30 16:44:37'),
(9, 5, 3, '175', 'Israt', 'Mohakhali 66, Dhaka 1212', '0199999', 'ABC Pharmacy', 'order canceled', '2019-03-30 20:01:23'),
(10, 5, 3, '93', 'Israt', 'Mohakhali 66, Dhaka 1212', '0199999', 'ABC Pharmacy', 'order proceed', '2019-03-30 20:04:58'),
(11, 5, 3, '400', 'Israt', 'Mohakhali 66, Dhaka 1212', '0199999', 'ABC Pharmacy', 'order proceed', '2019-03-30 20:33:53'),
(13, 5, 3, '2000', 'Israt', 'Mohakhali 66, Dhaka 1212', '016123456', 'ABC Pharmacy', 'order proceed', '2019-03-30 20:37:11'),
(14, 5, 3, '3', 'Israt', 'Mohakhali 66, Dhaka 1212', '016123456', 'ABC Pharmacy', 'ordered', '2019-03-30 20:40:13'),
(15, 6, 3, '65', 'Tahsin', 'Dhanmondi 4A, Dhaka', '0153332566', 'ABC Pharmacy', 'order delivered', '2019-03-30 20:45:02'),
(16, 2, 3, '860', 'Mili', 'Uttara, Sector-13', '0199999', 'ABC Pharmacy', 'order proceed', '2019-03-31 03:10:03'),
(17, 2, 3, '475', 'Mili', 'Uttara, Sector-13', '0199999', 'ABC Pharmacy', 'ordered', '2019-04-01 20:52:45'),
(18, 2, 3, '100', 'Mili', 'Uttara, Sector-13', '0199999', 'ABC Pharmacy', 'ordered', '2019-04-01 20:56:47'),
(20, 2, 3, '65', 'Mili', 'Uttara, Sector-13', '0199999', 'ABC Pharmacy', 'ordered', '2019-04-01 20:59:16'),
(21, 5, 3, '128', 'Israt', 'Mohakhali 66, Dhaka 1212', '016123456', 'ABC Pharmacy', 'ordered', '2019-04-02 03:01:04'),
(22, 6, 3, '378', 'Tahsin', 'Dhanmondi 4A, Dhaka', '0153332566', 'ABC Pharmacy', 'order proceed', '2019-04-02 10:38:32'),
(30, 5, 16, '30', 'Israt', 'Mohakhali 66, Dhaka 1212', '016123456', 'Innovizz Pharma', 'order delivered', '2019-04-08 11:30:11'),
(32, 5, 7, '1190', 'Israt', 'Mohakhali 66, Dhaka 1212', '016123456', 'Meditrust Pharma Ltd.', 'ordered', '2019-04-08 14:27:59'),
(33, 5, 10, '840', 'Israt', 'Mohakhali 66, Dhaka 1212', '016123456', 'Ark Pharmacy', 'ordered', '2019-04-08 15:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `orderInfo`
--

CREATE TABLE `orderInfo` (
  `medid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `medName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderInfo`
--

INSERT INTO `orderInfo` (`medid`, `orderid`, `medName`, `price`, `quantity`) VALUES
(1, 7, 'Napa', '3', 1),
(4, 7, 'Brofex', '25', 1),
(5, 7, 'Pain Relief', '100', 1),
(2, 8, 'Adovas', '65', 1),
(3, 8, 'Betnovate ', '80', 2),
(4, 8, 'Brofex', '25', 1),
(1, 9, 'Napa', '3', 5),
(3, 9, 'Betnovate ', '80', 2),
(2, 10, 'Adovas', '65', 1),
(1, 10, 'Napa', '3', 1),
(4, 10, 'Brofex', '25', 1),
(4, 11, 'Brofex', '25', 16),
(5, 13, 'Pain Relief', '100', 20),
(1, 14, 'Napa', '3', 1),
(2, 15, 'Adovas', '65', 1),
(2, 16, 'Adovas', '65', 12),
(3, 16, 'Betnovate ', '80', 1),
(4, 17, 'Brofex', '25', 2),
(2, 17, 'Adovas', '65', 5),
(5, 17, 'Pain Relief', '100', 1),
(5, 18, 'Pain Relief', '100', 1),
(2, 20, 'Adovas', '65', 1),
(4, 21, 'Brofex', '25', 5),
(1, 21, 'Napa', '3', 1),
(2, 22, 'Adovas', '65', 1),
(4, 22, 'Brofex', '25', 1),
(1, 22, 'Napa', '3', 1),
(3, 22, 'Betnovate ', '80', 1),
(5, 22, 'Pain Relief', '100', 1),
(6, 22, 'Ativan', '105', 1),
(8, 23, 'Fexo', '250', 1),
(7, 23, 'Sleep', '500', 1),
(14, 23, 'Algin Syrup', '90', 1),
(12, 23, 'Filfresh', '48', 1),
(2, 24, 'Adovas', '65', 5),
(7, 24, 'Sleep', '500', 2),
(4, 25, 'Brofex', '25', 5),
(6, 26, 'Ativan', '105', 3),
(8, 26, 'Fexo', '250', 4),
(1, 26, 'Napa', '3', 1),
(10, 26, 'Omidon', '15', 1),
(1, 27, 'Napa', '3', 1),
(8, 0, 'Fexo', '250', 2),
(7, 0, 'Sleep', '500', 1),
(3, 0, 'Betnovate ', '80', 1),
(1, 0, 'Napa', '3', 1),
(1, 30, 'Napa', '3', 10),
(16, 31, 'Deflux', '38', 2),
(9, 31, 'Acineutra Liquid', '96', 10),
(16, 32, 'Deflux', '38', 1),
(9, 32, 'Acineutra Liquid', '96', 12),
(6, 33, 'Ativan', '105', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `area` varchar(1000) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `name`, `email`, `password`, `usertype`, `area`, `address`, `phone`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', 'admin', 'Uttara', 'Uttara', '123456789'),
(2, 'Mili', 'mili@a.b', '76681a82dd1c41a61bf1d3fbcf20b608', 'user', 'Uttara', 'Uttara, Sector-13', '0199999'),
(3, 'ABC Pharmacy', 'abc@gm.com', '900150983cd24fb0d6963f7d28e17f72', 'pharmacy', 'Uttara', 'Uttara, Sector-11, Road-4, House-16', '54321'),
(4, 'Admin', 'ad@gm.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Uttara', 'Uttara', '123456789'),
(5, 'Israt', 'israt@gm.com', 'daa70f968c79336af6dc677bde20f464', 'user', 'Mohakhali', 'Mohakhali 66, Dhaka 1212', '016123456'),
(6, 'Tahsin', 't@gm.com', '86b0aaef2b969ea4bc380e378fb2b952', 'user', 'Dhanmondi', 'Dhanmondi 4A, Dhaka', '0153332566'),
(7, 'Meditrust Pharma Ltd.', 'medi@gmail.com', 'ae4c2eba6f680689cbee268ab684b853', 'pharmacy', 'Sector 11', '36, Khawja Gharib-e-Nawaz Avenue, Sector-11, Uttara, Dhaka 1230', '01949-001437'),
(8, 'BD surgical and Pharmacy', 'bd@gmail.com', 'c419b06b4c6579b50ff05adb3b8424f1', 'pharmacy', 'Sector 13', 'House-7 Gareeb-e-Nawaz Ave, Dhaka 1230', '01615-305050'),
(9, 'Best Pharma', 'best@gmail.com', 'db82206b1d49042d1a710e9c88c21d36', 'pharmacy', 'Sector 13', '35, Garib-E-Newaz Avenue, Sector-13, Uttara, Dhaka 1230', '01767-601815'),
(10, 'Ark Pharmacy', 'ark@gmail.com', '0d8b93021ea26187591091f3ea26779c', 'pharmacy', 'Sector 13', '45 Garib E Nawaz Avenue, Sector-13, Uttara, Dhaka 1230', '01973-384250'),
(11, 'Asin', 'asin@gmail.com', '62130e1b1e81120c6344cc4e661f9e4b', 'user', 'Sector 13', 'Road-4,House-20, Sector 13, Uttara, Dhaka', '01615-305505'),
(12, 'Mumu', 'mumu@gmail.com', '23c1622d0f5af8a8a8cd90dd1898f3cb', 'user', 'Sector 11', 'Road 5, house 28, sector 11, Uttara, Dhaka', '0199999568'),
(13, 'Dhanmondi Pharmacy', 'd@g.com', '75de105b8094cbc4a97a3841d0970979', 'pharmacy', 'Dhanmondi', '28/B, Ahmed Mansion, Mirpur Road, Below Science Lab Over Bridge, Dhanmondi-1, Dhaka 1205', '01670-064257'),
(14, 'Islam Pharmacy', 'i@g.c', '037c53a1a1be94b8b2d9096b2d00ca65', 'pharmacy', 'Mohakhali', 'GP-KA-67, Mohakhali, South Para, Dhaka 1212', '01912-914724'),
(15, 'Simi', 'simi@g.c', 'a6eee7cfe899b8401e62b32c2726cc99', 'user', 'Sector 14', 'Road 15,house 16,Sector 14,Uttara', '01564635554'),
(16, 'Innovizz Pharma', 'i@g.c', 'e8cd315d01681afbfa2a445b8d2ac1ac', 'pharmacy', 'Sector 14', 'Plot 20 Rd -13, Dhaka 1230', '01711-083880');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `orderInfo`
--
ALTER TABLE `orderInfo`
  ADD PRIMARY KEY (`medid`,`orderid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
