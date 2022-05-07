-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2022 at 10:45 AM
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
-- Database: `fashion_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(300) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`name`, `description`, `price`, `photo`, `id`) VALUES
('Trench coats Read', 'The trench coat is well-associated with Korean fashion because of K-pop idols and celebrities. Although it may come off a simple, it is a fashion must-have in adding an air of elegance and class to a simple outfit.', 6500, 'FASHION_627238277bd6d7.33272979.jpg', 17),
('Long floral dresses', 'When it comes to choosing a Korean dress, floral dresses are all the rage this 2020. Choose a long and flowy flower printed dress for an eye-catching girly outfit. Finer dress details like ribbons, bell sleeves, and ruffles are a bonus for a genuinely Korean inspired outfit', 699.5, 'FASHION_627238739ca403.01634897.jpg', 18),
('Long pleated skirts', 'Do you want to add more skirts to your wardrobe? Grab yourself a long pleated skirt to wear with almost everything. It looks amazing layered over with a jacket or trench coat, or perhaps worn with a sweater or turtleneck', 999.99, 'FASHION_627238abd68e07.22501659.jpg', 19),
('Straight cut white pants and boots', 'Never underestimate the fashion power of white pants. In Korean wear and K-Pop attire, high-waist, straight-cut white pants bring luster to an outfit. It goes without saying that white matches with almost everything and brings balance to the overall look', 3000, 'FASHION_62723b95cfa337.32191076.jpg', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
