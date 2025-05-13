-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2025 at 01:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab7`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
                          `basket_id` int(11) NOT NULL,
                          `user_id` int(20) NOT NULL,
                          `portofolio_id` int(11) NOT NULL,
                          `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`basket_id`, `user_id`, `portofolio_id`, `quantity`) VALUES
                                                                               (1, 1, 1, 2),
                                                                               (2, 1, 2, 5),
                                                                               (3, 1, 15, 2),
                                                                               (4, 2, 2, 1),
                                                                               (5, 4, 16, 1),
                                                                               (6, 1, 16, 1),
                                                                               (7, 4, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
                              `portofolio_id` int(11) NOT NULL,
                              `title` varchar(255) NOT NULL,
                              `description` text NOT NULL,
                              `image_source` varchar(255) NOT NULL,
                              `category` varchar(50) NOT NULL,
                              `price` int(11) DEFAULT NULL,
                              `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`portofolio_id`, `title`, `description`, `image_source`, `category`, `price`, `user_id`) VALUES
                                                                                                                       (1, 'App 1', 'Lorem ipsum, dolor sit amet consectetur', 'assets/img/portfolio/app-1.jpg', 'app', 124, 1),
                                                                                                                       (2, 'Product 1', 'Lorem ipsum, dolor sit amet consectetur', 'assets/img/portfolio/product-1.jpg', 'product', NULL, 1),
                                                                                                                       (3, 'Branding 1', 'Lorem ipsum, dolor sit amet consectetur', 'assets/img/portfolio/branding-1.jpg', 'branding', NULL, 1),
                                                                                                                       (4, 'Books 1', 'Lorem ipsum, dolor sit amet consectetur', 'assets/img/portfolio/books-1.jpg', 'books', NULL, 1),
                                                                                                                       (5, 'App 2', 'Lorem ipsum, dolor sit amet consectetur', 'assets/img/portfolio/app-2.jpg', 'app', NULL, 1),
                                                                                                                       (6, 'Product 2', 'Lorem ipsum, dolor sit amet consectetur', 'assets/img/portfolio/product-2.jpg', 'product', NULL, 1),
                                                                                                                       (7, 'Branding 2', 'Lorem ipsum, dolor sit amet consectetur', 'assets/img/portfolio/branding-2.jpg', 'branding', NULL, 1),
                                                                                                                       (8, 'Books 2', 'Lorem ipsum, dolor sit amet consectetur', 'assets/img/portfolio/books-2.jpg', 'books', NULL, 1),
                                                                                                                       (9, 'App 3', 'Lorem ipsum, dolor sit amet consectetur', 'assets/img/portfolio/app-3.jpg', 'app', NULL, 1),
                                                                                                                       (10, 'Product 3', 'Lorem ipsum, dolor sit amet consectetur', 'assets/img/portfolio/product-3.jpg', 'product', NULL, 1),
                                                                                                                       (11, 'Branding 3', 'Lorem ipsum, dolor sit amet consectetur', 'assets/img/portfolio/branding-3.jpg', 'branding', NULL, 1),
                                                                                                                       (12, 'Books 3', 'Lorem ipsum, dolor sit amet consectetur', 'assets/img/portfolio/books-3.jpg', 'books', NULL, 1),
                                                                                                                       (13, 'lefteris', 'nothing', 'assets/img/hero-bg.jpg', 'product', 123, 1),
                                                                                                                       (14, 'd1213', 'dqwf12f12f12', 'assets/img/327561191_1286273755271717_7615924132062542865_n.jpg', 'app', 12, 1),
                                                                                                                       (15, 'lefteris', 'dqdwq', 'assets/img/Screenshot_20240501_042436.png', 'product', 123, 1),
                                                                                                                       (16, 'new', 'e1', 'assets/img/Screenshot_20231207_084028.png', 'app', 1, 4),
                                                                                                                       (17, 'lose streak', 'nothing special', 'assets/img/Screenshot_20240531_023656.png', 'app', 0, 1),
                                                                                                                       (18, 'lose streak', 'nothing special', 'assets/img/Screenshot_20240606_073720.png', 'app', 0, 1),
                                                                                                                       (19, 'e12', 'e21', 'assets/img/Screenshot_20240501_125628.png', 'product', 123, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `user_id` int(20) NOT NULL,
                         `firstname` varchar(25) NOT NULL,
                         `surname` varchar(25) NOT NULL,
                         `username` varchar(25) NOT NULL,
                         `password` varchar(25) NOT NULL,
                         `seller` tinyint(1) NOT NULL,
                         `customer` tinyint(1) NOT NULL,
                         `account_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `surname`, `username`, `password`, `seller`, `customer`, `account_date`) VALUES
                                                                                                                          (1, 'aaa', 'aaa', 'aaa', 'aaa', 1, 1, '2020-12-08 08:07:45'),
                                                                                                                          (2, 'bbb', 'bbb', 'bbb', 'bbb', 0, 1, '2020-12-08 08:12:32'),
                                                                                                                          (3, 'Eleftherios', 'Ilia', 'lefter', '1234', 0, 0, '2024-12-13 11:55:23'),
                                                                                                                          (4, 'lefteris', 'ilia', 'yep', '1234', 1, 0, '2024-12-13 12:00:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
    ADD PRIMARY KEY (`basket_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `portofolio_id` (`portofolio_id`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
    ADD PRIMARY KEY (`portofolio_id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
    MODIFY `basket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `portofolio`
--
ALTER TABLE `portofolio`
    MODIFY `portofolio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basket`
--
ALTER TABLE `basket`
    ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`portofolio_id`) REFERENCES `portofolio` (`portofolio_id`);

--
-- Constraints for table `portofolio`
--
ALTER TABLE `portofolio`
    ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
