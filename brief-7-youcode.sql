-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 17 nov. 2022 à 21:53
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `brief-7-youcode`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'one'),
(2, 'two');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(250) NOT NULL,
  `category` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `image2` varchar(200) DEFAULT NULL,
  `image3` varchar(200) DEFAULT NULL,
  `image4` varchar(200) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`ID`, `name`, `description`, `category`, `price`, `quantity`, `image`, `image2`, `image3`, `image4`, `date`) VALUES
(1, 'ffffffffffffffff', 'fffffffffffffffffff\r\n          ', 1, 1, 1, 'uploads/1668683581Capture d’écran (2).png', NULL, NULL, NULL, '2022-11-17 12:13:01'),
(2, 'kkkkkkkkkkkkkk', 'kkkkkkkkkkkkkkkkkkk\r\n          ', 1, 1, 1, 'uploads/16686083609.jpg', NULL, NULL, NULL, '2022-11-16 15:19:20'),
(3, 'lrtklkrkt', 'rtrtrtrtrtrtrtrtr', 2, 4, 4, 'uploads/16686109179.jpg', NULL, NULL, NULL, '2022-11-16 16:01:57'),
(4, 'ooooooo', '\r\n          iiiiiiiiiii', 1, 1, 1, 'uploads/16686138573.jpg', NULL, NULL, NULL, '2022-11-16 16:50:57'),
(5, 'ffffffffffff', '\r\n          ffffffffff', 1, 1, 1, 'uploads/166861477910.jpg', NULL, NULL, NULL, '2022-11-16 17:06:19'),
(6, 'ddddddd', 'dddddddddd\r\n          ', 1, 1, 1, 'uploads/16686151419.jpg', NULL, NULL, NULL, '2022-11-16 17:12:21'),
(7, 'ggggggggggggg', 'hyjjj\r\n          ', 1, 1, 1, 'uploads/16686152275.jpg', NULL, NULL, NULL, '2022-11-16 17:13:47'),
(8, 'jjjjjjjjj', 'jjjjjjjjjjjjjjj\r\n          ', 1, 1, 1, 'uploads/16686156115.jpg', NULL, NULL, NULL, '2022-11-16 17:20:11'),
(9, 'tttttttttttttttttt', '\r\n          ttttttttttttt', 1, 1, 1, 'uploads/16686157748.jpg', NULL, NULL, NULL, '2022-11-16 17:22:54'),
(10, 'ttttttttttttt', 'tttttttttttttt\r\n          ', 1, 1, 1, 'uploads/16686158695.jpg', NULL, NULL, NULL, '2022-11-16 17:24:29'),
(11, 'jjjjjjjjjjjj', 'jjjjjjjjjjjjjjjjjj\r\n          ', 1, 1, 1, 'uploads/16686162663.jpg', NULL, NULL, NULL, '2022-11-16 17:31:06'),
(16, 'fffffffffffffffffffffffff', 'fffffffffffffffffff\r\n          ', 1, 1, 1, 'uploads/16686962605.jpg', NULL, NULL, NULL, '2022-11-17 15:44:20');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID` bigint(20) NOT NULL,
  `url_address` varchar(255) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID`, `url_address`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `date`) VALUES
(1, 'KUlXiclykmyjVI7peCbntW9xzsDRcIQiAGA6k5io8I4vOT1', 'mugiwara', 'luffy', 'bousil@gmail.com', 'luffy_1032', 667564783, '2022-11-15 11:31:17'),
(2, 'CaNZz3Ipm0mg8BAvlypOYpypwmOh6ZeAxWsXTDwNkMXv4Q12bZSPLYG', 'ronono', 'zoro', 'zoro@gmail.com', 'mugiwara1032', 666666666, '2022-11-15 11:39:24');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `category` (`category`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `url_address` (`url_address`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
