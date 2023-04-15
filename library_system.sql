-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2023 at 10:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `books_data`
--

CREATE TABLE `books_data` (
  `b_id` int(11) NOT NULL,
  `b_item_code` varchar(200) NOT NULL,
  `b_item_name` varchar(200) NOT NULL,
  `b_item_category` varchar(200) NOT NULL,
  `b_item_quantity` text NOT NULL,
  `b_item_isbn` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books_data`
--

INSERT INTO `books_data` (`b_id`, `b_item_code`, `b_item_name`, `b_item_category`, `b_item_quantity`, `b_item_isbn`) VALUES
(1, '11223344', 'Middlemarch ', 'novel', '10', '5542864550'),
(2, '11223345', 'To the Lighthouse', 'novel', '7', '5574584234'),
(3, '11223346', 'Mrs Dalloway ', 'novel', '11', '8887599524'),
(4, '11223347', 'Great Expectations', 'novel', '14', '2248115852'),
(5, '11223348', 'Jane Eyre', 'novel', '14', '2855481558'),
(6, '11223349', 'Bleak House ', 'novel', '7', '2254668596'),
(7, '11223350', 'Wuthering Heights', 'novel', '16', '2546639958'),
(14, '11223344551', 'test book 01', 'test', '20', '221154875858'),
(15, '11223344552', 'test book 02', 'test', '15', '5548795865'),
(16, '11223344553', 'test book 03 update book', 'test', '9', '5448759582');

-- --------------------------------------------------------

--
-- Table structure for table `borrower_data`
--

CREATE TABLE `borrower_data` (
  `bo_id` int(11) NOT NULL,
  `bo_customer_id` varchar(200) NOT NULL,
  `bo_item_code` text NOT NULL,
  `bo_item_name` text NOT NULL,
  `bo_item_isbn` text NOT NULL,
  `bo_borrow_date` text NOT NULL,
  `bo_return_date` text NOT NULL,
  `bo_returned_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrower_data`
--

INSERT INTO `borrower_data` (`bo_id`, `bo_customer_id`, `bo_item_code`, `bo_item_name`, `bo_item_isbn`, `bo_borrow_date`, `bo_return_date`, `bo_returned_date`) VALUES
(24, '123456', '11223347', 'Great Expectations', '2248115852', '2020-10-15', '2020-10-25', '0'),
(26, '77889966', '11223349', 'Bleak House ', '2254668596', '2020-11-02', '2020-11-12', '0'),
(27, '0112233', '11223349', 'Bleak House ', '2254668596', '2020-11-15', '2020-11-25', '0'),
(28, '555666', '11223344553', 'test book 03 update book', '5448759582', '2020-11-16', '2020-11-28', '0');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `l_id` int(11) NOT NULL,
  `l_email` text NOT NULL,
  `l_password` text NOT NULL,
  `l_user_id` varchar(20) NOT NULL,
  `l_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`l_id`, `l_email`, `l_password`, `l_user_id`, `l_type`) VALUES
(1, '1560481e1216af91bc89224c4e5568285441a436', '011c945f30ce2cbafc452f39840f025693339c42', '0112233', '0'),
(2, 'd49c3123ac3f97e1bd142dc3855ae8b0453f6a09', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456', '1'),
(3, '4c0f67e29230f80db0e9105cf1367715db9c7ca5', '20eabe5d64b0e216796e834f52d61fd0b70332fc', '456789', '1'),
(4, '89e8990781b628bc7ecc11529e9e68473600241c', '7c222fb2927d828af22f592134e8932480637c0d', '112233', '1'),
(5, '9025f6f4ea9e9609ab7cb6fb79e6ae83112be4f8', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '123123', '1'),
(6, '1560481e1216af91bc89224c4e5568285441a436', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '11223388', '0'),
(9, 'bc1aeff55de89ef80af10c682ccd3a420fc5227e', '2abd55e001c524cb2cf6300a89ca6366848a77d5', '77889966', '1'),
(10, 'ea97b75619f5cb2b9df9d184c4541aafe3b87484', '00fd4b4549a1094aae926ef62e9dbd3cdcc2e456', '7788995588', '0'),
(11, 'b26f263bdb79f0b8b8373c99439cff998159cd27', 'e89820fe1b2285d2136590089f0f137ed70ac452', '4455858965', '1'),
(12, '79cc65d586f548f71229672ca3455a754c13e44d', '00fd4b4549a1094aae926ef62e9dbd3cdcc2e456', '558878', '0'),
(13, 'b26f263bdb79f0b8b8373c99439cff998159cd27', 'e89820fe1b2285d2136590089f0f137ed70ac452', '555666', '1'),
(14, '12874878cbf836709c367c7171731eb009a8901e', '618dcdfb0cd9ae4481164961c4796dd8e3930c8d', '44589585', '0');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `m_id` int(11) NOT NULL,
  `m_first_name` varchar(100) NOT NULL,
  `m_last_name` varchar(100) NOT NULL,
  `m_email` varchar(150) NOT NULL,
  `m_phone` text NOT NULL,
  `m_nic` varchar(20) NOT NULL,
  `m_address` varchar(250) NOT NULL,
  `m_status` int(11) NOT NULL,
  `m_reg_date` text NOT NULL,
  `m_type` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`m_id`, `m_first_name`, `m_last_name`, `m_email`, `m_phone`, `m_nic`, `m_address`, `m_status`, `m_reg_date`, `m_type`) VALUES
(1, 'Robin', 'Silva', 'robinsilvadk@gmail.com', '0123456782', '123456', 'No:480/2, abc road, usa', 1, '2020-07-27', 1),
(2, 'John', 'Ericson', 'john@gmail.com', '5478958025', '123123', 'No:550/18, river base, usa', 1, '2020-08-20', 1),
(3, 'Mark', 'DeZooa', 'mark@gmail.com', '7789558758', '112233', 'No:789/25, ABC Road, DEF Town.', 0, '2020-09-02', 1),
(4, 'Raza', 'Raza', 'raza@gmail.com', '4578958250', '456789', 'No: beach road, ABC', 0, '2020-09-12', 1),
(6, 'Monica', 'peroz', 'monika@gmail.com', '7878958658', '0112233', 'No: monica address.', 1, '2020-09-20', 1),
(11, 'sara', 'sara', 'sara@gmail.com', '215478965', '77889966', 'No:sara 457 sara', 1, '2020-10-14', 1),
(14, 'test', 'member', 'testmember@gmail.com', '0215478958', '555666', 'test address', 1, '2020-11-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `r_id` int(11) NOT NULL,
  `r_m_name` text NOT NULL,
  `r_mem_id` int(11) NOT NULL,
  `r_item_id` text NOT NULL,
  `r_item_isbn` text NOT NULL,
  `r_item_name` text NOT NULL,
  `r_col_date` text NOT NULL,
  `r_date` text NOT NULL,
  `r_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`r_id`, `r_m_name`, `r_mem_id`, `r_item_id`, `r_item_isbn`, `r_item_name`, `r_col_date`, `r_date`, `r_status`) VALUES
(7, 'Robin Silva', 123456, '11223347', '2248115852', 'Great Expectations', '2020-11-20', '2020-11-15', 'Requested');

-- --------------------------------------------------------

--
-- Table structure for table `send_msg`
--

CREATE TABLE `send_msg` (
  `sm_id` int(11) NOT NULL,
  `sm_mem_name` varchar(200) NOT NULL,
  `sm_mem_id` int(11) NOT NULL,
  `sm_msg_title` varchar(200) NOT NULL,
  `sm_msg_body` text NOT NULL,
  `sm_msg_date` datetime NOT NULL DEFAULT current_timestamp(),
  `sm_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `send_msg`
--

INSERT INTO `send_msg` (`sm_id`, `sm_mem_name`, `sm_mem_id`, `sm_msg_title`, `sm_msg_body`, `sm_msg_date`, `sm_status`) VALUES
(1, 'Robin Silva', 123456, 'This is test message 01', 'This is test message 01 Body...', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `system_user`
--

CREATE TABLE `system_user` (
  `su_id` int(11) NOT NULL,
  `su_name` varchar(100) NOT NULL,
  `su_email` varchar(250) NOT NULL,
  `su_nic` varchar(100) NOT NULL,
  `su_phone` text NOT NULL,
  `su_reg_date` text NOT NULL,
  `su_type` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_user`
--

INSERT INTO `system_user` (`su_id`, `su_name`, `su_email`, `su_nic`, `su_phone`, `su_reg_date`, `su_type`) VALUES
(1, 'Admin User', 'admin@test.com', '11223388', '8774589658', '2020-10-28', 0),
(4, 'test system user', 'systemuser@gmail.com', '44589585', '0215478589', '2020-11-16', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books_data`
--
ALTER TABLE `books_data`
  ADD PRIMARY KEY (`b_id`),
  ADD UNIQUE KEY `b_item_code` (`b_item_code`);

--
-- Indexes for table `borrower_data`
--
ALTER TABLE `borrower_data`
  ADD PRIMARY KEY (`bo_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`l_id`),
  ADD UNIQUE KEY `l_user_id` (`l_user_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_id`),
  ADD UNIQUE KEY `m_email` (`m_email`),
  ADD UNIQUE KEY `m_nic` (`m_nic`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `send_msg`
--
ALTER TABLE `send_msg`
  ADD PRIMARY KEY (`sm_id`);

--
-- Indexes for table `system_user`
--
ALTER TABLE `system_user`
  ADD PRIMARY KEY (`su_id`),
  ADD UNIQUE KEY `su_email` (`su_email`),
  ADD UNIQUE KEY `su_nic` (`su_nic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books_data`
--
ALTER TABLE `books_data`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `borrower_data`
--
ALTER TABLE `borrower_data`
  MODIFY `bo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `send_msg`
--
ALTER TABLE `send_msg`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `system_user`
--
ALTER TABLE `system_user`
  MODIFY `su_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
