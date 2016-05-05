-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2016 at 04:57 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitness_centre`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(20) NOT NULL,
  `class_id` varchar(20) NOT NULL COMMENT 'FK',
  `name` varchar(30) NOT NULL,
  `telephone` int(20) NOT NULL,
  `date_booked` varchar(20) NOT NULL,
  `class_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `class_id`, `name`, `telephone`, `date_booked`, `class_time`) VALUES
(1, '', 'John', 75896542, '08/11/1990', '9.00am');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(20) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `class_time` varchar(10) NOT NULL,
  `class_date` varchar(10) NOT NULL,
  `class_price` varchar(10) NOT NULL,
  `class_instructor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `class_name`, `class_time`, `class_date`, `class_price`, `class_instructor`) VALUES
(1, 'Zumba (Beginners)', '9.00pm', '23/04/15', '€5', 'Perte Closse');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `comment_box` varchar(2000) NOT NULL,
  `name` varchar(50) NOT NULL,
  `telephone_no` int(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `facility_id` varchar(50) NOT NULL,
  `facility_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feature_box`
--

CREATE TABLE `feature_box` (
  `offer_id` int(20) NOT NULL,
  `home_page_id` varchar(200) NOT NULL COMMENT 'FK',
  `offer_title` varchar(200) NOT NULL,
  `offer_desc` varchar(2000) NOT NULL,
  `offer_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feature_box`
--

INSERT INTO `feature_box` (`offer_id`, `home_page_id`, `offer_title`, `offer_desc`, `offer_image`) VALUES
(1, '', '30% off this weekend!', 'For this weekend alone you can get 30% off all memberships!', 'https://www.mixcloud.com/fishgodeep/ss');

-- --------------------------------------------------------

--
-- Table structure for table `homepage`
--

CREATE TABLE `homepage` (
  `home_page_id` varchar(10) NOT NULL,
  `page_title` varchar(50) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `classes_available` varchar(20) NOT NULL,
  `special_offers` varchar(20) NOT NULL,
  `images` varchar(20) NOT NULL,
  `links` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image gallery`
--

CREATE TABLE `image gallery` (
  `image_id` varchar(100) NOT NULL,
  `page_id` varchar(100) NOT NULL COMMENT 'FK',
  `club_title` varchar(100) NOT NULL,
  `club_logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `mem_id` int(11) NOT NULL,
  `membership_duration` varchar(20) NOT NULL,
  `membership_type` varchar(200) NOT NULL,
  `membership_comment` varchar(1000) NOT NULL,
  `membership_price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`mem_id`, `membership_duration`, `membership_type`, `membership_comment`, `membership_price`) VALUES
(1, '6 Months', 'Gold Membership', 'The gold membership lasts 6 months and entitles the member to full access to the gym and facilities.', '€400');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(20) NOT NULL,
  `page_name` varchar(200) NOT NULL,
  `page_details` varchar(2000) NOT NULL,
  `page_images` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `test_id` int(20) NOT NULL,
  `test_comment` varchar(2000) NOT NULL,
  `test_name` varchar(50) NOT NULL,
  `test_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`facility_id`);

--
-- Indexes for table `feature_box`
--
ALTER TABLE `feature_box`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `image gallery`
--
ALTER TABLE `image gallery`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`test_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `feature_box`
--
ALTER TABLE `feature_box`
  MODIFY `offer_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `test_id` int(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
