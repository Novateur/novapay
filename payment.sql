-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2016 at 01:21 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `payment`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE IF NOT EXISTS `cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_num` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `acc_number` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `card_num`, `acc_number`, `bank`, `type`, `user_id`, `status`, `code`) VALUES
(1, '667899081234', '0267588934', 'UBA', 'MasterCard', '1', NULL, NULL),
(2, '447890902531', '0989964534', 'First Bank', 'MasterCard', '1', NULL, NULL),
(3, '8885936766891124', '33768767784', 'GTBank', 'Verve', '1', NULL, NULL),
(10, '95975878467456476', '587857647837', 'Zenith Bank', 'Visa', '1', 'default', NULL),
(13, '99488486467576764', '676477454', 'Heritage bank', 'Verve', '1', NULL, NULL),
(15, '9859894846767357', '7875847587', 'Union Bank', 'MasterCard', '2', 'default', NULL),
(16, '89497484756356484', '6764563547', 'Zenith Bank', 'MasterCard', '3', 'default', NULL),
(17, '9876543213456789', '09876543', 'GTB', 'MasterCard', '4', 'default', NULL),
(29, '759499458989457', '022233476545', 'Unity Bank', 'MasterCard', '13', 'default', '334'),
(30, '749849897499489974', '948985789', 'Union Bank', 'Verve', '14', 'default', '445');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `email`, `user_id`) VALUES
(1, 'akobundle@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pending_transact`
--

CREATE TABLE IF NOT EXISTS `pending_transact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_num` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receiver_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `day` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sender_name` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `pending_transact`
--

INSERT INTO `pending_transact` (`id`, `amount`, `card_num`, `code`, `status`, `user_id`, `receiver_id`, `day`, `month`, `year`, `time1`, `name`, `sender_name`) VALUES
(14, '566776.78', '89497484756356484', '875380444', '0', '3', '1', '02', 'Aug', '2016', '11:03:36', 'Okoroafor Michael', 'Sandra Chidinma'),
(15, '2367476.90', '89497484756356484', '1080516197', '0', '3', '2', '02', 'Aug', '2016', '11:14:32', 'Olelewe Prince', 'Sandra Chidinma'),
(16, '7684.45', '89497484756356484', '776392890', '0', '1', '3', '02', 'Aug', '2016', '12:07:43', 'Sandra Chidinma', 'Okoroafor Michael'),
(17, '100345.95', '6476375476357874', '7778477', '0', '3', '2', '03', 'aug', '2016', '12:15:09', 'Olelewe Prince', 'Sandra Chidinma'),
(18, '4500.99', '89497484756356484', '161096937', '0', '3', '1', '03', 'Aug', '2016', '11:20:42', 'Okoroafor Michael', 'Sandra Chidinma'),
(19, '49000.45', '89497484756356484', '882986310', '0', '3', '1', '03', 'Aug', '2016', '12:23:01', 'Okoroafor Michael', 'Sandra Chidinma'),
(20, '3000.00', '447890902531', '1001303892', '0', '1', '1', '03', 'Aug', '2016', '12:45:36', 'Okoroafor Michael', 'Okoroafor Michael'),
(21, '45000.90', '447890902531', '127965046', '0', '1', '2', '03', 'Aug', '2016', '14:22:44', 'Olelewe Prince', 'Okoroafor Michael'),
(22, '18990000.00', '447890902531', '70197571', '0', '1', '2', '03', 'Aug', '2016', '14:27:24', 'Olelewe Prince', 'Okoroafor Michael'),
(23, '89765.77', '9876543213456789', '70197571', '0', '4', '1', '03', 'Aug', '2016', '15:16:42', 'Okoroafor Michael', 'Valentine Adejoh'),
(24, '89765.77', '9876543213456789', '738957192', '0', '4', '1', '03', 'Aug', '2016', '15:16:47', 'Okoroafor Michael', 'Valentine Adejoh'),
(25, '89765.77', '9876543213456789', '669688165', '0', '4', '1', '03', 'Aug', '2016', '15:16:49', 'Okoroafor Michael', 'Valentine Adejoh'),
(26, '67993333.00', '9876543213456789', '27827336', '0', '4', '1', '03', 'Aug', '2016', '16:35:32', 'Okoroafor Michael', 'Valentine Adejoh'),
(27, '450000.00', '447890902531', '1097583017', '0', '1', '4', '04', 'Aug', '2016', '10:19:46', 'Valentine Adejoh', 'Okoroafor Michael');

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE IF NOT EXISTS `phones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phones` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`id`, `phones`, `user_id`) VALUES
(1, '09067558958', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `add1` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `add2` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `joined` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `question` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hint` text COLLATE utf8_unicode_ci,
  `answer` text COLLATE utf8_unicode_ci,
  `pin` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pin_date` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `veri_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `dob`, `nationality`, `add1`, `add2`, `country`, `type`, `photo`, `phone`, `joined`, `status`, `question`, `hint`, `answer`, `pin`, `pin_date`, `veri_code`) VALUES
(1, 'akobundumichael94@gmail.com', '558d9b35628519f7427cb9f4210a2f71fbdf714b', 'Okoroafor', 'Michael', '08-07-1992', 'Nigeria', 'House number 70,Patnasonic Estate,Mbora,Abuja,Nigeria', 'Naic building,Plot 590,Area 0,Central Business District,Abuja', NULL, NULL, 'avatar_2.png', '07060815446', '2016', '0', 'Your first pet''s name', 'my best friend''s nickname', 'Bingo', NULL, '2016-08-03 14:42:28', NULL),
(2, 'xtremerules@gmail.com', '8fc56e4d91ce67dd461fb533554fb08256bcd072', 'Olelewe', 'Prince', '10-06-1993', 'Nigeria', 'Word bank housing estate,Abia State.', 'Aba ngwa,Abia State', NULL, NULL, 'avatar_2.png', '07062132032', '2016', '0', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'sandra@gmail.com', '54c858510cb0301ade2f8dfc41f1f75351e1adce', 'Sandra', 'Chidinma', '09-09-1989', 'Nigeria', 'No 77A ajose,Street,Maryland,Lagos', 'No 7 faramobi Ajike street,Anthony,Lagos', NULL, NULL, 'avatar_2.png', '07060814556', '2016', '0', NULL, NULL, NULL, NULL, '2016-08-03 09:46:29', NULL),
(13, 'bundle@gmail.com', 'c48dca80db4d6f672925455d0fd0f923678ae066', 'Alan', 'Chukwunyere', '18-08-2016', 'Nigeria', 'House', 'Office', NULL, NULL, 'avatar_2.png', '090987867676', '2016', '0', NULL, NULL, NULL, NULL, '2016-08-07 00:52:06', '775302'),
(14, 'bubu@yahoo.com', 'c48dca80db4d6f672925455d0fd0f923678ae066', 'Iyk-onumah', 'Chukwuebuka', '11-08-2016', 'Nigeria', 'Home', 'Office', NULL, NULL, 'avatar_2.png', '798983978738', '2016', '0', NULL, NULL, NULL, NULL, NULL, '718969');
