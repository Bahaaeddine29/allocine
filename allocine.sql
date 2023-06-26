-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 26 juin 2023 à 14:09
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `allocine`
--

-- --------------------------------------------------------

--
-- Structure de la table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `release_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `movie`
--

INSERT INTO `movie` (`id`, `title`, `release_date`) VALUES
(1, 'Le Parrain', '1972-08-23'),
(2, 'Citizen Kane', '1941-08-23'),
(3, 'Star Wars : Un nouvel espoir ', '1977-08-23'),
(4, 'Le Seigneur des anneaux', '2001-08-23'),
(5, 'Pulp Fiction', '1994-08-23'),
(6, 'Les Évadés', '1994-08-23'),
(7, 'Fight Club', '1999-08-23'),
(8, 'Inception', '2010-08-23'),
(9, 'Forrest Gump', '1994-08-23'),
(10, 'Les Affranchis', '1990-08-23'),
(11, 'La Liste de Schindler', '1993-08-23'),
(12, 'Matrix', '1999-08-23'),
(13, 'Les Dents de la mer', '1975-08-23'),
(14, 'Les Sept Samouraïs', '1954-08-23'),
(15, 'Blade Runner', '1982-08-23');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
