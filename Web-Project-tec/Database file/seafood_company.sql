-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2021 at 07:46 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seafood_company`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`admin_id`, `name`, `user_name`, `password`, `last_login`) VALUES
(3, 'Isuru Madushan', 'isuru', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2021-10-07 11:01:48'),
(4, 'Kasun Dias', 'kasun', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2021-10-07 09:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` char(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `phone`, `email`, `subject`, `message`) VALUES
(1, 'isuru madushan', '+9471585952', 'Misuru543@gmail.com', 'regarding your companys\' deliver service', 'I still have not got my order yet '),
(2, 'Yoshan basura', '077-5893478', 'yoshan123@gmail.com', 'regarding deliver service', 'What should I do if my delivery is late?');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` char(11) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`customer_id`, `first_name`, `last_name`, `address`, `city`, `zip_code`, `email`, `phone_number`, `password`) VALUES
(1, 'isuru', 'madushan', '53/3, Hettiyakanda ,', 'Beruwala', '12070', 'Misuru543@gmail.com', '+9471585952', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(2, 'Yoshan', 'basura', '68/8', 'Aluthgama', '12087', 'yoshan123@gmail.com', '0781267527', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(3, 'Yamuna', 'Priyanthi', 'Kahena', 'Waga', '12070', 'yamuna123@gmail.com', '0774318158', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(4, 'Dileepa', 'saranga', 'Hettiyakanda, ', 'Beruwala', '12080', 'dileepa@gmail.com', '0775681230', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Table structure for table `delivered_orders`
--

CREATE TABLE `delivered_orders` (
  `deliver_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `deliver_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivered_orders`
--

INSERT INTO `delivered_orders` (`deliver_id`, `order_id`, `customer_id`, `category_id`, `quantity`, `total_price`, `deliver_date`) VALUES
(1, 2, 1, 8, 17, 17000, '2021-10-06 12:54:13'),
(2, 3, 1, 9, 20, 12000, '2021-10-06 12:54:46'),
(3, 4, 1, 6, 10, 5000, '2021-10-06 13:25:23'),
(4, 5, 1, 13, 25, 23750, '2021-10-06 17:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `category_id`, `quantity`, `total_price`, `customer_id`, `order_date`) VALUES
(6, 10, 15, 17250, 1, '2021-10-07 10:49:11'),
(7, 5, 7, 2450, 4, '2021-10-07 10:49:34'),
(8, 4, 31, 34100, 2, '2021-10-07 10:52:32'),
(9, 4, 1, 1100, 1, '2021-10-07 11:13:08');

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `after_orders_delivered` AFTER DELETE ON `orders` FOR EACH ROW BEGIN
insert into delivered_orders(category_id,customer_id,deliver_date,order_id,quantity,total_price)Values(old.category_id,old.customer_id,now(),old.order_id,old.quantity,old.total_price);
Update seafood_categories set quantity=quantity-old.quantity;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `seafood_categories`
--

CREATE TABLE `seafood_categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  `image_name` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seafood_categories`
--

INSERT INTO `seafood_categories` (`id`, `category_name`, `image_name`, `price`, `quantity`) VALUES
(3, 'Seer Fish', 'seer-fish.jpeg', 1200, 2130),
(4, 'Shrimp', 'shrimp.jpg', 1100, 1483),
(5, 'Salmon', 'Salmon.jpg', 350, 2016),
(6, 'Crabs', 'crabs.jpg', 500, 1751),
(7, 'Yellowin Tuna', 'Yellowfin_Tuna.jpg', 800, 2530),
(8, 'Black Marlin', 'black-marlin.jpg', 1000, 2108),
(9, 'Red Snapper', 'R.jfif', 600, 3021),
(10, 'Cuttle Fish', 'cuttle fish.jfif', 1150, 1718),
(13, 'Squid', 'squid-600x400-1.jpg', 950, 1854),
(14, 'King Prawn', 'king-prawn.jpg', 1050, 2265),
(15, 'Mackerel Fish', 'mackerel.jpg', 400, 3140);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `delivered_orders`
--
ALTER TABLE `delivered_orders`
  ADD PRIMARY KEY (`deliver_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `seafood_categories`
--
ALTER TABLE `seafood_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `delivered_orders`
--
ALTER TABLE `delivered_orders`
  MODIFY `deliver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `seafood_categories`
--
ALTER TABLE `seafood_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
