-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2017 at 04:21 PM
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
  `name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_status_id` int(1) NOT NULL DEFAULT '0',
  `image_url` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_items`
--

INSERT INTO `tb_items` (`id`, `user_id`, `item_category_id`, `name`, `price`, `description`, `date_posted`, `item_status_id`, `image_url`, `is_active`) VALUES
(1, 15, 1, 'Apple Iphone 7', 12000, 'This is my personal phone that I love. Latest iPhone in Market.', '2017-06-18 09:44:33', 4, 'admin/uploads/items/iphone.jpg', 1),
(2, 15, 3, 'Second Hand Books', 200, 'Random second hand books for selling', '2017-06-18 11:29:20', 1, 'admin/uploads/items/books.jpg', 1),
(3, 15, 2, 'ICCT uniform', 350, 'Pre-owned uniform for ICCT BSIT students size 12', '2017-06-18 11:32:34', 1, 'admin/uploads/items/uniform.jpg', 1),
(4, 15, 4, 'Fidget Spinner', 120, 'Brand new spinner that can make you a genius.', '2017-06-16 18:30:00', 1, 'admin/uploads/items/fidget-spinner.jpg', 1),
(5, 21, 2, 'Baby Dress', 650, 'Cute two pieces baby top and pink dress for your small princess', '2017-07-02 06:44:06', 4, 'admin/uploads/items/1498977846229245958963653161-0ffc1aa1d2533ef4aeaa7d7d0290c4a1.jpg', 1),
(6, 21, 1, 'PS4 renting', 200, '200 per hour', '2017-07-02 06:48:11', 2, 'admin/uploads/items/14989780916325958972bf2ee1-ps4-pro-two-column-buy-02-eu-06sep15.png', 1),
(7, 21, 1, 'Clash of Clan account', 500, 'Townhall 10 account with builder base new feature', '2017-07-02 06:55:18', 1, 'admin/uploads/items/149897851818870595898d646ef1-download.jpg', 1),
(8, 21, 6, 'Jansport Backpack', 1600, 'Branded backpack made from the USA', '2017-07-02 07:06:45', 3, 'admin/uploads/items/14989792052235559589b8520a27-red-jansport.jpg', 1),
(9, 21, 5, 'Nike Kryie 2', 6400, 'Kyrie 2 brand new nike shoe', '2017-07-02 08:06:57', 4, 'admin/uploads/items/149898281734645958a9a10f354-nike-kyrie-3-kyrache-852396-007-323x215.jpg', 1),
(12, 21, 4, 'VCM Technician', 650, 'Hire a VCM technician for a days work', '2017-07-02 09:58:26', 2, 'admin/uploads/items/14989900221545958c5c65a65d-13133289_1330621720288433_7917976570848796641_n.jpg', 1),
(14, 15, 4, 'Yummy Yema Cake', 120, 'Home made Yummy Yema Cake', '2017-07-02 10:42:03', 1, 'admin/uploads/items/1498992271288975958ce8fce9db-12310517_1211308632219743_8194212334010780873_n.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_item_category`
--

CREATE TABLE `tb_item_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `theme` text NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_item_category`
--

INSERT INTO `tb_item_category` (`id`, `name`, `theme`, `image_url`) VALUES
(1, 'Gadgets', 'success', 'images/category/gadgets.jpg\n'),
(2, 'Clothes', 'info', 'images/category/clothes.jpg'),
(3, 'School supplies', 'warning', 'images/category/school_supplies.jpg'),
(4, 'Accessories', 'default', 'images/category/accessories.jpg'),
(5, 'Shoes', 'danger', 'images/category/shoes.jpg'),
(6, 'Bags', 'primary', 'images/category/bags.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_item_status`
--

CREATE TABLE `tb_item_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `theme` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_item_status`
--

INSERT INTO `tb_item_status` (`id`, `name`, `theme`) VALUES
(1, 'For Sale', 'success'),
(2, 'For rent', 'info'),
(3, 'On hand', 'danger'),
(4, 'Sold', 'default');

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
(15, 3, 'jaymiedingle@gmail.com', '96e79218965eb72c92a549dd5a330112', 'Jaymie', 'Dingle', '09106225625', 'admin/uploads/users/149899662641895958df9272121-Nice!2047.jpg', 1, '2017-07-02 05:29:58'),
(20, 3, 'rinoa@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Rinoa', 'Dingle', '091111111', '', 1, '2017-07-02 06:13:47'),
(21, 3, 'roeldingle@gmail.com', '77b182f33eff49a3b70206e530bb47a3', 'Roel', 'Dingle', '09103629974', 'admin/uploads/users/1498996404151715958deb4744ba-Nice!2055.jpg', 1, '2017-07-02 06:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_role`
--

CREATE TABLE `tb_user_role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_role`
--

INSERT INTO `tb_user_role` (`id`, `name`) VALUES
(1, 'Superadmin'),
(2, 'Admin'),
(3, 'Member');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_item_category`
--
ALTER TABLE `tb_item_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_item_status`
--
ALTER TABLE `tb_item_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_site_info`
--
ALTER TABLE `tb_site_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
