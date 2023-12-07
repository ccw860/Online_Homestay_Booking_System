-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 05:53 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homestay_online_booking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pass` varchar(20) NOT NULL,
  `admin_contact_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_contact_number`) VALUES
(16, 'Chia Chun Wei', 'chunwei123@outlook.com', 'chiachunwei2001', '016-7224815'),
(17, 'Tan Chen Yang', 'chenyang@gmail.com', 'chenyang2001', '017-7075498'),
(18, 'Sammi Tan Hui Qin', 'sammitan5565@hotmail.com', 'sammitan2001', '010-6515596');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `id` int(11) NOT NULL,
  `home_id` int(11) NOT NULL,
  `cus_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `cus_ic` varchar(15) NOT NULL,
  `checkin_date` text NOT NULL,
  `checkout_date` text NOT NULL,
  `message` varchar(5000) NOT NULL,
  `price_per_night` varchar(50) NOT NULL,
  `num_of_day` varchar(10) NOT NULL,
  `total_payment` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `book_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`id`, `home_id`, `cus_id`, `name`, `email`, `phone`, `cus_ic`, `checkin_date`, `checkout_date`, `message`, `price_per_night`, `num_of_day`, `total_payment`, `status`, `book_time`) VALUES
(18, 144, 11, 'Chia Chun Wei', '1191201453@student.mmu.edu.my', '016-7224815', '010905-01-0115', '06-03-2021', '20-03-2021', 'hello', '200', '14', 2800, 'Paid', '2021-02-28 16:43:34.069941');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(10) NOT NULL,
  `cus_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(50) NOT NULL,
  `cus_contact_num` varchar(50) NOT NULL,
  `cus_email` varchar(50) NOT NULL,
  `cus_pass` varchar(50) NOT NULL,
  `vkey` varchar(45) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `createdate` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_contact_num`, `cus_email`, `cus_pass`, `vkey`, `verified`, `createdate`) VALUES
(9, 'Chia Chun Wei', '016-7224815', 'chunwei010905@gmail.com', 'chunwei2001', '55cf27dc63943927acb813232236ddf8', 1, '2021-02-28 16:31:05.577238'),
(11, 'Chia Chun Wei', '016-7224815', 'chunwei123@outlook.com', 'chunwei2001', 'cacdb9891e6576ec3e5b0341e04a6f08', 1, '2021-02-28 16:39:16.987889');

-- --------------------------------------------------------

--
-- Table structure for table `home_details`
--

CREATE TABLE `home_details` (
  `home_id` int(11) NOT NULL,
  `home_name` varchar(100) NOT NULL,
  `home_code` int(10) NOT NULL,
  `price_per_night` varchar(20) NOT NULL,
  `home_facilities` varchar(100) NOT NULL,
  `num_of_room` int(10) NOT NULL,
  `home_address` varchar(5000) NOT NULL,
  `description` mediumtext NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_details`
--

INSERT INTO `home_details` (`home_id`, `home_name`, `home_code`, `price_per_night`, `home_facilities`, `num_of_room`, `home_address`, `description`, `image1`, `image2`, `image3`, `image4`) VALUES
(144, 'Golden Homestay @ The Robertson Bukit Bintang', 1, '200', 'Swimming pool ,\r\nFree WiFi,\r\nFree parking,  \r\nFitness centre', 3, 'S-32-2 THE ROBERTSON RESIDENCE, 2, Jalan Robertson, Bukit Bintang, 50150 Kuala Lumpur', 'See health & safety details\r\nOffering city views, Golden Homestay@ The Robertson Bukit Bintang in Kuala Lumpur offers accommodation, an outdoor swimming pool, a fitness centre, a garden, water sports facilities and a spa and wellness centre. The apartment features both WiFi and private parking free of charge.	\r\n\r\n', 'goldenhome1.jpg', 'goldenhome2.jpg', 'goldenhome3.jpg', 'goldenhome4.jpg'),
(145, 'Kiara East @Batu Cave 2', 1, '200', 'Free WIfi,\r\nFree parking,\r\nFamily Room,\r\nPet allowed,\r\nFitness centre', 4, 'Jalan 3, 18a Off Jalan Ipoh, 51200 Kuala Lumpur, Malaysia', 'Suria KLCC is 9 km from the apartment, while Royal Selangor Pewter Factory and Visitor Centre is 9 km from the property. The nearest airport is Sultan Abdul Aziz Shah Airport, 17 km from Kiara East Deluxe Suite @Batu Caves.', 'kiarahome1.jpg', 'kiarahome2.jpg', 'kiarahome3.jpg', 'kiarahome4.jpg'),
(146, 'SOHO Suites KLCC By A2A Homestay', 1, '200', '1 swimming pool, \r\nFree WiFi, \r\nFree parking, \r\nFamily rooms,\r\nAir conditioner', 4, '20 Jalan Perak Soho Suites KLCC, 50450 Kuala Lumpur, Malaysia', 'Offering a garden and pool view, SOHO Suites KLCC is situated in Kuala Lumpur, 300 m from Kuala Lumpur Convention Center and 500 m from Suria KLCC. The air-conditioned accommodation is 300 m from Aquaria KLCC, and guests benefit from private parking available on site and free WiFi.', 'sohohome1.png', 'sohohome2.jpg', 'sohohome3.jpg', 'sohohome4.jpg'),
(147, 'Elshape', 2, '200', '1 swimming pool,\r\nFree parking, \r\nFamily rooms,\r\nFree WiFi, \r\nNon-smoking rooms', 4, 'ST3682, Jalan Dato Tamby Chik Karim, Masjid Tanah, 78300 Melaka, Malaysia –', 'Located in Melaka in the Melaka region and Melaka Sentral reachable within 31 km, Elshape provides accommodation with free WiFi, BBQ facilities, a fitness centre and free private parking.\r\n\r\nGuests can enjoy the indoor pool at the homestay.\r\n\r\nCheng Hoon Teng Temple is 32 km from Elshape, while Porta de Santiago is 32 km away. The nearest airport is Melaka International Airport, 19 km from the accommodation.', 'elshape1.jpg', 'elshape2.jpg', 'elshape3.jpg', 'elshape4.jpg'),
(162, 'Ruby Atlantis', 2, '200', '1 swimming pool, \r\nFree parking, \r\nFamily rooms, \r\nFree WiFi, \r\nNon-smoking rooms', 4, ' Jalan KSB 11A pangsapuriatlantis kota syahbandar D-25-09, 75200 Melaka, Malaysia', 'Situated in Melaka, 3.9 km from Cheng Hoon Teng Temple and 4.1 km from Baba & Nyonya Heritage Museum, Ruby atlantis guesthouse features accommodation with free WiFi, a garden with an outdoor swimming pool, pool views, and access to a fitness room and a hot tub.\r\n\r\nEach unit has a patio offering city views, a satellite flat-screen TV, a seating area, a well-fitted kitchen and a private bathroom with bidet, a hairdryer and free toiletries. There is also a fridge, stovetop and a kettle.', 'ruby atlantis1.jpg', 'ruby atlantis2.jpg', 'ruby atlantis23.jpg', 'ruby atlantis4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `home_type`
--

CREATE TABLE `home_type` (
  `home_code` int(10) NOT NULL,
  `home_state` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_type`
--

INSERT INTO `home_type` (`home_code`, `home_state`) VALUES
(1, 'Kuala Lumpur'),
(2, 'Melaka');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_no` int(20) NOT NULL,
  `book_id` varchar(11) NOT NULL,
  `cus_name` varchar(50) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `total_payment` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_no`, `book_id`, `cus_name`, `payment_type`, `total_payment`) VALUES
(8, '18', 'ccw', 'Master', '2800');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test` (`home_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `home_details`
--
ALTER TABLE `home_details`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `home_type`
--
ALTER TABLE `home_type`
  ADD PRIMARY KEY (`home_code`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `home_details`
--
ALTER TABLE `home_details`
  MODIFY `home_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `home_type`
--
ALTER TABLE `home_type`
  MODIFY `home_code` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
