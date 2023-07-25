-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 25 juil. 2023 à 10:16
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet5`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `comment` varchar(255) NOT NULL,
  `post_id` int NOT NULL,
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `comment`, `post_id`, `create_time`) VALUES
(25, 34, 'Nice post', 37, '2023-06-06 14:37:06'),
(26, 35, 'Comment 1', 38, '2023-06-08 09:35:48'),
(27, 36, 'wow super post', 38, '2023-06-08 19:12:10'),
(18, 18, 'ggg', 18, '2023-04-17 15:32:01'),
(19, 22, 'Hello', 27, '2023-04-26 06:18:34'),
(20, 22, 'create comment ', 28, '2023-04-26 21:10:02'),
(21, 22, 'create comment2', 28, '2023-04-26 21:45:34'),
(22, 23, 'Hello', 28, '2023-04-26 21:51:25');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `last_name`, `first_name`, `email`, `sujet`, `message`) VALUES
(1, 'nom1', 'prenom1', 'email1@hotmail.com', 'sujet1', 'message1'),
(2, 'nom1', 'prenom1', 'email1@hotmail.com', 'sujet1', 'message1'),
(3, 'nom1', 'prenom1', 'email1@hotmail.com', 'email1', 'Hello'),
(4, 'nom1', 'prenom1', 'email1@hotmail.com', 'email1', 'Hello'),
(5, 'nom1', 'prenom1', 'email1@hotmail.com', 'email1', 'Hello'),
(6, 'nom1', 'prenom1', 'email1@hotmail.com', 'email1', 'Hello'),
(7, 'nom1', 'prenom1', 'email1@hotmail.com', 'email1', 'Hello'),
(8, 'nom1', 'prenom1', 'email1@hotmail.com', 'email1', 'Hello'),
(9, 'nom1', 'prenom1', 'email1@hotmail.com', 'email1', 'Hello'),
(10, 'nom1', 'prenom1', 'email1@hotmail.com', 'email1', 'Hello'),
(11, 'nom1', 'prenom1', 'email1@hotmail.com', 'email1', 'Hello'),
(12, 'nom1', 'prenom1', 'email1@hotmail.com', 'email1', 'Hello'),
(13, 'nom1', 'prenom1', 'email1@hotmail.com', 'email1', 'Hello'),
(14, 'nom3', 'prenom3', 'email3@hotmail.com', 'sujet3', 'message3'),
(15, 'nom3', 'prenom3', 'email3@hotmail.com', 'sujet3', 'message3'),
(16, 'nom3', 'prenom3', 'email3@hotmail.com', 'sujet3', 'message3'),
(17, 'Nom4', 'prenom4', 'email4@hotmail.com', 'sujet4', 'message4'),
(18, 'Nom4', 'prenom4', 'email4@hotmail.com', 'sujet4', 'message4'),
(19, 'Nom4', 'prenom4', 'email4@hotmail.com', 'sujet4', 'message4'),
(20, 'Nom4', 'prenom4', 'email4@hotmail.com', 'sujet4', 'message4'),
(21, 'eee', 'eeee', 'dddd@hotmail.com', 'dddd', 'ddddd'),
(22, 'eee', 'eeee', 'dddd@hotmail.com', 'dddd', 'ddddd'),
(23, 'nom5', 'prénom5', 'email5@hotmail.com', 'sujet5', 'message'),
(24, 'nom5', 'prénom5', 'email5@hotmail.com', 'sujet5', 'message'),
(50, 'nom', 'prenom', 'email@hotmail.com', 'sujet test', 'message le test'),
(49, 'azrak', 'zayna', 'zk10-91@hotmail.com', 'test1', 'test1'),
(27, 'nom', 'gg', 'ggg@gmail.com', 'fff', 'fffff'),
(28, 'nom', 'gg', 'ggg@gmail.com', 'fff', 'fffff'),
(29, 'nom11', 'prenom11', 'email11@hotmail.com', 'sujet11', 'message11'),
(30, 'nom11', 'prenom11', 'email11@hotmail.com', 'sujet11', 'message11'),
(31, 'nom11', 'prenom11', 'email11@hotmail.com', 'sujet11', 'message11'),
(32, 'nom11', 'prenom11', 'email11@hotmail.com', 'sujet11', 'message11'),
(33, 'nom11', 'prenom11', 'email11@hotmail.com', 'sujet11', 'message11'),
(34, 'nom11', 'prenom11', 'email11@hotmail.com', 'sujet11', 'message11'),
(35, 'nom6', 'prenom6', 'email6@hotmail.com', 'sujet6', 'message6'),
(36, 'nom88', 'prenom88', 'email88@hotmail.com', 'sujet88', 'message88'),
(37, 'nom89', 'prenom89', 'email89@hotmail.com', 'sujet89', 'message89'),
(38, 'nnb', 'bbb', 'bbbb@gmail.com', 'bbbb', 'bbb'),
(39, 'ff', 'fff', 'fffff@homtmail.com', 'ffff', 'heloo'),
(40, 'nom1', 'prenom1', 'email1@hotmail.com', 'sujet1', 'message1'),
(41, '', '', '', '', ''),
(42, '', '', '', '', ''),
(43, '', '', '', '', ''),
(44, '', '', '', '', ''),
(45, 'nom', 'prenom', 'email@hotmail.com', 'sujet', 'message'),
(46, 'dd', 'dd', 'dddd@hotmail.com', 'ddd', 'ddd'),
(47, 'noml', 'prenomi', 'emaili@hotmail.com', 'sujeti', 'messagei'),
(48, 'azrak', 'zayna', 'zaynakaadan@gmail.com', 'test', 'test'),
(51, 'nom51', 'prenom51', 'email51@hotmail.com', 'sujet51', 'merci pour tes postes il sont manifiques'),
(52, 'nom2', 'prenom2', 'email2@hotmail.com', 'sujet 2', 'les messages');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `create_time`, `user_id`) VALUES
(38, 'Titre de le post 1 édite le titre', 'Contenu de le post 1 édité', '2023-06-08 09:35:34', 36);

-- --------------------------------------------------------

--
-- Structure de la table `post_tag`
--

DROP TABLE IF EXISTS `post_tag`;
CREATE TABLE IF NOT EXISTS `post_tag` (
  `post_id` int NOT NULL,
  `tag_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `post_tag`
--

INSERT INTO `post_tag` (`post_id`, `tag_id`) VALUES
(1, 3),
(2, 4),
(3, 1),
(4, 3),
(5, 4),
(6, 3),
(7, 3),
(8, 4),
(9, 1),
(10, 1),
(11, 4),
(12, 3),
(13, 2),
(14, 3),
(15, 4),
(16, 4),
(17, 3),
(18, 4),
(19, 1),
(20, 1),
(21, 2),
(22, 3),
(23, 3),
(0, 4),
(24, 3),
(25, 3),
(26, 3),
(26, 4),
(27, 4),
(27, 1),
(27, 2),
(28, 3),
(29, 1),
(30, 3),
(31, 4),
(32, 4),
(33, 3),
(34, 3),
(35, 4),
(36, 1),
(37, 3),
(38, 3),
(39, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id`, `title`, `create_time`) VALUES
(1, 'PHP', '2023-04-02 17:54:19'),
(2, 'HTML', '2023-04-02 17:54:19'),
(3, 'CSS', '2023-04-02 17:55:41'),
(4, 'JAVASCRIPT', '2023-04-02 17:55:41');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gender` varchar(10) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `email` varchar(100) CHARACTER SET utf32 COLLATE utf32_general_ci DEFAULT NULL,
  `password` varchar(120) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `is_admin` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `gender`, `last_name`, `first_name`, `email`, `password`, `is_admin`) VALUES
(36, 'femme', 'nom2', 'prenom2', 'email2@hotmail.com', '$2y$10$DUejI4dThV1M9hcfoZLRteAWNyLG8z3pWFAKe21eoBEZfpqIoPJzC', 1),
(35, 'femme', 'nom1', 'prenom1', 'email1@hotmail.com', '$2y$10$C/jxs112tJhSzEp8WDU4/.HD0wQX1yOF0WFiRregU2fSitFilsfhC', 1),
(9, 'femme', 'nom7', 'prenom7', 'email7@hotmail.com', '$2y$10$/rHocHBVXIlDzo3hIW8aJupAkzrlT4DOFH1fDns/zA9wE9Xgx76vO', 1),
(10, 'femme', 'nom8', 'prenom8', 'email8@hotmail.com', '$2y$10$l4MVyX.FswU6cR3wjoty4OfTeb5vAfmRdT1uhTL6mqC1sPEdLCeWC', 1),
(11, 'femme', 'nom9', 'prenom9', 'email9@hotmail.com', '$2y$10$QDWnQtDT4Tr43j3vSmtS0.KkJhkRMtsegkwZix12H8pWqUuhtpRYW', 1),
(12, 'femme', 'nom10', 'prenom10', 'email10@hotmail.com', '$2y$10$O5Y4DY7RDsGcYid5av..gOA84/8W0jw4X7OW91w1Ll83uoO9TuBS.', 1),
(13, 'femme', 'nom11', 'prenom11', 'email11@hotmail.com', '$2y$10$mLjk4AyFXTdmSe7HlUKgxOzBCMOaINShMzZWOhiX9d8tjhDPr5l2e', 1),
(14, 'femme', 'nom12', 'prenom12', 'elail12@hotmail.com', '$2y$10$9LSLXt08olDmI2GsfbuWsOh9LHcEcKtj9sCTj/jpJ.Sv3LrCa5oj.', 1),
(15, 'femme', 'nom13', 'prenom13', 'email13@hotmail.com', '$2y$10$V6Nyeu4A51OPd4rqYYDWXuzh0tDTrQbZMgUsuqNxOVawObilQAm8y', 1),
(16, 'homme', 'Nom14', 'prenom14', 'email14@hotmail.com', '$2y$10$BQPwEQzBCRi/OPD67B3pK.zDq5b/zjh6YdrQiLNqoziYqsXx7d0Fu', 1),
(17, 'femme', 'nom15', 'prenom15', 'email15@hotmail.com', '$2y$10$wRhgl8UP71TFaSyyIQ7dPeuisnY/OAE1roKyCmLN0lttibB0XyOlO', 1),
(18, 'femme', 'nom45', 'prenom45', 'email45@hotmail.com', '$2y$10$gd9LZsU1azSHOL0j7H6V/.mc5Wr04JsZ.dWjB3knF60GilHgXf7aq', 1),
(19, 'femme', 'nom46', 'prenom46', 'email46@hotmail.com', '$2y$10$q4mJcEQ88sVAGKvYoyYcZ.RUjI1nyeNow8GqMNI3RxpRm/unu2vyS', 1),
(20, 'femme', 'nom16', 'prenom16', 'email16@hotmail.com', '$2y$10$IQhaQH62c8jKKiWzSl7mrujGCwtYoE8BLcBfOtPHp5g0jOWXoid.K', 1),
(21, 'femme', 'nom17', 'prnom17', 'email17@hotmail.com', '$2y$10$eaqKT3V0R66664.1FvW.w.Kut9u9EYg15iVDQDTYKWjf8TkMF5fYW', 1),
(22, 'femme', 'nom22', 'prenom22', 'email22@hotmail.com', '$2y$10$IjZ8BxAB25ixGu0aluN9y.J9em/TWP4Bvk2c7DTjp0Tg04LlW3Q8G', 1),
(23, 'homme', 'nom23', 'prenom23', 'email23@hotmail.com', '$2y$10$IvZAiXWDYwe2iXwfUdhg7.mmV.TwcZaXSz7JfyNIpWyiBYiutyiuK', 1),
(25, 'femme', 'nom48', 'prenom48', 'email48@hotmail.com', '$2y$10$jI.EUtGOCyatpIE8CrQKG.LTttkASrXq4dxf68.vHwaOgPVfulilG', 1),
(26, 'femme', 'nom50', 'prenom50', 'email50@hotmail.com', '$2y$10$12LHzV3axvEBz8HeoctxP.KDc1wQUloOPkPQ7CmwLgCnU4jhszrLO', 1),
(27, 'homme', 'nom', 'prenom', 'email@hotmail.com', '$2y$10$kVxDY6tcTlq.Et.y4Fxfm.94q7ceYkWS5WwlMaNLaLIX0n/0GvB2q', 1),
(28, 'homme', 'nom49', 'prenom49', 'email49@hotmail.com', '$2y$10$2.so86RO0.J6qDRcdFgIcut7fFfP9MAtem3fX00Fcc2pJDqFgP8Oy', 1),
(29, 'femme', 'nom18', 'prenom18', 'email18@hotmail.com', '$2y$10$7W5I1qI9hsT1BpivTfCxJOS/CcJRVPF1/3iR.Fk5iuauq2sgEvdWe', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
