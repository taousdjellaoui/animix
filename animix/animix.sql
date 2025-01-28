-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2023 at 03:48 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animix`
--

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `typee` enum('anime','film') NOT NULL,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `likes` int(11) DEFAULT '0',
  `dislikes` int(11) DEFAULT '0',
  `image` varchar(2048) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `typee`, `titre`, `auteur`, `categorie`, `likes`, `dislikes`, `image`) VALUES
(1, 'anime', 'Attack on Titan', 'Hajime Isayama', 'Shonen', 0, 0, 'img/aot.jpg'),
(2, 'anime', 'One Punch Man', 'ONE', 'Shonen', 0, 0, 'img/one-punch-man.jpg'),
(3, 'anime', 'Death Note', 'Tsugumi Ohba', 'Shonen', 0, 0, 'img/death-note.jpg'),
(4, 'anime', 'Naruto', 'Masashi Kishimoto', 'Shonen', 0, 0, 'img/naruto.jpg'),
(5, 'anime', 'My Hero Academia', 'Kohei Horikoshi', 'Shonen', 0, 0, 'img/mha.jpg'),
(6, 'anime', 'Fullmetal Alchemist: Brotherhood', 'Hiromu Arakawa', 'Shonen', 0, 0, 'img/fma.jpg'),
(7, 'anime', 'Demon Slayer', 'Koyoharu Gotouge', 'Shonen', 0, 0, 'img/demon_slayer.jpg'),
(8, 'anime', 'Cowboy Bebop', 'Shinichiro Watanabe', 'Seinen', 0, 0, 'img/cowboy_bebop.jpg'),
(9, 'anime', 'Bleach', 'Tite Kubo', 'Shonen', 0, 0, 'img/bleach.jpg'),
(10, 'anime', 'Dragon Ball Z', 'Akira Toriyama', 'Shonen', 0, 0, 'img/dbz.jpg'),
(11, 'anime', 'Black Clover', 'Yuki Tabata', 'Shonen', 0, 0, 'img/black_clover.jpg'),
(12, 'anime', 'Steins;Gate', '5pb. & Nitroplus', 'Science Fiction', 0, 0, 'img/stein_gate.jpg'),
(13, 'anime', 'One Piece', 'Eiichiro Oda', 'Shonen', 0, 0, 'img/one-piece.jpg'),
(14, 'anime', 'Code Geass', 'Ichiro Okouchi', 'Mecha', 0, 0, 'img/code_geass.jpg'),
(15, 'anime', 'Tokyo Ghoul', 'Sui Ishida', 'Seinen', 0, 0, 'img/tokyo.jpg'),
(16, 'anime', 'Ranma 1-2', 'Rumiko Takahashi', 'Shonen', 0, 0, 'img/ranma12.jpeg'),
(17, 'film', 'The Shawshank Redemption', 'Frank Darabont', 'Drama', 0, 0, 'img/the_shawshank.jpg'),
(18, 'film', 'The Godfather', 'Francis Ford Coppola', 'Crime', 0, 0, 'img/godfather.jpg'),
(19, 'film', 'Pulp Fiction', 'Quentin Tarantino', 'Crime', 0, 0, 'img/pulp_fiction.jpg'),
(20, 'film', 'The Dark Knight', 'Christopher Nolan', 'Action', 0, 0, 'img/batman.jpg'),
(21, 'film', 'Inception', 'Christopher Nolan', 'Sci-Fi', 0, 0, 'img/inception.jpg'),
(22, 'film', 'Fight Club', 'David Fincher', 'Drama', 0, 0, 'img/fight-club.jpg'),
(23, 'film', 'Forrest Gump', 'Robert Zemeckis', 'Drama', 0, 0, 'img/forrest-gump.jpg'),
(24, 'film', 'The Matrix', 'The Wachowski Brothers', 'Sci-Fi', 0, 0, 'img/matrix.jpg'),
(25, 'film', 'The Lord of the Rings', 'Peter Jackson', 'Adventure', 0, 0, 'img/seignieur_anneau.jpg'),
(26, 'film', 'Interstellar', 'Christopher Nolan', 'Sci-Fi', 0, 0, 'img/interstellar.jpg'),
(27, 'film', 'Gladiator', 'Ridley Scott', 'Action', 0, 0, 'img/gladiator.jpg'),
(28, 'film', 'Schindler\'s List', 'Steven Spielberg', 'Drama', 0, 0, 'img/schinderlist.jpg'),
(29, 'film', 'The Silence of the Lambs', 'Jonathan Demme', 'Thriller', 0, 0, 'img/silence.jpg'),
(30, 'film', 'Titanic', 'James Cameron', 'Drama', 0, 0, 'img/titanic.jpg'),
(31, 'film', 'Goodfellas', 'Martin Scorsese', 'Crime', 0, 0, 'img/goodfellas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `user_id` int(11) NOT NULL,
  `nom_utilisateur` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `adresse_email` varchar(255) NOT NULL,
  `statut` enum('utilisateur','admin') NOT NULL DEFAULT 'utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`user_id`, `nom_utilisateur`, `mot_de_passe`, `adresse_email`, `statut`) VALUES
(1, 'admin', 'admin', 'admin@crosemont.qc.ca', 'admin'),
(2, 'user', 'user', 'user@crosemont.qc.ca', 'utilisateur'),
(4, 'test', 'XXXXX', 'aaabbb@cc.com', 'utilisateur');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `watchlist_id` int(11) NOT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`watchlist_id`, `utilisateur_id`, `media_id`) VALUES
(35, 1, 7),
(36, 1, 19),
(37, 1, 24),
(38, 1, 25),
(39, 2, 3),
(40, 2, 2),
(41, 2, 5),
(42, 2, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `nom_utilisateur` (`nom_utilisateur`),
  ADD UNIQUE KEY `adresse_email` (`adresse_email`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`watchlist_id`),
  ADD UNIQUE KEY `watchlist_id` (`watchlist_id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`),
  ADD KEY `media_id` (`media_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `watchlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `watchlist_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`user_id`),
  ADD CONSTRAINT `watchlist_ibfk_2` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
