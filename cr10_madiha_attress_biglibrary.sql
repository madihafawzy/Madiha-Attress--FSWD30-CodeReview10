-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2018 at 03:32 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr10_madiha_attress_biglibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `date_of_write` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `first_name`, `last_name`, `date_of_write`) VALUES
(1, 'Danel', 'Dafenshi', '1965-12-01'),
(2, 'Dani', 'Karfachal', '1980-02-21'),
(3, 'Sami', 'Ösbek', '1995-06-30'),
(4, 'Natasha', 'Misto', '1950-02-08'),
(5, 'Omar', 'Tahsin', '1988-11-11'),
(6, 'Najwa', 'Karam', '1983-07-02'),
(7, 'Nansi', 'Ajram', '1920-06-13'),
(8, 'Tamer', 'Husni', '1963-05-19'),
(9, 'Ronaldo', 'Decabrio', '1965-12-01'),
(10, 'Mansi', 'Ajram', '1970-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `ISBN_code` int(11) DEFAULT NULL,
  `title` varchar(40) NOT NULL,
  `media_type` varchar(40) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desciption` varchar(55) NOT NULL,
  `publish_date` date DEFAULT NULL,
  `status` enum('available','reserved') DEFAULT NULL,
  `fk_author` int(11) DEFAULT NULL,
  `fk_publisher` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `ISBN_code`, `title`, `media_type`, `image`, `short_desciption`, `publish_date`, `status`, `fk_author`, `fk_publisher`) VALUES
(1, 1000033556, 'Dylan', 'CD', 'https://img.discogs.com/A-21QWvrp9FBgd7EQnuytRs9nl4=/fit-in/300x300/filters:strip_icc():format(jpeg):mode_rgb():quality(40)/discogs-images/R-2110088-1264541725.jpeg.jpg', 'rook song good album 45 minutes', '1999-12-05', 'available', 1, 1),
(2, 1000033566, 'City Light', 'DVD', 'https://i.ebayimg.com/thumbs/images/g/OjUAAOSwKoRZYiNi/s-l225.jpg', 'good movies 87 minutes great story', '1988-11-05', 'available', 2, 2),
(3, 1000033565, 'Lawrence of Arabiat', 'book', 'https://static.rogerebert.com/uploads/review/primary_image/reviews/lawrence-of-arabia-1989/hero_Lawrence_Ali2.jpg', 'great book with 200 pages ', '2010-05-18', 'reserved', 3, 3),
(4, 1000033559, 'Issacc Asimov', 'book', 'https://target.scene7.com/is/image/Target/14891666?wid=520&hei=520&fmt=pjpeg', 'Sade smoth soul is a good rating 5 stars', '2010-05-20', 'reserved', 4, 4),
(5, 1000033552, 'Woodwalkers', 'book', 'http://www.lizenzbranche.de/DBImages/lizenzen/woody.jpg', 'belletristik and the rating is 5 stars 1 kg book great ', '2002-11-11', 'reserved', 5, 5),
(6, 1000033552, 'Foundation', 'DVD', 'https://peterkazmaier.files.wordpress.com/2014/05/foundation.jpg', 'fantasy science fiction have 3 ratings star great DVD', '2009-01-01', 'available', 6, 6),
(7, 1000033999, 'The sandman', 'CD', 'https://img.ricardostatic.ch/t_600/pl/752765296/0/1/pop-p-s-sandman-simon-enderli-colours-cd', 'The sandman is a great cd movies  is a fantasy', '2015-11-15', 'available', 7, 7),
(8, 1000033999, 'Modesty Blaise', 'CD', 'https://i.pinimg.com/originals/88/b9/ab/88b9ab6921abe8343fa8f7e056dc6fd1.jpg', 'Titan CD is a great story with 5 ratings', '2000-08-09', 'reserved', 8, 8),
(9, 1000033989, 'DemoTwilight', 'DVD', 'https://images-na.ssl-images-amazon.com/images/I/81DoiIvaA-L._SL1415_.jpg', 'great movie the eclipse and great actores must see', '2001-05-12', 'available', 9, 9),
(10, 1000556688, 'Wolfaren', 'DVD', 'http://media.comicbook.com/2017/03/wolverine-trilogy-239008-1280x0.jpg', 'Great movies with 4 parts must see', '2017-12-01', 'reserved', 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisher_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `address` varchar(40) NOT NULL,
  `size` enum('large','medium','small') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisher_id`, `name`, `address`, `size`) VALUES
(1, 'TENsonaki', 'wien,1100 keplarplatz 30', 'large'),
(2, 'Demolaju', 'Österreich,wien,1100 keplarplatz 30', 'medium'),
(3, 'Bookstrorsi', 'USA LA komintan112', 'small'),
(4, 'chansuin', 'china opsiu 88', 'large'),
(5, 'Disnyto', 'Greec ,Kos Kintopaskal', 'small'),
(6, 'Qopadi', 'Saudi arabia,1100 pontioako 30', 'medium'),
(7, 'PADING', 'Kou,3688 linz 30', 'small'),
(8, 'Limposaki', 'Japan,1133 linyerstrasse 30', 'large'),
(9, 'poimPP', 'canada,1788 keplarplatz 30', 'medium'),
(10, 'Mandi', 'Koria,pomi lankoin nhhil 55', 'large');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `surname`, `user_name`, `email`, `password`, `register_date`) VALUES
(1, 'madiha', 'attress', 'madiha', 'madiha_fawzy76@yahoo.com', '8cfc81862832b47e5a25a5d8d75b10d52b6c85094419a5071cf7e3abc64f16cb', '2018-02-10 13:06:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`),
  ADD KEY `fk_author` (`fk_author`),
  ADD KEY `fk_publisher` (`fk_publisher`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`fk_author`) REFERENCES `author` (`author_id`),
  ADD CONSTRAINT `media_ibfk_2` FOREIGN KEY (`fk_publisher`) REFERENCES `publisher` (`publisher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
