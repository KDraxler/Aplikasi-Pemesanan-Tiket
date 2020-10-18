-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2020 at 04:11 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes2`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `idArtist` int(11) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `gender` enum('Female','Male') NOT NULL,
  `birthdate` date NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`idArtist`, `artist`, `gender`, `birthdate`, `picture`) VALUES
(1, 'Ariana Grande', 'Female', '2018-01-01', 'ariana.jpg'),
(2, 'Justin Bieber', 'Male', '1990-08-02', 'bCps4HFV_400x400.jpg'),
(4, 'Paramore', 'Male', '2018-06-12', 'download.jpg'),
(5, 'Selena Gomez', 'Female', '2018-06-04', 'Selena-Gomez-2018-Album-Details.jpg'),
(6, 'Exo', 'Male', '2018-06-15', 'exo.jpg'),
(7, 'Taylor Swift', 'Female', '2018-06-04', 'taylor-swift-2017-mert-marcus-111.jpg'),
(8, 'abdul somad', 'Male', '2018-10-09', '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `eventcategory`
--

CREATE TABLE `eventcategory` (
  `idCat` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eventcategory`
--

INSERT INTO `eventcategory` (`idCat`, `category`, `description`) VALUES
(1, 'Music', 'Is all about the rhythmmm'),
(2, 'islam', 'islam');

-- --------------------------------------------------------

--
-- Table structure for table `eventname`
--

CREATE TABLE `eventname` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `pict` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eventname`
--

INSERT INTO `eventname` (`id`, `name`, `description`, `pict`) VALUES
(1, 'Paramore After Laughter Tour', 'wawwwwwwwwaw', 'After_Laughter_Tour_Poster.jpg'),
(8, 'Purpose Tour', 'kakaaaakaaaaa', 'JustinBieber-500x5001.jpg'),
(9, 'Dangerous Woman Tour', 'kakikiki', 'Dangerous_Woman_Tour.png'),
(10, 'The EXO''rDIUM', 'kakuuuuu', 'Z_converted_converted-1466207755.jpg'),
(15, 'Revival Tour Concert Tour', 'kak', 'Selena_Gomez_-_Revival_Tour_poster.png'),
(16, 'Reputation Album Tour', 'yuhuyy', 'Taylor_Swifts_Reputation_Stadium_tour.png'),
(17, 'Lala Land', 'yaaaa', 'my-account-login-icon1.png'),
(18, 'Pengajian Tablig', 'blaaa', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `eventprice`
--

CREATE TABLE `eventprice` (
  `idPrice` int(11) NOT NULL,
  `schedule_id` int(11) DEFAULT NULL,
  `seat_id` int(11) NOT NULL,
  `remainTicket` int(11) NOT NULL,
  `availableTicket` int(11) NOT NULL,
  `price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eventprice`
--

INSERT INTO `eventprice` (`idPrice`, `schedule_id`, `seat_id`, `remainTicket`, `availableTicket`, `price`) VALUES
(1, 1, 1, 1, 30, 4300000),
(2, 1, 2, 300, 300, 5000000),
(3, 1, 5, 400, 400, 5500000),
(4, 1, 7, 200, 200, 1318000),
(5, 2, 6, 200, 200, 4050000),
(7, 2, 9, 350, 350, 4150000),
(8, 2, 10, 200, 200, 7356000),
(9, 5, 6, 93, 100, 100),
(10, 6, 6, 110, 120, 8392),
(11, 8, 11, 96, 100, 1318000),
(12, 13, 13, 192, 200, 200000),
(13, 13, 14, 400, 400, 100000),
(14, 11, 15, 498, 500, 100000),
(15, 14, 12, 93, 100, 150000),
(16, 11, 16, 400, 400, 200000),
(17, 13, 1, 20, 20, 100000),
(18, 13, 2, 40, 40, 150000),
(19, 13, 8, 100, 100, 200000),
(20, 16, 17, 177, 200, 100000),
(21, 17, 15, 0, 0, 800000),
(22, 17, 16, 0, 0, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `eventschedule`
--

CREATE TABLE `eventschedule` (
  `idSchedule` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `venue_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eventschedule`
--

INSERT INTO `eventschedule` (`idSchedule`, `event_id`, `cat_id`, `artist_id`, `venue_id`, `date`, `startTime`, `endTime`) VALUES
(1, 9, 1, 1, 1, '2018-07-18', '13:50:53', '23:00:00'),
(2, 10, 1, 6, 2, '2018-07-25', '16:00:50', '23:59:00'),
(4, 9, 1, 1, 3, '2018-06-30', '18:00:00', '23:00:00'),
(5, 1, 1, 4, 2, '2018-07-11', '17:00:00', '22:30:00'),
(6, 16, 1, 7, 2, '2018-07-23', '18:20:00', '03:00:00'),
(7, 16, 1, 7, 4, '2018-08-30', '13:50:00', '17:59:00'),
(8, 15, 1, 5, 4, '2018-09-27', '12:00:00', '15:00:00'),
(9, 8, 1, 2, 3, '2018-08-14', '10:00:00', '14:00:00'),
(10, 9, 1, 1, 5, '2018-07-31', '12:00:00', '17:00:00'),
(11, 9, 1, 1, 7, '2018-10-07', '12:00:00', '16:00:00'),
(12, 9, 1, 1, 8, '2018-08-23', '13:00:00', '22:00:00'),
(13, 9, 1, 1, 1, '2018-10-27', '07:00:00', '10:00:00'),
(14, 9, 1, 1, 11, '2018-10-30', '23:00:00', '03:00:00'),
(15, 17, 1, 2, 2, '2018-07-27', '20:00:00', '23:00:00'),
(16, 18, 2, 8, 12, '2018-12-10', '01:00:00', '05:00:00'),
(17, 1, 1, 4, 7, '2019-01-17', '19:00:00', '22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `eventseat`
--

CREATE TABLE `eventseat` (
  `idSeat` int(11) NOT NULL,
  `seatZone` varchar(255) NOT NULL,
  `Capacity` int(20) NOT NULL,
  `venue_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eventseat`
--

INSERT INTO `eventseat` (`idSeat`, `seatZone`, `Capacity`, `venue_id`) VALUES
(1, 'Tribune 1', 35, 1),
(2, 'Tribune 2', 200, 1),
(5, 'Tribune 3', 3000, 1),
(6, 'Festival A', 200, 2),
(7, 'West VIP', 100, 1),
(8, 'Hot VIP', 50, 1),
(9, 'Festival B', 400, 2),
(10, 'VVIP', 200, 2),
(11, 'Suite A', 100, 4),
(12, 'Tribun A', 200, 11),
(13, 'Tribun A', 200, 10),
(14, 'Tribun B', 500, 10),
(15, 'Tribun A', 500, 7),
(16, 'Tribun B', 500, 7),
(17, 'Tribun A', 200, 12);

-- --------------------------------------------------------

--
-- Table structure for table `eventvenue`
--

CREATE TABLE `eventvenue` (
  `idVenue` int(11) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eventvenue`
--

INSERT INTO `eventvenue` (`idVenue`, `venue`, `city`, `country`, `photo`) VALUES
(1, 'Glora Bung Karno', 'Jakarta', 'Indonesia', 'gbk.png'),
(2, 'Jiexpo-Kebayoran', 'Jakarta', 'Indonesia', 'jiexpo_kebayoran.jpg'),
(3, 'Trans Luxury Hall', 'Bandung', 'Indonesia', 'la.gif'),
(4, 'FedExField', 'Washington D.C', 'United States', '82477s.gif'),
(5, 'Gillette Stadium', 'Foxborough', 'United States', 'revolution-seating2017.png'),
(6, 'Rogers Center', 'Toronto', 'Canada', '83735s.gif'),
(7, 'Mercedes-Benz Stadium', 'Atlanta', 'Georgia', NULL),
(8, 'Optus Stadium', 'Perth', 'Australia', NULL),
(9, 'Etihad Stadium', 'Melbourne', 'Australia', NULL),
(10, 'Tokyo Dome', 'Tokyo', 'Japan', '12.jpg'),
(11, 'Mt Smart Stadium', 'Auckland', 'New Zealand', NULL),
(12, 'Masjid', 'Malag', 'Indonesia', '11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice` varchar(50) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `idOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice`, `gambar`, `idOrder`) VALUES
('INV/021118/028', 'default', 28),
('INV/021118/033', NULL, 33),
('INV/061218/035', 'gd.jpg', 35),
('INV/251118/034', NULL, 34),
('INV011118027', 'default', 27),
('INV026', 'default', 26);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `idOrder` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `creditCard` varchar(25) NOT NULL,
  `statusNotif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `idDetail` int(11) NOT NULL,
  `order_code` int(11) NOT NULL,
  `codeTicket` varchar(255) NOT NULL,
  `barcodePic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phoneNumber` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(25) NOT NULL,
  `pictureUser` varchar(255) NOT NULL,
  `statusNotif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `name`, `address`, `phoneNumber`, `email`, `username`, `password`, `level`, `pictureUser`, `statusNotif`) VALUES
(17, 'a', 'a', '0', 'a@a.a', 'a', '0cc175b9c0f1b6a831c399e269772661', 'superadmin', 'default.png', 0),
(18, 'Ariefad', 'Jl. Bandung', '080977745', 'ariefad@tiket.com', 'Ariefad', 'b21ffd3f5c8c9131de59d2545c3c6117', 'admin', 'default.png', 1),
(20, 'Ariefus', 'Jl. Bandung', '080977756', 'ariefus@tiket.com', 'Ariefus', 'b83d05ffcdfe2694272bcc9947a13980', 'user', 'default.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`idArtist`);

--
-- Indexes for table `eventcategory`
--
ALTER TABLE `eventcategory`
  ADD PRIMARY KEY (`idCat`);

--
-- Indexes for table `eventname`
--
ALTER TABLE `eventname`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventprice`
--
ALTER TABLE `eventprice`
  ADD PRIMARY KEY (`idPrice`),
  ADD KEY `fk_eventSchedule` (`schedule_id`),
  ADD KEY `fk_eventSeat` (`seat_id`);

--
-- Indexes for table `eventschedule`
--
ALTER TABLE `eventschedule`
  ADD PRIMARY KEY (`idSchedule`),
  ADD KEY `fk_eventCat` (`cat_id`),
  ADD KEY `fk_eventName2` (`event_id`),
  ADD KEY `fk_eventVenue2` (`venue_id`),
  ADD KEY `fk_eventArtist` (`artist_id`);

--
-- Indexes for table `eventseat`
--
ALTER TABLE `eventseat`
  ADD PRIMARY KEY (`idSeat`),
  ADD KEY `fk_venue` (`venue_id`);

--
-- Indexes for table `eventvenue`
--
ALTER TABLE `eventvenue`
  ADD PRIMARY KEY (`idVenue`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `fk_iduser` (`user_id`),
  ADD KEY `fk_schedule` (`schedule_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`idDetail`),
  ADD KEY `fk_orderCode` (`order_code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `idArtist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `eventcategory`
--
ALTER TABLE `eventcategory`
  MODIFY `idCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `eventname`
--
ALTER TABLE `eventname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `eventprice`
--
ALTER TABLE `eventprice`
  MODIFY `idPrice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `eventschedule`
--
ALTER TABLE `eventschedule`
  MODIFY `idSchedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `eventseat`
--
ALTER TABLE `eventseat`
  MODIFY `idSeat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `eventvenue`
--
ALTER TABLE `eventvenue`
  MODIFY `idVenue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `idDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `eventprice`
--
ALTER TABLE `eventprice`
  ADD CONSTRAINT `fk_eventSchedule` FOREIGN KEY (`schedule_id`) REFERENCES `eventschedule` (`idSchedule`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_eventSeat` FOREIGN KEY (`seat_id`) REFERENCES `eventseat` (`idSeat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eventschedule`
--
ALTER TABLE `eventschedule`
  ADD CONSTRAINT `fk_eventArtist` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`idArtist`),
  ADD CONSTRAINT `fk_eventCat` FOREIGN KEY (`cat_id`) REFERENCES `eventcategory` (`idCat`),
  ADD CONSTRAINT `fk_eventName2` FOREIGN KEY (`event_id`) REFERENCES `eventname` (`id`),
  ADD CONSTRAINT `fk_eventVenue2` FOREIGN KEY (`venue_id`) REFERENCES `eventvenue` (`idVenue`);

--
-- Constraints for table `eventseat`
--
ALTER TABLE `eventseat`
  ADD CONSTRAINT `fk_venue` FOREIGN KEY (`venue_id`) REFERENCES `eventvenue` (`idVenue`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_iduser` FOREIGN KEY (`user_id`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_schedule` FOREIGN KEY (`schedule_id`) REFERENCES `eventschedule` (`idSchedule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_orderCode` FOREIGN KEY (`order_code`) REFERENCES `order` (`idOrder`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
