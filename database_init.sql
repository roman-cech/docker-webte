-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: mysql
-- Čas generovania: Po 10.Máj 2021, 21:51
-- Verzia serveru: 8.0.21
-- Verzia PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `test`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `Answers`
--

CREATE TABLE `Answers` (
                           `id` int NOT NULL,
                           `user_id` int NOT NULL,
                           `question_id` int NOT NULL,
                           `type` enum('Krátka odpoveď','Výber správnej odpovede','Párovanie odpovedí','Nakreslenie obrázka','Matematický výraz') CHARACTER SET utf8 COLLATE utf8_slovak_ci NOT NULL,
                           `answer` varchar(128) CHARACTER SET utf8 COLLATE utf8_slovak_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `Answers`
--

INSERT INTO `Answers` (`id`, `user_id`, `question_id`, `type`, `answer`) VALUES
(1, 1, 1, 'Krátka odpoveď', '125'),
(2, 1, 2, 'Krátka odpoveď', '69'),
(3, 1, 3, 'Výber správnej odpovede', 'NePrešovský kraj,Šariš,nie je výrok'),
(4, 1, 4, 'Výber správnej odpovede', 'Pí,inak sa nehovorí,Lí'),
(5, 1, 5, 'Párovanie odpovedí', 'V'),
(6, 1, 6, 'Párovanie odpovedí', 'S');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `Exams`
--

CREATE TABLE `Exams` (
                         `id` int NOT NULL,
                         `exam_code` varchar(32) CHARACTER SET utf8 COLLATE utf8_slovak_ci DEFAULT NULL,
                         `user_id` int DEFAULT NULL,
                         `title` varchar(32) CHARACTER SET utf8 COLLATE utf8_slovak_ci DEFAULT NULL,
                         `time_limit` time DEFAULT NULL,
                         `is_active` tinyint(1) DEFAULT NULL,
                         `exam_points` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `Exams`
--

INSERT INTO `Exams` (`id`, `exam_code`, `user_id`, `title`, `time_limit`, `is_active`, `exam_points`) VALUES
(1, 'e60d71', 1, 'test', '00:00:25', 1, 60);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `Questions`
--

CREATE TABLE `Questions` (
                             `id` int NOT NULL,
                             `exam_id` int NOT NULL,
                             `question` varchar(256) CHARACTER SET utf8 COLLATE utf8_slovak_ci NOT NULL,
                             `answer_id` int NOT NULL,
                             `type` enum('Krátka odpoveď','Výber správnej odpovede','Párovanie odpovedí','Nakreslenie obrázka','Matematický výraz') CHARACTER SET utf8 COLLATE utf8_slovak_ci NOT NULL,
                             `question_points` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `Questions`
--

INSERT INTO `Questions` (`id`, `exam_id`, `question`, `answer_id`, `type`, `question_points`) VALUES
(1, 1, 'Vypočítajte 5*5*5', 1, 'Krátka odpoveď', 1),
(2, 1, 'Vypočítajte (128/2)+25-(5*4)', 2, 'Krátka odpoveď', 1),
(3, 1, 'K danému výroku vyberte jeho negáciu - (Prešovský kraj)', 3, 'Výber správnej odpovede', 1),
(4, 1, 'Ludolfovo číslo sa inak povie aj ', 4, 'Výber správnej odpovede', 1),
(5, 1, 'Objem sa píše ako', 5, 'Párovanie odpovedí', 1),
(6, 1, 'Obsah sa píše ako', 6, 'Párovanie odpovedí', 1),
(7, 1, 'kosoštvorec', 0, 'Nakreslenie obrázka', 1),
(8, 1, 'Derivuj y = 5x^3 -7x^2 + 8x -14', 0, 'Matematický výraz', 1),
(9, 1, 'Derivuj y = 5/x^2', 0, 'Matematický výraz', 1);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `Users`
--

CREATE TABLE `Users` (
                         `id` int NOT NULL,
                         `token` varchar(32) CHARACTER SET utf8 COLLATE utf8_slovak_ci DEFAULT NULL,
                         `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_slovak_ci DEFAULT NULL,
                         `surname` varchar(32) CHARACTER SET utf8 COLLATE utf8_slovak_ci DEFAULT NULL,
                         `ais_id` int DEFAULT NULL,
                         `email` varchar(64) CHARACTER SET utf8 COLLATE utf8_slovak_ci DEFAULT NULL,
                         `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_slovak_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `Users`
--

INSERT INTO `Users` (`id`, `token`, `name`, `surname`, `ais_id`, `email`, `password`) VALUES
(1, 'e60d71', 'miloš', 'blby', 97857, 'milos@gmail.com', 'milosko');

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
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pre tabuľku `Exams`
--
ALTER TABLE `Exams`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pre tabuľku `Questions`
--
ALTER TABLE `Questions`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
