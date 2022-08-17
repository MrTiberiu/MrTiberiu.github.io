-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 08, 2021 at 08:11 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prosjekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktiviteter`
--

CREATE TABLE `aktiviteter` (
  `id` int(11) NOT NULL,
  `aktivitet` varchar(255) NOT NULL,
  `mansvarlig` varchar(255) NOT NULL,
  `dato` date NOT NULL,
  `beskrivelse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aktiviteter`
--

INSERT INTO `aktiviteter` (`id`, `aktivitet`, `mansvarlig`, `dato`, `beskrivelse`) VALUES
(1, 'Bordtennis', 'Israil', '2021-11-01', 'I dag skal vi ha bordtennis konkuranse'),
(2, 'Drifting', 'Tiberiu', '2021-12-16', 'Vi skal ha en aktivitet hvor vi skal drifte \"lære å kjøre på is\" :)'),
(3, 'Gaming Kveld', 'Samuel', '2021-12-14', 'Gaming kveld i kinoen. Den nye Forza Horizon 5 er ute nå :)'),
(4, 'Robing a bank', 'Anonymous', '2021-12-23', 'We will come with more information soon!'),
(5, 'Programering', 'tiberiu', '2022-01-09', 'Programering time');

-- --------------------------------------------------------

--
-- Table structure for table `aktusr`
--

CREATE TABLE `aktusr` (
  `id` int(11) NOT NULL,
  `aktiv_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aktusr`
--

INSERT INTO `aktusr` (`id`, `aktiv_id`, `usr_id`) VALUES
(16, 1, 3),
(21, 2, 1),
(20, 3, 1),
(19, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `medlemer`
--

CREATE TABLE `medlemer` (
  `id` int(255) NOT NULL,
  `fornavn` varchar(255) DEFAULT NULL,
  `etternavn` varchar(255) DEFAULT NULL,
  `gateadresse` varchar(255) DEFAULT NULL,
  `postnummer` int(255) DEFAULT NULL,
  `poststed` varchar(255) DEFAULT NULL,
  `mobilnummer` int(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fødselsdato` date DEFAULT NULL,
  `kjønn` varchar(255) DEFAULT NULL,
  `interesser` varchar(255) DEFAULT NULL,
  `inetresser1` varchar(255) NOT NULL,
  `msiden` varchar(255) DEFAULT NULL,
  `roles` varchar(255) DEFAULT NULL,
  `kontingentstatus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medlemer`
--

INSERT INTO `medlemer` (`id`, `fornavn`, `etternavn`, `gateadresse`, `postnummer`, `poststed`, `mobilnummer`, `email`, `fødselsdato`, `kjønn`, `interesser`, `inetresser1`, `msiden`, `roles`, `kontingentstatus`) VALUES
(1, 'Tiberiu', 'Minzat', 'Leiv Eriksons vei 8', 4327, 'Sandnes', 98356544, 'mtiberiu123@gmail.com', '1992-04-20', 'boy', 'bil', 'film', '2021-11-08', 'Admin', 'betalt'),
(2, 'Israil', 'Gayrbekov', 'Svaleveien 13', 4626, 'Kristiansand', 98485157, 'israilg.00@gmail.com\n', '2000-12-23', 'boy', 'film', 'film', '2021-10-23', 'Admin', 'ubetalt'),
(3, 'Samuel', 'Minzat', 'Fruktveien 3', 4327, 'Kristiansand S', 98356275, 'mrtiberius23@gmail.com', '1992-04-20', 'boy', 'bil', 'trenning', '2021-11-08', 'Admin', 'ubetalt'),
(4, 'Ruben', 'Andreassen', 'Knausen 63', 3185, 'Kristiansand S', 41536603, 'ruandersen@gmail.com', '1975-12-10', 'girl', 'studie', 'film', '2021-11-08', 'Medlem', 'ubetalt'),
(5, 'Jake ', 'Matts', 'Prinsens vei 184', 4315, 'Sandnes', 99574879, 'kawasaki@gmail.no', '1992-04-22', 'boy', 'bil', 'trenning', '2013-07-05', 'Medlem', 'betalt');

-- --------------------------------------------------------

--
-- Table structure for table `medrol`
--

CREATE TABLE `medrol` (
  `id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medrol`
--

INSERT INTO `medrol` (`id`, `usr_id`, `role_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 3, 1),
(4, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Medlem'),
(3, 'Kursansvarlig'),
(4, 'Vakt');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`) VALUES
(1, 'tiberiu', 'cc03e747a6afbbcbf8be7668acfebee5'),
(2, 'samuel', '$2y$10$6JAXUSl2ViVUwztWbJISbu9CWVHXtVaS.YMJd.0Z.t.GoKtdQrwvm\n'),
(3, 'israil', 'abe45d28281cfa2a4201c9b90a143095'),
(4, 'tiberius', '$2y$10$q321o8bfZleBFvK.MyWJkOw6xU3CrtwTaHbZJT2RpPgY74V16oFzS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktiviteter`
--
ALTER TABLE `aktiviteter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `aktusr`
--
ALTER TABLE `aktusr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aktiv_id` (`aktiv_id`,`usr_id`),
  ADD KEY `usr_id` (`usr_id`);

--
-- Indexes for table `medlemer`
--
ALTER TABLE `medlemer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medrol`
--
ALTER TABLE `medrol`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usr_id` (`usr_id`,`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktiviteter`
--
ALTER TABLE `aktiviteter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `aktusr`
--
ALTER TABLE `aktusr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `medlemer`
--
ALTER TABLE `medlemer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `medrol`
--
ALTER TABLE `medrol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aktusr`
--
ALTER TABLE `aktusr`
  ADD CONSTRAINT `aktusr_ibfk_1` FOREIGN KEY (`aktiv_id`) REFERENCES `aktiviteter` (`id`),
  ADD CONSTRAINT `aktusr_ibfk_2` FOREIGN KEY (`usr_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `medrol`
--
ALTER TABLE `medrol`
  ADD CONSTRAINT `medrol_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `medrol_ibfk_2` FOREIGN KEY (`usr_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
