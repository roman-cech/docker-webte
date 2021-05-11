-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: localhost:3306
-- Čas generovania: Po 10.Máj 2021, 11:05
-- Verzia serveru: 8.0.23-0ubuntu0.20.04.1
-- Verzia PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `ais3`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `Answers`
--

CREATE TABLE `Answers` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `question_id` int NOT NULL,
  `type` enum('Krátka odpoveď','Výber správnej odpovede','Párovanie odpovedí','Nakreslenie obrázka','Matematický výraz') COLLATE utf8_slovak_ci NOT NULL,
  `answer` varchar(128) COLLATE utf8_slovak_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `Exams`
--

CREATE TABLE `Exams` (
  `id` int NOT NULL,
  `exam_code` varchar(32) COLLATE utf8_slovak_ci NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(32) COLLATE utf8_slovak_ci NOT NULL,
  `time_limit` timestamp NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `exam_points` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `Questions`
--

CREATE TABLE `Questions` (
  `id` int NOT NULL,
  `exam_id` int NOT NULL,
  `question` varchar(256) COLLATE utf8_slovak_ci NOT NULL,
  `answer_id` int NOT NULL,
  `type` enum('Krátka odpoveď','Výber správnej odpovede','Párovanie odpovedí','Nakreslenie obrázka','Matematický výraz') CHARACTER SET utf8 COLLATE utf8_slovak_ci NOT NULL,
  `question_points` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `Users`
--

CREATE TABLE `Users` (
  `id` int NOT NULL,
  `token` varchar(32) COLLATE utf8_slovak_ci DEFAULT NULL,
  `name` varchar(32) COLLATE utf8_slovak_ci DEFAULT NULL,
  `surname` varchar(32) COLLATE utf8_slovak_ci DEFAULT NULL,
  `ais_id` int DEFAULT NULL,
  `email` varchar(64) COLLATE utf8_slovak_ci DEFAULT NULL,
  `password` varchar(64) COLLATE utf8_slovak_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `Answers`
--
ALTER TABLE `Answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `umiestnenia_ifbk_1` (`question_id`),
  ADD KEY `umiestnenia_ifbk_2` (`user_id`);

--
-- Indexy pre tabuľku `Exams`
--
ALTER TABLE `Exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexy pre tabuľku `Questions`
--
ALTER TABLE `Questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_id` (`exam_id`,`answer_id`),
  ADD KEY `answer_id` (`answer_id`);

--
-- Indexy pre tabuľku `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `Answers`
--
ALTER TABLE `Answers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pre tabuľku `Exams`
--
ALTER TABLE `Exams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pre tabuľku `Questions`
--
ALTER TABLE `Questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pre tabuľku `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `Answers`
--
ALTER TABLE `Answers`
  ADD CONSTRAINT `umiestnenia_ifbk_1` FOREIGN KEY (`question_id`) REFERENCES `Questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `umiestnenia_ifbk_2` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Obmedzenie pre tabuľku `Exams`
--
ALTER TABLE `Exams`
  ADD CONSTRAINT `Exams_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Obmedzenie pre tabuľku `Questions`
--
ALTER TABLE `Questions`
  ADD CONSTRAINT `exam_ifbk_1` FOREIGN KEY (`exam_id`) REFERENCES `Exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
