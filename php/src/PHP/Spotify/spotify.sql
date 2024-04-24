-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : mer. 24 avr. 2024 à 09:37
-- Version du serveur : 8.1.0
-- Version de PHP : 8.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `spotify`
--

-- --------------------------------------------------------

--
-- Structure de la table `artists`
--

CREATE TABLE `artists` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `date_of_birth` date NOT NULL,
  `poster` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `artists`
--

INSERT INTO `artists` (`id`, `name`, `bio`, `gender`, `date_of_birth`, `poster`) VALUES
(7, 'Linkin Park', 'USA', 'Male', '1996-01-26', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6d/Linkin_Park-Rock_im_Park_2014-_by_2eight_3SC0327.jpg/640px-Linkin_Park-Rock_im_Park_2014-_by_2eight_3SC0327.jpg'),
(8, 'Bicep', 'USA', 'Male', '2022-06-26', 'https://media.pitchfork.com/photos/5988758d3856b35633c038b2/1:1/w_450%2Cc_limit/bicep%2520glue%2520cover.jpg'),
(9, 'Foster The People', 'USA', 'Male', '2009-06-26', 'https://www.billboard.com/wp-content/uploads/media/foster-the-people-2018-cr-Neil-Krug-billboard-1548.jpg'),
(15, 'testa', 'USA', 'Male', '2023-10-31', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6d/Linkin_Park-Rock_im_Park_2014-_by_2eight_3SC0327.jpg/640px-Linkin_Park-Rock_im_Park_2014-_by_2eight_3SC0327.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `playlists`
--

CREATE TABLE `playlists` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `user_id`) VALUES
(3, 'Playlist1', 2),
(4, 'Playlist2', 2),
(5, 'Playlist3', 2),
(6, 'Playlist1', 3),
(7, 'Playlist1', 6),
(8, 'Playlist2', 6),
(9, 'conduite', 7),
(10, 'à manger', 7),
(11, 'car', 8),
(12, 'sport', 8),
(13, 'test', 2),
(14, '', 2),
(15, 'test2', 2),
(16, 'vrr', 2),
(17, 'test3', 2),
(18, 'test4', 2),
(19, 'test4', 2),
(20, 'rebzebze', 2),
(21, 'rtnrtn', 2),
(22, 'Playlist1', 9),
(23, 'Playlist1', 10);

-- --------------------------------------------------------

--
-- Structure de la table `playlist_songs`
--

CREATE TABLE `playlist_songs` (
  `playlist_id` int NOT NULL,
  `songs_id` int NOT NULL,
  `position` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `playlist_songs`
--

INSERT INTO `playlist_songs` (`playlist_id`, `songs_id`, `position`) VALUES
(3, 13, 0),
(4, 14, 0),
(4, 15, 1),
(3, 14, 1),
(5, 13, 0),
(5, 18, 1),
(3, 16, 2),
(4, 18, 2),
(3, 15, 2),
(4, 16, 2),
(5, 16, 1),
(7, 13, 0),
(7, 14, 1),
(7, 15, 2),
(8, 16, 0),
(8, 17, 1),
(8, 18, 2),
(9, 13, 0),
(9, 14, 1),
(9, 15, 2),
(10, 16, 1),
(10, 17, 2),
(10, 18, 3),
(11, 13, 0),
(11, 14, 1),
(11, 15, 2),
(12, 15, 0),
(12, 16, 1),
(12, 17, 2),
(12, 18, 3),
(13, 16, 0),
(13, 17, 1),
(3, 18, 4),
(22, 13, 0),
(22, 14, 1),
(22, 15, 2),
(22, 16, 3),
(22, 18, 4),
(23, 13, 0),
(23, 14, 1);

-- --------------------------------------------------------

--
-- Structure de la table `songs`
--

CREATE TABLE `songs` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `artist_id` int NOT NULL,
  `path` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `songs`
--

INSERT INTO `songs` (`id`, `title`, `release_date`, `artist_id`, `path`) VALUES
(13, 'Lost', '2023-01-26', 7, 'songs/Lost [Official Music Video] - Linkin Park.mp3 '),
(14, 'Castle of Glass', '2022-02-26', 7, 'songs/CASTLE OF GLASS [Official Music Video] - Linkin Park.mp3 '),
(15, 'Breaking The Habbit', '2021-06-26', 7, 'songs/Breaking the Habit (Official Music Video) [HD UPGRADE] – Linkin Park.mp3 '),
(16, 'Glue', '2023-03-26', 8, 'songs/BICEP  GLUE (Official Video).mp3 '),
(17, 'Opal', '2022-07-26', 8, 'songs/BICEP  OPAL (FOUR TET REMIX).mp3 '),
(18, 'Houdinii', '2020-06-26', 7, 'songs/Foster The People - Houdini (Video).mp3 '),
(30, 'erherherh,yr', '2023-10-04', 8, 'songs/Foster The People - Houdini (Video).mp3 '),
(31, 'rgzgze', '2023-09-05', 9, 'songs/Foster The People - Houdini (Video).mp3 ');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(2, 'test', 'test@hotmail.com', '$2y$10$nfZHhZtQOwATykjv/u/r/OtyVM1i1cD9.425i2NMbRpOkeDsGJnVW'),
(3, 'test2', 'test2@hotmail.com', '$2y$10$CGt2dzzPWTfHFQ0yU4R8Pe/KNLQGJMA1e1lSaDu8A8nX3EmnielkG'),
(4, 'test2', 'test2@hotmail.com', '$2y$10$fdIIIXuHJP8u06xS7vqvR.9NikHjiJx6k/hDfemROntKs/AkOM44q'),
(5, 'test2', 'test2@hotmail.com', '$2y$10$jSV6h9394Hd5xBglChTV8uwP6jV0ATKthShPkLe9pJlSnSYvia.mq'),
(6, 'papa', 'papa@hotmail.com', '$2y$10$aJMDnDNtLHAqNkxz8.xUM.bMgeC3FaJ8424L1cc7OvRbeTSL5/dBi'),
(7, 'maman', 'maman@hotmail.com', '$2y$10$11RexMMiUnaKt/81QKae5e7FAek73p8gwEt.VAmloaQYZ6qZnQCgO'),
(8, 'thomas', 'thomas@hotmail.com', '$2y$10$6yUOZYWDuxYyZ1nQaV.Kz.1InGpB/w4eAYkfL1MqR4q76nqmo17YW'),
(9, 'ww', 'www@hotmail.com', '$2y$10$rO7yTPCAF6gWYfMkeM0EmO2Ang5XHRO.9j0VA6PSi1dIlbqa0F9FW'),
(10, 'aa', 'aa@hotmail.com', '$2y$10$dp67Mi6n4JIaxPRxDrhEhuQrttKLnyZW5zTzy71VxkIT.J0nBsdFy');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `playlist_songs`
--
ALTER TABLE `playlist_songs`
  ADD KEY `playlist_id` (`playlist_id`),
  ADD KEY `songs_id` (`songs_id`);

--
-- Index pour la table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `playlist_songs`
--
ALTER TABLE `playlist_songs`
  ADD CONSTRAINT `playlist_songs_ibfk_1` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `playlist_songs_ibfk_2` FOREIGN KEY (`songs_id`) REFERENCES `songs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
