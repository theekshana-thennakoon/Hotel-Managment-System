-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 03:16 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shadow`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nic` varchar(15) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `rno` int(11) NOT NULL,
  `cdate` varchar(20) NOT NULL,
  `gdate` varchar(20) NOT NULL,
  `month` int(20) NOT NULL,
  `period` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `advance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `nic`, `phone`, `address`, `rno`, `cdate`, `gdate`, `month`, `period`, `payment`, `advance`) VALUES
(11, 'Dineth Rajapaksha', '200006901521', 714185979, 'Narammala Narammala', 1, '2021-07-05', '2021-07-10', 2021, 6, 18000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `rec_id` varchar(100) NOT NULL,
  `book_nic` varchar(50) NOT NULL,
  `book_days` int(11) NOT NULL,
  `room_type` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`rec_id`, `book_nic`, `book_days`, `room_type`, `date`, `time`, `is_active`) VALUES
('202208121713', '123456789v', 6, 'A1', '2022-08-24', '12:17:13', 0),
('202208123439', '123456789v', 3, 'B1', '2022-08-24', '12:34:39', 0),
('202208123634', '123456789v', 7, 'C1', '2022-08-24', '12:36:34', 1),
('202208123650', '123456789v', 3, 'A1', '2022-08-24', '12:36:50', 0),
('202208123653', '123456789v', 3, 'A1', '2022-08-24', '12:36:50', 1),
('202208134748', '456456', 5, 'A1', '2022-08-24', '13:47:48', 1),
('202211112955', '123456789v', 4, 'Room 1', '2022-11-07', '11:29:55', 1),
('202211113004', '123456789v', 4, 'Room 1', '2022-11-07', '11:30:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE `cost` (
  `reason` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `date` varchar(15) NOT NULL,
  `month` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cost`
--

INSERT INTO `cost` (`reason`, `price`, `date`, `month`) VALUES
('Current Bill', 5000, '2021-07-04', '2021-07');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `rec_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nic` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`rec_id`, `name`, `nic`, `email`, `phone`, `address`) VALUES
(1, 'Test', '123456789v', 'test@test.com', 1234567890, 'test address'),
(2, 'Test 2', '456456789v', 'test2@test.com', 961456789, 'test address 2'),
(8, 'Customer 1', '456456', 'cus@cus.com', 123456, 'cus address'),
(9, 'Customer 2', '200031312175', 'cus2@cus.com', 789651168, 'Test Employee Address');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `jobtype` varchar(150) NOT NULL,
  `salary` int(11) NOT NULL,
  `wod` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `nic`, `name`, `phone`, `address`, `jobtype`, `salary`, `wod`) VALUES
(3, '200031302175', 'Theekshana Thennakoon', 789651168, 'Narammala', 'Hotel', 80000, 'work'),
(4, '200006901521', 'Dineth Rajapaksha', 714185979, 'Narammala', 'Hotel Manager', 55000, 'work');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `food` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `food`, `price`, `type`) VALUES
(1, 'Milk Rice', 50, 'Breakfirst'),
(2, 'Rice', 250, 'Lunch'),
(3, 'Hoppers', 15, 'Breakfirst'),
(4, 'String Hoppers', 100, 'Breakfirst'),
(5, 'Cocunut Rotti', 20, 'Breakfirst'),
(6, 'Meet Fish or Chicken Curry', 70, 'Breakfirst'),
(7, 'Potato Curry', 30, 'Breakfirst'),
(8, 'Rice', 80, 'Breakfirst'),
(9, 'Kola Keda', 60, 'Breakfirst'),
(10, 'Sour Fish Curry', 40, 'Lunch'),
(11, 'Chicken Curry', 70, 'Lunch'),
(12, 'Dhal Curry', 30, 'Lunch'),
(13, 'EggPlant', 50, 'Lunch'),
(15, 'Fried Rice', 370, 'Dinner'),
(16, 'Chicken Kottu', 350, 'Dinner'),
(17, 'Chees Kottu', 450, 'Dinner'),
(18, 'Hoppers', 15, 'Dinner'),
(19, 'Pineapple Juice', 80, 'Fruit Juice'),
(20, 'Avocado & Lime Juice', 140, 'Fruit Juice'),
(21, 'Dragen Fruit Juice', 280, 'Fruit Juice'),
(22, 'Water melon & Lime Juice', 180, 'Fruit Juice'),
(23, 'Woodapple Juice', 160, 'Fruit Juice'),
(24, 'Papaya Juice', 170, 'Fruit Juice'),
(25, 'Orange Juice', 100, 'Fruit Juice'),
(26, 'Pome Granate Juice', 320, 'Fruit Juice');

-- --------------------------------------------------------

--
-- Table structure for table `payfood`
--

CREATE TABLE `payfood` (
  `id` int(11) NOT NULL,
  `food` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `fname` varchar(50) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `user` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`fname`, `lname`, `user`, `phone`, `address`, `password`) VALUES
('Theekshana', 'Theekshana', 'theekshana', 705040775, 'Admin Address', 'nipuJani1@');

-- --------------------------------------------------------

--
-- Table structure for table `resturent`
--

CREATE TABLE `resturent` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` varchar(15) NOT NULL,
  `month` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resturent`
--

INSERT INTO `resturent` (`id`, `price`, `date`, `month`) VALUES
(1, 600, '2021-07-05', '2021-07'),
(2, 750, '2021-07-05', '2021-07'),
(3, 1100, '2021-07-05', '2021-07'),
(4, 1100, '2021-07-05', '2021-07'),
(5, 200, '2021-07-05', '2021-07'),
(6, 500, '2021-07-05', '2021-07'),
(7, 150, '2021-07-05', '2021-07');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_type` varchar(10) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `room_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_type`, `room_name`, `room_price`) VALUES
('A1', 'Room 1', 2500),
('B1', 'Room 2', 5000),
('C1', 'Room 3', 6500);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `nic` varchar(20) NOT NULL,
  `salary` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`nic`, `salary`, `date`, `month`) VALUES
('200031302175', 10000, '2012', '2014'),
('200031302175', 5000, '2021-07-02', '2021-07'),
('200031302175', 1000, '2021-07-04', '2021-07');

-- --------------------------------------------------------

--
-- Table structure for table `terminate`
--

CREATE TABLE `terminate` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(150) NOT NULL,
  `rno` int(11) NOT NULL,
  `cdate` varchar(20) NOT NULL,
  `gdate` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `period` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `advance` int(11) NOT NULL,
  `gmonth` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terminate`
--

INSERT INTO `terminate` (`id`, `name`, `nic`, `phone`, `address`, `rno`, `cdate`, `gdate`, `month`, `period`, `balance`, `advance`, `gmonth`) VALUES
(3, 'Theekshana', '200031302175', 789651168, 'Narammala', 1, '2021-07-03', '2021-07-08', '2021', 5, 10000, 0, '2021-07'),
(4, 'Theekshana', '200031302175', 789651168, 'Narammala', 3, '2021-07-03', '2021-07-10', '2021', 7, 11000, 0, '2021-07'),
(6, 'Theekshana', '200031302175', 789651168, 'Narammala', 1, '2021-07-04', '2021-07-11', '2021', 7, 1000, 20000, '2021-07'),
(7, 'Theekshana', '200031302175', 789651168, 'Narammala', 1, '2021-07-04', '2021-07-04', '2021', 1, 2000, 1000, '2021-07'),
(8, 'Theekshana', '200031302175', 789651168, 'Narammala', 2, '2021-07-04', '2021-07-04', '2021', 1, 2000, 1000, '2021-07'),
(10, 'Theekshana', '200031302175', 789651168, 'Narammala', 5, '2021-07-04', '2021-07-15', '2021', 12, 3000, 15000, '2021-07'),
(9, 'Theekshana', '200031302175', 789651168, 'Narammala', 1, '2021-07-04', '2021-07-04', '2021', 1, 1000, 2000, '2021-07'),
(12, 'Theekshana', '200031302175', 789651168, 'Narammala', 2, '2021-07-06', '2021-07-06', '2021', 1, 2000, 1000, '2021-07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `rec_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`rec_id`, `email`, `password`, `type`) VALUES
(1, 'test@test.com', '123test', 1),
(2, 'test2@test.com', '456test', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payfood`
--
ALTER TABLE `payfood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resturent`
--
ALTER TABLE `resturent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`rec_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payfood`
--
ALTER TABLE `payfood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `resturent`
--
ALTER TABLE `resturent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
