-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 05:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jkafwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(15, 'Claymar Pereyra', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(16, 'Jeanrey Paculan', 'jeanrey', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(13, 'Computer Accessories', 'Product_Category_586.png', 'Yes', 'Yes'),
(14, 'Fashion Accessories', 'Product_Category_204.png', 'Yes', 'Yes'),
(15, 'Mobile & Gadgets Accessories', 'Product_Category_690.png', 'Yes', 'Yes'),
(16, 'Shirts & Jackets', 'Product_Category_970.png', 'Yes', 'Yes'),
(17, 'Stationary', 'Product_Category_905.png', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_checkout`
--

CREATE TABLE `tbl_checkout` (
  `id` int(10) UNSIGNED NOT NULL,
  `product` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contactus`
--

CREATE TABLE `tbl_contactus` (
  `id` int(10) UNSIGNED NOT NULL,
  `your_name` varchar(255) NOT NULL,
  `your_email` varchar(255) NOT NULL,
  `your_review` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(44, 'Razer Jacket Windbreaker', 'Material: Nylon, Wool, Others\r\nStyle: Athletic, Basic', '3000.00', 'Product-Name-7062.png', 16, 'Yes', 'Yes'),
(45, 'ROG Jacket - Windbreaker', 'Material: Nylon, Wool, Others\r\nStyle: Athletic, Basic', '3000.00', 'Product-Name-4439.jpeg', 16, 'Yes', 'Yes'),
(47, 'Family T-Shirt with FREE facemask', 'Sizes: XS, S, M, L, XL\r\nPattern: Print\r\n', '400.00', 'Product-Name-196.jpeg', 16, 'Yes', 'Yes'),
(48, 'Vaccinated T-Shirt Designs 1-6', 'Materials: Dri-Fit\r\nSizes: S, M, L, XL, XXL\r\n', '350.00', 'Product-Name-6751.jpeg', 16, 'Yes', 'Yes'),
(49, 'Vaccinated T-Shirt Designs 7-12', 'Materials: Dri-Fit\r\nSizes: S, M, L, XL, XXL\r\n', '350.00', 'Product-Name-885.jpeg', 16, 'Yes', 'Yes'),
(50, 'Vaccinated T-Shirt Designs 19-24 ', 'Materials: Dri-Fit\r\nSizes: S, M, L, XL, XXL\r\n', '350.00', 'Product-Name-1978.jpeg', 13, 'Yes', 'Yes'),
(51, 'Vaccinated T-Shirt Designs 25-26', 'Materials: Dri-Fit\r\nSizes: S, M, L, XL, XXL\r\n', '350.00', 'Product-Name-3941.jpeg', 16, 'Yes', 'Yes'),
(52, 'Customized New Year T-Shirt', 'Material: Dri-Fit\r\nSizes: XS, S, M, XL\r\n', '350.00', 'Product-Name-7666.jpeg', 16, 'Yes', 'Yes'),
(53, 'Customized Acrylic Keyboard and Mouse Cover', 'Transparency: Above 92%\r\nDimension: 23 x 6 x 2.5 Inches\r\n', '1200.00', 'Product-Name-4700.jpeg', 13, 'Yes', 'Yes'),
(54, 'Asus ROG Acrylic Keyboard and Mouse Cover', 'Transparency: Above 92%\r\nDimension: 23 x 6 x 2.5 Inches\r\n', '1200.00', 'Product-Name-9293.jpeg', 13, 'Yes', 'Yes'),
(55, 'Steel Series Acrylic Keyboard and Mouse Cover', 'Transparency: Above 92%\r\nDimension: 23 x 6 x 2.5 Inches\r\n', '1300.00', 'Product-Name-8223.jpeg', 13, 'Yes', 'Yes'),
(56, 'Asus ROG Sublimation Facemask ', 'Material: Premium Neoprene Fabric\r\nSize: 7” x 5”\r\n', '160.00', 'Product-Name-2975.jpeg', 14, 'Yes', 'Yes'),
(57, 'Predator Sublimation Facemask ', 'Material: Premium Neoprene Fabric\r\nSize: 7” x 5”\r\n', '160.00', 'Product-Name-8118.jpeg', 14, 'Yes', 'Yes'),
(58, 'Raze Sublimation Facemask', 'Material: Premium Neoprene Fabric\r\nSize: 7” x 5”\r\n', '160.00', 'Product-Name-8953.jpeg', 14, 'Yes', 'Yes'),
(59, 'Razer Sublimation Facemask 3D 2021', 'Material: Premium Pro + Tek Fabric\r\nSize: 7” x 5”\r\n', '190.00', 'Product-Name-4911.jpeg', 14, 'Yes', 'Yes'),
(60, 'Predator Sublimation Facemask 3D 2021', 'Material: Premium Pro + Tek Fabric\r\nSize: 7” x 5”\r\n', '190.00', 'Product-Name-1766.jpeg', 14, 'Yes', 'Yes'),
(61, 'Toyota Contoured Sublimation Facemask', 'Material: Premium Neoprene Fabric\r\nSize: 7” x 5”\r\n', '160.00', 'Product-Name-2900.jpeg', 14, 'Yes', 'Yes'),
(62, 'Note10 Protector Pad', 'Size: 18 cm x 22 cm x 5mm (L * W * H)\r\nPackage weight: 180g / 6.34oz\r\n', '160.00', 'Product-Name-9533.jpeg', 15, 'Yes', 'Yes'),
(63, 'S20 Protector Pad', 'Size: 18 cm x 22 cm x 5mm (L * W * H)\r\nPackage weight: 180g / 6.34oz\r\n', '160.00', 'Product-Name-3801.jpeg', 15, 'Yes', 'Yes'),
(64, 'S21 5G Protector Pad', 'Size: 18 cm x 22 cm x 5mm (L * W * H)\r\nPackage weight: 180g / 6.34oz\r\n', '160.00', 'Product-Name-9422.jpeg', 15, 'Yes', 'Yes'),
(65, '2021 Razer ID Lace, Razer Lanyard', 'Width: 1 inch\r\nLength: 22 inches\r\n', '150.00', 'Product-Name-3639.jpeg', 17, 'Yes', 'Yes'),
(66, '2021 ROG ID Lace, ROG Lanyard', 'Width: 1 inch\r\nLength: 22 inches\r\n', '150.00', 'Product-Name-6402.jpeg', 17, 'Yes', 'Yes'),
(67, 'Axie ID Lace, Axie Lanyard', 'Width: 1 inch\r\nLength: 22 inches\r\n', '150.00', 'Product-Name-625.jpeg', 17, 'Yes', 'Yes'),
(68, 'Lace', 'Lace', '160.00', 'Product-Name-9664.jpeg', 17, 'Yes', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contactus`
--
ALTER TABLE `tbl_contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_contactus`
--
ALTER TABLE `tbl_contactus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
