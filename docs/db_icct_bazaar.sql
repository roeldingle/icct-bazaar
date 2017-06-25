-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2017 at 10:07 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_icct_bazaar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_items`
--

CREATE TABLE `tb_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_category_id` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `name` varchar(60) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_id` int(1) NOT NULL DEFAULT '0',
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_items`
--

INSERT INTO `tb_items` (`id`, `user_id`, `item_category_id`, `label`, `name`, `price`, `description`, `date_posted`, `status_id`, `image_url`) VALUES
(1, 1, 1, 'Apple Iphone 7', '', 12000, 'This is my personal phone that I love. Latest iPhone in Market.', '2017-06-18 09:44:33', 1, 'admin/uploads/items/iphone.jpg'),
(2, 2, 3, 'Second Hand Books', '', 200, 'Random second hand books for selling', '2017-06-18 11:29:20', 1, 'admin/uploads/items/books.jpg'),
(3, 3, 2, 'ICCT uniform', '', 350, 'Pre-owned uniform for ICCT BSIT students size 12', '2017-06-18 11:32:34', 1, 'admin/uploads/items/uniform.jpg'),
(4, 2, 4, 'Fidget Spinner', '', 120, 'Brand new spinner that can make you a genius.', '2017-06-16 18:30:00', 1, 'admin/uploads/items/fidget-spinner.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_item_category`
--

CREATE TABLE `tb_item_category` (
  `id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_item_category`
--

INSERT INTO `tb_item_category` (`id`, `label`, `name`, `image_url`) VALUES
(1, 'Gadgets', 'gadgets', 'images/category/gadgets.jpg\n'),
(2, 'Clothes', 'clothes', 'images/category/clothes.jpg'),
(3, 'School supplies', 'school-supplies', 'images/category/school_supplies.jpg'),
(4, 'Accessories', 'accessories', 'images/category/accessories.jpg'),
(5, 'Shoes', 'shoes', 'images/category/shoes.jpg'),
(6, 'Bags', 'bags', 'images/category/bags.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_item_status`
--

CREATE TABLE `tb_item_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_item_status`
--

INSERT INTO `tb_item_status` (`id`, `name`) VALUES
(1, 'Available'),
(2, 'Sold');

-- --------------------------------------------------------

--
-- Table structure for table `tb_site_info`
--

CREATE TABLE `tb_site_info` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `tagline` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_site_info`
--

INSERT INTO `tb_site_info` (`id`, `title`, `tagline`) VALUES
(1, 'ICCT Bazaar', 'ICCT students buy and sell without the hassle. We help you find the product you need and make the deal with fellow students.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `image_url` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `user_role_id`, `email`, `password`, `fname`, `lname`, `contact`, `image_url`, `is_active`, `date_reg`) VALUES
(1, 1, 'jaymiedingle@gmail.com', '123456', 'Jaymie', 'Dingle', '09106225625', 'admin/uploads/users/jaymie.jpg', 1, '2017-06-17 18:30:00'),
(2, 2, 'dcmacaloi@gmail.com', '111111', 'Desiree', 'Macaloi', '0911111098', 'admin/uploads/users/desiree.jpg', 1, '2017-06-17 18:30:00'),
(3, 2, 'jaynarivera@gmail.com', '111111', 'Jayna', 'Rivera', '091211133233', 'admin/uploads/users/jayna.jpg', 1, '2017-06-17 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_role`
--

CREATE TABLE `tb_user_role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_items`
--
ALTER TABLE `tb_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_item_category`
--
ALTER TABLE `tb_item_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`name`);

--
-- Indexes for table `tb_item_status`
--
ALTER TABLE `tb_item_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site_info`
--
ALTER TABLE `tb_site_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_items`
--
ALTER TABLE `tb_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_item_category`
--
ALTER TABLE `tb_item_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_item_status`
--
ALTER TABLE `tb_item_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_site_info`
--
ALTER TABLE `tb_site_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
